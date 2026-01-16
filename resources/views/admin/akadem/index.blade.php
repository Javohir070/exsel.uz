@extends('layouts.admin')

@section('content')
    <div class="content">
        <div class="flex justify-between align-center mt-6 mb-6" style="align-items: center;">

            <h2 class="intro-y text-lg font-medium"> Akademik harakatchanlik</h2>

            <div class="intro-x relative mr-3 sm:mr-6">
                <div class="search hidden sm:block">
                    <form action="{{ route('akadem.index') }}" method="GET">
                        <input type="text" name="search" class="search__input input placeholder-theme-13"
                            placeholder="Search...">
                        <i data-feather="search" class="search__icon"></i>
                    </form>
                </div>
                <a class="notification sm:hidden" href=""> <i data-feather="search" class="notification__icon"></i></a>
            </div>

            @role('super-admin')
            <div>
                <a href="{{ route('exportAkademExpert') }}" class="button ml-3 w-24 bg-theme-1 text-white">
                    Export xulosa
                </a>
                <a href="{{ route('exportAkadem') }}" class="button ml-3 w-24 bg-theme-1 text-white">
                    Akademik harakatchanlik
                </a>
            </div>
            @endrole

        </div>

        <div class="grid grid-cols-12 gap-6 ">
            <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
                <table class="table table-report mt-2">
                    <thead>
                        <tr>
                            <th class="whitespace-no-wrap" style="width: 40px;">№</th>
                            <th class="whitespace-no-wrap" style="width: 500px;">F.I.Sh</th>
                            <th class="whitespace-no-wrap" style="text-align: center;">Yuboruvchi tashkilot</th>
                            <th class="whitespace-no-wrap" style="text-align: center;">Qabul qiluvchi tashkilot</th>
                            <th class="whitespace-no-wrap" style="text-align: center;width:150px !important;">Viloyat</th>
                            <th class="whitespace-no-wrap" style="">Status</th>
                            <th class="whitespace-no-wrap" style="text-align: center;">Holati</th>
                            <th class="whitespace-no-wrap text-center">Harakat</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($akadem as $tashkilots)
                            <tr class="intro-x">
                                <td>{{ ($akadem->currentPage() - 1) * $akadem->perPage() + $loop->iteration }}.</td>
                                <td>
                                    <a href="{{ route('akadem.show', ['akadem' => $tashkilots->id]) }}"
                                        class="font-medium">{{ $tashkilots->full_name }}</a>
                                </td>
                                <td>
                                    {{ $tashkilots->sender_organization_name }}
                                </td>
                                <td>
                                    {{ $tashkilots->receiver_organization_name }}
                                </td>
                                <td>
                                    {{ $tashkilots->receiver_organization_region }}
                                </td>
                                <td
                                    style="color: {{ ($h = $tashkilots->akademexpert()->where('quarter', 2)->first()->status ?? null) == 'Ijobiy' ? 'green' : ($h == 'Salbiy' ? 'blue' : 'red') }}">
                                    {{ $tashkilots->akademexpert()->where('quarter', 2)->first()->status ?? "Tasdiqlanmagan" }}
                                </td>
                                <td
                                    style="color: {{ ($h = $tashkilots->akademexpert()->where('quarter', 2)->first()->holati ?? null) == 'Tasdiqlandi' ? 'green' : ($h == 'yuborildi' ? 'blue' : 'red') }}">
                                    {{ $h == 'yuborildi' ? "Tasdiqlash uchun yuborildi" : ($h == null ? "Ko'rilmagan" : $h) }}
                                </td>
                                <td class="table-report__action w-56">
                                    <div class="flex justify-center items-center">
                                        <a class="flex science-update-action items-center mr-3"
                                            href="{{ route('akadem.show', ['akadem' => $tashkilots->id]) }}">
                                            <i data-feather="eye" class="feather feather-check-square w-4 h-4 mr-1"></i>
                                            Ko'rish
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan='8' style="text-align: center;">Ma'lumot yo'q</td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>
            <div class="intro-y flex flex-wrap sm:flex-row sm:flex-no-wrap items-center mt-3">
                {{ $akadem->appends(request()->query())->links() }}
            </div>
        </div>
    </div>

@endsection