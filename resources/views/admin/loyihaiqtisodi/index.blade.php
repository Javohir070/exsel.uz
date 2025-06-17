@extends('layouts.admin')

@section('content')

<div class="content">
    <div class="flex justify-between align-center mt-6 mb-6">

        <h2 class="intro-y text-lg font-medium">Ilmiy loyihalar loyihaiqtisodi</h2>
        <div>
            <a href="{{ route("loyihaiqtisodi.create") }}" class="button w-24 bg-theme-1 text-white mr-2">
                Qo'shish
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
                        <th class="whitespace-no-wrap">hisobot_davri</th>
                        <th class="whitespace-no-wrap">loyihabaj_ishlanma</th>
                        <th class="whitespace-no-wrap">ilmiy_ishlanmalar</th>
                        <th class="whitespace-no-wrap text-center">Harakat</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($loyihaiqtisodis as $xodimlar )

                    <tr class="intro-x">
                        <td>{{$loop->index+1}}</td>
                        <td>
                            <a href="" class="font-medium ">{{ $xodimlar->hisobot_davri  }} </a>
                        </td>
                        <td>
                            <a href="" class="font-medium ">{{ $xodimlar->loyihabaj_ishlanma }}</a>
                        </td>
                        <td>
                            <a href="" class="font-medium ">{{ $xodimlar->ilmiy_ishlanmalar }}</a>
                        </td>
                        <td class="table-report__action w-56">
                            <div class="flex justify-center items-center">
                                <a class="flex science-update-action items-center mr-3" href="{{ route('loyihaiqtisodi.edit',['loyihaiqtisodi'=>$xodimlar->id]) }}" >
                                        <i data-feather="edit"  class="feather feather-check-square w-4 h-4 mr-1"></i>
                                    Tahrirlash
                                </a>

                                <a class="flex science-update-action items-center mr-3" href="{{ route('loyihaiqtisodi.show',['loyihaiqtisodi'=>$xodimlar->id]) }}" >
                                        <i data-feather="eye"  class="feather feather-check-square w-4 h-4 mr-1"></i>
                                    Ko'rish
                                </a>

                                <form action="{{ route('loyihaiqtisodi.destroy',['loyihaiqtisodi'=>$xodimlar->id]) }}" method="post" onsubmit="return confirm(' Rostan Ochirishni hohlaysizmi?');">
                                    <button type="submit" class="flex delete-action items-center text-theme-6" >
                                    @csrf
                                    @method("DELETE")
                                        <i data-feather="trash-2"  class="feather feather-check-square w-4 h-4 mr-1"></i>
                                        O'chirish
                                    </button>
                                </form>

                            </div>
                        </td>
                    </tr>
                    @endforeach


                </tbody>
            </table>
        </div>



        <!-- END: Data List -->
        <div class="intro-y flex flex-wrap sm:flex-row sm:flex-no-wrap items-center mt-3">
            {{$loyihaiqtisodis->links()}}
        </div>

    </div>






</div>
@endsection
