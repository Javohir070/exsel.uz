@extends('layouts.admin')
@section('content')
    @role(['super-admin', 'Xujalik_shartnomalari', 'Ilmiy_loyiha_rahbari', 'Ekspert'])
        <div class="grid grid-cols-12 gap-6">
            <div class="col-span-12 xxl:col-span-12 grid grid-cols-12 gap-6">
                <div class="col-span-12 mt-8">

                    <div class="grid grid-cols-12 gap-6 mt-0">
                            <style>
                                .report-box__icon{
                                    width: 32px;
                                    height: 32px;
                                }
                            </style>

                           

                            <div class="col-span-12 mt-2 " style="background: white; border-radius: 10px;">
                                <div class="intro-y block sm:flex items-center py-4" style="justify-content: space-between;">
                                    <h2 class="text-lg font-medium truncate ml-4" style="font-size: 24px;font-weight:500;">
                                        {{ $regions->oz }}
                                    </h2>
                                    <a href="{{ route("doktarantura.index") }}" class="button w-24 bg-theme-1 text-white mr-4">
                                        Orqaga
                                    </a>
                                </div>
                                <div class="intro-y overflow-auto lg:overflow-visible mt-8 sm:mt-0">
                                    <table class="table">
                                        <thead style="background: #F4F8FC;">
                                            <tr>
                                                <th class="whitespace-no-wrap">Tashkilot turi</th>
                                                <th class="whitespace-no-wrap" style="text-align: center;">Jami</th>
                                                <th class="whitespace-no-wrap" style="text-align: center;">Ilmiy izlanivchilar </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td style="color:#1881D3; font-weight: 400;">
                                                    <a href="{{ route('search_dok', ['id' => $regions->id, 'type'=>'otm']) }}">OTM</a>     
                                                    </td>
                                                <td style="text-align: center;">
                                                    {{ $regions->tashkilots()->where('doktarantura_is', 1)->where('tashkilot_turi', 'otm')->count() }}
                                                </td>
                                                <td style="text-align: center;">0</td>
                                            </tr>
                                            <tr>
                                                <td style="color:#1881D3; font-weight: 400;">
                                                    <a href="{{ route('search_dok', ['id' => $regions->id,'type'=>'itm']) }}"> Ilmiy tashkilotlar</a>    
                                                </td>
                                                <td style="text-align: center;">
                                                    {{ $regions->tashkilots()->where('doktarantura_is', 1)->where('tashkilot_turi', 'itm')->count() }}
                                                </td>
                                                <td style="text-align: center;">0</td>
                                            </tr>
                                            <tr>
                                                <td style="color:#1881D3; font-weight: 400;">
                                                    <a href="{{ route('search_dok', ['id' => $regions->id, 'type'=>'boshqa']) }}">Boshqa tashkilotlar</a>    
                                                </td>
                                                <td style="text-align: center;">
                                                    {{ $regions->tashkilots()->where('doktarantura_is', 1)->where('tashkilot_turi', 'boshqa')->count() }}
                                                </td>
                                                <td style="text-align: center;">0</td>
                                            </tr>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                    </div>
                </div>
            </div>
        </div>
    @endrole
@endsection
