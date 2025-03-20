@extends('layouts.admin')

@section('content')

    <div class="content">
        <div class="flex justify-between align-center mt-10">

            <h2 class="intro-y text-lg font-medium">{{ $stajirovka->fish }}</h2>
            @role('super-admin')
            <a href="{{ route("stajirovkalar.index") }}" class="button w-24 bg-theme-1 text-white">
                Orqaga
            </a>
            @endrole
            @role('admin')
            <a href="{{ route("stajirovka.index") }}" class="button w-24 bg-theme-1 text-white">
                Orqaga
            </a>
            @endrole
            @role('Ekspert')
            <a href="{{ url('generate-pdfsajiyor/' . $stajirovka->id) }}" class="button delete-cancel w-32 border text-gray-700 mr-1">
                pdf genertsiya
            </a>
            @endrole
        </div>
        @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif

        <div class="overflow-x-auto" style="background-color: white;margin-top:30px;border-radius:8px;padding:30px 20px;">
            <table class="table">
                <tbody>
                    <div
                        style="display: flex;justify-content: space-between; border-bottom: 1px solid #e2e8f0; padding-bottom: 20px;">
                        <div style="font-size:18px;font-weight: 400;"> {{$stajirovka->fish}} xaqida ma’lumot</div>
                        @can("tashkilotrahbari delete edit")

                            <div style="text-align: end;">
                                <a href="{{ route('stajirovka.edit', ['stajirovka' => $stajirovka->id])}}"
                                    class="button w-24 bg-theme-1 text-white" style="margin-right:20px;">
                                    Tahrirlash
                                </a>
                                <a href="" class="button w-24 bg-theme-6 text-white">
                                    O'chirish
                                </a>
                            </div>
                        @endcan
                    </div>
                    <tr>
                        <!-- <th class="whitespace-no-wrap border" style="width: 40px";>#</th>
                                        <th class="whitespace-no-wrap border" style="width:50%;">Ma’lumot nomlanishi</th> -->
                        <th class=" border" style="width: 100%; font-size:16px;text-align:center;" colspan="2">Ma’lumot</th>
                    </tr>
                    <tr class="bg-gray-200">
                        <th class=" border" style="width:50%;">Yosh olimning F.I.O.</th>
                        <th class=" border" style="width:50%;">Yosh olimning lavozimi</th>
                    </tr>
                    <tr>
                        <td class="border">{{ $stajirovka->fish }}</td>
                        <td class="border">{{ $stajirovka->lavozim }}</td>
                    </tr>

                    <tr class="bg-gray-200">
                        <th class=" border">Ilmiy hisobot taqdim etilganligi (Pdf)</th>
                        <th class=" border">Stajirovka davrida egallangan bilim va ko'nikmalarni amalga oshirilishi uchun
                            zarur shart-sharoitlar yaratilganligi. (Asoslantiruvchi hujjatlar, rasm va videolar, zip)</th>
                    </tr>
                    <tr>
                        <td class="border">
                            @if ($stajirovka->ilmiy_hisobot)
                                <a href="{{ asset('storage/' . $stajirovka->ilmiy_hisobot) }}"
                                    class="button  bg-theme-1 text-white">Faylni ko'rish</a>
                            @endif
                        </td>
                        <td class="border">
                            @if ($stajirovka->egallangan_bilim)
                                <a href="{{ asset('storage/' . $stajirovka->egallangan_bilim) }}"
                                    class="button  bg-theme-1 text-white">Faylni ko'rish</a>
                            @endif
                        </td>
                    </tr>

                    <tr class="bg-gray-200">
                        <th class=" border">Ilmiy-tadqiqot ishlari natijalari bo'yicha xorijiy ilmiy anjumanlarda ma'ruza
                            bilan ishtirok etganligi. (Asoslantiruvchi hujjatlar, rasm va videolar hamda havolalar, zip)
                        </th>
                        <th class=" border">Xalqaro tan olingan ma'lumotlar bazasidagi yetakchi ilmiy jurnallarda nashr
                            qilinganligi. (Pdf)</th>
                    </tr>
                    <tr>
                        <td class="border">
                            @if ($stajirovka->ishlar_natijalari)
                                <a href="{{ asset('storage/' . $stajirovka->ishlar_natijalari) }}"
                                    class="button  bg-theme-1 text-white">Faylni ko'rish</a>
                            @endif
                        </td>
                        <td class="border">
                            @if ($stajirovka->xalqarotan_jur_nashr)
                                <a href="{{ asset('storage/' . $stajirovka->xalqarotan_jur_nashr) }}"
                                    class="button  bg-theme-1 text-white">Faylni ko'rish</a>
                            @endif
                        </td>
                    </tr>


                    <tr class="bg-gray-200">
                        <th class=" border">Kamida bir yil davomida Agentlik tomonidan tashkil etiladigan va boshqa
                            tadbirlarda stajirovka davrida to'plangan tajribalar va olgan bilim va ko'nikmalari borasida o'z
                            fikr va mulohazalarini bayon etilganligi tafsiloti. (Asoslantiruvchi hujjatlar, rasm va videolar
                            hamda havolalar, zip)</th>
                        <th class=" border"></th>
                    </tr>
                    <tr>
                        <td class="border">
                            @if ($stajirovka->biryil_davomida)
                                <a href="{{ asset('storage/' . $stajirovka->biryil_davomida) }}"
                                    class="button  bg-theme-1 text-white">Faylni ko'rish</a>
                            @endif
                        </td>
                        <td class="border"></td>
                    </tr>


                </tbody>
            </table>
        </div>

        @role('Ekspert')
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2"
            style="background: white; padding: 20px 20px; border-radius: 20px">
            <div class="w-full mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                <form id="science-paper-create-form" method="POST" action="{{ route('stajirovkaexpert.store') }}"
                    class="validate-form" enctype="multipart/form-data" novalidate="novalidate">
                    @csrf
                    <div class="grid grid-cols-12 gap-2">
                        <input type="hidden" name="stajirovka_id" value="{{ $stajirovka->id }}">

                        <div class="w-full col-span-6">
                            <label class="flex flex-col sm:flex-row"> <span
                                    class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Ilmiy hisobot taqdim etilganligi (Pdf)
                            </label>
                            <select name="ilmiy_hisobot" id="science-sub-category" class="input border w-full mt-2" required="">

                                <option value=""></option>

                                <option value="Taqdim etilgan">Taqdim etilgan </option>

                                <option value="Taqdim etilmagan">Taqdim etilmagan</option>

                                <option value="Qayta ishlovga qaytarilgan">Qayta ishlovga qaytarilgan</option>


                            </select><br>

                            @error('ilmiy_hisobot')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="w-full col-span-6">
                            <label class="flex flex-col sm:flex-row"> <span
                                    class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Stajirovka davrida egallangan bilim va ko'nikmalarni amalga oshirilishi uchun
                                    zarur shart-sharoitlar yaratilganligi. (Asoslantiruvchi hujjatlar, rasm va videolar, zip)
                            </label>
                            <select name="egallangan_bilim" id="science-sub-category" class="input border w-full mt-2" required="">

                                <option value=""></option>

                                <option value="Ijobiy">Ijobiy</option>

                                <option value="Yetarli">Yetarli</option>

                                <option value="Mavjud emas">Mavjud emas</option>

                            </select><br>

                            @error('muddat')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="w-full col-span-6">
                            <label class="flex flex-col sm:flex-row"> <span
                                    class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Ilmiy-tadqiqot ishlari natijalari bo'yicha xorijiy ilmiy anjumanlarda ma'ruza
                                    bilan ishtirok etganligi. (Asoslantiruvchi hujjatlar, rasm va videolar hamda havolalar, zip)
                            </label>
                            <select name="ishlar_natijalari" id="science-sub-category" class="input border w-full mt-2" required="">

                                <option value=""></option>

                                <option value="Ijobiy">Ijobiy</option>

                                <option value="Yetarli">Yetarli</option>

                                <option value="Mavjud emas">Mavjud emas</option>

                            </select><br>

                            @error('muddat')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="w-full col-span-6">
                            <label class="flex flex-col sm:flex-row"> <span
                                    class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Xalqaro tan olingan ma'lumotlar bazasidagi yetakchi ilmiy jurnallarda nashr
                                    qilinganligi. (Pdf)
                            </label>
                            <select name="xalqarotan_jur_nashr" id="science-sub-category" class="input border w-full mt-2" required="">

                                <option value=""></option>

                                <option value="Ijobiy">Ijobiy</option>

                                <option value="Yetarli">Yetarli</option>

                                <option value="Mavjud emas">Mavjud emas</option>

                            </select><br>

                            @error('muddat')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="w-full col-span-6">
                            <label class="flex flex-col sm:flex-row"> <span
                                    class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Kamida bir yil davomida Agentlik tomonidan tashkil etiladigan va boshqa
                                    tadbirlarda stajirovka davrida to'plangan tajribalar va olgan bilim va ko'nikmalari borasida o'z
                                    fikr va mulohazalarini bayon etilganligi tafsiloti. (Asoslantiruvchi hujjatlar, rasm va videolar
                                    hamda havolalar, zip)
                            </label>
                            <select name="biryil_davomida" id="science-sub-category" class="input border w-full mt-2" required="">

                                <option value=""></option>

                                <option value="Ijobiy">Ijobiy</option>

                                <option value="Yetarli">Yetarli</option>

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
                            <select name="status" id="science-sub-category" class="input border w-full mt-2" required="">

                                <option value="">Status tanlang</option>

                                <option value="Ijobiy">Ijobiy</option>

                                <option value="Qoniqarli">Qoniqarli</option>

                                <option value="Salbiy">Salbiy</option>


                            </select><br>

                            @error('muddat')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="w-full col-span-6 ">
                            <label class="flex flex-col sm:flex-row"> <span
                                    class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Izoh</label>
                            <textarea name="comment" id="" class="input w-full border mt-2" cols="5" rows="5"></textarea>
                        </div>
                    </div>

                </form><br>
                <div class="px-5 pb-5 text-center">
                    <a href="{{ route('ilmiyloyiha.index') }}" class="button delete-cancel w-32 border text-gray-700 mr-1">
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


    </div>


@endsection
