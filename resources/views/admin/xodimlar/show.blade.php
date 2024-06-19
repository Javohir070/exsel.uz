@extends('layouts.admin')

@section('content')

<div class="content">
    <div class="flex justify-between align-center mt-10">

        <h2 class="intro-y text-lg font-medium">{{ $xodimlar->tashkilot->name }} xodim xaqida ma’lumot</h2>

        <a href="{{ route("tashkilotrahbari.create") }}" class="button w-24 bg-theme-1 text-white">
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
                        <div style="font-size:18px;font-weight: 400;">{{ $xodimlar->tashkilot->name ." xodim ". $xodimlar->fish }}  xaqida ma’lumot</div>
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
                            <th class="whitespace-no-wrap border-b">F.I.Sh</th>
                            <td class="border-b" >{{ $xodimlar->fish }}</td>
                        </tr>
                        <tr>
                            <th class="whitespace-no-wrap border-b">JSHSHIR</th>
                            <td class="border-b">{{ $xodimlar->jshshir }}</td>
                        </tr>
                        <tr>
                            <th class="whitespace-no-wrap border-b">Tug‘ilgan yili</th>
                            <td class="border-b">{{ $xodimlar->yil }}</td>
                        </tr>
                        <tr>
                            <th class="whitespace-no-wrap border-b">Jinsi</th>
                            <td class="border-b">{{ $xodimlar->jinsi }}</td>
                        </tr>
                        <tr>
                            <th class="whitespace-no-wrap border-b">Ish tartibi</th>
                            <td class="border-b">{{ $xodimlar->ish_tartibi }}</td>
                        </tr>
                        <tr>
                            <th class="whitespace-no-wrap border-b">Shtat birligi</th>
                            <td class="border-b">{{ $xodimlar->shtat_birligi }}</td>
                        </tr>
                        <tr>
                            <th class="whitespace-no-wrap border-b"> O‘rindoshlik asosida ishlaydigan xodimning asosiy ish joyi
                        bo‘lgan tashkilot</th>
                            <td class="border-b">{{ $xodimlar->urindoshlik_asasida }}</td>
                        </tr>
                        <tr>
                            <th class="whitespace-no-wrap border-b"> Pedagogik faoliyat bilan
                        shug‘ullanishi</th>
                            <td class="border-b">{{ $xodimlar->pedagoglik }}</td>
                        </tr>
                        <tr>
                            <th class="whitespace-no-wrap border-b">Lavozimi</th>
                            <td class="border-b">{{ $xodimlar->lavozimi }}</td>
                        </tr>
                        <tr>
                            <th class="whitespace-no-wrap border-b">Ma’lumoti</th>
                            <td class="border-b">{{ $xodimlar->malumoti }}</td>
                        </tr>
                        <tr>
                            <th class="whitespace-no-wrap border-b">O‘zbekiston Fanlar akademiyasi
                        haqiqiy a’zosi Ilmiy darajasi</th>
                            <td class="border-b">{{ $xodimlar->uzbek_panlar_azosi }}</td>
                        </tr>

                        <tr>
                            <th class="whitespace-no-wrap border-b">Ilmiy darajasi</th>
                            <td class="border-b">{{ $xodimlar->ilmiy_daraja }}</td>
                        </tr>
                        <tr>
                            <th class="whitespace-no-wrap border-b">Ilmiy daraja olingan yili</th>
                            <td class="border-b">{{ $xodimlar->ilmiy_daraja_yil }}</td>
                        </tr>
                        <tr>
                            <th class="whitespace-no-wrap border-b">Ilmiy unvoni</th>
                            <td class="border-b">{{ $xodimlar->ilmiy_unvoni  }} </td>
                        </tr>
                        <tr>
                            <th class="whitespace-no-wrap border-b">Ilmiy unvoni Ilmiy unvon olingan</th>
                            <td class="border-b">{{ $xodimlar->ilmiy_unvoni_y  }} </td>
                        </tr>
                        <tr>
                            <th class="whitespace-no-wrap border-b">Ixtisosligi</th>
                            <td class="border-b">{{ $xodimlar->ixtisosligi  }} </td>
                        </tr>
                        <tr>
                            <th class="whitespace-no-wrap border-b">Telepon nomer</th>
                            <td class="border-b">{{ $xodimlar->phone  }} </td>
                        </tr>
                        <tr>
                            <th class="whitespace-no-wrap border-b">Email</th>
                            <td class="border-b">{{ $xodimlar->email }}</td>
                        </tr>
                        
                </tbody>
            </table>
        </div>



        

    </div>





   
</div>
@endsection