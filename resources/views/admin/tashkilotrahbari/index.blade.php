@extends('layouts.admin')

@section('content')

<div class="content">
    <div class="flex justify-between align-center mt-10">

        <h2 class="intro-y text-lg font-medium">Tashkilot rahbari</h2>

        <a href="{{ route("tashkilotrahbari.create") }}" class="button w-24 bg-theme-1 text-white">
            Qo'shish
        </a>
        

    </div>
    @if (session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif
    <div class="overflow-x-auto" style="background-color: white;margin-top:30px;border-radius:8px;padding:30px 20px;">
            <table class="table">
                <tbody>
                    @forelse ($tash_rahbar as $tash )
                    <div style="display: flex;justify-content: space-between; border-bottom: 1px solid #e2e8f0; padding-bottom: 20px;">
                        <div style="font-size:18px;font-weight: 400;"> {{$tash->tashkilot->name_qisqachasi}} rahbari xaqida ma’lumot</div>
                        <div style="text-align: end;">
                            <a href="{{ route('tashkilotrahbari.edit',['tashkilotrahbari'=>$tash->id])}}" class="button w-24 bg-theme-1 text-white" style="margin-right:20px;">
                                Tahrirlash
                            </a>
                            <a href="" class="button w-24 bg-theme-6 text-white">
                                O'chirish
                            </a>
                        </div>
                    </div>
                    <tr>
                            <!-- <th class="whitespace-no-wrap border" style="width: 40px";>#</th>
                            <th class="whitespace-no-wrap border" style="width:50%;">Ma’lumot nomlanishi</th> -->
                            <th class=" border" style="width: 100%; font-size:16px;text-align:center;" colspan="2" >Ma’lumot</th>
                        </tr>
                        <tr class="bg-gray-200">
                            <!-- <th class=" border">1</th> -->
                            <th class=" border" style="width:50%;">Tashkilot rahbari F.I.Sh</th>
                            <th class=" border" style="width:50%;">Rahbarning ilmiy ishlar (innovatsiyalar) bo‘yicha o‘rinbosari F.I.Sh</th>
                        </tr>
                        <tr >
                            <!-- <th class=" border">4</th> -->
                            <td class="border" >{{ $tash->fish }}</td>
                            <td class="border">{{ $tash->u_fish }}</td>
                        </tr>
                        <tr class="bg-gray-200">
                            <!-- <th class=" border">2</th> -->
                            <th class=" border">Tashkilot rahbari Telepon nomer</th>
                            <th class=" border">O‘rinbosarining Telepon nomer</th>
                        </tr>
                        <tr >
                            <!-- <th class=" border">5</th> -->
                            <td class="border">{{ $tash->phone  }} </td>
                            <td class="border">{{ $tash->u_phone }}</td>
                        </tr>
                        <tr class="bg-gray-200">
                            <!-- <th class=" border">3</th> -->
                            <th class=" border">Tashkilot rahbari Email</th>
                            <th class=" border">O‘rinbosarining email</th>
                        </tr>
                        <tr>
                            <!-- <th class="whitespace-no-wrap border">6</th> -->
                            <td class="border">{{ $tash->email }}</td>
                            <td class="border">{{ $tash->u_email }}</td>
                        </tr>

                        @empty
                            <p> Ma'lumot qo'shish kerak</p>
                        @endforelse
                </tbody>
            </table>
        </div>
    </div>





   
</div>
@endsection