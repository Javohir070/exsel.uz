@extends('layouts.admin')

@section('content')

    <div class="content">
        <div class="flex justify-between align-center mt-6 mb-6">

            <h2 class="intro-y text-lg font-medium">{{ $tashkilot->name ?? "Asbob-uskunalar" }}</h2>

            <div class="flex justify-between align-center ">
                <div>
                    <a href="{{ route('export.asbobuskunalar') }}" class="button box flex items-center text-gray-700">
                        <i data-feather="file-text" class="hidden sm:block w-4 h-4 mr-2"></i> Export to Excel
                    </a>
                </div>
            </div>

        </div>

        <form id="science-paper-create-form" method="GET" action="{{ route('asbobuskunas_all.index') }}"
            class="validate-form">
            <div class="flex justify-between align-center gap-6 flex-wrap">

                <div class="relative text-gray-700">
                    <input type="text" name="search" value="{{ request('search') }}"
                        class="input input--lg w-full lg:w-64 box pr-10 placeholder-theme-13" placeholder="Qidiruv...">
                    <i data-feather="search"
                        class="feather feather-search w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0"></i>
                </div>

                <div class="relative text-gray-700">
                    <input type="text" name="rahbar_name" value="{{ request('rahbar_name') }}"
                        class="input input--lg w-full lg:w-64 box pr-10 placeholder-theme-13"
                        placeholder="Loyiha rahbari...">
                    <i data-feather="search"
                        class="feather feather-search w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0"></i>
                </div>

                <div class="relative text-gray-700">
                    <select name="status" class="input input--lg box w-full lg:w-auto mt-3 lg:mt-0 ml-auto">
                        <option value="">Status</option>
                        <option value="all" @selected(request('status') === 'all')>Barchasi</option>
                        <option value="Jarayonda" @selected(request('status') === 'Jarayonda')>Jarayonda</option>
                        <option value="Yakunlangan" @selected(request('status') === 'Yakunlangan')>Yakunlangan</option>
                    </select>
                </div>

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

                    <select name="turi" value="{{old('turi')}}" class="input border w-full mt-2">

                        <option value=""></option>

                        <option value="Umumiy laboratoriya">Umumiy laboratoriya</option>

                        <option value="O'lchash asbob-uskunasi">O'lchash asbob-uskunasi</option>

                        <option value="Ixtisoslashtirilgan asbob-uskunasi">Ixtisoslashtirilgan asbob-uskunasi</option>

                        <option value="Sinov asbob-uskunasi">Sinov asbob-uskunasi</option>

                        <option value="Analitik asbob-uskunasi">Analitik asbob-uskunasi</option>

                        <option value="ORG texnika">ORG texnika</option>

                    </select>
                </div>

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
                        <th class="whitespace-no-wrap">Asbob-uskuna nomi</th>
                        <th class="whitespace-no-wrap">Moliyalashtirish manbasi</th>
                        <th class="whitespace-no-wrap">Summasi </th>
                        <th class="whitespace-no-wrap">Ishlab chiqarilgan yil </th>
                        <th class="whitespace-no-wrap text-center">Harakat</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($asbobuskunas as $k)

                        <tr class="intro-x">
                            <td>{{ ($asbobuskunas->currentPage() - 1) * $asbobuskunas->perPage() + $loop->iteration }}.</td>
                            <td>
                                <a href="{{ route('asbobuskuna.show', ['asbobuskuna' => $k->id]) }}"
                                    class="font-medium ">{{ $k->name  }} </a>
                            </td>
                            <td>
                                {{ $k->moliya_manbasi  }}
                            </td>
                            <td>
                                {{ $k->harid_summa }}
                            </td>
                            <td style="text-align: center;">
                                {{ $k->ishlabchiq_yil }}
                            </td>

                            <td class="table-report__action w-56">
                                <div class="flex justify-center items-center">

                                    <a class="flex science-update-action items-center mr-3"
                                        href="{{ route('asbobuskuna.show', ['asbobuskuna' => $k->id]) }}">
                                        <i data-feather="eye" class="feather feather-check-square w-4 h-4 mr-1"></i>
                                        Ko'rish
                                    </a>
                                    <form action="{{ route('asbobuskuna.destroy', ['asbobuskuna' => $k->id]) }}" method="post"
                                        onsubmit="return confirm(' Rostan Ochirishni hohlaysizmi?');">
                                        <button type="submit" class="flex delete-action items-center text-theme-6">
                                            @csrf
                                            @method("DELETE")
                                            <i data-feather="trash-2" class="feather feather-check-square w-4 h-4 mr-1"></i>
                                            O'chirish
                                        </button>
                                    </form>

                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">Ma'lumotlar mavjud emas</td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
        </div>

        <div class="intro-y flex flex-wrap sm:flex-row sm:flex-no-wrap items-center mt-3">
            {{$asbobuskunas->appends(request()->query())->links()}}
            <form id="science-paper-create-form" method="GET" action="{{ route('asbobuskunas_all.index') }}"
                class="validate-form">
                <select class="w-20 input box mt-3 sm:mt-0" name="page_size" onchange="this.form.submit()">
                    <option @selected(request("page_size") === '20')>20</option>
                    <option @selected(request("page_size") === '25')>25</option>
                    <option @selected(request("page_size") === '35')>35</option>
                    <option @selected(request("page_size") === '50')>50</option>
                </select>
            </form>
        </div>

    </div>

@endsection
