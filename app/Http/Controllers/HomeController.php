<?php

namespace App\Http\Controllers;

use App\Models\IlmiybnTaminlanga;
use App\Models\IlmiyLoyiha;
use App\Models\IqtisodiyMoliyaviy;
use App\Models\Izlanuvchilar;
use App\Models\Laboratory;
use App\Models\Tashkilot;
use App\Models\TashkilotRahbari;
use App\Models\User;
use App\Models\Xodimlar;
use App\Models\Xujalik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }
    
    

    public function index()
    {
        $user = Auth::user();
        $tashRId = $user->tashkilot_id;
        
        // Barcha kerakli ma'lumotlarni bitta so'rovda olish
        $tashkilot = Tashkilot::with([
            'xodimlar', 
            'ilmiyloyhalar',
            'xujaliklar',
            'ilmiydarajalar'
        ])->find($tashRId);

        $tash_count = Tashkilot::count();
        $loy_count = IlmiyLoyiha::count();
        $xodim_count = Xodimlar::count();
        $xujalik_count = Xujalik::count();
        $loyiha_bilan_t = IlmiybnTaminlanga::count();
        $admins = User::count();
        $adminlar = User::role('admin')->count();

        $xodimlar = $tashkilot->xodimlar->count();
        $loyiha_count = $tashkilot->ilmiyloyhalar->count();

        $users = User::where('tashkilot_id', $tashRId)->with('roles')->get();

        $Ilmiy_faoliyat = $users->filter(function($user) {
            return $user->roles->contains('name', 'Ilmiy_faoliyat_uchun_masul');
        });
        $Tashkilot_pasporti = $users->filter(function($user) {
            return $user->roles->contains('name', 'Tashkilot_pasporti_uchun_masul');
        });
        $Xodimlar_uchun = $users->filter(function($user) {
            return $user->roles->contains('name', 'Xodimlar_uchun_masul');
        });

        $lab_xodimlar = Xodimlar::where('laboratory_id', auth()->user()->laboratory_id)->count();
        $lab_xujalik = Xujalik::where('laboratory_id', auth()->user()->laboratory_id)->count();
        $lab_ilmiyLoyiha = IlmiyLoyiha::where('laboratory_id', auth()->user()->laboratory_id)->count();
        $lab_izlanuvchilar = Izlanuvchilar::where('laboratory_id', auth()->user()->laboratory_id)->count();

        $iqtisodiy_moliyaviy = IqtisodiyMoliyaviy::where('tashkilot_id', $tashRId)->get();
        $tashkilot_raxbari = TashkilotRahbari::where('tashkilot_id', $tashRId)->get();

        // ITM uchun
        $tashkilots = Tashkilot::where('tashkilot_turi', 'itm')->with(['xodimlar', 'ilmiyloyhalar', 'xujaliklar', 'ilmiydarajalar'])->get();
        $itm_tash_itm = $tashkilots->count();

        $itm_adminlar = Tashkilot::where('tashkilot_turi', 'itm')->with('roles')->count();
        

        $xodim_count_itm = $tashkilots->sum(function ($tashkilot) {
            return $tashkilot->xodimlar->count();
        });
        $ilmiyloyihas_count_itm = $tashkilots->sum(function ($tashkilot) {
            return $tashkilot->ilmiyloyhalar->count();
        });
        $xujalik_count_itm = $tashkilots->sum(function ($tashkilot) {
            return $tashkilot->xujaliklar->count();
        });
        $loyiha_bilan__itm = $tashkilots->sum(function ($tashkilot) {
            return $tashkilot->ilmiydarajalar->count();
        });
        $users = User::where('tashkilot_id', auth()->user()->tashkilot_id)->with('roles')->get();

        $masullar = $users->filter(function($user) {
            return $user->roles->contains('name', 'labaratoriyaga_masul');
        })->count();
        $labaratoriyalar = Laboratory::count();
        $izlanuvchilar = Izlanuvchilar::count();
        $labaratoriyalar_admin = Laboratory::where("tashkilot_id",auth()->user()->tashkilot_id)->count();
        $izlanuvchilar_admin = Izlanuvchilar::where("tashkilot_id",auth()->user()->tashkilot_id)->count();

        return view('admin.home', [
            'tashkiot_haqida' => $tashkilot,
            'tashkilot_raxbaris' => $tashkilot_raxbari,
            'iqtisodiy_moliyaviy' => $iqtisodiy_moliyaviy,
            'Ilmiy_faoliyat' => $Ilmiy_faoliyat,
            'Tashkilot_pasporti' => $Tashkilot_pasporti,
            'Xodimlar_uchun' => $Xodimlar_uchun,
            'xodimlar' => $xodimlar,
            'tash_count' => $tash_count,
            'loy_count' => $loy_count,
            'admins' => $admins,
            'loyiha_count' => $loyiha_count,
            'xodim_count' => $xodim_count,
            'xujalik_count' => $xujalik_count,
            'loyiha_bilan_t' => $loyiha_bilan_t,
            'adminlar' => $adminlar,
            'itm_tash_itm' => $itm_tash_itm,
            'ilmiyloyihas_count_itm' => $ilmiyloyihas_count_itm,
            'xujalik_count_itm' => $xujalik_count_itm,
            'loyiha_bilan__itm' => $loyiha_bilan__itm,
            'xodim_count_itm' => $xodim_count_itm,
            'itm_adminlar' => $itm_adminlar,
            'lab_izlanuvchilar' => $lab_izlanuvchilar,
            'lab_ilmiyLoyiha' => $lab_ilmiyLoyiha,
            'lab_xujalik' => $lab_xujalik,
            'lab_xodimlar' => $lab_xodimlar,
            'labaratoriyalar' => $labaratoriyalar,
            'izlanuvchilar' => $izlanuvchilar,
            'labaratoriyalar_admin' => $labaratoriyalar_admin,
            'izlanuvchilar_admin' => $izlanuvchilar_admin,
            'masullar' => $masullar,
        ]);
    }

}
