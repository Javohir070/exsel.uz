@extends('layouts.admin')

@section('content')

    <div class="content">
        <div class="flex justify-between align-center mt-6 mb-6">

            <h2 class="intro-y text-lg font-medium">Xarid qilingan asbob-uskunalar Fayl</h2>
            <div>
                <a href="{{ route("asbobuskuna.create") }}" class="button w-24 bg-theme-1 text-white mr-2">
                    Qo'shish
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
                        <th class="whitespace-no-wrap">Tashkilot nomi</th>
                        <th class="whitespace-no-wrap">Status</th>
                        <th class="whitespace-no-wrap">Fayl</th>
                        <th class="whitespace-no-wrap text-center">Harakat</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($asbobuskunafile as $k)

                        <tr class="intro-x">
                            <td>{{$loop->index + 1}}</td>
                            <td>{{$k->tashkilot->name}}</td>
                            <td>{{ $k->status == 'approved' ? 'Qabul qilingan' : ($k->status == 'rejected' ? 'Rad etilgan' : 'Ko`rib chiqilmoqda') }}
                            </td>

                            <td>
                                <a href="{{ asset('storage/' . $k->file) }}" class="font-medium ">Excelni ko'rish
                                </a>
                            </td>

                            <td class="table-report__action w-56">
                                <div class="flex justify-center items-center">
                                    <form action="{{ route('asbobuskunafile.update', ['asbobuskunafile' => $k->id]) }}"
                                        method="post" onsubmit="return confirm(' Rostan Ochirishni hohlaysizmi?');">
                                        <button type="submit" class="flex delete-action items-center text-theme-6">
                                            @csrf
                                            @method("PUT")
                                            <input type="hidden" name="status" value="rejected">
                                            <i data-feather="x" class="feather feather-check-square w-4 h-4 mr-1"></i>
                                            Rad etish
                                        </button>
                                    </form>

                                    <form action="{{ route('asbobuskunafile.update', ['asbobuskunafile' => $k->id]) }}"
                                        method="post" onsubmit="return confirm(' Rostan tasdiqlaysizmi hohlaysizmi?');">
                                        <button type="submit" class="flex delete-action items-center text-theme-1 ml-3">
                                            @csrf
                                            @method("PUT")
                                            <input type="hidden" name="status" value="approved">
                                            <i data-feather="eye" class="feather feather-check-square w-4 h-4 mr-1"></i>
                                            Tasdiqlash
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
            {{$asbobuskunafile->links()}}
        </div>

    </div>
@endsection
