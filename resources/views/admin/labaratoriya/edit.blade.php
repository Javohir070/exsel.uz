@extends('layouts.admin')

@section('content')


    <div class="flex justify-between align-center mt-6 mb-6">

        <h2 class="intro-y text-lg font-medium">Labaratoriya tahrirlash</h2>

        <a href="{{ route('laboratory.index') }}" class="button w-24 bg-theme-1 text-white">
            Orqaga
        </a>

    </div>
    
    <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2" style="background: white;
            padding: 20px 20px;
            border-radius: 4px">
        <div class="w-full mt-3 sm:mt-0 sm:ml-auto md:ml-0">
            <form id="science-paper-create-form" method="POST"
                action="{{ route("laboratory.update", ['laboratory' => $laboratory->id]) }}" class="validate-form"
                enctype="multipart/form-data" novalidate="novalidate">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-12 gap-2">
                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"> <span
                                class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Labaratoriyaning nomi
                        </label>
                        <input type="text" name="name" value="{{ $laboratory->name }}" class="input w-full border mt-2"
                            required="">
                        @error('name')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"> <span
                                class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Tashkil etilgan yil
                        </label>
                        <input type="number" name="tash_yil" value="{{ $laboratory->tash_yil }}"
                            class="input w-full border mt-2" required="">
                        @error('tash_yil')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="w-full col-span-12">
                        <label class="flex flex-col sm:flex-row"> <span
                                class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Tavsif
                        </label>
                        <textarea name="tavsif" cols="5" rows="5" class="input w-full border mt-2"
                            required="">{{ $laboratory->tavsif }}</textarea>
                        @error('tavsif')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </form>

            <div class="px-5 pb-5 text-center mt-4">
                @if (auth()->user()->hasRole('labaratoriyaga_masul'))
                    <a href="{{ route('laboratoriya.index') }}" class="button delete-cancel w-32 border text-gray-700 mr-1">
                        Bekor qilish
                    </a>
                @else
                    <a href="{{ route('laboratory.index') }}" class="button delete-cancel w-32 border text-gray-700 mr-1">
                        Bekor qilish
                    </a>
                @endif
                <button type="submit" form="science-paper-create-form"
                    class="update-confirm button w-24 bg-theme-1 text-white">
                    Qo'shish
                </button>
            </div>
        </div>
    </div>

@endsection
