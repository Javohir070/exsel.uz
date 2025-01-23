@extends('layouts.admin')

@section('content')
<div class="content">
    <div class="flex justify-between align-center mt-10">

        <h2 class="intro-y text-lg font-medium">{{ $intellektualmulk->mavzu }} intellektual mulk </h2>

        <a href="{{ route('intellektualmulk.index') }}" class="button w-24 bg-theme-1 text-white">
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
                    <div style="font-size:18px;font-weight: 400;">{{ $intellektualmulk->mavzu }} intellektual mulk ma’lumot</div>
                    <div style="text-align: end;">
                        <a href="{{ route('intellektualmulk.edit', ['intellektualmulk' => $intellektualmulk->id]) }}"
                            class="button w-24 bg-theme-1 text-white" style="margin-right:20px;">
                            Tahrirlash
                        </a>

                    </div>
                </div>
                <tr>
                    <th class="border border-b-2 " style="width: 100%;font-size:16px;text-align:center;" colspan="2">{{ $intellektualmulk->type }}</th>
                </tr>

                <!-- intellektualmulk nomi -->
                <tr class="bg-gray-100">
                    <td class="border px-4 py-2 font-semibold text-gray-700">Mavzusi</td>
                    <td class="border px-4 py-2 font-semibold text-gray-700">Mualaliflar</td>
                </tr>

                <!-- intellektualmulk raqami -->
                <tr>
                    <td class="border px-4 py-2">{{ $intellektualmulk->mavzu }}</td>
                    <td class="border px-4 py-2">
                        @foreach(json_decode($intellektualmulk->mualliflar_json) as $muallif)
                        <div>{{ $muallif }},</div>
                    @endforeach
                </td>
                </tr>

                <!-- Joyiye obyekti -->
                <tr class="bg-gray-100">
                    <td class="border px-4 py-2 font-semibold text-gray-700">Chop qilingan yili</td>
                    <td class="border px-4 py-2 font-semibold text-gray-700">Seriyasi/ soni</td>
                </tr>

                <!-- Joyiye maqsadi -->
                <tr>
                    <td class="border px-4 py-2">{{ $intellektualmulk->nashr_sana }}</td>
                    <td class="border px-4 py-2">{{ $intellektualmulk->soni }}</td>
                </tr>

                <!-- Joyiye asos -->
                <tr class="bg-gray-100">
                    <td class="border px-4 py-2 font-semibold text-gray-700">Annotatsiya</td>
                    <td class="border px-4 py-2 font-semibold text-gray-700">Fan yo‘nalishi</td>
                </tr>

                <!-- Joyiye tashkilot -->
                <tr>
                    <td class="border px-4 py-2">{{ $intellektualmulk->annotatsiya }}</td>
                    <td class="border px-4 py-2">{{ $intellektualmulk->fan_yunalishi }}</td>
                </tr>



            </tbody>
        </table>
    </div>





</div>






</div>
@endsection
