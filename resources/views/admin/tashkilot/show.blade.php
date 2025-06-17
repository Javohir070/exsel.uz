@extends('layouts.admin')

@section('content')

    <div class="content">
        <div class="flex justify-between align-center mt-6 mb-6">

            <h2 class="intro-y text-lg font-medium">{{ $tashkilot->name }} xaqida ma’lumot</h2>

            @role('super-admin')
            <a href="{{ route("tashkilotlar.index") }}" class="button w-24 bg-theme-1 text-white">
                Orqaga
            </a>
            @endrole
            @role('admin')
            <a href="{{ route("tashkilot.index") }}" class="button w-24 bg-theme-1 text-white">
                Orqaga
            </a>
            @endrole
            @role('Itm-tashkilotlar')
            <a href="{{ route("itm.tashkilot") }}" class="button w-24 bg-theme-1 text-white">
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
                        <div style="font-size:18px;font-weight: 400;">{{ $tashkilot->name . "  " . $tashkilot->fish }}
                            Tashkilot pasporti</div>
                        @can("tashkilot delete edit")
                            <div style="text-align: end;">
                                <a href="{{ route('tashkilot.edit', ['tashkilot' => $tashkilot->id])}}"
                                    class="button w-24 bg-theme-1 text-white" style="margin-right:20px;">
                                    Tahrirlash
                                </a>
                                <a href="" class="button w-24 bg-theme-6 text-white">
                                    O'chirish
                                </a>
                            </div>
                        @endcan

                    </div>

                    <!-- <tr style="margin-top:20px;">
                                <th clab border" style="text-align: center;font-size:20px;"  colspan="3"> Tashkilot pasporti </th>
                            </tr> -->
                    <tr>
                        <th class="border border-b">#</th>
                        <th class="border border-b">Ma’lumot nomlanishi</th>
                        <th class="border border-b">Ma’lumot</th>
                    </tr>
                    <tr class="bg-gray-200">
                        <th class="border border-b">1</th>
                        <th class="border border-b">Tashkilot nomi</th>
                        <td class="border border-b">{{ $tashkilot->name }}</td>
                    </tr>
                    <tr>
                        <th class="border border-b">2</th>
                        <th class="border border-b">Tashkilot qisqa nomi massalan</th>
                        <td class="border border-b">{{ $tashkilot->name_qisqachasi }}</td>
                    </tr>
                    <tr class="bg-gray-200">
                        <th class="border border-b">3</th>
                        <th class="border border-b">Tashkil etilgan yil</th>
                        <td class="border border-b">{{ $tashkilot->tash_yil }}</td>
                    </tr>
                    <tr>
                        <th class="border border-b">4</th>
                        <th class="border border-b">Yuridik manzili</th>
                        <td class="border border-b">{{ $tashkilot->yur_manzil }}</td>
                    </tr>
                    <tr class="bg-gray-200">
                        <th class="border border-b">5</th>
                        <th class="border border-b">Viloyat manzili</th>
                        <td class="border border-b">{{ $tashkilot->viloyat }}</td>
                    </tr>
                    <tr>
                        <th class="border border-b">6</th>
                        <th class="border border-b">Tuman manzili</th>
                        <td class="border border-b">{{ $tashkilot->tuman }}</td>
                    </tr>
                    <tr class="bg-gray-200">
                        <th class="border border-b">7</th>
                        <th class="border border-b">Paoliyat yuritayetgan mahzili</th>
                        <td class="border border-b">{{ $tashkilot->paoliyat_manzil }}</td>
                    </tr>
                    <tr>
                        <th class="border border-b">8</th>
                        <th class="border border-b"> Telepon nomer</th>
                        <td class="border border-b">{{ $tashkilot->phone }}</td>
                    </tr>
                    <tr class="bg-gray-200">
                        <th class="border border-b">9</th>
                        <th class="border border-b">Email</th>
                        <td class="border border-b">{{ $tashkilot->email }}</td>
                    </tr>
                    <tr>
                        <th class="border border-b">10</th>
                        <th class="border border-b">Web-sayti</th>
                        <td class="border border-b">{{ $tashkilot->web_sayti }}</td>
                    </tr>
                    <tr class="bg-gray-200">
                        <th class="border border-b">11</th>
                        <th class="border border-b">Mulkchilik turi</th>
                        <td class="border border-b">{{ $tashkilot->turi }}</td>
                    </tr>

                    <tr>
                        <th class="border border-b">12</th>
                        <th class="border border-b"> Tashkilotni saqlash harajatlarining moliyalashtirish manbasi</th>
                        <td class="border border-b">{{ $tashkilot->xarajatlar }}</td>
                    </tr>
                    <tr class="bg-gray-200">
                        <th class="border border-b">13</th>
                        <th class="border border-b">Shtst birligi soni</th>
                        <td class="border border-b">{{ $tashkilot->shtat_bir }}</td>
                    </tr>
                    <tr>
                        <th class="border border-b">14</th>
                        <th class="border border-b">Xodimlar soni</th>
                        <td class="border border-b">{{ $tashkilot->tash_xodimlar }}</td>
                    </tr>
                    <tr class="bg-gray-200">
                        <th class="border border-b">15</th>
                        <th class="border border-b">Ilmiy xodimlar soni</th>
                        <td class="border border-b">{{ $tashkilot->ilmiy_xodimlar  }} </td>
                    </tr>
                    <tr>
                        <th class="border border-b">16</th>
                        <th class="border border-b">Boshqariv tuzilmasi</th>
                        <td class="border border-b">{{ $tashkilot->boshqariv  }} </td>
                    </tr>
                    <tr class="bg-gray-200">
                        <th class="border border-b">17</th>
                        <th class="border border-b">STIR raqami </th>
                        <td class="border border-b">{{ $tashkilot->stir_raqami  }} </td>
                    </tr>
                    <tr>
                        <th class="border border-b">18</th>
                        <th class="border border-b">Xizmat ko'rsatuvch bank</th>
                        <td class="border border-b">{{ $tashkilot->bank  }} </td>
                    </tr>
                    <tr class="bg-gray-200">
                        <th class="border-b  border">19</th>
                        <th class="border-b  border">Tashkilot hisob raqami </th>
                        <td class="border-b  border">{{ $tashkilot->hisob_raqam  }} </td>
                    </tr>

                </tbody>
            </table>
        </div>

    </div>

@endsection
