@extends('layouts.admin')

@section('content')

<div class="content">
    <div class="flex justify-between align-center mt-10">

        <h2 class="intro-y text-lg font-medium">{{ $xodimlar->tashkilot->name }} xodim xaqida ma’lumot</h2>

        @role('super-admin')
            <a href="{{ route("xodim.barchaXodimlar") }}" class="button w-24 bg-theme-1 text-white">
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
                        <div style="text-align: end;">
                            <a href="{{ route('xodimlar.edit',['xodimlar'=>$xodimlar->id])}}" class="button w-24 bg-theme-1 text-white" style="margin-right:20px;">
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
                            <th class="border border-b-2 whitespace-no-wrap">F.I.Sh</th>
                            <td class="border border-b-2 whitespace-no-wrap">{{ $xodimlar->fish }}</td>
                        </tr>
                        <tr>
                            <th class="border border-b-2 whitespace-no-wrap">2</th>
                            <th class="border border-b-2 whitespace-no-wrap">JSHSHIR</th>
                            <td class="border border-b-2 whitespace-no-wrap">{{ $xodimlar->jshshir }}</td>
                        </tr>
                        <tr class="bg-gray-200">
                            <th class="border border-b-2 whitespace-no-wrap">3</th>
                            <th class="border border-b-2 whitespace-no-wrap">Tug‘ilgan yili</th>
                            <td class="border border-b-2 whitespace-no-wrap">{{ $xodimlar->yil }}</td>
                        </tr>
                        <tr>
                            <th class="border border-b-2 whitespace-no-wrap">4</th>
                            <th class="border border-b-2 whitespace-no-wrap">Jinsi</th>
                            <td class="border border-b-2 whitespace-no-wrap">{{ $xodimlar->jinsi }}</td>
                        </tr>
                        <tr class="bg-gray-200">
                            <th class="border border-b-2 whitespace-no-wrap">5</th>
                            <th class="border border-b-2 whitespace-no-wrap">Ish tartibi</th>
                            <td class="border border-b-2 whitespace-no-wrap">{{ $xodimlar->ish_tartibi }}</td>
                        </tr>
                        <tr>
                            <th class="border border-b-2 whitespace-no-wrap">6</th>
                            <th class="border border-b-2 whitespace-no-wrap">Shtat birligi</th>
                            <td class="border border-b-2 whitespace-no-wrap">{{ $xodimlar->shtat_birligi }}</td>
                        </tr>
                        <tr class="bg-gray-200">
                            <th class="border border-b-2 whitespace-no-wrap">7</th>
                            <th class="border border-b-2 whitespace-no-wrap"> O‘rindoshlik asosida ishlaydigan xodimning asosi    bo‘lgan tashkilot</th>
                            <td class="border border-b-2 whitespace-no-wrap">{{ $xodimlar->urindoshlik_asasida }}</td>
                        </tr>
                        <tr>
                            <th class="border border-b-2 whitespace-no-wrap">8</th>
                            <th class="border border-b-2 whitespace-no-wrap"> Pedagogik faol       shug‘ullanishi</th>
                            <td class="border border-b-2 whitespace-no-wrap">{{ $xodimlar->pedagoglik }}</td>
                        </tr>
                        <tr class="bg-gray-200">
                            <th class="border border-b-2 whitespace-no-wrap">9</th>
                            <th class="border border-b-2 whitespace-no-wrap">Lavozimi</th>
                            <td class="border border-b-2 whitespace-no-wrap">{{ $xodimlar->lavozimi }}</td>
                        </tr>
                        <tr>
                            <th class="border border-b-2 whitespace-no-wrap">10</th>
                            <th class="border border-b-2 whitespace-no-wrap">Ma’lumoti</th>
                            <td class="border border-b-2 whitespace-no-wrap">{{ $xodimlar->malumoti }}</td>
                        </tr>
                        <tr class="bg-gray-200">
                            <th class="border border-b-2 whitespace-no-wrap">11</th>
                            <th class="border border-b-2 whitespace-no-wrap">O‘zbekiston Fanlar akademiyas a’zosi Ilmiy darajasi</th>
                            <td class="border border-b-2 whitespace-no-wrap">{{ $xodimlar->uzbek_panlar_azosi }}</td>
                        </tr>

                        <tr>
                            <th class="border border-b-2 whitespace-no-wrap">12</th>
                            <th class="border border-b-2 whitespace-no-wrap">Ilmiy darajasi</th>
                            <td class="border border-b-2 whitespace-no-wrap">{{ $xodimlar->ilmiy_daraja }}</td>
                        </tr>
                        <tr class="bg-gray-200">
                            <th class="border border-b-2 whitespace-no-wrap">13</th>
                            <th class="border border-b-2 whitespace-no-wrap">Ilmiy daraja olingan yili</th>
                            <td class="border border-b-2 whitespace-no-wrap">{{ $xodimlar->ilmiy_daraja_yil }}</td>
                        </tr>
                        <tr>
                            <th class="border border-b-2 whitespace-no-wrap">14</th>
                            <th class="border border-b-2 whitespace-no-wrap">Ilmiy unvoni</th>
                            <td class="border border-b-2 whitespace-no-wrap">{{ $xodimlar->ilmiy_unvoni  }} </td>
                        </tr>
                        <tr class="bg-gray-200">
                            <th class="border border-b-2 whitespace-no-wrap">15</th>
                            <th class="border border-b-2 whitespace-no-wrap">Ilmiy unvoni Ilmiy unvon olingan</th>
                            <td class="border border-b-2 whitespace-no-wrap">{{ $xodimlar->ilmiy_unvoni_y  }} </td>
                        </tr>
                        <tr>
                            <th class="border border-b-2 whitespace-no-wrap">16</th>
                            <th class="border border-b-2 whitespace-no-wrap">Ixtisosligi</th>
                            <td class="border border-b-2 whitespace-no-wrap">{{ $xodimlar->ixtisosligi  }} </td>
                        </tr>
                        <tr class="bg-gray-200">
                            <th class="border border-b-2 whitespace-no-wrap">17</th>
                            <th class="border border-b-2 whitespace-no-wrap">Telepon nomer</th>
                            <td class="border border-b-2 whitespace-no-wrap">{{ $xodimlar->phone  }} </td>
                        </tr>
                        <tr>
                            <th class="border border-b-2 whitespace-no-wrap">18</th>
                            <th class="border border-b-2 whitespace-no-wrap">Email</th>
                            <td class="border border-b-2 whitespace-no-wrap">{{ $xodimlar->email }}</td>
                        </tr>
                        
                </tbody>
            </table>
        </div>



        

    </div>





   
</div>
@endsection