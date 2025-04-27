<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{--
    <link rel="stylesheet" href="./table.css"> --}}
    <title>Jadval</title>
</head>

<body>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'DejaVu Sans', sans-serif !important;
        }

        .container {
            min-height: 100vh;
            background-color: white;
            display: flex;
            align-items: flex-start;
            justify-content: center;
            padding: 2rem;
        }

        .content {
            background-color: white;
            max-width: 800px;
            width: 100%;
        }

        .title {
            text-align: center;
            font-weight: bold !important;
            font-size: 14px;
            margin-bottom: 1rem;

        }

        .subtitle {
            text-align: center;
            font-size: 14px;
            margin-bottom: 0.5rem;
            font-weight: normal;
        }

        .heading {
            text-align: center;
            font-weight: bold;
            font-size: 14px;
            margin-bottom: 1.5rem;

        }

        .form-group {
            margin-bottom: 1rem;
        }

        .form-row {
            display: flex;
            margin-bottom: 0.5rem;
            font-size: 14px;
            line-height: 1.5;
        }

        .form-label {
            font-weight: normal;
            min-width: 300px;
        }

        .form-input {
            border-bottom: 1px dotted #000;
            flex-grow: 1;
            margin-left: 4px;
            height: 18px;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid #000;
            margin-bottom: 1rem;
            font-size: 14px;
        }

        .table th,
        .table td {
            border: 1px solid #000;
            padding: 8px;
            vertical-align: top;
            line-height: 1.3;
        }

        .table th {
            font-weight: normal;
            text-align: center;
        }

        .table td:first-child {
            width: 30px;
            text-align: center;
        }

        .table td:last-child {
            width: 180px;
            text-align: left;
        }

        .table td:nth-child(2) {
            padding-left: 10px;
            font-size: 13px;
        }

        .conclusion-section {
            border: 1px solid #000;
            margin-bottom: 1rem;
            font-size: 14px;
        }

        .conclusion-row {
            border-bottom: 1px solid #000;
        }

        .conclusion-row:last-child {
            border-bottom: none;
        }

        .conclusion-grid {
            display: grid;
            grid-template-columns: 150px 1fr;
        }

        .conclusion-label {
            border-right: 1px solid #000;
            padding: 8px;
            font-weight: normal;
        }

        .conclusion-content {
            padding: 8px;
        }

        .footer {
            margin-top: 1rem;
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            font-size: 14px;
        }

        .footer p {
            margin-bottom: 0.25rem;
        }

        .qr-code {
            border: none;
            padding: 0;
        }

        .italic {
            font-style: italic;
            color: #666;
            font-size: 12px;
        }
    </style>
    <div class="container">
        <div class="content">
            <h1 class="title">Innovatsion rivojlanish agentligi tomonidan {{ $tashkilot->name }}
                izlanuvchilari faoliyati samaradorligining monitoringi bo‘yicha
            </h1>

            <h3 class="heading">NATIJALARI</h3>


            <table class="table">
                <thead>
                    <tr>
                        <th class="title">T/r</th>
                        <th class="title">Ko‘rsatkichlar</th>
                        <th class="title">Miqdori</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="title">1.</td>
                        <td>
                            Tashkilot buyrug‘i asosida qabul qilingan umumiy izlanuvchilar soni.
                        </td>
                        <td style="text-align: center;">{{ $tekshirivchilar->umumiy_izlanuvchilar ?? null }}</td>
                    </tr>
                    <tr class="bg-gray-200">
                        <td class="title">2.</td>
                        <td>
                            Yagona elektron tizimdagi tahsil olayotgan izlanuvchilar soni.
                        </td>
                        <td style="text-align: center;">{{ $tekshirivchilar->yagonae_tah_soni ?? null }}</td>
                    </tr>
                    <tr>
                        <td class="title">3.</td>
                        <td>
                            Chetlashtirilgan izlanuvchilar soni.
                        </td>
                        <td style="text-align: center;">{{ $tekshirivchilar->chetlash_soni ?? null }}</td>
                    </tr>
                    <tr class="bg-gray-200">
                        <td class="title">4.</td>
                        <td>
                            Akademik ta’tildagi izlanuvchilar soni.
                        </td>
                        <td style="text-align: center;">{{ $tekshirivchilar->akademik_soni ?? null }}</td>
                    </tr>
                    <tr>
                        <td class="title">5.</td>
                        <td>
                            Muddatidan oldin himoya qilgan izlanuvchilar soni.
                        </td>
                        <td style="text-align: center;">{{ $tekshirivchilar->muddatidano_soni ?? null }}</td>
                    </tr>
                    <tr class="bg-gray-200">
                        <td class="title">6.</td>
                        <td>
                            Yagona elektron tizimga kiritilmagan izlanuvchilar soni.
                        </td>
                        <td style="text-align: center;">{{ $tekshirivchilar->kiritilmagan_soni ?? null }}</td>
                    </tr>
                    <tr>
                        <td class="title">7.</td>
                        <td>
                            Yakka tartibdagi rejani bajarmagan izlanuvchilar soni.
                        </td>
                        <td style="text-align: center;">{{ $tekshirivchilar->rejani_bajarmagan ?? null }}</td>
                    </tr>
                    <tr class="bg-gray-200">
                        <td class="title">8.</td>
                        <td>
                            Monitoring natijasi kiritilmagan izlanuvchilar soni.
                        </td>
                        <td style="text-align: center;">{{ $tekshirivchilar->mon_nat_kiritilmagan ?? null }}</td>
                    </tr>
                    <tr>
                        <td class="title">9.</td>
                        <td>
                            Tashkilot izlanuvchilari biriktirilgan ilmiy rahbarlar soni.
                        </td>
                        <td style="text-align: center;">{{ $tekshirivchilar->biriktirilgan_rahbarlar ?? null }}</td>
                    </tr>
                    <tr class="bg-gray-200">
                        <td class="title">10.</td>
                        <td>
                            Qo‘shimcha izlanuvchi biriktirish bo‘yicha kollegial organ qarori mavjud bo'lmagan ilmiy rahbarlar soni.
                        </td>
                        <td style="text-align: center;">{{ $tekshirivchilar->kollegial_rahbarlar ?? null }}</td>
                    </tr>
                    <tr>
                        <td class="title">11.</td>
                        <td>
                            Me’yoridan ortiq izlanuvchi biriktirilgan ilmiy rahbarlar soni.
                        </td>
                        <td style="text-align: center;">{{ $tekshirivchilar->meyoridan_rahbarlar ?? null }}</td>
                    </tr>
                    <tr class="bg-gray-200">
                        <td class="title">12.</td>
                        <td>
                            Tashkilot miqyosida me’yoridan ortiq izlanuvchi biriktirilgan ilmiy rahbarlar soni.
                        </td>
                        <td style="text-align: center;">{{ $tekshirivchilar->tash_ortiq_rahbarlar ?? null }}</td>
                    </tr>
                    <tr class="bg-gray-200">
                        <td  colspan="3">
                            <span class="text-center title">Izoh</span> : {{  $tekshirivchilar->comment ?? null }}
                        </td>
                    </tr>

                </tbody>
            </table>

            {{-- <table class="table" style="margin-top: 20px">
                <tr class="bg-gray-200">
                    <td  colspan="3">
                        <span class="text-center title">Izoh</span> : {{  $tekshirivchilar->comment ?? null }}
                    </td>
                </tr> --}}
                <!-- <tr class="bg-gray-200">
                    <td colspan="3">{{  $tekshirivchilar->comment ?? null }}</td>
                </tr> -->
                {{-- <tr class="bg-gray-200">
                    <td class="text-center title" colspan="2">
                        Komissiya a'zolari
                    </td>
                    <td>{{  $tekshirivchilar->fish ?? null }} <br> {{  $tekshirivchilar->user->name ?? null }}</td>
                </tr> --}}
            {{-- </table> --}}

            <table class="table" style="margin-top: 20px;border:none;">
                <tr>
                    <td colspan="2" style="text-align: left;border:none;">
                        Tashkilotning mas'ul rahbari
                    </td>
                    <td style="font-size: 8px;margin-top: 20px;padding-top:20px;border:none;text-align: left;">
                        F.I.SH
                    </td>
                    <td style="font-size: 8px;margin-top: 20px;padding-top:20px;border:none;text-align: right;">
                        imzo
                    </td>
                    <td style="font-size: 8px;margin-top: 20px;padding-top:20px;border:none;text-align: center;">
                        sana
                    </td>
                </tr>
            </table>

            <div class="footer">
                <div class="footer-info">
                    {{-- <p>Ishchi guruh rahbari F.I.Sh: {{  $tekshirivchilar->fish ?? null }} </p> --}}
                    <p><span class="title">Ishchi guruh rahbari F.I.Sh:</span> {{  $tekshirivchilar->fish ?? null }} </p>
                    <p><span class="title">Ishchi guruh azosi F.I.Sh:</span> {{  $tekshirivchilar->user->name ?? null }} </p>
                    <p><span class="title">Ekspert F.I.Sh:</span> {{  $tekshirivchilar->ekspert_fish ?? null }} </p>
                    <p><span class="title">Tashkilotning mas'ul rahbarining  F.I.Sh:</span> {{  $tekshirivchilar->t_masul ?? null }} </p>
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
