@extends('layouts.admin')

@section('content')

    <div class="content">
        <div class="flex justify-between align-center mt-6 mb-6">

            <h2 class="intro-y text-lg font-medium">Xarid qilingan asbob-uskunalar</h2>
            <div>
                <a href="{{ route("asbobuskuna.create") }}" class="button w-24 bg-theme-1 text-white mr-2">
                    Qo'shish
                </a>

                @role('admin')
                <a href="{{ route('asbobuskuna_rol.index') }}" class="button ml-3 w-24 bg-theme-1 text-white">
                    Masul biriktirsh
                </a>

                <a href="{{ route('asbobuskuna_masullar.index') }}" class="button ml-3 w-24 bg-theme-1 text-white">
                    Masullar
                </a>
                @endrole
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
                        <th class="whitespace-no-wrap">Nomi</th>
                        <th class="whitespace-no-wrap">Turi</th>
                        <th class="whitespace-no-wrap">Ishlab chiqligan yili</th>
                        <th class="whitespace-no-wrap">Holati</th>
                        <th class="whitespace-no-wrap text-center">Harakat</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($asbobuskunas as $k)

                        <tr class="intro-x">
                            <td>{{$loop->index + 1}}</td>
                            <td>
                                <a href="{{ route('asbobuskuna.edit', ['asbobuskuna' => $k->id]) }}"
                                    class="font-medium ">{{ $k->name  }} </a>
                            </td>
                            <td>
                                {{ $k->turi }}
                            </td>
                            <td>
                                {{ $k->ishlabchiq_yil }}
                            </td>
                            <td>
                                {{ $k->holati }}
                            </td>
                            <td class="table-report__action w-56">
                                <div class="flex justify-center items-center">
                                    <a class="flex science-update-action items-center mr-3"
                                        href="{{ route('asbobuskuna.edit', ['asbobuskuna' => $k->id]) }}">
                                        <i data-feather="edit" class="feather feather-check-square w-4 h-4 mr-1"></i>
                                        Tahrirlash
                                    </a>

                                    <a class="flex science-update-action items-center mr-3"
                                        href="{{ route('asbobuskuna.show', ['asbobuskuna' => $k->id]) }}">
                                        <i data-feather="eye" class="feather feather-check-square w-4 h-4 mr-1"></i>
                                        Ko'rish
                                    </a>

                                    <form action="{{ route('asbobuskuna.destroy', ['asbobuskuna' => $k->id]) }}" method="post"
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

        <!-- END: Data List -->
        <div class="intro-y flex flex-wrap sm:flex-row sm:flex-no-wrap items-center mt-3">
            {{$asbobuskunas->links()}}
        </div>

    </div>

@endsection
