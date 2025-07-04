@extends('layouts.admin')

@section('content')

    <div class="content">
        <div class="flex justify-between align-center mt-6 mb-6">

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
                    <div
                        style="display: flex;justify-content: space-between; border-bottom: 1px solid #e2e8f0; padding-bottom: 20px;">
                        <div style="font-size:18px;font-weight: 400;"> {{$tashkilotrahbari->tashkilot->name_qisqachasi}}
                            rahbari xaqida ma’lumot</div>
                        @can("tashkilotrahbari delete edit")

                            <div style="text-align: end;">
                                <a href="{{ route('tashkilotrahbari.edit', ['tashkilotrahbari' => $tashkilotrahbari->id])}}"
                                    class="button w-24 bg-theme-1 text-white" style="margin-right:20px;">
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
                        <th class=" border" style="width: 100%; font-size:16px;text-align:center;" colspan="2">Ma’lumot</th>
                    </tr>
                    <tr class="bg-gray-200">
                        <!-- <th class=" border">1</th> -->
                        <th class=" border" style="width:50%;">Tashkilot rahbari F.I.Sh</th>
                        <th class=" border" style="width:50%;">Rahbarning ilmiy ishlar (innovatsiyalar) bo‘yicha o‘rinbosari
                            F.I.Sh</th>
                    </tr>
                    <tr>
                        <!-- <th class=" border">4</th> -->
                        <td class="border">{{ $tashkilotrahbari->fish }}</td>
                        <td class="border">{{ $tashkilotrahbari->u_fish }}</td>
                    </tr>
                    <tr class="bg-gray-200">
                        <!-- <th class=" border">2</th> -->
                        <th class=" border">Tashkilot rahbari Telefon nomer</th>
                        <th class=" border">O‘rinbosarining Telefon nomer</th>
                    </tr>
                    <tr>
                        <!-- <th class=" border">5</th> -->
                        <td class="border">{{ $tashkilotrahbari->phone  }} </td>
                        <td class="border">{{ $tashkilotrahbari->u_phone }}</td>
                    </tr>
                    <tr class="bg-gray-200">
                        <!-- <th class=" border">3</th> -->
                        <th class=" border">Tashkilot rahbari Email</th>
                        <th class=" border">O‘rinbosarining email</th>
                    </tr>
                    <tr>
                        <!-- <th class="whitespace-no-wrap border">6</th> -->
                        <td class="border">{{ $tashkilotrahbari->email }}</td>
                        <td class="border">{{ $tashkilotrahbari->u_email }}</td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>

@endsection
