<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAdminUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Asbobuskuna;
use App\Models\IlmiyLoyiha;
use App\Models\Kafedralar;
use App\Models\Laboratory;
use App\Models\Region;
use App\Models\Tashkilot;
use App\Models\Xodimlar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        $roleId = $request->query('role_id');
        $tashkilotId = $request->query('tashkilot_id');

        $query = User::query();

        if (!empty($roleId)) {
            $query->whereHas('roles', function ($q) use ($roleId) {
                $q->where('id', $roleId);
            });
        }

        if (!empty($tashkilotId)) {
            $query->where('tashkilot_id', $tashkilotId);
        }

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                    ->orWhere('email', 'like', '%' . $search . '%');
            });
        }

        $users = $query->with(['tashkilot', 'roles'])->paginate(15);
        $roles = Role::orderBy('name')->get(['id', 'name']);
        $tashkilots = Tashkilot::orderBy('name')->get(['id', 'name']);

        return view('role-permission.user.index', compact('users', 'roles', 'tashkilots'));
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

    public function create_tashkilot_users()
    {
        $roles = Role::pluck('name', 'name')->all();
        $tashkilots = Tashkilot::all();
        $regions = Region::all();

        return view('role-permission.tashkilot_users.create-admin', compact('roles', 'tashkilots', 'regions'));
    }

    public function tashkilot_users_store(StoreAdminUserRequest $request)
    {
        $data = $request->validated();
        $ilmiyloyihaId = $data['ilmiyloyiha_id'] ?? null;
        unset($data['ilmiyloyiha_id'], $data['asbobuskuna_id']);

        $data['password'] = Hash::make($request->password);
        $data['tashkilot_id'] = auth()->user()->tashkilot_id;

        $roles = $request->getResolvedRoles();
        $tashkilotId = auth()->user()->tashkilot_id;

        DB::transaction(function () use ($data, $roles, $ilmiyloyihaId, $tashkilotId) {
            $user = User::create($data);
            $user->syncRoles($roles);

            if ($ilmiyloyihaId) {
                IlmiyLoyiha::where('id', $ilmiyloyihaId)
                    ->where('tashkilot_id', $tashkilotId)
                    ->update(['user_id' => $user->id]);
            }
        });

        return redirect()->back()->with('status', 'Masul muvaffaqiyatli yaratildi va biriktirildi.');
    }

    public function ilmiy_loyha_masul_store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'password' => 'nullable|string|min:8|max:20',
            'ilmiyloyha' => 'required|array|min:1',
            'ilmiyloyha.*' => 'exists:ilmiy_loyihas,id',
            'form_source' => 'required|in:ilmiyloyiha_masul_create',
        ], [
            'name.required' => 'F.I.Sh kiritish majburiy.',
            'email.required' => 'Email kiritish majburiy.',
            'email.email' => 'To\'g\'ri email formatini kiriting.',
            'password.min' => 'Parol kamida 8 ta belgidan iborat bo\'lishi kerak.',
            'password.max' => 'Parol 20 ta belgidan oshmasligi kerak.',
            'ilmiyloyha.required' => 'Kamida bitta ilmiy loyihani tanlang.',
            'ilmiyloyha.min' => 'Kamida bitta ilmiy loyihani tanlang.',
            'ilmiyloyha.*.exists' => 'Tanlangan ilmiy loyiha topilmadi.',
        ]);

        $loyihaIds = array_values(array_filter($request->ilmiyloyha));
        $loyihalar = IlmiyLoyiha::whereIn('id', $loyihaIds)
            ->where('tashkilot_id', auth()->user()->tashkilot_id)
            ->get();

        if ($loyihalar->count() !== count($loyihaIds)) {
            return redirect()->back()
                ->withInput()
                ->withErrors(['ilmiyloyha' => 'Tanlangan loyihalardan ba\'zilari sizning tashkilotingizga tegishli emas.']);
        }

        $existingUser = User::where('email', $request->email)->first();

        if ($existingUser) {
            if ((int) $existingUser->tashkilot_id !== (int) auth()->user()->tashkilot_id) {
                return redirect()->back()
                    ->withInput()
                    ->withErrors(['email' => 'Bu email boshqa tashkilot foydalanuvchisiga tegishli.']);
            }
        } elseif (! $request->filled('password')) {
            return redirect()->back()
                ->withInput()
                ->withErrors(['password' => 'Yangi foydalanuvchi uchun parol kiritish majburiy.']);
        }

        $statusMessage = 'Masul muvaffaqiyatli biriktirildi.';

        DB::transaction(function () use ($request, $loyihalar, $existingUser, &$statusMessage) {
            if ($existingUser) {
                $existingUser->update(['name' => $request->name]);

                if ($request->filled('password')) {
                    $existingUser->update(['password' => Hash::make($request->password)]);
                }

                if (! $existingUser->hasRole('Ilmiy_loyiha_rahbari')) {
                    $existingUser->assignRole('Ilmiy_loyiha_rahbari');
                }

                $user = $existingUser;
                $statusMessage = 'Mavjud masul tanlangan loyihalarga biriktirildi.';
            } else {
                $user = User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'tashkilot_id' => auth()->user()->tashkilot_id,
                    'password' => Hash::make($request->password),
                ]);

                $user->syncRoles(['Ilmiy_loyiha_rahbari']);
            }

            IlmiyLoyiha::whereIn('id', $loyihalar->pluck('id'))
                ->update(['user_id' => $user->id]);
        });

        return redirect()->back()->with('status', $statusMessage);
    }

    public function asbobuskuna_masul_store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'password' => 'nullable|string|min:8|max:20',
            'form_source' => 'required|in:asbobuskuna_masul_create',
        ], [
            'name.required' => 'F.I.Sh kiritish majburiy.',
            'email.required' => 'Email kiritish majburiy.',
            'email.email' => 'To\'g\'ri email formatini kiriting.',
            'password.min' => 'Parol kamida 8 ta belgidan iborat bo\'lishi kerak.',
            'password.max' => 'Parol 20 ta belgidan oshmasligi kerak.',
        ]);

        $existingUser = User::where('email', $request->email)->first();

        if ($existingUser) {
            if ((int) $existingUser->tashkilot_id !== (int) auth()->user()->tashkilot_id) {
                return redirect()->back()
                    ->withInput()
                    ->withErrors(['email' => 'Bu email boshqa tashkilot foydalanuvchisiga tegishli.']);
            }
        } elseif (! $request->filled('password')) {
            return redirect()->back()
                ->withInput()
                ->withErrors(['password' => 'Yangi foydalanuvchi uchun parol kiritish majburiy.']);
        }

        $statusMessage = 'Masul muvaffaqiyatli qo\'shildi.';

        DB::transaction(function () use ($request, $existingUser, &$statusMessage) {
            if ($existingUser) {
                $existingUser->update(['name' => $request->name]);

                if ($request->filled('password')) {
                    $existingUser->update(['password' => Hash::make($request->password)]);
                }

                if (! $existingUser->hasRole('Asbob_uskunalarga_masul')) {
                    $existingUser->assignRole('Asbob_uskunalarga_masul');
                }

                $statusMessage = 'Mavjud foydalanuvchiga masul roli biriktirildi.';
            } else {
                $user = User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'tashkilot_id' => auth()->user()->tashkilot_id,
                    'password' => Hash::make($request->password),
                ]);

                $user->syncRoles(['Asbob_uskunalarga_masul']);
            }
        });

        return redirect()->back()->with('status', $statusMessage);
    }

    public function asbobuskuna_masul_edit(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'password' => 'nullable|string|min:8|max:20',
        ], [
            'name.required' => 'F.I.Sh kiritish majburiy.',
            'password.min' => 'Parol kamida 8 ta belgidan iborat bo\'lishi kerak.',
        ]);

        $user = User::findOrFail($id);

        $data = ['name' => $request->name];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect()->back()->with('status', 'Masul ma\'lumotlari yangilandi.');
    }

    public function kafedra_masul_store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'password' => 'nullable|string|min:8|max:20',
            'kafedra' => 'required|exists:kafedralars,id',
            'form_source' => 'required|in:kafedra_masul_create',
        ], [
            'name.required' => 'F.I.Sh kiritish majburiy.',
            'email.required' => 'Email kiritish majburiy.',
            'email.email' => 'To\'g\'ri email formatini kiriting.',
            'password.min' => 'Parol kamida 8 ta belgidan iborat bo\'lishi kerak.',
            'password.max' => 'Parol 20 ta belgidan oshmasligi kerak.',
            'kafedra.required' => 'Kafedrani tanlang.',
            'kafedra.exists' => 'Tanlangan kafedra topilmadi.',
        ]);

        $kafedraId = (int) $request->kafedra;
        $kafedra = Kafedralar::where('id', $kafedraId)
            ->where('tashkilot_id', auth()->user()->tashkilot_id)
            ->first();

        if (! $kafedra) {
            return redirect()->back()
                ->withInput()
                ->withErrors(['kafedra' => 'Tanlangan kafedra sizning tashkilotingizga tegishli emas.']);
        }

        $existingUser = User::where('email', $request->email)->first();

        if ($existingUser) {
            if ((int) $existingUser->tashkilot_id !== (int) auth()->user()->tashkilot_id) {
                return redirect()->back()
                    ->withInput()
                    ->withErrors(['email' => 'Bu email boshqa tashkilot foydalanuvchisiga tegishli.']);
            }

            $otherKafedra = Kafedralar::where('user_id', $existingUser->id)
                ->where('id', '!=', $kafedraId)
                ->first();

            if ($otherKafedra) {
                return redirect()->back()
                    ->withInput()
                    ->withErrors(['email' => 'Bu foydalanuvchi allaqachon "' . $otherKafedra->name . '" kafedrasiga biriktirilgan. Bitta masul faqat bitta kafedraga biriktirilishi mumkin.']);
            }
        } elseif (! $request->filled('password')) {
            return redirect()->back()
                ->withInput()
                ->withErrors(['password' => 'Yangi foydalanuvchi uchun parol kiritish majburiy.']);
        }

        $statusMessage = 'Masul muvaffaqiyatli biriktirildi.';

        DB::transaction(function () use ($request, $kafedraId, $existingUser, &$statusMessage) {
            if ($existingUser) {
                $existingUser->update(['name' => $request->name]);

                if ($request->filled('password')) {
                    $existingUser->update(['password' => Hash::make($request->password)]);
                }

                if (! $existingUser->hasRole('kafedra_mudiri')) {
                    $existingUser->assignRole('kafedra_mudiri');
                }

                $user = $existingUser;
                $statusMessage = 'Mavjud masul tanlangan kafedraga biriktirildi.';
            } else {
                $user = User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'tashkilot_id' => auth()->user()->tashkilot_id,
                    'kafedralar_id' => $kafedraId,
                    'password' => Hash::make($request->password),
                ]);

                $user->syncRoles(['kafedra_mudiri']);
            }

            Kafedralar::where('user_id', $user->id)
                ->where('id', '!=', $kafedraId)
                ->update(['user_id' => null]);

            $previousMasulId = Kafedralar::where('id', $kafedraId)->value('user_id');
            if ($previousMasulId && (int) $previousMasulId !== (int) $user->id) {
                User::where('id', $previousMasulId)->update(['kafedralar_id' => null]);
            }

            Kafedralar::where('id', $kafedraId)->update(['user_id' => $user->id]);
            $user->update(['kafedralar_id' => $kafedraId]);
        });

        return redirect()->back()->with('status', $statusMessage);
    }

    public function kafedra_masul_edit(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'password' => 'nullable|string|min:8|max:20',
            'kafedra' => 'required|exists:kafedralars,id',
        ], [
            'name.required' => 'F.I.Sh kiritish majburiy.',
            'kafedra.required' => 'Kafedrani tanlang.',
            'kafedra.exists' => 'Tanlangan kafedra topilmadi.',
            'password.min' => 'Parol kamida 8 ta belgidan iborat bo\'lishi kerak.',
        ]);

        $user = User::findOrFail($id);
        $kafedraId = (int) $request->kafedra;

        $kafedra = Kafedralar::where('id', $kafedraId)
            ->where('tashkilot_id', auth()->user()->tashkilot_id)
            ->first();

        if (! $kafedra) {
            return redirect()->back()->withErrors(['kafedra' => 'Tanlangan kafedra sizning tashkilotingizga tegishli emas.']);
        }

        $otherKafedra = Kafedralar::where('user_id', $user->id)
            ->where('id', '!=', $kafedraId)
            ->first();

        if ($otherKafedra) {
            return redirect()->back()->withErrors(['kafedra' => 'Bu masul allaqachon "' . $otherKafedra->name . '" kafedrasiga biriktirilgan.']);
        }

        $data = ['name' => $request->name];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        DB::transaction(function () use ($user, $data, $kafedraId) {
            $user->update($data);

            Kafedralar::where('user_id', $user->id)
                ->where('id', '!=', $kafedraId)
                ->update(['user_id' => null]);

            $previousMasulId = Kafedralar::where('id', $kafedraId)->value('user_id');
            if ($previousMasulId && (int) $previousMasulId !== (int) $user->id) {
                User::where('id', $previousMasulId)->update(['kafedralar_id' => null]);
            }

            Kafedralar::where('id', $kafedraId)->update(['user_id' => $user->id]);
            $user->update(['kafedralar_id' => $kafedraId]);
        });

        return redirect()->back()->with('status', 'Masul ma\'lumotlari yangilandi.');
    }

    public function laboratory_masul_store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'password' => 'nullable|string|min:8|max:20',
            'laboratory' => 'required|exists:laboratories,id',
            'form_source' => 'required|in:laboratory_masul_create',
        ], [
            'name.required' => 'F.I.Sh kiritish majburiy.',
            'email.required' => 'Email kiritish majburiy.',
            'email.email' => 'To\'g\'ri email formatini kiriting.',
            'password.min' => 'Parol kamida 8 ta belgidan iborat bo\'lishi kerak.',
            'password.max' => 'Parol 20 ta belgidan oshmasligi kerak.',
            'laboratory.required' => 'Laboratoriyani tanlang.',
            'laboratory.exists' => 'Tanlangan laboratoriya topilmadi.',
        ]);

        $laboratoryId = (int) $request->laboratory;
        $laboratory = Laboratory::where('id', $laboratoryId)
            ->where('tashkilot_id', auth()->user()->tashkilot_id)
            ->first();

        if (! $laboratory) {
            return redirect()->back()
                ->withInput()
                ->withErrors(['laboratory' => 'Tanlangan laboratoriya sizning tashkilotingizga tegishli emas.']);
        }

        $existingUser = User::where('email', $request->email)->first();

        if ($existingUser) {
            if ((int) $existingUser->tashkilot_id !== (int) auth()->user()->tashkilot_id) {
                return redirect()->back()
                    ->withInput()
                    ->withErrors(['email' => 'Bu email boshqa tashkilot foydalanuvchisiga tegishli.']);
            }

            $otherLab = Laboratory::where('user_id', $existingUser->id)
                ->where('id', '!=', $laboratoryId)
                ->first();

            if ($otherLab) {
                return redirect()->back()
                    ->withInput()
                    ->withErrors(['email' => 'Bu foydalanuvchi allaqachon "' . $otherLab->name . '" laboratoriyasiga biriktirilgan. Bitta masul faqat bitta laboratoriyaga biriktirilishi mumkin.']);
            }
        } elseif (! $request->filled('password')) {
            return redirect()->back()
                ->withInput()
                ->withErrors(['password' => 'Yangi foydalanuvchi uchun parol kiritish majburiy.']);
        }

        $statusMessage = 'Masul muvaffaqiyatli biriktirildi.';

        DB::transaction(function () use ($request, $laboratoryId, $existingUser, &$statusMessage) {
            if ($existingUser) {
                $existingUser->update(['name' => $request->name]);

                if ($request->filled('password')) {
                    $existingUser->update(['password' => Hash::make($request->password)]);
                }

                if (! $existingUser->hasRole('labaratoriyaga_masul')) {
                    $existingUser->assignRole('labaratoriyaga_masul');
                }

                $user = $existingUser;
                $statusMessage = 'Mavjud masul tanlangan laboratoriyaga biriktirildi.';
            } else {
                $user = User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'tashkilot_id' => auth()->user()->tashkilot_id,
                    'laboratory_id' => $laboratoryId,
                    'password' => Hash::make($request->password),
                ]);

                $user->syncRoles(['labaratoriyaga_masul']);
            }

            Laboratory::where('user_id', $user->id)
                ->where('id', '!=', $laboratoryId)
                ->update(['user_id' => null]);

            $previousMasulId = Laboratory::where('id', $laboratoryId)->value('user_id');
            if ($previousMasulId && (int) $previousMasulId !== (int) $user->id) {
                User::where('id', $previousMasulId)->update(['laboratory_id' => null]);
            }

            Laboratory::where('id', $laboratoryId)->update(['user_id' => $user->id]);
            $user->update(['laboratory_id' => $laboratoryId]);
        });

        return redirect()->back()->with('status', $statusMessage);
    }

    public function laboratory_masul_edit(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'password' => 'nullable|string|min:8|max:20',
            'laboratory' => 'required|exists:laboratories,id',
        ], [
            'name.required' => 'F.I.Sh kiritish majburiy.',
            'laboratory.required' => 'Laboratoriyani tanlang.',
            'laboratory.exists' => 'Tanlangan laboratoriya topilmadi.',
            'password.min' => 'Parol kamida 8 ta belgidan iborat bo\'lishi kerak.',
        ]);

        $user = User::findOrFail($id);
        $laboratoryId = (int) $request->laboratory;

        $laboratory = Laboratory::where('id', $laboratoryId)
            ->where('tashkilot_id', auth()->user()->tashkilot_id)
            ->first();

        if (! $laboratory) {
            return redirect()->back()->withErrors(['laboratory' => 'Tanlangan laboratoriya sizning tashkilotingizga tegishli emas.']);
        }

        $otherLab = Laboratory::where('user_id', $user->id)
            ->where('id', '!=', $laboratoryId)
            ->first();

        if ($otherLab) {
            return redirect()->back()->withErrors(['laboratory' => 'Bu masul allaqachon "' . $otherLab->name . '" laboratoriyasiga biriktirilgan.']);
        }

        $data = ['name' => $request->name];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        DB::transaction(function () use ($user, $data, $laboratoryId) {
            $user->update($data);

            Laboratory::where('user_id', $user->id)
                ->where('id', '!=', $laboratoryId)
                ->update(['user_id' => null]);

            $previousMasulId = Laboratory::where('id', $laboratoryId)->value('user_id');
            if ($previousMasulId && (int) $previousMasulId !== (int) $user->id) {
                User::where('id', $previousMasulId)->update(['laboratory_id' => null]);
            }

            Laboratory::where('id', $laboratoryId)->update(['user_id' => $user->id]);
            $user->update(['laboratory_id' => $laboratoryId]);
        });

        return redirect()->back()->with('status', 'Masul ma\'lumotlari yangilandi.');
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

        DB::transaction(function () use ($user, $data, $selected) {
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

        return redirect()->back()->with('status', 'User Updated Successfully');
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
