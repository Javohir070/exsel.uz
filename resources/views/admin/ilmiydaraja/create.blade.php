@extends('layouts.admin')

@section('content')


<div class="flex justify-between align-center mt-10">

    <h2 class="intro-y text-lg font-medium"> Ilmiy loyiha bilan taminlanganmi  qo'shish</h2>



</div><br>
<div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2" style="background: white;
    padding: 20px 20px;
    border-radius: 20px">
    <div class="w-full mt-3 sm:mt-0 sm:ml-auto md:ml-0">
        <form id="science-paper-create-form" method="POST" action="{{ route("ilmiydaraja.store") }}" class="validate-form"
            enctype="multipart/form-data" novalidate="novalidate">
            @csrf
            <div class="grid grid-cols-12 gap-2">
                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Jami xodimlar soni
                    </label>
                    <input type="text" name="xodimlar_jami" value="{{ old('xodimlar_jami') }}" class="input w-full border mt-2" required="">
                    @error('xodimlar_jami')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Ilmiy xodimlar soni
                    </label>
                    <input type="text" name="ilmiy_xodimlar" value="{{ old('ilmiy_xodimlar') }}" class="input w-full border mt-2" required="">
                    @error('ilmiy_xodimlar')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Ilmiy loyiha nomi
                    </label>
                    <input type="text" name="name" value="{{ old('name') }}" class="input w-full border mt-2" required="">
                    @error('name')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Ilmiy loyiha turi
                    </label>
                    <select name="turi" value="{{ old('turi') }}"  id="science-sub-category" class="input border w-full mt-2" required="">

                        <option value="">Loyiha turini tanlang</option>

                        <option value="Maqsadli">Maqsadli</option>

                        <option value="Xalqaro-qo‘shma">Xalqaro-qo‘shma</option>

                        <option value="Yosh olimlar">Yosh olimlar</option>

                        <option value="Olima ayollar">Olima ayollar</option>

                        <option value="Fundamental">Fundamental</option>

                        <option value="Innovatsion">Innovatsion</option>

                        <option value="Amaliy">Amaliy</option>

                    </select>
                    @error('turi')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Moliyalashtirish hajmi jami
                    </label>
                    <input type="text" name="moliyal_jami" value="{{ old('moliyal_jami') }}" class="input w-full border mt-2" required="">
                    @error('moliyal_jami')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>
                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Bir nafar ilmiy xodimga moliyalashtirish nisbati jami
                    </label>
                    <input type="text" name="xodimganisbat_jami" value="{{ old('xodimganisbat_jami') }}" class="input w-full border mt-2" required="">
                    @error('xodimganisbat_jami')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>


                <div class="w-full col-span-12 ">
                    <h2 style="text-align: center;font-size: 20px;font-weight: 500;">  Moliyalashtirish hajmi </h2>
                </div>
                <div class="w-full col-span-12 " style="text-align:center">
                    <div class="grid grid-cols-12 gap-2 ">
                    <div class="w-full col-span-1 ">
                        <label class="flex flex-col sm:flex-row">   2017-yil
                        </label>
                        <input type="text" name="y2017" value="{{ old('y2017') }}" class="input w-full border mt-2" >
                    </div>
                    <div class="w-full col-span-1 ">
                        <label class="flex flex-col sm:flex-row">   2018-yil
                        </label>
                        <input type="text" name="y2018" value="{{ old('y2018') }}" class="input w-full border mt-2" >
                    </div>
                    <div class="w-full col-span-1 ">
                        <label class="flex flex-col sm:flex-row">   2019-yil
                        </label>
                        <input type="text" name="y2019" value="{{ old('y2019') }}" class="input w-full border mt-2" >
                    </div>
                    <div class="w-full col-span-1 ">
                        <label class="flex flex-col sm:flex-row">   2020-yil
                        </label>
                        <input type="text" name="y2020" value="{{ old('y2020') }}" class="input w-full border mt-2" >
                    </div>
                    <div class="w-full col-span-1 ">
                        <label class="flex flex-col sm:flex-row">   2021-yil
                        </label>
                        <input type="text" name="y2021" value="{{ old('y2021') }}" class="input w-full border mt-2" >
                    </div>
                    <div class="w-full col-span-1 ">
                        <label class="flex flex-col sm:flex-row">   2022-yil
                        </label>
                        <input type="text" name="y2022" value="{{ old('y2022') }}" class="input w-full border mt-2" >
                    </div>
                    <div class="w-full col-span-1 ">
                        <label class="flex flex-col sm:flex-row">   2023-yil
                        </label>
                        <input type="text" name="y2023" value="{{ old('y2023') }}" class="input w-full border mt-2" >
                    </div>
                    <div class="w-full col-span-1 ">
                        <label class="flex flex-col sm:flex-row">   2024-yil
                        </label>
                        <input type="text" name="y2024" value="{{ old('y2024') }}" class="input w-full border mt-2" >
                    </div>
                    </div>
                </div>

              
                <div class="w-full col-span-12 ">
                    <h2 style="text-align: center;font-size: 20px;font-weight: 500;">  Bir nafar ilmiy xodimga moliyalashtirish nisbati </h2>
                </div>
                
                <div class="w-full col-span-1 ">
                    <label class="flex flex-col sm:flex-row">  2017-yil
                    </label>
                    <input type="text" name="yil2017" value="{{ old('yil2017') }}" class="input w-full border mt-2" >
                </div>
                <div class="w-full col-span-1 ">
                    <label class="flex flex-col sm:flex-row">  2018-yil
                    </label>
                    <input type="text" name="yil2018" value="{{ old('yil2018') }}" class="input w-full border mt-2" >
                </div>
                <div class="w-full col-span-1 ">
                    <label class="flex flex-col sm:flex-row">  2019-yil
                    </label>
                    <input type="text" name="yil2019" value="{{ old('yil2019') }}" class="input w-full border mt-2" >
                </div>
                <div class="w-full col-span-1 ">
                    <label class="flex flex-col sm:flex-row">  2020-yil
                    </label>
                    <input type="text" name="yil2020" value="{{ old('yil2020') }}" class="input w-full border mt-2" >
                </div>
                <div class="w-full col-span-1 ">
                    <label class="flex flex-col sm:flex-row">  2021-yil
                    </label>
                    <input type="text" name="yil2021" value="{{ old('yil2021') }}" class="input w-full border mt-2" >
                </div>
                <div class="w-full col-span-1 ">
                    <label class="flex flex-col sm:flex-row">  2022-yil
                    </label>
                    <input type="text" name="yil2022" value="{{ old('yil2022') }}" class="input w-full border mt-2" >
                </div>
                <div class="w-full col-span-1 ">
                    <label class="flex flex-col sm:flex-row">  2023-yil
                    </label>
                    <input type="text" name="yil2023" value="{{ old('yil2023') }}" class="input w-full border mt-2" >
                </div>
                <div class="w-full col-span-1 ">
                    <label class="flex flex-col sm:flex-row">  2024-yil
                    </label>
                    <input type="text" name="yil2024" value="{{ old('yil2024') }}" class="input w-full border mt-2" >
                </div>

            </div>
        </form><br>
        <div class="px-5 pb-5 text-center">
            <a href="{{ route('ilmiydaraja.index') }}"  class="button delete-cancel w-32 border text-gray-700 mr-1">
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