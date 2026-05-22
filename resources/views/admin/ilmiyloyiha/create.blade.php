@extends('layouts.admin')

@section('content')

    <div class="flex justify-between align-center mt-6 mb-6">

        <h2 class="intro-y text-lg font-medium">Ilmiy loyiha qo'shish</h2>

    </div>
    <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2 monitoring-form">
        <div class="w-full mt-3 sm:mt-0 sm:ml-auto md:ml-0">
            <form id="science-paper-create-form" method="POST" action="{{ route('ilmiyloyiha.store') }}" class="validate-form"
                enctype="multipart/form-data" novalidate="novalidate">
                @csrf
                <div class="grid grid-cols-12 gap-2">
                    <div class="w-full col-span-6 ">
                        <label class="flex flex-col sm:flex-row"> <span
                                class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Loyiha mavzusi
                        </label>
                        <input type="text" name="mavzusi" value="{{ old('mavzusi') }}" class="input w-full border mt-2"
                            required="">
                        @error('mavzusi')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>
                    @role(['super-admin', 'Ilmiy loyihalar boyicha masul'])
                        <div class="w-full col-span-6">
                            <label class="flex flex-col sm:flex-row mb-2"> <span
                                    class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Tashkilotni tanlang
                            </label>
                            <select name="tashkilot_id" id="science-search-category" class="select2 w-full mt-2"
                                value="{{ old('tashkilot_id') }}" required="">
                                <option value="">Tashkilotni tanlang</option>
                                @foreach ($tashkilots as $tashkilot)
                                    <option value="{{ $tashkilot->id }}">{{ $tashkilot->name }}</option>
                                @endforeach
                            </select>
                            @error('tashkilot_id')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>
                    @endrole

                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"> <span
                                class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Loyiha turi
                        </label>

                        <select name="turi" value="{{ old('turi') }}" id="science-sub12-category"
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
                        <select name="dastyri" value="{{ old('dastyri') }}" id="science-sub-category"
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


                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"><span
                                class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Loyihani amalga oshirish muddati
                            (yil)
                        </label>
                        <select name="muddat" value="{{ old('muddat') }}" id="science-sub-category"
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

                        <input type="date" name="bosh_sana" value="{{ old('bosh_sana') }}"
                            class=" input w-full border mt-2" required="">
                        @error('bosh_sana')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="w-full col-span-6 ">
                        <label class="flex flex-col sm:flex-row"> <span
                                class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Loyihaning tugash sanasi
                        </label>

                        <input type="date" name="tug_sana" value="{{ old('tug_sana') }}"
                            class=" input w-full border mt-2" required="">
                        @error('tug_sana')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="w-full col-span-6 ">
                        <label class="flex flex-col sm:flex-row"> <span
                                class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Loyiha rahbarining F.I.Sh.
                        </label>

                        <input type="text" name="rahbar_name" value="{{ old('rahbar_name') }}"
                            class="input w-full border mt-2" required="">
                        @error('rahbar_name')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="w-full col-span-6 ">
                        <label class="flex flex-col sm:flex-row"> <span
                                class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Tuzilgan shartnoma Raqami
                        </label>

                        <input type="text" name="raqami" value="{{ old('raqami') }}"
                            class="input w-full border mt-2" required="">
                        @error('raqami')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                </div>
            </form>
            <div class="px-5 pb-5 text-center mt-4">
                    <a href="{{ route('ilmiy_loyihalar_all.index') }}"
                        class="button delete-cancel w-32 border text-gray-700 mr-1">
                        Bekor qilish
                    </a>
                <button type="submit" form="science-paper-create-form"
                    class="update-confirm button w-24 bg-theme-1 text-white">
                    Saqlash
                </button>
            </div>
        </div>
    </div>
@endsection
