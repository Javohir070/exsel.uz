<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTijoratExpertRequest;
use App\Http\Requests\UpdateTijoratExpertRequest;
use App\Models\Tijorat;
use App\Models\TijoratExpert;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class TijoratExpertController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
        //
    }


    public function store(StoreTijoratExpertRequest $request)
    {
        $user = User::where('group_id', '=', auth()->user()->group_id)->role('Ekspert')->first();

        $data = $request->only([
            'tijorat_id',
            'grant_sarf_maqsadli',
            'grant_sarf_maqsadli_izox',
            'asbob_balans_olingan',
            'asbob_balans_olingan_izox',
            'xodimlar_lozim',
            'xodimlar_haqiqiy',
            'xodimlar_haqiqiy_izox',
            'mahsulot_miqdori',
            'mahsulot_olchov',
            'sotuv_hajmi',
            'eksport_hajmi',
            'soliq_tolov',
            'hisobot_topshirildi_izox',
            'sertifikat_olingan',
            'sertifikat_olingan_izox',
            'loyiha_muammo',
            'loyiha_muammo_izox',
            'loyiha_taklif',
            'loyiha_taklif_izox',
            'kalendar_bajarilgan',
            'status',
            'comment',
            'holati',
            't_masul',
            'ekspert_fish'
        ]);

        $data['media_zip'] = $request->file('media_zip')->store('tijorat_media');

        $data['user_id'] = auth()->id();
        $data['fish'] = auth()->user()->name;
        $data['tashkilot_id'] = auth()->user()->tashkilot_id;

        TijoratExpert::create($data);

        return redirect()->back()->with('status', 'Tijorat Expert record created successfully.');

    }


    public function show(TijoratExpert $tijoratExpert)
    {
        //
    }


    public function edit($id)
    {
        $tijoratExpert = TijoratExpert::findOrFail($id);
        $tijorat = Tijorat::findOrFail($tijoratExpert->tijorat_id);
        return view('admin.tijorat.expertedit', compact('tijoratExpert', 'tijorat'));
    }


    public function update(UpdateTijoratExpertRequest $request, $id)
    {
        $tijoratExpert = TijoratExpert::findOrFail($id);

        if ($request->holati == 1) {
            $tijoratExpert->update([
                'holati' => 'Rad etildi',
            ]);
        } else {
            $data = $request->only([
                'grant_sarf_maqsadli',
                'grant_sarf_maqsadli_izox',
                'asbob_balans_olingan',
                'asbob_balans_olingan_izox',
                'xodimlar_lozim',
                'xodimlar_haqiqiy',
                'xodimlar_haqiqiy_izox',
                'mahsulot_miqdori',
                'mahsulot_olchov',
                'sotuv_hajmi',
                'eksport_hajmi',
                'soliq_tolov',
                'hisobot_topshirildi_izox',
                'sertifikat_olingan',
                'sertifikat_olingan_izox',
                'loyiha_muammo',
                'loyiha_muammo_izox',
                'loyiha_taklif',
                'loyiha_taklif_izox',
                'kalendar_bajarilgan',
                'status',
                'comment',
                'holati',
                't_masul',
                'ekspert_fish'
            ]);

            if ($request->hasFile('media_zip')) {

                // eski fayl bo'lsa — o'chirib yuboramiz
                if (!empty($tijoratExpert->media_zip) && Storage::exists($tijoratExpert->media_zip)) {
                    Storage::delete($tijoratExpert->media_zip);
                }

                // yangi faylni yuklaymiz
                $data['media_zip'] = $request->file('media_zip')->store('tijorat_media');
            } else {
                // yangi fayl yuklanmasa — eski fayl o'rnida qoladi
                $data['media_zip'] = $tijoratExpert->media_zip;
            }

            $tijoratExpert->update($data);
        }

        return redirect()->route('tijorat.show', ['tijorat' => $tijoratExpert->tijorat_id])->with('status', 'Tijorat Expert record updated successfully.');
    }


    public function destroy($id)
    {
        $tijoratExpert = TijoratExpert::find($id);
        $tijoratExpert->delete();

        return redirect()->back()->with('statua', 'Muvaffaqiyatli o\'chirildi');
    }
}
