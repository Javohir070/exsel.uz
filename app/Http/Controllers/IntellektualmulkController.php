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

        $data = $request->validated();
        $mualliflar = json_encode($request->input('mualliflar_json'));
        $data['mualliflar_json'] = $mualliflar;
        $data['tashkilot_id'] = auth()->user()->tashkilot_id;
        $data['kafedralar_id'] = auth()->user()->kafedralar_id;

        // Monografiya yaratish
        Intellektualmulk::create($data);

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
        $data = $request->validated();
        $data['mualliflar_json'] = json_encode($request->input('mualliflar_json'));

        $mualliflar = json_encode($request->mualliflar_json);
        $data['mualliflar_json'] = $mualliflar;

        $intellektualmulk->update($data);

        return redirect()->route('intellektualmulk.index')->with('status', 'Intellektualmulk muvaffaqiyatli yangilandi');
    }


    public function destroy(Intellektualmulk $intellektualmulk)
    {
        $intellektualmulk->delete();

        return redirect()->route('intellektualmulk.index')->with('status', 'Intellektualmulk muvaffaqiyatli o\'chirildi');
    }
}
