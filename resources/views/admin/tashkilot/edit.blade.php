@extends('layouts.admin')

@section('content')


<div class="flex justify-between align-center mt-10">

    <h2 class="intro-y text-lg font-medium">Tashkilot qo'shish</h2>



</div><br>
<div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2" style="background: white;
    padding: 20px 20px;
    border-radius: 20px">
    <div class="w-full mt-3 sm:mt-0 sm:ml-auto md:ml-0">
        <form id="science-paper-create-form" method="POST" action="{{ route("tashkilot.update",['tashkilot'=>$tashkilot->id]) }}" class="validate-form"
            enctype="multipart/form-data" novalidate="novalidate">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-12 gap-2">
                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Tashkilot nomi
                    </label>
                    <input type="text" name="name" value="{{ $tashkilot->name }}" class="input w-full border mt-2" required="">
                </div>

                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Tashkilot qisqa nomi massalan(TATU, O'zMU)
                    </label>
                    <input type="text" name="name_qisqachasi" value="{{ $tashkilot->name_qisqachasi }}" class="input w-full border mt-2" required="">
                </div>
                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Tashkil etilgan yil
                    </label>
                    <input type="number" name="tash_yil" value="{{ $tashkilot->tash_yil }}" class="input w-full border mt-2" required="">
                </div>

                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Yuridik manzili
                    </label>
                    <input type="text" name="yur_manzil" value="{{ $tashkilot->yur_manzil }}" class="input w-full border mt-2" required="">
                </div>

                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Viloyat manzili
                    </label>
                    <input type="text" name="viloyat" value="{{ $tashkilot->viloyat }}" class="input w-full border mt-2" required="">
                </div>

                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Tuman manzili
                    </label>
                    <input type="text" name="tuman" value="{{ $tashkilot->tuman }}" class="input w-full border mt-2" required="">
                </div>
                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Paoliyat yuritayetgan mahzili
                    </label>
                    <input type="text" name="paoliyat_manzil" value="{{ $tashkilot->paoliyat_manzil }}" class="input w-full border mt-2" required="">
                </div>
                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Telepon nomer 
                    </label>
                    <input type="text" name="phone" value="{{ $tashkilot->phone }}" class="input w-full border mt-2" required="">
                </div>
                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Email 
                    </label>
                    <input type="email" name="email" value="{{ $tashkilot->email }}" class="input w-full border mt-2" required="">
                </div>
                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Web-sayti
                    </label>
                    <input type="text" name="web_sayti" value="{{ $tashkilot->web_sayti }}" class="input w-full border mt-2" required="">
                </div>

                <div class="w-full col-span-6">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Mulkchilik turi
                    </label>
                    <select name="turi"  id="science-sub-category" class="input border w-full mt-2" required="">

                        <option value="0">Mulkchilik turi tanlang</option>

                        <option value="davlat">Davlat</option>

                        <option value="xususiy">Xususiy</option>

                    </select><br>
                </div>
                <div class="w-full col-span-6">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Tashkilotni saqlash harajatlarining moliyalashtirish manbasi
                    </label>
                    <select name="xarajatlar"  id="science-sub-category" class="input border w-full mt-2" required="">

                        <option value="0">tanlang</option>

                        <option value="davlat byudjeti">Davlat byudjeti</option>

                        <option value="xususiy investisiyalar">Xususiy investisiyalar</option>

                        <option value="xorijiy investisiyalar">Xorijiy investisiyalar</option>

                        <option value="boshqalar">boshqalar</option>

                    </select><br>
                </div>
                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Shtst birligi soni
                    </label>
                    <input type="text" name="shtat_bir" value="{{ $tashkilot->shtat_bir }}" class="input w-full border mt-2" required="">
                </div>
                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Xodimlar soni
                    </label>
                    <input type="number" name="tash_xodimlar" value="{{ $tashkilot->tash_xodimlar }}" class="input w-full border mt-2" required="">
                </div>
                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Ilmiy xodimlar soni
                    </label>
                    <input type="number" name="ilmiy_xodimlar" value="{{ $tashkilot->ilmiy_xodimlar }}" class="input w-full border mt-2" required="">
                </div>

                <div class="w-full col-span-6">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Boshqariv tuzilmasi
                    </label>
                    <select name="boshqariv"  id="science-sub-category" class="input border w-full mt-2" required="">

                        <option value="0">boshqariv tuzilmasi tanlang</option>

                        <option value="Derektor">Derektor</option>

                        <option value="Kengash">Kengash</option>

                        <option value="Boshqaruv kengash">Boshqaruv kengash</option>

                    </select><br>
                </div>







                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row">STIR raqami 
                    </label>
                    <input type="text" name="stir_raqami" value="{{ $tashkilot->stir_raqami }}" class="input w-full border mt-2" required="">
                </div>

                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Xizmat ko'rsatuvch bank
                    </label>
                    <input type="text" name="bank" value="{{ $tashkilot->bank }}" class="input w-full border mt-2" required="">
                </div>






            </div>
        </form><br>
        <div class="px-5 pb-5 text-center">
            <button type="button" data-dismiss="modal" class="button delete-cancel w-32 border text-gray-700 mr-1">
                Bekor qilish
            </button>
            <button type="submit" form="science-paper-create-form"
                class="update-confirm button w-24 bg-theme-1 text-white">
                Qo'shish
            </button>
        </div>
    </div>
</div><br>



@endsection