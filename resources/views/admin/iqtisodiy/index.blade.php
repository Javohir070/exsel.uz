@extends('layouts.admin')

@section('content')

<div class="content">
    <div class="flex justify-between align-center mt-10">

        <h2 class="intro-y text-lg font-medium"> Iqtisodiy Moliyaviy faoliyat </h2>

        <a href="{{ route("iqtisodiy.create") }}" class="button w-24 bg-theme-1 text-white">
            Qo'shish
        </a>

    </div>
    @if (session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif



    <div class="overflow-x-auto" style="background-color: white;margin-top:30px;border-radius:8px;padding:30px 20px;">
            <table class="table">
                <tbody>
            @forelse ($iqtisodiy as $iqt )
                
            
                <div style="display: flex;justify-content: space-between; border-bottom: 1px solid #e2e8f0; padding-bottom: 20px;">
                    <div style="font-size:18px;font-weight: 400;">{{$iqt->tashkilot->name_qisqachasi}} Iqtisodiy Moliyaviy faoliyat</div>
                    <div style="text-align: end;">
                        <a href="{{ route('iqtisodiy.edit',['iqtisodiy'=>$iqt->id]) }}" class="button w-24 bg-theme-1 text-white" style="margin-right:20px;">
                            Tahrirlash
                        </a>
                        <a href="" class="button w-24 bg-theme-6 text-white">
                            O'chirish
                        </a>
                    </div>
                </div>
                <!-- <tr style="margin-top:20px;">
                    <th class="whitespace-no-wrap border" style="text-align: center;font-size:20px;"  colspan="3"> Iqtisodiy Moliyaviy faoliyat </th>
                </tr> -->
                <tr>
                    <th  class="border border-2" style="width: 40px;">#</th>
                    <th  class="border border-2" style="width: 50%;">Ma’lumot nomlanishi</th>
                    <th  class="border border-2" >Ma’lumot</th>
                </tr>
                <tr class="bg-gray-200">
                    <th  class="border border-2" style="width: 40px;">1</th>
                    <td class="border border-2">Tashkilot kadastr raqami</td>
                    <td class="border border-2">{{ $iqt->kadastr_raqami }}</td>
                </tr>
                <tr>
                    <th  class="border border-2" style="width: 40px;">2</th>
                    <td class="border border-2">Umumiy maydoni (ga)</td>
                    <td class="border border-2">{{ $iqt->u_maydoni }}</td>
                </tr>
                <tr class="bg-gray-200">
                    <th  class="border border-2" style="width: 40px;">3</th>
                    <td class="border border-2">Shundan tajriba maydonlari (ga)</td>
                    <td class="border border-2">{{ $iqt->taj_maydonlari }}</td>
                </tr>
                <tr >
                    <th  class="border border-2" style="width: 40px;">4</th>
                    <td class="border border-2">Binolar soni</td>
                    <td class="border border-2">{{ $iqt->binolar_soni }}</td>
                </tr>
                <tr class="bg-gray-200">
                    <th  class="border border-2" style="width: 40px;">5</th>
                    <td class="border border-2">Binolarning auditoriya sig‘imi</td>
                    <td class="border border-2">{{ $iqt->auditoriya_sigimi }}</td>
                </tr>
                <tr>
                    <th  class="border border-2" style="width: 40px;">6</th>
                    <td class="border border-2">Katta xajmdagi auditoriyalar soni (150-200 kishilik)</td>
                    <td class="border border-2">{{ $iqt->k_xaj_auditor_soni }}</td>
                </tr>
                <tr class="bg-gray-200">
                    <th  class="border border-2" style="width: 40px;">7</th>
                    <td class="border border-2">Ustav fondi miqdori, mln so‘mda</td>
                    <td class="border border-2">{{ $iqt->pondi_miqdori }}</td>
                </tr>
                <tr>
                    <th  class="border border-2" style="width: 40px;">8</th>
                    <td class="border border-2">Ilmiy faoliyatni amalga oshiruvchi bo‘linmalar (bo‘lim, kafedra, laboratoriya) soni</td>
                    <td class="border border-2">{{ $iqt->ilmiyp_bulinalar }}</td>
                </tr>
                <tr class="bg-gray-200">
                    <th  class="border border-2" style="width: 40px;">9</th>
                    <td class="border border-2">tabiy gaz mavjudligi</td>
                    <td class="border border-2">{{ $iqt->gaz }}</td>
                </tr>
                <tr>
                    <th  class="border border-2" style="width: 40px;">10</th>
                    <td class="border border-2">elektr energiya mavjudligi</td>
                    <td class="border border-2">{{ $iqt->elektr }}</td>
                </tr>
                <tr class="bg-gray-200">
                    <th  class="border border-2" style="width: 40px;">11</th>
                    <td class="border border-2">suv mavjudligi</td>
                    <td class="border border-2">{{ $iqt->suv }}</td>
                </tr>
                <tr>
                    <th  class="border border-2" style="width: 40px;">12</th>
                    <td class="border border-2">kanalizatsiya mavjudligi</td>
                    <td class="border border-2">{{ $iqt->kanalizasiya }}</td>
                </tr>
                <tr class="bg-gray-200">
                    <th class="border border-2">13</th>
                    <td class="border border-2">internet mavjudligi</td>
                    <td class="border border-2">{{ $iqt->internet }}</td>
                </tr>
                @empty
                    <p> malumot qo'shish kerak</p>
                @endforelse
            </tbody>
        </table>

    </div>






</div>
@endsection