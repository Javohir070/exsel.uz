<?php

namespace App\Http\Controllers;

use App\Models\Asbobuskunaexpert;
use Illuminate\Http\Request;

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
}
