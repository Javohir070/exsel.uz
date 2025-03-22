<?php

namespace App\Http\Controllers;

use App\Models\Doktaranturaexpert;
use App\Models\Izlanuvchilar;
use App\Models\Tashkilot;
use App\Models\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DoktaranturaController extends Controller
{
    public function show($id)
    {
        $tashkilot = Tashkilot::findOrFail($id);
        // dd($tashkilot->stir_raqami);
        $sms_username = env('API_USERNAME', 'single_database_user2024@gmail.com');
        $sms_password = env('API_PASSWORD', '6qZFYRMI$ZRQ1lY@CUQcmJ5');
        $url = "https://api-phd.mininnovation.uz/api-monitoring/doctorate-statistics/{$tashkilot->stir_raqami}/";

        $url_tach = "https://api-phd.mininnovation.uz/api-monitoring/advisor-monitoring-statistics/{$tashkilot->stir_raqami}/";
        // Agar SSL xato bersa, verify => false qilib ko‘ring
        $response = Http::withBasicAuth($sms_username, $sms_password)
                        ->withOptions(["verify" => false]) // SSL sertifikatni tekshirishni o‘chirib qo‘yish
                        ->get($url);

        $response_tach = Http::withBasicAuth($sms_username, $sms_password)
                        ->withOptions(["verify" => false]) // SSL sertifikatni tekshirishni o‘chirib qo‘yish
                        ->get($url_tach);
        // Agar so‘rov muvaffaqiyatli bo‘lsa, JSON qaytarish

        $data = $response->json();
        if (!isset($data[0]['data']) || !is_array($data[0]['data'])) {
            return response()->json(["error" => "daraja.ilmiy.uz platformasida tashkilot STIR raqami kiritilmagan yoki noto'g'ri kiritilgan"], 400);
        }

        $data_tach = $response_tach->json();
        // dd($data_tach);

        // Dinamik o‘zgaruvchilarga saqlash
        foreach ($data[0]['data'] as $item) {
            $varName = "dc_type" . $item['dc_type'];
            $$varName = $item['courses'];
        }

        $dc_type100 = $dc_type100 ?? null;//Doktorlik
        $dc_type200 = $dc_type200 ?? null;//ASOSIY DOKTORANYA
        $dc_type300 = $dc_type300 ?? null;//Stajyor tadqiqotchi
        $dc_type400 = $dc_type400 ?? null;//MUSTAQIL DOKTORATTA
        $dc_type500 = $dc_type500 ?? null;//MUSTAQIL ASOSIY DOKTORATTA
        $dc_type600 = $dc_type600 ?? null;//MAQSADLI Doktorlik
        $dc_type700 = $dc_type700 ?? null;//MAQSADLI asosiy Doktorlik
        $dc_type800 = $dc_type800 ?? null;
        $dc_type900 = $dc_type900 ?? null;
        $dc_type1000 = $dc_type1000 ?? null;
        $dc_type1100 = $dc_type1100 ?? null;
        $dc_type1200 = $dc_type1200 ?? null;
        $dc_type1300 = $dc_type1300 ?? null;
        // dd($dc_type200, $dc_type1300);

        $tashkilot = Tashkilot::findOrFail($id);
        $lab_izlanuvchilar = Izlanuvchilar::where('tashkilot_id', $id)->count();
        $phd = [
            "Tayanch doktorantura, PhD",
            "Mustaqil tadqiqotchi, PhD",
            "Maqsadli tayanch doktorantura, PhD"
        ];
        $dsc = [
            "Doktorantura, DSc",
            "Mustaqil tadqiqotchi, DSc",
            "Maqsadli doktorantura, DSc"
        ];
        $phd_soni = Izlanuvchilar::where('tashkilot_id', $id)
                     ->whereIn('talim_turi', $phd)->count();
        $dsc_soni = Izlanuvchilar::where('tashkilot_id', $id)
                     ->whereIn('talim_turi', $dsc)->count();
        $stajyor_soni = Izlanuvchilar::where('tashkilot_id', $id)
                     ->where('talim_turi', "Stajyor-tadqiqotchi")->count();

        $dscmus_soni = Izlanuvchilar::where('tashkilot_id', $id)
                    ->where('talim_turi', 'Mustaqil tadqiqotchi, DSc')->count();

        $phdmus_soni = Izlanuvchilar::where('tashkilot_id', $id)
                    ->where('talim_turi', 'Mustaqil tadqiqotchi, PhD')->count();

        $doktaranturaexpert = Doktaranturaexpert::where('tashkilot_id', $id)->get();

        return view("admin.doktarantura.show", [
                'phd_soni' => $phd_soni,
                'dsc_soni' => $dsc_soni,
                'stajyor_soni' => $stajyor_soni,
                'tashkilot' => $tashkilot,
                'lab_izlanuvchilar' => $lab_izlanuvchilar,
                'doktaranturaexpert' => $doktaranturaexpert,
                'dscmus_soni' => $dscmus_soni,
                'phdmus_soni' => $phdmus_soni,
                'dc_type100' => $dc_type100,
                'dc_type200' => $dc_type200,
                'dc_type300' => $dc_type300,
                'dc_type400' => $dc_type400,
                'dc_type500' => $dc_type500,
                'dc_type600' => $dc_type600,
                'dc_type700' => $dc_type700,
                'dc_type800' => $dc_type800,
                'dc_type900' => $dc_type900,
                'dc_type1000' => $dc_type100,
                'dc_type1100' => $dc_type1100,
                'dc_type1200' => $dc_type1200,
                'dc_type1300' => $dc_type1300,
                'data_tach' => $data_tach,
            ]);
    }
    public function index(){
        $tashkilotlar = Tashkilot::paginate(20);
        $regions = Region::all();
        return view('admin.doktarantura.index', ['tashkilotlar' => $tashkilotlar, 'regions'=>$regions]);
    }

    public function search_dok(Request $request)
    {

        $querysearch = $request->input('query');
        if (ctype_digit($querysearch)) {
            $tashkilotlar = Tashkilot::where('region_id', '=', $querysearch)->paginate(50);
            $tash_count = Tashkilot::where('region_id', '=', $querysearch)->count();
        } elseif ($querysearch == 'otm' || $querysearch == 'itm') {
            $tashkilotlar = Tashkilot::where('tashkilot_turi', 'like', '%' . $querysearch . '%')->paginate(50);
            $tash_count = Tashkilot::where('tashkilot_turi', 'like', '%' . $querysearch . '%')->count();
        } else {
            $tashkilotlar = Tashkilot::where('name', 'like', '%' . $querysearch . '%')->paginate(50);
            $tash_count = Tashkilot::where('name', 'like', '%' . $querysearch . '%')->count();
        }
        
        $regions = Region::all();


        return view('admin.doktarantura.index', ['tashkilotlar' => $tashkilotlar, 'regions'=>$regions, 'tash_count'=>$tash_count]);
        
    }


}
