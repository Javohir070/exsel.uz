@extends('layouts.admin')

@section('content')


<div class="flex justify-between align-center mt-10">

    <h2 class="intro-y text-lg font-medium">Ilmiy Loyiha Tahrirlash</h2>



</div><br>
<div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2" style="background: white;
    padding: 20px 20px;
    border-radius: 20px">
    <div class="w-full mt-3 sm:mt-0 sm:ml-auto md:ml-0">
        <form id="science-paper-create-form" method="POST" action="{{ route("ilmiyloyiha.update",['ilmiyloyiha'=>$ilmiyloyiha->id]) }}" class="validate-form"
            enctype="multipart/form-data" novalidate="novalidate">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-12 gap-2">
                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Loyiha mavzusi
                    </label>
                    <input type="text" name="mavzusi" value="{{ $ilmiyloyiha->mavzusi }}" class="input w-full border mt-2" required="">
                </div>

                <div class="w-full col-span-6">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Loyiha turi
                    </label>
                    <select name="turi"  id="science-sub-category" class="input border w-full mt-2" required="">

                        <option>Loyiha turi tanlang</option>

                        <option value="Amaliy" {{ $ilmiyloyiha->turi == 'Amaliy' ? 'selected' : '' }}>Amaliy</option>

                        <option value="Fundamental" {{ $ilmiyloyiha->turi == 'Fundamental' ? 'selected' : '' }}>Fundamental</option>

                        <option value="Innovatsion" {{ $ilmiyloyiha->turi == 'Innovatsion' ? 'selected' : '' }}>Innovatsion</option>

                        <option value="Tajriba-konstruktorlik" {{ $ilmiyloyiha->turi == 'Tajriba-konstruktorlik' ? 'selected' : '' }}>Tajriba-konstruktorlik</option>

                    </select>
                </div>

                
                <div class="w-full col-span-6">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Loyiha dasturi
                    </label>
                    <select name="dastyri"  id="science-sub-category" class="input border w-full mt-2" required="">

                        <option>Loyiha dasturi tanlang</option>

                        <option value="Maqsadli" {{ $ilmiyloyiha->dastyri == 'Maqsadli' ? 'selected' : '' }}>Maqsadli</option>

                        <option value="Mega" {{ $ilmiyloyiha->dastyri == 'Mega' ? 'selected' : '' }}>Mega</option>

                        <option value="Yosh olimlar" {{ $ilmiyloyiha->dastyri == 'Yosh olimlar' ? 'selected' : '' }}>Yosh olimlar</option>

                        <option value="Olima ayollar" {{ $ilmiyloyiha->dastyri == 'Olima ayollar' ? 'selected' : '' }}>Olima ayollar</option>

                        <option value="Xalqaro-qo‘shma" {{ $ilmiyloyiha->dastyri == 'Xalqaro-qo‘shma' ? 'selected' : '' }}>Xalqaro-qo‘shma</option>

                    </select><br>
                </div>

                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> "Qo‘shma loyiha bo‘yicha hamkor tashkilot"
                    </label>
                    <input type="text" name="q_hamkor_tashkilot" value="{{ $ilmiyloyiha->q_hamkor_tashkilot }}" class="input w-full border mt-2" required="">
                </div>

                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Xalqaro qo‘shma loyihalardagi hamkor davlat
                    </label>
                    <input type="text" name="hamkor_davlat" value="{{ $ilmiyloyiha->hamkor_davlat }}" class="input w-full border mt-2" required="">
                </div>

                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Loyiha mavzusi
                    </label>
                    <input type="text" name="muddat" value="{{ $ilmiyloyiha->muddat }}" class="input w-full border mt-2" required="">
                </div>

                <div class="w-full col-span-6">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Loyihani amalga oshirish muddati (yil) 
                    </label>
                    <select name="bosh_sana"  id="science-sub-category" class="input border w-full mt-2" required="">

                        <option>muddati tanlang</option>

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

                    <input type="text" id="datepicker" name="tug_sana" value="{{ $ilmiyloyiha->tug_sana }}" class="datepicker input w-full border mt-2" required="">


                </div>

                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Fan yo‘nalish
                    </label>
                    
                    <select name="pan_yunalish"  id="science-sub-category" class="input border w-full mt-2" required="">

                        <option>Fan yo‘nalish tanlang</option>

                        <option value="Tibbiyot fanlari" {{ $ilmiyloyiha->pan_yunalish == "Tibbiyot fanlari" ? "selected" : ""}}>Tibbiyot fanlari</option>

                        <option value="Biologiya va biotexnologiya fanlari" {{ $ilmiyloyiha->pan_yunalish == "Biologiya va biotexnologiya fanlari" ? "selected" : ""}}>Biologiya va biotexnologiya fanlari</option>

                        <option value="Filologiya va ijtimoiy fanlar" {{ $ilmiyloyiha->pan_yunalish == "Filologiya va ijtimoiy fanlar" ? "selected" : ""}}>Filologiya va ijtimoiy fanlar</option>

                        <option value="Iqtisodiyot fanlari" {{ $ilmiyloyiha->pan_yunalish == "Iqtisodiyot fanlari" ? "selected" : ""}}>Iqtisodiyot fanlari</option>


                    </select><br>
                </div>

                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Loyiha rahbarining F.I.Sh.
                    </label>
                    
                    <input type="text" name="rahbar_name" value="{{ $ilmiyloyiha->rahbar_name }}" class="input w-full border mt-2" required="">

                </div>

                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Tuzilgan shartnoma Raqami 
                    </label>
                    <input type="text" name="raqami" value="{{ $ilmiyloyiha->raqami }}" class="input w-full border mt-2" required="">
                </div>

                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Tuzilgan shartnoma Sanasi 
                    </label>
                    <input type="text" id="datepicker" name="sanasi" value="{{ $ilmiyloyiha->sanasi }}" class="datepicker input w-full border mt-2" required="">

                </div>

                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Tuzilgan shartnoma summasi (ming so‘mda) 
                    </label>
                    <input type="text" name="sum" value="{{ $ilmiyloyiha->sum }}" class="input w-full border mt-2" required="">
                </div>

                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Umumiy ajratilgan mablag‘ (ming so‘mda) 
                    </label>
                    <input type="text" name="umumiy_mablag" value="{{ $ilmiyloyiha->umumiy_mablag }}" class="input w-full border mt-2" required="">
                </div>

                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Olingan asosiy natija 
                    </label>
                    <input type="text" name="olingan_natija" value="{{ $ilmiyloyiha->olingan_natija }}" class="input w-full border mt-2" required="">
                </div>

                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Joriy etish (Tatbiq etish) holati 
                    </label>
                    <input type="text" name="joriy_holati" value="{{ $ilmiyloyiha->joriy_holati }}" class="input w-full border mt-2" required="">
                </div>

                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Tijoratlashtirish holati 
                    </label>
                    <select name="tijoratlashtirish"  id="science-sub-category" class="input border w-full mt-2" required="">

                        <option>Tijoratlashtirish  tanlang</option>

                        <option value="Tijoratlashtirilgan" {{ $ilmiyloyiha->tijoratlashtirish == "Tijoratlashtirilgan" ? "selected" : ""}}>Tijoratlashtirilgan</option>

                        <option value="Tijoratlashtirilmagan" {{ $ilmiyloyiha->tijoratlashtirish == "Tijoratlashtirilmagan" ? "selected" : ""}}>Tijoratlashtirilmagan</option>

                    </select><br>
                </div>

                
                <div class="w-full col-span-2 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> 2017 yilda
                    </label>
                    <input type="text" name="y2017" value="{{ $ilmiyloyiha->umumiyyil->y2017 }}" class="input w-full border mt-2" required="">
                </div>
                <div class="w-full col-span-2 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> 2018 yilda
                    </label>
                    <input type="text" name="y2018" value="{{ $ilmiyloyiha->umumiyyil->y2018 }}" class="input w-full border mt-2" required="">
                </div>
                <div class="w-full col-span-2 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> 2019 yilda
                    </label>
                    <input type="text" name="y2019" value="{{ $ilmiyloyiha->umumiyyil->y2019 }}" class="input w-full border mt-2" required="">
                </div>
                <div class="w-full col-span-2 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> 2020 yilda
                    </label>
                    <input type="text" name="y2020" value="{{ $ilmiyloyiha->umumiyyil->y2020 }}" class="input w-full border mt-2" required="">
                </div>
                <div class="w-full col-span-2 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> 2021 yilda
                    </label>
                    <input type="text" name="y2021" value="{{ $ilmiyloyiha->umumiyyil->y2021 }}" class="input w-full border mt-2" required="">
                </div>
                <div class="w-full col-span-2 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> 2022 yilda
                    </label>
                    <input type="text" name="y2022" value="{{ $ilmiyloyiha->umumiyyil->y2022 }}" class="input w-full border mt-2" required="">
                </div>
                <div class="w-full col-span-2 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> 2023 yilda
                    </label>
                    <input type="text" name="y2023" value="{{ $ilmiyloyiha->umumiyyil->y2023 }}" class="input w-full border mt-2" required="">
                </div>
                <div class="w-full col-span-2 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> 2024 yilda
                    </label>
                    <input type="text" name="y2024" value="{{ $ilmiyloyiha->umumiyyil->y2024 }}" class="input w-full border mt-2" required="">
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