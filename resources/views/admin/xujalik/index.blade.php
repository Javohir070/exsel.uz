@extends('layouts.admin')

@section('content')

<div class="content">
    <div class="flex justify-between align-center mt-6 mb-6">

        <h2 class="intro-y text-lg font-medium">Xujalik loyihalar</h2>

        <a href="{{ route("xujalik.create") }}" class="button w-24 bg-theme-1 text-white">
            Qo'shish
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
                    <th class="whitespace-no-wrap">Ishlanma nomi</th>
                    <th class="whitespace-no-wrap">Ishlanma yaratilgan tadqiqot mavzusi </th>
                    <th class="whitespace-no-wrap">shartnoma turi</th>
                    <th class="whitespace-no-wrap text-center">Harakat</th>
                </tr>
            </thead>
            <tbody>

                @forelse ($xujalik as $xodimlar)

                <tr class="intro-x">
                    <td>{{$loop->index + 1}}</td>
                    <td>
                        {{ $xodimlar->ishlanma_nomi }}
                    </td>
                    <td>
                        {{ $xodimlar->ishlanma_mavzu }}
                    </td>
                    <td>
                        {{ $xodimlar->ishlanma_turi }}
                    </td>
                    <td class="table-report__action w-56">
                        <div class="flex justify-center items-center">
                            <a class="flex science-update-action items-center mr-3"
                                href="{{ route('xujalik.edit', ['xujalik' => $xodimlar->id]) }}">
                                <i data-feather="edit" class="feather feather-check-square w-4 h-4 mr-1"></i>
                                Tahrirlash
                            </a>

                            <a class="flex science-update-action items-center mr-3"
                                href="{{ route('xujalik.show', ['xujalik' => $xodimlar->id]) }}">
                                <i data-feather="eye" class="feather feather-check-square w-4 h-4 mr-1"></i>
                                Ko'rish
                            </a>

                            <form action="{{ route('xujalik.destroy',['xujalik'=>$xodimlar->id]) }}" method="post" onsubmit="return confirm(' Rostan Ochirishni hohlaysizmi?');">
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
                @empty
                <tr>
                    <td colspan="6" class="text-center">Ma'lumotlar topilmadi</td>
                </tr>
                @endforelse

            </tbody>
        </table>
    </div>

    <div class="intro-y flex flex-wrap sm:flex-row sm:flex-no-wrap items-center mt-3">
        {{$xujalik->links()}}
    </div>

</div>

@endsection