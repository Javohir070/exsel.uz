@extends('layouts.admin')

@section('content')


<div class="flex justify-between align-center mt-10">

    <h2 class="intro-y text-lg font-medium">Xodim qo'shish</h2>



</div><br>
<div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2" style="background: white;
    padding: 20px 20px;
    border-radius: 20px">
    <div class="w-full mt-3 sm:mt-0 sm:ml-auto md:ml-0">
        <form id="science-paper-create-form" method="POST" action="{{ route("xodimlar.store") }}" class="validate-form"
            enctype="multipart/form-data" novalidate="novalidate">
            @csrf
            <div class="grid grid-cols-12 gap-2">
                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> F.I.Sh
                    </label>
                    <input type="text" name="fish" value="{{ old('fish') }}" class="input w-full border mt-2" required="">
                    @error('fish')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <!-- <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Jshshir
                    </label>
                    <input type="text" name="jshshir" value="{{ old('jshshir') }}" class="input w-full border mt-2" required="">
                    @error('jshshir')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div> -->

                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Tug‘ilgan yili
                    </label>
                    <!-- <input type="text" id="datepicker" name="yil" value="{{ old('yil') }}" class="datepicker input w-full border mt-2" required=""> -->
                    <input type="date" id="datepicker" name="yil" value="{{ old('yil') }}"   class=" input w-full border mt-2" required="">
                    @error('yil')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="w-full col-span-6">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Jinsi
                    </label>
                    <select name="jinsi" value="{{ old('jinsi') }}" id="science-sub-category" class="input border w-full mt-2" required="">

                        <option value="">Jinsni tanlang</option>

                        <option value="Erkak">Erkak</option>

                        <option value="Ayol">Ayol</option>

                    </select>
                    @error('jinsi')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="w-full col-span-6">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Ish tartibi
                    </label>
                    <select name="ish_tartibi" id="ish_tartibi" value="{{ old('ish_tartibi') }}" id="science-sub-category" class="input border w-full mt-2" required="">

                        <option value="">Ish tartibini tanlang</option>

                        <option value="Asosiy">Asosiy</option>

                        <option value="O‘rindoshlik">O‘rindoshlik</option>

                        <option value="Soatbay">Soatbay</option>

                    </select>
                    @error('ish_tartibi')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                

                <div class="w-full col-span-6">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Shtat birligi
                    </label>
                    <select name="shtat_birligi" value="{{ old('shtat_birligi') }}" id="science-sub-category" class="input border w-full mt-2" >

                        <option value="">Shtat birligini tanlang</option>

                        <option value="0.25">0.25</option>

                        <option value="0.5">0.5</option>

                        <option value="0.75">0.75</option>

                        <option value="1">1</option>

                        <option value="1.25">1.25</option>

                        <option value="1.5">1.5</option>

                    </select>
                    @error('shtat_birligi')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>
                <div class="w-full col-span-6">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Lavozimi
                    </label>
                    <!-- <input type="text" name="lavozimi"  class="input w-full border mt-2" required=""> -->
                    
                    <select name="lavozimi" value="{{ old('lavozimi') }}" id="science-sub-category" class="input border w-full mt-2" required="">
                        <option value="">Lavozini tanlang</option>
                        <option value="Dekan o‘rinbosari">Dekan o‘rinbosari</option>
                        <option value="Kafedra mudiri">Kafedra mudiri</option>
                        <option value="Professor">Professor</option>
                        <option value="Dotsent">Dotsent</option>
                        <option value="Katta o‘qituvchi">Katta o‘qituvchi</option>
                        <option value="Assistent, o‘qituvchi">Assistent, o‘qituvchi</option>
                        <option value="O‘qituvchi-stajer">O‘qituvchi-stajer</option>
                        <option value="Rektor">Rektor</option> 
                        <option value="Boshqarma boshlig‘i">Boshqarma boshlig‘i</option> 
                        <option value="Direktor">Direktor</option>
                        <option value="Prorektor">Prorektor</option>
                        <option value="Filial direktorining o‘rinbosari">Filial direktorining o‘rinbosari</option>
                        <option value="Dekan">Dekan</option>
                        <option value="Filial direktori">Filial direktori</option>
                        <option value="Ilmiy kotib">Ilmiy kotib</option> 
                        <option value="Ilmiy ishlar bo‘yicha direktor o‘rinbosari">Ilmiy ishlar bo‘yicha direktor o‘rinbosari</option> 
                        <option value="Ilmiy-tadqiqot laboratoriyasi (bo‘lim) mudiri">Ilmiy-tadqiqot laboratoriyasi (bo‘lim) mudiri</option> 
                        <option value="Umumiy masalalar bo‘yicha direktor o‘rinbosari">Umumiy masalalar bo‘yicha direktor o‘rinbosari</option> 
                        <option value="Moliya-iqtisod bo‘limi boshlig‘i">Moliya-iqtisod bo‘limi boshlig‘i</option> 

                        <option value="Boshqarma boshlig‘i">Boshqarma boshlig‘i</option> 
                        <option value="Bosh muhandis">Bosh muhandis</option> 
                        <option value="Bosh energetik">Bosh energetik</option> 
                        <option value="Bosh mexanik">Bosh mexanik</option> 
                        <option value="Mutaxassis">Mutaxassis</option> 
                        <option value="Expert">Expert</option> 
                        <option value="Hisobchi">Hisobchi</option> 
                        <option value="Ilmiy maslahatchi">Ilmiy maslahatchi</option> 
                        <option value="Maslahatchi">Maslahatchi</option> 
                        <option value="Laborant">Laborant</option> 
                        <option value="Kadrlar bo‘yicha mutaxassis">Kadrlar bo‘yicha mutaxassis</option> 
                        
                        <option value="Bo‘lim boshlig‘i">Bo‘lim boshlig‘i</option> 
                        <option value="Yetakchi muhandis">Yetakchi muhandis</option> 
                        <option value="Bosh ilmiy xodim">Bosh ilmiy xodim</option> 
                        <option value="Yetakchi ilmiy xodim">Yetakchi ilmiy xodim</option> 
                        <option value="Katta ilmiy xodim">Katta ilmiy xodim</option> 
                        <option value="Kichik ilmiy xodim">Kichik ilmiy xodim</option>
                        <option value="Ishlab chiqarish bo‘yicha direktor o‘rinbosari">Ishlab chiqarish bo‘yicha direktor o‘rinbosari</option> 


                    </select><br>
                    @error('lavozimi')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>
                

                <div class="w-full col-span-6">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Pedagogik faoliyat bilan
                        shug‘ullanishi
                    </label>
                    <select name="pedagoglik" value="{{ old('pedagoglik') }}" id="science-sub-category" class="input border w-full mt-2" required="">

                        <option value="">Pedagogik faoliyat bilan shug‘ullanishi tanlang</option>

                        <option value="ha">ha</option>

                        <option value="yoq">yoq</option>

                    </select><br>
                    @error('pedagoglik')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="w-full col-span-6 " style="display: none;" id="orindoshlik-input">
                    <label class="flex flex-col sm:flex-row"> O‘rindoshlik asosida ishlaydigan xodimning asosiy ish joyi
                        bo‘lgan tashkilot
                    </label>
                    <input type="text" name="urindoshlik_asasida" value="{{ old('urindoshlik_asasida') }}" class="input w-full border mt-2" required="">
                    @error('urindoshlik_asasida')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="w-full col-span-6">
                    <label class="flex flex-col sm:flex-row">  Ma’lumoti
                    </label>
                    <!-- <input type="text" name="malumoti" value="{{ old('malumoti') }}" class="input w-full border mt-2"> -->
                    <select name="malumoti" value="{{ old('malumoti') }}" id="science-sub-category" class="input border w-full mt-2" required="">

                        <option value="">Ma’lumotini tanlang</option>

                        <option value="Oliy">Oliy</option>

                        <option value="O'rta maxsus">O'rta maxsus</option>

                    </select><br>
                    @error('malumoti')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="w-full col-span-6">
                    <label class="flex flex-col sm:flex-row">  O‘zbekiston Fanlar akademiyasi
                        haqiqiy a’zosi 
                    </label>
                    <!-- <input type="text" name="uzbek_panlar_azosi" value="{{ old('uzbek_panlar_azosi') }}" class="input w-full border mt-2"> -->
                    <select name="uzbek_panlar_azosi" value="{{ old('uzbek_panlar_azosi') }}" id="science-sub-category" class="input border w-full mt-2" required="">

                        <option value="">O‘zbekiston Fanlar akademiyasi
                        haqiqiy tanlang</option>

                        <option value="Ha , Akademik">Ha , Akademik</option>

                        <option value="Mavjud emas">Mavjud emas</option>

                    </select><br>
                    @error('uzbek_panlar_azosi')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="w-full col-span-6">
                    <label class="flex flex-col sm:flex-row">  Ilmiy darajasi</label>
                    <select name="ilmiy_daraja" id="ilmiy_daraja" value="{{ old('ilmiy_daraja') }}" id="science-sub-category" class="input border w-full mt-2">

                        <option value="">Ilmiy darajasini tanlang</option>

                        <option value="Fan nomzodi">Fan nomzodi</option>

                        <option value="Falsafa doktori (PhD)">Falsafa doktori (PhD)</option>

                        <option value="Fan doktori (DSc)">Fan doktori (DSc)</option>

                        <option value="Fan doktori">Fan doktori</option>

                        <option value="Akademik">Akademik</option>
                        <option value="yoq">yoq</option>

                    </select><br>
                    @error('ilmiy_daraja')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="w-full col-span-6 " id="ilmiy-daraja-input" style="display: none;">
                    <label class="flex flex-col sm:flex-row">  Ilmiy daraja olingan yili
                    </label>
                    <!-- <input type="number" name="ilmiy_daraja_yil" value="{{ old('ilmiy_daraja_yil') }}" class="input w-full border mt-2" required=""
                    > -->
                    <select name="ilmiy_daraja_yil" value="{{ old('ilmiy_daraja_yil') }}" class="science-sub-categoryyil input border w-full mt-2 " required="">
                        <option value="">yil tanlang</option>
                    </select>
                    @error('ilmiy_daraja_yil')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="w-full col-span-6">
                    <label class="flex flex-col sm:flex-row">  Ilmiy unvoni
                    </label>
                    <select name="ilmiy_unvoni" id="ilmiy_unvoni" value="{{ old('ilmiy_unvoni') }}" id="science-sub-category" class="input border w-full mt-2">

                        <option value="">Ilmiy unvonini tanlang</option>

                        <option value="Professor">Professor</option>

                        <option value="Dotsent">Dotsent</option>
                        <option value="Katta ilmiy xodim">Katta ilmiy xodim</option>
                        <option value="Akademik">Akademik</option>
                        <option value="yoq">yoq</option>

                    </select><br>
                    @error('ilmiy_unvoni')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>


                <div class="w-full col-span-6 " id="ilmiy-unvon-input" style="display: none;">
                    <label class="flex flex-col sm:flex-row"> Ilmiy unvon olingan
                        yili
                    </label>
                    <!-- <input type="number" name="ilmiy_unvoni_y" value="{{ old('ilmiy_unvoni_y') }}" class="input w-full border mt-2" required=""> -->
                    @error('ilmiy_unvoni_y')
                        <div class="error">{{ $message }}</div>
                    @enderror

                    <select name="ilmiy_unvoni_y" value="{{ old('ilmiy_unvoni_y') }}" class="science-sub-categoryyil input border w-full mt-2 " required="">
                        <option value="">yil tanlang</option>
                    </select>
                </div>

                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row">  Ixtisosligi
                    </label>
                    <input type="text" name="ixtisosligi" value="{{ old('ixtisosligi') }}" class="input w-full border mt-2">
                    @error('ixtisosligi')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Telefon raqami
                    </label>
                    <input type="tel" name="phone" placeholder="+998 90 123 45 67" value="{{ old('phone') }}" class="input w-full border mt-2" required="">
                    @error('phone')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Email
                    </label>
                    <input type="email" name="email" value="{{ old('email') }}" class="input w-full border mt-2" required="">
                    @error('email')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>
                <div class="w-full col-span-6 " >
                    <label class="flex flex-col sm:flex-row">   Laboratoriyani tanlang</label>
                    <select name="laboratory_id" value="{{old('laboratory_id')}}"  class="input border w-full mt-2" >

                        <option value="">laboratoriyani  tanlang</option>
                        @foreach ($laboratorylar as $laboratory)
                            <option value="{{ $laboratory->id }}">{{ $laboratory->name }}</option>
                        @endforeach
                            <option value="">yo'q</option>

                    </select><br>
                    @error('laboratory_id')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </form><br>
        <div class="px-5 pb-5 text-center">
            @if (auth()->user()->hasRole('labaratoriyaga_masul'))
                <a href="{{ route('lab_xodimlar.index') }}"  class="button delete-cancel w-32 border text-gray-700 mr-1">
                    Bekor qilish
                </a>
            @else
                <a href="{{ route('xodimlar.index') }}"  class="button delete-cancel w-32 border text-gray-700 mr-1">
                    Bekor qilish
                </a>
            @endif

            <button type="submit" form="science-paper-create-form"
                class="update-confirm button w-24 bg-theme-1 text-white">
                Qo'shish
            </button>
        </div>
    </div>
</div><br>

<script type="text/javascript">
    document.getElementById('ish_tartibi').addEventListener('change', function() {
        var selectedOption = this.value;
        var orindoshlikInput = document.getElementById('orindoshlik-input');
        
        if (selectedOption === 'O‘rindoshlik') {
            orindoshlikInput.style.display = 'block'; // Inputni ko'rsatish
        } else {
            orindoshlikInput.style.display = 'none';  // Inputni yashirish
        }
    });
</script>

<script type="text/javascript">
    document.getElementById('ilmiy_daraja').addEventListener('change', function() {
        var selectedOption = this.value;
        var ilmiyDarajaInput = document.getElementById('ilmiy-daraja-input');
        var validOptions = [
            "Fan nomzodi", 
            "Falsafa doktori (PhD)", 
            "Fan doktori (DSc)", 
            "Fan doktori", 
            "Akademik"
        ];
        
        if (validOptions.includes(selectedOption)) {
            ilmiyDarajaInput.style.display = 'block'; // Inputni ko'rsatish
        } else {
            ilmiyDarajaInput.style.display = 'none';  // Inputni yashirish
        }
    });
</script>

<script type="text/javascript">
    document.getElementById('ilmiy_unvoni').addEventListener('change', function() {
        var selectedOption = this.value;
        var ilmiyUnvonInput = document.getElementById('ilmiy-unvon-input');
        var validOptions = [
            "Professor", 
            "Dotsent", 
            "Katta ilmiy xodim", 
            "Akademik"
        ];
        
        if (validOptions.includes(selectedOption)) {
            ilmiyUnvonInput.style.display = 'block'; // Inputni ko'rsatish
        } else {
            ilmiyUnvonInput.style.display = 'none';  // Inputni yashirish
        }
    });
</script>

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