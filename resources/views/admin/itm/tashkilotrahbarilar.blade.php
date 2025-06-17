@extends('layouts.admin')

@section('content')

<div class="content">
    <div class="flex justify-between align-center mt-6 mb-6">

        <h2 class="intro-y text-lg font-medium">Tashkilot rahbarlar </h2>

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
                        <th class="whitespace-no-wrap">Tashkilot Nomi</th>
                        <th class="whitespace-no-wrap">F.I.Sh</th>
                        <th class="whitespace-no-wrap">Email</th>
                        <th class="whitespace-no-wrap">Telepon nomeri</th>
                        <th class="whitespace-no-wrap text-center">Harakat</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($tashkilotrahbari as $maq )

                    <tr class="intro-x">
                        <td>{{$loop->index+1}}</td>
                        <td>
                            <a href="#" target="_blank"  class="font-medium">{{ $maq->tashkilot->name_qisqachasi }}</a>
                        </td>
                        <td>
                            <a href="" class="font-medium ">{{ $maq->fish  }}</a>
                        </td>
                        <td>
                            <a href="" class="font-medium ">{{ $maq->email  }}</a>
                        </td>
                        <td>
                            <a href="" class="font-medium ">{{ $maq->phone }}</a>
                        </td>
                        <td class="table-report__action w-56">
                            <div class="flex justify-center items-center">

                                <a class="flex science-update-action items-center mr-3" href="{{ route('tashkilotrahbari.show',['tashkilotrahbari'=>$maq->id]) }}" >
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
            {{$tashkilotrahbari->links()}}
        </div>

    </div>






</div>
@endsection
