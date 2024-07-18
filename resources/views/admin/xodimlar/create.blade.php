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
                </div>

                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Jshshir
                    </label>
                    <input type="text" name="jshshir" value="{{ old('jshshir') }}" class="input w-full border mt-2" required="">
                    @error('jshshir')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Tug‘ilgan yili
                    </label>
                    <input type="text" id="datepicker" name="yil" value="{{ old('yil') }}" class="datepicker input w-full border mt-2" required="">
                    
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
                </div>

                <div class="w-full col-span-6">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Ish tartibi
                    </label>
                    <select name="ish_tartibi" value="{{ old('ish_tartibi') }}" id="science-sub-category" class="input border w-full mt-2" required="">

                        <option value="">Ish tartibini tanlang</option>

                        <option value="Asosiy">Asosiy</option>

                        <option value="O‘rindoshlik">O‘rindoshlik</option>

                        <option value="Soatbay">Soatbay</option>

                    </select>
                </div>

                <div class="w-full col-span-6">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Shtat birligi
                    </label>
                    <select name="shtat_birligi" value="{{ old('shtat_birligi') }}" id="science-sub-category" class="input border w-full mt-2" required="">

                        <option value="">Shtat birligini tanlang</option>

                        <option value="0.25">0.25</option>

                        <option value="0.5">0.5</option>

                        <option value="0.75">0.75</option>

                        <option value="1">1</option>

                        <option value="1.25">1.25</option>

                        <option value="1.5">1.5</option>

                    </select><br>
                </div>
                <div class="w-full col-span-6">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Lavozimi
                    </label>
                    <select name="lavozimi" value="{{ old('lavozimi') }}" id="science-sub-category" class="input border w-full mt-2" required="">

                        <option value="">Lavozini tanlang</option>
                        <option value="Matbuot kotibi">Matbuot kotibi</option> 
                        <option value="Boshqarma boshlig‘i">Boshqarma boshlig‘i</option> 
                        <option value="Qorovul">Qorovul</option>
                        <option value="Buxgalter">Buxgalter</option>
                        <option value="Kotiba">Kotiba</option>
                        <option value="Direktor">Direktor</option>
                        <option value="Buxgalter">Buxgalter</option>
                        <option value="Ilmiy kotib">Ilmiy kotib</option> 
                        <option value="Ilmiy ishlar bo‘yicha direktor o‘rinbosari">Ilmiy ishlar bo‘yicha direktor o‘rinbosari</option> 
                        <option value="Ilmiy-tadqiqot laboratoriyasi (bo‘lim) mudiri">Ilmiy-tadqiqot laboratoriyasi (bo‘lim) mudiri</option> 
                        <option value="Umumiy masalalar bo‘yicha direktor o‘rinbosari">Umumiy masalalar bo‘yicha direktor o‘rinbosari</option> 
                        <option value="Bosh buxgalter">Bosh buxgalter</option> 
                        <option value="Moliya-iqtisod bo‘limi boshlig‘i">Moliya-iqtisod bo‘limi boshlig‘i</option> 
                        <option value="Bosh muhandis">Bosh muhandis</option> 
                        <option value="Bosh energetik">Bosh energetik</option> 
                        <option value="Bosh mexanik">Bosh mexanik</option> 
                        <option value="Boshqa mutaxassis">Boshqa mutaxassis</option> 
                        <option value="Bo‘lim boshlig‘i">Bo‘lim boshlig‘i</option> 
                        <option value="Yetakchi muhandis">Yetakchi muhandis</option> 
                        <option value="Bosh ilmiy xodim">Bosh ilmiy xodim</option> 
                        <option value="Yetakchi ilmiy xodim">Yetakchi ilmiy xodim</option> 
                        <option value="Katta ilmiy xodim">Katta ilmiy xodim</option> 
                        <option value="Kichik ilmiy xodim">Kichik ilmiy xodim</option> 
                        <option value="Haydovchi">Haydovchi</option> 
                        <option value="Hovli supuruvchi">Hovli supuruvchi</option> 
                        <option value="Farrosh">Farrosh</option> 
                        <option value="Bog‘bon">Bog‘bon</option> 
                        <option value="Mutaxassis">Mutaxassis</option> 
                        <option value="Ishlab chiqarish bo‘yicha direktor o‘rinbosari">Ishlab chiqarish bo‘yicha direktor o‘rinbosari</option> 
                        <option value="Expert">Expert</option> 
                        <option value="Boshqa">Boshqa</option> 


                    </select><br>
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
                </div>

                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> O‘rindoshlik asosida ishlaydigan xodimning asosiy ish joyi
                        bo‘lgan tashkilot
                    </label>
                    <input type="text" name="urindoshlik_asasida" value="{{ old('urindoshlik_asasida') }}" class="input w-full border mt-2" >
                </div>

                <div class="w-full col-span-6">
                    <label class="flex flex-col sm:flex-row">  Ma’lumoti
                    </label>
                    <input type="text" name="malumoti" value="{{ old('malumoti') }}" class="input w-full border mt-2">
                </div>

                <div class="w-full col-span-6">
                    <label class="flex flex-col sm:flex-row">  O‘zbekiston Fanlar akademiyasi
                        haqiqiy a’zosi Ilmiy darajasi
                    </label>
                    <input type="text" name="uzbek_panlar_azosi" value="{{ old('uzbek_panlar_azosi') }}" class="input w-full border mt-2">
                </div>

                <div class="w-full col-span-6">
                    <label class="flex flex-col sm:flex-row">  Ilmiy darajasi</label>
                    <select name="ilmiy_daraja" value="{{ old('ilmiy_daraja') }}" id="science-sub-category" class="input border w-full mt-2">

                        <option value="">Ilmiy darajasini tanlang</option>

                        <option value="Fan nomzodi">Fan nomzodi</option>

                        <option value="Falsafa doktori (PhD)">Falsafa doktori (PhD)</option>

                        <option value="Fan doktori (DSc)">Fan doktori (DSc)</option>

                        <option value="Fan doktori">Fan doktori</option>

                        <option value="Akademik">Akademik</option>

                    </select><br>
                </div>

                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row">  Ilmiy daraja olingan yili
                    </label>
                    <input type="text" name="ilmiy_daraja_yil" value="{{ old('ilmiy_daraja_yil') }}" class="input w-full border mt-2">
                </div>

                <div class="w-full col-span-6">
                    <label class="flex flex-col sm:flex-row">  Ilmiy unvoni
                    </label>
                    <select name="ilmiy_unvoni" value="{{ old('ilmiy_unvoni') }}" id="science-sub-category" class="input border w-full mt-2">

                        <option value="">Ilmiy unvonini tanlang</option>

                        <option value="Professor">Professor</option>

                        <option value="Dotsent">Dotsent</option>
                        <option value="Katta ilmiy xodim">Katta ilmiy xodim</option>
                        <option value="Kichik ilmiy xodim">Kichik ilmiy xodim</option>

                    </select><br>
                </div>


                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> Ilmiy unvon olingan
                        yili
                    </label>
                    <input type="text" name="ilmiy_unvoni_y" value="{{ old('ilmiy_unvoni_y') }}" class="input w-full border mt-2">
                </div>

                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row">  Ixtisosligi
                    </label>
                    <input type="text" name="ixtisosligi" value="{{ old('ixtisosligi') }}" class="input w-full border mt-2">
                </div>

                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Telefon raqami
                    </label>
                    <input type="tel" name="phone" value="{{ old('phone') }}" class="input w-full border mt-2" required="">
                </div>

                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Email
                    </label>
                    <input type="email" name="email" value="{{ old('email') }}" class="input w-full border mt-2" required="">
                </div>
            </div>
        </form><br>
        <div class="px-5 pb-5 text-center">
            <a href="{{ route('xodimlar.index') }}"  class="button delete-cancel w-32 border text-gray-700 mr-1">
                Bekor qilish
            </a>
            <button type="submit" form="science-paper-create-form"
                class="update-confirm button w-24 bg-theme-1 text-white">
                Qo'shish
            </button>
        </div>
    </div>
</div><br>



@endsection