@extends("layouts.admin")
@section("content")
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12 xxl:col-span-12 grid grid-cols-12 gap-6">
            <!-- BEGIN: General Report -->
            <div class="col-span-12 mt-8">
                <div class="intro-y flex items-center h-10">
                    <h2 class="text-lg font-medium truncate mr-5">
                        @foreach ( $tashkilot as $tash )
                            {{ $tash->name }} haqida qisqacha malumot
                        @endforeach
                    </h2>
                    <a href="" class="ml-auto flex text-theme-1"> <i data-feather="refresh-ccw" class="w-4 h-4 mr-3"></i>
                    Ma'lumotlarni qayta yuklash </a>
                </div>
                <div class="grid grid-cols-12 gap-6 mt-5">
                    <div class="col-span-12 sm:col-span-6 xl:col-span-4 intro-y">
                        <a href="{{ route('tashkilot.ilmiyloyiha.index',['tashkilot'=>$id]) }}">
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
                        <a href="{{ route('tashkilot.xujalik.index',['tashkilot'=>$id]) }}">
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
                    </div>

                    <div class="col-span-12 sm:col-span-6 xl:col-span-4 intro-y">
                        <a href="{{ route('stajirov.index',['id' => $id]) }}">
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
                        <a href="{{ route('asbobu.index', ['id' => $id]) }}">
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

                    {{-- <div class="col-span-12 sm:col-span-6 xl:col-span-4 intro-y">
                        <a href="{{ route('tashkilot.ilmiydaraja.index',['tashkilot'=>$id]) }}">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="flex">
                                        <i data-feather="file-text" class="report-box__icon text-theme-3"></i>
                                    </div>
                                    <div class="text-3xl font-bold leading-8 mt-6">{{ $loyiha_bilan_t }}</div>
                                    <div class="text-base text-gray-600 mt-1"> Loyiha bilan taminlanganmi </div>
                                </div>
                            </div>
                        </a>
                    </div> --}}

                    <div class="col-span-12 sm:col-span-6 xl:col-span-4 intro-y">
                        <a href="{{ route("tashkilot.userlar.index",['tashkilot'=>$id]) }}">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="flex">
                                        <i data-feather="users" class="report-box__icon text-theme-9"></i>
                                    </div>
                                    <div class="text-3xl font-bold leading-8 mt-6">{{ $admins }}</div>
                                    <div class="text-base text-gray-600 mt-1">Adminlar</div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-span-12 sm:col-span-6 xl:col-span-4 intro-y">
                        <a href="{{ route("tashkilot.xodimlar.index",['tashkilot'=>$id]) }}">
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
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
