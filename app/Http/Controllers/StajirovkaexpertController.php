<?php

namespace App\Http\Controllers;

use App\Models\Stajirovka;
use App\Models\Stajirovkaexpert;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StajirovkaexpertController extends Controller
{
    public function store(Request $request)
    {
        $user = User::where('region_id', '=',auth()->user()->region_id)->role('Ekspert')->first();
        $stajirovka = Stajirovka::findOrFail($request->stajirovka_id);
        Stajirovkaexpert::create([
            'user_id' => auth()->id(),
            'tashkilot_id' => $stajirovka->tashkilot_id,
            'fish' => $user->name,
            'ekspert_fish' => $request->ekspert_fish,
            'stajirovka_id' => $request->stajirovka_id,
            'ilmiy_hisobot' => $request->ilmiy_hisobot,
            'egallangan_bilim' => $request->egallangan_bilim,
            'ishlar_natijalari' => $request->ishlar_natijalari,
            'xalqarotan_jur_nashr' => $request->xalqarotan_jur_nashr,
            'biryil_davomida' => $request->biryil_davomida,
            'status' => $request->status,
            'comment' => $request->comment,
        ]);

        return redirect()->back()->with("status", 'Ma\'lumotlar muvaffaqiyatli qo"shildi.');
    }

    public function edit(Stajirovkaexpert $stajirovkaexpert)
    {
        $stajirovka = Stajirovka::findOrFail($stajirovkaexpert->stajirovka_id);
        return view("admin.stajirovka.expertedit", ['stajirovkaexpert' => $stajirovkaexpert, 'stajirovka' => $stajirovka]);
    }


    public function update(Request $request, Stajirovkaexpert $Stajirovkaexpert)
    {
        $user = User::where('region_id', '=',auth()->user()->region_id)->role('Ekspert')->first();
        $Stajirovkaexpert->update([
            'user_id' => auth()->id(),
            'fish' => $user->name,
            'ekspert_fish' => $request->ekspert_fish,
            'ilmiy_hisobot' => $request->ilmiy_hisobot,
            'egallangan_bilim' => $request->egallangan_bilim,
            'ishlar_natijalari' => $request->ishlar_natijalari,
            'xalqarotan_jur_nashr' => $request->xalqarotan_jur_nashr,
            'biryil_davomida' => $request->biryil_davomida,
            'status' => $request->status,
            'comment' => $request->comment,
        ]);

        return redirect()->route('stajirovka.show', $Stajirovkaexpert->stajirovka_id)->with("status", 'Ma\'lumotlar muvaffaqiyatli qo"shildi.');
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
