@extends("layouts.admin")
@section("content")
<div class="flex justify-between align-center mt-6 mb-6">

    <h2 class="intro-y text-lg font-medium">Roles </h2>

    @can('create role')
    <a href="{{ url('roles/create') }}"  class="button w-24 bg-theme-1 text-white">
        Add Role
    </a>
    @endcan
</div>
<div class="container mt-5">
        <a href="{{ url('roles') }}" class="button bg-theme-1 text-white btn btn-primary mx-1">Roles</a>
        <a href="{{ url('permissions') }}" class=" button bg-theme-1 text-white btn btn-info mx-1">Permissions</a>
        <a href="{{ url('users') }}" class="button bg-theme-1 text-white btn btn-warning mx-1">Users</a>
    </div>

    <div class="container mt-2">
        <div class="row">
            <div class="col-md-12">

                @if (session('status'))
                    <div class="alert alert-success">{{ session('status') }}</div>
                @endif

                <div class="card mt-3">
                    <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">

                        <table class="table table-report -mt-2">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th width="40%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $role)
                                <tr>
                                    <td>{{ $role->id }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td>
                                        <a href="{{ url('roles/'.$role->id.'/give-permissions') }}" class="btn btn-warning">
                                            Add / Edit Role Permission
                                        </a>

                                        @can('update role')
                                        <a href="{{ url('roles/'.$role->id.'/edit') }}" class="btn btn-success">
                                            Edit
                                        </a>
                                        @endcan

                                        @can('delete role')
                                        <a href="{{ url('roles/'.$role->id.'/delete') }}" class="btn btn-danger mx-2">
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
