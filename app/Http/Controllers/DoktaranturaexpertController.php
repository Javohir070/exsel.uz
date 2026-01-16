<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDoktaranturaexpertRequest;
use App\Models\Doktaranturaexpert;
use App\Models\Izlanuvchilar;
use App\Models\Tashkilot;
use App\Models\User;
use App\Notifications\DoktaranturaNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;

class DoktaranturaexpertController extends Controller
{
    public function store(StoreDoktaranturaexpertRequest $request)
    {
        $user = User::where('group_id', '=', auth()->user()->group_id)->role('Ekspert')->first();
        
        $data = $request->validated();
        $data['user_id'] = auth()->id();
        $data['fish'] = $user->name;
        $data['quarter'] = 3;
        $data['year'] = date('Y');

        $doktaranturaexpert = Doktaranturaexpert::create($data);

        Notification::send($user, new DoktaranturaNotification($doktaranturaexpert));

        return redirect()->back()->with("status", 'Ma\'lumotlar muvaffaqiyatli qo"shildi.');
    }


    public function edit(Doktaranturaexpert $doktaranturaexpert)
    {
        $id = $doktaranturaexpert->tashkilot_id;
        $tashkilot = Tashkilot::findOrFail($id);
        $lab_izlanuvchilar = Izlanuvchilar::where('tashkilot_id', $id)->count();
        $phd = [
            "Tayanch doktorantura, PhD",
            "Mustaqil tadqiqotchi, PhD",
            "Maqsadli tayanch doktorantura, PhD"
        ];
        $dsc = [
            "Doktorantura, DSc",
            "Mustaqil tadqiqotchi, DSc",
            "Maqsadli doktorantura, DSc"
        ];
        $phd_soni = Izlanuvchilar::where('tashkilot_id', $id)
            ->whereIn('talim_turi', $phd)->count();
        $dsc_soni = Izlanuvchilar::where('tashkilot_id', $id)
            ->whereIn('talim_turi', $dsc)->count();
        $stajyor_soni = Izlanuvchilar::where('tashkilot_id', $id)
            ->where('talim_turi', "Stajyor-tadqiqotchi")->count();

        $dscmus_soni = Izlanuvchilar::where('tashkilot_id', $id)
            ->where('talim_turi', 'Mustaqil tadqiqotchi, DSc')->count();

        $phdmus_soni = Izlanuvchilar::where('tashkilot_id', $id)
            ->where('talim_turi', 'Mustaqil tadqiqotchi, PhD')->count();


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
