<?php

namespace App\Http\Controllers;

use App\Models\Loyihaiqtisodi;
use App\Http\Requests\StoreLoyihaiqtisodiRequest;
use App\Http\Requests\UpdateLoyihaiqtisodiRequest;

class LoyihaiqtisodiController extends Controller
{

    public function index()
    {
        $loyihaiqtisodis = Loyihaiqtisodi::where('tashkilot_id', auth()->user()->tashkilot_id)->paginate(20);
        return view('admin.loyihaiqtisodi.index', compact('loyihaiqtisodis'));
    }


    public function create()
    {
        return view('admin.loyihaiqtisodi.create');
    }


    public function store(StoreLoyihaiqtisodiRequest $request)
    {

        Loyihaiqtisodi::create([
            'tashkilot_id'=> auth()->user()->tashkilot_id,
            'user_id'=> auth()->user()->id,
            'ilmiy_loyiha_id'=> $request->ilmiy_loyiha_id,
            'hisobot_davri'=> $request->hisobot_davri,
            'loyihabaj_ishlanma'=> $request->loyihabaj_ishlanma,
            'ilmiy_ishlanmalar'=> $request->ilmiy_ishlanmalar,
            'mehnat_haq_r'=> $request->mehnat_haq_r,
            'mehnat_haq_a'=> $request->mehnat_haq_a,
            'xizmat_saf_r'=> $request->xizmat_saf_r,
            'xizmat_saf_a'=> $request->xizmat_saf_a,
            'xarid_xaraja_r'=> $request->xarid_xaraja_r,
            'xarid_xaraja_a'=> $request->xarid_xaraja_a,
            'mat_butlovchi_r'=> $request->mat_butlovchi_r,
            'mat_butlovchi_a'=> $request->mat_butlovchi_a,
            'jalb_etilgan_r'=> $request->jalb_etilgan_r,
            'jalb_etilgan_a'=> $request->jalb_etilgan_a,
            'boshqa_xarajat_r'=> $request->boshqa_xarajat_r,
            'boshqa_xarajat_a'=> $request->boshqa_xarajat_a,
            'tashustama_xarajat_r'=> $request->tashustama_xarajat_r,
            'tashustama_xarajat_a'=> $request->tashustama_xarajat_a,
            'xarid_qilingan_xarid'=> $request->xarid_qilingan_xarid,
            'xarid_sh'=> $request->xarid_sh,
            'xarid_r'=> $request->xarid_r,
            'xarid_s'=> $request->xarid_s,
            'yetkb_yuridik_nomi'=> $request->yetkb_yuridik_nomi,
            'uzlashtirilishi_summasi' => $request->uzlashtirilishi_summasi,
        ]);

        return redirect()->back()->with('status','Ma\'lumotlar muvaffaqiyatli qo"shildi.');
    }


    public function show(Loyihaiqtisodi $loyihaiqtisodi)
    {
        return view('admin.loyihaiqtisodi.show',compact('loyihaiqtisodi'));
    }


    public function edit(Loyihaiqtisodi $loyihaiqtisodi)
    {
        return view('admin.loyihaiqtisodi.edit',compact('loyihaiqtisodi'));
    }


    public function update(UpdateLoyihaiqtisodiRequest $request, Loyihaiqtisodi $loyihaiqtisodi)
    {

        if ($request->izohlar==1) {
            $loyihaiqtisodi->update([
            "hisobot_davri_i" =>$request->hisobot_davri_i,
            "loyihabaj_ishlanma_i" =>$request->loyihabaj_ishlanma_i,
            "ilmiy_ishlanmalar_i" =>$request->ilmiy_ishlanmalar_i,
            "mehnat_haq_i" =>$request->mehnat_haq_i,
            "xizmat_saf_i" =>$request->xizmat_saf_i,
            "xarid_xaraja_i" =>$request->xarid_xaraja_i,
            "mat_butlovchi_i" =>$request->mat_butlovchi_i,
            "jalb_etilgan_i" =>$request->jalb_etilgan_i,
            "boshqa_xarajat_i" =>$request->boshqa_xarajat_i,
            "tashustama_xarajat_i" =>$request->tashustama_xarajat_i,
            "xarid_qilingan_i" =>$request->xarid_qilingan_i,
            'uzlashtirilishi_sum_i' => $request->uzlashtirilishi_sum_i,
            ]);
        } else {
            $loyihaiqtisodi->update([
                'hisobot_davri'=> $request->hisobot_davri,
                'loyihabaj_ishlanma'=> $request->loyihabaj_ishlanma,
                'ilmiy_ishlanmalar'=> $request->ilmiy_ishlanmalar,

                'mehnat_haq_r'=> $request->mehnat_haq_r,
                'mehnat_haq_a'=> $request->mehnat_haq_a,
                'xizmat_saf_r'=> $request->xizmat_saf_r,
                'xizmat_saf_a'=> $request->xizmat_saf_a,
                'xarid_xaraja_r'=> $request->xarid_xaraja_r,
                'xarid_xaraja_a'=> $request->xarid_xaraja_a,
                'mat_butlovchi_r'=> $request->mat_butlovchi_r,
                'mat_butlovchi_a'=> $request->mat_butlovchi_a,
                'jalb_etilgan_r'=> $request->jalb_etilgan_r,
                'jalb_etilgan_a'=> $request->jalb_etilgan_a,
                'boshqa_xarajat_r'=> $request->boshqa_xarajat_r,
                'boshqa_xarajat_a'=> $request->boshqa_xarajat_a,
                'tashustama_xarajat_r'=> $request->tashustama_xarajat_r,
                'tashustama_xarajat_a'=> $request->tashustama_xarajat_a,

                'xarid_qilingan_xarid'=> $request->xarid_qilingan_xarid,
                'xarid_sh'=>$request->xarid_qilingan_xarid == "yo'q" ? null : $request->xarid_sh,
                'xarid_r'=> $request->xarid_qilingan_xarid == "yo'q" ? null : $request->xarid_r,
                'xarid_s'=> $request->xarid_qilingan_xarid == "yo'q" ? null : $request->xarid_s,
                'yetkb_yuridik_nomi'=> $request->xarid_qilingan_xarid == "yo'q" ? null : $request->yetkb_yuridik_nomi,
                'uzlashtirilishi_summasi' => $request->uzlashtirilishi_summasi,
            ]);
        }


        return redirect()->back()->with('status','Ma\'lumotlar muvaffaqiyatli  yangilandi');
    }


    public function destroy(Loyihaiqtisodi $loyihaiqtisodi)
    {
        //
    }
}
