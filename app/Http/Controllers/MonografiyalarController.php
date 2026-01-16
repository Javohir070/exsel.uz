<?php

namespace App\Http\Controllers;


use App\Exports\MonografiyaExport;
use App\Models\Monografiyalar;
use App\Http\Requests\StoreMonografiyalarRequest;
use App\Http\Requests\UpdateMonografiyalarRequest;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class MonografiyalarController extends Controller
{

    public function index()
    {
        $monografiyalars = Monografiyalar::where('tashkilot_id', auth()->user()->tashkilot_id)->paginate(25);

        return view('admin.monografiya.index', ['monografiyalars' => $monografiyalars]);
    }

    public function export_monografiyalars()
    {
        return Excel::download(new MonografiyaExport, 'Monografiyalar.xlsx');
    }


    public function monografiyalars()
    {
        $monografiyalars = Monografiyalar::paginate(25);

        return view('admin.monografiya.monografiya', ['monografiyalars' => $monografiyalars]);
    }


    public function create()
    {
        return view('admin.monografiya.create');
    }


    public function store(StoreMonografiyalarRequest $request)
    {
        $data = $request->validated();

        $data['mualliflar_json'] = json_encode($request->input('mualliflar_json'));
        $data['tashkilot_id'] = auth()->user()->tashkilot_id;
        $data['kafedralar_id'] = auth()->user()->kafedralar_id ?? null;

        // Faylni yuklash va saqlash
        $filePath = $request->file('asoslovchi_hujjat')->store('asoslovchi_hujjatlar', 'public'); // 'public' diskka yuklanadi
        $data['asoslovchi_hujjat'] = $filePath;
        // Ma'lumotlarni saqlash

        Monografiyalar::create($data);

        return redirect()->route('monografiyalar.index')->with('status', 'Monografiya muvaffaqiyatli qo‘shildi.');
    }


    public function show(Monografiyalar $monografiyalar)
    {
        return view('admin.monografiya.show', ['monografiyalar' => $monografiyalar]);
    }


    public function edit(Monografiyalar $monografiyalar)
    {
        return view('admin.monografiya.edit', ['monografiyalar' => $monografiyalar]);
    }


    public function update(UpdateMonografiyalarRequest $request, Monografiyalar $monografiyalar)
    {
        $data = $request->validated();

        $data['mualliflar_json'] = json_encode($request->input('mualliflar_json'));


        // Faylni yangilash (agar yangi fayl kiritilgan bo‘lsa)
        if ($request->hasFile('asoslovchi_hujjat')) {

            // Eskisini o'chirish (agar kerak bo'lsa)
            if ($monografiyalar->asoslovchi_hujjat) {
                \Storage::disk('public')->delete($monografiyalar->asoslovchi_hujjat);
            }

            $filePath = $request->file('asoslovchi_hujjat')->store('asoslovchi_hujjatlar', 'public');
            $data['asoslovchi_hujjat'] = $filePath;
        }

        // Ma'lumotlarni yangilash
        $monografiyalar->update($data);

        return redirect()->route('monografiyalar.index')->with('status', 'Monografiya muvaffaqiyatli yangilandi.');
    }


    public function destroy(Monografiyalar $monografiyalar)
    {
        if ($monografiyalar->asoslovchi_hujjat) {
            \Storage::disk('public')->delete($monografiyalar->asoslovchi_hujjat);
        }

        $monografiyalar->delete();

        return redirect()->route('monografiyalar.index')->with('status', 'Monografiya muvaffaqiyatli o‘chirildi.');
    }
}
