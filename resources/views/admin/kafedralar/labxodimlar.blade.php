@extends('layouts.admin')

@section('content')

    <div class="content">
        <div class="flex justify-between align-center mt-6 mb-6">

            <h2 class="intro-y text-lg font-medium">Xodimlar</h2>

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
                    <a href="{{ route("xodimlar.create") }}" class="button w-24 bg-theme-1 text-white">
                        Qo'shish
                    </a>

                    {{-- <a href="{{ url('tashkilot/'.auth()->user()->tashkilot_id.'/export') }}"
                        class="button ml-3 w-24 bg-theme-1 text-white">
                        Barcha xodimlarni Excel yuklab olish
                    </a> --}}

                    <a href="javascript:;" data-target="#science-paper-create-modal" data-toggle="modal"
                        class="button w-24 ml-3 bg-theme-1 text-white">
                        Xodimlar biriktirish
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
                        <th class="whitespace-no-wrap">Lavozimi</th>
                        <th class="whitespace-no-wrap">Email</th>
                        <th class="whitespace-no-wrap">Telefon raqami</th>
                        <th class="whitespace-no-wrap text-center">Harakat</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($lab_xodimlar as $xodimlar)

                        <tr class="intro-x">
                            <td>{{$loop->index + 1}}</td>
                            <td>
                                <a href="#" target="_blank" class="font-medium">{{ $xodimlar->fish }}</a>
                            </td>
                            <td>
                                <a href="" class="font-medium ">{{ $xodimlar->lavozimi }}</a>
                            </td>
                            <td>
                                <a href="" class="font-medium ">{{ $xodimlar->email }}</a>
                            </td>

                            <td>
                                <a href="" class="font-medium ">{{ $xodimlar->phone  }} </a>
                            </td>
                            <td class="table-report__action w-56">
                                <div class="flex justify-center items-center">
                                    <a class="flex science-update-action items-center mr-3"
                                        href="{{ route('xodimlar.edit', ['xodimlar' => $xodimlar->id]) }}">
                                        <i data-feather="edit" class="feather feather-check-square w-4 h-4 mr-1"></i>
                                        Tahrirlash
                                    </a>

                                    <a class="flex science-update-action items-center mr-3"
                                        href="{{ route('xodimlar.show', ['xodimlar' => $xodimlar->id]) }}">
                                        <i data-feather="eye" class="feather feather-check-square w-4 h-4 mr-1"></i>
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
            {{$lab_xodimlar->links()}}
        </div>

    </div>
    </div>
    <style>
        .table-container {
            max-height: 600px;
            /* Jadval maksimal balandligini belgilash */
            overflow-y: auto;
            /* Vertikal skroll qo'shish */
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
                        <form id="science-paper-create-form" method="POST"
                            action="{{ url('kaf/' . auth()->user()->kafedralar_id . '/give-xodims') }}" class="validate-form"
                            enctype="multipart/form-data" novalidate="novalidate">
                            @csrf
                            @method('PUT')

                            <!-- Jadval uchun o'rama qism -->
                            <div class="table-container">
                                <table class="table table-report -mt-2">
                                    <thead>
                                        <tr>
                                            <th class="whitespace-no-wrap">№</th>
                                            <th class="whitespace-no-wrap">F.I.Sh</th>
                                            <th class="whitespace-no-wrap">Lavozimi</th>
                                            <th class="whitespace-no-wrap text-center">Biriktirish</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($tashkilot_xodimlar as $xodimlar)
                                            <tr class="intro-x">
                                                <td>{{$loop->index + 1}}</td>
                                                <td>
                                                    <a href="#" target="_blank" class="font-medium">{{ $xodimlar->fish }}</a>
                                                </td>
                                                <td>
                                                    <a href="" class="font-medium ">{{ $xodimlar->lavozimi }}</a>
                                                </td>
                                                <td>
                                                    @if ($xodimlar->kafedralar_id == null)
                                                        <div class="col-md-2">
                                                            <label>
                                                                <input type="checkbox" name="xodimlarId[]"
                                                                    value="{{ $xodimlar->id }}" />
                                                            </label>
                                                        </div>
                                                    @else
                                                        <a href="" class="font-medium ">{{ $xodimlar->kafedralar->name  }} </a>
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
            <div class="px-5 pb-5 text-center mt-4">
                <button type="button" data-dismiss="modal" class="button delete-cancel w-32 border text-gray-700 mr-1">
                    Bekor qilish
                </button>
                <button type="submit" form="science-paper-create-form"
                    class="update-confirm button w-24 bg-theme-1 text-white">
                    Tastiqlash
                </button>
            </div>
        </div>
    </div>

@endsection
