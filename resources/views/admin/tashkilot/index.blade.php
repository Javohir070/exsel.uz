@extends('layouts.admin')

@section('content')
    <div class="content">
        <div class="flex justify-between align-center mt-6 mb-6">

            <h2 class="intro-y text-lg font-medium">{{ $tashkilot->name }} xaqida ma’lumot</h2>

            <a href="{{ route('tashkilot.index') }}" class="button w-24 bg-theme-1 text-white">
                Orqaga
            </a>

        </div>

        @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif

        <div class="overflow-x-auto" style="background-color: white;margin-top:30px;border-radius:8px;padding:30px 20px;">
            <table class="table">
                <tbody>
                    <div
                        style="display: flex;justify-content: space-between; border-bottom: 1px solid #e2e8f0; padding-bottom: 20px;">
                        <div style="font-size:18px;font-weight: 400;">{{ $tashkilot->name . '  ' . $tashkilot->fish }}
                            Tashkilot pasporti</div>
                        <div style="text-align: end;">
                            <a href="{{ route('tashkilot.edit', ['tashkilot' => $tashkilot->id]) }}"
                                class="button w-24 bg-theme-1 text-white" style="margin-right:20px;">
                                Tahrirlash
                            </a>
                            <a href="" class="button w-24 bg-theme-6 text-white">
                                O'chirish
                            </a>
                        </div>
                    </div>

                    <tr>
                        <th class="border-b  border" style="width: 100%;text-align:center;font-size:16px;" colspan="2">
                            Ma’lumot</th>
                    </tr>
                    <tr class="bg-gray-200">
                        <th class="border-b  border" style="width: 50%;">Tashkilot nomi</th>
                        <th class="border-b  border" style="width: 50%;">Tashkilot qisqa nomi masalan</th>
                    </tr>
                    <tr>
                        <td class="border-b  border">{{ $tashkilot->name }}</td>
                        <td class="border-b  border">{{ $tashkilot->name_qisqachasi }}</td>
                    </tr>
                    <tr class="bg-gray-200">
                        <th class="border-b  border">Tashkil etilgan yil</th>
                        <th class="border-b  border">Yuridik manzili</th>
                    </tr>
                    <tr>
                        <td class="border-b  border">{{ $tashkilot->tash_yil }}</td>
                        <td class="border-b  border">{{ $tashkilot->yur_manzil }}</td>
                    </tr>
                    <tr class="bg-gray-200">
                        <th class="border-b  border">Viloyat manzili</th>
                        <th class="border-b  border">Tuman manzili</th>
                    </tr>
                    <tr>
                        <td class="border-b  border">{{ $tashkilot->viloyat }}</td>
                        <td class="border-b  border">{{ $tashkilot->tuman }}</td>
                    </tr>
                    <tr class="bg-gray-200">
                        <th class="border-b  border">Faoliyat yuritayotgan manzili</th>
                        <th class="border-b  border"> Telefon raqami</th>
                    </tr>
                    <tr>
                        <td class="border-b  border">{{ $tashkilot->paoliyat_manzil }}</td>
                        <td class="border-b  border">{{ $tashkilot->phone }}</td>
                    </tr>
                    <tr class="bg-gray-200">
                        <th class="border-b  border">Email</th>
                        <th class="border-b  border">Web-sayti</th>
                    </tr>
                    <tr>
                        <td class="border-b  border">{{ $tashkilot->email }}</td>
                        <td class="border-b  border">{{ $tashkilot->web_sayti }}</td>
                    </tr>
                    <tr class="bg-gray-200">
                        <th class="border-b  border">Mulkchilik turi</th>
                        <th class="border-b  border"> Tashkilotni saqlash harajatlarining moliyalashtirish manbasi</th>
                    </tr>
                    <tr>
                        <td class="border-b  border">{{ $tashkilot->turi }}</td>
                        <td class="border-b  border">{{ $tashkilot->xarajatlar }}</td>
                    </tr>
                    <tr class="bg-gray-200">
                        <th class="border-b  border">Shtat birligi soni</th>
                        <th class="border-b  border">Xodimlar soni</th>
                    </tr>
                    <tr>
                        <td class="border-b  border">{{ $tashkilot->shtat_bir }}</td>
                        <td class="border-b  border">{{ $tashkilot->tash_xodimlar }}</td>
                    </tr>
                    <tr class="bg-gray-200">
                        <th class="border-b  border">Ilmiy xodimlar soni</th>
                        <th class="border-b  border">Boshqariv tuzilmasi</th>
                    </tr>
                    <tr>
                        <td class="border-b  border">{{ $tashkilot->ilmiy_xodimlar }} </td>
                        <td class="border-b  border">{{ $tashkilot->boshqariv }} </td>
                    </tr>
                    <tr class="bg-gray-200">
                        <th class="border-b  border">STIR raqami </th>
                        <th class="border-b  border">Xizmat ko'rsatuvch bank</th>
                    </tr>
                    <tr>
                        <td class="border-b  border">{{ $tashkilot->stir_raqami }} </td>
                        <td class="border-b  border">{{ $tashkilot->bank }} </td>
                    </tr>
                    <tr class="bg-gray-200">
                        <th class="border-b  border" colspan="2">Tashkilot hisob raqami </th>
                    </tr>
                    <tr>
                        <td class="border-b  border" colspan="2">{{ $tashkilot->hisob_raqam }} </td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
@endsection
