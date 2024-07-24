<?php

namespace App\Http\Controllers;

use App\Models\Tashkilot;
use Illuminate\Http\Request;

class TashkilotXujalikController extends Controller
{
    public function index(Tashkilot $tashkilot)
    {
        $xujaliklar = $tashkilot->xujaliklar()->paginate(15);

        return view('admin.tashkilotmalumotlar.tashkilotxujaliklar',['xujaliklar'=>$xujaliklar]);
    }
}
