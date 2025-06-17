@extends('layouts.admin')

@section('content')

<div class="content">
    <div class="flex justify-between align-center mt-6 mb-6">

        <h2 class="intro-y text-lg font-medium"> Xo'jalik shartnomalar </h2>

        <!-- <a href="{{ route("xujalik.create") }}" class="button w-24 bg-theme-1 text-white">
            Qo'shish
        </a> -->
        <a href="{{ route("itm.xujalikloyhalar") }}"  class="button box flex items-center text-gray-700"> <i data-feather="file-text" class="hidden sm:block w-4 h-4 mr-2"></i> Export to Excel </a>

    </div>
    @if (session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif

        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <table class="table table-report -mt-2">
                <thead>
                    <tr>
                        <th class="whitespace-no-wrap">№</th>
                        <th class="whitespace-no-wrap">Tashkilot nomi</th>
                        <th class="whitespace-no-wrap">Ishlanma nomi</th>
                        <th class="whitespace-no-wrap">Shartnoma turi</th>
                        <th class="whitespace-no-wrap">Ishlanma yaratilgan tadqiqot mavzusi</th>
                        <th class="whitespace-no-wrap text-center">Harakat</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($xujaliks as $xodimlar )

                    <tr class="intro-x">
                        <td>{{$loop->index+1}}</td>
                        <td>
                            <a href="#" target="_blank"  class="font-medium">{{ $xodimlar->tashkilot->name_qisqachasi }}</a>
                        </td>
                        <td>
                            <a href="" class="font-medium ">{{ $xodimlar->ishlanma_nomi  }} </a>
                        </td>
                        <td>
                            <a href="" class="font-medium ">{{ $xodimlar->ishlanma_turi }}</a>
                        </td>
                        <td>
                            <a href="" class="font-medium ">{{ $xodimlar->ishlanma_mavzu }}</a>
                        </td>
                        <td class="table-report__action w-56">
                            <div class="flex justify-center items-center">


                                <a class="flex science-update-action items-center mr-3" href="{{ route('xujalik.show',['xujalik'=>$xodimlar->id]) }}" >
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



        <!-- END: Data List -->
        <div class="intro-y flex flex-wrap sm:flex-row sm:flex-no-wrap items-center mt-3">
            {{$xujaliks->links()}}
        </div>
    </div>






</div>
@endsection
