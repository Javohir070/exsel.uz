@extends('layouts.admin')
@section('content')
    @role(['super-admin', 'Xujalik_shartnomalari', 'Ilmiy_loyiha_rahbari', 'Ekspert'])
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12 xxl:col-span-12 grid grid-cols-12 gap-6">
            <div class="col-span-12 mt-8">
                <div class="intro-y flex items-center h-10">
                    <h2 class="text-lg font-medium truncate mr-5">
                        Tashkilot haqida qisqacha malumot
                    </h2>
                    <!-- <a href="" class="ml-auto flex text-theme-1"> <i data-feather="refresh-ccw" class="w-4 h-4 mr-3"></i>
                                Ma'lumotlarni qayta yuklash </a> -->
                </div>

                <div class="grid grid-cols-12 gap-6 mt-5">
                    @role(['super-admin', 'Ekspert'])

                    {{-- <div class="col-span-12 sm:col-span-6 xl:col-span-4 intro-y">
                        <a href="{{ route('tashkilotlar.index') }}">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="flex">
                                        <i data-feather="file-text" class="report-box__icon text-theme-10"></i>
                                    </div>
                                    <div class="text-3xl font-bold leading-8 mt-6">{{ $tash_count }}</div>
                                    <div class="text-base text-gray-600 mt-1">Tashkilotlar</div>
                                </div>
                            </div>
                        </a>
                    </div> --}}

                    <div class="col-span-12 sm:col-span-6 xxl:col-span-3 intro-y">
                        <div class="mini-report-chart box p-2 zoom-in" style="border-radius: 20px;">
                            <a href="{{ route('tashkilotlar.index') }}">
                                <div class="flex items-center pl-5" style="justify-content:left; align-items: center;  height: 100%; gap:20px;">
                                    <div class="flex" style="background: #f1e6e6; padding: 15px; border-radius: 100%;">
                                        <i data-feather="file-text" class="report-box__icon text-theme-3" style="color: #303033;" ></i>
                                    </div>
                                    <div class="w-2/4 flex-none">
                                        <div class="text-lg font-medium truncate" style="font-size: 28px;font-weight:600;">{{ $tash_count }}</div>
                                        <div class="text-gray-600 mt-1" style="font-size: 16px;">Tashkilotlar</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>


                    {{-- <div class="col-span-12 sm:col-span-6 xl:col-span-4 intro-y">
                        <a href="{{ route('tashkilotlar.index') }}">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="flex">
                                        <i data-feather="file-text" class="report-box__icon text-theme-10"></i>
                                    </div>
                                    <div class="text-3xl font-bold leading-8 mt-6">{{ $tash_count - $itm_count }}</div>
                                    <div class="text-base text-gray-600 mt-1">OTM</div>
                                </div>
                            </div>
                        </a>
                    </div> --}}

                    <div class="col-span-12 sm:col-span-6 xxl:col-span-3 intro-y">
                        <div class="mini-report-chart box p-2 zoom-in" style="border-radius: 20px;">
                            <a href="{{ route('tashkilotlar.index') }}">
                                <div class="flex items-center pl-5" style="justify-content:left; align-items: center;  height: 100%; gap:20px;">
                                    <div class="flex" style="background: #f1e6e6; padding: 15px; border-radius: 100%;">
                                        <i data-feather="file-text" class="report-box__icon text-theme-3" style="color: #81105c;" ></i>
                                    </div>
                                    <div class="w-2/4 flex-none">
                                        <div class="text-lg font-medium truncate" style="font-size: 28px;font-weight:600;">{{ $tash_count - $itm_count }}</div>
                                        <div class="text-gray-600 mt-1" style="font-size: 16px;">OTM</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    {{-- <div class="col-span-12 sm:col-span-6 xl:col-span-4 intro-y">
                        <a href="{{ route('tashkilotlar.index') }}">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="flex">
                                        <i data-feather="file-text" class="report-box__icon text-theme-10"></i>
                                    </div>
                                    <div class="text-3xl font-bold leading-8 mt-6">{{ $itm_count }}</div>
                                    <div class="text-base text-gray-600 mt-1">ITM</div>
                                </div>
                            </div>
                        </a>
                    </div> --}}

                    <div class="col-span-12 sm:col-span-6 xxl:col-span-3 intro-y">
                        <div class="mini-report-chart box p-2 zoom-in" style="border-radius: 20px;">
                            <a href="{{ route('tashkilotlar.index') }}">
                                <div class="flex items-center pl-5" style="justify-content:left; align-items: center;  height: 100%; gap:20px;">
                                    <div class="flex" style="background: #f1bdbd; padding: 15px; border-radius: 100%;">
                                        <i data-feather="file-text" class="report-box__icon text-theme-3" style="color: #3f7752;" ></i>
                                    </div>
                                    <div class="w-2/4 flex-none">
                                        <div class="text-lg font-medium truncate" style="font-size: 28px;font-weight:600;">{{ $itm_count }}</div>
                                        <div class="text-gray-600 mt-1" style="font-size: 16px;">ITM</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    {{-- <div class="col-span-12 sm:col-span-6 xl:col-span-4 intro-y">
                        <a href="{{ route('ilmiyloyihalar.index') }}">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="flex">
                                        <i data-feather="file-text" class="report-box__icon text-theme-3"></i>
                                    </div>
                                    <div class="text-3xl font-bold leading-8 mt-6">{{ $loy_count }}</div>
                                    <div class="text-base text-gray-600 mt-1">Ilmiy loyhalar</div>
                                </div>
                            </div>
                        </a>
                    </div> --}}
                    <div class="col-span-12 sm:col-span-6 xxl:col-span-3 intro-y">
                        <div class="mini-report-chart box p-2 zoom-in" style="border-radius: 20px;">
                            <a href="{{ route('ilmiyloyihalar.index') }}">
                                <div class="flex items-center pl-5" style="justify-content:left; align-items: center;  height: 100%; gap:20px;">
                                    <div class="flex" style="background: #E4F0FB; padding: 15px; border-radius: 100%;">
                                        <i data-feather="list" class="report-box__icon text-theme-3" ></i>
                                    </div>
                                    <div class="w-2/4 flex-none">
                                        <div class="text-lg font-medium truncate" style="font-size: 28px;font-weight:600;">{{ $loy_count }}</div>
                                        <div class="text-gray-600 mt-1" style="font-size: 16px;">Ilmiy loyihalar</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-span-12 sm:col-span-6 xxl:col-span-3 intro-y">
                        <div class="mini-report-chart box p-2 zoom-in" style="border-radius: 20px;">
                            <a href="{{ route('stajirovkalar.index') }}">
                                <div class="flex items-center pl-5" style="justify-content:left; align-items: center;  height: 100%; gap:20px;">
                                    <div class="flex" style="background: #EBFBEB; padding: 15px; border-radius: 100%;">
                                        <i data-feather="git-pull-request" class="report-box__icon text-theme-3" style="color: #00A705;" ></i>
                                    </div>
                                    <div class="w-2/4 flex-none">
                                        <div class="text-lg font-medium truncate" style="font-size: 28px;font-weight:600;">{{ $stajirovka_count }}</div>
                                        <div class="text-gray-600 mt-1" style="font-size: 16px;">Ilmiy Stajirovka</div>
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
                                    <div class="text-3xl font-bold leading-8 mt-6">{{ $stajirovka_count }}</div>
                                    <div class="text-base text-gray-600 mt-1">Stajirovka</div>
                                </div>
                            </div>
                        </a>
                    </div> --}}

                    <div class="col-span-12 sm:col-span-6 xxl:col-span-3 intro-y">
                        <div class="mini-report-chart box p-2 zoom-in" style="border-radius: 20px;">
                            <a href="{{ route('asbobuskunalar.index') }}">
                                <div class="flex items-center pl-5" style="justify-content:left; align-items: center;  height: 100%; gap:20px;">
                                    <div class="flex" style="background: #FFF0F0; padding: 15px; border-radius: 100%;">
                                        <i data-feather="printer" class="report-box__icon text-theme-3" style="color: #E64242;" ></i>
                                    </div>
                                    <div class="w-2/4 flex-none">
                                        <div class="text-lg font-medium truncate" style="font-size: 28px;font-weight:600;">{{ $asboblar_count }}</div>
                                        <div class="text-gray-600 mt-1" style="font-size: 16px;">Asbob-uskunalar</div>
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
                                    <div class="text-3xl font-bold leading-8 mt-6">{{ $asboblar_count }}</div>
                                    <div class="text-base text-gray-600 mt-1">Asbob-uskunalar</div>
                                </div>
                            </div>
                        </a>
                    </div> --}}

                    {{-- <div class="col-span-12 sm:col-span-6 xl:col-span-4 intro-y">
                        <a href="{{ route('ilmiyloyihalar.index') }}">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="flex">
                                        <i data-feather="file-text" class="report-box__icon text-theme-3"></i>
                                    </div>
                                    <div class="text-3xl font-bold leading-8 mt-6">{{ $loy_count }}</div>
                                    <div class="text-base text-gray-600 mt-1">Ilmiy izlanuvchilar</div>
                                </div>
                            </div>
                        </a>
                    </div> --}}
                    {{-- <div class="col-span-12 sm:col-span-6 xl:col-span-4 intro-y">
                        <a href="{{ route('xodim.barchaXodimlar') }}">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="flex">
                                        <i data-feather="users" class="report-box__icon text-theme-6"></i>
                                    </div>
                                    <div class="text-3xl font-bold leading-8 mt-6">{{ $xodim_count }}</div>
                                    <div class="text-base text-gray-600 mt-1">Xodimlar</div>
                                </div>
                            </div>
                        </a>
                    </div> --}}
                    <div class="col-span-12 sm:col-span-6 xxl:col-span-3 intro-y">
                        <div class="mini-report-chart box p-2 zoom-in" style="border-radius: 20px;">
                            <a href="{{ route('xodim.barchaXodimlar') }}">
                                <div class="flex items-center pl-5" style="justify-content:left; align-items: center;  height: 100%; gap:20px;">
                                    <div class="flex" style="background: #c8ecec; padding: 15px; border-radius: 100%;">
                                        <i data-feather="users" class="report-box__icon text-theme-3" style="color: #29ca67;" ></i>
                                    </div>
                                    <div class="w-2/4 flex-none">

                                        <div class="text-lg font-medium truncate" style="font-size: 28px;font-weight:600;">{{ $xodim_count }}</div>
                                        <div class="text-gray-600 mt-1" style="font-size: 16px;">Xodimlar</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-span-12 sm:col-span-6 xxl:col-span-3 intro-y">
                        <div class="mini-report-chart box p-2 zoom-in" style="border-radius: 20px;">
                            <a href="{{ route('laboratoriyalari.index') }}">
                                <div class="flex items-center pl-5" style="justify-content:left; align-items: center;  height: 100%; gap:20px;">
                                    <div class="flex" style="background: #FFF0F0; padding: 15px; border-radius: 100%;">
                                        <i data-feather="thermometer" class="report-box__icon text-theme-3" style="color: #E64242;" ></i>
                                    </div>
                                    <div class="w-2/4 flex-none">
                                        <div class="text-lg font-medium truncate" style="font-size: 28px;font-weight:600;">{{ $asboblar_count }}</div>
                                        <div class="text-gray-600 mt-1" style="font-size: 16px;">Laboratoriyalar</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    {{-- <div class="col-span-12 sm:col-span-6 xl:col-span-4 intro-y">
                        <a href="{{ route('laboratoriyalari.index') }}">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="flex">
                                        <i data-feather="bar-chart" class="report-box__icon text-theme-9"></i>
                                    </div>
                                    <div class="text-3xl font-bold leading-8 mt-6">{{ $labaratoriyalar }}</div>
                                    <div class="text-base text-gray-600 mt-1">Laboratoriyalari </div>
                                </div>
                            </div>
                        </a>
                    </div> --}}
                    @endrole
                    @role(['Xujalik_shartnomalari', 'super-admin', 'Ekspert'])
                    {{-- <div class="col-span-12 sm:col-span-6 xl:col-span-4 intro-y">
                        <a href="{{ route('xujaliklar.index') }}">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="flex">
                                        <i data-feather="file-text" class="report-box__icon text-theme-3"></i>
                                    </div>
                                    <div class="text-3xl font-bold leading-8 mt-6">{{ $xujalik_count }}</div>
                                    <div class="text-base text-gray-600 mt-1"> Xo'jalik shartnomalari </div>
                                </div>
                            </div>
                        </a>
                    </div> --}}

                    <div class="col-span-12 sm:col-span-6 xxl:col-span-3 intro-y">
                        <div class="mini-report-chart box p-2 zoom-in" style="border-radius: 20px;">
                            <a href="{{ route('xujaliklar.index') }}">
                                <div class="flex items-center pl-5" style="justify-content:left; align-items: center;  height: 100%; gap:20px;">
                                    <div class="flex" style="background: #FFF9EF; padding: 15px; border-radius: 100%;">
                                        <i data-feather="layers" class="report-box__icon text-theme-3" style="color: #E0B973;" ></i>
                                    </div>
                                    <div class="w-2/4 flex-none">
                                        <div class="text-lg font-medium truncate" style="font-size: 28px;font-weight:600;">{{ $xujalik_count }}</div>
                                        <div class="text-gray-600 mt-1" style="font-size: 16px;">Xo'jalik shartnomalari</div>
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
                    <div class="col-span-12 sm:col-span-6 xl:col-span-4 intro-y">
                        <a href="{{ url('users') }}">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="flex">
                                        <i data-feather="users" class="report-box__icon text-theme-9"></i>
                                    </div>
                                    <div class="text-3xl font-bold leading-8 mt-6">{{ $adminlar }}</div>
                                    <div class="text-base text-gray-600 mt-1">Adminlar</div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-span-12 sm:col-span-6 xl:col-span-4 intro-y">
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
                    </div>
                    <div class="col-span-12 sm:col-span-6 xl:col-span-4 intro-y">
                        <a href="{{ route('tashkilotmalumotlar.adminlar') }}">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="flex">
                                        <i data-feather="bar-chart" class="report-box__icon text-theme-9"></i>
                                    </div>
                                    <div class="text-3xl font-bold leading-8 mt-6">{{ $admins }}</div>
                                    <div class="text-base text-gray-600 mt-1">Tashkilotlar kiritgan adminlar </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-span-12 sm:col-span-6 xl:col-span-4 intro-y">
                        <a href="{{ route('ilmiy_izlanuvchilar.index') }}">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="flex">
                                        <i data-feather="users" class="report-box__icon text-theme-9"></i>
                                    </div>
                                    <div class="text-3xl font-bold leading-8 mt-6">{{ $izlanuvchilar }}</div>
                                    <div class="text-base text-gray-600 mt-1">Ilmiy izlanuvchilar </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-span-12 sm:col-span-6 xl:col-span-4 intro-y">
                        <a href="{{ route('laboratoriyalari.index') }}">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="flex">
                                        <i data-feather="bar-chart" class="report-box__icon text-theme-9"></i>
                                    </div>
                                    <div class="text-3xl font-bold leading-8 mt-6">{{ $labaratoriyalar }}</div>
                                    <div class="text-base text-gray-600 mt-1">Labaratoriyalari </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    @endrole
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
@endsection
