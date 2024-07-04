@extends('layouts.admin')

@section('content')


<div class="flex justify-between align-center mt-10">

    <h2 class="intro-y text-lg font-medium">Ilmiy Loyiha qo'shish</h2>



</div><br>
<div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2" style="background: white;
    padding: 20px 20px;
    border-radius: 20px">
    <div class="w-full mt-3 sm:mt-0 sm:ml-auto md:ml-0">
        <form id="science-paper-create-form" method="POST" action="{{ route("ilmiyloyiha.store") }}" class="validate-form"
            enctype="multipart/form-data" novalidate="novalidate">
            @csrf
            <div class="grid grid-cols-12 gap-2">
                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Loyiha mavzusi
                    </label>
                    <input type="text" name="mavzusi" class="input w-full border mt-2" required="">
                </div>

                <div class="w-full col-span-6">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Loyiha turi
                    </label>
                    <select name="turi" id="science-sub-category" class="input border w-full mt-2" required="">

                        <option value="0">Loyiha turi tanlang</option>

                        <option value="Amaliy">Amaliy</option>

                        <option value="Fundamental">Fundamental</option>

                        <option value="Innovatsion">Innovatsion</option>

                        <option value="Tajriba-konstruktorlik">Tajriba-konstruktorlik</option>


                    </select><br>
                </div>

                
                <div class="w-full col-span-6">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Loyiha dasturi
                    </label>
                    <select name="dastyri" id="science-sub-category" class="input border w-full mt-2" required="">

                        <option value="0">Loyiha dasturi tanlang</option>

                        <option value="Maqsadli">Maqsadli</option>
                        <option value="Mega">Mega</option>
                        <option value="Yosh olimlar">Yosh olimlar</option>
                        <option value="Olima ayollar">Olima ayollar</option>


                        <option value="Xalqaro-qo‘shma">Xalqaro-qo‘shma</option>

                    </select><br>
                </div>

                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> "Qo‘shma loyiha bo‘yicha hamkor tashkilot"
                    </label>
                    <input type="text" name="q_hamkor_tashkilot" class="input w-full border mt-2" required="">
                </div>

                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Xalqaro qo‘shma loyihalardagi hamkor davlat
                    </label>
                    <input type="text" name="hamkor_davlat" class="input w-full border mt-2" required="">
                </div>

                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Loyiha mavzusi
                    </label>
                    <input type="text" name="muddat" class="input w-full border mt-2" required="">
                </div>

                <div class="w-full col-span-6">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Loyihani amalga oshirish muddati (yil) 
                    </label>
                    <select name="bosh_sana" id="science-sub-category" class="input border w-full mt-2" required="">

                        <option value="0">muddati tanlang</option>

                        <option value="1">1</option>

                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>


                    </select><br>
                </div>

                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Loyihaning boshlanish sanasi
                    </label>

                    <input type="text" id="datepicker" name="tug_sana" class="datepicker input w-full border mt-2" required="">


                </div>

                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Fan yo‘nalish
                    </label>
                    
                    <select name="pan_yunalish" id="science-sub-category" class="input border w-full mt-2" required="">

                        <option value="0">fan tanlang</option>

                        <option value="Tibbiyot fanlari">Tibbiyot fanlari</option>

                        <option value="Biologiya va biotexnologiya fanlari">Biologiya va biotexnologiya fanlari</option>
                        <option value="Filologiya va ijtimoiy fanlar">Filologiya va ijtimoiy fanlar</option>
                        <option value="Iqtisodiyot fanlari">Iqtisodiyot fanlari</option>


                    </select><br>
                </div>

                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Loyiha rahbarining F.I.Sh.
                    </label>
                    
                    <input type="text" name="rahbar_name" class="input w-full border mt-2" required="">

                </div>

                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Tuzilgan shartnoma Raqami 
                    </label>
                    <input type="text" name="raqami" class="input w-full border mt-2" required="">
                </div>

                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Tuzilgan shartnoma Sanasi 
                    </label>
                    <input type="text" id="datepicker" name="sanasi" class="datepicker input w-full border mt-2" required="">

                </div>

                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Tuzilgan shartnoma summasi (ming so‘mda) 
                    </label>
                    <input type="text" name="sum" class="input w-full border mt-2" required="">
                </div>

                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Umumiy ajratilgan mablag‘ (ming so‘mda) 
                    </label>
                    <input type="text" name="umumiy_mablag" class="input w-full border mt-2" required="">
                </div>

                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Olingan asosiy natija 
                    </label>
                    <input type="text" name="olingan_natija" class="input w-full border mt-2" required="">
                </div>

                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Joriy etish (Tatbiq etish) holati 
                    </label>
                    <input type="text" name="joriy_holati" class="input w-full border mt-2" required="">
                </div>

                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Tijoratlashtirish holati 
                    </label>
                    <select name="tijoratlashtirish" id="science-sub-category" class="input border w-full mt-2" required="">

                        <option value="0">Tijoratlashtirish  tanlang</option>

                        <option value="Tijoratlashtirilgan">Tijoratlashtirilgan</option>

                        <option value="Tijoratlashtirilmagan">Tijoratlashtirilmagan</option>

                    </select><br>
                </div>

                
                <div class="w-full col-span-2 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> 2017 yilda
                    </label>
                    <input type="text" name="y2017" class="input w-full border mt-2" required="">
                </div>
                <div class="w-full col-span-2 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> 2018 yilda
                    </label>
                    <input type="text" name="y2018" class="input w-full border mt-2" required="">
                </div>
                <div class="w-full col-span-2 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> 2019 yilda
                    </label>
                    <input type="text" name="y2019" class="input w-full border mt-2" required="">
                </div>
                <div class="w-full col-span-2 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> 2020 yilda
                    </label>
                    <input type="text" name="y2020" class="input w-full border mt-2" required="">
                </div>
                <div class="w-full col-span-2 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> 2021 yilda
                    </label>
                    <input type="text" name="y2021" class="input w-full border mt-2" required="">
                </div>
                <div class="w-full col-span-2 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> 2022 yilda
                    </label>
                    <input type="text" name="y2022" class="input w-full border mt-2" required="">
                </div>
                <div class="w-full col-span-2 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> 2023 yilda
                    </label>
                    <input type="text" name="y2023" class="input w-full border mt-2" required="">
                </div>
                <div class="w-full col-span-2 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> 2024 yilda
                    </label>
                    <input type="text" name="y2024" class="input w-full border mt-2" required="">
                </div>






            </div>
        </form><br>
        <div class="px-5 pb-5 text-center">
            <a href="#"  class="button delete-cancel w-32 border text-gray-700 mr-1">
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