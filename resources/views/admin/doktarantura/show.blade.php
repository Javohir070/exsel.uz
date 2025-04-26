@extends('layouts.admin')

@section('content')
    <div class="content">
        <div class="flex justify-between align-center mt-10 mb-3">

            <h2 class="intro-y text-lg font-medium">{{ $tashkilot->name }}</h2>

        </div>
        <div class="intro-y box px-4   ">

            <div class="nav-tabs flex flex-col sm:flex-row justify-center lg:justify-start">
                <a data-toggle="tab" data-target="#ilmiy-izlanuvchilar" href="javascript:;" class="py-4 sm:mr-8 flex items-center active">
                    Ilmiy izlanuvchilar
                </a>
                <a data-toggle="tab" data-target="#add-hersh" href="javascript:;" class="py-4 sm:mr-8 flex items-center">
                    Izlanuvchilar monitoringi holati
                </a>
                <a data-toggle="tab" data-target="#change-password" href="javascript:;"
                    class="py-4 sm:mr-8 flex items-center">
                    Ilmiy rahbarlar
                </a>
                <a data-toggle="tab" data-target="#add-expert" href="javascript:;" class="py-4 sm:mr-8 flex items-center">
                    Ekspert xulosasi
                </a>
            </div>
        </div>

        @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif
        <div class="overflow-x-auto mt-2" style="background-color: white;border-radius:8px;">

            <div class="tab-content">
                <div class="tab-content__pane active" id="ilmiy-izlanuvchilar">
                    <div class="p-5">
                        <div class="grid grid-cols-12 gap-6 ">
                            <div class="col-span-12 mt-2 " style="background: white; border-radius: 10px;">
                                <div class="intro-y block sm:flex items-center py-4" style="justify-content: space-between;">
                                    <h2 class="text-lg font-medium truncate ml-4" style="font-size: 24px;font-weight:500;">
                                        Ilmiy izlanuvchilar
                                    </h2>
                                    <tr style="border-bottom: 1px solid #E6E6E6;">
                                        <td colspan="5" style="text-align: center;">
                                            <a href="{{ route('php_import', ['stir' => $tashkilot->stir_raqami]) }}" class="button  bg-theme-1 text-white mr-4" style="font-size: 16px;">Ma'lumotni yangilash</a>
                                        </td>
                                    </tr>
                                </div>
                                <div class="intro-y overflow-auto lg:overflow-visible mt-8 sm:mt-0">
                                    <table class="table">
                                        <thead style="background: #F4F8FC;">
                                            <tr>
                                                <th class="whitespace-no-wrap" style="width: 40px;">T/r</th>
                                                <th class="whitespace-no-wrap">F.I.Sh</th>
                                                <th class="whitespace-no-wrap">Turi </th>
                                                <th class="whitespace-no-wrap">Kurs </th>
                                                <th style="text-align:center;">Yakka tartibdagi reja tasdiqlanganligi </th>
                                                <th style="text-align:center;">Yakka tartibdagi rejani bajarganligi </th>
                                                <th style="text-align:center;">Monitoring natijasi kiritilganligi </th>
                                                <th class="whitespace-no-wrap">Harakat</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($doktaranturas as $m)
                                                <tr style="border-bottom: 1px solid #E6E6E6;">
                                                    <td>{{ ($doktaranturas->currentPage() - 1) * $doktaranturas->perPage() + $loop->iteration }}.</td>
                                                    <td style="color:#1881D3; font-weight: 400;">
                                                        {{ $m->full_name }}
                                                    </td>
                                                    <td>
                                                        {{ $m->dc_type }}
                                                    </td>
                                                    <td style="text-align:center;">{{ $m->course }} </td>
                                                    <td style="text-align:center;">{{ $m->reja_t }} </td>
                                                    <td style="text-align:center;">{{ $m->reja_b }} </td>
                                                    <td>{{ $m->monitoring_natijasik }} </td>
                                                    <td>
                                                        <a onclick="openShowIlmiIzlanuvchiModal({{ $m->id }})"
                                                            class="button px-2 mr-1 mb-2 border text-gray-700"
                                                            style="display: inline-block;">
                                                            <span class="w-5 h-5 flex items-center justify-center">
                                                                <i data-feather="eye" class="w-4 h-4"></i>
                                                            </span>
                                                        </a>
                                                        <a onclick="openEditIlmiIzlanuvchiModal({{ $m->id }})"
                                                            class="button px-2 mr-1 mb-2 bg-theme-1 text-white"
                                                            style="display: inline-block;">
                                                            <span class="w-5 h-5 flex items-center justify-center">
                                                                <i data-feather="edit" class="w-4 h-4"></i>
                                                            </span>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr style="border-bottom: 1px solid #E6E6E6;">
                                                    <td colspan="5" style="text-align: center;">
                                                        <a href="{{ route('php_import', ['stir' => $tashkilot->stir_raqami]) }}" class="button w-24 bg-theme-1 text-white mr-4" style="font-size: 20px;">daraja.ilmiy.uz import qilish</a>
                                                    </td>
                                                </tr>
                                            @endforelse


                                        </tbody>
                                    </table>
                                </div>
                                <div class="intro-y flex flex-wrap sm:flex-row sm:flex-no-wrap mb-1 items-center mt-4">
                                    {{ $doktaranturas->links() }}
                                    {{-- <select class="w-20 input box mt-3 sm:mt-0">
                                        <option>10</option>
                                        <option>25</option>
                                        <option>35</option>
                                        <option>50</option>
                                    </select> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-content__pane" id="add-hersh">
                    <div class="p-5">
                        <div class="grid grid-cols-12 gap-6 ">
                            <div class="col-span-12 mt-2 " style="background: white; border-radius: 10px;">
                                <div class="intro-y block sm:flex items-center py-4">
                                    <h2 class="text-lg font-medium truncate ml-4" style="font-size: 24px;font-weight:500;">
                                        Monitoring bo'lgan ilmiy izlanuvchilar
                                    </h2>
                                </div>
                                <form id="science-felter-create-form" method="GET"
                                    action="{{ route('doktarantura.show', ['doktarantura' => $id]) }}" class="validate-form"
                                    enctype="multipart/form-data" novalidate="novalidate">

                                    <div class="grid grid-cols-12 gap-2 mb-3 px-4">
                                        <div class="w-full col-span-4">
                                            <label class="flex flex-col sm:flex-row"> Qabul yili
                                            </label>
                                            <select name="admission_year" id="science-sub-category"
                                                class="input border w-full mt-2" required="">
                                                <option value=""></option>
                                                <option value="2020" {{ $admission_year == '2020' ? 'selected' : '' }}>
                                                    2020</option>
                                                <option value="2021" {{ $admission_year == '2021' ? 'selected' : '' }}>
                                                    2021</option>
                                                <option value="2022" {{ $admission_year == '2022' ? 'selected' : '' }}>
                                                    2022</option>
                                                <option value="2023" {{ $admission_year == '2023' ? 'selected' : '' }}>
                                                    2023</option>
                                                <option value="2024" {{ $admission_year == '2024' ? 'selected' : '' }}>
                                                    2024</option>
                                                <option value="2025" {{ $admission_year == '2025' ? 'selected' : '' }}>
                                                    2025</option>
                                            </select>
                                            @error('admission_year')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="w-full col-span-4">
                                            <label class="flex flex-col sm:flex-row"> Qabul choragi
                                            </label>
                                            <select name="admission_quarter" class="input border w-full mt-2"
                                                required="">
                                                <option value=""></option>
                                                <option value="1" {{ $admission_quarter == '1' ? 'selected' : '' }}>1
                                                </option>
                                                <option value="2" {{ $admission_quarter == '2' ? 'selected' : '' }}>2
                                                </option>
                                                <option value="3" {{ $admission_quarter == '3' ? 'selected' : '' }}>3
                                                </option>
                                                <option value="4" {{ $admission_quarter == '4' ? 'selected' : '' }}>4
                                                </option>
                                            </select>
                                            @error('admission_quarter')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="w-full col-span-4">
                                            <label class="flex flex-col sm:flex-row"> Monitoring choragi
                                            </label>
                                            <select name="quarter" class="input border w-full mt-2" required="">
                                                <option value=""></option>
                                                <option value="1" {{ $quarter == '1' ? 'selected' : '' }}>1</option>
                                                <option value="2" {{ $quarter == '2' ? 'selected' : '' }}>2</option>
                                                <option value="3" {{ $quarter == '3' ? 'selected' : '' }}>3</option>
                                                <option value="4" {{ $quarter == '4' ? 'selected' : '' }}>4</option>
                                            </select>
                                            @error('quarter')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="w-full col-span-4">
                                            <label class="flex flex-col sm:flex-row">Monitoring yili
                                            </label>
                                            <select name="year" id="science-sub-category"
                                                class="input border w-full mt-2" required="">
                                                <option value=""></option>
                                                <option value="2020" {{ $year == '2020' ? 'selected' : '' }}>2020
                                                </option>
                                                <option value="2021" {{ $year == '2021' ? 'selected' : '' }}>2021
                                                </option>
                                                <option value="2022" {{ $year == '2022' ? 'selected' : '' }}>2022
                                                </option>
                                                <option value="2023" {{ $year == '2023' ? 'selected' : '' }}>2023
                                                </option>
                                                <option value="2024" {{ $year == '2024' ? 'selected' : '' }}>2024
                                                </option>
                                                <option value="2025" {{ $year == '2025' ? 'selected' : '' }}>2025
                                                </option>
                                            </select>
                                            @error('year')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </div>




                                        <div class="w-full col-span-4">
                                            <button type="submit" form="science-felter-create-form"
                                                style="margin-top: 30px;"
                                                class="update-confirm button w-32  bg-theme-1 text-white">
                                                Qidirish
                                            </button>
                                        </div>
                                    </div>
                                </form>
                                <div class="intro-y overflow-auto lg:overflow-visible mt-8 sm:mt-0">
                                    <table class="table">
                                        <thead style="background: #F4F8FC;">
                                            <tr>
                                                <th class="whitespace-no-wrap" style="width: 40px;">T/r</th>
                                                <th class="whitespace-no-wrap">F.I.Sh</th>
                                                <th class="whitespace-no-wrap">Turi </th>
                                                <th class="whitespace-no-wrap">Kurs </th>
                                                <th class="whitespace-no-wrap">Status </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data_main as $m)
                                                <tr style="border-bottom: 1px solid #E6E6E6;">
                                                    <td>{{ $loop->iteration }}.</td>
                                                    <td style="color:#1881D3; font-weight: 400;">
                                                        {{ $m['full_name'] ?? 0 }}</td>
                                                    <td>
                                                        @switch($m['dc_type'])
                                                            @case(100)
                                                                Doktorantura (DSc)
                                                            @break

                                                            @case(200)
                                                                Tayanch doktorantura (PhD)
                                                            @break

                                                            @case(300)
                                                                Stajyor-tadqiqotchi
                                                            @break

                                                            @case(400)
                                                                Mustaqil izlanuvchi (DSc)
                                                            @break

                                                            @case(500)
                                                                Mustaqil izlanuvchi (PhD)
                                                            @break

                                                            @case(600)
                                                                Maqsadli doktorantura (DSc)
                                                            @break

                                                            @case(700)
                                                                Maqsadli tayanch doktorantura (PhD)
                                                            @break

                                                            @case(800)
                                                                Tashkilot o‘z hisobidan doktorantura (DSc)
                                                            @break

                                                            @case(900)
                                                                Tashkilot o‘z hisobidan tayanch doktorantura (PhD)
                                                            @break

                                                            @case(1000)
                                                                Tashkilot o‘z hisobidan stajyor-tadqiqotchi
                                                            @break

                                                            @case(1100)
                                                                Doktorantura (xorijiy fuqoro)
                                                            @break

                                                            @case(1200)
                                                                Tayanch doktorantura (xorijiy fuqoro)
                                                            @break

                                                            @case(1300)
                                                                Stajyor-tadqiqotchi (xorijiy fuqoro)
                                                            @break

                                                            @default
                                                                Noma’lum
                                                        @endswitch
                                                    </td>
                                                    <td>{{ $m['course'] ?? 0 }} </td>
                                                    <td style="color:{{ $m['status'] == 0 ? 'red' : 'green' }};">
                                                        {{ $m['status'] == 0 ? 'Monitoring natijasi tasdiqlanmagan' : 'Monitoring natijasi tasdiqlangan' }}
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-content__pane" id="change-password">
                    <div class="p-5">
                        <div class="grid grid-cols-12 gap-6 ">
                            <div class="col-span-12 mt-2 " style="background: white; border-radius: 10px;">
                                <div class="intro-y block sm:flex items-center py-4">
                                    <h2 class="text-lg font-medium truncate ml-4"
                                        style="font-size: 24px;font-weight:500;">
                                        Ilmiy rahbarlar
                                    </h2>
                                </div>
                                <div class="intro-y overflow-auto lg:overflow-visible mt-8 sm:mt-0">
                                    <table class="table">
                                        <thead style="background: #F4F8FC;">
                                            <tr>
                                                <th class="whitespace-no-wrap" style="width: 40px;">T/r</th>
                                                <th class="whitespace-no-wrap">F.I.Sh</th>
                                                <th class="">Mazkur tashkilotdan biriktirilgan izlanuvchilar soni</th>
                                                <th class="">Barcha tashkilotlardan biriktirilgan izlanuvchilar soni</th>
                                                <th class="whitespace-no-wrap">Harakat</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($ilmiyrahbarlars as $t)
                                                <tr style="border-bottom: 1px solid #E6E6E6;">
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td style="color:#1881D3; font-weight: 400;">{{ $t->full_name }}
                                                    </td>
                                                    <td>{{ $t->org }} </td>
                                                    <td>{{ $t->all }} </td>
                                                    <td>
                                                        <a onclick="openShowIlmiRahbarModal({{ $t->id }})"
                                                            class="button px-2 mr-1 mb-2 border text-gray-700"
                                                            style="display: inline-block;">
                                                            <span class="w-5 h-5 flex items-center justify-center">
                                                                <i data-feather="eye" class="w-4 h-4"></i>
                                                            </span>
                                                        </a>
                                                        <a onclick="openEditIlmiRahbarModal({{ $t->id }})"
                                                            class="button px-2 mr-1 mb-2 bg-theme-1 text-white"
                                                            style="display: inline-block;">
                                                            <span class="w-5 h-5 flex items-center justify-center">
                                                                <i data-feather="edit" class="w-4 h-4"></i>
                                                            </span>
                                                        </a>
                                                    </td>
                                                </tr>
                                                @empty
                                                <tr style="border-bottom: 1px solid #E6E6E6;">
                                                    <td colspan="5" style="text-align: center;">
                                                        <a href="{{ route('ilmiy_rahbarlar_import', ['stir' => $tashkilot->stir_raqami]) }}" class="button w-24 bg-theme-1 text-white mr-4" style="font-size: 20px;">daraja.ilmiy.uz import qilish</a>
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-content__pane" id="add-expert">
                    @forelse ($doktaranturaexpert as $tekshirivchilar)
                        <div class="overflow-x-auto" style="background-color: white;border-radius:8px;padding:30px 20px;">

                            <table class="table">

                                <div
                                    style="display: flex;justify-content: center; border-bottom: 1px solid #e2e8f0; padding-bottom: 20px;">

                                    <div style="text-align: end;display: flex;gap:10px;">
                                    @role(['Ekspert'])
                                        <a href="{{ url('generate-pdfdoktarantura/' . $tashkilot->id) }}"
                                            class="button delete-cancel border text-gray-700 mr-1">
                                            Eksport
                                        </a>
                                    @endrole
                                    @role([['Ishchi guruh azosi']])
                                        <a href="javascript:;" data-target="#doktarantura-paper-create-modal"
                                            data-toggle="modal" class="button w-24 ml-3 bg-theme-1 text-white">
                                            Tahrirlash
                                        </a>

                                        <form action="{{ route('doktaranturaexpert.destroy', $tekshirivchilar->id ?? 1) }}"
                                            method="POST" onsubmit="return confirm('Haqiqatan ham o‘chirmoqchimisiz?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="button w-24 bg-theme-6 text-white">O'chirish</button>
                                        </form>
                                    @endrole
                                    </div>


                                </div>

                                <thead>
                                    <tr class="bg-gray-200">
                                        <th class="border border-b-2 " style="width: 40px;">№</th>
                                        <th class="border border-b-2 " style="width: 60%;">Ko‘rsatkichlar</th>
                                        <th class="border border-b-2 ">Miqdori</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="border border-b-2 ">1.</td>
                                        <td class="border border-b-2 ">
                                            Tashkilot buyrug‘i asosida qabul qilingan umumiy izlanuvchilar soni.
                                        </td>
                                        <td class="border border-b-2 ">
                                            {{ $tekshirivchilar->umumiy_izlanuvchilar ?? null }}</td>
                                    </tr>
                                    <tr class="bg-gray-200">
                                        <td class="border border-b-2 ">2.</td>
                                        <td class="border border-b-2 ">
                                            Yagona elektron tizimdagi tahsil olayotgan izlanuvchilar soni.
                                        </td>
                                        <td class="border border-b-2 ">{{ $tekshirivchilar->yagonae_tah_soni ?? null }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border border-b-2 ">3.</td>
                                        <td class="border border-b-2 ">
                                            Chetlashtirilgan izlanuvchilar soni.
                                        </td>
                                        <td class="border border-b-2 ">{{ $tekshirivchilar->chetlash_soni ?? null }}</td>
                                    </tr>
                                    <tr class="bg-gray-200">
                                        <td class="border border-b-2 ">4.</td>
                                        <td class="border border-b-2 ">
                                            Akademik ta’tildagi izlanuvchilar soni.
                                        </td>
                                        <td class="border border-b-2 ">{{ $tekshirivchilar->akademik_soni ?? null }}</td>
                                    </tr>
                                    <tr>
                                        <td class="border border-b-2 ">5.</td>
                                        <td class="border border-b-2 ">
                                            Muddatidan oldin himoya qilgan izlanuvchilar soni.
                                        </td>
                                        <td class="border border-b-2 ">{{ $tekshirivchilar->muddatidano_soni ?? null }}
                                        </td>
                                    </tr>
                                    <tr class="bg-gray-200">
                                        <td class="border border-b-2 ">6.</td>
                                        <td class="border border-b-2 ">
                                            Yagona elektron tizimga kiritilmagan izlanuvchilar soni.
                                        </td>
                                        <td class="border border-b-2 ">{{ $tekshirivchilar->kiritilmagan_soni ?? null }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border border-b-2 ">7.</td>
                                        <td class="border border-b-2 ">
                                            Yakka tartibdagi rejani bajarmagan izlanuvchilar soni .
                                        </td>
                                        <td class="border border-b-2 ">{{ $tekshirivchilar->rejani_bajarmagan ?? null }}
                                        </td>
                                    </tr>
                                    <tr class="bg-gray-200">
                                        <td class="border border-b-2 ">8.</td>
                                        <td class="border border-b-2 ">
                                            Monitoring natijasi kiritilmagan izlanuvchilar soni .
                                        </td>
                                        <td class="border border-b-2 ">
                                            {{ $tekshirivchilar->mon_nat_kiritilmagan ?? null }}</td>
                                    </tr>
                                    <tr>
                                        <td class="border border-b-2 ">9.</td>
                                        <td class="border border-b-2 ">
                                            Tashkilot izlanuvchilari biriktirilgan ilmiy rahbarlar soni .
                                        </td>
                                        <td class="border border-b-2 ">
                                            {{ $tekshirivchilar->biriktirilgan_rahbarlar ?? null }}</td>
                                    </tr>
                                    <tr class="bg-gray-200">
                                        <td class="border border-b-2 ">10.</td>
                                        <td class="border border-b-2 ">
                                            Qo‘shimcha izlanuvchi biriktirish bo‘yicha kollegial organ qarori mavjud
                                            bo'lmagan ilmiy rahbarlar soni .
                                        </td>
                                        <td class="border border-b-2 ">{{ $tekshirivchilar->kollegial_rahbarlar ?? null }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border border-b-2 ">11.</td>
                                        <td class="border border-b-2 ">
                                            Me’yoridan ortiq izlanuvchi biriktirilgan ilmiy rahbarlar soni .
                                        </td>
                                        <td class="border border-b-2 ">{{ $tekshirivchilar->meyoridan_rahbarlar ?? null }}
                                        </td>
                                    </tr>
                                    <tr class="bg-gray-200">
                                        <td class="border border-b-2 ">12.</td>
                                        <td class="border border-b-2 ">
                                            Tashkilot miqyosida me’yoridan ortiq izlanuvchi biriktirilgan ilmiy rahbarlar
                                            soni .
                                        </td>
                                        <td class="border border-b-2 ">
                                            {{ $tekshirivchilar->tash_ortiq_rahbarlar ?? null }}</td>
                                    </tr>

                                </tbody>
                            </table>

                            <table class="table mt-5">
                                <tr>
                                    <td class="border border-b-2 ">Ekspert xulosasi
                                    </td>
                                    <td class="border border-b-2 ">{{ $tekshirivchilar->status ?? null }}</td>
                                </tr>
                                <tr class="bg-gray-200">
                                    <td class="border border-b-2 ">
                                        Izoh
                                    </td>
                                    <td class="border border-b-2 ">{{ $tekshirivchilar->comment ?? null }}</td>
                                </tr>
                                <tr>
                                    <td class="border border-b-2 ">
                                        Fayl
                                    </td>
                                    <td class="border border-b-2 ">
                                        @if ($tekshirivchilar->file)
                                            <a href="{{ asset('storage/' . $tekshirivchilar->file) }}"
                                                class="button  bg-theme-1 text-white"  target="_blank">Faylni ko'rish</a>
                                        @endif
                                    </td>
                                </tr>

                                <tr class="bg-gray-200">
                                    {{-- <td class="border border-b-2 ">9.</td> --}}
                                    <td class="border border-b-2 ">
                                        Ishchi guruh rahbari F.I.Sh
                                    </td>
                                    <td class="border border-b-2 ">
                                        {{ $tekshirivchilar->fish }}
                                    </td>
                                </tr>
                                <tr>
                                    {{-- <td class="border border-b-2 ">10.</td> --}}
                                    <td class="border border-b-2 ">
                                        Ishchi guruh azosi F.I.Sh
                                    </td>
                                    <td class="border border-b-2 ">
                                        {{ $tekshirivchilar->user->name }}
                                    </td>
                                </tr>
                                <tr class="bg-gray-200">
                                    {{-- <td class="border border-b-2 ">11.</td> --}}
                                    <td class="border border-b-2 ">
                                        Ekspert F.I.Sh
                                    </td>
                                    <td class="border border-b-2 ">
                                        {{ $tekshirivchilar->ekspert_fish }}
                                    </td>
                                </tr>

                            </table>
                        </div>
                    @empty
                        <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-1"
                            style="background: white; padding: 20px 20px; border-radius: 20px">
                            <div class="w-full mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                                <form id="science-paper-create-form" method="POST"
                                    action="{{ route('doktaranturaexpert.store') }}" class="validate-form"
                                    enctype="multipart/form-data" novalidate="novalidate">
                                    @csrf
                                    <div class="grid grid-cols-12 gap-2">
                                        <input type="hidden" name="tashkilot_id" value="{{ $tashkilot->id }}">
                                        <div class="w-full col-span-12">
                                            <table class="table">

                                                <thead>
                                                    <tr class="bg-gray-200">
                                                        <th class="border border-b-2 " style="width: 40px;">№</th>
                                                        <th class="border border-b-2 " style="width: 60%;">Ko‘rsatkichlar
                                                        </th>
                                                        <th class="border border-b-2 ">Miqdori</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="border border-b-2 ">1.</td>
                                                        <td class="border border-b-2 ">
                                                            Tashkilot buyrug‘i asosida qabul qilingan umumiy izlanuvchilar
                                                            soni.
                                                        </td>
                                                        <td class="border border-b-2 ">
                                                            <input type="number" name="umumiy_izlanuvchilar"
                                                                class="input w-full border mt-2" required="">
                                                        </td>
                                                    </tr>
                                                    <tr class="bg-gray-200">
                                                        <td class="border border-b-2 ">2.</td>
                                                        <td class="border border-b-2 ">
                                                            Yagona elektron tizimdagi tahsil olayotgan izlanuvchilar soni.
                                                        </td>
                                                        <td class="border border-b-2 ">
                                                            <input type="number" name="yagonae_tah_soni" value="{{$data[0]['count']}}"
                                                                class="input w-full border mt-2" required="" readonly>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="border border-b-2 ">3.</td>
                                                        <td class="border border-b-2 ">
                                                            Chetlashtirilgan izlanuvchilar soni.
                                                        </td>
                                                        <td class="border border-b-2 ">
                                                            <input type="number" name="chetlash_soni" value="{{$data[1]['count']}}"
                                                                class="input w-full border mt-2" required="" readonly>
                                                        </td>
                                                    </tr>
                                                    <tr class="bg-gray-200">
                                                        <td class="border border-b-2 ">4.</td>
                                                        <td class="border border-b-2 ">
                                                            Akademik ta’tildagi izlanuvchilar soni.
                                                        </td>
                                                        <td class="border border-b-2 ">
                                                            <input type="number" name="akademik_soni" value="{{$data[3]['count']}}"
                                                                class="input w-full border mt-2" required="" readonly>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="border border-b-2 ">5.</td>
                                                        <td class="border border-b-2 ">
                                                            Muddatidan oldin himoya qilgan izlanuvchilar soni.
                                                        </td>
                                                        <td class="border border-b-2 ">
                                                            <input type="number" name="muddatidano_soni" value=""
                                                                class="input w-full border mt-2" required="">
                                                        </td>
                                                    </tr>
                                                    <tr class="bg-gray-200">
                                                        <td class="border border-b-2 ">6.</td>
                                                        <td class="border border-b-2 ">
                                                            Yagona elektron tizimga kiritilmagan izlanuvchilar soni.
                                                        </td>
                                                        <td class="border border-b-2 ">
                                                            <input type="number" name="kiritilmagan_soni"
                                                                class="input w-full border mt-2" required="">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="border border-b-2 ">7.</td>
                                                        <td class="border border-b-2 ">
                                                            Yakka tartibdagi rejani bajarmagan izlanuvchilar soni .
                                                        </td>
                                                        <td class="border border-b-2 ">
                                                            <input type="number" name="rejani_bajarmagan" value="{{ $doktarantura->where('reja_b', "Yo'q")->count() ?? "" }}"
                                                                class="input w-full border mt-2" required="" readonly>
                                                        </td>
                                                    </tr>
                                                    <tr class="bg-gray-200">
                                                        <td class="border border-b-2 ">8.</td>
                                                        <td class="border border-b-2 ">
                                                            Monitoring natijasi kiritilmagan izlanuvchilar soni.
                                                        </td>
                                                        <td class="border border-b-2 ">
                                                            <input type="number" name="mon_nat_kiritilmagan" value="{{ $doktarantura->where('monitoring_natijasik', "Yo'q")->count() ?? ""}}"
                                                                class="input w-full border mt-2" required="" readonly>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="border border-b-2 ">9.</td>
                                                        <td class="border border-b-2 ">
                                                            Tashkilot izlanuvchilari biriktirilgan ilmiy rahbarlar soni.
                                                        </td>
                                                        <td class="border border-b-2 ">
                                                            <input type="number" name="biriktirilgan_rahbarlar" value="{{ $ilmiyrahbarlars->count() ?? "" }}"
                                                                class="input w-full border mt-2" required="" readonly>
                                                        </td>
                                                    </tr>
                                                    <tr class="bg-gray-200">
                                                        <td class="border border-b-2 ">10.</td>
                                                        <td class="border border-b-2 ">
                                                            Qo‘shimcha izlanuvchi biriktirish bo‘yicha kollegial organ
                                                            qarori
                                                            mavjud bo'lmagan ilmiy rahbarlar soni .
                                                        </td>
                                                        <td class="border border-b-2 ">
                                                            <input type="number" name="kollegial_rahbarlar"
                                                                class="input w-full border mt-2" required="">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="border border-b-2 ">11.</td>
                                                        <td class="border border-b-2 ">
                                                            Me’yoridan ortiq izlanuvchi biriktirilgan ilmiy rahbarlar soni .
                                                        </td>
                                                        <td class="border border-b-2 ">
                                                            <input type="number" name="meyoridan_rahbarlar"
                                                                class="input w-full border mt-2" required="">
                                                        </td>
                                                    </tr>
                                                    <tr class="bg-gray-200">
                                                        <td class="border border-b-2 ">12.</td>
                                                        <td class="border border-b-2 ">
                                                            Tashkilot miqyosida me’yoridan ortiq izlanuvchi biriktirilgan
                                                            ilmiy
                                                            rahbarlar soni .
                                                        </td>
                                                        <td class="border border-b-2 ">
                                                            <input type="number" name="tash_ortiq_rahbarlar"
                                                                class="input w-full border mt-2" required="">
                                                        </td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="w-full col-span-6 ">
                                            <label class="flex flex-col sm:flex-row"> <span
                                                    class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Ekspert F.I.Sh</label>
                                            <input type="text" name="ekspert_fish"  class="input w-full border mt-2" required>
                                        </div>

                                        <div class="w-full col-span-6">
                                            <label class="flex flex-col sm:flex-row"> <span
                                                    class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Status
                                            </label>
                                            <select name="status" id="science-sub-category"
                                                class="input border w-full mt-2" required="">

                                                <option value=""></option>

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
                                            <textarea name="comment" id="" class="input w-full border mt-2" cols="5" rows="5" required></textarea>
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
                    @endforelse
                </div>

            </div>
        </div>
    </div>
    <style>
            .ilmiy_izlanuvchi{
            width:40%;
            background-color: rgba(0, 0, 0, 0.02);
            color:black;
            }
    </style>

    <div class="modal" id="doktarantura-paper-create-modal">
        <div class="modal__content modal__content--xl">
            <div class="p-5">

                <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2">
                    <div class="w-full mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                        <form id="doktarantura-paper-create-form" method="POST"
                            action="{{ route('doktaranturaexpert.update', $tekshirivchilar->id ?? 1) }}" class="validate-form"
                            enctype="multipart/form-data" novalidate="novalidate">
                            @csrf
                            @method('PUT')
                            <div class="grid grid-cols-12 gap-2">

                                <div class="w-full col-span-12">
                                    <table class="table">

                                        <thead>
                                            <tr class="bg-gray-200">
                                                <th class="border border-b-2 " style="width: 40px;">№</th>
                                                <th class="border border-b-2 " style="width: 60%;">Ko‘rsatkichlar</th>
                                                <th class="border border-b-2 ">Miqdori</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="border border-b-2 ">1.</td>
                                                <td class="border border-b-2 ">
                                                    Tashkilot buyrug‘i asosida qabul qilingan umumiy izlanuvchilar soni.
                                                </td>
                                                <td class="border border-b-2 ">
                                                    <input type="number" name="umumiy_izlanuvchilar"
                                                        value="{{ $tekshirivchilar->umumiy_izlanuvchilar ?? null }}"
                                                        class="input w-full border mt-2">
                                                </td>
                                            </tr>
                                            <tr class="bg-gray-200">
                                                <td class="border border-b-2 ">2.</td>
                                                <td class="border border-b-2 ">
                                                    Yagona elektron tizimdagi tahsil olayotgan izlanuvchilar soni.
                                                </td>
                                                <td class="border border-b-2 ">
                                                    <input type="number" name="yagonae_tah_soni"
                                                        value="{{ $tekshirivchilar->yagonae_tah_soni ?? null }}"
                                                        class="input w-full border mt-2">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="border border-b-2 ">3.</td>
                                                <td class="border border-b-2 ">
                                                    Chetlashtirilgan izlanuvchilar soni.
                                                </td>
                                                <td class="border border-b-2 ">
                                                    <input type="number" name="chetlash_soni"
                                                        value="{{ $tekshirivchilar->chetlash_soni ?? null }}"
                                                        class="input w-full border mt-2">
                                                </td>
                                            </tr>
                                            <tr class="bg-gray-200">
                                                <td class="border border-b-2 ">4.</td>
                                                <td class="border border-b-2 ">
                                                    Akademik ta’tildagi izlanuvchilar soni.
                                                </td>
                                                <td class="border border-b-2 ">
                                                    <input type="number" name="akademik_soni"
                                                        value="{{ $tekshirivchilar->akademik_soni ?? null }}"
                                                        class="input w-full border mt-2">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="border border-b-2 ">5.</td>
                                                <td class="border border-b-2 ">
                                                    Muddatidan oldin himoya qilgan izlanuvchilar soni.
                                                </td>
                                                <td class="border border-b-2 ">
                                                    <input type="number" name="muddatidano_soni"
                                                        value="{{ $tekshirivchilar->muddatidano_soni ?? null }}"
                                                        class="input w-full border mt-2">
                                                </td>
                                            </tr>
                                            <tr class="bg-gray-200">
                                                <td class="border border-b-2 ">6.</td>
                                                <td class="border border-b-2 ">
                                                    Yagona elektron tizimga kiritilmagan izlanuvchilar soni.
                                                </td>
                                                <td class="border border-b-2 ">
                                                    <input type="number" name="kiritilmagan_soni"
                                                        value="{{ $tekshirivchilar->kiritilmagan_soni ?? null }}"
                                                        class="input w-full border mt-2">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="border border-b-2 ">7.</td>
                                                <td class="border border-b-2 ">
                                                    Yakka tartibdagi rejani bajarmagan izlanuvchilar soni .
                                                </td>
                                                <td class="border border-b-2 ">
                                                    <input type="number" name="rejani_bajarmagan"
                                                        value="{{ $tekshirivchilar->rejani_bajarmagan ?? null }}"
                                                        class="input w-full border mt-2">
                                                </td>
                                            </tr>
                                            <tr class="bg-gray-200">
                                                <td class="border border-b-2 ">8.</td>
                                                <td class="border border-b-2 ">
                                                    Monitoring natijasi kiritilmagan izlanuvchilar soni .
                                                </td>
                                                <td class="border border-b-2 ">
                                                    <input type="number" name="mon_nat_kiritilmagan"
                                                        value="{{ $tekshirivchilar->mon_nat_kiritilmagan ?? null }}"
                                                        class="input w-full border mt-2">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="border border-b-2 ">9.</td>
                                                <td class="border border-b-2 ">
                                                    Tashkilot izlanuvchilari biriktirilgan ilmiy rahbarlar soni .
                                                </td>
                                                <td class="border border-b-2 ">
                                                    <input type="number" name="biriktirilgan_rahbarlar"
                                                        value="{{ $tekshirivchilar->biriktirilgan_rahbarlar ?? null }}"
                                                        class="input w-full border mt-2">
                                                </td>
                                            </tr>
                                            <tr class="bg-gray-200">
                                                <td class="border border-b-2 ">10.</td>
                                                <td class="border border-b-2 ">
                                                    Qo‘shimcha izlanuvchi biriktirish bo‘yicha kollegial organ qarori
                                                    mavjud bo'lmagan ilmiy rahbarlar soni .
                                                </td>
                                                <td class="border border-b-2 ">
                                                    <input type="number" name="kollegial_rahbarlar"
                                                        value="{{ $tekshirivchilar->kollegial_rahbarlar ?? null }}"
                                                        class="input w-full border mt-2">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="border border-b-2 ">11.</td>
                                                <td class="border border-b-2 ">
                                                    Me’yoridan ortiq izlanuvchi biriktirilgan ilmiy rahbarlar soni .
                                                </td>
                                                <td class="border border-b-2 ">
                                                    <input type="number" name="meyoridan_rahbarlar"
                                                        value="{{ $tekshirivchilar->meyoridan_rahbarlar ?? null }}"
                                                        class="input w-full border mt-2">
                                                </td>
                                            </tr>
                                            <tr class="bg-gray-200">
                                                <td class="border border-b-2 ">12.</td>
                                                <td class="border border-b-2 ">
                                                    Tashkilot miqyosida me’yoridan ortiq izlanuvchi biriktirilgan ilmiy
                                                    rahbarlar soni .
                                                </td>
                                                <td class="border border-b-2 ">
                                                    <input type="number" name="tash_ortiq_rahbarlar"
                                                        value="{{ $tekshirivchilar->tash_ortiq_rahbarlar ?? null }}"
                                                        class="input w-full border mt-2">
                                                </td>
                                            </tr>

                                            <tr >
                                                <td class="border border-b-2 ">13.</td>
                                                <td class="border border-b-2 ">
                                                    Ekspert F.I.Sh
                                                </td>
                                                <td class="border border-b-2 ">
                                                    <input type="text" name="ekspert_fish"
                                                        value="{{ $tekshirivchilar->ekspert_fish ?? null }}"
                                                        class="input w-full border mt-2">
                                                </td>
                                            </tr>

                                            <tr class="bg-gray-200">
                                                <td class="border border-b-2 ">14.</td>
                                                <td class="border border-b-2 ">
                                                    Status.
                                                </td>
                                                <td class="border border-b-2 ">
                                                    <select name="status" id="science-sub-category"
                                                        class="input border w-full mt-2" required="">

                                                        <option value=""></option>

                                                        <option value="A’lo">A’lo</option>

                                                        <option value="Yaxshi">Yaxshi</option>

                                                        <option value="Qoniqarli">Qoniqarli</option>

                                                        <option value="Qoniqarsiz">Qoniqarsiz</option>

                                                    </select><br>

                                                    @error('muddat')
                                                        <div class="error">{{ $message }}</div>
                                                    @enderror
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="border border-b-2 ">15.</td>
                                                <td class="border border-b-2 ">
                                                    Izoh.
                                                </td>
                                                <td class="border border-b-2 ">
                                                        <textarea name="comment" id="" class="input w-full border mt-2">{{ $tekshirivchilar->comment ?? null}}</textarea>
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>

            </div>
            <div class="px-5 pb-5 text-center">
                <button type="button" data-dismiss="modal" class="button delete-cancel w-32 border text-gray-700 mr-1">
                    Bekor qilish
                </button>
                <button type="submit" form="doktarantura-paper-create-form"
                    class="update-confirm button w-24 bg-theme-1 text-white">
                    Tasdiqlash
                </button>
            </div>
        </div>
    </div>
    <div class="modal" id="science-ilmiy-izlanuvchi-show-modal">
        <div class="modal__content modal__content--xl" style="margin-top:revert-layer;">
            <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200">
                <h2 class="font-medium text-base mr-auto" style="font-size:24px;color:black;">Ma'lumotlarni ko'rish</h2>
                <button type="button" class="button border items-center text-gray-700 hidden sm:flex"
                    data-dismiss="modal">
                    <i data-feather="x" class="w-4 h-4 "></i></button>
            </div>
            <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">

                <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2">
                    <div class="w-full  sm:mt-0 sm:ml-auto md:ml-0">
                        <table class="table" style="border-radius: 8px;">
                            <tbody>
                                <tr>
                                    <th class="border ilmiy_izlanuvchi">F.I.Sh</th>
                                    <td class="border" style="width:60%;color:black;" id="full_name"></td>
                                </tr>
                                <tr>
                                    <th class="border ilmiy_izlanuvchi">Dissertatsiya mavzusi</th>
                                    <td class="border" style="width:60%;color:black;" id="direction_name"></td>
                                </tr>
                                <tr>
                                    <th class="border ilmiy_izlanuvchi">Ixtisoslik</th>
                                    <td class="border" style="width:60%;color:black;" id="direction_code"></td>
                                </tr>
                                <tr>
                                    <th class="border ilmiy_izlanuvchi">Tashkilot</th>
                                    <td class="border" style="width:60%;color:black;" id="org_name"></td>
                                </tr>
                                <tr>
                                    <th class="border ilmiy_izlanuvchi">Ta'lim turi</th>
                                    <td class="border" style="width:60%;color:black;" id="dc_type"></td>
                                </tr>
                                <tr>
                                    <th class="border ilmiy_izlanuvchi">Qabul yili</th>
                                    <td class="border" style="width:60%;color:black;" id="admission_year"></td>
                                </tr>
                                <tr>
                                    <th class="border ilmiy_izlanuvchi">Qabul choragi</th>
                                    <td class="border" style="width:60%;color:black;" id="admission_quarter"></td>
                                </tr>
                                <tr>
                                    <th class="border ilmiy_izlanuvchi">Ilmiy rahbar</th>
                                    <td class="border" style="width:60%;color:black;" id="advisor"></td>
                                </tr>
                                <tr>
                                    <th class="border ilmiy_izlanuvchi">Kurs</th>
                                    <td class="border" style="width:60%;color:black;" id="course"></td>
                                </tr>
                                <tr>
                                    <th class="border ilmiy_izlanuvchi">Monitoring 1</th>
                                    <td class="border" style="width:60%;color:black;" id="monitoring_1"></td>
                                </tr>
                                <tr>
                                    <th class="border ilmiy_izlanuvchi">Monitoring 2</th>
                                    <td class="border" style="width:60%;color:black;" id="monitoring_2"></td>
                                </tr>
                                <tr>
                                    <th class="border ilmiy_izlanuvchi">Monitoring 3</th>
                                    <td class="border" style="width:60%;color:black;" id="monitoring_3"></td>
                                </tr>
                                <tr>
                                    <th class="border ilmiy_izlanuvchi">Yakka tartibdagi reja tasdiqlanganligi</th>
                                    <td class="border" style="width:60%;color:black;" id="reja_t"></td>
                                </tr>
                                <tr>
                                    <th class="border ilmiy_izlanuvchi">Yakka tartibdagi rejani bajarganligi</th>
                                    <td class="border" style="width:60%;color:black;" id="reja_b"></td>
                                </tr>
                                <tr>
                                    <th class="border ilmiy_izlanuvchi">Monitoring natijasi kiritilganligi</th>
                                    <td class="border" style="width:60%;color:black;" id="monitoring_natijasik"></td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="science-ilmiy-izlanuvchi-edit-modal">
        <div class="modal__content modal__content--xl" style="margin-top:revert-layer;">
            <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200">
                <h2 class="font-medium text-base mr-auto" style="font-size:24px;color:black;">Ma'lumotlarni ko'rish</h2>
                <button type="button" class="button border items-center text-gray-700 hidden sm:flex"
                    data-dismiss="modal">
                    <i data-feather="x" class="w-4 h-4 "></i></button>
            </div>
            <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">

                <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2">
                    <div class="w-full  sm:mt-0 sm:ml-auto md:ml-0">
                        <table class="table" style="border-radius: 8px;">
                            <tbody>
                                <tr>
                                    <th class="border ilmiy_izlanuvchi">F.I.Sh</th>
                                    <td class="border" style="width:60%;color:black;" id="edit_full_name"></td>
                                </tr>
                                <tr>
                                    <th class="border ilmiy_izlanuvchi">Dissertatsiya mavzusi</th>
                                    <td class="border" style="width:60%;color:black;" id="edit_direction_name"></td>
                                </tr>
                                <tr>
                                    <th class="border ilmiy_izlanuvchi">Ixtisoslik</th>
                                    <td class="border" style="width:60%;color:black;" id="edit_direction_code"></td>
                                </tr>
                                <tr>
                                    <th class="border ilmiy_izlanuvchi">Tashkilot</th>
                                    <td class="border" style="width:60%;color:black;" id="edit_org_name"></td>
                                </tr>
                                <tr>
                                    <th class="border ilmiy_izlanuvchi">Ta'lim turi</th>
                                    <td class="border" style="width:60%;color:black;" id="edit_dc_type"></td>
                                </tr>
                                <tr>
                                    <th class="border ilmiy_izlanuvchi">Qabul yili</th>
                                    <td class="border" style="width:60%;color:black;" id="edit_admission_year"></td>
                                </tr>
                                <tr>
                                    <th class="border ilmiy_izlanuvchi">Qabul choragi</th>
                                    <td class="border" style="width:60%;color:black;" id="edit_admission_quarter"></td>
                                </tr>
                                <tr>
                                    <th class="border ilmiy_izlanuvchi">Ilmiy rahbar</th>
                                    <td class="border" style="width:60%;color:black;" id="edit_advisor"></td>
                                </tr>
                                <tr>
                                    <th class="border ilmiy_izlanuvchi">Kurs</th>
                                    <td class="border" style="width:60%;color:black;" id="edit_course"></td>
                                </tr>
                                <tr>
                                    <th class="border ilmiy_izlanuvchi">Monitoring 1</th>
                                    <td class="border" style="width:60%;color:black;" id="edit_monitoring_1"></td>
                                </tr>
                                <tr>
                                    <th class="border ilmiy_izlanuvchi">Monitoring 2</th>
                                    <td class="border" style="width:60%;color:black;" id="edit_monitoring_2"></td>
                                </tr>
                                <tr>
                                    <th class="border ilmiy_izlanuvchi">Monitoring 3</th>
                                    <td class="border" style="width:60%;color:black;" id="edit_monitoring_3"></td>
                                </tr>
                                <tr>
                                    <th class="border ilmiy_izlanuvchi">Yakka tartibdagi reja tasdiqlanganligi</th>
                                    <td class="border" style="width:60%;color:black;" id="edit_reja_t"></td>
                                </tr>
                                <tr>
                                    <th class="border ilmiy_izlanuvchi">Yakka tartibdagi rejani bajarganligi</th>
                                    <td class="border" style="width:60%;color:black;" id="edit_reja_b"></td>
                                </tr>
                                <tr>
                                    <th class="border ilmiy_izlanuvchi">Monitoring natijasi kiritilganligi</th>
                                    <td class="border" style="width:60%;color:black;" id="edit_monitoring_natijasik"></td>
                                </tr>

                            </tbody>
                        </table>

                        <div class="w-full mt-6 sm:ml-auto md:ml-0 ">
                            <form id="science-paper-edit-form" method="POST" action="" class="validate-form"
                                enctype="multipart/form-data" novalidate="novalidate">
                                @csrf
                                @method('PUT')
                                <div class="grid grid-cols-12 gap-2">
                                    <div class="w-full col-span-4">
                                        <label class="flex flex-col sm:flex-row"> <span
                                                class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Yakka tartibdagi reja tasdiqlanganligi:
                                        </label>
                                        <select name="reja_t"
                                                class="input border w-full mt-2" required="">
                                                <option value=""></option>
                                                <option value="Ha">Ha</option>
                                                <option value="Yo'q">Yo'q</option>
                                            </select>
                                        @error('reja_t')
                                            <div class="error">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="w-full col-span-4">
                                        <label class="flex flex-col sm:flex-row"> <span
                                                class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Yakka tartibdagi rejani bajarganligi:
                                        </label>
                                        <select name="reja_b"
                                                class="input border w-full mt-2" required="">
                                                <option value=""></option>
                                                <option value="Ha">Ha</option>
                                                <option value="Yo'q">Yo'q</option>
                                            </select>
                                        @error('reja_b')
                                            <div class="error">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="w-full col-span-4">
                                        <label class="flex flex-col sm:flex-row"> <span
                                                class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Monitoring natijasi kiritilganligi:
                                        </label>
                                        <select name="monitoring_natijasik"
                                                class="input border w-full mt-2" required="">
                                                <option value=""></option>
                                                <option value="Ha">Ha</option>
                                                <option value="Yo'q">Yo'q</option>
                                            </select>
                                        @error('monitoring_natijasik')
                                            <div class="error">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </form>
                            <div class="px-5 pb-5 text-center mt-4">
                                <button type="button" data-dismiss="modal"
                                    class="button delete-cancel w-32 border text-gray-700 mr-1">
                                    Bekor qilish
                                </button>
                                <button type="submit" form="science-paper-edit-form"
                                    class="update-confirm button w-24 bg-theme-1 text-white">
                                    Tasdiqlash
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="science-ilmiy-rahbar-show-modal">
        <div class="modal__content modal__content--xl" style="margin-top:revert-layer;">
            <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200">
                <h2 class="font-medium text-base mr-auto" style="font-size:24px;color:black;">Ma'lumotlarni ko'rish</h2>
                <button type="button" class="button border items-center text-gray-700 hidden sm:flex"
                    data-dismiss="modal">
                    <i data-feather="x" class="w-4 h-4 "></i></button>
            </div>
            <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">

                <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2">
                    <div class="w-full  sm:mt-0 sm:ml-auto md:ml-0">
                        <table class="table" style="border-radius: 8px;">
                            <tbody>
                                <tr>
                                    <th class="border ilmiy_izlanuvchi">Ilmiy rahbarlar F.I.SH.</th>
                                    <td class="border" style="width:60%;color:black;" id="ir_full_name"></td>
                                </tr>
                                <tr>
                                    <th class="border ilmiy_izlanuvchi">Tashkilotdan biriktiilgan izlanuvchilar soni</th>
                                    <td class="border" style="width:60%;color:black;" id="org"></td>
                                </tr>
                                <tr>
                                    <th class="border ilmiy_izlanuvchi">Umumiy biriktirilgan izlanuvchilar soni</th>
                                    <td class="border" style="width:60%;color:black;" id="all"></td>
                                </tr>
                                <tr>
                                    <th class="border ilmiy_izlanuvchi">Ilmiy rahbarga qo’shimcha izlanuvchi biriktirish mumkinligi bo’yicha kollegial organ qarori mavjudigi</th>
                                    <td class="border" style="width:60%;color:black;" id="kollegial_organ_qarori"></td>
                                </tr>
                                <tr>
                                    <th class="border ilmiy_izlanuvchi">Meyoridan ortiq</th>
                                    <td class="border" style="width:60%;color:black;" id="meyoridan_ortiq"></td>
                                </tr>
                                <tr>
                                    <th class="border ilmiy_izlanuvchi">Tashkilot miqyosida meyoridan ortiq</th>
                                    <td class="border" style="width:60%;color:black;" id="tash_meyoridan_ortiq"></td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="science-ilmiy-rahbar-edit-modal">
        <div class="modal__content modal__content--xl" style="margin-top:revert-layer;">
            <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200">
                <h2 class="font-medium text-base mr-auto" style="font-size:24px;color:black;">Ma'lumotlarni ko'rish</h2>
                <button type="button" class="button border items-center text-gray-700 hidden sm:flex"
                    data-dismiss="modal">
                    <i data-feather="x" class="w-4 h-4 "></i></button>
            </div>
            <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">

                <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2">
                    <div class="w-full  sm:mt-0 sm:ml-auto md:ml-0">
                        <table class="table" style="border-radius: 8px;">
                            <tbody>
                                <tr>
                                    <th class="border ilmiy_izlanuvchi">Ilmiy rahbarlar F.I.SH.</th>
                                    <td class="border" style="width:60%;color:black;" id="edit_ir_full_name"></td>
                                </tr>
                                <tr>
                                    <th class="border ilmiy_izlanuvchi">Tashkilotdan biriktiilgan izlanuvchilar soni</th>
                                    <td class="border" style="width:60%;color:black;" id="edit_org"></td>
                                </tr>
                                <tr>
                                    <th class="border ilmiy_izlanuvchi">Umumiy biriktirilgan izlanuvchilar soni</th>
                                    <td class="border" style="width:60%;color:black;" id="edit_all"></td>
                                </tr>
                                <tr>
                                    <th class="border ilmiy_izlanuvchi">Ilmiy rahbarga qo’shimcha izlanuvchi biriktirish mumkinligi bo’yicha kollegial organ qarori mavjudigi</th>
                                    <td class="border" style="width:60%;color:black;" id="edit_kollegial_organ_qarori"></td>
                                </tr>
                                <tr>
                                    <th class="border ilmiy_izlanuvchi">Meyoridan ortiq</th>
                                    <td class="border" style="width:60%;color:black;" id="edit_meyoridan_ortiq"></td>
                                </tr>
                                <tr>
                                    <th class="border ilmiy_izlanuvchi">Tashkilot miqyosida meyoridan ortiq</th>
                                    <td class="border" style="width:60%;color:black;" id="edit_tash_meyoridan_ortiq"></td>
                                </tr>

                            </tbody>
                        </table>


                        <div class="w-full mt-6 sm:ml-auto md:ml-0 ">
                            <form id="science-ilmiy-rahbar-edit-form" method="POST" action="" class="validate-form"
                                enctype="multipart/form-data" novalidate="novalidate">
                                @csrf
                                @method('PUT')
                                <div class="grid grid-cols-12 gap-2">
                                    <div class="w-full col-span-4">
                                        <label class="flex flex-col sm:flex-row"> <span
                                                class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Ilmiy rahbarga qo’shimcha izlanuvchi biriktirish mumkinligi bo’yicha kollegial organ qarori mavjudigi:
                                        </label>
                                        <select name="kollegial_organ_qarori"
                                                class="input border w-full mt-2" required="">
                                                <option value=""></option>
                                                <option value="Ha">Ha</option>
                                                <option value="Yo'q">Yo'q</option>
                                            </select>
                                        @error('kollegial_organ_qarori')
                                            <div class="error">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="w-full col-span-4">
                                        <label class="flex flex-col sm:flex-row"> <span
                                                class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Meyoridan ortiq:
                                        </label>
                                        <select name="meyoridan_ortiq"
                                                class="input border w-full mt-2" required="">
                                                <option value=""></option>
                                                <option value="Ha">Ha</option>
                                                <option value="Yo'q">Yo'q</option>
                                            </select>
                                        @error('meyoridan_ortiq')
                                            <div class="error">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="w-full col-span-4">
                                        <label class="flex flex-col sm:flex-row"> <span
                                                class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Tashkilot miqyosida meyoridan ortiq:
                                        </label>
                                        <select name="tash_meyoridan_ortiq"
                                                class="input border w-full mt-2" required="">
                                                <option value=""></option>
                                                <option value="Ha">Ha</option>
                                                <option value="Yo'q">Yo'q</option>
                                            </select>
                                        @error('tash_meyoridan_ortiq')
                                            <div class="error">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </form>
                            <div class="px-5 pb-5 text-center mt-4">
                                <button type="button" data-dismiss="modal"
                                    class="button delete-cancel w-32 border text-gray-700 mr-1">
                                    Bekor qilish
                                </button>
                                <button type="submit" form="science-ilmiy-rahbar-edit-form"
                                    class="update-confirm button w-24 bg-theme-1 text-white">
                                    Tasdiqlash
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Tahrirlash tugmasini bosganda modalni ochish va ma'lumotlarni to'ldirish
        function openShowIlmiIzlanuvchiModal(id) {
            // AJAX so'rovni yuboramiz
            $.ajax({
                url: `/ilmiy-izlanuvchi/${id}`,
                type: 'GET',
                success: function (data) {
                    // Ma'lumotlarni modal shaklida aks ettiramiz
                    $('#full_name').text(data.full_name);
                    $('#direction_name').text(data.direction_name);
                    $('#direction_code').text(data.direction_code);
                    $('#org_name').text(data.org_name);
                    $('#dc_type').text(data.dc_type);
                    $('#admission_year').text(data.admission_year);
                    $('#admission_quarter').text(data.admission_quarter);
                    $('#advisor').text(data.advisor);
                    $('#course').text(data.course);
                    $('#monitoring_1').text(data.monitoring_1);
                    $('#monitoring_2').text(data.monitoring_2);
                    $('#monitoring_3').text(data.monitoring_3);
                    $('#reja_t').text(data.reja_t);
                    $('#reja_b').text(data.reja_b);
                    $('#monitoring_natijasik').text(data.monitoring_natijasik);

                    $('#science-ilmiy-izlanuvchi-show-modal').modal('show');
                },
                error: function (error) {
                    console.error("Ma'lumotlarni yuklashda xatolik yuz berdi: ", error);
                }
            });
        }
    </script>

    <script>
        // Tahrirlash tugmasini bosganda modalni ochish va ma'lumotlarni to'ldirish
        function openEditIlmiIzlanuvchiModal(id) {
            // AJAX so'rovni yuboramiz
            $.ajax({
                url: `/ilmiy-izlanuvchi/${id}`,
                type: 'GET',
                success: function (data) {
                    // Ma'lumotlarni modal shaklida aks ettiramiz
                    $('#edit_full_name').text(data.full_name);
                    $('#edit_direction_name').text(data.direction_name);
                    $('#edit_direction_code').text(data.direction_code);
                    $('#edit_org_name').text(data.org_name);
                    $('#edit_dc_type').text(data.dc_type);
                    $('#edit_admission_year').text(data.admission_year);
                    $('#edit_admission_quarter').text(data.admission_quarter);
                    $('#edit_advisor').text(data.advisor);
                    $('#edit_course').text(data.course);
                    $('#edit_monitoring_1').text(data.monitoring_1);
                    $('#edit_monitoring_2').text(data.monitoring_2);
                    $('#edit_monitoring_3').text(data.monitoring_3);
                    $('#edit_reja_t').text(data.reja_t);
                    $('#edit_reja_b').text(data.reja_b);
                    $('#edit_monitoring_natijasik').text(data.monitoring_natijasik);

                    $('#science-paper-edit-form').attr('action', `/ilmiy-izlanuvchi/${id}/edit`);

                    $('#science-ilmiy-izlanuvchi-edit-modal').modal('show');
                },
                error: function (error) {
                    console.error("Ma'lumotlarni yuklashda xatolik yuz berdi: ", error);
                }
            });
        }
    </script>

    <script>
        // Tahrirlash tugmasini bosganda modalni ochish va ma'lumotlarni to'ldirish
        function openShowIlmiRahbarModal(id) {
            // AJAX so'rovni yuboramiz
            $.ajax({
                url: `/ilmiyrahbarlar/${id}`,
                type: 'GET',
                success: function (data) {
                    // Ma'lumotlarni modal shaklida aks ettiramiz
                    $('#ir_full_name').text(data.full_name);
                    $('#org').text(data.org);
                    $('#all').text(data.all);
                    $('#kollegial_organ_qarori').text(data.kollegial_organ_qarori);
                    $('#meyoridan_ortiq').text(data.meyoridan_ortiq);
                    $('#tash_meyoridan_ortiq').text(data.tash_meyoridan_ortiq);

                    $('#science-ilmiy-rahbar-show-modal').modal('show');
                },
                error: function (error) {
                    console.error("Ma'lumotlarni yuklashda xatolik yuz berdi: ", error);
                }
            });
        }
    </script>

    <script>
        // Tahrirlash tugmasini bosganda modalni ochish va ma'lumotlarni to'ldirish
        function openEditIlmiRahbarModal(id) {
            // AJAX so'rovni yuboramiz
            $.ajax({
                url: `/ilmiyrahbarlar/${id}`,
                type: 'GET',
                success: function (data) {
                    // Ma'lumotlarni modal shaklida aks ettiramiz
                    $('#edit_ir_full_name').text(data.full_name);
                    $('#edit_org').text(data.org);
                    $('#edit_all').text(data.all);
                    $('#edit_kollegial_organ_qarori').text(data.kollegial_organ_qarori);
                    $('#edit_meyoridan_ortiq').text(data.meyoridan_ortiq);
                    $('#edit_tash_meyoridan_ortiq').text(data.tash_meyoridan_ortiq);


                    $('#science-ilmiy-rahbar-edit-form').attr('action', `/ilmiy-rahbar/${id}/edit`);

                    $('#science-ilmiy-rahbar-edit-modal').modal('show');
                },
                error: function (error) {
                    console.error("Ma'lumotlarni yuklashda xatolik yuz berdi: ", error);
                }
            });
        }
    </script>
@endsection
