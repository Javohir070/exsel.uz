@extends('layouts.admin')
@section('content')
    @role(['super-admin', 'Xujalik_shartnomalari', 'Ilmiy_loyiha_rahbari', 'Ekspert'])
        <div class="grid grid-cols-12 gap-6">
            <div class="col-span-12 xxl:col-span-12 grid grid-cols-12 gap-6">
                <div class="col-span-12 mt-8">
                    <div class="intro-y flex items-center h-10">
                        <h2 class="text-lg font-medium truncate mr-5">
                            Monitoring
                        </h2>
                        <!-- <a href="" class="ml-auto flex text-theme-1"> <i data-feather="refresh-ccw" class="w-4 h-4 mr-3"></i>
                            Ma'lumotlarni qayta yuklash </a> -->
                    </div>

                    <div class="grid grid-cols-12 gap-6 mt-5">

                            <div class="col-span-12 sm:col-span-6 xl:col-span-4 intro-y">
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
                            </div>

                            <div class="col-span-12 sm:col-span-6 xl:col-span-4 intro-y">
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
                            </div>

                            <div class="col-span-12 sm:col-span-6 xl:col-span-4 intro-y">
                                <a href="{{ route('asbobuskunalar.index') }}">
                                    <div class="report-box zoom-in">
                                        <div class="box p-5">
                                            <div class="flex">
                                                <i data-feather="file-text" class="report-box__icon text-theme-3"></i>
                                            </div>
                                            <div class="text-3xl font-bold leading-8 mt-6">{{ $asboblar_count }}</div>
                                            <div class="text-base text-gray-600 mt-1">Labaratoriyalar</div>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <div class="col-span-12 sm:col-span-6 xl:col-span-4 intro-y">
                                <a href="{{ route('doktarantura.index') }}">
                                    <div class="report-box zoom-in">
                                        <div class="box p-5">
                                            <div class="flex">
                                                <i data-feather="file-text" class="report-box__icon text-theme-3"></i>
                                            </div>
                                            <div class="text-3xl font-bold leading-8 mt-6">{{ $doktarantura }}</div>
                                            <div class="text-base text-gray-600 mt-1">Doktarantura</div>
                                        </div>
                                    </div>
                                </a>
                            </div>


                    </div>
                </div>
            </div>
        </div>
    @endrole
@endsection
