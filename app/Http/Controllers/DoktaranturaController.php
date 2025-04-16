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
        // dd($request->all());
        $tashkilot = Tashkilot::findOrFail($id);
        // dd($tashkilot->stir_raqami);
        $sms_username = env('API_USERNAME', 'single_database_user2024@gmail.com');
        $sms_password = env('API_PASSWORD', '6qZFYRMI$ZRQ1lY@CUQcmJ5');
        $url = "https://api-phd.mininnovation.uz/api-monitoring/org-doctorate-status-statistics/{$tashkilot->stir_raqami}/";

        // $url_list = "https://api-phd.mininnovation.uz/api-monitoring/org-doctorate-list/{$tashkilot->stir_raqami}/";

        // $url_tach = "https://api-phd.mininnovation.uz/api-monitoring/advisor-list-monitoring-statistics/{$tashkilot->stir_raqami}/";

        // Agar SSL xato bersa, verify => false qilib ko‘ring
        $response = Http::withBasicAuth($sms_username, $sms_password)
            ->withOptions(["verify" => false]) // SSL sertifikatni tekshirishni o‘chirib qo‘yish
            ->get($url);
        // $response_list = Http::withBasicAuth($sms_username, $sms_password)
        //     ->withOptions(["verify" => false]) // SSL sertifikatni tekshirishni o‘chirib qo‘yish
        //     ->get($url_list);

        // $response_tach = Http::withBasicAuth($sms_username, $sms_password)
        //     ->withOptions(["verify" => false]) // SSL sertifikatni tekshirishni o‘chirib qo‘yish
        //     ->get($url_tach);

        $url_main = "https://api-phd.mininnovation.uz/api-monitoring/doctorate-list-monitoring-statistics/{$tashkilot->stir_raqami}/";
        $response_main = Http::withBasicAuth($sms_username, $sms_password)
            ->withOptions(["verify" => false]) // SSL sertifikatni tekshirishni o‘chirib qo‘yish
            ->get($url_main, [
                'quarter' => $quarter, //chorak
                'year' => $year,
                'admission_quarter' => $admission_quarter,
                'admission_year' => $admission_year
            ]);

        // $data_tach = $response_tach->json();
        $data_main = $response_main->json();
        $data = $response->json();
        // $data_last = $response_list->json();


        if (!isset($data_main) || !is_array($data_main)) {
            return response()->json(["error" => "daraja.ilmiy.uz platformasida tashkilot STIR raqami kiritilmagan yoki noto'g'ri kiritilgan"], 400);
        }


        $doktaranturaexpert = Doktaranturaexpert::where('tashkilot_id', $id)->get();
        $tekshirivchilar = Doktaranturaexpert::where('tashkilot_id', $id)->first();
        $doktaranturas = Doktarantura::where('tashkilot_id', '=', $id)->paginate(20);
        $ilmiyrahbarlars = Ilmiyrahbarlar::where('tashkilot_id', '=', $id)->paginate(20);
        $biriktirilgan_ir = Doktarantura::where('tashkilot_id', '=', $id)->where('advisor', null)->count();
        // $ishreja_b = Doktarantura::where('tashkilot_id', '=', $id)->where('rija_b', null)->count();
        return view("admin.doktarantura.show", [
            'phd_soni' => $phd_soni ?? null,
            'dsc_soni' => $dsc_soni ?? null,
            'stajyor_soni' => $stajyor_soni ?? null,
            'tashkilot' => $tashkilot ?? null,
            'lab_izlanuvchilar' => $lab_izlanuvchilar ?? null,
            'doktaranturaexpert' => $doktaranturaexpert,
            'tekshirivchilar' => $tekshirivchilar ?? 1,
            'data_tach' => $data_tach ?? [],
            'data_main' => $data_main ?? [],
            'data' => $data ?? null,
            'id' => $id,
            'year' => $year,
            'quarter' => $quarter,
            'admission_quarter' => $admission_quarter,
            'admission_year' => $admission_year,
            'doktaranturas' => $doktaranturas ?? null,
            'ilmiyrahbarlars' => $ilmiyrahbarlars ?? null,
            'biriktirilgan_ir' => $biriktirilgan_ir ?? null,
            'ishreja_b' => $ishreja_b ?? null,
        ]);
    }
    public function index()
    {
        $tashkilotlar = Tashkilot::orderBy('name')->where('doktarantura_is', 1)->paginate(30);
        $regions = Region::orderBy('order')->get();
        $doktarantura = Tashkilot::where('doktarantura_is', 1)->count();
        $doktarantura_count = Doktarantura::count();
        $doktarantura_expert = Doktaranturaexpert::count();
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

        return view('admin.doktarantura.tashkilot_turi', ['results' => $results, 'regions' => $regions]);
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
            $tash_count = $tashkilotlar->total();
        }

        $id = $tashkilotlars->pluck('id');

        $doktarantura = Tashkilot::whereIn('id', $id)->count();
        $regions = Region::orderBy('order')->get();

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
