@extends('layouts.admin')

@section('content')

<div class="content">
    <div class="flex justify-between align-center mt-10">

        <h2 class="intro-y text-lg font-medium">{{ $xodimlar->tashkilot->name_qisqachasi }} xodim xaqida ma’lumot</h2>

        @role('super-admin')
            <a href="{{ route("xodim.barchaXodimlar") }}" class="button w-24 bg-theme-1 text-white">
                Orqaga
            </a>
        @endrole
        @role('admin')
            <a href="{{ route("xodimlar.index") }}" class="button w-24 bg-theme-1 text-white">
                Orqaga
            </a>
        @endrole
        @role('Itm-tashkilotlar')
            <a href="{{ route("itm.xodimlar") }}" class="button w-24 bg-theme-1 text-white">
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
                        <div style="font-size:18px;font-weight: 400;">{{ $xodimlar->tashkilot->name_qisqachasi ." xodim ". $xodimlar->fish }}  xaqida ma’lumot</div>
                        @can('xodim delete edit')
                            <div style="text-align: end;">
                                <a href="{{ route('xodimlar.edit',['xodimlar'=>$xodimlar->id])}}" class="button w-24 bg-theme-1 text-white" style="margin-right:20px;">
                                Tahrirlash
                                </a>
                                <a href="" class="button w-24 bg-theme-6 text-white">
                                    O'chirish
                                </a>
                            </div>     
                        @endcan
                    </div>

                        <tr>
                            <!-- <th class="border border-2" style="width: 40px;">#</th> -->
                            <th class="border border-2" style="width: 100%;text-align: center;font-weight: bold; font-size:16px;" colspan="2">Shaxsiy ma’lumotlar</th>
                            <!-- <th class="border border-2" style="width: 50%;">Ma’lumot</th> -->
                        </tr>
                        <tr class="bg-gray-200">
                            <!-- <th class="border border-2">1</th> -->
                            <th class="border border-2" style="width: 50%;">F.I.Sh</th>
                            <th class="border border-2" style="width: 50%;">Tug‘ilgan sanasi</th>
                        </tr>
                        <tr>
                            <!-- <th class="border border-2">2</th> -->
                            <td class="border border-2"> {{ $xodimlar->fish }}</td>
                            <td class="border border-2">{{ $xodimlar->yil }} </td>
                        </tr>
                        <tr class="bg-gray-200">
                            <!-- <th class="border border-2">3</th> -->
                            <th class="border border-2" colspan="2">Jinsi</th>
                        </tr>
                        <tr>
                            <!-- <th class="border border-2">4</th> -->
                            <td class="border border-2" colspan="2">{{ $xodimlar->jinsi }}</td>
                        </tr>
                        <tr class="bg-gray-200">
                            <!-- <th class="border border-2">5</th> -->
                            <th class="border border-2">Telefon raqami</th>
                            <th class="border border-2">Email</th>
                        </tr>
                        <tr >
                            <!-- <th class="border border-2">6</th> -->
                            <td class="border border-2">{{ $xodimlar->phone }}</t>
                            <td class="border border-2">{{ $xodimlar->email }}</td>
                        </tr>
                        <tr>
                            <!-- <th class="border border-2" style="width: 40px;">#</th> -->
                            <th class="border border-2" style="width: 100%;text-align: center;font-weight: bold; font-size:16px;" colspan="2">Mehnat faoliyat</th>
                            <!-- <th class="border border-2" style="width: 50%;">Ma’lumot</th> -->
                        </tr>

                        <tr class="bg-gray-200">
                            <!-- <th class="border border-2">5</th> -->
                            <th class="border border-2">Lavozimi</th>
                            <th class="border border-2">Ish tartibi</th>
                        </tr>
                        <tr>
                            <!-- <th class="border border-2">6</th> -->
                            <td class="border border-2">{{ $xodimlar->lavozimi }}</td>
                            <td class="border border-2">{{ $xodimlar->ish_tartibi }}</td>
                        </tr>
                        <tr class="bg-gray-200">
                            <!-- <th class="border border-2">7</th> -->
                            <th class="border border-2">Shtat birligi</th>
                            <th class="border border-2">Asosiy ish joyi (O‘rindoshlik asosida ishlaydigan xodimlar uchun)</th>
                        </tr>
                        <tr >
                            <!-- <th class="border border-2">8</th> -->
                            <td class="border border-2">{{ $xodimlar->shtat_birligi }}</td>
                            <td class="border border-2">{{ $xodimlar->urindoshlik_asasida }}</td>
                        </tr>
                        <tr class="bg-gray-200">
                            <!-- <th class="border border-2">9</th> -->
                            <th class="border border-2"> Pedagogik faol       shug‘ullanishi</th>
                            <th class="border border-2">O‘zbekiston Fanlar akademiyas a’zosi </th>
                        </tr>
                        <tr >
                            <!-- <th class="border border-2">11</th> -->
                            <td class="border border-2">{{ $xodimlar->pedagoglik }}</td>
                            <td class="border border-2">{{ $xodimlar->uzbek_panlar_azosi }}</td>
                        </tr>
                        <tr>
                            <!-- <th class="border border-2" style="width: 40px;">#</th> -->
                            <th class="border border-2" style="width: 100%;text-align: center;font-weight: bold; font-size:16px;" colspan="2">Ma’lumoti / Ixtisosligi</th>
                            <!-- <th class="border border-2" style="width: 50%;">Ma’lumot</th> -->
                        </tr>
                        <tr class="bg-gray-200">
                            <!-- <th class="border border-2">10</th> -->
                            <th class="border border-2">Ma’lumoti</th>
                            <th class="border border-2">Ixtisosligi</th>
                        </tr>
                        <tr >
                            <!-- <th class="border border-2">11</th> -->
                            <td class="border border-2">{{ $xodimlar->malumoti }}</td>
                            <td class="border border-2">{{ $xodimlar->ixtisosligi  }} </td>
                        </tr>
                        <tr class="bg-gray-200">
                            <!-- <th class="border border-2">12</th> -->
                            <th class="border border-2">Ilmiy darajasi</th>
                            <th class="border border-2">Ilmiy daraja olingan yili</th>
                        </tr>
                        <tr >
                            <!-- <th class="border border-2">13</th> -->
                            <td class="border border-2">{{ $xodimlar->ilmiy_daraja }}</td>
                            <td class="border border-2">{{ $xodimlar->ilmiy_daraja_yil }}</td>
                        </tr>
                        <tr class="bg-gray-200">
                            <!-- <th class="border border-2">14</th> -->
                            <th class="border border-2">Ilmiy unvoni</th>
                            <th class="border border-2">Ilmiy unvoni Ilmiy unvon olingan</th>
                        </tr>
                        <tr >
                            <!-- <th class="border border-2">15</th> -->
                            <td class="border border-2">{{ $xodimlar->ilmiy_unvoni  }} </td>
                            <td class="border border-2">{{ $xodimlar->ilmiy_unvoni_y  }} </td>
                        </tr>
                        
                        
                </tbody>
            </table>
        </div>



        

    </div>





   
</div>
@endsection