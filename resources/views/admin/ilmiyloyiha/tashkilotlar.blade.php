@extends('layouts.admin')

@section('content')

    <div class="content">
        <div class="flex justify-between align-center mt-6" style="align-items: center;">

            <h2 class="intro-y text-lg font-medium">Tashkilotlar soni: {{ $tash_count ?? 0  }} ta Ilmiy
                loyihalar soni: {{ $ilmiyloyiha ?? 0  }} ta</h2>

            <div class="flex justify-between align-center gap-6">
                <div class="relative text-gray-700">
                    <form action="{{ route('search_ilmiy_loyhalar') }}" method="GET">
                        <input type="text" name="query"
                            class="input input--lg w-full lg:w-64 box pr-10 placeholder-theme-13" placeholder="Search...">
                        <i data-feather="search"
                            class="feather feather-search w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0"></i>
                    </form>
                </div>
            </div>

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
                                    <a href="{{ route('ilmiy_loyihalar.index', ['id' => $tashkilots->id]) }}"
                                        class="font-medium">
                                        {{ $tashkilots->name }}
                                    </a>
                                </td>

                                <td style="text-align: center;">
                                    {{ $tashkilots->stir_raqami  }}
                                </td>

                                <td style="text-align: center;">
                                    {{ $tashkilots->tashkilot_turi == 'itm' ? 'ITM' : ($tashkilots->tashkilot_turi == 'otm' ? 'OTM' : 'Boshqa') }}
                                </td>

                                <td style="text-align: center;">
                                    {{ $tashkilots->ilmiyloyhalar()->where('is_active', 1)->count() }}/{{ $tashkilots->tekshirivchilar()->where('quarter', $monitoring_id)->count()  }}
                                </td>

                                <td style="text-align: center;">
                                    {{ $tashkilots->tekshirivchilar()->where('quarter', $monitoring_id)->where('status', 'Qoniqarli')->count() }}/
                                    {{ $tashkilots->tekshirivchilar()->where('quarter', $monitoring_id)->where('status', 'Qoniqarsiz')->count() }}/
                                    {{ $tashkilots->tekshirivchilar()->where('quarter', $monitoring_id)->where('status', 'Qo‘shimcha o‘rganish talab etiladi')->count() }}
                                </td>

                                <td class="table-report__action w-56">
                                    <div class="flex justify-center items-center">
                                        <a class="flex science-update-action items-center mr-3"
                                            href="{{ route('ilmiy_loyihalar.index', ['id' => $tashkilots->id]) }}">
                                            <i data-feather="eye" class="feather feather-check-square w-4 h-4 mr-1"></i>
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