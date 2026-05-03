<div class="modal" id="science-paper-create-modal">
    <div class="modal__content modal__content--xl">
        <div class="p-5">

            <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2">
                <div class="w-full mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                    <form id="science-paper-create-form" method="POST" action="{{ route('loyihaiqtisodi.store') }}"
                        class="validate-form" enctype="multipart/form-data" novalidate="novalidate">
                        @csrf
                        <div class="grid grid-cols-12 gap-2">

                            <div class="w-full col-span-12">
                                <table class="table table-bordered">
                                    <tr>
                                        <th class="border" style="text-align: center;" colspan="3">LOYIHANING
                                            MUHIM
                                            NATIJALARI</th>
                                    </tr>
                                    <tr>
                                        <th class="border" style="width: 50%;">Koʻrsatkichlar</th>
                                        <th class="border" colspan="2"><span
                                                class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Bajarilishi
                                            holatining tahlili</th>
                                    </tr>
                                    <tr>
                                        <td class="border" style="font-size:16px;">
                                            Hisobot davrida qoʻlga kiritilgan muhim natijalar
                                        </td>
                                        <input type="hidden" name="ilmiy_loyiha_id" value="{{ $ilmiyloyiha->id }}">
                                        <td class="border" colspan="2">
                                            <textarea name="hisobot_davri" value="" cols="5" rows="3"
                                                class="input w-full border mt-2"
                                                required="">{{ $loyihaiqtisodi_1?->hisobot_davri ?? null }}</textarea>
                                            @error('hisobot_davri')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border" style="font-size:16px;">
                                            Loyihaning bajarilishi davrida yaratilgan ishlanma (texnologiya) nomi va
                                            qisqacha
                                            tavsifi
                                        </td>
                                        <td class="border" colspan="2">
                                            <textarea name="loyihabaj_ishlanma" cols="5" rows="3"
                                                class="input w-full border mt-2"
                                                required="">{{ $loyihaiqtisodi_1?->loyihabaj_ishlanma ?? null }}</textarea>
                                            @error('loyihabaj_ishlanma')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border" style="font-size:16px;">
                                            Ilmiy ishlanma joriy etiladigan (tijoratlashtiriladigan) tarmoq (soha) va
                                            kutilayotgan
                                            natijalar (mavjud ehtiyoj, iqtisodiy samaradorlik tahlili)
                                        </td>
                                        <td class="border" colspan="2">
                                            <textarea name="ilmiy_ishlanmalar" cols="5" rows="3"
                                                class="input w-full border mt-2"
                                                required="">{{ $loyihaiqtisodi_1?->ilmiy_ishlanmalar ?? null }}</textarea>
                                            @error('ilmiy_ishlanmalar')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </td>
                                    </tr>

                                    <tr>
                                        <th class="border" style="text-align: center;" colspan="3">LOYIHANING
                                            MOLIYAVIY
                                            VA IQTISODIY
                                            KOʻRSATKICHLARI
                                            (AJRATILGAN MABLAGʻLARNING MAQSADLI ISHLATILISHI)
                                        </th>
                                    </tr>
                                    <tr>
                                        <th class="border" style="width: 50%;">Koʻrsatkichlar</th>
                                        <th class="border"><span
                                                class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Rejada</th>
                                        <th class="border"><span
                                                class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Amalda</th>
                                    </tr>
                                    <tr>
                                        <td class="border" style="font-size:16px;">
                                            Mehnatga haq toʻlash (5.1.-shakl)
                                        </td>
                                        <td class="border">
                                            <input type="text" id="sumInput1"
                                                oninput="formatNumber(this, 'mehnat_haq_r_creat')" name="mehnat_haq_r"
                                                value="{{ $loyihaiqtisodi_1?->mehnat_haq_r ?? null }}"
                                                class="input w-full border mt-2" required="">
                                            <span id="mehnat_haq_r_creat" class="mt-2 text-black-600"></span> so'm
                                            @error('mehnat_haq_r')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </td>
                                        <td class="border">
                                            <input type="text" id="sumInput1"
                                                oninput="formatNumber(this, 'mehnat_haq_a_create')" name="mehnat_haq_a"
                                                value="{{ $loyihaiqtisodi_1?->mehnat_haq_a ?? null }}"
                                                class="input w-full border mt-2" required="">
                                            <span id="mehnat_haq_a_create" class="mt-2 text-black-600"></span> so'm
                                            @error('mehnat_haq_a')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border" style="font-size:16px;">
                                            Xizmat safarlari xarajatlari (5.2.-shakl)
                                        </td>
                                        <td class="border">
                                            <input type="text" id="sumInput1"
                                                oninput="formatNumber(this, 'xizmat_saf_r_create')" name="xizmat_saf_r"
                                                value="{{ $loyihaiqtisodi_1?->xizmat_saf_r ?? null }}"
                                                class="input w-full border mt-2" required="">
                                            <span id="xizmat_saf_r_create" class="mt-2 text-black-600"></span> so'm
                                            @error('xizmat_saf_r')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </td>
                                        <td class="border">
                                            <input type="text" id="sumInput1"
                                                oninput="formatNumber(this, 'xizmat_saf_a_create')" name="xizmat_saf_a"
                                                value="{{ $loyihaiqtisodi_1?->xizmat_saf_a ?? null }}"
                                                class="input w-full border mt-2" required="">
                                            <span id="xizmat_saf_a_create" class="mt-2 text-black-600"></span> so'm
                                            @error('xizmat_saf_a')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border" style="font-size:16px;">
                                            Ilmiy-tadqiqot uchun zarur boʻlgan asbob-uskunalar, texnik vositalar va
                                            boshqa
                                            tovar-moddiy boyliklarning xaridi uchun xarajatlar (5.4.-shakl)
                                        </td>
                                        <td class="border">
                                            <input type="text" id="sumInput1"
                                                oninput="formatNumber(this, 'xarid_xaraja_r_create')"
                                                name="xarid_xaraja_r"
                                                value="{{ $loyihaiqtisodi_1?->xarid_xaraja_r ?? null }}"
                                                class="input w-full border mt-2" required="">
                                            <span id="xarid_xaraja_r_create" class="mt-2 text-black-600"></span> so'm
                                            @error('xarid_xaraja_r')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </td>
                                        <td class="border">
                                            <input type="text" id="sumInput1"
                                                oninput="formatNumber(this, 'xarid_xaraja_a_create')"
                                                name="xarid_xaraja_a"
                                                value="{{ $loyihaiqtisodi_1?->xarid_xaraja_a ?? null }}"
                                                class="input w-full border mt-2" required="">
                                            <span id="xarid_xaraja_a_create" class="mt-2 text-black-600"></span> so'm
                                            @error('xarid_xaraja_a')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border" style="font-size:16px;">
                                            Ilmiy-tadqiqot uchun materiallar va butlovchi qismlarni sotib olish
                                            xarajatlari
                                            (5.5.-shakl)
                                        </td>
                                        <td class="border">
                                            <input type="text" id="sumInput1"
                                                oninput="formatNumber(this, 'mat_butlovchi_r_create')"
                                                name="mat_butlovchi_r"
                                                value="{{ $loyihaiqtisodi_1?->mat_butlovchi_r ?? null }}"
                                                class="input w-full border mt-2" required="">
                                            <span id="mat_butlovchi_r_create" class="mt-2 text-black-600"></span> so'm
                                            @error('mat_butlovchi_r')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </td>
                                        <td class="border">
                                            <input type="text" id="sumInput1"
                                                oninput="formatNumber(this, 'mat_butlovchi_a_create')"
                                                name="mat_butlovchi_a"
                                                value="{{ $loyihaiqtisodi_1?->mat_butlovchi_a ?? null }}"
                                                class="input w-full border mt-2" required="">
                                            <span id="mat_butlovchi_a_create" class="mt-2 text-black-600"></span> so'm
                                            @error('mat_butlovchi_a')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border" style="font-size:16px;">
                                            Loyihani amalga oshirishga jalb etilgan boshqa tashkilotlarning tadqiqot
                                            ishlari uchun
                                            toʻlov (5.6.-shakl)
                                        </td>
                                        <td class="border">
                                            <input type="text" id="sumInput1"
                                                oninput="formatNumber(this, 'jalb_etilgan_r_create')"
                                                name="jalb_etilgan_r"
                                                value="{{ $loyihaiqtisodi_1?->jalb_etilgan_r ?? null }}"
                                                class="input w-full border mt-2" required="">
                                            <span id="jalb_etilgan_r_create" class="mt-2 text-black-600"></span> so'm
                                            @error('jalb_etilgan_r')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </td>
                                        <td class="border">
                                            <input type="text" id="sumInput1"
                                                oninput="formatNumber(this, 'jalb_etilgan_a_create')"
                                                name="jalb_etilgan_a"
                                                value="{{ $loyihaiqtisodi_1?->jalb_etilgan_a ?? null }}"
                                                class="input w-full border mt-2" required="">
                                            <span id="jalb_etilgan_a_create" class="mt-2 text-black-600"></span> so'm
                                            @error('jalb_etilgan_a')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border" style="font-size:16px;">
                                            Loyihani amalga oshirish uchun boshqa xarajatlar (5.7.-shakl)
                                        </td>
                                        <td class="border">
                                            <input type="text" id="sumInput1"
                                                oninput="formatNumber(this, 'boshqa_xarajat_r_create')"
                                                name="boshqa_xarajat_r"
                                                value="{{ $loyihaiqtisodi_1?->boshqa_xarajat_r ?? null }}"
                                                class="input w-full border mt-2" required="">
                                            <span id="boshqa_xarajat_r_create" class="mt-2 text-black-600"></span> so'm
                                            @error('boshqa_xarajat_r')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </td>
                                        <td class="border">
                                            <input type="text" id="sumInput1"
                                                oninput="formatNumber(this, 'boshqa_xarajat_a_create')"
                                                name="boshqa_xarajat_a"
                                                value="{{ $loyihaiqtisodi_1?->boshqa_xarajat_a ?? null }}"
                                                class="input w-full border mt-2" required="">
                                            <span id="boshqa_xarajat_a_create" class="mt-2 text-black-600"></span> so'm
                                            @error('boshqa_xarajat_a')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border" style="font-size:16px;">
                                            Tashkilotning ustama xarajatlari (ushbu xarajat turi byudjetdan
                                            toʻgʻridan-toʻgʻri va
                                            bazaviy moliyalashtiriladigan ilmiy tashkilotlar tomonidan
                                            rejalashtirilmaydi)
                                        </td>
                                        <td class="border">
                                            <input type="text" id="sumInput1"
                                                oninput="formatNumber(this, 'tashustama_xarajat_r_create')"
                                                name="tashustama_xarajat_r"
                                                value="{{ $loyihaiqtisodi_1?->tashustama_xarajat_r ?? null }}"
                                                class="input w-full border mt-2" required="tashustama_xarajat_r">
                                            <span id="tashustama_xarajat_r_create" class="mt-2 text-black-600"></span>
                                            so'm
                                            @error('tashustama_xarajat_r')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </td>
                                        <td class="border">
                                            <input type="text" id="sumInput1"
                                                oninput="formatNumber(this, 'tashustama_xarajat_a_create')"
                                                name="tashustama_xarajat_a"
                                                value="{{ $loyihaiqtisodi_1?->tashustama_xarajat_a ?? null }}"
                                                class="input w-full border mt-2" required="tashustama_xarajat_a">
                                            <span id="tashustama_xarajat_a_create" class="mt-2 text-black-600"></span>
                                            so'm
                                            @error('tashustama_xarajat_a')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border" style="font-size:16px;">
                                            Xarid qilingan asbob-uskunalar va boshqa asosiy vositalar xaridining
                                            shartnomalari
                                            mavjudligi, dalolatnomasining rasmiylashtirilganligi
                                        </td>
                                        <td class="border">
                                            <div class="flex items-center text-gray-700 mr-2">
                                                <input type="radio" class="input border mr-2"
                                                    id="horizontal-radio-chris-evans" name="xarid_qilingan_xarid"
                                                    value="ha" required>
                                                <label class="cursor-pointer select-none"
                                                    for="horizontal-radio-chris-evans">Ha</label>
                                            </div>
                                        </td>
                                        <td class="border">
                                            <div class="flex items-center text-gray-700 mr-2 mt-2 sm:mt-0">
                                                <input type="radio" class="input border mr-2"
                                                    name="xarid_qilingan_xarid" id="horizontal-radio-liam-neeson"
                                                    value="yo'q">
                                                <label class="cursor-pointer select-none"
                                                    for="horizontal-radio-liam-neeson">Yo'q</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border" style="font-size:16px;">
                                            Xarid shartnomasining raqami va sanasi
                                        </td>
                                        <td class="border">
                                            <input type="text" name="xarid_s"
                                                value="{{ $loyihaiqtisodi_1?->xarid_s ?? null }}"
                                                class="input w-full border mt-2" required="">
                                            @error('xarid_s')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </td>
                                        <td class="border">
                                            <input type="date" name="xarid_r"
                                                value="{{ $loyihaiqtisodi_1?->xarid_r ?? null }}"
                                                class="input w-full border mt-2" required="">
                                            @error('xarid_r')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border" style="font-size:16px;">
                                            Sotuvchi kompaniyaning nomi
                                        </td>
                                        <td class="border" colspan="2">
                                            <input type="text" name="xarid_sh"
                                                value="{{ $loyihaiqtisodi_1?->xarid_sh ?? null }}"
                                                class="input w-full border mt-2" required="">
                                            @error('xarid_sh')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border" style="font-size:16px;">
                                            Yetkazib beruvchi yuridik shaxsning nomi
                                        </td>
                                        <td class="border" colspan="2">
                                            <input type="text" name="yetkb_yuridik_nomi"
                                                value="{{ $loyihaiqtisodi_1?->yetkb_yuridik_nomi ?? null }}"
                                                class="input w-full border mt-2" required="">
                                            @error('yetkb_yuridik_nomi')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border" style="font-size:16px;">
                                            Mablag‘ning o‘zlashtirilishi, so‘m
                                        </td>
                                        <td class="border" colspan="2">
                                            <input type="text" name="uzlashtirilishi_summasi" id="sumInput1"
                                                oninput="formatNumber(this, 'uzlashtirilishi_summasi_create')"
                                                value="{{ $loyihaiqtisodi_1?->uzlashtirilishi_summasi ?? null }}"
                                                class="input w-full border mt-2" required="">
                                            <span id="uzlashtirilishi_summasi_create"
                                                class="mt-2 text-black-600"></span> so'm
                                            @error('uzlashtirilishi_summasi')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
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
            <button type="submit" form="science-paper-create-form"
                class="update-confirm button w-24 bg-theme-1 text-white">
                Qo'shish
            </button>
        </div>
    </div>
</div>

<div class="modal" id="science-paper-edit-modal">
    <div class="modal__content modal__content--xl">
        <div class="p-5">

            <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2">
                <div class="w-full mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                    <form id="science-paper-edit-form-edit" method="POST"
                        action="{{ route('loyihaiqtisodi.update', $loyihaiqtisodi?->id ?? 0) }}" class="validate-form"
                        enctype="multipart/form-data" novalidate="novalidate">
                        @csrf
                        @method('PUT')
                        <div class="grid grid-cols-12 gap-2">

                            <div class="w-full col-span-12">
                                <table class="table table-bordered">
                                    <tr>
                                        <th class="border" style="text-align: center;" colspan="3">LOYIHANING
                                            MUHIM
                                            NATIJALARI</th>
                                    </tr>
                                    <tr>
                                        <th class="border" style="width: 50%;">Koʻrsatkichlar</th>
                                        <th class="border" colspan="2"><span
                                                class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Bajarilishi
                                            holatining tahlili</th>
                                    </tr>
                                    <tr>
                                        <td class="border" style="font-size:16px;">
                                            Hisobot davrida qoʻlga kiritilgan muhim natijalar
                                        </td>
                                        <td class="border" colspan="2">
                                            <textarea name="hisobot_davri" value="" cols="5" rows="3"
                                                class="input w-full border mt-2"
                                                required="">{{ $loyihaiqtisodi?->hisobot_davri ?? 'yoq' }}</textarea>
                                            @error('hisobot_davri')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border" style="font-size:16px;">
                                            Loyihaning bajarilishi davrida yaratilgan ishlanma (texnologiya) nomi va
                                            qisqacha
                                            tavsifi
                                        </td>
                                        <td class="border" colspan="2">
                                            <textarea name="loyihabaj_ishlanma" cols="5" rows="3"
                                                class="input w-full border mt-2"
                                                required="">{{ $loyihaiqtisodi?->loyihabaj_ishlanma ?? 'yoq' }}</textarea>
                                            @error('loyihabaj_ishlanma')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border" style="font-size:16px;">
                                            Ilmiy ishlanma joriy etiladigan (tijoratlashtiriladigan) tarmoq (soha) va
                                            kutilayotgan
                                            natijalar (mavjud ehtiyoj, iqtisodiy samaradorlik tahlili)
                                        </td>
                                        <td class="border" colspan="2">
                                            <textarea name="ilmiy_ishlanmalar" cols="5" rows="3"
                                                class="input w-full border mt-2"
                                                required="">{{ $loyihaiqtisodi?->ilmiy_ishlanmalar ?? 'yoq' }}</textarea>
                                            @error('ilmiy_ishlanmalar')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </td>
                                    </tr>

                                    <tr>
                                        <th class="border" style="text-align: center;" colspan="3">LOYIHANING
                                            MOLIYAVIY
                                            VA IQTISODIY
                                            KOʻRSATKICHLARI
                                            (AJRATILGAN MABLAGʻLARNING MAQSADLI ISHLATILISHI)
                                        </th>
                                    </tr>
                                    <tr>
                                        <th class="border" style="width: 50%;">Koʻrsatkichlar</th>
                                        <th class="border"><span
                                                class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Rejada</th>
                                        <th class="border"><span
                                                class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Amalda</th>
                                    </tr>
                                    <tr>
                                        <td class="border" style="font-size:16px;">
                                            Mehnatga haq toʻlash (5.1.-shakl)
                                        </td>
                                        <td class="border">
                                            <input type="text" id="sumInput1"
                                                oninput="formatNumber(this, 'mehnat_haq_r')" name="mehnat_haq_r"
                                                value="{{ $loyihaiqtisodi?->mehnat_haq_r ?? 0 }}"
                                                class="input w-full border mt-2" required="">
                                            <span id="mehnat_haq_r" class="mt-2 text-black-600"></span> so'm
                                            @error('mehnat_haq_r')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </td>
                                        <td class="border">
                                            <input type="text" id="sumInput1"
                                                oninput="formatNumber(this, 'mehnat_haq_a')" name="mehnat_haq_a"
                                                value="{{ $loyihaiqtisodi?->mehnat_haq_a ?? 0 }}"
                                                class="input w-full border mt-2" required="">
                                            <span id="mehnat_haq_a" class="mt-2 text-black-600"></span> so'm
                                            @error('mehnat_haq_a')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border" style="font-size:16px;">
                                            Xizmat safarlari xarajatlari (5.2.-shakl)
                                        </td>
                                        <td class="border">
                                            <input type="text" id="sumInput1"
                                                oninput="formatNumber(this, 'xizmat_saf_r')" name="xizmat_saf_r"
                                                value="{{ $loyihaiqtisodi?->xizmat_saf_r ?? 0 }}"
                                                class="input w-full border mt-2" required="">
                                            <span id="xizmat_saf_r" class="mt-2 text-black-600"></span> so'm
                                            @error('xizmat_saf_r')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </td>
                                        <td class="border">
                                            <input type="text" id="sumInput1"
                                                oninput="formatNumber(this, 'xizmat_saf_a')" name="xizmat_saf_a"
                                                value="{{ $loyihaiqtisodi?->xizmat_saf_a ?? 0 }}"
                                                class="input w-full border mt-2" required="">
                                            <span id="xizmat_saf_a" class="mt-2 text-black-600"></span> so'm
                                            @error('xizmat_saf_a')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border" style="font-size:16px;">
                                            Ilmiy-tadqiqot uchun zarur boʻlgan asbob-uskunalar, texnik vositalar va
                                            boshqa
                                            tovar-moddiy boyliklarning xaridi uchun xarajatlar (5.4.-shakl)
                                        </td>
                                        <td class="border">
                                            <input type="text" id="sumInput1"
                                                oninput="formatNumber(this, 'xarid_xaraja_r')" name="xarid_xaraja_r"
                                                value="{{ $loyihaiqtisodi?->xarid_xaraja_r ?? 0 }}"
                                                class="input w-full border mt-2" required="">
                                            <span id="xarid_xaraja_r" class="mt-2 text-black-600"></span> so'm
                                            @error('xarid_xaraja_r')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </td>
                                        <td class="border">
                                            <input type="text" id="sumInput1"
                                                oninput="formatNumber(this, 'xarid_xaraja_a')" name="xarid_xaraja_a"
                                                value="{{ $loyihaiqtisodi?->xarid_xaraja_a ?? 0 }}"
                                                class="input w-full border mt-2" required="">
                                            <span id="xarid_xaraja_a" class="mt-2 text-black-600"></span> so'm
                                            @error('xarid_xaraja_a')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border" style="font-size:16px;">
                                            Ilmiy-tadqiqot uchun materiallar va butlovchi qismlarni sotib olish
                                            xarajatlari
                                            (5.5.-shakl)
                                        </td>
                                        <td class="border">
                                            <input type="text" id="sumInput1"
                                                oninput="formatNumber(this, 'mat_butlovchi_r')" name="mat_butlovchi_r"
                                                value="{{ $loyihaiqtisodi?->mat_butlovchi_r ?? 0 }}"
                                                class="input w-full border mt-2" required="">
                                            <span id="mat_butlovchi_r" class="mt-2 text-black-600"></span> so'm
                                            @error('mat_butlovchi_r')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </td>
                                        <td class="border">
                                            <input type="text" id="sumInput1"
                                                oninput="formatNumber(this, 'mat_butlovchi_a')" name="mat_butlovchi_a"
                                                value="{{ $loyihaiqtisodi?->mat_butlovchi_a ?? 0 }}"
                                                class="input w-full border mt-2" required="">
                                            <span id="mat_butlovchi_a" class="mt-2 text-black-600"></span> so'm
                                            @error('mat_butlovchi_a')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border" style="font-size:16px;">
                                            Loyihani amalga oshirishga jalb etilgan boshqa tashkilotlarning tadqiqot
                                            ishlari uchun
                                            toʻlov (5.6.-shakl)
                                        </td>
                                        <td class="border">
                                            <input type="text" id="sumInput1"
                                                oninput="formatNumber(this, 'jalb_etilgan_r')" name="jalb_etilgan_r"
                                                value="{{ $loyihaiqtisodi?->jalb_etilgan_r ?? 0 }}"
                                                class="input w-full border mt-2" required="">
                                            <span id="jalb_etilgan_r" class="mt-2 text-black-600"></span> so'm
                                            @error('jalb_etilgan_r')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </td>
                                        <td class="border">
                                            <input type="text" id="sumInput1"
                                                oninput="formatNumber(this, 'jalb_etilgan_a')" name="jalb_etilgan_a"
                                                value="{{ $loyihaiqtisodi?->jalb_etilgan_a ?? 0 }}"
                                                class="input w-full border mt-2" required="">
                                            <span id="jalb_etilgan_a" class="mt-2 text-black-600"></span> so'm
                                            @error('jalb_etilgan_a')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border" style="font-size:16px;">
                                            Loyihani amalga oshirish uchun boshqa xarajatlar (5.7.-shakl)
                                        </td>
                                        <td class="border">
                                            <input type="text" id="sumInput1"
                                                oninput="formatNumber(this, 'boshqa_xarajat_r')" name="boshqa_xarajat_r"
                                                value="{{ $loyihaiqtisodi?->boshqa_xarajat_r ?? 0 }}"
                                                class="input w-full border mt-2" required="">
                                            <span id="boshqa_xarajat_r" class="mt-2 text-black-600"></span> so'm
                                            @error('boshqa_xarajat_r')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </td>
                                        <td class="border">
                                            <input type="text" id="sumInput1"
                                                oninput="formatNumber(this, 'boshqa_xarajat_a')" name="boshqa_xarajat_a"
                                                value="{{ $loyihaiqtisodi?->boshqa_xarajat_a ?? 0 }}"
                                                class="input w-full border mt-2" required="">
                                            <span id="boshqa_xarajat_a" class="mt-2 text-black-600"></span> so'm
                                            @error('boshqa_xarajat_a')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border" style="font-size:16px;">
                                            Tashkilotning ustama xarajatlari (ushbu xarajat turi byudjetdan
                                            toʻgʻridan-toʻgʻri va
                                            bazaviy moliyalashtiriladigan ilmiy tashkilotlar tomonidan
                                            rejalashtirilmaydi)
                                        </td>
                                        <td class="border">
                                            <input type="text" id="sumInput1"
                                                oninput="formatNumber(this, 'tashustama_xarajat_r')"
                                                name="tashustama_xarajat_r"
                                                value="{{ $loyihaiqtisodi?->tashustama_xarajat_r ?? 0 }}"
                                                class="input w-full border mt-2" required="tashustama_xarajat_r">
                                            <span id="tashustama_xarajat_r" class="mt-2 text-black-600"></span> so'm
                                            @error('tashustama_xarajat_r')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </td>
                                        <td class="border">
                                            <input type="text" id="sumInput1"
                                                oninput="formatNumber(this, 'tashustama_xarajat_a')"
                                                name="tashustama_xarajat_a"
                                                value="{{ $loyihaiqtisodi?->tashustama_xarajat_a ?? 0 }}"
                                                class="input w-full border mt-2" required="tashustama_xarajat_a">
                                            <span id="tashustama_xarajat_a" class="mt-2 text-black-600"></span> so'm
                                            @error('tashustama_xarajat_a')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border" style="font-size:16px;">
                                            Xarid qilingan asbob-uskunalar va boshqa asosiy vositalar xaridining
                                            shartnomalari
                                            mavjudligi, dalolatnomasining rasmiylashtirilganligi
                                        </td>
                                        <td class="border">
                                            <div class="flex items-center text-gray-700 mr-2">
                                                <input type="radio" class="input border mr-2"
                                                    id="horizontal-radio-chris-evans-edit" name="xarid_qilingan_xarid"
                                                    value="ha" @if (old('xarid_qilingan_xarid', $loyihaiqtisodi?->xarid_qilingan_xarid ?? 0) == 'ha') checked @endif>
                                                <label class="cursor-pointer select-none"
                                                    for="horizontal-radio-chris-evans-edit">Ha</label>
                                            </div>
                                        </td>
                                        <td class="border">
                                            <div class="flex items-center text-gray-700 mr-2 mt-2 sm:mt-0">
                                                <input type="radio" class="input border mr-2"
                                                    id="horizontal-radio-liam-neeson-edit" name="xarid_qilingan_xarid"
                                                    value="yo'q" @if (old('xarid_qilingan_xarid', $loyihaiqtisodi?->xarid_qilingan_xarid ?? 0) == "yo'q") checked @endif>
                                                <label class="cursor-pointer select-none"
                                                    for="horizontal-radio-liam-neeson-edit">Yo'q</label>
                                            </div>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td class="border" style="font-size:16px;">
                                            Xarid shartnomasining raqami va sanasi
                                        </td>
                                        <td class="border">
                                            <input type="text" name="xarid_s"
                                                value="{{ $loyihaiqtisodi?->xarid_s ?? '' }}"
                                                class="input w-full border mt-2" required="">
                                            @error('xarid_s')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </td>
                                        <td class="border">
                                            <input type="date" name="xarid_r"
                                                value="{{ $loyihaiqtisodi?->xarid_r ?? '' }}"
                                                class="input w-full border mt-2" required="">
                                            @error('xarid_r')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border" style="font-size:16px;">
                                            Sotuvchi kompaniyaning nomi
                                        </td>
                                        <td class="border" colspan="2">
                                            <input type="text" name="xarid_sh"
                                                value="{{ $loyihaiqtisodi?->xarid_sh ?? '' }}"
                                                class="input w-full border mt-2" required="">
                                            @error('xarid_sh')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border" style="font-size:16px;">
                                            Yetkazib beruvchi yuridik shaxsning nomi
                                        </td>
                                        <td class="border" colspan="2">
                                            <input type="text" name="yetkb_yuridik_nomi"
                                                value="{{ $loyihaiqtisodi?->yetkb_yuridik_nomi ?? '' }}"
                                                class="input w-full border mt-2" required="">
                                            @error('yetkb_yuridik_nomi')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border" style="font-size:16px;">
                                            Mablag‘ning o‘zlashtirilishi, so‘m
                                        </td>
                                        <td class="border" colspan="2">
                                            <input type="text" name="uzlashtirilishi_summasi" id="sumInput1"
                                                oninput="formatNumber(this, 'uzlashtirilishi_summasi')"
                                                value="{{ $loyihaiqtisodi?->uzlashtirilishi_summasi ?? '' }}"
                                                class="input w-full border mt-2" required="">
                                            <span id="uzlashtirilishi_summasi" class="mt-2 text-black-600"></span> so'm
                                            @error('uzlashtirilishi_summasi')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
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
            <button type="submit" form="science-paper-edit-form-edit"
                class="update-confirm button w-24 bg-theme-1 text-white">
                Qo'shish
            </button>
        </div>
    </div>
</div>