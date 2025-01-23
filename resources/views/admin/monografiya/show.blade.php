@extends('layouts.admin')

@section('content')
<div class="content">
    <div class="flex justify-between align-center mt-10">

        <h2 class="intro-y text-lg font-medium">{{ $monografiyalar->name }} monografiya </h2>

        <a href="{{ route('monografiyalar.index') }}" class="button w-24 bg-theme-1 text-white">
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
                    <div style="font-size:18px;font-weight: 400;">{{ $monografiyalar->name }} monografiya ma’lumot</div>
                    <div style="text-align: end;">
                        <a href="{{ route('monografiyalar.edit', ['monografiyalar' => $monografiyalar->id]) }}"
                            class="button w-24 bg-theme-1 text-white" style="margin-right:20px;">
                            Tahrirlash
                        </a>

                    </div>
                </div>
                <tr>
                    <th class="border border-b-2 " style="width: 100%;font-size:16px;text-align:center;" colspan="2">
                        Ma’lumotlar</th>
                </tr>

                <!-- monografiyalar nomi -->
                <tr class="bg-gray-100">
                    <td class="border px-4 py-2 font-semibold text-gray-700">Monografiya nomi</td>
                    <td class="border px-4 py-2 font-semibold text-gray-700">Mualaliflar</td>
                </tr>

                <!-- monografiyalar raqami -->
                <tr>
                    <td class="border px-4 py-2">{{ $monografiyalar->name }}</td>
                    <td class="border px-4 py-2">
                        @foreach(json_decode($monografiyalar->mualliflar_json) as $muallif)
                        <div>{{ $muallif }},</div>
                    @endforeach
                </td>
                </tr>

                <!-- Joyiye obyekti -->
                <tr class="bg-gray-100">
                    <td class="border px-4 py-2 font-semibold text-gray-700">Nashr yili</td>
                    <td class="border px-4 py-2 font-semibold text-gray-700">Til</td>
                </tr>

                <!-- Joyiye maqsadi -->
                <tr>
                    <td class="border px-4 py-2">{{ $monografiyalar->nashr_yili }}</td>
                    <td class="border px-4 py-2">{{ $monografiyalar->til }}</td>
                </tr>

                <!-- Joyiye asos -->
                <tr class="bg-gray-100">
                    <td class="border px-4 py-2 font-semibold text-gray-700">Chop etilgan nashriyot</td>
                    <td class="border px-4 py-2 font-semibold text-gray-700">Fan yo‘nalishi</td>
                </tr>

                <!-- Joyiye tashkilot -->
                <tr>
                    <td class="border px-4 py-2">{{ $monografiyalar->chop_etil_nashriyot }}</td>
                    <td class="border px-4 py-2">{{ $monografiyalar->fan_yunalishi }}</td>
                </tr>

                <!-- Joyiye tarmoq -->
                <tr class="bg-gray-100">
                    <td class="border px-4 py-2 font-semibold text-gray-700">Asoslovchi hujjat(elektron variant)</td>
                    <td class="border px-4 py-2 font-semibold text-gray-700">KBK</td>
                </tr>

                <!-- Asoslovchi hujjat -->
                <tr>
                    <td class="border px-4 py-2">
                        @if ($monografiyalar->asoslovchi_hujjat)
                            <a href="{{ asset('storage/' . $monografiyalar->asoslovchi_hujjat) }}" target="_blank"
                                class="text-blue-500 underline" style="text-decoration: none">
                                Yuklab olish
                            </a>
                        @else
                            <span class="text-red-500">Fayl mavjud emas</span>
                        @endif
                    </td>
                    <td class="border px-4 py-2">{{ $monografiyalar->kbk }}</td>
                </tr>

                <tr class="bg-gray-100">
                    <td class="border px-4 py-2 font-semibold text-gray-700">ISBN</td>
                    <td class="border px-4 py-2 font-semibold text-gray-700"></td>
                </tr>

                <!-- Asoslovchi hujjat -->
                <tr>

                    <td class="border px-4 py-2">{{ $monografiyalar->isbn }}</td>
                    <td class="border px-4 py-2"></td>
                </tr>

            </tbody>
        </table>
    </div>





</div>






</div>
@endsection
