<?php

namespace App\Http\Controllers;

use App\Models\Izlanuvchilar;
use App\Models\Tashkilot;
use Illuminate\Http\Request;

class DoktaranturaController extends Controller
{
    public function index(){
        $tashkilotlar = Tashkilot::paginate(20);
        return view('admin.doktarantura.index', ['tashkilotlar' => $tashkilotlar]);
    }

    public function show($id)
    {
        $tashkilot = Tashkilot::findOrFail($id);
        $lab_izlanuvchilar = Izlanuvchilar::where('tashkilot_id', auth()->user()->tashkilot_id)->count();
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
        return view("admin.doktarantura.show", [
                'phd_soni' => $phd_soni,
                'dsc_soni' => $dsc_soni,
                'stajyor_soni' => $stajyor_soni,
                'tashkilot' => $tashkilot,
                'lab_izlanuvchilar' => $lab_izlanuvchilar
            ]);
    }
}
