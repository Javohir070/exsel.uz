@extends('layouts.admin')

@section('content')

    <div class="content">
        <div class="flex justify-between align-center mt-6 mb-6">

            <h2 class="intro-y text-lg font-medium"> Xo'jalik shartnomalar </h2>

            <div>
                <div class="flex justify-between align-center ">
                    <div>
                        <a href="{{ route("exporxujaliklar") }}" class="button box flex items-center text-gray-700">
                            <i data-feather="file-text" class="hidden sm:block w-4 h-4 mr-2"></i> Export to Excel
                        </a>
                    </div>
                </div>
            </div>

        </div>

        <form id="science-paper-create-form" method="GET" action="{{ route('xujaliklar.index') }}" class="validate-form">
            <div class="flex justify-between align-center gap-6 flex-wrap">

                <div class="relative text-gray-700">
                    <input type="text" name="search" value="{{ request('search') }}"
                        class="input input--lg w-full lg:w-64 box pr-10 placeholder-theme-13" placeholder="Qidiruv...">
                    <i data-feather="search"
                        class="feather feather-search w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0"></i>
                </div>

                <div class="relative text-gray-700">
                    <select name="ishlanma_turi" value="{{ old('ishlanma_turi') }}" id="science-sub-category"
                        class="input border w-full mt-2">

                        <option value="">Turini tanlang</option>

                        <option value="all">Barchasi</option>

                        <option value="Amaliy">Amaliy</option>

                        <option value="Innovatsion">Innovatsion</option>
                        <option value="Fundamental">Fundamental</option>

                        <option value="Xizmat ko'rsatishni">Xizmat ko'rsatishni</option>

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
                        <th class="whitespace-no-wrap">Tashkilot nomi</th>
                        <th class="whitespace-no-wrap">Ishlanma nomi</th>
                        <th class="whitespace-no-wrap">Shartnoma turi</th>
                        <th class="whitespace-no-wrap">Ishlanma yaratilgan tadqiqot mavzusi</th>
                        <th class="whitespace-no-wrap">Status</th>
                        <th class="whitespace-no-wrap text-center">Harakat</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($xujaliklar as $xodimlar)

                        <tr class="intro-x">
                            <td>{{$loop->index + 1}}</td>
                            <td>
                                <a href="{{ route('xujalik.show', ['xujalik' => $xodimlar->id]) }}" target="_blank"
                                    class="font-medium">{{ $xodimlar->tashkilot->name_qisqachasi }}</a>
                            </td>
                            <td>
                                {{ $xodimlar->ishlanma_nomi  }}
                            </td>
                            <td>
                                {{ $xodimlar->ishlanma_turi }}
                            </td>
                            <td>
                                {{ $xodimlar->ishlanma_mavzu }}
                            </td>
                            <td>
                                {{ $xodimlar->status }}
                            </td>
                            <td class="table-report__action w-56">
                                <div class="flex justify-center items-center">


                                    <a class="flex science-update-action items-center mr-3"
                                        href="{{ route('xujalik.show', ['xujalik' => $xodimlar->id]) }}">
                                        <i data-feather="eye" class="feather feather-check-square w-4 h-4 mr-1"></i>
                                        Ko'rish
                                    </a>
                                    @role(['super-admin'])
                                    <form action="{{ route('xujalik.destroy', ['xujalik' => $xodimlar->id]) }}" method="post"
                                        onsubmit="return confirm(' Rostan Ochirishni hohlaysizmi?');">
                                        <button type="submit" class="flex delete-action items-center text-theme-6">
                                            @csrf
                                            @method("DELETE")
                                            <i data-feather="trash-2" class="feather feather-check-square w-4 h-4 mr-1"></i>
                                            O'chirish
                                        </button>
                                    </form>
                                    @endrole

                                </div>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

        <div class="intro-y flex flex-wrap sm:flex-row sm:flex-no-wrap items-center mt-3">
            {{ $xujaliklar->appends(request()->query())->links() }}
        </div>

    </div>

@endsection
