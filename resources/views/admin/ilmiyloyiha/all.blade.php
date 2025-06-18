@extends('layouts.admin')

@section('content')

    <div class="content">
        <div class="flex justify-between align-center mt-6 mb-6">

            <h2 class="intro-y text-lg font-medium"> {{ $tashkilot->name ?? "Ilmiy loyihalar" }}</h2>

            <div class="flex justify-between align-center ">
                <div>
                    <a href="{{ route('exportilmiy') }}" class="button box flex items-center text-gray-700">
                        <i data-feather="file-text" class="hidden sm:block w-4 h-4 mr-2"></i> Export to Excel
                    </a>
                </div>
            </div>

        </div>

        <form id="science-paper-create-form" method="GET" action="{{ route('ilmiy_loyihalar_all.index') }}"
            class="validate-form">
            <div class="flex justify-between align-center gap-6 flex-wrap">

                {{-- Qidiruv --}}
                <div class="relative text-gray-700">
                    <input type="text" name="search" value="{{ request('search') }}"
                        class="input input--lg w-full lg:w-64 box pr-10 placeholder-theme-13" placeholder="Qidiruv...">
                    <i data-feather="search"
                        class="feather feather-search w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0"></i>
                </div>

                {{-- Loyiha rahbari --}}
                <div class="relative text-gray-700">
                    <input type="text" name="rahbar_name" value="{{ request('rahbar_name') }}"
                        class="input input--lg w-full lg:w-64 box pr-10 placeholder-theme-13"
                        placeholder="Loyiha rahbari...">
                    <i data-feather="search"
                        class="feather feather-search w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0"></i>
                </div>

                {{-- OTM/ITM/Boshqa --}}
                <div class="relative text-gray-700">
                    <select name="status" class="input input--lg box w-full lg:w-auto mt-3 lg:mt-0 ml-auto">
                        <option value="">Status</option>
                        <option value="all" @selected(request('status') === 'all')>Barchasi</option>
                        <option value="Jarayonda" @selected(request('status') === 'Jarayonda')>Jarayonda</option>
                        <option value="Yakunlangan" @selected(request('status') === 'Yakunlangan')>Yakunlangan</option>
                    </select>
                </div>

                {{-- Viloyatlar --}}
                <div class="relative text-gray-700">
                    <select name="region_id" class="input input--lg box w-full lg:w-auto mt-3 lg:mt-0 ml-auto">
                        <option value="">Viloyatlari</option>
                        <option value="all" @selected(request('region_id') === 'all')>Barchasi</option>
                        @foreach ($regions as $v)
                            <option value="{{ $v->id }}" @selected(request('region_id') == $v->id)>
                                {{ $v->oz }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Loyiha turi --}}
                <div class="relative text-gray-700">
                    <select name="type" class="input input--lg box w-full lg:w-auto mt-3 lg:mt-0 ml-auto">
                        <option value="">Loyiha turi</option>
                        <option value="all" @selected(request('type') === 'all')>Barchasi</option>
                        <option value="Amaliy" @selected(request('type') === 'Amaliy')>Amaliy</option>
                        <option value="Fundamental" @selected(request('type') === 'Fundamental')>Fundamental</option>
                        <option value="Innovatsion" @selected(request('type') === 'Innovatsion')>Innovatsion</option>
                        <option value="Tajriba-konstruktorlik" @selected(request('type') === 'Tajriba-konstruktorlik')>
                            Tajriba-konstruktorlik
                        </option>
                    </select>
                </div>

                {{-- Izlash tugmasi --}}
                <button type="submit" class="update-confirm button w-24 bg-theme-1 text-white">
                    Izlash
                </button>

            </div>
        </form>


        @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif

        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <table class="table table-report -mt-2">
                <thead>
                    <tr>
                        <th class="whitespace-no-wrap">№</th>
                        <th class="whitespace-no-wrap">Loyiha mavzusi</th>
                        <th class="whitespace-no-wrap">Loyiha rahbari F.I.Sh</th>
                        <th class="whitespace-no-wrap">Raqami</th>
                        <th class="whitespace-no-wrap">Status</th>
                        <th class="whitespace-no-wrap">Holati</th>
                        <th class="whitespace-no-wrap text-center">Harakat</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($ilmiyloyihalar as $xodimlar)

                        <tr class="intro-x">
                            <td>{{ ($ilmiyloyihalar->currentPage() - 1) * $ilmiyloyihalar->perPage() + $loop->iteration }}</td>
                            <td>
                                {{ $xodimlar->mavzusi  }}
                            </td>
                            <td>
                                {{ $xodimlar->rahbar_name }}
                            </td>
                            <td>
                                {{ $xodimlar->raqami }}
                            </td>
                            <td
                                style="color: {{ ($h = $xodimlar->tekshirivchilars()->where('is_active', 1)->first()->status ?? null) == 'Qoniqarli' ? 'green' : ($h == 'Qoniqarsiz' ? 'blue' : 'red') }}">
                                {{ $xodimlar->tekshirivchilars()->where('is_active', 1)->first()->status ?? "Tasdiqlanmagan" }}
                            </td>
                            <td
                                style="color: {{ ($h = $xodimlar->tekshirivchilars()->where('is_active', 1)->first()->holati ?? null) == 'Tasdiqlandi' ? 'green' : ($h == 'yuborildi' ? 'blue' : 'red') }}">
                                {{ $h == 'yuborildi' ? "Tasdiqlash uchun yuborildi" : ($h == null ? "Ko'rilmagan" : $h) }}
                            </td>
                            <td class="table-report__action w-56">

                                <div class="flex justify-center items-center">
                                    <a class="flex science-update-action items-center mr-3"
                                        href="{{ route('ilmiyloyiha.show', ['ilmiyloyiha' => $xodimlar->id]) }}">
                                        <i data-feather="eye" class="feather feather-check-square w-4 h-4 mr-1"></i>
                                        Ko'rish
                                    </a>
                                    @role('super-admin')
                                    <form action="{{ route('ilmiyloyiha.destroy', ['ilmiyloyiha' => $xodimlar->id]) }}"
                                        method="post" onsubmit="return confirm(' Rostan Ochirishni hohlaysizmi?');">
                                        <button type="submit" class="flex delete-action items-center text-theme-6">
                                            @csrf
                                            @method("DELETE")
                                            <i data-feather="trash-2" class="feather feather-check-square w-4 h-4 mr-1"></i>
                                            O'chirish
                                        </button>
                                    </form>
                                    @endrole
                                </div>

                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

        <div class="intro-y flex flex-wrap sm:flex-row sm:flex-no-wrap items-center mt-3">
            {{$ilmiyloyihalar->appends(request()->query())->links()}}
            <form id="science-paper-create-form" method="GET" action="{{ route('ilmiy_loyihalar_all.index') }}"
                class="validate-form">
                <select class="w-20 input box mt-3 sm:mt-0" name="page_size" onchange="this.form.submit()">
                    <option @selected(request("page_size") === '20')>20</option>
                    <option @selected(request("page_size") === '25')>25</option>
                    <option @selected(request("page_size") === '35')>35</option>
                    <option @selected(request("page_size") === '50')>50</option>
                </select>
            </form>
        </div>
        
        {{-- ilmiy loyiha emport qilish excel --}}
        {{-- <div class="modal" id="science-paper-create-modal">
            <div class="modal__content modal__content--xl">

                <div class="p-5">
                    <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2">
                        <div class="w-full mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                            <form id="science-paper-create-form" method="POST" action="{{ route('IlmiyLoyiha_import') }}"
                                class="validate-form" enctype="multipart/form-data" novalidate="novalidate">
                                @csrf
                                <div class="grid grid-cols-12 gap-2">

                                    <div class="w-full col-span-12">
                                        <label class="flex flex-col sm:flex-row"> <span
                                                class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Excle yuklash uchun
                                            shu
                                            shablonday bo'lishi shart yoki xato berdi.
                                        </label><br>
                                        <a href="#" form="science-paper-create-form"
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
        </div> --}}

@endsection
