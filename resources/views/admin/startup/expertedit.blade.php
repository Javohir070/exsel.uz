@extends('layouts.admin')

@section('content')
    <div class="content">
        <div class="flex justify-between align-center mt-6 mb-6">

            <h2 class="intro-y text-lg font-medium">{{ $startup->name }}</h2>
            <a href="{{ route('startup.index') }}" class="button w-24 bg-theme-1 text-white">
                Orqaga
            </a>
        </div>

        @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif

        <div class="overflow-x-auto" style="background-color: white;margin-top:30px;border-radius:8px;padding:30px 20px;">
            <table class="table">
                <tbody>
                    <tr>
                        <th class=" border" style="width: 100%; font-size:16px;text-align:center;" colspan="2">Ma’lumot
                        </th>
                    </tr>
                    <tr class="bg-gray-200">
                        <th class=" border" style="width:50%;">Loyiha nomi</th>
                        <th class=" border" style="width:50%;">Loyiha rahbari</th>
                    </tr>
                    <tr>
                        <td class="border">{{ $startup->name }}</td>
                        <td class="border">{{ $startup->loyiha_rahbari }}</td>
                    </tr>

                    <tr class="bg-gray-200">
                        <th class=" border" style="width:50%;">Ijrochi tashkilot</th>
                        <th class=" border" style="width:50%;">Shartnoma summasi (ming soʻm)</th>
                    </tr>
                    <tr>
                        <td class="border">{{ $startup->ijrochi_tashkilot }}</td>
                        <td class="border">{{ number_format($startup->sh_summa, 0, ',', ' ') }}</td>
                    </tr>

                    <tr class="bg-gray-200">
                        <th class=" border">Oʻz mablagʻlari hisobidan</th>
                        <th class=" border">Umumiy loyiha qiymati</th>
                    </tr>

                    <tr>
                        <td class="border">{{ number_format($startup->uz_mablaglari_hisobidan, 0, ',', ' ') }}</td>
                        <td class="border">{{ number_format($startup->umumiy_qiymati, 0, ',', ' ') }}</td>
                    </tr>

                    <tr class="bg-gray-200">
                        <th class=" border">Shartnoma raqami</th>
                        <th class=" border">Shartnoma sanasi</th>
                    </tr>

                    <tr>
                        <td class="border">{{ $startup->sh_raqami }}</td>
                        <td class="border">{{ $startup->sh_sanasi }}</td>
                    </tr>

                    <tr class="bg-gray-200">
                        <th class=" border">Loyihani bajarish muddati</th>
                        <th class=" border">Soha</th>
                    </tr>

                    <tr>
                        <td class="border">{{ $startup->bajarish_muddati }}</td>
                        <td class="border">{{ $startup->soha }}</td>
                    </tr>

                    <tr class="bg-gray-200">
                        <th class=" border">Viloyat</th>
                        <th class=" border">Tuman</th>
                    </tr>

                    <tr>
                        <td class="border">{{ $startup->region->oz }}</td>
                        <td class="border">{{ $startup->tuman }}</td>
                    </tr>

                    <tr class="bg-gray-200">
                        <th class=" border">Yangi ishchi oʻrni</th>
                        <th class=" border">Tashkilotnmng INN raqami</th>
                    </tr>

                    <tr>
                        <td class="border">{{ $startup->yangi_ish_urni }}</td>
                        <td class="border">{{ $startup->inn }}</td>
                    </tr>

                    <tr class="bg-gray-200">
                        <th class=" border">Telefon raqami</th>
                        <th class=" border"></th>
                    </tr>

                    <tr>
                        <td class="border">{{ $startup->phone }}</td>
                        <td class="border"></td>
                    </tr>


                </tbody>
            </table>
        </div>


        {{-- @role(['Ishchi guruh azosi']) --}}
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2"
            style="background: white; padding: 20px 20px; border-radius: 4px">
            <div class="w-full mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                <form id="science-paper-create-form" method="POST"
                    action="{{ route('startupexpert.update', ['startupexpert' => $startupExpert->id]) }}"
                    class="validate-form" enctype="multipart/form-data" novalidate="novalidate">
                    @csrf
                    @method('PUT')
                    <div class="grid grid-cols-12 gap-2">
                        <input type="hidden" name="startup_id" value="{{ $startup->id }}">

                        <div class="w-full col-span-6 field-group">
                            <label class="flex flex-col sm:flex-row">
                                <span class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>
                                Loyixa doirasida (ishlab chiqarish, xizmat ko‘rsatish) yo‘lga qo‘yilgani
                            </label>

                            <select name="loyiha_yolga_qoyilgan" class="input border w-full mt-2 show-comment-select"
                                required>
                                <option value=""></option>
                                <option value="1" {{ $startupExpert->loyiha_yolga_qoyilgan == 1 ? 'selected' : '' }}>
                                    Ha </option>
                                <option value="0" {{ $startupExpert->loyiha_yolga_qoyilgan == 0 ? 'selected' : '' }}>
                                    Yo'q</option>
                            </select>

                            <textarea name="loyiha_yolga_qoyilgan_izox" class="input w-full border mt-2 hidden comment-area" placeholder="Izoh"
                                cols="2" rows="2">{{ $startupExpert->loyiha_yolga_qoyilgan_izox }}</textarea>

                            @error('loyiha_yolga_qoyilgan')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="w-full col-span-6 field-group">
                            <label class="flex flex-col sm:flex-row">
                                <span class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>
                                Loyixa doirasida daromadga erishilganligi
                            </label>

                            <select name="daromadga_erishilgan" class="input border w-full mt-2 show-comment-select"
                                required>
                                <option value=""></option>
                                <option value="1" {{ $startupExpert->daromadga_erishilgan == 1 ? 'selected' : '' }}>Ha
                                </option>
                                <option value="0" {{ $startupExpert->daromadga_erishilgan == 0 ? 'selected' : '' }}>
                                    Yo'q</option>
                            </select>

                            <textarea name="daromadga_erishilgan_izox" class="input w-full border mt-2 hidden comment-area" placeholder="Izoh"
                                cols="2" rows="2">{{ $startupExpert->daromadga_erishilgan_izox }}</textarea>
                            @error('daromadga_erishilgan')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="w-full col-span-6 field-group">
                            <label class="flex flex-col sm:flex-row">
                                <span class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>
                                Loixa doirasida olingan Inventar texnikalar kirim qilingani
                            </label>

                            <select name="inventar_kirim_qilingan" class="input border w-full mt-2 show-comment-select"
                                required>
                                <option value=""></option>
                                <option value="1"
                                    {{ $startupExpert->inventar_kirim_qilingan == 1 ? 'selected' : '' }}>Ha </option>
                                <option value="0"
                                    {{ $startupExpert->inventar_kirim_qilingan == 0 ? 'selected' : '' }}>Yo'q</option>
                            </select>

                            <textarea name="inventar_kirim_qilingan_izox" class="input w-full border mt-2 hidden comment-area" placeholder="Izoh"
                                cols="2" rows="2">{{ $startupExpert->inventar_kirim_qilingan_izox }}</textarea>

                            @error('inventar_kirim_qilingan')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="w-full col-span-6 field-group">
                            <label class="flex flex-col sm:flex-row">
                                <span class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>
                                Loixa doirasida olingan Inventar texnikalar joida mavjudligi
                            </label>

                            <select name="inventar_joyida_mavjud" class="input border w-full mt-2 show-comment-select"
                                required>
                                <option value=""></option>
                                <option value="1"
                                    {{ $startupExpert->inventar_joyida_mavjud == 1 ? 'selected' : '' }}>Ha </option>
                                <option value="0"
                                    {{ $startupExpert->inventar_joyida_mavjud == 0 ? 'selected' : '' }}>Yo'q</option>
                            </select>

                            <textarea name="inventar_joyida_mavjud_izox" class="input w-full border mt-2 hidden comment-area" placeholder="Izoh"
                                cols="2" rows="2">{{ $startupExpert->inventar_joyida_mavjud_izox }}</textarea>
                            @error('inventar_joyida_mavjud')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="w-full col-span-6 field-group">
                            <label class="flex flex-col sm:flex-row">
                                <span class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>
                                Loixa doirasida olingan Inventar texnikalar Shartnoma va xisob fakturasidagi texnik
                                parametrlari amaldagi bilan to‘g‘ri kelishi
                            </label>

                            <select name="inventar_parametr_mosligi" class="input border w-full mt-2 show-comment-select"
                                required>
                                <option value=""></option>
                                <option value="1"
                                    {{ $startupExpert->inventar_parametr_mosligi == 1 ? 'selected' : '' }}>Ha</option>
                                <option value="0"
                                    {{ $startupExpert->inventar_parametr_mosligi == 0 ? 'selected' : '' }}>Yo'q</option>
                            </select>

                            <textarea name="inventar_parametr_mosligi_izox" class="input w-full border mt-2 hidden comment-area"
                                placeholder="Izoh" cols="2" rows="2">{{ $startupExpert->inventar_parametr_mosligi_izox }}</textarea>

                            @error('inventar_parametr_mosligi')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="w-full col-span-6 ">
                            <label class="flex flex-col sm:flex-row"> <span
                                    class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Loyixa doirasida ish bilan
                                ta’minlangan xodimlar soni</label>
                            <input type="number" min="0" name="xodimlar_soni"
                                value="{{ $startupExpert->xodimlar_soni }}" class="input w-full border mt-2" required>
                        </div>

                        <div class="w-full col-span-6 ">
                            <label class="flex flex-col sm:flex-row"> <span
                                    class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Amalda nechta xodim faoliyat
                                yurityapti</label>
                            <input type="number" min="0" name="amalda_xodim_soni"
                                class="input w-full border mt-2" value="{{ $startupExpert->amalda_xodim_soni }}"
                                required>
                        </div>

                        <div class="w-full col-span-6 field-group">
                            <label class="flex flex-col sm:flex-row">
                                <span class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>
                                Daromadga erishish uchun Xizmat ko‘rsatish yoki Maxsulot sotish uchun tuzilgan shartnoma
                                kelishuv mavjudligi
                            </label>

                            <select name="shartnoma_mavjudligi" class="input border w-full mt-2 show-comment-select"
                                required>
                                <option value=""></option>
                                <option value="1" {{ $startupExpert->shartnoma_mavjudligi == 1 ? 'selected' : '' }}>
                                    Ha</option>
                                <option value="0" {{ $startupExpert->shartnoma_mavjudligi == 0 ? 'selected' : '' }}>
                                    Yo'q</option>
                            </select>

                            <textarea name="shartnoma_mavjudligi_izox" class="input w-full border mt-2 hidden comment-area" placeholder="Izoh"
                                cols="2" rows="2">{{ $startupExpert->shartnoma_mavjudligi_izox }}</textarea>

                            @error('shartnoma_mavjudligi')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="w-full col-span-6 ">
                            <label class="flex flex-col sm:flex-row"> <span
                                    class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Ekspert F.I.Sh</label>
                            <input type="text" name="ekspert_fish" value="{{ $startupExpert->ekspert_fish }}"
                                class="input w-full border mt-2" required>
                        </div>

                        <div class="w-full col-span-6 ">
                            <label class="flex flex-col sm:flex-row"> <span
                                    class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Tashkilotning mas'ul
                                rahbari F.I.Sh</label>
                            <input type="text" name="t_masul" class="input w-full border mt-2"
                                value="{{ $startupExpert->t_masul }}" required>
                        </div>

                        <div class="w-full col-span-6">
                            <label class="flex flex-col sm:flex-row"> <span
                                    class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Status
                            </label>
                            <select name="status" class="input border w-full mt-2" required="">

                                <option value="">Status tanlang</option>

                                <option value="Qo‘shimcha o‘rganish talab etiladi"
                                    {{ $startupExpert->status == 'Qo‘shimcha o‘rganish talab etiladi' ? 'selected' : '' }}>
                                    Qo‘shimcha o‘rganish talab etiladi
                                </option>

                                <option value="Ijobiy" {{ $startupExpert->status == 'Ijobiy' ? 'selected' : '' }}>Ijobiy
                                </option>

                                <option value="Salbiy" {{ $startupExpert->status == 'Salbiy' ? 'selected' : '' }}>Salbiy
                                </option>


                            </select><br>

                            @error('muddat')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="w-full col-span-6 ">
                            <label class="flex flex-col sm:flex-row"> <span
                                    class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Izoh</label>
                            <textarea name="comment" id="" class="input w-full border mt-2" cols="5" rows="5" required>{{ $startupExpert->comment }}</textarea>
                        </div>
                    </div>

                </form>
                <div class="px-5 pb-5 text-center mt-4">
                    <a href="#" class="button delete-cancel w-32 border text-gray-700 mr-1">
                        Bekor qilish
                    </a>
                    <button type="submit" form="science-paper-create-form"
                        class="update-confirm button w-24 bg-theme-1 text-white">
                        Qo'shish
                    </button>
                </div>
            </div>
        </div>
        {{-- @endrole --}}


    </div>


    <script>
        function toggleComment(select) {
            let textarea = select.closest('.field-group').querySelector('.comment-area');

            if (select.value === "0") {
                textarea.classList.remove('hidden');
                textarea.setAttribute('required', true);
            } else {
                textarea.classList.add('hidden');
                textarea.removeAttribute('required');
                textarea.value = ""; // ←——— SIZ SO‘RAGAN TOZALASH
            }
        }

        // Sahifa yuklanganda mavjud qiymatlarni tekshirish
        document.querySelectorAll('.show-comment-select').forEach(select => {
            toggleComment(select);
            select.addEventListener('change', function() {
                toggleComment(this);
            });
        });
    </script>
@endsection
