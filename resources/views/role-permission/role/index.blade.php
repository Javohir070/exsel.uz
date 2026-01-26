@extends("layouts.admin")
@section("content")
    <div class="flex justify-between align-center mt-6 mb-6">

        <h2 class="intro-y text-lg font-medium">Roles </h2>

        @can('create role')
            <a href="{{ url('roles/create') }}" class="button w-24 bg-theme-1 text-white">
                Add Role
            </a>
        @endcan
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">

                @if (session('status'))
                    <div class="alert alert-success">{{ session('status') }}</div>
                @endif

                <div class="card mt-3">
                    <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">

                        <table class="table table-report">
                            <thead>
                                <tr>
                                    <th style="width: 50px;">Id</th>
                                    <th>Nomi</th>
                                    <th width="40%" style="text-align: center;">Amallar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $role)
                                    <tr>
                                        <td>{{ $role->id }}.</td>
                                        <td>{{ $role->name }}</td>
                                        <td style="text-align: center;">
                                            <a href="{{ url('roles/' . $role->id . '/give-permissions') }}" class="button inline-block border border-theme-1 text-theme-1">
                                                Add / Edit Role Permission
                                            </a>

                                            @can('update role')
                                                <a href="{{ url('roles/' . $role->id . '/edit') }}" class="button inline-block border border-theme-5 text-theme-9">
                                                    Edit
                                                </a>
                                            @endcan

                                            @can('delete role')
                                                <a href="{{ url('roles/' . $role->id . '/delete') }}" class="button inline-block border border-theme-6 text-theme-6">
                                                    Delete
                                                </a>
                                            @endcan
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