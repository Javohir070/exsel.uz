@extends('layouts.admin')

@section('content')

<div class="content">
    <div class="flex justify-between align-center mt-10">

        <h2 class="intro-y text-lg font-medium">{{ $xujalik->tashkilot->name_qisqachasi }} Xujalik loyhila ma’lumot</h2>

        @role('super-admin')
            <a href="{{ route("xujaliklar.index") }}" class="button w-24 bg-theme-1 text-white">
                Orqaga
            </a>
        @endrole
        @role('admin')
            <a href="{{ route("xujalik.index") }}" class="button w-24 bg-theme-1 text-white">
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
                        <div style="font-size:18px;font-weight: 400;">{{ $xujalik->tashkilot->name_qisqachasi  }}  xujalik loyhila ma’lumot</div>
                        <div style="text-align: end;">
                            <a href="{{ route('xujalik.edit',['xujalik'=>$xujalik->id])}}" class="button w-24 bg-theme-1 text-white" style="margin-right:20px;">
                            Tahrirlash
                            </a>
                            <a href="" class="button w-24 bg-theme-6 text-white">
                                O'chirish
                            </a>
                        </div>
                    </div>
                        <tr>
                            <!-- <th class="border border-b-2 " style="width: 40px;">#</th> -->
                            <!-- <th class="border border-b-2 " style="width: 50%;">Ma’lumot nomlanishi</th> -->
                            <th class="border border-b-2 " style="width: 100%;font-size:16px;text-align:center;" colspan="2">Ma’lumotlar</th>
                        </tr>
                        <tr class="bg-gray-200">
                            <!-- <th class="border border-b-2 ">1</th> -->
                            <th class="border border-b-2 " style="width: 50%;">Ishlanma (mahsulot, tovar, xizmat va ishlar) nomi</th>
                            <th class="border border-b-2 " style="width: 50%;">Ishlanma yaratilgan tadqiqot mavzusi va turi</th>
                        </tr>
                        <tr>
                            <!-- <th class="border border-b-2 ">4</th> -->
                            <td class="border border-b-2 ">{{ $xujalik->ishlanma_nomi }}</td>
                            <td class="border border-b-2 ">{{ $xujalik->ishlanma_mavzu }}</td>
                        </tr>
                        <tr class="bg-gray-200">
                            <!-- <th class="border border-b-2 ">5</th> -->
                            <th class="border border-b-2 ">Ishlanma yaratilgan tadqiqot  turi</th>
                            <th class="border border-b-2 "> Shartnoma turi</th>
                        </tr>
                        <tr >
                            <!-- <th class="border border-b-2 ">6</th> -->
                            <td class="border border-b-2 ">{{ $xujalik->ishlanma_turi }}</td>
                            <td class="border border-b-2 ">{{ $xujalik->lisenzion }}</td>
                        </tr>
                        <tr class="bg-gray-200">
                            <!-- <th class="border border-b-2 ">7</th> -->
                            <th class="border border-b-2 ">Shartnoma raqami</th>
                            <th class="border border-b-2 ">Shartnoma sanasi</th>
                        </tr>
                        <tr>
                            <!-- <th class="border border-b-2 ">8</th> -->
                            <td class="border border-b-2 ">{{ $xujalik->sh_raqami }}</td>
                            <td class="border border-b-2 ">{{ $xujalik->sh_sanasi }}</td>
                        </tr>
                        <tr class="bg-gray-200">
                            <!-- <th class="border border-b-2 ">9</th> -->
                            <th class="border border-b-2 ">Ilmiy yoki innovatsion ishlanmani sotib olish (foydalanish) bo‘yicha shartnoma tuzgan tashkilot yoki korxona nomi</th>
                            <th class="border border-b-2 ">Ilmiy yoki innovatsion ishlanmani sotib olish (foydalanish) bo‘yicha shartnoma tuzgan tashkilot yoki korxona STIR</th>
                        </tr>
                        
                        <tr>
                            <!-- <th class="border border-b-2 ">10</th> -->
                            <td class="border border-b-2 ">{{ $xujalik->ilmiy_nomi }}</td>
                            <td class="border border-b-2 ">{{ $xujalik->stir }}</td>
                        </tr>
                        <tr class="bg-gray-200">
                            <!-- <th class="border border-b-2 ">11</th> -->
                            <th class="border border-b-2 ">Shartnoma summasi (mln.so‘m)</th>
                            <th class="border border-b-2 ">Shartnoma bo‘yicha kelib tushgan mablag‘ sanasi</th>
                        </tr>
                        <tr>
                            <!-- <th class="border border-b-2 ">12</th> -->
                            <td class="border border-b-2 ">{{ $xujalik->sh_summa }}</td>
                            <td class="border border-b-2 ">{{ $xujalik->shkelib_sana  }} </td>
                        </tr>
                        <tr class="bg-gray-200">
                            <!-- <th class="border border-b-2 ">13</th> -->
                            <th class="border border-b-2 ">Shartnoma bo‘yicha kelib tushgan mablag‘ summasi</th>
                            <th class="border border-b-2 ">Intellektual mulk huquqining mavjudligi mavjud bo‘lsa: raqami</th>
                        </tr>
                        <tr>
                            <!-- <th class="border border-b-2 ">2</th> -->
                            <td class="border border-b-2 ">{{ $xujalik->shkelib_summa  }} </td>
                            <td class="border border-b-2 ">{{ $xujalik->intellektual_raqami }}</td>
                        </tr>
                        <tr class="bg-gray-200">
                            <!-- <th class="border border-b-2 ">3</th> -->
                            <th class="border border-b-2 ">Intellektual mulk huquqining mavjudligi mavjud bo‘lsa: sanasi</th>
                            <td class="border border-b-2 "></td>
                        </tr>
                        <tr >
                            <!-- <th class="border border-b-2 ">3</th> -->
                            <td class="border border-b-2 ">{{ $xujalik->intellektual_sana }}</td>
                            <th class="border border-b-2 "></th>
                        </tr>
                        
                </tbody>
            </table>
        </div>



        

    </div>





   
</div>
@endsection