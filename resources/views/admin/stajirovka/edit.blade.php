@extends('layouts.admin')

@section('content')

    <div class="flex justify-between align-center mt-6 mb-6">

        <h2 class="intro-y text-lg font-medium">Stajirovka tahrirlash</h2>

        <a href="{{ route('stajirovka.index') }}" class="button w-24 bg-theme-1 text-white">
            Orqaga
        </a>

    </div>

    <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2" style="background: white;
            padding: 20px 20px;
                border-radius: 4px">
        <div class="w-full mt-3 sm:mt-0 sm:ml-auto md:ml-0">
            <form id="science-paper-create-form" method="POST"
                action="{{ route("stajirovka.update", ['stajirovka' => $stajirovka->id]) }}" class="validate-form"
                enctype="multipart/form-data" novalidate="novalidate">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-12 gap-2">
                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"> <span
                                class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Yosh olimning F.I.O.
                        </label>
                        <input type="text" name="fish" value="{{ $stajirovka->fish }}" class="input w-full border mt-2"
                            required="">
                        @error('fish')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"> <span
                                class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Yosh olimning lavozimi
                        </label>
                        <input type="text" name="lavozim" value="{{ $stajirovka->lavozim }}"
                            class="input w-full border mt-2" required="">
                        @error('lavozim')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"> <span
                                class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Stajirovkaga yuborilgan yili
                        </label>
                        {{-- <input type="text" name="yil" value="{{ old('yil') }}" class="input w-full border mt-2"
                            required=""> --}}
                        <select name="yil" value="{{ old('yil') }}"
                            class="science-sub-categoryyil input border w-full mt-2 " required="">
                            <option value="{{ $stajirovka->yil }}">{{ $stajirovka->yil }}</option>
                        </select>
                        @error('yil')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"> <span
                                class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Ilmiy stajirovka yo‘nalishi
                        </label>
                        <input type="text" name="yunalishi" value="{{ $stajirovka->yunalishi }}"
                            class="input w-full border mt-2" required="">
                        @error('yunalishi')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"> <span
                                class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Ilmiy hisobot taqdim etilganligi
                            (Pdf)
                        </label>
                        <input type="file" name="ilmiy_hisobot" value="" class="input w-full border mt-2" required="">
                        @error('ilmiy_hisobot')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"> <span
                                class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Stajirovka davrida egallangan bilim
                            va ko'nikmalarni amalga oshirilishi uchun zarur shart-sharoitlar yaratilganligi.
                            (Asoslantiruvchi hujjatlar, rasm va videolar, zip)
                        </label>
                        <input type="file" name="egallangan_bilim" value="" class="input w-full border mt-2" required="">
                        @error('egallangan_bilim')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"> <span
                                class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Ilmiy-tadqiqot ishlari natijalari
                            bo'yicha xorijiy ilmiy anjumanlarda ma'ruza bilan ishtirok etganligi. (Asoslantiruvchi
                            hujjatlar, rasm va videolar hamda havolalar, zip)
                        </label>
                        <input type="file" name="ishlar_natijalari" value="" class="input w-full border mt-2" required="">
                        @error('ishlar_natijalari')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"> <span
                                class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Xalqaro tan olingan ma'lumotlar
                            bazasidagi yetakchi ilmiy jurnallarda nashr qilinganligi. (Pdf)
                        </label>
                        <input type="file" name="xalqarotan_jur_nashr" value="" class="input w-full border mt-2"
                            required="">
                        @error('xalqarotan_jur_nashr')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"> <span
                                class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Kamida bir yil davomida Agentlik
                            tomonidan tashkil etiladigan va boshqa tadbirlarda stajirovka davrida to'plangan tajribalar va
                            olgan bilim va ko'nikmalari borasida o'z fikr va mulohazalarini bayon etilganligi tafsiloti.
                            (Asoslantiruvchi hujjatlar, rasm va videolar hamda havolalar, zip)
                        </label>
                        <input type="file" name="biryil_davomida" value="" class="input w-full border mt-2" required="">
                        @error('biryil_davomida')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                </div>
            </form>

            <div class="px-5 pb-5 text-center mt-4">
                @if (auth()->user()->hasRole('labaratoriyaga_masul'))
                    <a href="{{ route('laboratoriya.index') }}" class="button delete-cancel w-32 border text-gray-700 mr-1">
                        Bekor qilish
                    </a>
                @else
                    <a href="{{ route('stajirovka.index') }}" class="button delete-cancel w-32 border text-gray-700 mr-1">
                        Bekor qilish
                    </a>
                @endif


                <button type="submit" form="science-paper-create-form"
                    class="update-confirm button w-24 bg-theme-1 text-white">
                    Qo'shish
                </button>
            </div>

        </div>
    </div>

@endsection
