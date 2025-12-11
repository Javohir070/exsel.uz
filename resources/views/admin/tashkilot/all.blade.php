@extends('layouts.admin')

@section('content')
    <div class="content">
        <div class="flex justify-between align-center mt-6 mb-6" style="align-items: center;">

            <h2 class="intro-y text-lg font-medium">{{ $tash_count ?? 'Tashkilotlar' }} ta tashkilot topildi.</h2>

            <div class="flex justify-between align-center mt-6 mb-6" style="align-items: center;gap:10px;">
                @role('super-admin')
                    <div>
                        <a href="{{ route('tashqoshish.create') }}" class="button w-24 bg-theme-1 text-white">
                            Qo'shish
                        </a>
                    </div>
                    <div>
                        <a href="{{ route('exportashkilot') }}" class="button box flex items-center text-gray-700">
                            <i data-feather="file-text" class="hidden sm:block w-4 h-4 mr-2"></i> Export to Excel
                        </a>
                    </div>
                @endrole
            </div>

        </div>

        <form id="science-paper-create-form" method="GET" action="{{ route('tashkilotlar.index') }}"
            class="validate-form">
            <div class="flex justify-between align-center gap-6 flex-wrap">

                <div class="relative text-gray-700">
                    <input type="text" name="search" value="{{ request('search') }}"
                        class="input input--lg w-full lg:w-64 box pr-10 placeholder-theme-13" placeholder="Qidiruv...">
                    <i data-feather="search"
                        class="feather feather-search w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0"></i>
                </div>

                <div class="relative text-gray-700">
                    <select class="input border w-full mt-2" name="region_id" id="region_id">
                        <option value="">Viloyatlari</option>
                        @foreach ($regions as $v)
                            <option value="{{ $v->id }}" @selected(request('region_id') === $v->id)>{{ $v->oz }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="relative text-gray-700">
                    <select name="turi" value="{{ old('turi') }}" class="input border w-full mt-2">

                        <option value="">Turi</option>

                        <option value="all" @selected(request('turi') === 'all')>Barchasi</option>

                        <option value="otm" @selected(request('turi') === 'otm')>OTM</option>

                        <option value="itm" @selected(request('turi') === 'itm')>ITM</option>

                        <option value="boshqa" @selected(request('turi') === 'boshqa')>Boshqa</option>

                    </select>
                </div>

                <button type="submit" class="update-confirm button w-24 bg-theme-1 text-white">
                    Izlash
                </button>

            </div>
        </form>

        <div class="grid grid-cols-12 gap-6 mt-5">

            <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
                <table class="table table-report -mt-2">
                    <thead>
                        <tr>
                            <th class="whitespace-no-wrap" style="width: 40px;">№</th>
                            <th class="whitespace-no-wrap">Tashkilot Nomi</th>
                            <th class="whitespace-no-wrap">Turi</th>
                            <th class="whitespace-no-wrap">Stir raqami</th>
                            <th class="whitespace-no-wrap text-center">Harakat</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($tashkilotlar as $tashkilots)
                            <tr class="intro-x">
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <a href="{{ route('tashkilotmalumotlar.show', $tashkilots->id) }}"
                                        class="font-medium">{{ $tashkilots->name }}</a>
                                </td>
                                <td>
                                    {{ $tashkilots->tashkilot_turi == 'itm' ? 'ITM' : ($tashkilots->tashkilot_turi == 'otm' ? 'OTM' : 'Boshqa') }}
                                </td>
                                <td>
                                    {{ $tashkilots->stir_raqami }}
                                </td>
                                <td class="table-report__action w-56">
                                    <div class="flex justify-center items-center">

                                        <a class="flex science-update-action items-center mr-3"
                                            href="{{ route('tashkilot.show', ['tashkilot' => $tashkilots->id]) }}">
                                            <i data-feather="eye" class="feather feather-check-square w-4 h-4 mr-1"></i>
                                            Ko'rish
                                        </a>

                                        {{-- <form action="{{ route('tashkilot.destroy', ['tashkilot' => $tashkilots->id]) }}"
                                            method="post" onsubmit="return confirm(' Rostan Ochirishni hohlaysizmi?');">
                                            <button type="submit" class="flex delete-action items-center text-theme-6">
                                                @csrf
                                                @method('DELETE')
                                                <i data-feather="trash-2"
                                                    class="feather feather-check-square w-4 h-4 mr-1"></i>
                                                O'chirish
                                            </button>
                                        </form> --}}
                                        {{-- <form action="{{ route('xodimlar.deleteAll', ['tashkilot' => $tashkilots->id]) }}"
                                            method="post" onsubmit="return confirm(' Rostan Ochirishni hohlaysizmi?');">
                                            <button type="submit" class="flex delete-action items-center text-theme-6">
                                                @csrf
                                                @method('DELETE')
                                                <i data-feather="trash-2" class="feather feather-check-square w-4 h-4 mr-1"></i>
                                                Xodimlar o'chirish
                                            </button>
                                        </form> --}}
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">Ma'lumot mavjud emas</td>
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
@endsection
