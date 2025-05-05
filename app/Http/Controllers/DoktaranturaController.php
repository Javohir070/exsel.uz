<?php

namespace App\Http\Controllers;

use App\Models\Doktaranturaexpert;
use App\Models\Ilmiyrahbarlar;
use App\Models\Izlanuvchilar;
use App\Models\Tashkilot;
use App\Models\Region;
use Illuminate\Http\Request;
use App\Models\Doktarantura;
use Illuminate\Support\Facades\Http;

class DoktaranturaController extends Controller
{

    function importDoktaranturaData($stir)
    {
        $tashkilot = Tashkilot::where('stir_raqami','=',$stir)->first();
        $url = "https://api-phd.mininnovation.uz/api-monitoring/org-doctorate-list/{$stir}/";
        $sms_username = env('API_USERNAME', 'single_database_user2024@gmail.com');
        $sms_password = env('API_PASSWORD', '6qZFYRMI$ZRQ1lY@CUQcmJ5');
        do {
            $response = Http::withBasicAuth($sms_username, $sms_password)
                        ->withOptions(["verify" => false]) // SSL sertifikatni tekshirishni o‘chirib qo‘yish
                        ->get($url);

            if ($response->failed()) {
                throw new \Exception("API so'rovida xatolik: " . $response->status());
            }

            $data = $response->json();

            if (isset($data['results'])) {
                foreach ($data['results'] as $item) {
                    Doktarantura::updateOrCreate(
                        ['id' => $item['id']], // unique key
                        [
                            "user_id" => auth()->id(),
                            "tashkilot_id" => $tashkilot->id,
                            'full_name' => $item['full_name'],
                            'direction_name' => $item['direction_name'],
                            'direction_code' => $item['direction_code'],
                            'org_name' => $item['org_name'],
                            'dc_type' => $item['dc_type'],
                            'admission_year' => $item['admission_year'],
                            'admission_quarter' => $item['admission_quarter'],
                            'advisor' => $item['advisor']?? null,
                            'course' => $item['course'],
                            'monitoring_1' => $item['monitoring_1'],
                            'monitoring_2' => $item['monitoring_2'],
                            'monitoring_3' => $item['monitoring_3'],
                        ]
                    );
                }
            }

            $url = $data['next'] ?? null;

        } while ($url);

        return redirect()->back()->with('status', 'Ma\'lumotlar muvaffaqiyatli import qilindi!');
    }

    function importIlmiyRahbarlarData($stir)
    {
        $tashkilot = Tashkilot::where('stir_raqami','=',$stir)->first();
        $url = "https://api-phd.mininnovation.uz/api-monitoring/advisor-list-monitoring-statistics/{$stir}/";
        $sms_username = env('API_USERNAME', 'single_database_user2024@gmail.com');
        $sms_password = env('API_PASSWORD', '6qZFYRMI$ZRQ1lY@CUQcmJ5');
        do {
            $response = Http::withBasicAuth($sms_username, $sms_password)
                        ->withOptions(["verify" => false]) // SSL sertifikatni tekshirishni o‘chirib qo‘yish
                        ->get($url);

            if ($response->failed()) {
                throw new \Exception("API so'rovida xatolik: " . $response->status());
            }

            $data = $response->json();
            if (isset($data)) {
                foreach ($data as $item) {
                    Ilmiyrahbarlar::updateOrCreate(
                        ['full_name' => $item['full_name']], // unique key
                        [
                            "user_id" => auth()->id(),
                            "tashkilot_id" => $tashkilot->id,
                            'org' => $item['org'],
                            'all' => $item['all'],
                        ]
                    );
                }
            }

            $url = $data['next'] ?? null;

        } while ($url);


        return redirect()->back()->with('status', 'Ma\'lumotlar muvaffaqiyatli import qilindi!');
    }

    public function ilmiyIzlanuvchi_show($id)
    {
        $doktarantura = Doktarantura::findOrFail($id);

        return response()->json($doktarantura);
    }

    public function search_doktarantura(Request $request)
    {
        $id = $request->id;
        $request->validate([
            'year' => 'nullable|integer|min:2000|max:2100',
            'admission_year' => 'nullable|integer|min:2000|max:2100',
            'quarter' => 'nullable|integer|in:1,2,3,4',
            'admission_quarter' => 'nullable|integer|in:1,2,3,4'
        ]);
        $year = $request->year ?? 2024;
        $quarter = $request->quarter ?? 4;
        $admission_quarter = $request->admission_quarter ?? 1;
        $admission_year = $request->admission_year ?? 2024;
        $tashkilot = Tashkilot::findOrFail($id);
        $sms_username = env('API_USERNAME', 'single_database_user2024@gmail.com');
        $sms_password = env('API_PASSWORD', '6qZFYRMI$ZRQ1lY@CUQcmJ5');
        $url = "https://api-phd.mininnovation.uz/api-monitoring/org-doctorate-status-statistics/{$tashkilot->stir_raqami}/";
        $response = Http::withBasicAuth($sms_username, $sms_password)
            ->withOptions(["verify" => false]) // SSL sertifikatni tekshirishni o‘chirib qo‘yish
            ->get($url);

        $url_main = "https://api-phd.mininnovation.uz/api-monitoring/doctorate-list-monitoring-statistics/{$tashkilot->stir_raqami}/";
        $response_main = Http::withBasicAuth($sms_username, $sms_password)
            ->withOptions(["verify" => false]) // SSL sertifikatni tekshirishni o‘chirib qo‘yish
            ->get($url_main, [
                'quarter' => $quarter, //chorak
                'year' => $year,
                'admission_quarter' => $admission_quarter,
                'admission_year' => $admission_year
            ]);

        $data_main = $response_main->json();
        $data = $response->json();


        if (!isset($data_main) || !is_array($data_main)) {
            return response()->json(["error" => "daraja.ilmiy.uz platformasida tashkilot STIR raqami kiritilmagan yoki noto'g'ri kiritilgan"], 400);
        }


        $doktaranturaexpert = Doktaranturaexpert::where('tashkilot_id', $id)->get();
        $tekshirivchilar = Doktaranturaexpert::where('tashkilot_id', $id)->first();
        $doktarantura = Doktarantura::where('tashkilot_id', '=', $id)->get();
        $ilmiyrahbarlars = Ilmiyrahbarlar::where('tashkilot_id', '=', $id)->get();
        $biriktirilgan_ir = Doktarantura::where('tashkilot_id', '=', $id)->whereNotNull('advisor')->count();
        $querysearch = $request->input('query');
        $doktaranturas = Doktarantura::where('tashkilot_id', $id)
            ->where(function($query) use ($querysearch) {
                $query->where('full_name','like','%'.$querysearch.'%')
                    ->orWhere('dc_type','like','%'.$querysearch.'%')
                    ->orWhere('course','like','%'.$querysearch.'%');
            })
            ->paginate(50);
        return view('admin.doktarantura.show', [
            'tashkilot' => $tashkilot ?? null,
            'lab_izlanuvchilar' => $lab_izlanuvchilar ?? null,
            'doktaranturaexpert' => $doktaranturaexpert,
            'tekshirivchilar' => $tekshirivchilar ?? 1,
            'data_main' => $data_main ?? [],
            'data' => $data ?? null,
            'id' => $id,
            'year' => $year,
            'quarter' => $quarter,
            'admission_quarter' => $admission_quarter,
            'admission_year' => $admission_year,
            'doktaranturas' => $doktaranturas ?? null,
            'doktarantura' => $doktarantura ?? null,
            'ilmiyrahbarlars' => $ilmiyrahbarlars ?? null,
            'biriktirilgan_ir' => $biriktirilgan_ir ?? null,
            'ishreja_b' => $ishreja_b ?? null,
        ]);
    }

    public function show($id, Request $request)
    {

        $request->validate([
            'year' => 'nullable|integer|min:2000|max:2100',
            'admission_year' => 'nullable|integer|min:2000|max:2100',
            'quarter' => 'nullable|integer|in:1,2,3,4',
            'admission_quarter' => 'nullable|integer|in:1,2,3,4'
        ]);
        $year = $request->year ?? 2024;
        $quarter = $request->quarter ?? 4;
        $admission_quarter = $request->admission_quarter ?? 1;
        $admission_year = $request->admission_year ?? 2024;
        $tashkilot = Tashkilot::findOrFail($id);
        $sms_username = env('API_USERNAME', 'single_database_user2024@gmail.com');
        $sms_password = env('API_PASSWORD', '6qZFYRMI$ZRQ1lY@CUQcmJ5');
        $url = "https://api-phd.mininnovation.uz/api-monitoring/org-doctorate-status-statistics/{$tashkilot->stir_raqami}/";
        $response = Http::withBasicAuth($sms_username, $sms_password)
            ->withOptions(["verify" => false]) // SSL sertifikatni tekshirishni o‘chirib qo‘yish
            ->get($url);

        $url_main = "https://api-phd.mininnovation.uz/api-monitoring/doctorate-list-monitoring-statistics/{$tashkilot->stir_raqami}/";
        $response_main = Http::withBasicAuth($sms_username, $sms_password)
            ->withOptions(["verify" => false]) // SSL sertifikatni tekshirishni o‘chirib qo‘yish
            ->get($url_main, [
                'quarter' => $quarter, //chorak
                'year' => $year,
                'admission_quarter' => $admission_quarter,
                'admission_year' => $admission_year
            ]);

        $data_main = $response_main->json();
        $data = $response->json();


        if (!isset($data_main) || !is_array($data_main)) {
            return response()->json(["error" => "daraja.ilmiy.uz platformasida tashkilot STIR raqami kiritilmagan yoki noto'g'ri kiritilgan"], 400);
        }


        $doktaranturaexpert = Doktaranturaexpert::where('tashkilot_id', $id)->get();
        $tekshirivchilar = Doktaranturaexpert::where('tashkilot_id', $id)->first();
        $doktaranturas = Doktarantura::where('tashkilot_id', '=', $id)->paginate(100);
        $doktarantura = Doktarantura::where('tashkilot_id', '=', $id)->get();
        $ilmiyrahbarlars = Ilmiyrahbarlar::where('tashkilot_id', '=', $id)->get();
        $biriktirilgan_ir = Doktarantura::where('tashkilot_id', '=', $id)->whereNotNull('advisor')->count();
        // dd($data);
        // $ishreja_b = Doktarantura::where('tashkilot_id', '=', $id)->where('rija_b', null)->count();
        return view("admin.doktarantura.show", [
            'tashkilot' => $tashkilot ?? null,
            'lab_izlanuvchilar' => $lab_izlanuvchilar ?? null,
            'doktaranturaexpert' => $doktaranturaexpert,
            'tekshirivchilar' => $tekshirivchilar ?? 1,
            'data_main' => $data_main ?? [],
            'data' => $data ?? null,
            'id' => $id,
            'year' => $year,
            'quarter' => $quarter,
            'admission_quarter' => $admission_quarter,
            'admission_year' => $admission_year,
            'doktaranturas' => $doktaranturas ?? null,
            'doktarantura' => $doktarantura ?? null,
            'ilmiyrahbarlars' => $ilmiyrahbarlars ?? null,
            'biriktirilgan_ir' => $biriktirilgan_ir ?? null,
            'ishreja_b' => $ishreja_b ?? null,
        ]);
    }
    public function index()
    {
        $tashkilotlar = Tashkilot::orderBy('name')->where('doktarantura_is', 1)->paginate(30);
        if ((auth()->user()->region_id != null)) {
            $regions = Region::where('id', "=",auth()->user()->region_id)->get();
            foreach ($regions as $region) {
                $doktarantura = $region->tashkilots()
                    ->where('doktarantura_is', 1)
                    ->count();
            }
            $region_id = Region::where('id', auth()->user()->region_id)->first();
            $id = $region_id->tashkilots()->pluck('id');
            $doktarantura_count = Doktarantura::whereIn('tashkilot_id', $id)->count();
            $doktarantura_expert = Doktaranturaexpert::whereIn('tashkilot_id', $id)->count();
        } else {
            $regions = Region::orderBy('order')->get();
            $doktarantura = Tashkilot::where('doktarantura_is', 1)->count();
            $doktarantura_count = Doktarantura::count();
            $doktarantura_expert = Doktaranturaexpert::count();
        }
        return view('admin.doktarantura.viloyat', ['doktarantura_expert' => $doktarantura_expert, 'regions' => $regions, 'doktarantura' => $doktarantura, 'doktarantura_count'=>$doktarantura_count]);
    }

    public function tashkilot_turi_doktarantura($id)
    {
        // dd($id);

        $tashkilotlarQuery = Tashkilot::where('doktarantura_is', 1)->where('region_id', '=', $id)
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
                'doktaranturalar' => $group->pluck('doktaranturalar')->flatten()->count(),
            ];
        }
        $regions = Region::findOrFail($id);
        // dd($results);
        $doktarantura = $tashkilotlarQuery->count();
        $id = $tashkilotlarQuery->pluck('id');
        $doktarantura_expert = Doktaranturaexpert::whereIn('tashkilot_id', $id)->count();
        $doktarantura_count = Doktarantura::whereIn('tashkilot_id', $id)->count();

        return view('admin.doktarantura.tashkilot_turi', ['results' => $results, 'regions' => $regions, 'doktarantura'=>$doktarantura, 'doktarantura_expert'=>$doktarantura_expert, 'doktarantura_count'=>$doktarantura_count]);
    }

    public function search_dok(Request $request)
    {

        $querysearch = $request->input('query');
        $id = $request->input('id');
        $type = $request->input('type');
        if (ctype_digit($id)) {
            $tashkilotlar = Tashkilot::orderBy('name')->where('doktarantura_is', 1)
                ->where('region_id', '=', $id)
                ->where('tashkilot_turi', '=', $type)
                ->paginate(50);
            $tashkilotlars = Tashkilot::orderBy('name')->where('doktarantura_is', 1)
                ->where('region_id', '=', $id)
                ->where('tashkilot_turi', '=', $type)
                ->get();
            $tash_count = $tashkilotlar->total();
        } else {
            $tashkilotlar = Tashkilot::orderBy('name')
                ->where('doktarantura_is', 1)
                ->where('name', 'like', '%' . $querysearch . '%')
                ->paginate(50);
            $tashkilotlars = Tashkilot::where('status', 1)
                ->where('name', 'like', '%' . $querysearch . '%')
                ->get();
            $tash_count = $tashkilotlar->total();
        }

        $id = $tashkilotlars->pluck('id');

        $doktarantura = Tashkilot::whereIn('id', $id)->count();
        if ((auth()->user()->region_id != null)) {
            $regions = Region::where('id', "=",auth()->user()->region_id)->get();
        } else {
            $regions = Region::orderBy('order')->get();
        }

        return view('admin.doktarantura.index', ['doktarantura' => $doktarantura, 'tashkilotlar' => $tashkilotlar, 'regions' => $regions, 'tash_count' => $tash_count]);

    }

    public function update(Request $request, $id)
    {
        $doktarantura = Doktarantura::find($id);
        $doktarantura->reja_t = $request->reja_t;
        $doktarantura->status = 1;
        $doktarantura->reja_b = $request->reja_b;
        $doktarantura->monitoring_natijasik = $request->monitoring_natijasik;

        $doktarantura->save();

        return redirect()->back()->with('status','Ma\'lumotlar muvaffaqiyatli tahrirlandi.');
    }


}
