@extends('layouts.admin')

@section('content')

<div class="content">
    <div class="flex justify-between align-center mt-10">

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
                        <td>{{ $k->status =='approved' ? 'Qabul qilingan' : ($k->status =='rejected' ? 'Rad etilgan' : 'Ko`rib chiqilmoqda') }}</td>
                        <td>
                            <a href="{{ asset('storage/'.$k->file) }}"
                                class="font-medium ">Excelni ko'rish
                            </a>
                        </td>
                        <td class="table-report__action w-56">
                            <div class="flex justify-center items-center">
                                <form action="{{ route('asbobuskunafile.update', ['asbobuskunafile' => $k->id]) }}" method="post"
                                    onsubmit="return confirm(' Rostan Ochirishni hohlaysizmi?');">
                                    <button type="submit" class="flex delete-action items-center text-theme-6">
                                        @csrf
                                        @method("PUT")
                                        <input type="hidden" name="status" value="rejected">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                            fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" class="feather x w-4 h-4 mr-1">
                                            <polyline points="3 6 5 6 21 6"></polyline>
                                            <path
                                                d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                            </path>
                                            <line x1="10" y1="11" x2="10" y2="17"></line>
                                            <line x1="14" y1="11" x2="14" y2="17"></line>
                                        </svg>
                                        Rad etish
                                    </button>
                                </form>

                                <form action="{{ route('asbobuskunafile.update', ['asbobuskunafile' => $k->id]) }}" method="post"
                                    onsubmit="return confirm(' Rostan tasdiqlaysizmi hohlaysizmi?');">
                                    <button type="submit" class="flex delete-action items-center text-theme-1 ml-3">
                                        @csrf
                                        @method("PUT")
                                        <input type="hidden" name="status" value="approved">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                            fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round" class="feather feather-check-square w-4 h-4 mr-1">
                                            <polyline points="9 11 12 14 22 4"></polyline>
                                            <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
                                        </svg>
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



        <!-- END: Data List -->
        <div class="intro-y flex flex-wrap sm:flex-row sm:flex-no-wrap items-center mt-3">
            {{$asbobuskunafile->links()}}
        </div>

    </div>






</div>
@endsection
