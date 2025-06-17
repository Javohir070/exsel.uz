@extends('layouts.admin')

@section('content')

    <div class="content">
        <div class="flex justify-between align-center mt-6 mb-6">

            <h2 class="intro-y text-lg font-medium">Dalolatnomalar</h2>

            <a href="{{ route("dalolatnomas.export") }}" class="button box flex items-center text-gray-700">
                <i data-feather="file-text" class="hidden sm:block w-4 h-4 mr-2"></i>
                Export to Excel
            </a>

        </div>

        @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif

        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <table class="table table-report -mt-2">
                <thead>
                    <tr>
                        <th class="whitespace-no-wrap">№</th>
                        <th class="whitespace-no-wrap">Dalolatnoma nomi </th>
                        <th class="whitespace-no-wrap">Dalolatnoma raqami</th>
                        <th class="whitespace-no-wrap">Joriy etish maqsadi</th>
                        <th class="whitespace-no-wrap">Joriy etilgan tashkilot</th>
                        <th class="whitespace-no-wrap text-center">Harakat</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($dalolatnomas as $xodimlar)

                        <tr class="intro-x">
                            <td>{{$loop->index + 1}}</td>
                            <td>
                                {{ $xodimlar->name }}
                            </td>
                            <td>
                                {{ $xodimlar->raqami }}
                            </td>

                            <td>
                                {{ $xodimlar->joyiye_maqsadi }}
                            </td>

                            <td>
                                {{ $xodimlar->joyiye_tashkilot }}
                            </td>

                            <td class="table-report__action w-56">
                                <div class="flex justify-center items-center">

                                    <a class="flex science-update-action items-center mr-3"
                                        href="{{ route('dalolatnoma.show', ['dalolatnoma' => $xodimlar->id]) }}">
                                        <i data-feather="eye" class="feather feather-check-square w-4 h-4 mr-1"></i>
                                        Ko'rish
                                    </a>

                                    <form action="{{ route('dalolatnoma.destroy', ['dalolatnoma' => $xodimlar->id]) }}"
                                        method="post" onsubmit="return confirm(' Rostan Ochirishni hohlaysizmi?');">
                                        <button type="submit" class="flex delete-action items-center text-theme-6">
                                            @csrf
                                            @method("DELETE")
                                            <i data-feather="trash-2" class="feather feather-check-square w-4 h-4 mr-1"></i>
                                            O'chirish
                                        </button>
                                    </form>

                                </div>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

        <div class="intro-y flex flex-wrap sm:flex-row sm:flex-no-wrap items-center mt-3">
            {{$dalolatnomas->links()}}
        </div>

    </div>

@endsection
