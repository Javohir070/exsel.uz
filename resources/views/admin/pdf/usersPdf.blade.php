<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MA‘LUMOTNOMA</title>
    <style>
        body {
            font-family: 'DejaVu Sans', sans-serif !important;
            margin: 20px;
        }
        .title {
            text-align: center;
            font-weight: bold !important;
            font-size: 14px;
            margin-bottom: 1rem;

        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .page {
            margin-bottom: 40px;
            page-break-after: always;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }

        th {
            font-weight: bold;
        }

        .section-header {
            font-weight: bold;
            text-align: center;
            background-color: #f9f9f9;
        }

        .subsection-header {
            font-weight: bold;
            text-align: center;
            background-color: #f9f9f9;
        }

        .summa {
            font-weight: bold;
            text-align: right;
            background-color: #f9f9f9;
        }

        td:first-child {
            width: 60px;
        }

        td:nth-child(2) {
            width: 40%;
        }

        thead td:nth-child(2) {
            width: 15%;
        }


        @media print {
            .page {
                page-break-after: always;
            }
        }
        .footer {
            /* margin-top: 1rem; */
            display: flex !important;
            /* justify-content: space-between !important;
            align-items: flex-start !important; */
            /* font-size: 14px; */
            gap: 20px !important;
        }

        .footer p {
            margin-bottom: 0.25rem;
        }

        .qr-code {
            display: inline-flex;
            justify-content: center !important;
            align-items: center;
        }

        .italic {
            font-style: italic;
            color: #666;
            font-size: 12px;
        }
        
        .footer-info {
            display: inline-flex;
        }

    </style>
</head>

<body>
    <div class="container">
        <!-- First Page -->
            <div class="header">
                <p style="font-weight: 500;font-size: 18px;">{{ $ilmiyloyiha->tashkilot->name }} da amalga
                    oshirilayotgan "Innovasion texnologiyali radiologiyasi bo‘yuk texnologiyalar fondlanmasi holda
                    O‘zbekistondagi ruxsatlanishi bo‘yicha qo‘llanilishi belga olish" mavzusidagi loyihaning bajarilishi
                    holati bo‘yicha <br>MA'LUMOTNOMA</p>
            </div>

            <table>
                <thead>
                    <tr>
                        <!-- <th>T/r</th> -->
                        <th style="width: 300px;">MA'LUMOT NOMI</th>
                        <th>BAJARILISHI BO‘YICHA NATIJA KO‘RSATKICHLARI</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td  class="section-header" colspan="2">LOYIHANING ASOSIY KO‘RSATKICHLARI</td>
                    </tr>
                    <tr>
                        <!-- <td>1.1.</td> -->
                        <td>Loyiha mavzusi</td>
                        <td>Uz: {{ $ilmiyloyiha->mavzusi }}, <br> Ru:{{ $ilmiyloyiha->mavzusi_ru }}</td>
                    </tr>
                    <tr>
                        <!-- <td>1.2.</td> -->
                        <td>Loyiha turi</td>
                        <td>{{ $ilmiyloyiha->turi }}</td>
                    </tr>
                    <tr>
                        <!-- <td>1.3.</td> -->
                        <td>Loyiha shifri</td>
                        <td>{{ $ilmiyloyiha->raqami }}</td>
                    </tr>
                    <tr>
                        <!-- <td>1.5.</td> -->
                        <td>Bajarilish muddati</td>
                        <td>{{ $ilmiyloyiha->bosh_sana }} - {{ $ilmiyloyiha->tug_sana }} yillar</td>
                    </tr>
                    <tr>
                        <!-- <td>1.6.</td> -->
                        <td>Ijrochi tashkilot</td>
                        <td>{{ $ilmiyloyiha->tashkilot->name }}</td>
                    </tr>
                    <tr>
                        <!-- <td>1.7.</td> -->
                        <td>Loyihaning umumiy qiymati, mln.soʻm</td>
                        <td>{{ $ilmiyloyiha->sum }}</td>
                    </tr>
                    <tr>
                        <!-- <td>2.1.</td> -->
                        <td><b> Loyihaning amaldagi rahbarining familiyasi, ismi, sharifi</b></td>
                        <td>{{ $ilmiyloyiha->rahbar_name }}</td>
                    </tr>

                </tbody>
            </table>

        <!-- Second Page -->
            <table>
                <thead>
                    <tr>
                        <!-- <th>T/r</th> -->
                        <th style="width: 200px;">MONITORING KO‘RSATKICHLARI</th>
                        <th style="width: 80px;">Reja</th>
                        <th>Amalda</th>
                        <th>Farqi</th>
                        <th>Izoh</th>
                    </tr>
                    <tr>
                </thead>
                <tbody>

                    <tr>
                        <!-- <td>3.1.2.</td> -->
                        <td><b> Bakalavrlat bosqichida yakunlangan bittiruv malakaviy ishlari soni</b></td>
                        <td>
                            {{ $intellektual->b_bitiruv_mreja ?? 0 }}
                        </td>
                        <td>
                            {{ $intellektual->b_bitiruv_mamalda ?? 0 }}
                        </td>
                        <td>
                            {{ ($intellektual->b_bitiruv_mamalda ?? 0) - ($intellektual->b_bitiruv_mreja ?? 0) }}
                        </td>
                        <td>{{ $intellektual->b_bitiruv_izoh ?? null }}</td>
                    </tr>
                    <tr>
                        <!-- <td>3.1.3.</td> -->
                        <td><b> Tayyorlangan magistrlik dissertatsiyaning soni</b></td>
                        <td>
                            {{ $intellektual->m_bitiruv_dreja ?? 0 }}
                        </td>
                        <td>
                            {{ $intellektual->m_bitiruv_damalda ?? 0 }}
                        </td>
                        <td>
                            {{ ($intellektual->m_bitiruv_damalda  ?? 0) - ($intellektual->m_bitiruv_dreja ?? 0) }}
                        </td>
                        <td>{{ $intellektual->m_bitiruv_izoh ?? null }}</td>
                    </tr>
                    <tr>
                        <!-- <td>3.1.4.</td> -->
                        <td><b> Tayyorlangan doktorlik dissertatsiyalarning soni (PhD, DSc)</b></td>
                        <td>
                            {{ $intellektual->p_bitiruv_dreja ?? 0 }}
                        </td>
                        <td>
                            {{ $intellektual->p_bitiruv_damalda ?? 0 }}
                        </td>
                        <td>
                            {{ ($intellektual->p_bitiruv_damalda  ?? 0) - ($intellektual->p_bitiruv_dreja ?? 0) }}
                        </td>
                        <td>{{ $intellektual->p_bitiruv_izoh ?? null }}</td>
                    </tr>
                    <tr>
                        <!-- <td>3.1.5.</td> -->
                        <td><b> Intellektual faoliyat natijalari soni </b>(ixtiro uchun olingan patentlari, ixtiro uchun patentga berilgan buyurtmalar, dasturiy mahsulotga olingan guvohnomalar)</td>
                        <td>{{ ($intellektual->ixtiro_olingan_psreja ?? 0) + ($intellektual->ixtiro_ber_psreja ?? 0) + ($intellektual->dasturiy_gsreja ?? 0)}}</td>
                        <td>{{ ($intellektual->dasturiy_gsamalda ?? 0) + ($intellektual->ixtiro_ber_psamalda ?? 0) + ($intellektual->ixtiro_olingan_psamalda ?? 0)}}</td>
                        <td>{{   (($intellektual->dasturiy_gsamalda ?? 0) + ($intellektual->ixtiro_ber_psamalda ?? 0) + ($intellektual->ixtiro_olingan_psamalda ?? 0)) -(($intellektual->ixtiro_olingan_psreja ?? 0) + ($intellektual->ixtiro_ber_psreja ?? 0) + ($intellektual->dasturiy_gsreja ?? 0))}}</td>
                        <td>
                            {{ $intellektual->ixtiro_olingan_izoh ?? null}}, {{ $intellektual->ixtiro_ber_izoh ?? null }},  {{ $intellektual->dasturiy_izoh ?? null }}
                        </td>
                    </tr>

                    <tr>
                        <!-- <td>3.1.5.</td> -->
                        <td><b> Mablag‘ning o‘zlashtirilishi, mln.so‘mi</b></td>
                        <td colspan="4">{{ $loyihaiqtisodi->uzlashtirilishi_summasi ?? "" }}</td>
                    </tr>

                    <tr>
                        <!-- <td>1.</td> -->
                        <td>Ilmiy-tadqiqot ishlarining shartnoma va uning kalendar rejasiga asosan bajarilish holati</td>
                        <td colspan="4">{{$tekshirivchilar->kalendar ?? "" }}</td>
                    </tr>
                    <tr>
                        <!-- <td>2.</td> -->
                        <td>Ijrochi tashkilot tomonidan loyihaning amalga oshirilishi uchun zarur shart-sharoitlar yaratib berilganligi</td>
                        <td colspan="4">{{$tekshirivchilar->shart_sharoit_yaratib ?? "" }}</td>
                    </tr>
                    <tr>
                        <!-- <td>3.</td> -->
                        <td>Loyiha doirasida qo‘lga kiritilgan yakuniy natijalar va ularni tijoratlashtirish imkoniyatlari</td>
                        <td colspan="4">{{$tekshirivchilar->yakuniy_natijalar ?? "" }}</td>
                    </tr>
                    <tr>
                        <!-- <td>4.</td> -->
                        <td>Loyiha ijrochilarining o‘zgarishi holati</td>
                        <td colspan="4">{{$tekshirivchilar->loyiha_ijrochilari ?? "" }}</td>
                    </tr>
                    <tr>
                        <td class="text-center title" colspan="4" >Monitoring xulosasi </td>
                        <td style="text-align: center;">{{  $tekshirivchilar->status ?? null }}</td>
                    </tr>
                    <tr class="bg-gray-200">
                        <td  colspan="5">
                            <span class="text-center title">Izoh:</span> {{  $tekshirivchilar->comment ?? null }}
                        </td>
                    </tr>
                </tbody>
            </table>
        <div class="footer">
            <div class="footer-info" style="padding-top:50px;">
                <p><span class="title">Ishchi guruh rahbari F.I.Sh:</span> {{  $tekshirivchilar->fish ?? null }} </p>
                <p><span class="title">Ishchi guruh azosi F.I.Sh:</span> {{  $tekshirivchilar->user->name ?? null }} </p>
                <p><span class="title">Ekspert F.I.Sh:</span> {{  $tekshirivchilar->ekspert_fish ?? null }} </p>
                <p><span class="title">Tashkilotning mas'ul rahbari  F.I.Sh:</span> {{  $tekshirivchilar->t_masul ?? null }} </p>
                <p><span class="title">Sana:</span> {{  $tekshirivchilar->created_at->format('d.m.Y') ?? null }}</p>
            </div>
            <div class="qr-code">
                <img src="data:image/png;base64,{{ $qrCode }}" style="display: inline-block;"
                alt="Qr code" style="width: 100px; height: 100px;">
            </div>
        </div>
    </div>
    </div>
</body>

</html>
