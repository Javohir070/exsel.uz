@extends('layouts.admin')

@section('content')

<div class="content">
    <div class="flex justify-between align-center mt-6 mb-6">

        <h2 class="intro-y text-lg font-medium">Rollar</h2>

        @can('create role')
            <a href="{{ route('roles.create') }}" class="button w-24 bg-theme-1 text-white">
                Qo'shish
            </a>
        @endcan

    </div>

    @if (session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif

    <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
        <table class="table table-report -mt-2">
            <thead>
                <tr>
                    <th class="whitespace-no-wrap">№</th>
                    <th class="whitespace-no-wrap">Rol nomi</th>
                    <th class="whitespace-no-wrap text-center">Holat</th>
                    <th class="whitespace-no-wrap text-center">Harakat</th>
                </tr>
            </thead>
            <tbody>

                @forelse ($roles as $role)

                    <tr class="intro-x">
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            {{ $role->name }}
                        </td>
                        <td class="text-center">
                            @if ($role->is_active ?? true)
                                <span class="px-2 py-0.5 rounded text-xs font-medium bg-theme-9 text-white">Faol</span>
                            @else
                                <span class="px-2 py-0.5 rounded text-xs font-medium bg-theme-6 text-white">Faol emas</span>
                            @endif
                        </td>
                        <td class="table-report__action w-56">
                            <div class="flex justify-center items-center">
                                <a class="flex science-update-action items-center mr-3"
                                    href="{{ url('roles/' . $role->id . '/give-permissions') }}">
                                    <i data-feather="shield" class="feather feather-check-square w-4 h-4 mr-1"></i>
                                    Ruxsatlar
                                </a>

                                @can('update role')
                                    <a class="flex science-update-action items-center mr-3"
                                        href="{{ route('roles.edit', $role) }}">
                                        <i data-feather="edit" class="feather feather-check-square w-4 h-4 mr-1"></i>
                                        Tahrirlash
                                    </a>
                                @endcan

                                @can('delete role')
                                    <a class="flex delete-action items-center text-theme-6"
                                        href="{{ url('roles/' . $role->id . '/delete') }}"
                                        onclick="return confirm('Rostan o‘chirishni hohlaysizmi?');">
                                        <i data-feather="trash-2" class="feather feather-check-square w-4 h-4 mr-1"></i>
                                        O'chirish
                                    </a>
                                @endcan
                            </div>
                        </td>
                    </tr>

                @empty
                    <tr>
                        <td colspan="4" class="text-center">Ma'lumotlar topilmadi</td>
                    </tr>
                @endforelse

            </tbody>
        </table>
    </div>

</div>

@endsection
