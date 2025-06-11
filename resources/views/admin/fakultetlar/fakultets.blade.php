@extends('layouts.admin')

@section('content')

    <div class="content">
        <div class="flex justify-between align-center mt-10">

            <h2 class="intro-y text-lg font-medium">Fakultetlar</h2>

        </div>

        @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif

        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible mb-4">
            <table class="table table-report -mt-2">
                <thead>
                    <tr>
                        <th class="whitespace-no-wrap">№</th>
                        <th class="whitespace-no-wrap">Tashkilot nomi </th>
                        <th class="whitespace-no-wrap">Fakultet nomi </th>
                        <th class="whitespace-no-wrap">Tashkil etilgan yili</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($fakultets as $xodimlar)

                        <tr class="intro-x">
                            <td>{{$loop->index + 1}}</td>
                            <td>
                                {{ $xodimlar->tashkilot->name }}
                            </td>
                            <td>
                                {{ $xodimlar->name }}
                            </td>
                            <td>
                                {{ $xodimlar->tash_yil }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{ $fakultets->links() }}

    </div>

@endsection
