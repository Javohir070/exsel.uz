@extends('layouts.admin')
@section('content')
    <div class="flex justify-between align-center mt-6 mb-6">

        <h2 class="intro-y text-lg font-medium">Foydalanuvchilar </h2>

        <form action="{{ route('users.index') }}" method="GET" class="flex flex-wrap items-center gap-2">
            <div class="intro-x relative">
                <input type="text" name="query" class="input input--lg w-full lg:w-64 box pr-10 placeholder-theme-13"
                    placeholder="Search..." value="{{ request('query') }}">
                <i data-feather="search" class="feather feather-search w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0"></i>
            </div>

            <select name="role_id" class="input border w-48">
                <option value="">Barcha rollar</option>
                @foreach ($roles as $role)
                    <option value="{{ $role->id }}" @selected((string) request('role_id') === (string) $role->id)>
                        {{ $role->name }}
                    </option>
                @endforeach
            </select>
            <select name="tashkilot_id" id="science-search-category" class="input border w-56 bg-white rounded-md">
                <option value="">Barcha tashkilotlar</option>
                @foreach ($tashkilots as $tashkilot)
                    <option value="{{ $tashkilot->id }}" @selected((string) request('tashkilot_id') === (string) $tashkilot->id)>
                        {{ $tashkilot->name }}
                    </option>
                @endforeach
            </select>

            <button type="submit" class="button bg-theme-1 text-white">Filter</button>
            <a href="{{ route('users.index') }}" class="button border text-gray-700">Tozalash</a>
        </form>

        <div>
            <div class="flex justify-end">
                @can('create user')
                    <a href="{{ url('users/create') }}" class="button w-24 bg-theme-1 text-white">
                        Qo'shish
                    </a>
                @endcan
            </div>
        </div>
    </div>

    <div class="container mt-2">
        <div class="row">
            <div class="col-md-12">

                @if (session('status'))
                    <div class="alert alert-success ">{{ session('status') }}</div>
                @endif

                <div class="card mt-3">
                    <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">

                        <table class="table table-report -mt-2">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Tashkilot nomi</th>
                                    <th>Masul shaxs F.I.Sh</th>
                                    <th>Email</th>
                                    <th>Rollar</th>
                                    <th>Active</th>
                                    <th>Amallar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->tashkilot->name ?? '—' }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            @if (!empty($user->getRoleNames()))
                                                @foreach ($user->getRoleNames() as $rolename)
                                                    <label class="badge bg-primary mx-1">{{ $rolename }}</label>
                                                @endforeach
                                            @endif
                                        </td>
                                        <td>
                                            @can('update user')
                                                <form action="{{ route('users.toggle-active', $user) }}" method="POST"
                                                    class="inline">
                                                    @csrf
                                                    @method('PATCH')
                                                    <label class="flex items-center cursor-pointer">
                                                        <input type="checkbox" class="input input--switch border"
                                                            {{ $user->is_active ? 'checked' : '' }}
                                                            onchange="this.form.submit()">
                                                    </label>
                                                </form>
                                            @else
                                                <span class="badge {{ $user->is_active ? 'bg-theme-9' : 'bg-theme-6' }}">
                                                    {{ $user->is_active ? 'Faol' : 'Faol emas' }}
                                                </span>
                                            @endcan
                                        </td>
                                        <td>
                                            <div style="display: flex; gap: 10px;">
                                                @can('update user')
                                                    <a href="{{ url('users/' . $user->id . '/edit') }}"
                                                        class="button inline-block border border-theme-1 text-theme-1">
                                                        <i data-feather="edit" class="feather feather-check-square w-4 h-4"></i>
                                                    </a>
                                                @endcan

                                                @can('delete user')
                                                    <form action="{{ url('users/' . $user->id . '/delete') }}"
                                                        onsubmit="return confirm(' Rostan Ochirishni hohlaysizmi?');">
                                                        <button type="submit"
                                                            class="button inline-block border border-theme-6 text-theme-6">
                                                            @csrf
                                                            <i data-feather="trash-2"
                                                                class="feather feather-check-square w-4 h-4"></i>
                                                        </button>
                                                    </form>
                                                @endcan
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                    <div class="intro-y flex flex-wrap sm:flex-row sm:flex-no-wrap items-center mt-3">
                        {{ $users->appends(request()->query())->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
