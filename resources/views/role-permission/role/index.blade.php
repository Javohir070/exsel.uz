@extends('layouts.admin')

@section('content')
    <div class="content">
        <div class="flex flex-wrap justify-between items-center gap-3 mt-6 mb-6">
            <div>
                <h2 class="intro-y text-lg font-medium">Rollar</h2>
                <p class="text-gray-600 text-sm mt-1">Tizim rollari va ruxsatlar boshqaruvi</p>
            </div>
            @can('create role')
                <a href="{{ route('roles.create') }}" class="button shadow-md px-5 bg-theme-1 text-white whitespace-nowrap">
                    <span class="flex items-center">
                        <i data-feather="plus" class="w-4 h-4 mr-2"></i>
                        Rol qo'shish
                    </span>
                </a>
            @endcan
        </div>

        @if (session('status'))
            <div class="alert alert-success show mb-4">{{ session('status') }}</div>
        @endif

        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <div class="p-5 sm:p-6" style="background-color: #fff; border-radius: 12px; box-shadow: 0 1px 3px rgba(0, 0, 0, 0.06);">
                <table class="table table-report -mt-2">
                    <thead>
                        <tr>
                            <th class="whitespace-no-wrap" style="width: 56px;">№</th>
                            <th class="whitespace-no-wrap">Rol nomi</th>
                            <th class="whitespace-no-wrap text-center" style="width: 100px;">Holat</th>
                            <th class="whitespace-no-wrap text-right" style="min-width: 280px;">Harakatlar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($roles as $role)
                            <tr class="intro-x">
                                <td class="text-gray-600 align-middle">{{ $loop->iteration }}</td>
                                <td class="align-middle">
                                    <span class="font-medium text-gray-800 whitespace-no-wrap">{{ $role->name }}</span>
                                    <span class="text-gray-400 mx-1.5">·</span>
                                    <span class="text-xs text-gray-500 whitespace-no-wrap">ID {{ $role->id }}</span>
                                </td>
                                <td class="text-center align-middle whitespace-no-wrap">
                                    @if ($role->is_active ?? true)
                                        <span class="px-2 py-0.5 rounded text-xs font-medium bg-theme-9 text-white">Faol</span>
                                    @else
                                        <span class="px-2 py-0.5 rounded text-xs font-medium bg-theme-6 text-white">Faol emas</span>
                                    @endif
                                </td>
                                <td class="table-report__action align-middle">
                                    <div class="flex flex-no-wrap justify-end items-center gap-1.5 whitespace-no-wrap">
                                        <a href="{{ url('roles/' . $role->id . '/give-permissions') }}"
                                            class="inline-flex items-center shrink-0 px-2 py-1 rounded border border-theme-1 text-theme-1 text-xs font-medium hover:bg-theme-1 hover:text-white transition duration-150 whitespace-no-wrap"
                                            title="Ruxsatlar">
                                            <i data-feather="shield" class="w-3.5 h-3.5 mr-1 shrink-0"></i>
                                            Ruxsatlar
                                        </a>
                                        @can('update role')
                                            <a href="{{ route('roles.edit', $role) }}"
                                                class="inline-flex items-center shrink-0 px-2 py-1 rounded border border-theme-5 text-theme-9 text-xs font-medium hover:bg-theme-5 hover:text-white transition duration-150 whitespace-no-wrap"
                                                title="Tahrirlash">
                                                <i data-feather="edit" class="w-3.5 h-3.5 mr-1 shrink-0"></i>
                                                Tahrirlash
                                            </a>
                                        @endcan
                                        @can('delete role')
                                            <a href="{{ url('roles/' . $role->id . '/delete') }}"
                                                class="inline-flex items-center shrink-0 px-2 py-1 rounded border border-theme-6 text-theme-6 text-xs font-medium hover:bg-theme-6 hover:text-white transition duration-150 whitespace-no-wrap"
                                                title="O'chirish"
                                                onclick="return confirm('Rolni o‘chirishni tasdiqlaysizmi?');">
                                                <i data-feather="trash-2" class="w-3.5 h-3.5 mr-1 shrink-0"></i>
                                                O'chirish
                                            </a>
                                        @endcan
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center py-8 text-gray-500">
                                    Rollar hozircha mavjud emas.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
