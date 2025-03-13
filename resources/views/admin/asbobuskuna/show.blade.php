@extends('layouts.admin')

@section('content')

    <div class="content">
        <div class="flex justify-between align-center mt-10">

            <h2 class="intro-y text-lg font-medium">{{ $asbobuskuna->name }}</h2>
            @role('super-admin')
            <a href="{{ route("asbobuskunalar.index") }}" class="button w-24 bg-theme-1 text-white">
                Orqaga
            </a>
            @endrole
            @role('admin')
            <a href="{{ route("asbobuskuna.index") }}" class="button w-24 bg-theme-1 text-white">
                Orqaga
            </a>
            @endrole

        </div>
        @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif

        <div class="overflow-x-auto" style="background-color: white;margin-top:30px;border-radius:8px;padding:30px 20px;">
            <table class="table">
                <tbody>
                    <div
                        style="display: flex;justify-content: space-between; border-bottom: 1px solid #e2e8f0; padding-bottom: 20px;">
                        <div style="font-size:18px;font-weight: 400;"> {{$asbobuskuna->name}} xaqida ma’lumot</div>
                        @can("tashkilotrahbari delete edit")

                            <div style="text-align: end;">
                                <a href="{{ route('asbobuskuna.edit', ['asbobuskuna' => $asbobuskuna->id])}}"
                                    class="button w-24 bg-theme-1 text-white" style="margin-right:20px;">
                                    Tahrirlash
                                </a>
                                <a href="" class="button w-24 bg-theme-6 text-white">
                                    O'chirish
                                </a>
                            </div>
                        @endcan
                    </div>
                    <tr>
                        <!-- <th class="whitespace-no-wrap border" style="width: 40px";>#</th>
                                    <th class="whitespace-no-wrap border" style="width:50%;">Ma’lumot nomlanishi</th> -->
                        <th class=" border" style="width: 100%; font-size:16px;text-align:center;" colspan="2">Ma’lumot</th>
                    </tr>
                    <tr class="bg-gray-200">
                        <th class=" border" style="width:50%;">Nomi</th>
                        <th class=" border" style="width:50%;">Model</th>
                    </tr>
                    <tr>
                        <td class="border">{{ $asbobuskuna->name }}</td>
                        <td class="border">{{ $asbobuskuna->model }}</td>
                    </tr>
                    <tr class="bg-gray-200">
                        <th class=" border">Turi</th>
                        <th class=" border">Ishlab chiqilgan davlat</th>
                    </tr>
                    <tr>
                        <td class="border">{{ $asbobuskuna->turi }} </td>
                        <td class="border">{{ $asbobuskuna->ishlab_davlat }} </td>
                    </tr>

                    <tr class="bg-gray-200">
                        <th class=" border">Ishlab chiqilgan yili</th>
                        <th class=" border">Harid qilingan summasi
                            (buxgalteriya balans summasi)</th>
                    </tr>
                    <tr>
                        <td class="border">{{ $asbobuskuna->ishlabchiq_yil  }}</td>
                        <td class="border">{{ $asbobuskuna->harid_summa  }} so'm</td>
                    </tr>

                    <tr class="bg-gray-200">
                        <th class="border">Buxgalteriya bo'yicha qoldiq summasi</th>
                        <th class="border">Moliyalashtirish manbasi</th>
                    </tr>
                    <tr>
                        <td class="border">{{ $asbobuskuna->buxgalteriya_summa  }} so'm</td>
                        <td class="border">{{ $asbobuskuna->moliya_manbasi  }}</td>
                    </tr>

                    <tr class="bg-gray-200">
                        <th class="border">Loyiha shifri</th>
                        <th class="border">Shartnoma raqami
                            (uskuna bo'yicha)</th>
                    </tr>
                    <tr>
                        <td class="border">{{ $asbobuskuna->loy_shifri  }}</td>
                        <td class="border">{{ $asbobuskuna->sh_raqami  }}</td>
                    </tr>

                    <tr class="bg-gray-200">
                        <th class="border">Shartnoma sanasi</th>
                        <th class="border">Harid qilingan yili</th>
                    </tr>
                    <tr>
                        <td class="border">{{ $asbobuskuna->sh_sanasi  }}</td>
                        <td class="border">{{ $asbobuskuna->harid_qilingan_yil  }}</td>
                    </tr>

                    <tr class="bg-gray-200">
                        <th class="border">Holati</th>
                        <th class="border">O‘rnatilgan yili</th>
                    </tr>
                    <tr>
                        <td class="border">{{ $asbobuskuna->holati  }}</td>
                        <td class="border">{{ $asbobuskuna->urnatilgan_yili  }}</td>
                    </tr>

                    <tr class="bg-gray-200">
                        <th class="border">Foydalanishga mas'ul tarkibiy bo‘linma (laboratoriya, kafedra, sho‘ba) nomi</th>
                        <th class="border">FIO</th>
                    </tr>
                    <tr>
                        <td class="border">{{ $asbobuskuna->laboratory->name ?? $asbobuskuna->kafedralar->name }}</td>
                        <td class="border">{{ $asbobuskuna->fish  }}</td>
                    </tr>

                    <tr class="bg-gray-200">
                        <th class="border">Javobgar etib belgilanganligi to‘g‘risida buyruq raqami</th>
                        <th class="border">Javobgar etib belgilanganligi to‘g‘risida buyruq sanasi</th>
                    </tr>
                    <tr>
                        <td class="border">{{ $asbobuskuna->jav_buy_raqami  }}</td>
                        <td class="border">{{ $asbobuskuna->jav_sanasi  }}</td>
                    </tr>

                </tbody>
            </table>
        </div>

    </div>


@endsection
