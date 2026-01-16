<?php

namespace App\Http\Controllers;

use App\Exports\IlmiymaqolalarExport;
use App\Models\Ilmiymaqolalar;
use App\Http\Requests\StoreIlmiymaqolalarRequest;
use App\Http\Requests\UpdateIlmiymaqolalarRequest;
use Maatwebsite\Excel\Facades\Excel;

class IlmiymaqolalarController extends Controller
{

    public function index()
    {
        $ilmiymaqolalars = Ilmiymaqolalar::where('tashkilot_id', auth()->user()->tashkilot_id)->paginate(25);

        return view('admin.ilmiymaqolalar.index', ['ilmiymaqolalars' => $ilmiymaqolalars]);
    }

    public function ilmiymaqolalars()
    {
        $ilmiymaqolalars = Ilmiymaqolalar::paginate(25);

        return view('admin.ilmiymaqolalar.ilmiymaqolalar', ['ilmiymaqolalars' => $ilmiymaqolalars]);
    }

    public function export_ilmiymaqolalars()
    {
        return Excel::download(new IlmiymaqolalarExport, 'Ilmiymaqolalar.xlsx');
    }

    public function create()
    {
        return view('admin.ilmiymaqolalar.create');
    }


    public function store(StoreIlmiymaqolalarRequest $request)
    {

        $data = $request->validated();
        // Mualliflarni JSON formatida olish
        $mualliflar = json_encode($request->mualliflar_json);
        $data['mualliflar_json'] = $mualliflar;
        $data['tashkilot_id'] = auth()->user()->tashkilot_id; 
        $data['kafedralar_id'] = auth()->user()->kafedralar_id;

        // Jurnalni saqlash
        Ilmiymaqolalar::create($data);

        // Saqlangan jurnalni qaytarish yoki xabar
        return redirect()->route('ilmiymaqolalar.index')->with('status', 'Yangi jurnal muvaffaqiyatli saqlandi!');
    }


    public function show(Ilmiymaqolalar $ilmiymaqolalar)
    {
        return view('admin.ilmiymaqolalar.show', ['ilmiymaqolalar' => $ilmiymaqolalar]);
    }


    public function edit(Ilmiymaqolalar $ilmiymaqolalar)
    {
        return view('admin.ilmiymaqolalar.edit', ['ilmiymaqolalar' => $ilmiymaqolalar]);
    }


    public function update(UpdateIlmiymaqolalarRequest $request, Ilmiymaqolalar $ilmiymaqolalar)
    {

        $data = $request->validated();

        // Mualliflarni JSON formatida olish
        $mualliflar = json_encode($request->mualliflar_json);
        $data['mualliflar_json'] = $mualliflar;

        // Jurnalni yangilash
        $ilmiymaqolalar->update($data);

        // Saqlangan jurnalni qaytarish yoki xabar
        return redirect()->route('ilmiymaqolalar.index')->with('status', 'Jurnal muvaffaqiyatli yangilandi!');
    }


    public function destroy(Ilmiymaqolalar $ilmiymaqolalar)
    {
        $ilmiymaqolalar->delete();

        return redirect()->back()->with('status', 'Ilmiymaqolalar deleted successfully');
    }
}
