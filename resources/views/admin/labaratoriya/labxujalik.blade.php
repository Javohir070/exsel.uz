@extends('layouts.admin')

@section('content')

    <div class="content">
        <div class="flex justify-between align-center mt-6 mb-6">

            <h2 class="intro-y text-lg font-medium">Xujalik loyihalar</h2>

            <div>

                <a href="{{ route("xujalik.create") }}" class="button w-24 bg-theme-1 text-white">
                    Qo'shish
                </a>

                <a href="javascript:;" data-target="#science-paper-create-modal" data-toggle="modal"
                    class="button w-24 ml-3 bg-theme-1 text-white">
                    Xo'jalik shartnimalari biriktirish
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
                        <th class="whitespace-no-wrap">Ishlanma nomi</th>
                        <th class="whitespace-no-wrap">Ishlanma yaratilgan tadqiqot mavzusi </th>
                        <th class="whitespace-no-wrap">shartnoma turi</th>
                        <th class="whitespace-no-wrap text-center">Harakat</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($xujalik as $xodimlar)

                        <tr class="intro-x">
                            <td>{{$loop->index + 1}}</td>
                            <td>
                                <a href="" class="font-medium ">{{ $xodimlar->ishlanma_nomi  }} </a>
                            </td>
                            <td>
                                <a href="" class="font-medium ">{{ $xodimlar->ishlanma_mavzu }}</a>
                            </td>
                            <td>
                                <a href="" class="font-medium ">{{ $xodimlar->ishlanma_turi }}</a>
                            </td>
                            <td class="table-report__action w-56">
                                <div class="flex justify-center items-center">
                                    <a class="flex science-update-action items-center mr-3"
                                        href="{{ route('xujalik.edit', ['xujalik' => $xodimlar->id]) }}">
                                        <i data-feather="edit" class="feather feather-check-square w-4 h-4 mr-1"></i>
                                        Tahrirlash
                                    </a>

                                    <a class="flex science-update-action items-center mr-3"
                                        href="{{ route('xujalik.show', ['xujalik' => $xodimlar->id]) }}">
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
            {{$xujalik->links()}}
        </div>

    </div>

    <div class="modal" id="science-paper-create-modal">
        <div class="modal__content modal__content--xl">
            <div class="p-5">

                <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2">
                    <div class="w-full mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                        <form id="science-paper-create-form" method="POST"
                            action="{{ url('lab/' . auth()->user()->laboratory_id . '/give-xujaliks') }}"
                            class="validate-form" enctype="multipart/form-data" novalidate="novalidate">
                            @csrf
                            @method('PUT')
                            <div class="table-container">
                                <table class="table table-report -mt-2">
                                    <thead>
                                        <tr>
                                            <th class="whitespace-no-wrap">№</th>
                                            <th class="whitespace-no-wrap">Ishlanma nomi</th>
                                            <th class="whitespace-no-wrap">Ishlanma yaratilgan tadqiqot mavzusi </th>
                                            <th class="whitespace-no-wrap">shartnoma turi</th>
                                            <th class="whitespace-no-wrap text-center">Biriktirligan</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($tashkilot_xujalik as $xodimlar)

                                            <tr class="intro-x">
                                                <td>{{$loop->index + 1}}</td>
                                                <td>
                                                    <a href="" class="font-medium ">{{ $xodimlar->ishlanma_nomi  }} </a>
                                                </td>
                                                <td>
                                                    <a href="" class="font-medium ">{{ $xodimlar->ishlanma_mavzu }}</a>
                                                </td>
                                                <td>
                                                    <a href="" class="font-medium ">{{ $xodimlar->ishlanma_turi }}</a>
                                                </td>
                                                <td>
                                                    @if ($xodimlar->laboratory_id == null)
                                                        <div class="col-md-2">
                                                            <label>
                                                                <input type="checkbox" name="xujaliklarId[]"
                                                                    value="{{ $xodimlar->id }}" />
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

            <div class="px-5 pb-5 text-center mt-4">
                <button type="button" data-dismiss="modal" class="button delete-cancel w-32 border text-gray-700 mr-1">
                    Bekor qilish
                </button>
                <button type="submit" form="science-paper-create-form"
                    class="update-confirm button w-24 bg-theme-1 text-white">
                    Qo'shish
                </button>
            </div>

        </div>
    </div>
@endsection
