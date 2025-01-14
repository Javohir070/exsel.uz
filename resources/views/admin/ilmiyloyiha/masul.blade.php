@extends('layouts.admin')
@section('content')
    <div class="flex justify-between align-center mt-10">

        <h2 class="intro-y text-lg font-medium">Mas'ullar </h2>


        {{-- <div class="intro-x relative mr-3 sm:mr-6">
            <div class="search hidden sm:block">
            <form action="{{ route('searchuser') }}" method="GET">
                <input type="text" name="query" class="search__input input placeholder-theme-13" placeholder="Search...">
                <i data-feather="search" class="search__icon"></i> 
            </form>
            </div>
            <a class="notification sm:hidden" href=""> <i data-feather="search" class="notification__icon"></i> </a>
        </div> --}}
        <div>
            <div>
               
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
                                    <th>Loyiha mavzusi</th>
                                    <th>Masul shaxs F.I.Sh</th>
                                    <th>Email</th>
                                    <th>Roles</th>
                                    <!-- <th>Action</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($masullar as $user)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>
                                            @foreach($user->ilmiyloyhalar as $k)
                                                {{ $k->mavzusi ?? "bunga loyiha biriktirilmagan"}},
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
                                        <!-- <td>
                                            @can('update user')
                                                <a href="{{ url('users/' . $user->id . '/edit') }}" class="btn btn-success">Edit</a>
                                            @endcan

                                            @can('delete user')
                                                <a href="{{ url('users/' . $user->id . '/delete') }}"
                                                    class="btn btn-danger mx-2">Delete</a>
                                            @endcan
                                        </td> -->
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                    {{-- <div class="intro-y flex flex-wrap sm:flex-row sm:flex-no-wrap items-center mt-3">
                        
                        <select class="w-20 input box mt-3 sm:mt-0">
                            <option>10</option>
                            <option>25</option>
                            <option>35</option>
                            <option>50</option>
                        </select>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
@endsection
