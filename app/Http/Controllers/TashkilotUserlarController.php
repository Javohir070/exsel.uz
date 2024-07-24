<?php

namespace App\Http\Controllers;

use App\Models\Tashkilot;
use Illuminate\Http\Request;

class TashkilotUserlarController extends Controller
{
    public function index(Tashkilot $tashkilot)
    {
        $users = $tashkilot->user()->paginate(15);

        return view('admin.tashkilotmalumotlar.tashkilotuserlar',['users'=>$users]);
    }
}
