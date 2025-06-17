@extends('layouts.admin')

@section('content')

    <div class="flex justify-between align-center mt-6 mb-6">

        <h2 class="intro-y text-lg font-medium">intellektual qo'shish</h2>

    </div>
    <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2" style="background: white;
            padding: 20px 20px;
            border-radius: 4px">
        <div class="w-full mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                <div class="grid grid-cols-12 gap-2">

                    <div class="w-full col-span-12">
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
                                    {{ $loyihaiqtisodi->hisobot_davri }}
                                </td>
                            </tr>
                            <tr>
                                <td class="border" style="text-size:16px;font-weight:700;">
                                    Loyihaning bajarilishi davrida yaratilgan ishlanma (texnologiya) nomi va qisqacha
                                    tavsifi
                                </td>
                                <td class="border" colspan="2">
                                    {{ $loyihaiqtisodi->loyihabaj_ishlanma }}
                                </td>
                            </tr>
                            <tr>
                                <td class="border" style="text-size:16px;font-weight:700;">
                                    Ilmiy ishlanma joriy etiladigan (tijoratlashtiriladigan) tarmoq (soha) va kutilayotgan
                                    natijalar (mavjud ehtiyoj, iqtisodiy samaradorlik tahlili)
                                </td>
                                <td class="border" colspan="2">
                                    {{ $loyihaiqtisodi->ilmiy_ishlanmalar }}
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
                                   {{ $loyihaiqtisodi->mehnat_haq_r }}
                                </td>
                                <td class="border">
                                   {{ $loyihaiqtisodi->mehnat_haq_a }}
                                </td>
                            </tr>
                            <tr>
                                <td class="border" style="text-size:16px;font-weight:700;">
                                    Xizmat safarlari xarajatlari (5.2.-shakl)
                                </td>
                                <td class="border">
                                   {{ $loyihaiqtisodi->xizmat_saf_r }}
                                </td>
                                <td class="border">
                                   {{ $loyihaiqtisodi->xizmat_saf_a }}
                                </td>
                            </tr>
                            <tr>
                                <td class="border" style="text-size:16px;font-weight:700;">
                                    Ilmiy-tadqiqot uchun zarur boʻlgan asbob-uskunalar, texnik vositalar va boshqa
                                    tovar-moddiy boyliklarning xaridi uchun xarajatlar (5.4.-shakl)
                                </td>
                                <td class="border">
                                   {{ $loyihaiqtisodi->xarid_xaraja_r }}
                                </td>
                                <td class="border">
                                   {{ $loyihaiqtisodi->xarid_xaraja_a }}
                                </td>
                            </tr>
                            <tr>
                                <td class="border" style="text-size:16px;font-weight:700;">
                                    Ilmiy-tadqiqot uchun materiallar va butlovchi qismlarni sotib olish xarajatlari
                                    (5.5.-shakl)
                                </td>
                                <td class="border">
                                   {{ $loyihaiqtisodi->mat_butlovchi_r }}
                                </td>
                                <td class="border">
                                   {{ $loyihaiqtisodi->mat_butlovchi_a }}
                                </td>
                            </tr>
                            <tr>
                                <td class="border" style="text-size:16px;font-weight:700;">
                                    Loyihani amalga oshirishga jalb etilgan boshqa tashkilotlarning tadqiqot ishlari uchun
                                    toʻlov (5.6.-shakl)
                                </td>
                                <td class="border">
                                   {{ $loyihaiqtisodi->jalb_etilgan_r }}
                                </td>
                                <td class="border">
                                   {{ $loyihaiqtisodi->jalb_etilgan_a }}
                                </td>
                            </tr>
                            <tr>
                                <td class="border" style="text-size:16px;font-weight:700;">
                                    Loyihani amalga oshirish uchun boshqa xarajatlar (5.7.-shakl)
                                </td>
                                <td class="border">
                                   {{ $loyihaiqtisodi->boshqa_xarajat_r }}
                                </td>
                                <td class="border">
                                   {{ $loyihaiqtisodi->boshqa_xarajat_a }}
                                </td>
                            </tr>
                            <tr>
                                <td class="border" style="text-size:16px;font-weight:700;">
                                    Tashkilotning ustama xarajatlari (ushbu xarajat turi byudjetdan toʻgʻridan-toʻgʻri va
                                    bazaviy moliyalashtiriladigan ilmiy tashkilotlar tomonidan rejalashtirilmaydi)
                                </td>
                                <td class="border">
                                      {{ $loyihaiqtisodi->tashustama_xarajat_r }}
                                </td>
                                <td class="border">
                                      {{ $loyihaiqtisodi->tashustama_xarajat_a }}
                                </td>
                            </tr>
                            <tr>
                                <td class="border" style="text-size:16px;font-weight:700;">
                                    Xarid qilingan asbob-uskunalar va boshqa asosiy vositalar xaridining shartnomalari
                                    mavjudligi, dalolatnomasining rasmiylashtirilganligi
                                </td>
                                <td class="border" colspan="2">
                                    {{ $loyihaiqtisodi->xarid_qilingan_xarid }}
                                </td>
                            </tr>
                            <tr>
                                <td class="border" style="text-size:16px;font-weight:700;">
                                    Xarid shartnomasining raqami va sanasi
                                </td>
                                <td class="border">
                                    {{ $loyihaiqtisodi->xarid_s }}
                                </td>
                                <td class="border">
                                    {{ $loyihaiqtisodi->xarid_r }}
                                </td>
                            </tr>
                            <tr>
                                <td class="border" style="text-size:16px;font-weight:700;">
                                    Sotuvchi kompaniyaning nomi
                                </td>
                                <td class="border" colspan="2">
                                    {{ $loyihaiqtisodi->xarid_sh }}
                                </td>
                            </tr>
                            <tr>
                                <td class="border" style="text-size:16px;font-weight:700;">
                                    Yetkazib beruvchi yuridik shaxsning nomi
                                </td>
                                <td class="border" colspan="2">
                                    {{ $loyihaiqtisodi->yetkb_yuridik_nomi }}
                                </td>
                            </tr>
                        </table>
                    </div>

                </div>
        </div>
    </div>



@endsection
