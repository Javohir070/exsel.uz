@extends('layouts.admin')

@section('content')


<div class="flex justify-between align-center mt-10">

    <h2 class="intro-y text-lg font-medium">Rahbar qo'shish</h2>
    
</div>
<div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2" style="background: white;
    padding: 20px 20px;
    border-radius: 20px">
    <div class="w-full mt-3 sm:mt-0 sm:ml-auto md:ml-0">
        <form id="science-paper-create-form" method="POST" action="{{ route("tashkilotrahbari.update",['tashkilotrahbari'=>$tashkilot->id]) }}"
        
            class="validate-form" enctype="multipart/form-data" novalidate="novalidate">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-12 gap-2">
                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"> <span
                        class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Rahbarning F.I.Sh
                        </label>
                        <input type="text"  name="fish" value="{{$tashkilot->fish}}" class="input w-full border mt-2" required="">
                        @error('fish')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"> <span
                        class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Rahbarning Email
                        </label>
                        <input type="email" name="email" value="{{$tashkilot->email}}" class="input w-full border mt-2" required="">
                        @error('email')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"> <span
                        class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Rahbarning Telefon raqami
                        </label>
                        <input type="text" name="phone" value="{{$tashkilot->phone}}" class="input w-full border mt-2" required="">
                        @error('phone')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"> <span
                        class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Rahbarning ilmiy ishlar (innovatsiyalar) bo‘yicha o‘rinbosari F.I.O.
                        </label>
                        <input type="text" name="u_fish" value="{{$tashkilot->u_fish}}" class="input w-full border mt-2" required="">
                        @error('u_fish')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"> <span
                        class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> O‘rinbosarining email
                        </label>
                        <input type="email" name="u_email" value="{{$tashkilot->u_email}}" class="input w-full border mt-2" required="">
                        @error('u_email')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"> <span
                        class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> O‘rinbosarining  telefon raqami 
                        </label>
                        <input type="text" name="u_phone" value="{{$tashkilot->u_phone}}" class="input w-full border mt-2" required="">
                        @error('u_phone')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>
            </div>
        </form><br>
        <div class="px-5 pb-5 text-center">
            <a href="{{ route('tashkilotrahbari.index') }}"  class="button delete-cancel w-32 border text-gray-700 mr-1">
                Bekor qilish
            </a>
            <button type="submit" form="science-paper-create-form" class="update-confirm button w-24 bg-theme-1 text-white">
                Qo'shish
            </button>
        </div>
    </div>
</div>



@endsection