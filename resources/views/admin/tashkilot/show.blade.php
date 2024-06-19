@extends('layouts.admin')

@section('content')

<div class="content">
    <div class="flex justify-between align-center mt-10">

        <h2 class="intro-y text-lg font-medium">{{ $tashkilot->name }}  xaqida ma’lumot</h2>

        <a href="{{ route("tashkilot.create") }}" class="button w-24 bg-theme-1 text-white">
            Qo'shish
        </a>
        

    </div>
    @if (session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif
    <div class="overflow-x-auto" style="background-color: white;margin-top:30px;border-radius:8px;padding:30px 20px;">
            <table class="table">
                <tbody>
                    <div style="display: flex;justify-content: space-between; border-bottom: 1px solid #e2e8f0; padding-bottom: 20px;">
                        <div style="font-size:18px;font-weight: 400;">{{ $tashkilot->name ."  ". $tashkilot->fish }}  xaqida ma’lumot</div>
                        <div style="text-align: end;">
                            <a href="{{ route('tashkilot.edit',['tashkilot'=>$tashkilot->id])}}" class="button w-24 bg-theme-1 text-white" style="margin-right:20px;">
                            Tahrirlash
                            </a>
                            <a href="" class="button w-24 bg-theme-6 text-white">
                                O'chirish
                            </a>
                        </div>
                    </div>
                        <tr>
                            <th class="whitespace-no-wrap border-b">Tashkilot nomi</th>
                            <td class="border-b" >{{ $tashkilot->name }}</td>
                        </tr>
                        <tr>
                            <th class="whitespace-no-wrap border-b">Tashkilot qisqa nomi massalan</th>
                            <td class="border-b">{{ $tashkilot->name_qisqachasi }}</td>
                        </tr>
                        <tr>
                            <th class="whitespace-no-wrap border-b">Tashkil etilgan yil</th>
                            <td class="border-b">{{ $tashkilot->tash_yil }}</td>
                        </tr>
                        <tr>
                            <th class="whitespace-no-wrap border-b">Yuridik manzili</th>
                            <td class="border-b">{{ $tashkilot->yur_manzil }}</td>
                        </tr>
                        <tr>
                            <th class="whitespace-no-wrap border-b">Viloyat manzili</th>
                            <td class="border-b">{{ $tashkilot->viloyat }}</td>
                        </tr>
                        <tr>
                            <th class="whitespace-no-wrap border-b">Tuman manzili</th>
                            <td class="border-b">{{ $tashkilot->tuman }}</td>
                        </tr>
                        <tr>
                            <th class="whitespace-no-wrap border-b">Paoliyat yuritayetgan mahzili</th>
                            <td class="border-b">{{ $tashkilot->paoliyat_manzil }}</td>
                        </tr>
                        <tr>
                            <th class="whitespace-no-wrap border-b"> Telepon nomer</th>
                            <td class="border-b">{{ $tashkilot->phone }}</td>
                        </tr>
                        <tr>
                            <th class="whitespace-no-wrap border-b">Email</th>
                            <td class="border-b">{{ $tashkilot->email }}</td>
                        </tr>
                        <tr>
                            <th class="whitespace-no-wrap border-b">Web-sayti</th>
                            <td class="border-b">{{ $tashkilot->web_sayti }}</td>
                        </tr>
                        <tr>
                            <th class="whitespace-no-wrap border-b">Mulkchilik turi</th>
                            <td class="border-b">{{ $tashkilot->turi }}</td>
                        </tr>

                        <tr>
                            <th class="whitespace-no-wrap border-b"> Tashkilotni saqlash harajatlarining moliyalashtirish manbasi</th>
                            <td class="border-b">{{ $tashkilot->xarajatlar }}</td>
                        </tr>
                        <tr>
                            <th class="whitespace-no-wrap border-b">Shtst birligi soni</th>
                            <td class="border-b">{{ $tashkilot->shtat_bir }}</td>
                        </tr>
                        <tr>
                            <th class="whitespace-no-wrap border-b">Xodimlar soni</th>
                            <td class="border-b">{{ $tashkilot->tash_xodimlar }}</td>
                        </tr>
                        <tr>
                            <th class="whitespace-no-wrap border-b">Ilmiy xodimlar soni</th>
                            <td class="border-b">{{ $tashkilot->ilmiy_xodimlar  }} </td>
                        </tr>
                        <tr>
                            <th class="whitespace-no-wrap border-b">Boshqariv tuzilmasi</th>
                            <td class="border-b">{{ $tashkilot->boshqariv  }} </td>
                        </tr>
                        <tr>
                            <th class="whitespace-no-wrap border-b">STIR raqami </th>
                            <td class="border-b">{{ $tashkilot->stir_raqami  }} </td>
                        </tr>
                        <tr>
                            <th class="whitespace-no-wrap border-b">Xizmat ko'rsatuvch bank</th>
                            <td class="border-b">{{ $tashkilot->bank  }} </td>
                        </tr>
                        
                </tbody>
            </table>
        </div>



        

    </div>





   
</div>
@endsection