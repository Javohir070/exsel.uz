@extends('layouts.admin')

@section('content')

    <div class="content">
        <div class="flex justify-between align-center mt-10" style="align-items: center;">

            <h2 class="intro-y text-lg font-medium">Tashkilotlar soni: {{ $tash_count ?? 0 }} ta</h2>

            <div class="flex justify-between align-center gap-6">
                <div class="relative text-gray-700">
                    <form action="{{ route('search_dok') }}" method="GET">
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
                {{-- <form method="GET" action="{{ route('search_dok') }}">
                    <select class="input input--lg box w-full lg:w-auto mt-3 lg:mt-0 ml-auto" name="query" onchange="this.form.submit()">
                        <option value="">Barchasi OTM & ITM</option>
                        <option value="otm">OTM</option>
                        <option value="itm">ITM</option>
                    </select>
                </form>

                <form method="GET" action="{{ route('search_dok') }}">
                    <select class="input input--lg box w-full lg:w-auto mt-3 lg:mt-0 ml-auto" name="query" onchange="this.form.submit()">
                        <option value="">Viloyatlari</option>
                        @foreach ($regions as $v)
                        <option value="{{ $v->id }}">{{ $v->oz }}</option>
                        @endforeach
                    </select>
                </form> --}}
            </div>



        </div>
        <div class="grid grid-cols-12 gap-6 mt-5">


            <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
                <table class="table table-report -mt-2">
                    <thead>
                        <tr>
                            <th class="whitespace-no-wrap" style="width: 40px;">№</th>
                            <th class="whitespace-no-wrap">Tashkilot Nomi</th>
                            <th class="whitespace-no-wrap">Tashkilot STIR raqami</th>
                            <th class="whitespace-no-wrap">Tashkilot turi</th>
                            <th class="whitespace-no-wrap">Ilmiy izlanivchilar</th>
                            <th class="whitespace-no-wrap text-center">Harakat</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tashkilotlar as $tashkilots)

                            <tr class="intro-x">
                                <td>{{ ($tashkilotlar->currentPage() - 1) * $tashkilotlar->perPage() + $loop->iteration }}.</td>
                                <td>
                                    <a href="{{ route('doktarantura.show', ['doktarantura' => $tashkilots->id]) }}"
                                        class="font-medium">{{ $tashkilots->name }}</a>
                                </td>
                                <td style="text-align: center;">
                                    {{ $tashkilots->stir_raqami  }}
                                </td>
                                <td style="text-align: center;">
                                    {{ $tashkilots->tashkilot_turi == 'itm' ? 'ITM' : ($tashkilots->tashkilot_turi == 'otm' ? 'OTM' :'Boshqa') }}
                                </td>
                                <td style="text-align: center;">
                                    {{ $tashkilots->doktaranturalar->count() }}
                                </td>
                                <td class="table-report__action w-56">
                                    <div class="flex justify-center items-center">

                                        <a class="flex science-update-action items-center mr-3"
                                            href="{{ route('doktarantura.show', ['doktarantura' => $tashkilots->id]) }}"
                                            data-id="2978" data-name="sdfd"
                                            data-file="/files/papers/4735cda0-a7a3-4a45-bd93-0bc013b857dc.png"
                                            data-filename="Screenshot from 2023-04-17 16-23-56.png" data-type="66"
                                            data-date="None" data-doi="" data-publisher="" data-description="None"
                                            data-authors-count="None" data-toggle="modal"
                                            data-target="#science-paper-update-modal">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                                fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" class="feather feather-check-square w-4 h-4 mr-1">
                                                <polyline points="9 11 12 14 22 4"></polyline>
                                                <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
                                            </svg>
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
@endsection
