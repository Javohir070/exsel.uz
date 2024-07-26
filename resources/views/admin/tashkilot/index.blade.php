@extends('layouts.admin')

@section('content')

<div class="content">
    <div class="flex justify-between align-center mt-10">

        <h2 class="intro-y text-lg font-medium">{{ $tashkilot->name }}  xaqida ma’lumot</h2>

        <a href="{{ route("tashkilot.index") }}" class="button w-24 bg-theme-1 text-white">
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
                        <div style="font-size:18px;font-weight: 400;">{{ $tashkilot->name ."  ". $tashkilot->fish }}  Tashkilot pasporti</div>
                        <div style="text-align: end;">
                            <a href="{{ route('tashkilot.edit',['tashkilot'=>$tashkilot->id])}}" class="button w-24 bg-theme-1 text-white" style="margin-right:20px;">
                            Tahrirlash
                            </a>
                            <a href="" class="button w-24 bg-theme-6 text-white">
                                O'chirish
                            </a>
                        </div>
                    </div>
                    
                        <!-- <tr style="margin-top:20px;">
                            <th class="whitespace-no-wrap border" style="text-align: center;font-size:20px;"  colspan="3"> Tashkilot pasporti </th>
                        </tr> -->
                        <tr>
                            <!-- <th class="border-b  border">#</th> -->
                            <!-- <th class="border-b  border">Ma’lumot nomlanishi</th> -->
                            <th class="border-b  border" style="width: 100%;text-align:center;font-size:16px;" colspan="2">Ma’lumot</th>
                        </tr>
                        <tr class="bg-gray-200">
                            <!-- <th class="border-b  border">1</th> -->
                            <th class="border-b  border" style="width: 50%;">Tashkilot nomi</th>
                            <th class="border-b  border" style="width: 50%;">Tashkilot qisqa nomi masalan</th>
                        </tr>
                        <tr>
                            <!-- <th class="border-b  border">2</th> -->
                            <td class="border-b  border" >{{ $tashkilot->name }}</td>
                            <td class="border-b  border">{{ $tashkilot->name_qisqachasi }}</td>
                        </tr>
                        <tr class="bg-gray-200" >
                            <!-- <th class="border-b  border">3</th> -->
                            <th class="border-b  border">Tashkil etilgan yil</th>
                            <th class="border-b  border">Yuridik manzili</th>
                        </tr>
                        <tr>
                            <!-- <th class="border-b  border">4</th> -->
                            <td class="border-b  border">{{ $tashkilot->tash_yil }}</td>
                            <td class="border-b  border">{{ $tashkilot->yur_manzil }}</td>
                        </tr>
                        <tr class="bg-gray-200">
                            <!-- <th class="border-b  border">5</th> -->
                            <th class="border-b  border">Viloyat manzili</th>
                            <th class="border-b  border">Tuman manzili</th>
                        </tr>
                        <tr>
                            <!-- <th class="border-b  border">6</th> -->
                            <td class="border-b  border">{{ $tashkilot->viloyat }}</td>
                            <td class="border-b  border">{{ $tashkilot->tuman }}</td>
                        </tr>
                        <tr class="bg-gray-200">
                            <!-- <th class="border-b  border">7</th> -->
                            <th class="border-b  border">Faoliyat yuritayotgan manzili</th>
                            <th class="border-b  border"> Telefon raqami</th>
                        </tr>
                        <tr>
                            <!-- <th class="border-b  border">8</th> -->
                            <td class="border-b  border">{{ $tashkilot->paoliyat_manzil }}</td>
                            <td class="border-b  border">{{ $tashkilot->phone }}</td>
                        </tr>
                        <tr class="bg-gray-200">
                            <!-- <th class="border-b  border">9</th> -->
                            <th class="border-b  border">Email</th>
                            <th class="border-b  border">Web-sayti</th>
                        </tr>
                        <tr>
                            <!-- <th class="border-b  border">10</th> -->
                            <td class="border-b  border">{{ $tashkilot->email }}</td>
                            <td class="border-b  border">{{ $tashkilot->web_sayti }}</td>
                        </tr>
                        <tr class="bg-gray-200">
                            <!-- <th class="border-b  border">11</th> -->
                            <th class="border-b  border">Mulkchilik turi</th>
                            <th class="border-b  border"> Tashkilotni saqlash harajatlarining moliyalashtirish manbasi</th>
                        </tr>
                        
                        <tr>
                            <!-- <th class="border-b  border">12</th> -->
                            <td class="border-b  border">{{ $tashkilot->turi }}</td>
                            <td class="border-b  border">{{ $tashkilot->xarajatlar }}</td>
                        </tr>
                        <tr class="bg-gray-200">
                            <!-- <th class="border-b  border">13</th> -->
                            <th class="border-b  border">Shtat birligi soni</th>
                            <th class="border-b  border">Xodimlar soni</th>
                        </tr>
                        <tr>
                            <!-- <th class="border-b  border">14</th> -->
                            <td class="border-b  border">{{ $tashkilot->shtat_bir }}</td>
                            <td class="border-b  border">{{ $tashkilot->tash_xodimlar }}</td>
                        </tr>
                        <tr class="bg-gray-200">
                            <!-- <th class="border-b  border">15</th> -->
                            <th class="border-b  border">Ilmiy xodimlar soni</th>
                            <th class="border-b  border">Boshqariv tuzilmasi</th>
                        </tr>
                        <tr>
                            <!-- <th class="border-b  border">16</th> -->
                            <td class="border-b  border">{{ $tashkilot->ilmiy_xodimlar  }} </td>
                            <td class="border-b  border">{{ $tashkilot->boshqariv  }} </td>
                        </tr>
                        <tr class="bg-gray-200">
                            <!-- <th class="border-b  border">17</th> -->
                            <th class="border-b  border">STIR raqami </th>
                            <th class="border-b  border">Xizmat ko'rsatuvch bank</th>
                        </tr>
                        <tr>
                            <!-- <th class="border-b  border">18</th> -->
                            <td class="border-b  border">{{ $tashkilot->stir_raqami  }} </td>
                            <td class="border-b  border">{{ $tashkilot->bank  }} </td>
                        </tr>
                        <tr class="bg-gray-200">
                            <!-- <th class="border-b  border">17</th> -->
                            <th class="border-b  border" colspan="2">Tashkilot hisob raqami </th>
                        </tr>
                        <tr>
                            <!-- <th class="border-b  border">18</th> -->
                            <td class="border-b  border" colspan="2">{{ $tashkilot->hisob_raqam  }} </td>
                        </tr>
                        
                </tbody>
            </table>
        </div>



        

    </div>





   
</div>
@endsection