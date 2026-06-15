@extends('layouts.admin')

@section('content')
<div class="content">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mt-6 mb-6">
        <div>
            <h2 class="intro-y text-lg font-medium">Ilmiy loyihalar</h2>
            <p class="text-gray-600 text-sm mt-1">Loyihalar va masullarni boshqarish</p>
        </div>
        @role('admin')
        <div class="inline-flex flex-wrap gap-0 rounded-md overflow-hidden border border-gray-300 shadow-sm">
            <a href="javascript:;" data-target="#ilmiyloyiha-masul-list-modal" data-toggle="modal"
                class="button border-0 rounded-none text-gray-700 flex items-center gap-2 px-4">
                <i data-feather="users" class="w-4 h-4"></i>
                Masullar
                <span class="px-2 py-0.5 text-xs font-medium rounded-full bg-gray-200 text-gray-700">
                    {{ $masullar->count() }}
                </span>
            </a>
            <a href="javascript:;" data-target="#ilmiyloyiha-paper-masul-create-modal" data-toggle="modal"
                class="button border-0 border-l border-gray-300 rounded-none bg-theme-1 text-white flex items-center gap-2 px-4"
                title="Loyihaga masul biriktirish">
                <i data-feather="user-plus" class="w-4 h-4"></i>
                <span class="hidden sm:inline">Loyihaga biriktirish</span>
            </a>
        </div>
        @endrole
    </div>

    @if (session('status'))
    <div class="alert alert-success">{{ session('status') }}</div>
    @endif

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul class="list-disc pl-5">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
        <table class="table table-report -mt-2">
            <thead>
                <tr>
                    <th class="whitespace-no-wrap">№</th>
                    <th class="whitespace-no-wrap">Loyiha mavzusi</th>
                    <th class="whitespace-no-wrap">Loyiha rahbari</th>
                    <th class="whitespace-no-wrap">Loyiha turi</th>
                    <th class="whitespace-no-wrap">Masul</th>
                    <th class="whitespace-no-wrap text-center">Harakat</th>
                </tr>
            </thead>
            <tbody>
                @forelse($ilmiyloyiha as $xodimlar)
                <tr class="intro-x">
                    <td>{{ $loop->index + 1 }}</td>
                    <td>
                        <a href="{{ route('ilmiyloyiha.show', ['ilmiyloyiha' => $xodimlar->id]) }}"
                            class="font-medium ">{{ $xodimlar->mavzusi }} </a>
                    </td>
                    <td>
                        {{ $xodimlar->rahbar_name }}
                    </td>
                    <td>
                        {{ $xodimlar->turi }}
                    </td>
                    <td>
                        @if ($xodimlar->user_id == 1)
                        @else
                        {{ $xodimlar->user->name ?? null }}
                        @endif
                    </td>
                    <td class="table-report__action w-56">
                        <div class="flex justify-center items-center">
                            <a class="flex science-update-action items-center mr-3"
                                href="{{ route('ilmiyloyiha.show', ['ilmiyloyiha' => $xodimlar->id]) }}">
                                <i data-feather="eye" class="feather feather-check-square w-4 h-4 mr-1"></i>
                                Ko'rish
                            </a>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center">Ma'lumot mavjud emas.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="intro-y flex flex-wrap sm:flex-row sm:flex-no-wrap items-center mt-3">
        {{ $ilmiyloyiha->links() }}
    </div>

</div>

@role('admin')
<div class="modal" id="ilmiyloyiha-paper-masul-create-modal">
    <div class="modal__content modal__content--xl">
        <div class="flex items-center justify-between px-5 pt-5 pb-4 border-b border-gray-200">
            <div class="flex items-center gap-3">
                <div class="flex items-center justify-center w-10 h-10 rounded-full bg-theme-1 text-white flex-shrink-0">
                    <i data-feather="user-plus" class="w-5 h-5"></i>
                </div>
                <div>
                    <h2 class="text-lg font-medium">Loyihaga masul biriktirish</h2>
                    <p class="text-sm text-gray-600 mt-0.5">Bir masul bir nechta loyihaga biriktirilishi mumkin</p>
                </div>
            </div>
            <a data-dismiss="modal" href="javascript:;" class="text-gray-400 hover:text-gray-600 transition-colors"
                aria-label="Yopish">
                <i data-feather="x" class="w-6 h-6"></i>
            </a>
        </div>

        <div class="p-5">
            <form id="ilmiyloyiha-paper-create-form" method="POST" action="{{ route('ilmiy_loyha_masul.store') }}"
                class="validate-form" enctype="multipart/form-data" novalidate="novalidate">
                @csrf
                <input type="hidden" name="form_source" value="ilmiyloyiha_masul_create">

                @if ($errors->any() && old('form_source') === 'ilmiyloyiha_masul_create')
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
                        <span>Email bazada bo'lsa, yangi foydalanuvchi yaratilmaydi — mavjud masul tanlangan loyihalarga biriktiriladi.</span>
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
                        <p class="text-xs text-gray-500 mt-1">Mavjud email — shu masulga loyihalar qo'shiladi</p>
                        @enderror
                    </div>
                </div>

                <p class="text-xs font-semibold uppercase tracking-wide text-gray-500 mb-3">Biriktiriladigan loyihalar</p>
                    <div class="mb-5">
                        <div id="ilmiyloyiha-create-loyiha-list"
                            class="border rounded-md max-h-52 overflow-y-auto divide-y divide-gray-100 @error('ilmiyloyha') border-red-500 @enderror @error('ilmiyloyha.*') border-red-500 @enderror">
                            @php $oldLoyihalar = old('ilmiyloyha', []); @endphp
                            @forelse ($ilmiyLoyihaList as $loyiha)
                            <label
                                class="flex items-start gap-3 px-3 py-2.5 hover:bg-gray-50 cursor-pointer transition-colors">
                                <input type="checkbox" name="ilmiyloyha[]" value="{{ $loyiha->id }}"
                                    class="input border mt-1 flex-shrink-0 ilmiyloyiha-create-checkbox"
                                    @checked(in_array((string) $loyiha->id, array_map('strval', $oldLoyihalar), true))>
                                <span class="text-sm leading-snug text-gray-800">{{ $loyiha->mavzusi }}</span>
                            </label>
                            @empty
                            <p class="px-3 py-4 text-sm text-gray-500 text-center">Loyihalar mavjud emas</p>
                            @endforelse
                        </div>
                        @error('ilmiyloyha')
                        <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                        @error('ilmiyloyha.*')
                        <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                        <p id="ilmiyloyiha-create-loyiha-error" class="text-xs text-red-600 mt-1 hidden">
                            Kamida bitta loyihani tanlang
                        </p>
                    </div>

                    <p class="text-xs font-semibold uppercase tracking-wide text-gray-500 mb-3">Kirish ma'lumotlari</p>
                    <div class="grid grid-cols-12 gap-4">
                        <div class="col-span-12 sm:col-span-6">
                            <label class="block text-sm font-medium text-gray-700 mb-1">
                                Parol <span class="text-gray-400 font-normal">(yangi masul uchun)</span>
                            </label>
                            <div class="relative">
                                <input type="password" name="password" id="ilmiyloyiha-create-password"
                                    class="input w-full border pr-10 @error('password') border-red-500 @enderror"
                                    placeholder="Faqat yangi foydalanuvchi uchun">
                                <button type="button"
                                    class="absolute inset-y-0 right-0 flex items-center px-3 text-gray-400 hover:text-gray-600 password-toggle"
                                    data-target="ilmiyloyiha-create-password" tabindex="-1" aria-label="Parolni ko'rsatish">
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
                <button type="button" data-dismiss="modal" class="button border text-gray-700 w-full sm:w-auto">
                    Bekor qilish
                </button>
                <button type="submit" form="ilmiyloyiha-paper-create-form"
                    class="button bg-theme-1 text-white w-full sm:w-auto flex items-center justify-center gap-2">
                    <i data-feather="check" class="w-4 h-4"></i>
                    Qo'shish
                </button>
        </div>
    </div>
</div>

<div class="modal" id="ilmiyloyiha-paper-masul-edit-modal">
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
            <a data-dismiss="modal" href="javascript:;" class="text-gray-400 hover:text-gray-600 transition-colors"
                aria-label="Yopish">
                <i data-feather="x" class="w-6 h-6"></i>
            </a>
        </div>

        <div class="p-5">
            <div id="ilmiyloyiha-edit-preview"
                class="flex items-center gap-3 mb-5 p-4 bg-gray-50 rounded-lg border border-gray-200">
                <div id="ilmiyloyiha-edit-initials"
                    class="w-11 h-11 rounded-full bg-theme-1 text-white flex items-center justify-center font-semibold text-sm flex-shrink-0">
                </div>
                <div class="min-w-0">
                    <p id="ilmiyloyiha-edit-preview-name" class="font-medium truncate"></p>
                    <p id="ilmiyloyiha-edit-preview-email" class="text-sm text-gray-600 truncate"></p>
                </div>
            </div>

            <form id="ilmiyloyiha-paper-edit-form" method="POST" action="" class="validate-form"
                enctype="multipart/form-data" novalidate="novalidate">
                @csrf
                @method('PUT')
                <input type="hidden" name="email" id="ilmiyloyiha-edit-email-hidden">

                <p class="text-xs font-semibold uppercase tracking-wide text-gray-500 mb-3">Shaxsiy ma'lumotlar</p>
                <div class="grid grid-cols-12 gap-4 mb-5">
                    <div class="col-span-12 sm:col-span-6">
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            F.I.Sh <span class="text-red-600">*</span>
                        </label>
                        <input type="text" name="name" id="ilmiyloyiha-edit-name" class="input w-full border"
                            required>
                    </div>

                    <div class="col-span-12 sm:col-span-6">
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            Email (login)
                        </label>
                        <input type="email" id="ilmiyloyiha-edit-email-display"
                            class="input w-full border bg-gray-50 text-gray-600 cursor-not-allowed" readonly>
                        <p class="text-xs text-gray-500 mt-1">Email o'zgartirilmaydi</p>
                    </div>
                </div>

                <p class="text-xs font-semibold uppercase tracking-wide text-gray-500 mb-3">Biriktirilgan loyihalar</p>
                <div class="mb-5">
                    <div id="ilmiyloyiha-edit-loyiha-list"
                        class="border rounded-md max-h-52 overflow-y-auto divide-y divide-gray-100">
                        @forelse ($ilmiyLoyihaList as $loyiha)
                        <label
                            class="flex items-start gap-3 px-3 py-2.5 hover:bg-gray-50 cursor-pointer transition-colors">
                            <input type="checkbox" name="ilmiyloyha[]" value="{{ $loyiha->id }}"
                                class="input border mt-1 flex-shrink-0 ilmiyloyiha-edit-checkbox">
                            <span class="text-sm leading-snug text-gray-800">{{ $loyiha->mavzusi }}</span>
                        </label>
                        @empty
                        <p class="px-3 py-4 text-sm text-gray-500 text-center">Loyihalar mavjud emas</p>
                        @endforelse
                    </div>
                    <p id="ilmiyloyiha-edit-loyiha-error" class="text-xs text-red-600 mt-1 hidden">
                        Kamida bitta loyihani tanlang
                    </p>
                </div>

                <p class="text-xs font-semibold uppercase tracking-wide text-gray-500 mb-3">Yangi parol</p>
                <div class="grid grid-cols-12 gap-4">
                    <div class="col-span-12 sm:col-span-6">
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            Parol <span class="text-gray-400 font-normal">(ixtiyoriy)</span>
                        </label>
                        <div class="relative">
                            <input type="password" name="password" id="ilmiyloyiha-edit-password"
                                class="input w-full border pr-10" placeholder="O'zgartirmasangiz bo'sh qoldiring">
                            <button type="button"
                                class="absolute inset-y-0 right-0 flex items-center px-3 text-gray-400 hover:text-gray-600 password-toggle"
                                data-target="ilmiyloyiha-edit-password" tabindex="-1" aria-label="Parolni ko'rsatish">
                                <i data-feather="eye" class="w-4 h-4"></i>
                            </button>
                        </div>
                        <p class="text-xs text-gray-500 mt-1">Kamida 8 ta belgi</p>
                    </div>
                </div>
            </form>
        </div>

        <div class="px-5 py-4 bg-gray-50 border-t border-gray-200 flex flex-col-reverse sm:flex-row sm:justify-end gap-2">
            <button type="button" data-dismiss="modal" class="button border text-gray-700 w-full sm:w-auto">
                Bekor qilish
            </button>
            <button type="submit" form="ilmiyloyiha-paper-edit-form"
                class="button bg-theme-1 text-white w-full sm:w-auto flex items-center justify-center gap-2">
                <i data-feather="save" class="w-4 h-4"></i>
                Saqlash
            </button>
        </div>
    </div>
</div>

<div class="modal" id="ilmiyloyiha-masul-list-modal">
    <div class="modal__content modal__content--xl">
        <div class="flex items-center justify-between px-5 pt-5 pb-4 border-b border-gray-200">
            <div class="flex items-center gap-3">
                <div class="flex items-center justify-center w-10 h-10 rounded-full bg-theme-1 text-white flex-shrink-0">
                    <i data-feather="users" class="w-5 h-5"></i>
                </div>
                <div>
                    <h2 class="text-lg font-medium">Masullar</h2>
                    <p class="text-sm text-gray-600 mt-0.5">
                        <span id="masul-count-visible">{{ $masullar->count() }}</span> / {{ $masullar->count() }} ta
                    </p>
                </div>
            </div>
            <div class="flex items-center gap-2">
                <button type="button" class="button bg-theme-1 text-white text-sm hidden sm:flex items-center gap-1 masul-quick-add">
                    <i data-feather="user-plus" class="w-4 h-4"></i>
                    Yangi masul
                </button>
                <a data-dismiss="modal" href="javascript:;" class="text-gray-400 hover:text-gray-600 transition-colors p-1"
                    aria-label="Yopish">
                    <i data-feather="x" class="w-6 h-6"></i>
                </a>
            </div>
        </div>

        <div class="px-5 py-3 border-b border-gray-100 bg-gray-50">
            <div class="search relative">
                <input type="text" id="masul-search-input" class="search__input input placeholder-theme-13 w-full"
                    placeholder="Ism yoki email bo'yicha qidirish..." autocomplete="off">
                <i data-feather="search" class="search__icon"></i>
            </div>
        </div>

        <div class="p-5 max-h-[60vh] overflow-y-auto" id="masul-list-container">
            @forelse ($masullar as $user)
            @php
            $loyihalar = $user->ilmiyloyhalar->pluck('mavzusi')->filter();
            $initials = collect(explode(' ', $user->name))
            ->filter()
            ->take(2)
            ->map(fn ($w) => mb_strtoupper(mb_substr($w, 0, 1)))
            ->join('');
            $searchText = strtolower($user->name . ' ' . $user->email);
            @endphp
            <div class="masul-card box p-4 mb-3 last:mb-0 border border-gray-100 hover:border-theme-1 transition-colors"
                data-search="{{ $searchText }}">
                <div class="flex items-start gap-4">
                    <div
                        class="w-12 h-12 rounded-full bg-theme-1 text-white flex items-center justify-center text-sm font-semibold flex-shrink-0">
                        {{ $initials ?: '?' }}
                    </div>

                    <div class="flex-1 min-w-0">
                        <div class="flex items-start justify-between gap-3">
                            <div class="min-w-0">
                                <h3 class="font-medium text-gray-900 truncate">{{ $user->name }}</h3>
                                <p class="text-sm text-gray-500 truncate flex items-center gap-1 mt-0.5">
                                    <i data-feather="mail" class="w-3.5 h-3.5 flex-shrink-0"></i>
                                    {{ $user->email }}
                                </p>
                            </div>
                            <div class="flex items-center gap-1 flex-shrink-0">
                                <button type="button"
                                    class="button px-2 py-1.5 border border-theme-1 text-theme-1 masul-edit-btn"
                                    title="Tahrirlash"
                                    data-user-id="{{ $user->id }}"
                                    data-user-name="{{ $user->name }}"
                                    data-user-email="{{ $user->email }}"
                                    data-ilmiyloyha-ids="{{ $user->ilmiyloyhalar->pluck('id')->join(',') }}">
                                    <i data-feather="edit-2" class="w-4 h-4"></i>
                                </button>
                                @can('delete user')
                                <form action="{{ url('users/' . $user->id . '/delete') }}" class="inline"
                                    onsubmit="return confirm('Rostdan o\'chirishni xohlaysizmi?');">
                                    @csrf
                                    <button type="submit"
                                        class="button px-2 py-1.5 border border-theme-6 text-theme-6"
                                        title="O'chirish">
                                        <i data-feather="trash-2" class="w-4 h-4"></i>
                                    </button>
                                </form>
                                @endcan
                            </div>
                        </div>

                        <div class="mt-3">
                            @if ($loyihalar->isNotEmpty())
                            <p class="text-xs text-gray-500 mb-1.5 flex items-center gap-1">
                                <i data-feather="folder" class="w-3 h-3"></i>
                                Biriktirilgan loyihalar ({{ $loyihalar->count() }})
                            </p>
                            <div class="flex flex-wrap gap-1.5">
                                @foreach ($loyihalar as $loyihaNomi)
                                <span class="text-xs px-2 py-1 rounded-full bg-gray-100 text-gray-700 leading-snug"
                                    title="{{ $loyihaNomi }}">
                                    {{ Str::limit($loyihaNomi, 45) }}
                                </span>
                                @endforeach
                            </div>
                            @else
                            <span class="inline-flex items-center gap-1 text-xs text-gray-400 bg-gray-50 px-2 py-1 rounded">
                                <i data-feather="alert-circle" class="w-3 h-3"></i>
                                Loyiha biriktirilmagan
                            </span>
                            @endif
                        </div>

                        @if ($user->getRoleNames()->isNotEmpty())
                        <div class="mt-2 pt-2 border-t border-gray-100">
                            @foreach ($user->getRoleNames() as $rolename)
                            <span class="text-xs text-theme-1 font-medium">{{ $rolename }}</span>
                            @endforeach
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            @empty
            <div id="masul-empty-state" class="flex flex-col items-center justify-center py-12 text-gray-500">
                <div class="w-16 h-16 rounded-full bg-gray-100 flex items-center justify-center mb-4">
                    <i data-feather="user-x" class="w-8 h-8 text-gray-300"></i>
                </div>
                <p class="font-medium text-gray-700">Hozircha masul yo'q</p>
                <p class="text-sm mt-1 text-center max-w-xs">Ilmiy loyihaga masul biriktirish uchun quyidagi tugmani bosing</p>
                <button type="button" class="button bg-theme-1 text-white mt-4 flex items-center gap-2 masul-quick-add">
                    <i data-feather="user-plus" class="w-4 h-4"></i>
                    Loyihaga biriktirish
                </button>
            </div>
            @endforelse

            <div id="masul-no-results" class="hidden flex-col items-center justify-center py-12 text-gray-500">
                <i data-feather="search" class="w-10 h-10 text-gray-300 mb-3"></i>
                <p class="font-medium">Natija topilmadi</p>
                <p class="text-sm mt-1">Boshqa kalit so'z bilan qidiring</p>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const editModal = document.getElementById('ilmiyloyiha-paper-masul-edit-modal');
        const editForm = document.getElementById('ilmiyloyiha-paper-edit-form');
        const createForm = document.getElementById('ilmiyloyiha-paper-create-form');
        const editUrlBase = @json(url('/ilmiy-loyhagamasul-edit'));
        const hasCreateErrors = @json($errors->any() && old('form_source') === 'ilmiyloyiha_masul_create');

        function getInitials(name) {
            return name.split(/\s+/).filter(Boolean).slice(0, 2).map(function(w) {
                return w.charAt(0).toUpperCase();
            }).join('');
        }

        function replaceFeather() {
            if (typeof feather !== 'undefined') feather.replace();
        }

        if (hasCreateErrors) {
            $('#ilmiyloyiha-paper-masul-create-modal').modal('show');
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

        document.querySelectorAll('.masul-edit-btn').forEach(function(btn) {
            btn.addEventListener('click', function() {
                const userId = this.dataset.userId;
                editForm.action = editUrlBase + '/' + userId;
                document.getElementById('ilmiyloyiha-edit-name').value = this.dataset.userName;
                document.getElementById('ilmiyloyiha-edit-email-display').value = this.dataset.userEmail;
                document.getElementById('ilmiyloyiha-edit-email-hidden').value = this.dataset.userEmail;
                document.getElementById('ilmiyloyiha-edit-password').value = '';
                document.getElementById('ilmiyloyiha-edit-preview-name').textContent = this.dataset.userName;
                document.getElementById('ilmiyloyiha-edit-preview-email').textContent = this.dataset.userEmail;
                document.getElementById('ilmiyloyiha-edit-initials').textContent = getInitials(this.dataset.userName) || '?';

                const ids = (this.dataset.ilmiyloyhaIds || '').split(',').filter(Boolean);
                document.querySelectorAll('.ilmiyloyiha-edit-checkbox').forEach(function(cb) {
                    cb.checked = ids.includes(cb.value);
                });

                document.getElementById('ilmiyloyiha-edit-loyiha-error').classList.add('hidden');
                $('#ilmiyloyiha-masul-list-modal').modal('hide');
                $(editModal).modal('show');
                replaceFeather();
            });
        });

        function validateCheckboxes(form, selector, errorEl, listId) {
            if (!form) return;
            form.addEventListener('submit', function(e) {
                if (!form.querySelectorAll(selector + ':checked').length) {
                    e.preventDefault();
                    if (errorEl) errorEl.classList.remove('hidden');
                    const list = document.getElementById(listId);
                    if (list) list.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
                }
            });
        }

        validateCheckboxes(editForm, '.ilmiyloyiha-edit-checkbox', document.getElementById('ilmiyloyiha-edit-loyiha-error'), 'ilmiyloyiha-edit-loyiha-list');
        validateCheckboxes(createForm, '.ilmiyloyiha-create-checkbox', document.getElementById('ilmiyloyiha-create-loyiha-error'), 'ilmiyloyiha-create-loyiha-list');

        const searchInput = document.getElementById('masul-search-input');
        const cards = document.querySelectorAll('.masul-card');
        const countEl = document.getElementById('masul-count-visible');
        const noResults = document.getElementById('masul-no-results');

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

        $('#ilmiyloyiha-masul-list-modal').on('hidden.bs.modal', function() {
            if (searchInput) {
                searchInput.value = '';
                cards.forEach(function(c) { c.classList.remove('hidden'); });
                if (countEl) countEl.textContent = cards.length;
                if (noResults) {
                    noResults.classList.add('hidden');
                    noResults.classList.remove('flex');
                }
            }
        });

        document.querySelectorAll('.masul-quick-add').forEach(function(btn) {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                $('#ilmiyloyiha-masul-list-modal').modal('hide');
                setTimeout(function() {
                    $('#ilmiyloyiha-paper-masul-create-modal').modal('show');
                    replaceFeather();
                }, 300);
            });
        });
    });
</script>
@endrole

@endsection