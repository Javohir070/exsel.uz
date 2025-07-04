@extends('layouts.admin')
@section('content')
        <div class="grid grid-cols-12 gap-6">
            <div class="col-span-12 xxl:col-span-12 grid grid-cols-12 gap-6">
                <div class="col-span-12 mt-8">

                    <div class="grid grid-cols-12 gap-6 mt-5">

                            <style>
                                .report-box__icon{
                                    width: 32px;
                                    height: 32px;
                                }
                            </style>

                            <div class="col-span-12 sm:col-span-6 xxl:col-span-3 intro-y">
                                <div class="mini-report-chart box p-2 zoom-in" style="border-radius: 20px;">
                                    <a href="{{ route('doktarantura.index') }}">
                                        <div class="flex items-center pl-5" style="justify-content:left; align-items: center;  height: 100%; gap:20px;">
                                            <div class="flex" style="background: #E4F0FB; padding: 15px; border-radius: 100%;">
                                                <i data-feather="home" class="report-box__icon text-theme-3" ></i>
                                            </div>
                                            <div class="w-2/4 flex-none">
                                                <div class="text-lg font-medium truncate" style="font-size: 28px;font-weight:600;">{{ $doktarantura }}/{{ $doktarantura_expert }}</div>
                                                <div class="text-gray-600 mt-1" style="font-size: 16px;">Tashkilotlar</div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>

                            <div class="col-span-12 sm:col-span-6 xxl:col-span-3 intro-y">
                                <div class="mini-report-chart box p-2 zoom-in" style="border-radius: 20px;">
                                    <a href="{{ route('doktarantura.index') }}">
                                        <div class="flex items-center pl-5" style="justify-content:left; align-items: center;  height: 100%; gap:20px;">
                                            <div class="flex" style="background: #FFF0F0; padding: 15px; border-radius: 100%;">
                                                <i data-feather="users" class="report-box__icon text-theme-3" style="color: #E64242;" ></i>
                                            </div>
                                            <div class="w-2/4 flex-none">
                                                <div class="text-lg font-medium truncate" style="font-size: 28px;font-weight:600;">{{ $doktarantura_count }}/{{ $doktarantura_count_all }}</div>
                                                <div class="text-gray-600 mt-1" style="font-size: 16px;">Ilmiy izlanuvchilar</div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>

                            <div class="col-span-12 sm:col-span-6 xxl:col-span-3 intro-y">
                                <div class="mini-report-chart box p-2 zoom-in" style="border-radius: 20px;">
                                    <a href="{{ route('doktarantura.index') }}">
                                        <div class="flex items-center pl-5" style="justify-content:left; align-items: center;  height: 100%; gap:20px;">
                                            <div class="flex" style="background: #FFF0F0; padding: 15px; border-radius: 100%;">
                                                <i data-feather="users" class="report-box__icon text-theme-3" style="color: #E64242;" ></i>
                                            </div>
                                            <div class="w-2/4 flex-none">
                                                <div class="text-lg font-medium truncate" style="font-size: 28px;font-weight:600;">{{ $m_phd }}</div>
                                                <div class="text-gray-600 mt-1" style="font-size: 16px;">Mustaqil izlanuvchi, PhD</div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>

                            <div class="col-span-12 sm:col-span-6 xxl:col-span-3 intro-y">
                                <div class="mini-report-chart box p-2 zoom-in" style="border-radius: 20px;">
                                    <a href="{{ route('doktarantura.index') }}">
                                        <div class="flex items-center pl-5" style="justify-content:left; align-items: center;  height: 100%; gap:20px;">
                                            <div class="flex" style="background: #FFF0F0; padding: 15px; border-radius: 100%;">
                                                <i data-feather="users" class="report-box__icon text-theme-3" style="color: #E64242;" ></i>
                                            </div>
                                            <div class="w-2/4 flex-none">
                                                <div class="text-lg font-medium truncate" style="font-size: 28px;font-weight:600;">{{ $t_phd }}</div>
                                                <div class="text-gray-600 mt-1" style="font-size: 16px;">Tayanch doktorantura, PhD</div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>

                            <div class="col-span-12 sm:col-span-6 xxl:col-span-3 intro-y">
                                <div class="mini-report-chart box p-2 zoom-in" style="border-radius: 20px;">
                                    <a href="{{ route('doktarantura.index') }}">
                                        <div class="flex items-center pl-5" style="justify-content:left; align-items: center;  height: 100%; gap:20px;">
                                            <div class="flex" style="background: #FFF0F0; padding: 15px; border-radius: 100%;">
                                                <i data-feather="users" class="report-box__icon text-theme-3" style="color: #E64242;" ></i>
                                            </div>
                                            <div class="w-2/4 flex-none">
                                                <div class="text-lg font-medium truncate" style="font-size: 28px;font-weight:600;">{{ $m_dsc }}</div>
                                                <div class="text-gray-600 mt-1" style="font-size: 16px;">Mustaqil izlanuvchi, DSc</div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>

                            <div class="col-span-12 sm:col-span-6 xxl:col-span-3 intro-y">
                                <div class="mini-report-chart box p-2 zoom-in" style="border-radius: 20px;">
                                    <a href="{{ route('doktarantura.index') }}">
                                        <div class="flex items-center pl-5" style="justify-content:left; align-items: center;  height: 100%; gap:20px;">
                                            <div class="flex" style="background: #FFF0F0; padding: 15px; border-radius: 100%;">
                                                <i data-feather="users" class="report-box__icon text-theme-3" style="color: #E64242;" ></i>
                                            </div>
                                            <div class="w-2/4 flex-none">
                                                <div class="text-lg font-medium truncate" style="font-size: 28px;font-weight:600;">{{ $dsc }}</div>
                                                <div class="text-gray-600 mt-1" style="font-size: 16px;">Doktorantura, DSc</div>
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
                                                <th style="text-align: center;">Jami</th>
                                                <th style="text-align: center;">OTM</th>
                                                <th style="text-align: center;">ITM</th>
                                                <th style="text-align: center;">Boshqalari</th>
                                                <th style="text-align: center;">Ilmiy izlanuvchilar</th>
                                                <th style="text-align: center;">Qoniqarli</th>
                                                <th style="text-align: center;">Qoniqarsiz</th>
                                                <th style="text-align: center;">Qo‘shimcha o‘rganish talab etiladi</th>
                                                <th style="text-align: center;">Ko'rilmaganlari</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($regions as $region)
                                            <tr style="border-bottom: 1px solid #E6E6E6;">
                                                <td style="color:#1881D3; font-weight: 400;">
                                                    <a href="{{ route('tashkilot_turi_doktarantura', ['id' => $region->id]) }}">
                                                        {{ $region->oz }}
                                                    </a>
                                                </td>
                                                <td style="text-align: center;font-weight: 600;">{{ $region->tashkilots()->where('doktarantura_is', 1)->count() }} </td>
                                                <td style="text-align: center;">{{ $region->tashkilots()->where('doktarantura_is', 1)->where('tashkilot_turi', 'otm')->count() }} </td>
                                                <td style="text-align: center;">{{ $region->tashkilots()->where('doktarantura_is', 1)->where('tashkilot_turi', 'itm')->count() }} </td>
                                                <td style="text-align: center;">{{ $region->tashkilots()->where('doktarantura_is', 1)->where('tashkilot_turi', 'boshqa')->count() }} </td>
                                                <td style="text-align: center;">{{ $region->tashkilots()->where('status', 1)->withCount('doktaranturalar')->get()->sum('doktaranturalar_count') }} </td>

                                                @php
                                                    $qoniqarli = 0;
                                                    foreach ($region->tashkilots()->where('doktarantura_is', 1)->get() as $tashkilot) {
                                                        $qoniqarli += $tashkilot->doktaranturaexperts()->where('status', 'Qoniqarli')->count();
                                                    }
                                                @endphp

                                                <td style="text-align: center;">{{ $qoniqarli }}</td>

                                                @php
                                                    $qoniqarsiz = 0;
                                                    foreach ($region->tashkilots()->where('doktarantura_is', 1)->get() as $tashkilot) {
                                                        $qoniqarsiz += $tashkilot->doktaranturaexperts()->where('status', 'Qoniqarsiz')->count();
                                                    }
                                                @endphp

                                                <td style="text-align: center;">{{ $qoniqarsiz }}</td>

                                                 @php
                                                    $qushimcha = 0;
                                                    foreach ($region->tashkilots()->where('doktarantura_is', 1)->get() as $tashkilot) {
                                                        $qushimcha += $tashkilot->doktaranturaexperts()->where('status', 'Qo‘shimcha o‘rganish talab etiladi')->count();
                                                    }
                                                @endphp

                                                <td style="text-align: center;">{{ $qushimcha }}</td>
                                                @php
                                                    $count = 0;
                                                    foreach ($region->tashkilots()->where('doktarantura_is', 1)->get() as $tashkilot) {
                                                        $count += $tashkilot->doktaranturaexperts()->count();
                                                    }
                                                @endphp
                                                <td style="text-align: center;">{{ $region->tashkilots()->where('doktarantura_is', 1)->count()-$count }} </td>

                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            </div>

                    </div>
                </div>
            </div>
        </div>
@endsection
