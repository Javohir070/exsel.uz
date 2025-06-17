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
                        <th class="border" style="text-align: center;" colspan="3">INTELLEKTUAL FAOLIYAT NATIJALARI</th>
                    </tr>
                    <tr>
                        <th class="border">Koʻrsatkichlar</th>
                        <th class="border"><span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Rejada</th>
                        <th class="border"><span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Amalda</th>
                    </tr>
                    <tr>
                        <td class="border" style="text-size:16px;font-weight:700;">
                            Mahalliy ilmiy jurnallardagi maqolalar soni
                        </td>
                        <td class="border">
                            {{ $intellektual->mal_jur_reja }}
                        </td>
                        <td class="border">
                            {{ $intellektual->mal_jur_amalda }}
                        </td>
                    </tr>
                    <tr>
                        <td class="border" style="text-size:16px;font-weight:700;">
                            Xorijiy jurnallardagi ilmiy maqolalar soni
                        </td>
                        <td class="border">
                            {{ $intellektual->xor_jur_reja }}
                        </td>
                        <td class="border">
                            {{ $intellektual->xor_jur_amalda }}
                        </td>
                    </tr>
                    <tr>
                        <td class="border" style="text-size:16px;font-weight:700;">
                            Web of Science va Scopus bazasidagi xalqaro nashrlardagi maqolalar soni
                        </td>
                        <td class="border">
                            {{ $intellektual->web_jur_reja }}
                        </td>
                        <td class="border">
                            {{ $intellektual->web_jur_amalda }}
                        </td>
                    </tr>
                    <tr>
                        <td class="border" style="text-size:16px;font-weight:700;">
                            Tezislar soni
                        </td>
                        <td class="border">
                            {{ $intellektual->tezislar_reja }}
                        </td>
                        <td class="border">
                            {{ $intellektual->tezislar_amalda }}
                        </td>
                    </tr>
                    <tr>
                        <td class="border" style="text-size:16px;font-weight:700;">
                            Ilmiy monografiyalar soni
                        </td>
                        <td class="border">
                            {{ $intellektual->ilmiy_mon_reja }}
                        </td>
                        <td class="border">
                            {{ $intellektual->ilmiy_mon_amalda }}
                        </td>
                    </tr>
                    <tr>
                        <td class="border" style="text-size:16px;font-weight:700;">
                            Nashr qilingan oʻquv qoʻllanmalari soni
                        </td>
                        <td class="border">
                            {{ $intellektual->nashr_uquv_reja }}
                        </td>
                        <td class="border">
                            {{ $intellektual->nashr_uquv_amalda }}
                        </td>
                    </tr>
                    <tr>
                        <td class="border" style="text-size:16px;font-weight:700;">
                            Nashr qilingan darsliklar soni
                        </td>
                        <td class="border">
                            {{ $intellektual->darslik_reja }}
                        </td>
                        <td class="border">
                            {{ $intellektual->darslik_amalda }}
                        </td>
                    </tr>
                    <tr>
                        <td class="border" style="text-size:16px;font-weight:700;">
                            Bakalavriat bosqichida tayyorlangan bitiruv malakaviy ishlari soni
                        </td>
                        <td class="border">
                            {{ $intellektual->b_bitiruv_mreja }}
                        </td>
                        <td class="border">
                            {{ $intellektual->b_bitiruv_mamalda }}
                        </td>
                    </tr>
                    <tr>
                        <td class="border" style="text-size:16px;font-weight:700;">
                            Tayyorlangan magistrlik dissertatsiyalari soni
                        </td>
                        <td class="border">
                            {{ $intellektual->m_bitiruv_dreja }}
                        </td>
                        <td class="border">
                            {{ $intellektual->m_bitiruv_damalda }}
                        </td>
                    </tr>
                    <tr>
                        <td class="border" style="text-size:16px;font-weight:700;">
                            Tayyorlangan doktorlik dissertatsiyalari soni (PhD, DSc)
                        </td>
                        <td class="border">
                            {{ $intellektual->p_bitiruv_dreja }}
                        </td>
                        <td class="border">
                            {{ $intellektual->p_bitiruv_damalda }}
                        </td>
                    </tr>
                    <tr>
                        <td class="border" style="text-size:16px;font-weight:700;">
                            Intellektual mulk obyektlari uchun berilgan arizalar soni
                        </td>
                        <td class="border">
                            {{ $intellektual->i_mulk_areja }}
                        </td>
                        <td class="border">
                            {{ $intellektual->i_mulk_aamalda }}
                        </td>
                    </tr>
                    <tr>
                        <th class="border" style="text-align: center;" colspan="3">IXTIRO UCHUN PATENT VA DASTURIY TAʼMINOTLAR</th>
                    </tr>
                    <tr>
                        <th class="border">Koʻrsatkichlar</th>
                        <th class="border"><span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Rejada</th>
                        <th class="border"><span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Amalda</th>
                    </tr>
                    <tr>
                        <td class="border" style="text-size:16px;font-weight:700;">
                            Ixtiro uchun olingan patentlari soni
                        </td>
                        <td class="border">
                            {{ $intellektual->ixtiro_olingan_psreja }}
                        </td>
                        <td class="border">
                            {{ $intellektual->ixtiro_olingan_psamalda }}
                        </td>
                    </tr>
                    <tr>
                        <td class="border" style="text-size:16px;font-weight:700;">
                            Ixtiro uchun patentga berilgan buyurtmalar soni
                        </td>
                        <td class="border">
                            {{ $intellektual->ixtiro_ber_psreja }}
                        </td>
                        <td class="border">
                            {{ $intellektual->ixtiro_ber_psamalda }}
                        </td>
                    </tr>
                    <tr>
                        <td class="border" style="text-size:16px;font-weight:700;">
                            Dasturiy mahsulotga olingan guvohnomalar soni
                        </td>
                        <td class="border">
                            {{ $intellektual->dasturiy_gsreja }}
                        </td>
                        <td class="border">
                            {{ $intellektual->dasturiy_gsamalda }}
                        </td>
                    </tr>
                </table>
                </div>

            </div>
    </div>
</div>



@endsection
