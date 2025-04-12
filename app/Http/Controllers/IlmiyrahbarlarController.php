<?php

namespace App\Http\Controllers;

use App\Models\Ilmiyrahbarlar;
use Illuminate\Http\Request;

class IlmiyrahbarlarController extends Controller
{
    public function show(Ilmiyrahbarlar $ilmiyrahbarlar)
    {
        return response()->json($ilmiyrahbarlar);
    }

    public function update(Request $request, $id)
    {
        $ilmiyrahbarlar = Ilmiyrahbarlar::find($id);
        $ilmiyrahbarlar->kollegial_organ_qarori = $request->kollegial_organ_qarori;
        $ilmiyrahbarlar->meyoridan_ortiq = $request->meyoridan_ortiq;
        $ilmiyrahbarlar->tash_meyoridan_ortiq = $request->tash_meyoridan_ortiq;
        $ilmiyrahbarlar->status = 1;

        $ilmiyrahbarlar->save();

        return redirect()->back()->with('status','Ma\'lumotlar muvaffaqiyatli tahrirlandi.');
    }
}
