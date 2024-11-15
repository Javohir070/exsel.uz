@extends('layouts.admin')

@section('content')


<div class="flex justify-between align-center mt-10">

    <h2 class="intro-y text-lg font-medium"> Ilmiy bilan taminlangami  tahrirlash</h2>



</div><br>
<div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2" style="background: white;
    padding: 20px 20px;
    border-radius: 20px">
    <div class="w-full mt-3 sm:mt-0 sm:ml-auto md:ml-0">
        <form id="science-paper-create-form" method="POST" action="{{ route("ilmiydaraja.update",['ilmiydaraja'=>$ilmiydaraja->id]) }}" class="validate-form"
            enctype="multipart/form-data" novalidate="novalidate">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-12 gap-2">
                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"><span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>  Jami xodimlar soni
                    </label>
                    <input type="text" name="xodimlar_jami" value="{{ $ilmiydaraja->xodimlar_jami }}" class="input w-full border mt-2" required="">
                    @error('xodimlar_jami')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Ilmiy xodimlar soni
                    </label>
                    <input type="text" name="ilmiy_xodimlar" value="{{ $ilmiydaraja->ilmiy_xodimlar }}" class="input w-full border mt-2" required="">
                    @error('ilmiy_xodimlar')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Ilmiy loyiha nomi
                    </label>
                    <input type="text" name="name" value="{{ $ilmiydaraja->name }}" class="input w-full border mt-2" required="">
                    @error('name')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Ilmiy loyiha turi
                    </label>
                    <select name="turi"   id="science-sub-category" class="input border w-full mt-2" required="">

                        <option>Loyiha turi tanlang</option>

                        <option value="Maqsadli" {{ $ilmiydaraja->turi == 'Maqsadli' ? 'selected' : '' }}>Maqsadli</option>

                        <option value="Xalqaro-qo‘shma" {{ $ilmiydaraja->turi == 'Xalqaro-qo‘shma' ? 'selected' : '' }}>Xalqaro-qo‘shma</option>

                        <option value="Yosh olimlar" {{ $ilmiydaraja->turi == 'Yosh olimlar' ? 'selected' : '' }}>Yosh olimlar</option>

                        <option value="Olima ayollar" {{ $ilmiydaraja->turi == 'Olima ayollar' ? 'selected' : '' }}>Olima ayollar</option>
                        <option value="Fundamental" {{ $ilmiydaraja->turi == 'Fundamental' ? 'selected' : '' }} >Fundamental</option>

                        <option value="Innovatsion" {{ $ilmiydaraja->turi == 'Innovatsion' ? 'selected' : '' }}>Innovatsion</option>

                        <option value="Amaliy" {{ $ilmiydaraja->turi == 'Amaliy' ? 'selected' : '' }}>Amaliy</option>

                    </select>
                </div>

                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Moliyalashtirish hajmi jami
                    </label>
                    <input type="text" name="moliyal_jami" value="{{ $ilmiydaraja->moliyal_jami }}" class="input w-full border mt-2" required="">
                    @error('moliyal_jami')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>
                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Bir nafar ilmiy hodimga moliyalashtirish nisbati jami
                    </label>
                    <input type="text" name="xodimganisbat_jami" value="{{ $ilmiydaraja->xodimganisbat_jami }}" class="input w-full border mt-2" required="">
                    @error('xodimganisbat_jami')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>
                <div class="w-full col-span-12 ">
                    <h2 style="text-align: center;font-size: 20px;font-weight: 500;">  Moliyalashtirish hajmi </h2>
                </div>
                
                <div class="w-full col-span-1 ">
                    <label class="flex flex-col sm:flex-row">   2017-yil
                    </label>
                    <input type="text" name="y2017" value="{{ $ilmiydaraja->umumiyyil->y2017 }}" class="input w-full border mt-2" >
                </div>
                <div class="w-full col-span-1 ">
                    <label class="flex flex-col sm:flex-row">   2018-yil
                    </label>
                    <input type="text" name="y2018" value="{{ $ilmiydaraja->umumiyyil->y2018 }}" class="input w-full border mt-2" >
                </div>
                <div class="w-full col-span-1 ">
                    <label class="flex flex-col sm:flex-row">   2019-yil
                    </label>
                    <input type="text" name="y2019" value="{{ $ilmiydaraja->umumiyyil->y2019 }}" class="input w-full border mt-2" >
                </div>
                <div class="w-full col-span-1 ">
                    <label class="flex flex-col sm:flex-row">   2020-yil
                    </label>
                    <input type="text" name="y2020" value="{{ $ilmiydaraja->umumiyyil->y2020 }}" class="input w-full border mt-2" >
                </div>
                <div class="w-full col-span-1 ">
                    <label class="flex flex-col sm:flex-row">   2021-yil
                    </label>
                    <input type="text" name="y2021" value="{{ $ilmiydaraja->umumiyyil->y2021 }}" class="input w-full border mt-2" >
                </div>
                <div class="w-full col-span-1 ">
                    <label class="flex flex-col sm:flex-row">   2022-yil
                    </label>
                    <input type="text" name="y2022" value="{{ $ilmiydaraja->umumiyyil->y2022 }}" class="input w-full border mt-2" >
                </div>
                <div class="w-full col-span-1 ">
                    <label class="flex flex-col sm:flex-row">   2023-yil
                    </label>
                    <input type="text" name="y2023" value="{{ $ilmiydaraja->umumiyyil->y2023 }}" class="input w-full border mt-2" >
                </div>
                <div class="w-full col-span-1 ">
                    <label class="flex flex-col sm:flex-row">   2024-yil
                    </label>
                    <input type="text" name="y2024" value="{{ $ilmiydaraja->umumiyyil->y2024 }}" class="input w-full border mt-2" >
                </div>

                <div class="w-full col-span-12 ">
                    <h2 style="text-align: center;font-size: 20px;font-weight: 500;">  Bir nafar ilmiy xodimga moliyalashtirish nisbati </h2>
                </div>

                
                
                <div class="w-full col-span-1 ">
                    <label class="flex flex-col sm:flex-row">   2017-yil
                    </label>
                    <input type="text" name="yil2017" value="{{ $ilmiydaraja->yillar->y2017 }}" class="input w-full border mt-2" >
                </div>
                <div class="w-full col-span-1 ">
                    <label class="flex flex-col sm:flex-row">   2018-yil
                    </label>
                    <input type="text" name="yil2018" value="{{ $ilmiydaraja->yillar->y2018 }}" class="input w-full border mt-2" >
                </div>
                <div class="w-full col-span-1 ">
                    <label class="flex flex-col sm:flex-row">   2019-yil
                    </label>
                    <input type="text" name="yil2019" value="{{ $ilmiydaraja->yillar->y2019 }}" class="input w-full border mt-2" >
                </div>
                <div class="w-full col-span-1 ">
                    <label class="flex flex-col sm:flex-row">   2020-yil
                    </label>
                    <input type="text" name="yil2020" value="{{ $ilmiydaraja->yillar->y2020 }}" class="input w-full border mt-2" >
                </div>
                <div class="w-full col-span-1 ">
                    <label class="flex flex-col sm:flex-row">   2021-yil
                    </label>
                    <input type="text" name="yil2021" value="{{ $ilmiydaraja->yillar->y2021 }}" class="input w-full border mt-2" >
                </div>
                <div class="w-full col-span-1 ">
                    <label class="flex flex-col sm:flex-row">   2022-yil
                    </label>
                    <input type="text" name="yil2022" value="{{ $ilmiydaraja->yillar->y2022 }}" class="input w-full border mt-2" >
                </div>
                <div class="w-full col-span-1 ">
                    <label class="flex flex-col sm:flex-row">   2023-yil
                    </label>
                    <input type="text" name="yil2023" value="{{ $ilmiydaraja->yillar->y2023 }}" class="input w-full border mt-2" >
                </div>
                <div class="w-full col-span-1 ">
                    <label class="flex flex-col sm:flex-row">   2024-yil
                    </label>
                    <input type="text" name="yil2024" value="{{ $ilmiydaraja->yillar->y2024 }}" class="input w-full border mt-2" >
                </div>
            </div>
        </form><br>
        <div class="px-5 pb-5 text-center">
            <a href="{{ route('ilmiydaraja.index') }}"   class="button delete-cancel w-32 border text-gray-700 mr-1">
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