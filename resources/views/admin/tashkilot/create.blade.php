@extends('layouts.admin')

@section('content')


<div class="flex justify-between align-center mt-10">

    <h2 class="intro-y text-lg font-medium">Tashkilot yaratish</h2>



</div><br>
<div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2" style="background: white;
    padding: 20px 20px;
    border-radius: 20px">
    <div class="w-full mt-3 sm:mt-0 sm:ml-auto md:ml-0">
        <form id="science-paper-create-form" method="POST" action="{{ route("tashkilot.store") }}" class="validate-form"
            enctype="multipart/form-data" novalidate="novalidate">
            @csrf
            <div class="grid grid-cols-12 gap-2">
                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Tashkilot nomi
                    </label>
                    <input type="text" name="name" class="input w-full border mt-2" required="">
                </div>

                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Tashkilot qisqa nomi massalan(TATU, O'zMU)
                    </label>
                    <input type="text" name="name_qisqachasi" class="input w-full border mt-2" required="">
                </div>
                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Tashkil etilgan yil
                    </label>
                    <input type="number" name="tash_yil" class="input w-full border mt-2" required="">
                </div>

                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Yuridik manzili
                    </label>
                    <input type="text" name="yur_manzil" class="input w-full border mt-2" required="">
                </div>

                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Viloyat manzili
                    </label>
                    <input type="text" name="viloyat" class="input w-full border mt-2" >
                </div>

                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Tuman manzili
                    </label>
                    <input type="text" name="tuman" class="input w-full border mt-2" >
                </div>
                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Faoliyat yuritayotgan manzili
                    </label>
                    <input type="text" name="paoliyat_manzil" class="input w-full border mt-2" >
                </div>
                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Telefon raqami 
                    </label>
                    <input type="text" name="phone" class="input w-full border mt-2" >
                </div>
                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Email 
                    </label>
                    <input type="email" name="email" class="input w-full border mt-2" >
                </div>
                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Web-sayti
                    </label>
                    <input type="text" name="web_sayti" class="input w-full border mt-2" >
                </div>

                <div class="w-full col-span-6">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Mulkchilik turi
                    </label>
                    <select name="turi" id="science-sub-category" class="input border w-full mt-2" >

                        <option>Mulkchilik turini tanlang</option>

                        <option value="Davlat">Davlat</option>

                        <option value="Xususiy">Xususiy</option>

                    </select><br>
                </div>
                <div class="w-full col-span-6">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Tashkilotni saqlash harajatlarining moliyalashtirish manbasi
                    </label>
                    <select name="xarajatlar" id="science-sub-category" class="input border w-full mt-2" >

                        <option>Tashkilotni saqlash harajatlarining moliyalashtirishni manbasini tanlang</option>

                        <option value="Davlat byudjeti">Davlat byudjeti</option>

                        <option value="Xususiy investisiyalar">Xususiy investisiyalar</option>

                        <option value="Xorijiy investisiyalar">Xorijiy investisiyalar</option>

                        <option value="Boshqalar">Boshqalar</option>

                    </select><br>
                </div>
                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Shtat birligi soni
                    </label>
                    <input type="text" name="shtat_bir" class="input w-full border mt-2" >
                </div>
                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Xodimlar soni
                    </label>
                    <input type="number" name="tash_xodimlar" class="input w-full border mt-2" >
                </div>
                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Ilmiy xodimlar soni
                    </label>
                    <input type="number" name="ilmiy_xodimlar" class="input w-full border mt-2" >
                </div>

                <div class="w-full col-span-6">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Boshqariv tuzilmasi
                    </label>
                    <select name="boshqariv" id="science-sub-category" class="input border w-full mt-2" >

                        <option>Boshqariv tuzilmasinu tanlang</option>

                        <option value="Derektor">Direktor</option>

                        <option value="Kengash">Kengash</option>

                        <option value="Boshqaruv kengash">Boshqaruv kengash</option>

                    </select><br>
                </div>

                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row">STIR raqami 
                    </label>
                    <input type="text" name="stir_raqami" class="input w-full border mt-2" >
                </div>
                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row">Tashkilot hisob raqami 
                    </label>
                    <input type="text" name="hisob_raqam" class="input w-full border mt-2" >
                </div>
                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Xizmat ko'rsatuvchi bank
                    </label>
                    <input type="text" name="bank" class="input w-full border mt-2" >
                </div>
                <div class="w-full col-span-6">
                    
                    <label class="flex flex-col sm:flex-row"> <span class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Tashkilot logosini qo'shing 
                    </label>
                    <input type="file" name="logo" style="padding-left: 0" class="input w-full mt-2">

                </div>

            </div>
        </form><br>
        <div class="px-5 pb-5 text-center">
            <a href="{{ route('tashkilot.index') }}"  class="button delete-cancel w-32 border text-gray-700 mr-1">
                Bekor qilish
            </a>
            <button type="submit" form="science-paper-create-form"
                class="update-confirm button w-24 bg-theme-1 text-white">
                Qo'shish
            </button>
        </div>
    </div>
</div><br>



@endsection