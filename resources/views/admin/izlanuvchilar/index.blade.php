@extends('layouts.admin')

@section('content')

<div class="content">
    <div class="flex justify-between align-center mt-10">

        <h2 class="intro-y text-lg font-medium">Ilmiy izlanuvchilar</h2>

        <!-- <a href="{{ route("xodimlar.create") }}" class="button w-24 bg-theme-1 text-white">
            Qo'shish
        </a> -->
        {{-- <div class="intro-x relative mr-3 sm:mr-6">
            <div class="search hidden sm:block">
                <form action="{{ route('searchxodim') }}" method="GET">
                    <input type="text" name="search" class="search__input input placeholder-theme-13"
                        placeholder="Search...">
                    <i data-feather="search" class="search__icon"></i>
                </form>
            </div>
            <a class="notification sm:hidden" href=""> <i data-feather="search" class="notification__icon"></i> </a>
        </div> --}}
        <div>
            <div>
                <a href="{{ route("izlanuvchilar.create") }}" class="button w-24 bg-theme-1 text-white">
                    Qo'shish
                </a>

                {{-- <a href="{{ url('tashkilot/'.auth()->user()->tashkilot_id.'/export') }}" class="button ml-3 w-24 bg-theme-1 text-white">
                   Barcha xodimlarni Excel yuklab olish
                </a> --}}

                <a href="javascript:;" data-target="#science-paper-create-modal" data-toggle="modal" 
                    class="button w-24 ml-3 bg-theme-1 text-white">
                    Ilmiy izlanuvchi biriktirish
                </a>
            </div>
        </div>

    </div>
    @if (session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif

    <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
        <table class="table table-report -mt-2">
            <thead>
                <tr>
                    <th class="whitespace-no-wrap">№</th>
                    <th class="whitespace-no-wrap">F.I.Sh</th>
                    <th class="whitespace-no-wrap">Ta'lim turi</th>
                    <th class="whitespace-no-wrap">Qabul qilingan yili</th>
                    <th class="whitespace-no-wrap">Telefon raqami</th>
                    <th class="whitespace-no-wrap text-center">Harakat</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($izlanuvchilar as $xodimlar)

                    <tr class="intro-x">
                        <td>{{$loop->index + 1}}</td>
                        <td>
                            <a href="{{ route('izlanuvchilar.show', ['izlanuvchilar' => $xodimlar->id]) }}"  class="font-medium">{{ $xodimlar->fish }}</a>
                        </td>
                        <td>
                            <a href="" class="font-medium ">{{ $xodimlar->talim_turi }}</a>
                        </td>
                        <td>
                            <a href="" class="font-medium ">{{ $xodimlar->qabul_qilgan_yil }}</a>
                        </td>

                        <td>
                            <a href="" class="font-medium ">+{{ $xodimlar->phone  }} </a>
                        </td>
                        <td class="table-report__action w-56">
                            <div class="flex justify-center items-center">
                                <a class="flex science-update-action items-center mr-3"
                                    href="{{ route('izlanuvchilar.edit', ['izlanuvchilar' => $xodimlar->id]) }}" data-id="2978"
                                    data-name="sdfd" data-file="/files/papers/4735cda0-a7a3-4a45-bd93-0bc013b857dc.png"
                                    data-filename="Screenshot from 2023-04-17 16-23-56.png" data-type="66" data-date="None"
                                    data-doi="" data-publisher="" data-description="None" data-authors-count="None"
                                    data-toggle="modal" data-target="#science-paper-update-modal">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-check-square w-4 h-4 mr-1">
                                        <polyline points="9 11 12 14 22 4"></polyline>
                                        <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
                                    </svg>
                                    Tahrirlash
                                </a>

                                <a class="flex science-update-action items-center mr-3"
                                    href="{{ route('izlanuvchilar.show', ['izlanuvchilar' => $xodimlar->id]) }}" data-id="2978"
                                    data-name="sdfd" data-file="/files/papers/4735cda0-a7a3-4a45-bd93-0bc013b857dc.png"
                                    data-filename="Screenshot from 2023-04-17 16-23-56.png" data-type="66" data-date="None"
                                    data-doi="" data-publisher="" data-description="None" data-authors-count="None"
                                    data-toggle="modal" data-target="#science-paper-update-modal">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-check-square w-4 h-4 mr-1">
                                        <polyline points="9 11 12 14 22 4"></polyline>
                                        <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
                                    </svg>
                                    Ko'rish
                                </a>

                                <!-- <form action="{{ route('xodimlar.destroy',['xodimlar'=>$xodimlar->id]) }}" method="post" onsubmit="return confirm(' Rostan Ochirishni hohlaysizmi?');">
                                        <button type="submit" class="flex delete-action items-center text-theme-6" >
                                        @csrf
                                        @method("DELETE")
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 w-4 h-4 mr-1">
                                                <polyline points="3 6 5 6 21 6"></polyline>
                                                <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                </path>
                                                <line x1="10" y1="11" x2="10" y2="17"></line>
                                                <line x1="14" y1="11" x2="14" y2="17"></line>
                                            </svg>
                                            O'chirish
                                        </button>
                                    </form> -->

                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="intro-y flex flex-wrap sm:flex-row sm:flex-no-wrap items-center mt-3">
        {{$izlanuvchilar->links()}}
    </div>

</div>
</div>
<style>
    .table-container {
        max-height: 600px; /* Jadval maksimal balandligini belgilash */
        overflow-y: auto; /* Vertikal skroll qo'shish */
    }

    .table thead {
        position: sticky;
        top: 0;
        /* background-color: #fff; Orqa fon rangini belgilash */
        z-index: 1;
    }

</style>

<div class="modal" id="science-paper-create-modal">
    <div class="modal__content modal__content--xl">
        <div class="p-5">

            <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2">
                <div class="w-full mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                    <form id="science-paper-create-form" method="POST" action="{{ url('lab/'.auth()->user()->laboratory_id.'/give-izlanuvchilar') }}"
                        class="validate-form" enctype="multipart/form-data" novalidate="novalidate">
                        @csrf
                        @method('PUT')
                        <div class="table-container">

                            <table class="table table-report ">
                                <thead>
                                    <tr>
                                        <th class="whitespace-no-wrap">№</th>
                                        <th class="whitespace-no-wrap">F.I.Sh</th>
                                        <th class="whitespace-no-wrap">Ta'lim turi</th>
                                        <th class="whitespace-no-wrap text-center">Biriktirish</th>
                                    </tr>
                                </thead>
                                <tbody>
                    
                                    @foreach ($tashkilot_izlanuvchilar as $xodimlar)
                    
                                        <tr class="intro-x">
                                            <td>{{$loop->index + 1}}</td>
                                            <td>
                                                <a href="#" target="_blank" class="font-medium">{{ $xodimlar->fish }}</a>
                                            </td>
                                            <td>
                                                <a href="" class="font-medium ">{{ $xodimlar->talim_turi }}</a>
                                            </td>
                                            <td class="table-report__action w-56">
                                                
                                                @if ($xodimlar->laboratory_id == null)
                                                <div class="col-md-2">
                                                    <label>
                                                        <input
                                                            type="checkbox"
                                                            name="izlanuvchilarId[]"
                                                            value="{{ $xodimlar->id }}"
                                                        />
                                                    </label>
                                                </div>
                                            @else
                                                <a href="" class="font-medium ">{{ $xodimlar->laboratory->name  }} </a>
                                            @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </form>
                </div>
            </div>


        </div>
        <div class="px-5 pb-5 text-center">
            
          
            <button type="button" data-dismiss="modal" class="button delete-cancel w-32 border text-gray-700 mr-1">
                Bekor qilish
            </button>
            <button type="submit" form="science-paper-create-form"
                class="update-confirm button w-24 bg-theme-1 text-white">
                Tasdiqlash
            </button>
        </div>
    </div>
</div>
@endsection