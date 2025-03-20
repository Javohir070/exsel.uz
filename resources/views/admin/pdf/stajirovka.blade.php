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
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
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
            font-weight: bold;
            font-size: 14px;
            margin-bottom: 1rem;
            text-transform: uppercase;
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
            text-transform: uppercase;
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
            margin-bottom: 0.5rem;
        }

        .qr-code {
            border: none;
        }
    </style>
    <div class="container">
        <div class="content">
            <h1 class="title">INNOVATSION RIVOJLANISH AGENTLIGI</h1>
            <h2 class="subtitle">Yosh olimlarni qisqa muddatli ilmiy stajirovkasi natijalari bo'yicha o'tkazilgan
                texnik ekspertiza</h2>
            <h3 class="heading">XULOSASI</h3>

            <div class="form-group">
                <div class="form-row">
                    <span class="form-label title">Tashkilot nomi:</span>
                    <span class="form-input">{{ $stajirovka->tashkilot->name }}</span>
                </div>
                <div class="form-row">
                    <span class="form-label title">Yosh olimning F.I.O:</span>
                    <span class="form-input">{{  $stajirovka->fish }}</span>
                </div>
                <div class="form-row">
                    <span class="form-label title">Yosh olimning lavozimi:</span>
                    <span class="form-input">{{  $stajirovka->lavozim }}</span>
                </div>
            </div>

            <table class="table">
                <thead>
                    <tr>
                        <th>T/r</th>
                        <th class="title">Mezon va talablar</th>
                        <th class="title">Xulosa</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>
                            Ilmiy hisobot taqdim etilganligi (Pdf).
                            <div class="italic">(Agar taqdim etilgan status tanlanmasa Izoh qoldirish shart)</div>
                        </td>
                        <td>{{  $tekshirivchilar->ilmiy_hisobot ?? null }}</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>
                            Stajirovka davrida egallangan bilim va ko'nikmalarni amalga oshirilishi uchun zarur
                            shart-sharoitlar yaratilganligi. (Asoslantiruvchi hujjatlar, rasm va videolar)
                            <div class="italic">(Agar Ijobiy status tanlanmasa Izoh qoldirish shart)</div>
                        </td>
                        <td>{{  $tekshirivchilar->egallangan_bilim ?? null }}</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>
                            Ilmiy-tadqiqot ishlari natijalari bo'yicha xorijiy ilmiy anjumanlarda ma'ruza bilan ishtirok
                            etganligi. (Asoslantiruvchi hujjatlar, rasm va videolar hamda havolalar)
                            <div class="italic">(Agar Ijobiy status tanlanmasa Izoh qoldirish shart)</div>
                        </td>
                        <td>{{  $tekshirivchilar->ishlar_natijalari ?? null }}</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>
                            Xalqaro tan olingan ma'lumotlar bazasidagi yetakchi ilmiy jurnallarda nashr qilinganligi.
                            (Pdf)
                            <div class="italic">(Agar Ijobiy status tanlanmasa Izoh qoldirish shart)</div>
                        </td>
                        <td>{{  $tekshirivchilar->xalqarotan_jur_nashr ?? null }}</td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>
                            Kamida bir yil davomida Agentlik tomonidan tashkil etiladigan va boshqa tadbirlarda
                            stajirovka davrida to'plangan tajribalar va olgan bilim va ko'nikmalari borasida o'z fikr va
                            mulohazalarini bayon etilganligi tafsiloti. (Asoslantiruvchi hujjatlar, rasm va videolar
                            hamda havolalar)
                            <div class="italic">(Agar Ijobiy status tanlanmasa Izoh qoldirish shart)</div>
                        </td>
                        <td>{{  $tekshirivchilar->biryil_davomida ?? null }}</td>
                    </tr>

                    <tr>
                        <td class="text-center title" colspan="2">Ekspert xulosasi </td>
                        <td>{{  $tekshirivchilar->status ?? null }}</td>
                    </tr>
                    <tr class="bg-gray-200">
                        <td class="text-center title" colspan="2">
                            Izoh
                        </td>
                        <td>{{  $tekshirivchilar->comment ?? null }}</td>
                    </tr>
                </tbody>
            </table>

            {{-- <div class="conclusion-section">
                <div class="conclusion-row">
                    <div class="conclusion-label">Ekspert xulosasi</div>
                    <div class="conclusion-content">{{  $tekshirivchilar->status ?? null }}</div>
                </div>
                <div class="conclusion-row">
                    <div class="conclusion-label">Izoh</div>
                    <div class="conclusion-content">{{  $tekshirivchilar->comment ?? null }}</div>
                </div>
            </div> --}}

            <div class="footer">
                <div class="footer-info">
                    <p>Ekspert F.I.Sh: {{  $tekshirivchilar->fish ?? null }} </p>
                    <p>Sana: {{  $tekshirivchilar->created_at ?? null }}</p>
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
