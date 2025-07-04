@extends('layouts.admin')

@section('content')

    <div class="content">

        <div class="flex justify-between align-center mt-6 mb-6">

            <h2 class="intro-y text-lg font-medium">Ilmiy loyihalar</h2>
            <div>
                <a href="{{ route("ilmiyloyiha.create") }}" class="button w-24 bg-theme-1 text-white">
                    Qo'shish
                </a>
                <a href="javascript:;" data-target="#science-paper-create-modal" data-toggle="modal"
                    class="button w-24 ml-3 bg-theme-1 text-white">
                    Ilmiy loyihalar biriktirish
                </a>
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
                        <th class="whitespace-no-wrap">Loyiha mavzusi</th>
                        <th class="whitespace-no-wrap">Loyiha rahbari</th>
                        <th class="whitespace-no-wrap">Loyiha turi</th>
                        <th class="whitespace-no-wrap">Loyiha dasturi</th>
                        <th class="whitespace-no-wrap text-center">Harakat</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($ilmiyloyiha as $xodimlar)

                        <tr class="intro-x">
                            <td>{{$loop->index + 1}}</td>
                            <td>
                                <a href="" class="font-medium ">{{ $xodimlar->mavzusi  }} </a>
                            </td>
                            <td>
                                <a href="" class="font-medium ">{{ $xodimlar->rahbar_name }}</a>
                            </td>
                            <td>
                                <a href="" class="font-medium ">{{ $xodimlar->turi }}</a>
                            </td>
                            <td>
                                <a href="" class="font-medium ">{{ $xodimlar->dastyri }}</a>
                            </td>
                            <td class="table-report__action w-56">
                                <div class="flex justify-center items-center">
                                    <!-- <a class="flex science-update-action items-center mr-3" href="{{ route('ilmiyloyiha.edit',['ilmiyloyiha'=>$xodimlar->id]) }}" >
                                                <i data-feather="edit"  class="feather feather-check-square w-4 h-4 mr-1"></i>
                                            Tahrirlash
                                        </a> -->

                                    <a class="flex science-update-action items-center mr-3"
                                        href="{{ route('ilmiyloyiha.show', ['ilmiyloyiha' => $xodimlar->id]) }}">
                                        <i data-feather="eye" class="feather feather-check-square w-4 h-4 mr-1"></i>
                                        Ko'rish
                                    </a>

                                    <!-- <form action="{{ route('ilmiyloyiha.destroy',['ilmiyloyiha'=>$xodimlar->id]) }}" method="post" onsubmit="return confirm(' Rostan Ochirishni hohlaysizmi?');">
                                            <button type="submit" class="flex delete-action items-center text-theme-6" >
                                            @csrf
                                            @method("DELETE")
                                                <i data-feather="trash-2"  class="feather feather-check-square w-4 h-4 mr-1"></i>
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
            {{$ilmiyloyiha->links()}}
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
                            action="{{ url('kaf/' . auth()->user()->kafedralar_id . '/give-ilmiyloyhas') }}"
                            class="validate-form" enctype="multipart/form-data" novalidate="novalidate">
                            @csrf
                            @method('PUT')
                            <div class="table-container">
                                <table class="table table-report -mt-2">
                                    <thead>
                                        <tr>
                                            <th class="whitespace-no-wrap">№</th>
                                            <th class="whitespace-no-wrap">Loyiha mavzusi</th>
                                            <th class="whitespace-no-wrap">Loyiha rahbari</th>
                                            <th class="whitespace-no-wrap">Loyiha turi</th>
                                            <th class="whitespace-no-wrap text-center">Biriktirish</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($tashkilot_ilmiyloyiha as $xodimlar)

                                            <tr class="intro-x">
                                                <td>{{$loop->index + 1}}</td>
                                                <td>
                                                    <a href="" class="font-medium ">{{ $xodimlar->mavzusi  }} </a>
                                                </td>
                                                <td>
                                                    <a href="" class="font-medium ">{{ $xodimlar->rahbar_name }}</a>
                                                </td>
                                                <td>
                                                    <a href="" class="font-medium ">{{ $xodimlar->turi }}</a>
                                                </td>
                                                <td>
                                                    @if ($xodimlar->kafedralar_id == null)
                                                        <div class="col-md-2">
                                                            <label>
                                                                <input type="checkbox" name="ilmiyloyhalarId[]"
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
                    Tasdiqlash
                </button>
            </div>
            
        </div>
    </div>
@endsection
