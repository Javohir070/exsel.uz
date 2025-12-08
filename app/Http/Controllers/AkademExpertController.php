<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAkademExpertRequest;
use App\Http\Requests\UpdateAkademExpertRequest;
use App\Models\Akadem;
use App\Models\AkademExpert;
use App\Models\User;

class AkademExpertController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {

    }


    public function store(StoreAkademExpertRequest $request)
    {
        $user = User::where('group_id', '=', auth()->user()->group_id)->role('Ekspert')->first();

        $data = $request->only([
            'akadem_id',
            'kalendar_reja_monitoring',
            'kalendar_reja_monitoring_izox',
            'dalolatnoma_tuzilgan',
            'dalolatnoma_tuzilgan_izox',
            'hisobot_muhokama_qilingan',
            'hisobot_muhokama_qilingan_izox',
            'hisobot_agentlikka_taqdim',
            'hisobot_agentlikka_taqdim_izox',
            'status',
            'quarter',
            'comment',
            't_masul',
            'ekspert_fish',
            'holati',
        ]);

        $data['user_id'] = auth()->id();
        $data['fish'] = $user->name ?? auth()->user()->name;
        $data['tashkilot_id'] = auth()->user()->tashkilot_id;

        AkademExpert::create($data);

        return redirect()->back()->with('status', 'Akadem Expert record created successfully.');

    }


    public function show(AkademExpert $akademExpert)
    {
        //
    }


    public function edit($id)
    {
        $akademExpert = AkademExpert::findOrFail($id);
        $akadem = Akadem::findOrFail($akademExpert->akadem_id);
        return view('admin.akadem.edit', compact('akademExpert', 'akadem'));
    }


    public function update(UpdateAkademExpertRequest $request, $id)
    {
        $akademExpert = AkademExpert::findOrFail($id);

        if ($request->holati == 1) {
            $akademExpert->update([
                'holati' => 'Rad etildi',
            ]);
        } else {
            $data = $request->only([
                'kalendar_reja_monitoring',
                'kalendar_reja_monitoring_izox',
                'dalolatnoma_tuzilgan',
                'dalolatnoma_tuzilgan_izox',
                'hisobot_muhokama_qilingan',
                'hisobot_muhokama_qilingan_izox',
                'hisobot_agentlikka_taqdim',
                'hisobot_agentlikka_taqdim_izox',
                'status',
                'quarter',
                'comment',
                't_masul',
                'ekspert_fish',
                'holati',
            ]);

            $akademExpert->update($data);
        }

        return redirect()->route('akadem.show', ['akadem' => $akademExpert->akadem_id])->with('status', 'Akadem Expert record updated successfully.');

    }


    public function destroy($id)
    {
        AkademExpert::find($id)->delete();

        return redirect()->back()->with('status', 'Malumot o\'chirildi');
    }
}
