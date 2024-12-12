<?php

namespace App\Http\Controllers;

use App\Models\Tekshirivchilar;
use Illuminate\Http\Request;

class TekshirivchilarController extends Controller
{
    public function store(Request $request)
    {
        Tekshirivchilar::create([
            'user_id' => auth()->id(),
            'ilmiy_loyiha_id' => $request->ilmiyloyiha_id,
            'fish' => auth()->user()->name,
            "status" => $request->status,
            "comment" => $request->comment,
        ]);
       
        return redirect()->back()->with("status", 'Ma\'lumotlar muvaffaqiyatli qo"shildi.');
    }
}
