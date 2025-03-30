@extends('layouts.admin')

@section('content')
    <div class="content">
        <div class="flex justify-between align-center mt-10">

            <h2 class="intro-y text-lg font-medium">Ilmiy izlanuvchilar</h2>

        </div>
        @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif

        {{-- <div class="grid grid-cols-12 gap-6 mt-5">

            <div class="col-span-12 sm:col-span-6 xl:col-span-4 intro-y">
                <a href="#">
                    <div class="report-box zoom-in">
                        <div class="box p-5">
                            <div class="flex">
                                <i data-feather="bar-chart" class="report-box__icon text-theme-9"></i>
                            </div>
                            <div class="text-3xl font-bold leading-8 mt-6">{{ $lab_izlanuvchilar }}</div>
                            <div class="text-base text-gray-600 mt-1">Jami ilmiy izlanuvchilar</div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-span-12 sm:col-span-6 xl:col-span-4 intro-y">
                <a href="#">
                    <div class="report-box zoom-in">
                        <div class="box p-5">
                            <div class="flex">
                                <i data-feather="users" class="report-box__icon text-theme-9"></i>
                            </div>
                            <div class="text-3xl font-bold leading-8 mt-6">{{ $dsc_soni }}</div>
                            <div class="text-base text-gray-600 mt-1">Doktorantura (DSc)</div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-span-12 sm:col-span-6 xl:col-span-4 intro-y">
                <a href="#">
                    <div class="report-box zoom-in">
                        <div class="box p-5">
                            <div class="flex">
                                <i data-feather="users" class="report-box__icon text-theme-9"></i>
                            </div>
                            <div class="text-3xl font-bold leading-8 mt-6">{{ $dscmus_soni }}</div>
                            <div class="text-base text-gray-600 mt-1">Mustaqil izlanuvchi (DSc)</div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-span-12 sm:col-span-6 xl:col-span-4 intro-y">
                <a href="#">
                    <div class="report-box zoom-in">
                        <div class="box p-5">
                            <div class="flex">
                                <i data-feather="users" class="report-box__icon text-theme-6"></i>
                            </div>
                            <div class="text-3xl font-bold leading-8 mt-6">{{ $phd_soni }}</div>
                            <div class="text-base text-gray-600 mt-1">Tayanch doktorantura (PhD)</div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-span-12 sm:col-span-6 xl:col-span-4 intro-y">
                <a href="#">
                    <div class="report-box zoom-in">
                        <div class="box p-5">
                            <div class="flex">
                                <i data-feather="users" class="report-box__icon text-theme-6"></i>
                            </div>
                            <div class="text-3xl font-bold leading-8 mt-6">{{ $phdmus_soni }}</div>
                            <div class="text-base text-gray-600 mt-1">Mustaqil izlanuvchi (PhD)</div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-span-12 sm:col-span-6 xl:col-span-4 intro-y">
                <a href="#">
                    <div class="report-box zoom-in">
                        <div class="box p-5">
                            <div class="flex">
                                <i data-feather="users" class="report-box__icon text-theme-9"></i>
                            </div>
                            <div class="text-3xl font-bold leading-8 mt-6">{{ $stajyor_soni }}</div>
                            <div class="text-base text-gray-600 mt-1">Stajyor-tadqiqotchi</div>
                        </div>
                    </div>
                </a>
            </div>
        </div> --}}


        <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-10"
            style="background: white; padding: 20px 20px; border-radius: 20px">
            <div class="w-full mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                <form id="science-paper-create-form" method="POST" action="{{ route('doktaranturaexpert.update', $doktaranturaexpert->id) }}"
                    class="validate-form" enctype="multipart/form-data" novalidate="novalidate">
                    @csrf
                    @method('PUT')
                    <div class="grid grid-cols-12 gap-2">


                       {{-- <div class="w-full col-span-6">
                            <label class="flex flex-col sm:flex-row"> <span
                                    class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Yagona elektron tizimdagi
                                izlanuvchilar sonining tashkilot buyruqlari bilan mutanosibligi. Son qiymati izohda
                                keltiriladi.
                            </label>
                            <select name="tash_buyruq_mutanosi" id="science-sub-category" class="input border w-full mt-2"
                                required="">

                                <option value="" {{ $doktaranturaexpert->tash_buyruq_mutanosi == '' ? 'selected' : '' }}></option>
                                <option value="Mos keladi" {{ $doktaranturaexpert->tash_buyruq_mutanosi == 'Mos keladi' ? 'selected' : '' }}>Mos keladi</option>
                                <option value="Mos kelmaydi" {{ $doktaranturaexpert->tash_buyruq_mutanosi == 'Mos kelmaydi' ? 'selected' : '' }}>Mos kelmaydi</option>

                            </select><br>

                            @error('muddat')
                                <div class="error">{{ $message }}</div>
                            @enderror
                         </div>

                        <div class="w-full col-span-6">
                            <label class="flex flex-col sm:flex-row"> <span
                                    class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Izlanuvchilarning yakka
                                tartibdagi ish rejasini tasdiqlanganlik holati. Kamchiliklar izohda keltiriladi.
                            </label>
                            <select name="ish_rejasi" id="science-sub-category" class="input border w-full mt-2"
                                required="">

                                <option value="" {{ $doktaranturaexpert->ish_rejasi == '' ? 'selected' : '' }}></option>
                                <option value="Barchasi tasdiqlangan (100%)" {{ $doktaranturaexpert->ish_rejasi == 'Barchasi tasdiqlangan (100%)' ? 'selected' : '' }}>Barchasi tasdiqlangan (100%)</option>
                                <option value="Qisman tasdiqlangan (60-99%)" {{ $doktaranturaexpert->ish_rejasi == 'Qisman tasdiqlangan (60-99%)' ? 'selected' : '' }}>Qisman tasdiqlangan (60-99%)</option>
                                <option value="Tasdiqlanmagan" {{ $doktaranturaexpert->ish_rejasi == 'Tasdiqlanmagan' ? 'selected' : '' }}>Tasdiqlanmagan</option>

                            </select><br>

                            @error('muddat')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="w-full col-span-6">
                            <label class="flex flex-col sm:flex-row">
                                <span class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>
                                Izlanuvchilarning ta’lim bosqichi bo‘yicha belgilangan me’zonlarni bajarganligi. Kurslar kesimida ko‘rib chiqilib, kamchiliklar izohda keltiriladi.
                            </label>
                            <select name="kurs_kesimi" id="science-sub-category" class="input border w-full mt-2" required="">
                                <option value=""></option>
                                <option value="To‘liq bajarilgan (100%)"
                                    {{ old('kurs_kesimi', $doktaranturaexpert->kurs_kesimi ?? '') == "To‘liq bajarilgan (100%)" ? 'selected' : '' }}>
                                    To‘liq bajarilgan (100%)
                                </option>
                                <option value="Qisman bajarilgan (60-99%)"
                                    {{ old('kurs_kesimi', $doktaranturaexpert->kurs_kesimi ?? '') == "Qisman bajarilgan (60-99%)" ? 'selected' : '' }}>
                                    Qisman bajarilgan (60-99%)
                                </option>
                                <option value="Bajarilmagan"
                                    {{ old('kurs_kesimi', $doktaranturaexpert->kurs_kesimi ?? '') == "Bajarilmagan" ? 'selected' : '' }}>
                                    Bajarilmagan
                                </option>
                            </select>
                            <br>

                            @error('kurs_kesimi')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="w-full col-span-6">
                            <label class="flex flex-col sm:flex-row">
                                <span class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>
                                O‘z muddatida va muddatidan oldin himoya qilgan izlanuvchilar miqdori (oxirgi uch yilda), bitiruvchilar soniga nisbatan. Son qiymati izohda keltiriladi.
                            </label>
                            <select name="mud_oldin" id="science-sub-category" class="input border w-full mt-2" required="">
                                <option value=""></option>
                                <option value="A’lo (86-100%)"
                                    {{ old('mud_oldin', $doktaranturaexpert->mud_oldin ?? '') == "A’lo (86-100%)" ? 'selected' : '' }}>
                                    A’lo (86-100%)
                                </option>
                                <option value="Yaxshi (70-85%)"
                                    {{ old('mud_oldin', $doktaranturaexpert->mud_oldin ?? '') == "Yaxshi (70-85%)" ? 'selected' : '' }}>
                                    Yaxshi (70-85%)
                                </option>
                                <option value="Qoniqarli (50-69)"
                                    {{ old('mud_oldin', $doktaranturaexpert->mud_oldin ?? '') == "Qoniqarli (50-69)" ? 'selected' : '' }}>
                                    Qoniqarli (50-69)
                                </option>
                                <option value="Qoniqarsiz"
                                    {{ old('mud_oldin', $doktaranturaexpert->mud_oldin ?? '') == "Qoniqarsiz" ? 'selected' : '' }}>
                                    Qoniqarsiz
                                </option>
                            </select>
                            <br>

                            @error('mud_oldin')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>



                        <div class="w-full col-span-6">
                            <label class="flex flex-col sm:flex-row">
                                <span class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>
                                Ilmiy rahbarga izlanuvchilar biriktirilganlik holati. Me’yordan ortiq izlanuvchi biriktirilgan ilmiy rahbar son qiymati izohda keltiriladi.
                            </label>
                            <select name="ilmiy_rah_birikisoni" id="science-sub-category" class="input border w-full mt-2" required="">
                                <option value=""></option>
                                <option value="Me’yor bo‘yicha"
                                    {{ old('ilmiy_rah_birikisoni', $doktaranturaexpert->ilmiy_rah_birikisoni ?? '') == "Me’yor bo‘yicha" ? 'selected' : '' }}>
                                    Me’yor bo‘yicha
                                </option>
                                <option value="Me’yordan ortiq"
                                    {{ old('ilmiy_rah_birikisoni', $doktaranturaexpert->ilmiy_rah_birikisoni ?? '') == "Me’yordan ortiq" ? 'selected' : '' }}>
                                    Me’yordan ortiq
                                </option>
                            </select>
                            <br>

                            @error('ilmiy_rah_birikisoni')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>



                        <div class="w-full col-span-6">
                            <label class="flex flex-col sm:flex-row">
                                <span class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>
                                Yagona elektron tizimga 2 va 3 bosqich izlanuvchilarning monitoring hujjatlarini kiritish holati.
                            </label>
                            <select name="hujjatlar_kiritish_holati" id="science-sub-category" class="input border w-full mt-2" required="">
                                <option value=""></option>
                                <option value="To‘liq kiritilgan (100%)"
                                    {{ old('hujjatlar_kiritish_holati', $doktaranturaexpert->hujjatlar_kiritish_holati ?? '') == "To‘liq kiritilgan (100%)" ? 'selected' : '' }}>
                                    To‘liq kiritilgan (100%)
                                </option>
                                <option value="Qisman kiritilgan (60-99%)"
                                    {{ old('hujjatlar_kiritish_holati', $doktaranturaexpert->hujjatlar_kiritish_holati ?? '') == "Qisman kiritilgan (60-99%)" ? 'selected' : '' }}>
                                    Qisman kiritilgan (60-99%)
                                </option>
                                <option value="Kiritilmagan"
                                    {{ old('hujjatlar_kiritish_holati', $doktaranturaexpert->hujjatlar_kiritish_holati ?? '') == "Kiritilmagan" ? 'selected' : '' }}>
                                    Kiritilmagan
                                </option>
                            </select>
                            <br>

                            @error('hujjatlar_kiritish_holati')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div> --}}


                        <div class="w-full col-span-6">
                            <label class="flex flex-col sm:flex-row"> <span
                                    class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Status
                            </label>
                            <select name="status" id="science-sub-category" class="input border w-full mt-2" required="">

                                <option value="" {{ $doktaranturaexpert->status == '' ? 'selected' : '' }}></option>
                                <option value="A’lo" {{ $doktaranturaexpert->status == 'A’lo' ? 'selected' : '' }}>A’lo</option>
                                <option value="Yaxshi" {{ $doktaranturaexpert->status == 'Yaxshi' ? 'selected' : '' }}>Yaxshi</option>
                                <option value="Qoniqarli" {{ $doktaranturaexpert->status == 'Qoniqarli' ? 'selected' : '' }}>Qoniqarli</option>
                                <option value="Qoniqarsiz" {{ $doktaranturaexpert->status == 'Qoniqarsiz' ? 'selected' : '' }}>Qoniqarsiz</option>

                            </select><br>

                            @error('muddat')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="w-full col-span-6 ">
                            <label class="flex flex-col sm:flex-row"> <span
                                    class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Izoh</label>
                            <textarea name="comment" id="" class="input w-full border mt-2" cols="5" rows="5">{{ $doktaranturaexpert->comment }}</textarea>
                        </div>
                    </div>

                </form><br>
                <div class="px-5 pb-5 text-center">
                    <a href="#" class="button delete-cancel w-32 border text-gray-700 mr-1">
                        Bekor qilish
                    </a>
                    <button type="submit" form="science-paper-create-form"
                        class="update-confirm button w-24 bg-theme-1 text-white">
                        Tasdiqlash
                    </button>
                </div>
            </div>
        </div>


    </div>
@endsection
