<?php

namespace App\Http\Controllers;

use App\Models\Asbobuskuna;
use App\Models\Asbobuskunaexpert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AsbobuskunaexpertController extends Controller
{
    public function store(Request $request)
    {
        Asbobuskunaexpert::create([
            'user_id' => auth()->id(),
            'fish' => auth()->user()->name,
            'asbobuskuna_id' => $request->asbobuskuna_id,
            'status' => $request->status,
            'comment' => $request->comment,
            'lab_uskunalarini_mosligi' => $request->lab_uskunalarini_mosligi,
            'ilmiy_tadqiqot_ishilari' => $request->ilmiy_tadqiqot_ishilari,
            'ilmiy_tadqiqot_hajmi' => $request->ilmiy_tadqiqot_hajmi,
            'lab_zaxirasi' => $request->lab_zaxirasi,
            'foy_uchun_ariz' => $request->foy_uchun_ariz,
            'asbob_usk_ehtiyoji' => $request->asbob_usk_ehtiyoji,
            'zarur_ehtiyoji' => $request->zarur_ehtiyoji,
            'lab_ishga_yaroqliligi' => $request->lab_ishga_yaroqliligi,
        ]);

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


    public function update(Request $request, Asbobuskunaexpert $asbobuskunaexpert)
    {
        $asbobuskunaexpert->update([
            'user_id' => auth()->id(),
            'fish' => auth()->user()->name,
            'status' => $request->status,
            'comment' => $request->comment,
            'lab_uskunalarini_mosligi' => $request->lab_uskunalarini_mosligi,
            'ilmiy_tadqiqot_ishilari' => $request->ilmiy_tadqiqot_ishilari,
            'ilmiy_tadqiqot_hajmi' => $request->ilmiy_tadqiqot_hajmi,
            'lab_zaxirasi' => $request->lab_zaxirasi,
            'foy_uchun_ariz' => $request->foy_uchun_ariz,
            'asbob_usk_ehtiyoji' => $request->asbob_usk_ehtiyoji,
            'zarur_ehtiyoji' => $request->zarur_ehtiyoji,
            'lab_ishga_yaroqliligi' => $request->lab_ishga_yaroqliligi,
        ]);

        return redirect()->route('asbobuskuna.show', $asbobuskunaexpert->asbobuskuna_id)->with("status", 'Ma\'lumotlar muvaffaqiyatli qo"shildi.');
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
}
