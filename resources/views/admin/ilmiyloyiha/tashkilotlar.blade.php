@extends('layouts.admin')

@section('content')

    <div class="content">
        <div class="flex justify-between align-center mt-6" style="align-items: center;">

            <h2 class="intro-y text-lg font-medium">Tashkilotlar soni: {{ $tash_count ?? 164  }} ta Ilmiy
                loyihalar soni: {{ $ilmiyloyiha ?? 449  }} ta</h2>

            <div class="flex justify-between align-center gap-6">
                <div class="relative text-gray-700">
                    <form action="{{ route('search_ilmiy_loyhalar') }}" method="GET">
                        <input type="text" name="query"
                            class="input input--lg w-full lg:w-64 box pr-10 placeholder-theme-13" placeholder="Search...">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-search w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0">
                            <circle cx="11" cy="11" r="8"></circle>
                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                        </svg>
                    </form>
                </div>
                {{-- <form method="GET" action="{{ route('search_ilmiy_loyhalar') }}">
                    <select class="input input--lg box w-full lg:w-auto mt-3 lg:mt-0 ml-auto" name="query"
                        onchange="this.form.submit()">
                        <option value="">Barchasi OTM & ITM</option>
                        <option value="otm">OTM</option>
                        <option value="itm">ITM</option>
                    </select>
                </form>

                <form method="GET" action="{{ route('search_ilmiy_loyhalar') }}">
                    <select class="input input--lg box w-full lg:w-auto mt-3 lg:mt-0 ml-auto" name="query"
                        onchange="this.form.submit()">
                        <option value="">Viloyatlari</option>
                        @foreach ($regions as $v)
                            <option value="{{ $v->id }}">{{ $v->oz }}</option>
                        @endforeach
                    </select>
                </form> --}}
            </div>

            <!-- <div>
                    <a href="javascript:;" data-target="#science-paper-create-modal" data-toggle="modal"
                        class="button w-24 ml-3 bg-theme-1 text-white">
                        Import
                    </a>
                </div> -->

        </div>
        <div class="grid grid-cols-12 gap-6 ">

            <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
                <table class="table table-report ">
                    <thead>
                        <tr>
                            <th class="whitespace-no-wrap" style="width: 40px;">№</th>
                            <th class="whitespace-no-wrap">Tashkilot Nomi</th>
                            <th style="text-align: center;">Tashkilot STIR raqami</th>
                            <th style="text-align: center;">Tashkilot turi</th>
                            <th style="text-align: center;">Ilmiy loyihalar soni</th>
                            <th style="text-align: center;">Qoniqarli/Qoniqarsiz/Qo‘shimcha o‘rganish talab etiladi</th>
                            <th class="whitespace-no-wrap text-center">Harakat</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tashkilotlar as $tashkilots)

                            <tr class="intro-x">
                                <td>{{ ($tashkilotlar->currentPage() - 1) * $tashkilotlar->perPage() + $loop->iteration }}.</td>
                                <td>
                                    <a href="{{ route('ilmiy_loyihalar.index', ['id' => $tashkilots->id]) }}" class="font-medium">
                                        {{ $tashkilots->name }}
                                    </a>
                                </td>

                                <td style="text-align: center;">
                                    {{ $tashkilots->stir_raqami  }}
                                </td>

                                <td style="text-align: center;">
                                    {{ $tashkilots->tashkilot_turi == 'itm' ? 'ITM' : ($tashkilots->tashkilot_turi == 'otm' ? 'OTM' :'Boshqa') }}
                                </td>

                                <td style="text-align: center;">
                                    {{ $tashkilots->ilmiyloyhalar()->where('is_active', 1)->count() }}/{{ $tashkilots->tekshirivchilar()->where('is_active', 1)->count()  }}
                                </td>

                                <td style="text-align: center;">
                                    {{ $tashkilots->tekshirivchilar()->where('is_active', 1)->where('status', 'Qoniqarli')->count() }}/
                                    {{ $tashkilots->tekshirivchilar()->where('is_active', 1)->where('status', 'Qoniqarsiz')->count() }}/
                                    {{ $tashkilots->tekshirivchilar()->where('is_active', 1)->where('status', 'Qo‘shimcha o‘rganish talab etiladi')->count() }}
                                </td>

                                <td class="table-report__action w-56">
                                    <div class="flex justify-center items-center">

                                        <a class="flex science-update-action items-center mr-3"
                                            href="{{ route('ilmiy_loyihalar.index', ['id' => $tashkilots->id]) }}">
                                            <i data-feather="eye"  class="feather feather-check-square w-4 h-4 mr-1"></i>
                                            Ko'rish
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            <div class="intro-y flex flex-wrap sm:flex-row sm:flex-no-wrap items-center mt-3">
                {{ $tashkilotlar->appends(request()->query())->links() }}
            </div>
        </div>

    </div>

    <div class="modal" id="science-paper-create-modal">
        <div class="modal__content modal__content--xl">
            <div class="p-5">

                <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2">
                    <div class="w-full mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                        <form id="science-paper-create-form" method="POST" action="{{ route('asbobuskuna_import') }}"
                            class="validate-form" enctype="multipart/form-data" novalidate="novalidate">
                            @csrf
                            <div class="grid grid-cols-12 gap-2">

                                <div class="w-full col-span-12">

                                    <label class="flex flex-col sm:flex-row"> <span
                                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Excel yuklash
                                    </label>
                                    <input type="file" name="file" style="padding-left: 0" class="input w-full mt-2"
                                        required="">

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
@endsection
