@extends("layouts.admin")
@section("content")
    <div class="flex justify-between align-center mt-6 mb-6">

        <h2 class="intro-y text-lg font-medium">Foydalanuvchi qo'shish</h2>

        <a href="{{ url('users') }}" class="button w-24 bg-theme-1 text-white">
            Orqaga
        </a>
    </div>

    <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2 monitoring-form">
        <div class="w-full mt-3 sm:mt-0 sm:ml-auto md:ml-0">
            <form id="science-paper-create-form" method="POST" action="{{ url('users') }}" class="validate-form"
                enctype="multipart/form-data" novalidate="novalidate">
                @csrf
                <div class="grid grid-cols-12 gap-2">
                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"> <span
                                class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>F.I.Sh
                        </label>
                        <input type="text" name="name" class="input w-full border mt-2" value="{{ old('name') }}" required="">
                        @error('name')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"> <span
                                class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Login (foydalanuvchi email adresini
                            kiriting)
                        </label>
                        <input type="email" name="email" class="input w-full border mt-2" value="{{ old('email') }}" required="">
                        @error('email')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"> <span
                                class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Parolni kiriting
                        </label>
                        <input type="password" name="password" class="input w-full border mt-2" value="{{ old('password') }}" required="">
                        @error('password')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row mb-2"> <span
                                class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Tashkilotni tanlang
                        </label>
                        <select name="tashkilot_id" id="science-search-category" class="select2 w-full mt-2"
                            value="{{ old('tashkilot_id') }}" required="">
                            <option value="">Tashkilotni tanlang</option>
                            @foreach ($tashkilots as $tashkilot)
                                <option value="{{ $tashkilot->id }}">{{ $tashkilot->name }}</option>
                            @endforeach
                        </select>
                        @error('tashkilot_id')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"> <span
                                class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Roli (foydalanuvchining tizimdagi
                            rolini tanlang)
                        </label>
                        <select name="roles[]" class="input border w-full mt-2" required="">
                            <option value=""> Roli tanlang</option>
                            @foreach ($roles as $role)
                                <option value="{{ $role }}">{{ $role }}</option>
                            @endforeach
                        </select>
                        @error('roles')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row">Guruh
                        </label>
                        <select name="group_id" class="input border w-full mt-2">
                            <option value=""> Guruhni tanlash</option>
                            @for ($i = 1; $i <= 20; $i++)
                                <option value="{{ $i }}">{{ $i }}-guruh</option>
                            @endfor
                        </select>
                        @error('group_id')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"> Viloyat
                        </label>
                        <select name="region_id" class="input border w-full mt-2" value="{{ old('region_id') }}">
                            <option value=""> Viloyat tanlash</option>
                            @foreach ($regions as $region)
                                <option value="{{ $region->id }}">{{ $region->oz }}</option>
                            @endforeach
                        </select>
                        @error('region_id')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </form>
            <div class="px-5 pb-5 text-center mt-4">
                <a href="{{ url('users') }}" class="button delete-cancel w-32 border text-gray-700 mr-1">
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