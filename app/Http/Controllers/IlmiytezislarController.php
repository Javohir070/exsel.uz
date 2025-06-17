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

        $request->validate([
            'type' => 'required|string',
            'mavzu' => 'required|string',
            'mualliflar_json' => 'required|array',
            'chopq_sana' => 'required|date',
            'kon_full_nomi' => 'required|string',
            'kon_qisqa_nomi' => 'required|string',
            'soni' => 'required|string',
            'nashriyot' => 'required|string',
            'annotatsiya' => 'required|string',
            'fan_yunalishi' => 'required|string',
            'url' => 'nullable|url',
            'doi' => 'nullable|url',
        ]);

        // Mualliflarni JSON formatida olish
        $mualliflar = json_encode($request->mualliflar_json);

        // Jurnalni saqlash
        Ilmiytezislar::create([
            'tashkilot_id' => auth()->user()->tashkilot_id, // Foydalanuvchining tashkilot_id sini olish
            'kafedralar_id' => auth()->user()->kafedralar_id ?? null, // Foydalanuvchining kafedralar_id sini olish
            'type' => $request->type,
            'mavzu' => $request->mavzu,
            'mualliflar_json' => $mualliflar, // Mualliflarni JSON formatida saqlash
            'chopq_sana' => $request->chopq_sana,
            'kon_full_nomi' => $request->kon_full_nomi,
            'kon_qisqa_nomi' => $request->kon_qisqa_nomi,
            'soni' => $request->soni,
            'nashriyot' => $request->nashriyot,
            'annotatsiya' => $request->annotatsiya,
            'fan_yunalishi' => $request->fan_yunalishi,
            'url' => $request->url,
            'doi' => $request->doi,
        ]);

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

        $request->validate([
            'type' => 'required|string',
            'mavzu' => 'required|string',
            'mualliflar_json' => 'required|array',
            'chopq_sana' => 'required|date',
            'kon_full_nomi' => 'required|string',
            'kon_qisqa_nomi' => 'required|string',
            'soni' => 'required|string',
            'nashriyot' => 'required|string',
            'annotatsiya' => 'required|string',
            'fan_yunalishi' => 'required|string',
            'url' => 'nullable|url',
            'doi' => 'nullable|url',
        ]);

        // Mualliflarni JSON formatida olish
        $mualliflar = json_encode($request->mualliflar_json);

        // Jurnalni yangilash
        $ilmiytezislar->update([
            'type' => $request->type,
            'mavzu' => $request->mavzu,
            'mualliflar_json' => $mualliflar, // Mualliflarni JSON formatida saqlash
            'chopq_sana' => $request->chopq_sana,
            'kon_full_nomi' => $request->kon_full_nomi,
            'kon_qisqa_nomi' => $request->kon_qisqa_nomi,
            'soni' => $request->soni,
            'nashriyot' => $request->nashriyot,
            'annotatsiya' => $request->annotatsiya,
            'fan_yunalishi' => $request->fan_yunalishi,
            'url' => $request->url,
            'doi' => $request->doi,
        ]);

        // Saqlangan jurnalni qaytarish yoki xabar
        return redirect()->route('ilmiytezislar.index')->with('status', 'Jurnal muvaffaqiyatli yangilandi!');

    }


    public function destroy(Ilmiytezislar $ilmiytezislar)
    {
        $ilmiytezislar->delete();

        return redirect()->route('ilmiytezislar.index')->with('status', 'Ilmiytezislar deleted successfully');
    }

}
