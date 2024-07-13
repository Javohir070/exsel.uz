@extends('layouts.admin')

@section('content')

<div class="content">
    <div class="flex justify-between align-center mt-10">

        <h2 class="intro-y text-lg font-medium">{{ $tashkilot->name }}  xaqida ma’lumot</h2>
    @role('super-admin')
        <a href="{{ route("tashkilotlar.index") }}" class="button w-24 bg-theme-1 text-white">
            Orqaga
        </a>
    @endrole
    @role('admin')
        <a href="{{ route("tashkilot.index") }}" class="button w-24 bg-theme-1 text-white">
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
                            <th class="border border-b-2 whitespace-no-wrap">#</th>
                            <th class="border border-b-2 whitespace-no-wrap">Ma’lumot nomlanishi</th>
                            <th class="border border-b-2 whitespace-no-wrap">Ma’lumot</th>
                        </tr>
                        <tr class="bg-gray-200">
                            <th class="border border-b-2 whitespace-no-wrap">1</th>
                            <th class="border border-b-2 whitespace-no-wrap">Tashkilot nomi</th>
                            <td class="border border-b-2 whitespace-no-wrap" >{{ $tashkilot->name }}</td>
                        </tr>
                        <tr>
                            <th class="border border-b-2 whitespace-no-wrap">2</th>
                            <th class="border border-b-2 whitespace-no-wrap">Tashkilot qisqa nomi massalan</th>
                            <td class="border border-b-2 whitespace-no-wrap">{{ $tashkilot->name_qisqachasi }}</td>
                        </tr>
                        <tr class="bg-gray-200" >
                            <th class="border border-b-2 whitespace-no-wrap">3</th>
                            <th class="border border-b-2 whitespace-no-wrap">Tashkil etilgan yil</th>
                            <td class="border border-b-2 whitespace-no-wrap">{{ $tashkilot->tash_yil }}</td>
                        </tr>
                        <tr>
                            <th class="border border-b-2 whitespace-no-wrap">4</th>
                            <th class="border border-b-2 whitespace-no-wrap">Yuridik manzili</th>
                            <td class="border border-b-2 whitespace-no-wrap">{{ $tashkilot->yur_manzil }}</td>
                        </tr>
                        <tr class="bg-gray-200">
                            <th class="border border-b-2 whitespace-no-wrap">5</th>
                            <th class="border border-b-2 whitespace-no-wrap">Viloyat manzili</th>
                            <td class="border border-b-2 whitespace-no-wrap">{{ $tashkilot->viloyat }}</td>
                        </tr>
                        <tr>
                            <th class="border border-b-2 whitespace-no-wrap">6</th>
                            <th class="border border-b-2 whitespace-no-wrap">Tuman manzili</th>
                            <td class="border border-b-2 whitespace-no-wrap">{{ $tashkilot->tuman }}</td>
                        </tr>
                        <tr class="bg-gray-200">
                            <th class="border border-b-2 whitespace-no-wrap">7</th>
                            <th class="border border-b-2 whitespace-no-wrap">Paoliyat yuritayetgan mahzili</th>
                            <td class="border border-b-2 whitespace-no-wrap">{{ $tashkilot->paoliyat_manzil }}</td>
                        </tr>
                        <tr>
                            <th class="border border-b-2 whitespace-no-wrap">8</th>
                            <th class="border border-b-2 whitespace-no-wrap"> Telepon nomer</th>
                            <td class="border border-b-2 whitespace-no-wrap">{{ $tashkilot->phone }}</td>
                        </tr>
                        <tr class="bg-gray-200">
                            <th class="border border-b-2 whitespace-no-wrap">9</th>
                            <th class="border border-b-2 whitespace-no-wrap">Email</th>
                            <td class="border border-b-2 whitespace-no-wrap">{{ $tashkilot->email }}</td>
                        </tr>
                        <tr>
                            <th class="border border-b-2 whitespace-no-wrap">10</th>
                            <th class="border border-b-2 whitespace-no-wrap">Web-sayti</th>
                            <td class="border border-b-2 whitespace-no-wrap">{{ $tashkilot->web_sayti }}</td>
                        </tr>
                        <tr class="bg-gray-200">
                            <th class="border border-b-2 whitespace-no-wrap">11</th>
                            <th class="border border-b-2 whitespace-no-wrap">Mulkchilik turi</th>
                            <td class="border border-b-2 whitespace-no-wrap">{{ $tashkilot->turi }}</td>
                        </tr>

                        <tr>
                            <th class="border border-b-2 whitespace-no-wrap">12</th>
                            <th class="border border-b-2 whitespace-no-wrap"> Tashkilotni saqlash harajatlarining moliyalashtirish manbasi</th>
                            <td class="border border-b-2 whitespace-no-wrap">{{ $tashkilot->xarajatlar }}</td>
                        </tr>
                        <tr class="bg-gray-200">
                            <th class="border border-b-2 whitespace-no-wrap">13</th>
                            <th class="border border-b-2 whitespace-no-wrap">Shtst birligi soni</th>
                            <td class="border border-b-2 whitespace-no-wrap">{{ $tashkilot->shtat_bir }}</td>
                        </tr>
                        <tr>
                            <th class="border border-b-2 whitespace-no-wrap">14</th>
                            <th class="border border-b-2 whitespace-no-wrap">Xodimlar soni</th>
                            <td class="border border-b-2 whitespace-no-wrap">{{ $tashkilot->tash_xodimlar }}</td>
                        </tr>
                        <tr class="bg-gray-200">
                            <th class="border border-b-2 whitespace-no-wrap">15</th>
                            <th class="border border-b-2 whitespace-no-wrap">Ilmiy xodimlar soni</th>
                            <td class="border border-b-2 whitespace-no-wrap">{{ $tashkilot->ilmiy_xodimlar  }} </td>
                        </tr>
                        <tr>
                            <th class="border border-b-2 whitespace-no-wrap">16</th>
                            <th class="border border-b-2 whitespace-no-wrap">Boshqariv tuzilmasi</th>
                            <td class="border border-b-2 whitespace-no-wrap">{{ $tashkilot->boshqariv  }} </td>
                        </tr>
                        <tr class="bg-gray-200">
                            <th class="border border-b-2 whitespace-no-wrap">17</th>
                            <th class="border border-b-2 whitespace-no-wrap">STIR raqami </th>
                            <td class="border border-b-2 whitespace-no-wrap">{{ $tashkilot->stir_raqami  }} </td>
                        </tr>
                        <tr>
                            <th class="border border-b-2 whitespace-no-wrap">18</th>
                            <th class="border border-b-2 whitespace-no-wrap">Xizmat ko'rsatuvch bank</th>
                            <td class="border border-b-2 whitespace-no-wrap">{{ $tashkilot->bank  }} </td>
                        </tr>
                        
                </tbody>
            </table>
        </div>



        

    </div>





   
</div>
@endsection