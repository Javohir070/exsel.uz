@extends('layouts.admin')

@section('content')

<div class="content">
    <div class="flex justify-between align-center mt-6 mb-6">

        <h2 class="intro-y text-lg font-medium">Monografiyalar</h2>

        <a href="{{ route("monografiyalars.export") }}" class="button box flex items-center text-gray-700"> <i data-feather="file-text" class="hidden sm:block w-4 h-4 mr-2"></i> Export to Excel </a>
        <!-- <div>
            <a href="{{ route("monografiyalar.create") }}" class="button w-24 ml-3 bg-theme-1 text-white">
                Qo'shish
            </a>
        </div> -->


    </div>
    @if (session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif
    <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
        <table class="table table-report -mt-2">
            <thead>
                <tr>
                    <th class="whitespace-no-wrap">№</th>
                    <th class="whitespace-no-wrap">Monografiya nomi</th>
                    <th class="whitespace-no-wrap">Nashr yili</th>
                    <th class="whitespace-no-wrap">Chop etilgan nashriyot</th>
                    <th class="whitespace-no-wrap text-center">Harakat</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($monografiyalars as $xodimlar)

                    <tr class="intro-x">
                        <td>{{$loop->index + 1}}</td>
                        <td>
                            {{ $xodimlar->name }}
                        </td>
                        <td>
                            {{ $xodimlar->nashr_yili }}
                        </td>
                        <td>
                            {{ $xodimlar->chop_etil_nashriyot }}
                        </td>
                        <td class="table-report__action w-56">
                            <div class="flex justify-center items-center">
                                <!-- <a class="flex science-update-action items-center mr-3"
                                    href="{{ route('monografiyalar.edit', ['monografiyalar' => $xodimlar->id]) }}">
                                    <i data-feather="edit"  class="feather feather-check-square w-4 h-4 mr-1"></i>
                                    Tahrirlash
                                </a> -->

                                <a class="flex science-update-action items-center mr-3"
                                    href="{{ route('monografiyalar.show', ['monografiyalar' => $xodimlar->id]) }}">
                                    <i data-feather="eye"  class="feather feather-check-square w-4 h-4 mr-1"></i>
                                    Ko'rish
                                </a>

                                <form action="{{ route('monografiyalar.destroy',['monografiyalar'=>$xodimlar->id]) }}" method="post" onsubmit="return confirm(' Rostan Ochirishni hohlaysizmi?');">
                                    <button type="submit" class="flex delete-action items-center text-theme-6" >
                                    @csrf
                                    @method("DELETE")
                                        <i data-feather="trash-2"  class="feather feather-check-square w-4 h-4 mr-1"></i>
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
        {{$monografiyalars->links()}}
    </div>

</div>






@endsection
