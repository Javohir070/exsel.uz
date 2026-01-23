<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDoktaranturaexpertRequest;
use App\Models\Doktaranturaexpert;
use App\Models\Monitoring;
use App\Models\Tashkilot;
use App\Models\User;
use App\Notifications\DoktaranturaNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;

class DoktaranturaexpertController extends Controller
{
    public $monitoring;

    public function __construct()
    {
        $this->monitoring = Monitoring::getActive();
    }

    public function store(StoreDoktaranturaexpertRequest $request)
    {
        $user = User::where('group_id', '=', auth()->user()->group_id)->role('Ekspert')->first();
        
        $data = $request->validated();
        $data['user_id'] = auth()->id();
        $data['fish'] = $user->name;
        $data['quarter'] = $this->monitoring->id;
        $data['year'] = $this->monitoring->year;

        $doktaranturaexpert = Doktaranturaexpert::create($data);

        Notification::send($user, new DoktaranturaNotification($doktaranturaexpert));

        return redirect()->back()->with("status", 'Ma\'lumotlar muvaffaqiyatli qo"shildi.');
    }


    public function edit(Doktaranturaexpert $doktaranturaexpert)
    {
        $id = $doktaranturaexpert->tashkilot_id;
        $tashkilot = Tashkilot::findOrFail($id);
        $lab_izlanuvchilar = 0;
        $phd_soni = 0;
        $dsc_soni = 0;  
        $stajyor_soni = 0;
        $dscmus_soni = 0;
        $phdmus_soni = 0;

        return view("admin.doktarantura.edit", [
            'phd_soni' => $phd_soni,
            'dsc_soni' => $dsc_soni,
            'stajyor_soni' => $stajyor_soni,
            'tashkilot' => $tashkilot,
            'lab_izlanuvchilar' => $lab_izlanuvchilar,
            'dscmus_soni' => $dscmus_soni,
            'phdmus_soni' => $phdmus_soni,
            'doktaranturaexpert' => $doktaranturaexpert
        ]);
    }


    public function update(Request $request, Doktaranturaexpert $doktaranturaexpert)
    {
        if ($request->holati == 0) {
            $doktaranturaexpert->update([
                'holati' => 'rad etildi',
            ]);
            $admins = User::findOrFail($doktaranturaexpert->user_id);
            Notification::send($admins, new DoktaranturaNotification($doktaranturaexpert));
            return redirect()->route('doktarantura.show', $doktaranturaexpert->tashkilot_id)->with("status", 'Ma\'lumotlar rad etildi.');
        } else {
            $user = User::where('group_id', '=', auth()->user()->group_id)->role('Ekspert')->first();

            $data = $request->validated();
            $data['user_id'] = auth()->id();
            $data['fish'] = $user->name;
            $data['holati'] = 'yuborildi';

            $doktaranturaexpert->update($data);

            Notification::send($user, new DoktaranturaNotification($doktaranturaexpert));

            return redirect()->route('doktarantura.show', $doktaranturaexpert->tashkilot_id)->with("status", 'Ma\'lumotlar muvaffaqiyatli qo"shildi.');
        }
    }

    public function destroy(Doktaranturaexpert $doktaranturaexpert)
    {
        // Faylni o'chirish (agar mavjud bo'lsa)
        if ($doktaranturaexpert->file) {
            Storage::delete($doktaranturaexpert->file);
        }

        // doktaranturaexpertni o'chirish
        $doktaranturaexpert->delete();

        return redirect()->back()->with('status', 'Dalolatnoma muvaffaqiyatli o‘chirildi.');
    }

}
