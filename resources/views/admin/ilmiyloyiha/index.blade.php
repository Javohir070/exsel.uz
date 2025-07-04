@extends('layouts.admin')

@section('content')

<div class="content">
    <div class="flex justify-between align-center mt-6 mb-6">

        <h2 class="intro-y text-lg font-medium">Ilmiy loyihalar</h2>
        <div>
            <a href="{{ route("ilmiy_loyha_edit.index") }}" class="button w-24 bg-theme-1 text-white mr-2">
                Masul biriktirish
            </a>
            <!-- <a href="{{ route("ilmiyloyiha.create") }}" class="button w-24 bg-theme-1 text-white mr-2">
                Qo'shish
            </a> -->
            <a href="{{ route("masul.index") }}" class="button w-24 bg-theme-1 text-white">
                Masullar
            </a>
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
                        <th class="whitespace-no-wrap">Loyiha mavzusi</th>
                        <th class="whitespace-no-wrap">Loyiha rahbari</th>
                        <th class="whitespace-no-wrap">Loyiha turi</th>
                        <!-- <th class="whitespace-no-wrap">Status</th> -->
                        <th class="whitespace-no-wrap">Masul</th>
                        <th class="whitespace-no-wrap text-center">Harakat</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($ilmiyloyiha as $xodimlar )

                    <tr class="intro-x">
                        <td>{{$loop->index+1}}</td>
                        <td>
                            <a href="" class="font-medium ">{{ $xodimlar->mavzusi  }} </a>
                        </td>
                        <td>
                            <a href="" class="font-medium ">{{ $xodimlar->rahbar_name }}</a>
                        </td>
                        <td>
                            <a href="" class="font-medium ">{{ $xodimlar->turi }}</a>
                        </td>
                        <!-- <td>
                            <a href="" class="font-medium ">{{ $xodimlar->dastyri }}</a>
                        </td> -->
                        <td>
                            <a href="" class="font-medium ">
                                @if($xodimlar->user_id == 1)
                                <a href="{{ route("ilmiy_loyha_edit.index") }}" class="button  bg-theme-1 text-white mr-4" style="display: ruby;">
                                    Masul biriktirish
                                </a>
                                @else
                                {{ $xodimlar->user->name }}
                                @endif
                            </a>
                        </td>
                        <td class="table-report__action w-56">
                            <div class="flex justify-center items-center">
                                {{-- <a class="flex science-update-action items-center mr-3" href="{{ route('ilmiyloyiha.edit',['ilmiyloyiha'=>$xodimlar->id]) }}" >
                                        <i data-feather="edit"  class="feather feather-check-square w-4 h-4 mr-1"></i>
                                    Tahrirlash
                                </a> --}}

                                <a class="flex science-update-action items-center mr-3" href="{{ route('ilmiyloyiha.show',['ilmiyloyiha'=>$xodimlar->id]) }}" >
                                        <i data-feather="eye"  class="feather feather-check-square w-4 h-4 mr-1"></i>
                                    Ko'rish
                                </a>

                                <!-- <form action="{{ route('ilmiyloyiha.destroy',['ilmiyloyiha'=>$xodimlar->id]) }}" method="post" onsubmit="return confirm(' Rostan Ochirishni hohlaysizmi?');">
                                    <button type="submit" class="flex delete-action items-center text-theme-6" >
                                    @csrf
                                    @method("DELETE")
                                        <i data-feather="trash-2"  class="feather feather-check-square w-4 h-4 mr-1"></i>
                                        O'chirish
                                    </button>
                                </form> -->

                            </div>
                        </td>
                    </tr>
                    @endforeach


                </tbody>
            </table>
        </div>

        <!-- END: Data List -->
        <div class="intro-y flex flex-wrap sm:flex-row sm:flex-no-wrap items-center mt-3">
            {{$ilmiyloyiha->links()}}
        </div>

    </div>

</div>
@endsection
