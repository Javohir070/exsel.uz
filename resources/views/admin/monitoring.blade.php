@extends('layouts.admin')
@section('content')
    @role(['super-admin', 'Xujalik_shartnomalari', 'Ilmiy_loyiha_rahbari', 'Ekspert'])
        <div class="grid grid-cols-12 gap-6">
            <div class="col-span-12 xxl:col-span-12 grid grid-cols-12 gap-6">
                <div class="col-span-12 mt-8">
                    {{-- <div class="intro-y flex items-center h-10"> --}}
                        {{-- <h2 class="text-lg font-medium truncate mr-5">
                            Monitoring
                        </h2> --}}
                        <!-- <a href="" class="ml-auto flex text-theme-1"> <i data-feather="refresh-ccw" class="w-4 h-4 mr-3"></i>
                            Ma'lumotlarni qayta yuklash </a> -->
                    {{-- </div> --}}

                    <div class="grid grid-cols-12 gap-6 mt-5">

                            {{-- <div class="col-span-12 sm:col-span-6 xl:col-span-4 intro-y">
                                <a href="{{ route('ilmiyloyihalar.index') }}">
                                    <div class="report-box zoom-in">
                                        <div class="box p-5">
                                            <div class="flex">
                                                <i data-feather="file-text" class="report-box__icon text-theme-3"></i>
                                            </div>
                                            <div class="text-3xl font-bold leading-8 mt-6">449/{{ $loy_expert }}</div>
                                            <div class="text-base text-gray-600 mt-1">Ilmiy loyhalar</div>
                                        </div>
                                    </div>
                                </a>
                            </div> --}}
                            <style>
                                .report-box__icon{
                                    width: 32px;
                                    height: 32px;
                                }
                            </style>

                            <div class="col-span-12 sm:col-span-6 xxl:col-span-3 intro-y">
                                <div class="mini-report-chart box p-2 zoom-in" style="border-radius: 20px;">
                                    <a href="{{ route('ilmiyloyihalar.index') }}">
                                        <div class="flex items-center pl-5" style="justify-content:left; align-items: center;  height: 100%; gap:20px;">
                                            <div class="flex" style="background: #E4F0FB; padding: 15px; border-radius: 100%;">
                                                <i data-feather="list" class="report-box__icon text-theme-3" ></i>
                                            </div>
                                            <div class="w-2/4 flex-none">
                                                <div class="text-lg font-medium truncate" style="font-size: 28px;font-weight:600;">449/{{ $loy_expert }}</div>
                                                <div class="text-gray-600 mt-1" style="font-size: 16px;">Ilmiy loyihalar</div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>

                            {{-- <div class="col-span-12 sm:col-span-6 xl:col-span-4 intro-y">
                                <a href="{{ route('stajirovkalar.index') }}">
                                    <div class="report-box zoom-in">
                                        <div class="box p-5">
                                            <div class="flex">
                                                <i data-feather="file-text" class="report-box__icon text-theme-3"></i>
                                            </div>
                                            <div class="text-3xl font-bold leading-8 mt-6">{{ $stajirovka_count }}/{{ $stajirovka_expert }}</div>
                                            <div class="text-base text-gray-600 mt-1">Stajirovka</div>
                                        </div>
                                    </div>
                                </a>
                            </div> --}}

                            <div class="col-span-12 sm:col-span-6 xxl:col-span-3 intro-y">
                                <div class="mini-report-chart box p-2 zoom-in" style="border-radius: 20px;">
                                    <a href="{{ route('stajirovkalar.index') }}">
                                        <div class="flex items-center pl-5" style="justify-content:left; align-items: center;  height: 100%; gap:20px;">
                                            <div class="flex" style="background: #EBFBEB; padding: 15px; border-radius: 100%;">
                                                <i data-feather="git-pull-request" class="report-box__icon text-theme-3" style="color: #00A705;" ></i>
                                            </div>
                                            <div class="w-2/4 flex-none">
                                                <div class="text-lg font-medium truncate" style="font-size: 28px;font-weight:600;">{{ $stajirovka_count }}/{{ $stajirovka_expert }}</div>
                                                <div class="text-gray-600 mt-1" style="font-size: 16px;">Ilmiy Stajirovka</div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>

                            {{-- <div class="col-span-12 sm:col-span-6 xl:col-span-4 intro-y">
                                <a href="{{ route('asbobuskunalar.index') }}">
                                    <div class="report-box zoom-in">
                                        <div class="box p-5">
                                            <div class="flex">
                                                <i data-feather="file-text" class="report-box__icon text-theme-3"></i>
                                            </div>
                                            <div class="text-3xl font-bold leading-8 mt-6">{{ $asboblar_count }}/{{ $asboblar_expert }}</div>
                                            <div class="text-base text-gray-600 mt-1">Asbob-uskunalar</div>
                                        </div>
                                    </div>
                                </a>
                            </div> --}}

                            <div class="col-span-12 sm:col-span-6 xxl:col-span-3 intro-y">
                                <div class="mini-report-chart box p-2 zoom-in" style="border-radius: 20px;">
                                    <a href="{{ route('asbobuskunalar.index') }}">
                                        <div class="flex items-center pl-5" style="justify-content:left; align-items: center;  height: 100%; gap:20px;">
                                            <div class="flex" style="background: #FFF9EF; padding: 15px; border-radius: 100%;">
                                                <i data-feather="printer" class="report-box__icon text-theme-3" style="color: #E0B973;" ></i>
                                            </div>
                                            <div class="w-2/4 flex-none">
                                                <div class="text-lg font-medium truncate" style="font-size: 28px;font-weight:600;">{{ $asboblar_count }}/{{ $asboblar_expert }}</div>
                                                <div class="text-gray-600 mt-1" style="font-size: 16px;">Asbob-uskunalar</div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>

                            {{-- <div class="col-span-12 sm:col-span-6 xl:col-span-4 intro-y">
                                <a href="{{ route('doktarantura.index') }}">
                                    <div class="report-box zoom-in">
                                        <div class="box p-5">
                                            <div class="flex">
                                                <i data-feather="file-text" class="report-box__icon text-theme-3"></i>
                                            </div>
                                            <div class="text-3xl font-bold leading-8 mt-6">339/{{ $doktarantura_expert }}</div>
                                            <div class="text-base text-gray-600 mt-1">Doktarantura</div>
                                        </div>
                                    </div>
                                </a>
                            </div> --}}

                            <div class="col-span-12 sm:col-span-6 xxl:col-span-3 intro-y">
                                <div class="mini-report-chart box p-2 zoom-in" style="border-radius: 20px;">
                                    <a href="{{ route('doktarantura.index') }}">
                                        <div class="flex items-center pl-5" style="justify-content:left; align-items: center;  height: 100%; gap:20px;">
                                            <div class="flex" style="background: #FFF0F0; padding: 15px; border-radius: 100%;">
                                                <i data-feather="users" class="report-box__icon text-theme-3" style="color: #E64242;" ></i>
                                            </div>
                                            <div class="w-2/4 flex-none">
                                                <div class="text-lg font-medium truncate" style="font-size: 28px;font-weight:600;">239/{{ $doktarantura_expert }}</div>
                                                <div class="text-gray-600 mt-1" style="font-size: 16px;">Doktarantura</div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>


                            <div class="col-span-12 mt-2 " style="background: white; border-radius: 10px;">
                                <div class="intro-y block sm:flex items-center py-4">
                                    <h2 class="text-lg font-medium truncate ml-4" style="font-size: 24px;font-weight:500;">
                                        Hududlar kesimida
                                    </h2>
                                </div>
                                <div class="intro-y overflow-auto lg:overflow-visible mt-8 sm:mt-0">
                                    <table class="table">
                                        <thead style="background: #F4F8FC;">
                                            <tr>
                                                <th class="whitespace-no-wrap">Hudud nomi</th>
                                                <th class="whitespace-no-wrap">OTM</th>
                                                <th class="whitespace-no-wrap">ITM</th>
                                                <th class="whitespace-no-wrap">Loyihalar</th>
                                                <th class="whitespace-no-wrap">Yosh olimlar</th>
                                                <th class="whitespace-no-wrap">Asbob-uskunalar</th>
                                                <th class="whitespace-no-wrap">Xo‘jalik shartnomalar</th>
                                                <th class="whitespace-no-wrap">Laboratoriyalar</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($regions as $region)
                                            <tr style="border-bottom: 1px solid #E6E6E6;">
                                                <td style="color:#1881D3; font-weight: 400;">
                                                    <a href="{{ route('search', ['query' => $region->id]) }}">
                                                        {{ $region->oz }}
                                                    </a>
                                                </td>
                                                <td>{{ $region->tashkilots()->where('tashkilot_turi', 'otm')->count() }} ta</td>
                                                <td>{{ $region->tashkilots()->where('tashkilot_turi', 'itm')->count() }} ta</td>
                                                <td>{{ $region->tashkilots()->withCount('ilmiyloyhalar')->get()->sum('ilmiyloyhalar_count') }} ta</td>
                                                <td>{{ $region->tashkilots()->withCount('stajirovkalar')->get()->sum('stajirovkalar_count') }} ta</td>
                                                <td>{{ $region->tashkilots()->withCount('asbobuskunalar')->get()->sum('asbobuskunalar_count') }} ta</td>
                                                <td>{{ $region->tashkilots()->withCount('xujaliklar')->get()->sum('xujaliklar_count') }} ta</td>
                                                <td>{{ $region->tashkilots()->withCount('laboratorys')->get()->sum('laboratorys_count') }} ta</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

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
                                                <th class="whitespace-no-wrap">Tashkilot nomi</th>
                                                <th class="whitespace-no-wrap">Loyihalar</th>
                                                <th class="whitespace-no-wrap">Xo‘jalik shartnomalar</th>
                                                <th class="whitespace-no-wrap">Fakultetlar</th>
                                                <th class="whitespace-no-wrap">Kafedralar</th>
                                                <th class="whitespace-no-wrap">Laboratoriyalar</th>
                                                <th class="whitespace-no-wrap">Yosh olimlar</th>
                                                <th class="whitespace-no-wrap">Asbob-uskunalar</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($tashkilotlar as $region)
                                            <tr style="border-bottom: 1px solid #E6E6E6;">
                                                <td style="color:#1881D3; font-weight: 400;">
                                                  <a href="{{ route('tashkilotmalumotlar.show', $region->id) }}">{{ $region->name }}</a>
                                                </td>
                                                <td>{{ $region->ilmiyloyhalar()->count() }} ta</td>
                                                <td>{{ $region->xujaliklar()->count() }} ta</td>
                                                <td>{{ $region->fakultetlar()->count() }} ta</td>
                                                <td>{{ $region->kafedralar()->count() }} ta</td>
                                                <td>{{ $region->laboratorys()->count() }} ta</td>
                                                <td>{{ $region->stajirovkalar()->count() }} ta</td>
                                                <td>{{ $region->asbobuskunalar()->count() }} ta</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="intro-y flex flex-wrap sm:flex-row sm:flex-no-wrap mb-3 items-center mt-3">
                                    {{ $tashkilotlar->links() }}
                                    <select class="w-20 input box mt-3 sm:mt-0">
                                        <option>10</option>
                                        <option>25</option>
                                        <option>35</option>
                                        <option>50</option>
                                    </select>
                                </div>
                            </div>

                    </div>
                </div>
            </div>
        </div>
    @endrole
@endsection
