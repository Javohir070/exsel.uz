@extends("layouts.admin")
@section("content")
<!-- END: Top Bar -->
<div class="grid grid-cols-12 gap-6">
    <div class="col-span-12 xxl:col-span-12 grid grid-cols-12 gap-6">
        <!-- BEGIN: General Report -->
        <div class="col-span-12 mt-8">
            <div class="intro-y flex items-center h-10">
                <h2 class="text-lg font-medium truncate mr-5">
                    Tashkilot haqida qisqacha malumot
                </h2>
                <a href="" class="ml-auto flex text-theme-1"> <i data-feather="refresh-ccw" class="w-4 h-4 mr-3"></i>
                    Yangilang </a>
            </div>
            <div class="grid grid-cols-12 gap-6 mt-5">
                <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                    <div class="report-box zoom-in">
                        <div class="box p-5">
                            <div class="flex">
                                <i data-feather="shopping-cart" class="report-box__icon text-theme-10"></i>
                            </div>
                            <div class="text-3xl font-bold leading-8 mt-6">40</div>
                            <div class="text-base text-gray-600 mt-1">Xodimlar</div>
                        </div>
                    </div>
                </div>
                <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                    <div class="report-box zoom-in">
                        <div class="box p-5">
                            <div class="flex">
                                <i data-feather="credit-card" class="report-box__icon text-theme-11"></i>
                            </div>
                            <div class="text-3xl font-bold leading-8 mt-6">10</div>
                            <div class="text-base text-gray-600 mt-1">Ilmiy loyhalar</div>
                        </div>
                    </div>
                </div>
                <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                    <div class="report-box zoom-in">
                        <div class="box p-5">
                            <div class="flex">
                                <i data-feather="monitor" class="report-box__icon text-theme-12"></i>
                            </div>
                            <div class="text-3xl font-bold leading-8 mt-6">10</div>
                            <div class="text-base text-gray-600 mt-1">Palsapa doktori (PhD)</div>
                        </div>
                    </div>
                </div>
                <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                    <div class="report-box zoom-in">
                        <div class="box p-5">
                            <div class="flex">
                                <i data-feather="user" class="report-box__icon text-theme-9"></i>
                            </div>
                            <div class="text-3xl font-bold leading-8 mt-6">20</div>
                            <div class="text-base text-gray-600 mt-1">Pan doktori (DSc)</div>
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
                    <div style="display: flex;justify-content: space-between; border-bottom: 1px solid #e2e8f0; padding-bottom: 20px;">
                        <div style="font-size:18px;font-weight: 400;">{{$tashkiot_haqida->name}} Tashkiloti  xaqida qisqach ma’lumot</div>
                        
                    </div>
                        <tr>
                            <th class="whitespace-no-wrap border-b">Tashkilot nomi</th>
                            <td class="border-b" >{{ $tashkiot_haqida->name }}</td>
                        </tr>
                        <tr>
                            <th class="whitespace-no-wrap border-b">Tashkilot manzil</th>
                            <td class="border-b">{{ $tashkiot_haqida->yur_manzil  }} </td>
                        </tr>
                        <tr>
                            <th class="whitespace-no-wrap border-b">Tashkilot web sayit</th>
                            <td class="border-b">{{ $tashkiot_haqida->web_sayti }}</td>
                        </tr>
                        <tr>
                            <th class="whitespace-no-wrap border-b">Tashkilot telepon raqami</th>
                            <td class="border-b">{{ $tashkiot_haqida->phone }}</td>
                        </tr>
                </tbody>
            </table>
        </div>
@endsection