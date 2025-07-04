<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./table.css">
    <title>Jadval</title>
</head>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .container {
        width: 80%;
        margin: 0 auto;
        max-width: 1440px;
    }

    .monitoring {
        font-family: 'Times New Roman', Times, serif;
        padding: 50px 0;
    }

    .monitoring__title {
        text-align: center;
        margin: 10px 0;
        font-size: 18px;
    }

    .monitoring table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 24px;
    }

    table,
    tr,
    th,
    td {
        border: .7px solid gray;
    }

    table thead th {
        padding: 10px 0;
    }



    .monitoring tbody td {
        padding: 5px 16px;
    }

    .text-end {
        text-align: end;
    }

    .text-center {
        text-align: center;
    }

    .text-start {
        text-align: start;
    }

    .text-red {
        color: black;
    }

    .font-bold {
        font-weight: bold;
    }

    .footer {
        padding: 20px 40px;
        display: flex;
        flex-direction: column;
        gap: 8px;
    }

    .footer-qr {
        display: flex;
        flex-direction: row;
        align-items: end;
        gap: 10px;
    }
</style>

<body>

    <section class="monitoring container">
        <h1 class="monitoring__title">
            <span class="text-red">{{ $ilmiyloyiha->raqami }} – “{{ $ilmiyloyiha->mavzusi }}”</span>
            <br> ilmiy tadqiqot
            loyihasining asosiy
            natijalari to‘g‘risida
            MA’LUMOT
        </h1>
        <table>
            <thead>
                <tr>
                    <th style="width: 10%;">№</th>
                    <th style="width: 45%;">Malumot nomi</th>
                    <th style="width: 45%;">Malumot</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="font-bold">1</td>
                    <td>
                        <p>
                            <b>Loyiha mavzusi</b>
                        </p>
                        <i>(o‘zbek va rus tillarida)</i>
                    </td>
                    <td class="text-center">
                        <span class="text-red"> {{ $ilmiyloyiha->mavzusi }}, {{ $ilmiyloyiha->mavzusi_ru }}</span>
                    </td>
                </tr>
                <tr>
                    <td class="font-bold">2</td>
                    <td class="text-end">
                        <i>Loyiha turi</i>
                    </td>
                    <td class="text-center">
                        <span class="text-red">{{ $ilmiyloyiha->turi }}</span>
                    </td>
                </tr>
                <tr>
                    <td class="font-bold">3</td>
                    <td class="text-end">
                        <i>Bajarilish muddati</i>
                    </td>
                    <td class="text-center">
                        <span class="text-red"> {{ $ilmiyloyiha->bosh_sana }} - {{ $ilmiyloyiha->tug_sana }} yillar</span>
                    </td>
                </tr>
                <tr>
                    <td class="font-bold">4</td>
                    <td class="text-start">
                        <p class="font-bold">Ijrochi tashkilot</p>
                    </td>
                    <td class="text-center">
                        <span class="text-red"> {{ $ilmiyloyiha->ijrochi_tashkilot }}</span>
                    </td>
                </tr>
                <tr>
                    <td class="font-bold">5</td>
                    <td class="text-start">
                        <p class="font-bold">Loyiha rahbari</p>
                    </td>
                    <td class="text-center">
                        <span class="text-red font-bold">{{ $ilmiyloyiha->rahbar_name }} </span>
                    </td>
                </tr>
                <tr>
                    <td class="font-bold">6</td>
                    <td class="text-end">
                        <i>Ilmiy darajasi va unvoni</i>
                    </td>
                    <td class="text-center">
                        <span class="text-red">{{ $ilmiyloyiha->rahbariilmiy_darajasi }} , {{ $ilmiyloyiha->rahbariilmiy_unvoni }}</span>
                    </td>
                </tr>
                <tr>
                    <td class="font-bold">7</td>
                    <td class="text-end">
                        <i>Lavozimi</i>
                    </td>
                    <td class="text-center">
                        <span class="text-red">{{ $ilmiyloyiha->r_lavozimi }}</span>
                    </td>
                </tr>
                <tr>
                    <td class="font-bold">8</td>
                    <td class="text-start">
                        <p class="font-bold">Hamrahbar F.I.Sh</p>
                        <i>(mavjud bulsa)</i>
                    </td>
                    <td class="text-start">
                        <span class="text-red">{{ $ilmiyloyiha->hamrahbar_fish }}</span>
                    </td>
                </tr>
                <tr>
                    <td class="font-bold">9</td>
                    <td class="text-end">
                        <i>Ish joyi</i>
                    </td>
                    <td class="text-start">
                        <span class="text-red">{{ $ilmiyloyiha->hamr_ishjoyi }}</span>
                    </td>
                </tr>
                <tr>
                    <td class="font-bold">10</td>
                    <td class="text-end">
                        <i>Lavozimi</i>
                    </td>
                    <td class="text-start">
                        <span class="text-red">{{ $ilmiyloyiha->hamr_lavozimi }}</span>
                    </td>
                </tr>
                <tr>
                    <td class="font-bold">11</td>
                    <td class="text-end">
                        <i>Davlati</i>
                    </td>
                    <td class="text-start">
                        <span class="text-red">{{ $ilmiyloyiha->hamr_davlati }}</span>
                    </td>
                </tr>
                <tr>
                    <td class="font-bold">12</td>
                    <td class="text-start">
                        <p class="font-bold">Loyihaning umumiy moliyalashtirish hajmi </p>
                        <i>(mln.so‘m)</i>
                    </td>
                    <td class="text-center">
                        <span class="text-red">{{ $ilmiyloyiha->sum }}</span>
                    </td>
                </tr>
                <tr>
                    <td class="font-bold">13</td>
                    <td class="text-start">
                        <i>Joriy yil uchun ajratilgan mablag‘ (mln.so‘m)</i>
                    </td>
                    <td class="text-center">
                        <span class="text-red">{{ $ilmiyloyiha->joyyilajratilgan_mablag }}</span>
                    </td>
                </tr>
                <tr>
                    <td class="font-bold">14</td>
                    <td class="text-start">
                        <p class="font-bold">Shtat birligi</p>
                    </td>
                    <td class="text-center">
                        <span class="text-red">{{ $ilmiyloyiha->shtat_birligi }}</span>
                    </td>
                </tr>
                <tr>
                    <td class="font-bold">15</td>
                    <td class="text-start">
                        <p class="font-bold">Ijrochilar soni</p>
                    </td>
                    <td class="text-center">
                        <span class="text-red">{{ $ilmiyloyiha->ijrochilar_soni }}</span>
                    </td>
                </tr>
                <tr>
                    <td class="font-bold">16</td>
                    <td class="text-start">
                        <p class="font-bold">IIlmiy jamoaning o‘rtacha yoshi</p>
                    </td>
                    <td class="text-center">
                        <span class="text-red">{{ $ilmiyloyiha->ortacha_yoshi }}</span>
                    </td>
                </tr>
                <tr>
                    <td class="font-bold">17</td>
                    <td class="text-start">
                        <p class="font-bold">Moddiy-texnik bazaga yo‘naltirilgan mablag‘lar hajmi</p>
                        <i>(mln.so'm)</i>
                    </td>
                    <td class="text-center">
                        <span class="text-red">{{ $ilmiyloyiha->moddiy_texnik_mablaglar }}</span>
                    </td>
                </tr>
                <tr>
                    <td class="font-bold">18</td>
                    <td class="text-end">
                        <i>Jami summaga nisbatan (%da)</i>
                    </td>
                    <td class="text-center">
                        <span class="text-red">{{ $ilmiyloyiha->jami_summaga_nisbatan }}</span>
                    </td>
                </tr>

            </tbody>
        </table>

        <h2 class="monitoring__title" style="margin: 40px;">Ilmiy tadqiqot loyihasi doirasida chop etilgan ilmiy nashr
            ishlari</h2>
        <table>
            <tbody>
                <tr>
                    <td style="width: 50%;" rowspan="2" class="text-center font-bold">Jami chop etilgan nashr ishlari
                        soni</td>
                    <td class="text-center"> <i>Joriy yil uchun</i> </td>
                    <td class="text-red text-center">{{ $ilmiyloyiha->jami_chop_joriyyil }} ta</td>
                </tr>
                <tr>
                    <td class="text-center"> <i>Jami</i> </td>
                    <td class="text-red text-center">{{ $ilmiyloyiha->jami_chop_jami }} ta</td>
                </tr>
                <tr>
                    <td class="text-center" colspan="3">
                        <i>Shu jumladan</i>
                    </td>
                </tr>
                <tr>
                    <td rowspan="2" class="text-center font-bold">Mahalliy ilmiy jurnallardagi maqolalar soni</td>
                    <td class="text-center"> <i>Joriy yil uchun</i> </td>
                    <td class="text-red text-center">{{ $ilmiyloyiha->mahalliymaqola_joriyyil }} ta</td>
                </tr>
                <tr>
                    <td class="text-center"> <i>Jami</i> </td>
                    <td class="text-red text-center">{{ $ilmiyloyiha->mahalliymaqol_jami }} ta</td>
                </tr>
                <tr>
                    <td rowspan="2" class="text-center font-bold">Xorijiy jurnallardagi ilmiy maqolalar soni</td>
                    <td class="text-center"> <i>Joriy yil uchun</i> </td>
                    <td class="text-red text-center">{{ $ilmiyloyiha->xorijiymaqola_joriyyil }} ta</td>
                </tr>
                <tr>
                    <td class="text-center"> <i>Jami</i> </td>
                    <td class="text-red text-center">{{ $ilmiyloyiha->xorijiymaqola_jami }} ta</td>
                </tr>
                <tr>
                    <td rowspan="2" class="text-center font-bold">Web of Science va Scopus bazasidagi <br> xalqaro
                        nashrlardagi maqolalar soni</td>
                    <td class="text-center"> <i>Joriy yil uchun</i> </td>
                    <td class="text-red text-center">{{ $ilmiyloyiha->scopus_joriyyil }} ta</td>
                </tr>
                <tr>
                    <td class="text-center"> <i>Jami</i> </td>
                    <td class="text-red text-center">{{ $ilmiyloyiha->scopus_jami }} ta</td>
                </tr>
                <tr>
                    <td rowspan="2" class="text-center font-bold">Tezislar soni</td>
                    <td class="text-center"> <i>Joriy yil uchun</i> </td>
                    <td class="text-red text-center">{{ $ilmiyloyiha->tezislar_joriyyil }} ta</td>
                </tr>
                <tr>
                    <td class="text-center"> <i>Jami</i> </td>
                    <td class="text-red text-center">{{ $ilmiyloyiha->tezislar_jami }} ta</td>
                </tr>
                <tr>
                    <td rowspan="2" class="text-center font-bold">Ilmiy monografiyalar soni</td>
                    <td class="text-center"> <i>Joriy yil uchun</i> </td>
                    <td class="text-red text-center">{{ $ilmiyloyiha->ilmiy_mon_joriyyil }} ta</td>
                </tr>
                <tr>
                    <td class="text-center"> <i>Jami</i> </td>
                    <td class="text-red text-center">{{ $ilmiyloyiha->ilmiy_mon_jami }} ta</td>
                </tr>
                <tr>
                    <td rowspan="2" class="text-center font-bold">Olingan patentlar soni</td>
                    <td class="text-center"> <i>Joriy yil uchun</i> </td>
                    <td class="text-red text-center">{{ $ilmiyloyiha->olinganpatent_joriyyil }} ta</td>
                </tr>
                <tr>
                    <td class="text-center"> <i>Jami</i> </td>
                    <td class="text-red text-center">{{ $ilmiyloyiha->olinganpatent_jami }} ta</td>
                </tr>
                <tr>
                    <td class="text-center font-bold">Patentga berilgan buyurtmalar soni</td>
                    <td class="text-red text-center" colspan="2">{{ $ilmiyloyiha->patentga_berilgansoni }} ta</td>
                </tr>



                <tr>
                    <td rowspan="2" class="text-center font-bold">Dasturiy maxsulotga guvoxnomalar soni</td>
                    <td class="text-center"> <i>Joriy yil uchun</i> </td>
                    <td class="text-red text-center">{{ $ilmiyloyiha->dasturiy_maxguv_joriyyil }} ta</td>
                </tr>
                <tr>
                    <td class="text-center"> <i>Jami</i> </td>
                    <td class="text-red text-center">{{ $ilmiyloyiha->dasturiy_maxguv_jami }} ta</td>
                </tr>


                <tr>
                    <td style="padding: 20px;" class="text-center font-bold">Hisobot davrida qo‘lga kiritlgan muhim
                        natijalar</td>
                    <td style="padding: 20px;" class="text-red text-center" colspan="2"> {{ $ilmiyloyiha->hisobot_davrida_natijalar }}</td>
                </tr>
                <tr>
                    <td style="padding: 20px;" class="text-center font-bold">Loyiha yakunida yaratilgan ishlanma
                        (texnologiya) nomi va qisqacha tavsifi</td>
                    <td style="padding: 20px;" class="text-red text-center" colspan="2"> {{ $ilmiyloyiha->loyiha_yakunida }}</td>
                </tr>
                <tr>
                    <td style="padding: 20px;" class="text-center font-bold">Ilmiy ishlanma joriy etiladigan
                        (tijoratlashtiriladigan) tarmoq (soha) va kutilayotgan natijalar (mavjud ehtiyoj, iqtisodiy
                        samaradorlik ko‘rsatkichlari tahlili)</td>
                    <td style="padding: 20px;" class="text-red text-center" colspan="2"> {{ $ilmiyloyiha->ilmiy_ishlanma }}</td>
                </tr>
            </tbody>
        </table>

        <div class="footer">
            <p>
                <span class="font-bold">Monitoring xulosasi: </span> <span class="text-red"><i
                        class="font-bold">{{$ilmiyloyiha->tekshirivchilars->status }}</i></span>
            </p>
            <p>
                <span class="font-bold">Izoh: </span> <span class="text-red">{{$ilmiyloyiha->tekshirivchilars->comment }}</span>
            </p>
            <p class="text-end">
                <span>Monitoring o'tkazilgan sana: </span> <span class="text-red font-bold">{{ $ilmiyloyiha->updated_at }} y.</span>
            </p>
            <p class="text-end">
                <span>O‘rganish o‘tkazgan mas’ul: </span> <span class="text-red font-bold">{{$ilmiyloyiha->tekshirivchilars->fish }}</span>
            </p>
            <div class="footer-qr" style="display: flex;gap:10px;">
                <img src="data:image/png;base64,{{ $qrCode }}" style="display: inline-block;"
                    alt="Qr code" style="width: 100px; height: 100px;">
                <p style="font-size: 12px;">
                    Hujjat haqiqiyligini mobil qurilma <br>
                    yordamida QR- kodni skaner qilish <br>
                    orqali tekshirish mumkin
                </p>
            </div>
        </div>


    </section>


</body>

</html>
{{-- <div class="col-span-7 mt-2 " style="background: white; border-radius: 10px;">
                <div class="intro-y block sm:flex items-center py-4">
                    <h2 class="text-lg font-medium truncate ml-4" style="font-size: 24px;font-weight:500;">
                        Ilmiy izlanuvchilar
                    </h2>
                </div>
                <div class="intro-y overflow-auto lg:overflow-visible mt-8 sm:mt-0">
                    <table class="table">
                        <thead style="background: #F4F8FC;">
                            <tr>
                                <th class="whitespace-no-wrap">Nomi</th>
                                <th class="whitespace-no-wrap">1-kurs </th>
                                <th class="whitespace-no-wrap">2-kurs </th>
                                <th class="whitespace-no-wrap">3-kurs </th>
                                <th class="whitespace-no-wrap">To'ldirmaganlari </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr style="border-bottom: 1px solid #E6E6E6;">
                                <td style="color:#1881D3; font-weight: 400;">Dokrorantura(DSc)</td>
                                <td>{{ $dc_type100['1'] ?? 0}} </td>
                                <td>{{ $dc_type100['2'] ?? 0}} </td>
                                <td>{{ $dc_type100['3'] ?? 0}} </td>
                                <td>{{ $dc_type100['-1'] ?? 0 }} </td>
                            </tr>
                            <tr style="border-bottom: 1px solid #E6E6E6;">
                                <td style="color:#1881D3; font-weight: 400;">Tayanch doktorantura (PhD)</td>
                                <td>{{ $dc_type200['1'] ?? 0}} </td>
                                <td>{{ $dc_type200['2'] ?? 0}} </td>
                                <td>{{ $dc_type200['3'] ?? 0}} </td>
                                <td>{{ $dc_type200['-1'] ?? 0 }} </td>
                            </tr>
                            <tr style="border-bottom: 1px solid #E6E6E6;">
                                <td style="color:#1881D3; font-weight: 400;">Stajyor-tadqiqotchi </td>
                                <td>{{ $dc_type300['1'] ?? 0}} </td>
                                <td>{{ $dc_type300['2'] ?? 0}} </td>
                                <td>{{ $dc_type300['3'] ?? 0}} </td>
                                <td>{{ $dc_type300['-1'] ?? 0 }} </td>
                            </tr>
                            <tr style="border-bottom: 1px solid #E6E6E6;">
                                <td style="color:#1881D3; font-weight: 400;">Mustaqil izlanuvchi(DSc)</td>
                                <td>{{ $dc_type400['1'] ?? 0}} </td>
                                <td>{{ $dc_type400['2'] ?? 0}} </td>
                                <td>{{ $dc_type400['3'] ?? 0}} </td>
                                <td>{{ $dc_type400['-1'] ?? 0 }} </td>
                            </tr>
                            <tr style="border-bottom: 1px solid #E6E6E6;">
                                <td style="color:#1881D3; font-weight: 400;">Mustaqil izlanuvchi(PhD)</td>
                                <td>{{ $dc_type500['1'] ?? 0}} </td>
                                <td>{{ $dc_type500['2'] ?? 0}} </td>
                                <td>{{ $dc_type500['3'] ?? 0}} </td>
                                <td>{{ $dc_type500['-1'] ?? 0 }} </td>
                            </tr>
                            <tr style="border-bottom: 1px solid #E6E6E6;">
                                <td style="color:#1881D3; font-weight: 400;">Maqsadli doktorantura (DSc)</td>
                                <td>{{ $dc_type600['1'] ?? 0}} </td>
                                <td>{{ $dc_type600['2'] ?? 0}} </td>
                                <td>{{ $dc_type600['3'] ?? 0}} </td>
                                <td>{{ $dc_type600['-1'] ?? 0 }} </td>
                            </tr>
                            <tr style="border-bottom: 1px solid #E6E6E6;">
                                <td style="color:#1881D3; font-weight: 400;">Maqsadli tayanch doktorantura (PhD)</td>
                                <td>{{ $dc_type700['1'] ?? 0}} </td>
                                <td>{{ $dc_type700['2'] ?? 0}} </td>
                                <td>{{ $dc_type700['3'] ?? 0}} </td>
                                <td>{{ $dc_type700['-1'] ?? 0 }} </td>
                            </tr>
                            <tr style="border-bottom: 1px solid #E6E6E6;">
                                <td style="color:#1881D3; font-weight: 400;">Tashkilot o‘z hisobidan doktorantura (DSc)</td>
                                <td>{{ $dc_type800['1'] ?? 0}} </td>
                                <td>{{ $dc_type800['2'] ?? 0}} </td>
                                <td>{{ $dc_type800['3'] ?? 0}} </td>
                                <td>{{ $dc_type800['-1'] ?? 0 }} </td>
                            </tr>
                            <tr style="border-bottom: 1px solid #E6E6E6;">
                                <td style="color:#1881D3; font-weight: 400;">Tashkilot o‘z hisobidan tayanch doktorantura (PhD)</td>
                                <td>{{ $dc_type900['1'] ?? 0}} </td>
                                <td>{{ $dc_type900['2'] ?? 0}} </td>
                                <td>{{ $dc_type900['3'] ?? 0}} </td>
                                <td>{{ $dc_type900['-1'] ?? 0 }} </td>
                            </tr>
                            <tr style="border-bottom: 1px solid #E6E6E6;">
                                <td style="color:#1881D3; font-weight: 400;">Tashkilot o‘z hisobidan stajyor-tadqiqotchi </td>
                                <td>{{ $dc_type1000['1'] ?? 0}} </td>
                                <td>{{ $dc_type1000['2'] ?? 0}} </td>
                                <td>{{ $dc_type1000['3'] ?? 0}} </td>
                                <td>{{ $dc_type1000['-1'] ?? 0 }} </td>
                            </tr>
                            <tr style="border-bottom: 1px solid #E6E6E6;">
                                <td style="color:#1881D3; font-weight: 400;">Doktorantura (xorijiy fuqoro)</td>
                                <td>{{ $dc_type1100['1'] ?? 0}} </td>
                                <td>{{ $dc_type1100['2'] ?? 0}} </td>
                                <td>{{ $dc_type1100['3'] ?? 0}} </td>
                                <td>{{ $dc_type1100['-1'] ?? 0 }} </td>
                            </tr>

                            <tr style="border-bottom: 1px solid #E6E6E6;">
                                <td style="color:#1881D3; font-weight: 400;">Tayanch doktorantura (xorijiy fuqoro)</td>
                                <td>{{ $dc_type1200['1'] ?? 0}} </td>
                                <td>{{ $dc_type1200['2'] ?? 0}} </td>
                                <td>{{ $dc_type1200['3'] ?? 0}} </td>
                                <td>{{ $dc_type1200['-1'] ?? 0 }} </td>
                            </tr>

                            <tr style="border-bottom: 1px solid #E6E6E6;">
                                <td style="color:#1881D3; font-weight: 400;">Stajyor-tadqiqotchi (xorijiy fuqoro)</td>
                                <td>{{ $dc_type1300['1'] ?? 0}} </td>
                                <td>{{ $dc_type1300['2'] ?? 0}} </td>
                                <td>{{ $dc_type1300['3'] ?? 0}} </td>
                                <td>{{ $dc_type1300['-1'] ?? 0 }} </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div> --}}
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

                </form>
                <div class="px-5 pb-5 text-center mt-4">
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
