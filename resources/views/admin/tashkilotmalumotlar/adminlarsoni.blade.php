@extends('layouts.admin')

@section('content')
    <div class="content">
        <div class="flex justify-between align-center mt-6 mb-6">

            <h2 class="intro-y text-lg font-medium">Tashkilotlar adminlar</h2>

        </div>
        <div class="grid grid-cols-12 gap-6 mt-5">
            <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
                <table class="table table-report -mt-2">
                    <thead>
                        <tr>
                            <th class="whitespace-no-wrap">№</th>
                            <th class="whitespace-no-wrap">Adminlar soni</th>
                            <th class="whitespace-no-wrap">Tashkilot Nomi</th>
                            <th class="whitespace-no-wrap text-center">Harakat</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($adminlar as $tashkilots)
                            <tr class="intro-x">
                                <td>{{ ($adminlar->currentpage() - 1) * $adminlar->perpage() + $loop->index + 1 }}</td>
                                <td>
                                    {{ $tashkilots->user_count }}
                                </td>
                                <td>
                                    <a href="{{ route('tashkilotmalumotlar.show', ['tashkilotmalumotlar' => $tashkilots->id]) }}"
                                        class="font-medium">{{ $tashkilots->name }}</a>
                                </td>
                                <td class="table-report__action w-56">
                                    <div class="flex justify-center items-center">
                                        <a class="flex science-update-action items-center mr-3"
                                            href="{{ route('tashkilot.show', ['tashkilot' => $tashkilots->id]) }}">
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
                {{ $adminlar->links() }}
            </div>
        </div>
    </div>
@endsection