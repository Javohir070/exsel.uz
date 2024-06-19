@extends('layouts.admin')

@section('content')


<div class="flex justify-between align-center mt-10">

    <h2 class="intro-y text-lg font-medium">Rahbar qo'shish</h2>



</div><br>
<div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2" style="background: white;
    padding: 20px 20px;
    border-radius: 20px">
    <div class="w-full mt-3 sm:mt-0 sm:ml-auto md:ml-0">
        <form id="science-paper-create-form" method="POST" action="{{ route("iqtisodiy.store") }}"
            class="validate-form" enctype="multipart/form-data" novalidate="novalidate">
            @csrf
            <div class="grid grid-cols-12 gap-2">
                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"> <span
                        class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Tashkilot kadastr raqami
                        </label>
                        <input type="text" name="kadastr_raqami" class="input w-full border mt-2" required="">
                    </div>
                    
                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"> <span
                        class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Umumiy maydoni (ga)
                        </label>
                        <input type="text" name="u_maydoni" class="input w-full border mt-2" required="">
                    </div>

                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"> <span
                        class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Shundan tajriba maydonlari (ga)
                        </label>
                        <input type="text" name="taj_maydonlari" class="input w-full border mt-2" required="">
                    </div>

                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"> <span
                        class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Binolar soni
                        </label>
                        <input type="number" name="binolar_soni" class="input w-full border mt-2" required="">
                    </div>

                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"> <span
                        class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Binolarning auditoriya sig‘imi
                        </label>
                        <input type="number" name="auditoriya_sigimi" class="input w-full border mt-2" required="">
                    </div>
                    
                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"> <span
                        class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Katta xajmdagi auditoriyalar soni (150-200 kishilik) 
                        </label>
                        <input type="number" name="k_xaj_auditor_soni" class="input w-full border mt-2" required="">
                    </div>

                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"> <span
                        class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>  Ustav fondi miqdori, mln so‘mda
                        </label>
                        <input type="text" name="pondi_miqdori" class="input w-full border mt-2" required="">
                    </div>

                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"> <span
                        class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>  Ilmiy faoliyatni amalga oshiruvchi bo‘linmalar (bo‘lim, kafedra, laboratoriya) soni
                        </label>
                        <input type="number" name="ilmiyp_bulinalar" class="input w-full border mt-2" required="">
                    </div>
                    <div class="w-full col-span-4">
                        <label class="flex flex-col sm:flex-row"> <span
                        class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> tabiy gaz mavjudligi 
                        </label>
                        <div class="flex flex-col sm:flex-row mt-2">
                            <div class="flex items-center text-gray-700 mr-2">
                                 <input type="radio" class="input border mr-2"  name="gaz" value="ha"> 
                                 <label class="cursor-pointer select-none" >Ha</label> 
                            </div>
                            <div class="flex items-center text-gray-700 mr-2 mt-2 sm:mt-0">
                                <input type="radio" class="input border mr-2"  name="gaz" value="yoq">
                                <label class="cursor-pointer select-none">Yoq</label>
                            </div>
                        </div>
                    </div>

                    <div class="w-full col-span-4">
                        <label class="flex flex-col sm:flex-row"> <span
                        class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> elektr energiya mavjudligi 
                        </label>
                        <div class="flex flex-col sm:flex-row mt-2">
                            <div class="flex items-center text-gray-700 mr-2">
                                 <input type="radio" class="input border mr-2"  name="elektr" value="ha"> 
                                 <label class="cursor-pointer select-none" >Ha</label> 
                            </div>
                            <div class="flex items-center text-gray-700 mr-2 mt-2 sm:mt-0">
                                <input type="radio" class="input border mr-2"  name="elektr" value="yoq">
                                <label class="cursor-pointer select-none">Yoq</label>
                            </div>
                        </div>
                    </div>

                    <div class="w-full col-span-4">
                        <label class="flex flex-col sm:flex-row"> <span
                        class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> suv mavjudligi 
                        </label>
                        <div class="flex flex-col sm:flex-row mt-2">
                            <div class="flex items-center text-gray-700 mr-2">
                                 <input type="radio" class="input border mr-2"  name="suv" value="ha"> 
                                 <label class="cursor-pointer select-none" >Ha</label> 
                            </div>
                            <div class="flex items-center text-gray-700 mr-2 mt-2 sm:mt-0">
                                <input type="radio" class="input border mr-2"  name="suv" value="yoq">
                                <label class="cursor-pointer select-none">Yoq</label>
                            </div>
                        </div>
                    </div>

                    <div class="w-full col-span-4">
                        <label class="flex flex-col sm:flex-row"> <span
                        class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> kanalizatsiya mavjudligi 
                        </label>
                        <div class="flex flex-col sm:flex-row mt-2">
                            <div class="flex items-center text-gray-700 mr-2">
                                 <input type="radio" class="input border mr-2"  name="kanalizasiya" value="ha"> 
                                 <label class="cursor-pointer select-none" >Ha</label> 
                            </div>
                            <div class="flex items-center text-gray-700 mr-2 mt-2 sm:mt-0">
                                <input type="radio" class="input border mr-2"  name="kanalizasiya" value="yoq">
                                <label class="cursor-pointer select-none">Yoq</label>
                            </div>
                        </div>
                    </div>

                    <div class="w-full col-span-4">
                        <label class="flex flex-col sm:flex-row"> <span
                        class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>internet mavjudligi
                        </label>
                        <div class="flex flex-col sm:flex-row mt-2">
                            <div class="flex items-center text-gray-700 mr-2">
                                 <input type="radio" class="input border mr-2"  name="internet" value="ha"> 
                                 <label class="cursor-pointer select-none" >Ha</label> 
                            </div>
                            <div class="flex items-center text-gray-700 mr-2 mt-2 sm:mt-0">
                                <input type="radio" class="input border mr-2"  name="internet" value="yoq">
                                <label class="cursor-pointer select-none">Yoq</label>
                            </div>
                        </div>
                    </div>

                    
            </div><br>
        </form><br>
        <div class="px-5 pb-5 text-center">
            <a href="{{ route("iqtisodiy.index") }}"  class="button delete-cancel w-32 border text-gray-700 mr-1">
                Bekor qilish
            </a>
            <button type="submit" form="science-paper-create-form" class="update-confirm button w-24 bg-theme-1 text-white">
                Qo'shish
            </button>
        </div>
    </div>
</div><br>



@endsection