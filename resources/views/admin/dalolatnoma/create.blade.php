@extends('layouts.admin')

@section('content')


<div class="flex justify-between align-center mt-10">

    <h2 class="intro-y text-lg font-medium">Dalolatnoma</h2>



</div><br>
<div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2" style="background: white;
    padding: 20px 20px;
    border-radius: 20px">
    <div class="w-full mt-3 sm:mt-0 sm:ml-auto md:ml-0">
        <form id="science-paper-create-form" method="POST" action="{{ route("dalolatnoma.store") }}"
            class="validate-form" enctype="multipart/form-data" novalidate="novalidate">
            @csrf
            <div class="grid grid-cols-12 gap-2">


                <!-- Dalolatnoma nomi -->
                <div class="w-full col-span-6">
                    <label class="flex flex-col sm:flex-row">
                        <span class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Dalolatnoma nomi
                    </label>
                    <input type="text" name="name" value="{{ old('name') }}" class="input w-full border mt-2"
                        required="">
                    @error('name')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Dalolatnoma raqami -->
                <div class="w-full col-span-6">
                    <label class="flex flex-col sm:flex-row">
                        <span class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Dalolatnoma raqami
                    </label>
                    <input type="text" name="raqami" value="{{ old('raqami') }}" class="input w-full border mt-2"
                        required="">
                    @error('raqami')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Joyiye obyekti -->
                <div class="w-full col-span-6">
                    <label class="flex flex-col sm:flex-row">
                        <span class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Joriy etish  obyekti
                    </label>
                    <input type="text" name="joyiye_obyekti" value="{{ old('joyiye_obyekti') }}"
                        class="input w-full border mt-2" required="">
                    @error('joyiye_obyekti')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Joyiye maqsadi -->
                <div class="w-full col-span-6">
                    <label class="flex flex-col sm:flex-row">
                        <span class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Joriy etish  maqsadi
                    </label>
                    <input type="text" name="joyiye_maqsadi" value="{{ old('joyiye_maqsadi') }}"
                        class="input w-full border mt-2" required="">
                    @error('joyiye_maqsadi')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Joyiye asos -->
                <div class="w-full col-span-6">
                    <label class="flex flex-col sm:flex-row">
                        <span class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Joriy etish uchun asos
                    </label>
                    <input type="text" name="joyiye_asos" value="{{ old('joyiye_asos') }}"
                        class="input w-full border mt-2" required="">
                    @error('joyiye_asos')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Joyiye tashkilot -->
                <div class="w-full col-span-6">
                    <label class="flex flex-col sm:flex-row">
                        <span class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Joriy etilgan  tashkilot
                    </label>
                    <input type="text" name="joyiye_tashkilot" value="{{ old('joyiye_tashkilot') }}"
                        class="input w-full border mt-2" required="">
                    @error('joyiye_tashkilot')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Joyiye tarmoq -->
                <div class="w-full col-span-6">
                    <label class="flex flex-col sm:flex-row">
                        <span class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Joriy etilgan  tarmoq
                    </label>
                    <input type="text" name="joyiye_tarmoq" value="{{ old('joyiye_tarmoq') }}"
                        class="input w-full border mt-2" required="">
                    @error('joyiye_tarmoq')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Asoslovchi hujjat -->
                <div class="w-full col-span-6">
                    <label class="flex flex-col sm:flex-row">
                        <span class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Asoslovchi hujjat
                    </label>
                    <input type="file" name="asoslovchi_hujjat" class="input w-full border mt-2" required="">
                    @error('asoslovchi_hujjat')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

            </div><br>
        </form><br>
        <div class="px-5 pb-5 text-center">
            <a href="{{ route('dalolatnoma.index') }}" class="button delete-cancel w-32 border text-gray-700 mr-1">
                Bekor qilish
            </a>
            <button type="submit" form="science-paper-create-form"
                class="update-confirm button w-24 bg-theme-1 text-white">
                Saqlash
            </button>
        </div>
    </div>
</div>



@endsection
