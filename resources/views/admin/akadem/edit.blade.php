@extends('layouts.admin')

@section('content')
    <div class="content">
        <div class="flex justify-between align-center mt-6 mb-6">

            <h2 class="intro-y text-lg font-medium">{{ $akadem->name }}</h2>
            @role('super-admin')
                <a href="{{ route('akadem.index') }}" class="button w-24 bg-theme-1 text-white">
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
                    <tr>
                        <th class=" border" style="width: 100%; font-size:16px;text-align:center;" colspan="2">Ma’lumot
                        </th>
                    </tr>
                    <tr class="bg-gray-200">
                        <th class=" border" style="width:50%;">Loyiha nomi</th>
                        <th class=" border" style="width:50%;">Loyiha rahbari</th>
                    </tr>
                    <tr>
                        <td class="border">{{ $akadem->name }}</td>
                        <td class="border">{{ $akadem->loyiha_rahbari }}</td>
                    </tr>

                    <tr class="bg-gray-200">
                        <th class=" border" style="width:50%;">Ijrochi tashkilot</th>
                        <th class=" border" style="width:50%;">Summasi (ming soʻmda)</th>
                    </tr>
                    <tr>
                        <td class="border">{{ $akadem->ijrochi_tashkilot }}</td>
                        <td class="border">{{ number_format($akadem->summa, 0, ',', ' ') }}</td>
                    </tr>

                    <tr class="bg-gray-200">
                        <th class=" border">Tashabbuskor mablagʻi (ming soʻmda)</th>
                        <th class=" border">Loyiha amalga xudud</th>
                    </tr>

                    <tr>
                        <td class="border">{{ number_format($akadem->tash_summasi, 0, ',', ' ') }}</td>
                        <td class="border">{{ $akadem->region->oz ?? '' }}</td>
                    </tr>

                    <tr class="bg-gray-200">
                        <th class=" border">Loyiha turi (akademlashtirish/akademlashtirishgacha tayorlash)</th>
                        <th class=" border">Yaratilgan ish oʻrni</th>
                    </tr>

                    <tr>
                        <td class="border">{{ $akadem->turi }}</td>
                        <td class="border">{{ $akadem->yar_ish_urni }}</td>
                    </tr>

                    <tr class="bg-gray-200">
                        <th class=" border">Tegishli Soha</th>
                        <th class=" border">Qoʻllanish sohasi</th>
                    </tr>

                    <tr>
                        <td class="border">{{ $akadem->t_soha }}</td>
                        <td class="border">{{ $akadem->q_soha }}</td>
                    </tr>

                    <tr class="bg-gray-200">
                        <th class=" border">Moliyalashtirilish asosi</th>
                        <th class=" border"></th>
                    </tr>

                    <tr>
                        <td class="border">{{ $akadem->m_asosi }}</td>
                        <td class="border"></td>
                    </tr>


                </tbody>
            </table>
        </div>

        <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2"
            style="background: white; padding: 20px 20px; border-radius: 4px">
            <div class="w-full mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                <form id="science-paper-create-form" method="POST" action="{{ route('akademexpert.update', ['akademexpert' => $akademExpert->id]) }}"
                    class="validate-form" enctype="multipart/form-data" novalidate="novalidate">
                    @csrf
                    @method('PUT')
                    <div class="grid grid-cols-12 gap-2">

                        <div class="field-group w-full col-span-6">
                            <label class="flex flex-col sm:flex-row"> <span
                                    class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Gʻolib yosh olim faoliyat
                                yuritayotgan tashkilotlarning ilm-fan
                                va innovatsiyaga masʼul boʻlgan rahbar oʻrinbosari tomonidan kalendar
                                ish rejasining bajarilishini monitoring qilib borilganligi
                            </label>
                            <select name="kalendar_reja_monitoring" class="input border w-full mt-2 show-comment-select"
                                required="">

                                <option value=""></option>

                                <option value="bajarilgan" {{ $akademExpert->kalendar_reja_monitoring == 'bajarilgan' ? 'selected' : '' }}>Bajarilgan</option>

                                <option value="bajarilmagan" {{ $akademExpert->kalendar_reja_monitoring == 'bajarilmagan' ? 'selected' : '' }}>Bajarilmagan</option>

                                <option value="davom_etmoqda" {{ $akademExpert->kalendar_reja_monitoring == 'davom_etmoqda' ? 'selected' : '' }}>Loyiha davom etmoqda</option>
                            </select><br>

                            <textarea name="kalendar_reja_monitoring_izox" id="" class="input w-full border mt-2" placeholder="Izoh"
                                cols="2" rows="2" required>{{ $akademExpert->kalendar_reja_monitoring_izox }}</textarea>

                            @error('kalendar_reja_monitoring')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="field-group w-full col-span-6">
                            <label class="flex flex-col sm:flex-row"> <span
                                    class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Loyiha bajarilishi
                                yakunlanganidan soʻng qabul qiluvchi tashkilot va gʻolib yosh olim oʻrtasida loyihani
                                amalga oshirish xarajatlari koʻrsatilgan holda bajarilgan ishlar boʻyicha dalolatnoma
                                tuzilganligi
                            </label>
                            <select name="dalolatnoma_tuzilgan" class="input border w-full mt-2 show-comment-select"
                                required="">

                                <option value=""></option>

                                <option value="bajarilgan" {{ $akademExpert->dalolatnoma_tuzilgan == 'bajarilgan' ? 'selected' : '' }}>Bajarilgan</option>

                                <option value="bajarilmagan" {{ $akademExpert->dalolatnoma_tuzilgan == 'bajarilmagan' ? 'selected' : '' }}>Bajarilmagan</option>

                                <option value="davom_etmoqda" {{ $akademExpert->dalolatnoma_tuzilgan == 'davom_etmoqda' ? 'selected' : '' }}>Loyiha davom etmoqda</option>
                            </select><br>

                            <textarea name="dalolatnoma_tuzilgan_izox" id="" class="input w-full border mt-2" placeholder="Izoh"
                                cols="2" rows="2" required>{{ $akademExpert->dalolatnoma_tuzilgan_izox }}</textarea>
                            @error('dalolatnoma_tuzilgan')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="field-group w-full col-span-6">
                            <label class="flex flex-col sm:flex-row"> <span
                                    class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> “Akademik harakatchanlik”
                                dasturi doirasida olib borilgan loyiha natijalari hisoboti faoliyat yuritayotgan
                                muassasa
                                rahbari tomonidan tasdiqlangan holda ilmiy, ilmiy-texnik kengashda muhokama qilingani
                            </label>
                            <select name="hisobot_muhokama_qilingan" class="input border w-full mt-2 show-comment-select"
                                required="">

                                <option value=""></option>

                                <option value="bajarilgan" {{ $akademExpert->hisobot_muhokama_qilingan == 'bajarilgan' ? 'selected' : '' }}>Bajarilgan</option>

                                <option value="bajarilmagan" {{ $akademExpert->hisobot_muhokama_qilingan == 'bajarilmagan' ? 'selected' : '' }}>Bajarilmagan</option>

                                <option value="davom_etmoqda" {{ $akademExpert->hisobot_muhokama_qilingan == 'davom_etmoqda' ? 'selected' : '' }}>Loyiha davom etmoqda</option>
                            </select><br>

                            <textarea name="hisobot_muhokama_qilingan_izox" id="" class="input w-full border mt-2" placeholder="Izoh"
                                cols="2" rows="2" required>{{ $akademExpert->hisobot_muhokama_qilingan_izox }}</textarea>
                            @error('hisobot_muhokama_qilingan')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="field-group w-full col-span-6">
                            <label class="flex flex-col sm:flex-row"> <span
                                    class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Gʻolib yosh olim yigʻilish
                                bayonnoma koʻchirmasi, ajratilgan mablagʻlarning sarflanganligi boʻyicha hisobotni
                                Agentlikka taqdim etganligi
                            </label>
                            <select name="hisobot_agentlikka_taqdim" class="input border w-full mt-2 show-comment-select"
                                required="">

                                <option value=""></option>

                                <option value="bajarilgan" {{ $akademExpert->hisobot_agentlikka_taqdim == 'bajarilgan' ? 'selected' : '' }}>Bajarilgan</option>

                                <option value="bajarilmagan" {{ $akademExpert->hisobot_agentlikka_taqdim == 'bajarilmagan' ? 'selected' : '' }}>Bajarilmagan</option>

                                <option value="davom_etmoqda" {{ $akademExpert->hisobot_agentlikka_taqdim == 'davom_etmoqda' ? 'selected' : '' }}>Loyiha davom etmoqda</option>
                            </select><br>

                            <textarea name="hisobot_agentlikka_taqdim_izox" id="" class="input w-full border mt-2" placeholder="Izoh"
                                cols="2" rows="2" required>{{ $akademExpert->hisobot_agentlikka_taqdim_izox }}</textarea>
                            @error('hisobot_agentlikka_taqdim')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="w-full col-span-6 ">
                            <label class="flex flex-col sm:flex-row"> <span
                                    class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Ekspert F.I.Sh</label>
                            <input type="text" name="ekspert_fish" class="input w-full border mt-2" value="{{ $akademExpert->ekspert_fish }}" required>
                        </div>

                        <div class="w-full col-span-6 ">
                            <label class="flex flex-col sm:flex-row"> <span
                                    class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Tashkilotning mas'ul
                                rahbari F.I.Sh</label>
                            <input type="text" name="t_masul" class="input w-full border mt-2" value="{{ $akademExpert->t_masul }}" required>
                        </div>

                        <div class="w-full col-span-6">
                            <label class="flex flex-col sm:flex-row"> <span
                                    class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Status
                            </label>
                            <select name="status" class="input border w-full mt-2 show-comment-select" required="">

                                <option value="">Status tanlang</option>

                                <option value="Qo‘shimcha o‘rganish talab etiladi" {{ $akademExpert->status == "Qo‘shimcha o‘rganish talab etiladi" ? 'selected' : '' }}>Qo‘shimcha o‘rganish talab etiladi
                                </option>

                                <option value="Ijobiy" {{ $akademExpert->status == "Ijobiy" ? 'selected' : '' }}>Ijobiy</option>

                                <option value="Qoniqarli" {{ $akademExpert->status == "Qoniqarli" ? 'selected' : '' }} >Qoniqarli</option>

                                <option value="Qoniqarsiz" {{ $akademExpert->status == "Qoniqarsiz" ? 'selected' : '' }}>Qoniqarsiz</option>


                            </select><br>

                            @error('muddat')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="w-full col-span-6 ">
                            <label class="flex flex-col sm:flex-row"> <span
                                    class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Xulosa</label>
                            <textarea name="comment" id="" class="input w-full border mt-2" placeholder="Xulosa" cols="5"
                                rows="5" required>{{ $akademExpert->comment }}</textarea>
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


    </div>
@endsection
