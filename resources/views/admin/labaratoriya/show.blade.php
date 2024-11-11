@extends('layouts.admin')

@section('content')

<div class="content">
    <div class="flex justify-between align-center mt-10">

        <h2 class="intro-y text-lg font-medium">Tashkilot rahbari</h2>
       @role('super-admin')
        <a href="{{ route("tashkilotrahbarilar.index") }}" class="button w-24 bg-theme-1 text-white">
            Orqaga
        </a>
        @endrole
        @role('Itm-tashkilotlar')
            <a href="{{ route("itm.tashkilotrahbari") }}" class="button w-24 bg-theme-1 text-white">
                Orqaga
            </a>
        @endrole

    </div>
    @if (session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif
    <div class="overflow-x-auto" style="background-color: white;margin-top:30px;border-radius:8px;padding:30px 20px;">
            <table class="table">
                <tbody>
                <div style="display: flex;justify-content: space-between; border-bottom: 1px solid #e2e8f0; padding-bottom: 20px;">
                        <div style="font-size:18px;font-weight: 400;"> {{$laboratory->name}}  xaqida ma’lumot</div>
                        @can("tashkilotrahbari delete edit")
                            
                        <div style="text-align: end;">
                            <a href="{{ route('laboratory.edit',['laboratory'=>$laboratory->id])}}" class="button w-24 bg-theme-1 text-white" style="margin-right:20px;">
                                Tahrirlash
                            </a>
                            <a href="" class="button w-24 bg-theme-6 text-white">
                                O'chirish
                            </a>
                        </div>
                        @endcan
                    </div>
                        <tr>
                            <!-- <th class="whitespace-no-wrap border" style="width: 40px";>#</th>
                            <th class="whitespace-no-wrap border" style="width:50%;">Ma’lumot nomlanishi</th> -->
                            <th class=" border" style="width: 100%; font-size:16px;text-align:center;" colspan="2" >Ma’lumot</th>
                        </tr>
                        <tr class="bg-gray-200">
                            <!-- <th class=" border">1</th> -->
                            <th class=" border" style="width:50%;">Labaratoriya nomi</th>
                            <th class=" border" style="width:50%;">Tashkil etilgan yil</th>
                        </tr>
                        <tr >
                            <!-- <th class=" border">4</th> -->
                            <td class="border" >{{ $laboratory->name }}</td>
                            <td class="border">{{ $laboratory->tash_yil }}</td>
                        </tr>
                        <tr class="bg-gray-200">
                            <!-- <th class=" border">2</th> -->
                            <th class=" border" >Tavsif</th>
                            <th class=" border">Masul</th>
                        </tr>
                        <tr >
                            <!-- <th class=" border">5</th> -->
                            <td class="border">{{ $laboratory->tavsif  }} </td>
                            <td class="border">{{ $laboratory->user->name  }} </td>
                        </tr>
                        {{-- <tr class="bg-gray-200">
                            <!-- <th class=" border">3</th> -->
                            <th class=" border">Tashkilot rahbari Email</th>
                            <th class=" border">O‘rinbosarining email</th>
                        </tr>
                        <tr>
                            <!-- <th class="whitespace-no-wrap border">6</th> -->
                            <td class="border">{{ $laboratory->email }}</td>
                            <td class="border">{{ $laboratory->u_email }}</td>
                        </tr> --}}

                </tbody>
            </table>
        </div>
    </div>





   
</div>
@endsection