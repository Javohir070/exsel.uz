@extends('layouts.admin')

@section('content')


    <div class="flex justify-between align-center mt-6 mb-6">

        <h2 class="intro-y text-lg font-medium"> Iqtisodiy moliyaviy faoliyat tahrirlash</h2>

        <a href="{{ route('iqtisodiy.index') }}" class="button w-24 bg-theme-1 text-white">
            Orqaga
        </a>

    </div>

    <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2" style="background: white;
        padding: 20px 20px;
        border-radius: 4px">
        <div class="w-full mt-3 sm:mt-0 sm:ml-auto md:ml-0">
            <form id="science-paper-create-form" method="POST"
                action="{{ route("iqtisodiy.update", ['iqtisodiy' => $iqtisodiy->id])}}" class="validate-form"
                enctype="multipart/form-data" novalidate="novalidate">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-12 gap-2">
                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"> <span
                                class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Tashkilot kadastr raqami
                        </label>
                        <input type="text" name="kadastr_raqami" value="{{$iqtisodiy->kadastr_raqami}}"
                            class="input w-full border mt-2" required="">
                        @error('kadastr_raqami')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"> <span
                                class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Umumiy maydoni (ga)
                        </label>
                        <input type="text" name="u_maydoni" value="{{$iqtisodiy->u_maydoni}}"
                            class="input w-full border mt-2" required="">
                        @error('u_maydoni')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"> <span
                                class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Shundan tajriba maydonlari (ga)
                        </label>
                        <input type="text" name="taj_maydonlari" value="{{$iqtisodiy->taj_maydonlari}}"
                            class="input w-full border mt-2" required="">
                        @error('taj_maydonlari')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"> <span
                                class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Binolar soni
                        </label>
                        <input type="text" name="binolar_soni" value="{{$iqtisodiy->binolar_soni}}"
                            class="input w-full border mt-2" required="">
                        @error('binolar_soni')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"> <span
                                class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Binolarning auditoriya sig‘imi
                        </label>
                        <input type="text" name="auditoriya_sigimi" value="{{$iqtisodiy->auditoriya_sigimi}}"
                            class="input w-full border mt-2" required="">
                        @error('auditoriya_sigimi')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"> <span
                                class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Katta xajmdagi auditoriyalar soni
                            (150-200 kishilik)
                        </label>
                        <input type="text" name="k_xaj_auditor_soni" value="{{$iqtisodiy->k_xaj_auditor_soni}}"
                            class="input w-full border mt-2" required="">
                        @error('k_xaj_auditor_soni')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"> <span
                                class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Ustav fondi miqdori, mln so‘mda
                        </label>
                        <input type="text" name="pondi_miqdori" value="{{$iqtisodiy->pondi_miqdori}}"
                            class="input w-full border mt-2" required="">
                        @error('pondi_miqdori')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"> <span
                                class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Ilmiy faoliyatni amalga oshiruvchi
                            bo‘linmalar (bo‘lim, kafedra, laboratoriya) soni
                        </label>
                        <input type="text" name="ilmiyp_bulinalar" value="{{$iqtisodiy->ilmiyp_bulinalar}}"
                            class="input w-full border mt-2" required="">
                        @error('ilmiyp_bulinalar')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="w-full col-span-4">
                        <label class="flex flex-col sm:flex-row"> <span
                                class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> tabiy gaz mavjudligi
                        </label>
                        <div class="flex flex-col sm:flex-row mt-2">
                            <div class="flex items-center text-gray-700 mr-2">
                                <input type="radio" class="input border mr-2" name="gaz" value="ha" {{ $iqtisodiy->gaz == 'ha' ? 'checked' : '' }}>
                                <label class="cursor-pointer select-none">Ha</label>
                            </div>
                            <div class="flex items-center text-gray-700 mr-2 mt-2 sm:mt-0">
                                <input type="radio" class="input border mr-2" name="gaz" value="yoq" {{ $iqtisodiy->gaz == 'yoq' ? 'checked' : '' }}>
                                <label class="cursor-pointer select-none">Yoq</label>
                            </div>
                            @error('gaz')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="w-full col-span-4">
                        <label class="flex flex-col sm:flex-row"> <span
                                class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> elektr energiya mavjudligi
                        </label>
                        <div class="flex flex-col sm:flex-row mt-2">
                            <div class="flex items-center text-gray-700 mr-2">
                                <input type="radio" class="input border mr-2" name="elektr" value="ha" {{ $iqtisodiy->elektr == 'ha' ? 'checked' : '' }}>
                                <label class="cursor-pointer select-none">Ha</label>
                            </div>
                            <div class="flex items-center text-gray-700 mr-2 mt-2 sm:mt-0">
                                <input type="radio" class="input border mr-2" name="elektr" value="yoq" {{ $iqtisodiy->elektr == 'yoq' ? 'checked' : '' }}>
                                <label class="cursor-pointer select-none">Yoq</label>
                            </div>
                            @error('elektr')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="w-full col-span-4">
                        <label class="flex flex-col sm:flex-row"> <span
                                class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> suv mavjudligi
                        </label>
                        <div class="flex flex-col sm:flex-row mt-2">
                            <div class="flex items-center text-gray-700 mr-2">
                                <input type="radio" class="input border mr-2" name="suv" value="ha" {{ $iqtisodiy->suv == 'ha' ? 'checked' : '' }}>
                                <label class="cursor-pointer select-none">Ha</label>
                            </div>
                            <div class="flex items-center text-gray-700 mr-2 mt-2 sm:mt-0">
                                <input type="radio" class="input border mr-2" name="suv" value="yoq" {{ $iqtisodiy->suv == 'yoq' ? 'checked' : '' }}>
                                <label class="cursor-pointer select-none">Yoq</label>
                            </div>
                            @error('suv')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="w-full col-span-4">
                        <label class="flex flex-col sm:flex-row"> <span
                                class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> kanalizatsiya mavjudligi
                        </label>
                        <div class="flex flex-col sm:flex-row mt-2">
                            <div class="flex items-center text-gray-700 mr-2">
                                <input type="radio" class="input border mr-2" name="kanalizasiya" value="ha" {{ $iqtisodiy->kanalizasiya == 'ha' ? 'checked' : '' }}>
                                <label class="cursor-pointer select-none">Ha</label>
                            </div>
                            <div class="flex items-center text-gray-700 mr-2 mt-2 sm:mt-0">
                                <input type="radio" class="input border mr-2" name="kanalizasiya" value="yoq" {{ $iqtisodiy->kanalizasiya == 'yoq' ? 'checked' : '' }}>
                                <label class="cursor-pointer select-none">Yoq</label>
                            </div>
                            @error('kanalizasiya')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="w-full col-span-4">
                        <label class="flex flex-col sm:flex-row"> <span
                                class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>internet mavjudligi
                        </label>
                        <div class="flex flex-col sm:flex-row mt-2">
                            <div class="flex items-center text-gray-700 mr-2">
                                <input type="radio" class="input border mr-2" name="internet" value="ha" {{ $iqtisodiy->internet == 'ha' ? 'checked' : '' }}>
                                <label class="cursor-pointer select-none">Ha</label>
                            </div>
                            <div class="flex items-center text-gray-700 mr-2 mt-2 sm:mt-0">
                                <input type="radio" class="input border mr-2" name="internet" value="yoq" {{ $iqtisodiy->internet == 'yoq' ? 'checked' : '' }}>
                                <label class="cursor-pointer select-none">Yoq</label>
                            </div>
                            @error('internet')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </form>

            <div class="px-5 pb-5 text-center mt-4">
                <a href="{{ route('iqtisodiy.index') }}" class="button delete-cancel w-32 border text-gray-700 mr-1">
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
