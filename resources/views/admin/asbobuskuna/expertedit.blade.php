@extends('layouts.admin')

@section('content')

    <div class="content">
        <div class="flex justify-between align-center mt-10">

            <h2 class="intro-y text-lg font-medium">{{ $asbobuskuna->name }}</h2>
            @role('super-admin')
            <a href="{{ route("asbobuskunalar.index") }}" class="button w-24 bg-theme-1 text-white">
                Orqaga
            </a>
            @endrole
            @role('admin')
            <a href="{{ route("asbobuskuna.index") }}" class="button w-24 bg-theme-1 text-white">
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
                        <div style="font-size:18px;font-weight: 400;"> {{$asbobuskuna->name}} xaqida ma’lumot</div>
                        @can("tashkilotrahbari delete edit")

                            <div style="text-align: end;">
                                <a href="{{ route('asbobuskuna.edit', ['asbobuskuna' => $asbobuskuna->id])}}"
                                    class="button w-24 bg-theme-1 text-white" style="margin-right:20px;">
                                    Tahrirlash
                                </a>
                                <a href="" class="button w-24 bg-theme-6 text-white">
                                    O'chirish
                                </a>
                            </div>
                        @endcan
                    </div>
                    <tr>
                        <!-- <th class="whitespace-no-wrap border" style="width: 40px";>#</th>
                                    <th class="whitespace-no-wrap border" style="width:50%;">Ma’lumot nomlanishi</th> -->
                        <th class=" border" style="width: 100%; font-size:16px;text-align:center;" colspan="2">Ma’lumot</th>
                    </tr>
                    <tr class="bg-gray-200">
                        <th class=" border" style="width:50%;">Nomi</th>
                        <th class=" border" style="width:50%;">Model</th>
                    </tr>
                    <tr>
                        <td class="border">{{ $asbobuskuna->name }}</td>
                        <td class="border">{{ $asbobuskuna->model }}</td>
                    </tr>
                    <tr class="bg-gray-200">
                        <th class=" border">Turi</th>
                        <th class=" border">Ishlab chiqilgan davlat</th>
                    </tr>
                    <tr>
                        <td class="border">{{ $asbobuskuna->turi }} </td>
                        <td class="border">{{ $asbobuskuna->ishlab_davlat }} </td>
                    </tr>

                    <tr class="bg-gray-200">
                        <th class=" border">Ishlab chiqilgan yili</th>
                        <th class=" border">Harid qilingan summasi
                            (buxgalteriya balans summasi)</th>
                    </tr>
                    <tr>
                        <td class="border">{{ $asbobuskuna->ishlabchiq_yil  }}</td>
                        <td class="border">{{ $asbobuskuna->harid_summa  }} so'm</td>
                    </tr>

                    <tr class="bg-gray-200">
                        <th class="border">Buxgalteriya bo'yicha qoldiq summasi</th>
                        <th class="border">Moliyalashtirish manbasi</th>
                    </tr>
                    <tr>
                        <td class="border">{{ $asbobuskuna->buxgalteriya_summa  }} so'm</td>
                        <td class="border">{{ $asbobuskuna->moliya_manbasi  }}</td>
                    </tr>

                    <tr class="bg-gray-200">
                        <th class="border">Loyiha shifri</th>
                        <th class="border">Shartnoma raqami
                            (uskuna bo'yicha)</th>
                    </tr>
                    <tr>
                        <td class="border">{{ $asbobuskuna->loy_shifri  }}</td>
                        <td class="border">{{ $asbobuskuna->sh_raqami  }}</td>
                    </tr>

                    <tr class="bg-gray-200">
                        <th class="border">Shartnoma sanasi</th>
                        <th class="border">Harid qilingan yili</th>
                    </tr>
                    <tr>
                        <td class="border">{{ $asbobuskuna->sh_sanasi  }}</td>
                        <td class="border">{{ $asbobuskuna->harid_qilingan_yil  }}</td>
                    </tr>

                    <tr class="bg-gray-200">
                        <th class="border">Holati</th>
                        <th class="border">O‘rnatilgan yili</th>
                    </tr>
                    <tr>
                        <td class="border">{{ $asbobuskuna->holati  }}</td>
                        <td class="border">{{ $asbobuskuna->urnatilgan_yili  }}</td>
                    </tr>

                    <tr class="bg-gray-200">
                        <th class="border">Foydalanishga mas'ul tarkibiy bo‘linma (laboratoriya, kafedra, sho‘ba) nomi</th>
                        <th class="border">FIO</th>
                    </tr>
                    <tr>
                        <td class="border">
                            {{ optional($asbobuskuna->laboratory)->name ?? optional($asbobuskuna->kafedralar)->name ?? 'Maʼlumot yo‘q' }}
                        </td>
                        <td class="border">{{ $asbobuskuna->fish  }}</td>
                    </tr>

                    <tr class="bg-gray-200">
                        <th class="border">Javobgar etib belgilanganligi to‘g‘risida buyruq raqami</th>
                        <th class="border">Javobgar etib belgilanganligi to‘g‘risida buyruq sanasi</th>
                    </tr>
                    <tr>
                        <td class="border">{{ $asbobuskuna->jav_buy_raqami  }}</td>
                        <td class="border">{{ $asbobuskuna->jav_sanasi  }}</td>
                    </tr>


                    <tr class="bg-gray-200">
                        <th class="border">Bajarilayotgan ilmiy-tadqiqot ishlari</th>
                        <th class="border">Ilmiy-tadqiqot dasturlaridagi ish hajmi</th>
                    </tr>
                    <tr>
                        <td class="border">{{ $asbobuskuna->ilmiy_tadqiqot_ishilari  }}</td>
                        <td class="border">{{ $asbobuskuna->ilmiy_tadqiqot_hajmi  }}</td>
                    </tr>

                    <tr class="bg-gray-200">
                        <th class="border">Laboratoriya uskunalari uchun zarur reagent va reaktivlar zaxirasi</th>
                        <th class="border">Foydalanish uchun arizalarning ro‘yxatga olinishi va foydalanish jadvalining yuritilishi</th>
                    </tr>
                    <tr>
                        <td class="border">{{ $asbobuskuna->lab_zaxirasi  }}</td>
                        <td class="border">{{ $asbobuskuna->foy_uchun_ariz  }}</td>
                    </tr>

                    <tr class="bg-gray-200">
                        <th class="border">Ilmiy tadqiqot va oliy ta’lim muassasalari laboratoriyalarining qo‘shimcha asbob-uskunalarga ehtiyoji</th>
                        <th class="border">Zarur sarflash materiallari va butlovchi qismlar bo‘yicha ehtiyoji</th>
                    </tr>
                    <tr>
                        <td class="border">{{ $asbobuskuna->asbob_usk_ehtiyoji  }}</td>
                        <td class="border">{{ $asbobuskuna->zarur_ehtiyoji  }}</td>
                    </tr>

                </tbody>
            </table>
        </div>


        <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2"
            style="background: white; padding: 20px 20px; border-radius: 20px">
            <div class="w-full mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                <form id="science-paper-create-form" method="POST" action="{{ route('asbobuskunaexpert.update', $asbobuskunaexpert->id) }}"
                    class="validate-form" enctype="multipart/form-data" novalidate="novalidate">
                    @csrf
                    @method('PUT')
                    <div class="grid grid-cols-12 gap-2">

                        <div class="w-full col-span-6">
                            <label class="flex flex-col sm:flex-row"> <span
                                    class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Laboratoriya uskunalarini o'rnatilgan ilmiy bo'linma faoliyatiga mosligi
                            </label>
                            <select name="lab_uskunalarini_mosligi" id="science-sub-category" class="input border w-full mt-2" required="">

                                <option value=""></option>

                                <option value="Ijobiy" {{ (old('lab_uskunalarini_mosligi', $asbobuskunaexpert->lab_uskunalarini_mosligi ?? '') == 'Ijobiy') ? 'selected' : '' }}>Ijobiy</option>
                                <option value="Qoniqarli" {{ (old('lab_uskunalarini_mosligi', $asbobuskunaexpert->lab_uskunalarini_mosligi ?? '') == 'Qoniqarli') ? 'selected' : '' }}>Qoniqarli</option>
                                <option value="Salbiy" {{ (old('lab_uskunalarini_mosligi', $asbobuskunaexpert->lab_uskunalarini_mosligi ?? '') == 'Salbiy') ? 'selected' : '' }}>Salbiy</option>



                            </select><br>

                            @error('ilmiy_hisobot')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="w-full col-span-6">
                            <label class="flex flex-col sm:flex-row"> <span
                                    class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Bajarilavotgan ilmiy-tadqiqot ishlari uchun zarurligi
                            </label>
                            <select name="ilmiy_tadqiqot_ishilari" id="science-sub-category" class="input border w-full mt-2" required="">

                                <option value=""></option>

                                <option value="Ijobiy" {{ (old('ilmiy_tadqiqot_ishilari', $asbobuskunaexpert->ilmiy_tadqiqot_ishilari ?? '') == 'Ijobiy') ? 'selected' : '' }}>Ijobiy</option>
                                <option value="Qoniqarli" {{ (old('ilmiy_tadqiqot_ishilari', $asbobuskunaexpert->ilmiy_tadqiqot_ishilari ?? '') == 'Qoniqarli') ? 'selected' : '' }}>Qoniqarli</option>
                                <option value="Salbiy" {{ (old('ilmiy_tadqiqot_ishilari', $asbobuskunaexpert->ilmiy_tadqiqot_ishilari ?? '') == 'Salbiy') ? 'selected' : '' }}>Salbiy</option>

                            </select><br>

                            @error('muddat')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="w-full col-span-6">
                            <label class="flex flex-col sm:flex-row"> <span
                                    class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Ilmiy-tadqiqot dasturlaridagi ish hajmi bilan bog'liqligi
                            </label>
                            <select name="ilmiy_tadqiqot_hajmi" id="science-sub-category" class="input border w-full mt-2" required="">

                                <option value=""></option>

                                <option value="Ijobiy" {{ (old('ilmiy_tadqiqot_hajmi', $asbobuskunaexpert->ilmiy_tadqiqot_hajmi ?? '') == 'Ijobiy') ? 'selected' : '' }}>Ijobiy</option>
                                <option value="Qoniqarli" {{ (old('ilmiy_tadqiqot_hajmi', $asbobuskunaexpert->ilmiy_tadqiqot_hajmi ?? '') == 'Qoniqarli') ? 'selected' : '' }}>Qoniqarli</option>
                                <option value="Salbiy" {{ (old('ilmiy_tadqiqot_hajmi', $asbobuskunaexpert->ilmiy_tadqiqot_hajmi ?? '') == 'Salbiy') ? 'selected' : '' }}>Salbiy</option>


                            </select><br>

                            @error('muddat')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="w-full col-span-6">
                            <label class="flex flex-col sm:flex-row"> <span
                                    class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Laboratoriya uskunalari uchun zarur reagent va reaktivlar zaxirasining mavjudligi
                            </label>
                            <select name="lab_zaxirasi" id="science-sub-category" class="input border w-full mt-2" required="">

                                <option value=""></option>

                                <option value="Ijobiy" {{ (old('lab_zaxirasi', $asbobuskunaexpert->lab_zaxirasi ?? '') == 'Ijobiy') ? 'selected' : '' }}>Ijobiy</option>
                                <option value="Yetarli" {{ (old('lab_zaxirasi', $asbobuskunaexpert->lab_zaxirasi ?? '') == 'Yetarli') ? 'selected' : '' }}>Yetarli</option>
                                <option value="Mavjud emas" {{ (old('lab_zaxirasi', $asbobuskunaexpert->lab_zaxirasi ?? '') == 'Mavjud emas') ? 'selected' : '' }}>Mavjud emas</option>


                            </select><br>

                            @error('muddat')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="w-full col-span-6">
                            <label class="flex flex-col sm:flex-row"> <span
                                    class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Foydalanish uchun arizalarning ro'yxatga olinishi va foydalanish jadvalining yuritilishi
                                    holatiga baho berish
                            </label>
                            <select name="foy_uchun_ariz" id="science-sub-category" class="input border w-full mt-2" required="">

                                <option value=""></option>

                                <option value="Ijobiy" {{ (old('foy_uchun_ariz', $asbobuskunaexpert->foy_uchun_ariz ?? '') == 'Ijobiy') ? 'selected' : '' }}>Ijobiy</option>
                                <option value="Qoniqarli" {{ (old('foy_uchun_ariz', $asbobuskunaexpert->foy_uchun_ariz ?? '') == 'Qoniqarli') ? 'selected' : '' }}>Qoniqarli</option>
                                <option value="Salbiy" {{ (old('foy_uchun_ariz', $asbobuskunaexpert->foy_uchun_ariz ?? '') == 'Salbiy') ? 'selected' : '' }}>Salbiy</option>

                            </select><br>

                            @error('muddat')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="w-full col-span-6">
                            <label class="flex flex-col sm:flex-row"> <span
                                    class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Ilmiy tadqiqot va oliy ta'lim muassasalari laboratoriyalarining qo'shimcha asbob-uskunalar
                                    bo'yicha ehtiyoji
                            </label>
                            <select name="asbob_usk_ehtiyoji" id="science-sub-category" class="input border w-full mt-2" required="">

                                <option value=""></option>

                                <option value="Mavjud" {{ (old('asbob_usk_ehtiyoji', $asbobuskunaexpert->asbob_usk_ehtiyoji ?? '') == 'Mavjud') ? 'selected' : '' }}>Mavjud</option>
                                <option value="Yetarli" {{ (old('asbob_usk_ehtiyoji', $asbobuskunaexpert->asbob_usk_ehtiyoji ?? '') == 'Yetarli') ? 'selected' : '' }}>Yetarli</option>
                                <option value="Mavjud emas" {{ (old('asbob_usk_ehtiyoji', $asbobuskunaexpert->asbob_usk_ehtiyoji ?? '') == 'Mavjud emas') ? 'selected' : '' }}>Mavjud emas</option>


                            </select><br>

                            @error('muddat')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="w-full col-span-6">
                            <label class="flex flex-col sm:flex-row"> <span
                                    class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Zarur sarflash materiallari va butlovchi qismlar bo'yicha ehtiyojar mavjudligi
                            </label>
                            <select name="zarur_ehtiyoji" id="science-sub-category" class="input border w-full mt-2" required="">

                                <option value=""></option>

                                <option value="Mavjud" {{ (old('zarur_ehtiyoji', $asbobuskunaexpert->zarur_ehtiyoji ?? '') == 'Mavjud') ? 'selected' : '' }}>Mavjud</option>
                                <option value="Yetarli" {{ (old('zarur_ehtiyoji', $asbobuskunaexpert->zarur_ehtiyoji ?? '') == 'Yetarli') ? 'selected' : '' }}>Yetarli</option>
                                <option value="Mavjud emas" {{ (old('zarur_ehtiyoji', $asbobuskunaexpert->zarur_ehtiyoji ?? '') == 'Mavjud emas') ? 'selected' : '' }}>Mavjud emas</option>


                            </select><br>

                            @error('muddat')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="w-full col-span-6">
                            <label class="flex flex-col sm:flex-row"> <span
                                    class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Laboratoriya uskunalarining ishga yaroqliligi
                            </label>
                            <select name="lab_ishga_yaroqliligi" id="science-sub-category" class="input border w-full mt-2" required="">

                                <option value=""></option>
                                <option value="Mavjud" {{ (old('lab_ishga_yaroqliligi', $asbobuskunaexpert->lab_ishga_yaroqliligi ?? '') == 'Mavjud') ? 'selected' : '' }}>Mavjud</option>
                                <option value="Yetarli" {{ (old('lab_ishga_yaroqliligi', $asbobuskunaexpert->lab_ishga_yaroqliligi ?? '') == 'Yetarli') ? 'selected' : '' }}>Yetarli</option>
                                <option value="Mavjud emas" {{ (old('lab_ishga_yaroqliligi', $asbobuskunaexpert->lab_ishga_yaroqliligi ?? '') == 'Mavjud emas') ? 'selected' : '' }}>Mavjud emas</option>

                            </select><br>

                            @error('muddat')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="w-full col-span-6 ">
                            <label class="flex flex-col sm:flex-row"> <span
                                    class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Ekspert F.I.Sh</label>
                            <input type="text" name="ekspert_fish" value="{{ $asbobuskunaexpert->ekspert_fish }}"  class="input w-full border mt-2" required>
                        </div>

                        <div class="w-full col-span-6">
                            <label class="flex flex-col sm:flex-row"> <span
                                    class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Status
                            </label>
                            <select name="status" id="science-sub-category" class="input border w-full mt-2" required="">

                                <option value=""></option>

                                <option value="Ijobiy" {{ (old('status', $asbobuskunaexpert->status ?? '') == 'Ijobiy') ? 'selected' : '' }}>Ijobiy</option>
                                <option value="Qoniqarli" {{ (old('status', $asbobuskunaexpert->status ?? '') == 'Qoniqarli') ? 'selected' : '' }}>Qoniqarli</option>
                                <option value="Salbiy" {{ (old('status', $asbobuskunaexpert->status ?? '') == 'Salbiy') ? 'selected' : '' }}>Salbiy</option>


                            </select><br>

                            @error('muddat')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="w-full col-span-6 ">
                            <label class="flex flex-col sm:flex-row"> <span
                                    class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Izoh</label>
                            <textarea name="comment" id="" class="input w-full border mt-2" cols="5" rows="5">{{ $asbobuskunaexpert->comment }}</textarea>
                        </div>
                    </div>

                </form><br>
                <div class="px-5 pb-5 text-center">
                    <a href="{{ route('asbobuskuna.show', ['asbobuskuna' => $asbobuskunaexpert->asbobuskuna_id]) }}" class="button delete-cancel w-32 border text-gray-700 mr-1">
                        Bekor qilish
                    </a>
                    <button type="submit" form="science-paper-create-form"
                        class="update-confirm button w-24 bg-theme-1 text-white">
                        Tasdiqlash
                    </button>
                </div>
            </div>
        </div>
    </div>


@endsection
