@extends("layouts.admin")
@section("content")
    <div class="flex justify-between align-center mt-6 mb-6">

        <h2 class="intro-y text-lg font-medium">Monitoring ishchi guruh </h2>

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
                                    <th>Guruh</th>
                                    <th>Viloyat</th>
                                    <th>Rollar</th>
                                    <th>Active</th>
                                    <th>Amallar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $rowNumber = 1;
                                @endphp
                                @foreach ($users as $groupId => $groupUsers)
                                    @if ($groupId)
                                        <tr class="bg-gray-100">
                                            <td colspan="9" class="font-bold text-lg py-3">
                                                <h2 class="text-center">{{ $groupId }}-guruh ({{ $groupUsers->count() }} ta foydalanuvchi)</h2>
                                            </td>
                                        </tr>
                                    @endif
                                    @foreach ($groupUsers as $user)
                                        <tr>
                                            <td>{{ $rowNumber++ }}</td>
                                            <td>{{ $user->tashkilot->name ?? 'N/A' }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->group_id ? $user->group_id.'-guruh' : 'Guruh yo\'q' }}</td>
                                            <td>{{ $user->region->oz ?? 'Viloyat yo\'q' }}</td>
                                            <td>
                                                @if (!empty($user->getRoleNames()))
                                                    @foreach ($user->getRoleNames() as $rolename)
                                                        <label class="badge bg-primary mx-1">{{ $rolename }}</label>
                                                    @endforeach
                                                @endif
                                            </td>
                                            <td>
                                                @can('update user')
                                                    <form action="{{ route('users.toggle-active', $user) }}" method="POST" class="inline">
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
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection