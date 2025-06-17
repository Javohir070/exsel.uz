@extends('layouts.admin')

@section('content')


<div class="flex justify-between align-center mt-6 mb-6">

    <h2 class="intro-y text-lg font-medium">Ilmiy loyiha qo'shish</h2>

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

</div>
<div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2" style="background: white;
    padding: 20px 20px;
    border-radius: 4px">
    <div class="w-full mt-3 sm:mt-0 sm:ml-auto md:ml-0">
        <form id="science-paper-create-form" method="POST" action="{{ route("ilmiyloyiha.store") }}"
            class="validate-form" enctype="multipart/form-data" novalidate="novalidate">
            @csrf
            <div class="grid grid-cols-12 gap-2">
                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Loyiha mavzusi
                    </label>
                    <input type="text" name="mavzusi" value="{{old('mavzusi')}}" class="input w-full border mt-2"
                        required="">
                    @error('mavzusi')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>
                @role('super-admin')
                <div class="w-full col-span-6">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Tashkilotni tanlang
                    </label>
                    <input type="text" id="search" placeholder="Search..." class="input border w-full mt-2">

                    <select name="tashkilot_id" value="{{old('tashkilot_id')}}" id="science-search-category"
                        class="input border w-full mt-2" required="">
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

                    <select name="turi" value="{{old('turi')}}" id="science-sub12-category"
                        class="input border w-full mt-2" required="">

                        <option value=""></option>

                        <option value="Amaliy">Amaliy</option>

                        <option value="Fundamental">Fundamental</option>

                        <option value="Innovatsion">Innovatsion</option>

                        <option value="Tajriba-konstruktorlik">Tajriba-konstruktorlik</option>




                    </select>
                    @error('turi')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>


                <div class="w-full col-span-6">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Loyiha dasturi
                    </label>
                    <select name="dastyri" value="{{old('dastyri')}}" id="science-sub-category"
                        class="input border w-full mt-2" required="">

                        <option value=""></option>

                        <option value="Maqsadli">Maqsadli</option>

                        <option value="Mega">Mega</option>

                        <option value="Yosh olimlar">Yosh olimlar</option>

                        <option value="Olima ayollar">Olima ayollar</option>


                        <option value="Xalqaro-qo‘shma">Xalqaro-qo‘shma</option>

                        <option value="Tematik">Tematik</option>

                    </select><br>
                    @error('dastyri')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> Qo‘shma loyiha bo‘yicha hamkor tashkilot
                    </label>
                    <input type="text" name="q_hamkor_tashkilot" value="{{old('q_hamkor_tashkilot')}}"
                        class="input w-full border mt-2">
                    @error('q_hamkor_tashkilot')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> Xalqaro qo‘shma loyihalardagi hamkor davlat
                    </label>
                    <input type="text" name="hamkor_davlat" value="{{old('hamkor_davlat')}}"
                        class="input w-full border mt-2">
                    @error('hamkor_davlat')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>


                <div class="w-full col-span-6">
                    <label class="flex flex-col sm:flex-row"><span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Loyihani amalga oshirish muddati
                        (yil)
                    </label>
                    <select name="muddat" value="{{old('muddat')}}" id="science-sub-category"
                        class="input border w-full mt-2" required="">

                        <option value=""></option>

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
                    @error('muddat')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Loyihaning boshlanish sanasi
                    </label>

                    <input type="date" name="bosh_sana" value="{{old('bosh_sana')}}" class=" input w-full border mt-2"
                        required="">
                    @error('bosh_sana')
                        <div class="error">{{ $message }}</div>
                    @enderror

                </div>
                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Loyihaning tugash sanasi
                    </label>

                    <input type="date" name="tug_sana" value="{{old('tug_sana')}}" class=" input w-full border mt-2"
                        required="">
                    @error('tug_sana')
                        <div class="error">{{ $message }}</div>
                    @enderror

                </div>

                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Fan-yo‘lish
                    </label>
                    <input type="text" name="pan_yunalish" value="{{old('pan_yunalish')}}"
                        class=" input w-full border mt-2" required="">
                    @error('pan_yunalish')
                        <div class="error">{{ $message }}</div>
                    @enderror

                </div>

                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Loyiha rahbarining F.I.Sh.
                    </label>

                    <input type="text" name="rahbar_name" value="{{old('rahbar_name')}}"
                        class="input w-full border mt-2" required="">
                    @error('rahbar_name')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Tuzilgan shartnoma Raqami (sifr)
                    </label>
                    <input type="text" name="raqami" value="{{old('raqami')}}" class="input w-full border mt-2"
                        required="">
                    @error('raqami')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Tuzilgan shartnoma Sanasi
                    </label>
                    <input type="date" name="sanasi" value="{{old('sanasi')}}" class=" input w-full border mt-2">
                    @error('sanasi')
                        <div class="error">{{ $message }}</div>
                    @enderror

                </div>

                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Tuzilgan shartnoma summasi (so‘m)
                    </label>
                    <input type="number" name="sum" value="{{old('sum')}}" class="input w-full border mt-2" required="">
                    @error('sum')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>



                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Olingan asosiy natija
                    </label>
                    <!-- <input type="text" name="olingan_natija" value="{{old('olingan_natija')}}" class="input w-full border mt-2" > -->
                    <textarea name="olingan_natija" class="input w-full border mt-2" cols="20" rows="5"
                        required="">{{old('olingan_natija')}}</textarea>

                    @error('olingan_natija')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Joriy etish (Tatbiq etish) holati
                    </label>
                    <!-- <input type="text" name="joriy_holati" value="{{old('joriy_holati')}}" class="input w-full border mt-2" > -->
                    <textarea name="joriy_holati" class="input w-full border mt-2" cols="20" rows="5"
                        required="">{{old('joriy_holati')}}</textarea>
                    @error('joriy_holati')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Tijoratlashtirish holati
                    </label>
                    <select name="tijoratlashtirish" value="{{old('tijoratlashtirish')}}"
                        class="input border w-full mt-2" required="">

                        <option value=""></option>

                        <option value="Tijoratlashtirilgan">Tijoratlashtirilgan</option>

                        <option value="Tijoratlashtirilmagan">Tijoratlashtirilmagan</option>

                    </select><br>
                    @error('tijoratlashtirish')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Ilmiy loyiha 5% moliyalashtirilganmi?
                    </label>
                    <select name="moliyalashtirilganmi" value="{{old('moliyalashtirilganmi')}}"
                        class="input border w-full mt-2" required="">

                        <option value=""></option>

                        <option value="Ha moliyalashtirilgan">Ha moliyalashtirilgan</option>

                        <option value="Yo'q moliyalashtirilmagan">Yo'q moliyalashtirilmagan</option>


                    </select><br>
                    @error('moliyalashtirilganmi')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <!-- <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> Laboratoriyani tanlang</label>
                    <select name="laboratory_id" value="{{old('laboratory_id')}}" class="input border w-full mt-2">

                        <option value="">laboratoriyani tanlang</option>
                        @foreach ($laboratorylar as $laboratory)
                            <option value="{{ $laboratory->id }}">{{ $laboratory->name }}</option>
                        @endforeach
                        <option value="">yo'q</option>

                    </select><br>
                    @error('laboratory_id')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div> -->


                <div class="w-full col-span-2 ">
                    <label class="flex flex-col sm:flex-row"> 2017-yil
                    </label>
                    <input type="number" name="y2017" value="{{old('y2017')}}" class="input w-full border mt-2">
                </div>
                <div class="w-full col-span-2 ">
                    <label class="flex flex-col sm:flex-row"> 2018-yil
                    </label>
                    <input type="number" name="y2018" value="{{old('y2018')}}" class="input w-full border mt-2">
                </div>
                <div class="w-full col-span-2 ">
                    <label class="flex flex-col sm:flex-row"> 2019-yil
                    </label>
                    <input type="number" name="y2019" value="{{old('y2019')}}" class="input w-full border mt-2">
                </div>
                <div class="w-full col-span-2 ">
                    <label class="flex flex-col sm:flex-row"> 2020-yil
                    </label>
                    <input type="number" name="y2020" value="{{old('y2020')}}" class="input w-full border mt-2">
                </div>
                <div class="w-full col-span-2 ">
                    <label class="flex flex-col sm:flex-row"> 2021-yil
                    </label>
                    <input type="number" name="y2021" value="{{old('y2021')}}" class="input w-full border mt-2">
                </div>
                <div class="w-full col-span-2 ">
                    <label class="flex flex-col sm:flex-row"> 2022-yil
                    </label>
                    <input type="number" name="y2022" value="{{old('y2022')}}" class="input w-full border mt-2">
                </div>
                <div class="w-full col-span-2 ">
                    <label class="flex flex-col sm:flex-row"> 2023-yil
                    </label>
                    <input type="number" name="y2023" value="{{old('y2023')}}" class="input w-full border mt-2">
                </div>
                <div class="w-full col-span-2 ">
                    <label class="flex flex-col sm:flex-row"> 2024-yil
                    </label>
                    <input type="number" name="y2024" value="{{old('y2024')}}" class="input w-full border mt-2">
                </div>
            </div>
        </form>
        <div class="px-5 pb-5 text-center mt-4">

            @if (auth()->user()->hasRole('labaratoriyaga_masul'))
                <a href="{{ route('lab_ilmiyloyiha.index') }}" class="button delete-cancel w-32 border text-gray-700 mr-1">
                    Bekor qilish
                </a>
            @elseif (auth()->user()->hasRole('kafedra_mudiri'))

                <a href="{{ route('kafedralar_ilmiyloyiha.index') }}"
                    class="button delete-cancel w-32 border text-gray-700 mr-1">
                    Bekor qilish
                </a>
            @else
                <a href="{{ route('ilmiyloyiha.index') }}" class="button delete-cancel w-32 border text-gray-700 mr-1">
                    Bekor qilish
                </a>
            @endif
            <button type="submit" form="science-paper-create-form"
                class="update-confirm button w-24 bg-theme-1 text-white">
                Saqlash
            </button>
        </div>
    </div>
</div>



<script>
    document.addEventListener('DOMContentLoaded', function () {
        var searchInput = document.getElementById('search');
        var select = document.getElementById('science-search-category');

        searchInput.addEventListener('keyup', function () {
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
