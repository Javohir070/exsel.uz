@extends('layouts.admin')

@section('content')

    <div class="content tijorat-show-page">
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
                        <td class="border">{{ \App\Models\Tijorat::formatMoneyDisplay($tijorat->summa) ?: '—' }}</td>
                    </tr>

                    <tr class="bg-gray-200">
                        <th class=" border">Tashabbuskor mablagʻi (ming soʻmda)</th>
                        <th class=" border">Loyiha amalga xudud</th>
                    </tr>

                    <tr>
                        <td class="border">{{ \App\Models\Tijorat::formatMoneyDisplay($tijorat->tash_summasi) ?: '—' }}</td>
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

        <style>
            .tijorat-show-page .tijorat-show-izoh-hidden {
                display: none;
            }
        </style>

        @role(['Ekspert', 'tijorat boyicha masul', 'Ishchi guruh azosi', 'Rahbar', 'super-admin'])
            @forelse ($tijoratexpert as $tekshirivchilar)
                <div class="overflow-x-auto"
                    style="background-color: white;margin-top:30px;border-radius:8px;padding:30px 20px;">
                    <div style="display: flex;justify-content: center; border-bottom: 1px solid #e2e8f0; padding-bottom: 20px;">
                        <div style="text-align: end;display: flex;">
                            @role(['Ekspert', 'super-admin'])
                                @if ($tekshirivchilar->holati == 'yuborildi')
                                    <a href="{{ url('generate-pdftijorat/' . $tijorat->id) }}"
                                        class="button delete-cancel  border text-gray-700 mr-1" style="margin-right:20px;">
                                        Eksport
                                    </a>
                                    <form action="{{ route('tijoratexpert.update', $tekshirivchilar->id) }}" method="POST"
                                        onsubmit="return confirm('Haqiqatan ham rad etasizmi?');">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="holati" value="1">
                                        <button type="submit" class="button w-24 bg-theme-6 text-white">Rad etish</button>
                                    </form>
                                @endif
                            @endrole
                            @role(['Ishchi guruh azosi', 'super-admin'])
                                @if ($tekshirivchilar->holati == 'Rad etildi')
                                    <a href="{{ route('tijoratexpert.edit', ['tijoratexpert' => $tekshirivchilar->id]) }}"
                                        class="button w-24 bg-theme-1 text-white" style="margin-right:20px;">
                                        Tahrirlash
                                    </a>
                                    <form action="{{ route('tijoratexpert.destroy', $tekshirivchilar->id) }}" method="POST"
                                        onsubmit="return confirm('Haqiqatan ham o‘chirmoqchimisiz?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="button w-24 bg-theme-6 text-white">O'chirish</button>
                                    </form>
                                @endif
                            @endrole
                        </div>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="border border-b-2 " style="width: 40px;">№</th>
                                <th class="border border-b-2 " style="width: 60%;">Mezon va talablar</th>
                                <th class="border border-b-2 ">Xulosa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="bg-gray-200">
                                <td class="border border-b-2 ">1</td>
                                <td class="border border-b-2 ">Loyiha Kalendar rejasiga ko‘ra ajratilgan grant mablag‘larni
                                    maqsadli sarflanganligi? </td>
                                <td class="border border-b-2 ">
                                    {{ $tekshirivchilar->grant_sarf_maqsadli ? 'Ha' : "Yo'q, Izoh: " . $tekshirivchilar->grant_sarf_maqsadli_izox }}
                                </td>
                            </tr>

                            <tr>
                                <td class="border border-b-2 ">2</td>
                                <td class="border border-b-2 ">Sotib olingan asbob va uskunalarni balansga olinganligi? </td>
                                <td class="border border-b-2 ">
                                    {{ $tekshirivchilar->asbob_balans_olingan ? 'Ha' : "Yo'q, Izoh: " . $tekshirivchilar->asbob_balans_olingan_izox }}
                                </td>
                            </tr>

                            <tr class="bg-gray-200">
                                <td class="border border-b-2 ">3</td>
                                <td class="border border-b-2 ">Loyiha doirasida olinishi lozim
                                    bo‘lgan xodimlar soni, xaqiqatda ishga olingan xodimlar soni? </td>
                                <td class="border border-b-2 ">
                                    {{ $tekshirivchilar->xodimlar_lozim . ' soni. ' }}{{ $tekshirivchilar->xodimlar_haqiqiy ? 'Ha' : "Yo'q, Izoh: " . $tekshirivchilar->xodimlar_haqiqiy_izox }}
                                </td>
                            </tr>

                            <tr>
                                <td class="border border-b-2 ">4</td>
                                <td class="border border-b-2 ">Loyiha doirasida ishlab chiqilgan mahsulot miqdori?
                                    O‘lchov birligiga ko‘ra (dona, kg, metr...) </td>
                                <td class="border border-b-2 ">
                                    {{ $tekshirivchilar->mahsulot_miqdori . ' ' . $tekshirivchilar->mahsulot_olchov }}
                                </td>
                            </tr>

                            <tr class="bg-gray-200">
                                <td class="border border-b-2 ">5</td>
                                <td class="border border-b-2 ">Loyiha doirasida amalga oshirilgan sotuv xajmi? Million so‘mda
                                </td>
                                <td class="border border-b-2 ">
                                    {{ number_format($tekshirivchilar->sotuv_hajmi ?? 0, 0, ',', ' ') }}
                                </td>
                            </tr>

                            <tr>
                                <td class="border border-b-2 ">6</td>
                                <td class="border border-b-2 ">Loyiha doirasida amalga oshirilgan eksport xajmi? Ming dollarda
                                </td>
                                <td class="border border-b-2 ">
                                    {{ number_format($tekshirivchilar->eksport_hajmi ?? 0, 0, ',', ' ') }}
                                </td>
                            </tr>

                            <tr class="bg-gray-200">
                                <td class="border border-b-2 ">7</td>
                                <td class="border border-b-2 ">Budjetga to‘langan soliqlar? Million so‘mda </td>
                                <td class="border border-b-2 ">
                                    {{ number_format($tekshirivchilar->soliq_tolov ?? 0, 0, ',', ' ') }}
                                </td>
                            </tr>

                            <tr>
                                <td class="border border-b-2 ">8</td>
                                <td class="border border-b-2 ">Loyihani amalga oshirish bo‘yicha hisobot topshirib
                                    kelinganligi? </td>
                                <td class="border border-b-2 ">
                                    {{ $tekshirivchilar->hisobot_topshirildi_izox ?? null }}
                                </td>
                            </tr>

                            <tr class="bg-gray-200">
                                <td class="border border-b-2 ">9</td>
                                <td class="border border-b-2 ">Mahsulot bo‘yicha sertifikat olinganligi? </td>
                                <td class="border border-b-2 ">
                                    {{ $tekshirivchilar->sertifikat_olingan ? 'Ha' : "Yo'q, Izoh: " . $tekshirivchilar->sertifikat_olingan_izox }}
                                </td>
                            </tr>

                            <tr>
                                <td class="border border-b-2 ">10</td>
                                <td class="border border-b-2 ">Loyihani ishga tushirish bilan bog‘liq muammolar? </td>
                                <td class="border border-b-2 ">
                                    {{ $tekshirivchilar->loyiha_muammo ? 'Ha' : "Yo'q, Izoh: " . $tekshirivchilar->loyiha_muammo_izox }}
                                </td>
                            </tr>

                            <tr class="bg-gray-200">
                                <td class="border border-b-2 ">11</td>
                                <td class="border border-b-2 ">Muammoni bartaraf etish bo‘yicha takliflari? </td>
                                <td class="border border-b-2 ">
                                    {{ $tekshirivchilar->loyiha_taklif ? 'Ha' : "Yo'q, Izoh: " . $tekshirivchilar->loyiha_taklif_izox }}
                                </td>
                            </tr>

                            <tr>
                                <td class="border border-b-2 ">12</td>
                                <td class="border border-b-2 ">Kalendar rejaga muvofiq ishlarni bajarilganligi </td>
                                <td class="border border-b-2 ">
                                    {{ $tekshirivchilar->kalendar_bajarilgan ?? null }}
                                </td>
                            </tr>

                            <tr class="bg-gray-200">
                                <td class="border border-b-2 ">13</td>
                                <td class="border border-b-2 ">Foto va videolar (zip formatda)</td>
                                <td class="border border-b-2 ">
                                    @if ($tekshirivchilar->media_zip)
                                        <a href="{{ asset('storage/' . $tekshirivchilar->media_zip) }}"
                                            class="button  bg-theme-1 text-white" target="_blank">Faylni ko'rish</a>
                                    @endif
                                </td>
                            </tr>

                            <tr>
                                <td class="border border-b-2 ">14</td>
                                <td class="border border-b-2 ">Ekspert xulosasi
                                </td>
                                <td class="border border-b-2 ">{{ $tekshirivchilar->status ?? null }}</td>
                            </tr>
                            <tr class="bg-gray-200">
                                <td class="border border-b-2 ">15</td>
                                <td class="border border-b-2 ">
                                    Izoh
                                </td>
                                <td class="border border-b-2 ">{{ $tekshirivchilar->comment ?? null }}</td>
                            </tr>
                            <tr>
                                <td class="border border-b-2 ">16.</td>
                                <td class="border border-b-2 ">
                                    Fayl
                                </td>
                                <td class="border border-b-2 ">
                                    @if ($tekshirivchilar->file)
                                        <a href="{{ asset('storage/' . $tekshirivchilar->file) }}"
                                            class="button  bg-theme-1 text-white" target="_blank">Faylni ko'rish</a>
                                    @endif
                                </td>
                            </tr>
                            <tr class="bg-gray-200">
                                <td class="border border-b-2 ">17</td>
                                <td class="border border-b-2 ">
                                    Ishchi guruh rahbari F.I.Sh
                                </td>
                                <td class="border border-b-2 ">
                                    {{ $tekshirivchilar->fish }}
                                </td>
                            </tr>
                            <tr>
                                <td class="border border-b-2 ">18</td>
                                <td class="border border-b-2 ">
                                    Ishchi guruh azosi F.I.Sh
                                </td>
                                <td class="border border-b-2 ">
                                    {{ $tekshirivchilar->user?->name }}
                                </td>
                            </tr>
                            <tr class="bg-gray-200">
                                <td class="border border-b-2 ">19</td>
                                <td class="border border-b-2 ">
                                    Ekspert F.I.Sh
                                </td>
                                <td class="border border-b-2 ">
                                    {{ $tekshirivchilar->ekspert_fish }}
                                </td>
                            </tr>
                            <tr>
                                <td class="border border-b-2 ">20</td>
                                <td class="border border-b-2 ">
                                    Tashkilotning mas'ul rahbari F.I.Sh
                                </td>
                                <td class="border border-b-2 ">
                                    {{ $tekshirivchilar->t_masul }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            @empty
                @role(['Ishchi guruh azosi', 'super-admin'])
                    <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2 monitoring-form">
                        <div class="w-full mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                            <form id="science-paper-create-form" method="POST" action="{{ route('tijoratexpert.store') }}"
                                class="validate-form" enctype="multipart/form-data" novalidate="novalidate">
                                @csrf
                                <div class="grid grid-cols-12 gap-2">
                                    <input type="hidden" name="tijorat_id" value="{{ $tijorat->id }}">
                                    <input type="hidden" name="holati" value="{{ old('holati', 'yuborildi') }}">

                                    <div class="field-group w-full col-span-6">
                                        <label class="flex flex-col sm:flex-row"> <span
                                                class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Loyiha Kalendar rejasiga
                                            ko‘ra ajratilgan grant mablag‘larni maqsadli sarflanganligi?
                                        </label>
                                        <select name="grant_sarf_maqsadli" class="input border w-full mt-2 show-comment-select"
                                            required="">

                                            <option value=""></option>
                                            <option value="1" @selected(old('grant_sarf_maqsadli') == '1')>Ha</option>
                                            <option value="0" @selected(old('grant_sarf_maqsadli') == '0')>Yo'q</option>

                                        </select><br>

                                        <textarea name="grant_sarf_maqsadli_izox" id=""
                                            class="input w-full border mt-2 tijorat-show-izoh-hidden comment-area" cols="2" rows="2" required>{{ old('grant_sarf_maqsadli_izox') }}</textarea>

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
                                            <option value="1" @selected(old('asbob_balans_olingan') == '1')>Ha</option>
                                            <option value="0" @selected(old('asbob_balans_olingan') == '0')>Yo'q</option>

                                        </select><br>

                                        <textarea name="asbob_balans_olingan_izox" id=""
                                            class="input w-full border mt-2 tijorat-show-izoh-hidden comment-area" cols="2" rows="2" required>{{ old('asbob_balans_olingan_izox') }}</textarea>

                                        @error('asbob_balans_olingan')
                                            <div class="error">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="field-group w-full col-span-6">
                                        <label class="flex flex-col sm:flex-row"> <span
                                                class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Xaqiqatda ishga olingan
                                            xodimlar soni?
                                        </label>
                                        <input type="number" name="xodimlar_lozim" class="input border w-full mt-2"
                                            min="0" id="" value="{{ old('xodimlar_lozim') }}">

                                        @error('xodimlar_lozim')
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
                                            <option value="1" @selected(old('xodimlar_haqiqiy') == '1')>Ha</option>
                                            <option value="0" @selected(old('xodimlar_haqiqiy') == '0')>Yo'q</option>

                                        </select><br>

                                        <textarea name="xodimlar_haqiqiy_izox" id=""
                                            class="input w-full border mt-2 tijorat-show-izoh-hidden comment-area" cols="2" rows="2" required>{{ old('xodimlar_haqiqiy_izox') }}</textarea>

                                        @error('xodimlar_haqiqiy')
                                            <div class="error">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="w-full col-span-6 ">
                                        <label class="flex flex-col sm:flex-row"> <span
                                                class="mt-1 mr-1 sm:mt-0 text-xs text-red-600"></span> Loyiha doirasida ishlab
                                            chiqilgan mahsulot miqdori? O‘lchov birligiga ko‘ra (dona, kg, metr ...)</label>
                                        <input type="number" class="input w-full border mt-2" name="mahsulot_miqdori"
                                            value="{{ old('mahsulot_miqdori') }}" required>
                                        <select name="mahsulot_olchov" class="input border w-full mt-2 show-comment-select"
                                            required="">
                                            <option value=""></option>
                                            <option value="dona" @selected(old('mahsulot_olchov') == 'dona')>Dona</option>
                                            <option value="kg" @selected(old('mahsulot_olchov') == 'kg')>KG</option>
                                            <option value="metr" @selected(old('mahsulot_olchov') == 'metr')>Metr</option>
                                        </select>
                                    </div>

                                    <div class="w-full col-span-6 ">
                                        <label class="flex flex-col sm:flex-row"> <span
                                                class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Loyiha doirasida amalga
                                            oshirilgan sotuv xajmi? Million so‘mda</label>
                                        <input type="text" id="tijoratSotuvHajmi" oninput="formatNumber(this)"
                                            name="sotuv_hajmi" value="{{ old('sotuv_hajmi') }}"
                                            class="input w-full border mt-2 show-comment-select" required="">
                                        @error('sotuv_hajmi')
                                            <div class="error">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="w-full col-span-6 ">
                                        <label class="flex flex-col sm:flex-row"> <span
                                                class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Loyiha doirasida amalga
                                            oshirilgan eksport xajmi? Ming dollarda</label>
                                        <input type="text" id="tijoratEksportHajmi" oninput="formatNumber(this)"
                                            name="eksport_hajmi" value="{{ old('eksport_hajmi') }}"
                                            class="input w-full border mt-2 show-comment-select" required="">
                                        @error('eksport_hajmi')
                                            <div class="error">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="w-full col-span-6 ">
                                        <label class="flex flex-col sm:flex-row"> <span
                                                class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Budjetga to‘langan
                                            soliqlar? Million so‘mda</label>
                                        <input type="text" id="tijoratSoliqTolov" oninput="formatNumber(this)"
                                            name="soliq_tolov" value="{{ old('soliq_tolov') }}"
                                            class="input w-full border mt-2 show-comment-select" required="">
                                        @error('soliq_tolov')
                                            <div class="error">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="w-full col-span-6 ">
                                        <label class="flex flex-col sm:flex-row"> <span
                                                class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Loyihani amalga oshirish
                                            bo‘yicha hisobot topshirib kelinganligi?</label>
                                        <textarea name="hisobot_topshirildi_izox" id="" class="input w-full border mt-2" cols="5"
                                            rows="5" required>{{ old('hisobot_topshirildi_izox') }}</textarea>
                                    </div>

                                    <div class="field-group w-full col-span-6">
                                        <label class="flex flex-col sm:flex-row"> <span
                                                class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Mahsulot bo‘yicha
                                            sertifikat olinganligi?
                                        </label>
                                        <select name="sertifikat_olingan" class="input border w-full mt-2 show-comment-select"
                                            required="">

                                            <option value=""></option>
                                            <option value="1" @selected(old('sertifikat_olingan') == '1')>Ha</option>
                                            <option value="0" @selected(old('sertifikat_olingan') == '0')>Yo'q</option>

                                        </select><br>
                                        <textarea name="sertifikat_olingan_izox" id=""
                                            class="input w-full border mt-2 tijorat-show-izoh-hidden comment-area" cols="2" rows="2" required>{{ old('sertifikat_olingan_izox') }}</textarea>

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
                                            <option value="1" @selected(old('loyiha_muammo') == '1')>Ha</option>
                                            <option value="0" @selected(old('loyiha_muammo') == '0')>Yo'q</option>

                                        </select><br>
                                        <textarea name="loyiha_muammo_izox" id=""
                                            class="input w-full border mt-2 tijorat-show-izoh-hidden comment-area" cols="2" rows="2" required>{{ old('loyiha_muammo_izox') }}</textarea>

                                        @error('loyiha_muammo')
                                            <div class="error">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="w-full col-span-6 field-group">
                                        <label class="flex flex-col sm:flex-row">
                                            <span class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>
                                            Muammoni bartaraf etish bo‘yicha takliflari?
                                        </label>

                                        <select name="loyiha_taklif" class="input border w-full mt-2 show-comment-select"
                                            required>
                                            <option value=""></option>
                                            <option value="1" @selected(old('loyiha_taklif') == '1')>Ha</option>
                                            <option value="0" @selected(old('loyiha_taklif') == '0')>Yo'q</option>
                                        </select>

                                        <textarea name="loyiha_taklif_izox" class="input w-full border mt-2 tijorat-show-izoh-hidden comment-area"
                                            cols="2" rows="2">{{ old('loyiha_taklif_izox') }}</textarea>

                                        @error('loyiha_taklif')
                                            <div class="error">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="field-group w-full col-span-6">
                                        <label class="flex flex-col sm:flex-row"> <span
                                                class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Kalendar rejaga muvofiq
                                            ishlarni bajarilganligi
                                        </label>
                                        <select name="kalendar_bajarilgan" class="input border w-full mt-2 show-comment-select"
                                            required="">

                                            <option value=""></option>
                                            <option value="To‘liq bajarilgan" @selected(old('kalendar_bajarilgan') == 'To‘liq bajarilgan')>To‘liq bajarilgan </option>
                                            <option value="Qisman bajarilgan" @selected(old('kalendar_bajarilgan') == 'Qisman bajarilgan')>Qisman bajarilgan</option>
                                            <option value="Bajarilmagan" @selected(old('kalendar_bajarilgan') == 'Bajarilmagan')>Bajarilmagan</option>
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
                                            class="input border w-full mt-2 show-comment-select" required="">

                                        @error('media_zip')
                                            <div class="error">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="w-full col-span-6 ">
                                        <label class="flex flex-col sm:flex-row"> <span
                                                class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Ekspert F.I.Sh</label>
                                        <input type="text" name="ekspert_fish" class="input w-full border mt-2"
                                            value="{{ old('ekspert_fish') }}" required>
                                        @error('ekspert_fish')
                                            <div class="error">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="w-full col-span-6 ">
                                        <label class="flex flex-col sm:flex-row"> <span
                                                class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Tashkilotning mas'ul
                                            rahbari F.I.Sh</label>
                                        <input type="text" name="t_masul" class="input w-full border mt-2"
                                            value="{{ old('t_masul') }}" required>
                                        @error('t_masul')
                                            <div class="error">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="w-full col-span-6">
                                        <label class="flex flex-col sm:flex-row"> <span
                                                class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Status
                                        </label>
                                        <select name="status" class="input border w-full mt-2 show-comment-select"
                                            required="">

                                            <option value="">Status tanlang</option>
{{-- 
                                            <option value="Qo‘shimcha o‘rganish talab etiladi">Qo‘shimcha o‘rganish
                                                talab etiladi</option> --}}
    
                                            <option value="Ijobiy" @selected(old('status') == 'Ijobiy')>Ijobiy</option>
                                            <option value="Salbiy" @selected(old('status') == 'Salbiy')>Salbiy</option>


                                        </select><br>

                                        @error('status')
                                            <div class="error">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="w-full col-span-6 ">
                                        <label class="flex flex-col sm:flex-row"> <span
                                                class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Izoh</label>
                                        <textarea name="comment" id="" class="input w-full border mt-2" cols="5" rows="5" required>{{ old('comment') }}</textarea>
                                        @error('comment')
                                            <div class="error">{{ $message }}</div>
                                        @enderror
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
                @endrole
            @endforelse
        @endrole


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

            if (outputId) {
                const el = document.getElementById(outputId);
                if (el) {
                    el.textContent = numberToWords(Number(value));
                }
            }
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
        document.querySelectorAll('.show-comment-select').forEach(select => {
            select.addEventListener('change', function() {
                let textarea = this.closest('.field-group').querySelector('.comment-area');

                if (this.value === "0") {
                    textarea.classList.remove('tijorat-show-izoh-hidden');
                    textarea.setAttribute('required', true);
                } else {
                    textarea.classList.add('tijorat-show-izoh-hidden');
                    textarea.removeAttribute('required');
                    textarea.value = "";
                }
            });
        });
    </script>
@endsection
