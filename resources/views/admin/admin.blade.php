@extends("layouts.admin")
@section("content")
<!-- END: Top Bar -->
<div class="grid grid-cols-12 gap-6">
    <div class="col-span-12 xxl:col-span-12 grid grid-cols-12 gap-6">
        <!-- BEGIN: General Report -->
        <div class="col-span-12 mt-8">
            <div class="intro-y flex items-center h-10">
                <h2 class="text-lg font-medium truncate mr-5">
                    Tashkilot haqida qisqacha malumotlar 
                </h2>
                <a href="" class="ml-auto flex text-theme-1"> <i data-feather="refresh-ccw" class="w-4 h-4 mr-3"></i>
                    Yangilang </a>
            </div>
            <div class="grid grid-cols-12 gap-6 mt-5">
				
                <div class="col-span-12 sm:col-span-6 xl:col-span-4 intro-y">
                    <div class="report-box zoom-in">
                        <div class="box p-5">
                            <div class="flex">
                                <i data-feather="shopping-cart" class="report-box__icon text-theme-10"></i>
                                <div class="ml-auto">
                                    <div class="report-box__indicator bg-theme-9 tooltip cursor-pointer"
                                        title="33% Higher than last month"> 33% <i data-feather="chevron-up"
                                            class="w-4 h-4"></i> </div>
                                </div>
                            </div>
                            <div class="text-3xl font-bold leading-8 mt-6">40/10</div>
                            <div class="text-base text-gray-600 mt-1 " style="margin-top: 10px;">Tashkilot pasporti biriktirilgan masul xodim
                               @forelse($Tashkilot_pasporti as $tash)
                                <a href="{{ url('users/create') }}"
                                    class="button  bg-theme-1 text-white"
                                    style="display: flex; justify-content:center;margin-top: 10px;">
                                    {{$tash->name}}</a>
								@empty
								  <a href="{{ url('users/create') }}"
                                    class="button  bg-theme-1 text-white"
                                    style="display: flex; justify-content:center;margin-top: 10px;">
                                    masul xodim biriktirish</a>
								@endforelse
                            </div>
                        </div>
                    </div>
                </div>
				
                <div class="col-span-12 sm:col-span-6 xl:col-span-4 intro-y">
					
                    <div class="report-box zoom-in">
                        <div class="box p-5">
                            <div class="flex">
                                <i data-feather="credit-card" class="report-box__icon text-theme-11"></i>
                                <div class="ml-auto">
                                    <div class="report-box__indicator bg-theme-9 tooltip cursor-pointer"
                                        title="33% Higher than last month"> 33% <i data-feather="chevron-up"
                                            class="w-4 h-4"></i> </div>
                                </div>
                            </div>
                            <div class="text-3xl font-bold leading-8 mt-6">10/2</div>
                            <div class="text-base text-gray-600 mt-1 " style="margin-top: 10px;">Ilmiy loyhalar biriktirilgan masul xodim
								@forelse($Ilmiy_faoliyat as $ilmiy)
                                 <a class="button  bg-theme-1 text-white"
                                    style="display: flex; justify-content:center;margin-top: 10px;">{{$ilmiy->name}}</a>
								@empty
								  <a href="{{ url('users/create') }}"
                                    class="button  bg-theme-1 text-white"
                                    style="display: flex; justify-content:center;margin-top: 10px;">
                                    masul xodim biriktirish</a>
								@endforelse
                                </div>
                        </div>
                    </div>
					
                </div>
                <div class="col-span-12 sm:col-span-6 xl:col-span-4 intro-y">
                    <div class="report-box zoom-in">
                        <div class="box p-5">
                            <div class="flex">
                                <i data-feather="monitor" class="report-box__icon text-theme-12"></i>
                                <div class="ml-auto">
                                    <div class="report-box__indicator bg-theme-9 tooltip cursor-pointer"
                                        title="33% Higher than last month"> 33% <i data-feather="chevron-up"
                                            class="w-4 h-4"></i> </div>
                                </div>
                            </div>
                            <div class="text-3xl font-bold leading-8 mt-6">10/5</div>
                            <div class="text-base text-gray-600 mt-1 " style="margin-top: 10px;">Xodimlar biriktirilgan masul xodim 
								@forelse($Xodimlar_uchun as $ilmiy)
                                 <a class="button  bg-theme-1 text-white"
                                    style="display: flex; justify-content:center;margin-top: 10px;">{{$ilmiy->name}}</a>
								@empty
								  <a href="{{ url('users/create') }}"
                                    class="button  bg-theme-1 text-white"
                                    style="display: flex; justify-content:center;margin-top: 10px;">
                                    masul xodim biriktirish</a>
								@endforelse
							</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="overflow-x-auto" style="background-color: white;margin-top:30px;border-radius:8px;padding:30px 20px;">
    <table class="table">
        <tbody>
            <div
                style="display: flex;justify-content: center; borderbottom: 1px solid #e2e8f0; padding-bottom: 20px;">
                <div style="font-size:20px;font-weight: bold;text-align: center; color: #1C3FAA;">{{$tashkiot_haqida->name}} </div>

            </div>
            <tr>
                <th class="border" style="text-align: center;font-size:20px;color: #1C3FAA;"  colspan="3"> Tashkilot pasporti </th>
            </tr>
            <tr>
                            <th class="border-b  border">#</th>
                            <th class="border-b  border" style="width: 50%;">Ma’lumot nomlanishi</th>
                            <th class="border-b  border" style="width: 50%;">Ma’lumot</th>
                        </tr>
                        <tr class="bg-gray-200">
                            <th class="border-b  border">1</th>
                            <th class="border-b  border">Tashkilot nomi</th>
                            <td class="border-b  border" >{{ $tashkiot_haqida->name }}</td>
                        </tr>
                        <tr>
                            <th class="border-b  border">2</th>
                            <th class="border-b  border">tashkiot_haqida qisqa nomi massalan</th>
                            <td class="border-b  border">{{ $tashkiot_haqida->name_qisqachasi }}</td>
                        </tr>
                        <tr class="bg-gray-200" >
                            <th class="border-b  border">3</th>
                            <th class="border-b  border">Tashkil etilgan yil</th>
                            <td class="border-b  border">{{ $tashkiot_haqida->tash_yil }}</td>
                        </tr>
                        <tr>
                            <th class="border-b  border">4</th>
                            <th class="border-b  border">Yuridik manzili</th>
                            <td class="border-b  border">{{ $tashkiot_haqida->yur_manzil }}</td>
                        </tr>
                        <tr class="bg-gray-200">
                            <th class="border-b  border">5</th>
                            <th class="border-b  border">Viloyat manzili</th>
                            <td class="border-b  border">{{ $tashkiot_haqida->viloyat }}</td>
                        </tr>
                        <tr>
                            <th class="border-b  border">6</th>
                            <th class="border-b  border">Tuman manzili</th>
                            <td class="border-b  border">{{ $tashkiot_haqida->tuman }}</td>
                        </tr>
                        <tr class="bg-gray-200">
                            <th class="border-b  border">7</th>
                            <th class="border-b  border">Paoliyat yuritayetgan mahzili</th>
                            <td class="border-b  border">{{ $tashkiot_haqida->paoliyat_manzil }}</td>
                        </tr>
                        <tr>
                            <th class="border-b  border">8</th>
                            <th class="border-b  border"> Telepon nomer</th>
                            <td class="border-b  border">{{ $tashkiot_haqida->phone }}</td>
                        </tr>
                        <tr class="bg-gray-200">
                            <th class="border-b  border">9</th>
                            <th class="border-b  border">Email</th>
                            <td class="border-b  border">{{ $tashkiot_haqida->email }}</td>
                        </tr>
                        <tr>
                            <th class="border-b  border">10</th>
                            <th class="border-b  border">Web-sayti</th>
                            <td class="border-b  border">{{ $tashkiot_haqida->web_sayti }}</td>
                        </tr>
                        <tr class="bg-gray-200">
                            <th class="border-b  border">11</th>
                            <th class="border-b  border">Mulkchilik turi</th>
                            <td class="border-b  border">{{ $tashkiot_haqida->turi }}</td>
                        </tr>

                        <tr>
                            <th class="border-b  border">12</th>
                            <th class="border-b  border"> Tashkilotni saqlash harajatlarining moliyalashtirish manbasi</th>
                            <td class="border-b  border">{{ $tashkiot_haqida->xarajatlar }}</td>
                        </tr>
                        <tr class="bg-gray-200">
                            <th class="border-b  border">13</th>
                            <th class="border-b  border">Shtst birligi soni</th>
                            <td class="border-b  border">{{ $tashkiot_haqida->shtat_bir }}</td>
                        </tr>
                        <tr>
                            <th class="border-b  border">14</th>
                            <th class="border-b  border">Xodimlar soni</th>
                            <td class="border-b  border">{{ $tashkiot_haqida->tash_xodimlar }}</td>
                        </tr>
                        <tr class="bg-gray-200">
                            <th class="border-b  border">15</th>
                            <th class="border-b  border">Ilmiy xodimlar soni</th>
                            <td class="border-b  border">{{ $tashkiot_haqida->ilmiy_xodimlar  }} </td>
                        </tr>
                        <tr>
                            <th class="border-b  border">16</th>
                            <th class="border-b  border">Boshqariv tuzilmasi</th>
                            <td class="border-b  border">{{ $tashkiot_haqida->boshqariv  }} </td>
                        </tr>
                        <tr class="bg-gray-200">
                            <th class="border-b  border">17</th>
                            <th class="border-b  border">STIR raqami </th>
                            <td class="border-b  border">{{ $tashkiot_haqida->stir_raqami  }} </td>
                        </tr>
                        <tr>
                            <th class="border-b  border">18</th>
                            <th class="border-b  border">Xizmat ko'rsatuvch bank</th>
                            <td class="border-b  border">{{ $tashkiot_haqida->bank  }} </td>
                        </tr>
        @forelse ($tashkilot_raxbaris as $tashkilot_raxbari )
            <tr>
                <th class="border" style="text-align: center;font-size:20px; color: #1C3FAA;"  colspan="3">Tashkilot rahbari xaqida ma’lumot </th>
            </tr>
            <tr >
                <th class="border-b  border">#</th>
                <th class="border-b  border" style="width: 50%;">Ma’lumot nomlanishi</th>
                <th class="border-b  border" style="width: 50%;">Ma’lumot</th>
            </tr>
            <tr class="bg-gray-200">
                <td class="border border-2 ">1</td>
                <td class="border">Rahbarning F.I.O.</td>
                <td class="border">{{ $tashkilot_raxbari->fish }}</td>
            </tr>
            <tr>
                <td class="border">2</td>
                <td class="border">Rahbarning aloqa raqami</td>
                <td class="border">{{ $tashkilot_raxbari->phone  }} </td>
            </tr>
            <tr class="bg-gray-200">
                <td class="border">3</td>
                <td class="border">Rahbarning elektron pochtasi</td>
                <td class="border">{{ $tashkilot_raxbari->email }}</td>
            </tr>
            <tr > 
                <td class="border">4</td>
                <td class=" border">Rahbarning ilmiy ishlar (innovatsiyalar) bo‘yicha o‘rinbosari F.I.O.</td>
                <td class="border">{{ $tashkilot_raxbari->u_fish }}</td>
            </tr>
            <tr class="bg-gray-200">
                <td class="border">5</td>
                <td class="border">O‘rinbosarining aloqa raqami</td>
                <td class="border">{{ $tashkilot_raxbari->u_phone }}</td>
            </tr>
            <tr >
                <td class="border">6</td>
                <td class="border">O‘rinbosarining elektron pochta</td>
                <td class="border">{{ $tashkilot_raxbari->u_email }}</td>
            </tr>
        @empty
            <p></p>
        @endforelse


        @forelse ($iqtisodiy_moliyaviy as $tashkilot_raxbari )
            <tr>
                <th class="border" style="text-align: center;font-size:20px;color: #1C3FAA;"  colspan="3"> Iqtisodiy-moliyaviy faoliyat </th>
            </tr>
            <tr>
                <th class="border-b  border">#</th>
                <th class="border-b  border" style="width: 50%;">Ma’lumot nomlanishi</th>
                <th class="border-b  border" style="width: 50%;">Ma’lumot</th>
            </tr>
            <tr class="bg-gray-200">
                <td class="border border-2 ">1</td>
                <td class="border">Tashkilot kadastr raqami</td>
                <td class="border">{{ $tashkilot_raxbari->kadastr_raqami }}</td>
            </tr>
            <tr>
                <td class="border">2</td>
                <td class="border">Umumiy maydoni (ga)</td>
                <td class="border">{{ $tashkilot_raxbari->u_maydoni  }} ga </td>
            </tr>
            <tr class="bg-gray-200">
                <td class="border">3</td>
                <td class="border">Shundan tajriba maydonlari (ga)</td>
                <td class="border">{{ $tashkilot_raxbari->taj_maydonlari }} ga</td>
            </tr>
            <tr>
                <td class="border">4</td>
                <td class="border">Binolar soni</td>
                <td class="border">{{ $tashkilot_raxbari->binolar_soni }}</td>
            </tr>
            <tr class="bg-gray-200">
                <td class="border">5</td>
                <td class="border">Binolarning auditoriya sig‘imi</td>
                <td class="border">{{ $tashkilot_raxbari->auditoriya_sigimi }}</td>
            </tr>
            <tr>
                <td class="border">6</td>
                <td class=" border">Katta xajmdagi auditoriyalar soni (150-200 kishilik)</td>
                <td class="border">{{ $tashkilot_raxbari->k_xaj_auditor_soni }}</td>
            </tr>
            <tr class="bg-gray-200">
                <td class="border">7</td>
                <td class="border">Ustav fondi miqdori, mln so‘mda</td>
                <td class="border">{{ $tashkilot_raxbari->pondi_miqdori }}</td>
            </tr>
            <tr>
                <td class="border">8</td>
                <td class=" border">Ilmiy faoliyatni amalga oshiruvchi bo‘linmalar (bo‘lim, kafedra, laboratoriya) soni</td>
                <td class="border">{{ $tashkilot_raxbari->ilmiyp_bulinalar }}</td>
            </tr>
        @empty
            <p></p>
        @endforelse
        </tbody>
    </table>
</div>

@endsection