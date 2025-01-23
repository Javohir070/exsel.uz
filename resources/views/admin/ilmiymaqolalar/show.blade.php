@extends('layouts.admin')

@section('content')
<div class="content">
    <div class="flex justify-between align-center mt-10">

        <h2 class="intro-y text-lg font-medium">{{ $ilmiymaqolalar->mavzu }} ilmiy maqola </h2>

        <a href="{{ route('ilmiymaqolalar.index') }}" class="button w-24 bg-theme-1 text-white">
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
                    <div style="font-size:18px;font-weight: 400;">{{ $ilmiymaqolalar->mavzu }} ilmiy maqola ma’lumot</div>
                    <div style="text-align: end;">
                        <a href="{{ route('ilmiymaqolalar.edit', ['ilmiymaqolalar' => $ilmiymaqolalar->id]) }}"
                            class="button w-24 bg-theme-1 text-white" style="margin-right:20px;">
                            Tahrirlash
                        </a>

                    </div>
                </div>
                <tr>
                    <th class="border border-b-2 " style="width: 100%;font-size:16px;text-align:center;" colspan="2">
                        {{  $ilmiymaqolalar->type }}</th>
                </tr>

                <!-- ilmiymaqolalar nomi -->
                <tr class="bg-gray-100">
                    <td class="border px-4 py-2 font-semibold text-gray-700">Mavzusi</td>
                    <td class="border px-4 py-2 font-semibold text-gray-700">Mualaliflar</td>
                </tr>

                <!-- ilmiymaqolalar raqami -->
                <tr>
                    <td class="border px-4 py-2">{{ $ilmiymaqolalar->mavzu }}</td>
                    <td class="border px-4 py-2">
                        @foreach(json_decode($ilmiymaqolalar->mualliflar_json) as $muallif)
                        <div>{{ $muallif }},</div>
                    @endforeach
                </td>
                </tr>

                <!-- Joyiye obyekti -->
                <tr class="bg-gray-100">
                    <td class="border px-4 py-2 font-semibold text-gray-700">Chop qilingan sana</td>
                    <td class="border px-4 py-2 font-semibold text-gray-700">Jurnal nomi</td>
                </tr>

                <!-- Joyiye maqsadi -->
                <tr>
                    <td class="border px-4 py-2">{{ $ilmiymaqolalar->chopq_sana }}</td>
                    <td class="border px-4 py-2">{{ $ilmiymaqolalar->jurnal_nomi }}</td>
                </tr>

                <tr class="bg-gray-100">
                    <td class="border px-4 py-2 font-semibold text-gray-700">Seriyasi/Jurnal soni</td>
                    <td class="border px-4 py-2 font-semibold text-gray-700">Jurnal ISSN raqami</td>
                </tr>

                <!-- Joyiye maqsadi -->
                <tr>
                    <td class="border px-4 py-2">{{ $ilmiymaqolalar->jurnal_soni }}</td>
                    <td class="border px-4 py-2">{{ $ilmiymaqolalar->jurnal_issn_raqami }}</td>
                </tr>

                <!-- Joyiye asos -->
                <tr class="bg-gray-100">
                    <td class="border px-4 py-2 font-semibold text-gray-700">Nashriyot</td>
                    <td class="border px-4 py-2 font-semibold text-gray-700">Annotatsiya</td>
                </tr>

                <!-- Joyiye tashkilot -->
                <tr>
                    <td class="border px-4 py-2">{{ $ilmiymaqolalar->annotatsiya }}</td>
                    <td class="border px-4 py-2">{{ $ilmiymaqolalar->nashriyot }}</td>
                </tr>

                <tr class="bg-gray-100">
                    <td class="border px-4 py-2 font-semibold text-gray-700">Fan yo‘nalishi</td>
                    <td class="border px-4 py-2 font-semibold text-gray-700">Url</td>
                </tr>

                <!-- Joyiye tashkilot -->
                <tr>
                    <td class="border px-4 py-2">{{ $ilmiymaqolalar->fan_yunalishi }}</td>
                    <td class="border px-4 py-2"><a href="{{ $ilmiymaqolalar->url }}" target="_blank" style="text-decoration: none;">{{ $ilmiymaqolalar->url }}</a> </td>

                </tr>

                <tr class="bg-gray-100">
                    <td class="border px-4 py-2 font-semibold text-gray-700">DOI</td>
                    <td class="border px-4 py-2 font-semibold text-gray-700"></td>
                </tr>

                <tr>
                    <td class="border px-4 py-2"><a href="{{ $ilmiymaqolalar->doi }}" target="_blank" style="text-decoration: none;">{{ $ilmiymaqolalar->doi }}</a></td>
                    <td class="border px-4 py-2"></td>
                </tr>



            </tbody>
        </table>
    </div>





</div>






</div>
@endsection
