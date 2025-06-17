@extends('layouts.admin')

@section('content')

    <div class="content">
        <div class="flex justify-between align-center mt-6 mb-6">

            <h2 class="intro-y text-lg font-medium">Ilmiy tezislar</h2>

            <div>
                <a href="{{ route("ilmiytezislar.create") }}" class="button w-24 ml-3 bg-theme-1 text-white">
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
                        <th class="whitespace-no-wrap">Mavzu</th>
                        <th class="whitespace-no-wrap">Chop qilingan sana</th>
                        <th class="whitespace-no-wrap">Konferensiya nomi</th>
                        <th class="whitespace-no-wrap text-center">Harakat</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse ($ilmiytezislars as $xodimlar)

                        <tr class="intro-x">
                            <td>{{$loop->index + 1}}</td>
                            <td>
                                {{ $xodimlar->mavzu }}
                            </td>
                            <td>
                                {{ $xodimlar->chopq_sana }}
                            </td>
                            <td>
                                {{ $xodimlar->kon_full_nomi }}
                            </td>
                            <td class="table-report__action w-56">
                                <div class="flex justify-center items-center">
                                    <a class="flex science-update-action items-center mr-3"
                                        href="{{ route('ilmiytezislar.edit', ['ilmiytezislar' => $xodimlar->id]) }}">
                                        <i data-feather="edit" class="feather feather-check-square w-4 h-4 mr-1"></i>
                                        Tahrirlash
                                    </a>

                                    <a class="flex science-update-action items-center mr-3"
                                        href="{{ route('ilmiytezislar.show', ['ilmiytezislar' => $xodimlar->id]) }}">
                                        <i data-feather="eye" class="feather feather-check-square w-4 h-4 mr-1"></i>
                                        Ko'rish
                                    </a>

                                    <form action="{{ route('ilmiytezislar.destroy', ['ilmiytezislar' => $xodimlar->id]) }}"
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

                    @empty
                        <tr>
                            <td colspan="6" class="text-center">Ma'lumotlar mavjud emas</td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
        </div>

        <div class="intro-y flex flex-wrap sm:flex-row sm:flex-no-wrap items-center mt-3">
            {{$ilmiytezislars->links()}}
        </div>

    </div>

@endsection
