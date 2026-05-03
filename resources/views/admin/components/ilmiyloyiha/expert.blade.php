<div class="tab-content__pane" id="add-expert">

    <div class="p-5">
        @if ($tekshirivchilar != null)
            @role(['Ilmiy loyihalar boyicha masul', 'Ekspert', 'super-admin', 'Ishchi guruh azosi'])
                <div style="display: flex;justify-content:center; border-bottom: 1px solid #e2e8f0; padding-bottom: 20px;">
                    <div style="text-align: center;display: flex;">
                        @role(['Ekspert', 'super-admin'])
                            @if ($tekshirivchilar->holati == 'yuborildi')
                                <a href="{{ url('generate-pdf/' . $ilmiyloyiha->id) }}"
                                    class="button delete-cancel  border text-gray-700 mr-1" style="margin-right:20px;">
                                    Eksport
                                </a>
                                <form action="{{ route('tekshirivchilar.update', $tekshirivchilar->id) }}" method="POST"
                                    onsubmit="return confirm('Haqiqatan ham rad etasizmi?');">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="holati" value="0">
                                    <button type="submit" class="button w-24 bg-theme-6 text-white">Rad
                                        etish</button>
                                </form>
                            @endif
                        @endrole
                        @role(['Ishchi guruh azosi', 'super-admin'])
                            @if ($tekshirivchilar->holati == 'Rad etildi')
                                <a href="javascript:;" data-target="#doktarantura-paper-create-modal" data-toggle="modal"
                                    class="button w-24 ml-3 bg-theme-1 text-white" style="margin-right:20px;">
                                    Tahrirlash
                                </a>

                                <form action="{{ route('tekshirivchilar.destroy', $tekshirivchilar->id) }}" method="POST"
                                    onsubmit="return confirm('Haqiqatan ham o‘chirmoqchimisiz?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="button w-24 bg-theme-6 text-white">O'chirish</button>
                                </form>
                            @endif
                        @endrole
                    </div>
                </div>
            @endrole
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th class="border" style="width: 40px;">T/r</th>
                        <th colspan="2" class="border" style="text-align: center;">EKSPERT XULOSASI
                        </th>
                    </tr>
                    <tr>
                        <td class="border">1.</td>
                        <td class="border">Ilmiy-tadqiqot ishlarining shartnoma va uning kalendar rejasiga
                            asosan bajarilish holati</td>
                        <td class="border">{{ $tekshirivchilar->kalendar }}</td>
                    </tr>
                    <tr>
                        <td class="border">2.</td>
                        <td class="border">Ijrochi tashkilot tomonidan loyihaning amalga oshirilishi uchun
                            zarur
                            shart-sharoitlar yaratib berilganligi</td>
                        <td class="border">{{ $tekshirivchilar->shart_sharoit_yaratib }}</td>
                    </tr>
                    <tr>
                        <td class="border">3.</td>
                        <td class="border">Loyiha doirasida qo‘lga kiritilgan yakuniy natijalar va ularni
                            tijoratlashtirish imkoniyatlari</td>
                        <td class="border">{{ $tekshirivchilar->yakuniy_natijalar }}</td>
                    </tr>
                    <tr>
                        <td class="border">4.</td>
                        <td class="border">Loyiha ijrochilarining o‘zgarishi holati</td>
                        <td class="border">{{ $tekshirivchilar->loyiha_ijrochilari }}</td>
                    </tr>
                    <tr>
                        <td class="border">5.</td>
                        <td class="border">Monitoring xulosasi</td>
                        <td class="border">{{ $tekshirivchilar->status }}</td>
                    </tr>
                    <tr>
                        <td class="border">6.</td>
                        <td class="border">Izoh</td>
                        <td class="border">{{ $tekshirivchilar->comment }}</td>
                    </tr>
                    <tr>
                        <td class="border">7.</td>
                        <td class="border">Ishchi guruh rahbari F.I.Sh</td>
                        <td class="border">{{ $tekshirivchilar->fish }}</td>
                    </tr>
                    <tr>
                        <td class="border border-b-2 ">8.</td>
                        <td class="border border-b-2 ">
                            Ishchi guruh azosi F.I.Sh
                        </td>
                        <td class="border border-b-2 ">
                            {{ $tekshirivchilar->user?->name }}
                        </td>
                    </tr>
                    <tr>
                        <td class="border">9.</td>
                        <td class="border">Ekspert F.I.Sh</td>
                        <td class="border">{{ $tekshirivchilar->ekspert_fish }}</td>
                    </tr>
                    <tr>
                        <td class="border">9.</td>
                        <td class="border">Tashkilotning mas'ul rahbari F.I.Sh</td>
                        <td class="border">{{ $tekshirivchilar->t_masul }}</td>
                    </tr>
                    <tr>
                        <td class="border">10.</td>
                        <td class="border">Monitoring o‘tkazilgan sana</td>
                        <td class="border">{{ $tekshirivchilar->updated_at }}</td>
                    </tr>
                    <tr>
                        <td class="border">11.</td>
                        <td class="border">Fayl</td>
                        <td class="border">
                            @if ($tekshirivchilar->file)
                                <a href="{{ asset('storage/' . $tekshirivchilar->file) }}"
                                    class="button  bg-theme-1 text-white" target="_blank">Faylni
                                    ko'rish</a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
        @else
            @role(['Ishchi guruh azosi', 'super-admin'])
                <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2 monitoring-form">
                    <div class="w-full mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                        <form id="science-paper-edit-form" method="POST" action="{{ route('tekshirivchilar.store') }}"
                            class="validate-form" enctype="multipart/form-data" novalidate="novalidate">
                            @csrf
                            <div class="grid grid-cols-12 gap-2">
                                <input type="hidden" name="ilmiyloyiha_id" value="{{ $ilmiyloyiha->id }}">

                                <div class="w-full col-span-6">
                                    <label class="flex flex-col sm:flex-row"> <span
                                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>
                                        Ilmiy-tadqiqot
                                        ishlarining shartnoma va uning kalendar rejasiga asosan bajarilish
                                        holati
                                    </label>
                                    <select name="kalendar" class="input border w-full mt-2" required="">

                                        <option value=""></option>

                                        <option value="Bajarilgan ">Bajarilgan </option>

                                        <option value="Bajarilmagan">Bajarilmagan</option>


                                    </select><br>

                                    @error('muddat')
                                        <div class="error">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="w-full col-span-6">
                                    <label class="flex flex-col sm:flex-row"> <span
                                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Ijrochi
                                        tashkilot tomonidan loyihaning amalga oshirilishi uchun zarur
                                        shart-sharoitlar yaratib berilganligi
                                    </label>
                                    <select name="shart_sharoit_yaratib" class="input border w-full mt-2" required="">

                                        <option value=""></option>

                                        <option value="Yaratilgan">Yaratilgan</option>

                                        <option value="Yaratilmagan">Yaratilmagan</option>


                                    </select><br>

                                    @error('muddat')
                                        <div class="error">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="w-full col-span-6">
                                    <label class="flex flex-col sm:flex-row"> <span
                                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Loyiha
                                        doirasida
                                        qo‘lga kiritilgan yakuniy natijalar va ularni tijoratlashtirish
                                        imkoniyatlari
                                    </label>
                                    <select name="yakuniy_natijalar" class="input border w-full mt-2" required="">

                                        <option value=""></option>

                                        <option value="Imkoniyat mavjud">Imkoniyat mavjud</option>

                                        <option value="Imkoniyat mavjud emas">Imkoniyat mavjud emas</option>


                                    </select><br>

                                    @error('muddat')
                                        <div class="error">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="w-full col-span-6">
                                    <label class="flex flex-col sm:flex-row"> <span
                                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Loyiha
                                        ijrochilarining o‘zgarishi holati
                                    </label>
                                    <select name="loyiha_ijrochilari" class="input border w-full mt-2" required="">

                                        <option value=""></option>

                                        <option value="Mavjud emas">Mavjud emas</option>

                                        <option value="O‘zgarish mavjud">O‘zgarish mavjud</option>


                                    </select><br>

                                    @error('muddat')
                                        <div class="error">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="w-full col-span-6 ">
                                    <label class="flex flex-col sm:flex-row"> <span
                                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Ekspert
                                        F.I.Sh</label>
                                    <input type="text" name="ekspert_fish" class="input w-full border mt-2" required>
                                </div>

                                <div class="w-full col-span-6 ">
                                    <label class="flex flex-col sm:flex-row"> <span
                                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Tashkilotning
                                        mas'ul rahbarining F.I.Sh </label>
                                    <input type="text" name="t_masul" class="input w-full border mt-2" required>
                                </div>

                                <div class="w-full col-span-6">
                                    <label class="flex flex-col sm:flex-row"> <span
                                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Status
                                    </label>
                                    <select name="status" class="input border w-full mt-2" required="">

                                        <option value=""></option>

                                        {{-- <option value="Qo‘shimcha o‘rganish talab etiladi">Qo‘shimcha o‘rganish
                                            talab etiladi</option> --}}

                                        <option value="Qoniqarli">Qoniqarli</option>

                                        <option value="Qoniqarsiz">Qoniqarsiz</option>


                                    </select><br>

                                    @error('muddat')
                                        <div class="error">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="w-full col-span-6 ">
                                    <label class="flex flex-col sm:flex-row"> <span
                                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>
                                        Izoh</label>
                                    <textarea name="comment" id="" class="input w-full border mt-2" cols="5" required rows="5"></textarea>
                                </div>
                            </div>

                        </form>
                        <div class="px-5 pb-5 text-center mt-4">
                            <a href="{{ route('ilmiyloyiha.index') }}"
                                class="button delete-cancel w-32 border text-gray-700 mr-1">
                                Bekor qilish
                            </a>
                            <button type="submit" form="science-paper-edit-form"
                                class="update-confirm button w-24 bg-theme-1 text-white">
                                Tasdiqlash
                            </button>
                        </div>
                    </div>
                </div>
            @endrole
        @endif

    </div>

</div>
