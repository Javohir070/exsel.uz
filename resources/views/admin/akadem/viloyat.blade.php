@extends('layouts.admin')
@section('content')
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12 xxl:col-span-12 grid grid-cols-12 gap-6">
            <div class="col-span-12 mt-8">
                <div class="grid grid-cols-12 gap-6 mt-5">

                    <div class="col-span-12 sm:col-span-6 xxl:col-span-3 intro-y">
                        <div class="mini-report-chart box p-2 zoom-in" style="border-radius: 20px;">
                            <div class="flex items-center pl-5"
                                style="justify-content:left; align-items: center;  height: 100%; gap:20px;">
                                <div class="flex" style="background: #E4F0FB; padding: 15px; border-radius: 100%;">
                                    <i data-feather="home" class="report-box__icon text-theme-3"></i>
                                </div>
                                <div class="w-2/4 flex-none">
                                    <div class="text-lg font-medium truncate" style="font-size: 28px;font-weight:600;">
                                        {{ $tashkilots }}</div>
                                    <div class="text-gray-600 mt-1" style="font-size: 16px;">Tashkilotlar</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-span-12 sm:col-span-6 xxl:col-span-3 intro-y">
                        <div class="mini-report-chart box p-2 zoom-in" style="border-radius: 20px;">
                            <div class="flex items-center pl-5"
                                style="justify-content:left; align-items: center;  height: 100%; gap:20px;">
                                <div class="flex" style="background: #EBFBEB; padding: 15px; border-radius: 100%;">
                                    <i data-feather="git-pull-request" class="report-box__icon text-theme-3"
                                        style="color: #00A705;"></i>
                                </div>
                                <div class="w-2/4 flex-none">
                                    <div class="text-lg font-medium truncate" style="font-size: 28px;font-weight:600;">
                                        {{ $akadem_count }}/{{ $akadem_expert }}</div>
                                    <div class="text-gray-600 mt-1" style="font-size: 16px;">Akademik harakatchanlik</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-span-12 sm:col-span-6 xxl:col-span-3 intro-y">
                        <div class="mini-report-chart box p-2 zoom-in" style="border-radius: 20px;">
                            <a href="{{ route('akadem.index') }}">
                                <div class="flex items-center pl-5"
                                    style="justify-content:left; align-items: center;  height: 100%; gap:20px;">
                                    <div class="flex" style="background: #EBFBEB; padding: 15px; border-radius: 100%;">
                                        <i data-feather="git-pull-request" class="report-box__icon text-theme-3"
                                            style="color: #00A705;"></i>
                                    </div>
                                    <div class="w-2/4 flex-none">
                                        <div class="text-lg font-medium truncate" style="font-size: 28px;font-weight:600;">
                                            {{ $akadems_count }}</div>
                                        <div class="text-gray-600 mt-1" style="font-size: 16px;">Jami akademik harakatchanlik</div>
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
                                        <th style="text-align: center;">Ilmiy stajirovka</th>
                                        <th style="text-align: center;">Ijobiy</th>
                                        <th style="text-align: center;">Salbiy</th>
                                        <th style="text-align: center;">Qo‘shimcha o‘rganish talab etiladi</th>
                                        <th style="text-align: center;">Ko'rilmaganlari</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($regions as $region)
                                        <tr style="border-bottom: 1px solid #E6E6E6;">
                                            <td style="color:#1881D3; font-weight: 400;">
                                                <a href="{{ route('tashkilot_turi_akadem', ['id' => $region->id]) }}">
                                                    {{ $region->oz }}
                                                </a>
                                            </td>
                                            <td style="text-align: center;font-weight: 600;">
                                                {{ $region->tashkilots()->where('akadem_is', 1)->count() }} </td>
                                            <td style="text-align: center;">
                                                {{ $region->tashkilots()->where('akadem_is', 1)->where('tashkilot_turi', 'otm')->count() }}
                                            </td>
                                            <td style="text-align: center;">
                                                {{ $region->tashkilots()->where('akadem_is', 1)->where('tashkilot_turi', 'itm')->count() }}
                                            </td>
                                            <td style="text-align: center;">
                                                {{ $region->tashkilots()->where('akadem_is', 1)->where('tashkilot_turi', null)->count() }}
                                            </td>

                                            <td style="text-align: center;">
                                                {{ $region->tashkilots()->where('akadem_is', 1)->whereHas('akademlar', function ($q) {
                                                        $q->where('is_active', 1);
                                                    })->withCount([
                                                        'akademlar as akademlar_count' => function ($q) {
                                                            $q->where('is_active', 1);
                                                        },
                                                    ])->get()->sum('akademlar_count') }}
                                            </td>

                                            @php
                                                $ijobiy = 0;
                                                foreach (
                                                    $region->tashkilots()->where('akadem_is', 1)->get()
                                                    as $tashkilot
                                                ) {
                                                    $ijobiy += $tashkilot
                                                        ->akademexperts()
                                                        ->where('quarter', 1)
                                                        ->where('status', 'Ijobiy')
                                                        ->count();
                                                }
                                            @endphp

                                            @php
                                                $qoniqarli = 0;
                                                foreach (
                                                    $region->tashkilots()->where('akadem_is', 1)->get()
                                                    as $tashkilot
                                                ) {
                                                    $qoniqarli += $tashkilot
                                                        ->akademexperts()
                                                        ->where('quarter', 1)
                                                        ->where('status', 'Qoniqarli')
                                                        ->count();
                                                }
                                            @endphp

                                            <td style="text-align: center;">{{ $ijobiy + $qoniqarli }}</td>

                                            @php
                                                $qoniqarsiz = 0;
                                                foreach (
                                                    $region->tashkilots()->where('akadem_is', 1)->get()
                                                    as $tashkilot
                                                ) {
                                                    $qoniqarsiz += $tashkilot
                                                        ->akademexperts()
                                                        ->where('quarter', 1)
                                                        ->where('status', 'Salbiy')
                                                        ->count();
                                                }
                                            @endphp

                                            <td style="text-align: center;">{{ $qoniqarsiz }}</td>

                                            @php
                                                $qushimcha = 0;
                                                foreach (
                                                    $region->tashkilots()->where('akadem_is', 1)->get()
                                                    as $tashkilot
                                                ) {
                                                    $qushimcha += $tashkilot
                                                        ->stajirovkaexperts()
                                                        ->where('quarter', 1)
                                                        ->where('status', 'Qo‘shimcha o‘rganish talab etiladi')
                                                        ->count();
                                                }
                                            @endphp

                                            <td style="text-align: center;">{{ $qushimcha }}</td>

                                            @php
                                                $count = 0;
                                                foreach (
                                                    $region->tashkilots()->where('akadem_is', 1)->get()
                                                    as $tashkilot
                                                ) {
                                                    $count += $tashkilot
                                                        ->akademexperts()
                                                        ->where('quarter', 1)
                                                        ->count();
                                                }
                                            @endphp

                                            <td style="text-align: center;">
                                                {{ $region->tashkilots()->where('akadem_is', 1)->whereHas('akademlar', function ($q) {
                                                        $q->where('is_active', 1);
                                                    })->withCount([
                                                        'akademlar as akademlar_count' => function ($q) {
                                                            $q->where('is_active', 1);
                                                        },
                                                    ])->get()->sum('akademlar_count') - $count }}
                                            </td>
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
