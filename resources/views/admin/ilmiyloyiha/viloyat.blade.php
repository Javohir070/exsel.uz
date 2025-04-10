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
                                    <a href="{{ route('ilmiyloyihalar.index') }}">
                                        <div class="flex items-center pl-5" style="justify-content:left; align-items: center;  height: 100%; gap:20px;">
                                            <div class="flex" style="background: #E4F0FB; padding: 15px; border-radius: 100%;">
                                                <i data-feather="home" class="report-box__icon text-theme-3" ></i>
                                            </div>
                                            <div class="w-2/4 flex-none">
                                                <div class="text-lg font-medium truncate" style="font-size: 28px;font-weight:600;">{{ $tashkilots }}</div>
                                                <div class="text-gray-600 mt-1" style="font-size: 16px;">Tashkilotlar</div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>

                            <div class="col-span-12 sm:col-span-6 xxl:col-span-3 intro-y">
                                <div class="mini-report-chart box p-2 zoom-in" style="border-radius: 20px;">
                                    <a href="{{ route('ilmiyloyihalar.index') }}">
                                        <div class="flex items-center pl-5" style="justify-content:left; align-items: center;  height: 100%; gap:20px;">
                                            <div class="flex" style="background: #E4F0FB; padding: 15px; border-radius: 100%;">
                                                <i data-feather="list" class="report-box__icon text-theme-3" ></i>
                                            </div>
                                            <div class="w-2/4 flex-none">
                                                <div class="text-lg font-medium truncate" style="font-size: 28px;font-weight:600;">{{ $loy_count }}/{{ $loy_expert }}</div>
                                                <div class="text-gray-600 mt-1" style="font-size: 16px;">Ilmiy loyihalar</div>
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
                                                <th class="whitespace-no-wrap" style="text-align: center;">Jami</th>
                                                <th class="whitespace-no-wrap" style="text-align: center;">OTM</th>
                                                <th class="whitespace-no-wrap" style="text-align: center;">Ilmiy tashkilotlar</th>
                                                <th class="whitespace-no-wrap" style="text-align: center;">Boshqa tashkilotlar</th>
                                                <th class="whitespace-no-wrap" style="text-align: center;">Ilmiy loyihalar</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($regions as $region)
                                            <tr style="border-bottom: 1px solid #E6E6E6;">
                                                <td style="color:#1881D3; font-weight: 400;">
                                                    <a href="{{ route('tashkilot_turi', ['id' => $region->id]) }}">
                                                        {{ $region->oz }}
                                                    </a>
                                                </td>
                                                <td style="text-align: center;font-weight: 600;">{{ $region->tashkilots()->where('ilmiyloyiha_is', 1)->count() }} </td>
                                                <td style="text-align: center;">{{ $region->tashkilots()->where('ilmiyloyiha_is', 1)->where('tashkilot_turi', 'otm')->count() }} </td>
                                                <td style="text-align: center;">{{ $region->tashkilots()->where('ilmiyloyiha_is', 1)->where('tashkilot_turi', 'itm')->count() }} </td>
                                                <td style="text-align: center;">{{ $region->tashkilots()->where('ilmiyloyiha_is', 1)->where('tashkilot_turi', 'boshqa')->count() }} </td>
                                                <td style="text-align: center;">
                                                    {{
                                                        $region->tashkilots()->where('ilmiyloyiha_is', 1)
                                                            ->withCount(['ilmiyloyhalar' => function ($q) {
                                                                $q->where('is_active', 1);
                                                            }])
                                                            ->get()
                                                            ->sum('ilmiyloyhalar_count');
                                                    }}
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
