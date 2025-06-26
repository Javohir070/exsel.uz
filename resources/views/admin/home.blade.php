@extends('layouts.admin')
@section('content')
    @role(['super-admin', 'Xujalik_shartnomalari', 'Ilmiy_loyiha_rahbari', "Ishchi guruh azosi", 'Ekspert', 'Rahbar'])
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12 xxl:col-span-12 grid grid-cols-12 gap-6">
            <div class="col-span-12 mt-8">
                <div class="intro-y flex items-center h-10">
                    <h2 class="text-lg font-medium truncate mr-5">
                        Tashkilot haqida qisqacha malumot
                    </h2>
                    <a href="/" class="ml-auto flex text-theme-1"> <i data-feather="refresh-ccw" class="w-4 h-4 mr-3"></i>
                        Ma'lumotlarni qayta yuklash </a>
                </div>

                <div class="grid grid-cols-12 gap-6 mt-5">
                    @role(['super-admin', 'Ekspert', "Ishchi guruh azosi", 'Rahbar'])

                    <div class="col-span-12 sm:col-span-6 xxl:col-span-3 intro-y">
                        <div class="mini-report-chart box p-2 zoom-in" style="border-radius: 20px;">
                            <a href="{{ route('tashkilotlar.index') }}">
                                <div class="flex items-center pl-5"
                                    style="justify-content:left; align-items: center;  height: 100%; gap:20px;">
                                    <div class="flex" style="background: #f1e6e6; padding: 15px; border-radius: 100%;">
                                        <i data-feather="file-text" class="report-box__icon text-theme-3"
                                            style="color: #303033;"></i>
                                    </div>
                                    <div class="w-2/4 flex-none">
                                        <div class="text-lg font-medium truncate" style="font-size: 28px;font-weight:600;">
                                            {{ $tash_count }}
                                        </div>
                                        <div class="text-gray-600 mt-1" style="font-size: 16px;">Tashkilotlar</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    {{-- <div class="col-span-12 sm:col-span-6 xxl:col-span-3 intro-y">
                        <div class="mini-report-chart box p-2 zoom-in" style="border-radius: 20px;">
                            <a href="{{ route('tashkilotlar.index') }}">
                                <div class="flex items-center pl-5"
                                    style="justify-content:left; align-items: center;  height: 100%; gap:20px;">
                                    <div class="flex" style="background: #f1e6e6; padding: 15px; border-radius: 100%;">
                                        <i data-feather="file-text" class="report-box__icon text-theme-3"
                                            style="color: #81105c;"></i>
                                    </div>
                                    <div class="w-2/4 flex-none">
                                        <div class="text-lg font-medium truncate" style="font-size: 28px;font-weight:600;">
                                            {{ $tash_count - $itm_count }}</div>
                                        <div class="text-gray-600 mt-1" style="font-size: 16px;">OTM</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-span-12 sm:col-span-6 xxl:col-span-3 intro-y">
                        <div class="mini-report-chart box p-2 zoom-in" style="border-radius: 20px;">
                            <a href="{{ route('tashkilotlar.index') }}">
                                <div class="flex items-center pl-5"
                                    style="justify-content:left; align-items: center;  height: 100%; gap:20px;">
                                    <div class="flex" style="background: #f1bdbd; padding: 15px; border-radius: 100%;">
                                        <i data-feather="file-text" class="report-box__icon text-theme-3"
                                            style="color: #3f7752;"></i>
                                    </div>
                                    <div class="w-2/4 flex-none">
                                        <div class="text-lg font-medium truncate" style="font-size: 28px;font-weight:600;">
                                            {{ $itm_count }}</div>
                                        <div class="text-gray-600 mt-1" style="font-size: 16px;">ITM</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div> --}}

                    {{-- <div class="col-span-12 sm:col-span-6 xxl:col-span-3 intro-y">
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
                                        </div>
                                        <div class="text-gray-600 mt-1" style="font-size: 16px;">Ilmiy loyihalar</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div> --}}

                    {{-- <div class="col-span-12 sm:col-span-6 xxl:col-span-3 intro-y">
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
                                        </div>
                                        <div class="text-gray-600 mt-1" style="font-size: 16px;">Ilmiy Stajirovka</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div> --}}
                    {{--
                    <div class="col-span-12 sm:col-span-6 xxl:col-span-3 intro-y">
                        <div class="mini-report-chart box p-2 zoom-in" style="border-radius: 20px;">
                            <a href="{{ route('asbobuskunalar.index') }}">
                                <div class="flex items-center pl-5"
                                    style="justify-content:left; align-items: center;  height: 100%; gap:20px;">
                                    <div class="flex" style="background: #FFF0F0; padding: 15px; border-radius: 100%;">
                                        <i data-feather="printer" class="report-box__icon text-theme-3"
                                            style="color: #E64242;"></i>
                                    </div>
                                    <div class="w-2/4 flex-none">
                                        <div class="text-lg font-medium truncate" style="font-size: 28px;font-weight:600;">
                                            {{ $asboblar_count }}
                                        </div>
                                        <div class="text-gray-600 mt-1" style="font-size: 16px;">Asbob-uskunalar</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div> --}}

                    <div class="col-span-12 sm:col-span-6 xxl:col-span-3 intro-y">
                        <div class="mini-report-chart box p-2 zoom-in" style="border-radius: 20px;">
                            <a href="{{ route('xodim.barchaXodimlar') }}">
                                <div class="flex items-center pl-5"
                                    style="justify-content:left; align-items: center;  height: 100%; gap:20px;">
                                    <div class="flex" style="background: #c8ecec; padding: 15px; border-radius: 100%;">
                                        <i data-feather="users" class="report-box__icon text-theme-3"
                                            style="color: #29ca67;"></i>
                                    </div>
                                    <div class="w-2/4 flex-none">

                                        <div class="text-lg font-medium truncate" style="font-size: 28px;font-weight:600;">
                                            {{ $xodim_count }}
                                        </div>
                                        <div class="text-gray-600 mt-1" style="font-size: 16px;">Xodimlar</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    {{--
                    <div class="col-span-12 sm:col-span-6 xxl:col-span-3 intro-y">
                        <div class="mini-report-chart box p-2 zoom-in" style="border-radius: 20px;">
                            <a href="{{ route('laboratoriyalari.index') }}">
                                <div class="flex items-center pl-5"
                                    style="justify-content:left; align-items: center;  height: 100%; gap:20px;">
                                    <div class="flex" style="background: #FFF0F0; padding: 15px; border-radius: 100%;">
                                        <i data-feather="thermometer" class="report-box__icon text-theme-3"
                                            style="color: #E64242;"></i>
                                    </div>
                                    <div class="w-2/4 flex-none">
                                        <div class="text-lg font-medium truncate" style="font-size: 28px;font-weight:600;">
                                            {{ $labaratoriyalar }}
                                        </div>
                                        <div class="text-gray-600 mt-1" style="font-size: 16px;">Laboratoriyalar</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div> --}}

                    @endrole
                    @role(['Xujalik_shartnomalari', 'super-admin', 'Ekspert', 'Ishchi guruh azosi', 'Rahbar'])

                    <div class="col-span-12 sm:col-span-6 xxl:col-span-3 intro-y">
                        <div class="mini-report-chart box p-2 zoom-in" style="border-radius: 20px;">
                            <a href="{{ route('xujaliklar.index') }}">
                                <div class="flex items-center pl-5"
                                    style="justify-content:left; align-items: center;  height: 100%; gap:20px;">
                                    <div class="flex" style="background: #FFF9EF; padding: 15px; border-radius: 100%;">
                                        <i data-feather="layers" class="report-box__icon text-theme-3"
                                            style="color: #E0B973;"></i>
                                    </div>
                                    <div class="w-2/4 flex-none">
                                        <div class="text-lg font-medium truncate" style="font-size: 28px;font-weight:600;">
                                            {{ $xujalik_count }}
                                        </div>
                                        <div class="text-gray-600 mt-1" style="font-size: 16px;">Xo'jalik shartnomalari
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    @endrole
                    @role(['Ilmiy_loyiha_rahbari'])
                    <div class="col-span-12 sm:col-span-6 xl:col-span-4 intro-y">
                        <a href="{{ route('scientific_project.index') }}">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="flex">
                                        <i data-feather="file-text" class="report-box__icon text-theme-3"></i>
                                    </div>
                                    <div class="text-3xl font-bold leading-8 mt-6">{{ $ilmiy_loyhalar_rahbariga }}</div>
                                    <div class="text-base text-gray-600 mt-1"> Ilmiy loyihalar </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endrole
                    @role(['super-admin'])

                    {{-- <div class="col-span-12 sm:col-span-6 xxl:col-span-3 intro-y">
                        <div class="mini-report-chart box p-2 zoom-in" style="border-radius: 20px;">
                            <a href="{{ url('users') }}">
                                <div class="flex items-center pl-5"
                                    style="justify-content:left; align-items: center;  height: 100%; gap:20px;">
                                    <div class="flex" style="background: #FFF9EF; padding: 15px; border-radius: 100%;">
                                        <i data-feather="users" class="report-box__icon text-theme-3"
                                            style="color: #E0B973;"></i>
                                    </div>
                                    <div class="w-2/4 flex-none">
                                        <div class="text-lg font-medium truncate" style="font-size: 28px;font-weight:600;">
                                            {{ $adminlar }}</div>
                                        <div class="text-gray-600 mt-1" style="font-size: 16px;">Adminlar</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div> --}}

                    {{-- xodimlar qancha kiritgani --}}
                    {{-- <div class="col-span-12 sm:col-span-6 xl:col-span-4 intro-y">
                        <a href="{{ route('tashkilotmalumotlar.index') }}">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="flex">
                                        <i data-feather="bar-chart-2" class="report-box__icon text-theme-9"></i>
                                    </div>
                                    <div class="text-3xl font-bold leading-8 mt-6">{{ $tash_count }}</div>
                                    <div class="text-base text-gray-600 mt-1">Tashkilotlar kiritgan xodimlar </div>
                                </div>
                            </div>
                        </a>
                    </div> --}}

                    {{-- <div class="col-span-12 sm:col-span-6 xxl:col-span-3 intro-y">
                        <div class="mini-report-chart box p-2 zoom-in" style="border-radius: 20px;">
                            <a href="{{ route('tashkilotmalumotlar.adminlar') }}">
                                <div class="flex items-center pl-5"
                                    style="justify-content:left; align-items: center;  height: 100%; gap:20px;">
                                    <div class="flex" style="background: #FFF9EF; padding: 15px; border-radius: 100%;">
                                        <i data-feather="users" class="report-box__icon text-theme-3"
                                            style="color: #E0B973;"></i>
                                    </div>
                                    <div class="w-2/4 flex-none">
                                        <div class="text-lg font-medium truncate" style="font-size: 28px;font-weight:600;">
                                            {{ $admins }}</div>
                                        <div class="text-gray-600 mt-1" style="font-size: 16px;">Tashkilotlar kiritgan
                                            adminlar</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div> --}}

                    <div class="col-span-12 sm:col-span-6 xxl:col-span-3 intro-y">
                        <div class="mini-report-chart box p-2 zoom-in" style="border-radius: 20px;">
                            <a href="{{ route('doktarantura.index') }}">
                                <div class="flex items-center pl-5"
                                    style="justify-content:left; align-items: center;  height: 100%; gap:20px;">
                                    <div class="flex" style="background: #FFF9EF; padding: 15px; border-radius: 100%;">
                                        <i data-feather="users" class="report-box__icon text-theme-3"
                                            style="color: #E0B973;"></i>
                                    </div>
                                    <div class="w-2/4 flex-none">
                                        <div class="text-lg font-medium truncate" style="font-size: 28px;font-weight:600;">
                                            {{ $izlanuvchilar }}
                                        </div>
                                        <div class="text-gray-600 mt-1" style="font-size: 16px;">Ilmiy izlanuvchilar</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    {{-- <div class="col-span-12 sm:col-span-6 xxl:col-span-3 intro-y">
                        <div class="mini-report-chart box p-2 zoom-in" style="border-radius: 20px;">
                            <a href="{{ route('fakultets.index') }}">
                                <div class="flex items-center pl-5"
                                    style="justify-content:left; align-items: center;  height: 100%; gap:20px;">
                                    <div class="flex" style="background: #FFF9EF; padding: 15px; border-radius: 100%;">
                                        <i data-feather="list" class="report-box__icon text-theme-3"
                                            style="color: #E0B973;"></i>
                                    </div>
                                    <div class="w-2/4 flex-none">
                                        <div class="text-lg font-medium truncate" style="font-size: 28px;font-weight:600;">
                                            {{ $fakultets }}
                                        </div>
                                        <div class="text-gray-600 mt-1" style="font-size: 16px;">Fakultetlar</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-span-12 sm:col-span-6 xxl:col-span-3 intro-y">
                        <div class="mini-report-chart box p-2 zoom-in" style="border-radius: 20px;">
                            <a href="{{ route('kafedras.index') }}">
                                <div class="flex items-center pl-5"
                                    style="justify-content:left; align-items: center;  height: 100%; gap:20px;">
                                    <div class="flex" style="background: #FFF9EF; padding: 15px; border-radius: 100%;">
                                        <i data-feather="list" class="report-box__icon text-theme-3"
                                            style="color: #E0B973;"></i>
                                    </div>
                                    <div class="w-2/4 flex-none">
                                        <div class="text-lg font-medium truncate" style="font-size: 28px;font-weight:600;">
                                            {{ $kafedras }}
                                        </div>
                                        <div class="text-gray-600 mt-1" style="font-size: 16px;">Kafedralar</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div> --}}

                    {{-- <div class="col-span-12 sm:col-span-6 xxl:col-span-3 intro-y">
                        <div class="mini-report-chart box p-2 zoom-in" style="border-radius: 20px;">
                            <a href="{{ route('ilmiymaqolalars.index') }}">
                                <div class="flex items-center pl-5"
                                    style="justify-content:left; align-items: center;  height: 100%; gap:20px;">
                                    <div class="flex" style="background: #FFF9EF; padding: 15px; border-radius: 100%;">
                                        <i data-feather="list" class="report-box__icon text-theme-3"
                                            style="color: #E0B973;"></i>
                                    </div>
                                    <div class="w-2/4 flex-none">
                                        <div class="text-lg font-medium truncate" style="font-size: 28px;font-weight:600;">
                                            {{ $ilmiymaqolalars }}
                                        </div>
                                        <div class="text-gray-600 mt-1" style="font-size: 16px;"> Ilmiy maqolalar </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-span-12 sm:col-span-6 xxl:col-span-3 intro-y">
                        <div class="mini-report-chart box p-2 zoom-in" style="border-radius: 20px;">
                            <a href="{{ route('ilmiytezislars.index') }}">
                                <div class="flex items-center pl-5"
                                    style="justify-content:left; align-items: center;  height: 100%; gap:20px;">
                                    <div class="flex" style="background: #FFF9EF; padding: 15px; border-radius: 100%;">
                                        <i data-feather="list" class="report-box__icon text-theme-3"
                                            style="color: #E0B973;"></i>
                                    </div>
                                    <div class="w-2/4 flex-none">
                                        <div class="text-lg font-medium truncate" style="font-size: 28px;font-weight:600;">
                                            {{ $ilmiytezislars }}
                                        </div>
                                        <div class="text-gray-600 mt-1" style="font-size: 16px;"> Ilmiy tezislar </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-span-12 sm:col-span-6 xxl:col-span-3 intro-y">
                        <div class="mini-report-chart box p-2 zoom-in" style="border-radius: 20px;">
                            <a href="{{ route('intellektualmulks.index') }}">
                                <div class="flex items-center pl-5"
                                    style="justify-content:left; align-items: center;  height: 100%; gap:20px;">
                                    <div class="flex" style="background: #FFF9EF; padding: 15px; border-radius: 100%;">
                                        <i data-feather="list" class="report-box__icon text-theme-3"
                                            style="color: #E0B973;"></i>
                                    </div>
                                    <div class="w-2/4 flex-none">
                                        <div class="text-lg font-medium truncate" style="font-size: 28px;font-weight:600;">
                                            {{ $intellektualmulks }}
                                        </div>
                                        <div class="text-gray-600 mt-1" style="font-size: 16px;"> Intellektual mulk </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-span-12 sm:col-span-6 xxl:col-span-3 intro-y">
                        <div class="mini-report-chart box p-2 zoom-in" style="border-radius: 20px;">
                            <a href="{{ route('dalolatnomas.index') }}">
                                <div class="flex items-center pl-5"
                                    style="justify-content:left; align-items: center;  height: 100%; gap:20px;">
                                    <div class="flex" style="background: #FFF9EF; padding: 15px; border-radius: 100%;">
                                        <i data-feather="list" class="report-box__icon text-theme-3"
                                            style="color: #E0B973;"></i>
                                    </div>
                                    <div class="w-2/4 flex-none">
                                        <div class="text-lg font-medium truncate" style="font-size: 28px;font-weight:600;">
                                            {{ $dalolatnomas }}
                                        </div>
                                        <div class="text-gray-600 mt-1" style="font-size: 16px;">Dalolatnomalar </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-span-12 sm:col-span-6 xxl:col-span-3 intro-y">
                        <div class="mini-report-chart box p-2 zoom-in" style="border-radius: 20px;">
                            <a href="{{ route('monografiyalars.index') }}">
                                <div class="flex items-center pl-5"
                                    style="justify-content:left; align-items: center;  height: 100%; gap:20px;">
                                    <div class="flex" style="background: #FFF9EF; padding: 15px; border-radius: 100%;">
                                        <i data-feather="list" class="report-box__icon text-theme-3"
                                            style="color: #E0B973;"></i>
                                    </div>
                                    <div class="w-2/4 flex-none">
                                        <div class="text-lg font-medium truncate" style="font-size: 28px;font-weight:600;">
                                            {{ $monografiyalars }}
                                        </div>
                                        <div class="text-gray-600 mt-1" style="font-size: 16px;">Monografiyalar </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div> --}}

                    @endrole
                </div>

                <div class="intro-y grid grid-cols-12 gap-6 mt-5">

                    <div class="col-span-12 lg:col-span-4">
                        <div class="intro-y box mt-5">
                            <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200">
                                <h2 class="font-medium text-base mr-auto">
                                    Ilmiy maqolalar
                                </h2>
                            </div>
                            <div class="p-5" id="donut-chart">
                                <div class="preview">
                                    {{-- <canvas id="donut-chart-widget" height="200"></canvas> --}}
                                    <canvas id="barChart" width="600" height="400"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-span-12 lg:col-span-4">
                        <div class="intro-y box mt-5">
                            <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200">
                                <h2 class="font-medium text-base mr-auto">
                                    Ilmiy loyihalar
                                </h2>
                            </div>
                            <div class="p-5" id="ilmiy-chart">
                                <div class="preview">
                                    <canvas id="ilmiy-chart-widget" height="200"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-span-12 lg:col-span-4">
                        <!-- END: Line Chart -->
                        <!-- BEGIN: Pie Chart -->
                        <div class="intro-y box mt-5">
                            <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200">
                                <h2 class="font-medium text-base mr-auto">
                                    Fakultetlar
                                </h2>
                            </div>
                            <div class="p-5" id="pie-chart">
                                <div class="preview">
                                    <canvas id="pie-chart-widget-fakuletlar" height="200"></canvas>
                                </div>
                            </div>
                        </div>
                        <!-- END: Pie Chart -->
                    </div>

                    <div class="col-span-12 lg:col-span-4">
                        <!-- END: Line Chart -->
                        <!-- BEGIN: Pie Chart -->
                        <div class="intro-y box mt-5">
                            {{-- <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200">
                                <h2 class="font-medium text-base mr-auto">
                                    Fakultetlar
                                </h2>
                            </div> --}}
                            <div class="p-5" id="pie-chart_ass">
                                <div class="previewjhfgj">
                                    {{-- <canvas id="pie-chart-widget-fakuletlar" height="200"></canvas> --}}
                                    <canvas id="pieChart" width="600" height="400"></canvas>
                                </div>
                            </div>
                        </div>
                        <!-- END: Pie Chart -->
                    </div>

                    <div class="col-span-12 lg:col-span-8">
                        <!-- END: Line Chart -->
                        <!-- BEGIN: Pie Chart -->
                        <div class="intro-y box mt-5">
                            <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200">
                                <h2 class="font-medium text-base mr-auto">
                                    Viloyatlar
                                </h2>
                            </div>
                            <div class="p-5" id="pie-chart_vil">
                                <div class="preview">
                                    {{-- <canvas id="pie-chart-widget-fakuletlar" height="200"></canvas> --}}
                                    <canvas id="viloyatChart" height="120"></canvas>
                                </div>
                            </div>
                        </div>
                        <!-- END: Pie Chart -->
                    </div>

                    <div class="col-span-12 lg:col-span-6">
                        <!-- END: Line Chart -->
                        <!-- BEGIN: Pie Chart -->
                        <div class="intro-y box mt-5">
                            <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200">
                                <h2 class="font-medium text-base mr-auto">
                                     Ilmiy loyihalar yillar kesimida
                                </h2>
                            </div>
                            <div class="p-5" id="pie-chart_vil">
                                <div class="preview">
                                    {{-- <canvas id="pie-chart-widget-fakuletlar" height="200"></canvas> --}}
                                    <canvas id="barChart_yillar" width="600" height="400"></canvas>
                                </div>
                            </div>
                        </div>
                        <!-- END: Pie Chart -->
                    </div>

                    <div class="col-span-12 lg:col-span-6">
                        <!-- END: Line Chart -->
                        <!-- BEGIN: Pie Chart -->
                        <div class="intro-y box mt-5">
                            <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200">
                                <h2 class="font-medium text-base mr-auto">
                                    Stajirovka yillar kesimida
                                </h2>
                            </div>
                            <div class="p-5" id="pie-chart_vil">
                                <div class="preview">
                                    {{-- <canvas id="pie-chart-widget-fakuletlar" height="200"></canvas> --}}
                                    <canvas id="barChart_stajiovka" width="600" height="400"></canvas>
                                </div>
                            </div>
                        </div>
                        <!-- END: Pie Chart -->
                    </div>

                </div>
            </div>
        </div>
    </div>
    @endrole
    @role(['admin', 'Xodimlar_uchun_masul', 'Asbob_uskunalarga_masul', 'Tashkilot_pasporti_uchun_masul', 'Ilmiy_faoliyat_uchun_masul'])
    @include('admin.admin')
    @endrole
    @role('Itm-tashkilotlar')
    @include('admin.itm')
    @endrole
    @role('labaratoriyaga_masul')
    @include('admin.lab')
    @endrole
    @role('kafedra_mudiri')
    @include('admin.kaf')
    @endrole

    <script>
        $(document).ready(function () {
            if ($('#ilmiy-chart-widget').length) {
                var _ctx9 = $('#ilmiy-chart-widget')[0].getContext('2d');

                var _myDoughnutChart3 = new Chart(_ctx9, {
                    type: 'doughnut',
                    data: {
                        labels: ["Yakunlangan", "Jarayonda"],
                        datasets: [{
                            data: @json($ilmiy_loyihalar),
                            backgroundColor: ["#FFC533", "#285FD3"],
                            hoverBackgroundColor: ["#FFC533", "#285FD3"],
                            borderWidth: 2,
                            borderColor: "#fff"
                        }]
                    },
                    options: {
                        cutoutPercentage: 80 // eski 'cutoutPercentage' o‘rniga Chart.js v3+
                    }
                });
            }

        });

        $(document).ready(function () {
            if ($('#pie-chart-widget-fakuletlar').length) {
                var _ctx10 = $('#pie-chart-widget-fakuletlar')[0].getContext('2d');

                var _myPieChart = new Chart(_ctx10, {
                    type: 'pie',
                    data: {
                        labels: ["Fakultetlar", "Kafedralar", "Laboratoriyalar"],
                        datasets: [{
                            data: @json($FKL_chart),
                            backgroundColor: ["#FF8B26", "#FFC533", "#285FD3"],
                            hoverBackgroundColor: ["#FF8B26", "#FFC533", "#285FD3"],
                            borderWidth: 5,
                            borderColor: "#fff"
                        }]
                    }
                });
            }
        });
    </script>

    <script>
        const ctx = document.getElementById('barChart').getContext('2d');

        const barChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ["Ilmiy maqolalar", "Ilmiy tezislar", " Intellektual mulk ", "Dalolatnomalar ", "Monografiyalar "], // ["Yanvar", "Fevral", "Mart", "Aprel", "May"]
                datasets: [{
                    // label: 'Ilmiy loyihalar',
                    data: @json($ilmiy_maqol_chart),
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.6)',
                        'rgba(54, 162, 235, 0.6)',
                        'rgba(255, 206, 86, 0.6)',
                        'rgba(75, 192, 192, 0.6)',
                        'rgba(153, 102, 255, 0.6)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    legend: {
                        display: false // 👈 Label (Ilmiy loyihalar) va rang kvadratni olib tashlaydi
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

    </script>

    <script>
        const ctx_pie = document.getElementById('pieChart').getContext('2d');

        const chart = new Chart(ctx_pie, {
            type: 'pie',
            data: {
                labels: ["Ilmiy loyihalar", "Ilmiy Stajirovka", "Asbob-uskunalar", "Xo'jalik shartnomalari"],
                datasets: [{
                    data: @json($IlAu_chart),
                    backgroundColor: [
                        'rgba(255, 159, 64, 0.7)',   // Apelsin
                        'rgba(75, 192, 192, 0.7)',   // Yashil-moviy
                        'rgba(153, 102, 255, 0.7)',  // Binafsha
                        'rgba(255, 99, 132, 0.7)'    // Pushti-qizil
                    ],
                    borderColor: '#fff',
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom' // Yoki 'right', 'top', 'left'
                    },
                    tooltip: {
                        callbacks: {
                            label: function (context) {
                                const label = context.label || '';
                                const value = context.parsed || 0;
                                return `${label}: ${value}`;
                            }
                        }
                    }
                }
            }
        });
    </script>


    <script>
        const ctx_vilt = document.getElementById('viloyatChart').getContext('2d');

        const chart_viloyat = new Chart(ctx_vilt, {
            type: 'bar',
            data: {
                labels: [
                    "Qoraqalpogʻiston Respublikasi",
                    "Andijon viloyati",
                    "Buxoro viloyati",
                    "Jizzax viloyati",
                    "Navoiy viloyati",
                    "Namangan viloyati",
                    "Surxondaryo viloyati",
                    "Samarqand viloyati",
                    "Qashqadaryo viloyati",
                    "Sirdaryo viloyati",
                    "Toshkent viloyati",
                    "Fargʻona viloyati",
                    "Toshkent shahri",
                    "Xorazm viloyati"
                ],
                datasets: [{
                    label: 'Ilmiy loyihalar',
                    data: @json($viloy_ilmiyconut),
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.6)',
                        'rgba(54, 162, 235, 0.6)',
                        'rgba(255, 206, 86, 0.6)',
                        'rgba(75, 192, 192, 0.6)',
                        'rgba(153, 102, 255, 0.6)',
                        'rgba(255, 159, 64, 0.6)',
                        'rgba(199, 199, 199, 0.6)',
                        'rgba(83, 102, 255, 0.6)',
                        'rgba(99, 255, 132, 0.6)',
                        'rgba(255, 99, 255, 0.6)',
                        'rgba(99, 132, 255, 0.6)',
                        'rgba(192, 75, 75, 0.6)',
                        'rgba(102, 255, 204, 0.6)',
                        'rgba(255, 140, 0, 0.6)'
                    ],
                    borderColor: 'rgba(0,0,0,0.3)',
                    borderWidth: 1
                }]
            },
            options: {
                indexAxis: 'x',
                responsive: true,
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        callbacks: {
                            label: function (context) {
                                return `${context.label}: ${context.parsed}`;
                            }
                        }
                    }
                },
                scales: {
                    x: {
                        ticks: {
                            autoSkip: false,
                            maxRotation: 60,
                            minRotation: 45
                        }
                    },
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Loyihalar soni'
                        }
                    }
                }
            }
        });
    </script>

    <script>
        const ctx_yil = document.getElementById('barChart_yillar').getContext('2d');
        const barChart_yil = new Chart(ctx_yil, {
            type: 'bar',
            data: {
                labels: @json($labels_yil), // yillar
                datasets: [{
                    label: 'Loyihalar soni',
                    data: @json($data_yil),   // loyiha sonlari
                    backgroundColor: 'rgba(54, 162, 235, 0.6)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1,
                    barThickness: 50
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Loyihalar soni'
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Yil'
                        }
                    }
                }
            }
        });
    </script>

    <script>
        const ctx_yil_sta = document.getElementById('barChart_stajiovka').getContext('2d');
        const barChart_yil_sta = new Chart(ctx_yil_sta, {
            type: 'bar',
            data: {
                labels: @json($stajiovka_labels_yil), // yillar
                datasets: [{
                    label: 'Stajirovka soni',
                    data: @json($stajiovka_data_yil),   // loyiha sonlari
                    backgroundColor: 'rgba(54, 162, 235, 0.6)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1,
                    barThickness: 50
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Stajirovka soni'
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Yil'
                        }
                    }
                }
            }
        });
    </script>
@endsection
