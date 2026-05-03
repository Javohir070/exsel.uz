@extends('layouts.admin')

@section('content')

    <div class="content">
        <div class="flex justify-between align-center mt-6 mb-6">

            <h2 class="intro-y text-lg font-medium">Monitoring</h2>

            <div>
                <a href="{{ route("monitorings.create") }}" class="button w-24 ml-3 bg-theme-1 text-white">
                    Qo'shish
                </a>
            </div>

        </div>

        @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif

        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <table class="table table-report mt-2">

                <thead>
                    <tr>
                        <th class="whitespace-no-wrap">ID</th>
                        <th class="whitespace-no-wrap">Yil</th>
                        <th class="whitespace-no-wrap">Chorak</th>
                        <th class="whitespace-no-wrap">Holati</th>
                        <th class="whitespace-no-wrap">Yaratilgan sana</th>
                        <th class="whitespace-no-wrap text-center">Harakat</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse ($monitorings as $monitoring)

                        <tr class="intro-x">
                            <td>{{ $monitoring->id }}</td>
                            <td>
                                {{ $monitoring->year }}
                            </td>
                            <td>
                                {{ $monitoring->quarter }}-chorak
                            </td>
                            <td>
                                @if($monitoring->is_active)
                                    <span class="text-theme-1">Faol</span>
                                @else
                                    <span class="text-theme-6">Nofaol</span>
                                @endif
                            </td>
                            <td>
                                {{ $monitoring->created_at->format('d.m.Y H:i') }}
                            </td>
                            <td class="table-report__action w-56">
                                <div class="flex justify-center items-center">
                                    <a class="flex science-update-action items-center mr-3"
                                        href="{{ route('monitorings.edit', ['monitoring' => $monitoring->id]) }}">
                                        <i data-feather="edit" class="feather feather-check-square w-4 h-4 mr-1"></i>
                                        Tahrirlash
                                    </a>

                                    <form
                                        action="{{ route('monitorings.destroy', ['monitoring' => $monitoring->id]) }}"
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
            {{ $monitorings->links() }}
        </div>

    </div>

@endsection
