<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MA‘LUMOTNOMA</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
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

        /* .last-father .last td{
 width: 50%;
} */
    </style>
</head>

<body>
    <div class="container">
        <!-- First Page -->
            <div class="header">
                <p style="font-weight: 500;font-size: 18px;">{{ $ilmiyloyiha->tashkilot->name }} da amalga
                    oshirilayotgan "Innovasion texnologiyali radiologiyasi bo‘yuk texnologiyalar fondlanmasi holda
                    O‘zbekistondagi ruxsatlanishi bo‘yicha qo‘llanilishi belga olish" mavzusidagi loyihaning bajarilishi
                    holati bo‘yicha <br>MA‘LUMOTNOMA</p>
            </div>

            <table>
                <thead>
                    <tr>
                        <th>T/r</th>
                        <th>MA‘LUMOT NOMI</th>
                        <th>BAJARILISHI BO‘YICHA NATIJA KO‘RSATKICHLARI</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td  class="section-header" colspan="3">I. LOYIHANING ASOSIY KO‘RSATKICHLARI</td>
                    </tr>
                    <tr>
                        <td>1.1.</td>
                        <td>Loyiha mavzusi</td>
                        <td>{{ $ilmiyloyiha->mavzusi }}, {{ $ilmiyloyiha->mavzusi_ru }}</td>
                    </tr>
                    <tr>
                        <td>1.2.</td>
                        <td>Loyiha turi</td>
                        <td>{{ $ilmiyloyiha->turi }}</td>
                    </tr>
                    <tr>
                        <td>1.3.</td>
                        <td>Loyiha shifri</td>
                        <td>{{ $ilmiyloyiha->raqami }}</td>
                    </tr>
                    <tr>
                        <td>1.4.</td>
                        <td>Shartnoma raqami va sanasi</td>
                        <td>0</td>
                    </tr>
                    <tr>
                        <td>1.5.</td>
                        <td>Bajarilish muddati</td>
                        <td>{{ $ilmiyloyiha->bosh_sana }} - {{ $ilmiyloyiha->tug_sana }} yillar</td>
                    </tr>
                    <tr>
                        <td>1.6.</td>
                        <td>Ijrochi tashkilot</td>
                        <td>{{ $ilmiyloyiha->ijrochi_tashkilot }}</td>
                    </tr>
                    <tr>
                        <td>1.7.</td>
                        <td>Loyihaning umumiy qiymati, mln.soʻm</td>
                        <td>{{ $ilmiyloyiha->sum }}</td>
                    </tr>
                    <tr>
                        <td>1.7.1.</td>
                        <td>Joriy yil uchun ajratilgan mablagʻ, mln.soʻm</td>
                        <td>0</td>
                    </tr>
                    <tr>
                        <td>1.7.2.</td>
                        <td>Loyiha moddiy-texnik bazasi uchun yoʻnaltirilgan mablagʻ, mln.soʻm</td>
                        <td>{{ $ilmiyloyiha->moddiy_texnik_mablaglar }}</td>
                    </tr>
                    <tr>
                        <td>1.7.2.1.</td>
                        <td>Jami summaga nisbatan, foiz</td>
                        <td>0</td>
                    </tr>

                    <tr>
                        <td colspan="3" class="section-header">II. LOYIHANING RAHBARI VA IJROCHILARI</td>
                    </tr>
                    <tr>
                        <td>2.1.</td>
                        <td><b> Loyihaning amaldagi rahbarining familiyasi, ismi, sharifi</b></td>
                        <td>{{ $ilmiyloyiha->rahbar_name }}</td>
                    </tr>
                    <tr>
                        <td>2.1.1.</td>
                        <td>Ilmiy darajasi va unvoni</td>
                        <td>{{ $ilmiyloyiha->rahbariilmiy_darajasi }} , {{ $ilmiyloyiha->rahbariilmiy_unvoni }}</td>
                    </tr>
                    <tr>
                        <td>2.1.2.</td>
                        <td>Lavozimi</td>
                        <td>{{ $ilmiyloyiha->r_lavozimi }}</td>
                    </tr>
                    <tr>
                        <td>2.1.3.</td>
                        <td>Rahbar bilan kelishuvning raqami </td>
                        <td>0</td>
                    </tr>
                    <tr>
                        <td>2.1.4.</td>
                        <td>Rahbar bilan kelishuvning sanasi</td>
                        <td>0</td>
                    </tr>

                    <tr>
                        <td>2.3.</td>
                        <td><b>Loyiha rahbari o‘zgargan<b></td>
                        <td>Ha</td>
                    </tr>
                    <tr>
                        <td>2.3.1.</td>
                        <td>Loyiha hamrahbarining familiyasi, ismi, sharifi</td>
                        <td>{{ $ilmiyloyiha->hamrahbar_fish }}</td>
                    </tr>
                    <tr>
                        <td>2.3.2.</td>
                        <td>Ish joyi</td>
                        <td>{{ $ilmiyloyiha->hamr_ishjoyi }}</td>
                    </tr>
                    <tr>
                        <td>2.3.3.</td>
                        <td>Lavozimi</td>
                        <td>{{ $ilmiyloyiha->hamr_lavozimi }}</td>
                    </tr>
                    <tr>
                        <td>2.3.4</td>
                        <td>Davlati</td>
                        <td>{{ $ilmiyloyiha->hamr_davlati }}</td>
                    </tr>
                    <tr>
                        <td>2.4.</td>
                        <td>Shtat birligi</td>
                        <td>{{ $ilmiyloyiha->shtat_birligi }}</td>
                    </tr>
                    <tr>
                        <td>2.5.</td>
                        <td>Ijrochilar soni, nafar</td>
                        <td>{{ $ilmiyloyiha->ijrochilar_soni }}</td>
                    </tr>
                    <tr>
                        <td>2.5.1.</td>
                        <td>Ijrochilar roʻyxati oʻzgargan</td>
                        <td>Ijrochilarning amaldagi roʻyxati</td>
                    </tr>
                    <tr>
                        <td>2.6.</td>
                        <td>Ilmiy jamoaning oʻrtacha yoshi</td>
                        <td>{{ $ilmiyloyiha->ortacha_yoshi }}</td>
                    </tr>
                </tbody>
            </table>

        <!-- Second Page -->
            <table>
                <thead>
                    <tr>
                        <td colspan="6" class="section-header">III. ILMIY TADQIQOT LOYIHASI NATIJALARI</td>
                    </tr>
                    <tr>
                        <td colspan="6" class="subsection-header">III.1. INTELLEKTUAL FAOLIYAT NATIJALARI</td>
                    </tr>
                    <tr>
                        <th>T/r</th>
                        <th>Ko‘rsatkichlar</th>
                        <th>Reja</th>
                        <th>Amalda</th>
                        <th>Farqi</th>
                        <th>Izoh</th>
                    </tr>
                    <tr>
                </thead>
                <tbody>
                    <tr>
                        <td>3.1.1.</td>
                        <td><b> Jami chop etilgan maqolalar soni </b></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>

                    </tr>
                    <tr>
                        <td>3.1.1.1.</td>
                        <td>Mahalliy ilmiy jurnallardagi maqolalar soni</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>3.1.1.2.</td>
                        <td>Xorijiy jurnallardagi ilmiy maqolalar soni</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>3.1.1.3.</td>
                        <td>Web of Science va Scopus bazasidagi xalqaro nashrlardagi maqolalar soni</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>3.1.1.4.</td>
                        <td>Tezislar soni</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>3.1.1.5.</td>
                        <td>Ilmiy monografiyalar soni</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>3.1.1.6.</td>
                        <td>Nashr qilingan oʻquv qoʻllanmalari soni</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>3.1.1.7.</td>
                        <td>Nashr qilingan darsliklar soni</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>3.1.2.</td>
                        <td><b> Bakalavrlat bosqichida yakunlangan bittiruv malakaviy ishlari soni</b></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>3.1.3.</td>
                        <td><b> Tayyorlangan magistrlik dissertatsiyaning soni</b></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>3.1.4.</td>
                        <td><b> Tayyorlangan doktorlik dissertatsiyalarning soni (PhD, DSc)</b></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>3.1.5.</td>
                        <td><b> Intellektual mulk obyektlari uchun berilgan arizalar soni</b></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td colspan="6" class="subsection-header">III.2. IXTIRO UCHUN PATENT VA DASTURIY TAʼMINOTLAR </td>
                    </tr>
                    <tr>
                        <th>T/r</th>
                        <th>Ko‘rsatkichlar</th>
                        <th>Reja</th>
                        <th>Amalda</th>
                        <th>Farqi</th>
                        <th>Izoh</th>

                    </tr>
                    <tr>
                        <td>3.2.1.</td>
                        <td><b> Olingan ixtiro patentlari soni</b></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>

                    </tr>
                    <tr>
                        <td>3.2.2.</td>
                        <td><b> Ixtiro uchun patentga berilgan buyurtmalar soni</b></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>

                    </tr>
                    <tr>
                        <td>3.2.3.</td>
                        <td><b>Dasturiy mahsulotga olingan guvohnomalar soni</b></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>

                    </tr>
                    <tr>
                        <td colspan="6" class="subsection-header">III.3. LOYIHANING MUHIM NATIJALARI</td>
                    </tr>
                    <tr>
                        <th>T/r</th>
                        <th>Ko‘rsatkichlar</th>
                        <th colspan="3">Bajarilishi holatining tahlili</th>
                        <td>Izoh</td>
                    </tr>
                    <tr>
                        <td>3.3.1.</td>
                        <td><b> Hisobot davrida qo‘lga kiritilgan muhim natijalar</b></td>
                        <td colspan="3">Text</td>
                        <td></td>

                    </tr>
                    <tr>
                        <td>3.3.2.</td>
                        <td><b>Loyiha bajarilishi davrida yaratilgan ishlanma (texnologiya) nomi va qisqacha tavsifi</b>
                        </td>
                        <td colspan="3">Text</td>
                        <td></td>

                    </tr>
                    <tr>
                        <td>3.3.3.</td>
                        <td><b>Ilmiy ishlanma joriy etilayotgan (tijoratlashtiriladigan) tarmoq (soha) va kutilayotgan
                                natijalar (mavjud shartnomalar, natijalari samaradorlik va rentabellik darajasi
                                bilan)</b></td>
                        <td colspan="3">Text</td>
                        <td></td>

                    </tr>
                </tbody>
            </table>


        <table>
            <thead>
                <tr>
                    <td colspan="6" class="section-header">IV. LOYIHANING MOLIYAVIY VA IQTISODIY KOʻRSATKICHLARI</td>
                </tr>
                <tr>
                    <td colspan="6" class="subsection-header">(AJRATILGAN MABLAGʻLARNING MAQSADLI ISHLATILISHI)</td>
                </tr>
                <tr>
                    <th>T/r</th>
                    <th>Ko‘rsatkichlar</th>
                    <th>Reja, so‘m</th>
                    <th>Amalda, so‘m</th>
                    <th>Farqi, so‘m</th>
                    <th>Izoh</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>4.1.</td>
                    <td>Mehnatga haq toʻlash (5.1.-shakl)</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>

                </tr>
                <tr>
                    <td>4.2.</td>
                    <td>Xizmat safarlari xarajatlari (5.2.-shakl)</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>4.3.</td>
                    <td>Ilmiy-tadqiqot uchun zarur boʻlgan asbob-uskunalar, texnik vositalar va boshqa tovar-moddiy
                        boyliklarning xaridi uchun xarajatlar (5.4.-shakl)</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>4.4.</td>
                    <td>Ilmiy-tadqiqot uchun materiallar va butlovchi qismlarni sotib olish xarajatlari (5.5.-shakl)
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>4.5.</td>
                    <td>Loyihani amalga oshirishga jalb etilgan boshqa tashkilotlarning tadqiqot ishlari uchun toʻlov
                        (5.6.-shakl)</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>4.6.</td>
                    <td>Loyihani amalga oshirish uchun boshqa xarajatlar (5.7.-shakl)</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>4.7.</td>
                    <td>Tashkilotning ustama xarajatlari (ushbu xarajat turi byudjetdan toʻgʻridan-toʻgʻri va bazaviy
                        moliyalashtiriladigan ilmiy tashkilotlar tomonidan rejalashtirilmaydi)</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>4.8.</td>
                    <td>Xarid qilingan asbob-uskunalar va boshqa asosiy vositalar xaridining shartnomalari mavjudligi,
                        dalolatnomasining rasmiylashtirilganligi</td>
                    <td colspan="3">Ha</td>
                    <td></td>
                </tr>
                <tr>
                    <td>4.8.1.</td>
                    <td>Xarid shartnomasining raqami va sanasi</td>
                    <td colspan="2">278</td>
                    <td colspan="2">11.01.2025-yil</td>
                </tr>
                <tr>
                    <td>4.8.2.</td>
                    <td>Sotuvchi kompaniyaning nomi</td>
                    <td colspan="4"></td>
                </tr>
                <tr>
                    <td>4.8.3.</td>
                    <td>Yetkazib beruvchi yuridik shaxsning nomi</td>
                    <td colspan="4"></td>
                </tr>
            </tbody>
        </table>

        <h2 class="subtitle">Monitoring xulosasi: {{$ilmiyloyiha->tekshirivchilars->status }}</h2>
        <p>Monitoring o‘tkazilgan sana: {{ $ilmiyloyiha->updated_at }} y.</p>
        <p>Oʻrganish oʻtkazgan ishchi guruh:</p>
        <p>{{$ilmiyloyiha->tekshirivchilars->fish }}</p>
        <!--  QrCode  yozasiz -->
        <div class="footer-qr" style="display: flex;gap:10px;">
            <img src="data:image/png;base64,{{ $qrCode }}" style="display: inline-block;" alt="Qr code"
                style="width: 100px; height: 100px;">
            <p style="font-size: 12px;">
                Hujjat haqiqiyligini mobil qurilma <br>
                yordamida QR- kodni skaner qilish <br>
                orqali tekshirish mumkin
            </p>
        </div>
    </div>
    </div>
</body>

</html>
