@extends('layouts.admin')

@section('content')


    <div class="flex justify-between align-center mt-10">

        <h2 class="intro-y text-lg font-medium">Xarid qilingan asbob-uskunani qo'shish</h2>



    </div><br>
    <div class="intro-y col-span-6 flex flex-wrap sm:flex-no-wrap items-center mt-2" style="background: white;
            padding: 20px 20px;
            border-radius: 20px">
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
                        <label class="flex flex-col sm:flex-row">Model</label>
                        <input type="text" name="model" value="{{ $asbobuskuna->model }}" class="input w-full border mt-2" required>
                        @error('model')
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
                        <select name="ishlabchiq_yil" value="{{ $asbobuskuna->ishlabchiq_yil }}"
                            class="science-sub-categoryyil input border w-full mt-2 " required="">
                            <option value=""></option>
                        </select>
                        @error('ishlabchiq_yil')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Harid summa -->
                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row">Harid qilingan summasi (buxgalteriya balans summasi ming so'mda)</label>
                        <input type="number" name="harid_summa" value="{{ $asbobuskuna->harid_summa }}" class="input w-full border mt-2" required>
                        @error('harid_summa')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Buxgalteriya summa -->
                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row">Buxgalteriya bo'yicha qoldiq summasi (ming so'mda)</label>
                        <input type="number" name="buxgalteriya_summa" value="{{ $asbobuskuna->buxgalteriya_summa }}" class="input w-full border mt-2" required>
                        @error('buxgalteriya_summa')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Moliya manbasi -->
                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row">Moliyalashtirish manbasi</label>
                        <select name="moliya_manbasi" value="{{$asbobuskuna->moliya_manbasi}}"
                            class="input border w-full mt-2" required="">

                            <option value=""></option>

                            <option value="Ilm-fanni moliyalashtirish va innovatsiyalarni qo‘llab-quvvatlash jamg‘armasi">Ilm-fanni moliyalashtirish va innovatsiyalarni qo‘llab-quvvatlash jamg‘armasi</option>

                            <option value="Ilmiy loyiha doirasida">Ilmiy loyiha doirasida</option>

                            <option value="Tashkilot byudjet mablag‘lari hisobidan">Tashkilot byudjet mablag‘lari hisobidan</option>

                            <option value="Tashkilotning byudjetdan tashqari mablag‘lari hisobidan">Tashkilotning byudjetdan tashqari mablag‘lari hisobidan</option>

                            <option value="Moliya institutlari">Moliya institutlari</option>

                            <option value="Homiylik mablag‘lari">Homiylik mablag‘lari</option>

                        </select><br>
                        @error('moliya_manbasi')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Loyiha shifri -->
                    <div class="w-full col-span-6" id="loyiha_shifri_div" style="display: none;">
                        <label class="flex flex-col sm:flex-row">Loyiha shifri</label>
                        {{-- <input type="text" name="loy_shifri" value="{{ old('loy_shifri') }}" class="input w-full border mt-2"> --}}
                        <select name="loy_shifri" value="{{ old('loy_shifri') }}"
                            class="input border w-full mt-2 " required="">
                            <option value=""></option>
                            @foreach ($ilmiy_loyhalar as $l)
                            <option value="{{ $l->id }}">{{ $l->mavzusi }}</option>
                            @endforeach
                        </select>
                        @error('loy_shifri')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Shartnoma raqami -->
                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row">Shartnoma raqami (uskuna bo'yicha)</label>
                        <input type="text" name="sh_raqami" value="{{ $asbobuskuna->sh_raqami }}" class="input w-full border mt-2" required>
                        @error('sh_raqami')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Shartnoma sanasi -->
                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row">Shartnoma sanasi</label>
                        <input type="date" name="sh_sanasi" value="{{ $asbobuskuna->sh_sanasi }}" class="input w-full border mt-2" required>
                        @error('sh_sanasi')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Harid qilingan yil -->
                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row">Harid qilingan yil</label>
                        <select name="harid_qilingan_yil" value="{{ $asbobuskuna->harid_qilingan_yil }}"
                            class="science-sub-categoryyil input border w-full mt-2 " required="">
                            <option value=""></option>
                        </select>
                        @error('harid_qilingan_yil')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Holati -->
                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row">Holati</label>
                        <select name="holati" value="{{ $asbobuskuna->holati }}" class="science-sub-category input border w-full mt-2"
                            required="">
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
                        <label class="flex flex-col sm:flex-row">O'rnatilgan yil</label>
                        <select name="urnatilgan_yili" value="{{ $asbobuskuna->urnatilgan_yili }}"
                            class="science-sub-categoryyil input border w-full mt-2 " required="">
                            <option value=""></option>
                        </select>
                        @error('urnatilgan_yili')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row">Foydalanishga mas'ul tarkibiy bo‘linma (laboratoriya, kafedra, sho‘ba) nomi</label>
                        <select name="laboratory_id" value="{{ $asbobuskuna->laboratory_id }}"
                            class="input border w-full mt-2 " required="">
                            <option value=""></option>
                            @foreach ($laboratorys as $l)
                            <option value="{{ $l->id }}">{{ $l->name }}</option>
                            @endforeach
                        </select>
                        @error('laboratory_id')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- FISH -->
                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row">F.I.SH</label>
                        <input type="text" name="fish" value="{{ $asbobuskuna->fish }}" class="input w-full border mt-2" required>
                        @error('fish')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Javobgar buyruq raqami -->
                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row">Javobgar etib belgilanganligi to‘g‘risida buyruq  raqami</label>
                        <input type="text" name="jav_buy_raqami" value="{{ $asbobuskuna->jav_buy_raqami }}" class="input w-full border mt-2" required>
                        @error('jav_buy_raqami')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Javobgar etib belgilanganligi to‘g‘risida buyruq  sanasi -->
                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row">Javobgar etib belgilanganligi to‘g‘risida buyruq  sanasi</label>
                        <input type="date" name="jav_sanasi" value="{{ $asbobuskuna->jav_sanasi }}" class="input w-full border mt-2" required>
                        @error('jav_sanasi')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                </div><br>
            </form><br>
            <div class="px-5 pb-5 text-center">
                <a href="{{ route('tashkilotrahbari.index') }}" class="button delete-cancel w-32 border text-gray-700 mr-1">
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
        function toggleLoyihaShifri() {
            const moliyaSelect = document.getElementById('moliya_manbasi');
            const loyihaDiv = document.getElementById('loyiha_shifri_div');

            if (moliyaSelect.value === 'Ilmiy loyiha doirasida') {
                loyihaDiv.style.display = 'block';
            } else {
                loyihaDiv.style.display = 'none';
            }
        }

        // Eski ma'lumotni tiklash (old input)
        window.onload = function () {
            toggleLoyihaShifri();
        };
    </script>

@endsection
