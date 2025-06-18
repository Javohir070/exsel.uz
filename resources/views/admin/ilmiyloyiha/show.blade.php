@extends('layouts.admin')

@section('content')
<div class="content">
    <div class="flex justify-between align-center mt-6 mb-6">

        <h2 class="intro-y text-lg font-medium">{{ $ilmiyloyiha->tashkilot->name }} </h2>

        @role(['Ilmiy loyihalar boyicha masul', 'Ekspert'])
        <a href="{{ route('ilmiyloyihalar.index') }}" class="button w-24 bg-theme-1 text-white">
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
                class="py-4 sm:mr-8 flex items-center {{ $data || $create || $errorMessage ? '' : 'active' }}">
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
                class="py-4 sm:mr-8 flex items-center {{ $data || $create || $errorMessage ? 'active' : '' }}">
                LOYIHA IJROCHILARI
            </a>
            <a data-toggle="tab" data-target="#add-expert" href="javascript:;" class="py-4 sm:mr-8 flex items-center ">
                EKSPERT XULOSASI
            </a>
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

            <div class="tab-content__pane {{ $data || $create || $errorMessage ? '' : 'active' }}" id="add-hersh">
                <div class="p-5">
                    <table class="table table-bordered">
                        <div
                            style="display: flex;justify-content: end; border-bottom: 1px solid #e2e8f0; padding-bottom: 20px;">
                            <div style="text-align: center;">
                                <a href="javascript:;" data-target="#ilmiyloyiha-paper-edit-modal" data-toggle="modal"
                                    class="button w-24 ml-3 bg-theme-1 text-white">
                                    Tahrirlash
                                </a>
                            </div>
                        </div>
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
                                <td class="border">Shartnoma raqamiva  sanasi</td>
                                <td class="border">{{ $ilmiyloyiha->sh_raqami }}, {{ $ilmiyloyiha->sanasi }} @if ($ilmiyloyiha->umumiy_mablag)
                                    <a href="{{ asset('storage/' . $ilmiyloyiha->umumiy_mablag) }}"
                                        class="button  bg-theme-1 text-white" target="_blank">Faylni ko'rish</a>
                                @endif</td>
                            </tr>
                            <tr>
                                <td class="border">1.5.</td>
                                <td class="border">Bajarilish muddati</td>
                                <td class="border">{{ $ilmiyloyiha->bosh_sana . ' - ' . $ilmiyloyiha->tug_sana }}
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
                                <td class="border">Loyihaning umumiy qiymati, ming soʻm</td>
                                <td class="border">
                                    {{ number_format((int) preg_replace('/\D/', '', $ilmiyloyiha->sum), 0, '.', ' ') }}
                                </td>
                            </tr>
                            <tr>
                                <td class="border">1.6.1.</td>
                                <td class="border">Joriy yil uchun ajratilgan mablagʻ, ming soʻm</td>
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
                                <td class="border">{{ $shtat_sum ?? 0}}</td>
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
                                <table class="table table-bordered">
                                    <div
                                        style="display: flex;justify-content: end; border-bottom: 1px solid #e2e8f0; padding-bottom: 20px;">
                                        {{-- <div style="font-size:18px;font-weight: 400;"> {{$asbobuskuna->name}}
                                            xaqida ma’lumot
                                        </div> --}}
                                        <div style="text-align: center;">
                                            @if (empty($intellektual->id))
                                                <a href="javascript:;" data-target="#intellektual-paper-create-modal"
                                                    data-toggle="modal" class="button w-24 ml-3 bg-theme-1 text-white">
                                                    Qo'shish
                                                </a>
                                            @else
                                                {{-- <a
                                                    href="{{ route('intellektual.edit', ['intellektual' => $intellektual->id])}}"
                                                    class="button w-24 bg-theme-1 text-white" style="margin-right:20px;">
                                                    Tahrirlash
                                                </a> --}}
                                                <a href="javascript:;" data-target="#intellektual-paper-edit-modal"
                                                    data-toggle="modal" class="button w-24 ml-3 bg-theme-1 text-white">
                                                    Tahrirlash
                                                </a>
                                            @endif
                                            {{-- <a href="" class="button w-24 bg-theme-6 text-white">
                                                O'chirish
                                            </a> --}}
                                            @role(['Ilmiy loyihalar boyicha masul', 'Ekspert'])
                                            @if (!empty($intellektual->id))
                                                <a href="javascript:;" data-target="#intellektualekspert-paper-edit-modal"
                                                    data-toggle="modal" class="button w-24 ml-3 bg-theme-1 text-white">
                                                    Izoh
                                                </a>
                                            @endif
                                            @endrole
                                        </div>
                                    </div>
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
                                        <td class="border" style="text-size:14px;">
                                            Mahalliy ilmiy jurnallardagi maqolalar soni
                                        </td>
                                        <td class="border">
                                            {{ $intellektual->mal_jur_reja ?? 0 }}
                                        </td>
                                        <td class="border">
                                            {{ $intellektual->mal_jur_amalda ?? 0 }}
                                        </td>
                                        <td class="border">
                                            {{ ($intellektual->mal_jur_amalda  ?? 0) - ($intellektual->mal_jur_reja ?? 0) }}
                                        </td>
                                        <td class="border">{{ $intellektual->mal_jur_izoh ?? null }}</td>
                                    </tr>
                                    <tr>
                                        <td class="border">2.</td>
                                        <td class="border" style="text-size:14px;">
                                            Xorijiy jurnallardagi ilmiy maqolalar soni
                                        </td>
                                        <td class="border">
                                            {{ $intellektual->xor_jur_reja ?? 0 }}
                                        </td>
                                        <td class="border">
                                            {{ $intellektual->xor_jur_amalda ?? 0 }}
                                        </td>
                                        <td class="border">
                                            {{ ($intellektual->xor_jur_amalda  ?? 0) - ($intellektual->xor_jur_reja ?? 0) }}
                                        </td>
                                        <td class="border">{{ $intellektual->xor_jur_izoh ?? null }}</td>
                                    </tr>
                                    <tr>
                                        <td class="border">3.</td>
                                        <td class="border" style="text-size:14px;">
                                            Web of Science va Scopus bazasidagi xalqaro nashrlardagi maqolalar soni
                                        </td>
                                        <td class="border">
                                            {{ $intellektual->web_jur_reja ?? 0 }}
                                        </td>
                                        <td class="border">
                                            {{ $intellektual->web_jur_amalda ?? 0 }}
                                        </td>
                                        <td class="border">
                                            {{ ($intellektual->web_jur_amalda  ?? 0) - ($intellektual->web_jur_reja ?? 0) }}
                                        </td>
                                        <td class="border">{{ $intellektual->web_jur_izoh ?? null }}</td>
                                    </tr>
                                    <tr>
                                        <td class="border">4.</td>
                                        <td class="border" style="text-size:14px;">
                                            Tezislar soni
                                        </td>
                                        <td class="border">
                                            {{ $intellektual->tezislar_reja ?? 0 }}
                                        </td>
                                        <td class="border">
                                            {{ $intellektual->tezislar_amalda ?? 0 }}
                                        </td>
                                        <td class="border">
                                            {{ ($intellektual->tezislar_amalda  ?? 0) - ($intellektual->tezislar_reja ?? 0) }}
                                        </td>
                                        <td class="border">{{ $intellektual->tezislar_izoh ?? null }}</td>
                                    </tr>
                                    <tr>
                                        <td class="border">5.</td>
                                        <td class="border" style="text-size:14px;">
                                            Ilmiy monografiyalar soni
                                        </td>
                                        <td class="border">
                                            {{ $intellektual->ilmiy_mon_reja ?? 0 }}
                                        </td>
                                        <td class="border">
                                            {{ $intellektual->ilmiy_mon_amalda ?? 0 }}
                                        </td>
                                        <td class="border">
                                            {{ ($intellektual->ilmiy_mon_amalda  ?? 0) - ($intellektual->ilmiy_mon_reja ?? 0) }}
                                        </td>
                                        <td class="border">{{ $intellektual->ilmiy_mon_izoh ?? null }}</td>
                                    </tr>
                                    <tr>
                                        <td class="border">6.</td>
                                        <td class="border" style="text-size:14px;">
                                            Nashr qilingan oʻquv qoʻllanmalari soni
                                        </td>
                                        <td class="border">
                                            {{ $intellektual->nashr_uquv_reja ?? 0 }}
                                        </td>
                                        <td class="border">
                                            {{ $intellektual->nashr_uquv_amalda ?? 0 }}
                                        </td>
                                        <td class="border">
                                            {{ ($intellektual->nashr_uquv_amalda  ?? 0) - ($intellektual->nashr_uquv_reja ?? 0) }}
                                        </td>
                                        <td class="border">{{ $intellektual->nashr_uquv_izoh ?? null }}</td>
                                    </tr>
                                    <tr>
                                        <td class="border">7.</td>
                                        <td class="border" style="text-size:14px;">
                                            Nashr qilingan darsliklar soni
                                        </td>
                                        <td class="border">
                                            {{ $intellektual->darslik_reja ?? 0 }}
                                        </td>
                                        <td class="border">
                                            {{ $intellektual->darslik_amalda ?? 0 }}
                                        </td>
                                        <td class="border">
                                            {{ ($intellektual->darslik_amalda  ?? 0) - ($intellektual->darslik_reja ?? 0) }}
                                        </td>
                                        <td class="border">{{ $intellektual->darslik_izoh ?? null }}</td>
                                    </tr>
                                    <tr>
                                        <td class="border">8.</td>
                                        <td class="border" style="text-size:14px;">
                                            Bakalavriat bosqichida tayyorlangan bitiruv malakaviy ishlari soni
                                        </td>
                                        <td class="border">
                                            {{ $intellektual->b_bitiruv_mreja ?? 0 }}
                                        </td>
                                        <td class="border">
                                            {{ $intellektual->b_bitiruv_mamalda ?? 0 }}
                                        </td>
                                        <td class="border">
                                            {{ ($intellektual->b_bitiruv_mamalda  ?? 0) - ($intellektual->b_bitiruv_mreja ?? 0) }}
                                        </td>
                                        <td class="border">{{ $intellektual->b_bitiruv_izoh ?? null }}</td>
                                    </tr>
                                    <tr>
                                        <td class="border">9.</td>
                                        <td class="border" style="text-size:14px;">
                                            Tayyorlangan magistrlik dissertatsiyalari soni
                                        </td>
                                        <td class="border">
                                            {{ $intellektual->m_bitiruv_dreja ?? 0 }}
                                        </td>
                                        <td class="border">
                                            {{ $intellektual->m_bitiruv_damalda ?? 0 }}
                                        </td>
                                        <td class="border">
                                            {{ ($intellektual->m_bitiruv_damalda ?? 0) - ($intellektual->m_bitiruv_dreja  ?? 0) }}
                                        </td>
                                        <td class="border">{{ $intellektual->m_bitiruv_izoh ?? null }}</td>
                                    </tr>
                                    <tr>
                                        <td class="border">10.</td>
                                        <td class="border" style="text-size:14px;">
                                            Tayyorlangan doktorlik dissertatsiyalari soni (PhD, DSc)
                                        </td>
                                        <td class="border">
                                            {{ $intellektual->p_bitiruv_dreja ?? 0 }}
                                        </td>
                                        <td class="border">
                                            {{ $intellektual->p_bitiruv_damalda ?? 0 }}
                                        </td>
                                        <td class="border">
                                            {{ ($intellektual->p_bitiruv_damalda  ?? 0) - ($intellektual->p_bitiruv_dreja ?? 0) }}
                                        </td>
                                        <td class="border">{{ $intellektual->p_bitiruv_izoh ?? null }}</td>
                                    </tr>
                                    <tr>
                                        <td class="border">11.</td>
                                        <td class="border" style="text-size:14px;">
                                            Intellektual mulk obyektlari uchun berilgan arizalar soni
                                        </td>
                                        <td class="border">
                                            {{ $intellektual->i_mulk_areja ?? 0 }}
                                        </td>
                                        <td class="border">
                                            {{ $intellektual->i_mulk_aamalda ?? 0 }}
                                        </td>
                                        <td class="border">
                                            {{ ($intellektual->i_mulk_aamalda  ?? 0) - ($intellektual->i_mulk_areja ?? 0) }}
                                        </td>
                                        <td class="border">{{ $intellektual->i_mulk_izoh ?? null }}</td>
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
                                        <td class="border" style="text-size:14px;">
                                            Ixtiro uchun olingan patentlari soni
                                        </td>
                                        <td class="border">
                                            {{ $intellektual->ixtiro_olingan_psreja ?? 0 }}
                                        </td>
                                        <td class="border">
                                            {{ $intellektual->ixtiro_olingan_psamalda ?? 0 }}
                                        </td>
                                        <td class="border">
                                            {{ ($intellektual->ixtiro_olingan_psamalda  ?? 0) - ($intellektual->ixtiro_olingan_psreja ?? 0) }}
                                        </td>
                                        <td class="border">{{ $intellektual->ixtiro_olingan_izoh ?? null }}</td>
                                    </tr>
                                    <tr>
                                        <td class="border">2.</td>
                                        <td class="border" style="text-size:14px;">
                                            Ixtiro uchun patentga berilgan buyurtmalar soni
                                        </td>
                                        <td class="border">
                                            {{ $intellektual->ixtiro_ber_psreja ?? 0 }}
                                        </td>
                                        <td class="border">
                                            {{ $intellektual->ixtiro_ber_psamalda ?? 0 }}
                                        </td>
                                        <td class="border">
                                            {{ ($intellektual->ixtiro_ber_psamalda  ?? 0) - ($intellektual->ixtiro_ber_psreja ?? 0) }}
                                        </td>
                                        <td class="border">{{ $intellektual->ixtiro_ber_izoh ?? null }}</td>
                                    </tr>
                                    <tr>
                                        <td class="border">3.</td>
                                        <td class="border" style="text-size:14px;">
                                            Dasturiy mahsulotga olingan guvohnomalar soni
                                        </td>
                                        <td class="border">
                                            {{ $intellektual->dasturiy_gsreja ?? 0 }}
                                        </td>
                                        <td class="border">
                                            {{ $intellektual->dasturiy_gsamalda ?? 0 }}
                                        </td>
                                        <td class="border">
                                            {{ ($intellektual->dasturiy_gsamalda ?? 0) - ($intellektual->dasturiy_gsreja ?? 0) }}
                                        </td>
                                        <td class="border">{{ $intellektual->dasturiy_izoh ?? null }}</td>
                                    </tr>
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
                                @if (empty($loyihaiqtisodi->id))
                                    <a href="javascript:;" data-target="#science-paper-create-modal" data-toggle="modal"
                                        class="button w-24 ml-3 bg-theme-1 text-white">
                                        Qo'shish
                                    </a>
                                @else
                                    {{-- <a
                                        href="{{ route('loyihaiqtisodi.edit', ['loyihaiqtisodi' => $loyihaiqtisodi->id])}}"
                                        class="button w-24 bg-theme-1 text-white" style="margin-right:20px;">
                                        Tahrirlash
                                    </a> --}}
                                    <a href="javascript:;" data-target="#science-paper-edit-modal" data-toggle="modal"
                                        class="button w-24 ml-3 bg-theme-1 text-white">
                                        Tahrirlash
                                    </a>
                                @endif
                                {{-- <a href="" class="button w-24 bg-theme-6 text-white">
                                    O'chirish
                                </a> --}}
                                @role(['Ilmiy loyihalar boyicha masul', 'Ekspert'])
                                @if (!empty($loyihaiqtisodi->id))
                                    <a href="javascript:;" data-target="#loyihaiqtisodiekspert-paper-edit-modal"
                                        data-toggle="modal" class="button w-24 ml-3 bg-theme-1 text-white">
                                        Izoh
                                    </a>
                                @endif
                                @endrole
                            </div>
                        </div>
                        <table class="table table-bordered">
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
                                <td class="border" style="text-size:14px;">
                                    Hisobot davrida qoʻlga kiritilgan muhim natijalar
                                </td>
                                <td class="border" colspan="3">
                                    {{ $loyihaiqtisodi->hisobot_davri ?? null }}
                                </td>
                                <td class="border">{{ $loyihaiqtisodi->hisobot_davri_i ?? null }}</td>
                            </tr>
                            <tr>
                                <td class="border">3.3.2.</td>
                                <td class="border" style="text-size:14px;">
                                    Loyihaning bajarilishi davrida yaratilgan ishlanma (texnologiya) nomi va qisqacha
                                    tavsifi
                                </td>
                                <td class="border" colspan="3">
                                    {{ $loyihaiqtisodi->loyihabaj_ishlanma ?? null }}
                                </td>
                                <td class="border">{{ $loyihaiqtisodi->loyihabaj_ishlanma_i ?? null }}</td>
                            </tr>
                            <tr>
                                <td class="border">3.3.3.</td>
                                <td class="border" style="text-size:14px;">
                                    Ilmiy ishlanma joriy etiladigan (tijoratlashtiriladigan) tarmoq (soha) va
                                    kutilayotgan
                                    natijalar (mavjud ehtiyoj, iqtisodiy samaradorlik tahlili)
                                </td>
                                <td class="border" colspan="3">
                                    {{ $loyihaiqtisodi->ilmiy_ishlanmalar ?? null }}
                                </td>
                                <td class="border">{{ $loyihaiqtisodi->ilmiy_ishlanmalar_i ?? null }}</td>
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
                                <td class="border" style="text-size:14px;">
                                    Mehnatga haq toʻlash (5.1.-shakl)
                                </td>
                                {{-- <td class="border"> --}}
                                    {{-- {{ $loyihaiqtisodi->mehnat_haq_r ?? null }} --}}
                                    {{-- {{ number_format($loyihaiqtisodi->mehnat_haq_r, 0, '.', ' ') }} --}}
                                <td class="border">
                                    {{ $loyihaiqtisodi->mehnat_haq_r ?? null }}
                                </td>
                                {{-- </td> --}}
                                <td class="border">
                                    {{ $loyihaiqtisodi->mehnat_haq_a ?? null }}
                                </td>
                                <td class="border">
                                    {{ number_format(preg_replace('/\D/', '', $loyihaiqtisodi->mehnat_haq_r ?? 0) - preg_replace('/\D/', '', $loyihaiqtisodi->mehnat_haq_a ?? 0)) }}
                                </td>
                                <td class="border">
                                    {{ $loyihaiqtisodi->mehnat_haq_i ?? null }}
                                </td>
                            </tr>
                            <tr>
                                <td class="border">4.2.</td>
                                <td class="border" style="text-size:14px;">
                                    Xizmat safarlari xarajatlari (5.2.-shakl)
                                </td>
                                <td class="border">
                                    {{ $loyihaiqtisodi->xizmat_saf_r ?? null }}
                                </td>
                                <td class="border">
                                    {{ $loyihaiqtisodi->xizmat_saf_a ?? null }}
                                </td>
                                <td class="border">
                                    {{ number_format(preg_replace('/\D/', '', $loyihaiqtisodi->xizmat_saf_r ?? 0) - preg_replace('/\D/', '', $loyihaiqtisodi->xizmat_saf_a ?? 0)) }}
                                </td>
                                <td class="border">{{ $loyihaiqtisodi->xizmat_saf_i ?? null }}</td>
                            </tr>
                            <tr>
                                <td class="border">4.3.</td>
                                <td class="border" style="text-size:14px;">
                                    Ilmiy-tadqiqot uchun zarur boʻlgan asbob-uskunalar, texnik vositalar va boshqa
                                    tovar-moddiy boyliklarning xaridi uchun xarajatlar (5.4.-shakl)
                                </td>
                                <td class="border">
                                    {{ $loyihaiqtisodi->xarid_xaraja_r ?? null }}
                                </td>
                                <td class="border">
                                    {{ $loyihaiqtisodi->xarid_xaraja_a ?? null }}
                                </td>
                                <td class="border">
                                    {{ number_format(preg_replace('/\D/', '', $loyihaiqtisodi->xarid_xaraja_r ?? 0) - preg_replace('/\D/', '', $loyihaiqtisodi->xarid_xaraja_a ?? 0)) }}
                                </td>
                                <td class="border">{{ $loyihaiqtisodi->xarid_xaraja_i ?? null }}</td>
                            </tr>
                            <tr>
                                <td class="border">4.4.</td>
                                <td class="border" style="text-size:14px;">
                                    Ilmiy-tadqiqot uchun materiallar va butlovchi qismlarni sotib olish xarajatlari
                                    (5.5.-shakl)
                                </td>
                                <td class="border">
                                    {{ $loyihaiqtisodi->mat_butlovchi_r ?? null }}
                                </td>
                                <td class="border">
                                    {{ $loyihaiqtisodi->mat_butlovchi_a ?? null }}
                                </td>
                                <td class="border">
                                    {{ number_format(preg_replace('/\D/', '', $loyihaiqtisodi->mat_butlovchi_r ?? 0) - preg_replace('/\D/', '', $loyihaiqtisodi->mat_butlovchi_a?? 0)) }}
                                </td>
                                <td class="border">{{ $loyihaiqtisodi->mat_butlovchi_i ?? null }}</td>
                            </tr>
                            <tr>
                                <td class="border">4.5.</td>
                                <td class="border" style="text-size:14px;">
                                    Loyihani amalga oshirishga jalb etilgan boshqa tashkilotlarning tadqiqot ishlari
                                    uchun
                                    toʻlov (5.6.-shakl)
                                </td>
                                <td class="border">
                                    {{ $loyihaiqtisodi->jalb_etilgan_r ?? null }}
                                </td>
                                <td class="border">
                                    {{ $loyihaiqtisodi->jalb_etilgan_a ?? null }}
                                </td>
                                <td class="border">
                                    {{ number_format(preg_replace('/\D/', '', $loyihaiqtisodi->jalb_etilgan_r ?? 0) - preg_replace('/\D/', '', $loyihaiqtisodi->jalb_etilgan_a ?? 0)) }}
                                </td>
                                <td class="border">{{ $loyihaiqtisodi->jalb_etilgan_i ?? null }}</td>
                            </tr>
                            <tr>
                                <td class="border">4.6.</td>
                                <td class="border" style="text-size:14px;">
                                    Loyihani amalga oshirish uchun boshqa xarajatlar (5.7.-shakl)
                                </td>
                                <td class="border">
                                    {{ $loyihaiqtisodi->boshqa_xarajat_r ?? null }}
                                </td>
                                <td class="border">
                                    {{ $loyihaiqtisodi->boshqa_xarajat_a ?? null }}
                                </td>
                                <td class="border">
                                    {{ number_format(preg_replace('/\D/', '', $loyihaiqtisodi->boshqa_xarajat_r ?? 0) - preg_replace('/\D/', '', $loyihaiqtisodi->boshqa_xarajat_a ?? 0)) }}
                                </td>
                                <td class="border">{{ $loyihaiqtisodi->boshqa_xarajat_i ?? null }}</td>
                            </tr>
                            <tr>
                                <td class="border">4.7.</td>
                                <td class="border" style="text-size:14px;">
                                    Tashkilotning ustama xarajatlari (ushbu xarajat turi byudjetdan toʻgʻridan-toʻgʻri
                                    va
                                    bazaviy moliyalashtiriladigan ilmiy tashkilotlar tomonidan rejalashtirilmaydi)
                                </td>
                                <td class="border">
                                    {{ $loyihaiqtisodi->tashustama_xarajat_r ?? null }}
                                </td>
                                <td class="border">
                                    {{ $loyihaiqtisodi->tashustama_xarajat_a ?? null }}
                                </td>
                                <td class="border">
                                    {{ number_format(preg_replace('/\D/', '', $loyihaiqtisodi->tashustama_xarajat_r ?? 0) - preg_replace('/\D/', '', $loyihaiqtisodi->tashustama_xarajat_a ?? 0)) }}
                                </td>
                                <td class="border">{{ $loyihaiqtisodi->tashustama_xarajat_i ?? null }}</td>
                            </tr>
                            <tr>
                                <td class="border">4.8.</td>
                                <td class="border" style="text-size:14px;">
                                    Xarid qilingan asbob-uskunalar va boshqa asosiy vositalar xaridining shartnomalari
                                    mavjudligi, dalolatnomasining rasmiylashtirilganligi
                                </td>
                                <td class="border" colspan="3">
                                    {{ $loyihaiqtisodi->xarid_qilingan_xarid ?? null }}
                                </td>
                                <td rowspan="4" class="border">{{ $loyihaiqtisodi->xarid_qilingan_i ?? null }}
                                </td>
                            </tr>
                            <tr>
                                <td class="border">4.8.1.</td>
                                <td class="border" style="text-size:14px;">
                                    Xarid shartnomasining raqami va sanasi
                                </td>
                                <td class="border">
                                    {{ $loyihaiqtisodi->xarid_s ?? null }}
                                </td>
                                <td class="border" colspan="2">
                                    {{ $loyihaiqtisodi->xarid_r ?? null }}
                                </td>
                            </tr>
                            <tr>
                                <td class="border">4.8.2.</td>
                                <td class="border" style="text-size:14px;">
                                    Sotuvchi kompaniyaning nomi
                                </td>
                                <td class="border" colspan="3">
                                    {{ $loyihaiqtisodi->xarid_sh ?? null }}
                                </td>
                            </tr>
                            <tr>
                                <td class="border">4.8.3.</td>
                                <td class="border" style="text-size:14px;">
                                    Yetkazib beruvchi yuridik shaxsning nomi
                                </td>
                                <td class="border" colspan="3">
                                    {{ $loyihaiqtisodi->yetkb_yuridik_nomi ?? null }}
                                </td>
                            </tr>
                            <tr>
                                <td class="border">4.9.</td>
                                <td class="border" style="text-size:14px;">
                                    <b>Mablag‘ning o‘zlashtirilishi, so‘m</b>
                                </td>

                                <td class="border">
                                    {{ $ilmiyloyiha->sum ?? null }}
                                </td>
                                <td class="border">
                                {{ $loyihaiqtisodi->uzlashtirilishi_summasi ?? null }}
                                </td>
                                <td class="border">
                                    {{ number_format(preg_replace('/\D/', '',$ilmiyloyiha->sum  ?? 0) - preg_replace('/\D/', '', $loyihaiqtisodi->uzlashtirilishi_summasi  ?? 0)) }}
                                </td>
                                <td class="border">{{ $loyihaiqtisodi->uzlashtirilishi_sum_i ?? null }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

            <div class="tab-content__pane" id="add-expert">

                <div class="p-5">
                    @if ($tekshirivchilar != null)
                        <table class="table table-bordered">
                            @role(['Ilmiy loyihalar boyicha masul', 'Ekspert', 'Ishchi guruh azosi'])
                            <div
                                style="display: flex;justify-content:center; border-bottom: 1px solid #e2e8f0; padding-bottom: 20px;">
                                <div style="text-align: center;display: flex;">
                                    @role(['Ekspert'])
                                    @if ($tekshirivchilar->holati == 'yuborildi')
                                    <a href="{{ url('generate-pdf/' . $ilmiyloyiha->id) }}"
                                        class="button delete-cancel  border text-gray-700 mr-1" style="margin-right:20px;">
                                        Eksport
                                    </a>
                                        <form action="{{ route('tekshirivchilar.update', $tekshirivchilar->id) }}" method="POST"
                                            onsubmit="return confirm('Haqiqatan ham rad etasizmi?');">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="holati" value="0">
                                            <button type="submit" class="button w-24 bg-theme-6 text-white">Rad etish</button>
                                        </form>
                                    @endif
                                    @endrole
                                    @role(['Ishchi guruh azosi'])
                                    @if ($tekshirivchilar->holati == 'Rad etildi')
                                    <a href="javascript:;" data-target="#doktarantura-paper-create-modal"
                                        data-toggle="modal" class="button w-24 ml-3 bg-theme-1 text-white"
                                        style="margin-right:20px;">
                                        Tahrirlash
                                    </a>

                                    <form action="{{ route('tekshirivchilar.destroy', $tekshirivchilar->id) }}"
                                        method="POST" onsubmit="return confirm('Haqiqatan ham o‘chirmoqchimisiz?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="button w-24 bg-theme-6 text-white">O'chirish</button>
                                    </form>
                                    @endif
                                    @endrole
                                </div>

                            </div>
                            @endrole
                            <tbody>
                                <tr>
                                    <th class="border" style="width: 40px;">T/r</th>
                                    <th colspan="2" class="border" style="text-align: center;">EKSPERT XULOSASI
                                    </th>
                                </tr>
                                <tr>
                                    <td class="border">1.</td>
                                    <td class="border">Ilmiy-tadqiqot ishlarining shartnoma va uning kalendar rejasiga
                                        asosan bajarilish holati</td>
                                    <td class="border">{{ $tekshirivchilar->kalendar  }}</td>
                                </tr>
                                <tr>
                                    <td class="border">2.</td>
                                    <td class="border">Ijrochi tashkilot tomonidan loyihaning amalga oshirilishi uchun zarur
                                        shart-sharoitlar yaratib berilganligi</td>
                                    <td class="border">{{ $tekshirivchilar->shart_sharoit_yaratib  }}</td>
                                </tr>
                                <tr>
                                    <td class="border">3.</td>
                                    <td class="border">Loyiha doirasida qo‘lga kiritilgan yakuniy natijalar va ularni
                                        tijoratlashtirish imkoniyatlari</td>
                                    <td class="border">{{ $tekshirivchilar->yakuniy_natijalar  }}</td>
                                </tr>
                                <tr>
                                    <td class="border">4.</td>
                                    <td class="border">Loyiha ijrochilarining o‘zgarishi holati</td>
                                    <td class="border">{{ $tekshirivchilar->loyiha_ijrochilari  }}</td>
                                </tr>
                                <tr>
                                    <td class="border">5.</td>
                                    <td class="border">Monitoring xulosasi</td>
                                    <td class="border">{{ $tekshirivchilar->status }}</td>
                                </tr>
                                <tr>
                                    <td class="border">6.</td>
                                    <td class="border">Izoh</td>
                                    <td class="border">{{ $tekshirivchilar->comment }}</td>
                                </tr>
                                <tr>
                                    <td class="border">7.</td>
                                    <td class="border">Ishchi guruh rahbari F.I.Sh</td>
                                    <td class="border">{{ $tekshirivchilar->fish }}</td>
                                </tr>
                                <tr>
                                    <td class="border border-b-2 ">8.</td>
                                    <td class="border border-b-2 ">
                                        Ishchi guruh azosi F.I.Sh
                                    </td>
                                    <td class="border border-b-2 ">
                                        {{ $tekshirivchilar->user->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="border">9.</td>
                                    <td class="border">Ekspert F.I.Sh</td>
                                    <td class="border">{{ $tekshirivchilar->ekspert_fish }}</td>
                                </tr>
                                <tr>
                                    <td class="border">9.</td>
                                    <td class="border">Tashkilotning mas'ul rahbari  F.I.Sh</td>
                                    <td class="border">{{ $tekshirivchilar->t_masul }}</td>
                                </tr>
                                <tr>
                                    <td class="border">10.</td>
                                    <td class="border">Monitoring o‘tkazilgan sana</td>
                                    <td class="border">{{ $tekshirivchilar->updated_at }}</td>
                                </tr>
                                <tr>
                                    <td class="border">11.</td>
                                    <td class="border">Fayl</td>
                                    <td class="border">
                                        @if ($tekshirivchilar->file)
                                            <a href="{{ asset('storage/' . $tekshirivchilar->file) }}"
                                                class="button  bg-theme-1 text-white" target="_blank">Faylni ko'rish</a>
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    @else
                        @role(['Ishchi guruh azosi'])
                        <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2"
                            style="background: white; padding: 20px 20px; border-radius: 4px">
                            <div class="w-full mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                                <form id="science-paper-edit-form" method="POST"
                                    action="{{ route('tekshirivchilar.store') }}" class="validate-form"
                                    enctype="multipart/form-data" novalidate="novalidate">
                                    @csrf
                                    <div class="grid grid-cols-12 gap-2">
                                        <input type="hidden" name="ilmiyloyiha_id" value="{{ $ilmiyloyiha->id }}">

                                        <div class="w-full col-span-6">
                                            <label class="flex flex-col sm:flex-row"> <span
                                                    class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Ilmiy-tadqiqot
                                                ishlarining shartnoma va uning kalendar rejasiga asosan bajarilish holati
                                            </label>
                                            <select name="kalendar" class="input border w-full mt-2" required="">

                                                <option value=""></option>

                                                <option value="Bajarilgan ">Bajarilgan </option>

                                                <option value="Bajarilmagan">Bajarilmagan</option>


                                            </select><br>

                                            @error('muddat')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="w-full col-span-6">
                                            <label class="flex flex-col sm:flex-row"> <span
                                                    class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Ijrochi
                                                tashkilot tomonidan loyihaning amalga oshirilishi uchun zarur
                                                shart-sharoitlar yaratib berilganligi
                                            </label>
                                            <select name="shart_sharoit_yaratib" class="input border w-full mt-2"
                                                required="">

                                                <option value=""></option>

                                                <option value="Yaratilgan">Yaratilgan</option>

                                                <option value="Yaratilmagan">Yaratilmagan</option>


                                            </select><br>

                                            @error('muddat')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="w-full col-span-6">
                                            <label class="flex flex-col sm:flex-row"> <span
                                                    class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Loyiha doirasida
                                                qo‘lga kiritilgan yakuniy natijalar va ularni tijoratlashtirish
                                                imkoniyatlari
                                            </label>
                                            <select name="yakuniy_natijalar" class="input border w-full mt-2" required="">

                                                <option value=""></option>

                                                <option value="Imkoniyat mavjud">Imkoniyat mavjud</option>

                                                <option value="Imkoniyat mavjud emas">Imkoniyat mavjud emas</option>


                                            </select><br>

                                            @error('muddat')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="w-full col-span-6">
                                            <label class="flex flex-col sm:flex-row"> <span
                                                    class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Loyiha
                                                ijrochilarining o‘zgarishi holati
                                            </label>
                                            <select name="loyiha_ijrochilari" class="input border w-full mt-2" required="">

                                                <option value=""></option>

                                                <option value="Mavjud emas">Mavjud emas</option>

                                                <option value="O‘zgarish mavjud">O‘zgarish mavjud</option>


                                            </select><br>

                                            @error('muddat')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="w-full col-span-6 ">
                                            <label class="flex flex-col sm:flex-row"> <span
                                                    class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Ekspert
                                                F.I.Sh</label>
                                            <input type="text" name="ekspert_fish" class="input w-full border mt-2"
                                                required>
                                        </div>

                                        <div class="w-full col-span-6 ">
                                            <label class="flex flex-col sm:flex-row"> <span
                                                    class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Tashkilotning
                                                mas'ul rahbarining F.I.Sh </label>
                                            <input type="text" name="t_masul" class="input w-full border mt-2" required>
                                        </div>

                                        <div class="w-full col-span-6">
                                            <label class="flex flex-col sm:flex-row"> <span
                                                    class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Status
                                            </label>
                                            <select name="status" class="input border w-full mt-2" required="">

                                                <option value=""></option>

                                                <option value="Qo‘shimcha o‘rganish talab etiladi">Qo‘shimcha o‘rganish talab etiladi</option>

                                                <option value="Qoniqarli">Qoniqarli</option>

                                                <option value="Qoniqarsiz">Qoniqarsiz</option>


                                            </select><br>

                                            @error('muddat')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="w-full col-span-6 ">
                                            <label class="flex flex-col sm:flex-row"> <span
                                                    class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>
                                                Izoh</label>
                                            <textarea name="comment" id="" class="input w-full border mt-2" cols="5" required
                                                rows="5"></textarea>
                                        </div>
                                    </div>

                                </form>
                                <div class="px-5 pb-5 text-center mt-4">
                                    <a href="{{ route('ilmiyloyiha.index') }}"
                                        class="button delete-cancel w-32 border text-gray-700 mr-1">
                                        Bekor qilish
                                    </a>
                                    <button type="submit" form="science-paper-edit-form"
                                        class="update-confirm button w-24 bg-theme-1 text-white">
                                        Tasdiqlash
                                    </button>
                                </div>
                            </div>
                        </div>
                        @endrole
                    @endif

                </div>

            </div>

            <div class="tab-content__pane {{ $data || $create || $errorMessage ? 'active' : '' }}" id="add-ijrochilari">

                <div class="px-5">
                    <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center"
                        style="background: white; border-radius: 20px">
                        <div class="w-full sm:mt-0 sm:ml-auto md:ml-0">
                            <form id="science-qidirish-edit-form" method="GET"
                                action="{{ route('ilmiyloyiha.show', $ilmiyloyiha->id) }}" class="validate-form"
                                enctype="multipart/form-data" novalidate="novalidate">
                                <div class="grid grid-cols-12 gap-2">
                                    <div class="w-full col-span-6">
                                        <label class="flex flex-col sm:flex-row"> <span
                                                class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Science ID
                                            (BQD-1124-0011)
                                        </label>
                                        <input type="text" name="scienceid" value="{{ $scienceid }}"
                                            placeholder="Science ID ..." class="input w-full border mt-2">
                                            <a href="https://id.ilmiy.uz/" target="_black">id.ilmiy.uz</a>
                                    </div>


                                    <div class="grid grid-cols-6 gap-2 mt-8">
                                        <div class="px-5 pb-5 text-center mt-4">
                                            <button type="submit" form="science-qidirish-edit-form"
                                                class="update-confirm button w-24 bg-theme-1 text-white">
                                                Qidirish
                                            </button>
                                        </div>
                                    </div>
                                    <div class="w-full col-span-12">
                                        @if ($errorMessage)
                                            <div class="alert alert-danger">
                                                {{ $errorMessage }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                    @if ($data != null)
                        <div class="overflow-x-auto" style="background-color: white;border-radius:8px;padding:30px 0px;">
                            <form id="loyihaijrochilar-paper-create-form" method="POST"
                                action="{{ route('loyihaijrochilar.store') }}" class="validate-form"
                                enctype="multipart/form-data" novalidate="novalidate">
                                @csrf
                                <table class="table">

                                    <thead>
                                        <tr class="bg-gray-200">
                                            <th class="border border-b-2 " style="width: 40px;">№</th>
                                            <th class="border border-b-2 " style="width: 50%;">Nomi</th>
                                            <th class="border border-b-2 ">Ma'lumoti</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="border border-b-2 ">1.</td>
                                            <td class="border border-b-2 ">
                                                F.I.Sh.
                                            </td>
                                            <td class="border border-b-2 ">
                                                <input type="text" name="fio"
                                                    value="{{ $data['full_name'] ?? "ma'lumot topilamdi Science qaytadan kiritib ko'ring" }}"
                                                    readonly class="input w-full border mt-2">
                                                <input type="hidden" name="ilmiy_loyiha_id" readonly
                                                    value="{{ $ilmiyloyiha->id }}">
                                                <input type="hidden" name="jshshir" readonly
                                                    value="{{ $data['pin'] ?? "ma'lumot topilamdi Science qaytadan kiritib ko'ring " }}">
                                            </td>
                                        </tr>
                                        <tr class="bg-gray-200">
                                            <td class="border border-b-2 ">2.</td>
                                            <td class="border border-b-2 ">
                                                Science ID.
                                            </td>
                                            <td class="border border-b-2 ">
                                                <input type="text" name="science_id"
                                                    value="{{ $data['science_id'] ?? "ma'lumot topilamdi Science qaytadan kiritib ko'ring" }}"
                                                    readonly class="input w-full border mt-2">
                                                @error('science_id')
                                                    <div class="error">{{ $message }}</div>
                                                @enderror
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="border border-b-2 ">3.</td>
                                            <td class="border border-b-2 ">
                                                Shtat birligi.
                                            </td>
                                            <td class="border border-b-2 ">
                                                <select name="shtat_birligi" id="shtat_birligi" value="{{ old('shtat_birligi') }}"
                                                    class="input border w-full mt-2" required>

                                                    <option value=""></option>

                                                    <option value="0.25">0.25</option>

                                                    <option value="0.5">0.5</option>

                                                    <option value="0.75">0.75</option>

                                                    <option value="1">1</option>

                                                    <option value="1.25">1.25</option>

                                                    <option value="1.5">1.5</option>

                                                    <option value="boshqa">Boshqa</option>

                                                </select>
                                                <div id="boshqa_input_div" style="display: none;" class="mt-2">
                                                    <input
                                                        type="text"
                                                        name="boshqa_shtat_birligi"
                                                        class="input border w-full"
                                                        placeholder="Shtat birligini kiriting"
                                                        inputmode="decimal"
                                                        pattern="^\d+(\.\d{1,2})?$"
                                                        oninput="validateInput(this)"
                                                    >
                                                </div>

                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </form>
                            <div class="px-5 pb-5 text-center mt-4">
                                <button type="button" data-dismiss="modal"
                                    class="button delete-cancel w-32 border text-gray-700 mr-1">
                                    Bekor qilish
                                </button>
                                <button type="submit" form="loyihaijrochilar-paper-create-form"
                                    class="update-confirm button w-24 bg-theme-1 text-white">
                                    Tasdiqlash
                                </button>
                            </div>
                        </div>
                    @endif

                    <div class="overflow-x-auto" style="background-color: white;border-radius:8px;padding:30px 0px;">
                        <table class="table">

                            <thead>
                                <tr class="bg-gray-200">
                                    <th class="border border-b-2 " style="width: 40px;">№</th>
                                    <th class="border border-b-2 " style="width: 50%;">F.I.Sh</th>
                                    <th class="border border-b-2 ">Science ID</th>
                                    <th class="border border-b-2 ">Shtat birligi</th>
                                    <th class="border border-b-2 "></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($loyihaijrochilar as $l)
                                    <tr>
                                        <td class="border border-b-2 ">{{ $loop->iteration }}.</td>
                                        <td class="border border-b-2 ">
                                            {{ $l->fio }}
                                        </td>
                                        <td class="border border-b-2 ">
                                            {{ $l->science_id }}

                                        </td>
                                        <td class="border border-b-2 ">
                                            {{ $l->shtat_birligi }}
                                        </td>
                                        <td class="border border-b-2 ">
                                            <form
                                                action="{{ route('loyihaijrochilar.destroy', ['loyihaijrochilar' => $l->id]) }}"
                                                method="post" onsubmit="return confirm(' Rostan Ochirishni hohlaysizmi?');">
                                                <button type="submit" class="flex delete-action items-center text-theme-6">
                                                    @csrf
                                                    @method('DELETE')
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-trash-2 w-4 h-4 mr-1">
                                                        <polyline points="3 6 5 6 21 6"></polyline>
                                                        <path
                                                            d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                        </path>
                                                        <line x1="10" y1="11" x2="10" y2="17"></line>
                                                        <line x1="14" y1="11" x2="14" y2="17"></line>
                                                    </svg>
                                                    O'chirish
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr class="border">
                                        <td colspan="4" style="text-align: center;">Ma'lumot yo'q</td>
                                    </tr>
                                @endforelse

                            </tbody>
                        </table>
                    </div>

                </div>

            </div>

        </div>

    </div>
</div>

</div>

<div class="modal" id="science-paper-create-modal">
    <div class="modal__content modal__content--xl">
        <div class="p-5">

            <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2">
                <div class="w-full mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                    <form id="science-paper-create-form" method="POST" action="{{ route('loyihaiqtisodi.store') }}"
                        class="validate-form" enctype="multipart/form-data" novalidate="novalidate">
                        @csrf
                        <div class="grid grid-cols-12 gap-2">

                            <div class="w-full col-span-12">
                                <table class="table table-bordered">
                                    <tr>
                                        <th class="border" style="text-align: center;" colspan="3">LOYIHANING
                                            MUHIM
                                            NATIJALARI</th>
                                    </tr>
                                    <tr>
                                        <th class="border" style="width: 50%;">Koʻrsatkichlar</th>
                                        <th class="border" colspan="2"><span
                                                class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Bajarilishi
                                            holatining tahlili</th>
                                    </tr>
                                    <tr>
                                        <td class="border" style="text-size:16px;">
                                            Hisobot davrida qoʻlga kiritilgan muhim natijalar
                                        </td>
                                        <input type="hidden" name="ilmiy_loyiha_id" value="{{ $ilmiyloyiha->id }}">
                                        <td class="border" colspan="2">
                                            <textarea name="hisobot_davri" value="" cols="5" rows="3"
                                                class="input w-full border mt-2"
                                                required="">{{ old('hisobot_davri') }}</textarea>
                                            @error('hisobot_davri')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border" style="text-size:16px;">
                                            Loyihaning bajarilishi davrida yaratilgan ishlanma (texnologiya) nomi va
                                            qisqacha
                                            tavsifi
                                        </td>
                                        <td class="border" colspan="2">
                                            <textarea name="loyihabaj_ishlanma" cols="5" rows="3"
                                                class="input w-full border mt-2"
                                                required="">{{ old('loyihabaj_ishlanma') }}</textarea>
                                            @error('loyihabaj_ishlanma')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border" style="text-size:16px;">
                                            Ilmiy ishlanma joriy etiladigan (tijoratlashtiriladigan) tarmoq (soha) va
                                            kutilayotgan
                                            natijalar (mavjud ehtiyoj, iqtisodiy samaradorlik tahlili)
                                        </td>
                                        <td class="border" colspan="2">
                                            <textarea name="ilmiy_ishlanmalar" cols="5" rows="3"
                                                class="input w-full border mt-2"
                                                required="">{{ old('ilmiy_ishlanmalar') }}</textarea>
                                            @error('ilmiy_ishlanmalar')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </td>
                                    </tr>

                                    <tr>
                                        <th class="border" style="text-align: center;" colspan="3">LOYIHANING
                                            MOLIYAVIY
                                            VA IQTISODIY
                                            KOʻRSATKICHLARI
                                            (AJRATILGAN MABLAGʻLARNING MAQSADLI ISHLATILISHI)
                                        </th>
                                    </tr>
                                    <tr>
                                        <th class="border" style="width: 50%;">Koʻrsatkichlar</th>
                                        <th class="border"><span
                                                class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Rejada</th>
                                        <th class="border"><span
                                                class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Amalda</th>
                                    </tr>
                                    <tr>
                                        <td class="border" style="text-size:16px;">
                                            Mehnatga haq toʻlash (5.1.-shakl)
                                        </td>
                                        <td class="border">
                                            <input type="text" id="sumInput1" oninput="formatNumber(this)"
                                                name="mehnat_haq_r" value="{{ old('mehnat_haq_r') }}"
                                                class="input w-full border mt-2" required="">
                                            @error('mehnat_haq_r')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </td>
                                        <td class="border">
                                            <input type="text" id="sumInput1" oninput="formatNumber(this)"
                                                name="mehnat_haq_a" value="{{ old('mehnat_haq_a') }}"
                                                class="input w-full border mt-2" required="">
                                            @error('mehnat_haq_a')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border" style="text-size:16px;">
                                            Xizmat safarlari xarajatlari (5.2.-shakl)
                                        </td>
                                        <td class="border">
                                            <input type="text" id="sumInput1" oninput="formatNumber(this)"
                                                name="xizmat_saf_r" value="{{ old('xizmat_saf_r') }}"
                                                class="input w-full border mt-2" required="">
                                            @error('xizmat_saf_r')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </td>
                                        <td class="border">
                                            <input type="text" id="sumInput1" oninput="formatNumber(this)"
                                                name="xizmat_saf_a" value="{{ old('xizmat_saf_a') }}"
                                                class="input w-full border mt-2" required="">
                                            @error('xizmat_saf_a')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border" style="text-size:16px;">
                                            Ilmiy-tadqiqot uchun zarur boʻlgan asbob-uskunalar, texnik vositalar va
                                            boshqa
                                            tovar-moddiy boyliklarning xaridi uchun xarajatlar (5.4.-shakl)
                                        </td>
                                        <td class="border">
                                            <input type="text" id="sumInput1" oninput="formatNumber(this)"
                                                name="xarid_xaraja_r" value="{{ old('xarid_xaraja_r') }}"
                                                class="input w-full border mt-2" required="">
                                            @error('xarid_xaraja_r')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </td>
                                        <td class="border">
                                            <input type="text" id="sumInput1" oninput="formatNumber(this)"
                                                name="xarid_xaraja_a" value="{{ old('xarid_xaraja_a') }}"
                                                class="input w-full border mt-2" required="">
                                            @error('xarid_xaraja_a')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border" style="text-size:16px;">
                                            Ilmiy-tadqiqot uchun materiallar va butlovchi qismlarni sotib olish
                                            xarajatlari
                                            (5.5.-shakl)
                                        </td>
                                        <td class="border">
                                            <input type="text" id="sumInput1" oninput="formatNumber(this)"
                                                name="mat_butlovchi_r" value="{{ old('mat_butlovchi_r') }}"
                                                class="input w-full border mt-2" required="">
                                            @error('mat_butlovchi_r')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </td>
                                        <td class="border">
                                            <input type="text" id="sumInput1" oninput="formatNumber(this)"
                                                name="mat_butlovchi_a" value="{{ old('mat_butlovchi_a') }}"
                                                class="input w-full border mt-2" required="">
                                            @error('mat_butlovchi_a')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border" style="text-size:16px;">
                                            Loyihani amalga oshirishga jalb etilgan boshqa tashkilotlarning tadqiqot
                                            ishlari uchun
                                            toʻlov (5.6.-shakl)
                                        </td>
                                        <td class="border">
                                            <input type="text" id="sumInput1" oninput="formatNumber(this)"
                                                name="jalb_etilgan_r" value="{{ old('jalb_etilgan_r') }}"
                                                class="input w-full border mt-2" required="">
                                            @error('jalb_etilgan_r')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </td>
                                        <td class="border">
                                            <input type="text" id="sumInput1" oninput="formatNumber(this)"
                                                name="jalb_etilgan_a" value="{{ old('jalb_etilgan_a') }}"
                                                class="input w-full border mt-2" required="">
                                            @error('jalb_etilgan_a')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border" style="text-size:16px;">
                                            Loyihani amalga oshirish uchun boshqa xarajatlar (5.7.-shakl)
                                        </td>
                                        <td class="border">
                                            <input type="text" id="sumInput1" oninput="formatNumber(this)"
                                                name="boshqa_xarajat_r" value="{{ old('boshqa_xarajat_r') }}"
                                                class="input w-full border mt-2" required="">
                                            @error('boshqa_xarajat_r')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </td>
                                        <td class="border">
                                            <input type="text" id="sumInput1" oninput="formatNumber(this)"
                                                name="boshqa_xarajat_a" value="{{ old('boshqa_xarajat_a') }}"
                                                class="input w-full border mt-2" required="">
                                            @error('boshqa_xarajat_a')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border" style="text-size:16px;">
                                            Tashkilotning ustama xarajatlari (ushbu xarajat turi byudjetdan
                                            toʻgʻridan-toʻgʻri va
                                            bazaviy moliyalashtiriladigan ilmiy tashkilotlar tomonidan
                                            rejalashtirilmaydi)
                                        </td>
                                        <td class="border">
                                            <input type="text" id="sumInput1" oninput="formatNumber(this)"
                                                name="tashustama_xarajat_r" value="{{ old('tashustama_xarajat_r') }}"
                                                class="input w-full border mt-2" required="tashustama_xarajat_r">
                                            @error('fish')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </td>
                                        <td class="border">
                                            <input type="text" id="sumInput1" oninput="formatNumber(this)"
                                                name="tashustama_xarajat_a" value="{{ old('tashustama_xarajat_a') }}"
                                                class="input w-full border mt-2" required="tashustama_xarajat_a">
                                            @error('fish')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border" style="text-size:16px;">
                                            Xarid qilingan asbob-uskunalar va boshqa asosiy vositalar xaridining
                                            shartnomalari
                                            mavjudligi, dalolatnomasining rasmiylashtirilganligi
                                        </td>
                                        <td class="border">
                                            <div class="flex items-center text-gray-700 mr-2">
                                                <input type="radio" class="input border mr-2"
                                                    id="horizontal-radio-chris-evans" name="xarid_qilingan_xarid"
                                                    value="ha">
                                                <label class="cursor-pointer select-none"
                                                    for="horizontal-radio-chris-evans">Ha</label>
                                            </div>
                                        </td>
                                        <td class="border">
                                            <div class="flex items-center text-gray-700 mr-2 mt-2 sm:mt-0">
                                                <input type="radio" class="input border mr-2"
                                                    name="xarid_qilingan_xarid" id="horizontal-radio-liam-neeson"
                                                    value="yo'q">
                                                <label class="cursor-pointer select-none"
                                                    for="horizontal-radio-liam-neeson">Yo'q</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border" style="text-size:16px;">
                                            Xarid shartnomasining raqami va sanasi
                                        </td>
                                        <td class="border">
                                            <input type="text" name="xarid_s" value="{{ old('xarid_s') }}"
                                                class="input w-full border mt-2" required="">
                                            @error('xarid_s')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </td>
                                        <td class="border">
                                            <input type="date" name="xarid_r" value="{{ old('xarid_r') }}"
                                                class="input w-full border mt-2" required="">
                                            @error('xarid_r')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border" style="text-size:16px;">
                                            Sotuvchi kompaniyaning nomi
                                        </td>
                                        <td class="border" colspan="2">
                                            <input type="text" name="xarid_sh" value="{{ old('xarid_sh') }}"
                                                class="input w-full border mt-2" required="">
                                            @error('xarid_sh')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border" style="text-size:16px;">
                                            Yetkazib beruvchi yuridik shaxsning nomi
                                        </td>
                                        <td class="border" colspan="2">
                                            <input type="text" name="yetkb_yuridik_nomi"
                                                value="{{ old('yetkb_yuridik_nomi') }}" class="input w-full border mt-2"
                                                required="">
                                            @error('yetkb_yuridik_nomi')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border" style="text-size:16px;">
                                            Mablag‘ning o‘zlashtirilishi, so‘m
                                        </td>
                                        <td class="border" colspan="2">
                                            <input type="text" name="uzlashtirilishi_summasi" id="sumInput1"
                                                oninput="formatNumber(this)"
                                                value="{{ old('uzlashtirilishi_summasi') }}"
                                                class="input w-full border mt-2" required="">
                                            @error('uzlashtirilishi_summasi')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
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
            <button type="submit" form="science-paper-create-form"
                class="update-confirm button w-24 bg-theme-1 text-white">
                Qo'shish
            </button>
        </div>
    </div>
</div>

<div class="modal" id="science-paper-edit-modal">
    <div class="modal__content modal__content--xl">
        <div class="p-5">

            <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2">
                <div class="w-full mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                    <form id="science-paper-edit-form-edit" method="POST"
                        action="{{ route('loyihaiqtisodi.update', $loyihaiqtisodi->id ?? 0) }}" class="validate-form"
                        enctype="multipart/form-data" novalidate="novalidate">
                        @csrf
                        @method('PUT')
                        <div class="grid grid-cols-12 gap-2">

                            <div class="w-full col-span-12">
                                <table class="table table-bordered">
                                    <tr>
                                        <th class="border" style="text-align: center;" colspan="3">LOYIHANING
                                            MUHIM
                                            NATIJALARI</th>
                                    </tr>
                                    <tr>
                                        <th class="border" style="width: 50%;">Koʻrsatkichlar</th>
                                        <th class="border" colspan="2"><span
                                                class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Bajarilishi
                                            holatining tahlili</th>
                                    </tr>
                                    <tr>
                                        <td class="border" style="text-size:16px;">
                                            Hisobot davrida qoʻlga kiritilgan muhim natijalar
                                        </td>
                                        <td class="border" colspan="2">
                                            <textarea name="hisobot_davri" value="" cols="5" rows="3"
                                                class="input w-full border mt-2"
                                                required="">{{ $loyihaiqtisodi->hisobot_davri ?? 'yoq' }}</textarea>
                                            @error('hisobot_davri')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border" style="text-size:16px;">
                                            Loyihaning bajarilishi davrida yaratilgan ishlanma (texnologiya) nomi va
                                            qisqacha
                                            tavsifi
                                        </td>
                                        <td class="border" colspan="2">
                                            <textarea name="loyihabaj_ishlanma" cols="5" rows="3"
                                                class="input w-full border mt-2"
                                                required="">{{ $loyihaiqtisodi->loyihabaj_ishlanma ?? 'yoq' }}</textarea>
                                            @error('loyihabaj_ishlanma')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border" style="text-size:16px;">
                                            Ilmiy ishlanma joriy etiladigan (tijoratlashtiriladigan) tarmoq (soha) va
                                            kutilayotgan
                                            natijalar (mavjud ehtiyoj, iqtisodiy samaradorlik tahlili)
                                        </td>
                                        <td class="border" colspan="2">
                                            <textarea name="ilmiy_ishlanmalar" cols="5" rows="3"
                                                class="input w-full border mt-2"
                                                required="">{{ $loyihaiqtisodi->ilmiy_ishlanmalar ?? 'yoq' }}</textarea>
                                            @error('ilmiy_ishlanmalar')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </td>
                                    </tr>

                                    <tr>
                                        <th class="border" style="text-align: center;" colspan="3">LOYIHANING
                                            MOLIYAVIY
                                            VA IQTISODIY
                                            KOʻRSATKICHLARI
                                            (AJRATILGAN MABLAGʻLARNING MAQSADLI ISHLATILISHI)
                                        </th>
                                    </tr>
                                    <tr>
                                        <th class="border" style="width: 50%;">Koʻrsatkichlar</th>
                                        <th class="border"><span
                                                class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Rejada</th>
                                        <th class="border"><span
                                                class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Amalda</th>
                                    </tr>
                                    <tr>
                                        <td class="border" style="text-size:16px;">
                                            Mehnatga haq toʻlash (5.1.-shakl)
                                        </td>
                                        <td class="border">
                                            <input type="text" id="sumInput1" oninput="formatNumber(this)"
                                                name="mehnat_haq_r" value="{{ $loyihaiqtisodi->mehnat_haq_r ?? 0 }}"
                                                class="input w-full border mt-2" required="">
                                            @error('mehnat_haq_r')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </td>
                                        <td class="border">
                                            <input type="text" id="sumInput1" oninput="formatNumber(this)"
                                                name="mehnat_haq_a" value="{{ $loyihaiqtisodi->mehnat_haq_a ?? 0 }}"
                                                class="input w-full border mt-2" required="">
                                            @error('mehnat_haq_a')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border" style="text-size:16px;">
                                            Xizmat safarlari xarajatlari (5.2.-shakl)
                                        </td>
                                        <td class="border">
                                            <input type="text" id="sumInput1" oninput="formatNumber(this)"
                                                name="xizmat_saf_r" value="{{ $loyihaiqtisodi->xizmat_saf_r ?? 0 }}"
                                                class="input w-full border mt-2" required="">
                                            @error('xizmat_saf_r')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </td>
                                        <td class="border">
                                            <input type="text" id="sumInput1" oninput="formatNumber(this)"
                                                name="xizmat_saf_a" value="{{ $loyihaiqtisodi->xizmat_saf_a ?? 0 }}"
                                                class="input w-full border mt-2" required="">
                                            @error('xizmat_saf_a')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border" style="text-size:16px;">
                                            Ilmiy-tadqiqot uchun zarur boʻlgan asbob-uskunalar, texnik vositalar va
                                            boshqa
                                            tovar-moddiy boyliklarning xaridi uchun xarajatlar (5.4.-shakl)
                                        </td>
                                        <td class="border">
                                            <input type="text" id="sumInput1" oninput="formatNumber(this)"
                                                name="xarid_xaraja_r" value="{{ $loyihaiqtisodi->xarid_xaraja_r ?? 0 }}"
                                                class="input w-full border mt-2" required="">
                                            @error('xarid_xaraja_r')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </td>
                                        <td class="border">
                                            <input type="text" id="sumInput1" oninput="formatNumber(this)"
                                                name="xarid_xaraja_a" value="{{ $loyihaiqtisodi->xarid_xaraja_a ?? 0 }}"
                                                class="input w-full border mt-2" required="">
                                            @error('xarid_xaraja_a')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border" style="text-size:16px;">
                                            Ilmiy-tadqiqot uchun materiallar va butlovchi qismlarni sotib olish
                                            xarajatlari
                                            (5.5.-shakl)
                                        </td>
                                        <td class="border">
                                            <input type="text" id="sumInput1" oninput="formatNumber(this)"
                                                name="mat_butlovchi_r"
                                                value="{{ $loyihaiqtisodi->mat_butlovchi_r ?? 0 }}"
                                                class="input w-full border mt-2" required="">
                                            @error('mat_butlovchi_r')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </td>
                                        <td class="border">
                                            <input type="text" id="sumInput1" oninput="formatNumber(this)"
                                                name="mat_butlovchi_a"
                                                value="{{ $loyihaiqtisodi->mat_butlovchi_a ?? 0 }}"
                                                class="input w-full border mt-2" required="">
                                            @error('mat_butlovchi_a')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border" style="text-size:16px;">
                                            Loyihani amalga oshirishga jalb etilgan boshqa tashkilotlarning tadqiqot
                                            ishlari uchun
                                            toʻlov (5.6.-shakl)
                                        </td>
                                        <td class="border">
                                            <input type="text" id="sumInput1" oninput="formatNumber(this)"
                                                name="jalb_etilgan_r" value="{{ $loyihaiqtisodi->jalb_etilgan_r ?? 0 }}"
                                                class="input w-full border mt-2" required="">
                                            @error('jalb_etilgan_r')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </td>
                                        <td class="border">
                                            <input type="text" id="sumInput1" oninput="formatNumber(this)"
                                                name="jalb_etilgan_a" value="{{ $loyihaiqtisodi->jalb_etilgan_a ?? 0 }}"
                                                class="input w-full border mt-2" required="">
                                            @error('jalb_etilgan_a')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border" style="text-size:16px;">
                                            Loyihani amalga oshirish uchun boshqa xarajatlar (5.7.-shakl)
                                        </td>
                                        <td class="border">
                                            <input type="text" id="sumInput1" oninput="formatNumber(this)"
                                                name="boshqa_xarajat_r"
                                                value="{{ $loyihaiqtisodi->boshqa_xarajat_r ?? 0 }}"
                                                class="input w-full border mt-2" required="">
                                            @error('boshqa_xarajat_r')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </td>
                                        <td class="border">
                                            <input type="text" id="sumInput1" oninput="formatNumber(this)"
                                                name="boshqa_xarajat_a"
                                                value="{{ $loyihaiqtisodi->boshqa_xarajat_a ?? 0 }}"
                                                class="input w-full border mt-2" required="">
                                            @error('boshqa_xarajat_a')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border" style="text-size:16px;">
                                            Tashkilotning ustama xarajatlari (ushbu xarajat turi byudjetdan
                                            toʻgʻridan-toʻgʻri va
                                            bazaviy moliyalashtiriladigan ilmiy tashkilotlar tomonidan
                                            rejalashtirilmaydi)
                                        </td>
                                        <td class="border">
                                            <input type="text" id="sumInput1" oninput="formatNumber(this)"
                                                name="tashustama_xarajat_r"
                                                value="{{ $loyihaiqtisodi->tashustama_xarajat_r ?? 0 }}"
                                                class="input w-full border mt-2" required="tashustama_xarajat_r">
                                            @error('fish')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </td>
                                        <td class="border">
                                            <input type="text" id="sumInput1" oninput="formatNumber(this)"
                                                name="tashustama_xarajat_a"
                                                value="{{ $loyihaiqtisodi->tashustama_xarajat_a ?? 0 }}"
                                                class="input w-full border mt-2" required="tashustama_xarajat_a">
                                            @error('fish')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border" style="text-size:16px;">
                                            Xarid qilingan asbob-uskunalar va boshqa asosiy vositalar xaridining
                                            shartnomalari
                                            mavjudligi, dalolatnomasining rasmiylashtirilganligi
                                        </td>
                                        <td class="border">
                                            <div class="flex items-center text-gray-700 mr-2">
                                                <input type="radio" class="input border mr-2"
                                                    id="horizontal-radio-chris-evans-edit" name="xarid_qilingan_xarid"
                                                    value="ha" @if (old('xarid_qilingan_xarid', $loyihaiqtisodi->xarid_qilingan_xarid ?? 0) == 'ha') checked @endif>
                                                <label class="cursor-pointer select-none"
                                                    for="horizontal-radio-chris-evans-edit">Ha</label>
                                            </div>
                                        </td>
                                        <td class="border">
                                            <div class="flex items-center text-gray-700 mr-2 mt-2 sm:mt-0">
                                                <input type="radio" class="input border mr-2"
                                                    id="horizontal-radio-liam-neeson-edit" name="xarid_qilingan_xarid"
                                                    value="yo'q" @if (old('xarid_qilingan_xarid', $loyihaiqtisodi->xarid_qilingan_xarid ?? 0) == "yo'q") checked @endif>
                                                <label class="cursor-pointer select-none"
                                                    for="horizontal-radio-liam-neeson-edit">Yo'q</label>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td class="border" style="text-size:16px;">
                                            Xarid shartnomasining raqami va sanasi
                                        </td>
                                        <td class="border">
                                            <input type="text" name="xarid_s"
                                                value="{{ $loyihaiqtisodi->xarid_s ?? '' }}"
                                                class="input w-full border mt-2" required="">
                                            @error('xarid_s')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </td>
                                        <td class="border">
                                            <input type="date" name="xarid_r"
                                                value="{{ $loyihaiqtisodi->xarid_r ?? '' }}"
                                                class="input w-full border mt-2" required="">
                                            @error('xarid_r')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border" style="text-size:16px;">
                                            Sotuvchi kompaniyaning nomi
                                        </td>
                                        <td class="border" colspan="2">
                                            <input type="text" name="xarid_sh"
                                                value="{{ $loyihaiqtisodi->xarid_sh ?? '' }}"
                                                class="input w-full border mt-2" required="">
                                            @error('xarid_sh')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border" style="text-size:16px;">
                                            Yetkazib beruvchi yuridik shaxsning nomi
                                        </td>
                                        <td class="border" colspan="2">
                                            <input type="text" name="yetkb_yuridik_nomi"
                                                value="{{ $loyihaiqtisodi->yetkb_yuridik_nomi ?? '' }}"
                                                class="input w-full border mt-2" required="">
                                            @error('yetkb_yuridik_nomi')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border" style="text-size:16px;">
                                            Mablag‘ning o‘zlashtirilishi, so‘m
                                        </td>
                                        <td class="border" colspan="2">
                                            <input type="text" name="uzlashtirilishi_summasi" id="sumInput1"
                                                oninput="formatNumber(this)"
                                                value="{{ $loyihaiqtisodi->uzlashtirilishi_summasi ?? '' }}"
                                                class="input w-full border mt-2" required="">
                                            @error('uzlashtirilishi_summasi')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
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
            <button type="submit" form="science-paper-edit-form-edit"
                class="update-confirm button w-24 bg-theme-1 text-white">
                Qo'shish
            </button>
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
    // "Boshqa" tanlansa inputni ko‘rsatish
    document.getElementById('shtat_birligi').addEventListener('change', function () {
        const boshqaInputDiv = document.getElementById('boshqa_input_div');
        if (this.value === 'boshqa') {
            boshqaInputDiv.style.display = 'block';
        } else {
            boshqaInputDiv.style.display = 'none';
        }
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



<div class="modal" id="intellektual-paper-create-modal">
    <div class="modal__content modal__content--xl">
        <div class="p-5">

            <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2">
                <div class="w-full mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                    <form id="intellektual-paper-create-form" method="POST" action="{{ route('intellektual.store') }}"
                        class="validate-form" enctype="multipart/form-data" novalidate="novalidate">
                        @csrf
                        <div class="grid grid-cols-12 gap-2">

                            <div class="w-full col-span-12">
                                <table class="table table-bordered">
                                    <tr>
                                        <th class="border" style="text-align: center;" colspan="3">INTELLEKTUAL
                                            FAOLIYAT
                                            NATIJALARI</th>
                                    </tr>
                                    <tr>
                                        <th class="border">Koʻrsatkichlar</th>
                                        <th class="border"><span
                                                class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Rejada</th>
                                        <th class="border"><span
                                                class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Amalda</th>
                                    </tr>
                                    <tr>
                                        <td class="border" style="text-size:16px;">
                                            Mahalliy ilmiy jurnallardagi maqolalar soni
                                        </td>
                                        <td class="border">
                                            <input type="hidden" name="ilmiy_loyiha_id" value="{{ $ilmiyloyiha->id }}">
                                            <input type="number" min="0" name="mal_jur_reja" value="{{ old('mal_jur_reja') }}"
                                                class="input w-full border mt-2" required="">
                                        </td>
                                        <td class="border">
                                            <input type="number" min="0" name="mal_jur_amalda"
                                                value="{{ old('mal_jur_amalda') }}" class="input w-full border mt-2"
                                                required="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border" style="text-size:16px;">
                                            Xorijiy jurnallardagi ilmiy maqolalar soni
                                        </td>
                                        <td class="border">
                                            <input type="number" min="0" name="xor_jur_reja" value="{{ old('xor_jur_reja') }}"
                                                class="input w-full border mt-2" required="">
                                        </td>
                                        <td class="border">
                                            <input type="number" min="0" name="xor_jur_amalda"
                                                value="{{ old('xor_jur_amalda') }}" class="input w-full border mt-2"
                                                required="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border" style="text-size:16px;">
                                            Web of intellektual va Scopus bazasidagi xalqaro nashrlardagi maqolalar soni
                                        </td>
                                        <td class="border">
                                            <input type="number" min="0" name="web_jur_reja" value="{{ old('web_jur_reja') }}"
                                                class="input w-full border mt-2" required="">
                                        </td>
                                        <td class="border">
                                            <input type="number" min="0" name="web_jur_amalda"
                                                value="{{ old('web_jur_amalda') }}" class="input w-full border mt-2"
                                                required="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border" style="text-size:16px;">
                                            Tezislar soni
                                        </td>
                                        <td class="border">
                                            <input type="number" min="0" name="tezislar_reja" value="{{ old('tezislar_reja') }}"
                                                class="input w-full border mt-2" required="">
                                        </td>
                                        <td class="border">
                                            <input type="number" min="0" name="tezislar_amalda"
                                                value="{{ old('tezislar_amalda') }}" class="input w-full border mt-2"
                                                required="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border" style="text-size:16px;">
                                            Ilmiy monografiyalar soni
                                        </td>
                                        <td class="border">
                                            <input type="number" min="0" name="ilmiy_mon_reja"
                                                value="{{ old('ilmiy_mon_reja') }}" class="input w-full border mt-2"
                                                required="">
                                        </td>
                                        <td class="border">
                                            <input type="number" min="0" name="ilmiy_mon_amalda"
                                                value="{{ old('ilmiy_mon_amalda') }}" class="input w-full border mt-2"
                                                required="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border" style="text-size:16px;">
                                            Nashr qilingan oʻquv qoʻllanmalari soni
                                        </td>
                                        <td class="border">
                                            <input type="number" min="0" name="nashr_uquv_reja"
                                                value="{{ old('nashr_uquv_reja') }}" class="input w-full border mt-2"
                                                required="">
                                        </td>
                                        <td class="border">
                                            <input type="number" min="0" name="nashr_uquv_amalda"
                                                value="{{ old('nashr_uquv_amalda') }}" class="input w-full border mt-2"
                                                required="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border" style="text-size:16px;">
                                            Nashr qilingan darsliklar soni
                                        </td>
                                        <td class="border">
                                            <input type="number" min="0" name="darslik_reja" value="{{ old('darslik_reja') }}"
                                                class="input w-full border mt-2" required="">
                                        </td>
                                        <td class="border">
                                            <input type="number" min="0" name="darslik_amalda"
                                                value="{{ old('darslik_amalda') }}" class="input w-full border mt-2"
                                                required="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border" style="text-size:16px;">
                                            Bakalavriat bosqichida tayyorlangan bitiruv malakaviy ishlari soni
                                        </td>
                                        <td class="border">
                                            <input type="number" min="0" name="b_bitiruv_mreja"
                                                value="{{ old('b_bitiruv_mreja') }}" class="input w-full border mt-2"
                                                required="">
                                        </td>
                                        <td class="border">
                                            <input type="number" min="0" name="b_bitiruv_mamalda"
                                                value="{{ old('b_bitiruv_mamalda') }}" class="input w-full border mt-2"
                                                required="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border" style="text-size:16px;">
                                            Tayyorlangan magistrlik dissertatsiyalari soni
                                        </td>
                                        <td class="border">
                                            <input type="number" min="0" name="m_bitiruv_dreja"
                                                value="{{ old('m_bitiruv_dreja') }}" class="input w-full border mt-2"
                                                required="">
                                        </td>
                                        <td class="border">
                                            <input type="number" min="0" name="m_bitiruv_damalda"
                                                value="{{ old('m_bitiruv_damalda') }}" class="input w-full border mt-2"
                                                required="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border" style="text-size:16px;">
                                            Tayyorlangan doktorlik dissertatsiyalari soni (PhD, DSc)
                                        </td>
                                        <td class="border">
                                            <input type="number" min="0" name="p_bitiruv_dreja"
                                                value="{{ old('p_bitiruv_dreja') }}" class="input w-full border mt-2"
                                                required="">
                                        </td>
                                        <td class="border">
                                            <input type="number" min="0" name="p_bitiruv_damalda"
                                                value="{{ old('p_bitiruv_damalda') }}" class="input w-full border mt-2"
                                                required="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border" style="text-size:16px;">
                                            Intellektual mulk obyektlari uchun berilgan arizalar soni
                                        </td>
                                        <td class="border">
                                            <input type="number" min="0" name="i_mulk_areja" value="{{ old('i_mulk_areja') }}"
                                                class="input w-full border mt-2" required="">
                                        </td>
                                        <td class="border">
                                            <input type="number" min="0" name="i_mulk_aamalda"
                                                value="{{ old('i_mulk_aamalda') }}" class="input w-full border mt-2"
                                                required="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="border" style="text-align: center;" colspan="3">IXTIRO UCHUN
                                            PATENT
                                            VA DASTURIY TAʼMINOTLAR</th>
                                    </tr>
                                    <tr>
                                        <th class="border">Koʻrsatkichlar</th>
                                        <th class="border"><span
                                                class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Rejada</th>
                                        <th class="border"><span
                                                class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Amalda</th>
                                    </tr>
                                    <tr>
                                        <td class="border" style="text-size:16px;">
                                            Ixtiro uchun olingan patentlari soni
                                        </td>
                                        <td class="border">
                                            <input type="number" min="0" name="ixtiro_olingan_psreja"
                                                value="{{ old('ixtiro_olingan_psreja') }}"
                                                class="input w-full border mt-2" required="">
                                        </td>
                                        <td class="border">
                                            <input type="number" min="0" name="ixtiro_olingan_psamalda"
                                                value="{{ old('ixtiro_olingan_psamalda') }}"
                                                class="input w-full border mt-2" required="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border" style="text-size:16px;">
                                            Ixtiro uchun patentga berilgan buyurtmalar soni
                                        </td>
                                        <td class="border">
                                            <input type="number" min="0" name="ixtiro_ber_psreja"
                                                value="{{ old('ixtiro_ber_psreja') }}" class="input w-full border mt-2"
                                                required="">
                                        </td>
                                        <td class="border">
                                            <input type="number" min="0" name="ixtiro_ber_psamalda"
                                                value="{{ old('ixtiro_ber_psamalda') }}"
                                                class="input w-full border mt-2" required="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border" style="text-size:16px;">
                                            Dasturiy mahsulotga olingan guvohnomalar soni
                                        </td>
                                        <td class="border">
                                            <input type="number" min="0" name="dasturiy_gsreja"
                                                value="{{ old('dasturiy_gsreja') }}" class="input w-full border mt-2"
                                                required="">
                                        </td>
                                        <td class="border">
                                            <input type="number" min="0" name="dasturiy_gsamalda"
                                                value="{{ old('dasturiy_gsamalda') }}" class="input w-full border mt-2"
                                                required="">
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
            <button type="submit" form="intellektual-paper-create-form"
                class="update-confirm button w-24 bg-theme-1 text-white">
                Qo'shish
            </button>
        </div>
    </div>
</div>

<div class="modal" id="intellektual-paper-edit-modal">
    <div class="modal__content modal__content--xl">
        <div class="p-5">

            <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2">
                <div class="w-full mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                    <form id="intellektual-paper-edit-form" method="POST"
                        action="{{ route('intellektual.update', $intellektual->id ?? '') }}" class="validate-form"
                        enctype="multipart/form-data" novalidate="novalidate">
                        @csrf
                        @method('PUT')
                        <div class="grid grid-cols-12 gap-2">

                            <div class="w-full col-span-12">
                                <table class="table table-bordered">
                                    <tr>
                                        <th class="border" style="text-align: center;" colspan="3">INTELLEKTUAL
                                            FAOLIYAT
                                            NATIJALARI</th>
                                    </tr>
                                    <tr>
                                        <th class="border">Koʻrsatkichlar</th>
                                        <th class="border"><span
                                                class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Rejada</th>
                                        <th class="border"><span
                                                class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Amalda</th>
                                    </tr>
                                    <tr>
                                        <td class="border" style="text-size:16px;font-weight:700;">
                                            Mahalliy ilmiy jurnallardagi maqolalar soni
                                        </td>
                                        <td class="border">
                                            <input type="hidden" name="ilmiy_loyiha_id" value="885">
                                            <input type="number" min="0" name="mal_jur_reja"
                                                value="{{ $intellektual->mal_jur_reja ?? '' }}"
                                                class="input w-full border mt-2" required="">
                                        </td>
                                        <td class="border">
                                            <input type="number" min="0" name="mal_jur_amalda"
                                                value="{{ $intellektual->mal_jur_amalda ?? '' }}"
                                                class="input w-full border mt-2" required="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border" style="text-size:16px;font-weight:700;">
                                            Xorijiy jurnallardagi ilmiy maqolalar soni
                                        </td>
                                        <td class="border">
                                            <input type="number" min="0" name="xor_jur_reja"
                                                value="{{ $intellektual->xor_jur_reja ?? '' }}"
                                                class="input w-full border mt-2" required="">
                                        </td>
                                        <td class="border">
                                            <input type="number" min="0" name="xor_jur_amalda"
                                                value="{{ $intellektual->xor_jur_amalda ?? '' }}"
                                                class="input w-full border mt-2" required="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border" style="text-size:16px;font-weight:700;">
                                            Web of Science va Scopus bazasidagi xalqaro nashrlardagi maqolalar soni
                                        </td>
                                        <td class="border">
                                            <input type="number" min="0" name="web_jur_reja"
                                                value="{{ $intellektual->web_jur_reja ?? '' }}"
                                                class="input w-full border mt-2" required="">
                                        </td>
                                        <td class="border">
                                            <input type="number" min="0" name="web_jur_amalda"
                                                value="{{ $intellektual->web_jur_amalda ?? '' }}"
                                                class="input w-full border mt-2" required="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border" style="text-size:16px;font-weight:700;">
                                            Tezislar soni
                                        </td>
                                        <td class="border">
                                            <input type="number" min="0" name="tezislar_reja"
                                                value="{{ $intellektual->tezislar_reja ?? '' }}"
                                                class="input w-full border mt-2" required="">
                                        </td>
                                        <td class="border">
                                            <input type="number" min="0" name="tezislar_amalda"
                                                value="{{ $intellektual->tezislar_amalda ?? '' }}"
                                                class="input w-full border mt-2" required="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border" style="text-size:16px;font-weight:700;">
                                            Ilmiy monografiyalar soni
                                        </td>
                                        <td class="border">
                                            <input type="number" min="0" name="ilmiy_mon_reja"
                                                value="{{ $intellektual->ilmiy_mon_reja ?? '' }}"
                                                class="input w-full border mt-2" required="">
                                        </td>
                                        <td class="border">
                                            <input type="number" min="0" name="ilmiy_mon_amalda"
                                                value="{{ $intellektual->ilmiy_mon_amalda ?? '' }}"
                                                class="input w-full border mt-2" required="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border" style="text-size:16px;font-weight:700;">
                                            Nashr qilingan oʻquv qoʻllanmalari soni
                                        </td>
                                        <td class="border">
                                            <input type="number" min="0" name="nashr_uquv_reja"
                                                value="{{ $intellektual->nashr_uquv_reja ?? '' }}"
                                                class="input w-full border mt-2" required="">
                                        </td>
                                        <td class="border">
                                            <input type="number" min="0" name="nashr_uquv_amalda"
                                                value="{{ $intellektual->nashr_uquv_amalda ?? '' }}"
                                                class="input w-full border mt-2" required="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border" style="text-size:16px;font-weight:700;">
                                            Nashr qilingan darsliklar soni
                                        </td>
                                        <td class="border">
                                            <input type="number" min="0" name="darslik_reja"
                                                value="{{ $intellektual->darslik_reja ?? '' }}"
                                                class="input w-full border mt-2" required="">
                                        </td>
                                        <td class="border">
                                            <input type="number" min="0" name="darslik_amalda"
                                                value="{{ $intellektual->darslik_amalda ?? '' }}"
                                                class="input w-full border mt-2" required="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border" style="text-size:16px;font-weight:700;">
                                            Bakalavriat bosqichida tayyorlangan bitiruv malakaviy ishlari soni
                                        </td>
                                        <td class="border">
                                            <input type="number" min="0" name="b_bitiruv_mreja"
                                                value="{{ $intellektual->b_bitiruv_mreja ?? '' }}"
                                                class="input w-full border mt-2" required="">
                                        </td>
                                        <td class="border">
                                            <input type="number" min="0" name="b_bitiruv_mamalda"
                                                value="{{ $intellektual->b_bitiruv_mamalda ?? '' }}"
                                                class="input w-full border mt-2" required="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border" style="text-size:16px;font-weight:700;">
                                            Tayyorlangan magistrlik dissertatsiyalari soni
                                        </td>
                                        <td class="border">
                                            <input type="number" min="0" name="m_bitiruv_dreja"
                                                value="{{ $intellektual->m_bitiruv_dreja ?? '' }}"
                                                class="input w-full border mt-2" required="">
                                        </td>
                                        <td class="border">
                                            <input type="number" min="0" name="m_bitiruv_damalda"
                                                value="{{ $intellektual->m_bitiruv_damalda ?? '' }}"
                                                class="input w-full border mt-2" required="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border" style="text-size:16px;font-weight:700;">
                                            Tayyorlangan doktorlik dissertatsiyalari soni (PhD, DSc)
                                        </td>
                                        <td class="border">
                                            <input type="number" min="0" name="p_bitiruv_dreja"
                                                value="{{ $intellektual->p_bitiruv_dreja ?? '' }}"
                                                class="input w-full border mt-2" required="">
                                        </td>
                                        <td class="border">
                                            <input type="number" min="0" name="p_bitiruv_damalda"
                                                value="{{ $intellektual->p_bitiruv_damalda ?? '' }}"
                                                class="input w-full border mt-2" required="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border" style="text-size:16px;font-weight:700;">
                                            Intellektual mulk obyektlari uchun berilgan arizalar soni
                                        </td>
                                        <td class="border">
                                            <input type="number" min="0" name="i_mulk_areja"
                                                value="{{ $intellektual->i_mulk_areja ?? '' }}"
                                                class="input w-full border mt-2" required="">
                                        </td>
                                        <td class="border">
                                            <input type="number" min="0" name="i_mulk_aamalda"
                                                value="{{ $intellektual->i_mulk_aamalda ?? '' }}"
                                                class="input w-full border mt-2" required="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="border" style="text-align: center;" colspan="3">IXTIRO UCHUN
                                            PATENT
                                            VA DASTURIY TAʼMINOTLAR</th>
                                    </tr>
                                    <tr>
                                        <th class="border">Koʻrsatkichlar</th>
                                        <th class="border"><span
                                                class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Rejada</th>
                                        <th class="border"><span
                                                class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Amalda</th>
                                    </tr>
                                    <tr>
                                        <td class="border" style="text-size:16px;font-weight:700;">
                                            Ixtiro uchun olingan patentlari soni
                                        </td>
                                        <td class="border">
                                            <input type="number" min="0" name="ixtiro_olingan_psreja"
                                                value="{{ $intellektual->ixtiro_olingan_psreja ?? '' }}"
                                                class="input w-full border mt-2" required="">
                                        </td>
                                        <td class="border">
                                            <input type="number" min="0" name="ixtiro_olingan_psamalda"
                                                value="{{ $intellektual->ixtiro_olingan_psamalda ?? '' }}"
                                                class="input w-full border mt-2" required="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border" style="text-size:16px;font-weight:700;">
                                            Ixtiro uchun patentga berilgan buyurtmalar soni
                                        </td>
                                        <td class="border">
                                            <input type="number" min="0" name="ixtiro_ber_psreja"
                                                value="{{ $intellektual->ixtiro_ber_psreja ?? '' }}"
                                                class="input w-full border mt-2" required="">
                                        </td>
                                        <td class="border">
                                            <input type="number" min="0" name="ixtiro_ber_psamalda"
                                                value="{{ $intellektual->ixtiro_ber_psamalda ?? '' }}"
                                                class="input w-full border mt-2" required="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border" style="text-size:16px;font-weight:700;">
                                            Dasturiy mahsulotga olingan guvohnomalar soni
                                        </td>
                                        <td class="border">
                                            <input type="number" min="0" name="dasturiy_gsreja"
                                                value="{{ $intellektual->dasturiy_gsreja ?? '' }}"
                                                class="input w-full border mt-2" required="">
                                        </td>
                                        <td class="border">
                                            <input type="number" min="0" name="dasturiy_gsamalda"
                                                value="{{ $intellektual->dasturiy_gsamalda ?? '' }}"
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
            <button type="submit" form="intellektual-paper-edit-form"
                class="update-confirm button w-24 bg-theme-1 text-white">
                Qo'shish
            </button>
        </div>
    </div>
</div>

<script>
    function formatNumber(input) {
        // Faqat raqamlarni olib tashlaymiz va bo‘sh joylarni yo‘qotamiz
        let value = input.value.replace(/\D/g, "");

        // Raqamlarni 3 xonadan bo‘sh joy bilan ajratamiz
        input.value = value.replace(/\B(?=(\d{3})+(?!\d))/g, " ");
    }
</script>

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
                                                <select name="turi" value="{{old('turi')}}" id="science-sub12-category"
                                                    class="input border w-full mt-2" required="">

                                                    <option value="{{ $ilmiyloyiha->turi ?? ''}}">
                                                        {{ $ilmiyloyiha->turi ?? ''}}</option>

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
                                                    value="{{ $ilmiyloyiha->bosh_sana ?? '' }}"
                                                    class="input w-full border mt-2" required="">
                                            </td>
                                        </tr>
                                        <tr>
                                            {{-- <td class="border">1.5.</td> --}}
                                            <td class="border">Bajarilish muddati tugash</td>
                                            <td class="border">
                                                <input type="date" name="tug_sana"
                                                    value="{{ $ilmiyloyiha->tug_sana ?? '' }}"
                                                    class="input w-full border mt-2" required="">
                                            </td>
                                        </tr>
                                        <tr>
                                            {{-- <td class="border">1.6.</td> --}}
                                            <td class="border">Loyihaning umumiy qiymati, ming soʻm</td>
                                            <td class="border">
                                                <input type="text" name="sum" id="sumInput1"
                                                    oninput="formatNumber(this)" value="{{ $ilmiyloyiha->sum ?? '' }}"
                                                    class="input w-full border mt-2" required="">
                                            </td>
                                        </tr>
                                        <tr>
                                            {{-- <td class="border">1.6.1.</td> --}}
                                            <td class="border">Joriy yil uchun ajratilgan mablagʻ, ming soʻm</td>
                                            <td class="border">
                                                <input type="text" name="joriy_yil_sum" id="sumInput1"
                                                    oninput="formatNumber(this)"
                                                    value="{{ $ilmiyloyiha->joriy_yil_sum ?? '' }}"
                                                    class="input w-full border mt-2" required="">
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

                                                    <option value="{{ $ilmiyloyiha->rahbariilmiy_darajasi ?? ''}}">
                                                        {{ $ilmiyloyiha->rahbariilmiy_darajasi ?? ''}}</option>

                                                    <option value="Fan nomzodi">Fan nomzodi</option>

                                                    <option value="Falsafa doktori (PhD)">Falsafa doktori (PhD)</option>

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

                                                    <option value="{{ $ilmiyloyiha->rahbariilmiy_unvoni ?? ''}}">
                                                        {{ $ilmiyloyiha->rahbariilmiy_unvoni ?? ''}}</option>

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
                                                    <option value="{{ $ilmiyloyiha->r_lavozimi ?? ''}}">
                                                        {{ $ilmiyloyiha->r_lavozimi ?? ''}}</option>
                                                    <option value="Dekan o‘rinbosari">Dekan o‘rinbosari</option>
                                                    <option value="Kafedra mudiri">Kafedra mudiri</option>
                                                    <option value="Professor">Professor</option>
                                                    <option value="Dotsent">Dotsent</option>
                                                    <option value="Katta o‘qituvchi">Katta o‘qituvchi</option>
                                                    <option value="Assistent, o‘qituvchi">Assistent, o‘qituvchi</option>
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

                                                    <option value="{{ $ilmiyloyiha->avvr_ilmiy_daraja ?? ''}}">
                                                        {{ $ilmiyloyiha->avvr_ilmiy_daraja ?? ''}}</option>

                                                    <option value="Fan nomzodi">Fan nomzodi</option>

                                                    <option value="Falsafa doktori (PhD)">Falsafa doktori (PhD)</option>

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

                                                    <option value="{{ $ilmiyloyiha->avvr_ilmiy_unvon ?? ''}}">
                                                        {{ $ilmiyloyiha->avvr_ilmiy_unvon ?? ''}}</option>

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
                                                    <option value="{{ $ilmiyloyiha->avvr_lavozimi ?? ''}}">
                                                        {{ $ilmiyloyiha->avvr_lavozimi ?? ''}}</option>
                                                    <option value="Dekan o‘rinbosari">Dekan o‘rinbosari</option>
                                                    <option value="Kafedra mudiri">Kafedra mudiri</option>
                                                    <option value="Professor">Professor</option>
                                                    <option value="Dotsent">Dotsent</option>
                                                    <option value="Katta o‘qituvchi">Katta o‘qituvchi</option>
                                                    <option value="Assistent, o‘qituvchi">Assistent, o‘qituvchi</option>
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
                                                    <option value="{{ $ilmiyloyiha->hamr_lavozimi ?? ''}}">
                                                        {{ $ilmiyloyiha->hamr_lavozimi ?? ''}}</option>
                                                    <option value="Dekan o‘rinbosari">Dekan o‘rinbosari</option>
                                                    <option value="Kafedra mudiri">Kafedra mudiri</option>
                                                    <option value="Professor">Professor</option>
                                                    <option value="Dotsent">Dotsent</option>
                                                    <option value="Katta o‘qituvchi">Katta o‘qituvchi</option>
                                                    <option value="Assistent, o‘qituvchi">Assistent, o‘qituvchi</option>
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
                        action="{{ route('intellektual.update', $intellektual->id ?? 0) }}" class="validate-form"
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
                                        <td class="border" style="text-size:14px;">
                                            Mahalliy ilmiy jurnallardagi maqolalar soni
                                        </td>
                                        <td class="border">
                                            <input type="hidden" name="izohlar" value="1">
                                            {{ $intellektual->mal_jur_reja ?? 0 }}
                                        </td>
                                        <td class="border">
                                            {{ $intellektual->mal_jur_amalda ?? 0 }}
                                        </td>
                                        <td class="border">
                                            {{ ($intellektual->mal_jur_reja ?? 0) - ($intellektual->mal_jur_amalda ?? 0) }}
                                        </td>
                                        <td class="border">
                                            <input type="text" name="mal_jur_izoh"
                                                value="{{ $intellektual->mal_jur_izoh ?? null }}"
                                                class="input w-full border mt-2" required="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border">2.</td>
                                        <td class="border" style="text-size:14px;">
                                            Xorijiy jurnallardagi ilmiy maqolalar soni
                                        </td>
                                        <td class="border">
                                            {{ $intellektual->xor_jur_reja ?? 0 }}
                                        </td>
                                        <td class="border">
                                            {{ $intellektual->xor_jur_amalda ?? 0 }}
                                        </td>
                                        <td class="border">
                                            {{ ($intellektual->xor_jur_reja ?? 0) - ($intellektual->xor_jur_amalda ?? 0) }}
                                        </td>
                                        <td class="border">
                                            <input type="text" name="xor_jur_izoh"
                                                value="{{ $intellektual->xor_jur_izoh ?? null }}"
                                                class="input w-full border mt-2" required="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border">3.</td>
                                        <td class="border" style="text-size:14px;">
                                            Web of Science va Scopus bazasidagi xalqaro nashrlardagi maqolalar soni
                                        </td>
                                        <td class="border">
                                            {{ $intellektual->web_jur_reja ?? 0 }}
                                        </td>
                                        <td class="border">
                                            {{ $intellektual->web_jur_amalda ?? 0 }}
                                        </td>
                                        <td class="border">
                                            {{ ($intellektual->web_jur_reja ?? 0) - ($intellektual->web_jur_amalda ?? 0) }}
                                        </td>
                                        <td class="border">
                                            <input type="text" name="web_jur_izoh"
                                                value="{{ $intellektual->web_jur_izoh ?? null }}"
                                                class="input w-full border mt-2" required="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border">4.</td>
                                        <td class="border" style="text-size:14px;">
                                            Tezislar soni
                                        </td>
                                        <td class="border">
                                            {{ $intellektual->tezislar_reja ?? 0 }}
                                        </td>
                                        <td class="border">
                                            {{ $intellektual->tezislar_amalda ?? 0 }}
                                        </td>
                                        <td class="border">
                                            {{ ($intellektual->tezislar_reja ?? 0) - ($intellektual->tezislar_amalda ?? 0) }}
                                        </td>
                                        <td class="border">
                                            <input type="text" name="tezislar_izoh"
                                                value="{{ $intellektual->tezislar_izoh ?? null }}"
                                                class="input w-full border mt-2" required="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border">5.</td>
                                        <td class="border" style="text-size:14px;">
                                            Ilmiy monografiyalar soni
                                        </td>
                                        <td class="border">
                                            {{ $intellektual->ilmiy_mon_reja ?? 0 }}
                                        </td>
                                        <td class="border">
                                            {{ $intellektual->ilmiy_mon_amalda ?? 0 }}
                                        </td>
                                        <td class="border">
                                            {{ ($intellektual->ilmiy_mon_reja ?? 0) - ($intellektual->ilmiy_mon_amalda ?? 0) }}
                                        </td>
                                        <td class="border">
                                            <input type="text" name="ilmiy_mon_izoh"
                                                value="{{ $intellektual->ilmiy_mon_izoh ?? null }}"
                                                class="input w-full border mt-2" required="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border">6.</td>
                                        <td class="border" style="text-size:14px;">
                                            Nashr qilingan oʻquv qoʻllanmalari soni
                                        </td>
                                        <td class="border">
                                            {{ $intellektual->nashr_uquv_reja ?? 0 }}
                                        </td>
                                        <td class="border">
                                            {{ $intellektual->nashr_uquv_amalda ?? 0 }}
                                        </td>
                                        <td class="border">
                                            {{ ($intellektual->nashr_uquv_reja ?? 0) - ($intellektual->nashr_uquv_amalda ?? 0) }}
                                        </td>
                                        <td class="border">
                                            <input type="text" name="nashr_uquv_izoh"
                                                value="{{ $intellektual->nashr_uquv_izoh ?? null }}"
                                                class="input w-full border mt-2" required="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border">7.</td>
                                        <td class="border" style="text-size:14px;">
                                            Nashr qilingan darsliklar soni
                                        </td>
                                        <td class="border">
                                            {{ $intellektual->darslik_reja ?? 0 }}
                                        </td>
                                        <td class="border">
                                            {{ $intellektual->darslik_amalda ?? 0 }}
                                        </td>
                                        <td class="border">
                                            {{ ($intellektual->darslik_reja ?? 0) - ($intellektual->darslik_amalda ?? 0) }}
                                        </td>
                                        <td class="border">
                                            <input type="text" name="darslik_izoh"
                                                value="{{ $intellektual->darslik_izoh ?? null }}"
                                                class="input w-full border mt-2" required="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border">8.</td>
                                        <td class="border" style="text-size:14px;">
                                            Bakalavriat bosqichida tayyorlangan bitiruv malakaviy ishlari soni
                                        </td>
                                        <td class="border">
                                            {{ $intellektual->b_bitiruv_mreja ?? 0 }}
                                        </td>
                                        <td class="border">
                                            {{ $intellektual->b_bitiruv_mamalda ?? 0 }}
                                        </td>
                                        <td class="border">
                                            {{ ($intellektual->b_bitiruv_mreja ?? 0) - ($intellektual->b_bitiruv_mamalda ?? 0) }}
                                        </td>
                                        <td class="border">
                                            <input type="text" name="b_bitiruv_izoh"
                                                value="{{ $intellektual->b_bitiruv_izoh ?? null }}"
                                                class="input w-full border mt-2" required="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border">9.</td>
                                        <td class="border" style="text-size:14px;">
                                            Tayyorlangan magistrlik dissertatsiyalari soni
                                        </td>
                                        <td class="border">
                                            {{ $intellektual->m_bitiruv_dreja ?? 0 }}
                                        </td>
                                        <td class="border">
                                            {{ $intellektual->m_bitiruv_damalda ?? 0 }}
                                        </td>
                                        <td class="border">
                                            {{ ($intellektual->m_bitiruv_dreja ?? 0) - ($intellektual->m_bitiruv_damalda ?? 0) }}
                                        </td>
                                        <td class="border">
                                            <input type="text" name="m_bitiruv_izoh"
                                                value="{{ $intellektual->m_bitiruv_izoh ?? null }}"
                                                class="input w-full border mt-2" required="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border">10.</td>
                                        <td class="border" style="text-size:14px;">
                                            Tayyorlangan doktorlik dissertatsiyalari soni (PhD, DSc)
                                        </td>
                                        <td class="border">
                                            {{ $intellektual->p_bitiruv_dreja ?? 0 }}
                                        </td>
                                        <td class="border">
                                            {{ $intellektual->p_bitiruv_damalda ?? 0 }}
                                        </td>
                                        <td class="border">
                                            {{ ($intellektual->p_bitiruv_dreja ?? 0) - ($intellektual->p_bitiruv_damalda ?? 0) }}
                                        </td>
                                        <td class="border">
                                            <input type="text" name="p_bitiruv_izoh"
                                                value="{{ $intellektual->p_bitiruv_izoh ?? null }}"
                                                class="input w-full border mt-2" required="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border">11.</td>
                                        <td class="border" style="text-size:14px;">
                                            Intellektual mulk obyektlari uchun berilgan arizalar soni
                                        </td>
                                        <td class="border">
                                            {{ $intellektual->i_mulk_areja ?? 0 }}
                                        </td>
                                        <td class="border">
                                            {{ $intellektual->i_mulk_aamalda ?? 0 }}
                                        </td>
                                        <td class="border">
                                            {{ ($intellektual->i_mulk_areja ?? 0) - ($intellektual->i_mulk_aamalda ?? 0) }}
                                        </td>
                                        <td class="border">
                                            <input type="text" name="i_mulk_izoh"
                                                value="{{ $intellektual->i_mulk_izoh ?? null }}"
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
                                        <td class="border" style="text-size:14px;">
                                            Ixtiro uchun olingan patentlari soni
                                        </td>
                                        <td class="border">
                                            {{ $intellektual->ixtiro_olingan_psreja ?? 0 }}
                                        </td>
                                        <td class="border">
                                            {{ $intellektual->ixtiro_olingan_psamalda ?? 0 }}
                                        </td>
                                        <td class="border">
                                            {{ ($intellektual->ixtiro_olingan_psreja ?? 0) - ($intellektual->ixtiro_olingan_psamalda ?? 0) }}
                                        </td>
                                        <td class="border">
                                            <input type="text" name="ixtiro_olingan_izoh"
                                                value="{{ $intellektual->ixtiro_olingan_izoh ?? null }}"
                                                class="input w-full border mt-2" required="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border">2.</td>
                                        <td class="border" style="text-size:14px;">
                                            Ixtiro uchun patentga berilgan buyurtmalar soni
                                        </td>
                                        <td class="border">
                                            {{ $intellektual->ixtiro_ber_psreja ?? 0 }}
                                        </td>
                                        <td class="border">
                                            {{ $intellektual->ixtiro_ber_psamalda ?? 0 }}
                                        </td>
                                        <td class="border">
                                            {{ ($intellektual->ixtiro_ber_psreja ?? 0) - ($intellektual->ixtiro_ber_psamalda ?? 0) }}
                                        </td>
                                        <td class="border">
                                            <input type="text" name="ixtiro_ber_izoh"
                                                value="{{ $intellektual->ixtiro_ber_izoh ?? null }}"
                                                class="input w-full border mt-2" required="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border">3.</td>
                                        <td class="border" style="text-size:14px;">
                                            Dasturiy mahsulotga olingan guvohnomalar soni
                                        </td>
                                        <td class="border">
                                            {{ $intellektual->dasturiy_gsreja ?? 0 }}
                                        </td>
                                        <td class="border">
                                            {{ $intellektual->dasturiy_gsamalda ?? 0 }}
                                        </td>
                                        <td class="border">
                                            {{ ($intellektual->dasturiy_gsreja ?? 0) - ($intellektual->dasturiy_gsamalda ?? 0) }}
                                        </td>
                                        <td class="border">
                                            <input type="text" name="dasturiy_izoh"
                                                value="{{ $intellektual->dasturiy_izoh ?? null }}"
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
                        action="{{ route('loyihaiqtisodi.update', $loyihaiqtisodi->id ?? 0) }}" class="validate-form"
                        enctype="multipart/form-data" novalidate="novalidate">
                        @csrf
                        @method('PUT')
                        <div class="grid grid-cols-12 gap-2">

                            <div class="w-full col-span-12">

                                <table class="table table-bordered">
                                    <tr>
                                        <th class="border" style="text-align: center;" colspan="6">III. LOYIHANING MUHIM
                                            NATIJALARI </th>
                                    </tr>
                                    <tr>
                                        {{-- <th class="border" style="width: 40px;">T/r</th> --}}
                                        <th class="border" style="width: 30%;">Koʻrsatkichlar</th>
                                        <th class="border" colspan="3" style="width: 30%;">Bajarilishi holatining
                                            tahlili</th>
                                        <th class="border">Izoh</th>
                                    </tr>
                                    <tr>
                                        {{-- <td class="border">3.3.1.</td> --}}
                                        <td class="border" style="text-size:14px;">
                                            Hisobot davrida qoʻlga kiritilgan muhim natijalar
                                        </td>
                                        <td class="border" colspan="3">
                                            {{ $loyihaiqtisodi->hisobot_davri ?? null }}
                                        </td>
                                        <td class="border">
                                            <input type="hidden" name="izohlar" value="1">
                                            <textarea name="hisobot_davri_i" class="input w-full border mt-2"
                                                required="">{{ $loyihaiqtisodi->hisobot_davri_i ?? null }}</textarea>

                                        </td>
                                    </tr>
                                    <tr>
                                        {{-- <td class="border">3.3.2.</td> --}}
                                        <td class="border" style="text-size:14px;">
                                            Loyihaning bajarilishi davrida yaratilgan ishlanma (texnologiya) nomi va
                                            qisqacha
                                            tavsifi
                                        </td>
                                        <td class="border" colspan="3">
                                            {{ $loyihaiqtisodi->loyihabaj_ishlanma ?? null }}
                                        </td>
                                        <td class="border">
                                            <textarea name="loyihabaj_ishlanma_i" class="input w-full border mt-2"
                                                required="">{{ $loyihaiqtisodi->loyihabaj_ishlanma_i ?? null }}</textarea>

                                        </td>
                                    </tr>
                                    <tr>
                                        {{-- <td class="border">3.3.3.</td> --}}
                                        <td class="border" style="text-size:14px;">
                                            Ilmiy ishlanma joriy etiladigan (tijoratlashtiriladigan) tarmoq (soha) va
                                            kutilayotgan
                                            natijalar (mavjud ehtiyoj, iqtisodiy samaradorlik tahlili)
                                        </td>
                                        <td class="border" colspan="3">
                                            {{ $loyihaiqtisodi->ilmiy_ishlanmalar ?? null }}
                                        </td>
                                        <td class="border">
                                            <textarea name="ilmiy_ishlanmalar_i" class="input w-full border mt-2"
                                                required="">{{ $loyihaiqtisodi->ilmiy_ishlanmalar_i ?? null }}
                                                </textarea>

                                        </td>
                                    </tr>

                                    <tr>
                                        <th class="border" style="text-align: center;" colspan="6">LOYIHANING MOLIYAVIY
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
                                        <td class="border" style="text-size:14px;">
                                            Mehnatga haq toʻlash (5.1.-shakl)
                                        </td>
                                        {{-- <td class="border"> --}}
                                            {{-- {{ $loyihaiqtisodi->mehnat_haq_r ?? null }} --}}
                                            {{-- {{ number_format($loyihaiqtisodi->mehnat_haq_r, 0, '.', ' ') }} --}}
                                        <td class="border">
                                            {{ $loyihaiqtisodi->mehnat_haq_r ?? null }}
                                        </td>
                                        {{-- </td> --}}
                                        <td class="border">
                                            {{ $loyihaiqtisodi->mehnat_haq_a ?? null }}
                                        </td>
                                        <td class="border">
                                            {{ number_format(preg_replace('/\D/', '', $loyihaiqtisodi->mehnat_haq_r ?? 0) - preg_replace('/\D/', '', $loyihaiqtisodi->mehnat_haq_a ?? 0)) }}
                                        </td>
                                        <td class="border">
                                            <textarea name="mehnat_haq_i" class="input w-full border mt-2"
                                                required="">{{ $loyihaiqtisodi->mehnat_haq_i ?? null }}</textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        {{-- <td class="border">4.2.</td> --}}
                                        <td class="border" style="text-size:14px;">
                                            Xizmat safarlari xarajatlari (5.2.-shakl)
                                        </td>
                                        <td class="border">
                                            {{ $loyihaiqtisodi->xizmat_saf_r ?? null }}
                                        </td>
                                        <td class="border">
                                            {{ $loyihaiqtisodi->xizmat_saf_a ?? null }}
                                        </td>
                                        <td class="border">
                                            {{ number_format(preg_replace('/\D/', '', $loyihaiqtisodi->xizmat_saf_r ?? 0) - preg_replace('/\D/', '', $loyihaiqtisodi->xizmat_saf_a ?? 0)) }}
                                        </td>
                                        <td class="border">
                                            <textarea name="xizmat_saf_i" class="input w-full border mt-2"
                                                required="">{{ $loyihaiqtisodi->xizmat_saf_i ?? null }}</textarea>

                                        </td>
                                    </tr>
                                    <tr>
                                        {{-- <td class="border">4.3.</td> --}}
                                        <td class="border" style="text-size:14px;">
                                            Ilmiy-tadqiqot uchun zarur boʻlgan asbob-uskunalar, texnik vositalar va
                                            boshqa
                                            tovar-moddiy boyliklarning xaridi uchun xarajatlar (5.4.-shakl)
                                        </td>
                                        <td class="border">
                                            {{ $loyihaiqtisodi->xarid_xaraja_r ?? null }}
                                        </td>
                                        <td class="border">
                                            {{ $loyihaiqtisodi->xarid_xaraja_a ?? null }}
                                        </td>
                                        <td class="border">
                                            {{ number_format(preg_replace('/\D/', '', $loyihaiqtisodi->xarid_xaraja_r ?? 0) - preg_replace('/\D/', '', $loyihaiqtisodi->xarid_xaraja_a ?? 0)) }}
                                        </td>
                                        <td class="border">
                                            <textarea name="xarid_xaraja_i" class="input w-full border mt-2"
                                                required="">{{ $loyihaiqtisodi->xarid_xaraja_i ?? null }}</textarea>

                                        </td>
                                    </tr>
                                    <tr>
                                        {{-- <td class="border">4.4.</td> --}}
                                        <td class="border" style="text-size:14px;">
                                            Ilmiy-tadqiqot uchun materiallar va butlovchi qismlarni sotib olish
                                            xarajatlari
                                            (5.5.-shakl)
                                        </td>
                                        <td class="border">
                                            {{ $loyihaiqtisodi->mat_butlovchi_r ?? null }}
                                        </td>
                                        <td class="border">
                                            {{ $loyihaiqtisodi->mat_butlovchi_a ?? null }}
                                        </td>
                                        <td class="border">
                                            {{ number_format(preg_replace('/\D/', '', $loyihaiqtisodi->mat_butlovchi_r ?? 0) - preg_replace('/\D/', '', $loyihaiqtisodi->mat_butlovchi_a ?? 0)) }}
                                        </td>
                                        <td class="border">
                                            <textarea name="mat_butlovchi_i" class="input w-full border mt-2"
                                                required="">{{ $loyihaiqtisodi->mat_butlovchi_i ?? null }}</textarea>

                                        </td>
                                    </tr>
                                    <tr>
                                        {{-- <td class="border">4.5.</td> --}}
                                        <td class="border" style="text-size:14px;">
                                            Loyihani amalga oshirishga jalb etilgan boshqa tashkilotlarning tadqiqot
                                            ishlari
                                            uchun
                                            toʻlov (5.6.-shakl)
                                        </td>
                                        <td class="border">
                                            {{ $loyihaiqtisodi->jalb_etilgan_r ?? null }}
                                        </td>
                                        <td class="border">
                                            {{ $loyihaiqtisodi->jalb_etilgan_a ?? null }}
                                        </td>
                                        <td class="border">
                                            {{ number_format(preg_replace('/\D/', '', $loyihaiqtisodi->jalb_etilgan_r ?? 0) - preg_replace('/\D/', '', $loyihaiqtisodi->jalb_etilgan_a ?? 0)) }}
                                        </td>
                                        <td class="border">
                                            <textarea name="jalb_etilgan_i" class="input w-full border mt-2"
                                                required="">{{ $loyihaiqtisodi->jalb_etilgan_i ?? null }}</textarea>

                                        </td>
                                    </tr>
                                    <tr>
                                        {{-- <td class="border">4.6.</td> --}}
                                        <td class="border" style="text-size:14px;">
                                            Loyihani amalga oshirish uchun boshqa xarajatlar (5.7.-shakl)
                                        </td>
                                        <td class="border">
                                            {{ $loyihaiqtisodi->boshqa_xarajat_r ?? null }}
                                        </td>
                                        <td class="border">
                                            {{ $loyihaiqtisodi->boshqa_xarajat_a ?? null }}
                                        </td>
                                        <td class="border">
                                            {{ number_format(preg_replace('/\D/', '', $loyihaiqtisodi->boshqa_xarajat_r ?? 0) - preg_replace('/\D/', '', $loyihaiqtisodi->boshqa_xarajat_a ?? 0)) }}
                                        </td>
                                        <td class="border">
                                            <textarea name="boshqa_xarajat_i" class="input w-full border mt-2"
                                                required="">{{ $loyihaiqtisodi->boshqa_xarajat_i ?? null }}</textarea>

                                        </td>
                                    </tr>
                                    <tr>
                                        {{-- <td class="border">4.7.</td> --}}
                                        <td class="border" style="text-size:14px;">
                                            Tashkilotning ustama xarajatlari (ushbu xarajat turi byudjetdan
                                            toʻgʻridan-toʻgʻri
                                            va
                                            bazaviy moliyalashtiriladigan ilmiy tashkilotlar tomonidan
                                            rejalashtirilmaydi)
                                        </td>
                                        <td class="border">
                                            {{ $loyihaiqtisodi->tashustama_xarajat_r ?? null }}
                                        </td>
                                        <td class="border">
                                            {{ $loyihaiqtisodi->tashustama_xarajat_a ?? null }}
                                        </td>
                                        <td class="border">
                                            {{ number_format(preg_replace('/\D/', '', $loyihaiqtisodi->tashustama_xarajat_r ?? 0) - preg_replace('/\D/', '', $loyihaiqtisodi->tashustama_xarajat_a ?? 0)) }}
                                        </td>
                                        <td class="border">
                                            <textarea name="tashustama_xarajat_i" class="input w-full border mt-2"
                                                required="">{{ $loyihaiqtisodi->tashustama_xarajat_i ?? null }}</textarea>

                                        </td>
                                    </tr>
                                    <tr>
                                        {{-- <td class="border">4.8.</td> --}}
                                        <td class="border" style="text-size:14px;">
                                            Xarid qilingan asbob-uskunalar va boshqa asosiy vositalar xaridining
                                            shartnomalari
                                            mavjudligi, dalolatnomasining rasmiylashtirilganligi
                                        </td>
                                        <td class="border" colspan="3">
                                            {{ $loyihaiqtisodi->xarid_qilingan_xarid ?? null }}
                                        </td>
                                        <td rowspan="4" class="border">
                                            <textarea name="xarid_qilingan_i" class="input w-full border mt-2"
                                                required="">{{ $loyihaiqtisodi->xarid_qilingan_i ?? null }}</textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        {{-- <td class="border">4.8.1.</td> --}}
                                        <td class="border" style="text-size:14px;">
                                            Xarid shartnomasining raqami va sanasi
                                        </td>
                                        <td class="border">
                                            {{ $loyihaiqtisodi->xarid_s ?? null }}
                                        </td>
                                        <td class="border" colspan="2">
                                            {{ $loyihaiqtisodi->xarid_r ?? null }}
                                        </td>
                                    </tr>
                                    <tr>
                                        {{-- <td class="border">4.8.2.</td> --}}
                                        <td class="border" style="text-size:14px;">
                                            Sotuvchi kompaniyaning nomi
                                        </td>
                                        <td class="border" colspan="3">
                                            {{ $loyihaiqtisodi->xarid_sh ?? null }}
                                        </td>
                                    </tr>
                                    <tr>
                                        {{-- <td class="border">4.8.3.</td> --}}
                                        <td class="border" style="text-size:14px;">
                                            Yetkazib beruvchi yuridik shaxsning nomi
                                        </td>
                                        <td class="border" colspan="3">
                                            {{ $loyihaiqtisodi->yetkb_yuridik_nomi ?? null }}
                                        </td>
                                    </tr>
                                    <tr>
                                        {{-- <td class="border">4.7.</td> --}}
                                        <td class="border" style="text-size:14px;">
                                            Mablag‘ning o‘zlashtirilishi, so‘m
                                        </td>
                                        <td class="border">
                                            {{ $loyihaiqtisodi->uzlashtirilishi_summasi ?? null }}
                                        </td>
                                        <td class="border">
                                            {{ $ilmiyloyiha->sum ?? null }}
                                        </td>
                                        <td class="border">
                                            {{ number_format(preg_replace('/\D/', '', $loyihaiqtisodi->uzlashtirilishi_summasi ?? 0) - preg_replace('/\D/', '', $ilmiyloyiha->sum ?? 0)) }}
                                        </td>
                                        <td class="border">
                                            <textarea name="uzlashtirilishi_sum_i" class="input w-full border mt-2"
                                                required="">{{ $loyihaiqtisodi->uzlashtirilishi_sum_i ?? null }}</textarea>

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
                        action="{{ route('tekshirivchilar.update', $tekshirivchilar->id ?? 1) }}" class="validate-form"
                        enctype="multipart/form-data" novalidate="novalidate">
                        @csrf
                        @method('PUT')
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

                                                    <option value="{{ $tekshirivchilar->kalendar ?? 0 }}">
                                                        {{ $tekshirivchilar->kalendar ?? 0 }}</option>

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
                                                        value="{{ $tekshirivchilar->shart_sharoit_yaratib ?? null }}">
                                                        {{ $tekshirivchilar->shart_sharoit_yaratib ?? null }}</option>

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

                                                    <option value="{{ $tekshirivchilar->yakuniy_natijalar ?? null }}">
                                                        {{ $tekshirivchilar->yakuniy_natijalar ?? null }}</option>

                                                    <option value="Imkoniyat mavjud">Imkoniyat mavjud</option>

                                                    <option value="Imkoniyat mavjud emas">Imkoniyat mavjud emas</option>


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

                                                    <option value="{{ $tekshirivchilar->loyiha_ijrochilari ?? null }}">
                                                        {{ $tekshirivchilar->loyiha_ijrochilari ?? null }}</option>

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
                                                    value="{{ $tekshirivchilar->ekspert_fish ?? null }}"
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
                                                    value="{{ $tekshirivchilar->t_masul ?? null }}"
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

                                                    <option value="{{ $tekshirivchilar->status ?? null }}">
                                                        {{ $tekshirivchilar->status ?? null }}</option>

                                                    <option value="Qo‘shimcha o‘rganish talab etiladi">Qo‘shimcha o‘rganish talab etiladi</option>

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
                                                    class="input w-full border mt-2">{{ $tekshirivchilar->comment ?? null}}</textarea>
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
