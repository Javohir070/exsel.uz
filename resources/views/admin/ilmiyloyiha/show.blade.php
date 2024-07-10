@extends('layouts.admin')

@section('content')

<div class="content">
    <div class="flex justify-between align-center mt-10">

        <h2 class="intro-y text-lg font-medium">{{ $ilmiyloyiha->tashkilot->name }} Ilmiy loyihalar </h2>

        @role('super-admin')
            <a href="{{ route("ilmiyloyihalar.index") }}" class="button w-24 bg-theme-1 text-white">
                Orqaga
            </a>
        @endrole
        @role('admin')
            <a href="{{ route("ilmiyloyiha.index") }}" class="button w-24 bg-theme-1 text-white">
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
                        <div style="font-size:18px;font-weight: 400;">{{ $ilmiyloyiha->tashkilot->name ." Ilmiy loyihalar " }}  xaqida ma’lumot</div>
                        <div style="text-align: end;">
                            <a href="{{ route('ilmiyloyiha.edit',['ilmiyloyiha'=>$ilmiyloyiha->id])}}" class="button w-24 bg-theme-1 text-white" style="margin-right:20px;">
                            Tahrirlash
                            </a>
                            <a href="" class="button w-24 bg-theme-6 text-white">
                                O'chirish
                            </a>
                        </div>
                    </div>
                        <tr>
                            <!-- <th class="border border-b-2 " style="width: 40px;">#</th> -->
                            <!-- <th class="border border-b-2 " style="width: 50%;" >Ma’lumot nomlanishi</th> -->
                            <th class="border border-b-2 " style="width: 100%;text-align:center;font-size: 16px;" colspan="2">Ma’lumotlar</th>
                        </tr>
                        <tr class="bg-gray-200" >
                            <!-- <th class="border border-b-2 ">1</th> -->
                            <th class="border border-b-2" style="text-align: center;" colspan="2">Loyiha mavzusi</th>
                            <!-- <td class="border " >{{ $ilmiyloyiha->mavzusi }}</td> -->
                        </tr>
                        <tr>
                            <!-- <th class="border border-b-2 ">1</th> -->
                            <!-- <th class="border border-b-2 ">Loyiha mavzusi</th> -->
                            <td class="border " colspan="2" style="text-align: center;">{{ $ilmiyloyiha->mavzusi }}</td>
                        </tr>
                        <tr class="bg-gray-200">
                            <!-- <th class="border border-b-2 ">10</th> -->
                            <th class="border border-b-2 ">Loyiha rahbari</th>
                            <th class="border border-b-2 ">Loyihani bajaruvchi tashkilot</th>
                        </tr>
                        <tr>
                            <!-- <th class="border border-b-2 ">2</th> -->
                            <td class="border ">{{ $ilmiyloyiha->rahbar_name }}</td>
                            <td class="border ">{{ $ilmiyloyiha->tashkilot->name_qisqachasi }}</td>
                        </tr>
                        <tr class="bg-gray-200"> 
                            <!-- <th class="border border-b-2 ">2</th> -->
                            <th class="border border-b-2 ">Loyiha turi</th>
                            <th class="border border-b-2 ">Loyiha dasturi</th>
                        </tr>
                        <tr>
                            <!-- <th class="border border-b-2 ">3</th> -->
                            <td class="border ">{{ $ilmiyloyiha->turi }}</td>
                            <td class="border ">{{ $ilmiyloyiha->dastyri }}</td>
                        </tr>
                        <tr class="bg-gray-200">
                            <!-- <th class="border border-b-2 ">6</th> -->
                            <th class="border border-b-2 ">Loyihani amalga oshirish muddati (yil)</th>
                            <td class="border ">Tuzilgan shartnoma summasi (ming so‘mda)</td>
                        </tr>
                        <tr>
                            <!-- <th class="border border-b-2 ">4</th> -->
                            <th class="border border-b-2 ">{{ $ilmiyloyiha->muddat }}</th>
                            <td class="border ">{{ $ilmiyloyiha->sum }}</td>
                        </tr>
                        <tr class="bg-gray-200">
                            <!-- <th class="border border-b-2 ">7</th> -->
                            <th class="border border-b-2 "> Loyihaning boshlanish sanasi </th>
                            <th class="border border-b-2 "> Loyihaning tugashi sanasi</th>
                        </tr>
                        <tr>
                            <!-- <th class="border border-b-2 ">8</th> -->
                            <td class="border ">{{ $ilmiyloyiha->bosh_sana }}</td>
                            <td class="border ">{{ $ilmiyloyiha->tug_sana }}</td>
                        </tr>
                        <tr class="bg-gray-200">
                            <!-- <th class="border border-b-2 ">11</th> -->
                            <th class="border border-b-2 ">Tuzilgan shartnoma Raqami </th>
                            <th class="border border-b-2 ">Tuzilgan shartnoma sanasi </th>
                        </tr>
                        
                        <tr>
                            <!-- <th class="border border-b-2 ">12</th> -->
                            <td class="border ">{{ $ilmiyloyiha->raqami }}</td>
                            <td class="border ">{{ $ilmiyloyiha->sanasi }}</td>
                        </tr>
                        <tr class="bg-gray-200">
                            <!-- <th class="border border-b-2 ">9</th> -->
                            <th class="border border-b-2 ">Fan yo‘nalish</th>
                            <th class="border border-b-2 ">Olingan asosiy natija </th>
                        </tr>
                        <tr >
                            <!-- <th class="border border-b-2 ">14</th> -->
                            <td class="border ">{{ $ilmiyloyiha->pan_yunalish }}</td>
                            <td class="border ">{{ $ilmiyloyiha->olingan_natija  }} </td>
                        </tr>
                        <tr class="bg-gray-200">
                            <!-- <th class="border border-b-2 ">4</th> -->
                            <th class="border border-b-2 ">Qo‘shma loyiha bo‘yicha hamkor tashkilot</th>
                            <th class="border border-b-2 "> Xalqaro qo‘shma loyihalardagi hamkor davlat</th>
                        </tr>
                        <tr>
                            <!-- <th class="border border-b-2 ">5</th> -->
                            <td class="border ">{{ $ilmiyloyiha->q_hamkor_tashkilot }}</td>
                            <td class="border ">{{ $ilmiyloyiha->hamkor_davlat }}</td>
                        </tr>
                        <tr class="bg-gray-200">
                            <!-- <th class="border border-b-2 ">15</th> -->
                            <th class="border border-b-2 ">Joriy etish holati </th>
                            <th class="border border-b-2 ">Tijoratlashtirish holati</th>
                        </tr>
                        <tr>
                            <!-- <th class="border border-b-2 ">16</th> -->
                            <td class="border ">{{ $ilmiyloyiha->joriy_holati  }} </td>
                            <td class="border ">{{ $ilmiyloyiha->tijoratlashtirish  }} </td>
                        </tr>
                        
                </tbody>
            </table>
            <table class="table">
                <tbody>
                    <tr>
                        <th colspan="8" class="border border-b-2 " style="text-align: center;">Umumiy ajratilgan mablag‘ (ming so‘mda)</th>
                    </tr>
                    <tr class="bg-gray-200">
                        <th class="border border-b-2 ">2017 yil</th>
                        <th class="border border-b-2 ">2018 yil</th>
                        <th class="border border-b-2 ">2019 yil</th>
                        <th class="border border-b-2 ">2020 yil</th>
                        <th class="border border-b-2 ">2021 yil</th>
                        <th class="border border-b-2 ">2022 yil</th>
                        <th class="border border-b-2 ">2023 yil</th>
                        <th class="border border-b-2 ">2024 yil</th>
                    </tr>
                    <tr>
                        <td class="border border-b-2 ">{{ $ilmiyloyiha->umumiyyil->y2017 }}</td>
                        <td class="border border-b-2 ">{{ $ilmiyloyiha->umumiyyil->y2018 }}</td>
                        <td class="border border-b-2 ">{{ $ilmiyloyiha->umumiyyil->y2019 }}</td>
                        <td class="border border-b-2 ">{{ $ilmiyloyiha->umumiyyil->y2020 }}</td>
                        <td class="border border-b-2 ">{{ $ilmiyloyiha->umumiyyil->y2021 }}</td>
                        <td class="border border-b-2 ">{{ $ilmiyloyiha->umumiyyil->y2022 }}</td>
                        <td class="border border-b-2 ">{{ $ilmiyloyiha->umumiyyil->y2023 }}</td>
                        <td class="border border-b-2 ">{{ $ilmiyloyiha->umumiyyil->y2024 }}</td>
                    </tr>
                </tbody>
            </table>
        </div>



        

    </div>





   
</div>
@endsection