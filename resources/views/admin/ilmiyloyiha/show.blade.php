@extends('layouts.admin')

@section('content')

<div class="content">
    <div class="flex justify-between align-center mt-10">

        <h2 class="intro-y text-lg font-medium">{{ $ilmiyloyiha->tashkilot->name }} Ilmiy loyihalar </h2>

        
        

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
                            <th class="border border-b-2 whitespace-no-wrap" style="width: 40px;">#</th>
                            <th class="border border-b-2 whitespace-no-wrap" style="width: 50%;">Ma’lumot nomlanishi</th>
                            <th class="border border-b-2 whitespace-no-wrap">Ma’lumot</th>
                        </tr>
                        <tr class="bg-gray-200">
                            <th class="border border-b-2 whitespace-no-wrap">1</th>
                            <th class="border border-b-2 whitespace-no-wrap">Loyiha mavzusi</th>
                            <td class="border border-b-2 whitespace-no-wrap" >{{ $ilmiyloyiha->mavzusi }}</td>
                        </tr>
                        <tr>
                            <th class="border border-b-2 whitespace-no-wrap">2</th>
                            <th class="border border-b-2 whitespace-no-wrap">Loyiha turi</th>
                            <td class="border border-b-2 whitespace-no-wrap">{{ $ilmiyloyiha->turi }}</td>
                        </tr>
                        <tr class="bg-gray-200">
                            <th class="border border-b-2 whitespace-no-wrap">3</th>
                            <th class="border border-b-2 whitespace-no-wrap">Loyiha dasturi</th>
                            <td class="border border-b-2 whitespace-no-wrap">{{ $ilmiyloyiha->dastyri }}</td>
                        </tr>
                        <tr>
                            <th class="border border-b-2 whitespace-no-wrap">4</th>
                            <th class="border border-b-2 whitespace-no-wrap">"Qo‘shma loyiha bo‘yicha hamkor tashkilot"</th>
                            <td class="border border-b-2 whitespace-no-wrap">{{ $ilmiyloyiha->q_hamkor_tashkilot }}</td>
                        </tr>
                        <tr class="bg-gray-200">
                            <th class="border border-b-2 whitespace-no-wrap">5</th>
                            <th class="border border-b-2 whitespace-no-wrap"> Xalqaro qo‘shma loyihalardagi hamkor davlat</th>
                            <td class="border border-b-2 whitespace-no-wrap">{{ $ilmiyloyiha->hamkor_davlat }}</td>
                        </tr>
                        <tr>
                            <th class="border border-b-2 whitespace-no-wrap">6</th>
                            <th class="border border-b-2 whitespace-no-wrap">Loyiha mavzusi</th>
                            <td class="border border-b-2 whitespace-no-wrap">{{ $ilmiyloyiha->muddat }}</td>
                        </tr>
                        <tr class="bg-gray-200">
                            <th class="border border-b-2 whitespace-no-wrap">7</th>
                            <th class="border border-b-2 whitespace-no-wrap"> Loyihani amalga oshirish muddati (yil) 
                        bo‘lgan tashkilot</th>
                            <td class="border border-b-2 whitespace-no-wrap">{{ $ilmiyloyiha->bosh_sana }}</td>
                        </tr>
                        <tr>
                            <th class="border border-b-2 whitespace-no-wrap">8</th>
                            <th class="border border-b-2 whitespace-no-wrap"> Loyihaning boshlanish sanasi
                        shug‘ullanishi</th>
                            <td class="border border-b-2 whitespace-no-wrap">{{ $ilmiyloyiha->tug_sana }}</td>
                        </tr>
                        <tr class="bg-gray-200">
                            <th class="border border-b-2 whitespace-no-wrap">9</th>
                            <th class="border border-b-2 whitespace-no-wrap">Fan yo‘nalish</th>
                            <td class="border border-b-2 whitespace-no-wrap">{{ $ilmiyloyiha->pan_yunalish }}</td>
                        </tr>
                        <tr>
                            <th class="border border-b-2 whitespace-no-wrap">10</th>
                            <th class="border border-b-2 whitespace-no-wrap">Loyiha rahbarining F.I.Sh.</th>
                            <td class="border border-b-2 whitespace-no-wrap">{{ $ilmiyloyiha->rahbar_name }}</td>
                        </tr>
                        <tr class="bg-gray-200">
                            <th class="border border-b-2 whitespace-no-wrap">11</th>
                            <th class="border border-b-2 whitespace-no-wrap">Tuzilgan shartnoma Raqami 
                        haqiqiy a’zosi Ilmiy darajasi</th>
                            <td class="border border-b-2 whitespace-no-wrap">{{ $ilmiyloyiha->raqami }}</td>
                        </tr>

                        <tr>
                            <th class="border border-b-2 whitespace-no-wrap">12</th>
                            <th class="border border-b-2 whitespace-no-wrap">Tuzilgan shartnoma Sanasi </th>
                            <td class="border border-b-2 whitespace-no-wrap">{{ $ilmiyloyiha->sanasi }}</td>
                        </tr>
                        <tr class="bg-gray-200">
                            <th class="border border-b-2 whitespace-no-wrap">13</th>
                            <th class="border border-b-2 whitespace-no-wrap"> Tuzilgan shartnoma summasi (ming so‘mda) </th>
                            <td class="border border-b-2 whitespace-no-wrap">{{ $ilmiyloyiha->sum }}</td>
                        </tr>
                        <tr>
                            <th class="border border-b-2 whitespace-no-wrap">14</th>
                            <th class="border border-b-2 whitespace-no-wrap">Umumiy ajratilgan mablag‘ (ming so‘mda) </th>
                            <td class="border border-b-2 whitespace-no-wrap">{{ $ilmiyloyiha->umumiy_mablag  }} </td>
                        </tr>
                        <tr class="bg-gray-200">
                            <th class="border border-b-2 whitespace-no-wrap">15</th>
                            <th class="border border-b-2 whitespace-no-wrap">Olingan asosiy natija </th>
                            <td class="border border-b-2 whitespace-no-wrap">{{ $ilmiyloyiha->olingan_natija  }} </td>
                        </tr>
                        <tr>
                            <th class="border border-b-2 whitespace-no-wrap">16</th>
                            <th class="border border-b-2 whitespace-no-wrap">Joriy etish (Tatbiq etish) holati </th>
                            <td class="border border-b-2 whitespace-no-wrap">{{ $ilmiyloyiha->joriy_holati  }} </td>
                        </tr>
                        <tr class="bg-gray-200">
                            <th class="border border-b-2 whitespace-no-wrap">17</th>
                            <th class="border border-b-2 whitespace-no-wrap">Tijoratlashtirish holati</th>
                            <td class="border border-b-2 whitespace-no-wrap">{{ $ilmiyloyiha->tijoratlashtirish  }} </td>
                        </tr>

                        <!-- <tr>
                            <th class="border border-b-2 whitespace-no-wrap">17</th>
                            <th class="border border-b-2 whitespace-no-wrap">Umumiy ajratilgan mablag‘ (ming so‘mda)</th>
                            <td class="border border-b-2 whitespace-no-wrap">500</td>
                        </tr> -->

                        <tr>
                            <th class="border border-b-2 whitespace-no-wrap">18</th>
                            <th class="border border-b-2 whitespace-no-wrap">2017 yil</th>
                            <td class="border border-b-2 whitespace-no-wrap">{{ $ilmiyloyiha->umumiyyil->y2017 }} ming so‘mda</td>
                        </tr>

                        <tr class="bg-gray-200">
                            <th class="border border-b-2 whitespace-no-wrap">19</th>
                            <th class="border border-b-2 whitespace-no-wrap">2018 yil</th>
                            <td class="border border-b-2 whitespace-no-wrap">{{ $ilmiyloyiha->umumiyyil->y2018 }} ming so‘mda</td>
                        </tr>

                        <tr>
                            <th class="border border-b-2 whitespace-no-wrap">20</th>
                            <th class="border border-b-2 whitespace-no-wrap">2019 yil</th>
                            <td class="border border-b-2 whitespace-no-wrap">{{ $ilmiyloyiha->umumiyyil->y2019 }} ming so‘mda</td>
                        </tr>

                        <tr class="bg-gray-200">
                            <th class="border border-b-2 whitespace-no-wrap">21</th>
                            <th class="border border-b-2 whitespace-no-wrap">2020 yil</th>
                            <td class="border border-b-2 whitespace-no-wrap">{{ $ilmiyloyiha->umumiyyil->y2020 }} ming so‘mda</td>
                        </tr>

                        <tr>
                            <th class="border border-b-2 whitespace-no-wrap">22</th>
                            <th class="border border-b-2 whitespace-no-wrap">2021 yil</th>
                            <td class="border border-b-2 whitespace-no-wrap">{{ $ilmiyloyiha->umumiyyil->y2021 }} ming so‘mda</td>
                        </tr>

                        <tr class="bg-gray-200">
                            <th class="border border-b-2 whitespace-no-wrap">23</th>
                            <th class="border border-b-2 whitespace-no-wrap">2022 yil</th>
                            <td class="border border-b-2 whitespace-no-wrap">{{ $ilmiyloyiha->umumiyyil->y2022 }} ming so‘mda</td>
                        </tr>

                        <tr>
                            <th class="border border-b-2 whitespace-no-wrap">24</th>
                            <th class="border border-b-2 whitespace-no-wrap">2023 yil</th>
                            <td class="border border-b-2 whitespace-no-wrap">{{ $ilmiyloyiha->umumiyyil->y2023 }} ming so‘mda</td>
                        </tr>

                        <tr class="bg-gray-200">
                            <th class="border border-b-2 whitespace-no-wrap">25</th>
                            <th class="border border-b-2 whitespace-no-wrap">2024 yil</th>
                            <td class="border border-b-2 whitespace-no-wrap">{{ $ilmiyloyiha->umumiyyil->y2024 }} ming so‘mda</td>
                        </tr>

                        


                        
                </tbody>
            </table>
        </div>



        

    </div>





   
</div>
@endsection