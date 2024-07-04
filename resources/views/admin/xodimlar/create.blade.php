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
                    <input type="text" name="fish" class="input w-full border mt-2" required="">
                </div>

                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> JSHSHIR
                    </label>
                    <input type="number" name="jshshir" class="input w-full border mt-2" required="">
                </div>

                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Tug‘ilgan yili
                    </label>
                    <input type="number" name="yil" class="input w-full border mt-2" required="">
                    
                </div>

                <div class="w-full col-span-6">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Jinsi
                    </label>
                    <select name="jinsi" id="science-sub-category" class="input border w-full mt-2" required="">

                        <option >jinsi tanlang</option>

                        <option value="Erkak">Erkak</option>

                        <option value="Ayol">Ayol</option>

                    </select>
                </div>

                <div class="w-full col-span-6">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Ish tartibi
                    </label>
                    <select name="ish_tartibi" id="science-sub-category" class="input border w-full mt-2" required="">

                        <option >Ish tartibi tanlang</option>

                        <option value="asosiy">asosiy</option>

                        <option value="o‘rindoshlik">o‘rindoshlik</option>

                        <option value="soatbay">soatbay</option>

                    </select><br>
                </div>

                <div class="w-full col-span-6">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Shtat birligi
                    </label>
                    <select name="shtat_birligi" id="science-sub-category" class="input border w-full mt-2" required="">

                        <option value="0">Shtat birligi tanlang</option>

                        <option value="0.25">0.25</option>

                        <option value="0.5">0.5</option>

                        <option value="0.75">0.75</option>

                        <option value="1">1</option>

                        <option value="1.25">1.25</option>

                        <option value="1.5">1.5</option>

                    </select><br>
                </div>

                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> O‘rindoshlik asosida ishlaydigan xodimning asosiy ish joyi
                        bo‘lgan tashkilot
                    </label>
                    <input type="text" name="urindoshlik_asasida" class="input w-full border mt-2" required="">
                </div>

                <div class="w-full col-span-6">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Pedagogik faoliyat bilan
                        shug‘ullanishi
                    </label>
                    <select name="pedagoglik" id="science-sub-category" class="input border w-full mt-2" required="">

                        <option value="0">tanlang</option>

                        <option value="ha">ha</option>

                        <option value="yoq">yoq</option>

                    </select><br>
                </div>

                <div class="w-full col-span-6">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Lavozimi
                    </label>
                    <select name="lavozimi" id="science-sub-category" class="input border w-full mt-2" required="">

                        <option value="0">Lavozimi tanlang</option>
                        <option value="Matbuot kotibi">Matbuot kotibi</option> 
                        <option value="Boshqarma boshlig‘i">Boshqarma boshlig‘i</option> 
                        <option value="Qorovul">Qorovul</option>
                        <option value="Buxgalter">Buxgalter</option>
                        <option value="Kotiba">Kotiba</option>
                        <option value="Direktor">Direktor</option>
                        <option value="Buxgalter">Buxgalter</option>
                        <option value="Ilmiy kotib">Ilmiy kotib</option> 

                    </select><br>
                </div>

                <div class="w-full col-span-6">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Ma’lumoti
                    </label>
                    <input type="text" name="malumoti" class="input w-full border mt-2" required="">
                </div>

                <div class="w-full col-span-6">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> O‘zbekiston Fanlar akademiyasi
                        haqiqiy a’zosi Ilmiy darajasi
                    </label>
                    <input type="text" name="uzbek_panlar_azosi" class="input w-full border mt-2" required="">

                
                </div>

                <div class="w-full col-span-6">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Ilmiy darajasi</label>
                    <select name="ilmiy_daraja" id="science-sub-category" class="input border w-full mt-2" required="">

                        <option >Ilmiy darajasi tanlang</option>

                        <option value="Fan nomzodi">Fan nomzodi</option>

                        <option value="Falsafa doktori (PhD)">Falsafa doktori (PhD)</option>
                        <option value="Fan doktori (DSc)">Fan doktori (DSc)</option>
                        <option value="Fan doktori">Fan doktori</option>
                        <option value="Akademik">Akademik</option>

                    </select><br>
                </div>

                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Ilmiy daraja olingan yili
                    </label>
                    <input type="number" name="ilmiy_daraja_yil" class="input w-full border mt-2" required="">
                </div>

                <div class="w-full col-span-6">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Ilmiy unvoni
                    </label>
                    <select name="ilmiy_unvoni" id="science-sub-category" class="input border w-full mt-2" required="">

                        <option >Ilmiy unvoni tanlang</option>

                        <option value="Professor">Professor</option>

                        <option value="Dotsent">Dotsent</option>
                        <option value="Katta ilmiy xodim">Katta ilmiy xodim</option>
                        <option value="Kichik ilmiy xodim">Kichik ilmiy xodim</option>

                    </select><br>
                </div>


                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Ilmiy unvoni Ilmiy unvon olingan
                        yili
                    </label>
                    <input type="number" name="ilmiy_unvoni_y" class="input w-full border mt-2" required="">
                </div>

                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Ixtisosligi
                    </label>
                    <input type="text" name="ixtisosligi" class="input w-full border mt-2" required="">
                </div>

                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Telefon raqami
                    </label>
                    <input type="tel" name="phone" class="input w-full border mt-2" required="">
                </div>

                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Email
                    </label>
                    <input type="email" name="email" class="input w-full border mt-2" required="">
                </div>






            </div>
        </form><br>
        <div class="px-5 pb-5 text-center">
            <button type="button" data-dismiss="modal" class="button delete-cancel w-32 border text-gray-700 mr-1">
                Bekor qilish
            </button>
            <button type="submit" form="science-paper-create-form"
                class="update-confirm button w-24 bg-theme-1 text-white">
                Qo'shish
            </button>
        </div>
    </div>
</div><br>



@endsection