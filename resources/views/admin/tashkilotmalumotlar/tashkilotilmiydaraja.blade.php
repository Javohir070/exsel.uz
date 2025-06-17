@extends('layouts.admin')

@section('content')

    <div class="content">
        <div class="flex justify-between align-center mt-6 mb-6">

            <h2 class="intro-y text-lg font-medium"> Loyiha loyiha bilan taminlangami </h2>

        </div>

        @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif

        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <table class="table table-report -mt-2">
                <thead>
                    <tr>
                        <th class="whitespace-no-wrap">№</th>
                        <th class="whitespace-no-wrap">Tashkilot nomi</th>
                        <th class="whitespace-no-wrap">Ilmiy loyiha nomi</th>
                        <th class="whitespace-no-wrap">Loyiha turi</th>
                        <th class="whitespace-no-wrap">Moliyalashtirish hajmi </th>
                        <th class="whitespace-no-wrap text-center">Harakat</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($ilmiydarajalar as $xodimlar)

                        <tr class="intro-x">
                            <td>{{$loop->index + 1}}</td>
                            <td>
                                <a href="#" target="_blank" class="font-medium">{{ $xodimlar->tashkilot->name_qisqachasi }}</a>
                            </td>
                            <td>
                                <a href="" class="font-medium ">{{ $xodimlar->name  }} </a>
                            </td>
                            <td>
                                <a href="" class="font-medium ">{{ $xodimlar->turi }}</a>
                            </td>
                            <td>
                                <a href="" class="font-medium ">{{ $xodimlar->moliyal_jami }}</a>
                            </td>
                            <td class="table-report__action w-56">
                                <div class="flex justify-center items-center">


                                    <a class="flex science-update-action items-center mr-3"
                                        href="{{ route('ilmiydaraja.show', ['ilmiydaraja' => $xodimlar->id]) }}">
                                        <i data-feather="eye" class="feather feather-check-square w-4 h-4 mr-1"></i>
                                        Ko'rish
                                    </a>

                                    <form action="{{ route('ilmiydaraja.destroy', ['ilmiydaraja' => $xodimlar->id]) }}"
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
            {{$ilmiydarajalar->links()}}
        </div>

    </div>

@endsection
