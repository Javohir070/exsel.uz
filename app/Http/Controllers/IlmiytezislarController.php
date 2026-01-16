<?php

namespace App\Http\Controllers;

use App\Exports\IlmiytezislarExport;
use App\Models\Ilmiytezislar;
use App\Http\Requests\StoreIlmiytezislarRequest;
use App\Http\Requests\UpdateIlmiytezislarRequest;
use Maatwebsite\Excel\Facades\Excel;

class IlmiytezislarController extends Controller
{
    public function index()
    {
        $ilmiytezislars = Ilmiytezislar::where('tashkilot_id', auth()->user()->tashkilot_id)->paginate(25);

        return view('admin.ilmiytezislar.index', ['ilmiytezislars' => $ilmiytezislars]);
    }

    public function ilmiytezislars()
    {
        $ilmiytezislars = Ilmiytezislar::paginate(25);

        return view('admin.ilmiytezislar.ilmiytezislar', ['ilmiytezislars' => $ilmiytezislars]);
    }

    public function export_ilmiytezislars()
    {
        return Excel::download(new IlmiytezislarExport, 'Ilmiytezislar.xlsx');
    }
    public function create()
    {
        return view('admin.ilmiytezislar.create');
    }


    public function store(StoreIlmiytezislarRequest $request)
    {
        $data = $request->validated();

        // Mualliflarni JSON formatida olish
        $mualliflar = json_encode($request->mualliflar_json);
        $data['mualliflar_json'] = $mualliflar;
        $data['tashkilot_id'] = auth()->user()->tashkilot_id;
        $data['kafedralar_id'] = auth()->user()->kafedralar_id ?? null;

        // Jurnalni saqlash
        Ilmiytezislar::create($data);

        // Saqlangan jurnalni qaytarish yoki xabar
        return redirect()->route('ilmiytezislar.index')->with('status', 'Yangi jurnal muvaffaqiyatli saqlandi!');
    }


    public function show(Ilmiytezislar $ilmiytezislar)
    {
        return view('admin.ilmiytezislar.show', ['ilmiytezislar' => $ilmiytezislar]);
    }


    public function edit(Ilmiytezislar $ilmiytezislar)
    {
        return view('admin.ilmiytezislar.edit', ['ilmiytezislar' => $ilmiytezislar]);
    }


    public function update(UpdateIlmiytezislarRequest $request, Ilmiytezislar $ilmiytezislar)
    {

        $data = $request->validated();

        // Mualliflarni JSON formatida olish
        $mualliflar = json_encode($request->mualliflar_json);
        $data['mualliflar_json'] = $mualliflar;

        // Jurnalni yangilash
        $ilmiytezislar->update($data);

        // Saqlangan jurnalni qaytarish yoki xabar
        return redirect()->route('ilmiytezislar.index')->with('status', 'Jurnal muvaffaqiyatli yangilandi!');

    }


    public function destroy(Ilmiytezislar $ilmiytezislar)
    {
        $ilmiytezislar->delete();

        return redirect()->route('ilmiytezislar.index')->with('status', 'Ilmiytezislar deleted successfully');
    }

}
