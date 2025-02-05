<?php

namespace App\Http\Controllers;

use App\Models\Tekshirivchilar;
use Illuminate\Http\Request;
use App\Exports\TekshirivchilarExport;
use Maatwebsite\Excel\Facades\Excel;

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

    public function exportilmiyloyiha()
    {
        $fileName = 'Ilmiyloyiha2024' . now()->format('Y_m_d_H_i_s') . '.xlsx';
        return Excel::download(new TekshirivchilarExport, $fileName);
    }
}
