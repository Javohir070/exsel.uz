<?php

namespace App\Http\Controllers;

use App\Models\Tashkilot;
use Illuminate\Http\Request;

class TashkilotIlmiyController extends Controller
{
    public function index(Tashkilot $tashkilot)
    {
        $ilmiyloyihas = $tashkilot->ilmiyloyhalar()->paginate(15);

        return view('admin.tashkilot.tashkilotloyiha',['ilmiyloyihas'=>$ilmiyloyihas]);
    }
}
