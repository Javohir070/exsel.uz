<?php

namespace App\Http\Controllers;

use App\Models\Tashkilot;
use Illuminate\Http\Request;

class TashkilotIlmiydarajaController extends Controller
{
    public function index(Tashkilot $tashkilot)
    {
        $ilmiydarajalar = $tashkilot->ilmiydarajalar()->paginate(15);

        return view('admin.tashkilotmalumotlar.tashkilotilmiydaraja',['ilmiydarajalar'=>$ilmiydarajalar]);
    }
}
