<?php

namespace App\Http\Controllers;

use App\Models\Doktaranturaexpert;
use App\Models\Izlanuvchilar;
use App\Models\Tashkilot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DoktaranturaexpertController extends Controller
{
    public function store(Request $request)
    {
        // dd($request->all());
        Doktaranturaexpert::create([
            'user_id' => auth()->id(),
            'fish' => auth()->user()->name,
            'tashkilot_id' => $request->tashkilot_id,
            'status' => $request->status,
            'comment' => $request->comment,
            "umumiy_izlanuvchilar" => $request->umumiy_izlanuvchilar,
            "yagonae_tah_soni" => $request->yagonae_tah_soni,
            "chetlash_soni" => $request->chetlash_soni,
            "akademik_soni" => $request->akademik_soni,
            "muddatidano_soni" => $request->muddatidano_soni,
            "kiritilmagan_soni" => $request->kiritilmagan_soni,
            "rejani_bajarmagan" => $request->rejani_bajarmagan,
            "mon_nat_kiritilmagan" => $request->mon_nat_kiritilmagan,
            "biriktirilgan_rahbarlar" => $request->biriktirilgan_rahbarlar,
            "kollegial_rahbarlar" => $request->kollegial_rahbarlar,
            "meyoridan_rahbarlar" => $request->meyoridan_rahbarlar,
            "tash_ortiq_rahbarlar" => $request->tash_ortiq_rahbarlar,
        ]);

        return redirect()->back()->with("status", 'Ma\'lumotlar muvaffaqiyatli qo"shildi.');
    }


    public function edit(Doktaranturaexpert $doktaranturaexpert)
    {
        $id = $doktaranturaexpert->tashkilot_id;
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


        return view("admin.doktarantura.edit", [
                'phd_soni' => $phd_soni,
                'dsc_soni' => $dsc_soni,
                'stajyor_soni' => $stajyor_soni,
                'tashkilot' => $tashkilot,
                'lab_izlanuvchilar' => $lab_izlanuvchilar,
                'dscmus_soni' => $dscmus_soni,
                'phdmus_soni' => $phdmus_soni,
                'doktaranturaexpert' => $doktaranturaexpert
            ]);
    }


    public function update(Request $request, Doktaranturaexpert $doktaranturaexpert)
    {
        $doktaranturaexpert->update([
            'user_id' => auth()->id(),
            'fish' => auth()->user()->name,
            'status' => $request->status,
            'comment' => $request->comment,
            "umumiy_izlanuvchilar" => $request->umumiy_izlanuvchilar,
            "yagonae_tah_soni" => $request->yagonae_tah_soni,
            "chetlash_soni" => $request->chetlash_soni,
            "akademik_soni" => $request->akademik_soni,
            "muddatidano_soni" => $request->muddatidano_soni,
            "kiritilmagan_soni" => $request->kiritilmagan_soni,
            "rejani_bajarmagan" => $request->rejani_bajarmagan,
            "mon_nat_kiritilmagan" => $request->mon_nat_kiritilmagan,
            "biriktirilgan_rahbarlar" => $request->biriktirilgan_rahbarlar,
            "kollegial_rahbarlar" => $request->kollegial_rahbarlar,
            "meyoridan_rahbarlar" => $request->meyoridan_rahbarlar,
            "tash_ortiq_rahbarlar" => $request->tash_ortiq_rahbarlar,
        ]);

        return redirect()->route('doktarantura.show', $doktaranturaexpert->tashkilot_id)->with("status", 'Ma\'lumotlar muvaffaqiyatli qo"shildi.');
    }

    public function destroy(Doktaranturaexpert $doktaranturaexpert)
    {
        // Faylni o'chirish (agar mavjud bo'lsa)
        if ($doktaranturaexpert->file) {
            Storage::delete($doktaranturaexpert->file);
        }

        // doktaranturaexpertni o'chirish
        $doktaranturaexpert->delete();

        return redirect()->back()->with('status', 'Dalolatnoma muvaffaqiyatli o‘chirildi.');
    }



}
