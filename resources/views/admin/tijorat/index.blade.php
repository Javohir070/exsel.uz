@extends('layouts.admin')

@section('content')
    <div class="content">
        <div class="flex justify-between align-center mt-6 mb-6" style="align-items: center;">

            <h2 class="intro-y text-lg font-medium"> Tijoratlashtirish</h2>
            <div class="relative text-gray-700">
                <select name="viloyat" value="{{ old('viloyat') }}"
                    class="science-sub-categoryviloyat input border w-full mt-2 ">
                    <option value="" @selected(request('viloyat') === null || request('viloyat') === '')>Viloyatni tanlang</option>
                    <option value="all" @selected(request('viloyat') === 'all')>Barchasi</option>
                    @foreach ($regions as $region)
                        <option value="{{ $region->id }}" @selected((string) request('viloyat') === (string) $region->id)>{{ $region->oz }}</option>
                    @endforeach
                </select>
            </div>

            <div class="flex items-center flex-wrap gap-2 justify-end">
                @role('super-admin')
                    <a href="{{ route('tijorat.create', request()->query()) }}" class="button w-24 bg-theme-1 text-white">
                        Qo'shish
                    </a>
                @endrole
                @include('admin.components.file_button')
            </div>

        </div>

        @if (session('status'))
            <div class="alert alert-success show mb-3">{{ session('status') }}</div>
        @endif

        <div class="grid grid-cols-12 gap-6 ">
            <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
                <table class="table table-report mt-2">
                    <thead>
                        <tr>
                            <th class="whitespace-no-wrap" style="width: 40px;">№</th>
                            <th class="whitespace-no-wrap" style="width: 500px;">Loyiha nomi</th>
                            <th class="whitespace-no-wrap" style="text-align: center;">Loyiha rahbari</th>
                            <th class="whitespace-no-wrap" style="text-align: center;">Ijrochi tashkilot</th>
                            <th class="whitespace-no-wrap" style="text-align: center;width:150px !important;">Loyiha amalga xudud</th>
                            <th class="whitespace-no-wrap" style="">Status</th>
                            <th class="whitespace-no-wrap" style="text-align: center;">Holati</th>
                            <th class="whitespace-no-wrap text-center">Harakat</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($tijorat as $tashkilots)
                            <tr class="intro-x">
                                <td>{{ ($tijorat->currentPage() - 1) * $tijorat->perPage() + $loop->iteration }}.</td>
                                <td>
                                    <a href="{{ route('stajirov.index', ['id' => $tashkilots->id]) }}"
                                        class="font-medium">{{ $tashkilots->name }}</a>
                                </td>
                                <td>
                                    {{ $tashkilots->loyiha_rahbari }}
                                </td>
                                <td>
                                    {{ $tashkilots->ijrochi_tashkilot }}
                                </td>
                                <td>
                                    {{ $tashkilots->region->oz ?? '' }}
                                </td>
                                <td
                                    style="color: {{ ($h = $tashkilots->tijoratexpert()->first()->status ?? null) == 'Ijobiy' ? 'green' : ($h == 'Salbiy' ? 'blue' : 'red') }}">
                                    {{ $tashkilots->tijoratexpert()->first()->status ?? 'Tasdiqlanmagan' }}
                                </td>
                                <td
                                    style="color: {{ ($h = $tashkilots->tijoratexpert()->first()->holati ?? null) == 'Tasdiqlandi' ? 'green' : ($h == 'yuborildi' ? 'blue' : 'red') }}">
                                    {{ $h == 'yuborildi' ? 'Tasdiqlash uchun yuborildi' : ($h == null ? "Ko'rilmagan" : $h) }}
                                </td>

                                <td class="table-report__action w-56">
                                    <div class="flex justify-center items-center">
                                        <a class="flex science-update-action items-center mr-3"
                                            href="{{ route('tijorat.show', ['tijorat' => $tashkilots->id]) }}">
                                            <i data-feather="eye" class="feather feather-check-square w-4 h-4 mr-1"></i>
                                            Ko'rish
                                        </a>
                                        @role('super-admin')
                                            <a class="flex science-update-action items-center mr-3"
                                                href="{{ route('tijorat.edit', array_merge(['tijorat' => $tashkilots], request()->query())) }}">
                                                <i data-feather="edit" class="feather feather-check-square w-4 h-4 mr-1"></i>
                                                Tahrirlash
                                            </a>
                                        @endrole
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" style="text-align: center;">Ma'lumot yo'q</td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>
            <div class="intro-y flex flex-wrap sm:flex-row sm:flex-no-wrap items-center mt-3">
                {{ $tijorat->appends(request()->query())->links() }}
            </div>
        </div>

    </div>

    @include('admin.components.file_modal', ['action' => route('tijorat_import')])

    <script>
        document.querySelector('.science-sub-categoryviloyat').addEventListener('change', function() {
            let viloyat = this.value;

            let url = new URL(window.location.href);
            url.searchParams.set('viloyat', viloyat);

            window.location.href = url.toString();
        });
    </script>
@endsection
