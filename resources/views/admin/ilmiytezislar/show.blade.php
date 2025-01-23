@extends('layouts.admin')

@section('content')
<div class="content">
    <div class="flex justify-between align-center mt-10">

        <h2 class="intro-y text-lg font-medium">{{ $ilmiytezislar->mavzu }} ilmiy tezis </h2>

        <a href="{{ route('ilmiytezislar.index') }}" class="button w-24 bg-theme-1 text-white">
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
                    <div style="font-size:18px;font-weight: 400;">{{ $ilmiytezislar->mavzu }} ilmiy tezis ma’lumot</div>
                    <div style="text-align: end;">
                        <a href="{{ route('ilmiytezislar.edit', ['ilmiytezislar' => $ilmiytezislar->id]) }}"
                            class="button w-24 bg-theme-1 text-white" style="margin-right:20px;">
                            Tahrirlash
                        </a>

                    </div>
                </div>
                <tr>
                    <th class="border border-b-2 " style="width: 100%;font-size:16px;text-align:center;" colspan="2">
                        {{  $ilmiytezislar->type }}</th>
                </tr>

                <!-- ilmiytezislar nomi -->
                <tr class="bg-gray-100">
                    <td class="border px-4 py-2 font-semibold text-gray-700">Mavzusi</td>
                    <td class="border px-4 py-2 font-semibold text-gray-700">Mualaliflar</td>
                </tr>

                <!-- ilmiytezislar raqami -->
                <tr>
                    <td class="border px-4 py-2">{{ $ilmiytezislar->mavzu }}</td>
                    <td class="border px-4 py-2">
                        @foreach(json_decode($ilmiytezislar->mualliflar_json) as $muallif)
                        <div>{{ $muallif }},</div>
                    @endforeach
                </td>
                </tr>

                <!-- Joyiye obyekti -->
                <tr class="bg-gray-100">
                    <td class="border px-4 py-2 font-semibold text-gray-700">Chop qilingan sana</td>
                    <td class="border px-4 py-2 font-semibold text-gray-700">Konferensiya to‘liq nomi</td>
                </tr>

                <!-- Joyiye maqsadi -->
                <tr>
                    <td class="border px-4 py-2">{{ $ilmiytezislar->chopq_sana }}</td>
                    <td class="border px-4 py-2">{{ $ilmiytezislar->kon_full_nomi }}</td>
                </tr>

                <tr class="bg-gray-100">
                    <td class="border px-4 py-2 font-semibold text-gray-700">Konferensiya qisqa nomi</td>
                    <td class="border px-4 py-2 font-semibold text-gray-700">Seriyasi/ soni</td>
                </tr>

                <!-- Joyiye maqsadi -->
                <tr>
                    <td class="border px-4 py-2">{{ $ilmiytezislar->kon_qisqa_nomi }}</td>
                    <td class="border px-4 py-2">{{ $ilmiytezislar->soni }}</td>
                </tr>

                <!-- Joyiye asos -->
                <tr class="bg-gray-100">
                    <td class="border px-4 py-2 font-semibold text-gray-700">Nashriyot</td>
                    <td class="border px-4 py-2 font-semibold text-gray-700">Annotatsiya</td>
                </tr>

                <!-- Joyiye tashkilot -->
                <tr>
                    <td class="border px-4 py-2">{{ $ilmiytezislar->annotatsiya }}</td>
                    <td class="border px-4 py-2">{{ $ilmiytezislar->nashriyot }}</td>
                </tr>

                <tr class="bg-gray-100">
                    <td class="border px-4 py-2 font-semibold text-gray-700">Fan yo‘nalishi</td>
                    <td class="border px-4 py-2 font-semibold text-gray-700">Url</td>
                </tr>

                <!-- Joyiye tashkilot -->
                <tr>
                    <td class="border px-4 py-2">{{ $ilmiytezislar->fan_yunalishi }}</td>
                    <td class="border px-4 py-2"><a href="{{ $ilmiytezislar->url }}" target="_blank" style="text-decoration: none;">{{ $ilmiytezislar->url }}</a> </td>

                </tr>

                <tr class="bg-gray-100">
                    <td class="border px-4 py-2 font-semibold text-gray-700">DOI</td>
                    <td class="border px-4 py-2 font-semibold text-gray-700"></td>
                </tr>

                <tr>
                    <td class="border px-4 py-2"><a href="{{ $ilmiytezislar->doi }}" target="_blank" style="text-decoration: none;">{{ $ilmiytezislar->doi }}</a></td>
                    <td class="border px-4 py-2"></td>
                </tr>



            </tbody>
        </table>
    </div>





</div>






</div>
@endsection
