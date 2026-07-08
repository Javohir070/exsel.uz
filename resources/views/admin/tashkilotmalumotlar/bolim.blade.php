@extends('layouts.admin')

@section('content')
    <div class="content">
        <div class="flex justify-between align-center mt-6 mb-6">
            <h2 class="intro-y text-lg font-medium">
                {{ $tashkilot->name }} — {{ $config['title'] }}
                <span class="text-gray-500 text-base font-normal">({{ $items->total() }} ta)</span>
            </h2>
            <a href="{{ route('tashkilotmalumotlar.show', ['tashkilotmalumotlar' => $tashkilot->id]) }}"
                class="button w-24 bg-theme-1 text-white">
                Orqaga
            </a>
        </div>

        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <table class="table table-report -mt-2">
                <thead>
                    <tr>
                        <th class="whitespace-no-wrap">№</th>
                        @foreach ($config['columns'] as $column)
                            <th class="whitespace-no-wrap">{{ $column['label'] }}</th>
                        @endforeach
                        @if (!empty($config['show_route']))
                            <th class="whitespace-no-wrap text-center">Harakat</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @forelse ($items as $item)
                        <tr class="intro-x">
                            <td>{{ ($items->currentPage() - 1) * $items->perPage() + $loop->iteration }}</td>
                            @foreach ($config['columns'] as $column)
                                <td>{{ data_get($item, $column['key']) ?? '—' }}</td>
                            @endforeach
                            @if (!empty($config['show_route']))
                                <td class="table-report__action w-56">
                                    <div class="flex justify-center items-center">
                                        <a class="flex science-update-action items-center mr-3"
                                            href="{{ route($config['show_route'], [$config['show_param'] => $item->id]) }}">
                                            <i data-feather="eye" class="feather feather-check-square w-4 h-4 mr-1"></i>
                                            Ko'rish
                                        </a>
                                    </div>
                                </td>
                            @endif
                        </tr>
                    @empty
                        <tr>
                            <td colspan="{{ count($config['columns']) + (!empty($config['show_route']) ? 2 : 1) }}"
                                class="text-center text-gray-500 py-6">
                                Ma'lumot topilmadi
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="intro-y flex flex-wrap sm:flex-row sm:flex-no-wrap items-center mt-3">
            {{ $items->links() }}
        </div>
    </div>
@endsection
