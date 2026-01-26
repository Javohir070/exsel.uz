@extends('layouts.admin')
@section('content')
    <div class="flex justify-between align-center mt-6 mb-6">

        <h2 class="intro-y text-lg font-medium">Mas'ullar</h2>

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
                                    <th>Loyiha mavzusi</th>
                                    <th>Masul shaxs F.I.Sh</th>
                                    <th>Email</th>
                                    <th>Roles</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($masullar as $user)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>
                                            @foreach($user->ilmiyloyhalar as $k)
                                                {{ $k->mavzusi}},
                                            @endforeach
                                        </td>
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
                                            <a href="{{ route('ilmiy_loyha_user_edit.index', ['id' => $user->id]) }}"
                                                class="btn btn-success">Edit</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection