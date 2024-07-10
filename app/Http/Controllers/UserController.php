<?php

namespace App\Http\Controllers;

use App\Models\Tashkilot;
use App\Models\Xodimlar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view user', ['only' => ['index']]);
        $this->middleware('permission:create user', ['only' => ['create','store']]);
        $this->middleware('permission:update user', ['only' => ['update','edit']]);
        $this->middleware('permission:delete user', ['only' => ['destroy']]);
    }

    public function index()
    {
        $users = User::get();
        return view('role-permission.user.index', ['users' => $users]);
    }

    public function create()
    {
        $roles = Role::pluck('name','name')->all();
        $tashkilot_id = auth()->user()->tashkilot_id;
        $xodimlar = Xodimlar::where('tashkilot_id', $tashkilot_id)->get();
        $tashkilots = Tashkilot::all();
        return view('role-permission.user.create', ['roles' => $roles, 'tashkilots' => $tashkilots,'xodimlar'=>$xodimlar]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|max:20',
            'roles' => 'required',
            "tashkilot_id" =>  'required',
        ]);
        $roluchun = $request->roles;
        $user = User::create([
                        'name' => $request->name,
                        'email' => $request->email,
                        'tashkilot_id' => $request->tashkilot_id,
                        'password' => Hash::make($request->password),
                    ]);

        $user->syncRoles($request->roles);
        if($roluchun[0] == "admin"){
            return redirect('/users')->with('status','User Updated Successfully with roles');
        }else{
            return redirect('/')->with('status','User Updated Successfully with roles');
        }
    }

    public function edit(User $user)
    {
        $roles = Role::pluck('name','name')->all();
        $userRoles = $user->roles->pluck('name','name')->all();
        $tashkilot_id = auth()->user()->tashkilot_id;
        $xodimlar = Xodimlar::where('tashkilot_id', $tashkilot_id)->get();
        return view('role-permission.user.edit', [
            'user' => $user,
            'roles' => $roles,
            'userRoles' => $userRoles,
            'xodimlar' => $xodimlar
        ]);
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'password' => 'nullable|string|min:8|max:20',
            'roles' => 'required'
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
        ];

        if(!empty($request->password)){
            $data += [
                'password' => Hash::make($request->password),
            ];
        }

        $user->update($data);
        $user->syncRoles($request->roles);
        $roluchun = $request->roles;
        if($roluchun[0] == 'admin'){
            return redirect('/users')->with('status','User Updated Successfully with roles');
        }else{
            return redirect('/')->with('status','User Updated Successfully with roles');
        }
    }

    public function destroy($userId)
    {
        $user = User::findOrFail($userId);
        $user->delete();

        return redirect('/users')->with('status','User Delete Successfully');
    }
}
