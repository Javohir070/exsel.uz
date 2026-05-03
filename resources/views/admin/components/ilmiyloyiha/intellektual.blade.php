<div class="modal" id="intellektual-paper-create-modal">
    <div class="modal__content modal__content--xl">
        <div class="p-5">

            <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2">
                <div class="w-full mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                    <form id="intellektual-paper-create-form" method="POST" action="{{ route('intellektual.store') }}"
                        class="validate-form" enctype="multipart/form-data" novalidate="novalidate">
                        @csrf
                        <div class="grid grid-cols-12 gap-2">

                            <div class="w-full col-span-12">
                                <table class="table table-bordered">
                                    <tr>
                                        <th class="border" style="text-align: center;" colspan="3">INTELLEKTUAL
                                            FAOLIYAT
                                            NATIJALARI</th>
                                    </tr>
                                    <tr>
                                        <th class="border">Koʻrsatkichlar</th>
                                        <th class="border"><span
                                                class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Rejada</th>
                                        <th class="border"><span
                                                class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Amalda</th>
                                    </tr>
                                    <tr>
                                        <td class="border" style="font-size:16px;">
                                            Mahalliy ilmiy jurnallardagi maqolalar soni
                                        </td>
                                        <td class="border">
                                            <input type="hidden" name="ilmiy_loyiha_id" value="{{ $ilmiyloyiha->id }}">
                                            <input type="number" min="0" name="mal_jur_reja"
                                                value="{{ $intellektual_1?->mal_jur_reja ?? null }}"
                                                class="input w-full border mt-2" required="">
                                        </td>
                                        <td class="border">
                                            <input type="number" min="0" name="mal_jur_amalda"
                                                value="{{ $intellektual_1?->mal_jur_amalda ?? null }}"
                                                class="input w-full border mt-2" required="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border" style="font-size:16px;">
                                            Xorijiy jurnallardagi ilmiy maqolalar soni
                                        </td>
                                        <td class="border">
                                            <input type="number" min="0" name="xor_jur_reja"
                                                value="{{ $intellektual_1?->xor_jur_reja ?? null }}"
                                                class="input w-full border mt-2" required="">
                                        </td>
                                        <td class="border">
                                            <input type="number" min="0" name="xor_jur_amalda"
                                                value="{{ $intellektual_1?->xor_jur_amalda ?? null }}"
                                                class="input w-full border mt-2" required="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border" style="font-size:16px;">
                                            Web of intellektual va Scopus bazasidagi xalqaro nashrlardagi maqolalar soni
                                        </td>
                                        <td class="border">
                                            <input type="number" min="0" name="web_jur_reja"
                                                value="{{ $intellektual_1?->web_jur_reja ?? null }}"
                                                class="input w-full border mt-2" required="">
                                        </td>
                                        <td class="border">
                                            <input type="number" min="0" name="web_jur_amalda"
                                                value="{{ $intellektual_1?->web_jur_amalda ?? null }}"
                                                class="input w-full border mt-2" required="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border" style="font-size:16px;">
                                            Tezislar soni
                                        </td>
                                        <td class="border">
                                            <input type="number" min="0" name="tezislar_reja"
                                                value="{{ $intellektual_1?->tezislar_reja ?? null }}"
                                                class="input w-full border mt-2" required="">
                                        </td>
                                        <td class="border">
                                            <input type="number" min="0" name="tezislar_amalda"
                                                value="{{ $intellektual_1?->tezislar_amalda ?? null }}"
                                                class="input w-full border mt-2" required="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border" style="font-size:16px;">
                                            Ilmiy monografiyalar soni
                                        </td>
                                        <td class="border">
                                            <input type="number" min="0" name="ilmiy_mon_reja"
                                                value="{{ $intellektual_1?->ilmiy_mon_reja ?? null }}"
                                                class="input w-full border mt-2" required="">
                                        </td>
                                        <td class="border">
                                            <input type="number" min="0" name="ilmiy_mon_amalda"
                                                value="{{ $intellektual_1?->ilmiy_mon_amalda ?? null }}"
                                                class="input w-full border mt-2" required="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border" style="font-size:16px;">
                                            Nashr qilingan oʻquv qoʻllanmalari soni
                                        </td>
                                        <td class="border">
                                            <input type="number" min="0" name="nashr_uquv_reja"
                                                value="{{ $intellektual_1?->nashr_uquv_reja ?? null }}"
                                                class="input w-full border mt-2" required="">
                                        </td>
                                        <td class="border">
                                            <input type="number" min="0" name="nashr_uquv_amalda"
                                                value="{{ $intellektual_1?->nashr_uquv_amalda ?? null }}"
                                                class="input w-full border mt-2" required="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border" style="font-size:16px;">
                                            Nashr qilingan darsliklar soni
                                        </td>
                                        <td class="border">
                                            <input type="number" min="0" name="darslik_reja"
                                                value="{{ $intellektual_1?->darslik_reja ?? null }}"
                                                class="input w-full border mt-2" required="">
                                        </td>
                                        <td class="border">
                                            <input type="number" min="0" name="darslik_amalda"
                                                value="{{ $intellektual_1?->darslik_amalda ?? null }}"
                                                class="input w-full border mt-2" required="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border" style="font-size:16px;">
                                            Bakalavriat bosqichida tayyorlangan bitiruv malakaviy ishlari soni
                                        </td>
                                        <td class="border">
                                            <input type="number" min="0" name="b_bitiruv_mreja"
                                                value="{{ $intellektual_1?->b_bitiruv_mreja ?? null }}"
                                                class="input w-full border mt-2" required="">
                                        </td>
                                        <td class="border">
                                            <input type="number" min="0" name="b_bitiruv_mamalda"
                                                value="{{ $intellektual_1?->b_bitiruv_mamalda ?? null }}"
                                                class="input w-full border mt-2" required="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border" style="font-size:16px;">
                                            Tayyorlangan magistrlik dissertatsiyalari soni
                                        </td>
                                        <td class="border">
                                            <input type="number" min="0" name="m_bitiruv_dreja"
                                                value="{{ $intellektual_1?->m_bitiruv_dreja ?? null }}"
                                                class="input w-full border mt-2" required="">
                                        </td>
                                        <td class="border">
                                            <input type="number" min="0" name="m_bitiruv_damalda"
                                                value="{{ $intellektual_1?->m_bitiruv_damalda ?? null }}"
                                                class="input w-full border mt-2" required="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border" style="font-size:16px;">
                                            Tayyorlangan doktorlik dissertatsiyalari soni (PhD, DSc)
                                        </td>
                                        <td class="border">
                                            <input type="number" min="0" name="p_bitiruv_dreja"
                                                value="{{ $intellektual_1?->p_bitiruv_dreja ?? null }}"
                                                class="input w-full border mt-2" required="">
                                        </td>
                                        <td class="border">
                                            <input type="number" min="0" name="p_bitiruv_damalda"
                                                value="{{ $intellektual_1?->p_bitiruv_damalda ?? null }}"
                                                class="input w-full border mt-2" required="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border" style="font-size:16px;">
                                            Intellektual mulk obyektlari uchun berilgan arizalar soni
                                        </td>
                                        <td class="border">
                                            <input type="number" min="0" name="i_mulk_areja"
                                                value="{{ $intellektual_1?->i_mulk_areja ?? null }}"
                                                class="input w-full border mt-2" required="">
                                        </td>
                                        <td class="border">
                                            <input type="number" min="0" name="i_mulk_aamalda"
                                                value="{{ $intellektual_1?->i_mulk_aamalda ?? null }}"
                                                class="input w-full border mt-2" required="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="border" style="text-align: center;" colspan="3">IXTIRO UCHUN
                                            PATENT
                                            VA DASTURIY TAʼMINOTLAR</th>
                                    </tr>
                                    <tr>
                                        <th class="border">Koʻrsatkichlar</th>
                                        <th class="border"><span
                                                class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Rejada</th>
                                        <th class="border"><span
                                                class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Amalda</th>
                                    </tr>
                                    <tr>
                                        <td class="border" style="font-size:16px;">
                                            Ixtiro uchun olingan patentlari soni
                                        </td>
                                        <td class="border">
                                            <input type="number" min="0" name="ixtiro_olingan_psreja"
                                                value="{{ $intellektual_1?->ixtiro_olingan_psreja ?? null }}"
                                                class="input w-full border mt-2" required="">
                                        </td>
                                        <td class="border">
                                            <input type="number" min="0" name="ixtiro_olingan_psamalda"
                                                value="{{ $intellektual_1?->ixtiro_olingan_psamalda ?? null }}"
                                                class="input w-full border mt-2" required="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border" style="font-size:16px;">
                                            Ixtiro uchun patentga berilgan buyurtmalar soni
                                        </td>
                                        <td class="border">
                                            <input type="number" min="0" name="ixtiro_ber_psreja"
                                                value="{{ $intellektual_1?->ixtiro_ber_psreja ?? null }}"
                                                class="input w-full border mt-2" required="">
                                        </td>
                                        <td class="border">
                                            <input type="number" min="0" name="ixtiro_ber_psamalda"
                                                value="{{ $intellektual_1?->ixtiro_ber_psamalda ?? null }}"
                                                class="input w-full border mt-2" required="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border" style="font-size:16px;">
                                            Dasturiy mahsulotga olingan guvohnomalar soni
                                        </td>
                                        <td class="border">
                                            <input type="number" min="0" name="dasturiy_gsreja"
                                                value="{{ $intellektual_1?->dasturiy_gsreja ?? null }}"
                                                class="input w-full border mt-2" required="">
                                        </td>
                                        <td class="border">
                                            <input type="number" min="0" name="dasturiy_gsamalda"
                                                value="{{ $intellektual_1?->dasturiy_gsamalda ?? null }}"
                                                class="input w-full border mt-2" required="">
                                        </td>
                                    </tr>
                                </table>
                            </div>

                        </div>
                    </form>
                </div>
            </div>

        </div>
        <div class="px-5 pb-5 text-center mt-4">
            <button type="button" data-dismiss="modal" class="button delete-cancel w-32 border text-gray-700 mr-1">
                Bekor qilish
            </button>
            <button type="submit" form="intellektual-paper-create-form"
                class="update-confirm button w-24 bg-theme-1 text-white">
                Qo'shish
            </button>
        </div>
    </div>
</div>

<div class="modal" id="intellektual-paper-edit-modal">
    <div class="modal__content modal__content--xl">
        <div class="p-5">

            <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2">
                <div class="w-full mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                    <form id="intellektual-paper-edit-form" method="POST"
                        action="{{ route('intellektual.update', $intellektual?->id ?? '') }}" class="validate-form"
                        enctype="multipart/form-data" novalidate="novalidate">
                        @csrf
                        @method('PUT')
                        <div class="grid grid-cols-12 gap-2">

                            <div class="w-full col-span-12">
                                <table class="table table-bordered">
                                    <tr>
                                        <th class="border" style="text-align: center;" colspan="3">INTELLEKTUAL
                                            FAOLIYAT
                                            NATIJALARI</th>
                                    </tr>
                                    <tr>
                                        <th class="border">Koʻrsatkichlar</th>
                                        <th class="border"><span
                                                class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Rejada</th>
                                        <th class="border"><span
                                                class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Amalda</th>
                                    </tr>
                                    <tr>
                                        <td class="border" style="font-size:16px;font-weight:700;">
                                            Mahalliy ilmiy jurnallardagi maqolalar soni
                                        </td>
                                        <td class="border">
                                            <input type="hidden" name="ilmiy_loyiha_id" value="885">
                                            <input type="number" min="0" name="mal_jur_reja"
                                                value="{{ $intellektual?->mal_jur_reja ?? '' }}"
                                                class="input w-full border mt-2" required="">
                                        </td>
                                        <td class="border">
                                            <input type="number" min="0" name="mal_jur_amalda"
                                                value="{{ $intellektual?->mal_jur_amalda ?? '' }}"
                                                class="input w-full border mt-2" required="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border" style="font-size:16px;font-weight:700;">
                                            Xorijiy jurnallardagi ilmiy maqolalar soni
                                        </td>
                                        <td class="border">
                                            <input type="number" min="0" name="xor_jur_reja"
                                                value="{{ $intellektual?->xor_jur_reja ?? '' }}"
                                                class="input w-full border mt-2" required="">
                                        </td>
                                        <td class="border">
                                            <input type="number" min="0" name="xor_jur_amalda"
                                                value="{{ $intellektual?->xor_jur_amalda ?? '' }}"
                                                class="input w-full border mt-2" required="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border" style="font-size:16px;font-weight:700;">
                                            Web of Science va Scopus bazasidagi xalqaro nashrlardagi maqolalar soni
                                        </td>
                                        <td class="border">
                                            <input type="number" min="0" name="web_jur_reja"
                                                value="{{ $intellektual?->web_jur_reja ?? '' }}"
                                                class="input w-full border mt-2" required="">
                                        </td>
                                        <td class="border">
                                            <input type="number" min="0" name="web_jur_amalda"
                                                value="{{ $intellektual?->web_jur_amalda ?? '' }}"
                                                class="input w-full border mt-2" required="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border" style="font-size:16px;font-weight:700;">
                                            Tezislar soni
                                        </td>
                                        <td class="border">
                                            <input type="number" min="0" name="tezislar_reja"
                                                value="{{ $intellektual?->tezislar_reja ?? '' }}"
                                                class="input w-full border mt-2" required="">
                                        </td>
                                        <td class="border">
                                            <input type="number" min="0" name="tezislar_amalda"
                                                value="{{ $intellektual?->tezislar_amalda ?? '' }}"
                                                class="input w-full border mt-2" required="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border" style="font-size:16px;font-weight:700;">
                                            Ilmiy monografiyalar soni
                                        </td>
                                        <td class="border">
                                            <input type="number" min="0" name="ilmiy_mon_reja"
                                                value="{{ $intellektual?->ilmiy_mon_reja ?? '' }}"
                                                class="input w-full border mt-2" required="">
                                        </td>
                                        <td class="border">
                                            <input type="number" min="0" name="ilmiy_mon_amalda"
                                                value="{{ $intellektual?->ilmiy_mon_amalda ?? '' }}"
                                                class="input w-full border mt-2" required="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border" style="font-size:16px;font-weight:700;">
                                            Nashr qilingan oʻquv qoʻllanmalari soni
                                        </td>
                                        <td class="border">
                                            <input type="number" min="0" name="nashr_uquv_reja"
                                                value="{{ $intellektual?->nashr_uquv_reja ?? '' }}"
                                                class="input w-full border mt-2" required="">
                                        </td>
                                        <td class="border">
                                            <input type="number" min="0" name="nashr_uquv_amalda"
                                                value="{{ $intellektual?->nashr_uquv_amalda ?? '' }}"
                                                class="input w-full border mt-2" required="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border" style="font-size:16px;font-weight:700;">
                                            Nashr qilingan darsliklar soni
                                        </td>
                                        <td class="border">
                                            <input type="number" min="0" name="darslik_reja"
                                                value="{{ $intellektual?->darslik_reja ?? '' }}"
                                                class="input w-full border mt-2" required="">
                                        </td>
                                        <td class="border">
                                            <input type="number" min="0" name="darslik_amalda"
                                                value="{{ $intellektual?->darslik_amalda ?? '' }}"
                                                class="input w-full border mt-2" required="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border" style="font-size:16px;font-weight:700;">
                                            Bakalavriat bosqichida tayyorlangan bitiruv malakaviy ishlari soni
                                        </td>
                                        <td class="border">
                                            <input type="number" min="0" name="b_bitiruv_mreja"
                                                value="{{ $intellektual?->b_bitiruv_mreja ?? '' }}"
                                                class="input w-full border mt-2" required="">
                                        </td>
                                        <td class="border">
                                            <input type="number" min="0" name="b_bitiruv_mamalda"
                                                value="{{ $intellektual?->b_bitiruv_mamalda ?? '' }}"
                                                class="input w-full border mt-2" required="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border" style="font-size:16px;font-weight:700;">
                                            Tayyorlangan magistrlik dissertatsiyalari soni
                                        </td>
                                        <td class="border">
                                            <input type="number" min="0" name="m_bitiruv_dreja"
                                                value="{{ $intellektual?->m_bitiruv_dreja ?? '' }}"
                                                class="input w-full border mt-2" required="">
                                        </td>
                                        <td class="border">
                                            <input type="number" min="0" name="m_bitiruv_damalda"
                                                value="{{ $intellektual?->m_bitiruv_damalda ?? '' }}"
                                                class="input w-full border mt-2" required="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border" style="font-size:16px;font-weight:700;">
                                            Tayyorlangan doktorlik dissertatsiyalari soni (PhD, DSc)
                                        </td>
                                        <td class="border">
                                            <input type="number" min="0" name="p_bitiruv_dreja"
                                                value="{{ $intellektual?->p_bitiruv_dreja ?? '' }}"
                                                class="input w-full border mt-2" required="">
                                        </td>
                                        <td class="border">
                                            <input type="number" min="0" name="p_bitiruv_damalda"
                                                value="{{ $intellektual?->p_bitiruv_damalda ?? '' }}"
                                                class="input w-full border mt-2" required="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border" style="font-size:16px;font-weight:700;">
                                            Intellektual mulk obyektlari uchun berilgan arizalar soni
                                        </td>
                                        <td class="border">
                                            <input type="number" min="0" name="i_mulk_areja"
                                                value="{{ $intellektual?->i_mulk_areja ?? '' }}"
                                                class="input w-full border mt-2" required="">
                                        </td>
                                        <td class="border">
                                            <input type="number" min="0" name="i_mulk_aamalda"
                                                value="{{ $intellektual?->i_mulk_aamalda ?? '' }}"
                                                class="input w-full border mt-2" required="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="border" style="text-align: center;" colspan="3">IXTIRO UCHUN
                                            PATENT
                                            VA DASTURIY TAʼMINOTLAR</th>
                                    </tr>
                                    <tr>
                                        <th class="border">Koʻrsatkichlar</th>
                                        <th class="border"><span
                                                class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Rejada</th>
                                        <th class="border"><span
                                                class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Amalda</th>
                                    </tr>
                                    <tr>
                                        <td class="border" style="font-size:16px;font-weight:700;">
                                            Ixtiro uchun olingan patentlari soni
                                        </td>
                                        <td class="border">
                                            <input type="number" min="0" name="ixtiro_olingan_psreja"
                                                value="{{ $intellektual?->ixtiro_olingan_psreja ?? '' }}"
                                                class="input w-full border mt-2" required="">
                                        </td>
                                        <td class="border">
                                            <input type="number" min="0" name="ixtiro_olingan_psamalda"
                                                value="{{ $intellektual?->ixtiro_olingan_psamalda ?? '' }}"
                                                class="input w-full border mt-2" required="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border" style="font-size:16px;font-weight:700;">
                                            Ixtiro uchun patentga berilgan buyurtmalar soni
                                        </td>
                                        <td class="border">
                                            <input type="number" min="0" name="ixtiro_ber_psreja"
                                                value="{{ $intellektual?->ixtiro_ber_psreja ?? '' }}"
                                                class="input w-full border mt-2" required="">
                                        </td>
                                        <td class="border">
                                            <input type="number" min="0" name="ixtiro_ber_psamalda"
                                                value="{{ $intellektual?->ixtiro_ber_psamalda ?? '' }}"
                                                class="input w-full border mt-2" required="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border" style="font-size:16px;font-weight:700;">
                                            Dasturiy mahsulotga olingan guvohnomalar soni
                                        </td>
                                        <td class="border">
                                            <input type="number" min="0" name="dasturiy_gsreja"
                                                value="{{ $intellektual?->dasturiy_gsreja ?? '' }}"
                                                class="input w-full border mt-2" required="">
                                        </td>
                                        <td class="border">
                                            <input type="number" min="0" name="dasturiy_gsamalda"
                                                value="{{ $intellektual?->dasturiy_gsamalda ?? '' }}"
                                                class="input w-full border mt-2" required="">
                                        </td>
                                    </tr>
                                </table>
                            </div>

                        </div>
                    </form>
                </div>
            </div>

        </div>
        <div class="px-5 pb-5 text-center mt-4">
            <button type="button" data-dismiss="modal" class="button delete-cancel w-32 border text-gray-700 mr-1">
                Bekor qilish
            </button>
            <button type="submit" form="intellektual-paper-edit-form"
                class="update-confirm button w-24 bg-theme-1 text-white">
                Qo'shish
            </button>
        </div>
    </div>
</div>