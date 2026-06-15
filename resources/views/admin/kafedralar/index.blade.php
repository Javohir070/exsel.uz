@extends('layouts.admin')

@section('content')

    <div class="content">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mt-6 mb-6">
            <h2 class="intro-y text-lg font-medium">Kafedralar</h2>
            <div class="flex flex-wrap items-center gap-2">
                <a href="javascript:;" data-target="#laboratory-paper-create-modal" data-toggle="modal"
                    class="button bg-theme-1 text-white flex items-center gap-2">
                    <i data-feather="plus" class="w-4 h-4"></i>
                    Qo'shish
                </a>
                <div class="inline-flex flex-wrap gap-0 rounded-md overflow-hidden border border-gray-300 shadow-sm">
                    <a href="javascript:;" data-target="#laboratory-masul-list-modal" data-toggle="modal"
                        class="button border-0 rounded-none text-gray-700 flex items-center gap-2 px-4">
                        <i data-feather="users" class="w-4 h-4"></i>
                        Masullar
                        <span class="px-2 py-0.5 text-xs font-medium rounded-full bg-gray-200 text-gray-700">
                            {{ $masullar->count() }}
                        </span>
                    </a>
                    <a href="javascript:;" data-target="#laboratory-paper-masul-create-modal" data-toggle="modal"
                        class="button border-0 border-l border-gray-300 rounded-none bg-theme-1 text-white flex items-center gap-2 px-4"
                        title="Kafedraga masul biriktirish">
                        <i data-feather="user-plus" class="w-4 h-4"></i>
                        <span class="hidden sm:inline">Biriktirish</span>
                    </a>
                </div>
            </div>
        </div>

        @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif

        @include('admin.components.error_alert')

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
                                {{ $xodimlar->user->name ?? $xodimlar->legacyUser->name ?? "Ma'sul biriktirilmagan" }}
                            </td>
                            <td class="table-report__action w-56">
                                <div class="flex justify-center items-center">
                                    <a class="flex science-update-action items-center mr-3"
                                        href="{{ route('kafedralar.edit', ['kafedralar' => $xodimlar->id]) }}">
                                        <i data-feather="edit" class="feather feather-check-square w-4 h-4 mr-1"></i>
                                        Tahrirlash
                                    </a>

                                    <form action="{{ route('kafedralar.destroy', ['kafedralar' => $xodimlar->id]) }}"
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
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal" id="laboratory-paper-masul-create-modal">
        <div class="modal__content modal__content--xl">
            <div class="flex items-center justify-between px-5 pt-5 pb-4 border-b border-gray-200">
                <div class="flex items-center gap-3">
                    <div class="flex items-center justify-center w-10 h-10 rounded-full bg-theme-1 text-white flex-shrink-0">
                        <i data-feather="user-plus" class="w-5 h-5"></i>
                    </div>
                    <div>
                        <h2 class="text-lg font-medium">Kafedraga masul biriktirish</h2>
                        <p class="text-sm text-gray-600 mt-0.5">Bir masul bir nechta kafedraga biriktirilishi mumkin</p>
                    </div>
                </div>
                <a data-dismiss="modal" href="javascript:;" class="text-gray-400 hover:text-gray-600 transition-colors" aria-label="Yopish">
                    <i data-feather="x" class="w-6 h-6"></i>
                </a>
            </div>
            <div class="p-5">
                <form id="kafedra-masul-create-form" method="POST" action="{{ route('kafedra_masul.store') }}" class="validate-form" novalidate="novalidate">
                    @csrf
                    <input type="hidden" name="form_source" value="kafedra_masul_create">
                    @if ($errors->any() && old('form_source') === 'kafedra_masul_create')
                        <div class="rounded-md border border-red-200 bg-red-50 px-4 py-3 mb-4" role="alert">
                            <p class="text-sm font-medium text-red-800">Ma'lumotlarni tekshiring</p>
                            <ul class="mt-1 text-sm text-red-700 list-disc list-inside">
                                @foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="mb-4 p-3 rounded-md border border-blue-100 bg-blue-50 text-sm text-blue-900">
                        <p class="flex items-start gap-2">
                            <i data-feather="info" class="w-4 h-4 flex-shrink-0 mt-0.5"></i>
                            <span>Email bazada bo'lsa, mavjud masul tanlangan kafedralarga biriktiriladi.</span>
                        </p>
                    </div>
                    <p class="text-xs font-semibold uppercase tracking-wide text-gray-500 mb-3">Shaxsiy ma'lumotlar</p>
                    <div class="grid grid-cols-12 gap-4 mb-5">
                        <div class="col-span-12 sm:col-span-6">
                            <label class="block text-sm font-medium text-gray-700 mb-1">F.I.Sh <span class="text-red-600">*</span></label>
                            <input type="text" name="name" class="input w-full border @error('name') border-red-500 @enderror" value="{{ old('name') }}" required>
                            @error('name')<p class="text-xs text-red-600 mt-1">{{ $message }}</p>@enderror
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Email (login) <span class="text-red-600">*</span></label>
                            <input type="email" name="email" class="input w-full border @error('email') border-red-500 @enderror" value="{{ old('email') }}" required>
                            @error('email')<p class="text-xs text-red-600 mt-1">{{ $message }}</p>@enderror
                        </div>
                    </div>
                    <p class="text-xs font-semibold uppercase tracking-wide text-gray-500 mb-3">Biriktiriladigan kafedralar</p>
                    <div class="mb-5">
                        <div id="kafedra-create-list" class="border rounded-md max-h-52 overflow-y-auto divide-y divide-gray-100 @error('kafedralar') border-red-500 @enderror">
                            @php $oldKafedralar = old('kafedralar', []); @endphp
                            @forelse ($kafedraList as $kafedra)
                                <label class="flex items-start gap-3 px-3 py-2.5 hover:bg-gray-50 cursor-pointer">
                                    <input type="checkbox" name="kafedralar[]" value="{{ $kafedra->id }}" class="input border mt-1 kafedra-create-checkbox"
                                        @checked(in_array((string) $kafedra->id, array_map('strval', $oldKafedralar), true))>
                                    <span class="text-sm text-gray-800">{{ $kafedra->name }}</span>
                                </label>
                            @empty
                                <p class="px-3 py-4 text-sm text-gray-500 text-center">Kafedralar mavjud emas</p>
                            @endforelse
                        </div>
                        @error('kafedralar')<p class="text-xs text-red-600 mt-1">{{ $message }}</p>@enderror
                        <p id="kafedra-create-error" class="text-xs text-red-600 mt-1 hidden">Kamida bitta kafedrani tanlang</p>
                    </div>
                    <p class="text-xs font-semibold uppercase tracking-wide text-gray-500 mb-3">Kirish ma'lumotlari</p>
                    <div class="grid grid-cols-12 gap-4">
                        <div class="col-span-12 sm:col-span-6">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Parol <span class="text-gray-400 font-normal">(yangi masul uchun)</span></label>
                            <div class="relative">
                                <input type="password" name="password" id="kafedra-create-password" class="input w-full border pr-10 @error('password') border-red-500 @enderror">
                                <button type="button" class="absolute inset-y-0 right-0 flex items-center px-3 password-toggle" data-target="kafedra-create-password" tabindex="-1">
                                    <i data-feather="eye" class="w-4 h-4 text-gray-400"></i>
                                </button>
                            </div>
                            @error('password')<p class="text-xs text-red-600 mt-1">{{ $message }}</p>@enderror
                        </div>
                    </div>
                </form>
            </div>
            <div class="px-5 py-4 bg-gray-50 border-t border-gray-200 flex flex-col-reverse sm:flex-row sm:justify-end gap-2">
                <button type="button" data-dismiss="modal" class="button border text-gray-700">Bekor qilish</button>
                <button type="submit" form="kafedra-masul-create-form" class="button bg-theme-1 text-white flex items-center gap-2">
                    <i data-feather="check" class="w-4 h-4"></i> Qo'shish
                </button>
            </div>
        </div>
    </div>

    <div class="modal" id="laboratory-paper-masul-edit-modal">
        <div class="modal__content modal__content--xl">
            <div class="flex items-center justify-between px-5 pt-5 pb-4 border-b border-gray-200">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-full bg-theme-1 text-white flex items-center justify-center"><i data-feather="edit-2" class="w-5 h-5"></i></div>
                    <div><h2 class="text-lg font-medium">Masulni tahrirlash</h2><p class="text-sm text-gray-600">Ma'lumotlarni yangilang</p></div>
                </div>
                <a data-dismiss="modal" href="javascript:;" class="text-gray-400 hover:text-gray-600"><i data-feather="x" class="w-6 h-6"></i></a>
            </div>
            <div class="p-5">
                <div class="flex items-center gap-3 mb-5 p-4 bg-gray-50 rounded-lg border">
                    <div id="kafedra-edit-initials" class="w-11 h-11 rounded-full bg-theme-1 text-white flex items-center justify-center font-semibold text-sm"></div>
                    <div class="min-w-0">
                        <p id="kafedra-edit-preview-name" class="font-medium truncate"></p>
                        <p id="kafedra-edit-preview-email" class="text-sm text-gray-600 truncate"></p>
                    </div>
                </div>
                <form id="kafedra-masul-edit-form" method="POST" action="" novalidate="novalidate">
                    @csrf @method('PUT')
                    <input type="hidden" name="email" id="kafedra-edit-email-hidden">
                    <div class="grid grid-cols-12 gap-4 mb-5">
                        <div class="col-span-12 sm:col-span-6">
                            <label class="block text-sm font-medium mb-1">F.I.Sh <span class="text-red-600">*</span></label>
                            <input type="text" name="name" id="kafedra-edit-name" class="input w-full border" required>
                        </div>
                        <div class="col-span-12 sm:col-span-6">
                            <label class="block text-sm font-medium mb-1">Email</label>
                            <input type="email" id="kafedra-edit-email-display" class="input w-full border bg-gray-50" readonly>
                        </div>
                    </div>
                    <p class="text-xs font-semibold uppercase text-gray-500 mb-3">Biriktirilgan kafedralar</p>
                    <div id="kafedra-edit-list" class="border rounded-md max-h-52 overflow-y-auto divide-y mb-5">
                        @forelse ($kafedraList as $kafedra)
                            <label class="flex items-start gap-3 px-3 py-2.5 hover:bg-gray-50 cursor-pointer">
                                <input type="checkbox" name="kafedralar[]" value="{{ $kafedra->id }}" class="input border mt-1 kafedra-edit-checkbox">
                                <span class="text-sm">{{ $kafedra->name }}</span>
                            </label>
                        @empty
                            <p class="px-3 py-4 text-sm text-gray-500 text-center">Kafedralar mavjud emas</p>
                        @endforelse
                    </div>
                    <p id="kafedra-edit-error" class="text-xs text-red-600 mb-4 hidden">Kamida bitta kafedrani tanlang</p>
                    <div class="col-span-12 sm:col-span-6">
                        <label class="block text-sm font-medium mb-1">Parol <span class="text-gray-400">(ixtiyoriy)</span></label>
                        <input type="password" name="password" id="kafedra-edit-password" class="input w-full border" placeholder="O'zgartirmasangiz bo'sh qoldiring">
                    </div>
                </form>
            </div>
            <div class="px-5 py-4 bg-gray-50 border-t flex justify-end gap-2">
                <button type="button" data-dismiss="modal" class="button border text-gray-700">Bekor qilish</button>
                <button type="submit" form="kafedra-masul-edit-form" class="button bg-theme-1 text-white flex items-center gap-2">
                    <i data-feather="save" class="w-4 h-4"></i> Saqlash
                </button>
            </div>
        </div>
    </div>

    <div class="modal" id="laboratory-masul-list-modal">
        <div class="modal__content modal__content--xl">
            <div class="flex items-center justify-between px-5 pt-5 pb-4 border-b border-gray-200">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-full bg-theme-1 text-white flex items-center justify-center"><i data-feather="users" class="w-5 h-5"></i></div>
                    <div>
                        <h2 class="text-lg font-medium">Masullar</h2>
                        <p class="text-sm text-gray-600"><span id="kafedra-masul-count-visible">{{ $masullar->count() }}</span> / {{ $masullar->count() }} ta</p>
                    </div>
                </div>
                <div class="flex items-center gap-2">
                    <button type="button" class="button bg-theme-1 text-white text-sm hidden sm:flex items-center gap-1 kafedra-masul-quick-add">
                        <i data-feather="user-plus" class="w-4 h-4"></i> Yangi masul
                    </button>
                    <a data-dismiss="modal" href="javascript:;" class="text-gray-400 hover:text-gray-600 p-1"><i data-feather="x" class="w-6 h-6"></i></a>
                </div>
            </div>
            <div class="px-5 py-3 border-b bg-gray-50">
                <div class="search relative">
                    <input type="text" id="kafedra-masul-search" class="search__input input placeholder-theme-13 w-full" placeholder="Ism yoki email bo'yicha qidirish...">
                    <i data-feather="search" class="search__icon"></i>
                </div>
            </div>
            <div class="p-5 max-h-[60vh] overflow-y-auto">
                @forelse ($masullar as $user)
                    @php
                        $kafedralarNomlari = $user->masulKafedralar->pluck('name')->filter();
                        $initials = collect(explode(' ', $user->name))->filter()->take(2)->map(fn ($w) => mb_strtoupper(mb_substr($w, 0, 1)))->join('');
                    @endphp
                    <div class="kafedra-masul-card box p-4 mb-3 border border-gray-100 hover:border-theme-1" data-search="{{ strtolower($user->name . ' ' . $user->email) }}">
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 rounded-full bg-theme-1 text-white flex items-center justify-center text-sm font-semibold">{{ $initials ?: '?' }}</div>
                            <div class="flex-1 min-w-0">
                                <div class="flex justify-between gap-3">
                                    <div class="min-w-0">
                                        <h3 class="font-medium truncate">{{ $user->name }}</h3>
                                        <p class="text-sm text-gray-500 truncate">{{ $user->email }}</p>
                                    </div>
                                    <div class="flex gap-1 flex-shrink-0">
                                        @can('update user')
                                            <button type="button" class="button px-2 py-1.5 border border-theme-1 text-theme-1 kafedra-masul-edit-btn"
                                                data-user-id="{{ $user->id }}" data-user-name="{{ $user->name }}" data-user-email="{{ $user->email }}"
                                                data-kafedralar-ids="{{ $user->masulKafedralar->pluck('id')->join(',') }}">
                                                <i data-feather="edit-2" class="w-4 h-4"></i>
                                            </button>
                                        @endcan
                                        @can('delete user')
                                            <form action="{{ url('users/' . $user->id . '/delete') }}" class="inline" onsubmit="return confirm('Rostdan o\'chirishni xohlaysizmi?');">
                                                @csrf
                                                <button type="submit" class="button px-2 py-1.5 border border-theme-6 text-theme-6"><i data-feather="trash-2" class="w-4 h-4"></i></button>
                                            </form>
                                        @endcan
                                    </div>
                                </div>
                                <div class="mt-3 flex flex-wrap gap-1.5">
                                    @forelse ($kafedralarNomlari as $nomi)
                                        <span class="text-xs px-2 py-1 rounded-full bg-gray-100 text-gray-700">{{ Str::limit($nomi, 45) }}</span>
                                    @empty
                                        <span class="text-xs text-gray-400">Kafedra biriktirilmagan</span>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="text-center py-12 text-gray-500">
                        <p class="font-medium">Hozircha masul yo'q</p>
                        <button type="button" class="button bg-theme-1 text-white mt-4 kafedra-masul-quick-add">Biriktirish</button>
                    </div>
                @endforelse
                <div id="kafedra-masul-no-results" class="hidden py-12 text-center text-gray-500">Natija topilmadi</div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const editModal = document.getElementById('laboratory-paper-masul-edit-modal');
            const editForm = document.getElementById('kafedra-masul-edit-form');
            const createForm = document.getElementById('kafedra-masul-create-form');
            const editUrlBase = @json(url('/kafedra-masul-edit'));
            const hasCreateErrors = @json($errors->any() && old('form_source') === 'kafedra_masul_create');

            function replaceFeather() { if (typeof feather !== 'undefined') feather.replace(); }
            if (hasCreateErrors) { $('#laboratory-paper-masul-create-modal').modal('show'); replaceFeather(); }

            document.querySelectorAll('.password-toggle').forEach(function(btn) {
                btn.addEventListener('click', function() {
                    const input = document.getElementById(this.dataset.target);
                    if (!input) return;
                    input.type = input.type === 'password' ? 'text' : 'password';
                    replaceFeather();
                });
            });

            document.querySelectorAll('.kafedra-masul-edit-btn').forEach(function(btn) {
                btn.addEventListener('click', function() {
                    editForm.action = editUrlBase + '/' + this.dataset.userId;
                    document.getElementById('kafedra-edit-name').value = this.dataset.userName;
                    document.getElementById('kafedra-edit-email-display').value = this.dataset.userEmail;
                    document.getElementById('kafedra-edit-email-hidden').value = this.dataset.userEmail;
                    document.getElementById('kafedra-edit-password').value = '';
                    document.getElementById('kafedra-edit-preview-name').textContent = this.dataset.userName;
                    document.getElementById('kafedra-edit-preview-email').textContent = this.dataset.userEmail;
                    document.getElementById('kafedra-edit-initials').textContent = (this.dataset.userName || '?').split(/\s+/).slice(0,2).map(w=>w[0]).join('').toUpperCase();
                    const ids = (this.dataset.kafedralarIds || '').split(',').filter(Boolean);
                    document.querySelectorAll('.kafedra-edit-checkbox').forEach(cb => { cb.checked = ids.includes(cb.value); });
                    $('#laboratory-masul-list-modal').modal('hide');
                    $(editModal).modal('show');
                    replaceFeather();
                });
            });

            function bindCheckboxValidation(form, sel, errId, listId) {
                if (!form) return;
                form.addEventListener('submit', function(e) {
                    if (!form.querySelectorAll(sel + ':checked').length) {
                        e.preventDefault();
                        const el = document.getElementById(errId);
                        if (el) el.classList.remove('hidden');
                        document.getElementById(listId).scrollIntoView({ behavior: 'smooth', block: 'nearest' });
                    }
                });
            }
            bindCheckboxValidation(createForm, '.kafedra-create-checkbox', 'kafedra-create-error', 'kafedra-create-list');
            bindCheckboxValidation(editForm, '.kafedra-edit-checkbox', 'kafedra-edit-error', 'kafedra-edit-list');

            const search = document.getElementById('kafedra-masul-search');
            const cards = document.querySelectorAll('.kafedra-masul-card');
            const countEl = document.getElementById('kafedra-masul-count-visible');
            const noRes = document.getElementById('kafedra-masul-no-results');
            if (search && cards.length) {
                search.addEventListener('input', function() {
                    const q = this.value.trim().toLowerCase();
                    let n = 0;
                    cards.forEach(c => { const ok = !q || (c.dataset.search||'').includes(q); c.classList.toggle('hidden', !ok); if (ok) n++; });
                    if (countEl) countEl.textContent = n;
                    if (noRes) noRes.classList.toggle('hidden', n > 0);
                });
            }
            document.querySelectorAll('.kafedra-masul-quick-add').forEach(btn => {
                btn.addEventListener('click', function(e) {
                    e.preventDefault();
                    $('#laboratory-masul-list-modal').modal('hide');
                    setTimeout(() => { $('#laboratory-paper-masul-create-modal').modal('show'); replaceFeather(); }, 300);
                });
            });
        });
    </script>

    <div class="modal" id="laboratory-paper-create-modal">
        <div class="modal__content modal__content--xl">
            <div class="p-5">
                <div style="display: flex; justify-content: space-between;margin-bottom: 10px; align-items: center;">
                    <div>
                        <h2 class="text-lg font-medium">Kafedra qo'shish</h2>
                    </div>
                    <div>
                        <a data-dismiss="modal" href="javascript:;" style="display: flex; justify-content: end;"> <i
                                data-feather="x" class="w-8 h-8 text-gray-500"></i> </a>
                    </div>
                </div>

                <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2">
                    <div class="w-full mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                        <form id="science-paper-create-form" method="POST" action="{{ route("kafedralar.store") }}"
                            class="validate-form" enctype="multipart/form-data" novalidate="novalidate">
                            @csrf
                            <div class="grid grid-cols-12 gap-2">
                                <div class="w-full col-span-12">
                                    <label class="flex flex-col sm:flex-row"> <span
                                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Kafedra nomi
                                    </label>
                                    <input type="text" name="name" value="{{ old('name') }}"
                                        class="input w-full border mt-2" required="">
                                </div>

                                <div class="w-full col-span-12">
                                    <label class="flex flex-col sm:flex-row"> <span
                                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Tashkil etilgan yil
                                    </label>
                                    <select name="tash_yil" value="{{ old('tash_yil') }}"
                                        class="science-sub-categoryyil input border w-full mt-2 " required="">
                                        <option value=""></option>
                                    </select>
                                </div>

                                <div class="w-full col-span-12">
                                    <label class="flex flex-col sm:flex-row"> <span
                                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Fakultetni tanlang
                                    </label>
                                    <select name="fakultetlar_id" class="input border w-full mt-2" required="">
                                        <option value=""> </option>
                                        @foreach ($fakultetlar as $role)
                                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>

            </div>
            <div class="px-5 pb-5 text-center mt-4">
                <button type="button" data-dismiss="modal" class="button delete-cancel w-32 border text-gray-700 mr-1">
                    Bekor qilish
                </button>
                <button type="submit" form="science-paper-create-form"
                    class="update-confirm button w-24 bg-theme-1 text-white">
                    Qo'shish
                </button>
            </div>
        </div>
    </div>

@endsection