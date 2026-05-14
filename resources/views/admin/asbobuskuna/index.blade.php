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
                <a href="javascript:;" data-target="#asbobuskuna-paper-masul-create-modal" data-toggle="modal"
                    class="button w-24 ml-3 bg-theme-1 text-white">
                    Masul biriktirsh
                </a>

                <a href="javascript:;" data-target="#asbobuskuna-masul-list-modal" data-toggle="modal"
                    class="button w-24 ml-3 bg-theme-1 text-white">
                    Masullar ro'yxati
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

    <div class="modal" id="asbobuskuna-paper-masul-create-modal">
        <div class="modal__content modal__content--xl">
            <div class="p-5">
                <div style="display: flex; justify-content: space-between;margin-bottom: 10px; align-items: center;">
                    <div>
                        <h2 class="text-lg font-medium">Asbob-uskuna masul biriktirish</h2>
                    </div>
                    <div>
                        <a data-dismiss="modal" href="javascript:;" style="display: flex; justify-content: end;"> <i
                                data-feather="x" class="w-8 h-8 text-gray-500"></i> </a>
                    </div>
                </div>

                <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2">
                    <div class="w-full mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                        <form id="asbobuskuna-paper-create-form" method="POST" action="{{ route('tashkilot.users.store') }}"
                            class="validate-form" enctype="multipart/form-data" novalidate="novalidate">
                            @csrf
                                <input type="hidden" name="asbobuskuna_id" value="{{ $asbobuskunas->first()->id ?? '' }}">
                            <div class="grid grid-cols-12 gap-2">
                                <div class="w-full col-span-6">
                                    <label class="flex flex-col sm:flex-row"> <span
                                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> F.I.Sh
                                    </label>
                                    <input type="text" name="name" class="input w-full border mt-2"
                                        value="{{ old('name') }}" required="">
                                </div>

                                <div class="w-full col-span-6">
                                    <label class="flex flex-col sm:flex-row"> <span
                                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Login (foydalanuvchi
                                        email adresini
                                        kiriting)
                                    </label>
                                    <input type="email" name="email" class="input w-full border mt-2"
                                        value="{{ old('email') }}" required="">
                                </div>

                                <div class="w-full col-span-6">
                                    <label class="flex flex-col sm:flex-row"> <span
                                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Parolni kiriting
                                    </label>
                                    <input type="password" name="password" class="input w-full border mt-2"
                                        value="{{ old('password') }}" required="">
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
                <button type="submit" form="asbobuskuna-paper-create-form"
                    class="update-confirm button w-24 bg-theme-1 text-white">
                    Qo'shish
                </button>
            </div>
        </div>
    </div>

    <div class="modal" id="asbobuskuna-masul-list-modal">
        <div class="modal__content modal__content--xl">
            <div class="overflow-x-auto p-5">
                <div style="display: flex; justify-content: space-between;margin-bottom: 10px; align-items: center;">
                    <div>
                        <h2 class="text-lg font-medium">Asbob-uskunaga masullar ro'yxati</h2>
                    </div>
                    <div>
                        <a data-dismiss="modal" href="javascript:;" style="display: flex; justify-content: end;"> <i
                                data-feather="x" class="w-8 h-8 text-gray-500"></i> </a>
                    </div>
                </div>
                <table class="table">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="border">Id</th>
                            <th class="border">F.I.Sh</th>
                            <th class="border">Email</th>
                            <th class="border">Roles</th>
                            <th class="border">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($masullar as $user)
                            <tr>
                                <td class="border ">{{ $loop->index + 1 }}</td>
                                <td class="border">{{ $user->name }}</td>
                                <td class="border">{{ $user->email }}</td>
                                <td class="border">
                                    @if (!empty($user->getRoleNames()))
                                        @foreach ($user->getRoleNames() as $rolename)
                                            <label class="badge bg-primary mx-1">{{ $rolename }}</label>
                                        @endforeach
                                    @endif
                                </td>
                                <td class="border">
                                    @can('update user')
                                        <a href="{{ url('users/' . $user->id . '/edit') }}"
                                            class="button inline-block border border-theme-1 text-theme-1">
                                            <i data-feather="edit" class="feather feather-check-square w-4 h-4"></i>
                                        </a>
                                    @endcan

                                    @can('delete user')
                                        <form action="{{ url('users/' . $user->id . '/delete') }}"
                                            onsubmit="return confirm(' Rostan Ochirishni hohlaysizmi?');">
                                            <button type="submit" class="button inline-block border border-theme-6 text-theme-6">
                                                @csrf
                                                <i data-feather="trash-2" class="feather feather-check-square w-4 h-4"></i>
                                            </button>
                                        </form>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection