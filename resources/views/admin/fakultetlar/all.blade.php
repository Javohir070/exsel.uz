@extends('layouts.admin')

@section('content')

    <div class="content">
        <div class="flex justify-between align-center mt-6 mb-6">

            <h2 class="intro-y text-lg font-medium">Fakultetlar</h2>

            <div class="flex justify-between align-center ">
                <div>
                    <a href="{{ route('export.fakultetlar') }}" class="button box flex items-center text-gray-700">
                        <i data-feather="file-text" class="hidden sm:block w-4 h-4 mr-2"></i> Export to Excel
                    </a>
                </div>
            </div>

        </div>

        <form id="science-paper-create-form" method="GET" action="{{ route('fakultets.index') }}" class="validate-form">
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

        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible mb-4">
            <table class="table table-report -mt-2">
                <thead>
                    <tr>
                        <th class="whitespace-no-wrap">№</th>
                        <th class="whitespace-no-wrap">Tashkilot nomi </th>
                        <th class="whitespace-no-wrap">Fakultet nomi </th>
                        <th class="whitespace-no-wrap">Tashkil etilgan yili</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($fakultets as $xodimlar)

                        <tr class="intro-x">
                            <td>{{$loop->index + 1}}</td>
                            <td>
                                {{ $xodimlar->tashkilot->name }}
                            </td>
                            <td>
                                {{ $xodimlar->name }}
                            </td>
                            <td>
                                {{ $xodimlar->tash_yil }}
                            </td>
                        </tr>

                    @endforeach
                </tbody>
            </table>
        </div>

        {{ $fakultets->appends(request()->query())->links() }}

    </div>

@endsection
