@extends('layouts.admin')

@section('content')

    <div class="content">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mt-6 mb-6">
            <h2 class="intro-y text-lg font-medium">Xarid qilingan asbob-uskunalar</h2>
            <div class="flex flex-wrap items-center gap-2">
                <a href="{{ route('asbobuskuna.create') }}" class="button bg-theme-1 text-white flex items-center gap-2">
                    <i data-feather="plus" class="w-4 h-4"></i>
                    Qo'shish
                </a>

                @role('admin')
                    <div class="inline-flex flex-wrap gap-0 rounded-md overflow-hidden border border-gray-300 shadow-sm">
                        <a href="javascript:;" data-target="#asbobuskuna-masul-list-modal" data-toggle="modal"
                            class="button border-0 rounded-none text-gray-700 flex items-center gap-2 px-4">
                            <i data-feather="users" class="w-4 h-4"></i>
                            Masullar
                            <span class="px-2 py-0.5 text-xs font-medium rounded-full bg-gray-200 text-gray-700">
                                {{ $masullar->count() }}
                            </span>
                        </a>
                        <a href="javascript:;" data-target="#asbobuskuna-paper-masul-create-modal" data-toggle="modal"
                            class="button border-0 border-l border-gray-300 rounded-none bg-theme-1 text-white flex items-center gap-2 px-4"
                            title="Asbob-uskunaga masul biriktirish">
                            <i data-feather="user-plus" class="w-4 h-4"></i>
                            <span class="hidden sm:inline">Biriktirish</span>
                        </a>
                    </div>
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
                        <th class="whitespace-no-wrap">Soni</th>
                        <th class="whitespace-no-wrap">Turi</th>
                        <th class="whitespace-no-wrap">Ishlab chiqligan yili</th>
                        <th class="whitespace-no-wrap">Holati</th>
                        <th class="whitespace-no-wrap text-center">Harakat</th>
                    </tr>
                </thead>
                <tbody>

                    @forelse ($asbobuskunas as $k)

                        <tr class="intro-x">
                            <td>{{$loop->index + 1}}</td>
                            <td>
                                <a href="{{ route('asbobuskuna.edit', ['asbobuskuna' => $k->id]) }}"
                                    class="font-medium ">{{ $k->name  }} </a>
                            </td>
                            <td>{{ $k->soni ?? '—' }}</td>
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
                    @empty
                        <tr>
                            <td colspan="7" class="text-center">Ma'lumotlar mavjud emas</td>
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

    @role('admin')
    <div class="modal" id="asbobuskuna-paper-masul-create-modal">
        <div class="modal__content modal__content--xl">
            <div class="flex items-center justify-between px-5 pt-5 pb-4 border-b border-gray-200">
                <div class="flex items-center gap-3">
                    <div class="flex items-center justify-center w-10 h-10 rounded-full bg-theme-1 text-white flex-shrink-0">
                        <i data-feather="user-plus" class="w-5 h-5"></i>
                    </div>
                    <div>
                        <h2 class="text-lg font-medium">Asbob-uskunaga masul biriktirish</h2>
                        <p class="text-sm text-gray-600 mt-0.5">Bir masul bir nechta asbob-uskunaga biriktirilishi mumkin</p>
                    </div>
                </div>
                <a data-dismiss="modal" href="javascript:;" class="text-gray-400 hover:text-gray-600 transition-colors" aria-label="Yopish">
                    <i data-feather="x" class="w-6 h-6"></i>
                </a>
            </div>

            <div class="p-5">
                <form id="asbobuskuna-paper-create-form" method="POST" action="{{ route('asbobuskuna_masul.store') }}"
                    class="validate-form" enctype="multipart/form-data" novalidate="novalidate">
                    @csrf
                    <input type="hidden" name="form_source" value="asbobuskuna_masul_create">

                    @if ($errors->any() && old('form_source') === 'asbobuskuna_masul_create')
                        <div class="rounded-md border border-red-200 bg-red-50 px-4 py-3 mb-4" role="alert">
                            <div class="flex items-start gap-2">
                                <i data-feather="alert-circle" class="w-5 h-5 text-red-600 flex-shrink-0 mt-0.5"></i>
                                <div>
                                    <p class="text-sm font-medium text-red-800">Ma'lumotlarni tekshiring</p>
                                    <ul class="mt-1 text-sm text-red-700 list-disc list-inside">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endif

                    <div class="mb-4 p-3 rounded-md border border-blue-100 bg-blue-50 text-sm text-blue-900">
                        <p class="flex items-start gap-2">
                            <i data-feather="info" class="w-4 h-4 flex-shrink-0 mt-0.5"></i>
                            <span>Email bazada bo'lsa, yangi foydalanuvchi yaratilmaydi — mavjud masul tanlangan asbob-uskunalarga biriktiriladi.</span>
                        </p>
                    </div>

                    <p class="text-xs font-semibold uppercase tracking-wide text-gray-500 mb-3">Shaxsiy ma'lumotlar</p>
                    <div class="grid grid-cols-12 gap-4 mb-5">
                        <div class="col-span-12 sm:col-span-6">
                            <label class="block text-sm font-medium text-gray-700 mb-1">F.I.Sh <span class="text-red-600">*</span></label>
                            <input type="text" name="name" class="input w-full border @error('name') border-red-500 @enderror"
                                placeholder="Masulning to'liq ismi" value="{{ old('name') }}" required>
                            @error('name')<p class="text-xs text-red-600 mt-1">{{ $message }}</p>@enderror
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Email (login) <span class="text-red-600">*</span></label>
                            <input type="email" name="email" class="input w-full border @error('email') border-red-500 @enderror"
                                placeholder="masul@example.com" value="{{ old('email') }}" required>
                            @error('email')
                                <p class="text-xs text-red-600 mt-1 flex items-center gap-1">
                                    <i data-feather="alert-circle" class="w-3.5 h-3.5"></i>{{ $message }}
                                </p>
                            @else
                                <p class="text-xs text-gray-500 mt-1">Mavjud email — shu masulga asbob-uskunalar qo'shiladi</p>
                            @enderror
                        </div>
                    </div>

                    <p class="text-xs font-semibold uppercase tracking-wide text-gray-500 mb-3">Biriktiriladigan asbob-uskunalar</p>
                    <div class="mb-5">
                        <div id="asbobuskuna-create-list"
                            class="border rounded-md max-h-52 overflow-y-auto divide-y divide-gray-100 @error('asbobuskuna') border-red-500 @enderror">
                            @php $oldAsbobuskuna = old('asbobuskuna', []); @endphp
                            @forelse ($asbobuskunaList as $asbob)
                                <label class="flex items-start gap-3 px-3 py-2.5 hover:bg-gray-50 cursor-pointer transition-colors">
                                    <input type="checkbox" name="asbobuskuna[]" value="{{ $asbob->id }}"
                                        class="input border mt-1 flex-shrink-0 asbobuskuna-create-checkbox"
                                        @checked(in_array((string) $asbob->id, array_map('strval', $oldAsbobuskuna), true))>
                                    <span class="text-sm leading-snug text-gray-800">{{ $asbob->name }}</span>
                                </label>
                            @empty
                                <p class="px-3 py-4 text-sm text-gray-500 text-center">Asbob-uskunalar mavjud emas</p>
                            @endforelse
                        </div>
                        @error('asbobuskuna')<p class="text-xs text-red-600 mt-1">{{ $message }}</p>@enderror
                        <p id="asbobuskuna-create-error" class="text-xs text-red-600 mt-1 hidden">Kamida bitta asbob-uskunani tanlang</p>
                    </div>

                    <p class="text-xs font-semibold uppercase tracking-wide text-gray-500 mb-3">Kirish ma'lumotlari</p>
                    <div class="grid grid-cols-12 gap-4">
                        <div class="col-span-12 sm:col-span-6">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Parol <span class="text-gray-400 font-normal">(yangi masul uchun)</span></label>
                            <div class="relative">
                                <input type="password" name="password" id="asbobuskuna-create-password"
                                    class="input w-full border pr-10 @error('password') border-red-500 @enderror"
                                    placeholder="Faqat yangi foydalanuvchi uchun">
                                <button type="button" class="absolute inset-y-0 right-0 flex items-center px-3 text-gray-400 hover:text-gray-600 password-toggle"
                                    data-target="asbobuskuna-create-password" tabindex="-1" aria-label="Parolni ko'rsatish">
                                    <i data-feather="eye" class="w-4 h-4"></i>
                                </button>
                            </div>
                            @error('password')<p class="text-xs text-red-600 mt-1">{{ $message }}</p>@enderror
                            @unless($errors->has('password'))<p class="text-xs text-gray-500 mt-1">Email bazada bo'lsa, parol kiritish shart emas</p>@endunless
                        </div>
                    </div>
                </form>
            </div>

            <div class="px-5 py-4 bg-gray-50 border-t border-gray-200 flex flex-col-reverse sm:flex-row sm:justify-end gap-2">
                <button type="button" data-dismiss="modal" class="button border text-gray-700 w-full sm:w-auto">Bekor qilish</button>
                <button type="submit" form="asbobuskuna-paper-create-form"
                    class="button bg-theme-1 text-white w-full sm:w-auto flex items-center justify-center gap-2">
                    <i data-feather="check" class="w-4 h-4"></i> Qo'shish
                </button>
            </div>
        </div>
    </div>

    <div class="modal" id="asbobuskuna-paper-masul-edit-modal">
        <div class="modal__content modal__content--xl">
            <div class="flex items-center justify-between px-5 pt-5 pb-4 border-b border-gray-200">
                <div class="flex items-center gap-3">
                    <div class="flex items-center justify-center w-10 h-10 rounded-full bg-theme-1 text-white flex-shrink-0">
                        <i data-feather="edit-2" class="w-5 h-5"></i>
                    </div>
                    <div>
                        <h2 class="text-lg font-medium">Masulni tahrirlash</h2>
                        <p class="text-sm text-gray-600 mt-0.5">Ma'lumotlarni yangilang</p>
                    </div>
                </div>
                <a data-dismiss="modal" href="javascript:;" class="text-gray-400 hover:text-gray-600 transition-colors" aria-label="Yopish">
                    <i data-feather="x" class="w-6 h-6"></i>
                </a>
            </div>

            <div class="p-5">
                <div class="flex items-center gap-3 mb-5 p-4 bg-gray-50 rounded-lg border border-gray-200">
                    <div id="asbobuskuna-edit-initials"
                        class="w-11 h-11 rounded-full bg-theme-1 text-white flex items-center justify-center font-semibold text-sm flex-shrink-0"></div>
                    <div class="min-w-0">
                        <p id="asbobuskuna-edit-preview-name" class="font-medium truncate"></p>
                        <p id="asbobuskuna-edit-preview-email" class="text-sm text-gray-600 truncate"></p>
                    </div>
                </div>

                <form id="asbobuskuna-paper-edit-form" method="POST" action="" class="validate-form" novalidate="novalidate">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="email" id="asbobuskuna-edit-email-hidden">

                    <p class="text-xs font-semibold uppercase tracking-wide text-gray-500 mb-3">Shaxsiy ma'lumotlar</p>
                    <div class="grid grid-cols-12 gap-4 mb-5">
                        <div class="col-span-12 sm:col-span-6">
                            <label class="block text-sm font-medium text-gray-700 mb-1">F.I.Sh <span class="text-red-600">*</span></label>
                            <input type="text" name="name" id="asbobuskuna-edit-name" class="input w-full border" required>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Email (login)</label>
                            <input type="email" id="asbobuskuna-edit-email-display"
                                class="input w-full border bg-gray-50 text-gray-600 cursor-not-allowed" readonly>
                            <p class="text-xs text-gray-500 mt-1">Email o'zgartirilmaydi</p>
                        </div>
                    </div>

                    <p class="text-xs font-semibold uppercase tracking-wide text-gray-500 mb-3">Biriktirilgan asbob-uskunalar</p>
                    <div class="mb-5">
                        <div id="asbobuskuna-edit-list" class="border rounded-md max-h-52 overflow-y-auto divide-y divide-gray-100">
                            @forelse ($asbobuskunaList as $asbob)
                                <label class="flex items-start gap-3 px-3 py-2.5 hover:bg-gray-50 cursor-pointer transition-colors">
                                    <input type="checkbox" name="asbobuskuna[]" value="{{ $asbob->id }}"
                                        class="input border mt-1 flex-shrink-0 asbobuskuna-edit-checkbox">
                                    <span class="text-sm leading-snug text-gray-800">{{ $asbob->name }}</span>
                                </label>
                            @empty
                                <p class="px-3 py-4 text-sm text-gray-500 text-center">Asbob-uskunalar mavjud emas</p>
                            @endforelse
                        </div>
                        <p id="asbobuskuna-edit-error" class="text-xs text-red-600 mt-1 hidden">Kamida bitta asbob-uskunani tanlang</p>
                    </div>

                    <p class="text-xs font-semibold uppercase tracking-wide text-gray-500 mb-3">Yangi parol</p>
                    <div class="grid grid-cols-12 gap-4">
                        <div class="col-span-12 sm:col-span-6">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Parol <span class="text-gray-400 font-normal">(ixtiyoriy)</span></label>
                            <div class="relative">
                                <input type="password" name="password" id="asbobuskuna-edit-password"
                                    class="input w-full border pr-10" placeholder="O'zgartirmasangiz bo'sh qoldiring">
                                <button type="button" class="absolute inset-y-0 right-0 flex items-center px-3 text-gray-400 hover:text-gray-600 password-toggle"
                                    data-target="asbobuskuna-edit-password" tabindex="-1" aria-label="Parolni ko'rsatish">
                                    <i data-feather="eye" class="w-4 h-4"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="px-5 py-4 bg-gray-50 border-t border-gray-200 flex flex-col-reverse sm:flex-row sm:justify-end gap-2">
                <button type="button" data-dismiss="modal" class="button border text-gray-700 w-full sm:w-auto">Bekor qilish</button>
                <button type="submit" form="asbobuskuna-paper-edit-form"
                    class="button bg-theme-1 text-white w-full sm:w-auto flex items-center justify-center gap-2">
                    <i data-feather="save" class="w-4 h-4"></i> Saqlash
                </button>
            </div>
        </div>
    </div>

    <div class="modal" id="asbobuskuna-masul-list-modal">
        <div class="modal__content modal__content--xl">
            <div class="flex items-center justify-between px-5 pt-5 pb-4 border-b border-gray-200">
                <div class="flex items-center gap-3">
                    <div class="flex items-center justify-center w-10 h-10 rounded-full bg-theme-1 text-white flex-shrink-0">
                        <i data-feather="users" class="w-5 h-5"></i>
                    </div>
                    <div>
                        <h2 class="text-lg font-medium">Masullar</h2>
                        <p class="text-sm text-gray-600 mt-0.5">
                            <span id="asbob-masul-count-visible">{{ $masullar->count() }}</span> / {{ $masullar->count() }} ta
                        </p>
                    </div>
                </div>
                <div class="flex items-center gap-2">
                    <button type="button" class="button bg-theme-1 text-white text-sm hidden sm:flex items-center gap-1 asbob-masul-quick-add">
                        <i data-feather="user-plus" class="w-4 h-4"></i> Yangi masul
                    </button>
                    <a data-dismiss="modal" href="javascript:;" class="text-gray-400 hover:text-gray-600 transition-colors p-1" aria-label="Yopish">
                        <i data-feather="x" class="w-6 h-6"></i>
                    </a>
                </div>
            </div>

            <div class="px-5 py-3 border-b border-gray-100 bg-gray-50">
                <div class="search relative">
                    <input type="text" id="asbob-masul-search-input" class="search__input input placeholder-theme-13 w-full"
                        placeholder="Ism yoki email bo'yicha qidirish..." autocomplete="off">
                    <i data-feather="search" class="search__icon"></i>
                </div>
            </div>

            <div class="p-5 max-h-[60vh] overflow-y-auto">
                @forelse ($masullar as $user)
                    @php
                        $asboblar = $user->asbobuskunalar->pluck('name')->filter();
                        $initials = collect(explode(' ', $user->name))->filter()->take(2)
                            ->map(fn ($w) => mb_strtoupper(mb_substr($w, 0, 1)))->join('');
                        $searchText = strtolower($user->name . ' ' . $user->email);
                    @endphp
                    <div class="asbob-masul-card box p-4 mb-3 last:mb-0 border border-gray-100 hover:border-theme-1 transition-colors"
                        data-search="{{ $searchText }}">
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 rounded-full bg-theme-1 text-white flex items-center justify-center text-sm font-semibold flex-shrink-0">
                                {{ $initials ?: '?' }}
                            </div>
                            <div class="flex-1 min-w-0">
                                <div class="flex items-start justify-between gap-3">
                                    <div class="min-w-0">
                                        <h3 class="font-medium text-gray-900 truncate">{{ $user->name }}</h3>
                                        <p class="text-sm text-gray-500 truncate flex items-center gap-1 mt-0.5">
                                            <i data-feather="mail" class="w-3.5 h-3.5 flex-shrink-0"></i>{{ $user->email }}
                                        </p>
                                    </div>
                                    <div class="flex items-center gap-1 flex-shrink-0">
                                        @can('update user')
                                            <button type="button" class="button px-2 py-1.5 border border-theme-1 text-theme-1 asbob-masul-edit-btn"
                                                title="Tahrirlash" data-user-id="{{ $user->id }}" data-user-name="{{ $user->name }}"
                                                data-user-email="{{ $user->email }}"
                                                data-asbobuskuna-ids="{{ $user->asbobuskunalar->pluck('id')->join(',') }}">
                                                <i data-feather="edit-2" class="w-4 h-4"></i>
                                            </button>
                                        @endcan
                                        @can('delete user')
                                            <form action="{{ url('users/' . $user->id . '/delete') }}" class="inline"
                                                onsubmit="return confirm('Rostdan o\'chirishni xohlaysizmi?');">
                                                @csrf
                                                <button type="submit" class="button px-2 py-1.5 border border-theme-6 text-theme-6" title="O'chirish">
                                                    <i data-feather="trash-2" class="w-4 h-4"></i>
                                                </button>
                                            </form>
                                        @endcan
                                    </div>
                                </div>
                                <div class="mt-3">
                                    @if ($asboblar->isNotEmpty())
                                        <p class="text-xs text-gray-500 mb-1.5 flex items-center gap-1">
                                            <i data-feather="tool" class="w-3 h-3"></i>
                                            Biriktirilgan asbob-uskunalar ({{ $asboblar->count() }})
                                        </p>
                                        <div class="flex flex-wrap gap-1.5">
                                            @foreach ($asboblar as $asbobNomi)
                                                <span class="text-xs px-2 py-1 rounded-full bg-gray-100 text-gray-700" title="{{ $asbobNomi }}">
                                                    {{ Str::limit($asbobNomi, 45) }}
                                                </span>
                                            @endforeach
                                        </div>
                                    @else
                                        <span class="inline-flex items-center gap-1 text-xs text-gray-400 bg-gray-50 px-2 py-1 rounded">
                                            <i data-feather="alert-circle" class="w-3 h-3"></i> Asbob-uskuna biriktirilmagan
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="flex flex-col items-center justify-center py-12 text-gray-500">
                        <div class="w-16 h-16 rounded-full bg-gray-100 flex items-center justify-center mb-4">
                            <i data-feather="user-x" class="w-8 h-8 text-gray-300"></i>
                        </div>
                        <p class="font-medium text-gray-700">Hozircha masul yo'q</p>
                        <button type="button" class="button bg-theme-1 text-white mt-4 flex items-center gap-2 asbob-masul-quick-add">
                            <i data-feather="user-plus" class="w-4 h-4"></i> Biriktirish
                        </button>
                    </div>
                @endforelse
                <div id="asbob-masul-no-results" class="hidden flex-col items-center justify-center py-12 text-gray-500">
                    <i data-feather="search" class="w-10 h-10 text-gray-300 mb-3"></i>
                    <p class="font-medium">Natija topilmadi</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const editModal = document.getElementById('asbobuskuna-paper-masul-edit-modal');
            const editForm = document.getElementById('asbobuskuna-paper-edit-form');
            const createForm = document.getElementById('asbobuskuna-paper-create-form');
            const editUrlBase = @json(url('/asbobuskuna-masul-edit'));
            const hasCreateErrors = @json($errors->any() && old('form_source') === 'asbobuskuna_masul_create');

            function getInitials(name) {
                return name.split(/\s+/).filter(Boolean).slice(0, 2).map(function(w) {
                    return w.charAt(0).toUpperCase();
                }).join('');
            }

            function replaceFeather() {
                if (typeof feather !== 'undefined') feather.replace();
            }

            if (hasCreateErrors) {
                $('#asbobuskuna-paper-masul-create-modal').modal('show');
                replaceFeather();
            }

            document.querySelectorAll('.password-toggle').forEach(function(btn) {
                btn.addEventListener('click', function() {
                    const input = document.getElementById(this.dataset.target);
                    if (!input) return;
                    const isHidden = input.type === 'password';
                    input.type = isHidden ? 'text' : 'password';
                    const icon = this.querySelector('i');
                    if (icon) {
                        icon.setAttribute('data-feather', isHidden ? 'eye-off' : 'eye');
                        replaceFeather();
                    }
                });
            });

            document.querySelectorAll('.asbob-masul-edit-btn').forEach(function(btn) {
                btn.addEventListener('click', function() {
                    const userId = this.dataset.userId;
                    editForm.action = editUrlBase + '/' + userId;
                    document.getElementById('asbobuskuna-edit-name').value = this.dataset.userName;
                    document.getElementById('asbobuskuna-edit-email-display').value = this.dataset.userEmail;
                    document.getElementById('asbobuskuna-edit-email-hidden').value = this.dataset.userEmail;
                    document.getElementById('asbobuskuna-edit-password').value = '';
                    document.getElementById('asbobuskuna-edit-preview-name').textContent = this.dataset.userName;
                    document.getElementById('asbobuskuna-edit-preview-email').textContent = this.dataset.userEmail;
                    document.getElementById('asbobuskuna-edit-initials').textContent = getInitials(this.dataset.userName) || '?';

                    const ids = (this.dataset.asbobuskunaIds || '').split(',').filter(Boolean);
                    document.querySelectorAll('.asbobuskuna-edit-checkbox').forEach(function(cb) {
                        cb.checked = ids.includes(cb.value);
                    });

                    $('#asbobuskuna-masul-list-modal').modal('hide');
                    $(editModal).modal('show');
                    replaceFeather();
                });
            });

            function validateCheckboxes(form, selector, errorEl, listId) {
                form.addEventListener('submit', function(e) {
                    if (!form.querySelectorAll(selector + ':checked').length) {
                        e.preventDefault();
                        if (errorEl) errorEl.classList.remove('hidden');
                        document.getElementById(listId).scrollIntoView({ behavior: 'smooth', block: 'nearest' });
                    }
                });
            }

            if (editForm) validateCheckboxes(editForm, '.asbobuskuna-edit-checkbox', document.getElementById('asbobuskuna-edit-error'), 'asbobuskuna-edit-list');
            if (createForm) validateCheckboxes(createForm, '.asbobuskuna-create-checkbox', document.getElementById('asbobuskuna-create-error'), 'asbobuskuna-create-list');

            const searchInput = document.getElementById('asbob-masul-search-input');
            const cards = document.querySelectorAll('.asbob-masul-card');
            const countEl = document.getElementById('asbob-masul-count-visible');
            const noResults = document.getElementById('asbob-masul-no-results');

            if (searchInput && cards.length) {
                searchInput.addEventListener('input', function() {
                    const q = this.value.trim().toLowerCase();
                    let visible = 0;
                    cards.forEach(function(card) {
                        const ok = !q || (card.dataset.search || '').includes(q);
                        card.classList.toggle('hidden', !ok);
                        if (ok) visible++;
                    });
                    if (countEl) countEl.textContent = visible;
                    if (noResults) {
                        noResults.classList.toggle('hidden', visible > 0);
                        noResults.classList.toggle('flex', visible === 0);
                    }
                });
            }

            $('#asbobuskuna-masul-list-modal').on('hidden.bs.modal', function() {
                if (searchInput) {
                    searchInput.value = '';
                    cards.forEach(function(c) { c.classList.remove('hidden'); });
                    if (countEl) countEl.textContent = cards.length;
                    if (noResults) { noResults.classList.add('hidden'); noResults.classList.remove('flex'); }
                }
            });

            document.querySelectorAll('.asbob-masul-quick-add').forEach(function(btn) {
                btn.addEventListener('click', function(e) {
                    e.preventDefault();
                    $('#asbobuskuna-masul-list-modal').modal('hide');
                    setTimeout(function() {
                        $('#asbobuskuna-paper-masul-create-modal').modal('show');
                        replaceFeather();
                    }, 300);
                });
            });
        });
    </script>
    @endrole

@endsection