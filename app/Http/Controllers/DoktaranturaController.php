<?php

namespace App\Http\Controllers;

use App\Models\Doktaranturaexpert;
use App\Models\Izlanuvchilar;
use App\Models\Tashkilot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DoktaranturaController extends Controller
{
    public function index(){
        $tashkilotlar = Tashkilot::paginate(20);
        return view('admin.doktarantura.index', ['tashkilotlar' => $tashkilotlar]);
    }

    public function search_dok(Request $request)
    {
        $querysearch = $request->input('query');
        $tashkilotlar = Tashkilot::where('name','like','%'.$querysearch.'%')
                ->orWhere('id_raqam','like','%'.$querysearch.'%')
                ->orWhere('tashkilot_turi','like','%'.$querysearch.'%')
                ->paginate(50);

        return view('admin.doktarantura.index', compact('tashkilotlar'));
    }

    public function show($id)
    {
        $sms_username = 'single_database_user2024@gmail.com';
        $sms_password = '6qZFYRMI$ZRQ1lY@CUQcmJ5';
        $response = Http::withBasicAuth($sms_username, $sms_password)
            ->post('https://api-phd.mininnovation.uz/api-monitoring/doctorate-statistics/32602874310109');
        dd($response->json());
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
            ]);
    }
}
