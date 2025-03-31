@extends('layouts.admin')

@section('content')


<div class="flex justify-between align-center mt-10">

    <h2 class="intro-y text-lg font-medium">Yosh olim qo'shish</h2>



</div><br>
<div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2" style="background: white;
    padding: 20px 20px;
    border-radius: 20px">
    <div class="w-full mt-3 sm:mt-0 sm:ml-auto md:ml-0">
        <form id="science-paper-create-form" method="POST" action="{{ route("stajirovka.store") }}"
            class="validate-form" enctype="multipart/form-data" novalidate="novalidate">
            @csrf
            <div class="grid grid-cols-12 gap-2">
                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"> <span
                        class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Yosh olimning F.I.O
                        </label>
                        <input type="text" name="fish" value="{{ old('fish') }}" class="input w-full border mt-2" required="">
                        @error('fish')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"> <span
                        class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Yosh olimning lavozimi
                        </label>
                        <input type="text" name="lavozim" value="{{ old('lavozim') }}" class="input w-full border mt-2" required="">
                        @error('lavozim')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"> <span
                        class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Stajirovkaga yuborilgan yili
                        </label>
                        {{-- <input type="text" name="yil" value="{{ old('yil') }}" class="input w-full border mt-2" required=""> --}}
                        <select name="yil" value="{{ old('yil') }}" class="science-sub-categoryyil input border w-full mt-2 " required="">
                            <option value=""></option>
                        </select>
                        @error('yil')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"> <span
                        class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Ilmiy stajirovka yo‘nalishi
                        </label>
                        <input type="text" name="yunalishi" value="{{ old('yunalishi') }}" class="input w-full border mt-2" required="">
                        @error('yunalishi')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"> <span
                        class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Ilmiy hisobot taqdim etilganligi (Pdf)
                        </label>
                        <input type="file" name="ilmiy_hisobot" value="{{ old('ilmiy_hisobot') }}" class="input w-full border mt-2" required="">
                        @error('ilmiy_hisobot')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"> <span
                        class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Stajirovka davrida egallangan bilim va ko'nikmalarni amalga oshirilishi uchun zarur shart-sharoitlar yaratilganligi. (Asoslantiruvchi hujjatlar, rasm va videolar, zip)
                        </label>
                        <input type="file" name="egallangan_bilim" value="{{ old('egallangan_bilim') }}" class="input w-full border mt-2" required="">
                        @error('egallangan_bilim')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"> <span
                        class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Ilmiy-tadqiqot ishlari natijalari bo'yicha xorijiy ilmiy anjumanlarda ma'ruza bilan ishtirok etganligi. (Asoslantiruvchi hujjatlar, rasm va videolar hamda havolalar, zip)
                        </label>
                        <input type="file" name="ishlar_natijalari" value="{{ old('ishlar_natijalari') }}" class="input w-full border mt-2" required="">
                        @error('ishlar_natijalari')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"> <span
                        class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Xalqaro tan olingan ma'lumotlar bazasidagi yetakchi ilmiy jurnallarda nashr qilinganligi. (Pdf)
                        </label>
                        <input type="file" name="xalqarotan_jur_nashr" value="{{ old('xalqarotan_jur_nashr') }}" class="input w-full border mt-2" required="">
                        @error('xalqarotan_jur_nashr')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"> <span
                        class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Kamida bir yil davomida Agentlik tomonidan tashkil etiladigan va boshqa tadbirlarda stajirovka davrida to'plangan tajribalar va olgan bilim va ko'nikmalari borasida o'z fikr va mulohazalarini bayon etilganligi tafsiloti. (Asoslantiruvchi hujjatlar, rasm va videolar hamda havolalar, zip)
                        </label>
                        <input type="file" name="biryil_davomida" value="{{ old('biryil_davomida') }}" class="input w-full border mt-2" required="">
                        @error('biryil_davomida')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

            </div><br>
        </form><br>
        <div class="px-5 pb-5 text-center">
            <a href="#"  class="button delete-cancel w-32 border text-gray-700 mr-1">
                Bekor qilish
            </a>
            <button type="submit" form="science-paper-create-form" class="update-confirm button w-24 bg-theme-1 text-white">
                Saqlash
            </button>
        </div>
    </div>
</div>

<script>
    // Boshlang'ich va tugash yillari
    var startYear = 2010;
    var endYear = 2025;

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
