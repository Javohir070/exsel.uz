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
                                            border-radius: 20px">
        <div class="w-full mt-3 sm:mt-0 sm:ml-auto md:ml-0">
            <form id="science-paper-create-form" method="POST" action="{{ route("asbobuskuna.store") }}"
                class="validate-form" enctype="multipart/form-data" novalidate="novalidate">
                @csrf
                <div class="grid grid-cols-12 gap-2">

                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"> <span
                                class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Nomi
                        </label>
                        <input type="text" name="name" value="{{ old('name') }}" class="input w-full border mt-2"
                            required="">
                        @error('name')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Model -->
                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"><span
                                class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Model</label>
                        <input type="text" name="model" value="{{ old('model') }}" class="input w-full border mt-2"
                            required>
                        @error('model')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"><span
                                class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Inventar raqami</label>
                        <input type="text" name="invertar_r" value="{{ old('invertar_r') }}"
                            class="input w-full border mt-2" required>
                        @error('invertar_r')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Turi -->
                    <div class="w-full col-span-6 ">
                        <label class="flex flex-col sm:flex-row"> <span
                                class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Turi
                        </label>
                        <select name="turi" value="{{old('turi')}}" class="input border w-full mt-2" required="">

                            <option value=""></option>

                            <option value="Umumiy laboratoriya">Umumiy laboratoriya</option>

                            <option value="O'lchash asbob-uskunasi">O'lchash asbob-uskunasi</option>

                            <option value="Ixtisoslashtirilgan asbob-uskunasi">Ixtisoslashtirilgan asbob-uskunasi</option>

                            <option value="Sinov asbob-uskunasi">Sinov asbob-uskunasi</option>

                            <option value="Analitik asbob-uskunasi">Analitik asbob-uskunasi</option>

                            <option value="ORG texnika">ORG texnika</option>

                        </select>
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
                            <option value="Afgʻoniston">Afgʻoniston</option>
                            <option value="Albaniya">Albaniya</option>
                            <option value="Amerika Qoʻshma Shtatlari">Amerika Qoʻshma Shtatlari</option>
                            <option value="Andorra">Andorra</option>
                            <option value="Angola">Angola</option>
                            <option value="Antigua va Barbuda">Antigua va Barbuda</option>
                            <option value="Argentina">Argentina</option>
                            <option value="Armaniston">Armaniston</option>
                            <option value="Avstraliya">Avstraliya</option>
                            <option value="Avstriya">Avstriya</option>
                            <option value="Ozarbayjon">Ozarbayjon</option>
                            <option value="Bagama orollari">Bagama orollari</option>
                            <option value="Bahrayn">Bahrayn</option>
                            <option value="Bangladesh">Bangladesh</option>
                            <option value="Barbados">Barbados</option>
                            <option value="Belarus">Belarus</option>
                            <option value="Belgiya">Belgiya</option>
                            <option value="Beliz">Beliz</option>
                            <option value="Benin">Benin</option>
                            <option value="Butan">Butan</option>
                            <option value="Boliviya">Boliviya</option>
                            <option value="Bosniya va Gertsegovina">Bosniya va Gertsegovina</option>
                            <option value="Botsvana">Botsvana</option>
                            <option value="Braziliya">Braziliya</option>
                            <option value="Bruney">Bruney</option>
                            <option value="Bolgariya">Bolgariya</option>
                            <option value="Burkina-Faso">Burkina-Faso</option>
                            <option value="Burundi">Burundi</option>
                            <option value="Kabo-Verde">Kabo-Verde</option>
                            <option value="Kambodja">Kambodja</option>
                            <option value="Kamerun">Kamerun</option>
                            <option value="Kanada">Kanada</option>
                            <option value="Markaziy Afrika Respublikasi">Markaziy Afrika Respublikasi</option>
                            <option value="Chad">Chad</option>
                            <option value="Chili">Chili</option>
                            <option value="Xitoy">Xitoy</option>
                            <option value="Kolumbiya">Kolumbiya</option>
                            <option value="Komor orollari">Komor orollari</option>
                            <option value="Kongo Demokratik Respublikasi">Kongo Demokratik Respublikasi</option>
                            <option value="Kongo Respublikasi">Kongo Respublikasi</option>
                            <option value="Kosta-Rika">Kosta-Rika</option>
                            <option value="Xorvatiya">Xorvatiya</option>
                            <option value="Kuba">Kuba</option>
                            <option value="Kipr">Kipr</option>
                            <option value="Chexiya">Chexiya</option>
                            <option value="Daniya">Daniya</option>
                            <option value="Jibuti">Jibuti</option>
                            <option value="Dominika">Dominika</option>
                            <option value="Dominikan Respublikasi">Dominikan Respublikasi</option>
                            <option value="Ekvador">Ekvador</option>
                            <option value="Misr">Misr</option>
                            <option value="Salvador">Salvador</option>
                            <option value="Ekvatorial Gvineya">Ekvatorial Gvineya</option>
                            <option value="Eritreya">Eritreya</option>
                            <option value="Estoniya">Estoniya</option>
                            <option value="Eswatini">Eswatini</option>
                            <option value="Efiopiya">Efiopiya</option>
                            <option value="Fiji">Fiji</option>
                            <option value="Finlyandiya">Finlyandiya</option>
                            <option value="Fransiya">Fransiya</option>
                            <option value="Gabon">Gabon</option>
                            <option value="Gambiya">Gambiya</option>
                            <option value="Gruziya">Gruziya</option>
                            <option value="Germaniya">Germaniya</option>
                            <option value="Gana">Gana</option>
                            <option value="Gretsiya">Gretsiya</option>
                            <option value="Grenada">Grenada</option>
                            <option value="Gvatemala">Gvatemala</option>
                            <option value="Gvineya">Gvineya</option>
                            <option value="Gvineya-Bisau">Gvineya-Bisau</option>
                            <option value="Gayana">Gayana</option>
                            <option value="Gaiti">Gaiti</option>
                            <option value="Gonduras">Gonduras</option>
                            <option value="Vengriya">Vengriya</option>
                            <option value="Islandiya">Islandiya</option>
                            <option value="Hindiston">Hindiston</option>
                            <option value="Indoneziya">Indoneziya</option>
                            <option value="Eron">Eron</option>
                            <option value="Iroq">Iroq</option>
                            <option value="Irlandiya">Irlandiya</option>
                            <option value="Isroil">Isroil</option>
                            <option value="Italiya">Italiya</option>
                            <option value="Yamayka">Yamayka</option>
                            <option value="Yaponiya">Yaponiya</option>
                            <option value="Iordaniya">Iordaniya</option>
                            <option value="Qozogʻiston">Qozogʻiston</option>
                            <option value="Keniya">Keniya</option>
                            <option value="Kiribati">Kiribati</option>
                            <option value="Koreya Respublikasi">Koreya Respublikasi</option>
                            <option value="Koreya Xalq Demokratik Respublikasi">Koreya Xalq Demokratik Respublikasi</option>
                            <option value="Quvayt">Quvayt</option>
                            <option value="Qirgʻiziston">Qirgʻiziston</option>
                            <option value="Laos">Laos</option>
                            <option value="Latviya">Latviya</option>
                            <option value="Livan">Livan</option>
                            <option value="Liberiya">Liberiya</option>
                            <option value="Liviya">Liviya</option>
                            <option value="Lixtenshteyn">Lixtenshteyn</option>
                            <option value="Litva">Litva</option>
                            <option value="Luksemburg">Luksemburg</option>
                            <option value="Madagaskar">Madagaskar</option>
                            <option value="Malavi">Malavi</option>
                            <option value="Malayziya">Malayziya</option>
                            <option value="Maldiv orollari">Maldiv orollari</option>
                            <option value="Mali">Mali</option>
                            <option value="Malta">Malta</option>
                            <option value="Meksika">Meksika</option>
                            <option value="Moldova">Moldova</option>
                            <option value="Mongoliya">Mongoliya</option>
                            <option value="Chernogoriya">Chernogoriya</option>
                            <option value="Marokash">Marokash</option>
                            <option value="Mozambik">Mozambik</option>
                            <option value="Myanma">Myanma</option>
                            <option value="Namibiya">Namibiya</option>
                            <option value="Nepal">Nepal</option>
                            <option value="Niderland">Niderland</option>
                            <option value="Yangi Zelandiya">Yangi Zelandiya</option>
                            <option value="Nikaragua">Nikaragua</option>
                            <option value="Niger">Niger</option>
                            <option value="Nigeriya">Nigeriya</option>
                            <option value="Norvegiya">Norvegiya</option>
                            <option value="Ummon">Ummon</option>
                            <option value="Pokiston">Pokiston</option>
                            <option value="Panama">Panama</option>
                            <option value="Paragvay">Paragvay</option>
                            <option value="Peru">Peru</option>
                            <option value="Filippin">Filippin</option>
                            <option value="Polsha">Polsha</option>
                            <option value="Portugaliya">Portugaliya</option>
                            <option value="Qatar">Qatar</option>
                            <option value="Ruminiya">Ruminiya</option>
                            <option value="Rossiya">Rossiya</option>
                            <option value="Ruanda">Ruanda</option>
                            <option value="Saudiya Arabistoni">Saudiya Arabistoni</option>
                            <option value="Senegal">Senegal</option>
                            <option value="Serbiya">Serbiya</option>
                            <option value="Seyshellar">Seyshellar</option>
                            <option value="Sierra-Leone">Sierra-Leone</option>
                            <option value="Singapur">Singapur</option>
                            <option value="Slovakiya">Slovakiya</option>
                            <option value="Sloveniya">Sloveniya</option>
                            <option value="Somaliya">Somaliya</option>
                            <option value="Janubiy Afrika">Janubiy Afrika</option>
                            <option value="Ispaniya">Ispaniya</option>
                            <option value="Shvetsiya">Shvetsiya</option>
                            <option value="Shveytsariya">Shveytsariya</option>
                            <option value="Suriya">Suriya</option>
                            <option value="Tayvan">Tayvan</option>
                            <option value="Tojikiston">Tojikiston</option>
                            <option value="Tanzaniya">Tanzaniya</option>
                            <option value="Tailand">Tailand</option>
                            <option value="Togo">Togo</option>
                            <option value="Tonga">Tonga</option>
                            <option value="Turkmaniston">Turkmaniston</option>
                            <option value="Turkiya">Turkiya</option>
                            <option value="Uganda">Uganda</option>
                            <option value="Ukraina">Ukraina</option>
                            <option value="Birlashgan Arab Amirliklari">Birlashgan Arab Amirliklari</option>
                            <option value="Buyuk Britaniya">Buyuk Britaniya</option>
                            <option value="Urugvay">Urugvay</option>
                            <option value="Oʻzbekiston">Oʻzbekiston</option>
                            <option value="Vanuatu">Vanuatu</option>
                            <option value="Vatikan">Vatikan</option>
                            <option value="Venesuela">Venesuela</option>
                            <option value="Vyetnam">Vyetnam</option>
                            <option value="Yaman">Yaman</option>
                            <option value="Zambiya">Zambiya</option>
                            <option value="Zimbabve">Zimbabve</option>
                        </select>
                        @error('ishlab_davlat')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Ishlab chiqarilgan yil -->
                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row">Ishlab chiqarilgan yil</label>
                        <select name="ishlabchiq_yil" value="{{ old('ishlabchiq_yil') }}"
                            class="science-sub-categoryyil input border w-full mt-2 " required="">
                            <option value=""></option>
                        </select>
                        @error('ishlabchiq_yil')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Harid summa -->
                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"><span
                                class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Harid qilingan summasi (buxgalteriya
                            balans summasi
                            so'mda)</label>
                        <input type="text" name="harid_summa" id="sumInput1" oninput="formatNumber(this, 'writtenWords')"
                            value="{{ old('harid_summa') }}" class="input w-full border mt-2" required>
                        <span id="writtenWords" class="mt-2 text-gray-600"></span> so'm
                        @error('harid_summa')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Buxgalteriya summa -->
                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"><span
                                class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Buxgalteriya bo'yicha qoldiq summasi
                            (so'mda)</label>
                        <input type="text" name="buxgalteriya_summa" id="sumInput2"
                            oninput="formatNumber(this, 'buxgalteriya_summa_writtenWords')"
                            value="{{ old('buxgalteriya_summa') }}" class="input w-full border mt-2" required>
                        <span id="buxgalteriya_summa_writtenWords" class="mt-2 text-gray-600"></span> so'm
                        @error('buxgalteriya_summa')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"><span
                                class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Moliyalashtirish manbasi</label>
                        <select name="moliya_manbasi" id="moliya_manbasi" value="{{old('moliya_manbasi')}}"
                            class="input border w-full mt-2" required onchange="toggleLoyihaShifri()">

                            <option value=""></option>

                            <option value="Ilm-fanni moliyalashtirish va innovatsiyalarni qo‘llab-quvvatlash jamg‘armasi">
                                Ilm-fanni moliyalashtirish va innovatsiyalarni qo‘llab-quvvatlash jamg‘armasi</option>

                            <option value="Ilmiy loyiha doirasida">Ilmiy loyiha doirasida</option>

                            <option value="Tashkilot byudjet mablag‘lari hisobidan">Tashkilot byudjet mablag‘lari hisobidan
                            </option>

                            <option value="Tashkilotning byudjetdan tashqari mablag‘lari hisobidan">Tashkilotning byudjetdan
                                tashqari mablag‘lari hisobidan</option>

                            <option value="Moliya institutlari">Moliya institutlari</option>

                            <option value="Homiylik mablag‘lari">Homiylik mablag‘lari</option>

                        </select><br>
                        @error('moliya_manbasi')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Loyiha shifri -->
                    <div class="w-full col-span-6" id="loyiha_shifri_div" style="display: none;">
                        <label class="flex flex-col sm:flex-row"><span
                                class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Loyiha shifri</label>
                        {{-- <input type="text" name="loy_shifri" value="{{ old('loy_shifri') }}"
                            class="input w-full border mt-2"> --}}
                        <select name="loy_shifri" value="{{ old('loy_shifri') }}" class="input border w-full mt-2 "
                            required="">
                            <option value=""></option>
                            @foreach ($ilmiy_loyhalar as $l)
                                <option value="{{ $l->raqami }}">{{ $l->raqami }}, {{ $l->mavzusi }}</option>
                            @endforeach
                        </select>
                        @error('loy_shifri')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Shartnoma raqami -->
                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"><span
                                class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Shartnoma raqami (uskuna
                            bo'yicha)</label>
                        <input type="text" name="sh_raqami" value="{{ old('sh_raqami') }}" class="input w-full border mt-2"
                            required>
                        @error('sh_raqami')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Shartnoma sanasi -->
                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"><span
                                class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Shartnoma sanasi</label>
                        <input type="date" name="sh_sanasi" value="{{ old('sh_sanasi') }}" class="input w-full border mt-2"
                            required>
                        @error('sh_sanasi')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Harid qilingan yil -->
                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"><span
                                class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Harid qilingan yil</label>
                        <select name="harid_qilingan_yil" value="{{ old('harid_qilingan_yil') }}"
                            class="science-sub-categoryyil input border w-full mt-2 " required="">
                            <option value=""></option>
                        </select>
                        @error('harid_qilingan_yil')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Holati -->
                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"><span
                                class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Holati</label>
                        <select name="holati" value="{{ old('holati') }}"
                            class="science-sub-category input border w-full mt-2" required="">
                            <option value=""></option>
                            <option value="Ishchi holada">Ishchi holada</option>
                            <option value="Ta'mir talab">Ta'mir talab</option>
                            <option value="O'rnatilmagan">O'rnatilmagan</option>
                        </select>
                        @error('holati')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- O'rnatilgan yil -->
                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"><span
                                class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>O'rnatilgan yil</label>
                        <select name="urnatilgan_yili" value="{{ old('urnatilgan_yili') }}"
                            class="science-sub-categoryyil input border w-full mt-2 " required="">
                            <option value=""></option>
                        </select>
                        @error('urnatilgan_yili')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"><span
                                class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Foydalanishga mas'ul tarkibiy
                            bo‘linma (laboratoriya,
                            kafedra, sho‘ba) nomi</label>
                        <select name="laboratory_id" id="laboratory_id" value="{{ old('laboratory_id') }}"
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
                                class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Foydalanishga mas'ul tarkibiy
                            bo‘linma (Kafedra) nomi</label>
                        <select name="kafedralar_id" value="{{ old('kafedralar_id') }}" class="input border w-full mt-2 ">
                            <option value=""></option>
                            @foreach ($kafedralar as $l)
                                <option value="{{ $l->id }}">{{ $l->name }}</option>
                            @endforeach
                        </select>
                        @error('kafedralar_id')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- FISH -->
                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"><span
                                class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>F.I.SH</label>
                        <input type="text" name="fish" value="{{ old('fish') }}" class="input w-full border mt-2" required>
                        @error('fish')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Javobgar buyruq raqami -->
                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"><span
                                class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Javobgar etib belgilanganligi
                            to‘g‘risida buyruq
                            raqami</label>
                        <input type="text" name="jav_buy_raqami" value="{{ old('jav_buy_raqami') }}"
                            class="input w-full border mt-2" required>
                        @error('jav_buy_raqami')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Javobgar etib belgilanganligi to‘g‘risida buyruq  sanasi -->
                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"><span
                                class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Javobgar etib belgilanganligi
                            to‘g‘risida buyruq
                            sanasi </label>
                        <input type="date" name="jav_sanasi" value="{{ old('jav_sanasi') }}"
                            class="input w-full border mt-2" required>
                        @error('jav_sanasi')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"><span
                                class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Bajarilayotgan ilmiy-tadqiqot
                            ishlari</label>
                        <textarea name="ilmiy_tadqiqot_ishilari" value="" class="input w-full border mt-2" cols="10"
                            rows="5">{{ old('ilmiy_tadqiqot_ishilari') }}</textarea>
                        @error('ilmiy_tadqiqot_ishilari')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"><span
                                class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Ilmiy-tadqiqot dasturlaridagi ish
                            hajmi </label>
                        <textarea name="ilmiy_tadqiqot_hajmi" value="" class="input w-full border mt-2" cols="10"
                            rows="5">{{ old('ilmiy_tadqiqot_hajmi') }}</textarea>
                        @error('ilmiy_tadqiqot_hajmi')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"><span
                                class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Laboratoriya uskunalari uchun zarur
                            reagent va reaktivlar zaxirasi</label>
                        <textarea name="lab_zaxirasi" value="{{ old('lab_zaxirasi') }}" class="input w-full border mt-2"
                            cols="10" rows="5"></textarea>
                        @error('lab_zaxirasi')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"><span
                                class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Foydalanish uchun arizalarning
                            ro‘yxatga olinishi va foydalanish jadvalining yuritilishi</label>
                        <textarea name="foy_uchun_ariz" value="" class="input w-full border mt-2" cols="10"
                            rows="5">{{ old('foy_uchun_ariz') }}</textarea>
                        @error('foy_uchun_ariz')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"><span
                                class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Ilmiy tadqiqot va oliy ta’lim
                            muassasalari laboratoriyalarining qo‘shimcha asbob-uskunalarga ehtiyoji</label>
                        <textarea name="asbob_usk_ehtiyoji" value="" class="input w-full border mt-2" cols="10"
                            rows="5">{{ old('asbob_usk_ehtiyoji') }}</textarea>
                        @error('asbob_usk_ehtiyoji')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"><span
                                class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Zarur sarflash materiallari va
                            butlovchi qismlar bo‘yicha ehtiyoji</label>
                        <textarea name="zarur_ehtiyoji" value="" class="input w-full border mt-2" cols="10"
                            rows="5">{{ old('zarur_ehtiyoji') }}</textarea>
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

    {{--
    <script>
        function formatNumber(input) {
            // Faqat raqamlarni olib tashlaymiz va bo‘sh joylarni yo‘qotamiz
            let value = input.value.replace(/\D/g, "");

            // Raqamlarni 3 xonadan bo‘sh joy bilan ajratamiz
            input.value = value.replace(/\B(?=(\d{3})+(?!\d))/g, " ");
        }
    </script> --}}

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
