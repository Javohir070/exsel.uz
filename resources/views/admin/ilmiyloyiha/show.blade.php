@extends('layouts.admin')

@section('content')
    <div class="content">
        <div class="flex justify-between align-center mt-10">

            <h2 class="intro-y text-lg font-medium">{{ $ilmiyloyiha->tashkilot->name }} Ilmiy loyihalar </h2>

            @role(['super-admin', 'Ekspert'])
                <a href="{{ route('ilmiyloyihalar.index') }}" class="button w-24 bg-theme-1 text-white">
                    Orqaga
                </a>
            @endrole
            @role('admin')
                <a href="{{ route('ilmiyloyiha.index') }}" class="button w-24 bg-theme-1 text-white">
                    Orqaga
                </a>
            @endrole
            @role('Itm-tashkilotlar')
                <a href="{{ route('itm.ilmiyloyiha') }}" class="button w-24 bg-theme-1 text-white">
                    Orqaga
                </a>
            @endrole
            @role('Ilmiy_loyiha_rahbari')
                <a href="{{ route('scientific_project.index') }}" class="button w-24 bg-theme-1 text-white">
                    Orqaga
                </a>
            @endrole


        </div>
        @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif
        <div class="overflow-x-auto" style="background-color: white;margin-top:30px;border-radius:8px;padding:30px 20px;">
            <table class="table">
                <tbody>
                    <div
                        style="display: flex;justify-content: space-between; border-bottom: 1px solid #e2e8f0; padding-bottom: 20px;">
                        <div style="font-size:18px;font-weight: 400;">
                            {{ $ilmiyloyiha->tashkilot->name . ' Ilmiy loyihalar ' }} xaqida ma’lumot</div>
                        @can('ilmiyloyiha delete edit')
                            <div style="text-align: end;">
                                <a href="{{ route('ilmiyloyiha.edit', ['ilmiyloyiha' => $ilmiyloyiha->id]) }}"
                                    class="button w-24 bg-theme-1 text-white" style="margin-right:20px;">
                                    Tahrirlash
                                </a>
                                <a href="" class="button w-24 bg-theme-6 text-white">
                                    O'chirish
                                </a>
                            </div>
                        @endcan
                        @role('Ekspert')
                            @if ($ilmiyloyiha->id == ($ilmiyloyiha->tekshirivchilars->ilmiy_loyiha_id ?? null))
                                <a href="{{ url('generate-pdf/' . $ilmiyloyiha->id) }}" class="button delete-cancel w-32 border text-gray-700 mr-1">
                                    pdf genertsiya
                                </a>
                            @endif
                        @endrole
                    </div>
                    <tr>
                        <!-- <th class="border border-b-2 " style="width: 40px;">#</th> -->
                        <!-- <th class="border border-b-2 " style="width: 50%;" >Ma’lumot nomlanishi</th> -->
                        <th class="border border-b-2 " style="width: 100%;text-align:center;font-size: 16px;"
                            colspan="2">Ma’lumotlar</th>
                    </tr>
                    <tr class="bg-gray-200">
                        <!-- <th class="border border-b-2 ">1</th> -->
                        <th class="border border-b-2" style="text-align: center;" colspan="2">Loyiha mavzusi</th>
                        <!-- <td class="border " >{{ $ilmiyloyiha->mavzusi }}</td> -->
                    </tr>
                    <tr>
                        <!-- <th class="border border-b-2 ">1</th> -->
                        <!-- <th class="border border-b-2 ">Loyiha mavzusi</th> -->
                        <td class="border " colspan="2" style="text-align: center;">{{ $ilmiyloyiha->mavzusi }}</td>
                    </tr>
                    <tr class="bg-gray-200">
                        <!-- <th class="border border-b-2 ">10</th> -->
                        <th class="border border-b-2 ">Loyiha rahbari</th>
                        <th class="border border-b-2 ">Loyihani bajaruvchi tashkilot</th>
                    </tr>
                    <tr>
                        <!-- <th class="border border-b-2 ">2</th> -->
                        <td class="border ">{{ $ilmiyloyiha->rahbar_name }}</td>
                        <td class="border ">{{ $ilmiyloyiha->tashkilot->name_qisqachasi }}</td>
                    </tr>
                    <tr class="bg-gray-200">
                        <!-- <th class="border border-b-2 ">2</th> -->
                        <th class="border border-b-2 ">Loyiha turi</th>
                        <th class="border border-b-2 ">Loyiha dasturi</th>
                    </tr>
                    <tr>
                        <!-- <th class="border border-b-2 ">3</th> -->
                        <td class="border ">{{ $ilmiyloyiha->turi }}</td>
                        <td class="border ">{{ $ilmiyloyiha->dastyri }}</td>
                    </tr>
                    <tr class="bg-gray-200">
                        <!-- <th class="border border-b-2 ">6</th> -->
                        <th class="border border-b-2 ">Loyihani amalga oshirish muddati (yil)</th>
                        <td class="border ">Tuzilgan shartnoma summasi (ming so‘mda)</td>
                    </tr>
                    <tr>
                        <!-- <th class="border border-b-2 ">4</th> -->
                        <th class="border border-b-2 ">{{ $ilmiyloyiha->muddat }}</th>
                        <td class="border ">{{ $ilmiyloyiha->sum }}</td>
                    </tr>
                    <tr class="bg-gray-200">
                        <!-- <th class="border border-b-2 ">7</th> -->
                        <th class="border border-b-2 "> Loyihaning boshlanish sanasi </th>
                        <th class="border border-b-2 "> Loyihaning tugashi sanasi</th>
                    </tr>
                    <tr>
                        <!-- <th class="border border-b-2 ">8</th> -->
                        <td class="border ">{{ $ilmiyloyiha->bosh_sana }}</td>
                        <td class="border ">{{ $ilmiyloyiha->tug_sana }}</td>
                    </tr>
                    <tr class="bg-gray-200">
                        <!-- <th class="border border-b-2 ">11</th> -->
                        <th class="border border-b-2 ">Tuzilgan shartnoma Raqami </th>
                        <th class="border border-b-2 ">Tuzilgan shartnoma sanasi </th>
                    </tr>

                    <tr>
                        <!-- <th class="border border-b-2 ">12</th> -->
                        <td class="border ">{{ $ilmiyloyiha->raqami }}</td>
                        <td class="border ">{{ $ilmiyloyiha->sanasi }}</td>
                    </tr>
                    <tr class="bg-gray-200">
                        <!-- <th class="border border-b-2 ">9</th> -->
                        <th class="border border-b-2 ">Fan yo‘nalish</th>
                        <th class="border border-b-2 ">Olingan asosiy natija </th>
                    </tr>
                    <tr>
                        <!-- <th class="border border-b-2 ">14</th> -->
                        <td class="border ">{{ $ilmiyloyiha->pan_yunalish }}</td>
                        <td class="border " style="width: 50%;">{{ $ilmiyloyiha->olingan_natija }} </td>
                    </tr>
                    <tr class="bg-gray-200">
                        <!-- <th class="border border-b-2 ">4</th> -->
                        <th class="border border-b-2 ">Qo‘shma loyiha bo‘yicha hamkor tashkilot</th>
                        <th class="border border-b-2 "> Xalqaro qo‘shma loyihalardagi hamkor davlat</th>
                    </tr>
                    <tr>
                        <!-- <th class="border border-b-2 ">5</th> -->
                        <td class="border ">{{ $ilmiyloyiha->q_hamkor_tashkilot }}</td>
                        <td class="border ">{{ $ilmiyloyiha->hamkor_davlat }}</td>
                    </tr>
                    <tr class="bg-gray-200">
                        <!-- <th class="border border-b-2 ">15</th> -->
                        <th class="border border-b-2 ">Joriy etish holati </th>
                        <th class="border border-b-2 ">Tijoratlashtirish holati</th>
                    </tr>
                    <tr>
                        <!-- <th class="border border-b-2 ">16</th> -->
                        <td class="border ">{{ $ilmiyloyiha->joriy_holati }} </td>
                        <td class="border ">{{ $ilmiyloyiha->tijoratlashtirish }} </td>
                    </tr>

                    <tr class="bg-gray-200">
                        <!-- <th class="border border-b-2 ">15</th> -->
                        <th class="border border-b-2 ">Biriktirigan labaratoriya </th>
                        <th class="border border-b-2 ">Loyiha mavzusi (rus tilda)</th>
                    </tr>
                    <tr>
                        <!-- <th class="border border-b-2 ">16</th> -->
                        <td class="border ">{{ $ilmiyloyiha->laboratory->name ?? "yo'q" }} </td>
                        <td class="border ">{{ $ilmiyloyiha->mavzusi_ru }} </td>
                    </tr>

                    <tr class="bg-gray-200">
                        <!-- <th class="border border-b-2 ">15</th> -->
                        <th class="border border-b-2 ">Ijrochi tashkilot </th>
                        <th class="border border-b-2 ">Hamrahbar F.I.Sh</th>
                    </tr>

                    <tr>
                        <!-- <th class="border border-b-2 ">16</th> -->
                        <td class="border ">{{ $ilmiyloyiha->ijrochi_tashkilot }} </td>
                        <td class="border ">{{ $ilmiyloyiha->hamrahbar_fish }} </td>
                    </tr>

                    <tr class="bg-gray-200">
                        <!-- <th class="border border-b-2 ">15</th> -->
                        <th class="border border-b-2 "> Hamrahbar Ish joyi </th>
                        <th class="border border-b-2 ">Hamrahbar Lavozimi </th>
                    </tr>

                    <tr>
                        <!-- <th class="border border-b-2 ">16</th> -->
                        <td class="border ">{{ $ilmiyloyiha->hamr_ishjoyi }} </td>
                        <td class="border ">{{ $ilmiyloyiha->hamr_lavozimi }} </td>
                    </tr>

                    <tr class="bg-gray-200">
                        <!-- <th class="border border-b-2 ">15</th> -->
                        <th class="border border-b-2 ">Hamrahbar Davlati </th>
                        <th class="border border-b-2 "> Joriy yil uchun ajratilgan mablag‘ (so‘m)</th>
                    </tr>

                    <tr>
                        <!-- <th class="border border-b-2 ">16</th> -->
                        <td class="border ">{{ $ilmiyloyiha->hamr_davlati }} </td>
                        <td class="border ">{{ $ilmiyloyiha->joyyilajratilgan_mablag }} </td>
                    </tr>

                    <tr class="bg-gray-200">
                        <!-- <th class="border border-b-2 ">15</th> -->
                        <th class="border border-b-2 ">Shtat birligi </th>
                        <th class="border border-b-2 ">Ijrochilar soni </th>
                    </tr>

                    <tr>
                        <!-- <th class="border border-b-2 ">16</th> -->
                        <td class="border ">{{ $ilmiyloyiha->shtat_birligi }} </td>
                        <td class="border ">{{ $ilmiyloyiha->ijrochilar_soni }} </td>
                    </tr>

                    <tr class="bg-gray-200">
                        <!-- <th class="border border-b-2 ">15</th> -->
                        <th class="border border-b-2 "> Ilmiy jamoaning o‘rtacha yoshi</th>
                        <th class="border border-b-2 "> Moddiy-texnik bazaga yo‘naltirilgan mablag‘lar hajmi (so‘m) </th>
                    </tr>

                    <tr>
                        <!-- <th class="border border-b-2 ">16</th> -->
                        <td class="border ">{{ $ilmiyloyiha->ortacha_yoshi }} </td>
                        <td class="border ">{{ $ilmiyloyiha->moddiy_texnik_mablaglar }} </td>
                    </tr>

                    <tr class="bg-gray-200">
                        <!-- <th class="border border-b-2 ">15</th> -->
                        <th class="border border-b-2 ">Jami summaga nisbatan (%da) </th>
                        <th class="border border-b-2 ">Jami chop etilgan nashr ishlari soni (Joriy yil uchun) </th>
                    </tr>

                    <tr>
                        <!-- <th class="border border-b-2 ">16</th> -->
                        <td class="border ">{{ $ilmiyloyiha->jami_summaga_nisbatan }} </td>
                        <td class="border ">{{ $ilmiyloyiha->jami_chop_jami }} </td>
                    </tr>

                    <tr class="bg-gray-200">
                        <!-- <th class="border border-b-2 ">15</th> -->
                        <th class="border border-b-2 ">Mahalliy ilmiy jurnallardagi maqolalar soni (Joriy yil uchun) </th>
                        <th class="border border-b-2 ">Mahalliy ilmiy jurnallardagi maqolalar soni (Jami) </th>
                    </tr>

                    <tr>
                        <!-- <th class="border border-b-2 ">16</th> -->
                        <td class="border ">{{ $ilmiyloyiha->mahalliymaqola_joriyyil }} </td>
                        <td class="border ">{{ $ilmiyloyiha->mahalliymaqol_jami }} </td>
                    </tr>


                    <tr class="bg-gray-200">
                        <!-- <th class="border border-b-2 ">15</th> -->
                        <th class="border border-b-2 "> Xorijiy jurnallardagi ilmiy maqolalar soni (Joriy yil uchun)</th>
                        <th class="border border-b-2 "> Xorijiy jurnallardagi ilmiy maqolalar soni (Jami)</th>
                    </tr>

                    <tr>
                        <!-- <th class="border border-b-2 ">16</th> -->
                        <td class="border ">{{ $ilmiyloyiha->xorijiymaqola_joriyyil }} </td>
                        <td class="border ">{{ $ilmiyloyiha->xorijiymaqola_jami }} </td>
                    </tr>


                    <tr class="bg-gray-200">
                        <!-- <th class="border border-b-2 ">15</th> -->
                        <th class="border border-b-2 ">Web of Science va Scopus bazasidagi xalqaro nashrlardagi maqolalar
                            soni (Joriy yil uchun) </th>
                        <th class="border border-b-2 ">Web of Science va Scopus bazasidagi xalqaro nashrlardagi maqolalar
                            soni (Jami) </th>
                    </tr>

                    <tr>
                        <!-- <th class="border border-b-2 ">16</th> -->
                        <td class="border ">{{ $ilmiyloyiha->scopus_joriyyil }} </td>
                        <td class="border ">{{ $ilmiyloyiha->scopus_jami }} </td>
                    </tr>

                    <tr class="bg-gray-200">
                        <!-- <th class="border border-b-2 ">15</th> -->
                        <th class="border border-b-2 ">Tezislar soni (Joriy yil uchun) </th>
                        <th class="border border-b-2 ">Tezislar soni (Jami) </th>
                    </tr>

                    <tr>
                        <!-- <th class="border border-b-2 ">16</th> -->
                        <td class="border ">{{ $ilmiyloyiha->tezislar_joriyyil }} </td>
                        <td class="border ">{{ $ilmiyloyiha->tezislar_jami }} </td>
                    </tr>

                    <tr class="bg-gray-200">
                        <!-- <th class="border border-b-2 ">15</th> -->
                        <th class="border border-b-2 ">Ilmiy monografiyalar soni (Joriy yil uchun) </th>
                        <th class="border border-b-2 "> Ilmiy monografiyalar soni (Jami) </th>
                    </tr>

                    <tr>
                        <!-- <th class="border border-b-2 ">16</th> -->
                        <td class="border ">{{ $ilmiyloyiha->ilmiy_mon_joriyyil }} </td>
                        <td class="border ">{{ $ilmiyloyiha->ilmiy_mon_jami }} </td>
                    </tr>

                    <tr class="bg-gray-200">
                        <!-- <th class="border border-b-2 ">15</th> -->
                        <th class="border border-b-2 ">Olingan patentlar soni (Joriy yil uchun) </th>
                        <th class="border border-b-2 ">Olingan patentlar soni (Jami) </th>
                    </tr>

                    <tr>
                        <!-- <th class="border border-b-2 ">16</th> -->
                        <td class="border ">{{ $ilmiyloyiha->olinganpatent_joriyyil }} </td>
                        <td class="border ">{{ $ilmiyloyiha->olinganpatent_jami }} </td>
                    </tr>


                    <tr class="bg-gray-200">
                        <!-- <th class="border border-b-2 ">15</th> -->
                        <th class="border border-b-2 "> Dasturiy maxsulotga guvoxnomalar soni (Joriy yil uchun)</th>
                        <th class="border border-b-2 ">Dasturiy maxsulotga guvoxnomalar soni (Jami) </th>
                    </tr>

                    <tr>
                        <!-- <th class="border border-b-2 ">16</th> -->
                        <td class="border ">{{ $ilmiyloyiha->dasturiy_maxguv_joriyyil }} </td>
                        <td class="border ">{{ $ilmiyloyiha->dasturiy_maxguv_jami }} </td>
                    </tr>

                    <tr class="bg-gray-200">
                        <!-- <th class="border border-b-2 ">15</th> -->
                        <th class="border border-b-2 ">Hisobot davrida qo‘lga kiritlgan muhim natijalar </th>
                        <th class="border border-b-2 ">Loyiha yakunida yaratilgan ishlanma (texnologiya) nomi va qisqacha
                            tavsifi </th>
                    </tr>

                    <tr>
                        <!-- <th class="border border-b-2 ">16</th> -->
                        <td class="border ">{{ $ilmiyloyiha->hisobot_davrida_natijalar }} </td>
                        <td class="border ">{{ $ilmiyloyiha->loyiha_yakunida }} </td>
                    </tr>

                    <tr class="bg-gray-200">
                        <!-- <th class="border border-b-2 ">15</th> -->
                        <th class="border border-b-2 ">Ilmiy ishlanma joriy etiladigan (tijoratlashtiriladigan) tarmoq
                            (soha) va kutilayotgan natijalar (mavjud ehtiyoj, iqtisodiy samaradorlik ko‘rsatkichlari
                            tahlili) </th>
                        <th class="border border-b-2 ">Patentga berilgan buyurtmalar soni </th>
                    </tr>

                    <tr>
                        <!-- <th class="border border-b-2 ">16</th> -->
                        <td class="border ">{{ $ilmiyloyiha->ilmiy_ishlanma }} </td>
                        <td class="border ">{{ $ilmiyloyiha->patentga_berilgansoni }} </td>
                    </tr>

                    <tr class="bg-gray-200">
                        <!-- <th class="border border-b-2 ">15</th> -->
                        <th class="border border-b-2 ">Loyiha rahbari ilmiy darajasi</th>
                        <th class="border border-b-2 ">Loyiha rahbari ilmiy unvoni </th>
                    </tr>

                    <tr>
                        <!-- <th class="border border-b-2 ">16</th> -->
                        <td class="border ">{{ $ilmiyloyiha->rahbariilmiy_unvoni }} </td>
                        <td class="border ">{{ $ilmiyloyiha->rahbariilmiy_darajasi }} </td>
                    </tr>

                    <tr class="bg-gray-200">
                        <!-- <th class="border border-b-2 ">15</th> -->
                        <th class="border border-b-2 ">Loyiha rahbari lavozimi</th>
                        <th class="border border-b-2 ">  Savolnoma</th>
                    </tr>

                    <tr>
                        <!-- <th class="border border-b-2 ">16</th> -->
                        <td class="border ">{{ $ilmiyloyiha->r_lavozimi }} </td>
                        <td class="border ">
                            @if ($ilmiyloyiha->savolnoma)
                                <a href="{{ asset('storage/' . $ilmiyloyiha->savolnoma) }}"
                                    class="button  bg-theme-1 text-white">Faylni ko'rish</a>
                            @endif
                        </td>
                    </tr>

                    <tr class="bg-gray-200">
                        <!-- <th class="border border-b-2 ">15</th> -->
                        <th class="border border-b-2 ">Tashkilotingiz tomonidan davlat buyurtmasi asosida amalga oshirilayotgan ilmiy tadqiqot loyihalarining asosiy natijalari to‘g‘risida
                        MA’LUMOT</th>
                        <th class="border border-b-2 ">  </th>
                    </tr>

                    <tr>
                        <!-- <th class="border border-b-2 ">16</th> -->
                        <td class="border ">
                            @if ($ilmiyloyiha->malumotnoma)
                                <a href="{{ asset('storage/' . $ilmiyloyiha->malumotnoma) }}"
                                    class="button  bg-theme-1 text-white">Faylni ko'rish</a>
                            @endif
                        </td>
                        <td class="border "></td>
                    </tr>


                </tbody>
            </table>
            <table class="table">
                <tbody>
                    <tr>
                        <th colspan="8" class="border border-b-2 " style="text-align: center;">Umumiy ajratilgan
                            mablag‘ (ming so‘mda)</th>
                    </tr>
                    <tr class="bg-gray-200">
                        <th class="border border-b-2 ">2017 yil</th>
                        <th class="border border-b-2 ">2018 yil</th>
                        <th class="border border-b-2 ">2019 yil</th>
                        <th class="border border-b-2 ">2020 yil</th>
                        <th class="border border-b-2 ">2021 yil</th>
                        <th class="border border-b-2 ">2022 yil</th>
                        <th class="border border-b-2 ">2023 yil</th>
                        <th class="border border-b-2 ">2024 yil</th>
                    </tr>
                    <tr>
                        <td class="border border-b-2 ">{{ $ilmiyloyiha->umumiyyil->y2017 }}</td>
                        <td class="border border-b-2 ">{{ $ilmiyloyiha->umumiyyil->y2018 }}</td>
                        <td class="border border-b-2 ">{{ $ilmiyloyiha->umumiyyil->y2019 }}</td>
                        <td class="border border-b-2 ">{{ $ilmiyloyiha->umumiyyil->y2020 }}</td>
                        <td class="border border-b-2 ">{{ $ilmiyloyiha->umumiyyil->y2021 }}</td>
                        <td class="border border-b-2 ">{{ $ilmiyloyiha->umumiyyil->y2022 }}</td>
                        <td class="border border-b-2 ">{{ $ilmiyloyiha->umumiyyil->y2023 }}</td>
                        <td class="border border-b-2 ">{{ $ilmiyloyiha->umumiyyil->y2024 }}</td>
                    </tr>
                </tbody>
            </table>
        </div>





    </div>
    @role('Ekspert')
    <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2"
        style="background: white; padding: 20px 20px; border-radius: 20px">
        <div class="w-full mt-3 sm:mt-0 sm:ml-auto md:ml-0">
            <form id="science-paper-create-form" method="POST" action="{{ route('tekshirivchilar.store') }}"
                class="validate-form" enctype="multipart/form-data" novalidate="novalidate">
                @csrf
                <div class="grid grid-cols-12 gap-2">
                    <input type="hidden" name="ilmiyloyiha_id" value="{{ $ilmiyloyiha->id }}">

                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"> <span
                                class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Status
                        </label>
                        <select name="status" id="science-sub-category" class="input border w-full mt-2"
                            required="">

                            <option value="">Status tanlang</option>

                            <option value="Ijobiy">Ijobiy</option>

                            <option value="Qoniqarli">Qoniqarli</option>

                            <option value="Qoniqarsiz">Qoniqarsiz</option>


                        </select><br>

                        @error('muddat')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="w-full col-span-6 ">
                        <label class="flex flex-col sm:flex-row"> <span
                                class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> comment</label>
                        <textarea name="comment" id="" class="input w-full border mt-2" cols="5" rows="5"></textarea>
                    </div>
                </div>

            </form><br>
            <div class="px-5 pb-5 text-center">
                <a href="{{ route('ilmiyloyiha.index') }}"
                    class="button delete-cancel w-32 border text-gray-700 mr-1">
                    Bekor qilish
                </a>
                <button type="submit" form="science-paper-create-form"
                    class="update-confirm button w-24 bg-theme-1 text-white">
                    Qo'shish
                </button>
            </div>
        </div>
    </div>

    <a href="{{ url('generate-pdf/' . $ilmiyloyiha->id) }}" class="button delete-cancel w-32 border text-gray-700 mr-1">
        pdf genertsiya
    </a>
    @endrole

    </div>
@endsection
