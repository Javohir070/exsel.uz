<?php

namespace App\Http\Controllers;

use App\Imports\StajirovkaImport;
use App\Models\Region;
use App\Models\Stajirovka;
use App\Http\Requests\StoreStajirovkaRequest;
use App\Http\Requests\UpdateStajirovkaRequest;
use App\Models\Stajirovkaexpert;
use App\Models\Tashkilot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class StajirovkaController extends Controller
{

    public function index()
    {
        $stajirovkas = Stajirovka::where('tashkilot_id', auth()->user()->tashkilot_id)->paginate(20);

        return view('admin.stajirovka.index', ['stajirovkas' => $stajirovkas]);
    }

    public function stajirovkalar()
    {

        $stajirovkas = Stajirovka::count();
        $tashkilotlar = Tashkilot::orderBy('name')->where('stajirovka_is',1)->paginate(30);
        $tashkilots = Tashkilot::orderBy('name')->where('stajirovka_is',1)->count();
        $querysearch = null;
        $regions = Region::orderBy('order')->get();
        $stajirovka_count = Stajirovka::count();
        $stajirovka_expert = Stajirovkaexpert::count();
        return view('admin.stajirovka.viloyat', ['tashkilots' => $tashkilots, 'stajirovka_count' => $stajirovka_count, 'stajirovka_expert' => $stajirovka_expert, 'regions' => $regions, 'querysearch' => $querysearch]);
    }

    public function tashkilot_turi_stajiroka($id)
    {
        $tashkilotlarQuery = Tashkilot::where('stajirovka_is',1)->where('region_id', '=', $id)->with(['stajirovkalar'])
        ->get();

        // Turga qarab guruhlash
        $groups = [
            'otm' => $tashkilotlarQuery->where('tashkilot_turi', 'otm'),
            'itm' => $tashkilotlarQuery->where('tashkilot_turi', 'itm'),
            'other' => $tashkilotlarQuery->where('tashkilot_turi','boshqa'),
        ];

        $results = [];

        foreach ($groups as $key => $group) {
            $results[$key] = [
                'stajirovkalar' => $group->pluck('stajirovkalar')->flatten()->count(),
            ];
        }
        $regions = Region::findOrFail( $id );

        $id = $tashkilotlarQuery->pluck('id');
        $tashkilots = $tashkilotlarQuery->count();
        $stajirovka_count = Stajirovka::whereIn('tashkilot_id', $id)->count();
        $stajirovka_expert = Stajirovkaexpert::whereIn('tashkilot_id', $id)->count();

        return view('admin.stajirovka.tashkilot_turi',['results' => $results, 'regions'=>$regions, 'tashkilots'=>$tashkilots, 'stajirovka_count'=>$stajirovka_count, 'stajirovka_expert'=>$stajirovka_expert]);
    }

    public function search_stajirovka(Request $request)
    {

        $querysearch = $request->input('query');
        $id = $request->input('id');
        $type = $request->input('type');
        if (ctype_digit($id)) {
            $tashkilotlar = Tashkilot::orderBy('name')->where('stajirovka_is', 1)
                                ->where('region_id', '=', $id)
                                ->where('tashkilot_turi', '=', $type)
                                ->paginate(50);
            $tashkilotlars = Tashkilot::orderBy('name')->where('stajirovka_is', 1)
                                ->where('region_id', '=', $id)
                                ->where('tashkilot_turi', '=', $type)
                                ->get();
            $tash_count = $tashkilotlar->total();
           } else {
            $tashkilotlar = Tashkilot::orderBy('name')
                                    ->where('stajirovka_is', 1)
                                    ->where('name', 'like', '%' . $querysearch . '%')
                                    ->paginate(50);
            $tashkilotlars = Tashkilot::where('status', 1)
                                    ->where('name', 'like', '%' . $querysearch . '%')
                                    ->get();
            $tash_count = $tashkilotlar->total();
        }

        $id = $tashkilotlars->pluck('id');

        $stajirovkas = Stajirovka::whereIn('tashkilot_id', $id)->count();
        $regions = Region::orderBy('order')->get();

        return view('admin.stajirovka.stajirovkalar', ['stajirovkas' => $stajirovkas, 'tashkilotlar' => $tashkilotlar, 'regions'=>$regions, 'tash_count'=>$tash_count, 'querysearch' => $querysearch]);
    }

    public function stajirov($id)
    {

        $stajirovkas = Stajirovka::where('tashkilot_id', '=',$id)->paginate(20);
        $tashkilot = Tashkilot::findOrFail($id);
        return view('admin.stajirovka.stajirovka', ['stajirovkas' => $stajirovkas, 'tashkilot'=>$tashkilot]);
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
            'yunalishi' => $request->yunalishi,
            'holati' => $request->holati,
            'yil' => $request->yil,
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
        $data = $request->only(['fish', 'lavozim', 'yunalishi','holati', 'yil',]); // Faqat oddiy ma'lumotlarni olish

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

    public function stajirovka_import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,csv',
        ]);

        Excel::import(new StajirovkaImport, $request->file('file'));

        return back()->with('status', 'Fayl muvaffaqiyatli yuklandi!');
    }

}
