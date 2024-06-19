@extends('layouts.admin')

@section('content')

<div class="content">
    <div class="flex justify-between align-center mt-10">

        <h2 class="intro-y text-lg font-medium"> Iqtisodiy Moliyaviy faoliyat </h2>

        <a href="{{ route("iqtisodiylar.index") }}" class="button w-24 bg-theme-1 text-white">
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
                    <div style="font-size:18px;font-weight: 400;">{{$iqtisodiy->tashkilot->name_qisqachasi}} Iqtisodiy Moliyaviy faoliyat</div>
                    <div style="text-align: end;">
                        <a href="{{ route('iqtisodiy.edit',['iqtisodiy'=>$iqtisodiy->id]) }}" class="button w-24 bg-theme-1 text-white" style="margin-right:20px;">
                            Tahrirlash
                        </a>
                        <a href="" class="button w-24 bg-theme-6 text-white">
                            O'chirish
                        </a>
                    </div>
                </div>
               
                <tr>
                    <td style="width: 70%;" class="whitespace-no-wrap border-b">Tashkilot kadastr raqami</td>
                    <td class="whitespace-no-wrap border-b">{{ $iqtisodiy->kadastr_raqami }}</td>
                </tr>
                <tr>
                    <td style="width: 70%;" class="whitespace-no-wrap border-b">Umumiy maydoni (ga)</td>
                    <td class="whitespace-no-wrap border-b">{{ $iqtisodiy->u_maydoni }}</td>
                </tr>
                <tr>
                    <td style="width: 70%;" class="whitespace-no-wrap border-b">Shundan tajriba maydonlari (ga)</td>
                    <td class="whitespace-no-wrap border-b">{{ $iqtisodiy->taj_maydonlari }}</td>
                </tr>
                <tr>
                    <td style="width: 70%;" class="whitespace-no-wrap border-b">Binolar soni</td>
                    <td class="whitespace-no-wrap border-b">{{ $iqtisodiy->binolar_soni }}</td>
                </tr>
                <tr>
                    <td style="width: 70%;" class="whitespace-no-wrap border-b">Binolarning auditoriya sig‘imi</td>
                    <td class="whitespace-no-wrap border-b">{{ $iqtisodiy->auditoriya_sigimi }}</td>
                </tr>
                <tr>
                    <td style="width: 70%;" class="whitespace-no-wrap border-b">Katta xajmdagi auditoriyalar soni (150-200 kishilik)</td>
                    <td class="whitespace-no-wrap border-b">{{ $iqtisodiy->k_xaj_auditor_soni }}</td>
                </tr>
                <tr>
                    <td style="width: 70%;" class="whitespace-no-wrap border-b">Ustav fondi miqdori, mln so‘mda</td>
                    <td class="whitespace-no-wrap border-b">{{ $iqtisodiy->pondi_miqdori }}</td>
                </tr>
                <tr>
                    <td style="width: 70%;" class="whitespace-no-wrap border-b">Ilmiy faoliyatni amalga oshiruvchi bo‘linmalar (bo‘lim, kafedra, laboratoriya) soni</td>
                    <td class="whitespace-no-wrap border-b">{{ $iqtisodiy->ilmiyp_bulinalar }}</td>
                </tr>
                <tr>
                    <td style="width: 70%;" class="whitespace-no-wrap border-b">tabiy gaz mavjudligi</td>
                    <td class="whitespace-no-wrap border-b">{{ $iqtisodiy->gaz }}</td>
                </tr>
                <tr>
                    <td style="width: 70%;" class="whitespace-no-wrap border-b">elektr energiya mavjudligi</td>
                    <td class="whitespace-no-wrap border-b">{{ $iqtisodiy->elektr }}</td>
                </tr>
                <tr>
                    <td style="width: 70%;" class="whitespace-no-wrap border-b">suv mavjudligi</td>
                    <td class="whitespace-no-wrap border-b">{{ $iqtisodiy->suv }}</td>
                </tr>
                <tr>
                    <td style="width: 70%;" class="whitespace-no-wrap border-b">kanalizatsiya mavjudligi</td>
                    <td class="whitespace-no-wrap border-b">{{ $iqtisodiy->kanalizasiya }}</td>
                </tr>
                <tr>
                    <td style="width: 70%;" class="whitespace-no-wrap border-b">internet mavjudligi</td>
                    <td class="whitespace-no-wrap border-b">{{ $iqtisodiy->internet }}</td>
                </tr>
            </tbody>
        </table>

    </div>






</div>
@endsection