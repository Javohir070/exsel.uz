<?php

namespace App\Http\Controllers;

use App\Models\Tashkilot;
use Spatie\Permission\Models\Role;

class TashkilotUserlarController extends Controller
{
    public function index(Tashkilot $tashkilot)
    {
        $users = $tashkilot->user()->paginate(15);
        $roles = Role::all();
        $tashkilots = Tashkilot::all();

        return view('role-permission.user.index',['users'=>$users, 'roles'=>$roles, 'tashkilots'=>$tashkilots]);
    }
}
