<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStartupExpertRequest;
use App\Http\Requests\UpdateStartupExpertRequest;
use App\Models\Startup;
use App\Models\StartupExpert;
use App\Models\User;

class StartupExpertController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStartupExpertRequest $request)
    {
        $user = User::where('group_id', '=', auth()->user()->group_id)->role('startUP rahbar')->first();

        $data = $request->only([
            'startup_id',
            'loyiha_yolga_qoyilgan',
            'loyiha_yolga_qoyilgan_izox',
            'daromadga_erishilgan',
            'daromadga_erishilgan_izox',
            'inventar_kirim_qilingan',
            'inventar_kirim_qilingan_izox',
            'inventar_joyida_mavjud',
            'inventar_joyida_mavjud_izox',
            'inventar_parametr_mosligi',
            'inventar_parametr_mosligi_izox',
            'xodimlar_soni',
            'amalda_xodim_soni',
            'shartnoma_mavjudligi',
            'shartnoma_mavjudligi_izox',
            'status',
            'comment',
            'holati',
            't_masul',
            'ekspert_fish'
        ]);

        $data['user_id'] = auth()->id();
        $data['fish'] = $user->name ?? auth()->user()->name;
        $data['tashkilot_id'] = auth()->user()->tashkilot_id;

        StartupExpert::create($data);

        return redirect()->back()->with('status', 'Startup Expert record created successfully.');
    }

    
    public function show(StartupExpert $startupExpert)
    {
        //
    }

    
    public function edit($id)
    {
        $startupExpert = StartupExpert::findOrFail($id);
        $startup = Startup::findOrFail($startupExpert->startup_id);
        return view('admin.startup.expertedit', ['startupExpert' => $startupExpert, 'startup' => $startup]);
    }

    
    public function update(UpdateStartupExpertRequest $request, int $id)
    {
       
        $startupExpert = StartupExpert::findOrFail($id);

        if ($request->holati == 1) {
            $startupExpert->update([
                'holati' => 'Rad etildi',
            ]);
        }else{
            $data = $request->only([
                'loyiha_yolga_qoyilgan',
                'loyiha_yolga_qoyilgan_izox',
                'daromadga_erishilgan',
                'daromadga_erishilgan_izox',
                'inventar_kirim_qilingan',
                'inventar_kirim_qilingan_izox',
                'inventar_joyida_mavjud',
                'inventar_joyida_mavjud_izox',
                'inventar_parametr_mosligi',
                'inventar_parametr_mosligi_izox',
                'xodimlar_soni',
                'amalda_xodim_soni',
                'shartnoma_mavjudligi',
                'shartnoma_mavjudligi_izox',
                'status',
                'comment',
                'holati',
                't_masul',
                'ekspert_fish'
            ]);
    
            $startupExpert->update($data);
        }

        return redirect()->route('startup.show', ['startup' => $startupExpert->startup_id])->with('status', 'Startup Expert record updated successfully.');
    }

    
    public function destroy($id)
    {
        $startupExpert = StartupExpert::findOrFail($id);
        $startupExpert->delete();

        return redirect()->back()->with('status', 'Startup Expert record deleted successfully.');
    }
}
