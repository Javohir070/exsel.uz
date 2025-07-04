@extends('layouts.admin')

@section('content')

<div class="content">
    <div class="flex justify-between align-center mt-6 mb-6">

        <h2 class="intro-y text-lg font-medium">{{ $ilmiydaraja->tashkilot->name_qisqachasi }}  Ilmiy loyiha bilan taminlangami  ma’lumot</h2>


        @role('super-admin')
            <a href="{{ route("ilmiydarajalar.index") }}" class="button w-24 bg-theme-1 text-white">
                Orqaga
            </a>
        @endrole
        @role('admin')
            <a href="{{ route("ilmiydaraja.index") }}" class="button w-24 bg-theme-1 text-white">
                Orqaga
            </a>
        @endrole
        @role('Itm-tashkilotlar')
            <a href="{{ route("itm.ilmiydaraja") }}" class="button w-24 bg-theme-1 text-white">
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
                        <div style="font-size:18px;font-weight: 400;">{{ $ilmiydaraja->tashkilot->name ." Ilmiy loyiha bilan taminlangalig ". $ilmiydaraja->fish }}  xaqida ma’lumot</div>
                        @can("ilmiydaraja delete edit")

                        <div style="text-align: end;">
                            <a href="{{ route('ilmiydaraja.edit',['ilmiydaraja'=>$ilmiydaraja->id])}}" class="button w-24 bg-theme-1 text-white" style="margin-right:20px;">
                                Tahrirlash
                            </a>
                            <a href="" class="button w-24 bg-theme-6 text-white">
                                O'chirish
                            </a>
                        </div>
                        @endcan
                    </div>
                    <tr>
                        <!-- <th class="border border-b-2 " style="width: 40px;">#</th> -->
                        <th class="border border-b-2 " style="width: 100%; font-size:16px;text-align:center;" colspan="2" >Ma’lumotlar </th>
                        <!-- <th class="border border-b-2 ">Ma’lumot </th> -->
                    </tr>
                    <tr class="bg-gray-200">
                        <!-- <th class="border border-b-2 ">3</th> -->
                        <th class="border border-b-2 " style="width: 50%;">Ilmiy loyiha nomi</th>
                        <th class="border border-b-2 " style="width: 50%;">Ilmiy loyiha turi</th>
                    </tr>
                    <tr>
                        <!-- <th class="border border-b-2 ">4</th> -->
                        <td class="border ">{{ $ilmiydaraja->name  }} </td>
                        <td class="border ">{{ $ilmiydaraja->turi  }} </td>
                    </tr>
                    <tr class="bg-gray-200">
                        <!-- <th class="border border-b-2 ">1</th> -->
                        <th class="border border-b-2 ">Xodimlar soni </th>
                        <th class="border border-b-2 ">Ilmiy hodimlar soni</th>
                    </tr>
                    <tr>
                        <!-- <th class="border border-b-2 ">2</th> -->
                        <td class="border ">{{ $ilmiydaraja->xodimlar_jami  }} </td>
                        <td class="border ">{{ $ilmiydaraja->ilmiy_xodimlar  }} </td>
                    </tr>



                </tbody>
                <table class="table">
                <tbody>
                    <tr>
                        <th colspan="9" class="border border-b-2 " style="text-align: center;">Moliyalashtirish hajmi (Fakt) ming so‘mda</th>
                    </tr>
                    <tr class="bg-gray-200">
                        <th class="border border-b-2 ">Jami</th>
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
                        <td class="border border-b-2 ">{{ $ilmiydaraja->moliyal_jami }}</td>
                        <td class="border border-b-2 ">{{ $ilmiydaraja->yillar->y2017 }}</td>
                        <td class="border border-b-2 ">{{ $ilmiydaraja->yillar->y2018 }}</td>
                        <td class="border border-b-2 ">{{ $ilmiydaraja->yillar->y2019 }}</td>
                        <td class="border border-b-2 ">{{ $ilmiydaraja->yillar->y2020 }}</td>
                        <td class="border border-b-2 ">{{ $ilmiydaraja->yillar->y2021 }}</td>
                        <td class="border border-b-2 ">{{ $ilmiydaraja->yillar->y2022 }}</td>
                        <td class="border border-b-2 ">{{ $ilmiydaraja->yillar->y2023 }}</td>
                        <td class="border border-b-2 ">{{ $ilmiydaraja->yillar->y2024 }}</td>
                    </tr>
                    <tr>
                        <th colspan="9" class="border border-b-2 " style="text-align: center;">Bir nafar ilmiy hodimga moliyalashtirish nisbati</th>
                    </tr>
                    <tr class="bg-gray-200">
                        <th class="border border-b-2 ">Jami</th>
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
                        <td class="border border-b-2 ">{{ $ilmiydaraja->xodimganisbat_jami }}</td>
                        <td class="border border-b-2 ">{{ $ilmiydaraja->umumiyyil->y2017 }}</td>
                        <td class="border border-b-2 ">{{ $ilmiydaraja->umumiyyil->y2018 }}</td>
                        <td class="border border-b-2 ">{{ $ilmiydaraja->umumiyyil->y2019 }}</td>
                        <td class="border border-b-2 ">{{ $ilmiydaraja->umumiyyil->y2020 }}</td>
                        <td class="border border-b-2 ">{{ $ilmiydaraja->umumiyyil->y2021 }}</td>
                        <td class="border border-b-2 ">{{ $ilmiydaraja->umumiyyil->y2022 }}</td>
                        <td class="border border-b-2 ">{{ $ilmiydaraja->umumiyyil->y2023 }}</td>
                        <td class="border border-b-2 ">{{ $ilmiydaraja->umumiyyil->y2024 }}</td>
                    </tr>
                </tbody>
            </table>
            </table>
        </div>





    </div>






</div>
@endsection
