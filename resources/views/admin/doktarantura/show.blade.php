@extends('layouts.admin')

@section('content')
    <div class="content">
        <div class="flex justify-between align-center mt-10">

            <h2 class="intro-y text-lg font-medium">Ilmiy izlanuvchilar</h2>



        </div>
        @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif

        <!-- <div class="grid grid-cols-12 gap-6 mt-5">

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
        </div> -->

        <div class="grid grid-cols-12 gap-6 mt-5">
            <div class="col-span-7 mt-2 " style="background: white; border-radius: 10px;">
                <div class="intro-y block sm:flex items-center py-4">
                    <h2 class="text-lg font-medium truncate ml-4" style="font-size: 24px;font-weight:500;">
                        Ilmiy izlanuvchilar
                    </h2>
                </div>
                <div class="intro-y overflow-auto lg:overflow-visible mt-8 sm:mt-0">
                    <table class="table">
                        <thead style="background: #F4F8FC;">
                            <tr>
                                <th class="whitespace-no-wrap">Nomi</th>
                                <th class="whitespace-no-wrap">1-kurs </th>
                                <th class="whitespace-no-wrap">2-kurs </th>
                                <th class="whitespace-no-wrap">3-kurs </th>
                                <th class="whitespace-no-wrap">To'ldirmaganlari </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr style="border-bottom: 1px solid #E6E6E6;">
                                <td style="color:#1881D3; font-weight: 400;">Dokrorantura(DSc)</td>
                                <td>{{ $dc_type100['1'] ?? 0}} </td>
                                <td>{{ $dc_type100['2'] ?? 0}} </td>
                                <td>{{ $dc_type100['3'] ?? 0}} </td>
                                <td>{{ $dc_type100['-1'] ?? 0 }} </td>
                            </tr>
                            <tr style="border-bottom: 1px solid #E6E6E6;">
                                <td style="color:#1881D3; font-weight: 400;">Tayanch doktorantura (PhD)</td>
                                <td>{{ $dc_type200['1'] ?? 0}} </td>
                                <td>{{ $dc_type200['2'] ?? 0}} </td>
                                <td>{{ $dc_type200['3'] ?? 0}} </td>
                                <td>{{ $dc_type200['-1'] ?? 0 }} </td>
                            </tr>
                            <tr style="border-bottom: 1px solid #E6E6E6;">
                                <td style="color:#1881D3; font-weight: 400;">Stajyor-tadqiqotchi </td>
                                <td>{{ $dc_type300['1'] ?? 0}} </td>
                                <td>{{ $dc_type300['2'] ?? 0}} </td>
                                <td>{{ $dc_type300['3'] ?? 0}} </td>
                                <td>{{ $dc_type300['-1'] ?? 0 }} </td>
                            </tr>
                            <tr style="border-bottom: 1px solid #E6E6E6;">
                                <td style="color:#1881D3; font-weight: 400;">Mustaqil izlanuvchi(DSc)</td>
                                <td>{{ $dc_type400['1'] ?? 0}} </td>
                                <td>{{ $dc_type400['2'] ?? 0}} </td>
                                <td>{{ $dc_type400['3'] ?? 0}} </td>
                                <td>{{ $dc_type400['-1'] ?? 0 }} </td>
                            </tr>
                            <tr style="border-bottom: 1px solid #E6E6E6;">
                                <td style="color:#1881D3; font-weight: 400;">Mustaqil izlanuvchi(PhD)</td>
                                <td>{{ $dc_type500['1'] ?? 0}} </td>
                                <td>{{ $dc_type500['2'] ?? 0}} </td>
                                <td>{{ $dc_type500['3'] ?? 0}} </td>
                                <td>{{ $dc_type500['-1'] ?? 0 }} </td>
                            </tr>
                            <tr style="border-bottom: 1px solid #E6E6E6;">
                                <td style="color:#1881D3; font-weight: 400;">Maqsadli doktorantura (DSc)</td>
                                <td>{{ $dc_type600['1'] ?? 0}} </td>
                                <td>{{ $dc_type600['2'] ?? 0}} </td>
                                <td>{{ $dc_type600['3'] ?? 0}} </td>
                                <td>{{ $dc_type600['-1'] ?? 0 }} </td>
                            </tr>
                            <tr style="border-bottom: 1px solid #E6E6E6;">
                                <td style="color:#1881D3; font-weight: 400;">Maqsadli tayanch doktorantura (PhD)</td>
                                <td>{{ $dc_type700['1'] ?? 0}} </td>
                                <td>{{ $dc_type700['2'] ?? 0}} </td>
                                <td>{{ $dc_type700['3'] ?? 0}} </td>
                                <td>{{ $dc_type700['-1'] ?? 0 }} </td>
                            </tr>
                            <tr style="border-bottom: 1px solid #E6E6E6;">
                                <td style="color:#1881D3; font-weight: 400;">Tashkilot o‘z hisobidan doktorantura (DSc)</td>
                                <td>{{ $dc_type800['1'] ?? 0}} </td>
                                <td>{{ $dc_type800['2'] ?? 0}} </td>
                                <td>{{ $dc_type800['3'] ?? 0}} </td>
                                <td>{{ $dc_type800['-1'] ?? 0 }} </td>
                            </tr>
                            <tr style="border-bottom: 1px solid #E6E6E6;">
                                <td style="color:#1881D3; font-weight: 400;">Tashkilot o‘z hisobidan tayanch doktorantura (PhD)</td>
                                <td>{{ $dc_type900['1'] ?? 0}} </td>
                                <td>{{ $dc_type900['2'] ?? 0}} </td>
                                <td>{{ $dc_type900['3'] ?? 0}} </td>
                                <td>{{ $dc_type900['-1'] ?? 0 }} </td>
                            </tr>
                            <tr style="border-bottom: 1px solid #E6E6E6;">
                                <td style="color:#1881D3; font-weight: 400;">Tashkilot o‘z hisobidan stajyor-tadqiqotchi </td>
                                <td>{{ $dc_type1000['1'] ?? 0}} </td>
                                <td>{{ $dc_type1000['2'] ?? 0}} </td>
                                <td>{{ $dc_type1000['3'] ?? 0}} </td>
                                <td>{{ $dc_type1000['-1'] ?? 0 }} </td>
                            </tr>
                            <tr style="border-bottom: 1px solid #E6E6E6;">
                                <td style="color:#1881D3; font-weight: 400;">Doktorantura (xorijiy fuqoro)</td>
                                <td>{{ $dc_type1100['1'] ?? 0}} </td>
                                <td>{{ $dc_type1100['2'] ?? 0}} </td>
                                <td>{{ $dc_type1100['3'] ?? 0}} </td>
                                <td>{{ $dc_type1100['-1'] ?? 0 }} </td>
                            </tr>

                            <tr style="border-bottom: 1px solid #E6E6E6;">
                                <td style="color:#1881D3; font-weight: 400;">Tayanch doktorantura (xorijiy fuqoro)</td>
                                <td>{{ $dc_type1200['1'] ?? 0}} </td>
                                <td>{{ $dc_type1200['2'] ?? 0}} </td>
                                <td>{{ $dc_type1200['3'] ?? 0}} </td>
                                <td>{{ $dc_type1200['-1'] ?? 0 }} </td>
                            </tr>

                            <tr style="border-bottom: 1px solid #E6E6E6;">
                                <td style="color:#1881D3; font-weight: 400;">Stajyor-tadqiqotchi (xorijiy fuqoro)</td>
                                <td>{{ $dc_type1300['1'] ?? 0}} </td>
                                <td>{{ $dc_type1300['2'] ?? 0}} </td>
                                <td>{{ $dc_type1300['3'] ?? 0}} </td>
                                <td>{{ $dc_type1300['-1'] ?? 0 }} </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
            <div class="col-span-5 mt-2 " style="background: white; border-radius: 10px;">
                <div class="intro-y block sm:flex items-center py-4">
                    <h2 class="text-lg font-medium truncate ml-4" style="font-size: 24px;font-weight:500;">
                        Ilmiy rahbarlar
                    </h2>
                </div>
                <div class="intro-y overflow-auto lg:overflow-visible mt-8 sm:mt-0">
                    <table class="table">
                        <thead style="background: #F4F8FC;">
                            <tr>
                                <th class="whitespace-no-wrap" style="width: 40px;">T/r</th>
                                <th class="whitespace-no-wrap">F.I.Sh</th>
                                <th class="whitespace-no-wrap">Izlanuvchilar soni </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data_tach as $t)
                            <tr style="border-bottom: 1px solid #E6E6E6;">
                                <td >{{ $loop->iteration }}</td>
                                <td style="color:#1881D3; font-weight: 400;">{{ $t['full_name'] }}</td>
                                <td>{{ $t['total_doctorates'] ?? 0}} </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>


        @role('Ekspert')
        @forelse ($doktaranturaexpert as $tekshirivchilar)
            <div class="overflow-x-auto" style="background-color: white;margin-top:30px;border-radius:8px;padding:30px 20px;">
                <table class="table">

                    <div
                        style="display: flex;justify-content: space-between; border-bottom: 1px solid #e2e8f0; padding-bottom: 20px;">
                        <div style="font-size:18px;font-weight: 400;">
                            {{ $tashkilot->name . ' Izlanuvchilar ' }} xaqida ma’lumot
                        </div>
                        <div style="text-align: end;display: flex;">
                            <a href="{{ route('doktaranturaexpert.edit', ['doktaranturaexpert' => $tekshirivchilar->id]) }}"
                                class="button w-24 bg-theme-1 text-white" style="margin-right:20px;">
                                Tahrirlash
                            </a>
                            {{-- <a href="" class="button w-24 bg-theme-6 text-white">
                                O'chirish
                            </a> --}}
                            <form action="{{ route('doktaranturaexpert.destroy', $tekshirivchilar->id) }}" method="POST" onsubmit="return confirm('Haqiqatan ham o‘chirmoqchimisiz?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="button w-24 bg-theme-6 text-white">O'chirish</button>
                            </form>
                        </div>

                            <a href="{{ url('generate-pdfdoktarantura/' . $tashkilot->id) }}"
                                class="button delete-cancel w-32 border text-gray-700 mr-1">
                                pdf genertsiya
                            </a>
                    </div>

                    <thead>
                        <tr class="bg-gray-200">
                            <th class="border border-b-2 " style="width: 40px;">№</th>
                            <th class="border border-b-2 " style="width: 60%;">Mezon va talablar</th>
                            <th class="border border-b-2 ">Xulosa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="border border-b-2 ">1.</td>
                            <td class="border border-b-2 ">
                                Yagona elektron tizimdagi izlanuvchilar sonining tashkilot buyruqlari bilan mutanosibligi. Son
                                qiymati izohda keltiriladi.
                            </td>
                            <td class="border border-b-2 ">{{  $tekshirivchilar->tash_buyruq_mutanosi ?? null }}</td>
                        </tr>
                        <tr class="bg-gray-200">
                            <td class="border border-b-2 ">2.</td>
                            <td class="border border-b-2 ">
                                Izlanuvchilarning yakka tartibdagi ish rejasini tasdiqlanganlik holati. Kamchiliklar izohda
                                keltiriladi.
                            </td>
                            <td class="border border-b-2 ">{{  $tekshirivchilar->ish_rejasi ?? null }}</td>
                        </tr>
                        <tr>
                            <td class="border border-b-2 ">3.</td>
                            <td class="border border-b-2 ">
                                Izlanuvchilarning ta’lim bosqichi bo‘yicha belgilangan me’zonlarni bajarganligi. Kurslar
                                kesimida
                                ko‘rib chiqilib, kamchiliklar izohda keltiriladi.
                            </td>
                            <td class="border border-b-2 ">{{  $tekshirivchilar->kurs_kesimi ?? null }}</td>
                        </tr>
                        <tr class="bg-gray-200">
                            <td class="border border-b-2 ">4.</td>
                            <td class="border border-b-2 ">
                                O‘z muddatida va muddatidan oldin himoya qilgan izlanuvchilar miqdori (oxirgi uch yilda),
                                bitiruvchilar soniga nisbatan. Son qiymati izohda keltiriladi.
                            </td>
                            <td class="border border-b-2 ">{{  $tekshirivchilar->mud_oldin ?? null }}</td>
                        </tr>
                        <tr>
                            <td class="border border-b-2 ">5.</td>
                            <td class="border border-b-2 ">
                                Ilmiy rahbarga izlanuvchilar biriktirilganlik holati. Me’yordan ortiq izlanuvchi biriktirilgan
                                ilmiy
                                rahbar son qiymati izohda keltiriladi.
                            </td>
                            <td class="border border-b-2 ">{{  $tekshirivchilar->ilmiy_rah_birikisoni ?? null }}</td>
                        </tr>
                        <tr class="bg-gray-200">
                            <td class="border border-b-2 ">6.</td>
                            <td class="border border-b-2 ">
                                Yagona elektron tizimga 2 va 3 bosqich izlanuvchilarning monitoring hujjatlarini kiritish
                                holati.
                            </td>
                            <td class="border border-b-2 ">{{  $tekshirivchilar->hujjatlar_kiritish_holati ?? null }}</td>
                        </tr>
                        <tr>
                            <td class="border border-b-2 ">7.</td>
                            <td class="border border-b-2 ">Ekspert xulosasi
                            </td>
                            <td class="border border-b-2 ">{{  $tekshirivchilar->status ?? null }}</td>
                        </tr>
                        <tr class="bg-gray-200">
                            <td class="border border-b-2 ">8.</td>
                            <td class="border border-b-2 ">
                                Izoh
                            </td>
                            <td class="border border-b-2 ">{{  $tekshirivchilar->comment ?? null }}</td>
                        </tr>
                        <tr>
                            <td class="border border-b-2 ">9.</td>
                            <td class="border border-b-2 ">
                                Fayl
                            </td>
                            <td class="border border-b-2 ">
                                @if ($tekshirivchilar->file)
                                    <a href="{{ asset('storage/' . $tekshirivchilar->file) }}"
                                        class="button  bg-theme-1 text-white">Faylni ko'rish</a>
                                @endif
                            </td>
                        </tr>
                        <tr >
                            <td class="border border-b-2 ">10.</td>
                            <td class="border border-b-2 ">
                                Ekspert F.I.Sh
                            </td>
                            <td class="border border-b-2 ">
                                {{ $tekshirivchilar->fish }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        @empty
            <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-10"
                style="background: white; padding: 20px 20px; border-radius: 20px">
                <div class="w-full mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                    <form id="science-paper-create-form" method="POST" action="{{ route('doktaranturaexpert.store') }}"
                        class="validate-form" enctype="multipart/form-data" novalidate="novalidate">
                        @csrf
                        <div class="grid grid-cols-12 gap-2">
                            <input type="hidden" name="tashkilot_id" value="{{ $tashkilot->id }}">


                            <div class="w-full col-span-6">
                                <label class="flex flex-col sm:flex-row"> <span
                                        class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Yagona elektron tizimdagi
                                    izlanuvchilar sonining tashkilot buyruqlari bilan mutanosibligi. Son qiymati izohda
                                    keltiriladi.
                                </label>
                                <select name="tash_buyruq_mutanosi" id="science-sub-category" class="input border w-full mt-2"
                                    required="">

                                    <option value=""></option>

                                    <option value="Mos keladi ">Mos keladi </option>

                                    <option value="Mos kelmaydi">Mos kelmaydi</option>

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

                                    <option value=""></option>

                                    <option value="Barchasi tasdiqlangan (100%)">Barchasi tasdiqlangan (100%)</option>

                                    <option value="Qisman tasdiqlangan (60-99%)">Qisman tasdiqlangan (60-99%)</option>

                                    <option value="Tasdiqlanmagan">Tasdiqlanmagan</option>

                                </select><br>

                                @error('muddat')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="w-full col-span-6">
                                <label class="flex flex-col sm:flex-row"> <span
                                        class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Izlanuvchilarning ta’lim bosqichi
                                    bo‘yicha belgilangan me’zonlarni bajarganligi. Kurslar kesimida ko‘rib chiqilib,
                                    kamchiliklar izohda keltiriladi.
                                </label>
                                <select name="kurs_kesimi" id="science-sub-category" class="input border w-full mt-2"
                                    required="">

                                    <option value=""></option>

                                    <option value="To‘liq bajarilgan (100%)">To‘liq bajarilgan (100%)</option>

                                    <option value="Qisman bajarilgan (60-99%)">Qisman bajarilgan (60-99%)</option>

                                    <option value="Bajarilmagan">Bajarilmagan</option>

                                </select><br>

                                @error('muddat')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="w-full col-span-6">
                                <label class="flex flex-col sm:flex-row"> <span
                                        class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> O‘z muddatida va muddatidan
                                    oldin himoya qilgan izlanuvchilar miqdori (oxirgi uch yilda), bitiruvchilar soniga nisbatan.
                                    Son qiymati izohda keltiriladi.
                                </label>
                                <select name="mud_oldin" id="science-sub-category" class="input border w-full mt-2" required="">

                                    <option value=""></option>

                                    <option value="A’lo (86-100%)">A’lo (86-100%)</option>

                                    <option value="Yaxshi (70-85%)">Yaxshi (70-85%)</option>

                                    <option value="Qoniqarli (50-69)">Qoniqarli (50-69)</option>

                                    <option value="Qoniqarsiz">Qoniqarsiz</option>

                                </select><br>

                                @error('muddat')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="w-full col-span-6">
                                <label class="flex flex-col sm:flex-row"> <span
                                        class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Ilmiy rahbarga izlanuvchilar
                                    biriktirilganlik holati. Me’yordan ortiq izlanuvchi biriktirilgan ilmiy rahbar son qiymati
                                    izohda keltiriladi.
                                </label>
                                <select name="ilmiy_rah_birikisoni" id="science-sub-category" class="input border w-full mt-2"
                                    required="">

                                    <option value=""></option>

                                    <option value="Me’yor bo‘yicha">Me’yor bo‘yicha</option>

                                    <option value="Me’yordan ortiq">Me’yordan ortiq</option>


                                </select><br>

                                @error('muddat')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="w-full col-span-6">
                                <label class="flex flex-col sm:flex-row"> <span
                                        class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Yagona elektron tizimga 2 va 3
                                    bosqich izlanuvchilarning monitoring hujjatlarini kiritish holati.
                                </label>
                                <select name="hujjatlar_kiritish_holati" id="science-sub-category"
                                    class="input border w-full mt-2" required="">

                                    <option value=""></option>

                                    <option value="To‘liq kiritilgan (100%)">To‘liq kiritilgan (100%)</option>

                                    <option value="Qisman kiritilgan (60-99%)">Qisman kiritilgan (60-99%)</option>

                                    <option value="Kiritilmagan">Kiritilmagan</option>

                                </select><br>

                                @error('muddat')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="w-full col-span-6">
                                <label class="flex flex-col sm:flex-row"> <span
                                        class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Status
                                </label>
                                <select name="status" id="science-sub-category" class="input border w-full mt-2" required="">

                                    <option value=""></option>

                                    <option value="A’lo">A’lo</option>

                                    <option value="Yaxshi">Yaxshi</option>

                                    <option value="Qoniqarli">Qoniqarli</option>

                                    <option value="Qoniqarsiz">Qoniqarsiz</option>

                                </select><br>

                                @error('muddat')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="w-full col-span-6 ">
                                <label class="flex flex-col sm:flex-row"> <span
                                        class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Izoh</label>
                                <textarea name="comment" id="" class="input w-full border mt-2" cols="5" rows="5"></textarea>
                            </div>
                        </div>

                    </form><br>
                    <div class="px-5 pb-5 text-center">
                        <a href="#" class="button delete-cancel w-32 border text-gray-700 mr-1">
                            Bekor qilish
                        </a>
                        <button type="submit" form="science-paper-create-form"
                            class="update-confirm button w-24 bg-theme-1 text-white">
                            Qo'shish
                        </button>
                    </div>
                </div>
            </div>
        @endforelse
        @endrole


    </div>
@endsection
