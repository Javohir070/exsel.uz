@extends('layouts.admin')
@section('content')
    <div class="flex justify-between align-center mt-6 mb-6">

        <h2 class="intro-y text-lg font-medium">Foydalanuvchi tahrirlash </h2>

        @role('super-admin')
        <a href="{{ url('users') }}" class="button w-24 bg-theme-1 text-white">
            Orqaga
        </a>
        @endrole
        @role('admin')
        <a href="{{ url('/') }}" class="button w-24 bg-theme-1 text-white">
            Orqaga
        </a>
        @endrole
    </div>

    <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2 monitoring-form">
        <div class="w-full mt-3 sm:mt-0 sm:ml-auto md:ml-0">
            <form id="science-paper-create-form" method="POST" action="{{ url('users/' . $user->id) }}"
                class="validate-form" enctype="multipart/form-data" novalidate="novalidate">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-12 gap-2">
                    @role(['super-admin', 'admin'])
                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"> <span
                                class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>F.I.Sh
                        </label>
                        <input type="text" name="name" value="{{ $user->name }}" class="input w-full border mt-2">
                    </div>
                    @endrole

                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"> <span
                                class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Login (foydalanuvchi email adresini
                            kiriting)
                        </label>
                        <input type="email" name="email" value="{{ $user->email }}" class="input w-full border mt-2"
                            required="">
                    </div>

                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"> Parolni kiriting
                        </label>
                        <input type="text" name="password" class="input w-full border mt-2">
                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    @role('admin')
                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"> <span
                                class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Rol (foydalanuvchining tizimdagi
                            roli)
                        </label>
                        <select name="roles[]" class="input border w-full mt-2" required="">
                            <option value=""> Rolni tanlang</option>
                            @foreach ($roles as $role)
                                @if ($role !== 'super-admin' && $role !== 'admin' && $role !== 'Itm-tashkilotlar')
                                    <option value="{{ $role }}" {{ in_array($role, $userRoles) ? 'selected' : '' }}>
                                        {{ $role }}
                                    </option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    @endrole

                    @role('super-admin')
                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"> <span
                                class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Rol (foydalanuvchining tizimdagi
                            roli)
                        </label>
                        <select name="roles[]" class="input border w-full mt-2" required="">
                            <option value=""> Rolni tanlang</option>
                            @foreach ($roles_superadmin as $role)
                                <option value="{{ $role }}" {{ in_array($role, $userRoles) ? 'selected' : '' }}>
                                    {{ $role }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"> Viloyat
                        </label>
                        <select name="region_id" class="input border w-full mt-2">
                            <option value=""> Viloyat tanlash</option>
                            @foreach ($regions as $region)
                                <option value="{{ $region->id }}" {{ $region->id == $user->region_id ? 'selected' : '' }}>
                                    {{ $region->oz }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"> <span
                                class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>guruh
                        </label>
                        <input type="number" name="group_id" min="0" class="input w-full border mt-2"
                            value="{{ $user->group_id }}">
                    </div>
                    @endrole
                </div>
            </form>

            <div class="px-5 pb-5 text-center mt-4">
                <a href="#" class="button delete-cancel w-32 border text-gray-700 mr-1">
                    Bekor qilish
                </a>
                <button type="submit" form="science-paper-create-form"
                    class="update-confirm button w-24 bg-theme-1 text-white">
                    Qo'shish
                </button>
            </div>

        </div>
    </div>
@endsection