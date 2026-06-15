@extends("layouts.admin")
@section("content")
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12 xxl:col-span-12 grid grid-cols-12 gap-6">

            <div class="col-span-12 mt-2">
                <div class="intro-y flex items-center justify-between h-10">
                    <h2 class="text-lg font-medium truncate mr-5">
                        {{ $tashkilot->name }} haqida ma'lumotlar
                    </h2>
                    <a href="{{ route('tashkilot.show', ['tashkilot' => $tashkilot->id]) }}"
                        class="button w-auto bg-theme-1 text-white whitespace-nowrap">
                        Tashkilot pasporti
                    </a>
                </div>

                <div class="overflow-x-auto box mt-5 p-5">
                    <h3 class="text-base font-medium mb-4 text-theme-1">Tashkilot pasporti</h3>
                    <table class="table">
                        <tbody>
                            <tr class="bg-gray-200">
                                <th class="border-b border" style="width: 25%;">Tashkilot nomi</th>
                                <td class="border-b border">{{ $tashkilot->name }}</td>
                                <th class="border-b border" style="width: 25%;">Qisqa nomi</th>
                                <td class="border-b border">{{ $tashkilot->name_qisqachasi }}</td>
                            </tr>
                            <tr>
                                <th class="border-b border">Tashkilot turi</th>
                                <td class="border-b border">
                                    {{ $tashkilot->tashkilot_turi == 'itm' ? 'ITM' : ($tashkilot->tashkilot_turi == 'otm' ? 'OTM' : ($tashkilot->tashkilot_turi ?? '—')) }}
                                </td>
                                <th class="border-b border">Viloyat</th>
                                <td class="border-b border">{{ $tashkilot->region->oz ?? $tashkilot->viloyat }}</td>
                            </tr>
                            <tr class="bg-gray-200">
                                <th class="border-b border">Tashkil etilgan yil</th>
                                <td class="border-b border">{{ $tashkilot->tash_yil }}</td>
                                <th class="border-b border">STIR raqami</th>
                                <td class="border-b border">{{ $tashkilot->stir_raqami }}</td>
                            </tr>
                            <tr>
                                <th class="border-b border">Yuridik manzili</th>
                                <td class="border-b border" colspan="3">{{ $tashkilot->yur_manzil }}</td>
                            </tr>
                            <tr class="bg-gray-200">
                                <th class="border-b border">Tuman</th>
                                <td class="border-b border">{{ $tashkilot->tuman }}</td>
                                <th class="border-b border">Faoliyat manzili</th>
                                <td class="border-b border">{{ $tashkilot->paoliyat_manzil }}</td>
                            </tr>
                            <tr>
                                <th class="border-b border">Telefon</th>
                                <td class="border-b border">{{ $tashkilot->phone }}</td>
                                <th class="border-b border">Email</th>
                                <td class="border-b border">{{ $tashkilot->email }}</td>
                            </tr>
                            <tr class="bg-gray-200">
                                <th class="border-b border">Web-sayti</th>
                                <td class="border-b border">{{ $tashkilot->web_sayti }}</td>
                                <th class="border-b border">Mulkchilik turi</th>
                                <td class="border-b border">{{ $tashkilot->turi }}</td>
                            </tr>
                            <tr>
                                <th class="border-b border">Moliyalashtirish manbasi</th>
                                <td class="border-b border">{{ $tashkilot->xarajatlar }}</td>
                                <th class="border-b border">Boshqaruv tuzilmasi</th>
                                <td class="border-b border">{{ $tashkilot->boshqariv }}</td>
                            </tr>
                            <tr class="bg-gray-200">
                                <th class="border-b border">Shtat birligi</th>
                                <td class="border-b border">{{ $tashkilot->shtat_bir }}</td>
                                <th class="border-b border">Xodimlar soni</th>
                                <td class="border-b border">{{ $tashkilot->tash_xodimlar }} / {{ $tashkilot->xodimlar_count }}</td>
                            </tr>
                            <tr>
                                <th class="border-b border">Ilmiy xodimlar soni</th>
                                <td class="border-b border">{{ $tashkilot->ilmiy_xodimlar }}</td>
                                <th class="border-b border">Bank / Hisob raqami</th>
                                <td class="border-b border">{{ $tashkilot->bank }} {{ $tashkilot->hisob_raqam ? ' / ' . $tashkilot->hisob_raqam : '' }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="intro-y mt-6 mb-2">
                    <h3 class="text-base font-medium">Tashkilotga tegishli ma'lumotlar </h3>
                </div>

                <div class="grid grid-cols-12 gap-6 mt-3">
                    @foreach ($cards as $card)
                        <div class="col-span-12 sm:col-span-6 xxl:col-span-3 intro-y">
                            <div class="mini-report-chart box p-2 zoom-in" style="border-radius: 20px;">
                                <a href="{{ route('tashkilotmalumotlar.bolim', ['tashkilotmalumotlar' => $id, 'section' => $card['section']]) }}">
                                    <div class="flex items-center pl-5"
                                        style="justify-content:left; align-items: center; height: 100%; gap:20px;">
                                        <div class="flex" style="background: {{ $card['bg'] }}; padding: 15px; border-radius: 100%;">
                                            <i data-feather="{{ $card['icon'] }}" class="report-box__icon text-theme-3"
                                                style="color: {{ $card['color'] }};"></i>
                                        </div>
                                        <div class="w-2/4 flex-none">
                                            <div class="text-lg font-medium truncate" style="font-size: 28px;font-weight:600;">
                                                {{ $card['count'] }}
                                            </div>
                                            <div class="text-gray-600 mt-1" style="font-size: 16px;">{{ $card['label'] }}</div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
