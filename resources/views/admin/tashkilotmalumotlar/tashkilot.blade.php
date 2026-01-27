@extends("layouts.admin")
@section("content")
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12 xxl:col-span-12 grid grid-cols-12 gap-6">

            <div class="col-span-12 mt-2">
                <div class="intro-y flex items-center h-10">
                    <h2 class="text-lg font-medium truncate mr-5">
                        @foreach ($tashkilot as $tash)
                            {{ $tash->name }} haqida qisqacha malumot
                        @endforeach
                    </h2>
                </div>
                <div class="grid grid-cols-12 gap-6 mt-5">

                    <div class="col-span-12 sm:col-span-6 xxl:col-span-3 intro-y">
                        <div class="mini-report-chart box p-2 zoom-in" style="border-radius: 20px;">
                            <a href="{{ route('ilmiy_loyihalar.index', ['id' => $id]) }}">
                                <div class="flex items-center pl-5"
                                    style="justify-content:left; align-items: center;  height: 100%; gap:20px;">
                                    <div class="flex" style="background: #E4F0FB; padding: 15px; border-radius: 100%;">
                                        <i data-feather="list" class="report-box__icon text-theme-3"></i>
                                    </div>
                                    <div class="w-2/4 flex-none">
                                        <div class="text-lg font-medium truncate" style="font-size: 28px;font-weight:600;">
                                            {{ $ilmiyloyiha_count }}
                                        </div>
                                        <div class="text-gray-600 mt-1" style="font-size: 16px;">Ilmiy loyihalar</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-span-12 sm:col-span-6 xxl:col-span-3 intro-y">
                        <div class="mini-report-chart box p-2 zoom-in" style="border-radius: 20px;">
                            <a href="{{ route('tashkilot.xujalik.index', ['tashkilot' => $id]) }}">
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

                    <div class="col-span-12 sm:col-span-6 xxl:col-span-3 intro-y">
                        <div class="mini-report-chart box p-2 zoom-in" style="border-radius: 20px;">
                            <a href="{{ route('stajirov.index', ['id' => $id]) }}">
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
                    </div>

                    <div class="col-span-12 sm:col-span-6 xxl:col-span-3 intro-y">
                        <div class="mini-report-chart box p-2 zoom-in" style="border-radius: 20px;">
                            <a href="{{ route('asbobu.index', ['id' => $id]) }}">
                                <div class="flex items-center pl-5"
                                    style="justify-content:left; align-items: center;  height: 100%; gap:20px;">
                                    <div class="flex" style="background: #FFF0F0; padding: 15px; border-radius: 100%;">
                                        <i data-feather="printer" class="report-box__icon text-theme-3"
                                            style="color: #E64242;"></i>
                                    </div>
                                    <div class="w-2/4 flex-none">
                                        <div class="text-lg font-medium truncate" style="font-size: 28px;font-weight:600;">
                                            {{ $asbobuskuna_count }}
                                        </div>
                                        <div class="text-gray-600 mt-1" style="font-size: 16px;">Asbob-uskunalar</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>


                    <div class="col-span-12 sm:col-span-6 xxl:col-span-3 intro-y">
                        <div class="mini-report-chart box p-2 zoom-in" style="border-radius: 20px;">
                            <a href="{{ route('asbobu.index', ['id' => $id]) }}">
                                <div class="flex items-center pl-5"
                                    style="justify-content:left; align-items: center;  height: 100%; gap:20px;">
                                    <div class="flex" style="background: #FFF0F0; padding: 15px; border-radius: 100%;">
                                        <i data-feather="thermometer" class="report-box__icon text-theme-3"
                                            style="color: #E64242;"></i>
                                    </div>
                                    <div class="w-2/4 flex-none">
                                        <div class="text-lg font-medium truncate" style="font-size: 28px;font-weight:600;">
                                            {{ $laboratory_count }}</div>
                                        <div class="text-gray-600 mt-1" style="font-size: 16px;">Laboratoriyalar</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-span-12 sm:col-span-6 xxl:col-span-3 intro-y">
                        <div class="mini-report-chart box p-2 zoom-in" style="border-radius: 20px;">
                            <a href="{{ route('kafedralar.index', ['id' => $id]) }}">
                                <div class="flex items-center pl-5"
                                    style="justify-content:left; align-items: center;  height: 100%; gap:20px;">
                                    <div class="flex" style="background: #FFF0F0; padding: 15px; border-radius: 100%;">
                                        <i data-feather="file-text" class="report-box__icon text-theme-3"
                                            style="color: #42e681;"></i>
                                    </div>
                                    <div class="w-2/4 flex-none">
                                        <div class="text-lg font-medium truncate" style="font-size: 28px;font-weight:600;">
                                            {{ $kafedralar_count }}</div>
                                        <div class="text-gray-600 mt-1" style="font-size: 16px;">Kafedralar</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-span-12 sm:col-span-6 xxl:col-span-3 intro-y">
                        <div class="mini-report-chart box p-2 zoom-in" style="border-radius: 20px;">
                            <a href="{{ route("tashkilot.userlar.index", ['tashkilot' => $id]) }}">
                                <div class="flex items-center pl-5"
                                    style="justify-content:left; align-items: center;  height: 100%; gap:20px;">
                                    <div class="flex" style="background: #deeedb; padding: 15px; border-radius: 100%;">
                                        <i data-feather="users" class="report-box__icon text-theme-3"
                                            style="color: #42e681;"></i>
                                    </div>
                                    <div class="w-2/4 flex-none">

                                        <div class="text-lg font-medium truncate" style="font-size: 28px;font-weight:600;">
                                            {{ $admins }}
                                        </div>
                                        <div class="text-gray-600 mt-1" style="font-size: 16px;">Adminlar</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-span-12 sm:col-span-6 xxl:col-span-3 intro-y">
                        <div class="mini-report-chart box p-2 zoom-in" style="border-radius: 20px;">
                            <a href="{{ route("tashkilot.xodimlar.index", ['tashkilot' => $id]) }}">
                                <div class="flex items-center pl-5"
                                    style="justify-content:left; align-items: center;  height: 100%; gap:20px;">
                                    <div class="flex" style="background: #c8ecec; padding: 15px; border-radius: 100%;">
                                        <i data-feather="users" class="report-box__icon text-theme-3"
                                            style="color: #29ca67;"></i>
                                    </div>
                                    <div class="w-2/4 flex-none">

                                        <div class="text-lg font-medium truncate" style="font-size: 28px;font-weight:600;">
                                            {{ $xodimlar_count }}
                                        </div>
                                        <div class="text-gray-600 mt-1" style="font-size: 16px;">Xodimlar</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="col-span-12 sm:col-span-6 xxl:col-span-3 intro-y">
                        <div class="mini-report-chart box p-2 zoom-in" style="border-radius: 20px;">
                            <a href="{{ route("doktarantura.show", ['doktarantura' => $id]) }}">
                                <div class="flex items-center pl-5"
                                    style="justify-content:left; align-items: center;  height: 100%; gap:20px;">
                                    <div class="flex" style="background: #c8ecec; padding: 15px; border-radius: 100%;">
                                        <i data-feather="users" class="report-box__icon text-theme-3"
                                            style="color:rgb(113, 140, 230);"></i>
                                    </div>
                                    <div class="w-2/4 flex-none">

                                        <div class="text-lg font-medium truncate" style="font-size: 28px;font-weight:600;">
                                            {{ $doktarantura_count }}
                                        </div>
                                        <div class="text-gray-600 mt-1" style="font-size: 16px;">Ilmiy izlanuvchilar</div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection