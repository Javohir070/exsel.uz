@extends('layouts.admin')

@section('content')

    <div class="content">
        <div class="flex justify-between align-center mt-6 mb-6">

            <h2 class="intro-y text-lg font-medium">Iqtisodiy Moliyaviy faoliyat </h2>

        </div>

        <div class="grid grid-cols-12 gap-6 mt-5">


            <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
                <table class="table table-report -mt-2">
                    <thead>
                        <tr>
                            <th class="whitespace-no-wrap">№</th>
                            <th class="whitespace-no-wrap">Tashkilot Nomi</th>
                            <th class="whitespace-no-wrap">Tashkilot kadastr raqami</th>
                            <th class="whitespace-no-wrap">Umumiy maydoni (ga)</th>
                            <th class="whitespace-no-wrap">Binolar soni</th>
                            <th class="whitespace-no-wrap text-center">Harakat</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($iqtisodiylar as $maq)

                            <tr class="intro-x">
                                <td>{{$loop->index + 1}}</td>
                                <td>
                                    <a href="#" target="_blank" class="font-medium">{{ $maq->tashkilot->name_qisqachasi }}</a>
                                </td>
                                <td>
                                    <a href="#" target="_blank" class="font-medium">{{ $maq->kadastr_raqami }}</a>
                                </td>
                                <td>
                                    <a href="" class="font-medium ">{{ $maq->u_maydoni  }}</a>
                                </td>
                                <td>
                                    <a href="" class="font-medium ">{{ $maq->binolar_soni }}</a>
                                </td>
                                <td class="table-report__action w-56">
                                    <div class="flex justify-center items-center">

                                        <a class="flex science-update-action items-center mr-3"
                                            href="{{ route('iqtisodiy.show', ['iqtisodiy' => $maq->id]) }}">
                                            <i data-feather="eye" class="feather feather-check-square w-4 h-4 mr-1"></i>
                                            Ko'rish
                                        </a>

                                        <form action="{{ route('iqtisodiy.destroy', ['iqtisodiy' => $maq->id]) }}" method="post"
                                            onsubmit="return confirm(' Rostan Ochirishni hohlaysizmi?');">
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
                {{$iqtisodiylar->links()}}
            </div>
        </div>
    </div>

@endsection
