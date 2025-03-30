@extends('layouts.admin')

@section('content')
    <div class="content">
        <div class="flex justify-between align-center mt-10">

            <h2 class="intro-y text-lg font-medium">{{ $ilmiyloyiha->tashkilot->name }} </h2>

            <a href="{{ url('generate-pdf/' . $ilmiyloyiha->id) }}" class="button delete-cancel  border text-gray-700 mr-1">
                Xulosani genertsiya qilish
            </a>
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

        <div class="intro-y box px-4   mt-5">

            <div class="nav-tabs flex flex-col sm:flex-row justify-center lg:justify-start">
                <a data-toggle="tab" data-target="#add-hersh" href="javascript:;"
                    class="py-4 sm:mr-8 flex items-center active">
                    LOYIHANING ASOSIY KO'RSATKICHLARI
                </a>
                <a data-toggle="tab" data-target="#settings" href="javascript:;" class="py-4 sm:mr-8 flex items-center">
                    INTELLEKTUAL FAOLIYAT NATIJALARI
                </a>
                <a data-toggle="tab" data-target="#change-password" href="javascript:;"
                    class="py-4 sm:mr-8 flex items-center">
                     LOYIHANING MUHIM NATIJALARI
                </a>

                <a data-toggle="tab" data-target="#add-expert" href="javascript:;"
                    class="py-4 sm:mr-8 flex items-center">
                    EKSPERT XULOSASI
                </a>

            </div>
        </div>
        @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif
        <div class="overflow-x-auto mt-2" style="background-color: white;border-radius:8px;">

            <div class="tab-content mt-5">

                <div class="tab-content__pane" id="settings">

                    <div class="grid grid-cols-12 gap-6">

                        <div class="col-span-12 lg:col-span-12 xxl:col-span-12">
                            <div class="intro-y box ">
                                <div class="p-5">
                                    <table class="table table-bordered">
                                        <tr>
                                            <th class="border" style="text-align: center;" colspan="6">INTELLEKTUAL FAOLIYAT
                                                NATIJALARI</th>
                                        </tr>
                                        <tr>
                                            <th class="border" style="width: 40px;">T/r</th>
                                            <th class="border">Koʻrsatkichlar</th>
                                            <th class="border">Rejada</th>
                                            <th class="border">Amalda</th>
                                            <th class="border">Parqi</th>
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
                                            <td class="border">{{ ($intellektual->mal_jur_reja ?? 0) - ($intellektual->mal_jur_amalda ?? 0)}}</td>
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
                                            <td class="border">{{ ($intellektual->xor_jur_reja ?? 0) - ($intellektual->xor_jur_amalda ?? 0)}}</td>
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
                                            <td class="border">{{ ($intellektual->web_jur_reja ?? 0) - ($intellektual->web_jur_amalda ?? 0)}}</td>
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
                                            <td class="border">{{ ($intellektual->tezislar_reja ?? 0) - ($intellektual->tezislar_amalda ?? 0)}}</td>
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
                                            <td class="border">{{ ($intellektual->ilmiy_mon_reja ?? 0) - ($intellektual->ilmiy_mon_amalda ?? 0) }}</td>
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
                                            <td class="border">{{ ($intellektual->nashr_uquv_reja ?? 0) - ($intellektual->nashr_uquv_amalda ?? 0) }}</td>
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
                                            <td class="border">{{ ($intellektual->darslik_reja ?? 0) - ($intellektual->darslik_amalda ?? 0) }}</td>
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
                                            <td class="border">{{ ($intellektual->b_bitiruv_mreja ?? 0) - ($intellektual->b_bitiruv_mamalda ?? 0) }}</td>
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
                                            <td class="border">{{ ($intellektual->m_bitiruv_dreja ?? 0) - ($intellektual->m_bitiruv_damalda ?? 0) }}</td>
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
                                            <td class="border">{{ ($intellektual->p_bitiruv_dreja ?? 0) - ($intellektual->p_bitiruv_damalda ?? 0) }}</td>
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
                                            <td class="border">{{ ($intellektual->i_mulk_areja ?? 0) - ($intellektual->i_mulk_aamalda ?? 0) }}</td>
                                            <td class="border">{{ $intellektual->i_mulk_izoh ?? null }}</td>
                                        </tr>
                                        <tr>
                                            <th class="border" style="text-align: center;" colspan="6">IXTIRO UCHUN PATENT
                                                VA DASTURIY TAʼMINOTLAR</th>
                                        </tr>
                                        <tr>
                                            <th class="border" style="width: 40px;">T/r</th>
                                            <th class="border">Koʻrsatkichlar</th>
                                            <th class="border">Rejada</th>
                                            <th class="border">Amalda</th>
                                            <th class="border">Parqi</th>
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
                                            <td class="border">{{ ($intellektual->ixtiro_olingan_psreja ?? 0) - ($intellektual->ixtiro_olingan_psamalda ?? 0)}}</td>
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
                                            <td class="border">{{ ($intellektual->ixtiro_ber_psreja ?? 0) - ($intellektual->ixtiro_ber_psamalda ?? 0)}}</td>
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
                                            <td class="border">{{ ($intellektual->dasturiy_gsreja ?? 0) - ($intellektual->dasturiy_gsamalda ?? 0)}}</td>
                                            <td class="border">{{ $intellektual->dasturiy_izoh ?? null }}</td>
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
                                    <th class="border" style="width: 40px;">T/r</th>
                                    <th class="border" style="text-align: center;" colspan="5">LOYIHANING MUHIM NATIJALARI</th>
                                </tr>
                                <tr>
                                    <td class="border">1.</td>
                                    <th class="border" style="width: 50%;">Koʻrsatkichlar</th>
                                    <th class="border" colspan="3">Bajarilishi holatining tahlili</th>
                                    <th class="border">Izoh</th>
                                </tr>
                                <tr>
                                    <td class="border">2.</td>
                                    <td class="border" style="text-size:14px;">
                                        Hisobot davrida qoʻlga kiritilgan muhim natijalar
                                    </td>
                                    <td class="border" colspan="3">
                                        {{ $loyihaiqtisodi->hisobot_davri ?? null }}
                                    </td>
                                    <td class="border">{{ $loyihaiqtisodi->hisobot_davri_i ?? null}}</td>
                                </tr>
                                <tr>
                                    <td class="border">3.</td>
                                    <td class="border" style="text-size:14px;">
                                        Loyihaning bajarilishi davrida yaratilgan ishlanma (texnologiya) nomi va qisqacha
                                        tavsifi
                                    </td>
                                    <td class="border" colspan="3">
                                        {{ $loyihaiqtisodi->loyihabaj_ishlanma ?? null }}
                                    </td>
                                    <td class="border">{{ $loyihaiqtisodi->loyihabaj_ishlanma_i ?? null}}</td>
                                </tr>
                                <tr>
                                    <td class="border">4.</td>
                                    <td class="border" style="text-size:14px;">
                                        Ilmiy ishlanma joriy etiladigan (tijoratlashtiriladigan) tarmoq (soha) va
                                        kutilayotgan
                                        natijalar (mavjud ehtiyoj, iqtisodiy samaradorlik tahlili)
                                    </td>
                                    <td class="border" colspan="3">
                                        {{ $loyihaiqtisodi->ilmiy_ishlanmalar ?? null }}
                                    </td>
                                    <td class="border">{{ $loyihaiqtisodi->ilmiy_ishlanmalar_i ?? null}}</td>
                                </tr>

                                <tr>
                                    <th class="border" style="text-align: center;" colspan="6">LOYIHANING MOLIYAVIY VA
                                        IQTISODIY
                                        KOʻRSATKICHLARI
                                        (AJRATILGAN MABLAGʻLARNING MAQSADLI ISHLATILISHI)
                                    </th>
                                </tr>
                                <tr>
                                    <td class="border">1.</td>
                                    <th class="border" style="width: 50%;">Koʻrsatkichlar</th>
                                    <th class="border">Rejada</th>
                                    <th class="border">Amalda</th>
                                    <th class="border">Parqi</th>
                                    <th class="border">Izoh</th>
                                </tr>
                                <tr>
                                    <td class="border">2.</td>
                                    <td class="border" style="text-size:14px;">
                                        Mehnatga haq toʻlash (5.1.-shakl)
                                    </td>
                                    <td class="border">
                                        {{ $loyihaiqtisodi->mehnat_haq_r ?? null }}
                                    </td>
                                    <td class="border">
                                        {{ $loyihaiqtisodi->mehnat_haq_a ?? null }}
                                    </td>
                                    <td class="border">{{ ($loyihaiqtisodi->mehnat_haq_r ?? 0) - ($loyihaiqtisodi->mehnat_haq_a ?? 0) }}</td>
                                    <td class="border">{{ $loyihaiqtisodi->mehnat_haq_i ?? null}}</td>
                                </tr>
                                <tr>
                                    <td class="border">3.</td>
                                    <td class="border" style="text-size:14px;">
                                        Xizmat safarlari xarajatlari (5.2.-shakl)
                                    </td>
                                    <td class="border">
                                        {{ $loyihaiqtisodi->xizmat_saf_r ?? null }}
                                    </td>
                                    <td class="border">
                                        {{ $loyihaiqtisodi->xizmat_saf_a ?? null }}
                                    </td>
                                    <td class="border">{{ ($loyihaiqtisodi->xizmat_saf_r ?? 0) - ($loyihaiqtisodi->xizmat_saf_a ?? 0) }}</td>
                                    <td class="border">{{ $loyihaiqtisodi->xizmat_saf_i ?? null}}</td>
                                </tr>
                                <tr>
                                    <td class="border">4.</td>
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
                                    <td class="border">{{ ($loyihaiqtisodi->xarid_xaraja_r ?? 0) - ($loyihaiqtisodi->xarid_xaraja_a ?? 0)}}</td>
                                    <td class="border">{{ $loyihaiqtisodi->xarid_xaraja_i ?? null}}</td>
                                </tr>
                                <tr>
                                    <td class="border">5.</td>
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
                                    <td class="border">{{ ($loyihaiqtisodi->mat_butlovchi_r ?? 0) - ($loyihaiqtisodi->mat_butlovchi_a ?? 0)}}</td>
                                    <td class="border">{{ $loyihaiqtisodi->mat_butlovchi_i ?? null}}</td>
                                </tr>
                                <tr>
                                    <td class="border">6.</td>
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
                                    <td class="border">{{ ($loyihaiqtisodi->jalb_etilgan_r ?? 0) - ($loyihaiqtisodi->jalb_etilgan_a ?? 0) }}</td>
                                    <td class="border">{{ $loyihaiqtisodi->jalb_etilgan_i ?? null}}</td>
                                </tr>
                                <tr>
                                    <td class="border">7.</td>
                                    <td class="border" style="text-size:14px;">
                                        Loyihani amalga oshirish uchun boshqa xarajatlar (5.7.-shakl)
                                    </td>
                                    <td class="border">
                                        {{ $loyihaiqtisodi->boshqa_xarajat_r ?? null }}
                                    </td>
                                    <td class="border">
                                        {{ $loyihaiqtisodi->boshqa_xarajat_a ?? null }}
                                    </td>
                                    <td class="border">{{ ($loyihaiqtisodi->boshqa_xarajat_r ?? 0) - ($loyihaiqtisodi->boshqa_xarajat_a ?? 0) }}</td>
                                    <td class="border">{{ $loyihaiqtisodi->boshqa_xarajat_i ?? null}}</td>
                                </tr>
                                <tr>
                                    <td class="border">8.</td>
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
                                    <td class="border">{{ ($loyihaiqtisodi->tashustama_xarajat_r ?? 0) - ($loyihaiqtisodi->tashustama_xarajat_a ?? 0) }}</td>
                                    <td class="border">{{ $loyihaiqtisodi->tashustama_xarajat_i ?? null}}</td>
                                </tr>
                                <tr>
                                    <td class="border">9.</td>
                                    <td class="border" style="text-size:14px;">
                                        Xarid qilingan asbob-uskunalar va boshqa asosiy vositalar xaridining shartnomalari
                                        mavjudligi, dalolatnomasining rasmiylashtirilganligi
                                    </td>
                                    <td class="border" colspan="3">
                                        {{ $loyihaiqtisodi->xarid_qilingan_xarid ?? null }}
                                    </td>
                                    <td  rowspan="4" class="border">{{ $loyihaiqtisodi->xarid_qilingan_i ?? null}}</td>
                                </tr>
                                <tr>
                                    <td class="border">10.</td>
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
                                    <td class="border">11.</td>
                                    <td class="border" style="text-size:14px;">
                                        Sotuvchi kompaniyaning nomi
                                    </td>
                                    <td class="border" colspan="3">
                                        {{ $loyihaiqtisodi->xarid_sh ?? null }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="border">12.</td>
                                    <td class="border" style="text-size:14px;">
                                        Yetkazib beruvchi yuridik shaxsning nomi
                                    </td>
                                    <td class="border" colspan="3">
                                        {{ $loyihaiqtisodi->yetkb_yuridik_nomi ?? null }}
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="tab-content__pane active" id="add-hersh">
                    <div class="p-5">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th class="border" style="width: 40px;">T/r</th>
                                    <th  colspan="2" class="border" style="text-align: center;">LOYIHANING ASOSIY KO'RSATKICHLARI</th>
                                </tr>
                                <tr>
                                    <td class="border">1.</td>
                                    <td class="border">Loyiha mavzusi</td>
                                    <td class="border">{{ $ilmiyloyiha->mavzusi }}, {{ $ilmiyloyiha->mavzusi_ru }}</td>
                                </tr>
                                <tr>
                                    <td class="border">2.</td>
                                    <td class="border">Loyiha turi</td>
                                    <td class="border">{{ $ilmiyloyiha->turi }}</td>
                                </tr>
                                <tr>
                                    <td class="border">3.</td>
                                    <td class="border">Loyiha shifri</td>
                                    <td class="border">{{ $ilmiyloyiha->raqami }}</td>
                                </tr>
                                <tr>
                                    <td class="border">4.</td>
                                    <td class="border">Shartnoma raqami va sanasi</td>
                                    <td class="border">{{ $ilmiyloyiha->raqami }},  {{ $ilmiyloyiha->sanasi }}</td>
                                </tr>
                                <tr>
                                    <td class="border">5.</td>
                                    <td class="border">Bajarilish muddati</td>
                                    <td class="border">{{ $ilmiyloyiha->bosh_sana . ' - ' . $ilmiyloyiha->tug_sana }} yillar</td>
                                </tr>
                                <tr>
                                    <td class="border">6.</td>
                                    <td class="border">Ijrochi tashkilot</td>
                                    <td class="border">{{ $ilmiyloyiha->ijrochi_tashkilot }}</td>
                                </tr>
                                <tr>
                                    <td class="border">7.</td>
                                    <td class="border">Loyihaning umumiy qiymati, mln.soʻm</td>
                                    <td class="border">{{ $ilmiyloyiha->sum }}</td>
                                </tr>
                                <tr>
                                    <td class="border">8.</td>
                                    <td class="border">Joriy yil uchun ajratilgan mablagʻ, mln.soʻm</td>
                                    <td class="border">0</td>
                                </tr>
                                <tr>
                                    <td class="border">9.</td>
                                    <td class="border">Loyiha moddiy-texnik bazasi uchun yoʻnaltirilgan mablagʻ, mln.soʻm</td>
                                    <td class="border">{{ $ilmiyloyiha->moddiy_texnik_mablaglar }}</td>
                                </tr>
                                <tr>
                                    <td class="border">10.</td>
                                    <td class="border">Jami summaga nisbatan, foiz</td>
                                    <td class="border">0</td>
                                </tr>

                                <tr>
                                    <th colspan="3" class="border" style="text-align: center;">II. LOYIHANING RAHBARI VA IJROCHILARI</th>
                                </tr>
                                <tr>
                                    <td class="border">11.</td>
                                    <td class="border"> Loyihaning amaldagi rahbarining familiyasi, ismi, sharifi</td>
                                    <td class="border">{{ $ilmiyloyiha->rahbar_name }}</td>
                                </tr>
                                <tr>
                                    <td class="border">12.</td>
                                    <td class="border">Ilmiy darajasi va unvoni</td>
                                    <td class="border">{{ $ilmiyloyiha->rahbariilmiy_darajasi }} , {{ $ilmiyloyiha->rahbariilmiy_unvoni }}</td>
                                </tr>
                                <tr>
                                    <td class="border">13.</td>
                                    <td class="border">Lavozimi</td>
                                    <td class="border">{{ $ilmiyloyiha->r_lavozimi }}</td>
                                </tr>
                                <tr>
                                    <td class="border">14.</td>
                                    <td class="border">Rahbar bilan kelishuvning raqami </td>
                                    <td class="border">0</td>
                                </tr>
                                <tr>
                                    <td class="border">15.</td>
                                    <td class="border">Rahbar bilan kelishuvning sanasi</td>
                                    <td class="border">0</td>
                                </tr>

                                <tr>
                                    <td class="border">16.</td>
                                    <td class="border">Loyiha rahbari o'zgargan<b></td>
                                    <td class="border">Ha</td>
                                </tr>
                                <tr>
                                    <td class="border">17.</td>
                                    <td class="border">Loyiha hamrahbarining familiyasi, ismi, sharifi</td>
                                    <td class="border">{{ $ilmiyloyiha->hamrahbar_fish }}</td>
                                </tr>
                                <tr>
                                    <td class="border">18.</td>
                                    <td class="border">Ish joyi</td>
                                    <td class="border">{{ $ilmiyloyiha->hamr_ishjoyi }}</td>
                                </tr>
                                <tr>
                                    <td class="border">19.</td>
                                    <td class="border">Lavozimi</td>
                                    <td class="border">{{ $ilmiyloyiha->hamr_lavozimi }}</td>
                                </tr>
                                <tr>
                                    <td class="border">20</td>
                                    <td class="border">Davlati</td>
                                    <td class="border">{{ $ilmiyloyiha->hamr_davlati }}</td>
                                </tr>
                                <tr>
                                    <td class="border">21.</td>
                                    <td class="border">Shtat birligi</td>
                                    <td class="border">{{ $ilmiyloyiha->shtat_birligi }}</td>
                                </tr>
                                <tr>
                                    <td class="border">22.</td>
                                    <td class="border">Ijrochilar soni, nafar</td>
                                    <td class="border">{{ $ilmiyloyiha->ijrochilar_soni }}</td>
                                </tr>
                                <tr>
                                    <td class="border">23.</td>
                                    <td class="border">Ijrochilar roʻyxati oʻzgargan</td>
                                    <td class="border">Ijrochilarning amaldagi roʻyxati</td>
                                </tr>
                                <tr>
                                    <td class="border">24.</td>
                                    <td class="border">Ilmiy jamoaning oʻrtacha yoshi</td>
                                    <td class="border">{{ $ilmiyloyiha->ortacha_yoshi }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="tab-content__pane" id="add-expert">

                    <div class="p-5">
                        @forelse ($tekshirivchilar as $t)
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th class="border" style="width: 40px;">T/r</th>
                                    <th  colspan="2" class="border" style="text-align: center;">EKSPERT XULOSASI</th>
                                </tr>
                                <tr>
                                    <td class="border">1.</td>
                                    <td class="border">>Monitoring xulosasi</td>
                                    <td class="border">{{  $tekshirivchilar->status }}</td>
                                </tr>
                                <tr>
                                    <td class="border">2.</td>
                                    <td class="border">Izoh</td>
                                    <td class="border">{{ $tekshirivchilar->comment }}</td>
                                </tr>
                                <tr>
                                    <td class="border">3.</td>
                                    <td class="border">Ekspert F.I.Sh</td>
                                    <td class="border">{{ $tekshirivchilar->fish }}</td>
                                </tr>
                                <tr>
                                    <td class="border">4.</td>
                                    <td class="border">Monitoring o‘tkazilgan sana</td>
                                    <td class="border">{{ $tekshirivchilar->updated_at }}</td>
                                </tr>
                            </tbody>
                        </table>
                        @empty
                            @role('Ekspert')
                            <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2"
                                style="background: white; padding: 20px 20px; border-radius: 20px">
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

                                    </form><br>
                                    <div class="px-5 pb-5 text-center">
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
                        @endforelse
                    </div>

                </div>

            </div>

        </div>
    </div>



    </div>
@endsection
