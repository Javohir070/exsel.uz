@extends("layouts.admin")
@section("content")
    <div class="flex justify-between align-center mt-6 mb-6">

        <h2 class="intro-y text-lg font-medium">Permissions </h2>

        @can('create role')
            <a href="{{ url('permissions/create') }}" class="button w-24 bg-theme-1 text-white">
                Add Perm
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
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th width="40%" style="text-align: center;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($permissions as $permission)
                                    <tr>
                                        <td>{{ $permission->id }}</td>
                                        <td>{{ $permission->name }}</td>
                                        <td style="text-align: center;">
                                            @can('update permission')
                                                <a href="{{ url('permissions/' . $permission->id . '/edit') }}"
                                                    class="button inline-block border border-theme-1 text-theme-1"><i data-feather="edit" class="feather feather-check-square w-4 h-4"></i></a>
                                            @endcan

                                            @can('delete permission')
                                                <a href="{{ url('permissions/' . $permission->id . '/delete') }}"
                                                    class="button inline-block border border-theme-6 text-theme-6"><i data-feather="trash-2" class="feather feather-check-square w-4 h-4"></i></a>
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