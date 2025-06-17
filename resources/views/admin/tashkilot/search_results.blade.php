@extends('layouts.admin')

@section('content')

    <div class="content">
        <div class="flex justify-between align-center mt-6 mb-6" style="align-items: center;">

            <h2 class="intro-y text-lg font-medium">Tashkilotlar soni: {{ $tash_count ?? 404 }} ta</h2>

            <!-- <a href="{{ route('tashkilot.create') }}"  class="button w-24 bg-theme-1 text-white">
                            Qo'shish
                        </a> -->
            {{-- <div class="intro-x relative mr-3 sm:mr-6">
                <div class="search hidden sm:block">
                    <form action="{{ route('search') }}" method="GET">
                        <input type="text" name="query" class="search__input input placeholder-theme-13"
                            placeholder="Search...">
                        <i data-feather="search" class="search__icon"></i>
                    </form>
                </div>
                <a class="notification sm:hidden" href=""> <i data-feather="search" class="notification__icon"></i> </a>
            </div>
            <div class="intro-x relative mr-3 sm:mr-6">
                <form method="GET" action="{{ route('searchloyiha') }}">
                    <select class="form-select" aria-label="Default select example" name="query"
                        onchange="this.form.submit()">
                        <option value="">Status</option>
                        <option value="Jarayonda">Jarayonda</option>
                        <option value="Yakunlangan">Yakunlangan</option>
                    </select>
                </form>
            </div> --}}

            <div class="flex justify-between align-center gap-6">
                <div class="relative text-gray-700">
                    <form action="{{ route('search') }}" method="GET">
                        <input type="text" name="query"
                            class="input input--lg w-full lg:w-64 box pr-10 placeholder-theme-13" placeholder="Search...">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-search w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0">
                            <circle cx="11" cy="11" r="8"></circle>
                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                        </svg>
                    </form>
                </div>
                {{-- <form method="GET" action="{{ route('search') }}">
                    <select class="input input--lg box w-full lg:w-auto mt-3 lg:mt-0 ml-auto" name="query"
                        onchange="this.form.submit()">
                        <option value="">Barchasi OTM & ITM</option>
                        <option value="otm">OTM</option>
                        <option value="itm">ITM</option>
                    </select>
                </form>
                <form method="GET" action="{{ route('search') }}">
                    <select class="input input--lg box w-full lg:w-auto mt-3 lg:mt-0 ml-auto" name="query"
                        onchange="this.form.submit()">
                        <option value="">Viloyatlari</option>
                        @foreach ($regions as $v)
                        <option value="{{ $v->id }}">{{ $v->oz }}</option>
                        @endforeach
                    </select>
                </form> --}}
            </div>

            {{-- <div>
                @role('super-admin')
                <div>
                    <!-- <a href="{{ route("tashqoshish.create") }}" class="button w-24 bg-theme-1 text-white">
                                    Qo'shish
                                </a> -->
                    <a href="{{ route('exportashkilot') }}" class="button box flex items-center text-gray-700"> <i
                            data-feather="file-text" class="hidden sm:block w-4 h-4 mr-2"></i> Export to Excel </a>
                </div>
                <!-- <a href="javascript:;" data-target="#science-paper-create-modal" data-toggle="modal"
                                        class="button w-24 ml-3 bg-theme-1 text-white">
                                        Excel yuklash
                                    </a> -->
                @endrole

            </div> --}}

        </div>
        <div class="grid grid-cols-12 gap-6 mt-5">

            <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
                <div class="grid grid-cols-12 gap-6 mt-5">


                    <style>
                        .report-box__icon {
                            width: 32px;
                            height: 32px;
                        }
                    </style>

                    <div class="col-span-12 sm:col-span-6 xxl:col-span-3 intro-y">
                        <div class="mini-report-chart box p-2 zoom-in" style="border-radius: 20px;">
                            <a href="{{ route('ilmiyloyihalar.index') }}">
                                <div class="flex items-center pl-5"
                                    style="justify-content:left; align-items: center;  height: 100%; gap:20px;">
                                    <div class="flex" style="background: #E4F0FB; padding: 15px; border-radius: 100%;">
                                        <i data-feather="list" class="report-box__icon text-theme-3"></i>
                                    </div>
                                    <div class="w-2/4 flex-none">
                                        <div class="text-lg font-medium truncate" style="font-size: 28px;font-weight:600;">
                                            {{ $loy_count }}
                                            {{-- /{{ $loy_expert }} --}}
                                        </div>
                                        <div class="text-gray-600 mt-1" style="font-size: 16px;">Ilmiy loyihalar</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>



                    <div class="col-span-12 sm:col-span-6 xxl:col-span-3 intro-y">
                        <div class="mini-report-chart box p-2 zoom-in" style="border-radius: 20px;">
                            <a href="{{ route('stajirovkalar.index') }}">
                                <div class="flex items-center pl-5"
                                    style="justify-content:left; align-items: center;  height: 100%; gap:20px;">
                                    <div class="flex" style="background: #EBFBEB; padding: 15px; border-radius: 100%;">
                                        <i data-feather="git-pull-request" class="report-box__icon text-theme-3"
                                            style="color: #00A705;"></i>
                                    </div>
                                    <div class="w-2/4 flex-none">
                                        <div class="text-lg font-medium truncate" style="font-size: 28px;font-weight:600;">
                                            {{ $stajirovka_count }}
                                            {{-- /{{ $stajirovka_expert }} --}}
                                        </div>
                                        <div class="text-gray-600 mt-1" style="font-size: 16px;">Ilmiy stajirovka</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>



                    <div class="col-span-12 sm:col-span-6 xxl:col-span-3 intro-y">
                        <div class="mini-report-chart box p-2 zoom-in" style="border-radius: 20px;">
                            <a href="{{ route('asbobuskunalar.index') }}">
                                <div class="flex items-center pl-5"
                                    style="justify-content:left; align-items: center;  height: 100%; gap:20px;">
                                    <div class="flex" style="background: #FFF9EF; padding: 15px; border-radius: 100%;">
                                        <i data-feather="printer" class="report-box__icon text-theme-3"
                                            style="color: #E0B973;"></i>
                                    </div>
                                    <div class="w-2/4 flex-none">
                                        <div class="text-lg font-medium truncate" style="font-size: 28px;font-weight:600;">
                                            {{ $asboblar_count }}
                                            {{-- /{{ $asboblar_expert }} --}}
                                        </div>
                                        <div class="text-gray-600 mt-1" style="font-size: 16px;">Asbob-uskunalar</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>


                    <div class="col-span-12 sm:col-span-6 xxl:col-span-3 intro-y">
                        <div class="mini-report-chart box p-2 zoom-in" style="border-radius: 20px;">
                            <a href="{{ route('doktarantura.index') }}">
                                <div class="flex items-center pl-5"
                                    style="justify-content:left; align-items: center;  height: 100%; gap:20px;">
                                    <div class="flex" style="background: #FFF0F0; padding: 15px; border-radius: 100%;">
                                        <i data-feather="users" class="report-box__icon text-theme-3"
                                            style="color: #E64242;"></i>
                                    </div>
                                    <div class="w-2/4 flex-none">
                                        <div class="text-lg font-medium truncate" style="font-size: 28px;font-weight:600;">
                                            {{ $doktarantura_count }}
                                            {{-- /{{ $doktarantura_expert }} --}}
                                        </div>
                                        <div class="text-gray-600 mt-1" style="font-size: 16px;">Ilmiy izlanuvchilar</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>


                </div>
            </div>
            {{-- <table class="table table-report -mt-2">
                <thead>
                    <tr>
                        <th class="whitespace-no-wrap" style="width: 40px;">№</th>
                        <th class="whitespace-no-wrap">Tashkilot Nomi</th>
                        <th class="whitespace-no-wrap">Turi</th>
                        <th class="whitespace-no-wrap text-center">Harakat</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tashkilotlar as $tashkilots)

                    <tr class="intro-x">
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            <a href="#" class="font-medium">{{ $tashkilots->name }}</a>
                        </td>
                        <td>
                            {{ $tashkilots->tashkilot_turi == 'itm' ? 'ITM' : ($tashkilots->tashkilot_turi == 'otm' ? 'OTM'
                            :'Boshqa') }}
                        </td>
                        <td class="table-report__action w-56">
                            <div class="flex justify-center items-center">

                                <a class="flex science-update-action items-center mr-3"
                                    href="{{ route('tashkilot.show', ['tashkilot' => $tashkilots->id]) }}" data-id="2978"
                                    data-name="sdfd" data-file="/files/papers/4735cda0-a7a3-4a45-bd93-0bc013b857dc.png"
                                    data-filename="Screenshot from 2023-04-17 16-23-56.png" data-type="66" data-date="None"
                                    data-doi="" data-publisher="" data-description="None" data-authors-count="None"
                                    data-toggle="modal" data-target="#science-paper-update-modal">
                                    <i data-feather="eye" class="feather feather-check-square w-4 h-4 mr-1"></i>
                                    Ko'rish
                                </a>

                                <form action="{{ route('tashkilot.destroy', ['tashkilot' => $tashkilots->id]) }}"
                                    method="post" onsubmit="return confirm(' Rostan Ochirishni hohlaysizmi?');">
                                    <button type="submit" class="flex delete-action items-center text-theme-6">
                                        @csrf
                                        @method('DELETE')
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                            fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" class="feather feather-trash-2 w-4 h-4 mr-1">
                                            <polyline points="3 6 5 6 21 6"></polyline>
                                            <path
                                                d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                            </path>
                                            <line x1="10" y1="11" x2="10" y2="17"></line>
                                            <line x1="14" y1="11" x2="14" y2="17"></line>
                                        </svg>
                                        O'chirish
                                    </button>
                                </form>
                                <form action="{{ route('xodimlar.deleteAll', ['tashkilot' => $tashkilots->id]) }}"
                                    method="post" onsubmit="return confirm(' Rostan Ochirishni hohlaysizmi?');">
                                    <button type="submit" class="flex delete-action items-center text-theme-6">
                                        @csrf
                                        @method('DELETE')
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                            fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" class="feather feather-trash-2 w-4 h-4 mr-1">
                                            <polyline points="3 6 5 6 21 6"></polyline>
                                            <path
                                                d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                            </path>
                                            <line x1="10" y1="11" x2="10" y2="17"></line>
                                            <line x1="14" y1="11" x2="14" y2="17"></line>
                                        </svg>
                                        Xodimlar o'chirish
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table> --}}
            {{-- <div class="intro-y flex flex-wrap sm:flex-row sm:flex-no-wrap items-center mt-3">
                {{ $tashkilotlar->appends(request()->query())->links() }}
            </div> --}}
        </div>

        <div class="col-span-12 mt-2 " style="background: white; border-radius: 10px;">
            <div class="intro-y block sm:flex items-center py-4">
                <h2 class="text-lg font-medium truncate ml-4" style="font-size: 24px;font-weight:500;">
                    Tashkilotlar kesimida
                </h2>
            </div>
            <div class="intro-y overflow-auto lg:overflow-visible mt-8 sm:mt-0">
                <table class="table">
                    <thead style="background: #F4F8FC;">
                        <tr>
                            <th class="whitespace-no-wrap">T/r</th>
                            <th class="whitespace-no-wrap">Tashkilot nomi</th>
                            <th class="whitespace-no-wrap" style="text-align: center;">Ilmiy loyihalar</th>
                            <th class="whitespace-no-wrap" style="text-align: center;">Ilmiy stajirovka</th>
                            <th class="whitespace-no-wrap" style="text-align: center;">Asbob-uskunalar</th>
                            <th class="whitespace-no-wrap" style="text-align: center;">Ilmiy izlanuvchilar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tashkilotlar as $region)
                            <tr style="border-bottom: 1px solid #E6E6E6;">
                                <td style="text-align: center;">
                                    {{  ($tashkilotlar->currentPage() - 1) * $tashkilotlar->perPage() + $loop->iteration }}</td>
                                <td style="color:#1881D3; font-weight: 400;">
                                    <a href="{{ route('tashkilotmalumotlar.show', $region->id) }}">{{ $region->name }}</a>
                                </td>
                                <td style="text-align: center;">{{ $region->ilmiyloyhalar()->where('is_active', 1)->count() }}
                                </td>
                                <td style="text-align: center;">{{ $region->stajirovkalar()->count() }}</td>
                                <td style="text-align: center;">{{ $region->asbobuskunalar()->where('is_active', 1)->count() }}
                                </td>
                                <td style="text-align: center;">{{ $region->doktaranturalar()->count() }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="intro-y flex flex-wrap sm:flex-row sm:flex-no-wrap mb-3 items-center mt-3">
                {{ $tashkilotlar->appends(request()->query())->links() }}
            </div>
        </div>




    </div>


    <div class="modal" id="science-paper-create-modal">
        <div class="modal__content modal__content--xl">
            <div class="p-5">

                <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2">
                    <div class="w-full mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                        <form id="science-paper-create-form" method="POST" action="{{ route('import') }}"
                            class="validate-form" enctype="multipart/form-data" novalidate="novalidate">
                            @csrf
                            <div class="grid grid-cols-12 gap-2">

                                <div class="w-full col-span-12">

                                    <label class="flex flex-col sm:flex-row"> <span
                                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Excle yuklash uchun shu
                                        shablonday bo'lishi shart yoki xato berdi.
                                    </label><br>
                                    <a href="/admin/shablon-xodim.xlsx" form="science-paper-create-form"
                                        class="input w-full mt-2 button w-24 bg-theme-1 text-white">
                                        Shablon yuklab olish
                                    </a>

                                </div>
                                <div class="w-full col-span-12">


                                    <label class="flex flex-col sm:flex-row"> <span
                                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Excel yuklash
                                    </label>
                                    <input type="file" name="file" style="padding-left: 0" class="input w-full mt-2"
                                        required="">

                                </div>

                            </div>
                        </form>
                    </div>
                </div>


            </div>
            <div class="px-5 pb-5 text-center mt-4">


                <button type="button" data-dismiss="modal" class="button delete-cancel w-32 border text-gray-700 mr-1">
                    Bekor qilish
                </button>
                <button type="submit" form="science-paper-create-form"
                    class="update-confirm button w-24 bg-theme-1 text-white">
                    Qo'shish
                </button>
            </div>
        </div>
    </div>
@endsection
