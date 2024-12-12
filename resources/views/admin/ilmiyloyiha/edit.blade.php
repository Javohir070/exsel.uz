@extends('layouts.admin')

@section('content')


<div class="flex justify-between align-center mt-10">

    <h2 class="intro-y text-lg font-medium">Ilmiy Loyiha Tahrirlash</h2>
    <style>
        .input-wrapper {
            position: relative;
            display: inline-block;
        }
        /* #search {
            position: absolute;
            top: 50%;
            left: 0;
            width: 50%;
            box-sizing: border-box;
        } */
        /* #science-sub-category {
            margin-top: 30px;
        } */
    </style>
    @role('Ilmiy_loyiha_rahbari')
        <a href="{{ route("scientific_project.index") }}" class="button w-24 bg-theme-1 text-white">
            Orqaga
        </a>
    @endrole


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
                    @role('super-admin')
                        <input type="text" name="mavzusi" value="{{ $ilmiyloyiha->mavzusi }}"  class="input w-full border mt-2" required="">
                        @error('mavzusi')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    @endrole
                    @role(['admin','Xodimlar_uchun_masul','Tashkilot_pasporti_uchun_masul','Ilmiy_faoliyat_uchun_masul', 'labaratoriyaga_masul'])
                        <input type="text" name="mavzusi" value="{{ $ilmiyloyiha->mavzusi }}" readonly class="input w-full border mt-2" required="">
                        @error('mavzusi')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    @endrole
                </div>
                @role('super-admin')
                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"> <span
                                class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Tashkilotni tanlang
                        </label>
                        <input type="text" id="search" placeholder="Search..." class="input border w-full mt-2">

                        <select name="tashkilot_id" value="{{old('tashkilot_id')}}" id="science-search-category" class="input border w-full mt-2" required="">
                            @foreach ($tashkilots as $tash)
                            <option value="{{$tash->id}}">{{ $tash->name }}</option>
                            @endforeach
                        </select><br>
                    </div>
                @endrole
                <div class="w-full col-span-6">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Loyiha turi
                    </label>
                    @role('super-admin')
                        <input type="text" name="turi" value="{{ $ilmiyloyiha->turi }}"  class="input w-full border mt-2" required="">
                        @error('turi')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    @endrole
                    @role(['admin','Xodimlar_uchun_masul','Tashkilot_pasporti_uchun_masul','Ilmiy_faoliyat_uchun_masul', 'labaratoriyaga_masul'])
                        <input type="text" name="turi" value="{{ $ilmiyloyiha->turi }}" readonly class="input w-full border mt-2" required="">
                        @error('turi')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    @endrole
                    

                    <!-- <select name="turi"  id="science-sub-category" readonly class="input border w-full mt-2" required="">

                        <option>Loyiha turi tanlang</option>

                        <option value="Amaliy" {{ $ilmiyloyiha->turi == 'Amaliy' ? 'selected' : '' }}>Amaliy</option>

                        <option value="Fundamental" {{ $ilmiyloyiha->turi == 'Fundamental' ? 'selected' : '' }}>Fundamental</option>

                        <option value="Innovatsion" {{ $ilmiyloyiha->turi == 'Innovatsion' ? 'selected' : '' }}>Innovatsion</option>

                        <option value="Tajriba-konstruktorlik" {{ $ilmiyloyiha->turi == 'Tajriba-konstruktorlik' ? 'selected' : '' }}>Tajriba-konstruktorlik</option>

                    </select> -->
                </div>

                
                <div class="w-full col-span-6">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Loyiha dasturi
                    </label>
                    <select name="dastyri"  id="science-sub-category" class="input border w-full mt-2" required="">

                        <option value="">Loyiha dasturi tanlang</option>

                        <option value="Maqsadli" {{ $ilmiyloyiha->dastyri == 'Maqsadli' ? 'selected' : '' }}>Maqsadli</option>

                        <option value="Mega" {{ $ilmiyloyiha->dastyri == 'Mega' ? 'selected' : '' }}>Mega</option>

                        <option value="Yosh olimlar" {{ $ilmiyloyiha->dastyri == 'Yosh olimlar' ? 'selected' : '' }}>Yosh olimlar</option>

                        <option value="Olima ayollar" {{ $ilmiyloyiha->dastyri == 'Olima ayollar' ? 'selected' : '' }}>Olima ayollar</option>

                        <option value="Xalqaro-qo‘shma" {{ $ilmiyloyiha->dastyri == 'Xalqaro-qo‘shma' ? 'selected' : '' }}>Xalqaro-qo‘shma</option>

                        <option value="Tematik" {{ $ilmiyloyiha->dastyri == 'Tematik' ? 'selected' : '' }}>Tematik</option>
                        


                    </select>
                    @error('dastyri')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row">  Qo‘shma loyiha bo‘yicha hamkor tashkilot
                    </label>
                    <input type="text" name="q_hamkor_tashkilot" value="{{ $ilmiyloyiha->q_hamkor_tashkilot }}" class="input w-full border mt-2" >
                    @error('q_hamkor_tashkilot')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row">  Xalqaro qo‘shma loyihalardagi hamkor davlat
                    </label>
                    <input type="text" name="hamkor_davlat" value="{{ $ilmiyloyiha->hamkor_davlat }}" class="input w-full border mt-2" >
                    @error('hamkor_davlat')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="w-full col-span-6">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Loyihani amalga oshirish muddati (yil) 
                    </label>
                    <select name="muddat"  id="science-sub-category" class="input border w-full mt-2" required="">

                        <option value="">Muddati tanlang</option>

                        <option value="1" {{ $ilmiyloyiha->muddat == '1' ? 'selected' : '' }}>1</option>

                        <option value="2" {{ $ilmiyloyiha->muddat == '2' ? 'selected' : '' }}>2</option>

                        <option value="3" {{ $ilmiyloyiha->muddat == '3' ? 'selected' : '' }}>3</option>

                        <option value="4" {{ $ilmiyloyiha->muddat == '4' ? 'selected' : '' }}>4</option>

                        <option value="5" {{ $ilmiyloyiha->muddat == '5' ? 'selected' : '' }}>5</option>

                        <option value="6" {{ $ilmiyloyiha->muddat == '6' ? 'selected' : '' }}>6</option>

                        <option value="7" {{ $ilmiyloyiha->muddat == '7' ? 'selected' : '' }}>7</option>

                        <option value="8" {{ $ilmiyloyiha->muddat == '8' ? 'selected' : '' }}>8</option>

                        <option value="9" {{ $ilmiyloyiha->muddat == '9' ? 'selected' : '' }}>9</option>

                        <option value="10" {{ $ilmiyloyiha->muddat == '10' ? 'selected' : '' }}>10</option>


                    </select><br>

                    @error('muddat')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Loyihaning boshlanish sanasi
                    </label>
                    @role('super-admin')
                        <input type="date"  name="bosh_sana" value="{{ $ilmiyloyiha->bosh_sana }}"  class=" input w-full border mt-2" required="">
                        @error('bosh_sana')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    @endrole
                    @role(['admin','Xodimlar_uchun_masul','Tashkilot_pasporti_uchun_masul','Ilmiy_faoliyat_uchun_masul', 'labaratoriyaga_masul'])
                        <input type="text"  name="bosh_sana" value="{{ $ilmiyloyiha->bosh_sana }}" readonly class=" input w-full border mt-2" required="">
                        @error('bosh_sana')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    @endrole
                    
                </div>

                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Loyihaning tugash sanasi
                    </label>
                    @role('super-admin')
                        <input type="text"  name="tug_sana" value="{{ $ilmiyloyiha->tug_sana }}"  class=" input w-full border mt-2" required="">
                        @error('tug_sana')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    @endrole
                    @role(['admin','Xodimlar_uchun_masul','Tashkilot_pasporti_uchun_masul','Ilmiy_faoliyat_uchun_masul', 'labaratoriyaga_masul'])
                        <input type="text"  name="tug_sana" value="{{ $ilmiyloyiha->tug_sana }}" readonly class=" input w-full border mt-2" required="">
                        @error('tug_sana')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    @endrole
                    
                </div>

                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Fan yo‘nalish
                    </label>
                    @role('super-admin')
                        <input type="text"  name="pan_yunalish" value="{{ $ilmiyloyiha->pan_yunalish}}"  class=" input w-full border mt-2" required="">
                        @error('pan_yunalish')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    @endrole
                    @role(['admin','Xodimlar_uchun_masul','Tashkilot_pasporti_uchun_masul','Ilmiy_faoliyat_uchun_masul', 'labaratoriyaga_masul'])
                        <input type="text"  name="pan_yunalish" value="{{ $ilmiyloyiha->pan_yunalish}}" readonly class=" input w-full border mt-2" required="">
                        @error('pan_yunalish')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    @endrole
                    
                    <!-- <select name="pan_yunalish"  id="science-sub-category" class="input border w-full mt-2" required="">

                        <option>Fan yo‘nalish tanlang</option>

                        <option value="Tibbiyot fanlari" {{ $ilmiyloyiha->pan_yunalish == "Tibbiyot fanlari" ? "selected" : ""}}>Tibbiyot fanlari</option>

                        <option value="Biologiya va biotexnologiya fanlari" {{ $ilmiyloyiha->pan_yunalish == "Biologiya va biotexnologiya fanlari" ? "selected" : ""}}>Biologiya va biotexnologiya fanlari</option>

                        <option value="Filologiya va ijtimoiy fanlar" {{ $ilmiyloyiha->pan_yunalish == "Filologiya va ijtimoiy fanlar" ? "selected" : ""}}>Filologiya va ijtimoiy fanlar</option>

                        <option value="Iqtisodiyot fanlari" {{ $ilmiyloyiha->pan_yunalish == "Iqtisodiyot fanlari" ? "selected" : ""}}>Iqtisodiyot fanlari</option>


                    </select><br> -->
                </div>

                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Loyiha rahbarining F.I.Sh.
                    </label>
                    @role('super-admin')
                        <input type="text" name="rahbar_name" value="{{ $ilmiyloyiha->rahbar_name }}"  class="input w-full border mt-2" required="">
                        @error('rahbar_name')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    @endrole
                    @role(['admin','Xodimlar_uchun_masul','Tashkilot_pasporti_uchun_masul','Ilmiy_faoliyat_uchun_masul', 'labaratoriyaga_masul'])
                        <input type="text" name="rahbar_name" value="{{ $ilmiyloyiha->rahbar_name }}" readonly class="input w-full border mt-2" required="">
                        @error('rahbar_name')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    @endrole
                </div>

                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row">  Loyiha rahbari ilmiy darajasi   </label>
                    <input type="text" name="rahbariilmiy_darajasi" value="" class="input w-full border mt-2" >
                </div>

                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row">  Loyiha rahbari ilmiy unvoni   </label>
                    <input type="text" name="rahbariilmiy_unvoni" value="" class="input w-full border mt-2" >
                </div>

                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row">  Loyiha rahbari lavozimi  </label>
                    <input type="text" name="r_lavozimi" value="" class="input w-full border mt-2" >
                </div>

                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Tuzilgan shartnoma Raqami 
                    </label>
                    @role('super-admin')
                    <input type="text" name="raqami" value="{{ $ilmiyloyiha->raqami }}"  class="input w-full border mt-2" required="">
                    @error('raqami')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    @endrole
                    @role(['admin','Xodimlar_uchun_masul','Tashkilot_pasporti_uchun_masul','Ilmiy_faoliyat_uchun_masul', 'labaratoriyaga_masul'])
                    <input type="text" name="raqami" value="{{ $ilmiyloyiha->raqami }}" readonly class="input w-full border mt-2" required="">
                    @error('raqami')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    @endrole
                </div>

                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Tuzilgan shartnoma Sanasi 
                    </label>
                    <input type="text"  name="sanasi" value="{{ $ilmiyloyiha->sanasi }}" class=" input w-full border mt-2" required="">
                    @error('sanasi')
                        <div class="error">{{ $message }}</div>
                    @enderror

                </div>

                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Tuzilgan shartnoma summasi (so‘m) 
                    </label>
                    @role('super-admin')
                        <input type="text" name="sum" value="{{ $ilmiyloyiha->sum }}"  class="input w-full border mt-2" required="">
                        @error('sum')
                        <div class="error">{{ $message }}</div>
                    @enderror
                    @endrole
                    @role(['admin','Xodimlar_uchun_masul','Tashkilot_pasporti_uchun_masul','Ilmiy_faoliyat_uchun_masul', 'labaratoriyaga_masul'])
                    <input type="text" name="sum" value="{{ $ilmiyloyiha->sum }}" readonly class="input w-full border mt-2" required="">
                    @error('sum')
                        <div class="error">{{ $message }}</div>
                    @enderror
                    @endrole
                </div>

                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Tijoratlashtirish holati 
                    </label>
                    <select name="tijoratlashtirish"  id="science-sub-category" class="input border w-full mt-2" required="">

                        <option value="">Tijoratlashtirish  tanlang</option>

                        <option value="Tijoratlashtirilgan" {{ $ilmiyloyiha->tijoratlashtirish == "Tijoratlashtirilgan" ? "selected" : ""}}>Tijoratlashtirilgan</option>

                        <option value="Tijoratlashtirilmagan" {{ $ilmiyloyiha->tijoratlashtirish == "Tijoratlashtirilmagan" ? "selected" : ""}}>Tijoratlashtirilmagan</option>

                    </select>
                    @error('tijoratlashtirish')
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

                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Olingan asosiy natija 
                    </label>
                    <!-- <input type="text" name="olingan_natija" value="" class="input w-full border mt-2" required=""> -->
                    <textarea name="olingan_natija" class="input w-full border mt-2" cols="20" rows="5">{{ $ilmiyloyiha->olingan_natija }}</textarea>
                    @error('olingan_natija')
                        <div class="error">{{ $message }}</div>
                    @enderror

                </div>

                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Joriy etish (Tatbiq etish) holati 
                    </label>
                    <!-- <input type="text" name="joriy_holati" value="{{ $ilmiyloyiha->joriy_holati }}" class="input w-full border mt-2" required=""> -->
                    <textarea name="joriy_holati" class="input w-full border mt-2" cols="20" rows="5">{{ $ilmiyloyiha->joriy_holati }}</textarea>
                    @error('joriy_holati')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>


                
                <div class="w-full col-span-2 ">
                    <label class="flex flex-col sm:flex-row"> 2017 yilda
                    </label>
                    <input type="number" name="y2017" value="{{ $ilmiyloyiha->umumiyyil->y2017 }}" class="input w-full border mt-2" required="">
                </div>
                <div class="w-full col-span-2 ">
                    <label class="flex flex-col sm:flex-row"> 2018 yilda
                    </label>
                    <input type="number" name="y2018" value="{{ $ilmiyloyiha->umumiyyil->y2018 }}" class="input w-full border mt-2" required="">
                </div>
                <div class="w-full col-span-2 ">
                    <label class="flex flex-col sm:flex-row"> 2019 yilda
                    </label>
                    <input type="number" name="y2019" value="{{ $ilmiyloyiha->umumiyyil->y2019 }}" class="input w-full border mt-2" required="">
                </div>
                <div class="w-full col-span-2 ">
                    <label class="flex flex-col sm:flex-row"> 2020 yilda
                    </label>
                    <input type="number" name="y2020" value="{{ $ilmiyloyiha->umumiyyil->y2020 }}" class="input w-full border mt-2" required="">
                </div>
                <div class="w-full col-span-2 ">
                    <label class="flex flex-col sm:flex-row"> 2021 yilda
                    </label>
                    <input type="number" name="y2021" value="{{ $ilmiyloyiha->umumiyyil->y2021 }}" class="input w-full border mt-2" required="">
                </div>
                <div class="w-full col-span-2 ">
                    <label class="flex flex-col sm:flex-row"> 2022 yilda
                    </label>
                    <input type="number" name="y2022" value="{{ $ilmiyloyiha->umumiyyil->y2022 }}" class="input w-full border mt-2" required="">
                </div>
                <div class="w-full col-span-2 ">
                    <label class="flex flex-col sm:flex-row"> 2023 yilda
                    </label>
                    <input type="number" name="y2023" value="{{ $ilmiyloyiha->umumiyyil->y2023 }}" class="input w-full border mt-2" required="">
                </div>
                <div class="w-full col-span-2 ">
                    <label class="flex flex-col sm:flex-row"> 2024 yilda
                    </label>
                    <input type="number" name="y2024" value="{{ $ilmiyloyiha->umumiyyil->y2024 }}" class="input w-full border mt-2" required="">
                </div>



               {{-- //yangi qo'shilganlar --}}

               <div class="w-full col-span-6 ">
                <label class="flex flex-col sm:flex-row">  Loyiha mavzusi (rus tilida)
                </label>
                <input type="text" name="mavzusi_ru" value="{{ $ilmiyloyiha->mavzusi_ru }}" class="input w-full border mt-2" >
                @error('mavzusi_ru')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row">  Ijrochi tashkilot </label>
                    <input type="text" name="ijrochi_tashkilot" value="" class="input w-full border mt-2" required="">
                </div>


               <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row">  Hamrahbar F.I.Sh </label>
                    <input type="text" name="hamrahbar_fish" value="" class="input w-full border mt-2" >
                </div>

                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> Hamrahbar Ish joyi </label>
                    <input type="text" name="hamr_ishjoyi" value="" class="input w-full border mt-2" >
                </div>

                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> Hamrahbar Lavozimi </label>
                    <input type="text" name="hamr_lavozimi" value="" class="input w-full border mt-2" >
                </div>

                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> Hamrahbar Davlati </label>
                    <input type="text" name="hamr_davlati" value="" class="input w-full border mt-2" >
                </div>

                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Joriy yil uchun ajratilgan mablag‘ (so‘m) </label>
                    <input type="number" name="joyyilajratilgan_mablag" value="" class="input w-full border mt-2" required="">
                </div>

                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Shtat birligi </label>
                    <input type="number" name="shtat_birligi" value="" class="input w-full border mt-2" required="">
                </div>

                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Ijrochilar soni </label>
                    <input type="number" name="ijrochilar_soni" value="" class="input w-full border mt-2" required="">
                </div>

                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Ilmiy jamoaning o‘rtacha yoshi </label>
                    <input type="number" name="ortacha_yoshi" value="" class="input w-full border mt-2" required="">
                </div>

                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Moddiy-texnik bazaga yo‘naltirilgan mablag‘lar hajmi (so‘m) </label>
                    <input type="number" name="moddiy_texnik_mablaglar" value="" class="input w-full border mt-2" required="">
                </div>

                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Jami summaga nisbatan (%da) </label>
                    <input type="number" name="jami_summaga_nisbatan" value="" class="input w-full border mt-2" required="">
                </div>

                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Jami chop etilgan nashr ishlari soni (Joriy yil uchun) </label>
                    <input type="number" name="jami_chop_joriyyil" value="" class="input w-full border mt-2" required="">
                </div>

                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Jami chop etilgan nashr ishlari soni (Jami) </label>
                    <input type="number" name="jami_chop_jami" value="" class="input w-full border mt-2" required="">
                </div>

                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Mahalliy ilmiy jurnallardagi maqolalar soni (Joriy yil uchun) </label>
                    <input type="number" name="mahalliymaqola_joriyyil" value="" class="input w-full border mt-2" required="">
                </div>

                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Mahalliy ilmiy jurnallardagi maqolalar soni (Jami) </label>
                    <input type="number" name="mahalliymaqol_jami" value="" class="input w-full border mt-2" required="">
                </div>

                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Xorijiy jurnallardagi ilmiy maqolalar soni (Joriy yil uchun) </label>
                    <input type="number" name="xorijiymaqola_joriyyil" value="" class="input w-full border mt-2" required="">
                </div>

                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Xorijiy jurnallardagi ilmiy maqolalar soni (Jami) </label>
                    <input type="number" name="xorijiymaqola_jami" value="" class="input w-full border mt-2" required="">
                </div>

                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Web of Science va Scopus bazasidagi xalqaro nashrlardagi maqolalar soni (Joriy yil uchun) </label>
                    <input type="number" name="scopus_joriyyil" value="" class="input w-full border mt-2" required="">
                </div>

                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Web of Science va Scopus bazasidagi xalqaro nashrlardagi maqolalar soni (Jami) </label>
                    <input type="number" name="scopus_jami" value="" class="input w-full border mt-2" required="">
                </div>

                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Tezislar soni (Joriy yil uchun) </label>
                    <input type="number" name="tezislar_joriyyil" value="" class="input w-full border mt-2" required="">
                </div>

                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Tezislar soni (Jami) </label>
                    <input type="number" name="tezislar_jami" value="" class="input w-full border mt-2" required="">
                </div>

                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Ilmiy monografiyalar soni (Joriy yil uchun) </label>
                    <input type="number" name="ilmiy_mon_joriyyil" value="" class="input w-full border mt-2" required="">
                </div>

                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Ilmiy monografiyalar soni (Jami) </label>
                    <input type="number" name="ilmiy_mon_jami" value="" class="input w-full border mt-2" required="">
                </div>

                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Olingan patentlar soni (Joriy yil uchun) </label>
                    <input type="number" name="olinganpatent_joriyyil" value="" class="input w-full border mt-2" required="">
                </div>

                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Olingan patentlar soni (Jami) </label>
                    <input type="number" name="olinganpatent_jami" value="" class="input w-full border mt-2" required="">
                </div>

                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Patentga berilgan buyurtmalar soni </label>//
                    <input type="number" name="patentga_berilgansoni" value="" class="input w-full border mt-2" required="">
                </div>

                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Dasturiy maxsulotga guvoxnomalar soni (Joriy yil uchun) </label>
                    <input type="number" name="dasturiy_maxguv_joriyyil" value="" class="input w-full border mt-2" required="">
                </div>

                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Dasturiy maxsulotga guvoxnomalar soni (Jami) </label>
                    <input type="number" name="dasturiy_maxguv_jami" value="" class="input w-full border mt-2" required="">
                </div>

                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Hisobot davrida qo‘lga kiritlgan muhim natijalar </label>
                    {{-- <input type="text" name="y2024" value="" class="input w-full border mt-2" required=""> --}}
                    <textarea name="hisobot_davrida_natijalar" class="input w-full border mt-2" id="" cols="5" rows="5"></textarea>
                </div>

                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Loyiha yakunida yaratilgan ishlanma (texnologiya) nomi va qisqacha tavsifi </label>
                    {{-- <input type="number" name="y2024" value="" class="input w-full border mt-2" required=""> --}}
                    <textarea name="loyiha_yakunida" id="" class="input w-full border mt-2" cols="5" rows="5"></textarea>
                </div>

                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Ilmiy ishlanma joriy etiladigan (tijoratlashtiriladigan) tarmoq (soha) va kutilayotgan natijalar (mavjud ehtiyoj, iqtisodiy samaradorlik ko‘rsatkichlari tahlili) </label>
                    {{-- <input type="number" name="y2024" value="" class="input w-full border mt-2" required=""> --}}
                    <textarea name="ilmiy_ishlanma" id="" class="input w-full border mt-2" cols="5" rows="5"></textarea>
                </div>




            </div>

        </form><br>
        <div class="px-5 pb-5 text-center">
            @if (auth()->user()->hasRole('labaratoriyaga_masul'))
                <a href="{{ route('lab_ilmiyloyiha.index') }}"  class="button delete-cancel w-32 border text-gray-700 mr-1">
                    Bekor qilish
                </a>
            @else
                <a href="{{ route('ilmiyloyiha.index') }}"  class="button delete-cancel w-32 border text-gray-700 mr-1">
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

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var searchInput = document.getElementById('search');
        var select = document.getElementById('science-search-category');
        
        searchInput.addEventListener('keyup', function() {
            var filter = searchInput.value.toLowerCase();
            for (var i = 0; i < select.options.length; i++) {
                var option = select.options[i];
                var text = option.text.toLowerCase();
                option.style.display = text.includes(filter) ? '' : 'none';
            }
        });
    });
    </script>

@endsection