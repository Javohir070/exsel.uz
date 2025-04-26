@extends('layouts.admin')

@section('content')

    <div class="content">
        <div class="flex justify-between align-center mt-6">

            <h2 class="intro-y text-lg font-medium">{{ $asbobuskuna->name }}</h2>
            @role('super-admin')
            <a href="{{ route("asbobuskunalar.index") }}" class="button w-24 bg-theme-1 text-white">
                Orqaga
            </a>
            @endrole
            @role('admin')
            <a href="{{ route("asbobuskuna.index") }}" class="button w-24 bg-theme-1 text-white">
                Orqaga
            </a>
            @endrole
        </div>
        @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif

        <div class="overflow-x-auto" style="background-color: white;margin-top:20px;border-radius:8px;padding:10px 20px;">
            <table class="table">
                <tbody>
                    <div class="pt-4"
                        style="display: flex;justify-content: end; border-bottom: 1px solid #e2e8f0; padding-bottom: 20px;">
                        {{-- <div style="font-size:18px;font-weight: 400;"> {{$asbobuskuna->name}} xaqida ma’lumot</div> --}}
                        @can("tashkilotrahbari delete edit")
                            <div style="text-align: center;">
                                <a href="{{ route('asbobuskuna.edit', ['asbobuskuna' => $asbobuskuna->id])}}"
                                    class="button w-24 bg-theme-1 text-white" style="margin-right:20px;">
                                    Tahrirlash
                                </a>
                                {{-- <a href="" class="button w-24 bg-theme-6 text-white">
                                    O'chirish
                                </a> --}}
                            </div>
                        @endcan
                    </div>
                    <tr>
                        <!-- <th class="whitespace-no-wrap border" style="width: 40px";>#</th>
                                    <th class="whitespace-no-wrap border" style="width:50%;">Ma’lumot nomlanishi</th> -->
                        <th class=" border" style="width: 100%; font-size:16px;text-align:center;" colspan="2">Asbob-uskuna haqida ma’lumot</th>
                    </tr>
                    <tr class="bg-gray-200">
                        <th class=" border" style="width:50%;">Nomi</th>
                        <th class=" border" style="width:50%;">Model</th>
                    </tr>
                    <tr>
                        <td class="border">{{ $asbobuskuna->name }}</td>
                        <td class="border">{{ $asbobuskuna->model }}</td>
                    </tr>
                    <tr class="bg-gray-200">
                        <th class=" border">Turi</th>
                        <th class=" border">Ishlab chiqilgan davlat</th>
                    </tr>
                    <tr>
                        <td class="border">{{ $asbobuskuna->turi }} </td>
                        <td class="border">{{ $asbobuskuna->ishlab_davlat }} </td>
                    </tr>

                    <tr class="bg-gray-200">
                        <th class=" border">Ishlab chiqilgan yili</th>
                        <th class=" border">Harid qilingan summasi
                            (buxgalteriya balans summasi)</th>
                    </tr>
                    <tr>
                        <td class="border">{{ $asbobuskuna->ishlabchiq_yil  }}</td>
                        <td class="border">{{ $asbobuskuna->harid_summa  }} so'm</td>
                    </tr>

                    <tr class="bg-gray-200">
                        <th class="border">Buxgalteriya bo'yicha qoldiq summasi</th>
                        <th class="border">Moliyalashtirish manbasi</th>
                    </tr>
                    <tr>
                        <td class="border">{{ $asbobuskuna->buxgalteriya_summa  }} so'm</td>
                        <td class="border">{{ $asbobuskuna->moliya_manbasi  }}</td>
                    </tr>

                    <tr class="bg-gray-200">
                        <th class="border">Loyiha shifri</th>
                        <th class="border">Shartnoma raqami
                            (uskuna bo'yicha)</th>
                    </tr>
                    <tr>
                        <td class="border">{{ $asbobuskuna->loy_shifri  }}</td>
                        <td class="border">{{ $asbobuskuna->sh_raqami  }}</td>
                    </tr>

                    <tr class="bg-gray-200">
                        <th class="border">Shartnoma sanasi</th>
                        <th class="border">Harid qilingan yili</th>
                    </tr>
                    <tr>
                        <td class="border">{{ $asbobuskuna->sh_sanasi  }}</td>
                        <td class="border">{{ $asbobuskuna->harid_qilingan_yil  }}</td>
                    </tr>

                    <tr class="bg-gray-200">
                        <th class="border">Holati</th>
                        <th class="border">O‘rnatilgan yili</th>
                    </tr>
                    <tr>
                        <td class="border">{{ $asbobuskuna->holati  }}</td>
                        <td class="border">{{ $asbobuskuna->urnatilgan_yili  }}</td>
                    </tr>

                    <tr class="bg-gray-200">
                        <th class="border">Foydalanishga mas'ul tarkibiy bo‘linma (laboratoriya, kafedra, sho‘ba) nomi</th>
                        <th class="border">F.I.Sh</th>
                    </tr>
                    <tr>
                        <td class="border"></td>
                        <td class="border">{{ $asbobuskuna->fish  }}</td>
                    </tr>

                    <tr class="bg-gray-200">
                        <th class="border">Asos</th>
                        <th class="border"></th>
                    </tr>
                    <tr>
                        <td class="border">{{ $asbobuskuna->asos  }}</td>
                        <td class="border"></td>
                    </tr>

                    <tr class="bg-gray-200">
                        <th class="border">Javobgar etib belgilanganligi to‘g‘risida buyruq raqami</th>
                        <th class="border">Javobgar etib belgilanganligi to‘g‘risida buyruq sanasi</th>
                    </tr>
                    <tr>
                        <td class="border">{{ $asbobuskuna->jav_buy_raqami  }}</td>
                        <td class="border">{{ $asbobuskuna->jav_sanasi  }}</td>
                    </tr>


                    <tr class="bg-gray-200">
                        <th class="border">Bajarilayotgan ilmiy-tadqiqot ishlari</th>
                        <th class="border">Ilmiy-tadqiqot dasturlaridagi ish hajmi</th>
                    </tr>
                    <tr>
                        <td class="border">{{ $asbobuskuna->ilmiy_tadqiqot_ishilari  }}</td>
                        <td class="border">{{ $asbobuskuna->ilmiy_tadqiqot_hajmi  }}</td>
                    </tr>

                    <tr class="bg-gray-200">
                        <th class="border">Laboratoriya uskunalari uchun zarur reagent va reaktivlar zaxirasi</th>
                        <th class="border">Foydalanish uchun arizalarning ro‘yxatga olinishi va foydalanish jadvalining yuritilishi</th>
                    </tr>
                    <tr>
                        <td class="border">{{ $asbobuskuna->lab_zaxirasi  }}</td>
                        <td class="border">{{ $asbobuskuna->foy_uchun_ariz  }}</td>
                    </tr>

                    <tr class="bg-gray-200">
                        <th class="border">Ilmiy tadqiqot va oliy ta’lim muassasalari laboratoriyalarining qo‘shimcha asbob-uskunalarga ehtiyoji</th>
                        <th class="border">Zarur sarflash materiallari va butlovchi qismlar bo‘yicha ehtiyoji</th>
                    </tr>
                    <tr>
                        <td class="border">{{ $asbobuskuna->asbob_usk_ehtiyoji  }}</td>
                        <td class="border">{{ $asbobuskuna->zarur_ehtiyoji  }}</td>
                    </tr>



                </tbody>
            </table>
        </div>

        @role(['Asbob-uskunalar boyicha masul', 'Ekspert', 'Ishchi guruh azosi', 'Rahbar'])
        @forelse ($asbobuskunaexpert as $tekshirivchilar)
        <div class="overflow-x-auto" style="background-color: white;margin-top:30px;border-radius:8px;padding:30px 20px;">
            <table class="table">
                <div
                        style="display: flex;justify-content:center; border-bottom: 1px solid #e2e8f0; padding-bottom: 20px;">
                        <div style="text-align: center;display: flex;">
                        @role(['Ekspert'])
                            <a href="{{ url('generate-pdfasbobuskuna/' . $asbobuskuna->id) }}" class="button delete-cancel  border text-gray-700 mr-1" style="margin-right:20px;">
                                Eksport
                           </a>
                        @endrole
                        @role(['Ishchi guruh azosi'])
                            <a href="{{ route('asbobuskunaexpert.edit', ['asbobuskunaexpert' => $tekshirivchilar->id]) }}"
                                class="button w-24 bg-theme-1 text-white" style="margin-right:20px;">
                                Tahrirlash
                            </a>

                            <form action="{{ route('asbobuskunaexpert.destroy', $tekshirivchilar->id) }}" method="POST" onsubmit="return confirm('Haqiqatan ham o‘chirmoqchimisiz?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="button w-24 bg-theme-6 text-white">O'chirish</button>
                            </form>
                        @endrole
                        </div>

                    </div>
                <thead>
                    <tr class="bg-gray-200">
                        <th class="border border-b-2 " style="width: 40px;">№</th>
                        <th class="border border-b-2 " style="width: 60%;">Mezon va talablar</th>
                        <th class="border border-b-2 ">Xulosa</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="border border-b-2 ">1.</td>
                        <td class="border border-b-2 ">
                            Laboratoriya uskunalarini o'rnatilgan ilmiy bo'linma faoliyatiga mosligi
                        </td>
                        <td class="border border-b-2 ">{{  $tekshirivchilar->lab_uskunalarini_mosligi ?? null }}</td>
                    </tr>
                    <tr class="bg-gray-200">
                        <td class="border border-b-2 ">2.</td>
                        <td class="border border-b-2 ">
                            Bajarilavotgan ilmiy-tadqiqot ishlari uchun zarurligi
                        </td>
                        <td class="border border-b-2 ">{{  $tekshirivchilar->ilmiy_tadqiqot_ishilari ?? null }}</td>
                    </tr>
                    <tr>
                        <td class="border border-b-2 ">3.</td>
                        <td class="border border-b-2 ">
                            Ilmiy-tadqiqot dasturlaridagi ish hajmi bilan bog'liqligi
                        </td>
                        <td class="border border-b-2 ">{{  $tekshirivchilar->ilmiy_tadqiqot_hajmi ?? null }}</td>
                    </tr>
                    <tr class="bg-gray-200">
                        <td class="border border-b-2 ">4.</td>
                        <td class="border border-b-2 ">
                            Laboratoriya uskunalari uchun zarur reagent va reaktivlar zaxirasining mavjudligi
                        </td>
                        <td class="border border-b-2 ">{{  $tekshirivchilar->lab_zaxirasi ?? null }}</td>
                    </tr>
                    <tr>
                        <td class="border border-b-2 ">5.</td>
                        <td class="border border-b-2 ">
                            Foydalanish uchun arizalarning ro'yxatga olinishi va foydalanish jadvalining yuritilishi
                            holatiga baho berish
                        </td>
                        <td class="border border-b-2 ">{{  $tekshirivchilar->foy_uchun_ariz ?? null }}</td>
                    </tr>
                    <tr class="bg-gray-200">
                        <td class="border border-b-2 ">6.</td>
                        <td class="border border-b-2 ">
                            Ilmiy tadqiqot va oliy ta'lim muassasalari laboratoriyalarining qo'shimcha asbob-uskunalar
                            bo'yicha ehtiyoji
                        </td>
                        <td class="border border-b-2 ">{{  $tekshirivchilar->asbob_usk_ehtiyoji ?? null }}</td>
                    </tr>
                    <tr>
                        <td class="border border-b-2 ">7.</td>
                        <td class="border border-b-2 ">
                            Zarur sarflash materiallari va butlovchi qismlar bo'yicha ehtiyojar mavjudligi
                        </td>
                        <td class="border border-b-2 ">{{  $tekshirivchilar->zarur_ehtiyoji ?? null }}</td>
                    </tr>
                    <tr class="bg-gray-200">
                        <td class="border border-b-2 ">8.</td>
                        <td class="border border-b-2 ">
                            Laboratoriya uskunalarining ishga yaroqliligi

                        </td>
                        <td class="border border-b-2 ">{{  $tekshirivchilar->lab_ishga_yaroqliligi ?? null }}</td>
                    </tr>


                    <tr>
                        <td class="border border-b-2 ">9.</td>
                        <td class="border border-b-2 ">Ekspert xulosasi
                        </td>
                        <td class="border border-b-2 ">{{  $tekshirivchilar->status ?? null }}</td>
                    </tr>
                    <tr class="bg-gray-200">
                        <td class="border border-b-2 ">10.</td>
                        <td class="border border-b-2 ">
                            Izoh
                        </td>
                        <td class="border border-b-2 ">{{  $tekshirivchilar->comment ?? null }}</td>
                    </tr>
                    <tr >
                        <td class="border border-b-2 ">11.</td>
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
                    <tr class="bg-gray-200">
                        <td class="border border-b-2 ">12.</td>
                        <td class="border border-b-2 ">
                            Ekspert F.I.Sh
                        </td>
                        <td class="border border-b-2 ">
                            {{ $tekshirivchilar->fish }}
                        </td>
                    </tr>
                    <tr >
                        <td class="border border-b-2 ">13.</td>
                        <td class="border border-b-2 ">
                            Ishchi guruh azosi F.I.Sh
                        </td>
                        <td class="border border-b-2 ">
                            {{ $tekshirivchilar->user->name }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        @empty
        @role(['Ishchi guruh azosi'])
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2"
            style="background: white; padding: 20px 20px; border-radius: 20px">
            <div class="w-full mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                <form id="science-paper-create-form" method="POST" action="{{ route('asbobuskunaexpert.store') }}"
                    class="validate-form" enctype="multipart/form-data" novalidate="novalidate">
                    @csrf
                    <div class="grid grid-cols-12 gap-2">
                        <input type="hidden" name="asbobuskuna_id" value="{{ $asbobuskuna->id }}">

                        <div class="w-full col-span-6">
                            <label class="flex flex-col sm:flex-row"> <span
                                    class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Laboratoriya uskunalarini o'rnatilgan ilmiy bo'linma faoliyatiga mosligi
                            </label>
                            <select name="lab_uskunalarini_mosligi"  class="input border w-full mt-2" required="">

                                <option value=""></option>

                                <option value="Ijobiy">Ijobiy</option>


                                <option value="Salbiy">Salbiy</option>


                            </select><br>

                            @error('ilmiy_hisobot')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="w-full col-span-6">
                            <label class="flex flex-col sm:flex-row"> <span
                                    class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Bajarilavotgan ilmiy-tadqiqot ishlari uchun zarurligi
                            </label>
                            <select name="ilmiy_tadqiqot_ishilari"  class="input border w-full mt-2" required="">

                                <option value=""></option>

                                <option value="Ijobiy">Ijobiy</option>


                                <option value="Salbiy">Salbiy</option>

                            </select><br>

                            @error('muddat')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="w-full col-span-6">
                            <label class="flex flex-col sm:flex-row"> <span
                                    class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Ilmiy-tadqiqot dasturlaridagi ish hajmi bilan bog'liqligi
                            </label>
                            <select name="ilmiy_tadqiqot_hajmi"  class="input border w-full mt-2" required="">

                                <option value=""></option>

                                <option value="Ijobiy">Ijobiy</option>


                                <option value="Salbiy">Salbiy</option>

                            </select><br>

                            @error('muddat')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="w-full col-span-6">
                            <label class="flex flex-col sm:flex-row"> <span
                                    class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Laboratoriya uskunalari uchun zarur reagent va reaktivlar zaxirasining mavjudligi
                            </label>
                            <select name="lab_zaxirasi"  class="input border w-full mt-2" required="">

                                <option value=""></option>

                                <option value="Ijobiy">Ijobiy</option>


                                <option value="Mavjud emas">Mavjud emas</option>

                            </select><br>

                            @error('muddat')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="w-full col-span-6">
                            <label class="flex flex-col sm:flex-row"> <span
                                    class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Foydalanish uchun arizalarning ro'yxatga olinishi va foydalanish jadvalining yuritilishi
                                    holatiga baho berish
                            </label>
                            <select name="foy_uchun_ariz"  class="input border w-full mt-2" required="">

                                <option value=""></option>

                                <option value="Ijobiy">Ijobiy</option>


                                <option value="Salbiy">Salbiy</option>

                            </select><br>

                            @error('muddat')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="w-full col-span-6">
                            <label class="flex flex-col sm:flex-row"> <span
                                    class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Ilmiy tadqiqot va oliy ta'lim muassasalari laboratoriyalarining qo'shimcha asbob-uskunalar
                                    bo'yicha ehtiyoji
                            </label>
                            <select name="asbob_usk_ehtiyoji"  class="input border w-full mt-2" required="">

                                <option value=""></option>

                                <option value="Mavjud">Mavjud</option>


                                <option value="Mavjud emas">Mavjud emas</option>

                            </select><br>

                            @error('muddat')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="w-full col-span-6">
                            <label class="flex flex-col sm:flex-row"> <span
                                    class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Zarur sarflash materiallari va butlovchi qismlar bo'yicha ehtiyojar mavjudligi
                            </label>
                            <select name="zarur_ehtiyoji"  class="input border w-full mt-2" required="">

                                <option value=""></option>

                                <option value="Mavjud">Mavjud</option>


                                <option value="Mavjud emas">Mavjud emas</option>

                            </select><br>

                            @error('muddat')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="w-full col-span-6">
                            <label class="flex flex-col sm:flex-row"> <span
                                    class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Laboratoriya uskunalarining ishga yaroqliligi
                            </label>
                            <select name="lab_ishga_yaroqliligi"  class="input border w-full mt-2" required="">

                                <option value=""></option>

                                <option value="Mavjud">Mavjud</option>


                                <option value="Mavjud emas">Mavjud emas</option>

                            </select><br>

                            @error('muddat')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="w-full col-span-6">
                            <label class="flex flex-col sm:flex-row"> <span
                                    class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Status
                            </label>
                            <select name="status"  class="input border w-full mt-2" required="">

                                <option value=""></option>

                                <option value="Ijobiy">Ijobiy</option>


                                <option value="Salbiy">Salbiy</option>


                            </select><br>

                            @error('muddat')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="w-full col-span-6 ">
                            <label class="flex flex-col sm:flex-row"> <span
                                    class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Izoh</label>
                            <textarea name="comment" id="" class="input w-full border mt-2" cols="5" rows="5" required></textarea>
                        </div>
                    </div>

                </form><br>
                <div class="px-5 pb-5 text-center">
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
