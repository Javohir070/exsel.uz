@extends('layouts.admin')
@section('content')
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12 xxl:col-span-12 grid grid-cols-12 gap-6">
            <div class="col-span-12 mt-8">


                <div class="grid grid-cols-12 gap-6 mt-5">


                    <style>
                        .report-box__icon {
                            width: 32px;
                            height: 32px;
                        }
                    </style>

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
                                            {{ $loy_count }}/{{ $loy_expert }}</div>
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
                                            {{ $stajirovka_count }}/{{ $stajirovka_expert }}</div>
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
                                            {{ $asboblar_count }}/{{ $asboblar_expert }}</div>
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
                                            {{ $doktarantura }}/{{ $doktarantura_expert }}</div>
                                        <div class="text-gray-600 mt-1" style="font-size: 16px;">Ilmiy izlanuvchilar</div>
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
                                        <th class="whitespace-no-wrap" style="text-align: center;">Ilmiy stajirovka</th>
                                        <th class="whitespace-no-wrap" style="text-align: center;">Asbob-uskunalar</th>
                                        <th class="whitespace-no-wrap" style="text-align: center;">Ilmiy izlanuvchilar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($regions as $region)
                                        <tr style="border-bottom: 1px solid #E6E6E6;">
                                            <td style="color:#1881D3; font-weight: 400;">
                                                <a href="{{ route('tashkilot_region', ['id' => $region->id]) }}">
                                                    {{ $region->oz }}
                                                </a>
                                            </td>
                                            <td style="text-align: center;font-weight: 600;">
                                                {{ $region->tashkilots()->where('status', 1)->count() }} </td>
                                            <td style="text-align: center;">
                                                {{ $region->tashkilots()->where('status', 1)->where('tashkilot_turi', 'otm')->count() }}
                                            </td>
                                            <td style="text-align: center;">
                                                {{ $region->tashkilots()->where('status', 1)->where('tashkilot_turi', 'itm')->count() }}
                                            </td>
                                            <td style="text-align: center;">
                                                {{ $region->tashkilots()->where('status', 1)->where('tashkilot_turi', 'boshqa')->count() }}
                                            </td>
                                            <td style="text-align: center;">
                                                {{ $region->tashkilots()->where('status', 1)->where('ilmiyloyiha_is', 1)->withCount([
                                                        'ilmiyloyhalar' => function ($q) {
                                                            $q->where('is_active', 1);
                                                        },
                                                    ])->get()->sum('ilmiyloyhalar_count') }}
                                            </td>
                                            <td style="text-align: center;">
                                                {{ $region->tashkilots()->where('status', 1)->withCount([
                                                        'stajirovkalar' => function ($q) {
                                                            $q->where('quarter', 2);
                                                        },
                                                    ])->get()->sum('stajirovkalar_count') }}
                                            </td>
                                            <td style="text-align: center;">
                                                {{ $region->tashkilots()->where('status', 1)->withCount([
                                                        'asbobuskunalar' => function ($q) {
                                                            $q->where('is_active', 1);
                                                        },
                                                    ])->get()->sum('asbobuskunalar_count') }}
                                            </td>
                                            <td style="text-align: center;">
                                                {{ $region->tashkilots()->where('status', 1)->withCount([
                                                        'doktaranturalar' => function ($q) {
                                                            $q->where('quarter', 2);
                                                        },
                                                    ])->get()->sum('doktaranturalar_count') }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>


                    <div class="col-span-12 mt-2 " style="background: white; border-radius: 10px;">
                        <div class="intro-y block sm:flex items-center py-4" style="display: flex;justify-content: space-between;">
                            <h2 class="text-lg font-medium truncate ml-4" style="font-size: 24px;font-weight:500;">
                                Tashkilotlar kesimida
                            </h2>
                            <div class="relative text-gray-700" >
                                <select name="viloyat" value="{{ old('viloyat') }}"
                                    class="science-sub-categoryviloyat input border w-full mt-2 ">
                                    <option value="">Viloyatni tanlang</option>
                                    <option value="all">Barchasi</option>
                                    @foreach ($regions as $region)
                                        <option value="{{ $region->id }}"
                                            {{ request('viloyat') == $region->id ? 'selected' : '' }}>
                                            {{ $region->oz }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="intro-y overflow-auto lg:overflow-visible mt-8 sm:mt-0">
                            <table class="table">
                                <thead style="background: #F4F8FC;">
                                    <tr>
                                        <th class="whitespace-no-wrap">Hudud nomi</th>
                                        <th class="whitespace-no-wrap" style="text-align: center;">Ilmiy loyihalar</th>
                                        <th class="whitespace-no-wrap" style="text-align: center;">Ilmiy stajirovka</th>
                                        <th class="whitespace-no-wrap" style="text-align: center;">Asbob-uskunalar</th>
                                        <th class="whitespace-no-wrap" style="text-align: center;">Ilmiy izlanuvchilar
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tashkilotlar as $region)
                                        <tr style="border-bottom: 1px solid #E6E6E6;">
                                            <td style="color:#1881D3; font-weight: 400;">
                                                {{ $region->name }}
                                            </td>

                                            <td style="text-align:center;">
                                                {{ $region->ilmiyloyha_count }}/{{ $region->tekshirivchilar_count }}
                                            </td>

                                            <td style="text-align:center;">
                                                {{ $region->stajirovka_count }}/{{ $region->stajirovkaexperts_count }}
                                            </td>

                                            <td style="text-align:center;">
                                                {{ $region->asbob_count }}/{{ $region->asbobuskunaexpert_count }}
                                            </td>

                                            <td style="text-align:center;">
                                                {{ $region->dok_count_q2 }}/{{ $region->dok_count_status }}
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                        <div style="padding: 20px;">
                            {{ $tashkilotlar->appends(request()->all())->links() }}
                        </div>
                    </div>




                </div>
            </div>
        </div>
    </div>

    <script>
        document.querySelector('.science-sub-categoryviloyat').addEventListener('change', function() {
            let viloyat = this.value;

            // Sahifani GET so‘rov bilan qayta yuklash
            let url = new URL(window.location.href);
            url.searchParams.set('viloyat', viloyat);

            window.location.href = url.toString();
        });
    </script>
@endsection
