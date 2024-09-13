@extends('layouts.admin')

@section('content')

<div class="content">
    <div class="flex justify-between align-center mt-10">

        <h2 class="intro-y text-lg font-medium">Tashkilotlar</h2>

        <!-- <a href="{{ route('tashkilot.create') }}"  class="button w-24 bg-theme-1 text-white">
            Qo'shish
        </a> -->
        <div class="intro-x relative mr-3 sm:mr-6">
            <div class="search hidden sm:block">
            <form action="{{ route('search') }}" method="GET">
                <input type="text" name="query" class="search__input input placeholder-theme-13" placeholder="Search...">
                <i data-feather="search" class="search__icon"></i> 
            </form>
            </div>
            <a class="notification sm:hidden" href=""> <i data-feather="search" class="notification__icon"></i> </a>
        </div>
        <div>
            @role('super-admin')
                <div>
                    <!-- <a href="{{ route("tashqoshish.create") }}" class="button w-24 bg-theme-1 text-white">
                        Qo'shish
                    </a> -->
                    <a href="{{ route('exportashkilot') }}" class="button box flex items-center text-gray-700"> <i data-feather="file-text" class="hidden sm:block w-4 h-4 mr-2"></i> Export to Excel </a>
                </div>
            @endrole
        
        </div>

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
                 @foreach ($tashkilotlar as $tashkilots)
                     
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
                                
                                <a class="flex science-update-action items-center mr-3" href="{{ route('tashkilot.show',['tashkilot'=>$tashkilots->id]) }}" data-id="2978" data-name="sdfd" data-file="/files/papers/4735cda0-a7a3-4a45-bd93-0bc013b857dc.png" data-filename="Screenshot from 2023-04-17 16-23-56.png" data-type="66" data-date="None" data-doi="" data-publisher="" data-description="None" data-authors-count="None" data-toggle="modal" data-target="#science-paper-update-modal">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-square w-4 h-4 mr-1">
                                        <polyline points="9 11 12 14 22 4"></polyline>
                                        <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
                                    </svg>
                                    Ko'rish
                                </a>
                                
                                <form action="{{ route('tashkilot.destroy',['tashkilot'=>$tashkilots->id]) }}" method="post" onsubmit="return confirm(' Rostan Ochirishni hohlaysizmi?');">
                                    <button type="submit" class="flex delete-action items-center text-theme-6" >
                                   @csrf
                                   @method('DELETE')
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 w-4 h-4 mr-1">
                                            <polyline points="3 6 5 6 21 6"></polyline>
                                            <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                            </path>
                                            <line x1="10" y1="11" x2="10" y2="17"></line>
                                            <line x1="14" y1="11" x2="14" y2="17"></line>
                                        </svg>
                                        O'chirish
                                    </button>
                                </form>
                                <form action="{{ route('xodimlar.deleteAll',['tashkilot'=>$tashkilots->id]) }}" method="post" onsubmit="return confirm(' Rostan Ochirishni hohlaysizmi?');">
                                    <button type="submit" class="flex delete-action items-center text-theme-6" >
                                   @csrf
                                   @method('DELETE')
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 w-4 h-4 mr-1">
                                            <polyline points="3 6 5 6 21 6"></polyline>
                                            <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                            </path>
                                            <line x1="10" y1="11" x2="10" y2="17"></line>
                                            <line x1="14" y1="11" x2="14" y2="17"></line>
                                        </svg>
                                        Xodimlar o'chirish
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
            {{$tashkilotlar->links()}}
        </div>
    </div>





   
</div>
@endsection