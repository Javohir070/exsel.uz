@extends('layouts.admin')

@section('content')

    <div class="content">
        <div class="flex justify-between align-center mt-6 mb-6">

            <h2 class="intro-y text-lg font-medium">Kafedralar</h2>

            <div>
                <a href="{{ route("kafedralar.create") }}" class="button w-24 ml-3 bg-theme-1 text-white">
                    Qo'shish
                </a>

                <a href="{{ route('kafedra_rol.index') }}" class="button ml-3 w-24 bg-theme-1 text-white">
                    Kafedra mudirini biriktirish
                </a>
                <a href="{{ route('responsible.index') }}" class="button ml-3 w-24 bg-theme-1 text-white">
                    Kafedra mudirlari
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
                        <th class="whitespace-no-wrap">Kafedra nomi </th>
                        <th class="whitespace-no-wrap">Tashkil etilgan yili</th>
                        <th class="whitespace-no-wrap">Kafedra mudiri</th>
                        <th class="whitespace-no-wrap text-center">Harakat</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($laboratorys as $xodimlar)

                        <tr class="intro-x">
                            <td>{{$loop->index + 1}}</td>
                            <td>
                                {{ $xodimlar->name }}
                            </td>
                            <td>
                                {{ $xodimlar->tash_yil }}
                            </td>
                            <td>
                                {{ $xodimlar->user->name ?? "Ma'sul biriktirimagan" }}
                            </td>
                            <td class="table-report__action w-56">
                                <div class="flex justify-center items-center">
                                    <a class="flex science-update-action items-center mr-3"
                                        href="{{ route('kafedralar.edit', ['kafedralar' => $xodimlar->id]) }}">
                                        <i data-feather="edit" class="feather feather-check-square w-4 h-4 mr-1"></i>
                                        Tahrirlash
                                    </a>

                                    <form action="{{ route('kafedralar.destroy', ['kafedralar' => $xodimlar->id]) }}" method="post"
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
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
