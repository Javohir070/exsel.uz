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
        // Validatsiya
        $request->validate([
            'name' => 'required|string|max:600',
            'nashr_yili' => 'required|integer',
            'chop_etil_nashriyot' => 'required|string|max:600',
            'til' => 'required|string|max:50',
            'fan_yunalishi' => 'required|string|max:600',
            'asoslovchi_hujjat' => 'required|file|max:2048', // Fayl tekshiruvi
            'kbk' => 'nullable|string|max:50',
            'isbn' => 'nullable|string|max:50',
            'mualliflar_json' => 'required|array', // JSON uchun array tipda keladi
        ]);

        $mualliflar = $request->input('mualliflar_json');

        // Faylni yuklash va saqlash
        $filePath = $request->file('asoslovchi_hujjat')->store('asoslovchi_hujjatlar', 'public'); // 'public' diskka yuklanadi

        // Ma'lumotlarni saqlash
        Monografiyalar::create([
            'tashkilot_id' => auth()->user()->tashkilot_id, // Avtomatik tashkilot ID
            'kafedralar_id' => auth()->user()->kafedralar_id,  // Avtomatik kafedra ID
            'name' => $request->name,
            'nashr_yili' => $request->nashr_yili,
            'chop_etil_nashriyot' => $request->chop_etil_nashriyot,
            'til' => $request->til,
            'fan_yunalishi' => $request->fan_yunalishi,
            'asoslovchi_hujjat' => $filePath, // Fayl yo'li
            'kbk' => $request->kbk,
            'isbn' => $request->isbn,
            'mualliflar_json' => json_encode($mualliflar), // JSON formatga o'girib saqlash
        ]);

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
        $request->validate([
            'name' => 'required|string|max:600',
            'nashr_yili' => 'required|integer',
            'chop_etil_nashriyot' => 'required|string|max:600',
            'til' => 'required|string|max:50',
            'fan_yunalishi' => 'required|string|max:600',
            'asoslovchi_hujjat' => 'nullable|file|max:2048',
            'kbk' => 'nullable|string|max:50',
            'isbn' => 'nullable|string|max:50',
            'mualliflar_json' => 'required|array',
        ]);

        $mualliflar = $request->input('mualliflar_json');


        // Faylni yangilash (agar yangi fayl kiritilgan bo‘lsa)
        if ($request->hasFile('asoslovchi_hujjat')) {
            $filePath = $request->file('asoslovchi_hujjat')->store('asoslovchi_hujjatlar', 'public');

            // Eskisini o'chirish (agar kerak bo'lsa)
            if ($monografiyalar->asoslovchi_hujjat) {
                \Storage::disk('public')->delete($monografiyalar->asoslovchi_hujjat);
            }

            $monografiyalar->asoslovchi_hujjat = $filePath;
        }

        // Ma'lumotlarni yangilash
        $monografiyalar->update([
            'name' => $request->name,
            'nashr_yili' => $request->nashr_yili,
            'chop_etil_nashriyot' => $request->chop_etil_nashriyot,
            'til' => $request->til,
            'fan_yunalishi' => $request->fan_yunalishi,
            'kbk' => $request->kbk,
            'isbn' => $request->isbn,
            'mualliflar_json' => json_encode($mualliflar),
        ]);

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
