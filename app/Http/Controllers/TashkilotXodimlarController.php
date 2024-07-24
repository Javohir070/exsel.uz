<?php

namespace App\Http\Controllers;

use App\Models\Tashkilot;
use Illuminate\Http\Request;

class TashkilotXodimlarController extends Controller
{
    public function index(Tashkilot $tashkilot)
    {
        $xodimlar = $tashkilot->xodimlar()->paginate(15);

        return view('admin.tashkilotmalumotlar.tashkilotxodimlar',['xodimlar'=>$xodimlar]);
    }
}
