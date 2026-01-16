<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAsbobuskunaExpertRequest;
use App\Http\Requests\UpdateAsbobuskunaExpertRequest;
use App\Models\Asbobuskuna;
use App\Models\Asbobuskunaexpert;
use App\Exports\AsbobuskunaexpertMonitoringExpert;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\User;
use App\Notifications\AsbobuskunaNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;

class AsbobuskunaexpertController extends Controller
{
    public function store(StoreAsbobuskunaExpertRequest $request)
    {
        $data = $request->validated();
        $user = User::where('group_id', '=', auth()->user()->group_id)->role('Ekspert')->first();

        $asbobuskuna = Asbobuskuna::findOrFail($request->asbobuskuna_id);
        $data['user_id'] = auth()->id();
        $data['tashkilot_id'] = $asbobuskuna->tashkilot_id;
        $data['fish'] = $user->name;
        $data['quarter'] = 3;
        $data['year'] = date('Y');
        $data['asbobuskuna_id'] = $asbobuskuna->id;

        $asbobuskunaexpert = Asbobuskunaexpert::create($data);

        Notification::send($user, new AsbobuskunaNotification($asbobuskunaexpert));

        return redirect()->back()->with("status", 'Ma\'lumotlar muvaffaqiyatli qo"shildi.');
    }

    public function edit(Asbobuskunaexpert $asbobuskunaexpert)
    {
        $asbobuskuna = Asbobuskuna::findOrFail($asbobuskunaexpert->asbobuskuna_id);
        return view("admin.asbobuskuna.expertedit", [
            'asbobuskunaexpert' => $asbobuskunaexpert,
            'asbobuskuna' => $asbobuskuna,
        ]);
    }


    public function update(UpdateAsbobuskunaExpertRequest $request, Asbobuskunaexpert $asbobuskunaexpert)
    {
        if ($request->holati == 0) {
            $asbobuskunaexpert->update([
                'holati' => 'rad etildi',
            ]);
            $admins = User::findOrFail($asbobuskunaexpert->user_id);
            Notification::send($admins, new AsbobuskunaNotification($asbobuskunaexpert));
            return redirect()->route('asbobuskuna.show', $asbobuskunaexpert->asbobuskuna_id)->with("status", 'Ma\'lumotlar muvaffaqiyatli qo"shildi.');
        } else {
            $user = User::where('group_id', '=', auth()->user()->group_id)->role('Ekspert')->first();
            $data = $request->validated();
            $data['user_id'] = auth()->id();
            $data['fish'] = $user->name;
            $data['holati'] = 'yuborildi';
            
            $asbobuskunaexpert->update($data);

            // $admins = User::findOrFail($asbobuskunaexpert->user_id);
            Notification::send($user, new AsbobuskunaNotification($asbobuskunaexpert));
            return redirect()->route('asbobuskuna.show', $asbobuskunaexpert->asbobuskuna_id)->with("status", 'Ma\'lumotlar muvaffaqiyatli qo"shildi.');
        }
    }

    public function destroy(Asbobuskunaexpert $asbobuskunaexpert)
    {
        // Faylni o'chirish (agar mavjud bo'lsa)
        if ($asbobuskunaexpert->file) {
            Storage::delete($asbobuskunaexpert->file);
        }

        // Asbobuskunaexpertni o'chirish
        $asbobuskunaexpert->delete();

        return redirect()->back()->with('status', 'Dalolatnoma muvaffaqiyatli o‘chirildi.');
    }

    public function exportAsbobuskunaexpert()
    {
        ini_set('memory_limit', '1024M'); // Yoki kerakli miqdorda xotira limiti qo'ying
        ini_set('max_execution_time', '300'); // Kerak bo'lsa, vaqt limitini ham oshiring

        return Excel::download(new AsbobuskunaexpertMonitoringExpert(), 'monitoring_asbob_uskuna.xlsx');
    }
}
