@extends('layouts.admin')

@section('content')
    @php
        $scienceFlowActive = ! empty($data) || ! empty($create) || ! empty($errorMessage);
    @endphp
    <div class="content">
        <div class="flex justify-between align-center mt-6 mb-6">

            <h2 class="intro-y text-lg font-medium">{{ $ilmiyloyiha->tashkilot->name }} </h2>

            @role(['Ilmiy loyihalar boyicha masul', 'Ekspert', 'super-admin', 'Ishchi guruh azosi'])
            <a href="{{ route('ilmiy_loyihalar.index', ['id' => $ilmiyloyiha->tashkilot->id]) }}"
                class="button w-24 bg-theme-1 text-white">
                Orqaga
            </a>
            @endrole
            @role('admin')
            <a href="{{ route('ilmiyloyiha.index') }}" class="button w-24 bg-theme-1 text-white">
                Orqaga
            </a>
            @endrole
            @role('Itm-tashkilotlar')
            <a href="{{ route('itm.ilmiyloyiha') }}" class="button w-24 bg-theme-1 text-white">
                Orqaga
            </a>
            @endrole
            @role('Ilmiy_loyiha_rahbari')
            <a href="{{ route('scientific_project.index') }}" class="button w-24 bg-theme-1 text-white">
                Orqaga
            </a>
            @endrole

        </div>

        <div class="intro-y box px-4   mt-5">
            <div class="nav-tabs flex flex-col sm:flex-row justify-center lg:justify-start">
                <a data-toggle="tab" data-target="#add-hersh" href="javascript:;"
                    class="py-4 sm:mr-8 flex items-center {{ $scienceFlowActive ? '' : 'active' }}">
                    LOYIHANING ASOSIY KO'RSATKICHLARI
                </a>
                <a data-toggle="tab" data-target="#settings" href="javascript:;" class="py-4 sm:mr-8 flex items-center">
                    INTELLEKTUAL FAOLIYAT NATIJALARI
                </a>
                <a data-toggle="tab" data-target="#change-password" href="javascript:;"
                    class="py-4 sm:mr-8 flex items-center">
                    LOYIHANING MUHIM NATIJALARI
                </a>
                <a data-toggle="tab" data-target="#add-ijrochilari" href="javascript:;"
                    class="py-4 sm:mr-8 flex items-center {{ $scienceFlowActive ? 'active' : '' }}">
                    LOYIHA IJROCHILARI
                </a>
                <a data-toggle="tab" data-target="#loyiha-asbobuskunalar" href="javascript:;"
                    class="py-4 sm:mr-8 flex items-center">
                    ASBOB-USKUNALARI
                </a>

                @role(['Ilmiy loyihalar boyicha masul', 'Ekspert', 'Ishchi guruh azosi', 'super-admin', 'Rahbar'])
                @if ($quarters->count() > 0)
                    <a data-toggle="tab" data-target="#old-expert" href="javascript:;"
                        class="py-4 sm:mr-8 flex items-center w-24 ">
                        EKSPERT XULOSASILARI
                    </a>
                @endif

                <a data-toggle="tab" data-target="#add-expert" href="javascript:;" class="py-4 sm:mr-8 flex items-center ">
                    EKSPERT XULOSASI
                </a>
                @endrole
            </div>
        </div>

        @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif

        <style>
            .alert-danger {
                background-color: #f8d7da;
                color: #721c24;
                border: 1px solid #f5c6cb;
                padding: 15px;
                border-radius: 5px;
                margin-top: 15px;
                font-size: 16px;
            }
        </style>

        <div class="overflow-x-auto mt-2" style="background-color: white;border-radius:8px;">

            <div class="tab-content mt-5">

                <div class="tab-content__pane {{ $scienceFlowActive ? '' : 'active' }}" id="add-hersh">
                    <div class="p-5">
                        <div
                            style="display: flex;justify-content: end; border-bottom: 1px solid #e2e8f0; padding-bottom: 20px;">
                            <div style="text-align: center;">
                                @if (is_null($tekshirivchilar))
                                    <a href="javascript:;" data-target="#ilmiyloyiha-paper-edit-modal" data-toggle="modal"
                                        class="button w-24 ml-3 bg-theme-1 text-white">
                                        Tahrirlash
                                    </a>
                                @endif
                                @role(['super-admin', 'Ilmiy loyihalar boyicha masul'])
                                    <a href="javascript:;" data-target="#tashkilot-status-edit-modal" data-toggle="modal"
                                        class="button w-24 ml-3 bg-theme-1 text-white">
                                        Loyihaning statusini tahrirlash
                                    </a>
                                @endrole
                            </div>
                        </div>
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th class="border" style="width: 40px;">T/r</th>
                                    <th class="border" style="text-align: center; width: 40%;">MA'LUMOT NOMI</th>
                                    <th class="border" style="text-align: center;">BAJARILISHI NATIJALARINING KO'RSATKICHARI
                                    </th>
                                </tr>
                                <tr>
                                    <th colspan="3" class="border" style="text-align: center;">I. LOYIHANING ASOSIY
                                        KO'RSATKICHLARI</th>
                                </tr>
                                <tr>
                                    <td class="border">1.1.</td>
                                    <td class="border">Loyiha mavzusi</td>
                                    <td class="border">uz: {{ $ilmiyloyiha->mavzusi }} <br> ru:
                                        {{ $ilmiyloyiha->mavzusi_ru }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="border">1.2.</td>
                                    <td class="border">Loyiha turi</td>
                                    <td class="border">{{ $ilmiyloyiha->turi }}</td>
                                </tr>
                                <tr>
                                    <td class="border">1.3.</td>
                                    <td class="border">Loyiha shifri</td>
                                    <td class="border">{{ $ilmiyloyiha->raqami }}</td>
                                </tr>
                                <tr>
                                    <td class="border">1.4.</td>
                                    <td class="border">Shartnoma raqami va sanasi</td>
                                    <td class="border">{{ $ilmiyloyiha->sh_raqami }}, {{ $ilmiyloyiha->sanasi }}
                                        @if ($ilmiyloyiha->umumiy_mablag)
                                            <a href="{{ asset('storage/' . $ilmiyloyiha->umumiy_mablag) }}"
                                                class="button  bg-theme-1 text-white" target="_blank">Faylni ko'rish</a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td class="border">1.5.</td>
                                    <td class="border">Bajarilish muddati</td>
                                    <td class="border">
                                        {{ optional($ilmiyloyiha->bosh_sana)->format('Y-m-d') . ' - ' . ($ilmiyloyiha->tug_sana ? date('Y-m-d', strtotime($ilmiyloyiha->tug_sana)) : '') }}
                                        yillar
                                    </td>
                                </tr>
                                {{-- <tr>
                                    <td class="border">1.6.</td>
                                    <td class="border">Ijrochi tashkilot</td>
                                    <td class="border">{{ $ilmiyloyiha->ijrochi_tashkilot }}</td>
                                </tr> --}}
                                <tr>
                                    <td class="border">1.6.</td>
                                    <td class="border">Loyihaning umumiy qiymati, soʻm</td>
                                    <td class="border">
                                        {{ number_format((int) preg_replace('/\D/', '', (string) ($ilmiyloyiha->sum ?? '')), 0, '.', ' ') }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="border">1.6.1.</td>
                                    <td class="border">Joriy yil uchun ajratilgan mablagʻ, soʻm</td>
                                    <td class="border">{{ $ilmiyloyiha->joriy_yil_sum }}</td>
                                </tr>
                                {{-- <tr>
                                    <td class="border">1.9.</td>
                                    <td class="border">Loyiha moddiy-texnik bazasi uchun yoʻnaltirilgan mablagʻ, mln.soʻm
                                    </td>
                                    <td class="border">{{ $ilmiyloyiha->moddiy_texnik_mablaglar }}</td>
                                </tr> --}}
                                <tr>
                                    <td class="border">1.6.2.</td>
                                    <td class="border">Jami summaga nisbatan, foiz</td>
                                    <td class="border">{{ $ilmiyloyiha->jami_summa_nisbat }}</td>
                                </tr>

                                <tr>
                                    <th colspan="3" class="border" style="text-align: center;">II. LOYIHANING RAHBARI VA
                                        IJROCHILARI</th>
                                </tr>
                                <tr>
                                    <td class="border">2.1.</td>
                                    <td class="border"> <b>Loyihaning amaldagi rahbarining familiyasi, ismi, sharifi</b>
                                    </td>
                                    <td class="border">{{ $ilmiyloyiha->rahbar_name }}</td>
                                </tr>
                                <tr>
                                    <td class="border">2.1.1.</td>
                                    <td class="border">Ilmiy darajasi </td>
                                    <td class="border">{{ $ilmiyloyiha->rahbariilmiy_darajasi }}</td>
                                </tr>
                                <tr>
                                    <td class="border">2.1.2.</td>
                                    <td class="border">Ilmiy unvoni</td>
                                    <td class="border">{{ $ilmiyloyiha->rahbariilmiy_unvoni }}</td>
                                </tr>
                                <tr>
                                    <td class="border">2.1.3.</td>
                                    <td class="border">Lavozimi</td>
                                    <td class="border">{{ $ilmiyloyiha->r_lavozimi }}</td>
                                </tr>
                                <tr>
                                    <td class="border">2.1.4.</td>
                                    <td class="border">Rahbar bilan kelishuvning raqami va sanasi </td>
                                    <td class="border">{{ $ilmiyloyiha->rsh_raqami }} , {{ $ilmiyloyiha->rsh_sanasi }}
                                    </td>
                                </tr>

                                <tr>
                                    <td class="border">2.2.</td>
                                    <td class="border"><b>Loyiha rahbari o'zgargan</b></td>
                                    <td class="border">{{ $ilmiyloyiha->loyiha_rahbari_uzgargan }}</td>
                                </tr>
                                <tr>
                                    <td class="border">2.2.1.</td>
                                    <td class="border">Loyihaning avvalgi rahbarining familiyasi, ismi, sharifi</td>
                                    <td class="border">{{ $ilmiyloyiha->avvr_fish }}</td>
                                </tr>
                                <tr>
                                    <td class="border">2.2.2.</td>
                                    <td class="border">Ilmiy darajasi </td>
                                    <td class="border">{{ $ilmiyloyiha->avvr_ilmiy_daraja }}</td>
                                </tr>
                                <tr>
                                    <td class="border">2.2.3.</td>
                                    <td class="border">Ilmiy unvoni</td>
                                    <td class="border">{{ $ilmiyloyiha->avvr_ilmiy_unvon }}</td>
                                </tr>
                                <tr>
                                    <td class="border">2.2.4.</td>
                                    <td class="border">Lavozimi</td>
                                    <td class="border">{{ $ilmiyloyiha->avvr_lavozimi }}</td>
                                </tr>
                                <tr>
                                    <td class="border">2.2.5.</td>
                                    <td class="border">Rahbar bilan kelishuvning raqami va sanasi </td>
                                    <td class="border">{{ $ilmiyloyiha->avvr_kelishuv_raqami }},
                                        {{ $ilmiyloyiha->avvr_kelishuv_sanasi }}
                                    </td>
                                </tr>


                                <tr>
                                    <td class="border">2.3.</td>
                                    <td class="border"><b>Loyihaning hamrahbari mavjud</b></td>
                                    <td class="border">{{ $ilmiyloyiha->loyiha_hamrahbari }}</td>
                                </tr>
                                <tr>
                                    <td class="border">2.3.1.</td>
                                    <td class="border">Loyiha hamrahbarining familiyasi, ismi, sharifi</td>
                                    <td class="border">{{ $ilmiyloyiha->hamrahbar_fish }}</td>
                                </tr>
                                <tr>
                                    <td class="border">2.3.2.</td>
                                    <td class="border">Ish joyi</td>
                                    <td class="border">{{ $ilmiyloyiha->hamr_ishjoyi }}</td>
                                </tr>
                                <tr>
                                    <td class="border">2.3.3.</td>
                                    <td class="border">Lavozimi</td>
                                    <td class="border">{{ $ilmiyloyiha->hamr_lavozimi }}</td>
                                </tr>
                                <tr>
                                    <td class="border">2.3.4.</td>
                                    <td class="border">Davlati</td>
                                    <td class="border">{{ $ilmiyloyiha->hamr_davlati }}</td>
                                </tr>
                                <tr>
                                    <td class="border">2.4.</td>
                                    <td class="border">Shtat birligi</td>
                                    <td class="border">{{ $shtat_sum ?? 0 }}</td>
                                </tr>
                                <tr>
                                    <td class="border">2.5</td>
                                    <td class="border">Ijrochilar soni, nafar</td>
                                    <td class="border">{{ $loyihaijrochilar->count() }}</td>
                                </tr>
                                {{-- <tr>
                                    <td class="border">13.</td>
                                    <td class="border">Ijrochilar roʻyxati oʻzgargan</td>
                                    <td class="border">Ijrochilarning amaldagi roʻyxati</td>
                                </tr>
                                <tr>
                                    <td class="border">14.</td>
                                    <td class="border">Ilmiy jamoaning oʻrtacha yoshi</td>
                                    <td class="border">a</td>
                                </tr> --}}

                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="tab-content__pane" id="settings">

                    <div class="grid grid-cols-12 gap-6">

                        <div class="col-span-12 lg:col-span-12 xxl:col-span-12">
                            <div class="intro-y box ">
                                <div class="p-5">
                                    <div
                                        style="display: flex;justify-content: end; border-bottom: 1px solid #e2e8f0; padding-bottom: 20px;">
                                        {{-- <div style="font-size:18px;font-weight: 400;"> {{$asbobuskuna->name}}
                                            xaqida ma’lumot
                                        </div> --}}
                                        <div style="text-align: center;">
                                            @if (is_null($tekshirivchilar))
                                                @if (empty($intellektual?->id))
                                                    <a href="javascript:;" data-target="#intellektual-paper-create-modal"
                                                        data-toggle="modal" class="button w-24 ml-3 bg-theme-1 text-white">
                                                        Qo'shish
                                                    </a>
                                                @else
                                                    {{-- <a
                                                        href="{{ route('intellektual.edit', ['intellektual' => $intellektual?->id])}}"
                                                        class="button w-24 bg-theme-1 text-white" style="margin-right:20px;">
                                                        Tahrirlash
                                                    </a> --}}
                                                    <a href="javascript:;" data-target="#intellektual-paper-edit-modal"
                                                        data-toggle="modal" class="button w-24 ml-3 bg-theme-1 text-white">
                                                        Tahrirlash
                                                    </a>
                                                @endif
                                            @endif
                                            {{-- <a href="" class="button w-24 bg-theme-6 text-white">
                                                O'chirish
                                            </a> --}}
                                            @role(['Ilmiy loyihalar boyicha masul', 'Ekspert'])
                                            @if (! empty($intellektual?->id))
                                                <a href="javascript:;" data-target="#intellektualekspert-paper-edit-modal"
                                                    data-toggle="modal" class="button w-24 ml-3 bg-theme-1 text-white">
                                                    Izoh
                                                </a>
                                            @endif
                                            @endrole
                                        </div>
                                    </div>
                                    <table class="table table-bordered">
                                        <tbody>
                                        <tr>
                                            <th class="border" style="text-align: center;" colspan="6">INTELLEKTUAL
                                                FAOLIYAT
                                                NATIJALARI</th>
                                        </tr>
                                        <tr>
                                            <th class="border" style="width: 40px;">T/r</th>
                                            <th class="border">Koʻrsatkichlar</th>
                                            <th class="border">Rejada</th>
                                            <th class="border">Amalda</th>
                                            <th class="border">Farqi</th>
                                            <th class="border">Izoh</th>
                                        </tr>
                                        <tr>
                                            <td class="border">1.</td>
                                            <td class="border" style="font-size:14px;">
                                                Mahalliy ilmiy jurnallardagi maqolalar soni
                                            </td>
                                            <td class="border">
                                                {{ $intellektual?->mal_jur_reja ?? 0 }}
                                            </td>
                                            <td class="border">
                                                {{ $intellektual?->mal_jur_amalda ?? 0 }}
                                            </td>
                                            <td class="border">
                                                {{ ($intellektual?->mal_jur_amalda ?? 0) - ($intellektual?->mal_jur_reja ?? 0) }}
                                            </td>
                                            <td class="border">{{ $intellektual?->mal_jur_izoh ?? null }}</td>
                                        </tr>
                                        <tr>
                                            <td class="border">2.</td>
                                            <td class="border" style="font-size:14px;">
                                                Xorijiy jurnallardagi ilmiy maqolalar soni
                                            </td>
                                            <td class="border">
                                                {{ $intellektual?->xor_jur_reja ?? 0 }}
                                            </td>
                                            <td class="border">
                                                {{ $intellektual?->xor_jur_amalda ?? 0 }}
                                            </td>
                                            <td class="border">
                                                {{ ($intellektual?->xor_jur_amalda ?? 0) - ($intellektual?->xor_jur_reja ?? 0) }}
                                            </td>
                                            <td class="border">{{ $intellektual?->xor_jur_izoh ?? null }}</td>
                                        </tr>
                                        <tr>
                                            <td class="border">3.</td>
                                            <td class="border" style="font-size:14px;">
                                                Web of Science va Scopus bazasidagi xalqaro nashrlardagi maqolalar soni
                                            </td>
                                            <td class="border">
                                                {{ $intellektual?->web_jur_reja ?? 0 }}
                                            </td>
                                            <td class="border">
                                                {{ $intellektual?->web_jur_amalda ?? 0 }}
                                            </td>
                                            <td class="border">
                                                {{ ($intellektual?->web_jur_amalda ?? 0) - ($intellektual?->web_jur_reja ?? 0) }}
                                            </td>
                                            <td class="border">{{ $intellektual?->web_jur_izoh ?? null }}</td>
                                        </tr>
                                        <tr>
                                            <td class="border">4.</td>
                                            <td class="border" style="font-size:14px;">
                                                Tezislar soni
                                            </td>
                                            <td class="border">
                                                {{ $intellektual?->tezislar_reja ?? 0 }}
                                            </td>
                                            <td class="border">
                                                {{ $intellektual?->tezislar_amalda ?? 0 }}
                                            </td>
                                            <td class="border">
                                                {{ ($intellektual?->tezislar_amalda ?? 0) - ($intellektual?->tezislar_reja ?? 0) }}
                                            </td>
                                            <td class="border">{{ $intellektual?->tezislar_izoh ?? null }}</td>
                                        </tr>
                                        <tr>
                                            <td class="border">5.</td>
                                            <td class="border" style="font-size:14px;">
                                                Ilmiy monografiyalar soni
                                            </td>
                                            <td class="border">
                                                {{ $intellektual?->ilmiy_mon_reja ?? 0 }}
                                            </td>
                                            <td class="border">
                                                {{ $intellektual?->ilmiy_mon_amalda ?? 0 }}
                                            </td>
                                            <td class="border">
                                                {{ ($intellektual?->ilmiy_mon_amalda ?? 0) - ($intellektual?->ilmiy_mon_reja ?? 0) }}
                                            </td>
                                            <td class="border">{{ $intellektual?->ilmiy_mon_izoh ?? null }}</td>
                                        </tr>
                                        <tr>
                                            <td class="border">6.</td>
                                            <td class="border" style="font-size:14px;">
                                                Nashr qilingan oʻquv qoʻllanmalari soni
                                            </td>
                                            <td class="border">
                                                {{ $intellektual?->nashr_uquv_reja ?? 0 }}
                                            </td>
                                            <td class="border">
                                                {{ $intellektual?->nashr_uquv_amalda ?? 0 }}
                                            </td>
                                            <td class="border">
                                                {{ ($intellektual?->nashr_uquv_amalda ?? 0) - ($intellektual?->nashr_uquv_reja ?? 0) }}
                                            </td>
                                            <td class="border">{{ $intellektual?->nashr_uquv_izoh ?? null }}</td>
                                        </tr>
                                        <tr>
                                            <td class="border">7.</td>
                                            <td class="border" style="font-size:14px;">
                                                Nashr qilingan darsliklar soni
                                            </td>
                                            <td class="border">
                                                {{ $intellektual?->darslik_reja ?? 0 }}
                                            </td>
                                            <td class="border">
                                                {{ $intellektual?->darslik_amalda ?? 0 }}
                                            </td>
                                            <td class="border">
                                                {{ ($intellektual?->darslik_amalda ?? 0) - ($intellektual?->darslik_reja ?? 0) }}
                                            </td>
                                            <td class="border">{{ $intellektual?->darslik_izoh ?? null }}</td>
                                        </tr>
                                        <tr>
                                            <td class="border">8.</td>
                                            <td class="border" style="font-size:14px;">
                                                Bakalavriat bosqichida tayyorlangan bitiruv malakaviy ishlari soni
                                            </td>
                                            <td class="border">
                                                {{ $intellektual?->b_bitiruv_mreja ?? 0 }}
                                            </td>
                                            <td class="border">
                                                {{ $intellektual?->b_bitiruv_mamalda ?? 0 }}
                                            </td>
                                            <td class="border">
                                                {{ ($intellektual?->b_bitiruv_mamalda ?? 0) - ($intellektual?->b_bitiruv_mreja ?? 0) }}
                                            </td>
                                            <td class="border">{{ $intellektual?->b_bitiruv_izoh ?? null }}</td>
                                        </tr>
                                        <tr>
                                            <td class="border">9.</td>
                                            <td class="border" style="font-size:14px;">
                                                Tayyorlangan magistrlik dissertatsiyalari soni
                                            </td>
                                            <td class="border">
                                                {{ $intellektual?->m_bitiruv_dreja ?? 0 }}
                                            </td>
                                            <td class="border">
                                                {{ $intellektual?->m_bitiruv_damalda ?? 0 }}
                                            </td>
                                            <td class="border">
                                                {{ ($intellektual?->m_bitiruv_damalda ?? 0) - ($intellektual?->m_bitiruv_dreja ?? 0) }}
                                            </td>
                                            <td class="border">{{ $intellektual?->m_bitiruv_izoh ?? null }}</td>
                                        </tr>
                                        <tr>
                                            <td class="border">10.</td>
                                            <td class="border" style="font-size:14px;">
                                                Tayyorlangan doktorlik dissertatsiyalari soni (PhD, DSc)
                                            </td>
                                            <td class="border">
                                                {{ $intellektual?->p_bitiruv_dreja ?? 0 }}
                                            </td>
                                            <td class="border">
                                                {{ $intellektual?->p_bitiruv_damalda ?? 0 }}
                                            </td>
                                            <td class="border">
                                                {{ ($intellektual?->p_bitiruv_damalda ?? 0) - ($intellektual?->p_bitiruv_dreja ?? 0) }}
                                            </td>
                                            <td class="border">{{ $intellektual?->p_bitiruv_izoh ?? null }}</td>
                                        </tr>
                                        <tr>
                                            <td class="border">11.</td>
                                            <td class="border" style="font-size:14px;">
                                                Intellektual mulk obyektlari uchun berilgan arizalar soni
                                            </td>
                                            <td class="border">
                                                {{ $intellektual?->i_mulk_areja ?? 0 }}
                                            </td>
                                            <td class="border">
                                                {{ $intellektual?->i_mulk_aamalda ?? 0 }}
                                            </td>
                                            <td class="border">
                                                {{ ($intellektual?->i_mulk_aamalda ?? 0) - ($intellektual?->i_mulk_areja ?? 0) }}
                                            </td>
                                            <td class="border">{{ $intellektual?->i_mulk_izoh ?? null }}</td>
                                        </tr>
                                        <tr>
                                            <th class="border" style="text-align: center;" colspan="6">IXTIRO UCHUN
                                                PATENT
                                                VA DASTURIY TAʼMINOTLAR</th>
                                        </tr>
                                        <tr>
                                            <th class="border" style="width: 40px;">T/r</th>
                                            <th class="border">Koʻrsatkichlar</th>
                                            <th class="border">Rejada</th>
                                            <th class="border">Amalda</th>
                                            <th class="border">Farqi</th>
                                            <th class="border">Izoh</th>
                                        </tr>
                                        <tr>
                                            <td class="border">1.</td>
                                            <td class="border" style="font-size:14px;">
                                                Ixtiro uchun olingan patentlari soni
                                            </td>
                                            <td class="border">
                                                {{ $intellektual?->ixtiro_olingan_psreja ?? 0 }}
                                            </td>
                                            <td class="border">
                                                {{ $intellektual?->ixtiro_olingan_psamalda ?? 0 }}
                                            </td>
                                            <td class="border">
                                                {{ ($intellektual?->ixtiro_olingan_psamalda ?? 0) - ($intellektual?->ixtiro_olingan_psreja ?? 0) }}
                                            </td>
                                            <td class="border">{{ $intellektual?->ixtiro_olingan_izoh ?? null }}</td>
                                        </tr>
                                        <tr>
                                            <td class="border">2.</td>
                                            <td class="border" style="font-size:14px;">
                                                Ixtiro uchun patentga berilgan buyurtmalar soni
                                            </td>
                                            <td class="border">
                                                {{ $intellektual?->ixtiro_ber_psreja ?? 0 }}
                                            </td>
                                            <td class="border">
                                                {{ $intellektual?->ixtiro_ber_psamalda ?? 0 }}
                                            </td>
                                            <td class="border">
                                                {{ ($intellektual?->ixtiro_ber_psamalda ?? 0) - ($intellektual?->ixtiro_ber_psreja ?? 0) }}
                                            </td>
                                            <td class="border">{{ $intellektual?->ixtiro_ber_izoh ?? null }}</td>
                                        </tr>
                                        <tr>
                                            <td class="border">3.</td>
                                            <td class="border" style="font-size:14px;">
                                                Dasturiy mahsulotga olingan guvohnomalar soni
                                            </td>
                                            <td class="border">
                                                {{ $intellektual?->dasturiy_gsreja ?? 0 }}
                                            </td>
                                            <td class="border">
                                                {{ $intellektual?->dasturiy_gsamalda ?? 0 }}
                                            </td>
                                            <td class="border">
                                                {{ ($intellektual?->dasturiy_gsamalda ?? 0) - ($intellektual?->dasturiy_gsreja ?? 0) }}
                                            </td>
                                            <td class="border">{{ $intellektual?->dasturiy_izoh ?? null }}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="tab-content__pane" id="change-password">
                    <div class="intro-y box">
                        <div class="p-5">
                            <div
                                style="display: flex;justify-content: end; border-bottom: 1px solid #e2e8f0; padding-bottom: 20px;">
                                {{-- <div style="font-size:18px;font-weight: 400;"> {{$asbobuskuna->name}} xaqida ma’lumot
                                </div> --}}
                                <div style="text-align: center;">
                                    @if (is_null($tekshirivchilar))
                                        @if (empty($loyihaiqtisodi?->id))
                                            <a href="javascript:;" data-target="#science-paper-create-modal" data-toggle="modal"
                                                class="button w-24 ml-3 bg-theme-1 text-white">
                                                Qo'shish
                                            </a>
                                        @else
                                            {{-- <a
                                                href="{{ route('loyihaiqtisodi.edit', ['loyihaiqtisodi' => $loyihaiqtisodi?->id])}}"
                                                class="button w-24 bg-theme-1 text-white" style="margin-right:20px;">
                                                Tahrirlash
                                            </a> --}}
                                            <a href="javascript:;" data-target="#science-paper-edit-modal" data-toggle="modal"
                                                class="button w-24 ml-3 bg-theme-1 text-white">
                                                Tahrirlash
                                            </a>
                                        @endif
                                    @endif
                                    {{-- <a href="" class="button w-24 bg-theme-6 text-white">
                                        O'chirish
                                    </a> --}}
                                    @role(['Ilmiy loyihalar boyicha masul', 'Ekspert'])
                                    @if (!empty($loyihaiqtisodi?->id))
                                        <a href="javascript:;" data-target="#loyihaiqtisodiekspert-paper-edit-modal"
                                            data-toggle="modal" class="button w-24 ml-3 bg-theme-1 text-white">
                                            Izoh
                                        </a>
                                    @endif
                                    @endrole
                                </div>
                            </div>
                            <table class="table table-bordered">
                                <tbody>
                                <tr>
                                    <th class="border" style="text-align: center;" colspan="6">III. LOYIHANING MUHIM
                                        NATIJALARI</th>
                                </tr>
                                <tr>
                                    <th class="border" style="width: 40px;">T/r</th>
                                    <th class="border" style="width: 50%;">Koʻrsatkichlar</th>
                                    <th class="border" colspan="3">Bajarilishi holatining tahlili</th>
                                    <th class="border">Izoh</th>
                                </tr>
                                <tr>
                                    <td class="border">3.3.1.</td>
                                    <td class="border" style="font-size:14px;">
                                        Hisobot davrida qoʻlga kiritilgan muhim natijalar
                                    </td>
                                    <td class="border" colspan="3">
                                        {{ $loyihaiqtisodi?->hisobot_davri ?? null }}
                                    </td>
                                    <td class="border">{{ $loyihaiqtisodi?->hisobot_davri_i ?? null }}</td>
                                </tr>
                                <tr>
                                    <td class="border">3.3.2.</td>
                                    <td class="border" style="font-size:14px;">
                                        Loyihaning bajarilishi davrida yaratilgan ishlanma (texnologiya) nomi va qisqacha
                                        tavsifi
                                    </td>
                                    <td class="border" colspan="3">
                                        {{ $loyihaiqtisodi?->loyihabaj_ishlanma ?? null }}
                                    </td>
                                    <td class="border">{{ $loyihaiqtisodi?->loyihabaj_ishlanma_i ?? null }}</td>
                                </tr>
                                <tr>
                                    <td class="border">3.3.3.</td>
                                    <td class="border" style="font-size:14px;">
                                        Ilmiy ishlanma joriy etiladigan (tijoratlashtiriladigan) tarmoq (soha) va
                                        kutilayotgan
                                        natijalar (mavjud ehtiyoj, iqtisodiy samaradorlik tahlili)
                                    </td>
                                    <td class="border" colspan="3">
                                        {{ $loyihaiqtisodi?->ilmiy_ishlanmalar ?? null }}
                                    </td>
                                    <td class="border">{{ $loyihaiqtisodi?->ilmiy_ishlanmalar_i ?? null }}</td>
                                </tr>

                                <tr>
                                    <th class="border" style="text-align: center;" colspan="6">LOYIHANING MOLIYAVIY VA
                                        IQTISODIY
                                        KOʻRSATKICHLARI
                                        (AJRATILGAN MABLAGʻLARNING MAQSADLI ISHLATILISHI)
                                    </th>
                                </tr>
                                <tr>
                                    <td class="border">T/r.</td>
                                    <th class="border" style="width: 50%;">Koʻrsatkichlar</th>
                                    <th class="border">Rejada</th>
                                    <th class="border">Amalda</th>
                                    <th class="border">Farqi</th>
                                    <th class="border">Izoh</th>
                                </tr>
                                <tr>
                                    <td class="border">4.1.</td>
                                    <td class="border" style="font-size:14px;">
                                        Mehnatga haq toʻlash (5.1.-shakl)
                                    </td>
                                    {{-- <td class="border"> --}}
                                        {{-- {{ $loyihaiqtisodi?->mehnat_haq_r ?? null }} --}}
                                        {{-- {{ number_format($loyihaiqtisodi?->mehnat_haq_r, 0, '.', ' ') }} --}}
                                    <td class="border">
                                        {{ $loyihaiqtisodi?->mehnat_haq_r ?? null }}
                                    </td>
                                    {{-- </td> --}}
                                    <td class="border">
                                        {{ $loyihaiqtisodi?->mehnat_haq_a ?? null }}
                                    </td>
                                    <td class="border">
                                        {{ number_format(preg_replace('/\D/', '', $loyihaiqtisodi?->mehnat_haq_r ?? 0) - preg_replace('/\D/', '', $loyihaiqtisodi?->mehnat_haq_a ?? 0), 0, '', ' ') }}
                                    </td>
                                    <td class="border">
                                        {{ $loyihaiqtisodi?->mehnat_haq_i ?? null }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="border">4.2.</td>
                                    <td class="border" style="font-size:14px;">
                                        Xizmat safarlari xarajatlari (5.2.-shakl)
                                    </td>
                                    <td class="border">
                                        {{ $loyihaiqtisodi?->xizmat_saf_r ?? null }}
                                    </td>
                                    <td class="border">
                                        {{ $loyihaiqtisodi?->xizmat_saf_a ?? null }}
                                    </td>
                                    <td class="border">
                                        {{ number_format(preg_replace('/\D/', '', $loyihaiqtisodi?->xizmat_saf_r ?? 0) - preg_replace('/\D/', '', $loyihaiqtisodi?->xizmat_saf_a ?? 0), 0, '', ' ') }}
                                    </td>
                                    <td class="border">{{ $loyihaiqtisodi?->xizmat_saf_i ?? null }}</td>
                                </tr>
                                <tr>
                                    <td class="border">4.3.</td>
                                    <td class="border" style="font-size:14px;">
                                        Ilmiy-tadqiqot uchun zarur boʻlgan asbob-uskunalar, texnik vositalar va boshqa
                                        tovar-moddiy boyliklarning xaridi uchun xarajatlar (5.4.-shakl)
                                    </td>
                                    <td class="border">
                                        {{ $loyihaiqtisodi?->xarid_xaraja_r ?? null }}
                                    </td>
                                    <td class="border">
                                        {{ $loyihaiqtisodi?->xarid_xaraja_a ?? null }}
                                    </td>
                                    <td class="border">
                                        {{ number_format(preg_replace('/\D/', '', $loyihaiqtisodi?->xarid_xaraja_r ?? 0) - preg_replace('/\D/', '', $loyihaiqtisodi?->xarid_xaraja_a ?? 0), 0, '', ' ') }}
                                    </td>
                                    <td class="border">{{ $loyihaiqtisodi?->xarid_xaraja_i ?? null }}</td>
                                </tr>
                                <tr>
                                    <td class="border">4.4.</td>
                                    <td class="border" style="font-size:14px;">
                                        Ilmiy-tadqiqot uchun materiallar va butlovchi qismlarni sotib olish xarajatlari
                                        (5.5.-shakl)
                                    </td>
                                    <td class="border">
                                        {{ $loyihaiqtisodi?->mat_butlovchi_r ?? null }}
                                    </td>
                                    <td class="border">
                                        {{ $loyihaiqtisodi?->mat_butlovchi_a ?? null }}
                                    </td>
                                    <td class="border">
                                        {{ number_format(preg_replace('/\D/', '', $loyihaiqtisodi?->mat_butlovchi_r ?? 0) - preg_replace('/\D/', '', $loyihaiqtisodi?->mat_butlovchi_a ?? 0), 0, '', ' ') }}
                                    </td>
                                    <td class="border">{{ $loyihaiqtisodi?->mat_butlovchi_i ?? null }}</td>
                                </tr>
                                <tr>
                                    <td class="border">4.5.</td>
                                    <td class="border" style="font-size:14px;">
                                        Loyihani amalga oshirishga jalb etilgan boshqa tashkilotlarning tadqiqot ishlari
                                        uchun
                                        toʻlov (5.6.-shakl)
                                    </td>
                                    <td class="border">
                                        {{ $loyihaiqtisodi?->jalb_etilgan_r ?? null }}
                                    </td>
                                    <td class="border">
                                        {{ $loyihaiqtisodi?->jalb_etilgan_a ?? null }}
                                    </td>
                                    <td class="border">
                                        {{ number_format(preg_replace('/\D/', '', $loyihaiqtisodi?->jalb_etilgan_r ?? 0) - preg_replace('/\D/', '', $loyihaiqtisodi?->jalb_etilgan_a ?? 0), 0, '', ' ') }}
                                    </td>
                                    <td class="border">{{ $loyihaiqtisodi?->jalb_etilgan_i ?? null }}</td>
                                </tr>
                                <tr>
                                    <td class="border">4.6.</td>
                                    <td class="border" style="font-size:14px;">
                                        Loyihani amalga oshirish uchun boshqa xarajatlar (5.7.-shakl)
                                    </td>
                                    <td class="border">
                                        {{ $loyihaiqtisodi?->boshqa_xarajat_r ?? null }}
                                    </td>
                                    <td class="border">
                                        {{ $loyihaiqtisodi?->boshqa_xarajat_a ?? null }}
                                    </td>
                                    <td class="border">
                                        {{ number_format(preg_replace('/\D/', '', $loyihaiqtisodi?->boshqa_xarajat_r ?? 0) - preg_replace('/\D/', '', $loyihaiqtisodi?->boshqa_xarajat_a ?? 0), 0, '', ' ') }}
                                    </td>
                                    <td class="border">{{ $loyihaiqtisodi?->boshqa_xarajat_i ?? null }}</td>
                                </tr>
                                <tr>
                                    <td class="border">4.7.</td>
                                    <td class="border" style="font-size:14px;">
                                        Tashkilotning ustama xarajatlari (ushbu xarajat turi byudjetdan toʻgʻridan-toʻgʻri
                                        va
                                        bazaviy moliyalashtiriladigan ilmiy tashkilotlar tomonidan rejalashtirilmaydi)
                                    </td>
                                    <td class="border">
                                        {{ $loyihaiqtisodi?->tashustama_xarajat_r ?? null }}
                                    </td>
                                    <td class="border">
                                        {{ $loyihaiqtisodi?->tashustama_xarajat_a ?? null }}
                                    </td>
                                    <td class="border">
                                        {{ number_format(preg_replace('/\D/', '', $loyihaiqtisodi?->tashustama_xarajat_r ?? 0) - preg_replace('/\D/', '', $loyihaiqtisodi?->tashustama_xarajat_a ?? 0), 0, '', ' ') }}
                                    </td>
                                    <td class="border">{{ $loyihaiqtisodi?->tashustama_xarajat_i ?? null }}</td>
                                </tr>
                                <tr>
                                    <td class="border">4.8.</td>
                                    <td class="border" style="font-size:14px;">
                                        Xarid qilingan asbob-uskunalar va boshqa asosiy vositalar xaridining shartnomalari
                                        mavjudligi, dalolatnomasining rasmiylashtirilganligi
                                    </td>
                                    <td class="border" colspan="3">
                                        {{ $loyihaiqtisodi?->xarid_qilingan_xarid ?? null }}
                                    </td>
                                    <td rowspan="4" class="border">{{ $loyihaiqtisodi?->xarid_qilingan_i ?? null }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="border">4.8.1.</td>
                                    <td class="border" style="font-size:14px;">
                                        Xarid shartnomasining raqami va sanasi
                                    </td>
                                    <td class="border">
                                        {{ $loyihaiqtisodi?->xarid_s ?? null }}
                                    </td>
                                    <td class="border" colspan="2">
                                        {{ $loyihaiqtisodi?->xarid_r ?? null }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="border">4.8.2.</td>
                                    <td class="border" style="font-size:14px;">
                                        Sotuvchi kompaniyaning nomi
                                    </td>
                                    <td class="border" colspan="3">
                                        {{ $loyihaiqtisodi?->xarid_sh ?? null }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="border">4.8.3.</td>
                                    <td class="border" style="font-size:14px;">
                                        Yetkazib beruvchi yuridik shaxsning nomi
                                    </td>
                                    <td class="border" colspan="3">
                                        {{ $loyihaiqtisodi?->yetkb_yuridik_nomi ?? null }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="border">4.9.</td>
                                    <td class="border" style="font-size:14px;">
                                        <b>Mablag‘ning o‘zlashtirilishi, so‘m</b>
                                    </td>

                                    <td class="border">
                                        {{ $ilmiyloyiha->sum ?? null }}
                                    </td>
                                    <td class="border">
                                        {{ $loyihaiqtisodi?->uzlashtirilishi_summasi ?? null }}
                                    </td>
                                    <td class="border">
                                        {{ number_format(preg_replace('/\D/', '', $ilmiyloyiha->sum ?? 0) - preg_replace('/\D/', '', $loyihaiqtisodi?->uzlashtirilishi_summasi ?? 0), 0, '', ' ') }}
                                    </td>
                                    <td class="border">{{ $loyihaiqtisodi?->uzlashtirilishi_sum_i ?? null }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                @include('admin.components.ilmiyloyiha.old_xulosalar')

                @include('admin.components.ilmiyloyiha.expert')

                @include('admin.components.ilmiyloyiha.ijrochilar')

                <div class="tab-content__pane" id="loyiha-asbobuskunalar">
                    <div class="intro-y box p-5">
                        <h3 class="text-base font-medium mb-2">Loyihaga biriktirilgan asbob-uskunalar</h3>
                        <p class="text-gray-600 text-sm mb-4">
                            Asbob-uskunani roʻyxatdan tanlang va «Roʻyxatga qoʻshish» tugmasini bosing — biriktirish
                            darhol saqlanadi. «Olib tashlash» tugmasini bossangiz, tanlangan qator bekor qilinadi va bu
                            ham darhol saqlanadi.
                        </p>
                        @if ($tashkilotAsbobuskunalar->isEmpty())
                            <p class="text-gray-500 text-sm">Tashkilotda faol asbob-uskuna roʻyxati mavjud emas.</p>
                        @elseif (is_null($tekshirivchilar))
                            @php
                                $asbobCatalogJson = $tashkilotAsbobuskunalar
                                    ->map(function ($a) {
                                        $label = $a->name;
                                        if ($a->model) {
                                            $label .= ' — ' . $a->model;
                                        }
                                        if ($a->invertar_r) {
                                            $label .= ' (inv. ' . $a->invertar_r . ')';
                                        }

                                        return [
                                            'id' => $a->id,
                                            'label' => $label,
                                            'name' => $a->name ?? '',
                                            'model' => $a->model ?? '',
                                            'invertar_r' => $a->invertar_r ?? '',
                                            'harid_summa' => $a->harid_summa !== null && $a->harid_summa !== ''
                                                ? number_format((int) preg_replace('/\D/', '', (string) $a->harid_summa), 0, '.', ' ')
                                                : '',
                                        ];
                                    })
                                    ->values();
                                $asbobInitialIds = $ilmiyloyiha->asbobuskunalar->pluck('id')->values()->all();
                            @endphp
                            <div id="loyiha-asbob-wrap" class="space-y-4"
                                data-sync-url="{{ route('ilmiyloyiha.asbobuskunalar.sync', $ilmiyloyiha) }}"
                                data-csrf="{{ csrf_token() }}">
                                <div id="loyiha-asbob-flash" class="text-sm text-theme-9 hidden" role="status"></div>
                                <div id="loyiha-asbob-error" class="text-sm text-theme-6 hidden" role="alert"></div>
                                <div class="flex flex-col sm:flex-row gap-3 sm:items-end">
                                    <div class="flex-1 w-full">
                                        <label class="text-xs text-gray-600">Asbob-uskunani tanlang</label>
                                        <select id="loyiha-asbob-select" class="input border w-full mt-1">
                                            <option value="">— Tanlang —</option>
                                        </select>
                                    </div>
                                    <button type="button" id="loyiha-asbob-add"
                                        class="button border border-gray-300 text-gray-700 whitespace-nowrap">
                                        Roʻyxatga qoʻshish
                                    </button>
                                </div>
                                <div>
                                    <p class="text-xs font-medium text-gray-700 mb-2">Biriktirilganlar roʻyxati</p>
                                    <div class="overflow-x-auto border border-gray-200 rounded bg-gray-50">
                                        <table class="table table-bordered mb-0">
                                            <thead>
                                                <tr>
                                                    <th class="border" style="width:3rem;">T/r</th>
                                                    <th class="border">Nomi</th>
                                                    <th class="border">Model</th>
                                                    <th class="border">Invertar raqami</th>
                                                    <th class="border">Harid qilingan summasi</th>
                                                    <th class="border text-center" style="width:5rem;">Amal</th>
                                                </tr>
                                            </thead>
                                            <tbody id="loyiha-asbob-selected-tbody"></tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <script type="application/json" id="loyiha-asbob-data">@json(['catalog' => $asbobCatalogJson, 'initial' => $asbobInitialIds])</script>
                            <script>
                                (function() {
                                    var cfgEl = document.getElementById('loyiha-asbob-data');
                                    if (!cfgEl) return;
                                    var cfg = JSON.parse(cfgEl.textContent);
                                    var catalog = cfg.catalog || [];
                                    var selected = new Set((cfg.initial || []).map(Number));
                                    var selectEl = document.getElementById('loyiha-asbob-select');
                                    var addBtn = document.getElementById('loyiha-asbob-add');
                                    var listEl = document.getElementById('loyiha-asbob-selected-tbody');
                                    var wrapEl = document.getElementById('loyiha-asbob-wrap');
                                    var flashEl = document.getElementById('loyiha-asbob-flash');
                                    var errorEl = document.getElementById('loyiha-asbob-error');
                                    if (!selectEl || !addBtn || !listEl) return;
                                    var syncUrl = wrapEl ? wrapEl.getAttribute('data-sync-url') : '';
                                    var csrf = wrapEl ? wrapEl.getAttribute('data-csrf') : '';
                                    var saving = false;

                                    function setSaving(on) {
                                        saving = on;
                                        if (addBtn) {
                                            addBtn.disabled = on;
                                            addBtn.classList.toggle('opacity-50', on);
                                            addBtn.classList.toggle('pointer-events-none', on);
                                        }
                                        if (listEl) {
                                            listEl.classList.toggle('opacity-50', on);
                                            listEl.classList.toggle('pointer-events-none', on);
                                        }
                                    }

                                    function persistSelection() {
                                        if (!syncUrl || !csrf || saving) return;
                                        setSaving(true);
                                        if (flashEl) flashEl.classList.add('hidden');
                                        if (errorEl) errorEl.classList.add('hidden');
                                        var fd = new FormData();
                                        fd.append('_token', csrf);
                                        fd.append('_method', 'PUT');
                                        Array.from(selected).forEach(function(id) {
                                            fd.append('asbobuskuna_ids[]', id);
                                        });
                                        fetch(syncUrl, {
                                                method: 'POST',
                                                body: fd,
                                                headers: {
                                                    'Accept': 'application/json',
                                                    'X-Requested-With': 'XMLHttpRequest',
                                                    'X-CSRF-TOKEN': csrf,
                                                },
                                                credentials: 'same-origin',
                                            })
                                            .then(function(res) {
                                                return res.json().catch(function() {
                                                    return {};
                                                }).then(function(data) {
                                                    return {
                                                        res: res,
                                                        data: data
                                                    };
                                                });
                                            })
                                            .then(function(payload) {
                                                if (payload.res.status === 419) {
                                                    window.location.reload();
                                                    return;
                                                }
                                                if (!payload.res.ok) {
                                                    var msg = 'Saqlashda xatolik';
                                                    if (payload.data && payload.data.message) {
                                                        msg = payload.data.message;
                                                    }
                                                    if (payload.data && payload.data.errors) {
                                                        var errs = [];
                                                        Object.keys(payload.data.errors).forEach(function(k) {
                                                            var arr = payload.data.errors[k];
                                                            if (Array.isArray(arr)) {
                                                                arr.forEach(function(s) {
                                                                    errs.push(s);
                                                                });
                                                            }
                                                        });
                                                        msg = errs.join(' ');
                                                    }
                                                    if (errorEl) {
                                                        errorEl.textContent = msg;
                                                        errorEl.classList.remove('hidden');
                                                    }
                                                    return;
                                                }
                                                if (flashEl) {
                                                    flashEl.textContent = (payload.data && payload.data.message) ?
                                                        payload.data.message : 'Saqlandi';
                                                    flashEl.classList.remove('hidden');
                                                    setTimeout(function() {
                                                        flashEl.classList.add('hidden');
                                                    }, 2500);
                                                }
                                            })
                                            .catch(function() {
                                                if (errorEl) {
                                                    errorEl.textContent = 'Tarmoq xatosi';
                                                    errorEl.classList.remove('hidden');
                                                }
                                            })
                                            .finally(function() {
                                                setSaving(false);
                                            });
                                    }

                                    function metaForId(id) {
                                        var nid = Number(id);
                                        for (var i = 0; i < catalog.length; i++) {
                                            if (Number(catalog[i].id) === nid) return catalog[i];
                                        }
                                        return {
                                            id: id,
                                            label: '#' + id,
                                            name: '#' + id,
                                            model: '',
                                            invertar_r: '',
                                            harid_summa: ''
                                        };
                                    }

                                    function rebuildSelect() {
                                        selectEl.innerHTML = '<option value="">— Tanlang —</option>';
                                        for (var i = 0; i < catalog.length; i++) {
                                            var c = catalog[i];
                                            if (selected.has(Number(c.id))) continue;
                                            var opt = document.createElement('option');
                                            opt.value = c.id;
                                            opt.textContent = c.label;
                                            selectEl.appendChild(opt);
                                        }
                                    }

                                    function renderSelected() {
                                        listEl.innerHTML = '';
                                        var ids = Array.from(selected);
                                        if (ids.length === 0) {
                                            var tr0 = document.createElement('tr');
                                            var td0 = document.createElement('td');
                                            td0.colSpan = 6;
                                            td0.className = 'border text-gray-400 text-sm text-center py-4';
                                            td0.textContent = 'Hali biriktirilmagan';
                                            tr0.appendChild(td0);
                                            listEl.appendChild(tr0);
                                            return;
                                        }
                                        ids.forEach(function(id, idx) {
                                            var m = metaForId(id);
                                            var tr = document.createElement('tr');
                                            var tdN = document.createElement('td');
                                            tdN.className = 'border text-center';
                                            tdN.textContent = String(idx + 1);
                                            var tdName = document.createElement('td');
                                            tdName.className = 'border';
                                            tdName.textContent = m.name || '';
                                            var tdModel = document.createElement('td');
                                            tdModel.className = 'border';
                                            tdModel.textContent = m.model || '';
                                            var tdInv = document.createElement('td');
                                            tdInv.className = 'border';
                                            tdInv.textContent = m.invertar_r || '';
                                            var tdHarid = document.createElement('td');
                                            tdHarid.className = 'border';
                                            tdHarid.textContent = m.harid_summa || '';
                                            var tdAct = document.createElement('td');
                                            tdAct.className = 'border text-center';
                                            var btn = document.createElement('button');
                                            btn.type = 'button';
                                            btn.className = 'text-theme-6 text-xs underline';
                                            btn.setAttribute('data-rid', id);
                                            btn.textContent = 'Olib tashlash';
                                            tdAct.appendChild(btn);
                                            tr.appendChild(tdN);
                                            tr.appendChild(tdName);
                                            tr.appendChild(tdModel);
                                            tr.appendChild(tdInv);
                                            tr.appendChild(tdHarid);
                                            tr.appendChild(tdAct);
                                            listEl.appendChild(tr);
                                        });
                                    }

                                    listEl.addEventListener('click', function(e) {
                                        var t = e.target.closest('[data-rid]');
                                        if (!t || saving) return;
                                        selected.delete(Number(t.getAttribute('data-rid')));
                                        renderSelected();
                                        rebuildSelect();
                                        persistSelection();
                                    });

                                    addBtn.addEventListener('click', function() {
                                        if (saving) return;
                                        var v = selectEl.value;
                                        if (!v) return;
                                        var id = Number(v);
                                        if (selected.has(id)) return;
                                        selected.add(id);
                                        selectEl.value = '';
                                        renderSelected();
                                        rebuildSelect();
                                        persistSelection();
                                    });

                                    renderSelected();
                                    rebuildSelect();
                                })();
                            </script>
                        @else
                            @if ($ilmiyloyiha->asbobuskunalar->isEmpty())
                                <p class="text-gray-500 text-sm">Biriktirilgan asbob-uskuna yoʻq.</p>
                            @else
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="border">T/r</th>
                                            <th class="border">Nomi</th>
                                            <th class="border">Model</th>
                                            <th class="border">Harid qilingan summasi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($ilmiyloyiha->asbobuskunalar as $i => $asb)
                                            <tr>
                                                <td class="border">{{ $i + 1 }}</td>
                                                <td class="border">{{ $asb->name }}</td>
                                                <td class="border">{{ $asb->model }}</td>
                                                <td class="border">{{ number_format((int) preg_replace('/\D/', '', (string) ($asb->harid_summa ?? '')), 0, '.', ' ') }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @endif
                        @endif
                    </div>
                </div>

            </div>

        </div>

    </div>


    

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            let haRadio = document.getElementById("horizontal-radio-chris-evans-edit");
            let yoqRadio = document.getElementById("horizontal-radio-liam-neeson-edit");

            let extraFields = document.querySelectorAll(
                "[name='xarid_s'], [name='xarid_r'], [name='xarid_sh'], [name='yetkb_yuridik_nomi']");

            function toggleRequired() {
                if (haRadio.checked) {
                    extraFields.forEach(field => {
                        field.setAttribute("required", "required");
                        field.closest("tr").style.display = "";
                    });
                } else {
                    extraFields.forEach(field => {
                        field.removeAttribute("required");
                        field.closest("tr").style.display = "none";
                    });
                }
            }

            // Agar elementlar mavjud bo‘lsa, hodisalarni qo‘shamiz
            if (haRadio && yoqRadio) {
                // Boshlang‘ich holatda tekshiramiz
                setTimeout(toggleRequired, 100); // Eski qiymatlarni yuklashga vaqt berish

                // Radio tugmalarini kuzatamiz
                haRadio.addEventListener("change", toggleRequired);
                yoqRadio.addEventListener("change", toggleRequired);
            }
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            let haRadio = document.getElementById("horizontal-radio-chris-evans");
            let yoqRadio = document.getElementById("horizontal-radio-liam-neeson");

            let extraFields = document.querySelectorAll(
                "[name='xarid_s'], [name='xarid_r'], [name='xarid_sh'], [name='yetkb_yuridik_nomi']");

            function toggleRequired() {
                if (haRadio.checked) {
                    extraFields.forEach(field => {
                        field.setAttribute("required", "required");
                        field.closest("tr").style.display = "";
                    });
                } else {
                    extraFields.forEach(field => {
                        field.removeAttribute("required");
                        field.closest("tr").style.display = "none";
                    });
                }
            }

            // Boshlang‘ich holatda tekshiramiz
            toggleRequired();

            // Radio tugmalarini kuzatamiz
            haRadio.addEventListener("change", toggleRequired);
            yoqRadio.addEventListener("change", toggleRequired);
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const shtatBirligi = document.getElementById('shtat_birligi');
            if (!shtatBirligi) return;

            const boshqaInputDiv = document.getElementById('boshqa_input_div');
            const boshqaInput = document.getElementById('boshqa_shtat_birligi');

            function toggleBoshqaInput() {
                if (shtatBirligi.value === 'boshqa') {
                    boshqaInputDiv.style.display = 'block';
                    boshqaInput.setAttribute('required', 'required');
                } else {
                    boshqaInputDiv.style.display = 'none';
                    boshqaInput.removeAttribute('required');
                    boshqaInput.value = '';
                }
            }

            shtatBirligi.addEventListener('change', toggleBoshqaInput);
            toggleBoshqaInput();
        });

        // Faqat raqam va nuqta (desimal) qabul qilish
        function validateInput(input) {
            input.value = input.value.replace(/[^0-9.]/g, '');

            // Ikkita nuqtani oldini olish
            const parts = input.value.split('.');
            if (parts.length > 2) {
                input.value = parts[0] + '.' + parts[1];
            }
        }
    </script>

    @include('admin.components.ilmiyloyiha.intellektual')
    @include('admin.components.ilmiyloyiha.loyihaiqtisodi')

    {{--
    <script>
        function formatNumber(input) {
            // Faqat raqamlarni olib tashlaymiz va bo‘sh joylarni yo‘qotamiz
            let value = input.value.replace(/\D/g, "");

            // Raqamlarni 3 xonadan bo‘sh joy bilan ajratamiz
            input.value = value.replace(/\B(?=(\d{3})+(?!\d))/g, " ");
        }
    </script> --}}

    <div class="modal" id="ilmiyloyiha-paper-edit-modal">
        <div class="modal__content modal__content--xl">
            <div class="p-5">

                <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2">
                    <div class="w-full mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                        <form id="ilmiyloyiha-paper-edit-form-edit" method="POST"
                            action="{{ route('ilmiyloyiha.update', $ilmiyloyiha->id) }}" class="validate-form"
                            enctype="multipart/form-data" novalidate="novalidate">
                            @csrf
                            @method('PUT')
                            <div class="grid grid-cols-12 gap-2">

                                <div class="w-full col-span-12">

                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                {{-- <th class="border" style="width: 40px;">T/r</th> --}}
                                                <th class="border" style="text-align: center; width: 40%;">MA'LUMOT NOMI
                                                </th>
                                                <th class="border" style="text-align: center;">BAJARILISHI
                                                    NATIJALARINING
                                                    KO'RSATKICHARI
                                                </th>
                                            </tr>
                                            <tr>
                                                <th colspan="3" class="border" style="text-align: center;">I.
                                                    LOYIHANING
                                                    ASOSIY
                                                    KO'RSATKICHLARI</th>
                                            </tr>
                                            <tr>
                                                {{-- <td class="border">1.1.</td> --}}
                                                <td class="border">Loyiha mavzusi uz</td>
                                                <td class="border">

                                                    <input type="text" name="mavzusi"
                                                        value="{{ $ilmiyloyiha->mavzusi ?? '' }}"
                                                        class="input w-full border mt-2" required="">
                                                </td>
                                            </tr>
                                            <tr>
                                                {{-- <td class="border">1.1.</td> --}}
                                                <td class="border">Loyiha mavzusi ru</td>
                                                <td class="border">

                                                    <input type="text" name="mavzusi_ru"
                                                        value="{{ $ilmiyloyiha->mavzusi_ru ?? '' }}"
                                                        class="input w-full border mt-2" required="">
                                                </td>
                                            </tr>
                                            <tr>
                                                {{-- <td class="border">1.2.</td> --}}
                                                <td class="border">Loyiha turi</td>
                                                <td class="border">
                                                    {{-- <input type="text" name="turi"
                                                        value="{{ $ilmiyloyiha->turi ?? '' }}"
                                                        class="input w-full border mt-2" required=""> --}}
                                                    <select name="turi" value="{{ old('turi') }}"
                                                        id="science-sub12-category" class="input border w-full mt-2"
                                                        required="">

                                                        <option value="{{ $ilmiyloyiha->turi ?? '' }}">
                                                            {{ $ilmiyloyiha->turi ?? '' }}
                                                        </option>

                                                        <option value="Amaliy">Amaliy</option>

                                                        <option value="Fundamental">Fundamental</option>

                                                        <option value="Innovatsion">Innovatsion</option>

                                                        <option value="Tajriba-konstruktorlik">Tajriba-konstruktorlik
                                                        </option>




                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                {{-- <td class="border">1.3.</td> --}}
                                                <td class="border">Loyiha shifri</td>
                                                <td class="border">
                                                    <input type="text" name="raqami"
                                                        value="{{ $ilmiyloyiha->raqami ?? '' }}"
                                                        class="input w-full border mt-2" required="">
                                                </td>
                                            </tr>
                                            <tr>
                                                {{-- <td class="border">1.4.</td> --}}
                                                <td class="border">Shartnoma raqami</td>
                                                <td class="border">
                                                    <input type="text" name="sh_raqami"
                                                        value="{{ $ilmiyloyiha->sh_raqami ?? '' }}"
                                                        class="input w-full border mt-2" required="">
                                                </td>
                                            </tr>
                                            <tr>
                                                {{-- <td class="border">1.4.</td> --}}
                                                <td class="border">Shartnoma sanasi</td>
                                                <td class="border">
                                                    <input type="date" name="sanasi"
                                                        value="{{ $ilmiyloyiha->sanasi ?? '' }}"
                                                        class="input w-full border mt-2" required="">
                                                </td>
                                            </tr>
                                            <tr>
                                                {{-- <td class="border">1.4.</td> --}}
                                                <td class="border">Shartnoma Fayl </td>
                                                <td class="border">

                                                    <input type="file" name="umumiy_mablag"
                                                        value="{{ $ilmiyloyiha->umumiy_mablag ?? '' }}"
                                                        class="input w-full border mt-2" required="">
                                                    <span>Fayl hajmi maksimal: 10 MB</span>
                                                    @error('umumiy_mablag')
                                                        <div class="error">{{ $message }}</div>
                                                    @enderror
                                                </td>
                                            </tr>
                                            <tr>
                                                {{-- <td class="border">1.5.</td> --}}
                                                <td class="border">Bajarilish muddati boshlanish</td>
                                                <td class="border">
                                                    <input type="date" name="bosh_sana"
                                                        value="{{ optional($ilmiyloyiha->bosh_sana)->format('Y-m-d') ?? '' }}"
                                                        class="input w-full border mt-2" required="">
                                                </td>
                                            </tr>
                                            <tr>
                                                {{-- <td class="border">1.5.</td> --}}
                                                <td class="border">Bajarilish muddati tugash</td>
                                                <td class="border">
                                                    <input type="date" name="tug_sana"
                                                        value="{{ optional($ilmiyloyiha->tug_sana)->format('Y-m-d') ?? '' }}"
                                                        class="input w-full border mt-2" required="">
                                                </td>
                                            </tr>
                                            <tr>
                                                {{-- <td class="border">1.6.</td> --}}
                                                <td class="border">Loyihaning umumiy qiymati, soʻm</td>
                                                <td class="border">
                                                    <input type="text" name="sum" id="sumInput1"
                                                        oninput="formatNumber(this, 'sum')"
                                                        value="{{ $ilmiyloyiha->sum ?? '' }}"
                                                        class="input w-full border mt-2" required="">
                                                    <span id="sum" class="mt-2 text-black-600"></span> so'm
                                                </td>
                                            </tr>
                                            <tr>
                                                {{-- <td class="border">1.6.1.</td> --}}
                                                <td class="border">Joriy yil uchun ajratilgan mablagʻ, soʻm</td>
                                                <td class="border">
                                                    <input type="text" name="joriy_yil_sum" id="sumInput1"
                                                        oninput="formatNumber(this, 'joriy_yil_sum')"
                                                        value="{{ $ilmiyloyiha->joriy_yil_sum ?? '' }}"
                                                        class="input w-full border mt-2" required="">
                                                    <span id="joriy_yil_sum" class="mt-2 text-black-600"></span> so'm
                                                </td>
                                            </tr>
                                            <tr>
                                                {{-- <td class="border">1.6.2.</td> --}}
                                                <td class="border">Jami summaga nisbatan, foiz</td>
                                                <td class="border">
                                                    <input type="text" name="jami_summa_nisbat"
                                                        value="{{ $ilmiyloyiha->jami_summa_nisbat ?? '' }}"
                                                        class="input w-full border mt-2" required="">
                                                </td>
                                            </tr>

                                            <tr>
                                                <th colspan="3" class="border" style="text-align: center;">II.
                                                    LOYIHANING
                                                    RAHBARI VA
                                                    IJROCHILARI</th>
                                            </tr>
                                            <tr>
                                                {{-- <td class="border">2.1.</td> --}}
                                                <td class="border"> <b>Loyihaning amaldagi rahbarining familiyasi, ismi,
                                                        sharifi</b>
                                                </td>
                                                <td class="border">
                                                    <input type="text" name="rahbar_name"
                                                        value="{{ $ilmiyloyiha->rahbar_name ?? '' }}"
                                                        class="input w-full border mt-2" required="">
                                                </td>
                                            </tr>
                                            <tr>
                                                {{-- <td class="border">2.1.1.</td> --}}
                                                <td class="border">Ilmiy darajasi </td>
                                                <td class="border">
                                                    {{-- <input type="text" name="rahbariilmiy_darajasi"
                                                        value="{{ $ilmiyloyiha->rahbariilmiy_darajasi ?? '' }}"
                                                        class="input w-full border mt-2" required=""> --}}
                                                    <select name="rahbariilmiy_darajasi" id="rahbariilmiy_darajasi"
                                                        value="{{ old('rahbariilmiy_darajasi') }}"
                                                        class="input border w-full mt-2">

                                                        <option value="{{ $ilmiyloyiha->rahbariilmiy_darajasi ?? '' }}">
                                                            {{ $ilmiyloyiha->rahbariilmiy_darajasi ?? '' }}
                                                        </option>

                                                        <option value="Fan nomzodi">Fan nomzodi</option>

                                                        <option value="Falsafa doktori (PhD)">Falsafa doktori (PhD)
                                                        </option>

                                                        <option value="Fan doktori (DSc)">Fan doktori (DSc)</option>

                                                        <option value="Fan doktori">Fan doktori</option>

                                                        <option value="Akademik">Akademik</option>
                                                        <option value="mavjud emas">mavjud emas</option>

                                                    </select><br>
                                                    @error('rahbariilmiy_darajasi')
                                                        <div class="error">{{ $message }}</div>
                                                    @enderror
                                                </td>
                                            </tr>
                                            <tr>
                                                {{-- <td class="border">2.1.2.</td> --}}
                                                <td class="border">Ilmiy unvoni</td>
                                                <td class="border">
                                                    {{-- <input type="text" name="rahbariilmiy_unvoni"
                                                        value="{{ $ilmiyloyiha->rahbariilmiy_unvoni ?? '' }}"
                                                        class="input w-full border mt-2" required=""> --}}
                                                    <select name="rahbariilmiy_unvoni" id="rahbariilmiy_unvoni"
                                                        value="{{ old('rahbariilmiy_unvoni') }}"
                                                        class="input border w-full mt-2">

                                                        <option value="{{ $ilmiyloyiha->rahbariilmiy_unvoni ?? '' }}">
                                                            {{ $ilmiyloyiha->rahbariilmiy_unvoni ?? '' }}
                                                        </option>

                                                        <option value="Professor">Professor</option>

                                                        <option value="Dotsent">Dotsent</option>
                                                        <option value="Katta ilmiy xodim">Katta ilmiy xodim</option>
                                                        <option value="Akademik">Akademik</option>
                                                        <option value="mavjud emas">mavjud emas</option>

                                                    </select><br>
                                                    @error('rahbariilmiy_unvoni')
                                                        <div class="error">{{ $message }}</div>
                                                    @enderror
                                                </td>
                                            </tr>
                                            <tr>
                                                {{-- <td class="border">2.1.3.</td> --}}
                                                <td class="border">Lavozimi</td>
                                                <td class="border">
                                                    {{-- <input type="text" name="r_lavozimi"
                                                        value="{{ $ilmiyloyiha->r_lavozimi ?? '' }}"
                                                        class="input w-full border mt-2" required=""> --}}
                                                    <select name="r_lavozimi" value="{{ old('r_lavozimi') }}"
                                                        class="input border w-full mt-2" required="">
                                                        <option value="{{ $ilmiyloyiha->r_lavozimi ?? '' }}">
                                                            {{ $ilmiyloyiha->r_lavozimi ?? '' }}
                                                        </option>
                                                        <option value="Dekan o‘rinbosari">Dekan o‘rinbosari</option>
                                                        <option value="Kafedra mudiri">Kafedra mudiri</option>
                                                        <option value="Professor">Professor</option>
                                                        <option value="Dotsent">Dotsent</option>
                                                        <option value="Katta o‘qituvchi">Katta o‘qituvchi</option>
                                                        <option value="Assistent, o‘qituvchi">Assistent, o‘qituvchi
                                                        </option>
                                                        <option value="O‘qituvchi-stajer">O‘qituvchi-stajer</option>
                                                        <option value="Rektor">Rektor</option>
                                                        <option value="Boshqarma boshlig‘i">Boshqarma boshlig‘i</option>
                                                        <option value="Direktor">Direktor</option>
                                                        <option value="Prorektor">Prorektor</option>
                                                        <option value="Filial direktorining o‘rinbosari">Filial
                                                            direktorining o‘rinbosari</option>
                                                        <option value="Dekan">Dekan</option>
                                                        <option value="Filial direktori">Filial direktori</option>
                                                        <option value="Ilmiy kotib">Ilmiy kotib</option>
                                                        <option value="Ilmiy ishlar bo‘yicha direktor o‘rinbosari">Ilmiy
                                                            ishlar bo‘yicha direktor o‘rinbosari</option>
                                                        <option value="Ilmiy-tadqiqot laboratoriyasi (bo‘lim) mudiri">
                                                            Ilmiy-tadqiqot laboratoriyasi (bo‘lim) mudiri</option>
                                                        <option value="Umumiy masalalar bo‘yicha direktor o‘rinbosari">
                                                            Umumiy masalalar bo‘yicha direktor o‘rinbosari</option>
                                                        <option value="Moliya-iqtisod bo‘limi boshlig‘i">Moliya-iqtisod
                                                            bo‘limi boshlig‘i</option>

                                                        <option value="Boshqarma boshlig‘i">Boshqarma boshlig‘i</option>
                                                        <option value="Bosh muhandis">Bosh muhandis</option>
                                                        <option value="Bosh energetik">Bosh energetik</option>
                                                        <option value="Bosh mexanik">Bosh mexanik</option>
                                                        <option value="Mutaxassis">Mutaxassis</option>
                                                        <option value="Expert">Expert</option>
                                                        <option value="Hisobchi">Hisobchi</option>
                                                        <option value="Ilmiy maslahatchi">Ilmiy maslahatchi</option>
                                                        <option value="Maslahatchi">Maslahatchi</option>
                                                        <option value="Laborant">Laborant</option>
                                                        <option value="Kadrlar bo‘yicha mutaxassis">Kadrlar bo‘yicha
                                                            mutaxassis</option>

                                                        <option value="Bo‘lim boshlig‘i">Bo‘lim boshlig‘i</option>
                                                        <option value="Yetakchi muhandis">Yetakchi muhandis</option>
                                                        <option value="Bosh ilmiy xodim">Bosh ilmiy xodim</option>
                                                        <option value="Yetakchi ilmiy xodim">Yetakchi ilmiy xodim</option>
                                                        <option value="Katta ilmiy xodim">Katta ilmiy xodim</option>
                                                        <option value="Kichik ilmiy xodim">Kichik ilmiy xodim</option>
                                                        <option value="Ishlab chiqarish bo‘yicha direktor o‘rinbosari">
                                                            Ishlab chiqarish bo‘yicha direktor o‘rinbosari</option>


                                                    </select><br>
                                                    @error('r_lavozimi')
                                                        <div class="error">{{ $message }}</div>
                                                    @enderror
                                                </td>
                                            </tr>
                                            <tr>
                                                {{-- <td class="border">2.1.4.</td> --}}
                                                <td class="border">Rahbar bilan kelishuvning raqami </td>
                                                <td class="border">
                                                    <input type="text" name="rsh_raqami"
                                                        value="{{ $ilmiyloyiha->rsh_raqami ?? '' }}"
                                                        class="input w-full border mt-2" required="">
                                                </td>
                                            </tr>

                                            <tr>
                                                {{-- <td class="border">2.1.4.</td> --}}
                                                <td class="border">Rahbar bilan kelishuvning sanasi </td>
                                                <td class="border">
                                                    <input type="date" name="rsh_sanasi"
                                                        value="{{ $ilmiyloyiha->rsh_sanasi ?? '' }}"
                                                        class="input w-full border mt-2" required="">
                                                </td>
                                            </tr>

                                            <tr>
                                                {{-- <td class="border">2.2.</td> --}}
                                                <td class="border"><b>Loyiha rahbari o'zgargan</b></td>
                                                {{-- <td class="border">Ha</td> --}}

                                                <td class="border">
                                                    <div class="flex items-center text-gray-700 mr-2">
                                                        <input type="radio" class="input border mr-2"
                                                            id="loyiha_rahbari_uzgargan-evans"
                                                            name="loyiha_rahbari_uzgargan" @if (old('loyiha_rahbari_uzgargan', $ilmiyloyiha->loyiha_rahbari_uzgargan ?? 1) == 'ha') checked
                                                            @endif value="ha">
                                                        <label class="cursor-pointer select-none"
                                                            for="loyiha_rahbari_uzgargan-evans">Ha</label>
                                                    </div>
                                                    <div class="flex items-center text-gray-700 mr-2 mt-2 sm:mt-0">
                                                        <input type="radio" class="input border mr-2"
                                                            name="loyiha_rahbari_uzgargan"
                                                            id="loyiha_rahbari_uzgargan-neeson" @if (old('loyiha_rahbari_uzgargan', $ilmiyloyiha->loyiha_rahbari_uzgargan ?? 0) == "yo'q") checked
                                                            @endif value="yo'q">
                                                        <label class="cursor-pointer select-none"
                                                            for="loyiha_rahbari_uzgargan-neeson">Yo'q</label>
                                                    </div>
                                                </td>
                                            </tr>

                                            <tr>
                                                {{-- <td class="border">2.2.1.</td> --}}
                                                <td class="border">Loyihaning avvalgi rahbarining familiyasi, ismi,
                                                    sharifi
                                                </td>
                                                <td class="border">
                                                    <input type="text" name="avvr_fish"
                                                        value="{{ $ilmiyloyiha->avvr_fish ?? '' }}"
                                                        class="input w-full border mt-2" required="">
                                                </td>
                                            </tr>
                                            <tr>
                                                {{-- <td class="border">2.2.2.</td> --}}
                                                <td class="border">Ilmiy darajasi </td>
                                                <td class="border">
                                                    {{-- <input type="text" name="avvr_ilmiy_daraja"
                                                        value="{{ $ilmiyloyiha->avvr_ilmiy_daraja ?? '' }}"
                                                        class="input w-full border mt-2" required=""> --}}
                                                    <select name="avvr_ilmiy_daraja" id="avvr_ilmiy_daraja"
                                                        value="{{ old('avvr_ilmiy_daraja') }}"
                                                        class="input border w-full mt-2">

                                                        <option value="{{ $ilmiyloyiha->avvr_ilmiy_daraja ?? '' }}">
                                                            {{ $ilmiyloyiha->avvr_ilmiy_daraja ?? '' }}
                                                        </option>

                                                        <option value="Fan nomzodi">Fan nomzodi</option>

                                                        <option value="Falsafa doktori (PhD)">Falsafa doktori (PhD)
                                                        </option>

                                                        <option value="Fan doktori (DSc)">Fan doktori (DSc)</option>

                                                        <option value="Fan doktori">Fan doktori</option>

                                                        <option value="Akademik">Akademik</option>
                                                        <option value="mavjud emas">mavjud emas</option>

                                                    </select><br>
                                                    @error('avvr_ilmiy_daraja')
                                                        <div class="error">{{ $message }}</div>
                                                    @enderror
                                                </td>
                                            </tr>
                                            <tr>
                                                {{-- <td class="border">2.2.3.</td> --}}
                                                <td class="border">Ilmiy unvoni</td>
                                                <td class="border">
                                                    {{-- <input type="text" name="avvr_ilmiy_unvon"
                                                        value="{{ $ilmiyloyiha->avvr_ilmiy_unvon ?? '' }}"
                                                        class="input w-full border mt-2" required=""> --}}
                                                    <select name="avvr_ilmiy_unvon" id="avvr_ilmiy_unvon"
                                                        value="{{ old('avvr_ilmiy_unvon') }}"
                                                        class="input border w-full mt-2">

                                                        <option value="{{ $ilmiyloyiha->avvr_ilmiy_unvon ?? '' }}">
                                                            {{ $ilmiyloyiha->avvr_ilmiy_unvon ?? '' }}
                                                        </option>

                                                        <option value="Professor">Professor</option>

                                                        <option value="Dotsent">Dotsent</option>
                                                        <option value="Katta ilmiy xodim">Katta ilmiy xodim</option>
                                                        <option value="Akademik">Akademik</option>
                                                        <option value="mavjud emas">mavjud emas</option>

                                                    </select><br>
                                                    @error('avvr_ilmiy_unvon')
                                                        <div class="error">{{ $message }}</div>
                                                    @enderror
                                                </td>
                                            </tr>
                                            <tr>
                                                {{-- <td class="border">2.2.4.</td> --}}
                                                <td class="border">Lavozimi</td>
                                                <td class="border">
                                                    {{-- <input type="text" name="avvr_lavozimi"
                                                        value="{{ $ilmiyloyiha->avvr_lavozimi ?? '' }}"
                                                        class="input w-full border mt-2" required=""> --}}
                                                    <select name="avvr_lavozimi" value="{{ old('avvr_lavozimi') }}"
                                                        class="input border w-full mt-2" required="">
                                                        <option value="{{ $ilmiyloyiha->avvr_lavozimi ?? '' }}">
                                                            {{ $ilmiyloyiha->avvr_lavozimi ?? '' }}
                                                        </option>
                                                        <option value="Dekan o‘rinbosari">Dekan o‘rinbosari</option>
                                                        <option value="Kafedra mudiri">Kafedra mudiri</option>
                                                        <option value="Professor">Professor</option>
                                                        <option value="Dotsent">Dotsent</option>
                                                        <option value="Katta o‘qituvchi">Katta o‘qituvchi</option>
                                                        <option value="Assistent, o‘qituvchi">Assistent, o‘qituvchi
                                                        </option>
                                                        <option value="O‘qituvchi-stajer">O‘qituvchi-stajer</option>
                                                        <option value="Rektor">Rektor</option>
                                                        <option value="Boshqarma boshlig‘i">Boshqarma boshlig‘i</option>
                                                        <option value="Direktor">Direktor</option>
                                                        <option value="Prorektor">Prorektor</option>
                                                        <option value="Filial direktorining o‘rinbosari">Filial
                                                            direktorining o‘rinbosari</option>
                                                        <option value="Dekan">Dekan</option>
                                                        <option value="Filial direktori">Filial direktori</option>
                                                        <option value="Ilmiy kotib">Ilmiy kotib</option>
                                                        <option value="Ilmiy ishlar bo‘yicha direktor o‘rinbosari">Ilmiy
                                                            ishlar bo‘yicha direktor o‘rinbosari</option>
                                                        <option value="Ilmiy-tadqiqot laboratoriyasi (bo‘lim) mudiri">
                                                            Ilmiy-tadqiqot laboratoriyasi (bo‘lim) mudiri</option>
                                                        <option value="Umumiy masalalar bo‘yicha direktor o‘rinbosari">
                                                            Umumiy masalalar bo‘yicha direktor o‘rinbosari</option>
                                                        <option value="Moliya-iqtisod bo‘limi boshlig‘i">Moliya-iqtisod
                                                            bo‘limi boshlig‘i</option>

                                                        <option value="Boshqarma boshlig‘i">Boshqarma boshlig‘i</option>
                                                        <option value="Bosh muhandis">Bosh muhandis</option>
                                                        <option value="Bosh energetik">Bosh energetik</option>
                                                        <option value="Bosh mexanik">Bosh mexanik</option>
                                                        <option value="Mutaxassis">Mutaxassis</option>
                                                        <option value="Expert">Expert</option>
                                                        <option value="Hisobchi">Hisobchi</option>
                                                        <option value="Ilmiy maslahatchi">Ilmiy maslahatchi</option>
                                                        <option value="Maslahatchi">Maslahatchi</option>
                                                        <option value="Laborant">Laborant</option>
                                                        <option value="Kadrlar bo‘yicha mutaxassis">Kadrlar bo‘yicha
                                                            mutaxassis</option>

                                                        <option value="Bo‘lim boshlig‘i">Bo‘lim boshlig‘i</option>
                                                        <option value="Yetakchi muhandis">Yetakchi muhandis</option>
                                                        <option value="Bosh ilmiy xodim">Bosh ilmiy xodim</option>
                                                        <option value="Yetakchi ilmiy xodim">Yetakchi ilmiy xodim</option>
                                                        <option value="Katta ilmiy xodim">Katta ilmiy xodim</option>
                                                        <option value="Kichik ilmiy xodim">Kichik ilmiy xodim</option>
                                                        <option value="Ishlab chiqarish bo‘yicha direktor o‘rinbosari">
                                                            Ishlab chiqarish bo‘yicha direktor o‘rinbosari</option>


                                                    </select><br>
                                                    @error('avvr_lavozimi')
                                                        <div class="error">{{ $message }}</div>
                                                    @enderror
                                                </td>
                                            </tr>
                                            <tr>
                                                {{-- <td class="border">2.2.5.</td> --}}
                                                <td class="border">Rahbar bilan kelishuvning raqami </td>
                                                <td class="border">
                                                    <input type="text" name="avvr_kelishuv_raqami"
                                                        value="{{ $ilmiyloyiha->avvr_kelishuv_raqami ?? '' }}"
                                                        class="input w-full border mt-2" required="">
                                                </td>
                                            </tr>

                                            <tr>
                                                {{-- <td class="border">2.2.5.</td> --}}
                                                <td class="border">Rahbar bilan kelishuvning sanasi </td>
                                                <td class="border">
                                                    <input type="date" name="avvr_kelishuv_sanasi"
                                                        value="{{ $ilmiyloyiha->avvr_kelishuv_sanasi ?? '' }}"
                                                        class="input w-full border mt-2" required="">
                                                </td>
                                            </tr>


                                            <tr>
                                                {{-- <td class="border">2.3.</td> --}}
                                                <td class="border"><b>Loyihaning hamrahbari mavjud</b></td>
                                                <td class="border">
                                                    <div class="flex items-center text-gray-700 mr-2">
                                                        <input type="radio" class="input border mr-2"
                                                            id="loyiha_hamrahbari-evans" name="loyiha_hamrahbari" @if (old('loyiha_hamrahbari', $ilmiyloyiha->loyiha_hamrahbari ?? 1) == 'ha') checked @endif value="ha">
                                                        <label class="cursor-pointer select-none"
                                                            for="loyiha_hamrahbari-evans">Ha</label>
                                                    </div>
                                                    <div class="flex items-center text-gray-700 mr-2 mt-2 sm:mt-0">
                                                        <input type="radio" class="input border mr-2"
                                                            name="loyiha_hamrahbari" id="loyiha_hamrahbari-neeson" @if (old('loyiha_hamrahbari', $ilmiyloyiha->loyiha_hamrahbari ?? 0) == "yo'q") checked @endif value="yo'q">
                                                        <label class="cursor-pointer select-none"
                                                            for="loyiha_hamrahbari-neeson">Yo'q</label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                {{-- <td class="border">2.3.1.</td> --}}
                                                <td class="border">Loyiha hamrahbarining familiyasi, ismi, sharifi</td>
                                                <td class="border">
                                                    <input type="text" name="hamrahbar_fish"
                                                        value="{{ $ilmiyloyiha->hamrahbar_fish ?? '' }}"
                                                        class="input w-full border mt-2" required="">
                                                </td>
                                            </tr>
                                            <tr>
                                                {{-- <td class="border">2.3.2.</td> --}}
                                                <td class="border">Ish joyi</td>
                                                <td class="border">
                                                    <input type="text" name="hamr_ishjoyi"
                                                        value="{{ $ilmiyloyiha->hamr_ishjoyi ?? '' }}"
                                                        class="input w-full border mt-2" required="">
                                                </td>
                                            </tr>
                                            <tr>
                                                {{-- <td class="border">2.3.3.</td> --}}
                                                <td class="border">Lavozimi</td>
                                                <td class="border">
                                                    {{-- <input type="text" name="hamr_lavozimi"
                                                        value="{{ $ilmiyloyiha->hamr_lavozimi ?? '' }}"
                                                        class="input w-full border mt-2" required=""> --}}
                                                    <select name="hamr_lavozimi" value="{{ old('hamr_lavozimi') }}"
                                                        class="input border w-full mt-2" required="">
                                                        <option value="{{ $ilmiyloyiha->hamr_lavozimi ?? '' }}">
                                                            {{ $ilmiyloyiha->hamr_lavozimi ?? '' }}
                                                        </option>
                                                        <option value="Dekan o‘rinbosari">Dekan o‘rinbosari</option>
                                                        <option value="Kafedra mudiri">Kafedra mudiri</option>
                                                        <option value="Professor">Professor</option>
                                                        <option value="Dotsent">Dotsent</option>
                                                        <option value="Katta o‘qituvchi">Katta o‘qituvchi</option>
                                                        <option value="Assistent, o‘qituvchi">Assistent, o‘qituvchi
                                                        </option>
                                                        <option value="O‘qituvchi-stajer">O‘qituvchi-stajer</option>
                                                        <option value="Rektor">Rektor</option>
                                                        <option value="Boshqarma boshlig‘i">Boshqarma boshlig‘i</option>
                                                        <option value="Direktor">Direktor</option>
                                                        <option value="Prorektor">Prorektor</option>
                                                        <option value="Filial direktorining o‘rinbosari">Filial
                                                            direktorining o‘rinbosari</option>
                                                        <option value="Dekan">Dekan</option>
                                                        <option value="Filial direktori">Filial direktori</option>
                                                        <option value="Ilmiy kotib">Ilmiy kotib</option>
                                                        <option value="Ilmiy ishlar bo‘yicha direktor o‘rinbosari">Ilmiy
                                                            ishlar bo‘yicha direktor o‘rinbosari</option>
                                                        <option value="Ilmiy-tadqiqot laboratoriyasi (bo‘lim) mudiri">
                                                            Ilmiy-tadqiqot laboratoriyasi (bo‘lim) mudiri</option>
                                                        <option value="Umumiy masalalar bo‘yicha direktor o‘rinbosari">
                                                            Umumiy masalalar bo‘yicha direktor o‘rinbosari</option>
                                                        <option value="Moliya-iqtisod bo‘limi boshlig‘i">Moliya-iqtisod
                                                            bo‘limi boshlig‘i</option>

                                                        <option value="Boshqarma boshlig‘i">Boshqarma boshlig‘i</option>
                                                        <option value="Bosh muhandis">Bosh muhandis</option>
                                                        <option value="Bosh energetik">Bosh energetik</option>
                                                        <option value="Bosh mexanik">Bosh mexanik</option>
                                                        <option value="Mutaxassis">Mutaxassis</option>
                                                        <option value="Expert">Expert</option>
                                                        <option value="Hisobchi">Hisobchi</option>
                                                        <option value="Ilmiy maslahatchi">Ilmiy maslahatchi</option>
                                                        <option value="Maslahatchi">Maslahatchi</option>
                                                        <option value="Laborant">Laborant</option>
                                                        <option value="Kadrlar bo‘yicha mutaxassis">Kadrlar bo‘yicha
                                                            mutaxassis</option>

                                                        <option value="Bo‘lim boshlig‘i">Bo‘lim boshlig‘i</option>
                                                        <option value="Yetakchi muhandis">Yetakchi muhandis</option>
                                                        <option value="Bosh ilmiy xodim">Bosh ilmiy xodim</option>
                                                        <option value="Yetakchi ilmiy xodim">Yetakchi ilmiy xodim</option>
                                                        <option value="Katta ilmiy xodim">Katta ilmiy xodim</option>
                                                        <option value="Kichik ilmiy xodim">Kichik ilmiy xodim</option>
                                                        <option value="Ishlab chiqarish bo‘yicha direktor o‘rinbosari">
                                                            Ishlab chiqarish bo‘yicha direktor o‘rinbosari</option>


                                                    </select><br>
                                                    @error('hamr_lavozimi')
                                                        <div class="error">{{ $message }}</div>
                                                    @enderror
                                                </td>
                                            </tr>
                                            <tr>
                                                {{-- <td class="border">2.3.4.</td> --}}
                                                <td class="border">Davlati</td>
                                                <td class="border">
                                                    <input type="text" name="hamr_davlati"
                                                        value="{{ $ilmiyloyiha->hamr_davlati ?? '' }}"
                                                        class="input w-full border mt-2" required="">
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                </div>

                            </div>
                        </form>
                    </div>
                </div>

            </div>
            <div class="px-5 pb-5 text-center mt-4">
                <button type="button" data-dismiss="modal" class="button delete-cancel w-32 border text-gray-700 mr-1">
                    Bekor qilish
                </button>
                <button type="submit" form="ilmiyloyiha-paper-edit-form-edit"
                    class="update-confirm button w-24 bg-theme-1 text-white">
                    Qo'shish
                </button>
            </div>
        </div>
    </div>

    @include('admin.components.tash_status_modal', ['model' => $ilmiyloyiha, 'action' => route('tashkilot_ilmiyloyiha', $ilmiyloyiha->id),])

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            let haRadio = document.getElementById("loyiha_rahbari_uzgargan-evans");
            let yoqRadio = document.getElementById("loyiha_rahbari_uzgargan-neeson");

            let extraFields = document.querySelectorAll(
                "[name='avvr_fish'], [name='avvr_ilmiy_daraja'], [name='avvr_ilmiy_unvon'], [name='avvr_lavozimi'], [name='avvr_kelishuv_raqami'], [name='avvr_kelishuv_sanasi']"
            );

            function toggleRequired() {
                if (haRadio.checked) {
                    extraFields.forEach(field => {
                        field.setAttribute("required", "required");
                        field.closest("tr").style.display = "";
                    });
                } else {
                    extraFields.forEach(field => {
                        field.removeAttribute("required");
                        field.closest("tr").style.display = "none";
                    });
                }
            }

            // Boshlang‘ich holatda tekshiramiz
            toggleRequired();

            // Radio tugmalarini kuzatamiz
            haRadio.addEventListener("change", toggleRequired);
            yoqRadio.addEventListener("change", toggleRequired);
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            let haRadio = document.getElementById("loyiha_hamrahbari-evans");
            let yoqRadio = document.getElementById("loyiha_hamrahbari-neeson");

            let extraFields = document.querySelectorAll(
                "[name='hamrahbar_fish'], [name='hamr_ishjoyi'], [name='hamr_lavozimi'], [name='hamr_davlati']");

            function toggleRequired() {
                if (haRadio.checked) {
                    extraFields.forEach(field => {
                        field.setAttribute("required", "required");
                        field.closest("tr").style.display = "";
                    });
                } else {
                    extraFields.forEach(field => {
                        field.removeAttribute("required");
                        field.closest("tr").style.display = "none";
                    });
                }
            }

            // Boshlang‘ich holatda tekshiramiz
            toggleRequired();

            // Radio tugmalarini kuzatamiz
            haRadio.addEventListener("change", toggleRequired);
            yoqRadio.addEventListener("change", toggleRequired);
        });
    </script>

    <div class="modal" id="intellektualekspert-paper-edit-modal">
        <div class="modal__content modal__content--xl">
            <div class="p-5">

                <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2">
                    <div class="w-full mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                        <form id="intellektualekspert-paper-edit-form-edit" method="POST"
                            action="{{ route('intellektual.update', $intellektual?->id ?? 0) }}" class="validate-form"
                            enctype="multipart/form-data" novalidate="novalidate">
                            @csrf
                            @method('PUT')
                            <div class="grid grid-cols-12 gap-2">

                                <div class="w-full col-span-12">

                                    <table class="table table-bordered">
                                        <tr>
                                            <th class="border" style="text-align: center;" colspan="6">INTELLEKTUAL
                                                FAOLIYAT
                                                NATIJALARI</th>
                                        </tr>
                                        <tr>
                                            <th class="border" style="width: 40px;">T/r</th>
                                            <th class="border" style="width: 200px;">Koʻrsatkichlar</th>
                                            <th class="border">Rejada</th>
                                            <th class="border">Amalda</th>
                                            <th class="border">Farqi</th>
                                            <th class="border">Izoh</th>
                                        </tr>
                                        <tr>
                                            <td class="border">1.</td>
                                            <td class="border" style="font-size:14px;">
                                                Mahalliy ilmiy jurnallardagi maqolalar soni
                                            </td>
                                            <td class="border">
                                                <input type="hidden" name="izohlar" value="1">
                                                {{ $intellektual?->mal_jur_reja ?? 0 }}
                                            </td>
                                            <td class="border">
                                                {{ $intellektual?->mal_jur_amalda ?? 0 }}
                                            </td>
                                            <td class="border">
                                                {{ ($intellektual?->mal_jur_reja ?? 0) - ($intellektual?->mal_jur_amalda ?? 0) }}
                                            </td>
                                            <td class="border">
                                                <input type="text" name="mal_jur_izoh"
                                                    value="{{ $intellektual?->mal_jur_izoh ?? null }}"
                                                    class="input w-full border mt-2" required="">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="border">2.</td>
                                            <td class="border" style="font-size:14px;">
                                                Xorijiy jurnallardagi ilmiy maqolalar soni
                                            </td>
                                            <td class="border">
                                                {{ $intellektual?->xor_jur_reja ?? 0 }}
                                            </td>
                                            <td class="border">
                                                {{ $intellektual?->xor_jur_amalda ?? 0 }}
                                            </td>
                                            <td class="border">
                                                {{ ($intellektual?->xor_jur_reja ?? 0) - ($intellektual?->xor_jur_amalda ?? 0) }}
                                            </td>
                                            <td class="border">
                                                <input type="text" name="xor_jur_izoh"
                                                    value="{{ $intellektual?->xor_jur_izoh ?? null }}"
                                                    class="input w-full border mt-2" required="">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="border">3.</td>
                                            <td class="border" style="font-size:14px;">
                                                Web of Science va Scopus bazasidagi xalqaro nashrlardagi maqolalar soni
                                            </td>
                                            <td class="border">
                                                {{ $intellektual?->web_jur_reja ?? 0 }}
                                            </td>
                                            <td class="border">
                                                {{ $intellektual?->web_jur_amalda ?? 0 }}
                                            </td>
                                            <td class="border">
                                                {{ ($intellektual?->web_jur_reja ?? 0) - ($intellektual?->web_jur_amalda ?? 0) }}
                                            </td>
                                            <td class="border">
                                                <input type="text" name="web_jur_izoh"
                                                    value="{{ $intellektual?->web_jur_izoh ?? null }}"
                                                    class="input w-full border mt-2" required="">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="border">4.</td>
                                            <td class="border" style="font-size:14px;">
                                                Tezislar soni
                                            </td>
                                            <td class="border">
                                                {{ $intellektual?->tezislar_reja ?? 0 }}
                                            </td>
                                            <td class="border">
                                                {{ $intellektual?->tezislar_amalda ?? 0 }}
                                            </td>
                                            <td class="border">
                                                {{ ($intellektual?->tezislar_reja ?? 0) - ($intellektual?->tezislar_amalda ?? 0) }}
                                            </td>
                                            <td class="border">
                                                <input type="text" name="tezislar_izoh"
                                                    value="{{ $intellektual?->tezislar_izoh ?? null }}"
                                                    class="input w-full border mt-2" required="">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="border">5.</td>
                                            <td class="border" style="font-size:14px;">
                                                Ilmiy monografiyalar soni
                                            </td>
                                            <td class="border">
                                                {{ $intellektual?->ilmiy_mon_reja ?? 0 }}
                                            </td>
                                            <td class="border">
                                                {{ $intellektual?->ilmiy_mon_amalda ?? 0 }}
                                            </td>
                                            <td class="border">
                                                {{ ($intellektual?->ilmiy_mon_reja ?? 0) - ($intellektual?->ilmiy_mon_amalda ?? 0) }}
                                            </td>
                                            <td class="border">
                                                <input type="text" name="ilmiy_mon_izoh"
                                                    value="{{ $intellektual?->ilmiy_mon_izoh ?? null }}"
                                                    class="input w-full border mt-2" required="">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="border">6.</td>
                                            <td class="border" style="font-size:14px;">
                                                Nashr qilingan oʻquv qoʻllanmalari soni
                                            </td>
                                            <td class="border">
                                                {{ $intellektual?->nashr_uquv_reja ?? 0 }}
                                            </td>
                                            <td class="border">
                                                {{ $intellektual?->nashr_uquv_amalda ?? 0 }}
                                            </td>
                                            <td class="border">
                                                {{ ($intellektual?->nashr_uquv_reja ?? 0) - ($intellektual?->nashr_uquv_amalda ?? 0) }}
                                            </td>
                                            <td class="border">
                                                <input type="text" name="nashr_uquv_izoh"
                                                    value="{{ $intellektual?->nashr_uquv_izoh ?? null }}"
                                                    class="input w-full border mt-2" required="">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="border">7.</td>
                                            <td class="border" style="font-size:14px;">
                                                Nashr qilingan darsliklar soni
                                            </td>
                                            <td class="border">
                                                {{ $intellektual?->darslik_reja ?? 0 }}
                                            </td>
                                            <td class="border">
                                                {{ $intellektual?->darslik_amalda ?? 0 }}
                                            </td>
                                            <td class="border">
                                                {{ ($intellektual?->darslik_reja ?? 0) - ($intellektual?->darslik_amalda ?? 0) }}
                                            </td>
                                            <td class="border">
                                                <input type="text" name="darslik_izoh"
                                                    value="{{ $intellektual?->darslik_izoh ?? null }}"
                                                    class="input w-full border mt-2" required="">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="border">8.</td>
                                            <td class="border" style="font-size:14px;">
                                                Bakalavriat bosqichida tayyorlangan bitiruv malakaviy ishlari soni
                                            </td>
                                            <td class="border">
                                                {{ $intellektual?->b_bitiruv_mreja ?? 0 }}
                                            </td>
                                            <td class="border">
                                                {{ $intellektual?->b_bitiruv_mamalda ?? 0 }}
                                            </td>
                                            <td class="border">
                                                {{ ($intellektual?->b_bitiruv_mreja ?? 0) - ($intellektual?->b_bitiruv_mamalda ?? 0) }}
                                            </td>
                                            <td class="border">
                                                <input type="text" name="b_bitiruv_izoh"
                                                    value="{{ $intellektual?->b_bitiruv_izoh ?? null }}"
                                                    class="input w-full border mt-2" required="">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="border">9.</td>
                                            <td class="border" style="font-size:14px;">
                                                Tayyorlangan magistrlik dissertatsiyalari soni
                                            </td>
                                            <td class="border">
                                                {{ $intellektual?->m_bitiruv_dreja ?? 0 }}
                                            </td>
                                            <td class="border">
                                                {{ $intellektual?->m_bitiruv_damalda ?? 0 }}
                                            </td>
                                            <td class="border">
                                                {{ ($intellektual?->m_bitiruv_dreja ?? 0) - ($intellektual?->m_bitiruv_damalda ?? 0) }}
                                            </td>
                                            <td class="border">
                                                <input type="text" name="m_bitiruv_izoh"
                                                    value="{{ $intellektual?->m_bitiruv_izoh ?? null }}"
                                                    class="input w-full border mt-2" required="">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="border">10.</td>
                                            <td class="border" style="font-size:14px;">
                                                Tayyorlangan doktorlik dissertatsiyalari soni (PhD, DSc)
                                            </td>
                                            <td class="border">
                                                {{ $intellektual?->p_bitiruv_dreja ?? 0 }}
                                            </td>
                                            <td class="border">
                                                {{ $intellektual?->p_bitiruv_damalda ?? 0 }}
                                            </td>
                                            <td class="border">
                                                {{ ($intellektual?->p_bitiruv_dreja ?? 0) - ($intellektual?->p_bitiruv_damalda ?? 0) }}
                                            </td>
                                            <td class="border">
                                                <input type="text" name="p_bitiruv_izoh"
                                                    value="{{ $intellektual?->p_bitiruv_izoh ?? null }}"
                                                    class="input w-full border mt-2" required="">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="border">11.</td>
                                            <td class="border" style="font-size:14px;">
                                                Intellektual mulk obyektlari uchun berilgan arizalar soni
                                            </td>
                                            <td class="border">
                                                {{ $intellektual?->i_mulk_areja ?? 0 }}
                                            </td>
                                            <td class="border">
                                                {{ $intellektual?->i_mulk_aamalda ?? 0 }}
                                            </td>
                                            <td class="border">
                                                {{ ($intellektual?->i_mulk_areja ?? 0) - ($intellektual?->i_mulk_aamalda ?? 0) }}
                                            </td>
                                            <td class="border">
                                                <input type="text" name="i_mulk_izoh"
                                                    value="{{ $intellektual?->i_mulk_izoh ?? null }}"
                                                    class="input w-full border mt-2" required="">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="border" style="text-align: center;" colspan="6">IXTIRO UCHUN
                                                PATENT
                                                VA DASTURIY TAʼMINOTLAR</th>
                                        </tr>
                                        <tr>
                                            <th class="border" style="width: 40px;">T/r</th>
                                            <th class="border">Koʻrsatkichlar</th>
                                            <th class="border">Rejada</th>
                                            <th class="border">Amalda</th>
                                            <th class="border">Farqi</th>
                                            <th class="border">Izoh</th>
                                        </tr>
                                        <tr>
                                            <td class="border">1.</td>
                                            <td class="border" style="font-size:14px;">
                                                Ixtiro uchun olingan patentlari soni
                                            </td>
                                            <td class="border">
                                                {{ $intellektual?->ixtiro_olingan_psreja ?? 0 }}
                                            </td>
                                            <td class="border">
                                                {{ $intellektual?->ixtiro_olingan_psamalda ?? 0 }}
                                            </td>
                                            <td class="border">
                                                {{ ($intellektual?->ixtiro_olingan_psreja ?? 0) - ($intellektual?->ixtiro_olingan_psamalda ?? 0) }}
                                            </td>
                                            <td class="border">
                                                <input type="text" name="ixtiro_olingan_izoh"
                                                    value="{{ $intellektual?->ixtiro_olingan_izoh ?? null }}"
                                                    class="input w-full border mt-2" required="">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="border">2.</td>
                                            <td class="border" style="font-size:14px;">
                                                Ixtiro uchun patentga berilgan buyurtmalar soni
                                            </td>
                                            <td class="border">
                                                {{ $intellektual?->ixtiro_ber_psreja ?? 0 }}
                                            </td>
                                            <td class="border">
                                                {{ $intellektual?->ixtiro_ber_psamalda ?? 0 }}
                                            </td>
                                            <td class="border">
                                                {{ ($intellektual?->ixtiro_ber_psreja ?? 0) - ($intellektual?->ixtiro_ber_psamalda ?? 0) }}
                                            </td>
                                            <td class="border">
                                                <input type="text" name="ixtiro_ber_izoh"
                                                    value="{{ $intellektual?->ixtiro_ber_izoh ?? null }}"
                                                    class="input w-full border mt-2" required="">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="border">3.</td>
                                            <td class="border" style="font-size:14px;">
                                                Dasturiy mahsulotga olingan guvohnomalar soni
                                            </td>
                                            <td class="border">
                                                {{ $intellektual?->dasturiy_gsreja ?? 0 }}
                                            </td>
                                            <td class="border">
                                                {{ $intellektual?->dasturiy_gsamalda ?? 0 }}
                                            </td>
                                            <td class="border">
                                                {{ ($intellektual?->dasturiy_gsreja ?? 0) - ($intellektual?->dasturiy_gsamalda ?? 0) }}
                                            </td>
                                            <td class="border">
                                                <input type="text" name="dasturiy_izoh"
                                                    value="{{ $intellektual?->dasturiy_izoh ?? null }}"
                                                    class="input w-full border mt-2" required="">
                                            </td>
                                        </tr>
                                    </table>

                                </div>

                            </div>
                        </form>
                    </div>
                </div>

            </div>
            <div class="px-5 pb-5 text-center mt-4">
                <button type="button" data-dismiss="modal" class="button delete-cancel w-32 border text-gray-700 mr-1">
                    Bekor qilish
                </button>
                <button type="submit" form="intellektualekspert-paper-edit-form-edit"
                    class="update-confirm button w-24 bg-theme-1 text-white">
                    Qo'shish
                </button>
            </div>
        </div>
    </div>

    <div class="modal" id="loyihaiqtisodiekspert-paper-edit-modal">
        <div class="modal__content modal__content--xl">
            <div class="p-5">

                <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2">
                    <div class="w-full mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                        <form id="loyihaiqtisodiekspert-paper-edit-form-edit" method="POST"
                            action="{{ route('loyihaiqtisodi.update', $loyihaiqtisodi?->id ?? 0) }}" class="validate-form"
                            enctype="multipart/form-data" novalidate="novalidate">
                            @csrf
                            @method('PUT')
                            <div class="grid grid-cols-12 gap-2">

                                <div class="w-full col-span-12">

                                    <table class="table table-bordered">
                                        <tr>
                                            <th class="border" style="text-align: center;" colspan="6">III.
                                                LOYIHANING MUHIM
                                                NATIJALARI </th>
                                        </tr>
                                        <tr>
                                            {{-- <th class="border" style="width: 40px;">T/r</th> --}}
                                            <th class="border" style="width: 30%;">Koʻrsatkichlar</th>
                                            <th class="border" colspan="3" style="width: 30%;">Bajarilishi
                                                holatining
                                                tahlili</th>
                                            <th class="border">Izoh</th>
                                        </tr>
                                        <tr>
                                            {{-- <td class="border">3.3.1.</td> --}}
                                            <td class="border" style="font-size:14px;">
                                                Hisobot davrida qoʻlga kiritilgan muhim natijalar
                                            </td>
                                            <td class="border" colspan="3">
                                                {{ $loyihaiqtisodi?->hisobot_davri ?? null }}
                                            </td>
                                            <td class="border">
                                                <input type="hidden" name="izohlar" value="1">
                                                <textarea name="hisobot_davri_i" class="input w-full border mt-2"
                                                    required="">{{ $loyihaiqtisodi?->hisobot_davri_i ?? null }}</textarea>

                                            </td>
                                        </tr>
                                        <tr>
                                            {{-- <td class="border">3.3.2.</td> --}}
                                            <td class="border" style="font-size:14px;">
                                                Loyihaning bajarilishi davrida yaratilgan ishlanma (texnologiya) nomi va
                                                qisqacha
                                                tavsifi
                                            </td>
                                            <td class="border" colspan="3">
                                                {{ $loyihaiqtisodi?->loyihabaj_ishlanma ?? null }}
                                            </td>
                                            <td class="border">
                                                <textarea name="loyihabaj_ishlanma_i" class="input w-full border mt-2"
                                                    required="">{{ $loyihaiqtisodi?->loyihabaj_ishlanma_i ?? null }}</textarea>

                                            </td>
                                        </tr>
                                        <tr>
                                            {{-- <td class="border">3.3.3.</td> --}}
                                            <td class="border" style="font-size:14px;">
                                                Ilmiy ishlanma joriy etiladigan (tijoratlashtiriladigan) tarmoq (soha) va
                                                kutilayotgan
                                                natijalar (mavjud ehtiyoj, iqtisodiy samaradorlik tahlili)
                                            </td>
                                            <td class="border" colspan="3">
                                                {{ $loyihaiqtisodi?->ilmiy_ishlanmalar ?? null }}
                                            </td>
                                            <td class="border">
                                                <textarea name="ilmiy_ishlanmalar_i" class="input w-full border mt-2"
                                                    required="">{{ $loyihaiqtisodi?->ilmiy_ishlanmalar_i ?? null }}
                                                    </textarea>

                                            </td>
                                        </tr>

                                        <tr>
                                            <th class="border" style="text-align: center;" colspan="6">LOYIHANING
                                                MOLIYAVIY
                                                VA
                                                IQTISODIY
                                                KOʻRSATKICHLARI
                                                (AJRATILGAN MABLAGʻLARNING MAQSADLI ISHLATILISHI)
                                            </th>
                                        </tr>
                                        <tr>
                                            {{-- <td class="border">T/r.</td> --}}
                                            <th class="border" style="width: 30%;">Koʻrsatkichlar</th>
                                            <th class="border">Rejada</th>
                                            <th class="border">Amalda</th>
                                            <th class="border">Farqi</th>
                                            <th class="border">Izoh</th>
                                        </tr>
                                        <tr>
                                            {{-- <td class="border">4.1.</td> --}}
                                            <td class="border" style="font-size:14px;">
                                                Mehnatga haq toʻlash (5.1.-shakl)
                                            </td>
                                            {{-- <td class="border"> --}}
                                                {{-- {{ $loyihaiqtisodi?->mehnat_haq_r ?? null }} --}}
                                                {{-- {{ number_format($loyihaiqtisodi?->mehnat_haq_r, 0, '.', ' ') }} --}}
                                            <td class="border">
                                                {{ $loyihaiqtisodi?->mehnat_haq_r ?? null }}
                                            </td>
                                            {{-- </td> --}}
                                            <td class="border">
                                                {{ $loyihaiqtisodi?->mehnat_haq_a ?? null }}
                                            </td>
                                            <td class="border">
                                                {{ number_format(preg_replace('/\D/', '', $loyihaiqtisodi?->mehnat_haq_r ?? 0) - preg_replace('/\D/', '', $loyihaiqtisodi?->mehnat_haq_a ?? 0)) }}
                                            </td>
                                            <td class="border">
                                                <textarea name="mehnat_haq_i" class="input w-full border mt-2"
                                                    required="">{{ $loyihaiqtisodi?->mehnat_haq_i ?? null }}</textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            {{-- <td class="border">4.2.</td> --}}
                                            <td class="border" style="font-size:14px;">
                                                Xizmat safarlari xarajatlari (5.2.-shakl)
                                            </td>
                                            <td class="border">
                                                {{ $loyihaiqtisodi?->xizmat_saf_r ?? null }}
                                            </td>
                                            <td class="border">
                                                {{ $loyihaiqtisodi?->xizmat_saf_a ?? null }}
                                            </td>
                                            <td class="border">
                                                {{ number_format(preg_replace('/\D/', '', $loyihaiqtisodi?->xizmat_saf_r ?? 0) - preg_replace('/\D/', '', $loyihaiqtisodi?->xizmat_saf_a ?? 0)) }}
                                            </td>
                                            <td class="border">
                                                <textarea name="xizmat_saf_i" class="input w-full border mt-2"
                                                    required="">{{ $loyihaiqtisodi?->xizmat_saf_i ?? null }}</textarea>

                                            </td>
                                        </tr>
                                        <tr>
                                            {{-- <td class="border">4.3.</td> --}}
                                            <td class="border" style="font-size:14px;">
                                                Ilmiy-tadqiqot uchun zarur boʻlgan asbob-uskunalar, texnik vositalar va
                                                boshqa
                                                tovar-moddiy boyliklarning xaridi uchun xarajatlar (5.4.-shakl)
                                            </td>
                                            <td class="border">
                                                {{ $loyihaiqtisodi?->xarid_xaraja_r ?? null }}
                                            </td>
                                            <td class="border">
                                                {{ $loyihaiqtisodi?->xarid_xaraja_a ?? null }}
                                            </td>
                                            <td class="border">
                                                {{ number_format(preg_replace('/\D/', '', $loyihaiqtisodi?->xarid_xaraja_r ?? 0) - preg_replace('/\D/', '', $loyihaiqtisodi?->xarid_xaraja_a ?? 0)) }}
                                            </td>
                                            <td class="border">
                                                <textarea name="xarid_xaraja_i" class="input w-full border mt-2"
                                                    required="">{{ $loyihaiqtisodi?->xarid_xaraja_i ?? null }}</textarea>

                                            </td>
                                        </tr>
                                        <tr>
                                            {{-- <td class="border">4.4.</td> --}}
                                            <td class="border" style="font-size:14px;">
                                                Ilmiy-tadqiqot uchun materiallar va butlovchi qismlarni sotib olish
                                                xarajatlari
                                                (5.5.-shakl)
                                            </td>
                                            <td class="border">
                                                {{ $loyihaiqtisodi?->mat_butlovchi_r ?? null }}
                                            </td>
                                            <td class="border">
                                                {{ $loyihaiqtisodi?->mat_butlovchi_a ?? null }}
                                            </td>
                                            <td class="border">
                                                {{ number_format(preg_replace('/\D/', '', $loyihaiqtisodi?->mat_butlovchi_r ?? 0) - preg_replace('/\D/', '', $loyihaiqtisodi?->mat_butlovchi_a ?? 0)) }}
                                            </td>
                                            <td class="border">
                                                <textarea name="mat_butlovchi_i" class="input w-full border mt-2"
                                                    required="">{{ $loyihaiqtisodi?->mat_butlovchi_i ?? null }}</textarea>

                                            </td>
                                        </tr>
                                        <tr>
                                            {{-- <td class="border">4.5.</td> --}}
                                            <td class="border" style="font-size:14px;">
                                                Loyihani amalga oshirishga jalb etilgan boshqa tashkilotlarning tadqiqot
                                                ishlari
                                                uchun
                                                toʻlov (5.6.-shakl)
                                            </td>
                                            <td class="border">
                                                {{ $loyihaiqtisodi?->jalb_etilgan_r ?? null }}
                                            </td>
                                            <td class="border">
                                                {{ $loyihaiqtisodi?->jalb_etilgan_a ?? null }}
                                            </td>
                                            <td class="border">
                                                {{ number_format(preg_replace('/\D/', '', $loyihaiqtisodi?->jalb_etilgan_r ?? 0) - preg_replace('/\D/', '', $loyihaiqtisodi?->jalb_etilgan_a ?? 0)) }}
                                            </td>
                                            <td class="border">
                                                <textarea name="jalb_etilgan_i" class="input w-full border mt-2"
                                                    required="">{{ $loyihaiqtisodi?->jalb_etilgan_i ?? null }}</textarea>

                                            </td>
                                        </tr>
                                        <tr>
                                            {{-- <td class="border">4.6.</td> --}}
                                            <td class="border" style="font-size:14px;">
                                                Loyihani amalga oshirish uchun boshqa xarajatlar (5.7.-shakl)
                                            </td>
                                            <td class="border">
                                                {{ $loyihaiqtisodi?->boshqa_xarajat_r ?? null }}
                                            </td>
                                            <td class="border">
                                                {{ $loyihaiqtisodi?->boshqa_xarajat_a ?? null }}
                                            </td>
                                            <td class="border">
                                                {{ number_format(preg_replace('/\D/', '', $loyihaiqtisodi?->boshqa_xarajat_r ?? 0) - preg_replace('/\D/', '', $loyihaiqtisodi?->boshqa_xarajat_a ?? 0)) }}
                                            </td>
                                            <td class="border">
                                                <textarea name="boshqa_xarajat_i" class="input w-full border mt-2"
                                                    required="">{{ $loyihaiqtisodi?->boshqa_xarajat_i ?? null }}</textarea>

                                            </td>
                                        </tr>
                                        <tr>
                                            {{-- <td class="border">4.7.</td> --}}
                                            <td class="border" style="font-size:14px;">
                                                Tashkilotning ustama xarajatlari (ushbu xarajat turi byudjetdan
                                                toʻgʻridan-toʻgʻri
                                                va
                                                bazaviy moliyalashtiriladigan ilmiy tashkilotlar tomonidan
                                                rejalashtirilmaydi)
                                            </td>
                                            <td class="border">
                                                {{ $loyihaiqtisodi?->tashustama_xarajat_r ?? null }}
                                            </td>
                                            <td class="border">
                                                {{ $loyihaiqtisodi?->tashustama_xarajat_a ?? null }}
                                            </td>
                                            <td class="border">
                                                {{ number_format(preg_replace('/\D/', '', $loyihaiqtisodi?->tashustama_xarajat_r ?? 0) - preg_replace('/\D/', '', $loyihaiqtisodi?->tashustama_xarajat_a ?? 0)) }}
                                            </td>
                                            <td class="border">
                                                <textarea name="tashustama_xarajat_i" class="input w-full border mt-2"
                                                    required="">{{ $loyihaiqtisodi?->tashustama_xarajat_i ?? null }}</textarea>

                                            </td>
                                        </tr>
                                        <tr>
                                            {{-- <td class="border">4.8.</td> --}}
                                            <td class="border" style="font-size:14px;">
                                                Xarid qilingan asbob-uskunalar va boshqa asosiy vositalar xaridining
                                                shartnomalari
                                                mavjudligi, dalolatnomasining rasmiylashtirilganligi
                                            </td>
                                            <td class="border" colspan="3">
                                                {{ $loyihaiqtisodi?->xarid_qilingan_xarid ?? null }}
                                            </td>
                                            <td rowspan="4" class="border">
                                                <textarea name="xarid_qilingan_i" class="input w-full border mt-2"
                                                    required="">{{ $loyihaiqtisodi?->xarid_qilingan_i ?? null }}</textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            {{-- <td class="border">4.8.1.</td> --}}
                                            <td class="border" style="font-size:14px;">
                                                Xarid shartnomasining raqami va sanasi
                                            </td>
                                            <td class="border">
                                                {{ $loyihaiqtisodi?->xarid_s ?? null }}
                                            </td>
                                            <td class="border" colspan="2">
                                                {{ $loyihaiqtisodi?->xarid_r ?? null }}
                                            </td>
                                        </tr>
                                        <tr>
                                            {{-- <td class="border">4.8.2.</td> --}}
                                            <td class="border" style="font-size:14px;">
                                                Sotuvchi kompaniyaning nomi
                                            </td>
                                            <td class="border" colspan="3">
                                                {{ $loyihaiqtisodi?->xarid_sh ?? null }}
                                            </td>
                                        </tr>
                                        <tr>
                                            {{-- <td class="border">4.8.3.</td> --}}
                                            <td class="border" style="font-size:14px;">
                                                Yetkazib beruvchi yuridik shaxsning nomi
                                            </td>
                                            <td class="border" colspan="3">
                                                {{ $loyihaiqtisodi?->yetkb_yuridik_nomi ?? null }}
                                            </td>
                                        </tr>
                                        <tr>
                                            {{-- <td class="border">4.7.</td> --}}
                                            <td class="border" style="font-size:14px;">
                                                Mablag‘ning o‘zlashtirilishi, so‘m
                                            </td>
                                            <td class="border">
                                                {{ $loyihaiqtisodi?->uzlashtirilishi_summasi ?? null }}
                                            </td>
                                            <td class="border">
                                                {{ $ilmiyloyiha->sum ?? null }}
                                            </td>
                                            <td class="border">
                                                {{ number_format(preg_replace('/\D/', '', $loyihaiqtisodi?->uzlashtirilishi_summasi ?? 0) - preg_replace('/\D/', '', $ilmiyloyiha->sum ?? 0)) }}
                                            </td>
                                            <td class="border">
                                                <textarea name="uzlashtirilishi_sum_i" class="input w-full border mt-2"
                                                    required="">{{ $loyihaiqtisodi?->uzlashtirilishi_sum_i ?? null }}</textarea>

                                            </td>
                                        </tr>

                                    </table>

                                </div>

                            </div>
                        </form>
                    </div>
                </div>

            </div>
            <div class="px-5 pb-5 text-center mt-4">
                <button type="button" data-dismiss="modal" class="button delete-cancel w-32 border text-gray-700 mr-1">
                    Bekor qilish
                </button>
                <button type="submit" form="loyihaiqtisodiekspert-paper-edit-form-edit"
                    class="update-confirm button w-24 bg-theme-1 text-white">
                    Qo'shish
                </button>
            </div>
        </div>
    </div>

    <div class="modal" id="doktarantura-paper-create-modal">
        <div class="modal__content modal__content--xl">
            <div class="p-5">

                <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2">
                    <div class="w-full mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                        <form id="doktarantura-paper-create-form" method="POST"
                            action="{{ $tekshirivchilar ? route('tekshirivchilar.update', $tekshirivchilar) : route('tekshirivchilar.store') }}"
                            class="validate-form"
                            enctype="multipart/form-data" novalidate="novalidate">
                            @csrf
                            @if ($tekshirivchilar)
                                @method('PUT')
                            @else
                                <input type="hidden" name="ilmiy_loyiha_id" value="{{ $ilmiyloyiha->id }}">
                            @endif
                            <div class="grid grid-cols-12 gap-2">

                                <div class="w-full col-span-12">
                                    <table class="table">

                                        <thead>
                                            <tr class="bg-gray-200">
                                                <th class="border border-b-2 " style="width: 40px;">№</th>
                                                <th class="border border-b-2 " style="width: 60%;">Ko‘rsatkichlar</th>
                                                <th class="border border-b-2 ">Miqdori</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="border border-b-2 ">1.</td>
                                                <td class="border border-b-2 ">
                                                    Ilmiy-tadqiqot ishlarining shartnoma va uning kalendar rejasiga asosan
                                                    bajarilish holati
                                                </td>
                                                <td class="border border-b-2 ">
                                                    <select name="kalendar" class="input border w-full mt-2" required="">

                                                        <option value="{{ $tekshirivchilar?->kalendar ?? 0 }}">
                                                            {{ $tekshirivchilar?->kalendar ?? 0 }}
                                                        </option>

                                                        <option value="Bajarilgan ">Bajarilgan </option>

                                                        <option value="Bajarilmagan">Bajarilmagan</option>
                                                    </select><br>
                                                    <input type="hidden" name="holati" value="1">

                                                    @error('muddat')
                                                        <div class="error">{{ $message }}</div>
                                                    @enderror
                                                </td>
                                            </tr>
                                            <tr class="bg-gray-200">
                                                <td class="border border-b-2 ">2.</td>
                                                <td class="border border-b-2 ">
                                                    Ijrochi tashkilot tomonidan loyihaning amalga oshirilishi uchun zarur
                                                    shart-sharoitlar yaratib berilganligi.
                                                </td>
                                                <td class="border border-b-2 ">
                                                    <select name="shart_sharoit_yaratib" class="input border w-full mt-2"
                                                        required="">

                                                        <option
                                                            value="{{ $tekshirivchilar?->shart_sharoit_yaratib }}">
                                                            {{ $tekshirivchilar?->shart_sharoit_yaratib }}
                                                        </option>

                                                        <option value="Yaratilgan">Yaratilgan</option>

                                                        <option value="Yaratilmagan">Yaratilmagan</option>


                                                    </select><br>

                                                    @error('muddat')
                                                        <div class="error">{{ $message }}</div>
                                                    @enderror
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="border border-b-2 ">3.</td>
                                                <td class="border border-b-2 ">
                                                    Loyiha doirasida qo‘lga kiritilgan yakuniy natijalar va ularni
                                                    tijoratlashtirish imkoniyatlari.
                                                </td>
                                                <td class="border border-b-2 ">
                                                    <select name="yakuniy_natijalar" class="input border w-full mt-2"
                                                        required="">

                                                        <option value="{{ $tekshirivchilar?->yakuniy_natijalar }}">
                                                            {{ $tekshirivchilar?->yakuniy_natijalar }}
                                                        </option>

                                                        <option value="Imkoniyat mavjud">Imkoniyat mavjud</option>

                                                        <option value="Imkoniyat mavjud emas">Imkoniyat mavjud emas
                                                        </option>


                                                    </select><br>

                                                    @error('muddat')
                                                        <div class="error">{{ $message }}</div>
                                                    @enderror
                                                </td>
                                            </tr>
                                            <tr class="bg-gray-200">
                                                <td class="border border-b-2 ">4.</td>
                                                <td class="border border-b-2 ">
                                                    Loyiha ijrochilarining o‘zgarishi holati.
                                                </td>
                                                <td class="border border-b-2 ">
                                                    <select name="loyiha_ijrochilari" class="input border w-full mt-2"
                                                        required="">

                                                        <option value="{{ $tekshirivchilar?->loyiha_ijrochilari }}">
                                                            {{ $tekshirivchilar?->loyiha_ijrochilari }}
                                                        </option>

                                                        <option value="Mavjud emas">Mavjud emas</option>

                                                        <option value="O‘zgarish mavjud">O‘zgarish mavjud</option>


                                                    </select><br>

                                                    @error('muddat')
                                                        <div class="error">{{ $message }}</div>
                                                    @enderror
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="border border-b-2 ">5.</td>
                                                <td class="border border-b-2 ">
                                                    Ekspert F.I.Sh
                                                </td>
                                                <td class="border border-b-2 ">
                                                    <input type="text" name="ekspert_fish"
                                                        value="{{ $tekshirivchilar?->ekspert_fish }}"
                                                        class="input w-full border mt-2">
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="border border-b-2 ">5.</td>
                                                <td class="border border-b-2 ">
                                                    Tashkilotning mas'ul rahbari F.I.Sh
                                                </td>
                                                <td class="border border-b-2 ">
                                                    <input type="text" name="t_masul"
                                                        value="{{ $tekshirivchilar?->t_masul }}"
                                                        class="input w-full border mt-2">
                                                </td>
                                            </tr>
                                            <tr class="bg-gray-200">
                                                <td class="border border-b-2 ">6.</td>
                                                <td class="border border-b-2 ">
                                                    Monitoring xulosasi.
                                                </td>
                                                <td class="border border-b-2 ">
                                                    <select name="status" class="input border w-full mt-2" required="">

                                                        <option value="{{ $tekshirivchilar?->status }}">
                                                            {{ $tekshirivchilar?->status }}
                                                        </option>

                                                        {{-- <option value="Qo‘shimcha o‘rganish talab etiladi">Qo‘shimcha
                                                            o‘rganish talab etiladi</option> --}}

                                                        <option value="Qoniqarli">Qoniqarli</option>

                                                        <option value="Qoniqarsiz">Qoniqarsiz</option>


                                                    </select><br>

                                                    @error('muddat')
                                                        <div class="error">{{ $message }}</div>
                                                    @enderror
                                                </td>
                                            </tr>

                                            <tr>
                                                <td class="border border-b-2 ">7.</td>
                                                <td class="border border-b-2 ">
                                                    Izoh.
                                                </td>
                                                <td class="border border-b-2 ">
                                                    <textarea name="comment" id=""
                                                        class="input w-full border mt-2">{{ $tekshirivchilar?->comment }}</textarea>
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>

            </div>
            <div class="px-5 pb-5 text-center mt-4">
                <button type="button" data-dismiss="modal" class="button delete-cancel w-32 border text-gray-700 mr-1">
                    Bekor qilish
                </button>
                <button type="submit" form="doktarantura-paper-create-form"
                    class="update-confirm button w-24 bg-theme-1 text-white">
                    Tasdiqlash
                </button>
            </div>
        </div>
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
@endsection