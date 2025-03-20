<?php

namespace App\Http\Controllers;

use App\Models\Doktaranturaexpert;
use Illuminate\Http\Request;

class DoktaranturaexpertController extends Controller
{
    public function store(Request $request)
    {
        Doktaranturaexpert::create([
            'user_id' => auth()->id(),
            'fish' => auth()->user()->name,
            'tashkilot_id' => $request->tashkilot_id,
            'status' => $request->status,
            'comment' => $request->comment,
            'tash_buyruq_mutanosi' => $request->tash_buyruq_mutanosi,
            'ish_rejasi' => $request->ish_rejasi,
            'kurs_kesimi' => $request->kurs_kesimi,
            'mud_oldin' => $request->mud_oldin,
            'ilmiy_rah_birikisoni' => $request->ilmiy_rah_birikisoni,
            'hujjatlar_kiritish_holati' => $request->hujjatlar_kiritish_holati,
        ]);

        return redirect()->back()->with("status", 'Ma\'lumotlar muvaffaqiyatli qo"shildi.');
    }
}
