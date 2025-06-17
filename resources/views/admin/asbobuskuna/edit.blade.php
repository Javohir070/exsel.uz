@extends('layouts.admin')

@section('content')


    <div class="flex justify-between align-center mt-6 mb-6">

        <h2 class="intro-y text-lg font-medium">Xarid qilingan asbob-uskunani qo'shish</h2>

        <a href="{{ route('asbobuskuna.index') }}" class="button w-24 bg-theme-1 text-white">
            Orqaga
        </a>

    </div>

    <div class="intro-y col-span-6 flex flex-wrap sm:flex-no-wrap items-center mt-2" style="background: white;
            padding: 20px 20px;
            border-radius: 4px">
        <div class="w-full mt-3 sm:mt-0 sm:ml-auto md:ml-0">
            <form id="science-paper-create-form" method="POST" action="{{ route("asbobuskuna.update", $asbobuskuna->id) }}"
                class="validate-form" enctype="multipart/form-data" novalidate="novalidate">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-12 gap-2">

                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"> <span
                                class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Nomi
                        </label>
                        <input type="text" name="name" value="{{ $asbobuskuna->name }}" class="input w-full border mt-2"
                            required="">
                        @error('name')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Model -->
                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"><span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Model</label>
                        <input type="text" name="model" value="{{ $asbobuskuna->model }}" class="input w-full border mt-2" required>
                        @error('model')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"><span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Inventar raqami</label>
                        <input type="text" name="invertar_r" value="{{ $asbobuskuna->invertar_r }}" class="input w-full border mt-2" required>
                        @error('invertar_r')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Turi -->
                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row">
                            <span class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Turi
                        </label>
                        <select name="turi" class="input border w-full mt-2" required>
                            <option value=""></option>

                            <option value="Umumiy laboratoriya"
                                {{ old('turi', $asbobuskuna->turi ?? '') == 'Umumiy laboratoriya' ? 'selected' : '' }}>
                                Umumiy laboratoriya
                            </option>

                            <option value="O'lchash asbob-uskunasi"
                                {{ old('turi', $asbobuskuna->turi ?? '') == "O'lchash asbob-uskunasi" ? 'selected' : '' }}>
                                O'lchash asbob-uskunasi
                            </option>

                            <option value="Ixtisoslashtirilgan asbob-uskunasi"
                                {{ old('turi', $asbobuskuna->turi ?? '') == "Ixtisoslashtirilgan asbob-uskunasi" ? 'selected' : '' }}>
                                Ixtisoslashtirilgan asbob-uskunasi
                            </option>

                            <option value="Sinov asbob-uskunasi"
                                {{ old('turi', $asbobuskuna->turi ?? '') == "Sinov asbob-uskunasi" ? 'selected' : '' }}>
                                Sinov asbob-uskunasi
                            </option>

                            <option value="Analitik asbob-uskunasi"
                                {{ old('turi', $asbobuskuna->turi ?? '') == "Analitik asbob-uskunasi" ? 'selected' : '' }}>
                                Analitik asbob-uskunasi
                            </option>

                            <option value="ORG texnika"
                                {{ old('turi', $asbobuskuna->turi ?? '') == "ORG texnika" ? 'selected' : '' }}>
                                ORG texnika
                            </option>
                        </select><br>

                        @error('turi')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>




                    <!-- Ishlab chiqaruvchi davlat -->
                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row">
                            <span class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Davlatni tanlang
                        </label>
                        <select name="ishlab_davlat" class="input border w-full mt-2" required>
                            <option value="">Davlatni tanlang</option>

                            @php
                                $davlatlar = [
                                    "Afgʻoniston", "Albaniya", "Amerika Qoʻshma Shtatlari", "Andorra", "Angola",
                                    "Antigua va Barbuda", "Argentina", "Armaniston", "Avstraliya", "Avstriya",
                                    "Ozarbayjon", "Bagama orollari", "Bahrayn", "Bangladesh", "Barbados",
                                    "Belarus", "Belgiya", "Beliz", "Benin", "Butan", "Boliviya",
                                    "Bosniya va Gertsegovina", "Botsvana", "Braziliya", "Bruney", "Bolgariya",
                                    "Burkina-Faso", "Burundi", "Kabo-Verde", "Kambodja", "Kamerun",
                                    "Kanada", "Markaziy Afrika Respublikasi", "Chad", "Chili", "Xitoy",
                                    "Kolumbiya", "Komor orollari", "Kongo Demokratik Respublikasi", "Kongo Respublikasi",
                                    "Kosta-Rika", "Xorvatiya", "Kuba", "Kipr", "Chexiya", "Daniya", "Jibuti",
                                    "Dominika", "Dominikan Respublikasi", "Ekvador", "Misr", "Salvador",
                                    "Ekvatorial Gvineya", "Eritreya", "Estoniya", "Eswatini", "Efiopiya",
                                    "Fiji", "Finlyandiya", "Fransiya", "Gabon", "Gambiya", "Gruziya",
                                    "Germaniya", "Gana", "Gretsiya", "Grenada", "Gvatemala", "Gvineya",
                                    "Gvineya-Bisau", "Gayana", "Gaiti", "Gonduras", "Vengriya", "Islandiya",
                                    "Hindiston", "Indoneziya", "Eron", "Iroq", "Irlandiya", "Isroil", "Italiya",
                                    "Yamayka", "Yaponiya", "Iordaniya", "Qozogʻiston", "Keniya", "Kiribati",
                                    "Koreya Respublikasi", "Koreya Xalq Demokratik Respublikasi", "Quvayt",
                                    "Qirgʻiziston", "Laos", "Latviya", "Livan", "Liberiya", "Liviya",
                                    "Lixtenshteyn", "Litva", "Luksemburg", "Madagaskar", "Malavi", "Malayziya",
                                    "Maldiv orollari", "Mali", "Malta", "Meksika", "Moldova", "Mongoliya",
                                    "Chernogoriya", "Marokash", "Mozambik", "Myanma", "Namibiya", "Nepal",
                                    "Niderland", "Yangi Zelandiya", "Nikaragua", "Niger", "Nigeriya", "Norvegiya",
                                    "Ummon", "Pokiston", "Panama", "Paragvay", "Peru", "Filippin", "Polsha",
                                    "Portugaliya", "Qatar", "Ruminiya", "Rossiya", "Ruanda", "Saudiya Arabistoni",
                                    "Senegal", "Serbiya", "Seyshellar", "Sierra-Leone", "Singapur", "Slovakiya",
                                    "Sloveniya", "Somaliya", "Janubiy Afrika", "Ispaniya", "Shvetsiya",
                                    "Shveytsariya", "Suriya", "Tayvan", "Tojikiston", "Tanzaniya", "Tailand",
                                    "Togo", "Tonga", "Turkmaniston", "Turkiya", "Uganda", "Ukraina",
                                    "Birlashgan Arab Amirliklari", "Buyuk Britaniya", "Urugvay", "Oʻzbekiston",
                                    "Vanuatu", "Vatikan", "Venesuela", "Vyetnam", "Yaman", "Zambiya", "Zimbabve"
                                ];
                            @endphp

                            @foreach($davlatlar as $davlat)
                                <option value="{{ $davlat }}"
                                    {{ old('ishlab_davlat', $asbobuskuna->ishlab_davlat ?? '') == $davlat ? 'selected' : '' }}>
                                    {{ $davlat }}
                                </option>
                            @endforeach
                        </select>

                        @error('ishlab_davlat')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>



                    <!-- Ishlab chiqarilgan yil -->
                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"><span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Ishlab chiqarilgan yil</label>
                        <select name="ishlabchiq_yil" value="{{ $asbobuskuna->ishlabchiq_yil }}"
                            class="science-sub-categoryyil input border w-full mt-2 " required="">
                            <option value="{{ $asbobuskuna->ishlabchiq_yil }}">{{ $asbobuskuna->ishlabchiq_yil }}</option>
                        </select>
                        @error('ishlabchiq_yil')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Harid summa -->
                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"><span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Harid qilingan summasi (buxgalteriya balans summasi  so'mda)</label>
                        <input type="text" name="harid_summa" id="sumInput2" oninput="formatNumber(this, 'writtenWords')" value="{{ $asbobuskuna->harid_summa }}" class="input w-full border mt-2" required>
                        <span id="writtenWords" class="mt-2 text-gray-600"></span> so'm
                        @error('harid_summa')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Buxgalteriya summa -->
                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"><span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Buxgalteriya bo'yicha qoldiq summasi ( so'mda)</label>
                        <input type="text" name="buxgalteriya_summa" id="sumInput2" oninput="formatNumber(this, 'buxgalteriya_summa_writtenWords')" value="{{ $asbobuskuna->buxgalteriya_summa }}" class="input w-full border mt-2" required>
                        <span id="buxgalteriya_summa_writtenWords" class="mt-2 text-gray-600"></span> so'm
                        @error('buxgalteriya_summa')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Moliya manbasi -->
                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"><span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Moliyalashtirish manbasi</label>
                        <select name="moliya_manbasi" id="moliya_manbasi" class="input border w-full mt-2" required onchange="toggleLoyihaShifri()">
                            <option value=""></option>

                            <option value="Ilm-fanni moliyalashtirish va innovatsiyalarni qo‘llab-quvvatlash jamg‘armasi"
                                {{ old('moliya_manbasi', $asbobuskuna->moliya_manbasi ?? '') == "Ilm-fanni moliyalashtirish va innovatsiyalarni qo‘llab-quvvatlash jamg‘armasi" ? 'selected' : '' }}>
                                Ilm-fanni moliyalashtirish va innovatsiyalarni qo‘llab-quvvatlash jamg‘armasi
                            </option>

                            <option value="Ilmiy loyiha doirasida"
                                {{ old('moliya_manbasi', $asbobuskuna->moliya_manbasi ?? '') == "Ilmiy loyiha doirasida" ? 'selected' : '' }}>
                                Ilmiy loyiha doirasida
                            </option>

                            <option value="Tashkilot byudjet mablag‘lari hisobidan"
                                {{ old('moliya_manbasi', $asbobuskuna->moliya_manbasi ?? '') == "Tashkilot byudjet mablag‘lari hisobidan" ? 'selected' : '' }}>
                                Tashkilot byudjet mablag‘lari hisobidan
                            </option>

                            <option value="Tashkilotning byudjetdan tashqari mablag‘lari hisobidan"
                                {{ old('moliya_manbasi', $asbobuskuna->moliya_manbasi ?? '') == "Tashkilotning byudjetdan tashqari mablag‘lari hisobidan" ? 'selected' : '' }}>
                                Tashkilotning byudjetdan tashqari mablag‘lari hisobidan
                            </option>

                            <option value="Moliya institutlari"
                                {{ old('moliya_manbasi', $asbobuskuna->moliya_manbasi ?? '') == "Moliya institutlari" ? 'selected' : '' }}>
                                Moliya institutlari
                            </option>

                            <option value="Homiylik mablag‘lari"
                                {{ old('moliya_manbasi', $asbobuskuna->moliya_manbasi ?? '') == "Homiylik mablag‘lari" ? 'selected' : '' }}>
                                Homiylik mablag‘lari
                            </option>
                        </select><br>

                        @error('moliya_manbasi')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>


                    <!-- Loyiha shifri -->
                    <div class="w-full col-span-6" id="loyiha_shifri_div" style="display: none;">
                        <label class="flex flex-col sm:flex-row"><span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Loyiha shifri</label>
                        {{-- <input type="text" name="loy_shifri" value="{{ old('loy_shifri') }}" class="input w-full border mt-2"> --}}
                        <select name="loy_shifri" value="{{ old('loy_shifri') }}"
                            class="input border w-full mt-2 " required="">
                            <option value=""></option>
                            @foreach ($ilmiy_loyhalar as $l)
                            <option value="{{ $l->raqami }}">{{ $l->raqami }},{{ $l->mavzusi }}</option>
                            @endforeach
                        </select>
                        @error('loy_shifri')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Shartnoma raqami -->
                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"><span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Shartnoma raqami (uskuna bo'yicha)</label>
                        <input type="text" name="sh_raqami" value="{{ $asbobuskuna->sh_raqami }}" class="input w-full border mt-2" required>
                        @error('sh_raqami')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Shartnoma sanasi -->
                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"><span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Shartnoma sanasi</label>
                        <input type="date" name="sh_sanasi" value="{{ $asbobuskuna->sh_sanasi }}" class="input w-full border mt-2" required>
                        @error('sh_sanasi')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Harid qilingan yil -->
                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"><span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Harid qilingan yil</label>
                        <select name="harid_qilingan_yil" value="{{ $asbobuskuna->harid_qilingan_yil }}"
                            class="science-sub-categoryyil input border w-full mt-2 " required="">
                            <option value="{{ $asbobuskuna->harid_qilingan_yil }}">{{ $asbobuskuna->harid_qilingan_yil }}</option>
                        </select>
                        @error('harid_qilingan_yil')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Holati -->
                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"><span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Holati</label>
                        <select name="holati" class="science-sub-category input border w-full mt-2" required>
                            <option value=""></option>

                            <option value="Ishchi holada"
                                {{ old('holati', $asbobuskuna->holati ?? '') == "Ishchi holada" ? 'selected' : '' }}>
                                Ishchi holada
                            </option>

                            <option value="Ta'mir talab"
                                {{ old('holati', $asbobuskuna->holati ?? '') == "Ta'mir talab" ? 'selected' : '' }}>
                                Ta'mir talab
                            </option>

                            <option value="O'rnatilmagan"
                                {{ old('holati', $asbobuskuna->holati ?? '') == "O'rnatilmagan" ? 'selected' : '' }}>
                                O'rnatilmagan
                            </option>
                        </select>

                        @error('holati')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>


                    <!-- O'rnatilgan yil -->
                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"><span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>O'rnatilgan yil</label>
                        <select name="urnatilgan_yili" value="{{ $asbobuskuna->urnatilgan_yili }}"
                            class="science-sub-categoryyil input border w-full mt-2 " required="">
                            <option value="{{ $asbobuskuna->urnatilgan_yili }}">{{ $asbobuskuna->urnatilgan_yili }}</option>
                        </select>
                        @error('urnatilgan_yili')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"><span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Foydalanishga mas'ul tarkibiy bo‘linma (laboratoriya, kafedra, sho‘ba) nomi</label>
                        <select name="laboratory_id" id="laboratory_id" value="{{ $asbobuskuna->laboratory_id }}"
                            class="input border w-full mt-2 " required="" required onchange="toggleLoyShifriLabaratoriya()">
                            <option value=""></option>
                            @foreach ($laboratorys as $l)
                            <option value="{{ $l->id }}">{{ $l->name }}</option>
                            @endforeach
                            <option value="yoq">Yo'q</option>
                        </select>
                        @error('laboratory_id')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="w-full col-span-6" id="kafedralar_id_div" style="display: none;">
                        <label class="flex flex-col sm:flex-row"><span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Foydalanishga mas'ul tarkibiy bo‘linma (Kafedra) nomi</label>
                        <select name="kafedralar_id"  value="{{ old('kafedralar_id') }}" class="input border w-full mt-2 "
                            required="">
                            <option value=""></option>
                            @foreach ($kafedralar as $l)
                                <option value="{{ $l->id }}">{{ $l->name }}</option>
                            @endforeach
                            <option value="yoq">Yo'q</option>
                        </select>
                        @error('kafedralar_id')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- FISH -->
                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"><span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>F.I.SH</label>
                        <input type="text" name="fish" value="{{ $asbobuskuna->fish }}" class="input w-full border mt-2" required>
                        @error('fish')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Javobgar buyruq raqami -->
                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"><span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Javobgar etib belgilanganligi to‘g‘risida buyruq  raqami</label>
                        <input type="text" name="jav_buy_raqami" value="{{ $asbobuskuna->jav_buy_raqami }}" class="input w-full border mt-2" required>
                        @error('jav_buy_raqami')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Javobgar etib belgilanganligi to‘g‘risida buyruq  sanasi -->
                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"><span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Javobgar etib belgilanganligi to‘g‘risida buyruq  sanasi</label>
                        <input type="date" name="jav_sanasi" value="{{ $asbobuskuna->jav_sanasi }}" class="input w-full border mt-2" required>
                        @error('jav_sanasi')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"><span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Bajarilayotgan ilmiy-tadqiqot ishlari</label>
                        <textarea name="ilmiy_tadqiqot_ishilari" value="" class="input w-full border mt-2" cols="10" rows="5">{{ $asbobuskuna->ilmiy_tadqiqot_ishilari }}</textarea>
                        @error('ilmiy_tadqiqot_ishilari')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"><span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Ilmiy-tadqiqot dasturlaridagi ish hajmi </label>
                        <textarea name="ilmiy_tadqiqot_hajmi" value="" class="input w-full border mt-2" cols="10" rows="5">{{ $asbobuskuna->ilmiy_tadqiqot_hajmi }}</textarea>
                        @error('ilmiy_tadqiqot_hajmi')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"><span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Laboratoriya uskunalari uchun zarur reagent va reaktivlar zaxirasi</label>
                        <textarea name="lab_zaxirasi" value="" class="input w-full border mt-2" cols="10" rows="5">{{ $asbobuskuna->lab_zaxirasi }}</textarea>
                        @error('lab_zaxirasi')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"><span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Foydalanish uchun arizalarning ro‘yxatga olinishi va foydalanish jadvalining yuritilishi</label>
                        <textarea name="foy_uchun_ariz" value="" class="input w-full border mt-2" cols="10" rows="5">{{ $asbobuskuna->foy_uchun_ariz }}</textarea>
                        @error('foy_uchun_ariz')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"><span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Ilmiy tadqiqot va oliy ta’lim muassasalari laboratoriyalarining qo‘shimcha asbob-uskunalarga ehtiyoji</label>
                        <textarea name="asbob_usk_ehtiyoji" value="" class="input w-full border mt-2" cols="10" rows="5">{{ $asbobuskuna->asbob_usk_ehtiyoji }}</textarea>
                        @error('asbob_usk_ehtiyoji')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"><span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Zarur sarflash materiallari va butlovchi qismlar bo‘yicha ehtiyoji</label>
                        <textarea name="zarur_ehtiyoji" value="" class="input w-full border mt-2" cols="10" rows="5">{{ $asbobuskuna->zarur_ehtiyoji }}</textarea>
                        @error('zarur_ehtiyoji')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                </div>
            </form>

            <div class="px-5 pb-5 text-center mt-4">
                <a href="{{ route('asbobuskuna.index') }}" class="button delete-cancel w-32 border text-gray-700 mr-1">
                    Bekor qilish
                </a>
                <button type="submit" form="science-paper-create-form"
                    class="update-confirm button w-24 bg-theme-1 text-white">
                    Saqlash
                </button>
            </div>
            
        </div>
    </div>

    <script>
        function toggleLoyihaShifri() {
            const moliyaSelect = document.getElementById('moliya_manbasi');
            const loyihaDiv = document.getElementById('loyiha_shifri_div');

            if (moliyaSelect.value === 'Ilmiy loyiha doirasida') {
                loyihaDiv.style.display = 'block';
            } else {
                loyihaDiv.style.display = 'none';
            }
        }

        function toggleLoyShifriLabaratoriya() {
            const moliyaSelect = document.getElementById('laboratory_id');
            const loyDiv = document.getElementById('kafedralar_id_div');

            if (moliyaSelect.value === 'yoq') {
                loyDiv.style.display = 'block';
            } else {
                loyDiv.style.display = 'none';
            }
        }

        // Ikkala funksiyani bitta window.onload ichida chaqirish
        window.onload = function () {
            toggleLoyihaShifri();
            toggleLoyShifriLabaratoriya();
        };
    </script>
    <script>
        // Boshlang'ich va tugash yillari
        var startYear = 1960;
        var endYear = 2024;

        // Barcha class nomi 'science-sub-category' bo'lgan select elementlarini olish
        var selects = document.getElementsByClassName('science-sub-categoryyil');

        // Har bir select elementi uchun sikl
        for (var i = 0; i < selects.length; i++) {
            var select = selects[i];

            // Har bir select elementi uchun yillarni qo'shish
            for (var year = endYear; year >= startYear; year--) {
                var option = document.createElement('option');
                option.value = year;
                option.text = year;
                option.className = 'year-option'; // Class qo'shish
                select.appendChild(option);
            }
        }
    </script>
    <script>
    const ones = ["", "bir", "ikki", "uch", "to‘rt", "besh", "olti", "yetti", "sakkiz", "to‘qqiz"];
    const tens = ["", "o‘n", "yigirma", "o‘ttiz", "qirq", "ellik", "oltmish", "yetmish", "sakson", "to‘qson"];
    const thousands = ["", " ming", " million", " milliard"];

    function formatNumber(input, outputId) {
        // Faqat raqamlar
        let value = input.value.replace(/\D/g, "");

        // 3 xonadan bo‘sh joy bilan formatlash (masalan: 100 000)
        input.value = value.replace(/\B(?=(\d{3})+(?!\d))/g, " ");

        // So‘z ko‘rinishiga o‘girish
        document.getElementById(outputId).textContent = numberToWords(Number(value));
    }

    function numberToWords(num) {
        if (num === 0) return "nol";
        let words = '';
        let groupIndex = 0;

        while (num > 0) {
            let chunk = num % 1000;
            if (chunk > 0) {
                words = chunkToWords(chunk) + thousands[groupIndex] + ' ' + words;
            }
            num = Math.floor(num / 1000);
            groupIndex++;
        }

        return words.trim();
    }

    function chunkToWords(n) {
        let result = '';
        if (n >= 100) {
            result += ones[Math.floor(n / 100)] + ' yuz ';
            n %= 100;
        }
        if (n >= 10) {
            result += tens[Math.floor(n / 10)] + ' ';
            n %= 10;
        }
        if (n > 0) {
            result += ones[n] + ' ';
        }
        return result;
    }
</script>
@endsection
