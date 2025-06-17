@extends("layouts.admin")
@section("content")
<div class="flex justify-between align-center mt-6 mb-6">

        <h2 class="intro-y text-lg font-medium">Adminlar </h2>


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
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($itmadminlar as $user)
                                <tr class="intro-x">
                                    <td>{{$loop->index+1}}</td>
                                    <td>{{ $user->tashkilot->name }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                    <div class="intro-y flex flex-wrap sm:flex-row sm:flex-no-wrap items-center mt-3">
                        {{$itmadminlar->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
