@extends('layouts.admin')

@section('content')

<div class="content">
    <div class="flex justify-between align-center mt-6 mb-6">

        <h2 class="intro-y text-lg font-medium">Tashkilotlar</h2>

        <!-- <a href="{{ route('tashkilot.create') }}"  class="button w-24 bg-theme-1 text-white">
            Qo'shish
        </a> -->
        <div class="intro-x relative mr-3 sm:mr-6">
            <div class="search hidden sm:block">
            <form action="{{ route('searchloyiha') }}" method="GET">
                <input type="text" name="query" class="search__input input placeholder-theme-13" placeholder="Search...">
                <i data-feather="search" class="search__icon"></i>
            </form>
            </div>
            <a class="notification sm:hidden" href=""> <i data-feather="search" class="notification__icon"></i> </a>
        </div>
        {{-- <div>
            <div>
                <a href="{{ route("tashqoshish.create") }}" class="button w-24 bg-theme-1 text-white">
                    Qo'shish
                </a>
            </div>

        </div> --}}

    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">


        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
        <table class="table table-report -mt-2">
                <thead>
                <tr>
                        <th class="whitespace-no-wrap">№</th>
                        <th class="whitespace-no-wrap">Loyiha mavzusi</th>
                        <th class="whitespace-no-wrap">Loyiha rahbari</th>
                        <th class="whitespace-no-wrap">Loyiha turi</th>
                        <th class="whitespace-no-wrap">Raqami</th>
                        <th class="whitespace-no-wrap" style="width: 150px;">
                            <form method="GET" action="{{ route('searchloyiha') }}">
                                <select class="form-select" aria-label="Default select example" name="query" onchange="this.form.submit()">
                                    <option value="">Status</option>
                                    <option value="Jarayonda">Jarayonda</option>
                                    <option value="Yakunlangan">Yakunlangan</option>
                                </select>
                            </form>
                        </th>
                        <th class="whitespace-no-wrap text-center">Harakat</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($ilmiyloyiha as $xodimlar )

                    <tr class="intro-x">
                        <td>{{$loop->index+1}}</td>
                        <td>
                            {{ $xodimlar->mavzusi  }}
                        </td>
                        <td>
                            {{ $xodimlar->rahbar_name }}
                        </td>
                        <td>
                            {{ $xodimlar->turi }}
                        </td>
                        <td>
                            {{ $xodimlar->raqami }}
                        </td>
                        <td>
                            {{ $xodimlar->status }}
                        </td>
                        <td class="table-report__action w-56">
                            <div class="flex justify-center items-center">
                                @role('super-admin')
                                <a class="flex science-update-action items-center mr-3" href="{{ route('ilmiyloyiha.edit',['ilmiyloyiha'=>$xodimlar->id]) }}" >
                                        <i data-feather="edit"  class="feather feather-check-square w-4 h-4 mr-1"></i>
                                    Tahrirlash
                                </a>
                                <form action="{{ route('ilmiyloyiha.destroy',['ilmiyloyiha'=>$xodimlar->id]) }}" method="post" onsubmit="return confirm(' Rostan Ochirishni hohlaysizmi?');">
                                    <button type="submit" class="flex delete-action items-center text-theme-6" >
                                    @csrf
                                    @method("DELETE")
                                        <i data-feather="trash-2"  class="feather feather-check-square w-4 h-4 mr-1"></i>
                                        O'chirish
                                    </button>
                                </form>
                                @endrole

                                <a class="flex science-update-action items-center mr-3" href="{{ route('ilmiyloyiha.show',['ilmiyloyiha'=>$xodimlar->id]) }}" >
                                        <i data-feather="eye"  class="feather feather-check-square w-4 h-4 mr-1"></i>
                                    Ko'rish
                                </a>



                            </div>
                        </td>
                    </tr>
                    @endforeach


                </tbody>
            </table>
        </div>
        <div class="intro-y flex flex-wrap sm:flex-row sm:flex-no-wrap items-center mt-3">
            {{$ilmiyloyiha->links()}}
            <select class="w-20 input box mt-3 sm:mt-0">
                <option>10</option>
                <option>25</option>
                <option>35</option>
                <option>50</option>
            </select>
        </div>




    </div>






</div>
@endsection
