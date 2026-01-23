@extends('layouts.admin')

@section('content')

    <div class="content">
        <div class="flex justify-between align-center mt-6 mb-6" style="align-items: center;">

            <h2 class="intro-y text-lg font-medium"> Tashkilotlar soni: {{ $tash_count ?? 404 }} ta Stajorlar soni
                {{ $stajirovkas ?? 0 }} ta</h2>

            <div>
                @include('admin.components.file_button')
            </div>

            <div class="flex justify-between align-center gap-6">
                <div class="relative text-gray-700">
                    <form action="{{ route('search_stajirovka') }}" method="GET">
                        <input type="hidden" name="id" value="{{ $regionId }}">
                        <input type="text" name="query"
                            class="input input--lg w-full lg:w-64 box pr-10 placeholder-theme-13" placeholder="Search..."
                            value="{{ $query }}">
                        <i data-feather="search"
                            class="feather feather-search w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0"></i>
                    </form>
                </div>

                <form method="GET" action="{{ route('search_stajirovka') }}">
                    <input type="hidden" name="id" value="{{ $regionId }}">
                    <select class="input input--lg box w-full lg:w-auto mt-3 lg:mt-0 ml-auto" name="type"
                        onchange="this.form.submit()">
                        <option value="" {{ $type == '' ? 'selected' : '' }}>Barchasi OTM & ITM</option>
                        <option value="otm" {{ $type == 'otm' ? 'selected' : '' }}>OTM</option>
                        <option value="itm" {{ $type == 'itm' ? 'selected' : '' }}>ITM</option>
                        <option value="boshqa" {{ $type == 'boshqa' ? 'selected' : '' }}>Boshqa</option>
                    </select>
                </form>
            </div>

        </div>
        <div class="grid grid-cols-12 gap-6 ">

            <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
                <table class="table table-report mt-2">
                    <thead>
                        <tr>
                            <th class="whitespace-no-wrap" style="width: 40px;">№</th>
                            <th class="whitespace-no-wrap" style="width: 600px;">Tashkilot nomi</th>
                            <th class="whitespace-no-wrap" style="text-align: center;">Tashkilot STIR raqami</th>
                            <th class="whitespace-no-wrap" style="text-align: center;">Tashkilot turi</th>
                            <th class="whitespace-no-wrap" style="text-align: center;">Stajorlar soni</th>
                            <th style="text-align: center;">Qoniqarli/Qoniqarsiz/Qo‘shimcha o‘rganish talab etiladi</th>
                            <th class="whitespace-no-wrap text-center">Harakat</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($tashkilotlar as $tashkilots)
                            <tr class="intro-x">
                                <td>{{ ($tashkilotlar->currentPage() - 1) * $tashkilotlar->perPage() + $loop->iteration }}.</td>
                                <td>
                                    <a href="{{ route('stajirov.index', ['id' => $tashkilots->id]) }}"
                                        class="font-medium">{{ $tashkilots->name }}</a>
                                </td>
                                <td style="text-align: center;">
                                    {{ $tashkilots->stir_raqami  }}
                                </td>
                                <td style="text-align: center;">
                                    {{ $tashkilots->tashkilot_turi == 'itm' ? 'ITM' : ($tashkilots->tashkilot_turi == 'otm' ? 'OTM' : 'Boshqa') }}
                                </td>
                                <td style="text-align: center;">
                                    {{ $tashkilots->stajirovkalar()->where('quarter', $monitoring->id)->count() }}/{{ $tashkilots->stajirovkaexperts()->where('quarter', $monitoring->id)->count() }}
                                </td>

                                <td style="text-align: center;">
                                    {{ $tashkilots->stajirovkaexperts()->where('quarter', $monitoring->id)->whereIn('status', ['Ijobiy', 'Qoniqarli'])->count() }}/
                                    {{ $tashkilots->stajirovkaexperts()->where('quarter', $monitoring->id)->where('status', 'Salbiy')->count() }}/
                                    {{ $tashkilots->stajirovkaexperts()->where('quarter', $monitoring->id)->where('status', 'Qo‘shimcha o‘rganish talab etiladi')->count() }}
                                </td>

                                <td class="table-report__action w-56">
                                    <div class="flex justify-center items-center">
                                        <a class="flex science-update-action items-center mr-3"
                                            href="{{ route('stajirov.index', ['id' => $tashkilots->id]) }}">
                                            <i data-feather="eye" class="feather feather-check-square w-4 h-4 mr-1"></i>
                                            Ko'rish
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">Tashkilotlar topilmadi</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="intro-y flex flex-wrap sm:flex-row sm:flex-no-wrap items-center mt-3">
                {{ $tashkilotlar->appends(request()->query())->links() }}
            </div>
        </div>

    </div>

    @include('admin.components.file_modal', ['action' => route('stajirovka_import')])

@endsection