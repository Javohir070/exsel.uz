<?php

namespace App\Http\Controllers;

use App\Models\IlmiyLoyiha;
use App\Models\Tekshirivchilar;
use Illuminate\Http\Request;
use App\Exports\TekshirivchilarExport;
use Maatwebsite\Excel\Facades\Excel;

class TekshirivchilarController extends Controller
{
    public function store(Request $request)
    {
        $ilmiyloyiha = IlmiyLoyiha::findOrFail($request->ilmiyloyiha_id);
        Tekshirivchilar::create([
            'user_id' => auth()->id(),
            'tashkilot_id' => $ilmiyloyiha->tashkilot_id,
            'ilmiy_loyiha_id' => $request->ilmiyloyiha_id,
            'fish' => auth()->user()->name,
            "status" => $request->status,
            "comment" => $request->comment,
            'is_active' => 1,
            'kalendar' => $request->kalendar,
            'shart_sharoit_yaratib' => $request->shart_sharoit_yaratib,
            'yakuniy_natijalar' => $request->yakuniy_natijalar,
            'loyiha_ijrochilari' => $request->loyiha_ijrochilari,
        ]);

        return redirect()->back()->with("status", 'Ma\'lumotlar muvaffaqiyatli qo"shildi.');
    }

    public function exportilmiyloyiha()
    {
        $fileName = 'Ilmiyloyiha2024' . now()->format('Y_m_d_H_i_s') . '.xlsx';
        return Excel::download(new TekshirivchilarExport, $fileName);
    }

    public function update(Request $request, Tekshirivchilar $tekshirivchilar)
    {
        $tekshirivchilar->update($request->all());
        return redirect()->back()->with('status', 'Ma\'lumotlar muvaffaqiyatli yangilandi.');
    }

    public function destroy(Tekshirivchilar $tekshirivchilar)
    {
        $tekshirivchilar->delete();
        return redirect()->back()->with('status', 'Dalolatnoma muvaffaqiyatli o‘chirildi.');
    }
}
