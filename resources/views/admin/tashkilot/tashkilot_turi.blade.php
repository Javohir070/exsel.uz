@extends('layouts.admin')
@section('content')
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12 xxl:col-span-12 grid grid-cols-12 gap-6">
            <div class="col-span-12 mt-8">

                <div class="grid grid-cols-12 gap-6 mt-0">
                    <style>
                        .report-box__icon {
                            width: 32px;
                            height: 32px;
                        }
                    </style>

                    <div class="col-span-12 sm:col-span-6 xxl:col-span-3 intro-y">
                        <div class="mini-report-chart box p-2 zoom-in" style="border-radius: 20px;">
                            <a href="#">
                                <div class="flex items-center pl-5"
                                    style="justify-content:left; align-items: center;  height: 100%; gap:20px;">
                                    <div class="flex" style="background: #E4F0FB; padding: 15px; border-radius: 100%;">
                                        <i data-feather="list" class="report-box__icon text-theme-3"></i>
                                    </div>
                                    <div class="w-2/4 flex-none">
                                        <div class="text-lg font-medium truncate" style="font-size: 28px;font-weight:600;">
                                            {{ $tashkilotlar }}
                                        </div>
                                        <div class="text-gray-600 mt-1" style="font-size: 16px;">Tashkilotlar</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

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
                                            {{ $loy_count }}/{{ $loy_expert }}
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
                                            {{ $stajirovka_count }}/{{ $stajirovka_expert }}
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
                                            {{ $asboblar_count }}/{{ $asboblar_expert }}
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
                                            {{ $doktarantura }}/{{ $doktarantura_expert }}
                                        </div>
                                        <div class="text-gray-600 mt-1" style="font-size: 16px;">Ilmiy izlanuvchilar</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-span-12 mt-2 " style="background: white; border-radius: 10px;">
                        <div class="intro-y block sm:flex items-center py-4" style="justify-content: space-between;">
                            <h2 class="text-lg font-medium truncate ml-4" style="font-size: 24px;font-weight:500;">
                                {{ $regions->oz }}
                            </h2>
                            <a href="{{ route("monitoring.index") }}" class="button w-24 bg-theme-1 text-white mr-4">
                                Orqaga
                            </a>
                        </div>
                        <div class="intro-y overflow-auto lg:overflow-visible mt-8 sm:mt-0">
                            <table class="table">
                                <thead style="background: #F4F8FC;">
                                    <tr>
                                        <th class="whitespace-no-wrap">Tashkilot turi</th>
                                        <th class="whitespace-no-wrap" style="text-align: center;">Jami</th>
                                        <th class="whitespace-no-wrap" style="text-align: center;">Ilmiy loyihalar</th>
                                        <th class="whitespace-no-wrap" style="text-align: center;">Ilmiy stajirovka</th>
                                        <th class="whitespace-no-wrap" style="text-align: center;">Asbob-uskunalar</th>
                                        <th class="whitespace-no-wrap" style="text-align: center;">Ilmiy izlanuvchilar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td style="color:#1881D3; font-weight: 400;">
                                            <a href="">OTM</a>
                                        </td>
                                        <td style="text-align: center;">
                                            {{ $regions->tashkilots()->where('status', 1)->where('tashkilot_turi', 'otm')->count() }}
                                        </td>
                                        <td style="text-align: center;">{{ $results['otm']['ilmiyloyhalar'] }}</td>
                                        <td style="text-align: center;">{{ $results['otm']['stajirovkalar'] }}</td>
                                        <td style="text-align: center;">{{ $results['otm']['asbobuskunalar'] }}</td>
                                        <td style="text-align: center;">{{ $results['otm']['doktarantura'] }}</td>
                                    </tr>
                                    <tr>
                                        <td style="color:#1881D3; font-weight: 400;">
                                            <a href=""> Ilmiy
                                                tashkilotlar</a>
                                        </td>
                                        <td style="text-align: center;">
                                            {{ $regions->tashkilots()->where('status', 1)->where('tashkilot_turi', 'itm')->count() }}
                                        </td>
                                        <td style="text-align: center;">{{ $results['itm']['ilmiyloyhalar'] }}</td>
                                        <td style="text-align: center;">{{ $results['itm']['stajirovkalar'] }}</td>
                                        <td style="text-align: center;">{{ $results['itm']['asbobuskunalar'] }}</td>
                                        <td style="text-align: center;">{{ $results['itm']['doktarantura'] }}</td>
                                    </tr>
                                    <tr>
                                        <td style="color:#1881D3; font-weight: 400;">
                                            <a href="">Boshqa
                                                tashkilotlar</a>
                                        </td>
                                        <td style="text-align: center;">
                                            {{ $regions->tashkilots()->where('status', 1)->where('tashkilot_turi', 'boshqa')->count() }}
                                        </td>
                                        <td style="text-align: center;">{{ $results['other']['ilmiyloyhalar'] }}</td>
                                        <td style="text-align: center;">{{ $results['other']['stajirovkalar'] }}</td>
                                        <td style="text-align: center;">{{ $results['other']['asbobuskunalar'] }}</td>
                                        <td style="text-align: center;">{{ $results['other']['doktarantura'] }}</td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
