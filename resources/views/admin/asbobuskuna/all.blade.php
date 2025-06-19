@extends('layouts.admin')

@section('content')

    <div class="content">
        <div class="flex justify-between align-center mt-6 ">

            <h2 class="intro-y text-lg font-medium">{{ $tashkilot->name ?? "Asbob-uskunalar" }}</h2>

            <div class="flex justify-between align-center ">
                <div>
                    <a href="{{ route('export.asbobuskunalar') }}" class="button box flex items-center text-gray-700">
                        <i data-feather="file-text" class="hidden sm:block w-4 h-4 mr-2"></i> Export to Excel
                    </a>
                </div>
            </div>

        </div>

        <div class="col-span-12 xxl:col-span-12 grid grid-cols-12 gap-6 mb-4 mt-2 pt-2">

            <div class="col-span-3 mt-2">
                <div class="col-span-12 sm:col-span-6 xxl:col-span-3 intro-y">
                    <div class="mini-report-chart box p-2 zoom-in" style="border-radius: 20px;">
                        <div class="flex items-center pl-5"
                            style="justify-content:left; align-items: center;  height: 100%; gap:20px;">
                            <div class="flex" style="background: #FFF0F0; padding: 15px; border-radius: 100%;">
                                <i data-feather="printer" class="report-box__icon text-theme-3" style="color: #E64242;"></i>
                            </div>
                            <div class="w-2/4 flex-none">
                                <div class="text-lg font-medium truncate" style="font-size: 28px;font-weight:600;">
                                    {{ $asbobuskuna_count }}
                                </div>
                                <div class="text-gray-600 mt-1" style="font-size: 16px;">Jami</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-span-3 mt-2">
                <div class="col-span-12 sm:col-span-6 xxl:col-span-3 intro-y">
                    <div class="mini-report-chart box p-2 zoom-in" style="border-radius: 20px;">
                        <div class="flex items-center pl-5"
                            style="justify-content:left; align-items: center;  height: 100%; gap:20px;">
                            <div class="flex" style="background: #FFF0F0; padding: 15px; border-radius: 100%;">
                                <i data-feather="printer" class="report-box__icon text-theme-3" style="color: #E64242;"></i>
                            </div>
                            <div class="w-2/4 flex-none">
                                <div class="text-lg font-medium truncate" style="font-size: 28px;font-weight:600;">
                                    {{ $moliya_institut }}
                                </div>
                                <div class="text-gray-600 mt-1" style="font-size: 16px;">Moliya institutlari</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-span-3 mt-2">
                <div class="col-span-12 sm:col-span-6 xxl:col-span-3 intro-y">
                    <div class="mini-report-chart box p-2 zoom-in" style="border-radius: 20px;">
                        <div class="flex items-center pl-5"
                            style="justify-content:left; align-items: center;  height: 100%; gap:20px;">
                            <div class="flex" style="background: #FFF0F0; padding: 15px; border-radius: 100%;">
                                <i data-feather="printer" class="report-box__icon text-theme-3" style="color: #E64242;"></i>
                            </div>
                            <div class="w-2/4 flex-none">
                                <div class="text-lg font-medium truncate" style="font-size: 28px;font-weight:600;">
                                    {{ $homiylik }}
                                </div>
                                <div class="text-gray-600 mt-1" style="font-size: 16px;">Homiylik mablag‘lari</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="col-span-3 mt-2">
                <div class="col-span-12 sm:col-span-6 xxl:col-span-3 intro-y">
                    <div class="mini-report-chart box p-2 zoom-in" style="border-radius: 20px;">
                        <div class="flex items-center pl-5"
                            style="justify-content:left; align-items: center;  height: 100%; gap:20px;">
                            <div class="flex" style="background: #FFF0F0; padding: 15px; border-radius: 100%;">
                                <i data-feather="printer" class="report-box__icon text-theme-3" style="color: #E64242;"></i>
                            </div>
                            <div class="w-2/4 flex-none">
                                <div class="text-lg font-medium truncate" style="font-size: 28px;font-weight:600;">
                                    {{ $loyiha_doirasida }}
                                </div>
                                <div class="text-gray-600 mt-1" style="font-size: 16px;">Ilmiy loyiha doirasida</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-span-4 mt-2">
                <div class="col-span-12 sm:col-span-6 xxl:col-span-3 intro-y">
                    <div class="mini-report-chart box p-2 zoom-in" style="border-radius: 20px;">
                        <div class="flex items-center pl-5"
                            style="justify-content:left; align-items: center;  height: 100%; gap:20px;">
                            <div class="flex" style="background: #FFF0F0; padding: 15px; border-radius: 100%;">
                                <i data-feather="printer" class="report-box__icon text-theme-3" style="color: #E64242;"></i>
                            </div>
                            <div class="w-2/4 flex-none">
                                <div class="text-lg font-medium truncate" style="font-size: 28px;font-weight:600;">
                                    {{ $tash_byudjetdan }}
                                </div>
                                <div class="text-gray-600 mt-1" style="font-size: 16px;">Tashkilot byudjet mablag‘lari
                                    hisobidan</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-span-4 mt-2">
                <div class="col-span-12 sm:col-span-6 xxl:col-span-3 intro-y">
                    <div class="mini-report-chart box p-2 zoom-in" style="border-radius: 20px;">
                        <div class="flex items-center pl-5"
                            style="justify-content:left; align-items: center;  height: 100%; gap:20px;">
                            <div class="flex" style="background: #FFF0F0; padding: 15px; border-radius: 100%;">
                                <i data-feather="printer" class="report-box__icon text-theme-3" style="color: #E64242;"></i>
                            </div>
                            <div class="w-2/4 flex-none">
                                <div class="text-lg font-medium truncate" style="font-size: 28px;font-weight:600;">
                                    {{ $ilm_fan }}
                                </div>
                                <div class="text-gray-600 mt-1" style="font-size: 16px;">IIlm-fanni moliyalashtirish va
                                    innovatsiyalarni qo‘llab-quvvatlash jamg‘armasi</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-span-4 mt-2">
                <div class="col-span-12 sm:col-span-4 xxl:col-span-3 intro-y">
                    <div class="mini-report-chart box p-2 zoom-in" style="border-radius: 20px;">
                        <div class="flex items-center pl-5"
                            style="justify-content:left; align-items: center;  height: 100%; gap:20px;">
                            <div class="flex" style="background: #FFF0F0; padding: 15px; border-radius: 100%;">
                                <i data-feather="printer" class="report-box__icon text-theme-3" style="color: #E64242;"></i>
                            </div>
                            <div class="w-2/4 flex-none">
                                <div class="text-lg font-medium truncate" style="font-size: 28px;font-weight:600;">
                                    {{ $tash_byudjetdan_tashqari }}
                                </div>
                                <div class="text-gray-600 mt-1" style="font-size: 16px;">Tashkilotning byudjetdan tashqari
                                    mablag‘lari hisobidan</div>
                            </div>
                        </div>
                    </div>
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
                    <select name="moliya_manbasi" value="{{old('moliya_manbasi')}}" class="input border w-full mt-2">

                        <option value="">Moliyalashtirish manbasi</option>

                        <option value="all" @selected(request("moliya_manbasi") === 'all')>Barchasi</option>

                        <option value="Ilm-fanni moliyalashtirish va innovatsiyalarni qo‘llab-quvvatlash jamg‘armasi"
                            @selected(request("moliya_manbasi") === 'Ilm-fanni moliyalashtirish va innovatsiyalarni qo‘llab-quvvatlash jamg‘armasi')>
                            Ilm-fanni moliyalashtirish va innovatsiyalarni qo‘llab-quvvatlash jamg‘armasi</option>

                        <option value="Ilmiy loyiha doirasida" @selected(request("moliya_manbasi") === 'Ilmiy loyiha doirasida')>Ilmiy loyiha doirasida</option>

                        <option value="Tashkilot byudjet mablag‘lari hisobidan"
                            @selected(request("moliya_manbasi") === 'Tashkilot byudjet mablag‘lari hisobidan')>Tashkilot
                            byudjet mablag‘lari hisobidan
                        </option>

                        <option value="Tashkilotning byudjetdan tashqari mablag‘lari hisobidan" @selected(
                            request("moliya_manbasi") === 'Tashkilotning byudjetdan
                                                                                                                                tashqari mablag‘lari hisobidan'
                        )>Tashkilotning byudjetdan
                            tashqari mablag‘lari hisobidan</option>

                        <option value="Moliya institutlari" @selected(request("moliya_manbasi") === 'Moliya institutlari')>
                            Moliya institutlari</option>

                        <option value="Homiylik mablag‘lari" @selected(request("moliya_manbasi") === 'Homiylik mablag‘lari')>
                            Homiylik mablag‘lari</option>

                    </select>
                </div>

                <div class="relative text-gray-700">
                    <select name="turi" value="{{old('turi')}}" class="input border w-full mt-2">

                        <option value="">Turi</option>

                        <option value="all" @selected(request("turi") === 'all')>Barchasi</option>

                        <option value="Umumiy laboratoriya" @selected(request("turi") === 'Umumiy laboratoriya')>Umumiy
                            laboratoriya</option>

                        <option value="O'lchash asbob-uskunasi" @selected(request("turi") === 'O\'lchash asbob-uskunasi')>
                            O'lchash asbob-uskunasi</option>

                        <option value="Ixtisoslashtirilgan asbob-uskunasi" @selected(request("turi") === 'Ixtisoslashtirilgan asbob-uskunasi')>Ixtisoslashtirilgan asbob-uskunasi</option>

                        <option value="Sinov asbob-uskunasi" @selected(request("turi") === 'Sinov asbob-uskunasi')>Sinov
                            asbob-uskunasi</option>

                        <option value="Analitik asbob-uskunasi" @selected(request("turi") === 'Analitik asbob-uskunasi')>
                            Analitik asbob-uskunasi</option>

                        <option value="ORG texnika" @selected(request("turi") === 'ORG texnika')>ORG texnika</option>

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
                        <th class="whitespace-no-wrap">Turi </th>
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
                            <td>
                                {{ $k->turi }}
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
