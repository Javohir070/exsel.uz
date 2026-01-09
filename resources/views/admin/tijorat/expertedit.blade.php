@extends('layouts.admin')

@section('content')
    <style>
        .hidden {
            display: none;
        }
    </style>

    <div class="content">
        <div class="flex justify-between align-center mt-6 mb-6">

            <h2 class="intro-y text-lg font-medium">{{ $tijorat->name }}</h2>
            @role('super-admin')
                <a href="{{ route('tijorat.index') }}" class="button w-24 bg-theme-1 text-white">
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
                    <tr>
                        <th class=" border" style="width: 100%; font-size:16px;text-align:center;" colspan="2">Ma’lumot
                        </th>
                    </tr>
                    <tr class="bg-gray-200">
                        <th class=" border" style="width:50%;">Loyiha nomi</th>
                        <th class=" border" style="width:50%;">Loyiha rahbari</th>
                    </tr>
                    <tr>
                        <td class="border">{{ $tijorat->name }}</td>
                        <td class="border">{{ $tijorat->loyiha_rahbari }}</td>
                    </tr>

                    <tr class="bg-gray-200">
                        <th class=" border" style="width:50%;">Ijrochi tashkilot</th>
                        <th class=" border" style="width:50%;">Summasi (ming soʻmda)</th>
                    </tr>
                    <tr>
                        <td class="border">{{ $tijorat->ijrochi_tashkilot }}</td>
                        <td class="border">{{ number_format($tijorat->summa, 0, ',', ' ') }}</td>
                    </tr>

                    <tr class="bg-gray-200">
                        <th class=" border">Tashabbuskor mablagʻi (ming soʻmda)</th>
                        <th class=" border">Loyiha amalga xudud</th>
                    </tr>

                    <tr>
                        <td class="border">{{ number_format($tijorat->tash_summasi, 0, ',', ' ') }}</td>
                        <td class="border">{{ $tijorat->region->oz ?? '' }}</td>
                    </tr>

                    <tr class="bg-gray-200">
                        <th class=" border">Loyiha turi (tijoratlashtirish/tijoratlashtirishgacha tayorlash)</th>
                        <th class=" border">Yaratilgan ish oʻrni</th>
                    </tr>

                    <tr>
                        <td class="border">{{ $tijorat->turi }}</td>
                        <td class="border">{{ $tijorat->yar_ish_urni }}</td>
                    </tr>

                    <tr class="bg-gray-200">
                        <th class=" border">Tegishli Soha</th>
                        <th class=" border">Qoʻllanish sohasi</th>
                    </tr>

                    <tr>
                        <td class="border">{{ $tijorat->t_soha }}</td>
                        <td class="border">{{ $tijorat->q_soha }}</td>
                    </tr>

                    <tr class="bg-gray-200">
                        <th class=" border">Moliyalashtirilish asosi</th>
                        <th class=" border"></th>
                    </tr>

                    <tr>
                        <td class="border">{{ $tijorat->m_asosi }}</td>
                        <td class="border"></td>
                    </tr>


                </tbody>
            </table>
        </div>

        {{-- @role(['Ekspert', 'tijorat boyicha masul', 'Ishchi guruh azosi', 'Rahbar']) --}}
            {{-- @role(['Ishchi guruh azosi']) --}}
            <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2"
                style="background: white; padding: 20px 20px; border-radius: 4px">
                <div class="w-full mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                    <form id="science-paper-create-form" method="POST" action="{{ route('tijoratexpert.update', $tijoratExpert->id) }}"
                        class="validate-form" enctype="multipart/form-data" novalidate="novalidate">
                        @csrf
                        @method('PUT')
                        <div class="grid grid-cols-12 gap-2">
                            <input type="hidden" name="tijorat_id" value="{{ $tijorat->id }}">

                            <div class="field-group w-full col-span-6">
                                <label class="flex flex-col sm:flex-row"> <span
                                        class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Loyiha Kalendar rejasiga
                                    ko‘ra ajratilgan grant mablag‘larni maqsadli sarflanganligi?
                                </label>
                                <select name="grant_sarf_maqsadli" class="input border w-full mt-2 show-comment-select"
                                    required="">

                                    <option value=""></option>

                                    <option value="1" {{ $tijoratExpert->grant_sarf_maqsadli == 1 ? 'selected' : '' }}>Ha</option>

                                    <option value="0" {{ $tijoratExpert->grant_sarf_maqsadli == 0 ? 'selected' : '' }}>Yo'q</option>

                                </select><br>

                                <textarea name="grant_sarf_maqsadli_izox" id="" class="input w-full border mt-2 hidden comment-area"
                                    cols="2" rows="2" required>{{ $tijoratExpert->grant_sarf_maqsadli_izox }}</textarea>

                                @error('grant_sarf_maqsadli')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="field-group w-full col-span-6">
                                <label class="flex flex-col sm:flex-row"> <span
                                        class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Sotib olingan asbob va
                                    uskunalarni balansga olinganligi?
                                </label>
                                <select name="asbob_balans_olingan" class="input border w-full mt-2 show-comment-select"
                                    required="">

                                    <option value=""></option>

                                    <option value="1" {{ $tijoratExpert->asbob_balans_olingan == 1 ? 'selected' : '' }}>Ha</option>

                                    <option value="0" {{ $tijoratExpert->asbob_balans_olingan == 0 ? 'selected' : '' }}>Yo'q</option>

                                </select><br>

                                <textarea name="asbob_balans_olingan_izox" id="" class="input w-full border mt-2 hidden comment-area"
                                    cols="2" rows="2" required>{{ $tijoratExpert->asbob_balans_olingan_izox }}</textarea>

                                @error('asbob_balans_olingan')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="w-full col-span-6">
                                <label class="flex flex-col sm:flex-row"> <span
                                        class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Xaqiqatda ishga olingan
                                    xodimlar soni?
                                </label>
                                <input type="number" name="xodimlar_lozim" class="input border w-full mt-2"
                                    min="0" value="{{ $tijoratExpert->xodimlar_lozim }}" required="">

                                @error('xodimlar_lozim')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="field-group w-full col-span-6">
                                <label class="flex flex-col sm:flex-row"> <span
                                        class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Mahsulot bo‘yicha
                                    sertifikat olinganligi?
                                </label>
                                <select name="sertifikat_olingan" class="input border w-full mt-2 show-comment-select"
                                    required="">

                                    <option value=""></option>

                                    <option value="1" {{ $tijoratExpert->sertifikat_olingan == 1 ? 'selected' : '' }}>Ha</option>

                                    <option value="0" {{ $tijoratExpert->sertifikat_olingan == 0 ? 'selected' : '' }}>Yo'q</option>

                                </select><br>
                                <textarea name="sertifikat_olingan_izox" id="" class="input w-full border mt-2 hidden comment-area"
                                    cols="2" rows="2" required>{{ $tijoratExpert->sertifikat_olingan_izox }}</textarea>

                                @error('sertifikat_olingan')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="field-group w-full col-span-6">
                                <label class="flex flex-col sm:flex-row"> <span
                                        class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Loyihani ishga tushirish
                                    bilan bog‘liq muammolar?
                                </label>
                                <select name="loyiha_muammo" class="input border w-full mt-2 show-comment-select"
                                    required="">

                                    <option value=""></option>

                                    <option value="1" {{ $tijoratExpert->loyiha_muammo == 1 ? 'selected' : '' }}>Ha</option>

                                    <option value="0" {{ $tijoratExpert->loyiha_muammo == 0 ? 'selected' : '' }}>Yo'q</option>

                                </select><br>
                                <textarea name="loyiha_muammo_izox" id="" class="input w-full border mt-2 hidden comment-area"
                                    cols="2" rows="2" required>{{ $tijoratExpert->loyiha_muammo_izox }}</textarea>
                                @error('loyiha_muammo')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="field-group w-full col-span-6">
                                <label class="flex flex-col sm:flex-row">
                                    <span class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>
                                    Muammoni bartaraf etish bo‘yicha takliflari?
                                </label>

                                <select name="loyiha_taklif" class="input border w-full mt-2 show-comment-select"
                                    required>
                                    <option value=""></option>
                                    <option value="1" {{ $tijoratExpert->loyiha_taklif == 1 ? 'selected' : '' }}>Ha</option>
                                    <option value="0" {{ $tijoratExpert->loyiha_taklif == 0 ? 'selected' : '' }}>Yo'q</option>
                                </select>

                                <textarea name="loyiha_taklif_izox" class="input w-full border mt-2 hidden comment-area" cols="2"
                                    rows="2">{{ $tijoratExpert->loyiha_taklif_izox }}</textarea>

                                @error('loyiha_taklif')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="field-group w-full col-span-6">
                                <label class="flex flex-col sm:flex-row"> <span
                                        class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Loyiha doirasida olinishi
                                    lozim bo‘lgan xodimlar soni
                                </label>
                                <select name="xodimlar_haqiqiy" class="input border w-full mt-2 show-comment-select"
                                    required="">

                                    <option value=""></option>

                                    <option value="1" {{ $tijoratExpert->xodimlar_haqiqiy == 1 ? 'selected' : '' }}>Ha</option>

                                    <option value="0" {{ $tijoratExpert->xodimlar_haqiqiy == 0 ? 'selected' : '' }}>Yo'q</option>

                                </select><br>

                                <textarea name="xodimlar_haqiqiy_izox" id="" class="input w-full border mt-2 hidden comment-area"
                                    cols="2" rows="2" required>{{ $tijoratExpert->xodimlar_haqiqiy_izox }}</textarea>

                                @error('xodimlar_haqiqiy')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="w-full col-span-6 ">
                                <label class="flex flex-col sm:flex-row"> <span
                                        class="mt-1 mr-1 sm:mt-0 text-xs text-red-600"></span> Loyiha doirasida ishlab
                                    chiqilgan mahsulot miqdori? O‘lchov birligiga ko‘ra (dona, kg, metr ...)</label>
                                <input type="number" class="input w-full border mt-2" name="mahsulot_miqdori" value="{{ $tijoratExpert->mahsulot_miqdori }}" required>
                                <select name="mahsulot_olchov" class="input border w-full mt-2 show-comment-select"
                                    required="">
                                    <option value=""></option>
                                    <option value="dona" {{ $tijoratExpert->mahsulot_olchov == 'dona' ? 'selected' : '' }}>Dona</option>
                                    <option value="kg" {{ $tijoratExpert->mahsulot_olchov == 'kg' ? 'selected' : '' }}>KG</option>
                                    <option value="metr" {{ $tijoratExpert->mahsulot_olchov == 'metr' ? 'selected' : '' }}>Metr</option>
                                </select>
                            </div>

                            <div class="w-full col-span-6 ">
                                <label class="flex flex-col sm:flex-row"> <span
                                        class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Loyiha doirasida amalga
                                    oshirilgan sotuv xajmi? Million so‘mda</label>
                                <input type="text" id="sumInput1" oninput="formatNumber(this)" name="sotuv_hajmi"
                                    value="{{ $tijoratExpert->sotuv_hajmi }}" class="input w-full border mt-2 show-comment-select"
                                    required="">
                                @error('sotuv_hajmi')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="w-full col-span-6 ">
                                <label class="flex flex-col sm:flex-row"> <span
                                        class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Loyiha doirasida amalga
                                    oshirilgan eksport xajmi? Ming dollarda</label>
                                <input type="text" id="sumInput1" oninput="formatNumber(this)" name="eksport_hajmi"
                                    value="{{ $tijoratExpert->eksport_hajmi }}"
                                    class="input w-full border mt-2 show-comment-select" required="">
                                @error('eksport_hajmi')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="w-full col-span-6 ">
                                <label class="flex flex-col sm:flex-row"> <span
                                        class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Budjetga to‘langan
                                    soliqlar? Million so‘mda</label>
                                <input type="text" id="sumInput1" oninput="formatNumber(this)" name="soliq_tolov"
                                    value="{{ $tijoratExpert->soliq_tolov }}" class="input w-full border mt-2 show-comment-select"
                                    required="">
                                @error('soliq_tolov')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                            </div>





                            <div class="w-full col-span-6 ">
                                <label class="flex flex-col sm:flex-row"> <span
                                        class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Loyihani amalga oshirish
                                    bo‘yicha hisobot topshirib kelinganligi?</label>
                                <textarea name="hisobot_topshirildi_izox" id="" class="input w-full border mt-2" cols="5"
                                    rows="5" required>{{ $tijoratExpert->hisobot_topshirildi_izox }}</textarea>
                            </div>

                            

                            <div class="w-full col-span-6">
                                <label class="flex flex-col sm:flex-row"> <span
                                        class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Kalendar rejaga muvofiq
                                    ishlarni bajarilganligi
                                </label>
                                <select name="kalendar_bajarilgan" class="input border w-full mt-2 show-comment-select"
                                    required="">

                                    <option value=""></option>

                                    <option value="To‘liq bajarilgan" {{ $tijoratExpert->kalendar_bajarilgan == "To‘liq bajarilgan" ? 'selected' : '' }}>To‘liq bajarilgan </option>

                                    <option value="Qisman bajarilgan" {{ $tijoratExpert->kalendar_bajarilgan == "Qisman bajarilgan" ? 'selected' : '' }}>Qisman bajarilgan</option>

                                    <option value="Bajarilmagan" {{ $tijoratExpert->kalendar_bajarilgan == "Bajarilmagan" ? 'selected' : '' }}>Bajarilmagan</option>
                                </select><br>

                                @error('kalendar_bajarilgan')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                            </div>



                            <div class="w-full col-span-6">
                                <label class="flex flex-col sm:flex-row"> <span
                                        class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Foto va videolar (zip
                                    formatda)
                                </label>
                                <input type="file" name="media_zip"
                                    class="input border w-full mt-2 show-comment-select" value="{{ $tijoratExpert->media_zip }}">

                                @error('media_zip')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="w-full col-span-6 ">
                                <label class="flex flex-col sm:flex-row"> <span
                                        class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Ekspert F.I.Sh</label>
                                <input type="text" name="ekspert_fish" class="input w-full border mt-2" value="{{ $tijoratExpert->ekspert_fish }}" required>
                            </div>

                            <div class="w-full col-span-6 ">
                                <label class="flex flex-col sm:flex-row"> <span
                                        class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Tashkilotning mas'ul
                                    rahbari F.I.Sh</label>
                                <input type="text" name="t_masul" class="input w-full border mt-2" value="{{ $tijoratExpert->t_masul }}" required>
                            </div>

                            <div class="w-full col-span-6">
                                <label class="flex flex-col sm:flex-row"> <span
                                        class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Status
                                </label>
                                <select name="status" class="input border w-full mt-2 show-comment-select"
                                    required="">

                                    <option value="">Status tanlang</option>

                                    {{-- <option value="Qo‘shimcha o‘rganish talab etiladi" {{ $tijoratExpert->status == "Qo‘shimcha o‘rganish talab etiladi" ? 'selected' : '' }}>Qo‘shimcha o‘rganish talab etiladi --}}
                                    </option>

                                    <option value="Ijobiy" {{ $tijoratExpert->status == "Ijobiy" ? 'selected' : '' }}>Ijobiy</option>

                                    <option value="Salbiy" {{ $tijoratExpert->status == "Salbiy" ? 'selected' : '' }}>Salbiy</option>


                                </select><br>

                                @error('muddat')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="w-full col-span-6 ">
                                <label class="flex flex-col sm:flex-row"> <span
                                        class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Izoh</label>
                                <textarea name="comment" id="" class="input w-full border mt-2" cols="5" rows="5" required>{{ $tijoratExpert->comment }}</textarea>
                            </div>
                        </div>

                    </form>
                    <div class="px-5 pb-5 text-center mt-4">
                        <a href="#" class="button delete-cancel w-32 border text-gray-700 mr-1">
                            Bekor qilish
                        </a>
                        <button type="submit" form="science-paper-create-form"
                            class="update-confirm button w-24 bg-theme-1 text-white">
                            Qo'shish
                        </button>
                    </div>
                </div>
            </div>
            {{-- @endrole --}}
        {{-- @endrole --}}


    </div>

    <script>
        const ones = ["", "bir", "ikki", "uch", "to‘rt", "besh", "olti", "yetti", "sakkiz", "to‘qqiz"];
        const tens = ["", "o‘n", "yigirma", "o‘ttiz", "qirq", "ellik", "oltmish", "yetmish", "sakson", "to‘qson"];
        const thousands = ["", " ming", " million", " milliard"];

        function formatNumber(input, outputId) {
            // Faqat raqamlar
            let value = input.value.replace(/\D/g, "");

            // 3 xonadan bo‘sh joy bilan formatlash (masalan: 100 000)
            input.value = value.replace(/\B(?=(\d{3})+(?!\d))/g, " ");

            // So‘z ko‘rinishiga o‘girish
            document.getElementById(outputId).textContent = numberToWords(Number(value));
        }

        function numberToWords(num) {
            if (num === 0) return "nol";
            let words = '';
            let groupIndex = 0;

            while (num > 0) {
                let chunk = num % 1000;
                if (chunk > 0) {
                    words = chunkToWords(chunk) + thousands[groupIndex] + ' ' + words;
                }
                num = Math.floor(num / 1000);
                groupIndex++;
            }

            return words.trim();
        }

        function chunkToWords(n) {
            let result = '';
            if (n >= 100) {
                result += ones[Math.floor(n / 100)] + ' yuz ';
                n %= 100;
            }
            if (n >= 10) {
                result += tens[Math.floor(n / 10)] + ' ';
                n %= 10;
            }
            if (n > 0) {
                result += ones[n] + ' ';
            }
            return result;
        }
    </script>

     <script>
        function toggleComment(select) {
            let textarea = select.closest('.field-group').querySelector('.comment-area');

            if (select.value === "0") {
                textarea.classList.remove('hidden');
                textarea.setAttribute('required', true);
            } else {
                textarea.classList.add('hidden');
                textarea.removeAttribute('required');
                textarea.value = ""; // ←——— SIZ SO‘RAGAN TOZALASH
            }
        }

        // Sahifa yuklanganda mavjud qiymatlarni tekshirish
        document.querySelectorAll('.show-comment-select').forEach(select => {
            toggleComment(select);
            select.addEventListener('change', function() {
                toggleComment(this);
            });
        });
    </script>
@endsection
