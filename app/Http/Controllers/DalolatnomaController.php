<?php

namespace App\Http\Controllers;

use App\Exports\DalolatnomaExport;
use App\Models\Dalolatnoma;
use App\Http\Requests\StoreDalolatnomaRequest;
use App\Http\Requests\UpdateDalolatnomaRequest;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
class DalolatnomaController extends Controller
{

    public function index()
    {
        $dalolatnomas = Dalolatnoma::where('tashkilot_id', auth()->user()->tashkilot_id)->paginate(25);
        return view('admin.dalolatnoma.index', ['dalolatnomas' => $dalolatnomas]);
    }

    public function dalolatnomas()
    {
        $dalolatnomas = Dalolatnoma::paginate(25);
        return view('admin.dalolatnoma.dalolatnoma', ['dalolatnomas' => $dalolatnomas]);
    }

    public function export_dalolatnomas()
    {
        return Excel::download(new DalolatnomaExport, 'Dalolatnomalar.xlsx');
    }


    public function create()
    {
        return view('admin.dalolatnoma.create');
    }


    public function store(StoreDalolatnomaRequest $request)
    {
        $data = $request->validated();

        // Faylni yuklash va saqlash
        $data['asoslovchi_hujjat'] = $request
            ->file('asoslovchi_hujjat')
            ->store('asoslovchi_hujjatlar');
        $data['tashkilot_id'] = auth()->user()->tashkilot_id;
        $data['kafedralar_id'] = auth()->user()->kafedralar_id;

        Dalolatnoma::create($data);

        return redirect()->route('dalolatnoma.index')->with('status', 'Yozuv muvaffaqiyatli qo‘shildi.');
    }


    public function show(Dalolatnoma $dalolatnoma)
    {
        return view('admin.dalolatnoma.show', ['dalolatnoma' => $dalolatnoma]);
    }


    public function edit(Dalolatnoma $dalolatnoma)
    {
        return view('admin.dalolatnoma.edit', ['dalolatnoma' => $dalolatnoma]);
    }


    public function update(UpdateDalolatnomaRequest $request, Dalolatnoma $dalolatnoma)
    {
        $data = $request->validated();

        // Faylni yuklash (agar yangi fayl yuborilgan bo‘lsa)
        if ($request->hasFile('asoslovchi_hujjat')) {
            // Eski faylni o‘chirish
            if ($dalolatnoma->asoslovchi_hujjat) {
                Storage::delete($dalolatnoma->asoslovchi_hujjat);
            }

            // Yangi faylni saqlash
            $data['asoslovchi_hujjat'] = $request
                ->file('asoslovchi_hujjat')
                ->store('asoslovchi_hujjatlar');
        }

        $dalolatnoma->update(attributes: $data);

        return redirect()->route('dalolatnoma.index')->with('status', 'Yozuv muvaffaqiyatli yangilandi.');
    }


    public function destroy(Dalolatnoma $dalolatnoma)
    {
        // Faylni o'chirish (agar mavjud bo'lsa)
        if ($dalolatnoma->file_path) {
            Storage::delete($dalolatnoma->file_path);
        }

        // Dalolatnomani o'chirish
        $dalolatnoma->delete();

        return redirect()->route('dalolatnoma.index')->with('status', 'Dalolatnoma muvaffaqiyatli o‘chirildi.');
    }

}
