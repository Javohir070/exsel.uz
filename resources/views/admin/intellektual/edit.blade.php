@extends('layouts.admin')

@section('content')


<div class="flex justify-between align-center mt-6 mb-6">

    <h2 class="intro-y text-lg font-medium">intellektual qo'shish</h2>



</div>
<div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2" style="background: white;
    padding: 20px 20px;
    border-radius: 4px">
    <div class="w-full mt-3 sm:mt-0 sm:ml-auto md:ml-0">
        <form id="science-paper-create-form" method="POST" action="{{ route("intellektual.update", $intellektual->id) }}"
            class="validate-form" enctype="multipart/form-data" novalidate="novalidate">
            @csrf
            @method('PUT')
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
                            <input type="hidden" name="ilmiy_loyiha_id" value="885">
                            <input type="number" name="mal_jur_reja" value="{{ $intellektual->mal_jur_reja }}" class="input w-full border mt-2" required="">
                        </td>
                        <td class="border">
                            <input type="number" name="mal_jur_amalda" value="{{ $intellektual->mal_jur_amalda }}" class="input w-full border mt-2" required="">
                        </td>
                    </tr>
                    <tr>
                        <td class="border" style="text-size:16px;font-weight:700;">
                            Xorijiy jurnallardagi ilmiy maqolalar soni
                        </td>
                        <td class="border">
                            <input type="number" name="xor_jur_reja" value="{{ $intellektual->xor_jur_reja }}" class="input w-full border mt-2" required="">
                        </td>
                        <td class="border">
                            <input type="number" name="xor_jur_amalda" value="{{ $intellektual->xor_jur_amalda }}" class="input w-full border mt-2" required="">
                        </td>
                    </tr>
                    <tr>
                        <td class="border" style="text-size:16px;font-weight:700;">
                            Web of Science va Scopus bazasidagi xalqaro nashrlardagi maqolalar soni
                        </td>
                        <td class="border">
                            <input type="number" name="web_jur_reja" value="{{ $intellektual->web_jur_reja }}" class="input w-full border mt-2" required="">
                        </td>
                        <td class="border">
                            <input type="number" name="web_jur_amalda" value="{{ $intellektual->web_jur_amalda }}" class="input w-full border mt-2" required="">
                        </td>
                    </tr>
                    <tr>
                        <td class="border" style="text-size:16px;font-weight:700;">
                            Tezislar soni
                        </td>
                        <td class="border">
                            <input type="number" name="tezislar_reja" value="{{ $intellektual->tezislar_reja }}" class="input w-full border mt-2" required="">
                        </td>
                        <td class="border">
                            <input type="number" name="tezislar_amalda" value="{{ $intellektual->tezislar_amalda }}" class="input w-full border mt-2" required="">
                        </td>
                    </tr>
                    <tr>
                        <td class="border" style="text-size:16px;font-weight:700;">
                            Ilmiy monografiyalar soni
                        </td>
                        <td class="border">
                            <input type="number" name="ilmiy_mon_reja" value="{{ $intellektual->ilmiy_mon_reja }}" class="input w-full border mt-2" required="">
                        </td>
                        <td class="border">
                            <input type="number" name="ilmiy_mon_amalda" value="{{ $intellektual->ilmiy_mon_amalda }}" class="input w-full border mt-2" required="">
                        </td>
                    </tr>
                    <tr>
                        <td class="border" style="text-size:16px;font-weight:700;">
                            Nashr qilingan oʻquv qoʻllanmalari soni
                        </td>
                        <td class="border">
                            <input type="number" name="nashr_uquv_reja" value="{{ $intellektual->nashr_uquv_reja }}" class="input w-full border mt-2" required="">
                        </td>
                        <td class="border">
                            <input type="number" name="nashr_uquv_amalda" value="{{ $intellektual->nashr_uquv_amalda }}" class="input w-full border mt-2" required="">
                        </td>
                    </tr>
                    <tr>
                        <td class="border" style="text-size:16px;font-weight:700;">
                            Nashr qilingan darsliklar soni
                        </td>
                        <td class="border">
                            <input type="number" name="darslik_reja" value="{{ $intellektual->darslik_reja }}" class="input w-full border mt-2" required="">
                        </td>
                        <td class="border">
                            <input type="number" name="darslik_amalda" value="{{ $intellektual->darslik_amalda }}" class="input w-full border mt-2" required="">
                        </td>
                    </tr>
                    <tr>
                        <td class="border" style="text-size:16px;font-weight:700;">
                            Bakalavriat bosqichida tayyorlangan bitiruv malakaviy ishlari soni
                        </td>
                        <td class="border">
                            <input type="number" name="b_bitiruv_mreja" value="{{ $intellektual->b_bitiruv_mreja }}" class="input w-full border mt-2" required="">
                        </td>
                        <td class="border">
                            <input type="number" name="b_bitiruv_mamalda" value="{{ $intellektual->b_bitiruv_mamalda }}" class="input w-full border mt-2" required="">
                        </td>
                    </tr>
                    <tr>
                        <td class="border" style="text-size:16px;font-weight:700;">
                            Tayyorlangan magistrlik dissertatsiyalari soni
                        </td>
                        <td class="border">
                            <input type="number" name="m_bitiruv_dreja" value="{{ $intellektual->m_bitiruv_dreja }}" class="input w-full border mt-2" required="">
                        </td>
                        <td class="border">
                            <input type="number" name="m_bitiruv_damalda" value="{{ $intellektual->m_bitiruv_damalda }}" class="input w-full border mt-2" required="">
                        </td>
                    </tr>
                    <tr>
                        <td class="border" style="text-size:16px;font-weight:700;">
                            Tayyorlangan doktorlik dissertatsiyalari soni (PhD, DSc)
                        </td>
                        <td class="border">
                            <input type="number" name="p_bitiruv_dreja" value="{{ $intellektual->p_bitiruv_dreja }}" class="input w-full border mt-2" required="">
                        </td>
                        <td class="border">
                            <input type="number" name="p_bitiruv_damalda" value="{{ $intellektual->p_bitiruv_damalda }}" class="input w-full border mt-2" required="">
                        </td>
                    </tr>
                    <tr>
                        <td class="border" style="text-size:16px;font-weight:700;">
                            Intellektual mulk obyektlari uchun berilgan arizalar soni
                        </td>
                        <td class="border">
                            <input type="number" name="i_mulk_areja" value="{{ $intellektual->i_mulk_areja }}" class="input w-full border mt-2" required="">
                        </td>
                        <td class="border">
                            <input type="number" name="i_mulk_aamalda" value="{{ $intellektual->i_mulk_aamalda }}" class="input w-full border mt-2" required="">
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
                            <input type="number" name="ixtiro_olingan_psreja" value="{{ $intellektual->ixtiro_olingan_psreja }}" class="input w-full border mt-2" required="">
                        </td>
                        <td class="border">
                            <input type="number" name="ixtiro_olingan_psamalda" value="{{ $intellektual->ixtiro_olingan_psamalda }}" class="input w-full border mt-2" required="">
                        </td>
                    </tr>
                    <tr>
                        <td class="border" style="text-size:16px;font-weight:700;">
                            Ixtiro uchun patentga berilgan buyurtmalar soni
                        </td>
                        <td class="border">
                            <input type="number" name="ixtiro_ber_psreja" value="{{ $intellektual->ixtiro_ber_psreja }}" class="input w-full border mt-2" required="">
                        </td>
                        <td class="border">
                            <input type="number" name="ixtiro_ber_psamalda" value="{{ $intellektual->ixtiro_ber_psamalda }}" class="input w-full border mt-2" required="">
                        </td>
                    </tr>
                    <tr>
                        <td class="border" style="text-size:16px;font-weight:700;">
                            Dasturiy mahsulotga olingan guvohnomalar soni
                        </td>
                        <td class="border">
                            <input type="number" name="dasturiy_gsreja" value="{{ $intellektual->dasturiy_gsreja }}" class="input w-full border mt-2" required="">
                        </td>
                        <td class="border">
                            <input type="number" name="dasturiy_gsamalda" value="{{ $intellektual->dasturiy_gsamalda }}" class="input w-full border mt-2" required="">
                        </td>
                    </tr>
                </table>
                </div>

            </div>
        </form>
        <div class="px-5 pb-5 text-center mt-4">
            <a href="#"  class="button delete-cancel w-32 border text-gray-700 mr-1">
                Bekor qilish
            </a>
            <button type="submit" form="science-paper-create-form" class="update-confirm button w-24 bg-theme-1 text-white">
                Saqlash
            </button>
        </div>
    </div>
</div>



@endsection
