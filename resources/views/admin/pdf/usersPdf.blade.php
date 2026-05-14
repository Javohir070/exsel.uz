<!DOCTYPE html>
<html lang="uz">

<head>
    <meta charset="UTF-8">
    <title>MAʼLUMOTNOMA (namunaviy shakl)</title>
    <style>
        body {
            font-family: 'DejaVu Sans', sans-serif !important;
            margin: 12px;
            font-size: 8.5px;
            color: #000;
        }

        .doc-title {
            text-align: center;
            font-weight: bold;
            font-size: 11px;
            margin-bottom: 8px;
            line-height: 1.35;
        }

        .sub-title {
            text-align: center;
            font-size: 9px;
            margin-bottom: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 8px;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 4px 5px;
            vertical-align: top;
        }

        th {
            font-weight: bold;
            text-align: center;
            background: #f0f0f0;
        }

        .section {
            font-weight: bold;
            text-align: center;
            background: #e8e8e8;
        }

        .tr-num {
            width: 38px;
            text-align: center;
        }

        .muted {
            color: #444;
            font-size: 8px;
        }

        .footer {
            margin-top: 14px;
            font-size: 9px;
        }

        .footer p {
            margin: 0 0 4px 0;
        }

        .check {
            text-align: center;
            font-weight: bold;
        }
    </style>
</head>

<body>
    @php
        $il = $ilmiyloyiha;
        $i = $intellektual ?? null;
        $q = $loyihaiqtisodi ?? null;
        $t = $tekshirivchilar ?? null;
        $ij = $loyihaijrochilar ?? collect();
        $num = static function ($v) {
            if ($v === null || $v === '') {
                return 0.0;
            }
            $s = str_replace([' ', ','], ['', '.'], (string) $v);
            $s = preg_replace('/[^\d.-]/', '', $s) ?? '0';

            return (float) $s;
        };
        $farq = static function ($amalda, $reja) use ($num) {
            return $num($amalda) - $num($reja);
        };
        $st = strtolower((string) ($t?->status ?? ''));
        $markIjobiy = in_array($t?->status, ['Ijobiy', 'Qoniqarli'], true)
            || str_contains($st, 'ijobiy')
            || str_contains($st, 'qoniqarli');
        $markSalbiy = in_array($t?->status, ['Salbiy', 'Qoniqarsiz'], true)
            || str_contains($st, 'salbiy')
            || str_contains($st, 'qoniqarsiz');
        $markQayta = str_contains($st, "o'rganish") || str_contains($st, 'o‘rganish') || str_contains($st, 'qayta');
    @endphp

    <p class="doc-title" style="text-transform: uppercase;">Oʻzbekiston Respublikasi Oliy taʼlim, fan va innovatsiyalar vazirligi huzuridagi Innovatsion rivojlanish agentligi</p>
    <p class="sub-title">{{ $il->tashkilot->name ?? '—' }} — «{{ $il->mavzusi ?? '—' }}» loyihasi bo‘yicha
        monitoring</p>
    <p class="doc-title">MAʼLUMOTNOMA</p>

    <table>
        <thead>
            <tr>
                <th class="tr-num">T/r</th>
                <th>Maʼlumot nomi</th>
                <th>Bajarilishi natijalarining ko‘rsatkichlari</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="section" colspan="3">I. Loyihaning asosiy ko‘rsatkichlari</td>
            </tr>
            <tr>
                <td class="tr-num">1.1.</td>
                <td>Loyiha mavzusi</td>
                <td>Oʻzb: {{ $il->mavzusi ?? '—' }}@if (!empty($il->mavzusi_ru))<br>Ru: {{ $il->mavzusi_ru }}@endif</td>
            </tr>
            <tr>
                <td class="tr-num">1.2.</td>
                <td>Loyiha turi</td>
                <td>{{ $il->turi ?? '—' }}</td>
            </tr>
            <tr>
                <td class="tr-num">1.3.</td>
                <td>Loyiha shifri</td>
                <td>{{ $il->raqami ?? '—' }}</td>
            </tr>
            <tr>
                <td class="tr-num">1.4.</td>
                <td>Shartnoma raqami va sanasi</td>
                <td>
                    Asosiy: {{ $il->sh_raqami ?? '—' }} @if ($il->sanasi)
                        / {{ \Illuminate\Support\Carbon::parse($il->sanasi)->format('d.m.Y') }}
                    @endif
                    @if (!empty($il->rsh_raqami) || !empty($il->rsh_sanasi))
                        <br>Qayta: {{ $il->rsh_raqami ?? '—' }}
                        @if ($il->rsh_sanasi)
                            / {{ \Illuminate\Support\Carbon::parse($il->rsh_sanasi)->format('d.m.Y') }}
                        @endif
                    @endif
                </td>
            </tr>
            <tr>
                <td class="tr-num">1.5.</td>
                <td>Bajarilish muddati</td>
                <td>
                    {{ optional($il->bosh_sana)->format('d.m.Y') ?? '—' }}
                    —
                    {{ optional($il->tug_sana)->format('d.m.Y') ?? '—' }}
                    @if (!empty($il->muddat))
                        ({{ $il->muddat }})
                    @endif
                </td>
            </tr>
            <tr>
                <td class="tr-num">1.6.</td>
                <td>Loyihaning umumiy qiymati, soʻm</td>
                <td>{{ $il->sum ?? $il->umumiy_mablag ?? '—' }}</td>
            </tr>
            <tr>
                <td class="tr-num">1.7.</td>
                <td>Joriy yil uchun ajratilgan mablagʻ, soʻm</td>
                <td>{{ $il->joriy_yil_sum ?? $il->joyyilajratilgan_mablag ?? '—' }}</td>
            </tr>
            <tr>
                <td class="tr-num">1.8.</td>
                <td>Jami summaga nisbatan, foiz</td>
                <td>{{ $il->jami_summa_nisbat ?? $il->jami_summaga_nisbatan ?? '—' }}</td>
            </tr>

            <tr>
                <td class="section" colspan="3">II. Loyihaning rahbari va ijrochilari</td>
            </tr>
            <tr>
                <td class="tr-num">2.1.</td>
                <td>Loyihaning amaldagi rahbarining F.I.Sh.</td>
                <td>{{ $il->rahbar_name ?? '—' }}</td>
            </tr>
            <tr>
                <td class="tr-num">2.1.1.</td>
                <td>Ilmiy darajasi</td>
                <td>{{ $il->rahbariilmiy_darajasi ?? '—' }}</td>
            </tr>
            <tr>
                <td class="tr-num">2.1.2.</td>
                <td>Ilmiy unvoni</td>
                <td>{{ $il->rahbariilmiy_unvoni ?? '—' }}</td>
            </tr>
            <tr>
                <td class="tr-num">2.1.3.</td>
                <td>Lavozimi</td>
                <td>{{ $il->r_lavozimi ?? '—' }}</td>
            </tr>
            <tr>
                <td class="tr-num">2.2.</td>
                <td>Loyiha rahbari o‘zgargan</td>
                <td>
                    @php $rahbarOz = $il->loyiha_rahbari_uzgargan ?? null; @endphp
                    @if ($rahbarOz === 1 || $rahbarOz === true || $rahbarOz === '1' || $rahbarOz === 'Ha')
                        Ha
                    @elseif ($rahbarOz === 0 || $rahbarOz === false || $rahbarOz === '0' || $rahbarOz === "Yo'q")
                        Yo'q
                    @else
                        {{ $rahbarOz ?? '—' }}
                    @endif
                </td>
            </tr>
            <tr>
                <td class="tr-num">2.2.1.</td>
                <td>Loyihaning avvalgi rahbarining F.I.Sh</td>
                <td>{{ $il->avvr_fish ?? '—' }}</td>
            </tr>
            <tr>
                <td class="tr-num">2.2.2.</td>
                <td>Ilmiy darajasi</td>
                <td>{{ $il->avvr_ilmiy_daraja ?? '—' }}</td>
            </tr>
            <tr>
                <td class="tr-num">2.2.3.</td>
                <td>Ilmiy unvoni</td>
                <td>{{ $il->avvr_ilmiy_unvon ?? '—' }}</td>
            </tr>
            <tr>
                <td class="tr-num">2.2.4.</td>
                <td>Lavozimi</td>
                <td>{{ $il->avvr_lavozimi ?? '—' }}</td>
            </tr>
            <tr>
                <td class="tr-num">2.3</td>
                <td>Loyihaning ijrochilari</td>
                <td>Shtat birligi: {{ $ij->sum('shtat_birligi') ?? '—' }}; ijrochilar soni: {{ $ij->count() ?? '—' }}
                    nafar</td>
            </tr>
            <tr>
                <td class="tr-num">2.3.1</td>
                <td>Shtat birligi (jadval bo‘yicha)</td>
                <td>{{ $ij->sum('shtat_birligi') ?? '—' }}</td>
            </tr>
            <tr>
                <td class="tr-num">2.3.2</td>
                <td>Ijrochilar soni, nafar</td>
                <td>{{ $ij->count() ?? '—' }}</td>
            </tr>
        </tbody>
    </table>

    <table>
        <thead>
            <tr>
                <th colspan="3">III. Ilmiy-tadqiqot ishlarining shartnoma va kalendar rejasiga asosan bajarilish holati
                </th>
                <th class="check">Ijobiy</th>
                <th class="check">Salbiy</th>
                <th class="check">Qayta o‘rganish</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td colspan="3">{{ $t?->kalendar ?? '—' }}</td>
                <td class="check">{{ $markIjobiy ? '✓' : '' }}</td>
                <td class="check">{{ $markSalbiy ? '✓' : '' }}</td>
                <td class="check">{{ $markQayta ? '✓' : '' }}</td>
            </tr>
            <tr>
                <td colspan="6"><strong>Izoh:</strong> {{ $t?->comment ?? '—' }}</td>
            </tr>
        </tbody>
    </table>

    <table>
        <thead>
            <tr>
                <th colspan="3">IV. Ijrochi tashkilot tomonidan loyihaning amalga oshirilishi uchun zarur shart-sharoitlar
                    yaratib berilganligi</th>
                <th class="check">Yaratilgan</th>
                <th class="check">Yaratilmagan</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td colspan="3">{{ $t?->shart_sharoit_yaratib ?? '—' }}</td>
                <td class="check">
                    @php $sh = strtolower((string) ($t?->shart_sharoit_yaratib ?? '')); @endphp
                    {{ str_contains($sh, 'yaratilgan') && ! str_contains($sh, 'yaratilmagan') ? '✓' : '' }}
                </td>
                <td class="check">{{ str_contains($sh, 'yaratilmagan') ? '✓' : '' }}</td>
            </tr>
            <tr>
                <td colspan="5"><strong>Izoh:</strong> {{ $t?->shart_sharoit_yaratib ?? '—' }}</td>
            </tr>
        </tbody>
    </table>

    <table>
        <thead>
            <tr>
                <th class="section" colspan="5">V. Ajratilgan moliyaviy mablagʻning maqsadli sarflanayotganligi</th>
            </tr>
            <tr>
                <th class="tr-num">T/r</th>
                <th>Koʻrsatkichlar</th>
                <th>Rejada</th>
                <th>Amalda</th>
                <th>Farqi</th>
            </tr>
        </thead>
        <tbody>
            @if ($q)
                <tr>
                    <td class="tr-num">5.1.</td>
                    <td>Mehnatga haq toʻlash (5.1.-shakl)</td>
                    <td>{{ $q->mehnat_haq_r }}</td>
                    <td>{{ $q->mehnat_haq_a }}</td>
                    <td>{{ $farq($q->mehnat_haq_a, $q->mehnat_haq_r) }}</td>
                </tr>
                <tr>
                    <td colspan="5" class="muted"><strong>Izoh:</strong> {{ $q->mehnat_haq_i ?? '—' }}</td>
                </tr>
                <tr>
                    <td class="tr-num">5.2.</td>
                    <td>Xizmat safarlari xarajatlari (5.2.-shakl)</td>
                    <td>{{ $q->xizmat_saf_r }}</td>
                    <td>{{ $q->xizmat_saf_a }}</td>
                    <td>{{ $farq($q->xizmat_saf_a, $q->xizmat_saf_r) }}</td>
                </tr>
                <tr>
                    <td colspan="5" class="muted"><strong>Izoh:</strong> {{ $q->xizmat_saf_i ?? '—' }}</td>
                </tr>
                <tr>
                    <td class="tr-num">5.3.</td>
                    <td>Asbob-uskunalar va boshqa tovar-moddiy boyliklar xaridi (5.4.-shakl)</td>
                    <td>{{ $q->xarid_xaraja_r }}</td>
                    <td>{{ $q->xarid_xaraja_a }}</td>
                    <td>{{ $farq($q->xarid_xaraja_a, $q->xarid_xaraja_r) }}</td>
                </tr>
                <tr>
                    <td colspan="5" class="muted"><strong>Izoh:</strong> {{ $q->xarid_xaraja_i ?? '—' }}</td>
                </tr>
                <tr>
                    <td class="tr-num">5.4.</td>
                    <td>Materiallar va butlovchi qismlar (5.5.-shakl)</td>
                    <td>{{ $q->mat_butlovchi_r }}</td>
                    <td>{{ $q->mat_butlovchi_a }}</td>
                    <td>{{ $farq($q->mat_butlovchi_a, $q->mat_butlovchi_r) }}</td>
                </tr>
                <tr>
                    <td colspan="5" class="muted"><strong>Izoh:</strong> {{ $q->mat_butlovchi_i ?? '—' }}</td>
                </tr>
                <tr>
                    <td class="tr-num">5.5.</td>
                    <td>Boshqa tashkilotlar tadqiqot ishlari uchun toʻlov (5.6.-shakl)</td>
                    <td>{{ $q->jalb_etilgan_r }}</td>
                    <td>{{ $q->jalb_etilgan_a }}</td>
                    <td>{{ $farq($q->jalb_etilgan_a, $q->jalb_etilgan_r) }}</td>
                </tr>
                <tr>
                    <td colspan="5" class="muted"><strong>Izoh:</strong> {{ $q->jalb_etilgan_i ?? '—' }}</td>
                </tr>
                <tr>
                    <td class="tr-num">5.6.</td>
                    <td>Boshqa xarajatlar (5.7.-shakl)</td>
                    <td>{{ $q->boshqa_xarajat_r }}</td>
                    <td>{{ $q->boshqa_xarajat_a }}</td>
                    <td>{{ $farq($q->boshqa_xarajat_a, $q->boshqa_xarajat_r) }}</td>
                </tr>
                <tr>
                    <td colspan="5" class="muted"><strong>Izoh:</strong> {{ $q->boshqa_xarajat_i ?? '—' }}</td>
                </tr>
                <tr>
                    <td class="tr-num">5.7.</td>
                    <td>Tashkilotning ustama xarajatlari</td>
                    <td>{{ $q->tashustama_xarajat_r }}</td>
                    <td>{{ $q->tashustama_xarajat_a }}</td>
                    <td>{{ $farq($q->tashustama_xarajat_a, $q->tashustama_xarajat_r) }}</td>
                </tr>
                <tr>
                    <td colspan="5" class="muted"><strong>Izoh:</strong> {{ $q->tashustama_xarajat_i ?? '—' }}</td>
                </tr>
                <tr>
                    <td class="tr-num">5.8.</td>
                    <td>Mablagʻning oʻzlashtirilishi, soʻm</td>
                    <td colspan="2">{{ $q->uzlashtirilishi_summasi ?? '—' }}</td>
                    <td>—</td>
                </tr>
                <tr>
                    <td colspan="5" class="muted"><strong>Izoh:</strong> {{ $q->uzlashtirilishi_sum_i ?? '—' }}</td>
                </tr>
            @else
                <tr>
                    <td colspan="5" style="text-align:center;">Ushbu chorak uchun loyiha iqtisodiy maʼlumotlari
                        kiritilmagan.</td>
                </tr>
            @endif
        </tbody>
    </table>

    <table>
        <thead>
            <tr>
                <th class="section" colspan="4">VI. Loyiha doirasida xarid qilingan asosiy asbob-uskuna va inventarlar</th>
            </tr>
            <tr>
                <th class="tr-num">№</th>
                <th>Asbob-uskuna va inventarlar nomi</th>
                <th>Soni</th>
                <th>Narxi mln.soʻm</th>
            </tr>
        </thead>
        <tbody>
            @php
                $asboblarPdf = $loyihaAsbobuskunalar ?? ($ilmiyloyiha->asbobuskunalar ?? collect());
                $xaridMatn = $q ? trim((string) ($q->xarid_qilingan_xarid ?? '')) : '';
                $xaridRadio = in_array($xaridMatn, ['ha', "yo'q"], true);
            @endphp
            @forelse ($asboblarPdf as $idx => $asb)
                <tr>
                    <td class="tr-num">{{ $idx + 1 }}</td>
                    <td>{{ $asb->name ?? '—' }}</td>
                    <td>{{ $asb->soni ?? '—' }}</td>
                    <td>
                        @if ($asb->harid_summa !== null && $asb->harid_summa !== '')
                            {{ is_numeric($asb->harid_summa) ? number_format((float) $asb->harid_summa, 0, '.', ' ') : $asb->harid_summa }}
                        @else
                            —
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" style="text-align:center;">Loyihaga biriktirilgan asbob-uskuna va inventarlar mavjud emas.</td>
                </tr>
            @endforelse
            @if ($xaridMatn !== '' && ! $xaridRadio)
                <tr>
                    <td class="tr-num">{{ $asboblarPdf->count() + 1 }}</td>
                    <td colspan="3" class="muted">{{ $xaridMatn }}</td>
                </tr>
            @endif
        </tbody>
    </table>

    <table>
        <thead>
            <tr>
                <th class="section" colspan="6">VII. Ilmiy loyihalar natijalari (jurnal va boshqa koʻrsatkichlar)</th>
            </tr>
            <tr>
                <th class="tr-num">T/r</th>
                <th>Koʻrsatkichlar</th>
                <th>Rejada</th>
                <th>Amalda</th>
                <th>Farqi</th>
                <th>Izoh</th>
            </tr>
        </thead>
        <tbody>
            @if ($i)
                @php
                    $rows7 = [
                        ['7.1.', 'Mahalliy ilmiy jurnallardagi maqolalar soni', 'mal_jur_reja', 'mal_jur_amalda', 'mal_jur_izoh'],
                        ['7.2.', 'Xorijiy jurnallardagi maqolalar (WoS/Scopusdan tashqari)', 'xor_jur_reja', 'xor_jur_amalda', 'xor_jur_izoh'],
                        ['7.3.', 'Web of Science va Scopus bazasidagi maqolalar soni', 'web_jur_reja', 'web_jur_amalda', 'web_jur_izoh'],
                        ['7.4.', 'Tezislar soni', 'tezislar_reja', 'tezislar_amalda', 'tezislar_izoh'],
                        ['7.5.', 'Ilmiy monografiyalar soni', 'ilmiy_mon_reja', 'ilmiy_mon_amalda', 'ilmiy_mon_izoh'],
                        ['7.6.', 'Nashr qilingan oʻquv qoʻllanmalari soni', 'nashr_uquv_reja', 'nashr_uquv_amalda', 'nashr_uquv_izoh'],
                        ['7.7.', 'Nashr qilingan darsliklar soni', 'darslik_reja', 'darslik_amalda', 'darslik_izoh'],
                        ['7.8.', 'Bakalavriat bitiruv malakaviy ishlari soni', 'b_bitiruv_mreja', 'b_bitiruv_mamalda', 'b_bitiruv_izoh'],
                        ['7.9.', 'Magistrlik dissertatsiyalari soni', 'm_bitiruv_dreja', 'm_bitiruv_damalda', 'm_bitiruv_izoh'],
                        ['7.10.', 'Doktorlik dissertatsiyalari soni (PhD, DSc)', 'p_bitiruv_dreja', 'p_bitiruv_damalda', 'p_bitiruv_izoh'],
                        ['7.11.', 'Intellektual mulk obyektlari uchun arizalar soni', 'i_mulk_areja', 'i_mulk_aamalda', 'i_mulk_izoh'],
                        ['7.12.', 'Ixtiro uchun olingan patentlar soni', 'ixtiro_olingan_psreja', 'ixtiro_olingan_psamalda', 'ixtiro_olingan_izoh'],
                        ['7.13.', 'Dasturiy mahsulotga olingan guvohnomalar soni', 'dasturiy_gsreja', 'dasturiy_gsamalda', 'dasturiy_izoh'],
                    ];
                @endphp
                @foreach ($rows7 as $row)
                    @php [$tr, $title, $kr, $ka, $ki] = $row; @endphp
                    <tr>
                        <td class="tr-num">{{ $tr }}</td>
                        <td>{{ $title }}</td>
                        <td>{{ $i->{$kr} ?? '—' }}</td>
                        <td>{{ $i->{$ka} ?? '—' }}</td>
                        <td>{{ $farq($i->{$ka} ?? 0, $i->{$kr} ?? 0) }}</td>
                        <td>{{ $i->{$ki} ?? '—' }}</td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="6" style="text-align:center;">Ushbu chorak uchun intellektual faoliyat koʻrsatkichlari
                        kiritilmagan.</td>
                </tr>
            @endif
        </tbody>
    </table>

    <table>
        <thead>
            <tr>
                <th class="section" colspan="2">VIII. Loyiha doirasida qoʻlga kiritilgan yakuniy natijalar va tijoratlashtirish
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td colspan="2"><strong>Izoh:</strong> {{ $t?->yakuniy_natijalar ?? '—' }}</td>
            </tr>
        </tbody>
    </table>

    <table>
        <thead>
            <tr>
                <th class="section" colspan="5">IX. Loyihaning ijrochilari toʻgʻrisida maʼlumot</th>
            </tr>
            <tr>
                <th class="tr-num">№</th>
                <th>F.I.Sh</th>
                <th>Science ID</th>
                <th>Shtat birligi</th>
                <th>Izoh</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($ij as $n => $row)
                <tr>
                    <td class="tr-num">{{ $n + 1 }}</td>
                    <td>{{ $row->fio ?? '—' }}</td>
                    <td>{{ $row->science_id ?? '—' }}</td>
                    <td>{{ $row->shtat_birligi ?? '—' }}</td>
                    <td>—</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" style="text-align:center;">Ijrochilar roʻyxati kiritilmagan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <table>
        <thead>
            <tr>
                <th class="section" colspan="2">X. Ekspertning yakuniy xulosasi va imzolar</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><strong>Monitoring xulosasi (status)</strong></td>
                <td>{{ $t?->status ?? '—' }}</td>
            </tr>
            <tr>
                <td><strong>Izoh</strong></td>
                <td>{{ $t?->comment ?? '—' }}</td>
            </tr>
        </tbody>
    </table>

    <div class="footer">
        <p><strong>Ishchi guruh rahbari F.I.Sh:</strong> {{ $t?->fish ?? '—' }}</p>
        <p><strong>Ishchi guruh azosi F.I.Sh:</strong> {{ $t?->user?->name ?? '—' }}</p>
        <p><strong>Ekspert F.I.Sh:</strong> {{ $t?->ekspert_fish ?? '—' }}</p>
        <p><strong>Tashkilotning masʼul rahbari F.I.Sh:</strong> {{ $t?->t_masul ?? '—' }}</p>
        <p><strong>Monitoring oʻtkazilgan sana:</strong> {{ $t?->created_at?->format('d.m.Y') ?? '—' }}</p>
        <div style="margin-top:8px;">
            <img src="data:image/svg+xml;base64,{{ $qrCode ?? '' }}" alt="QR" style="width: 90px; height: 90px;">
        </div>
    </div>
</body>

</html>
