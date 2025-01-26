<?php

namespace App\Http\Controllers;

use App\Models\Ilmiymaqolalar;
use App\Http\Requests\StoreIlmiymaqolalarRequest;
use App\Http\Requests\UpdateIlmiymaqolalarRequest;

class IlmiymaqolalarController extends Controller
{

    public function index()
    {
        $ilmiymaqolalars = Ilmiymaqolalar::paginate(25);

        return view('admin.ilmiymaqolalar.index', ['ilmiymaqolalars' => $ilmiymaqolalars]);
    }

    public function ilmiymaqolalars()
    {
        $ilmiymaqolalars = Ilmiymaqolalar::paginate(25);

        return view('admin.ilmiymaqolalar.ilmiymaqolalar', ['ilmiymaqolalars' => $ilmiymaqolalars]);
    }

    public function create()
    {
        return view('admin.ilmiymaqolalar.create');
    }


    public function store(StoreIlmiymaqolalarRequest $request)
    {

        $request->validate([
            'type' => 'required|in:Respublika miqyosidagi jurnallar,Xalqaro miqyosidagi jurnallar',
            'mavzu' => 'required|string',
            'mualliflar_json' => 'required|array',
            'chopq_sana' => 'required|date',
            'jurnal_nomi' => 'required|string',
            'jurnal_soni' => 'required|string',
            'jurnal_issn_raqami' => 'required|string',
            'nashriyot' => 'required|string',
            'annotatsiya' => 'required|string',
            'fan_yunalishi' => 'required|string',
            'url' => 'nullable|url',
            'doi' => 'nullable|url',
        ]);

        // Mualliflarni JSON formatida olish
        $mualliflar = json_encode($request->mualliflar_json);

        // Jurnalni saqlash
        Ilmiymaqolalar::create([
            'tashkilot_id' => auth()->user()->tashkilot_id, // Foydalanuvchining tashkilot_id sini olish
            'kafedralar_id' => auth()->user()->kafedralar_id, // Foydalanuvchining kafedralar_id sini olish
            'type' => $request->type,
            'mavzu' => $request->mavzu,
            'mualliflar_json' => $mualliflar, // Mualliflarni JSON formatida saqlash
            'chopq_sana' => $request->chopq_sana,
            'jurnal_nomi' => $request->jurnal_nomi,
            'jurnal_soni' => $request->jurnal_soni,
            'jurnal_issn_raqami' => $request->jurnal_issn_raqami,
            'nashriyot' => $request->nashriyot,
            'annotatsiya' => $request->annotatsiya,
            'fan_yunalishi' => $request->fan_yunalishi,
            'url' => $request->url,
            'doi' => $request->doi,
        ]);

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

        $request->validate([
            'type' => 'required|in:Respublika miqyosidagi jurnallar,Xalqaro miqyosidagi jurnallar',
            'mavzu' => 'required|string',
            'mualliflar_json' => 'required|array',
            'chopq_sana' => 'required|date',
            'jurnal_nomi' => 'required|string',
            'jurnal_soni' => 'required|string',
            'jurnal_issn_raqami' => 'required|string',
            'nashriyot' => 'required|string',
            'annotatsiya' => 'required|string',
            'fan_yunalishi' => 'required|string',
            'url' => 'nullable|url',
            'doi' => 'nullable|url',
        ]);

        // Mualliflarni JSON formatida olish
        $mualliflar = json_encode($request->mualliflar_json);

        // Jurnalni yangilash
        $ilmiymaqolalar->update([
            'type' => $request->type,
            'mavzu' => $request->mavzu,
            'mualliflar_json' => $mualliflar, // Mualliflarni JSON formatida saqlash
            'chopq_sana' => $request->chopq_sana,
            'jurnal_nomi' => $request->jurnal_nomi,
            'jurnal_soni' => $request->jurnal_soni,
            'jurnal_issn_raqami' => $request->jurnal_issn_raqami,
            'nashriyot' => $request->nashriyot,
            'annotatsiya' => $request->annotatsiya,
            'fan_yunalishi' => $request->fan_yunalishi,
            'url' => $request->url,
            'doi' => $request->doi,
        ]);

        // Saqlangan jurnalni qaytarish yoki xabar
        return redirect()->route('ilmiymaqolalar.index')->with('status', 'Jurnal muvaffaqiyatli yangilandi!');

    }


    public function destroy(Ilmiymaqolalar $ilmiymaqolalar)
    {
        $ilmiymaqolalar->delete();

        return redirect()->route('admin.ilmiymaqolalar.index')->with('status', 'Ilmiymaqolalar deleted successfully');
    }
}
