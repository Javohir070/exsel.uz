<?php

namespace App\Http\Controllers;

use App\Exports\StajirovkalarToMonitoringExport;
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
        $stajirovkas = Stajirovka::where('tashkilot_id', auth()->user()->tashkilot_id)->where('quarter', 2)->paginate(20);

        return view('admin.stajirovka.index', ['stajirovkas' => $stajirovkas]);
    }

    public function stajirovkalar()
    {
        $querysearch = null;
        if ((auth()->user()->region_id != null)) {
            $regions = Region::where('id', "=", auth()->user()->region_id)->get();
            foreach ($regions as $region) {
                $tashkilots = $region->tashkilots()
                    ->where('stajirovka_is', 1)
                    ->count();
            }
            $region_id = Region::where('id', auth()->user()->region_id)->first();
            $id = $region_id->tashkilots()->pluck('id');
            $stajirovka_count = Stajirovka::whereIn('tashkilot_id', $id)->where('quarter', 2)->count();
            $stajirovka_expert = Stajirovkaexpert::whereIn('tashkilot_id', $id)->where('quarter', 2)->count();
        } else {
            $regions = Region::orderBy('order')->get();
            $tashkilots = Tashkilot::orderBy('name')->where('stajirovka_is', 1)->count();
            $stajirovka_count = Stajirovka::where('quarter', 2)->count();
            $stajirovka_expert = Stajirovkaexpert::where('quarter', 2)->count();
        }

        $stajirovkas_count = Stajirovka::where('quarter', 2)->count();
        return view('admin.stajirovka.viloyat', [
            'tashkilots' => $tashkilots,
            'stajirovka_count' => $stajirovka_count,
            'stajirovka_expert' => $stajirovka_expert,
            'regions' => $regions,
            'querysearch' => $querysearch,
            'stajirovkas_count' => $stajirovkas_count
        ]);
    }

    public function tashkilot_turi_stajiroka($id)
    {
        $tashkilotlarQuery = Tashkilot::where('stajirovka_is', 1)
            ->where('region_id', $id)
            ->with([
                'stajirovkalar' => function ($q) {
                    $q->where('quarter', 2);   // faqat 2-chorakdagilarni olish
                }
            ])
            ->get();

        // Turga qarab guruhlash
        $groups = [
            'otm' => $tashkilotlarQuery->where('tashkilot_turi', 'otm'),
            'itm' => $tashkilotlarQuery->where('tashkilot_turi', 'itm'),
            'other' => $tashkilotlarQuery->where('tashkilot_turi', 'boshqa'),
        ];

        $results = [];

        foreach ($groups as $key => $group) {
            $results[$key] = [
                'stajirovkalar' => $group->pluck('stajirovkalar')->flatten()->count(),
            ];
        }
        $regions = Region::findOrFail($id);

        $id = $tashkilotlarQuery->pluck('id');
        $tashkilots = $tashkilotlarQuery->count();
        $stajirovka_count = Stajirovka::whereIn('tashkilot_id', $id)->where('quarter', 2)->count();
        $stajirovka_expert = Stajirovkaexpert::whereIn('tashkilot_id', $id)->where('quarter', 2)->count();

        return view('admin.stajirovka.tashkilot_turi', ['results' => $results, 'regions' => $regions, 'tashkilots' => $tashkilots, 'stajirovka_count' => $stajirovka_count, 'stajirovka_expert' => $stajirovka_expert]);
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
        if ((auth()->user()->region_id != null)) {
            $regions = Region::where('id', "=", auth()->user()->region_id)->get();
        } else {
            $regions = Region::orderBy('order')->get();
        }

        return view('admin.stajirovka.stajirovkalar', ['stajirovkas' => $stajirovkas, 'tashkilotlar' => $tashkilotlar, 'regions' => $regions, 'tash_count' => $tash_count, 'querysearch' => $querysearch]);
    }

    public function stajirov($id)
    {

        $stajirovkas = Stajirovka::where('tashkilot_id', '=', $id)->where('quarter', 2)->paginate(20);

        $tashkilot = Tashkilot::findOrFail($id);

        return view('admin.stajirovka.stajirovka', ['stajirovkas' => $stajirovkas, 'tashkilot' => $tashkilot]);
    }


    public function stajirovkas_all(Request $request)
    {
        $query = Stajirovka::query();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('fish', 'like', '%' . $search . '%')
                    ->orWhere('lavozim', 'like', '%' . $search . '%')
                    ->orWhere('yil', 'like', '%' . $search . '%')
                    ->orWhere('yunalishi', 'like', '%' . $search . '%');
            });
        }

        if ($request->filled('yil') && $request->yil !== 'all') {
            $yil = $request->yil;
            $query->where('yil', '=', value: $yil);
        }


        $page = $request->input('page_size', 20);

        $stajirovkas = $query->paginate($page);

        $regions = Region::orderBy('order')->get();

        return view('admin.stajirovka.all', [
            'stajirovkas' => $stajirovkas,
            'regions' => $regions,
        ]);
    }


    public function create()
    {
        return view('admin.stajirovka.create');
    }


    public function store(StoreStajirovkaRequest $request)
    {
        if ($request->hasFile('ilmiy_hisobot_2')) {
            $name_ilmiy_hisobot = time() . $request->file('ilmiy_hisobot_2')->getClientOriginalName();
            $path_ilmiy_hisobot = $request->file('ilmiy_hisobot_2')->storeAs('Stajirovka-file', $name_ilmiy_hisobot);
        }

        if ($request->hasFile('egallangan_bilim_2')) {
            $name_egallangan_bilim = time() . $request->file('egallangan_bilim_2')->getClientOriginalName();
            $path_egallangan_bilim = $request->file('egallangan_bilim_2')->storeAs('Stajirovka-file', $name_egallangan_bilim);
        }

        if ($request->hasFile('ishlar_natijalari_2')) {
            $name_ishlar_natijalari = time() . $request->file('ishlar_natijalari_2')->getClientOriginalName();
            $path_ishlar_natijalari = $request->file('ishlar_natijalari_2')->storeAs('Stajirovka-file', $name_ishlar_natijalari);
        }

        if ($request->hasFile('xalqarotan_jur_nashr_2')) {
            $name_xalqarotan_jur_nashr = time() . $request->file('xalqarotan_jur_nashr_2')->getClientOriginalName();
            $path_xalqarotan_jur_nashr = $request->file('xalqarotan_jur_nashr_2')->storeAs('Stajirovka-file', $name_xalqarotan_jur_nashr);
        }

        if ($request->hasFile('biryil_davomida_2')) {
            $name_biryil_davomida = time() . $request->file('biryil_davomida_2')->getClientOriginalName();
            $path_biryil_davomida = $request->file('biryil_davomida_2')->storeAs('Stajirovka-file', $name_biryil_davomida);
        }


        Stajirovka::create([
            'tashkilot_id' => auth()->user()->tashkilot_id,
            'user_id' => auth()->user()->id,
            'fish' => $request->fish,
            'lavozim' => $request->lavozim,
            'ilmiy_hisobot_2' => $path_ilmiy_hisobot,
            'egallangan_bilim_2' => $path_egallangan_bilim,
            'ishlar_natijalari_2' => $path_ishlar_natijalari,
            'xalqarotan_jur_nashr_2' => $path_xalqarotan_jur_nashr,
            'biryil_davomida_2' => $path_biryil_davomida,
            'yunalishi' => $request->yunalishi,
            'holati' => $request->holati,
            'yil' => $request->yil,
        ]);

        return redirect()->route('stajirovka.index')->with('status', "Ma\'lumotlar muvaffaqiyatli qo'shildi.");
    }


    public function show(Stajirovka $stajirovka)
    {
        $stajirovkaexpert = Stajirovkaexpert::where('stajirovka_id', $stajirovka->id)->where('quarter', 2)->get();
        $quarter_1 = Stajirovkaexpert::where('stajirovka_id', $stajirovka->id)->where('quarter', 1)->first();
        return view('admin.stajirovka.show', ['stajirovka' => $stajirovka, 'stajirovkaexpert' => $stajirovkaexpert, 'quarter_1' => $quarter_1]);
    }


    public function edit(Stajirovka $stajirovka)
    {
        return view('admin.stajirovka.edit', ['stajirovka' => $stajirovka]);
    }


    public function update(UpdateStajirovkaRequest $request, Stajirovka $stajirovka)
    {
        $data = $request->only(['fish', 'lavozim', 'yunalishi', 'holati', 'yil',]); // Faqat oddiy ma'lumotlarni olish

        // Fayllar saqlanadigan papka
        $folder = 'Stajirovka-file';

        // Fayllarni yangilash va eskilarni o‘chirish
        $fileFields = ['ilmiy_hisobot_2', 'egallangan_bilim_2', 'ishlar_natijalari_2', 'xalqarotan_jur_nashr_2', 'biryil_davomida_2'];

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

    public function monitoring_exportstajirovka()
    {
        $fileName = 'monitoring_stajirovka_' . now()->format('Y_m_d_H_i_s') . '.xlsx';
        return Excel::download(new StajirovkalarToMonitoringExport, $fileName);
    }

}
