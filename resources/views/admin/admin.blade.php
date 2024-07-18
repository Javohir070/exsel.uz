@extends("layouts.admin")
@section("content")
<!-- END: Top Bar -->
<div class="grid grid-cols-12 gap-6">
    <div class="col-span-12 xxl:col-span-12 grid grid-cols-12 gap-6">
        <!-- BEGIN: General Report -->
        <div class="col-span-12 mt-8">
            <div class="intro-y flex items-center h-10">
                <h2 class="text-lg font-medium truncate mr-5">
                    Tashkilot haqida qisqacha ma'lumotlar 
                </h2>
                <a href="" class="ml-auto flex text-theme-1"> <i data-feather="refresh-ccw" class="w-4 h-4 mr-3"></i>
                    Yangilang </a>
            </div>
            <div class="grid grid-cols-12 gap-6 mt-5">
				
                <div class="col-span-12 sm:col-span-6 xl:col-span-4 intro-y">
                    <div class="report-box zoom-in">
                        <div class="box p-5">
                            <div class="flex">
                                <i data-feather="file-text" class="report-box__icon text-theme-10"></i>
                                <div class="ml-auto">
                                    <div class="report-box__indicator bg-theme-9 tooltip cursor-pointer"
                                        title="33% Higher than last month"> 100% <i data-feather="chevron-up"
                                            class="w-4 h-4"></i> </div>
                                </div>
                            </div>
                            <div class="text-3xl font-bold leading-8 mt-6">3/3</div>
                            <div class="text-base text-gray-600 mt-1 " style="margin-top: 10px;">Tashkilot pasporti biriktirilgan mas'ul xodim
                               @forelse($Tashkilot_pasporti as $tash)
                               @role('admin')
                               <div style="display: flex;justify-content: space-around;align-items: center;margin-top: 10px;gap:4px;">
                                    <a href="{{ url('users/'.$tash->id.'/edit') }}" class="button  bg-theme-1 text-white"
                                    style="width: 80%;">{{$tash->name}}</a>
                                    <a href="{{ url('users/'.$tash->id.'/edit') }}" class="button  bg-theme-1  text-white"><i data-feather="edit"></i></a>
                                    <a href="{{ url('users/'.$tash->id.'/delete') }}" class="button  bg-theme-6  text-white"><i data-feather="trash-2"></i></a>
                                </div>
                                @endrole
                                @role(['Xodimlar_uchun_masul','Tashkilot_pasporti_uchun_masul','Ilmiy_faoliyat_uchun_masul'])
                                <a href="#" class="button  bg-theme-1 text-white"
                                    style="display: flex; justify-content:center;margin-top: 10px;">{{$tash->name}}</a>
                                @endrole
								@empty
                                @role('admin')
								  <a href="{{ url('users/create') }}"
                                    class="button  bg-theme-1 text-white"
                                    style="display: flex; justify-content:center;margin-top: 10px;">
                                    Mas'ul xodim biriktirish</a>
                                @endrole
                                @role(['Xodimlar_uchun_masul','Tashkilot_pasporti_uchun_masul','Ilmiy_faoliyat_uchun_masul'])
                                <a href="#"
                                    class="button  bg-theme-1 text-white"
                                    style="display: flex; justify-content:center;margin-top: 10px;">
                                    Mas'ul xodim biriktirish</a>
                                @endrole
								@endforelse
                            </div>
                        </div>
                    </div>
                </div>
				
                <div class="col-span-12 sm:col-span-6 xl:col-span-4 intro-y">
					
                    <div class="report-box zoom-in">
                        <div class="box p-5">
                            <div class="flex">
                                <i data-feather="file-text" class="report-box__icon text-theme-11"></i>
                                <div class="ml-auto">
                                    <div class="report-box__indicator bg-theme-9 tooltip cursor-pointer"
                                        title="33% Higher than last month"> 33% <i data-feather="chevron-up"
                                            class="w-4 h-4"></i> </div>
                                </div>
                            </div>
                            <div class="text-3xl font-bold leading-8 mt-6">{{ $loyiha_count }}</div>
                            <div class="text-base text-gray-600 mt-1 " style="margin-top: 10px;">Ilmiy loyihalar biriktirilgan mas'ul xodim <br>
								@forelse($Ilmiy_faoliyat as $ilmiy)
                                @role('admin')
                                <div style="display: flex;justify-content: space-around;align-items: center;margin-top: 10px;gap:4px;">
                                    <a href="{{ url('users/'.$ilmiy->id.'/edit') }}" class="button  bg-theme-1 text-white"
                                    style="width: 80%;">{{$ilmiy->name}}</a>
                                    <a href="{{ url('users/'.$ilmiy->id.'/edit') }}" class="button  bg-theme-1  text-white"><i data-feather="edit"></i></a>
                                    <a href="{{ url('users/'.$ilmiy->id.'/delete') }}" class="button  bg-theme-6  text-white"><i data-feather="trash-2"></i></a>
                                </div>
                                @endrole
                                @role(['Xodimlar_uchun_masul','Tashkilot_pasporti_uchun_masul','Ilmiy_faoliyat_uchun_masul'])
                                <a href="#" class="button  bg-theme-1 text-white"
                                    style="display: flex; justify-content:center;margin-top: 10px;">{{$ilmiy->name}}</a>
                                @endrole
								@empty
                                    @role('admin')
                                    <a href="{{ url('users/create') }}"
                                        class="button  bg-theme-1 text-white"
                                        style="display: flex; justify-content:center;margin-top: 10px;">
                                        Mas'ul xodim biriktirish</a>
                                    @endrole
                                    @role(['Xodimlar_uchun_masul','Tashkilot_pasporti_uchun_masul','Ilmiy_faoliyat_uchun_masul'])
                                    <a href="#"
                                        class="button  bg-theme-1 text-white"
                                        style="display: flex; justify-content:center;margin-top: 10px;">
                                        Mas'ul xodim biriktirish</a>
                                    @endrole
								@endforelse
                                </div>
                        </div>
                    </div>
					
                </div>
                <div class="col-span-12 sm:col-span-6 xl:col-span-4 intro-y">
                    <div class="report-box zoom-in">
                        <div class="box p-5">
                            <div class="flex">
                                <i data-feather="users" class="report-box__icon text-theme-9"></i>
                                <div class="ml-auto">
                                    <div class="report-box__indicator bg-theme-9 tooltip cursor-pointer"
                                        title="33% Higher than last month"> 33% <i data-feather="chevron-up"
                                            class="w-4 h-4"></i> </div>
                                </div>
                            </div>
                            <div class="text-3xl font-bold leading-8 mt-6">{{ $tashkiot_haqida->tash_xodimlar ?? 0 }}/{{ $xodimlar}}</div>
                            <div class="text-base text-gray-600 mt-1 " style="margin-top: 10px;">Xodimlar biriktirilgan mas'ul xodim 
								@forelse($Xodimlar_uchun as $ilmiy)
                                @role('admin')
                                <div style="display: flex;justify-content: space-around;align-items: center;margin-top: 10px;gap:4px;">
                                    <a href="{{ url('users/'.$ilmiy->id.'/edit') }}" class="button  bg-theme-1 text-white"
                                    style="width: 80%;">{{$ilmiy->name}}</a>
                                    <a href="{{ url('users/'.$ilmiy->id.'/edit') }}" class="button  bg-theme-1  text-white"><i data-feather="edit"></i></a>
                                    <a href="{{ url('users/'.$ilmiy->id.'/delete') }}" class="button  bg-theme-6  text-white"><i data-feather="trash-2"></i></a>
                                </div>
                                    
                                @endrole
                                @role(['Xodimlar_uchun_masul','Tashkilot_pasporti_uchun_masul','Ilmiy_faoliyat_uchun_masul'])
                                <a href="#" class="button  bg-theme-1 text-white"
                                    style="display: flex; justify-content:center;margin-top: 10px;">{{$ilmiy->name}}</a>
                                @endrole
								@empty
                                    @role('admin')
                                    <a href="{{ url('users/create') }}"
                                        class="button  bg-theme-1 text-white"
                                        style="display: flex; justify-content:center;margin-top: 10px;">
                                        Mas'ul xodim biriktirish</a>
                                    @endrole
                                    @role(['Xodimlar_uchun_masul','Tashkilot_pasporti_uchun_masul','Ilmiy_faoliyat_uchun_masul'])
                                    <a href="#"
                                        class="button  bg-theme-1 text-white"
                                        style="display: flex; justify-content:center;margin-top: 10px;">
                                        Mas'ul xodim biriktirish</a>
                                    @endrole
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
            <tr class="bg-gray-200">
                <!-- <th class="border-b  border">1</th> -->
                <th class="border-b  border" style="width: 50%;">Tashkilot nomi</th>
                <th class="border-b  border" style="width: 50%;">Tashkilot qisqa nomi </th>
            </tr>
            <tr>
                <!-- <th class="border-b  border">2</th> -->
                <td class="border-b  border" >{{ $tashkiot_haqida->name }}</td>
                <td class="border-b  border">{{ $tashkiot_haqida->name_qisqachasi }}</td>
            </tr>
            <tr class="bg-gray-200" >
                <!-- <th class="border-b  border">3</th> -->
                <th class="border-b  border">Tashkil etilgan yil</th>
                <th class="border-b  border">Yuridik manzili</th>
            </tr>
            <tr>
                <!-- <th class="border-b  border">4</th> -->
                <td class="border-b  border">{{ $tashkiot_haqida->tash_yil }}</td>
                <td class="border-b  border">{{ $tashkiot_haqida->yur_manzil }}</td>
            </tr>
            <tr class="bg-gray-200">
                <!-- <th class="border-b  border">5</th> -->
                <th class="border-b  border">Viloyat manzili</th>
                <th class="border-b  border">Tuman manzili</th>
            </tr>
            <tr>
                <!-- <th class="border-b  border">6</th> -->
                <td class="border-b  border">{{ $tashkiot_haqida->viloyat }}</td>
                <td class="border-b  border">{{ $tashkiot_haqida->tuman }}</td>
            </tr>
            <tr class="bg-gray-200">
                <!-- <th class="border-b  border">7</th> -->
                <th class="border-b  border">Faoliyat yuritayotgan manzili</th>
                <th class="border-b  border"> Telefon raqami</th>
            </tr>
            <tr>
                <!-- <th class="border-b  border">8</th> -->
                <td class="border-b  border">{{ $tashkiot_haqida->paoliyat_manzil }}</td>
                <td class="border-b  border">{{ $tashkiot_haqida->phone }}</td>
            </tr>
            <tr class="bg-gray-200">
                <!-- <th class="border-b  border">9</th> -->
                <th class="border-b  border">Email</th>
                <th class="border-b  border">Web-sayti</th>
            </tr>
            <tr>
                <!-- <th class="border-b  border">10</th> -->
                <td class="border-b  border">{{ $tashkiot_haqida->email }}</td>
                <td class="border-b  border">{{ $tashkiot_haqida->web_sayti }}</td>
            </tr>
            <tr class="bg-gray-200">
                <!-- <th class="border-b  border">11</th> -->
                <th class="border-b  border">Mulkchilik turi</th>
                <th class="border-b  border"> Tashkilotni saqlash harajatlarining moliyalashtirish manbasi</th>
            </tr>
            
            <tr>
                <!-- <th class="border-b  border">12</th> -->
                <td class="border-b  border">{{ $tashkiot_haqida->turi }}</td>
                <td class="border-b  border">{{ $tashkiot_haqida->xarajatlar }}</td>
            </tr>
            <tr class="bg-gray-200">
                <!-- <th class="border-b  border">13</th> -->
                <th class="border-b  border">Shtat birligi soni</th>
                <th class="border-b  border">Xodimlar soni</th>
            </tr>
            <tr>
                <!-- <th class="border-b  border">14</th> -->
                <td class="border-b  border">{{ $tashkiot_haqida->shtat_bir }}</td>
                <td class="border-b  border">{{ $tashkiot_haqida->tash_xodimlar }}</td>
            </tr>
            <tr class="bg-gray-200">
                <!-- <th class="border-b  border">15</th> -->
                <th class="border-b  border">Ilmiy xodimlar soni</th>
                <th class="border-b  border">Boshqaruv tuzilmasi</th>
            </tr>
            <tr>
                <!-- <th class="border-b  border">16</th> -->
                <td class="border-b  border">{{ $tashkiot_haqida->ilmiy_xodimlar  }} </td>
                <td class="border-b  border">{{ $tashkiot_haqida->boshqariv  }} </td>
            </tr>
            <tr class="bg-gray-200">
                <!-- <th class="border-b  border">17</th> -->
                <th class="border-b  border">STIR raqami </th>
                <th class="border-b  border">Xizmat ko'rsatuvchi bank</th>
            </tr>
            <tr>
                <!-- <th class="border-b  border">18</th> -->
                <td class="border-b  border">{{ $tashkiot_haqida->stir_raqami  }} </td>
                <td class="border-b  border">{{ $tashkiot_haqida->bank  }} </td>
            </tr>
        @forelse ($tashkilot_raxbaris as $tashkilot_raxbari )
            <tr>
                <th class="border" style="text-align: center;font-size:20px; color: #1C3FAA;"  colspan="3">Tashkilot rahbari xaqida ma’lumot </th>
            </tr>
           
            <tr class="bg-gray-200">
                <!-- <th class=" border">1</th> -->
                <th class=" border" style="width:50%;">Tashkilot rahbari F.I.Sh</th>
                <th class=" border" style="width:50%;">Rahbarning ilmiy ishlar (innovatsiyalar) bo‘yicha o‘rinbosari F.I.Sh</th>
            </tr>
            <tr >
                <!-- <th class=" border">4</th> -->
                <td class="border" >{{ $tashkilot_raxbari->fish }}</td>
                <td class="border">{{ $tashkilot_raxbari->u_fish }}</td>
            </tr>
            <tr class="bg-gray-200">
                <!-- <th class=" border">2</th> -->
                <th class=" border">Tashkilot rahbari Telepon nomer</th>
                <th class=" border">O‘rinbosarining Telepon nomer</th>
            </tr>
            <tr >
                <!-- <th class=" border">5</th> -->
                <td class="border">{{ $tashkilot_raxbari->phone  }} </td>
                <td class="border">{{ $tashkilot_raxbari->u_phone }}</td>
            </tr>
            <tr class="bg-gray-200">
                <!-- <th class=" border">3</th> -->
                <th class=" border">Tashkilot rahbari Email</th>
                <th class=" border">O‘rinbosarining email</th>
            </tr>
            <tr>
                <!-- <th class="whitespace-no-wrap border">6</th> -->
                <td class="border">{{ $tashkilot_raxbari->email }}</td>
                <td class="border">{{ $tashkilot_raxbari->u_email }}</td>
            </tr>
        @empty
            <p></p>
        @endforelse


        @forelse ($iqtisodiy_moliyaviy as $iqtisodiy )
            <tr>
                <th class="border" style="text-align: center;font-size:20px;color: #1C3FAA;"  colspan="3"> Iqtisodiy-moliyaviy faoliyat </th>
            </tr>
            <tr class="bg-gray-200">
                <!-- <th  class="border border-2" style="width: 40px;">1</th> -->
                <th class="border border-2" style="width:50%">Tashkilot kadastr raqami</td>
                <th class="border border-2" style="width:50%">Umumiy maydoni (ga)</td>
            </tr>
            <tr>
                <!-- <th  class="border border-2" style="width: 40px;">2</th> -->
                <td class="border border-2">{{ $iqtisodiy->kadastr_raqami }}</td>
                <td class="border border-2">{{ $iqtisodiy->u_maydoni }}</td>
            </tr>
            <tr class="bg-gray-200">
                <!-- <th  class="border border-2" style="width: 40px;">3</th> -->
                <th class="border border-2">Shundan tajriba maydonlari (ga)</td>
                <th class="border border-2">Binolar soni</td>
            </tr>
            <tr >
                <!-- <th  class="border border-2" style="width: 40px;">4</th> -->
                <td class="border border-2">{{ $iqtisodiy->taj_maydonlari }}</td>
                <td class="border border-2">{{ $iqtisodiy->binolar_soni }}</td>
            </tr>
            <tr class="bg-gray-200">
                <!-- <th  class="border border-2" style="width: 40px;">5</th> -->
                <th class="border border-2">Binolarning auditoriya sig‘imi</td>
                <th class="border border-2">Katta xajmdagi auditoriyalar soni (150-200 kishilik)</td>
            </tr>
            <tr>
                <!-- <th  class="border border-2" style="width: 40px;">6</th> -->
                <td class="border border-2">{{ $iqtisodiy->auditoriya_sigimi }}</td>
                <td class="border border-2">{{ $iqtisodiy->k_xaj_auditor_soni }}</td>
            </tr>
            <tr class="bg-gray-200">
                <!-- <th  class="border border-2" style="width: 40px;">7</th> -->
                <th class="border border-2">Ustav fondi miqdori, mln so‘mda</td>
                <th class="border border-2">Ilmiy faoliyatni amalga oshiruvchi bo‘linmalar (bo‘lim, kafedra, laboratoriya) soni</td>
            </tr>
            <tr>
                <!-- <th  class="border border-2" style="width: 40px;">8</th> -->
                <td class="border border-2">{{ $iqtisodiy->pondi_miqdori }}</td>
                <td class="border border-2">{{ $iqtisodiy->ilmiyp_bulinalar }}</td>
            </tr>
            <tr class="bg-gray-200">
                <!-- <th  class="border border-2" style="width: 40px;">9</th> -->
                <th class="border border-2">Tabiy gaz mavjudligi</td>
                <th class="border border-2">Elektr energiya mavjudligi</td>
            </tr>
            <tr>
                <!-- <th  class="border border-2" style="width: 40px;">10</th> -->
                <td class="border border-2">{{ $iqtisodiy->gaz }}</td>
                <td class="border border-2">{{ $iqtisodiy->elektr }}</td>
            </tr>
            <tr class="bg-gray-200">
                <!-- <th  class="border border-2" style="width: 40px;">11</th> -->
                <th class="border border-2">Suv mavjudligi</td>
                <th class="border border-2">Kanalizatsiya mavjudligi</td>
            </tr>
            <tr>
                <!-- <th  class="border border-2" style="width: 40px;">12</th> -->
                <td class="border border-2">{{ $iqtisodiy->suv }}</td>
                <td class="border border-2">{{ $iqtisodiy->kanalizasiya }}</td>
            </tr>
            <tr class="bg-gray-200">
                <!-- <th class="border border-2">13</th> -->
                <th class="border border-2">Internet mavjudligi</th>
                <th class="border border-2"></th>
            </tr>
            <tr>
                <!-- <th class="border border-2">13</th> -->
                <td class="border border-2">{{ $iqtisodiy->internet }}</td>
                <td class="border border-2"></td>
            </tr>
        @empty
            <p></p>
        @endforelse
        </tbody>
    </table>
</div>

@endsection