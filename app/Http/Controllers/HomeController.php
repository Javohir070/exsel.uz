<?php

namespace App\Http\Controllers;

use App\Models\IlmiyLoyiha;
use App\Models\IqtisodiyMoliyaviy;
use App\Models\Tashkilot;
use App\Models\TashkilotRahbari;
use App\Models\User;
use App\Models\Xodimlar;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }
    
    public function index()
    { 
        $tash_count = Tashkilot::count();
        $loy_count = IlmiyLoyiha::count();
        $admins = User::count();
        $tashkiot_haqida = auth()->user()->tashkilot;
        $tashRId = auth()->user()->tashkilot_id;
        $xodimlar = Xodimlar::where('tashkilot_id', $tashRId)->get()->count();


        $users = User::where('tashkilot_id',$tashRId)->with('roles')->get();
        $Ilmiy_faoliyat = $users->filter(function($user) {
            return $user->roles->contains('name', 'Ilmiy_faoliyat_uchun_masul');
          });
        $Tashkilot_pasporti = $users->filter(function($user) {
        return $user->roles->contains('name', 'Tashkilot_pasporti_uchun_masul');
        });
        $Xodimlar_uchun = $users->filter(function($user) {
        return $user->roles->contains('name', 'Xodimlar_uchun_masul');
        });
        $iqtisodiy_moliyaviy = IqtisodiyMoliyaviy::where('tashkilot_id', $tashRId)->get();
        $tashkilot_raxbari = TashkilotRahbari::where('tashkilot_id', $tashRId)->get();
        return view('admin.home',[
            'tashkiot_haqida'=>$tashkiot_haqida,
            'tashkilot_raxbaris'=>$tashkilot_raxbari, 
            'iqtisodiy_moliyaviy'=>$iqtisodiy_moliyaviy,
            'Ilmiy_faoliyat' => $Ilmiy_faoliyat,
            'Tashkilot_pasporti'=>$Tashkilot_pasporti,
            'Xodimlar_uchun' => $Xodimlar_uchun,
            'xodimlar' => $xodimlar,
            'tash_count' => $tash_count,
            'loy_count' => $loy_count,
            'admins' => $admins
         ]);
    }
}
