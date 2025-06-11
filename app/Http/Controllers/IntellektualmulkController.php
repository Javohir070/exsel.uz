<?php

namespace App\Http\Controllers;

use App\Exports\IntellektualmulkExport;
use App\Models\Intellektualmulk;
use App\Http\Requests\StoreIntellektualmulkRequest;
use App\Http\Requests\UpdateIntellektualmulkRequest;
use Maatwebsite\Excel\Facades\Excel;

class IntellektualmulkController extends Controller
{

    public function index()
    {
        $intellektualmulks = Intellektualmulk::where('tashkilot_id', auth()->user()->tashkilot_id)->paginate(25);
        return view('admin.intellektualmulk.index', ['intellektualmulks' => $intellektualmulks]);
    }

    public function intellektualmulks()
    {
        $intellektualmulks = Intellektualmulk::paginate(25);
        return view('admin.intellektualmulk.intellektualmulk', ['intellektualmulks' => $intellektualmulks]);
    }

    public function export_intellektualmulks()
    {
        return Excel::download(new IntellektualmulkExport, 'Intellektualmulk.xlsx');
    }


    public function create()
    {
        return view('admin.intellektualmulk.create');
    }


    public function store(StoreIntellektualmulkRequest $request)
    {

        $request->validate([
            'mavzu' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'nashr_sana' => 'required|date',
            'soni' => 'required|integer',
            'annotatsiya' => 'required|string',
            'fan_yunalishi' => 'required|string|max:255',
            'mualliflar_json' => 'required|array', // JSON maydon
        ]);
        $mualliflar = $request->input('mualliflar_json');
        // Monografiya yaratish
        Intellektualmulk::create([
            'tashkilot_id' => auth()->user()->tashkilot_id, // Avtomatik tashkilot ID
            'kafedralar_id' => auth()->user()->kafedralar_id, // Avtomatik kafedra ID
            'mavzu' => $request->mavzu,
            'type' => $request->type,
            'nashr_sana' => $request->nashr_sana,
            'soni' => $request->soni,
            'annotatsiya' => $request->annotatsiya,
            'fan_yunalishi' => $request->fan_yunalishi,
            'mualliflar_json' => json_encode($mualliflar), // JSON maydon
        ]);

        return redirect()->route('intellektualmulk.index')->with('status', 'Intellektualmulk muvaffaqiyatli saqlandi');

    }


    public function show(Intellektualmulk $intellektualmulk)
    {
        return view('admin.intellektualmulk.show', ['intellektualmulk' => $intellektualmulk]);
    }


    public function edit(Intellektualmulk $intellektualmulk)
    {
        return view('admin.intellektualmulk.edit', ['intellektualmulk' => $intellektualmulk]);
    }


    public function update(UpdateIntellektualmulkRequest $request, Intellektualmulk $intellektualmulk)
    {
        $request->validate([
            'mavzu' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'nashr_sana' => 'required|date',
            'soni' => 'required|integer',
            'annotatsiya' => 'required|string',
            'fan_yunalishi' => 'required|string|max:255',
            'mualliflar_json' => 'required|array', // JSON maydon
            'mualliflar_json.*' => 'string', // JSON maydon ichidagi har bir element string bo'lishi kerak
        ]);


        $intellektualmulk->update([
            'mavzu' => $request->mavzu,
            'type' => $request->type,
            'nashr_sana' => $request->nashr_sana,
            'soni' => $request->soni,
            'annotatsiya' => $request->annotatsiya,
            'fan_yunalishi' => $request->fan_yunalishi,
            'mualliflar_json' => json_encode($request->mualliflar_json), // JSON maydon
        ]);

        return redirect()->route('intellektualmulk.index')->with('status', 'Intellektualmulk muvaffaqiyatli yangilandi');

    }


    public function destroy(Intellektualmulk $intellektualmulk)
    {
        $intellektualmulk->delete();

        return redirect()->route('intellektualmulk.index')->with('status', 'Intellektualmulk muvaffaqiyatli o\'chirildi');

    }
}
