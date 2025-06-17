@extends('layouts.admin')

@section('content')

<div class="content">
    <div class="flex justify-between align-center mt-6 mb-6">

        <h2 class="intro-y text-lg font-medium">Tashkilotlar</h2>

        <!-- <a href="{{ route('tashkilot.create') }}"  class="button w-24 bg-theme-1 text-white">
            Qo'shish
        </a> -->


    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">


        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <table class="table table-report -mt-2">
                <thead>
                    <tr>
                        <th class="whitespace-no-wrap">№</th>
                        <th class="whitespace-no-wrap">Id raqami</th>
                        <th class="whitespace-no-wrap">Tashkilot Nomi</th>
                        <!-- <th class="whitespace-no-wrap">Yuridik manzili</th> -->
                        <th class="whitespace-no-wrap text-center">Harakat</th>
                    </tr>
                </thead>
                <tbody>
                 @foreach ($tashkilot as $tashkilots)

                    <tr class="intro-x">
                        <td>{{ $tashkilots->id}}</td>
                        <td>
                            <a href="" class="font-medium ">{{ $tashkilots->id_raqam  }}</a>
                        </td>
                        <td>
                            <a href="{{ route('tashkilotmalumotlar.show',['tashkilotmalumotlar'=>$tashkilots->id]) }}"   class="font-medium">{{ $tashkilots->name }}</a>
                        </td>
                        <!-- <td>
                            <a href="" class="font-medium ">{{ $tashkilots->yur_manzil }}</a>
                        </td> -->
                        <td class="table-report__action w-56">
                            <div class="flex justify-center items-center">

                                <a class="flex science-update-action items-center mr-3" href="{{ route('tashkilot.show',['tashkilot'=>$tashkilots->id]) }}" >
                                        <i data-feather="eye"  class="feather feather-check-square w-4 h-4 mr-1"></i>
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
            {{$tashkilot->links()}}
        </div>
    </div>






</div>
@endsection
