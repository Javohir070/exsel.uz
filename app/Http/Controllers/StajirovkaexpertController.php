<?php

namespace App\Http\Controllers;

use App\Models\Stajirovka;
use App\Models\Stajirovkaexpert;
use App\Models\User;
use App\Notifications\StajirovkaNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;

class StajirovkaexpertController extends Controller
{
    public function store(Request $request)
    {
        $user = User::where('group_id', '=',auth()->user()->group_id)->role('Ekspert')->first();
        $stajirovka = Stajirovka::findOrFail($request->stajirovka_id);
        $stajirovkaexpert = Stajirovkaexpert::create([
            'user_id' => auth()->id(),
            'tashkilot_id' => $stajirovka->tashkilot_id,
            'fish' => $user->name,
            'ekspert_fish' => $request->ekspert_fish,
            't_masul' => $request->t_masul,
            'stajirovka_id' => $request->stajirovka_id,
            'ilmiy_hisobot' => $request->ilmiy_hisobot,
            'egallangan_bilim' => $request->egallangan_bilim,
            'ishlar_natijalari' => $request->ishlar_natijalari,
            'xalqarotan_jur_nashr' => $request->xalqarotan_jur_nashr,
            'biryil_davomida' => $request->biryil_davomida,
            'status' => $request->status,
            'comment' => $request->comment,
            'quarter' => 2,
            'year' => date('Y'),
        ]);
        Notification::send($user, new StajirovkaNotification($stajirovkaexpert));

        return redirect()->back()->with("status", 'Ma\'lumotlar muvaffaqiyatli qo"shildi.');
    }

    public function edit(Stajirovkaexpert $stajirovkaexpert)
    {
        $stajirovka = Stajirovka::findOrFail($stajirovkaexpert->stajirovka_id);
        return view("admin.stajirovka.expertedit", ['stajirovkaexpert' => $stajirovkaexpert, 'stajirovka' => $stajirovka]);
    }


    public function update(Request $request, Stajirovkaexpert $stajirovkaexpert)
    {
        if ($request->holati == 0) {
            $user = User::where('group_id', '=',auth()->user()->group_id)->role('Ekspert')->first();
            $stajirovkaexpert->update([
                'holati' => 'rad etildi',
            ]);
            $admins =User::findOrFail($stajirovkaexpert->user_id);
            Notification::send($admins, new StajirovkaNotification($stajirovkaexpert));
            return redirect()->route('stajirovka.show', $stajirovkaexpert->stajirovka_id)->with("status", 'Ma\'lumotlar rad etildi.');
        } else {
            $user = User::where('group_id', '=',auth()->user()->group_id)->role('Ekspert')->first();
            $stajirovkaexpert->update([
                'user_id' => auth()->id(),
                'fish' => $user->name,
                'ekspert_fish' => $request->ekspert_fish,
                't_masul' => $request->t_masul,
                'ilmiy_hisobot' => $request->ilmiy_hisobot,
                'egallangan_bilim' => $request->egallangan_bilim,
                'ishlar_natijalari' => $request->ishlar_natijalari,
                'xalqarotan_jur_nashr' => $request->xalqarotan_jur_nashr,
                'biryil_davomida' => $request->biryil_davomida,
                'status' => $request->status,
                'comment' => $request->comment,
                'holati' => 'yuborildi',
            ]);
            Notification::send($user, new StajirovkaNotification($stajirovkaexpert));
            return redirect()->route('stajirovka.show', $stajirovkaexpert->stajirovka_id)->with("status", 'Ma\'lumotlar muvaffaqiyatli qo"shildi.');
        }

    }

    public function destroy(Stajirovkaexpert $stajirovkaexpert)
    {
        // Faylni o'chirish (agar mavjud bo'lsa)
        if ($stajirovkaexpert->file) {
            Storage::delete($stajirovkaexpert->file);
        }

        // stajirovkaexpertni o'chirish
        $stajirovkaexpert->delete();

        return redirect()->back()->with('status', 'Dalolatnoma muvaffaqiyatli o‘chirildi.');
    }
}
