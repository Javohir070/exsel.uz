<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAdminUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\IlmiyLoyiha;
use App\Models\Kafedralar;
use App\Models\Laboratory;
use App\Models\Region;
use App\Models\Tashkilot;
use App\Models\Xodimlar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view user', ['only' => ['index']]);
        $this->middleware('permission:create user', ['only' => ['create', 'store']]);
        $this->middleware('permission:update user', ['only' => ['update', 'edit', 'toggleActive']]);
        $this->middleware('permission:delete user', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $search = $request->query('query');
        $query = User::query();

        if ($search) {
            $query->where('name', 'like', '%' . $search . '%')
                ->orWhere('email', 'like', '%' . $search . '%');
        }

        $users = $query->paginate(15);

        return view('role-permission.user.index', ['users' => $users]);
    }

    public function tashkilot_users()
    {
        $users = User::where('tashkilot_id', auth()->user()->tashkilot_id)->paginate(15);

        return view('role-permission.tashkilot_users.index', ['users' => $users]);
    }

    public function create()
    {
        $roles = Role::pluck('name', 'name')->all();
        $tashkilots = Tashkilot::all();
        $regions = Region::all();

        return view('role-permission.user.create', compact('roles', 'tashkilots', 'regions'));
    }

    public function kafedra_rol()
    {
        $roles = Role::where('is_active', 1)->pluck('name', 'name')->all();
        $lab = Laboratory::where("tashkilot_id", auth()->user()->tashkilot_id)->get();
        $kafedralar = Kafedralar::where("tashkilot_id", auth()->user()->tashkilot_id)->get();
        $tashkilot_id = auth()->user()->tashkilot_id;
        $xodimlar = Xodimlar::where('tashkilot_id', $tashkilot_id)->where('lavozimi', 'Kafedra mudiri')->get();
        $tashkilots = Tashkilot::orderBy('name', 'asc')->get();

        return view('role-permission.user.kafedra', [
            'roles' => $roles,
            'tashkilots' => $tashkilots,
            'xodimlar' => $xodimlar,
            'lab' => $lab,
            'kafedralar' => $kafedralar,
            'tashkilot_id' => auth()->user()->tashkilot_id
        ]);
    }

    public function asbobuskuna_rol()
    {
        $roles = Role::where('is_active', 1)->pluck('name', 'name')->all();
        $lab = Laboratory::where("tashkilot_id", auth()->user()->tashkilot_id)->get();
        $kafedralar = Kafedralar::where("tashkilot_id", auth()->user()->tashkilot_id)->get();
        $tashkilot_id = auth()->user()->tashkilot_id;
        $xodimlar = Xodimlar::where('tashkilot_id', $tashkilot_id)->where('lavozimi', 'Kafedra mudiri')->get();
        $tashkilots = Tashkilot::orderBy('name', 'asc')->get();

        return view('role-permission.user.asbobuskuna', [
            'roles' => $roles,
            'tashkilots' => $tashkilots,
            'xodimlar' => $xodimlar,
            'lab' => $lab,
            'kafedralar' => $kafedralar,
            'tashkilot_id' => auth()->user()->tashkilot_id
        ]);
    }

    public function ilmiy_loyha_masullar()
    {
        $ilmiy_loyha = IlmiyLoyiha::where('tashkilot_id', auth()->user()->tashkilot_id)->where('is_active', 1)->get();

        return view('role-permission.user.loyiha_rahbariroli', ['ilmiy_loyha' => $ilmiy_loyha]);
    }

    public function ilmiy_loyha_masullar_edit($id)
    {
        $user = User::findOrFail($id);
        $ilmiy_loyha = IlmiyLoyiha::where('tashkilot_id', auth()->user()->tashkilot_id)->where('is_active', 1)->get();

        return view('role-permission.user.loyiha_rahbariroli_edit', ['ilmiy_loyha' => $ilmiy_loyha, 'user' => $user]);
    }

    public function store(StoreUserRequest $request)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($request->password);
        $data['tashkilot_id'] = $request->tashkilot_id ?? auth()->user()->tashkilot_id;

        $user = User::create($data);

        $user->syncRoles($request->roles);

        return redirect('/users')->with('status', 'User Created Successfully with roles');
    }

    public function tashkilot_users_store(StoreAdminUserRequest $request)
    {
        if($request->has('laboratory_id')) {
            $request->merge(['roles' => ['labaratoriyaga_masul']]);
        }
        $data = $request->validated();
        $data['password'] = Hash::make($request->password);
        $data['tashkilot_id'] = auth()->user()->tashkilot_id;

        $user = User::create($data);

        $user->syncRoles($request->roles);

        return redirect('/tashkilot/users')->with('status', 'User Created Successfully with roles');
    }

    public function kafedrarol_store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|max:20|confirmed',
            'roles' => 'required',
        ]);


        $user = User::create([
            'name' => $request->name,
            'laboratory_id' => $request->laboratory_id,
            'kafedralar_id' => $request->kafedralar_id,
            'email' => $request->email,
            'tashkilot_id' => $request->tashkilot_id ?? auth()->user()->tashkilot_id,
            'password' => Hash::make($request->password),
        ]);

        $user->syncRoles($request->roles);

        if (!empty($user->kafedralar_id)) {
            return redirect('/kafedralar')->with('status', 'User Updated Successfully with roles');
        } else {
            return redirect('/asbobuskuna')->with('status', 'User Updated Successfully with roles');
        }
    }

    public function ilmiy_loyha_rahbari(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|max:20',
            'role' => 'required',
            'ilmiyloyha' => 'required|array', // Validate ilmiyloyha as an array
            'ilmiyloyha.*' => 'exists:ilmiy_loyihas,id'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'tashkilot_id' => auth()->user()->tashkilot_id,
            'password' => Hash::make($request->password),
        ]);

        $user->syncRoles($request->role);
        IlmiyLoyiha::whereIn('id', $request->ilmiyloyha)
            ->update(['user_id' => $user->id]);

        return redirect('/ilmiyloyiha')->with('status', 'User Updated Successfully with roles');
    }

    public function ilmiy_loyha_rahbari_edit(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'password' => 'nullable|string|min:8|max:20',
            'ilmiyloyha' => 'required|array',
            'ilmiyloyha.*' => 'exists:ilmiy_loyihas,id' // jadval nomini tekshiring!
        ]);

        $user = User::findOrFail($id);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
        ];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        // Filter out empty values (in case frontend yuborsa)
        $selected = array_filter($request->ilmiyloyha, function ($v) {
            return $v !== null && $v !== '';
        });

        \DB::transaction(function () use ($user, $data, $selected) {
            // Update user
            $user->update($data);

            // 1) Remove user_id from loyihalardan, agar ular now NOT in selected
            IlmiyLoyiha::where('user_id', $user->id)
                ->whereNotIn('id', $selected ?: [0]) // agar array bo'sh bo'lsa whereNotIn bo'lmasligi uchun
                ->update(['user_id' => null]);

            // 2) Assign selected projects to this user
            if (!empty($selected)) {
                IlmiyLoyiha::whereIn('id', $selected)
                    ->update(['user_id' => $user->id]);
            }
        });

        return redirect('/ilmiyloyiha')->with('status', 'User Updated Successfully');
    }

    public function edit(User $user)
    {
        $roles = Role::pluck('name', 'name')->all();
        $roles_superadmin = Role::pluck('name', 'name')->all();
        $userRoles = $user->roles->pluck('name', 'name')->all();
        $tashkilots = Tashkilot::all();
        $regions = Region::all();

        return view('role-permission.user.edit', [
            'user' => $user,
            'roles' => $roles,
            'userRoles' => $userRoles,
            'regions' => $regions,
            'roles_superadmin' => $roles_superadmin,
            'tashkilots' => $tashkilots
        ]);
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $data = $request->validated();

        if (!empty($request->password)) {
            $data += [
                'password' => Hash::make($request->password),
            ];
        }

        $user->update($data);
        $user->syncRoles($request->roles);

        return redirect('/users')->with('status', 'User Updated Successfully');
    }

    public function destroy($userId)
    {
        $user = User::findOrFail($userId);
        $user->delete();

        return redirect()->back()->with('status', 'User Delete Successfully');
    }

    public function toggleActive(User $user)
    {
        if ($user->id === Auth::id()) {
            return redirect()->back()->with('status', 'O‘zingizni faolsizlashtira olmaysiz.');
        }

        $user->update(['is_active' => ! $user->is_active]);

        return redirect()->back()->with('status', $user->is_active ? 'Foydalanuvchi faollashtirildi.' : 'Foydalanuvchi faolsizlashtirildi.');
    }

    public function profileview()
    {
        return view('admin.profile.index');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        if (!Hash::check($request->current_password, Auth::user()->password)) {
            return back()->withErrors(['current_password' => 'Eski parol noto‘g‘ri.']);
        }

        Auth::user()->update([
            'password' => Hash::make($request->new_password),
        ]);

        return redirect('/profileview')->with('status', 'Parol muvaffaqiyatli o‘zgartirildi!');
    }

    public function monitoring_working_group()
    {
        $users = User::query()
            ->whereHas('roles', function ($query) {
                $query->whereIn('id', [9, 18]); // Ishchi guruh azosi, Ekspert
            })
            ->with(['roles', 'tashkilot'])
            ->orderBy('group_id', 'asc')
            ->orderBy('region_id', 'asc')
            ->orderBy('name', 'asc')
            ->get()
            ->groupBy('group_id');

        return view('role-permission.user.working_group', ['users' => $users]);
    }

}
