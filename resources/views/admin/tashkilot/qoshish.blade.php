@extends('layouts.admin')

@section('content')


<div class="flex justify-between align-center mt-10">

    <h2 class="intro-y text-lg font-medium">Tashkilot qo'shish</h2>

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

                <div class="w-full col-span-12">
                    
                    <label class="flex flex-col sm:flex-row"> <span class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> logo 
                    </label>
                    <input type="file" name="logo" style="padding-left: 0" class="input w-full mt-2">

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