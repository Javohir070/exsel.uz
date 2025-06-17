@extends('layouts.admin')

@section('content')

    <div class="flex justify-between align-center mt-6 mb-6">

        <h2 class="intro-y text-lg font-medium">intellektual qo'shish</h2>

    </div>
    <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2" style="background: white;
            padding: 20px 20px;
            border-radius: 4px">
        <div class="w-full mt-3 sm:mt-0 sm:ml-auto md:ml-0">
            <form id="science-paper-create-form" method="POST" action="{{ route("loyihaiqtisodi.update", $loyihaiqtisodi->id) }}"
                class="validate-form" enctype="multipart/form-data" novalidate="novalidate">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-12 gap-2">

                    <div class="w-full col-span-12">
                        <table class="table table-bordered">
                            <tr>
                                <th class="border" style="text-align: center;" colspan="3">LOYIHANING MUHIM NATIJALARI</th>
                            </tr>
                            <tr>
                                <th class="border" style="width: 50%;">Koʻrsatkichlar</th>
                                <th class="border" colspan="2"><span class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Bajarilishi holatining tahlili</th>
                            </tr>
                            <tr>
                                <td class="border" style="text-size:16px;font-weight:700;">
                                    Hisobot davrida qoʻlga kiritilgan muhim natijalar
                                </td>
                                <td class="border" colspan="2">
                                    <textarea name="hisobot_davri" value="" cols="5" rows="3" class="input w-full border mt-2"
                                        required="">{{ $loyihaiqtisodi->hisobot_davri }}</textarea>
                                    @error('hisobot_davri')
                                        <div class="error">{{ $message }}</div>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <td class="border" style="text-size:16px;font-weight:700;">
                                    Loyihaning bajarilishi davrida yaratilgan ishlanma (texnologiya) nomi va qisqacha
                                    tavsifi
                                </td>
                                <td class="border" colspan="2">
                                    <textarea name="loyihabaj_ishlanma" cols="5" rows="3" class="input w-full border mt-2"
                                        required="">{{ $loyihaiqtisodi->loyihabaj_ishlanma }}</textarea>
                                    @error('loyihabaj_ishlanma')
                                        <div class="error">{{ $message }}</div>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <td class="border" style="text-size:16px;font-weight:700;">
                                    Ilmiy ishlanma joriy etiladigan (tijoratlashtiriladigan) tarmoq (soha) va kutilayotgan
                                    natijalar (mavjud ehtiyoj, iqtisodiy samaradorlik tahlili)
                                </td>
                                <td class="border" colspan="2">
                                    <textarea name="ilmiy_ishlanmalar" cols="5" rows="3" class="input w-full border mt-2"
                                        required="">{{ $loyihaiqtisodi->ilmiy_ishlanmalar }}</textarea>
                                    @error('ilmiy_ishlanmalar')
                                        <div class="error">{{ $message }}</div>
                                    @enderror
                                </td>
                            </tr>

                            <tr>
                                <th class="border" style="text-align: center;" colspan="3">LOYIHANING MOLIYAVIY VA IQTISODIY
                                    KOʻRSATKICHLARI
                                    (AJRATILGAN MABLAGʻLARNING MAQSADLI ISHLATILISHI)
                                </th>
                            </tr>
                            <tr>
                                <th class="border" style="width: 50%;">Koʻrsatkichlar</th>
                                <th class="border"><span class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Rejada</th>
                                <th class="border"><span class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Amalda</th>
                            </tr>
                            <tr>
                                <td class="border" style="text-size:16px;font-weight:700;">
                                    Mehnatga haq toʻlash (5.1.-shakl)
                                </td>
                                <td class="border">
                                    <input type="number" name="mehnat_haq_r" value="{{ $loyihaiqtisodi->mehnat_haq_r }}"
                                        class="input w-full border mt-2" required="">
                                    @error('mehnat_haq_r')
                                        <div class="error">{{ $message }}</div>
                                    @enderror
                                </td>
                                <td class="border">
                                    <input type="number" name="mehnat_haq_a" value="{{ $loyihaiqtisodi->mehnat_haq_a }}"
                                        class="input w-full border mt-2" required="">
                                    @error('mehnat_haq_a')
                                        <div class="error">{{ $message }}</div>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <td class="border" style="text-size:16px;font-weight:700;">
                                    Xizmat safarlari xarajatlari (5.2.-shakl)
                                </td>
                                <td class="border">
                                    <input type="number" name="xizmat_saf_r" value="{{ $loyihaiqtisodi->xizmat_saf_r }}"
                                        class="input w-full border mt-2" required="">
                                    @error('xizmat_saf_r')
                                        <div class="error">{{ $message }}</div>
                                    @enderror
                                </td>
                                <td class="border">
                                    <input type="number" name="xizmat_saf_a" value="{{ $loyihaiqtisodi->xizmat_saf_a }}"
                                        class="input w-full border mt-2" required="">
                                    @error('xizmat_saf_a')
                                        <div class="error">{{ $message }}</div>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <td class="border" style="text-size:16px;font-weight:700;">
                                    Ilmiy-tadqiqot uchun zarur boʻlgan asbob-uskunalar, texnik vositalar va boshqa
                                    tovar-moddiy boyliklarning xaridi uchun xarajatlar (5.4.-shakl)
                                </td>
                                <td class="border">
                                    <input type="number" name="xarid_xaraja_r" value="{{ $loyihaiqtisodi->xarid_xaraja_r }}"
                                        class="input w-full border mt-2" required="">
                                    @error('xarid_xaraja_r')
                                        <div class="error">{{ $message }}</div>
                                    @enderror
                                </td>
                                <td class="border">
                                    <input type="number" name="xarid_xaraja_a" value="{{ $loyihaiqtisodi->xarid_xaraja_a }}"
                                        class="input w-full border mt-2" required="">
                                    @error('xarid_xaraja_a')
                                        <div class="error">{{ $message }}</div>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <td class="border" style="text-size:16px;font-weight:700;">
                                    Ilmiy-tadqiqot uchun materiallar va butlovchi qismlarni sotib olish xarajatlari
                                    (5.5.-shakl)
                                </td>
                                <td class="border">
                                    <input type="number" name="mat_butlovchi_r" value="{{ $loyihaiqtisodi->mat_butlovchi_r }}"
                                        class="input w-full border mt-2" required="">
                                    @error('mat_butlovchi_r')
                                        <div class="error">{{ $message }}</div>
                                    @enderror
                                </td>
                                <td class="border">
                                    <input type="number" name="mat_butlovchi_a" value="{{ $loyihaiqtisodi->mat_butlovchi_a }}"
                                        class="input w-full border mt-2" required="">
                                    @error('mat_butlovchi_a')
                                        <div class="error">{{ $message }}</div>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <td class="border" style="text-size:16px;font-weight:700;">
                                    Loyihani amalga oshirishga jalb etilgan boshqa tashkilotlarning tadqiqot ishlari uchun
                                    toʻlov (5.6.-shakl)
                                </td>
                                <td class="border">
                                    <input type="number" name="jalb_etilgan_r" value="{{ $loyihaiqtisodi->jalb_etilgan_r }}"
                                        class="input w-full border mt-2" required="">
                                    @error('jalb_etilgan_r')
                                        <div class="error">{{ $message }}</div>
                                    @enderror
                                </td>
                                <td class="border">
                                    <input type="number" name="jalb_etilgan_a" value="{{ $loyihaiqtisodi->jalb_etilgan_a }}"
                                        class="input w-full border mt-2" required="">
                                    @error('jalb_etilgan_a')
                                        <div class="error">{{ $message }}</div>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <td class="border" style="text-size:16px;font-weight:700;">
                                    Loyihani amalga oshirish uchun boshqa xarajatlar (5.7.-shakl)
                                </td>
                                <td class="border">
                                    <input type="number" name="boshqa_xarajat_r" value="{{ $loyihaiqtisodi->boshqa_xarajat_r }}"
                                        class="input w-full border mt-2" required="">
                                    @error('boshqa_xarajat_r')
                                        <div class="error">{{ $message }}</div>
                                    @enderror
                                </td>
                                <td class="border">
                                    <input type="number" name="boshqa_xarajat_a" value="{{ $loyihaiqtisodi->boshqa_xarajat_a }}"
                                        class="input w-full border mt-2" required="">
                                    @error('boshqa_xarajat_a')
                                        <div class="error">{{ $message }}</div>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <td class="border" style="text-size:16px;font-weight:700;">
                                    Tashkilotning ustama xarajatlari (ushbu xarajat turi byudjetdan toʻgʻridan-toʻgʻri va
                                    bazaviy moliyalashtiriladigan ilmiy tashkilotlar tomonidan rejalashtirilmaydi)
                                </td>
                                <td class="border">
                                    <input type="number" name="tashustama_xarajat_r"
                                        value="{{ $loyihaiqtisodi->tashustama_xarajat_r }}" class="input w-full border mt-2"
                                        required="tashustama_xarajat_r">
                                    @error('fish')
                                        <div class="error">{{ $message }}</div>
                                    @enderror
                                </td>
                                <td class="border">
                                    <input type="number" name="tashustama_xarajat_a"
                                        value="{{ $loyihaiqtisodi->tashustama_xarajat_a }}" class="input w-full border mt-2"
                                        required="tashustama_xarajat_a">
                                    @error('fish')
                                        <div class="error">{{ $message }}</div>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <td class="border" style="text-size:16px;font-weight:700;">
                                    Xarid qilingan asbob-uskunalar va boshqa asosiy vositalar xaridining shartnomalari
                                    mavjudligi, dalolatnomasining rasmiylashtirilganligi
                                </td>
                                <td class="border">
                                    <div class="flex items-center text-gray-700 mr-2"> <input type="radio"
                                            class="input border mr-2" id="horizontal-radio-chris-evans"
                                            name="xarid_qilingan_xarid" value="ha"> <label
                                            class="cursor-pointer select-none" for="horizontal-radio-chris-evans">Ha</label>
                                    </div>
                                </td>
                                <td class="border">
                                    <div class="flex items-center text-gray-700 mr-2 mt-2 sm:mt-0"> <input type="radio"
                                            class="input border mr-2" id="horizontal-radio-liam-neeson"
                                             value="yo'q"> <label
                                            class="cursor-pointer select-none"
                                            for="horizontal-radio-liam-neeson">Yo'q</label> </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="border" style="text-size:16px;font-weight:700;">
                                    Xarid shartnomasining raqami va sanasi
                                </td>
                                <td class="border">
                                    <input type="text" name="xarid_s" value="{{ $loyihaiqtisodi->xarid_s }}"
                                        class="input w-full border mt-2" required="">
                                    @error('xarid_s')
                                        <div class="error">{{ $message }}</div>
                                    @enderror
                                </td>
                                <td class="border">
                                    <input type="date" name="xarid_r" value="{{ $loyihaiqtisodi->xarid_r }}"
                                        class="input w-full border mt-2" required="">
                                    @error('xarid_r')
                                        <div class="error">{{ $message }}</div>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <td class="border" style="text-size:16px;font-weight:700;">
                                    Sotuvchi kompaniyaning nomi
                                </td>
                                <td class="border" colspan="2">
                                    <input type="text" name="xarid_sh" value="{{ $loyihaiqtisodi->xarid_sh }}"
                                        class="input w-full border mt-2" required="">
                                    @error('xarid_sh')
                                        <div class="error">{{ $message }}</div>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <td class="border" style="text-size:16px;font-weight:700;">
                                    Yetkazib beruvchi yuridik shaxsning nomi
                                </td>
                                <td class="border" colspan="2">
                                    <input type="text" name="yetkb_yuridik_nomi" value="{{ $loyihaiqtisodi->yetkb_yuridik_nomi }}"
                                        class="input w-full border mt-2" required="">
                                    @error('yetkb_yuridik_nomi')
                                        <div class="error">{{ $message }}</div>
                                    @enderror
                                </td>
                            </tr>
                        </table>
                    </div>

                </div>
            </form>
            <div class="px-5 pb-5 text-center mt-4">
                <a href="#" class="button delete-cancel w-32 border text-gray-700 mr-1">
                    Bekor qilish
                </a>
                <button type="submit" form="science-paper-create-form"
                    class="update-confirm button w-24 bg-theme-1 text-white">
                    Saqlash
                </button>
            </div>
        </div>
    </div>

@endsection
