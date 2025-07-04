@extends('layouts.admin')

@section('content')

    <div class="content">
        <div class="flex justify-between align-center mt-6 mb-6">

            <h2 class="intro-y text-lg font-medium">Labaratoriyalar </h2>

            <div>
                <div class="flex justify-between align-center ">
                    <div>
                        <a href="{{ route("export_lab") }}" class="button box flex items-center text-gray-700">
                            <i data-feather="file-text" class="hidden sm:block w-4 h-4 mr-2"></i> Export to Excel
                        </a>
                    </div>
                </div>

            </div>

        </div>

        <form id="science-paper-create-form" method="GET" action="{{ route('laboratoriyalari.index') }}"
            class="validate-form">
            <div class="flex justify-between align-center gap-6 flex-wrap">

                <div class="relative text-gray-700">
                    <input type="text" name="search" value="{{ request('search') }}"
                        class="input input--lg w-full lg:w-64 box pr-10 placeholder-theme-13" placeholder="Qidiruv...">
                    <i data-feather="search"
                        class="feather feather-search w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0"></i>
                </div>

                <div class="relative text-gray-700">
                    <select name="yil" value="{{ old('yil') }}" class="science-sub-categoryyil input border w-full mt-2 ">
                        <option value="">Yilni tanlang</option>
                        <option value="all">Barchasi</option>
                    </select>
                </div>

                <button type="submit" class="update-confirm button w-24 bg-theme-1 text-white">
                    Izlash
                </button>

            </div>
        </form>

        @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif

        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <table class="table table-report -mt-2">
                <thead>
                    <tr>
                        <th class="whitespace-no-wrap">№</th>
                        <th class="whitespace-no-wrap">Laboratoriya nomi </th>
                        <th class="whitespace-no-wrap">Tashkil etilgan yili</th>
                        <th class="whitespace-no-wrap">Masul</th>
                        <th class="whitespace-no-wrap text-center">Harakat</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($laboratoriyalari as $xodimlar)

                        <tr class="intro-x">
                            <td>{{$loop->index + 1}}</td>
                            <td>
                                <a href="{{ route('laboratory.show', ['laboratory' => $xodimlar->id]) }}"
                                    class="font-medium">{{ $xodimlar->name }}</a>
                            </td>
                            <td>
                                <a href="" class="font-medium ">{{ $xodimlar->tash_yil }}</a>
                            </td>
                            <td>
                                <a href="" class="font-medium ">{{ $xodimlar->user->name ?? "Masul biriktirimagan" }}</a>
                            </td>
                            <td class="table-report__action w-56">
                                <div class="flex justify-center items-center">
                                    <a class="flex science-update-action items-center mr-3"
                                        href="{{ route('laboratory.edit', ['laboratory' => $xodimlar->id]) }}">
                                        <i data-feather="edit" class="feather feather-check-square w-4 h-4 mr-1"></i>
                                        Tahrirlash
                                    </a>

                                    <a class="flex science-update-action items-center mr-3"
                                        href="{{ route('laboratory.show', ['laboratory' => $xodimlar->id]) }}">
                                        <i data-feather="eye" class="feather feather-check-square w-4 h-4 mr-1"></i>
                                        Ko'rish
                                    </a>

                                    <form action="{{ route('laboratory.destroy', ['laboratory' => $xodimlar->id]) }}"
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
            {{ $laboratoriyalari->appends(request()->query())->links() }}
        </div>

    </div>

@endsection
