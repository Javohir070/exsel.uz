@extends('layouts.admin')

@section('content')

<div class="content">
    <div class="flex justify-between align-center mt-10">

        <h2 class="intro-y text-lg font-medium">Tashkilot rahbari</h2>

        <a href="{{ route("tashkilotrahbarilar.index") }}" class="button w-24 bg-theme-1 text-white">
            Orqaga
        </a>
        

    </div>
    @if (session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif
    <div class="overflow-x-auto" style="background-color: white;margin-top:30px;border-radius:8px;padding:30px 20px;">
            <table class="table">
                <tbody>
                    <div style="display: flex;justify-content: space-between; border-bottom: 1px solid #e2e8f0; padding-bottom: 20px;">
                        <div style="font-size:18px;font-weight: 400;">Tashkilot rahbari xaqida ma’lumot</div>
                        <div style="text-align: end;">
                            <a href="{{ route('tashkilotrahbari.edit',['tashkilotrahbari'=>$tashkilotrahbari->id])}}" class="button w-24 bg-theme-1 text-white" style="margin-right:20px;">
                                Tahrirlash
                            </a>
                            <a href="" class="button w-24 bg-theme-6 text-white">
                                O'chirish
                            </a>
                        </div>
                    </div>
                        <tr>
                            <th class="whitespace-no-wrap border-b">Tashkilot rahbari F.I.Sh</th>
                            <td class="border-b" >{{ $tashkilotrahbari->fish }}</td>
                        </tr>
                        <tr>
                            <th class="whitespace-no-wrap border-b">Tashkilot rahbari Telepon nomer</th>
                            <td class="border-b">{{ $tashkilotrahbari->phone  }} </td>
                        </tr>
                        <tr>
                            <th class="whitespace-no-wrap border-b">Tashkilot rahbari Email</th>
                            <td class="border-b">{{ $tashkilotrahbari->email }}</td>
                        </tr>
                        <tr>
                            <th class="whitespace-no-wrap border-b">O‘rinbosarining F.I.Sh</th>
                            <td class="border-b">{{ $tashkilotrahbari->u_fish }}</td>
                        </tr>
                        <tr>

                            <th class="whitespace-no-wrap border-b">O‘rinbosarining Telepon nomer</th>
                            <td class="border-b">{{ $tashkilotrahbari->u_phone }}</td>
                        </tr>
                        <tr>
                            <th class="whitespace-no-wrap border-b">O‘rinbosarining email</th>
                            <td class="border-b">{{ $tashkilotrahbari->u_email }}</td>
                        </tr>
                </tbody>
            </table>
        </div>
    </div>





   
</div>
@endsection