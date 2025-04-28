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
            font-family: 'DejaVu Sans', sans-serif !important;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
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
            display: flex !important;
            /* justify-content: space-between !important; */
            /* align-items: flex-start !important; */
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
            <h1 class="title">INNOVATSION RIVOJLANISH AGENTLIGI</h1>
            <h2 class="subtitle">Zamonaviy ilmiy va yuqori texnologiyaga asoslangan asbob-uskunalar xaridi bo‘yicha
                o‘tkazilgan texnik expertiza</h2>
            <h3 class="heading">XULOSASI</h3>

            <div class="form-group">
                <div class="form-row">
                    <span class="form-label title"><b>Tashkilot nomi:</b></span>
                    <span class="form-input">{{ $asbobuskuna->tashkilot->name }}</span>
                </div>
                <div class="form-row">
                    <span class="form-label title"><b>Foydalanishga mas‘ul tarkibiy bo‘linma (laboratoriya, kafedra, sho‘ba) nomi:</b></span>
                    <span class="form-input"></span>
                </div>
                <div class="form-row">
                    <span class="form-label title"><b>Asbob-uskuna nomi:</b></span>
                    <span class="form-input">{{  $asbobuskuna->name }}</span>
                </div>
                <div class="form-row">
                    <span class="form-label title"><b>Modeli:</b></span>
                    <span class="form-input">{{  $asbobuskuna->model }}</span>
                </div>
                <div class="form-row">
                    <span class="form-label title"><b>Moliyalashtirish manbai:</b></span>
                    <span class="form-input">{{  $asbobuskuna->moliya_manbasi }}</span>
                </div>
            </div>

            <table class="table">
                <thead>
                    <tr>
                        <th class="title">T/r</th>
                        <th class="title">Mezon va talablar</th>
                        <th class="title">Xulosa</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="title">1.</td>
                        <td>
                            Laboratoriya uskunalarini o‘rnatilgan ilmiy bo‘linma faoliyatiga mosligi
                        </td>
                        <td style="text-align: center;">{{  $tekshirivchilar->lab_uskunalarini_mosligi ?? null }}</td>
                    </tr>
                    <tr>
                        <td class="title">2.</td>
                        <td>
                            Bajarilavotgan ilmiy-tadqiqot ishlari uchun zarurligi
                        </td>
                        <td style="text-align: center;">{{  $tekshirivchilar->ilmiy_tadqiqot_ishilari ?? null }}</td>
                    </tr>
                    <tr>
                        <td class="title">3.</td>
                        <td>
                            Ilmiy-tadqiqot dasturlaridagi ish hajmi bilan bog‘liqligi
                        </td>
                        <td style="text-align: center;">{{  $tekshirivchilar->ilmiy_tadqiqot_hajmi ?? null }}</td>
                    </tr>
                    <tr>
                        <td class="title">4.</td>
                        <td>
                            Laboratoriya uskunalari uchun zarur reagent va reaktivlar zaxirasining mavjudligi
                        </td>
                        <td style="text-align: center;">{{  $tekshirivchilar->lab_zaxirasi ?? null }}</td>
                    </tr>
                    <tr>
                        <td class="title">5.</td>
                        <td>
                            Foydalanish uchun arizalarning ro‘yxatga olinishi va foydalanish jadvalining yuritilishi
                            holatiga baho berish
                        </td>
                        <td style="text-align: center;">{{  $tekshirivchilar->foy_uchun_ariz ?? null }}</td>
                    </tr>
                    <tr>
                        <td class="title">6.</td>
                        <td>
                            Ilmiy tadqiqot va oliy ta‘lim muassasalari laboratoriyalarining qo‘shimcha asbob-uskunalar
                            bo‘yicha ehtiyoji
                        </td>
                        <td style="text-align: center;">{{  $tekshirivchilar->asbob_usk_ehtiyoji ?? null }}</td>
                    </tr>
                    <tr>
                        <td class="title">7.</td>
                        <td>
                            Zarur sarflash materiallari va butlovchi qismlar bo‘yicha ehtiyojar mavjudligi
                        </td>
                        <td style="text-align: center;">{{  $tekshirivchilar->zarur_ehtiyoji ?? null }}</td>
                    </tr>
                    <tr>
                        <td class="title">8.</td>
                        <td>
                            Laboratoriya uskunalarining ishga yaroqliligi
                        </td>
                        <td style="text-align: center;">{{  $tekshirivchilar->lab_ishga_yaroqliligi ?? null }}</td>
                    </tr>
                    <tr>
                        <td class="text-center title" colspan="2">Monitoring xulosasi </td>
                        <td style="text-align: center;">{{  $tekshirivchilar->status ?? null }}</td>
                    </tr>
                    <tr class="bg-gray-200">
                        <td  colspan="3">
                            <span class="text-center title">Izoh:</span> {{  $tekshirivchilar->comment ?? null }}
                        </td>
                    </tr>
                </tbody>
            </table>

            <div class="footer">
                <div class="footer-info">
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
