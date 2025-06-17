@extends('layouts.admin')

@section('content')
    <div class="content">
        <div class="flex justify-between align-center mt-6 mb-6">

            <h2 class="intro-y text-lg font-medium">{{ $ilmiyloyiha->tashkilot->name }} </h2>

            @role(['super-admin', 'Ekspert'])
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
        @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif
        <div class="intro-y box px-4 py-3  mt-5">

            <div class="nav-tabs flex flex-col sm:flex-row justify-center lg:justify-start">
                <a data-toggle="tab" data-target="#settings" href="javascript:;" class="py-4 sm:mr-8 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-settings w-4 h-4 mr-2">
                        <circle cx="12" cy="12" r="3"></circle>
                        <path
                            d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z">
                        </path>
                    </svg> Созламалар
                </a>
                <a data-toggle="tab" data-target="#change-password" href="javascript:;"
                    class="py-4 sm:mr-8 flex items-center"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-lock w-4 h-4 mr-2">
                        <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                        <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                    </svg> Пароль ўзгартириш
                </a>
                <a data-toggle="tab" data-target="#add-hersh" href="javascript:;"
                    class="py-4 sm:mr-8 flex items-center active"> <svg xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                        stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock w-4 h-4 mr-2">
                        <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                        <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                    </svg> Херш индекси киритиш
                </a>
            </div>
        </div>

        <div class="overflow-x-auto mt-2" style="background-color: white;border-radius:8px;">

            <div class="tab-content mt-5">

                <div class="tab-content__pane" id="settings">

                    <div class="grid grid-cols-12 gap-6">

                        <div class="col-span-12 lg:col-span-12 xxl:col-span-12">
                            <div class="intro-y box ">
                                <div class="p-5">
                                    <table class="table table-bordered">
                                        <tr>
                                            <th class="border" style="text-align: center;" colspan="3">INTELLEKTUAL FAOLIYAT
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
                                                {{ $intellektual->mal_jur_reja ?? "yo'q" }}
                                            </td>
                                            <td class="border">
                                                {{ $intellektual->mal_jur_amalda ?? "yo'q" }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="border" style="text-size:16px;font-weight:700;">
                                                Xorijiy jurnallardagi ilmiy maqolalar soni
                                            </td>
                                            <td class="border">
                                                {{ $intellektual->xor_jur_reja ?? "yo'q" }}
                                            </td>
                                            <td class="border">
                                                {{ $intellektual->xor_jur_amalda ?? "yo'q" }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="border" style="text-size:16px;font-weight:700;">
                                                Web of Science va Scopus bazasidagi xalqaro nashrlardagi maqolalar soni
                                            </td>
                                            <td class="border">
                                                {{ $intellektual->web_jur_reja ?? "yo'q" }}
                                            </td>
                                            <td class="border">
                                                {{ $intellektual->web_jur_amalda ?? "yo'q" }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="border" style="text-size:16px;font-weight:700;">
                                                Tezislar soni
                                            </td>
                                            <td class="border">
                                                {{ $intellektual->tezislar_reja ?? "yo'q" }}
                                            </td>
                                            <td class="border">
                                                {{ $intellektual->tezislar_amalda ?? "yo'q" }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="border" style="text-size:16px;font-weight:700;">
                                                Ilmiy monografiyalar soni
                                            </td>
                                            <td class="border">
                                                {{ $intellektual->ilmiy_mon_reja ?? "yo'q" }}
                                            </td>
                                            <td class="border">
                                                {{ $intellektual->ilmiy_mon_amalda ?? "yo'q" }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="border" style="text-size:16px;font-weight:700;">
                                                Nashr qilingan oʻquv qoʻllanmalari soni
                                            </td>
                                            <td class="border">
                                                {{ $intellektual->nashr_uquv_reja ?? "yo'q" }}
                                            </td>
                                            <td class="border">
                                                {{ $intellektual->nashr_uquv_amalda ?? "yo'q" }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="border" style="text-size:16px;font-weight:700;">
                                                Nashr qilingan darsliklar soni
                                            </td>
                                            <td class="border">
                                                {{ $intellektual->darslik_reja ?? "yo'q" }}
                                            </td>
                                            <td class="border">
                                                {{ $intellektual->darslik_amalda ?? "yo'q" }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="border" style="text-size:16px;font-weight:700;">
                                                Bakalavriat bosqichida tayyorlangan bitiruv malakaviy ishlari soni
                                            </td>
                                            <td class="border">
                                                {{ $intellektual->b_bitiruv_mreja ?? "yo'q" }}
                                            </td>
                                            <td class="border">
                                                {{ $intellektual->b_bitiruv_mamalda ?? "yo'q" }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="border" style="text-size:16px;font-weight:700;">
                                                Tayyorlangan magistrlik dissertatsiyalari soni
                                            </td>
                                            <td class="border">
                                                {{ $intellektual->m_bitiruv_dreja ?? "yo'q" }}
                                            </td>
                                            <td class="border">
                                                {{ $intellektual->m_bitiruv_damalda ?? "yo'q" }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="border" style="text-size:16px;font-weight:700;">
                                                Tayyorlangan doktorlik dissertatsiyalari soni (PhD, DSc)
                                            </td>
                                            <td class="border">
                                                {{ $intellektual->p_bitiruv_dreja ?? "yo'q" }}
                                            </td>
                                            <td class="border">
                                                {{ $intellektual->p_bitiruv_damalda ?? "yo'q" }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="border" style="text-size:16px;font-weight:700;">
                                                Intellektual mulk obyektlari uchun berilgan arizalar soni
                                            </td>
                                            <td class="border">
                                                {{ $intellektual->i_mulk_areja ?? "yo'q" }}
                                            </td>
                                            <td class="border">
                                                {{ $intellektual->i_mulk_aamalda ?? "yo'q" }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="border" style="text-align: center;" colspan="3">IXTIRO UCHUN PATENT
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
                                                {{ $intellektual->ixtiro_olingan_psreja ?? "yo'q" }}
                                            </td>
                                            <td class="border">
                                                {{ $intellektual->ixtiro_olingan_psamalda ?? "yo'q" }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="border" style="text-size:16px;font-weight:700;">
                                                Ixtiro uchun patentga berilgan buyurtmalar soni
                                            </td>
                                            <td class="border">
                                                {{ $intellektual->ixtiro_ber_psreja ?? "yo'q" }}
                                            </td>
                                            <td class="border">
                                                {{ $intellektual->ixtiro_ber_psamalda ?? "yo'q" }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="border" style="text-size:16px;font-weight:700;">
                                                Dasturiy mahsulotga olingan guvohnomalar soni
                                            </td>
                                            <td class="border">
                                                {{ $intellektual->dasturiy_gsreja ?? "yo'q" }}
                                            </td>
                                            <td class="border">
                                                {{ $intellektual->dasturiy_gsamalda ?? "yo'q" }}
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="tab-content__pane" id="change-password">
                        <div class="intro-y box ">
                            <div class="p-5">
                                <table class="table table-bordered">
                                    <tr>
                                        <th class="border" style="text-align: center;" colspan="3">LOYIHANING MUHIM NATIJALARI</th>
                                    </tr>
                                    <tr>
                                        <th class="border" style="width: 50%;">Koʻrsatkichlar</th>
                                        <th class="border" colspan="2">Bajarilishi holatining tahlili</th>
                                    </tr>
                                    <tr>
                                        <td class="border" style="text-size:16px;font-weight:700;">
                                            Hisobot davrida qoʻlga kiritilgan muhim natijalar
                                        </td>
                                        <td class="border" colspan="2">
                                            {{ $loyihaiqtisodi->hisobot_davri ?? "yo'q" }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border" style="text-size:16px;font-weight:700;">
                                            Loyihaning bajarilishi davrida yaratilgan ishlanma (texnologiya) nomi va qisqacha
                                            tavsifi
                                        </td>
                                        <td class="border" colspan="2">
                                            {{ $loyihaiqtisodi->loyihabaj_ishlanma ?? "yo'q" }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border" style="text-size:16px;font-weight:700;">
                                            Ilmiy ishlanma joriy etiladigan (tijoratlashtiriladigan) tarmoq (soha) va kutilayotgan
                                            natijalar (mavjud ehtiyoj, iqtisodiy samaradorlik tahlili)
                                        </td>
                                        <td class="border" colspan="2">
                                            {{ $loyihaiqtisodi->ilmiy_ishlanmalar ?? "yo'q" }}
                                        </td>
                                    </tr>

                                    <tr>
                                        <th class="border" style="text-align: center;" colspan="3">LOYIHANING MOLIYAVIY VA IQTISODIY
                                            KOʻRSATKICHLARI
                                            (AJRATILGAN MABLAGʻLARNING MAQSADLI ISHLATILISHI)
                                        </th>
                                    </tr>
                                    <tr>
                                        <th class="border" style="width: 50%;">Koʻrsatkichlar</th>
                                        <th class="border"><span class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Rejada</th>
                                        <th class="border"><span class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Amalda</th>
                                    </tr>
                                    <tr>
                                        <td class="border" style="text-size:16px;font-weight:700;">
                                            Mehnatga haq toʻlash (5.1.-shakl)
                                        </td>
                                        <td class="border">
                                           {{ $loyihaiqtisodi->mehnat_haq_r ?? "yo'q" }}
                                        </td>
                                        <td class="border">
                                           {{ $loyihaiqtisodi->mehnat_haq_a ?? "yo'q" }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border" style="text-size:16px;font-weight:700;">
                                            Xizmat safarlari xarajatlari (5.2.-shakl)
                                        </td>
                                        <td class="border">
                                           {{ $loyihaiqtisodi->xizmat_saf_r ?? "yo'q" }}
                                        </td>
                                        <td class="border">
                                           {{ $loyihaiqtisodi->xizmat_saf_a ?? "yo'q" }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border" style="text-size:16px;font-weight:700;">
                                            Ilmiy-tadqiqot uchun zarur boʻlgan asbob-uskunalar, texnik vositalar va boshqa
                                            tovar-moddiy boyliklarning xaridi uchun xarajatlar (5.4.-shakl)
                                        </td>
                                        <td class="border">
                                           {{ $loyihaiqtisodi->xarid_xaraja_r ?? "yo'q" }}
                                        </td>
                                        <td class="border">
                                           {{ $loyihaiqtisodi->xarid_xaraja_a ?? "yo'q" }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border" style="text-size:16px;font-weight:700;">
                                            Ilmiy-tadqiqot uchun materiallar va butlovchi qismlarni sotib olish xarajatlari
                                            (5.5.-shakl)
                                        </td>
                                        <td class="border">
                                           {{ $loyihaiqtisodi->mat_butlovchi_r ?? "yo'q" }}
                                        </td>
                                        <td class="border">
                                           {{ $loyihaiqtisodi->mat_butlovchi_a ?? "yo'q" }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border" style="text-size:16px;font-weight:700;">
                                            Loyihani amalga oshirishga jalb etilgan boshqa tashkilotlarning tadqiqot ishlari uchun
                                            toʻlov (5.6.-shakl)
                                        </td>
                                        <td class="border">
                                           {{ $loyihaiqtisodi->jalb_etilgan_r ?? "yo'q" }}
                                        </td>
                                        <td class="border">
                                           {{ $loyihaiqtisodi->jalb_etilgan_a ?? "yo'q" }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border" style="text-size:16px;font-weight:700;">
                                            Loyihani amalga oshirish uchun boshqa xarajatlar (5.7.-shakl)
                                        </td>
                                        <td class="border">
                                           {{ $loyihaiqtisodi->boshqa_xarajat_r ?? "yo'q" }}
                                        </td>
                                        <td class="border">
                                           {{ $loyihaiqtisodi->boshqa_xarajat_a ?? "yo'q" }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border" style="text-size:16px;font-weight:700;">
                                            Tashkilotning ustama xarajatlari (ushbu xarajat turi byudjetdan toʻgʻridan-toʻgʻri va
                                            bazaviy moliyalashtiriladigan ilmiy tashkilotlar tomonidan rejalashtirilmaydi)
                                        </td>
                                        <td class="border">
                                              {{ $loyihaiqtisodi->tashustama_xarajat_r ?? "yo'q" }}
                                        </td>
                                        <td class="border">
                                              {{ $loyihaiqtisodi->tashustama_xarajat_a ?? "yo'q" }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border" style="text-size:16px;font-weight:700;">
                                            Xarid qilingan asbob-uskunalar va boshqa asosiy vositalar xaridining shartnomalari
                                            mavjudligi, dalolatnomasining rasmiylashtirilganligi
                                        </td>
                                        <td class="border" colspan="2">
                                            {{ $loyihaiqtisodi->xarid_qilingan_xarid ?? "yo'q" }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border" style="text-size:16px;font-weight:700;">
                                            Xarid shartnomasining raqami va sanasi
                                        </td>
                                        <td class="border">
                                            {{ $loyihaiqtisodi->xarid_s ?? "yo'q" }}
                                        </td>
                                        <td class="border">
                                            {{ $loyihaiqtisodi->xarid_r ?? "yo'q" }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border" style="text-size:16px;font-weight:700;">
                                            Sotuvchi kompaniyaning nomi
                                        </td>
                                        <td class="border" colspan="2">
                                            {{ $loyihaiqtisodi->xarid_sh ?? "yo'q" }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border" style="text-size:16px;font-weight:700;">
                                            Yetkazib beruvchi yuridik shaxsning nomi
                                        </td>
                                        <td class="border" colspan="2">
                                            {{ $loyihaiqtisodi->yetkb_yuridik_nomi ?? "yo'q" }}
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                </div>
                <div class="tab-content__pane active" id="add-hersh">

                </div>

            </div>

            <table class="table">
                <tbody>
                    <div
                        style="display: flex;justify-content: space-between; border-bottom: 1px solid #e2e8f0; padding-bottom: 20px;">
                        <div style="font-size:18px;font-weight: 400;">
                            {{ $ilmiyloyiha->tashkilot->name . ' Ilmiy loyihalar ' }} xaqida ma’lumot
                        </div>
                        @can('ilmiyloyiha delete edit')
                            <div style="text-align: end;">
                                <a href="{{ route('ilmiyloyiha.edit', ['ilmiyloyiha' => $ilmiyloyiha->id]) }}"
                                    class="button w-24 bg-theme-1 text-white" style="margin-right:20px;">
                                    Tahrirlash
                                </a>
                                <a href="" class="button w-24 bg-theme-6 text-white">
                                    O'chirish
                                </a>
                            </div>
                        @endcan
                        @role('Ekspert')
                        @if ($ilmiyloyiha->id == ($ilmiyloyiha->tekshirivchilars->ilmiy_loyiha_id ?? null))
                            <a href="{{ url('generate-pdf/' . $ilmiyloyiha->id) }}"
                                class="button delete-cancel w-32 border text-gray-700 mr-1">
                                pdf genertsiya
                            </a>
                        @endif
                        @endrole
                    </div>

                    <tr>
                        <th class="border border-b-2 " style="width: 100%;text-align:center;font-size: 16px;" colspan="2">
                            Ma’lumotlar</th>
                    </tr>
                    <tr class="bg-gray-200">
                        <th class="border border-b-2" style="text-align: center;" colspan="2">Loyiha mavzusi</th>
                        <!-- <td class="border " >{{ $ilmiyloyiha->mavzusi }}</td> -->
                    </tr>
                    <tr>
                        <!-- <th class="border border-b-2 ">1</th> -->
                        <!-- <th class="border border-b-2 ">Loyiha mavzusi</th> -->
                        <td class="border " colspan="2" style="text-align: center;">{{ $ilmiyloyiha->mavzusi }}</td>
                    </tr>
                    <tr class="bg-gray-200">
                        <!-- <th class="border border-b-2 ">10</th> -->
                        <th class="border border-b-2 ">Loyiha rahbari</th>
                        <th class="border border-b-2 ">Loyihani bajaruvchi tashkilot</th>
                    </tr>
                    <tr>
                        <!-- <th class="border border-b-2 ">2</th> -->
                        <td class="border ">{{ $ilmiyloyiha->rahbar_name }}</td>
                        <td class="border ">{{ $ilmiyloyiha->tashkilot->name_qisqachasi }}</td>
                    </tr>
                    <tr class="bg-gray-200">
                        <!-- <th class="border border-b-2 ">2</th> -->
                        <th class="border border-b-2 ">Loyiha turi</th>
                        <th class="border border-b-2 ">Loyiha dasturi</th>
                    </tr>
                    <tr>
                        <!-- <th class="border border-b-2 ">3</th> -->
                        <td class="border ">{{ $ilmiyloyiha->turi }}</td>
                        <td class="border ">{{ $ilmiyloyiha->dastyri }}</td>
                    </tr>
                    <tr class="bg-gray-200">
                        <!-- <th class="border border-b-2 ">6</th> -->
                        <th class="border border-b-2 ">Loyihani amalga oshirish muddati (yil)</th>
                        <td class="border ">Tuzilgan shartnoma summasi (ming so‘mda)</td>
                    </tr>
                    <tr>
                        <!-- <th class="border border-b-2 ">4</th> -->
                        <th class="border border-b-2 ">{{ $ilmiyloyiha->muddat }}</th>
                        <td class="border ">{{ $ilmiyloyiha->sum }}</td>
                    </tr>
                    <tr class="bg-gray-200">
                        <!-- <th class="border border-b-2 ">7</th> -->
                        <th class="border border-b-2 "> Loyihaning boshlanish sanasi </th>
                        <th class="border border-b-2 "> Loyihaning tugashi sanasi</th>
                    </tr>
                    <tr>
                        <!-- <th class="border border-b-2 ">8</th> -->
                        <td class="border ">{{ $ilmiyloyiha->bosh_sana }}</td>
                        <td class="border ">{{ $ilmiyloyiha->tug_sana }}</td>
                    </tr>
                    <tr class="bg-gray-200">
                        <!-- <th class="border border-b-2 ">11</th> -->
                        <th class="border border-b-2 ">Tuzilgan shartnoma Raqami </th>
                        <th class="border border-b-2 ">Tuzilgan shartnoma sanasi </th>
                    </tr>

                    <tr>
                        <!-- <th class="border border-b-2 ">12</th> -->
                        <td class="border ">{{ $ilmiyloyiha->raqami }}</td>
                        <td class="border ">{{ $ilmiyloyiha->sanasi }}</td>
                    </tr>
                    <tr class="bg-gray-200">
                        <!-- <th class="border border-b-2 ">9</th> -->
                        <th class="border border-b-2 ">Fan yo‘nalish</th>
                        <th class="border border-b-2 ">Olingan asosiy natija </th>
                    </tr>
                    <tr>
                        <!-- <th class="border border-b-2 ">14</th> -->
                        <td class="border ">{{ $ilmiyloyiha->pan_yunalish }}</td>
                        <td class="border " style="width: 50%;">{{ $ilmiyloyiha->olingan_natija }} </td>
                    </tr>
                    <tr class="bg-gray-200">
                        <!-- <th class="border border-b-2 ">4</th> -->
                        <th class="border border-b-2 ">Qo‘shma loyiha bo‘yicha hamkor tashkilot</th>
                        <th class="border border-b-2 "> Xalqaro qo‘shma loyihalardagi hamkor davlat</th>
                    </tr>
                    <tr>
                        <!-- <th class="border border-b-2 ">5</th> -->
                        <td class="border ">{{ $ilmiyloyiha->q_hamkor_tashkilot }}</td>
                        <td class="border ">{{ $ilmiyloyiha->hamkor_davlat }}</td>
                    </tr>
                    <tr class="bg-gray-200">
                        <!-- <th class="border border-b-2 ">15</th> -->
                        <th class="border border-b-2 ">Joriy etish holati </th>
                        <th class="border border-b-2 ">Tijoratlashtirish holati</th>
                    </tr>
                    <tr>
                        <!-- <th class="border border-b-2 ">16</th> -->
                        <td class="border ">{{ $ilmiyloyiha->joriy_holati }} </td>
                        <td class="border ">{{ $ilmiyloyiha->tijoratlashtirish }} </td>
                    </tr>

                    <tr class="bg-gray-200">
                        <!-- <th class="border border-b-2 ">15</th> -->
                        <th class="border border-b-2 ">Biriktirigan labaratoriya </th>
                        <th class="border border-b-2 ">Loyiha mavzusi (rus tilda)</th>
                    </tr>
                    <tr>
                        <!-- <th class="border border-b-2 ">16</th> -->
                        <td class="border ">{{ $ilmiyloyiha->laboratory->name ?? "yo'q" }} </td>
                        <td class="border ">{{ $ilmiyloyiha->mavzusi_ru }} </td>
                    </tr>

                    <tr class="bg-gray-200">
                        <!-- <th class="border border-b-2 ">15</th> -->
                        <th class="border border-b-2 ">Ijrochi tashkilot </th>
                        <th class="border border-b-2 ">Hamrahbar F.I.Sh</th>
                    </tr>

                    <tr>
                        <!-- <th class="border border-b-2 ">16</th> -->
                        <td class="border ">{{ $ilmiyloyiha->ijrochi_tashkilot }} </td>
                        <td class="border ">{{ $ilmiyloyiha->hamrahbar_fish }} </td>
                    </tr>

                    <tr class="bg-gray-200">
                        <!-- <th class="border border-b-2 ">15</th> -->
                        <th class="border border-b-2 "> Hamrahbar Ish joyi </th>
                        <th class="border border-b-2 ">Hamrahbar Lavozimi </th>
                    </tr>

                    <tr>
                        <!-- <th class="border border-b-2 ">16</th> -->
                        <td class="border ">{{ $ilmiyloyiha->hamr_ishjoyi }} </td>
                        <td class="border ">{{ $ilmiyloyiha->hamr_lavozimi }} </td>
                    </tr>

                    <tr class="bg-gray-200">
                        <!-- <th class="border border-b-2 ">15</th> -->
                        <th class="border border-b-2 ">Hamrahbar Davlati </th>
                        <th class="border border-b-2 "> Joriy yil uchun ajratilgan mablag‘ (so‘m)</th>
                    </tr>

                    <tr>
                        <!-- <th class="border border-b-2 ">16</th> -->
                        <td class="border ">{{ $ilmiyloyiha->hamr_davlati }} </td>
                        <td class="border ">{{ $ilmiyloyiha->joyyilajratilgan_mablag }} </td>
                    </tr>

                    <tr class="bg-gray-200">
                        <!-- <th class="border border-b-2 ">15</th> -->
                        <th class="border border-b-2 ">Shtat birligi </th>
                        <th class="border border-b-2 ">Ijrochilar soni </th>
                    </tr>

                    <tr>
                        <!-- <th class="border border-b-2 ">16</th> -->
                        <td class="border ">{{ $ilmiyloyiha->shtat_birligi }} </td>
                        <td class="border ">{{ $ilmiyloyiha->ijrochilar_soni }} </td>
                    </tr>

                    <tr class="bg-gray-200">
                        <!-- <th class="border border-b-2 ">15</th> -->
                        <th class="border border-b-2 "> Ilmiy jamoaning o‘rtacha yoshi</th>
                        <th class="border border-b-2 "> Moddiy-texnik bazaga yo‘naltirilgan mablag‘lar hajmi (so‘m) </th>
                    </tr>

                    <tr>
                        <!-- <th class="border border-b-2 ">16</th> -->
                        <td class="border ">{{ $ilmiyloyiha->ortacha_yoshi }} </td>
                        <td class="border ">{{ $ilmiyloyiha->moddiy_texnik_mablaglar }} </td>
                    </tr>

                    <tr class="bg-gray-200">
                        <!-- <th class="border border-b-2 ">15</th> -->
                        <th class="border border-b-2 ">Jami summaga nisbatan (%da) </th>
                        <th class="border border-b-2 ">Jami chop etilgan nashr ishlari soni (Joriy yil uchun) </th>
                    </tr>

                    <tr>
                        <!-- <th class="border border-b-2 ">16</th> -->
                        <td class="border ">{{ $ilmiyloyiha->jami_summaga_nisbatan }} </td>
                        <td class="border ">{{ $ilmiyloyiha->jami_chop_jami }} </td>
                    </tr>

                    <tr class="bg-gray-200">
                        <!-- <th class="border border-b-2 ">15</th> -->
                        <th class="border border-b-2 ">Mahalliy ilmiy jurnallardagi maqolalar soni (Joriy yil uchun) </th>
                        <th class="border border-b-2 ">Mahalliy ilmiy jurnallardagi maqolalar soni (Jami) </th>
                    </tr>

                    <tr>
                        <!-- <th class="border border-b-2 ">16</th> -->
                        <td class="border ">{{ $ilmiyloyiha->mahalliymaqola_joriyyil }} </td>
                        <td class="border ">{{ $ilmiyloyiha->mahalliymaqol_jami }} </td>
                    </tr>


                    <tr class="bg-gray-200">
                        <!-- <th class="border border-b-2 ">15</th> -->
                        <th class="border border-b-2 "> Xorijiy jurnallardagi ilmiy maqolalar soni (Joriy yil uchun)</th>
                        <th class="border border-b-2 "> Xorijiy jurnallardagi ilmiy maqolalar soni (Jami)</th>
                    </tr>

                    <tr>
                        <!-- <th class="border border-b-2 ">16</th> -->
                        <td class="border ">{{ $ilmiyloyiha->xorijiymaqola_joriyyil }} </td>
                        <td class="border ">{{ $ilmiyloyiha->xorijiymaqola_jami }} </td>
                    </tr>


                    <tr class="bg-gray-200">
                        <!-- <th class="border border-b-2 ">15</th> -->
                        <th class="border border-b-2 ">Web of Science va Scopus bazasidagi xalqaro nashrlardagi maqolalar
                            soni (Joriy yil uchun) </th>
                        <th class="border border-b-2 ">Web of Science va Scopus bazasidagi xalqaro nashrlardagi maqolalar
                            soni (Jami) </th>
                    </tr>

                    <tr>
                        <!-- <th class="border border-b-2 ">16</th> -->
                        <td class="border ">{{ $ilmiyloyiha->scopus_joriyyil }} </td>
                        <td class="border ">{{ $ilmiyloyiha->scopus_jami }} </td>
                    </tr>

                    <tr class="bg-gray-200">
                        <!-- <th class="border border-b-2 ">15</th> -->
                        <th class="border border-b-2 ">Tezislar soni (Joriy yil uchun) </th>
                        <th class="border border-b-2 ">Tezislar soni (Jami) </th>
                    </tr>

                    <tr>
                        <!-- <th class="border border-b-2 ">16</th> -->
                        <td class="border ">{{ $ilmiyloyiha->tezislar_joriyyil }} </td>
                        <td class="border ">{{ $ilmiyloyiha->tezislar_jami }} </td>
                    </tr>

                    <tr class="bg-gray-200">
                        <!-- <th class="border border-b-2 ">15</th> -->
                        <th class="border border-b-2 ">Ilmiy monografiyalar soni (Joriy yil uchun) </th>
                        <th class="border border-b-2 "> Ilmiy monografiyalar soni (Jami) </th>
                    </tr>

                    <tr>
                        <!-- <th class="border border-b-2 ">16</th> -->
                        <td class="border ">{{ $ilmiyloyiha->ilmiy_mon_joriyyil }} </td>
                        <td class="border ">{{ $ilmiyloyiha->ilmiy_mon_jami }} </td>
                    </tr>

                    <tr class="bg-gray-200">
                        <!-- <th class="border border-b-2 ">15</th> -->
                        <th class="border border-b-2 ">Olingan patentlar soni (Joriy yil uchun) </th>
                        <th class="border border-b-2 ">Olingan patentlar soni (Jami) </th>
                    </tr>

                    <tr>
                        <!-- <th class="border border-b-2 ">16</th> -->
                        <td class="border ">{{ $ilmiyloyiha->olinganpatent_joriyyil }} </td>
                        <td class="border ">{{ $ilmiyloyiha->olinganpatent_jami }} </td>
                    </tr>


                    <tr class="bg-gray-200">
                        <!-- <th class="border border-b-2 ">15</th> -->
                        <th class="border border-b-2 "> Dasturiy maxsulotga guvoxnomalar soni (Joriy yil uchun)</th>
                        <th class="border border-b-2 ">Dasturiy maxsulotga guvoxnomalar soni (Jami) </th>
                    </tr>

                    <tr>
                        <!-- <th class="border border-b-2 ">16</th> -->
                        <td class="border ">{{ $ilmiyloyiha->dasturiy_maxguv_joriyyil }} </td>
                        <td class="border ">{{ $ilmiyloyiha->dasturiy_maxguv_jami }} </td>
                    </tr>

                    <tr class="bg-gray-200">
                        <!-- <th class="border border-b-2 ">15</th> -->
                        <th class="border border-b-2 ">Hisobot davrida qo‘lga kiritlgan muhim natijalar </th>
                        <th class="border border-b-2 ">Loyiha yakunida yaratilgan ishlanma (texnologiya) nomi va qisqacha
                            tavsifi </th>
                    </tr>

                    <tr>
                        <!-- <th class="border border-b-2 ">16</th> -->
                        <td class="border ">{{ $ilmiyloyiha->hisobot_davrida_natijalar }} </td>
                        <td class="border ">{{ $ilmiyloyiha->loyiha_yakunida }} </td>
                    </tr>

                    <tr class="bg-gray-200">
                        <!-- <th class="border border-b-2 ">15</th> -->
                        <th class="border border-b-2 ">Ilmiy ishlanma joriy etiladigan (tijoratlashtiriladigan) tarmoq
                            (soha) va kutilayotgan natijalar (mavjud ehtiyoj, iqtisodiy samaradorlik ko‘rsatkichlari
                            tahlili) </th>
                        <th class="border border-b-2 ">Patentga berilgan buyurtmalar soni </th>
                    </tr>

                    <tr>
                        <!-- <th class="border border-b-2 ">16</th> -->
                        <td class="border ">{{ $ilmiyloyiha->ilmiy_ishlanma }} </td>
                        <td class="border ">{{ $ilmiyloyiha->patentga_berilgansoni }} </td>
                    </tr>

                    <tr class="bg-gray-200">
                        <!-- <th class="border border-b-2 ">15</th> -->
                        <th class="border border-b-2 ">Loyiha rahbari ilmiy darajasi</th>
                        <th class="border border-b-2 ">Loyiha rahbari ilmiy unvoni </th>
                    </tr>

                    <tr>
                        <!-- <th class="border border-b-2 ">16</th> -->
                        <td class="border ">{{ $ilmiyloyiha->rahbariilmiy_unvoni }} </td>
                        <td class="border ">{{ $ilmiyloyiha->rahbariilmiy_darajasi }} </td>
                    </tr>

                    <tr class="bg-gray-200">
                        <!-- <th class="border border-b-2 ">15</th> -->
                        <th class="border border-b-2 ">Loyiha rahbari lavozimi</th>
                        <th class="border border-b-2 "> Savolnoma</th>
                    </tr>

                    <tr>
                        <!-- <th class="border border-b-2 ">16</th> -->
                        <td class="border ">{{ $ilmiyloyiha->r_lavozimi }} </td>
                        <td class="border ">
                            @if ($ilmiyloyiha->savolnoma)
                                <a href="{{ asset('storage/' . $ilmiyloyiha->savolnoma) }}"
                                    class="button  bg-theme-1 text-white">Faylni ko'rish</a>
                            @endif
                        </td>
                    </tr>

                    <tr class="bg-gray-200">
                        <!-- <th class="border border-b-2 ">15</th> -->
                        <th class="border border-b-2 ">Tashkilotingiz tomonidan davlat buyurtmasi asosida amalga
                            oshirilayotgan ilmiy tadqiqot loyihalarining asosiy natijalari to‘g‘risida
                            MA’LUMOT</th>
                        <th class="border border-b-2 "> Asoslovchi fayl </th>
                    </tr>

                    <tr>
                        <!-- <th class="border border-b-2 ">16</th> -->
                        <td class="border ">
                            @if ($ilmiyloyiha->malumotnoma)
                                <a href="{{ asset('storage/' . $ilmiyloyiha->malumotnoma) }}"
                                    class="button  bg-theme-1 text-white">Faylni ko'rish</a>
                            @endif
                        </td>
                        <td class="border ">
                            @if ($ilmiyloyiha->file)
                                <a href="{{ asset('storage/' . $ilmiyloyiha->file) }}"
                                    class="button  bg-theme-1 text-white">Faylni ko'rish</a>
                            @endif
                        </td>
                    </tr>

                    <tr class="bg-gray-200">
                        <!-- <th class="border border-b-2 ">15</th> -->
                        <th class="border border-b-2 ">Ilmiy loyiha 5% moliyalashtirilganmi</th>
                        <th class="border border-b-2 "> </th>
                    </tr>

                    <tr>
                        <!-- <th class="border border-b-2 ">16</th> -->
                        <td class="border ">
                            {{ $ilmiyloyiha->moliyalashtirilganmi }}
                        </td>
                        <td class="border ">
                        </td>
                    </tr>


                </tbody>
            </table>
            <table class="table">
                <tbody>
                    <tr>
                        <th colspan="8" class="border border-b-2 " style="text-align: center;">Umumiy ajratilgan
                            mablag‘ (ming so‘mda)</th>
                    </tr>
                    <tr class="bg-gray-200">
                        <th class="border border-b-2 ">2017 yil</th>
                        <th class="border border-b-2 ">2018 yil</th>
                        <th class="border border-b-2 ">2019 yil</th>
                        <th class="border border-b-2 ">2020 yil</th>
                        <th class="border border-b-2 ">2021 yil</th>
                        <th class="border border-b-2 ">2022 yil</th>
                        <th class="border border-b-2 ">2023 yil</th>
                        <th class="border border-b-2 ">2024 yil</th>
                    </tr>
                    <tr>
                        <td class="border border-b-2 ">{{ $ilmiyloyiha->umumiyyil->y2017 ?? 0 }}</td>
                        <td class="border border-b-2 ">{{ $ilmiyloyiha->umumiyyil->y2018 ?? 0 }}</td>
                        <td class="border border-b-2 ">{{ $ilmiyloyiha->umumiyyil->y2019 ?? 0 }}</td>
                        <td class="border border-b-2 ">{{ $ilmiyloyiha->umumiyyil->y2020 ?? 0 }}</td>
                        <td class="border border-b-2 ">{{ $ilmiyloyiha->umumiyyil->y2021 ?? 0 }}</td>
                        <td class="border border-b-2 ">{{ $ilmiyloyiha->umumiyyil->y2022 ?? 0 }}</td>
                        <td class="border border-b-2 ">{{ $ilmiyloyiha->umumiyyil->y2023 ?? 0 }}</td>
                        <td class="border border-b-2 ">{{ $ilmiyloyiha->umumiyyil->y2024 ?? 0 }}</td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>

    @role('Ekspert')
    <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2"
        style="background: white; padding: 20px 20px; border-radius: 4px">
        <div class="w-full mt-3 sm:mt-0 sm:ml-auto md:ml-0">
            <form id="science-paper-create-form" method="POST" action="{{ route('tekshirivchilar.store') }}"
                class="validate-form" enctype="multipart/form-data" novalidate="novalidate">
                @csrf
                <div class="grid grid-cols-12 gap-2">
                    <input type="hidden" name="ilmiyloyiha_id" value="{{ $ilmiyloyiha->id }}">

                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"> <span
                                class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Status
                        </label>
                        <select name="status" id="science-sub-category" class="input border w-full mt-2" required="">

                            <option value=""></option>

                            <option value="Qoniqarli">Qoniqarli</option>

                            <option value="Qoniqarsiz">Qoniqarsiz</option>


                        </select><br>

                        @error('muddat')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="w-full col-span-6 ">
                        <label class="flex flex-col sm:flex-row"> <span
                                class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Izoh</label>
                        <textarea name="comment" id="" class="input w-full border mt-2" cols="5" rows="5"></textarea>
                    </div>
                </div>

            </form><div class="px-5 pb-5 text-center mt-4">
                <a href="{{ route('ilmiyloyiha.index') }}" class="button delete-cancel w-32 border text-gray-700 mr-1">
                    Bekor qilish
                </a>
                <button type="submit" form="science-paper-create-form"
                    class="update-confirm button w-24 bg-theme-1 text-white">
                    Tasdiqlash
                </button>
            </div>
        </div>
    </div>
    @endrole

    </div>
@endsection
