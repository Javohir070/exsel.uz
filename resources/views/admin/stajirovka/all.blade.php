@extends('layouts.admin')

@section('content')

    <div class="content">
        <div class="flex justify-between align-center mt-6 mb-6">

            <h2 class="intro-y text-lg font-medium">Stajirovkalar </h2>

            <div class="flex justify-between align-center ">
                <div>
                    <a href="{{ route('monitoring_exportstajirovka') }}" class="button box flex items-center text-gray-700">
                        <i data-feather="file-text" class="hidden sm:block w-4 h-4 mr-2"></i> Export to Excel
                    </a>
                </div>
            </div>

        </div>

        <form id="science-paper-create-form" method="GET" action="{{ route('stajirovkas_all.index') }}"
            class="validate-form">
            <div class="flex justify-between align-center gap-6 flex-wrap">

                <div class="relative text-gray-700">
                    <input type="text" name="search" value="{{ request('search') }}"
                        class="input input--lg w-full lg:w-64 box pr-10 placeholder-theme-13" placeholder="Qidiruv...">
                    <i data-feather="search"
                        class="feather feather-search w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0"></i>
                </div>

                <div class="relative text-gray-700">
                    <select name="yil" value="{{ old('yil') }}" class="science-sub-categoryyil input border w-full mt-2 ">
                        <option value="">Yilni tanlang</option>
                        <option value="all">Barchasi</option>
                    </select>
                </div>

                <button type="submit" class="update-confirm button w-24 bg-theme-1 text-white">
                    Izlash
                </button>

            </div>
        </form>

        @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif

        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <table class="table table-report -mt-2">
                <thead>
                    <tr>
                        <th class="whitespace-no-wrap">№</th>
                        <th class="whitespace-no-wrap">Stajorning F.I.Sh </th>
                        <th class="whitespace-no-wrap">Stajorning lavozimi</th>
                        <th class="whitespace-no-wrap">Stajirovka yo'nalishi</th>
                        <th style="text-align: center;">Stajirovkaga yuborilgan yili</th>
                        <th class="whitespace-no-wrap text-center">Harakat</th>
                    </tr>
                </thead>
                <tbody>

                    @forelse ($stajirovkas as $xodimlar)

                        <tr class="intro-x">
                            <td>{{ ($stajirovkas->currentPage() - 1) * $stajirovkas->perPage() + $loop->iteration }}.</td>
                            <td>
                                {{ $xodimlar->fish }}
                            </td>
                            <td>
                                {{ $xodimlar->lavozim ?? 'Mavjud emas' }}
                            </td>
                            <td>
                                {{ $xodimlar->yunalishi ?? 'Mavjud emas' }}
                            </td>
                            <td style="text-align: center;">
                                {{ $xodimlar->yil }}
                            </td>
                            <td class="table-report__action w-56">
                                <div class="flex justify-center items-center">

                                    <a class="flex science-update-action items-center mr-3"
                                        href="{{ route('stajirovka.show', ['stajirovka' => $xodimlar->id]) }}">
                                        <i data-feather="eye" class="feather feather-check-square w-4 h-4 mr-1"></i>
                                        Ko'rish
                                    </a>

                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan='6' style="text-align: center;">Ma'lumot yo'q</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{ $stajirovkas->appends(request()->query())->links() }}

    </div>

@endsection
