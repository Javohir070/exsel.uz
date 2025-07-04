@extends('layouts.admin')

@section('content')

    <div class="flex justify-between align-center mt-6 mb-6">

        <h2 class="intro-y text-lg font-medium">Tashkilot qo'shish</h2>

    </div>

    <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2" style="background: white;
                padding: 20px 20px;
                border-radius: 4px">
        <div class="w-full mt-3 sm:mt-0 sm:ml-auto md:ml-0">
            <form id="science-paper-create-form" method="POST" action="{{ route("tashkilot.store") }}" class="validate-form"
                enctype="multipart/form-data" novalidate="novalidate">
                @csrf
                <div class="grid grid-cols-12 gap-2">
                    <div class="w-full col-span-6 ">
                        <label class="flex flex-col sm:flex-row"> <span
                                class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Tashkilot nomi
                        </label>
                        <input type="text" name="name" value="{{ old('name') }}" class="input w-full border mt-2"
                            required="">
                        @error('name')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="w-full col-span-6 ">
                        <label class="flex flex-col sm:flex-row"> <span
                                class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Id raqami
                        </label>
                        <input type="text" name="id_raqam" value="{{ old('id_raqam') }}" class="input w-full border mt-2"
                            required="">
                        @error('id_raqam')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="w-full col-span-6 ">
                        <label class="flex flex-col sm:flex-row"> <span
                                class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Tashkilot turini tanlang
                        </label>
                        <select name="tashkioy_turi" value="{{old('tashkioy_turi')}}" class="input border w-full mt-2">

                            <option value="">Turi</option>

                            <option value="otm" >OTM</option>

                            <option value="itm" >ITM</option>

                            <option value="boshqa" >Boshqa</option>

                        </select>
                        @error('id_raqam')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="w-full col-span-6 ">
                        <label class="flex flex-col sm:flex-row"> <span
                                class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Tashkilot stir raqamin kiriting
                        </label>
                        <input type="number" name="stir_raqami" value="{{ old('stir_raqami') }}"
                            class="input w-full border mt-2" required="">
                        @error('stir_raqami')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="w-full col-span-6 ">
                        <label class="flex flex-col sm:flex-row"> <span
                                class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Viloyatni tanlang
                        </label>
                        <select class="input border w-full mt-2" name="region_id" id="region_id">
                            <option value="">Viloyatlari</option>
                            @foreach ($regions as $v)
                                <option value="{{ $v->id }}" @selected(request("region_id") === $v->id)>{{ $v->oz }}</option>
                            @endforeach
                        </select>
                        @error('stir_raqami')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                </div>
            </form>

            <div class="px-5 pb-5 text-center mt-4">
                <a href="{{ route('tashkilotlar.index') }}" type="button" data-dismiss="modal"
                    class="button delete-cancel w-32 border text-gray-700 mr-1">
                    Bekor qilish
                </a>
                <button type="submit" form="science-paper-create-form"
                    class="update-confirm button w-24 bg-theme-1 text-white">
                    Qo'shish
                </button>
            </div>

        </div>
    </div>

@endsection
