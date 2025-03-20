<?php

namespace App\Http\Controllers;

use App\Models\Stajirovkaexpert;
use Illuminate\Http\Request;

class StajirovkaexpertController extends Controller
{
    public function store(Request $request)
    {
        Stajirovkaexpert::create([
            'user_id' => auth()->id(),
            'fish' => auth()->user()->name,
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
}
