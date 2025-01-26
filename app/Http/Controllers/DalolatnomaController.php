<?php

namespace App\Http\Controllers;

use App\Models\Dalolatnoma;
use App\Http\Requests\StoreDalolatnomaRequest;
use App\Http\Requests\UpdateDalolatnomaRequest;
use Illuminate\Support\Facades\Storage;
class DalolatnomaController extends Controller
{

    public function index()
    {
        $dalolatnomas = Dalolatnoma::paginate(25);
        return view('admin.dalolatnoma.index', ['dalolatnomas' => $dalolatnomas]);
    }

    public function dalolatnomas()
    {
        $dalolatnomas = Dalolatnoma::paginate(25);
        return view('admin.dalolatnoma.dalolatnoma', ['dalolatnomas' => $dalolatnomas]);
    }



    public function create()
    {
        return view('admin.dalolatnoma.create');
    }


    public function store(StoreDalolatnomaRequest $request)
    {
        $request->validate([
            'name' => 'required|string|max:600',
            'raqami' => 'required|string|max:20',
            'joyiye_obyekti' => 'required|string|max:600',
            'joyiye_maqsadi' => 'required|string|max:600',
            'joyiye_asos' => 'required|string|max:600',
            'joyiye_tashkilot' => 'required|string|max:600',
            'joyiye_tarmoq' => 'required|string|max:600',
            'asoslovchi_hujjat' => 'required|file|max:2048', // Fayl tekshiruvi
        ]);

        // Faylni yuklash va saqlash
        $filePath = $request->file('asoslovchi_hujjat')->store('asoslovchi_hujjatlar');

        Dalolatnoma::create([
            'tashkilot_id' => auth()->user()->tashkilot_id, // Avtomatik tashkilot ID
            'kafedralar_id' => auth()->user()->kafedralar_id,
            'name' => $request->name,
            'raqami' => $request->raqami,
            'joyiye_obyekti' => $request->joyiye_obyekti,
            'joyiye_maqsadi' => $request->joyiye_maqsadi,
            'joyiye_asos' => $request->joyiye_asos,
            'joyiye_tashkilot' => $request->joyiye_tashkilot,
            'joyiye_tarmoq' => $request->joyiye_tarmoq,
            'asoslovchi_hujjat' => $filePath, // Fayl yo‘li saqlanadi
        ]);

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
        $request->validate([
            'name' => 'required|string|max:600',
            'raqami' => 'required|string|max:20',
            'joyiye_obyekti' => 'required|string|max:600',
            'joyiye_maqsadi' => 'required|string|max:600',
            'joyiye_asos' => 'required|string|max:600',
            'joyiye_tashkilot' => 'required|string|max:600',
            'joyiye_tarmoq' => 'required|string|max:600',
            'asoslovchi_hujjat' => 'nullable|file|max:2048',
        ]);

        // Faylni yuklash (agar yangi fayl yuborilgan bo‘lsa)
        if ($request->hasFile('asoslovchi_hujjat')) {
            // Eski faylni o‘chirish
            if ($dalolatnoma->asoslovchi_hujjat) {
                Storage::delete($dalolatnoma->asoslovchi_hujjat);
            }

            // Yangi faylni saqlash
            $filePath = $request->file('asoslovchi_hujjat')->store('asoslovchi_hujjatlar');
            $dalolatnoma->asoslovchi_hujjat = $filePath;
        }

        $dalolatnoma->update([
            'name' => $request->name,
            'raqami' => $request->raqami,
            'joyiye_obyekti' => $request->joyiye_obyekti,
            'joyiye_maqsadi' => $request->joyiye_maqsadi,
            'joyiye_asos' => $request->joyiye_asos,
            'joyiye_tashkilot' => $request->joyiye_tashkilot,
            'joyiye_tarmoq' => $request->joyiye_tarmoq,
        ]);

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
