@extends('layouts.admin')

@section('content')
<div class="content">
    <div class="flex justify-between align-center mt-6 mb-6">

        <h2 class="intro-y text-lg font-medium">{{ $dalolatnoma->name }} dalolatnoma </h2>

        <a href="{{ route('dalolatnoma.index') }}" class="button w-24 bg-theme-1 text-white">
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
                    <div style="font-size:18px;font-weight: 400;">{{ $dalolatnoma->name }} dalolatnomani ma’lumot</div>
                    <div style="text-align: end;">
                        <a href="{{ route('dalolatnoma.edit', ['dalolatnoma' => $dalolatnoma->id]) }}"
                            class="button w-24 bg-theme-1 text-white" style="margin-right:20px;">
                            Tahrirlash
                        </a>

                    </div>
                </div>
                <tr>
                    <th class="border border-b-2 " style="width: 100%;font-size:16px;text-align:center;" colspan="2">
                        Ma’lumotlar</th>
                </tr>

                <!-- Dalolatnoma nomi -->
                <tr class="bg-gray-100">
                    <td class="border px-4 py-2 font-semibold text-gray-700">Dalolatnoma nomi</td>
                    <td class="border px-4 py-2 font-semibold text-gray-700">Dalolatnoma raqami</td>
                </tr>

                <!-- Dalolatnoma raqami -->
                <tr>
                    <td class="border px-4 py-2">{{ $dalolatnoma->name }}</td>
                    <td class="border px-4 py-2">{{ $dalolatnoma->raqami }}</td>
                </tr>

                <!-- Joyiye obyekti -->
                <tr class="bg-gray-100">
                    <td class="border px-4 py-2 font-semibold text-gray-700">Joriy etish  obyekti</td>
                    <td class="border px-4 py-2 font-semibold text-gray-700">Joriy etish  maqsadi</td>
                </tr>

                <!-- Joyiye maqsadi -->
                <tr>
                    <td class="border px-4 py-2">{{ $dalolatnoma->joyiye_obyekti }}</td>
                    <td class="border px-4 py-2">{{ $dalolatnoma->joyiye_maqsadi }}</td>
                </tr>

                <!-- Joyiye asos -->
                <tr class="bg-gray-100">
                    <td class="border px-4 py-2 font-semibold text-gray-700">Joriy etish uchun asos</td>
                    <td class="border px-4 py-2 font-semibold text-gray-700">Joriy etilgan  tashkilot</td>
                </tr>

                <!-- Joyiye tashkilot -->
                <tr>
                    <td class="border px-4 py-2">{{ $dalolatnoma->joyiye_asos }}</td>
                    <td class="border px-4 py-2">{{ $dalolatnoma->joyiye_tashkilot }}</td>
                </tr>

                <!-- Joyiye tarmoq -->
                <tr class="bg-gray-100">
                    <td class="border px-4 py-2 font-semibold text-gray-700">Joriy etilgan  tarmoq</td>
                    <td class="border px-4 py-2 font-semibold text-gray-700">Asoslovchi hujjat</td>
                </tr>

                <!-- Asoslovchi hujjat -->
                <tr>
                    <td class="border px-4 py-2">{{ $dalolatnoma->joyiye_tarmoq }}</td>
                    <td class="border px-4 py-2">
                        @if ($dalolatnoma->asoslovchi_hujjat)
                            <a href="{{ asset('storage/' . $dalolatnoma->asoslovchi_hujjat) }}" target="_blank"
                                class="text-blue-500 underline" style="text-decoration: none">
                                Yuklab olish
                            </a>
                        @else
                            <span class="text-red-500">Fayl mavjud emas</span>
                        @endif
                    </td>
                </tr>

            </tbody>
        </table>
    </div>





</div>






</div>
@endsection
