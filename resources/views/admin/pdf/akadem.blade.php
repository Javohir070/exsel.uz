<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <link rel="stylesheet" href="./table.css"> --}}
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
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
            line-height: 1.4;
        }

        .heading {
            text-align: center;
            font-weight: bold;
            font-size: 14px;
            margin-bottom: 1.5rem;

        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-row {
            display: flex;
            margin-bottom: 0.75rem;
            font-size: 14px;
            line-height: 1.5;
        }

        .form-label {
            font-weight: normal;
            min-width: 200px;
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
            margin-bottom: 1.5rem;
            font-size: 14px;
        }

        .table th,
        .table td {
            border: 1px solid #000;
            padding: 8px;
            vertical-align: top;
            line-height: 1.4;
        }

        .table th {
            font-weight: normal;
            text-align: center;
            background-color: white;
        }

        .table td:first-child {
            width: 30px;
            text-align: center;
        }

        .table td:last-child {
            width: 200px;
            text-align: left;
        }

        .table td:nth-child(2) {
            padding-left: 10px;
            font-size: 13px;
        }

        .italic {
            font-style: italic;
            color: #666;
            font-size: 12px;
            margin-top: 4px;
        }

        .conclusion-section {
            width: 100%;
            border: 1px solid #000;
            margin-bottom: 2rem;
            font-size: 14px;
        }

        .conclusion-row {
            display: flex;
            border-bottom: 1px solid #000;
        }

        .conclusion-row:last-child {
            border-bottom: none;
        }

        .conclusion-label {
            width: 150px;
            padding: 8px;
            border-right: 1px solid #000;
            font-weight: normal;
        }

        .conclusion-content {
            flex: 1;
            padding: 8px;
        }

        .footer {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            font-size: 14px;
            margin-top: 2rem;
        }

        .footer-info p {
            margin-bottom: 0.5rem !important;
        }

        .qr-code {
            border: none;
            display: inline-flex;
            justify-content: center !important;
            align-items: center;
        }
        .footer-info {
            display: inline-flex;
        }
    </style>
    <div class="container">
        <div class="content">
            <h1 class="title">INNOVATSION RIVOJLANISH AGENTLIGI</h1>
            <h2 class="subtitle">Akademik harakatchanlik natijalari bo‘yicha o‘tkazilgan
                texnik ekspertiza</h2>
            <h3 class="heading">XULOSASI</h3>

            <div class="form-group">
                <div class="form-row">
                    <span class="form-label title">F.I.Sh:</span>
                    <span class="form-input">{{ $akadem->full_name }}</span>
                </div>
                <div class="form-row">
                    <span class="form-label title">Yuboruvchi tashkilot:</span>
                    <span class="form-input">{{  $akadem->receiver_organization_name }}</span>
                </div>
                <div class="form-row">
                    <span class="form-label title">Qabul qiluvchi tashkilot:</span>
                    <span class="form-input">{{  $akadem->sender_organization_name }}</span>
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
                           Gʻolib yosh olim faoliyat yuritayotgan tashkilotlarning ilm-fan
                                va innovatsiyaga masʼul boʻlgan rahbar oʻrinbosari tomonidan kalendar ish rejasining
                                bajarilishini monitoring qilib borilganligi.
                        </td>
                        <td style="text-align: center;">
                            {{ $tekshirivchilar->kalendar_reja_monitoring == 'bajarilgan' ? 'Bajarilgan' : ($tekshirivchilar->kalendar_reja_monitoring == 'bajarilmagan' ? 'Bajarilmagan' : 'Loyiha davom etmoqda')  }}
                                <br> <b>Izoh:</b> {{ $tekshirivchilar->kalendar_reja_monitoring_izox }}
                            </td>
                    </tr>
                    <tr>
                        <td class="title">2.</td>
                        <td>
                            Loyiha bajarilishi yakunlanganidan soʻng qabul qiluvchi tashkilot
                                va gʻolib yosh olim oʻrtasida loyihani amalga oshirish xarajatlari koʻrsatilgan holda
                                bajarilgan ishlar boʻyicha dalolatnoma tuzilganligi
                        </td>
                        <td style="text-align: center;">
                            {{ $tekshirivchilar->dalolatnoma_tuzilgan == 'bajarilgan' ? 'Bajarilgan' : ($tekshirivchilar->dalolatnoma_tuzilgan == 'bajarilmagan' ? 'Bajarilmagan' : 'Loyiha davom etmoqda')  }}
                                <br> <b>Izoh:</b> {{ $tekshirivchilar->dalolatnoma_tuzilgan_izox }}
                            </td>
                    </tr>
                    <tr>
                        <td class="title">3.</td>
                        <td>
                            “Akademik harakatchanlik” dasturi doirasida olib borilgan loyiha
                                natijalari hisoboti faoliyat yuritayotgan muassasa rahbari tomonidan tasdiqlangan holda
                                ilmiy, ilmiy-texnik kengashda muhokama qilingani
                        </td>
                        <td style="text-align: center;">
                            {{ $tekshirivchilar->hisobot_muhokama_qilingan == 'bajarilgan' ? 'Bajarilgan' : ($tekshirivchilar->hisobot_muhokama_qilingan == 'bajarilmagan' ? 'Bajarilmagan' : 'Loyiha davom etmoqda')  }}
                                <br> <b>Izoh:</b> {{ $tekshirivchilar->hisobot_muhokama_qilingan_izox }}
                        </td>
                    </tr>
                    <tr>
                        <td class="title">4.</td>
                        <td>
                            Gʻolib yosh olim yigʻilish bayonnoma koʻchirmasi, ajratilgan
                                mablagʻlarning sarflanganligi boʻyicha hisobotni Agentlikka taqdim etganligi 
                        </td>
                        <td style="text-align: center;">
                            {{ $tekshirivchilar->hisobot_agentlikka_taqdim == 'bajarilgan' ? 'Bajarilgan' : ($tekshirivchilar->hisobot_agentlikka_taqdim == 'bajarilmagan' ? 'Bajarilmagan' : 'Loyiha davom etmoqda')  }}
                                <br> <b>Izoh:</b> {{ $tekshirivchilar->hisobot_agentlikka_taqdim_izox }}
                        </td>
                    </tr>

                    <tr>
                        <td class="text-center title" colspan="2">Monitoring xulosasi </td>
                        <td style="text-align: center;">{{  $tekshirivchilar->status ?? null }}</td>
                    </tr>
                    <tr class="bg-gray-200">
                        <td  colspan="3" style="text-align: center;">
                            <span class="title">Izoh:</span> {{  $tekshirivchilar->comment ?? null }}
                        </td>
                        {{-- <td>{{  $tekshirivchilar->comment ?? null }}</td> --}}
                    </tr>
                </tbody>
            </table>

            <table>
                
                <tbody>
                    <tr>
                        <td colspan="3">
                            <p><span class="title">Ishchi guruh rahbari F.I.Sh:</span> {{  $tekshirivchilar->fish ?? null }} </p>
                            <p><span class="title">Ishchi guruh azosi F.I.Sh:</span> {{  $tekshirivchilar->user->name ?? null }} </p>
                            <p><span class="title">Ekspert F.I.Sh:</span> {{  $tekshirivchilar->ekspert_fish ?? null }} </p>
                            <p><span class="title">Tashkilotning mas'ul rahbari  F.I.Sh:</span> {{  $tekshirivchilar->t_masul ?? null }} </p>
                            <p><span class="title">Sana:</span> {{  $tekshirivchilar->created_at->format('d.m.Y') ?? null }}</p>
                        </td>
                        <td>
                            <div style="display: flex;justify-content: end;align-items: end;">
                                <img src="data:image/png;base64,{{ $qrCode }}"
                                alt="Qr code" style="width: 100px; height: 100px;">
                            </div>
                        </td>
                    </tr>
                </tbody>
                
            </table>

        </div>
    </div>

</body>


<!-- <div class="footer">
                        <div class="footer-info" style="padding-top:50px;">
                            <p><span class="title">Ishchi guruh rahbari F.I.Sh:</span> {{  $tekshirivchilar->fish ?? null }} </p>
                            <p><span class="title">Ishchi guruh azosi F.I.Sh:</span> {{  $tekshirivchilar->user->name ?? null }} </p>
                            <p><span class="title">Ekspert F.I.Sh:</span> {{  $tekshirivchilar->ekspert_fish ?? null }} </p>
                            <p><span class="title">Tashkilotning mas'ul rahbari  F.I.Sh:</span> {{  $tekshirivchilar->t_masul ?? null }} </p>
                            <p><span class="title">Sana:</span> {{  $tekshirivchilar->created_at->format('d.m.Y') ?? null }}</p>
                        </div>
                        <div class="qr-code">
                            <img src="data:image/png;base64,{{ $qrCode }}"
                            alt="Qr code" style="width: 100px; height: 100px;">
                        </div>
                    </div> -->
</html>
