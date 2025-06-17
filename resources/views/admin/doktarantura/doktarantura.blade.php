@extends('layouts.admin')

@section('content')
    <div class="content">
        <div class="flex justify-between align-center mt-6 mb-6 mb-3">

            <h2 class="intro-y text-lg font-medium">{{ auth()->user()->tashkilot->name }}</h2>

        </div>
        <div class="intro-y box px-4   ">

            <div class="nav-tabs flex flex-col sm:flex-row justify-center lg:justify-start">
                <a data-toggle="tab" data-target="#ilmiy-izlanuvchilar" href="javascript:;"
                    class="py-4 sm:mr-8 flex items-center active" style="font-size: 18px">
                    Ilmiy izlanuvchilar
                </a>
                <a data-toggle="tab" data-target="#change-password" href="javascript:;"
                    class="py-4 sm:mr-8 flex items-center" style="font-size: 18px">
                    Ilmiy rahbarlar
                </a>
            </div>
        </div>

        @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif
        <div class="overflow-x-auto mt-2" style="background-color: white;border-radius:8px;">

            <div class="tab-content">
                <div class="tab-content__pane active" id="ilmiy-izlanuvchilar">
                    <div class="p-5">
                        <div class="grid grid-cols-12 gap-6 ">
                            <div class="col-span-12 mt-2 " style="background: white; border-radius: 10px;">
                                <div class="intro-y block sm:flex items-center py-4"
                                    style="justify-content: space-between;">
                                    <h2 class="text-lg font-medium truncate ml-4" style="font-size: 24px;font-weight:500;">
                                        Ilmiy izlanuvchilar
                                    </h2>
                                    <div class="intro-x relative mr-3 sm:mr-6">
                                        <div class="search hidden sm:block">
                                            <form action="{{ route('doktaranturalar') }}" method="GET">
                                                <input type="hidden" name="id" value="{{ auth()->user()->tashkilot_id }}">
                                                <input type="text" name="query" value="{{ request('query') }}"
                                                    class="search__input input placeholder-theme-13"
                                                    placeholder="Search...">
                                                <i data-feather="search" class="search__icon"></i>
                                            </form>
                                        </div>
                                        <a class="notification sm:hidden" href=""> <i data-feather="search"
                                                class="notification__icon"></i> </a>
                                    </div>
                                    <tr style="border-bottom: 1px solid #E6E6E6;">
                                        <td colspan="5" style="text-align: center;">
                                            <a href="{{ route('php_import', ['stir' => auth()->user()->tashkilot->stir_raqami]) }}"
                                                class="button  bg-theme-1 text-white mr-4"
                                                style="font-size: 16px;">Ma'lumotni yangilash</a>
                                            <a href="{{ url('doktarantura/' . auth()->user()->tashkilot_id . '/export') }}"
                                                class="button ml-3 w-24 bg-theme-1 text-white">
                                                Export
                                            </a>
                                        </td>
                                    </tr>
                                </div>
                                <div class="intro-y overflow-auto lg:overflow-visible mt-8 sm:mt-0">
                                    <table class="table">
                                        <thead style="background: #F4F8FC;">
                                            <tr>
                                                <th class="whitespace-no-wrap" style="width: 40px;">T/r</th>
                                                <th class="whitespace-no-wrap">F.I.Sh</th>
                                                <th class="whitespace-no-wrap" colspan="2">
                                                    <form method="GET" action="{{ route('doktaranturalar') }}"
                                                        style="display: flex; gap:20px;">
                                                        <input type="hidden" name="id"
                                                            value="{{ auth()->user()->tashkilot_id }}">
                                                        <select class="form-select" name="dc_type"
                                                            style="border-radius: 6px;">
                                                            <option value="">Turi</option>
                                                            <option value="">All</option>
                                                            <option value="Mustaqil izlanuvchi, PhD" {{ request('dc_type') == 'Mustaqil izlanuvchi, PhD' ? 'selected' : '' }}>Mustaqil izlanuvchi, PhD</option>
                                                            <option value="Tayanch doktorantura, PhD" {{ request('dc_type') == 'Tayanch doktorantura, PhD' ? 'selected' : '' }}>Tayanch doktorantura, PhD</option>
                                                            <option value="Mustaqil izlanuvchi, DSc" {{ request('dc_type') == 'Mustaqil izlanuvchi, DSc' ? 'selected' : '' }}>Mustaqil izlanuvchi, DSc</option>
                                                            <option value="Doktorantura, DSc" {{ request('dc_type') == 'Doktorantura, DSc' ? 'selected' : '' }}>Doktorantura, DSc</option>
                                                        </select>

                                                        <select class="form-select" name="course"
                                                            style="border-radius: 6px;">
                                                            <option value="">Kurs</option>
                                                            <option value="">All</option>
                                                            <option value="1" {{ request('course') == '1' ? 'selected' : '' }}>1</option>
                                                            <option value="2" {{ request('course') == '2' ? 'selected' : '' }}>2</option>
                                                            <option value="3" {{ request('course') == '3' ? 'selected' : '' }}>3</option>
                                                        </select>

                                                        <button type="submit" class="button bg-theme-1 text-white mr-4"
                                                            style="font-size: 16px;">Qidirish</button>
                                                    </form>

                                                </th>
                                                <th style="text-align:center;">Dissertatsiya mavzusi </th>
                                                <th class="whitespace-no-wrap">Harakat</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($doktaranturas as $m)
                                                <tr style="border-bottom: 1px solid #E6E6E6;">
                                                    <td>{{ ($doktaranturas->currentPage() - 1) * $doktaranturas->perPage() + $loop->iteration }}.
                                                    </td>
                                                    <td style="color:#1881D3; font-weight: 400;">
                                                        {{ $m->full_name }}
                                                    </td>
                                                    <td>
                                                        {{ $m->dc_type }}
                                                    </td>
                                                    <td>{{ $m->course }} </td>
                                                    <td>{{ $m->direction_name }} </td>
                                                    <td>
                                                        <a onclick="openShowIlmiIzlanuvchiModal({{ $m->id }})"
                                                            class="button px-2 mr-1 mb-2 border text-gray-700"
                                                            style="display: inline-block;">
                                                            <span class="w-5 h-5 flex items-center justify-center">
                                                                <i data-feather="eye" class="w-4 h-4"></i>
                                                            </span>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr style="border-bottom: 1px solid #E6E6E6;">
                                                    <td colspan="8" style="text-align: center;">
                                                        Ma'lumot topilmadi
                                                    </td>
                                                </tr>
                                            @endforelse


                                        </tbody>
                                    </table>
                                </div>
                                <div class="intro-y flex flex-wrap sm:flex-row sm:flex-no-wrap mb-1 items-center mt-4">
                                    {{ $doktaranturas->appends(request()->query())->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-content__pane" id="change-password">
                    <div class="p-5">
                        <div class="grid grid-cols-12 gap-6 ">
                            <div class="col-span-12 mt-2 " style="background: white; border-radius: 10px;">

                                <div class="intro-y block sm:flex items-center py-4"
                                    style="justify-content: space-between;">
                                    <h2 class="text-lg font-medium truncate ml-4" style="font-size: 24px;font-weight:500;">
                                        Ilmiy rahbarlar
                                    </h2>
                                    <tr style="border-bottom: 1px solid #E6E6E6;">
                                        <td colspan="5" style="text-align: center;">
                                            <a href="{{ route('ilmiy_rahbarlar_import', ['stir' => auth()->user()->tashkilot->stir_raqami]) }}"
                                                class="button  bg-theme-1 text-white mr-4 ml-6">Ma'lumotni yangilash</a>
                                            <a href="{{ url('ilmiyrahbarlar/' . auth()->user()->tashkilot_id . '/export') }}"
                                                class="button ml-3 w-24 bg-theme-1 text-white">
                                                Export
                                            </a>
                                        </td>
                                    </tr>
                                </div>

                                <div class="intro-y overflow-auto lg:overflow-visible mt-8 sm:mt-0">
                                    <table class="table">
                                        <thead style="background: #F4F8FC;">
                                            <tr>
                                                <th class="whitespace-no-wrap" style="width: 40px;">T/r</th>
                                                <th class="whitespace-no-wrap">F.I.Sh</th>
                                                <th class="" style="text-align:center">Mazkur tashkilotdan biriktirilgan
                                                    izlanuvchilar soni</th>
                                                <th class="" style="text-align:center">Barcha tashkilotlardan biriktirilgan
                                                    izlanuvchilar soni</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($ilmiyrahbarlars as $t)
                                                <tr style="border-bottom: 1px solid #E6E6E6;">
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td style="color:#1881D3; font-weight: 400;">{{ $t->full_name }}
                                                    </td>
                                                    <td style="text-align:center">{{ $t->org }} </td>
                                                    <td style="text-align:center">{{ $t->all }} </td>
                                                </tr>
                                            @empty
                                                <tr style="border-bottom: 1px solid #E6E6E6;">
                                                    <td colspan="5" style="text-align: center;">
                                                        <a href="{{ route('ilmiy_rahbarlar_import', ['stir' => auth()->user()->tashkilot->stir_raqami]) }}"
                                                            class="button w-24 bg-theme-1 text-white mr-4"
                                                            style="font-size: 20px;">daraja.ilmiy.uz import qilish</a>
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <style>
        .ilmiy_izlanuvchi {
            width: 40%;
            background-color: rgba(0, 0, 0, 0.02);
            color: black;
        }
    </style>

    <div class="modal" id="science-ilmiy-izlanuvchi-show-modal">
        <div class="modal__content modal__content--xl" style="margin-top:revert-layer;">
            <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200">
                <h2 class="font-medium text-base mr-auto" style="font-size:24px;color:black;">Ma'lumotlarni ko'rish</h2>
                <button type="button" class="button border items-center text-gray-700 hidden sm:flex" data-dismiss="modal">
                    <i data-feather="x" class="w-4 h-4 "></i></button>
            </div>
            <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">

                <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2">
                    <div class="w-full  sm:mt-0 sm:ml-auto md:ml-0">
                        <table class="table" style="border-radius: 8px;">
                            <tbody>
                                <tr>
                                    <th class="border ilmiy_izlanuvchi">F.I.Sh</th>
                                    <td class="border" style="width:60%;color:black;" id="full_name"></td>
                                </tr>
                                <tr>
                                    <th class="border ilmiy_izlanuvchi">Dissertatsiya mavzusi</th>
                                    <td class="border" style="width:60%;color:black;" id="direction_name"></td>
                                </tr>
                                <tr>
                                    <th class="border ilmiy_izlanuvchi">Ixtisoslik</th>
                                    <td class="border" style="width:60%;color:black;" id="direction_code"></td>
                                </tr>
                                <tr>
                                    <th class="border ilmiy_izlanuvchi">Tashkilot</th>
                                    <td class="border" style="width:60%;color:black;" id="org_name"></td>
                                </tr>
                                <tr>
                                    <th class="border ilmiy_izlanuvchi">Ta'lim turi</th>
                                    <td class="border" style="width:60%;color:black;" id="dc_type"></td>
                                </tr>
                                <tr>
                                    <th class="border ilmiy_izlanuvchi">Qabul yili</th>
                                    <td class="border" style="width:60%;color:black;" id="admission_year"></td>
                                </tr>
                                <tr>
                                    <th class="border ilmiy_izlanuvchi">Qabul choragi</th>
                                    <td class="border" style="width:60%;color:black;" id="admission_quarter"></td>
                                </tr>
                                <tr>
                                    <th class="border ilmiy_izlanuvchi">Ilmiy rahbar</th>
                                    <td class="border" style="width:60%;color:black;" id="advisor"></td>
                                </tr>
                                <tr>
                                    <th class="border ilmiy_izlanuvchi">Kurs</th>
                                    <td class="border" style="width:60%;color:black;" id="course"></td>
                                </tr>
                                <tr>
                                    <th class="border ilmiy_izlanuvchi">Monitoring 1</th>
                                    <td class="border" style="width:60%;color:black;" id="monitoring_1"></td>
                                </tr>
                                <tr>
                                    <th class="border ilmiy_izlanuvchi">Monitoring 2</th>
                                    <td class="border" style="width:60%;color:black;" id="monitoring_2"></td>
                                </tr>
                                <tr>
                                    <th class="border ilmiy_izlanuvchi">Monitoring 3</th>
                                    <td class="border" style="width:60%;color:black;" id="monitoring_3"></td>
                                </tr>
                                <tr>
                                    <th class="border ilmiy_izlanuvchi">Yakka tartibdagi reja tasdiqlanganligi</th>
                                    <td class="border" style="width:60%;color:black;" id="reja_t"></td>
                                </tr>
                                <tr>
                                    <th class="border ilmiy_izlanuvchi">Yakka tartibdagi rejani bajarganligi</th>
                                    <td class="border" style="width:60%;color:black;" id="reja_b"></td>
                                </tr>
                                <tr>
                                    <th class="border ilmiy_izlanuvchi">Monitoring natijasi kiritilganligi</th>
                                    <td class="border" style="width:60%;color:black;" id="monitoring_natijasik"></td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Tahrirlash tugmasini bosganda modalni ochish va ma'lumotlarni to'ldirish
        function openShowIlmiIzlanuvchiModal(id) {
            // AJAX so'rovni yuboramiz
            $.ajax({
                url: `/ilmiy-izlanuvchi/${id}`,
                type: 'GET',
                success: function (data) {
                    // Ma'lumotlarni modal shaklida aks ettiramiz
                    $('#full_name').text(data.full_name);
                    $('#direction_name').text(data.direction_name);
                    $('#direction_code').text(data.direction_code);
                    $('#org_name').text(data.org_name);
                    $('#dc_type').text(data.dc_type);
                    $('#admission_year').text(data.admission_year);
                    $('#admission_quarter').text(data.admission_quarter);
                    $('#advisor').text(data.advisor);
                    $('#course').text(data.course);
                    $('#monitoring_1').text(data.monitoring_1);
                    $('#monitoring_2').text(data.monitoring_2);
                    $('#monitoring_3').text(data.monitoring_3);
                    $('#reja_t').text(data.reja_t);
                    $('#reja_b').text(data.reja_b);
                    $('#monitoring_natijasik').text(data.monitoring_natijasik);

                    $('#science-ilmiy-izlanuvchi-show-modal').modal('show');
                },
                error: function (error) {
                    console.error("Ma'lumotlarni yuklashda xatolik yuz berdi: ", error);
                }
            });
        }
    </script>

    <script>
        // Tahrirlash tugmasini bosganda modalni ochish va ma'lumotlarni to'ldirish
        function openEditIlmiIzlanuvchiModal(id) {
            // AJAX so'rovni yuboramiz
            $.ajax({
                url: `/ilmiy-izlanuvchi/${id}`,
                type: 'GET',
                success: function (data) {
                    // Ma'lumotlarni modal shaklida aks ettiramiz
                    $('#edit_full_name').text(data.full_name);
                    $('#edit_direction_name').text(data.direction_name);
                    $('#edit_direction_code').text(data.direction_code);
                    $('#edit_org_name').text(data.org_name);
                    $('#edit_dc_type').text(data.dc_type);
                    $('#edit_admission_year').text(data.admission_year);
                    $('#edit_admission_quarter').text(data.admission_quarter);
                    $('#edit_advisor').text(data.advisor);
                    $('#edit_course').text(data.course);
                    $('#edit_monitoring_1').text(data.monitoring_1);
                    $('#edit_monitoring_2').text(data.monitoring_2);
                    $('#edit_monitoring_3').text(data.monitoring_3);
                    $('#edit_reja_t').text(data.reja_t);
                    $('#edit_reja_b').text(data.reja_b);
                    $('#edit_monitoring_natijasik').text(data.monitoring_natijasik);

                    $('#science-paper-edit-form').attr('action', `/ilmiy-izlanuvchi/${id}/edit`);

                    $('#science-ilmiy-izlanuvchi-edit-modal').modal('show');
                },
                error: function (error) {
                    console.error("Ma'lumotlarni yuklashda xatolik yuz berdi: ", error);
                }
            });
        }
    </script>

    <script>
        // Tahrirlash tugmasini bosganda modalni ochish va ma'lumotlarni to'ldirish
        function openShowIlmiRahbarModal(id) {
            // AJAX so'rovni yuboramiz
            $.ajax({
                url: `/ilmiyrahbarlar/${id}`,
                type: 'GET',
                success: function (data) {
                    // Ma'lumotlarni modal shaklida aks ettiramiz
                    $('#ir_full_name').text(data.full_name);
                    $('#org').text(data.org);
                    $('#all').text(data.all);
                    $('#kollegial_organ_qarori').text(data.kollegial_organ_qarori);
                    $('#meyoridan_ortiq').text(data.meyoridan_ortiq);
                    $('#tash_meyoridan_ortiq').text(data.tash_meyoridan_ortiq);

                    $('#science-ilmiy-rahbar-show-modal').modal('show');
                },
                error: function (error) {
                    console.error("Ma'lumotlarni yuklashda xatolik yuz berdi: ", error);
                }
            });
        }
    </script>

    <script>
        // Tahrirlash tugmasini bosganda modalni ochish va ma'lumotlarni to'ldirish
        function openEditIlmiRahbarModal(id) {
            // AJAX so'rovni yuboramiz
            $.ajax({
                url: `/ilmiyrahbarlar/${id}`,
                type: 'GET',
                success: function (data) {
                    // Ma'lumotlarni modal shaklida aks ettiramiz
                    $('#edit_ir_full_name').text(data.full_name);
                    $('#edit_org').text(data.org);
                    $('#edit_all').text(data.all);
                    $('#edit_kollegial_organ_qarori').text(data.kollegial_organ_qarori);
                    $('#edit_meyoridan_ortiq').text(data.meyoridan_ortiq);
                    $('#edit_tash_meyoridan_ortiq').text(data.tash_meyoridan_ortiq);


                    $('#science-ilmiy-rahbar-edit-form').attr('action', `/ilmiy-rahbar/${id}/edit`);

                    $('#science-ilmiy-rahbar-edit-modal').modal('show');
                },
                error: function (error) {
                    console.error("Ma'lumotlarni yuklashda xatolik yuz berdi: ", error);
                }
            });
        }
    </script>
@endsection
