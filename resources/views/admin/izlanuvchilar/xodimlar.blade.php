@extends('layouts.admin')

@section('content')

<div class="content">
    <div class="flex justify-between align-center mt-6 mb-6">

        <h2 class="intro-y text-lg font-medium">Barcha xodimlar </h2>

        <!-- <a href="{{ route('xodimlar.create') }}"  class="button w-24 bg-theme-1 text-white">
            Qo'shish
        </a> -->
        <div class="intro-x relative mr-3 sm:mr-6">
            <div class="search hidden sm:block">
            <form action="{{ route('searchxodimlar') }}" method="GET">
                <input type="text" name="query" class="search__input input placeholder-theme-13" placeholder="Search...">
                <i data-feather="search" class="search__icon"></i>
            </form>
            </div>
            <a class="notification sm:hidden" href=""> <i data-feather="search" class="notification__icon"></i> </a>
        </div>
        <div>
            <div>
                <!-- <a href="{{ route("xodimlar.create") }}" class="button w-24 bg-theme-1 text-white">
                    Qo'shish
                </a> -->
                <a href="{{ route('exporxodimlar') }}" class="button box flex items-center text-gray-700"> <i data-feather="file-text" class="hidden sm:block w-4 h-4 mr-2"></i> Export to Excel </a>
            </div>
        </div>

    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">


        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <table class="table table-report -mt-2">
                <thead>
                    <tr>
                        <th class="whitespace-no-wrap">№</th>
                        <th class="whitespace-no-wrap">Tashkilot nomi</th>
                        <th class="whitespace-no-wrap">F.I.Sh</th>
                        <th class="whitespace-no-wrap">Jinsi</th>
                        <th class="whitespace-no-wrap">Telefon nomeri</th>
                        <th class="whitespace-no-wrap text-center">Harakat</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($xodimlar_barchasi as $maq )

                    <tr class="intro-x">
                        <td>{{$loop->index+1}}</td>
                        <td>
                            <a href="" class="font-medium ">{{ $maq->tashkilot->name_qisqachasi }}</a>
                        </td>
                        <td>
                            <a href="#" target="_blank"  class="font-medium">{{ $maq->fish }}</a>
                        </td>
                        <td>
                            <a href="" class="font-medium ">{{ $maq->jinsi  }}</a>
                        </td>
                        <td>
                            <a href="" class="font-medium ">{{ $maq->phone }}</a>
                        </td>
                        <td class="table-report__action w-56">
                            <div class="flex justify-center items-center">

                                <a class="flex science-update-action items-center mr-3" href="{{ route('xodimlar.show',['xodimlar'=>$maq->id]) }}" >
                                        <i data-feather="eye"  class="feather feather-check-square w-4 h-4 mr-1"></i>
                                    Ko'rish
                                </a>

                                <form action="{{ route('xodimlar.destroy',['xodimlar'=>$maq->id]) }}" method="post" onsubmit="return confirm(' Rostan Ochirishni hohlaysizmi?');">
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
            {{$xodimlar_barchasi->links()}}
        </div>


    </div>






</div>
@endsection
