@extends('layouts.admin')

@section('content')


<div class="flex justify-between align-center mt-10">

    <h2 class="intro-y text-lg font-medium">Ilmiy tezis</h2>



</div><br>
<div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2" style="background: white;
    padding: 20px 20px;
    border-radius: 20px">
    <div class="w-full mt-3 sm:mt-0 sm:ml-auto md:ml-0">
        <form id="science-paper-create-form" method="POST" action="{{ route("ilmiytezislar.store") }}"
            class="validate-form" enctype="multipart/form-data" novalidate="novalidate">
            @csrf

            <div class="grid grid-cols-12 gap-2">
                <div class="w-full col-span-6">
                    <label class="flex flex-col sm:flex-row">  Ilmiy tezis turi
                    </label>
                    <select name="type"  id="science-sub-category" class="input border w-full mt-2" required="">

                        <option value=""></option>

                        <option value="Republika miqyosidagi anjumanlar">Republika miqyosidagi anjumanlar</option>

                        <option value="Xalqaro miqyosidagi anjumanlar">Xalqaro miqyosidagi anjumanlar</option>

                    </select><br>
                    @error('type')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="w-full col-span-6">
                    <label class="flex flex-col sm:flex-row">
                        <span class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Mavzu
                    </label>
                    <input type="text" name="mavzu" value="{{ old('mavzu') }}" class="input w-full border mt-2" required>
                    @error('mavzu')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="w-full col-span-6">
                    <label class="flex flex-col sm:flex-row">
                        <span class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Chop qilingan sana
                    </label>
                    <input type="date" name="chopq_sana" value="{{ old('chopq_sana') }}"
                        class="input w-full border mt-2" required>
                    @error('chopq_sana')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="w-full col-span-6">
                    <label class="flex flex-col sm:flex-row">
                        <span class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Konferensiya to‘liq nomi
                    </label>
                    <input type="text" name="kon_full_nomi" value="{{ old('kon_full_nomi') }}"
                        class="input w-full border mt-2" required>
                    @error('kon_full_nomi')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="w-full col-span-6">
                    <label class="flex flex-col sm:flex-row">
                        <span class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Konferensiya qisqa nomi
                    </label>
                    <input type="text" name="kon_qisqa_nomi" value="{{ old('kon_qisqa_nomi') }}" class="input w-full border mt-2" required>
                    @error('kon_qisqa_nomi')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="w-full col-span-6">
                    <label class="flex flex-col sm:flex-row">
                        <span class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Seriyasi/ soni
                    </label>
                    <input type="text" name="soni" value="{{ old('soni') }}" class="input w-full border mt-2" required>
                    @error('soni')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="w-full col-span-6">
                    <label class="flex flex-col sm:flex-row">
                        <span class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Nashriyot
                    </label>
                    <input type="text" name="nashriyot" value="{{ old('nashriyot') }}" class="input w-full border mt-2" required>
                    @error('nashriyot')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="w-full col-span-6">
                    <label class="flex flex-col sm:flex-row">
                        <span class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Annotatsiya
                    </label>
                    <input type="text" name="annotatsiya" value="{{ old('annotatsiya') }}" class="input w-full border mt-2" required>
                    @error('annotatsiya')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="w-full col-span-6">
                    <label class="flex flex-col sm:flex-row">
                        <span class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Fan yo'nalishi
                    </label>
                    {{-- <input type="text" name="fan_yunalishi" value="{{ old('fan_yunalishi') }}"
                        class="input w-full border mt-2" required> --}}


                    <select name="fan_yunalishi" id="science-sub-category" class="select2 w-full input border w-full mt-2" required>
                        <option value=""></option>

                        <!-- Qishloq xo'jaligi va biologiya fanlari -->
                        <optgroup label="Qishloq xo'jaligi va biologiya fanlari">
                            <option value="Qishloq xo'jaligi va biologiya fanlari">Qishloq xo'jaligi va biologiya
                                fanlari</option>
                            <option value="Qishloq xo'jaligi va biologiya fanlari (turli xil)">Qishloq xo'jaligi va
                                biologiya fanlari (turli xil)</option>
                            <option value="Agronomiya va ekinshunoslik">Agronomiya va ekinshunoslik</option>
                            <option value="Hayvonotshunoslik va zoologiya">Hayvonotshunoslik va zoologiya</option>
                            <option value="Suv fanlari">Suv fanlari</option>
                            <option value="Ekologiya, evolyutsiya, xulq-atvor va sistematika">Ekologiya, evolyutsiya,
                                xulq-atvor va sistematika</option>
                            <option value="Oziq-ovqat fanlari">Oziq-ovqat fanlari</option>
                            <option value="O'rmon xo'jaligi">O'rmon xo'jaligi</option>
                            <option value="Umumiy qishloq xo'jaligi va biologiya fanlari">Umumiy qishloq xo'jaligi va
                                biologiya fanlari</option>
                            <option value="Bog'dorchilik">Bog'dorchilik</option>
                            <option value="Hasharotlar haqidagi fan">Hasharotlar haqidagi fan</option>
                            <option value="O'simlikshunoslik">O'simlikshunoslik</option>
                            <option value="Tuproqshunoslik">Tuproqshunoslik</option>
                        </optgroup>

                        <!-- San'at va gumanitar fanlar -->
                        <optgroup label="San'at va gumanitar fanlar">
                            <option value="San'at va gumanitar fanlar">San'at va gumanitar fanlar</option>
                            <option value="Arxeologiya (san'at va gumanitar fanlar)">Arxeologiya (san'at va gumanitar
                                fanlar)</option>
                            <option value="San'at va gumanitar fanlar (turli xil)">San'at va gumanitar fanlar (turli
                                xil)</option>
                            <option value="Klassikalar">Klassikalar</option>
                            <option value="Saqlash">Saqlash</option>
                            <option value="Umumiy san'at va gumanitar fanlar">Umumiy san'at va gumanitar fanlar</option>
                            <option value="Tarix">Tarix</option>
                            <option value="Fan tarixi va falsafasi">Fan tarixi va falsafasi</option>
                            <option value="Til va tilshunoslik">Til va tilshunoslik</option>
                            <option value="Adabiyot va adabiyot nazariyasi">Adabiyot va adabiyot nazariyasi</option>
                            <option value="Muzeyshunoslik">Muzeyshunoslik</option>
                            <option value="Musiqa">Musiqa</option>
                            <option value="Falsafa">Falsafa</option>
                            <option value="Dinshunoslik">Dinshunoslik</option>
                            <option value="Tasviriy san'at va sahna san'ati">Tasviriy san'at va sahna san'ati</option>
                        </optgroup>

                        <!-- Respublika miqyosidagi jurnallar -->
                        <optgroup label="Biokimyo, genetika va molekulyar biologiya">
                            <option value="Qarish">Qarish</option>
                            <option value="Biokimyo">Biokimyo</option>
                            <option value="Biokimyo, genetika va molekulyar biologiya (turli xil)">Biokimyo, genetika va
                                molekulyar biologiya (turli xil)</option>
                            <option value="Biofizika">Biofizika</option>
                            <option value="Biotexnologiya">Biotexnologiya</option>
                            <option value="Saraton tadqiqotlari">Saraton tadqiqotlari</option>
                            <option value="Hujayra biologiyasi">Hujayra biologiyasi</option>
                            <option value="Klinik biokimyo">Klinik biokimyo</option>
                            <option value="Rivojlanish biologiyasi">Rivojlanish biologiyasi</option>
                            <option value="Endokrinologiya">Endokrinologiya</option>
                            <option value="Umumiy biokimyo, genetika va molekulyar biologiya">Umumiy biokimyo, genetika
                                va molekulyar biologiya</option>
                            <option value="Genetika">Genetika</option>
                            <option value="Molekulyar biologiya">Molekulyar biologiya</option>
                            <option value="Molekulyar tibbiyot">Molekulyar tibbiyot</option>
                            <option value="Fiziologiya">Fiziologiya</option>
                            <option value="Strukturaviy biologiya">Strukturaviy biologiya</option>
                        </optgroup>

                        <!-- Biznes, menejment va buxgalteriya -->
                        <optgroup label="Biznes, menejment va buxgalteriya">
                            <option value="Buxgalteriya hisobi">Buxgalteriya hisobi</option>
                            <option value="Biznes va xalqaro menejment">Biznes va xalqaro menejment</option>
                            <option value="Biznes, menejment va buxgalteriya (turli xil)">Biznes, menejment va
                                buxgalteriya (turli xil)</option>
                            <option value="Umumiy biznes, menejment va buxgalteriya">Umumiy biznes, menejment va
                                buxgalteriya</option>
                            <option value="Sanoat munosabatlari">Sanoat munosabatlari</option>
                            <option value="Boshqaruv axborot tizimlari">Boshqaruv axborot tizimlari</option>
                            <option value="Texnologiya va innovatsiyalarni boshqarish">Texnologiya va innovatsiyalarni
                                boshqarish</option>
                            <option value="Marketing">Marketing</option>
                            <option value="Tashkiliy xulq-atvor va inson resurslarini boshqarish">Tashkiliy xulq-atvor
                                va inson resurslarini boshqarish</option>
                            <option value="Strategiya va menejment">Strategiya va menejment</option>
                            <option value="Turizm, dam olish va mehmondo'stlikni boshqarish">Turizm, dam olish va
                                mehmondo'stlikni boshqarish</option>
                        </optgroup>

                        <!-- Kimyoviy muhandislik -->
                        <optgroup label="Kimyoviy muhandislik">
                            <option value="Bioinjeneriya">Bioinjeneriya</option>
                            <option value="Kataliz">Kataliz</option>
                            <option value="Kimyoviy muhandislik (turli xil)">Kimyoviy muhandislik (turli xil)</option>
                            <option value="Kimyoviy salomatlik va xavfsizlik">Kimyoviy salomatlik va xavfsizlik</option>
                            <option value="Kolloid va sirt kimyosi">Kolloid va sirt kimyosi</option>
                            <option value="Filtrlash va ajratish">Filtrlash va ajratish</option>
                            <option value="Suyuqlik oqimi va uzatish jarayonlari">Suyuqlik oqimi va uzatish jarayonlari
                            </option>
                            <option value="Umumiy kimyo muhandisligi">Umumiy kimyo muhandisligi</option>
                            <option value="Jarayonlar kimyosi va texnologiyasi">Jarayonlar kimyosi va texnologiyasi
                            </option>
                        </optgroup>

                        <!-- Kimyo -->
                        <optgroup label="Kimyo">
                            <option value="Analitik kimyo">Analitik kimyo</option>
                            <option value="Kimyo (turli xil)">Kimyo (turli xil)</option>
                            <option value="Elektrokimyo">Elektrokimyo</option>
                            <option value="Umumiy kimyo">Umumiy kimyo</option>
                            <option value="Noorganik kimyo">Noorganik kimyo</option>
                            <option value="Organik kimyo">Organik kimyo</option>
                            <option value="Fizikaviy va nazariy kimyo">Fizikaviy va nazariy kimyo</option>
                            <option value="Spektroskopiya">Spektroskopiya</option>
                        </optgroup>

                        <optgroup label="Kompyuter fanlari">
                            <option value="Sun'iy intellekt">Sun'iy intellekt</option>
                            <option value="Hisoblash nazariyasi va matematika">Hisoblash nazariyasi va matematika
                            </option>
                            <option value="Kompyuter grafikasi va kompyuter yordamida dizayn">Kompyuter grafikasi va
                                kompyuter yordamida dizayn</option>
                            <option value="Kompyuter tarmoqlari va kommunikatsiyalari">Kompyuter tarmoqlari va
                                kommunikatsiyalari</option>
                            <option value="Kompyuter fanlari (turli xil)">Kompyuter fanlari (turli xil)</option>
                            <option value="Kompyuter fanlari ilovalari">Kompyuter fanlari ilovalari</option>
                            <option value="Kompyuterda ko'rish va naqshni aniqlash">Kompyuterda ko'rish va naqshni
                                aniqlash</option>
                            <option value="Umumiy kompyuter fanlari">Umumiy kompyuter fanlari</option>
                            <option value="Uskuna va arxitektura">Uskuna va arxitektura</option>
                            <option value="Inson va kompyuterning o'zaro ta'siri">Inson va kompyuterning o'zaro ta'siri
                            </option>
                            <option value="Axborot tizimlari">Axborot tizimlari</option>
                            <option value="Signalni qayta ishlash">Signalni qayta ishlash</option>
                            <option value="Dasturiy ta'minot">Dasturiy ta'minot</option>
                            <option value="Qaror qabul qilish fanlari">Qaror qabul qilish fanlari</option>
                            <option value="Qaror qabul qilish fanlari (turli xil)">Qaror qabul qilish fanlari (turli
                                xil)</option>
                            <option value="Umumiy qarorlar fanlari">Umumiy qarorlar fanlari</option>
                            <option value="Axborot tizimlari va menejment">Axborot tizimlari va menejment</option>
                            <option value="Menejment fani va operatsion tadqiqotlar">Menejment fani va operatsion
                                tadqiqotlar</option>
                            <option value="Statistika, ehtimollik va noaniqlik">Statistika, ehtimollik va noaniqlik
                            </option>
                        </optgroup>

                        <optgroup label="Stomatologiya">
                            <option value="Dental yordam">Dental yordam</option>
                            <option value="Tish gigienasi">Tish gigienasi</option>
                            <option value="Stomatologiya (turli xil)">Stomatologiya (turli xil)</option>
                            <option value="Umumiy stomatologiya">Umumiy stomatologiya</option>
                            <option value="Og'iz bo'shlig'i jarrohligi">Og'iz bo'shlig'i jarrohligi</option>
                            <option value="Ortodontiya">Ortodontiya</option>
                            <option value="Periodontiya">Periodontiya</option>
                        </optgroup>

                        <optgroup label="Yer va sayyora fanlari">
                            <option value="Atmosfera fanlari">Atmosfera fanlari</option>
                            <option value="Yer fanlarida kompyuterlar">Yer fanlarida kompyuterlar</option>
                            <option value="Yer va sayyora fanlari (turli xil)">Yer va sayyora fanlari (turli xil)
                            </option>
                            <option value="Yer yuzidagi jarayonlar">Yer yuzidagi jarayonlar</option>
                            <option value="Iqtisodiy geologiya">Iqtisodiy geologiya</option>
                            <option value="Umumiy Yer va sayyora fanlari">Umumiy Yer va sayyora fanlari</option>
                            <option value="Geokimyo va petrologiya">Geokimyo va petrologiya</option>
                            <option value="Geologiya">Geologiya</option>
                            <option value="Geofizika">Geofizika</option>
                            <option value="Geotexnik muhandislik va muhandislik geologiyasi">Geotexnik muhandislik va
                                muhandislik geologiyasi</option>
                            <option value="Okeanografiya">Okeanografiya</option>
                            <option value="Paleontologiya">Paleontologiya</option>
                            <option value="Stratigrafiya">Stratigrafiya</option>
                        </optgroup>

                        <optgroup label="Iqtisodiyot, ekonometriya va moliya">
                            <option value="Iqtisodiyot va ekonometrika">Iqtisodiyot va ekonometrika</option>
                            <option value="Iqtisodiyot, ekonometriya va moliya (turli xil)">Iqtisodiyot, ekonometriya va
                                moliya (turli xil)</option>
                            <option value="Moliya">Moliya</option>
                            <option value="Umumiy iqtisod, ekonometriya va moliya">Umumiy iqtisod, ekonometriya va
                                moliya</option>
                        </optgroup>

                        <optgroup label="Energiya">
                            <option value="Energiya (turli xil)">Energiya (turli xil)</option>
                            <option value="Energetika muhandisligi va energiya texnologiyasi">Energetika muhandisligi va
                                energiya texnologiyasi</option>
                            <option value="Yoqilg'i texnologiyasi">Yoqilg'i texnologiyasi</option>
                            <option value="Umumiy energiya">Umumiy energiya</option>
                            <option value="Yadro energiyasi va muhandislik">Yadro energiyasi va muhandislik</option>
                            <option value="Qayta tiklanadigan energiya, barqarorlik va atrof-muhit">Qayta tiklanadigan
                                energiya, barqarorlik va atrof-muhit</option>
                        </optgroup>

                        <optgroup label="Muhandislik">
                            <option value="Aerokosmik muhandislik">Aerokosmik muhandislik</option>
                            <option value="Arxitektura">Arxitektura</option>
                            <option value="Avtomobil muhandisligi">Avtomobil muhandisligi</option>
                            <option value="Biotibbiyot muhandisligi">Biotibbiyot muhandisligi</option>
                            <option value="Bino va qurilish">Bino va qurilish</option>
                            <option value="Qurilish va qurilish muhandisligi">Qurilish va qurilish muhandisligi</option>
                            <option value="Hisoblash mexanikasi">Hisoblash mexanikasi</option>
                            <option value="Boshqarish va tizim muhandisligi">Boshqarish va tizim muhandisligi</option>
                            <option value="Elektrotexnika va elektron muhandislik">Elektrotexnika va elektron
                                muhandislik</option>
                            <option value="Muhandislik (turli xil)">Muhandislik (turli xil)</option>
                            <option value="Umumiy muhandislik">Umumiy muhandislik</option>
                            <option value="Sanoat va ishlab chiqarish muhandisligi">Sanoat va ishlab chiqarish
                                muhandisligi</option>
                            <option value="Mashinasozlik">Mashinasozlik</option>
                            <option value="Materiallar mexanikasi">Materiallar mexanikasi</option>
                            <option value="Media texnologiyasi">Media texnologiyasi</option>
                            <option value="Okean muhandisligi">Okean muhandisligi</option>
                            <option value="Xavfsizlik, xavf, ishonchlilik va sifat">Xavfsizlik, xavf, ishonchlilik va
                                sifat</option>
                        </optgroup>

                        <optgroup label="Atrof-muhit fanlari">
                            <option value="Ekologik modellashtirish">Ekologik modellashtirish</option>
                            <option value="Ekologiya">Ekologiya</option>
                            <option value="Atrof-muhit kimyosi">Atrof-muhit kimyosi</option>
                            <option value="Atrof-muhit muhandisligi">Atrof-muhit muhandisligi</option>
                            <option value="Atrof-muhit fanlari (turli xil)">Atrof-muhit fanlari (turli xil)</option>
                            <option value="Umumiy ekologiya fanlari">Umumiy ekologiya fanlari</option>
                            <option value="Global va sayyoraviy o'zgarishlar">Global va sayyoraviy o'zgarishlar</option>
                            <option value="Salomatlik, toksikologiya va mutagenez">Salomatlik, toksikologiya va
                                mutagenez</option>
                            <option value="Boshqaruv, monitoring, siyosat va qonun">Boshqaruv, monitoring, siyosat va
                                qonun</option>
                            <option value="Tabiat va landshaftni muhofaza qilish">Tabiat va landshaftni muhofaza qilish
                            </option>
                            <option value="Ifloslanish">Ifloslanish</option>
                            <option value="Chiqindilarni boshqarish va utilizatsiya qilish">Chiqindilarni boshqarish va
                                utilizatsiya qilish</option>
                            <option value="Suv fani va texnologiyasi">Suv fani va texnologiyasi</option>
                        </optgroup>



                        <optgroup label="Sog'liqni saqlash kasblari">
                            <option value="Chiropraktika">Chiropraktika</option>
                            <option value="Qo'shimcha va qo'lda terapiya">Qo'shimcha va qo'lda terapiya</option>
                            <option value="Shoshilinch tibbiy yordam">Shoshilinch tibbiy yordam</option>
                            <option value="Umumiy sog'liqni saqlash kasblari">Umumiy sog'liqni saqlash kasblari</option>
                            <option value="Sog'liqni saqlash ma'lumotlarini boshqarish">Sog'liqni saqlash ma'lumotlarini
                                boshqarish</option>
                            <option value="Sog'liqni saqlash kasblari (turli xil)">Sog'liqni saqlash kasblari (turli
                                xil)</option>
                            <option value="Tibbiy yordam va transkripsiya">Tibbiy yordam va transkripsiya</option>
                            <option value="Tibbiy laboratoriya texnologiyasi">Tibbiy laboratoriya texnologiyasi</option>
                            <option value="Tibbiyot terminologiyasi">Tibbiyot terminologiyasi</option>
                            <option value="Kasbiy terapiya">Kasbiy terapiya</option>
                            <option value="Optometriya">Optometriya</option>
                            <option value="Dorixona">Dorixona</option>
                            <option value="Jismoniy terapiya, sport terapiyasi va reabilitatsiya">Jismoniy terapiya,
                                sport terapiyasi va reabilitatsiya</option>
                            <option value="Podiatriya">Podiatriya</option>
                            <option value="Radiologik va ultratovush texnologiyasi">Radiologik va ultratovush
                                texnologiyasi</option>
                            <option value="Nafas olish a'zolarini parvarish qilish">Nafas olish a'zolarini parvarish
                                qilish</option>
                            <option value="Nutq va eshitish">Nutq va eshitish</option>
                        </optgroup>

                        <optgroup label="Immunologiya va mikrobiologiya">
                            <option value="Amaliy mikrobiologiya va biotexnologiya">Amaliy mikrobiologiya va
                                biotexnologiya</option>
                            <option value="Umumiy immunologiya va mikrobiologiya">Umumiy immunologiya va mikrobiologiya
                            </option>
                            <option value="Immunologiya">Immunologiya</option>
                            <option value="Immunologiya va mikrobiologiya (turli xil)">Immunologiya va mikrobiologiya
                                (turli xil)</option>
                            <option value="Mikrobiologiya">Mikrobiologiya</option>
                            <option value="Parazitologiya">Parazitologiya</option>
                            <option value="Virusologiya">Virusologiya</option>
                        </optgroup>

                        <optgroup label="Materialshunoslik">
                            <option value="Biomateriallar">Biomateriallar</option>
                            <option value="Keramika va kompozitlar">Keramika va kompozitlar</option>
                            <option value="Elektron, optik va magnit materiallar">Elektron, optik va magnit materiallar
                            </option>
                            <option value="Umumiy materialshunoslik">Umumiy materialshunoslik</option>
                            <option value="Materiallar kimyosi">Materiallar kimyosi</option>
                            <option value="Materialshunoslik (turli xil)">Materialshunoslik (turli xil)</option>
                            <option value="Metall va qotishmalar">Metall va qotishmalar</option>
                            <option value="Polimerlar va plastmassalar">Polimerlar va plastmassalar</option>
                            <option value="Sirtlar, qoplamalar va plyonkalar">Sirtlar, qoplamalar va plyonkalar</option>
                        </optgroup>

                        <optgroup label="Matematika">
                            <option value="Algebra va sonlar nazariyasi">Algebra va sonlar nazariyasi</option>
                            <option value="Tahlil">Tahlil</option>
                            <option value="Amaliy matematika">Amaliy matematika</option>
                            <option value="Hisoblash matematikasi">Hisoblash matematikasi</option>
                            <option value="Nazorat va optimallashtirish">Nazorat va optimallashtirish</option>
                            <option value="Diskret matematika va kombinatorika">Diskret matematika va kombinatorika
                            </option>
                            <option value="Umumiy matematika">Umumiy matematika</option>
                            <option value="Geometriya va topologiya">Geometriya va topologiya</option>
                            <option value="Mantiq">Mantiq</option>
                            <option value="Matematik fizika">Matematik fizika</option>
                            <option value="Matematika (turli xil)">Matematika (turli xil)</option>
                            <option value="Modellashtirish va simulyatsiya">Modellashtirish va simulyatsiya</option>
                            <option value="Raqamli tahlil">Raqamli tahlil</option>
                            <option value="Statistika va ehtimollik">Statistika va ehtimollik</option>
                        </optgroup>

                        <optgroup label="Sog‘liqni saqlash">
                            <option value="Anatomiya">Anatomiya</option>
                            <option value="Anesteziologiya va og'riqni davolash">Anesteziologiya va og'riqni davolash
                            </option>
                            <option value="Biokimyo (tibbiy)">Biokimyo (tibbiy)</option>
                            <option value="Kardiologiya va yurak-qon tomir tibbiyoti">Kardiologiya va yurak-qon tomir
                                tibbiyoti</option>
                            <option value="Qo'shimcha va muqobil tibbiyot">Qo'shimcha va muqobil tibbiyot</option>
                            <option value="Jiddiy tibbiy yordam va intensiv terapiya">Jiddiy tibbiy yordam va intensiv
                                terapiya</option>
                            <option value="Dermatologiya">Dermatologiya</option>
                            <option value="Giyohvand moddalar bo'yicha qo'llanmalar">Giyohvand moddalar bo'yicha
                                qo'llanmalar</option>
                            <option value="Embriologiya">Embriologiya</option>
                            <option value="Shoshilinch tibbiy yordam">Shoshilinch tibbiy yordam</option>
                            <option value="Endokrinologiya, diabet va metabolizm">Endokrinologiya, diabet va metabolizm
                            </option>
                            <option value="Epidemiologiya">Epidemiologiya</option>
                            <option value="Oila amaliyoti">Oila amaliyoti</option>
                            <option value="Gastroenterologiya">Gastroenterologiya</option>
                            <option value="Umumiy tibbiyot">Umumiy tibbiyot</option>
                            <option value="Genetika (klinik)">Genetika (klinik)</option>
                            <option value="Geriatriya va gerontologiya">Geriatriya va gerontologiya</option>
                            <option value="Sog'liqni saqlash informatika">Sog'liqni saqlash informatika</option>
                            <option value="Sog'liqni saqlash siyosati">Sog'liqni saqlash siyosati</option>
                            <option value="Gematologiya">Gematologiya</option>
                            <option value="Gepatologiya">Gepatologiya</option>
                            <option value="Gistologiya">Gistologiya</option>
                            <option value="Immunologiya va allergiya">Immunologiya va allergiya</option>
                            <option value="Yuqumli kasalliklar">Yuqumli kasalliklar</option>
                            <option value="Ichki kasalliklar">Ichki kasalliklar</option>
                            <option value="Tibbiyot (turli xil)">Tibbiyot (turli xil)</option>
                            <option value="Mikrobiologiya (tibbiyot)">Mikrobiologiya (tibbiyot)</option>
                            <option value="Nefrologiya">Nefrologiya</option>
                            <option value="Nevrologiya (klinik)">Nevrologiya (klinik)</option>
                            <option value="Akusherlik va ginekologiya">Akusherlik va ginekologiya</option>
                            <option value="Onkologiya">Onkologiya</option>
                            <option value="Oftalmologiya">Oftalmologiya</option>
                            <option value="Ortopediya va sport tibbiyoti">Ortopediya va sport tibbiyoti</option>
                            <option value="Otorinolaringologiya">Otorinolaringologiya</option>
                            <option value="Patologiya va sud tibbiyoti">Patologiya va sud tibbiyoti</option>
                            <option value="Pediatriya, perinatologiya va bolalar salomatligi">Pediatriya, perinatologiya
                                va bolalar salomatligi</option>
                            <option value="Farmakologiya (tibbiyot)">Farmakologiya (tibbiyot)</option>
                            <option value="Fiziologiya (tibbiyot)">Fiziologiya (tibbiyot)</option>
                            <option value="Psixiatriya va ruhiy salomatlik">Psixiatriya va ruhiy salomatlik</option>
                            <option value="Jamoat salomatligi, atrof-muhit va mehnat salomatligi">Jamoat salomatligi,
                                atrof-muhit va mehnat salomatligi</option>
                            <option value="O'pka va nafas olish kasalliklari">O'pka va nafas olish kasalliklari</option>
                            <option value="Radiologiya, yadroviy tibbiyot va tasvirlash">Radiologiya, yadroviy tibbiyot
                                va tasvirlash</option>
                            <option value="Reabilitatsiya">Reabilitatsiya</option>
                            <option value="Reproduktiv tibbiyot">Reproduktiv tibbiyot</option>
                            <option value="Sharhlar va ma'lumotnomalar (tibbiy)">Sharhlar va ma'lumotnomalar (tibbiy)
                            </option>
                            <option value="Revmatologiya">Revmatologiya</option>
                            <option value="Jarrohlik">Jarrohlik</option>
                            <option value="Transplantatsiya">Transplantatsiya</option>
                            <option value="Urologiya">Urologiya</option>
                        </optgroup>

                        <optgroup label="Ko'p tarmoqli">
                            <option value="Neyrologiya">Neyrologiya</option>
                            <option value="Xulq-atvor nevrologiyasi">Xulq-atvor nevrologiyasi</option>
                            <option value="Biologik psixiatriya">Biologik psixiatriya</option>
                            <option value="Uyali va molekulyar nevrologiya">Uyali va molekulyar nevrologiya</option>
                            <option value="Kognitiv nevrologiya">Kognitiv nevrologiya</option>
                            <option value="Rivojlanish nevrologiyasi">Rivojlanish nevrologiyasi</option>
                            <option value="Endokrin va avtonom tizimlar">Endokrin va avtonom tizimlar</option>
                            <option value="Umumiy nevrologiya">Umumiy nevrologiya</option>
                            <option value="Nevrologiya">Nevrologiya</option>
                            <option value="Neyrologiya (turli xil)">Neyrologiya (turli xil)</option>
                            <option value="Sensorli tizimlar">Sensorli tizimlar</option>
                        </optgroup>

                        <optgroup label="Hamshiralik">
                            <option value="Ilg'or va ixtisoslashtirilgan hamshiralik ishi">Ilg'or va ixtisoslashtirilgan
                                hamshiralik ishi</option>
                            <option value="Baholash va diagnostika">Baholash va diagnostika</option>
                            <option value="Xizmatni rejalashtirish">Xizmatni rejalashtirish</option>
                            <option value="Jamiyat va uyda parvarishlash">Jamiyat va uyda parvarishlash</option>
                            <option value="Jiddiy yordam hamshirasi">Jiddiy yordam hamshirasi</option>
                            <option value="Shoshilinch tibbiy yordam">Shoshilinch tibbiy yordam</option>
                            <option value="Asoslar va ko'nikmalar">Asoslar va ko'nikmalar</option>
                            <option value="Umumiy hamshiralik">Umumiy hamshiralik</option>
                            <option value="Gerontologiya">Gerontologiya</option>
                            <option value="Muammolar, axloq va huquqiy jihatlar">Muammolar, axloq va huquqiy jihatlar
                            </option>
                            <option value="LPN va LVN">LPN va LVN</option>
                            <option value="Etakchilik va boshqaruv">Etakchilik va boshqaruv</option>
                            <option value="Onalik va eyalik">Onalik va eyalik</option>
                            <option value="Tibbiy va jarrohlik hamshiralik ishi">Tibbiy va jarrohlik hamshiralik ishi
                            </option>
                            <option value="Hamshira yordami">Hamshira yordami</option>
                            <option value="Hamshiralik (turli xil)">Hamshiralik (turli xil)</option>
                            <option value="Oziqlantirish va dieta">Oziqlantirish va dieta</option>
                            <option value="Onkologiya (hamshiralik)">Onkologiya (hamshiralik)</option>
                            <option value="Patofiziologiya">Patofiziologiya</option>
                            <option value="Pediatriya">Pediatriya</option>
                            <option value="Farmakologiya (hamshiralik)">Farmakologiya (hamshiralik)</option>
                            <option value="Psixiatrik ruhiy salomatlik">Psixiatrik ruhiy salomatlik</option>
                            <option value="Tadqiqot va nazariya">Tadqiqot va nazariya</option>
                            <option value="Tekshirish va imtihonga tayyorgarlik">Tekshirish va imtihonga tayyorgarlik
                            </option>
                        </optgroup>

                        <optgroup label="Farmakologiya, toksikologiya va farmatsevtika">
                            <option value="Farmakologiya, toksikologiya va farmatsevtika">Farmakologiya, toksikologiya
                                va farmatsevtika</option>
                            <option value="Giyohvand moddalarni aniqlash">Giyohvand moddalarni aniqlash</option>
                            <option value="Umumiy farmakologiya, toksikologiya va farmatsevtika">Umumiy farmakologiya,
                                toksikologiya va farmatsevtika</option>
                            <option value="Farmatsevtika fanlari">Farmatsevtika fanlari</option>
                            <option value="Farmakologiya">Farmakologiya</option>
                            <option value="Farmakologiya, toksikologiya va farmatsevtika (turli xil)">Farmakologiya,
                                toksikologiya va farmatsevtika (turli xil)</option>
                            <option value="Toksikologiya">Toksikologiya</option>
                        </optgroup>

                        <optgroup label="Fizika va astronomiya">
                            <option value="Akustika va ultratovush">Akustika va ultratovush</option>
                            <option value="Astronomiya va astrofizika">Astronomiya va astrofizika</option>
                            <option value="Atom va molekulyar fizika, optika">Atom va molekulyar fizika, optika</option>
                            <option value="Kondensatsiyalangan moddalar fizikasi">Kondensatsiyalangan moddalar fizikas
                            </option>
                            <option value="Umumiy fizika va astronomiya">Umumiy fizika va astronomiya</option>
                            <option value="Asboblar">Asboblar</option>
                            <option value="Yadro va yuqori energiya fizikas">Yadro va yuqori energiya fizikas</option>
                            <option value="Fizika va astronomiya (turli xil)">Fizika va astronomiya (turli xil)</option>
                            <option value="Radiatsiya">Radiatsiya</option>
                            <option value="Statistik va nochiziqli fizika">Statistik va nochiziqli fizika</option>
                            <option value="Yuzaki va interfeyslar">Yuzaki va interfeyslar</option>
                        </optgroup>

                        <optgroup label="Psixologiya">
                            <option value="Amaliy psixologiya">Amaliy psixologiya</option>
                            <option value="Klinik psixologiya">Klinik psixologiya</option>
                            <option value="Rivojlanish va tarbiya psixologiyasi">Rivojlanish va tarbiya psixologiyasi
                            </option>
                            <option value="Eksperimental va kognitiv psixologiya">Eksperimental va kognitiv psixologiya
                            </option>
                            <option value="Umumiy psixologiya">Umumiy psixologiya</option>
                            <option value="Neyropsixologiya va fiziologik psixologiya">Neyropsixologiya va fiziologik
                                psixologiya</option>
                            <option value="Psixologiya (turli xil)">Psixologiya (turli xil)</option>
                            <option value="Ijtimoiy psixologiya">Ijtimoiy psixologiya</option>
                        </optgroup>

                        <optgroup label="Ijtimoiy fanlar">
                            <option value="Antropologiya">Antropologiya</option>
                            <option value="Arxeologiya">Arxeologiya</option>
                            <option value="Aloqa">Aloqa</option>
                            <option value="Madaniyatshunoslik">Madaniyatshunoslik</option>
                            <option value="Demografiya">Demografiya</option>
                            <option value="Rivojlanish">Rivojlanish</option>
                            <option value="Ta'lim">Ta'lim</option>
                            <option value="Gender tadqiqotlari">Gender tadqiqotlari</option>
                            <option value="Umumiy ijtimoiy fanlar">Umumiy ijtimoiy fanlar</option>
                            <option value="Geografiya, rejalashtirish va rivojlanish">Geografiya, rejalashtirish va
                                rivojlanish</option>
                            <option value="Sog'liqni saqlash (ijtimoiy fanlar)">Sog'liqni saqlash (ijtimoiy fanlar)
                            </option>
                            <option value="Inson omillari va ergonomika">Inson omillari va ergonomika</option>
                            <option value="Qonun">Qonun</option>
                            <option value="Kutubxona va axborot fanlari">Kutubxona va axborot fanlari</option>
                            <option value="Hayot davomiyligi va hayot kursi tadqiqotlari">Hayot davomiyligi va hayot
                                kursi tadqiqotlari</option>
                            <option value="Tilshunoslik va til">Tilshunoslik va til</option>
                            <option value="Siyosatshunoslik va xalqaro munosabatlar">Siyosatshunoslik va xalqaro
                                munosabatlar</option>
                            <option value="Davlat boshqaruvi">Davlat boshqaruvi</option>
                            <option value="Xavfsizlik tadqiqotlari">Xavfsizlik tadqiqotlari</option>
                            <option value="Ijtimoiy fanlar (turli xil)">Ijtimoiy fanlar (turli xil)</option>
                            <option value="Sotsiologiya va siyosatshunoslik">Sotsiologiya va siyosatshunoslik</option>
                        </optgroup>

                        <optgroup label="Transport">
                            <option value="Shaharshunoslik">Shaharshunoslik</option>
                        </optgroup>

                        <optgroup label="Veterinariya">
                            <option value="Ot">Ot</option>
                            <option value="Oziq-ovqat hayvonlari">Oziq-ovqat hayvonlari</option>
                            <option value="Umumiy veterinariya">Umumiy veterinariya</option>
                            <option value="Kichik hayvonlar">Kichik hayvonlar</option>
                            <option value="Veterinariya (turli xil)">Veterinariya (turli xil)</option>
                        </optgroup>


                    </select>

                    @error('fan_yunalishi')
                        <div class="error">{{ $message }}</div>
                    @enderror

                </div>

                <div class="w-full col-span-6">
                    <label class="flex flex-col sm:flex-row">
                        <span class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Url
                    </label>
                    <input type="url" name="url" value="{{ old('url') }}"
                        class="input w-full border mt-2" >
                    @error('url')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="w-full col-span-6">
                    <label class="flex flex-col sm:flex-row">
                        <span class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> DOI
                    </label>
                    <input type="url" name="doi" value="{{ old('doi') }}"
                        class="input w-full border mt-2" >
                    @error('doi')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>


                <div class="w-full col-span-6">
                    <label class="flex flex-col sm:flex-row">
                        <span class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Mualliflar
                    </label>
                    <div id="mualliflar-container">
                        <div class="muallif-input">
                            <input type="text" name="mualliflar_json[]" class="input w-full border mt-2"
                                placeholder="Muallifning F.I.Sh" required>
                        </div>
                    </div>
                    <button type="button" id="add-author" class="btn btn-primary mt-2">Muallif qo'shish</button>
                    @error('mualliflar_json')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>



            </div><br>
        </form><br>
        <div class="px-5 pb-5 text-center">
            <a href="{{ route('intellektualmulk.index') }}" class="button delete-cancel w-32 border text-gray-700 mr-1">
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
    document.getElementById('add-author').addEventListener('click', function () {
        // Mualliflar konteynerini olish
        var container = document.getElementById('mualliflar-container');

        // Yangi input yaratish
        var newAuthorInput = document.createElement('div');
        newAuthorInput.classList.add('muallif-input');

        // Yangi inputni yaratish
        newAuthorInput.innerHTML = `
        <input type="text" name="mualliflar_json[]" class="input w-full border mt-2" placeholder="Muallifning F.I.Sh" required>
    `;

        // Yangi inputni konteynerga qo'shish
        container.appendChild(newAuthorInput);
    });

</script>

@endsection

