@extends('layouts.admin')

@section('content')
    <div class="content">
        <div class="flex justify-between align-center mt-10 mb-3">

            <h2 class="intro-y text-lg font-medium">{{ $tashkilot->name }}</h2>

        </div>
        <div class="intro-y box px-4   ">

            <div class="nav-tabs flex flex-col sm:flex-row justify-center lg:justify-start">
                <a data-toggle="tab" data-target="#add-hersh" href="javascript:;"
                    class="py-4 sm:mr-8 flex items-center active">
                    Ilmiy izlanuvchilar
                </a>
                <a data-toggle="tab" data-target="#change-password" href="javascript:;"
                    class="py-4 sm:mr-8 flex items-center">
                    Ilmiy rahbarlar
                </a>

                <a data-toggle="tab" data-target="#add-expert" href="javascript:;"
                    class="py-4 sm:mr-8 flex items-center">
                    EKSPERT XULOSASI
                </a>

            </div>
        </div>

        @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif
        <div class="overflow-x-auto mt-2" style="background-color: white;border-radius:8px;">

            <div class="tab-content">
                <div class="tab-content__pane active" id="add-hersh">
                    <div class="p-5">
                        <div class="grid grid-cols-12 gap-6 ">
                            <div class="col-span-12 mt-2 " style="background: white; border-radius: 10px;">
                                <div class="intro-y block sm:flex items-center py-4">
                                    <h2 class="text-lg font-medium truncate ml-4" style="font-size: 24px;font-weight:500;">
                                        Ilmiy izlanuvchilar
                                    </h2>
                                </div>
                                <form id="science-felter-create-form" method="GET" action="{{ route('doktarantura.show', ['doktarantura' => $id]) }}" class="validate-form" enctype="multipart/form-data" novalidate="novalidate">

                                <div class="grid grid-cols-12 gap-2 mb-3 px-4">

                                    <div class="w-full col-span-4">
                                        <label class="flex flex-col sm:flex-row">  Chorak
                                        </label>
                                        <select name="quarter" class="input border w-full mt-2"
                                            required="">
                                            <option value=""></option>
                                            <option value="1" {{ $quarter == "1" ? "selected" : ""}}>1</option>
                                            <option value="2" {{ $quarter == "2" ? "selected" : ""}}>2</option>
                                            <option value="3" {{ $quarter == "3" ? "selected" : ""}}>3</option>
                                            <option value="4" {{ $quarter == "4" ? "selected" : ""}}>4</option>
                                        </select>
                                        @error('quarter')
                                            <div class="error">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="w-full col-span-4">
                                        <label class="flex flex-col sm:flex-row">  Yil
                                        </label>
                                        <select name="year" id="science-sub-category" class="input border w-full mt-2"
                                            required="">
                                            <option value=""></option>
                                            <option value="2020" {{ $year == "2020" ? "selected" : ""}}>2020</option>
                                            <option value="2021" {{ $year == "2021" ? "selected" : ""}}>2021</option>
                                            <option value="2022" {{ $year == "2022" ? "selected" : ""}}>2022</option>
                                            <option value="2023" {{ $year == "2023" ? "selected" : ""}}>2023</option>
                                            <option value="2024" {{ $year == "2024" ? "selected" : ""}}>2024</option>
                                            <option value="2025" {{ $year == "2025" ? "selected" : ""}}>2025</option>
                                        </select>
                                        @error('year')
                                            <div class="error">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="w-full col-span-4">
                                    <button type="submit" form="science-felter-create-form" style="margin-top: 30px;"
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
                                                <td style="color:#1881D3; font-weight: 400;">{{ $m['full_name'] ?? 0}}</td>
                                                <td>
                                                    @switch($m['dc_type'])
                                                        @case(100) Doktorantura (DSc) @break
                                                        @case(200) Tayanch doktorantura (PhD) @break
                                                        @case(300) Stajyor-tadqiqotchi @break
                                                        @case(400) Mustaqil izlanuvchi (DSc) @break
                                                        @case(500) Mustaqil izlanuvchi (PhD) @break
                                                        @case(600) Maqsadli doktorantura (DSc) @break
                                                        @case(700) Maqsadli tayanch doktorantura (PhD) @break
                                                        @case(800) Tashkilot o‘z hisobidan doktorantura (DSc) @break
                                                        @case(900) Tashkilot o‘z hisobidan tayanch doktorantura (PhD) @break
                                                        @case(1000) Tashkilot o‘z hisobidan stajyor-tadqiqotchi  @break
                                                        @case(1100) Doktorantura (xorijiy fuqoro) @break
                                                        @case(1200) Tayanch doktorantura (xorijiy fuqoro) @break
                                                        @case(1300) Stajyor-tadqiqotchi (xorijiy fuqoro) @break
                                                        @default Noma’lum
                                                    @endswitch
                                                </td>
                                                <td>{{ $m['course'] ?? 0}} </td>
                                                <td>{{ $m['status'] ?? 0 }} </td>
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
                                                <th class="whitespace-no-wrap">Hammasi </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data_tach as $t)
                                            <tr style="border-bottom: 1px solid #E6E6E6;">
                                                <td >{{ $loop->iteration }}</td>
                                                <td style="color:#1881D3; font-weight: 400;">{{ $t['full_name'] }}</td>
                                                <td>{{ $t['org'] ?? 0}} </td>
                                                <td>{{ $t['all'] ?? 0}} </td>
                                            </tr>
                                            @endforeach
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
                                    style="display: flex;justify-content: space-between; border-bottom: 1px solid #e2e8f0; padding-bottom: 20px;">
                                    {{-- <div style="font-size:18px;font-weight: 400;">
                                        {{ $tashkilot->name . ' Izlanuvchilar ' }} xaqida ma’lumot
                                    </div> --}}
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
                                            class="button delete-cancel border text-gray-700 mr-1">
                                            Xulosani genertsiya qilish
                                        </a>
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
                                        <td class="border border-b-2 ">0</td>
                                    </tr>
                                    <tr class="bg-gray-200">
                                        <td class="border border-b-2 ">2.</td>
                                        <td class="border border-b-2 ">
                                            Yagona elektron tizimdagi tahsil olayotgan izlanuvchilar soni.
                                        </td>
                                        <td class="border border-b-2 ">0</td>
                                    </tr>
                                    <tr>
                                        <td class="border border-b-2 ">3.</td>
                                        <td class="border border-b-2 ">
                                            Chetlashtirilgan izlanuvchilar soni.
                                        </td>
                                        <td class="border border-b-2 ">0</td>
                                    </tr>
                                    <tr class="bg-gray-200">
                                        <td class="border border-b-2 ">4.</td>
                                        <td class="border border-b-2 ">
                                            Akademik ta’tildagi izlanuvchilar soni.
                                        </td>
                                        <td class="border border-b-2 ">0</td>
                                    </tr>
                                    <tr>
                                        <td class="border border-b-2 ">5.</td>
                                        <td class="border border-b-2 ">
                                            Muddatidan oldin himoya qilgan izlanuvchilar soni.
                                        </td>
                                        <td class="border border-b-2 ">0</td>
                                    </tr>
                                    <tr class="bg-gray-200">
                                        <td class="border border-b-2 ">6.</td>
                                        <td class="border border-b-2 ">
                                            Yagona elektron tizimga kiritilmagan izlanuvchilar soni.
                                        </td>
                                        <td class="border border-b-2 ">0</td>
                                    </tr>
                                    <tr>
                                        <td class="border border-b-2 ">7.</td>
                                        <td class="border border-b-2 ">
                                            Yakka tartibdagi rejani bajarmagan izlanuvchilar soni .
                                        </td>
                                        <td class="border border-b-2 ">0</td>
                                    </tr>
                                    <tr class="bg-gray-200">
                                        <td class="border border-b-2 ">8.</td>
                                        <td class="border border-b-2 ">
                                            Monitoring natijasi kiritilmagan izlanuvchilar soni .
                                        </td>
                                        <td class="border border-b-2 ">0</td>
                                    </tr>
                                    <tr>
                                        <td class="border border-b-2 ">9.</td>
                                        <td class="border border-b-2 ">
                                            Tashkilot izlanuvchilari biriktirilgan ilmiy rahbarlar soni .
                                        </td>
                                        <td class="border border-b-2 ">0</td>
                                    </tr>
                                    <tr class="bg-gray-200">
                                        <td class="border border-b-2 ">10.</td>
                                        <td class="border border-b-2 ">
                                            Qo‘shimcha izlanuvchi biriktirish bo‘yicha kollegial organ qarori mavjud bo'lmagan ilmiy rahbarlar soni .
                                        </td>
                                        <td class="border border-b-2 ">0</td>
                                    </tr>
                                    <tr>
                                        <td class="border border-b-2 ">11.</td>
                                        <td class="border border-b-2 ">
                                            Me’yoridan ortiq izlanuvchi biriktirilgan ilmiy rahbarlar soni .
                                        </td>
                                        <td class="border border-b-2 ">0</td>
                                    </tr>
                                    <tr class="bg-gray-200">
                                        <td class="border border-b-2 ">12.</td>
                                        <td class="border border-b-2 ">
                                            Tashkilot miqyosida me’yoridan ortiq izlanuvchi biriktirilgan ilmiy rahbarlar soni .
                                        </td>
                                        <td class="border border-b-2 ">0</td>
                                    </tr>

                                </tbody>
                            </table>
                            <table class="table mt-5">
                                <tr>
                                    <td class="border border-b-2 ">Ekspert xulosasi
                                    </td>
                                    <td class="border border-b-2 ">{{  $tekshirivchilar->status ?? null }}</td>
                                </tr>
                                <tr class="bg-gray-200">
                                    <td class="border border-b-2 ">
                                        Izoh
                                    </td>
                                    <td class="border border-b-2 ">{{  $tekshirivchilar->comment ?? null }}</td>
                                </tr>
                                <tr>
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
                                    <td class="border border-b-2 ">
                                        Komissiya a'zolari
                                    </td>
                                    <td class="border border-b-2 ">
                                        {{ $tekshirivchilar->fish }}
                                    </td>
                                </tr>
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

{{--
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
                                        </div> --}}

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
@endsection
