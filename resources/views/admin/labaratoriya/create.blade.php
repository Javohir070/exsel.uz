@extends('layouts.admin')

@section('content')


<div class="flex justify-between align-center mt-10">

    <h2 class="intro-y text-lg font-medium">Labaratoriya qo'shish</h2>



</div><br>
<div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2" style="background: white;
    padding: 20px 20px;
    border-radius: 20px">
    <div class="w-full mt-3 sm:mt-0 sm:ml-auto md:ml-0">
        <form id="science-paper-create-form" method="POST" action="{{ route("laboratory.store") }}"
            class="validate-form" enctype="multipart/form-data" novalidate="novalidate">
            @csrf
            <div class="grid grid-cols-12 gap-2">
                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"> <span
                        class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Labaratoriyaning nomi
                        </label>
                        <input type="text" name="name" value="{{ old('name') }}" class="input w-full border mt-2" required="">
                        @error('name')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"> <span
                        class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Tashkil etilgan yil
                        </label>
                        <input type="number" name="tash_yil" value="{{ old('tash_yil') }}" class="input w-full border mt-2" required="">
                        @error('tash_yil')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"> <span
                        class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Manzil
                        </label>
                        <input type="text" name="address" value="{{ old('address') }}" class="input w-full border mt-2" required="">
                        @error('address')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"> <span
                        class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Rahbarning ilmiy ishlar (innovatsiyalar) bo‘yicha o‘rinbosari F.I.O.
                        </label>
                        <input type="text" name="u_fish" value="{{ old('u_fish') }}" class="input w-full border mt-2" required="">
                        @error('u_fish')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div> --}}

                    {{-- <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"> <span
                        class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> O‘rinbosarining emaili
                        </label>
                        <input type="email" name="u_email" value="{{ old('u_email') }}" class="input w-full border mt-2" required="">
                        @error('u_email')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div> --}}
                    
                    {{-- <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"> <span
                        class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> O‘rinbosarining  telefon raqami 
                        </label>
                        <input type="text" name="u_phone" value="{{ old('u_phone') }}" class="input w-full border mt-2" required="">
                        @error('u_phone')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div> --}}

                    
            </div><br>
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