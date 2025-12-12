@extends('layouts.admin')

@section('content')
    <div class="content">
        <div class="flex justify-between align-center mt-6 mb-6">

            <h2 class="intro-y text-lg font-medium">{{ $akadem->full_name }}</h2>
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
                        <th class=" border" style="width:50%;">F.I.Sh</th>
                        <th class=" border" style="width:50%;">Summa (ming soʻmda)</th>
                    </tr>

                    <tr>
                        <td class="border">{{ $akadem->full_name }}</td>
                        <td class="border">{{ number_format($akadem->total_amount, 0, ',', ' ') }}</td>
                    </tr>

                    <tr class="bg-gray-200">
                        <th class=" border" style="width:50%;">Yuboruvchi tashkilot</th>
                        <th class=" border" style="width:50%;">Yuboruvchi tashkilot manzili</th>
                    </tr>

                    <tr>
                        <td class="border">{{ $akadem->sender_organization_name }}</td>
                        <td class="border">{{ $akadem->sender_organization_region }}</td>
                    </tr>

                    <tr class="bg-gray-200">
                        <th class=" border">Qabul qiluvchi tashkilot</th>
                        <th class=" border">Qabul qiluvchi tashkilot manzili</th>
                    </tr>

                    <tr>
                        <td class="border">{{ $akadem->receiver_organization_name }}</td>
                        <td class="border">{{ $akadem->receiver_organization_region }}</td>
                    </tr>

                </tbody>
            </table>
        </div>

        @role(['Ekspert', 'akadem boyicha masul', 'Ishchi guruh azosi', 'Rahbar'])
        @forelse ($akademexpert as $tekshirivchilar)
            <div class="overflow-x-auto"
                style="background-color: white;margin-top:30px;border-radius:8px;padding:30px 20px;">
                <table class="table">
                    <div
                        style="display: flex;justify-content: center; border-bottom: 1px solid #e2e8f0; padding-bottom: 20px;">
                        <div style="text-align: end;display: flex;">
                            @role(['Ekspert'])
                            @if ($tekshirivchilar->holati == 'yuborildi')
                                <a href="{{ url('generate-pdfakadem/' . $akadem->id) }}"
                                    class="button delete-cancel  border text-gray-700 mr-1" style="margin-right:20px;">
                                    Eksport
                                </a>
                                <form action="{{ route('akademexpert.update', $tekshirivchilar->id) }}" method="POST"
                                    onsubmit="return confirm('Haqiqatan ham rad etasizmi?');">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="holati" value="1">
                                    <button type="submit" class="button w-24 bg-theme-6 text-white">Rad etish</button>
                                </form>
                            @endif
                            @endrole
                            @role(['Ishchi guruh azosi'])
                            @if ($tekshirivchilar->holati == 'Rad etildi')
                                <a href="{{ route('akademexpert.edit', ['akademexpert' => $tekshirivchilar->id]) }}"
                                    class="button w-24 bg-theme-1 text-white" style="margin-right:20px;">
                                    Tahrirlash
                                </a>
                                <form action="{{ route('akademexpert.destroy', $tekshirivchilar->id) }}" method="POST"
                                    onsubmit="return confirm('Haqiqatan ham o‘chirmoqchimisiz?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="button w-24 bg-theme-6 text-white">O'chirish</button>
                                </form>
                            @endif
                            @endrole
                        </div>

                    </div>
                    <thead>
                        <tr>
                            <th class="border border-b-2 " style="width: 40px;">№</th>
                            <th class="border border-b-2 " style="width: 60%;">Mezon va talablar</th>
                            <th class="border border-b-2 ">Xulosa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-gray-200">
                            <td class="border border-b-2 ">1</td>
                            <td class="border border-b-2 ">Gʻolib yosh olim faoliyat yuritayotgan tashkilotlarning ilm-fan
                                va innovatsiyaga masʼul boʻlgan rahbar oʻrinbosari tomonidan kalendar ish rejasining
                                bajarilishini monitoring qilib borilganligi </td>
                            <td class="border border-b-2 ">
                                {{ $tekshirivchilar->kalendar_reja_monitoring == 'bajarilgan' ? 'Bajarilgan' : ($tekshirivchilar->kalendar_reja_monitoring == 'bajarilmagan' ? 'Bajarilmagan' : 'Loyiha davom etmoqda') }}
                                <br> <b>Izoh:</b> {{ $tekshirivchilar->kalendar_reja_monitoring_izox }}
                            </td>
                        </tr>

                        <tr>
                            <td class="border border-b-2 ">2</td>
                            <td class="border border-b-2 ">Loyiha bajarilishi yakunlanganidan soʻng qabul qiluvchi tashkilot
                                va gʻolib yosh olim oʻrtasida loyihani amalga oshirish xarajatlari koʻrsatilgan holda
                                bajarilgan ishlar boʻyicha dalolatnoma tuzilganligi </td>
                            <td class="border border-b-2 ">
                                {{ $tekshirivchilar->dalolatnoma_tuzilgan == 'bajarilgan' ? 'Bajarilgan' : ($tekshirivchilar->dalolatnoma_tuzilgan == 'bajarilmagan' ? 'Bajarilmagan' : 'Loyiha davom etmoqda') }}
                                <br> <b>Izoh:</b> {{ $tekshirivchilar->dalolatnoma_tuzilgan_izox }}
                            </td>
                        </tr>

                        <tr class="bg-gray-200">
                            <td class="border border-b-2 ">3</td>
                            <td class="border border-b-2 ">“Akademik harakatchanlik” dasturi doirasida olib borilgan loyiha
                                natijalari hisoboti faoliyat yuritayotgan muassasa rahbari tomonidan tasdiqlangan holda
                                ilmiy, ilmiy-texnik kengashda muhokama qilingani
                            </td>
                            <td class="border border-b-2 ">
                                {{ $tekshirivchilar->hisobot_muhokama_qilingan == 'bajarilgan' ? 'Bajarilgan' : ($tekshirivchilar->hisobot_muhokama_qilingan == 'bajarilmagan' ? 'Bajarilmagan' : 'Loyiha davom etmoqda') }}
                                <br> <b>Izoh:</b> {{ $tekshirivchilar->hisobot_muhokama_qilingan_izox }}
                            </td>
                        </tr>

                        <tr>
                            <td class="border border-b-2 ">4</td>
                            <td class="border border-b-2 ">Gʻolib yosh olim yigʻilish bayonnoma koʻchirmasi, ajratilgan
                                mablagʻlarning sarflanganligi boʻyicha hisobotni Agentlikka taqdim etganligi </td>
                            <td class="border border-b-2 ">
                                {{ $tekshirivchilar->hisobot_agentlikka_taqdim == 'bajarilgan' ? 'Bajarilgan' : ($tekshirivchilar->hisobot_agentlikka_taqdim == 'bajarilmagan' ? 'Bajarilmagan' : 'Loyiha davom etmoqda') }}
                                <br> <b>Izoh:</b> {{ $tekshirivchilar->hisobot_agentlikka_taqdim_izox }}
                            </td>
                        </tr>

                        <tr class="bg-gray-200">
                            <td class="border border-b-2 ">5</td>
                            <td class="border border-b-2 ">Ekspert xulosasi
                            </td>
                            <td class="border border-b-2 ">{{ $tekshirivchilar->status ?? null }}</td>
                        </tr>
                        <tr>
                            <td class="border border-b-2 ">6</td>
                            <td class="border border-b-2 ">
                                Umumiy xulosa
                            </td>
                            <td class="border border-b-2 ">{{ $tekshirivchilar->comment ?? null }}</td>
                        </tr>
                        <tr class="bg-gray-200">
                            <td class="border border-b-2 ">7</td>
                            <td class="border border-b-2 ">
                                Fayl
                            </td>
                            <td class="border border-b-2 ">
                                @if ($tekshirivchilar->file)
                                    <a href="{{ asset('storage/' . $tekshirivchilar->file) }}"
                                        class="button  bg-theme-1 text-white" target="_blank">Faylni ko'rish</a>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td class="border border-b-2 ">8</td>
                            <td class="border border-b-2 ">
                                Ishchi guruh rahbari F.I.Sh
                            </td>
                            <td class="border border-b-2 ">
                                {{ $tekshirivchilar->fish }}
                            </td>
                        </tr>
                        <tr class="bg-gray-200">
                            <td class="border border-b-2 ">9</td>
                            <td class="border border-b-2 ">
                                Ishchi guruh azosi F.I.Sh
                            </td>
                            <td class="border border-b-2 ">
                                {{ $tekshirivchilar->user->name }}
                            </td>
                        </tr>
                        <tr>
                            <td class="border border-b-2 ">10</td>
                            <td class="border border-b-2 ">
                                Ekspert F.I.Sh
                            </td>
                            <td class="border border-b-2 ">
                                {{ $tekshirivchilar->ekspert_fish }}
                            </td>
                        </tr>
                        <tr class="bg-gray-200">
                            <td class="border border-b-2 ">11</td>
                            <td class="border border-b-2 ">
                                Tashkilotning mas'ul rahbari F.I.Sh
                            </td>
                            <td class="border border-b-2 ">
                                {{ $tekshirivchilar->t_masul }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        @empty
            @role(['Ishchi guruh azosi'])
            <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2"
                style="background: white; padding: 20px 20px; border-radius: 4px">
                <div class="w-full mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                    <form id="science-paper-create-form" method="POST" action="{{ route('akademexpert.store') }}"
                        class="validate-form" enctype="multipart/form-data" novalidate="novalidate">
                        @csrf
                        <div class="grid grid-cols-12 gap-2">
                            <input type="hidden" name="akadem_id" value="{{ $akadem->id }}">

                            <div class="field-group w-full col-span-6">
                                <label class="flex flex-col sm:flex-row"> <span
                                        class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Gʻolib yosh olim faoliyat
                                    yuritayotgan tashkilotlarning ilm-fan
                                    va innovatsiyaga masʼul boʻlgan rahbar oʻrinbosari tomonidan kalendar
                                    ish rejasining bajarilishini monitoring qilib borilganligi
                                </label>
                                <select name="kalendar_reja_monitoring"
                                    class="input border w-full mt-2 show-comment-select" required="">

                                    <option value=""></option>

                                    <option value="bajarilgan">Bajarilgan</option>

                                    <option value="bajarilmagan">Bajarilmagan</option>

                                    <option value="davom_etmoqda">Loyiha davom etmoqda</option>

                                </select><br>

                                <textarea name="kalendar_reja_monitoring_izox" id="" class="input w-full border mt-2" placeholder="Izoh"
                                    cols="2" rows="2" required></textarea>

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

                                    <option value="bajarilgan">Bajarilgan</option>

                                    <option value="bajarilmagan">Bajarilmagan</option>

                                    <option value="davom_etmoqda">Loyiha davom etmoqda</option>

                                </select><br>

                                <textarea name="dalolatnoma_tuzilgan_izox" id="" class="input w-full border mt-2" placeholder="Izoh"
                                    cols="2" rows="2" required></textarea>

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
                                <select name="hisobot_muhokama_qilingan"
                                    class="input border w-full mt-2 show-comment-select" required="">

                                    <option value=""></option>

                                    <option value="bajarilgan">Bajarilgan</option>

                                    <option value="bajarilmagan">Bajarilmagan</option>

                                    <option value="davom_etmoqda">Loyiha davom etmoqda</option>

                                </select><br>

                                <textarea name="hisobot_muhokama_qilingan_izox" id="" class="input w-full border mt-2" placeholder="Izoh"
                                    cols="2" rows="2" required></textarea>

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
                                <select name="hisobot_agentlikka_taqdim"
                                    class="input border w-full mt-2 show-comment-select" required="">

                                    <option value=""></option>

                                    <option value="bajarilgan">Bajarilgan</option>

                                    <option value="bajarilmagan">Bajarilmagan</option>

                                    <option value="davom_etmoqda">Loyiha davom etmoqda</option>

                                </select><br>

                                <textarea name="hisobot_agentlikka_taqdim_izox" id="" class="input w-full border mt-2" placeholder="Izoh"
                                    cols="2" rows="2" required></textarea>

                                @error('hisobot_agentlikka_taqdim')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="w-full col-span-6 ">
                                <label class="flex flex-col sm:flex-row"> <span
                                        class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Ekspert F.I.Sh</label>
                                <input type="text" name="ekspert_fish" class="input w-full border mt-2" required>
                            </div>

                            <div class="w-full col-span-6 ">
                                <label class="flex flex-col sm:flex-row"> <span
                                        class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Tashkilotning mas'ul
                                    rahbari F.I.Sh</label>
                                <input type="text" name="t_masul" class="input w-full border mt-2" required>
                            </div>

                            <div class="w-full col-span-6">
                                <label class="flex flex-col sm:flex-row"> <span
                                        class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Status
                                </label>
                                <select name="status" class="input border w-full mt-2 show-comment-select"
                                    required="">

                                    <option value="">Status tanlang</option>

                                    <option value="Qo‘shimcha o‘rganish talab etiladi">Qo‘shimcha o‘rganish talab etiladi
                                    </option>

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
                                        class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Xulosa</label>
                                <textarea name="comment" id="" class="input w-full border mt-2" placeholder="Xulosa" cols="5"
                                    rows="5" required></textarea>
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
            @endrole
        @endforelse
        @endrole

    </div>
@endsection
