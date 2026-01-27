<?php

namespace App\Http\Controllers;

use App\Models\Tashkilot;

class TashkilotUserlarController extends Controller
{
    public function index(Tashkilot $tashkilot)
    {
        $users = $tashkilot->user()->paginate(15);

        return view('role-permission.user.index',['users'=>$users]);
    }
}
