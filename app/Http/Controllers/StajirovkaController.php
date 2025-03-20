<?php

namespace App\Http\Controllers;

use App\Models\Stajirovka;
use App\Http\Requests\StoreStajirovkaRequest;
use App\Http\Requests\UpdateStajirovkaRequest;
use App\Models\Stajirovkaexpert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StajirovkaController extends Controller
{

    public function index()
    {
        $stajirovkas = Stajirovka::where('tashkilot_id', auth()->user()->tashkilot_id)->paginate(20);

        return view('admin.stajirovka.index', ['stajirovkas' => $stajirovkas]);
    }

    public function stajirovkalar()
    {

        $stajirovkas = Stajirovka::paginate(20);
        return view('admin.stajirovka.stajirovkalar', ['stajirovkas' => $stajirovkas]);
    }

    public function stajirov(Request $request)
    {

        $stajirovkas = Stajirovka::where('tashkilot_id', $request->id)->paginate(20);
        return view('admin.stajirovka.stajirovkalar', ['stajirovkas' => $stajirovkas]);
    }



    public function create()
    {
        return view('admin.stajirovka.create');
    }


    public function store(StoreStajirovkaRequest $request)
    {
        if ($request->hasFile('ilmiy_hisobot')) {
            $name_ilmiy_hisobot = time() . $request->file('ilmiy_hisobot')->getClientOriginalName();
            $path_ilmiy_hisobot = $request->file('ilmiy_hisobot')->storeAs('Stajirovka-file', $name_ilmiy_hisobot);
        }

        if ($request->hasFile('egallangan_bilim')) {
            $name_egallangan_bilim = time() . $request->file('egallangan_bilim')->getClientOriginalName();
            $path_egallangan_bilim = $request->file('egallangan_bilim')->storeAs('Stajirovka-file', $name_egallangan_bilim);
        }

        if ($request->hasFile('ishlar_natijalari')) {
            $name_ishlar_natijalari = time() . $request->file('ishlar_natijalari')->getClientOriginalName();
            $path_ishlar_natijalari = $request->file('ishlar_natijalari')->storeAs('Stajirovka-file', $name_ishlar_natijalari);
        }

        if ($request->hasFile('xalqarotan_jur_nashr')) {
            $name_xalqarotan_jur_nashr = time() . $request->file('xalqarotan_jur_nashr')->getClientOriginalName();
            $path_xalqarotan_jur_nashr = $request->file('xalqarotan_jur_nashr')->storeAs('Stajirovka-file', $name_xalqarotan_jur_nashr);
        }

        if ($request->hasFile('biryil_davomida')) {
            $name_biryil_davomida = time() . $request->file('biryil_davomida')->getClientOriginalName();
            $path_biryil_davomida = $request->file('biryil_davomida')->storeAs('Stajirovka-file', $name_biryil_davomida);
        }


        Stajirovka::create([
            'tashkilot_id' => auth()->user()->tashkilot_id,
            'user_id' => auth()->user()->id,
            'fish' => $request->fish,
            'lavozim' => $request->lavozim,
            'ilmiy_hisobot' => $path_ilmiy_hisobot,
            'egallangan_bilim' => $path_egallangan_bilim,
            'ishlar_natijalari' => $path_ishlar_natijalari,
            'xalqarotan_jur_nashr' => $path_xalqarotan_jur_nashr,
            'biryil_davomida' => $path_biryil_davomida,
        ]);

        return redirect()->route('stajirovka.index')->with('status', "Ma\'lumotlar muvaffaqiyatli qo'shildi.");
    }


    public function show(Stajirovka $stajirovka)
    {
        $stajirovkaexpert = Stajirovkaexpert::where('stajirovka_id', $stajirovka->id)->get();
        return view('admin.stajirovka.show', ['stajirovka' => $stajirovka, 'stajirovkaexpert' => $stajirovkaexpert]);
    }


    public function edit(Stajirovka $stajirovka)
    {
        return view('admin.stajirovka.edit', ['stajirovka' => $stajirovka]);
    }


    public function update(UpdateStajirovkaRequest $request, Stajirovka $stajirovka)
    {
        $data = $request->only(['fish', 'lavozim']); // Faqat oddiy ma'lumotlarni olish

        // Fayllar saqlanadigan papka
        $folder = 'Stajirovka-file';

        // Fayllarni yangilash va eskilarni o‘chirish
        $fileFields = ['ilmiy_hisobot', 'egallangan_bilim', 'ishlar_natijalari', 'xalqarotan_jur_nashr', 'biryil_davomida'];

        foreach ($fileFields as $field) {
            if ($request->hasFile($field)) {
                // Eski faylni o‘chirish
                if ($stajirovka->$field) {
                    Storage::delete($stajirovka->$field);
                }

                // Yangi faylni saqlash
                $fileName = time() . '_' . $request->file($field)->getClientOriginalName();
                $path = $request->file($field)->storeAs($folder, $fileName, 'public');

                $data[$field] = $path; // Yangilangan fayl yo‘lini yozish
            }
        }

        // Yangilanishni amalga oshirish
        $data['tashkilot_id'] = auth()->user()->tashkilot_id;
        $data['user_id'] = auth()->user()->id;

        $stajirovka->update($data);

        return redirect()->route('stajirovka.index')->with('status', "Ma'lumotlar muvaffaqiyatli tahrirlandi.");
    }



    public function destroy(Stajirovka $stajirovka)
    {
        // Fayl maydonlarini aniqlash
        $fileFields = ['ilmiy_hisobot', 'egallangan_bilim', 'ishlar_natijalari', 'xalqarotan_jur_nashr', 'biryil_davomida'];

        // Fayllarni o‘chirish
        foreach ($fileFields as $field) {
            if ($stajirovka->$field) {
                Storage::delete($stajirovka->$field);
            }
        }

        // Bazadan yozuvni o‘chirish
        $stajirovka->delete();

        return redirect()->route('stajirovka.index')->with('status', "Ma'lumotlar muvaffaqiyatli o‘chirildi.");
    }

}
