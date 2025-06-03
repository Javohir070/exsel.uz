@extends('layouts.admin')

@section('content')

    <div class="content">
        <div class="flex justify-between align-center mt-10">

            <h2 class="intro-y text-lg font-medium">{{ $tashkilot->name }}</h2>
            {{-- <div>
                <a href="{{ route(" asbobuskuna.create") }}" class="button w-24 bg-theme-1 text-white mr-2">
                    Qo'shish
                </a>
            </div> --}}
        </div>
        @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif

        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <table class="table table-report -mt-2">
                <thead>
                    <tr>
                        <th class="whitespace-no-wrap">№</th>
                        <th class="whitespace-no-wrap">Asbob-uskuna nomi</th>
                        <th class="whitespace-no-wrap">Asos</th>
                        <th class="whitespace-no-wrap" style="text-align: center;">Status</th>
                        <th class="whitespace-no-wrap" style="text-align: center;">Holati</th>
                        <th class="whitespace-no-wrap text-center">Harakat</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($asbobuskunas as $k)

                        <tr class="intro-x">
                            <td>{{ ($asbobuskunas->currentPage() - 1) * $asbobuskunas->perPage() + $loop->iteration }}.</td>
                            <td>
                                <a href="{{ route('asbobuskuna.show', ['asbobuskuna' => $k->id]) }}"
                                    class="font-medium ">{{ $k->name  }} </a>
                            </td>
                            <td>
                                {{ $k->asos }}
                            </td>
                            {{-- <td style="text-align: center;">
                                {{ $k->ishlabchiq_yil }}
                            </td>--}}
                            <td style="text-align: center;color: {{ ($h = $k->asbobuskunaexperts()->first()->status ?? null) == 'Ijobiy' ? 'green' : ($h == 'Salbiy' ? 'blue' : 'red') }}">
                                {{ $k->asbobuskunaexperts->status ?? "Tasdiqlanmagan" }}
                            </td>
                            {{-- <td
                                style="color:{{ $k->asbobuskunaexperts()->first()->holati ?? null == "Tasdiqlandi" ? "green" : ($k->asbobuskunaexperts()->first()->holati ?? null == "yuborildi" ? "blue" : "red") }}">
                                {{ $k->asbobuskunaexperts()->first()->holati ?? "Ko'rilmagan" }}
                            </td> --}}
                            <td style="text-align: center;color: {{ ($h = $k->asbobuskunaexperts()->first()->holati ?? null) == 'Tasdiqlandi' ? 'green' : ($h == 'yuborildi' ? 'blue' : 'red') }}">
                                {{ $h == 'yuborildi'? "Tasdiqlash uchun yuborildi":($h == null ? "Ko'rilmagan" : $h) }}
                            </td>

                            <td class="table-report__action w-56">
                                <div class="flex justify-center items-center">
                                    {{-- <a class="flex science-update-action items-center mr-3"
                                        href="{{ route('asbobuskuna.edit',['asbobuskuna'=>$k->id]) }}" data-id="2978"
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
                                    </a> --}}

                                    <a class="flex science-update-action items-center mr-3"
                                        href="{{ route('asbobuskuna.show', ['asbobuskuna' => $k->id]) }}" data-id="2978"
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
                                    @role('super-admin')

                                     <form action="{{ route('asbobuskuna.destroy',['asbobuskuna'=>$k->id]) }}" method="post"
                                        onsubmit="return confirm(' Rostan Ochirishni hohlaysizmi?');">
                                        <button type="submit" class="flex delete-action items-center text-theme-6">
                                            @csrf
                                            @method("DELETE")
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                                fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" class="feather feather-trash-2 w-4 h-4 mr-1">
                                                <polyline points="3 6 5 6 21 6"></polyline>
                                                <path
                                                    d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                </path>
                                                <line x1="10" y1="11" x2="10" y2="17"></line>
                                                <line x1="14" y1="11" x2="14" y2="17"></line>
                                            </svg>
                                            O'chirish
                                        </button>
                                    </form>
                                    @endrole

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



        <!-- END: Data List -->
        <div class="intro-y flex flex-wrap sm:flex-row sm:flex-no-wrap items-center mt-3">
            {{$asbobuskunas->links()}}
        </div>

    </div>






    </div>
@endsection
