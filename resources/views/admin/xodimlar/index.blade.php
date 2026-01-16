@extends('layouts.admin')

@section('content')

    <div class="content">
        <div class="flex justify-between align-center mt-6 mb-6">

            <h2 class="intro-y text-lg font-medium">Xodimlar</h2>

            <div class="intro-x relative mr-3 sm:mr-6">
                <div class="search hidden sm:block">
                    <form action="{{ route('searchxodim') }}" method="GET">
                        <input type="text" name="search" class="search__input input placeholder-theme-13"
                            placeholder="Search...">
                        <i data-feather="search" class="search__icon"></i>
                    </form>
                </div>
                <a class="notification sm:hidden" href=""> <i data-feather="search" class="notification__icon"></i> </a>
            </div>
            <div>
                <div>
                    <a href="{{ route("xodimlar.create") }}" class="button w-24 bg-theme-1 text-white">
                        Qo'shish
                    </a>

                    <a href="{{ url('tashkilot/' . auth()->user()->tashkilot_id . '/export') }}"
                        class="button ml-3 w-24 bg-theme-1 text-white">
                        Export
                    </a>

                    {{--
                    @include('admin.components.file_button')
                    --}}
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

                    @forelse ($xodimlars as $xodimlar)

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

                                    <form action="{{ route('xodimlar.destroy', ['xodimlar' => $xodimlar->id]) }}" method="post"
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
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">Ma'lumotlar mavjud emas</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="intro-y flex flex-wrap sm:flex-row sm:flex-no-wrap items-center mt-3">
            {{$xodimlars->links()}}
        </div>

    </div>

    @include('admin.components.file_modal', ['action' => route('import')])

@endsection