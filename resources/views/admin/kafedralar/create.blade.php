@extends('layouts.admin')

@section('content')


    <div class="flex justify-between align-center mt-10">

        <h2 class="intro-y text-lg font-medium">Kafedra</h2>



    </div><br>
    <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2" style="background: white;
        padding: 20px 20px;
        border-radius: 20px">
        <div class="w-full mt-3 sm:mt-0 sm:ml-auto md:ml-0">
            <form id="science-paper-create-form" method="POST" action="{{ route("kafedralar.store") }}"
                class="validate-form" enctype="multipart/form-data" novalidate="novalidate">
                @csrf
                <div class="grid grid-cols-12 gap-2">
                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"> <span
                                class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Kafedra nomi
                        </label>
                        <input type="text" name="name" value="{{ old('name') }}" class="input w-full border mt-2"
                            required="">
                        @error('name')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"> <span
                                class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Tashkil etilgan yili
                        </label>
                        <!-- <input type="number" name="tash_yil" value="{{ old('tash_yil') }}" class="input w-full border mt-2" required=""> -->
                        <select name="tash_yil" value="{{ old('tash_yil') }}"
                            class="science-sub-categoryyil input border w-full mt-2 " required="">
                            <option value=""></option>
                        </select>
                        @error('tash_yil')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"> <span
                                class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Fakultetni tanlang
                        </label>
                        <select name="fakultetlar_id" class="input border w-full mt-2" required="">
                            <option value=""> </option>
                            @foreach ($fakultetlar as $role)
                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach
                            <!-- <option value=""> </option> -->
                        </select>
                    </div>


                </div><br>
            </form><br>
            <div class="px-5 pb-5 text-center">
                <a href="{{ route('kafedralar.index') }}" class="button delete-cancel w-32 border text-gray-700 mr-1">
                    Bekor qilish
                </a>
                <button type="submit" form="science-paper-create-form"
                    class="update-confirm button w-24 bg-theme-1 text-white">
                    Saqlash
                </button>
            </div>
        </div>
    </div>

    <script>
        // Boshlang'ich va tugash yillari
        var startYear = 1960;
        var endYear = 2024;

        // Barcha class nomi 'science-sub-category' bo'lgan select elementlarini olish
        var selects = document.getElementsByClassName('science-sub-categoryyil');

        // Har bir select elementi uchun sikl
        for (var i = 0; i < selects.length; i++) {
            var select = selects[i];

            // Har bir select elementi uchun yillarni qo'shish
            for (var year = endYear; year >= startYear; year--) {
                var option = document.createElement('option');
                option.value = year;
                option.text = year;
                option.className = 'year-option'; // Class qo'shish
                select.appendChild(option);
            }
        }
    </script>

@endsection
