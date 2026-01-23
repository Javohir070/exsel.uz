@extends('layouts.admin')

@section('content')

    <div class="flex justify-between align-center mt-6 mb-6">

        <h2 class="intro-y text-lg font-medium">Monitoring ma'lumotni qo'shish</h2>

        <div>
            <a href="{{ route("monitorings.index") }}" class="button w-24 ml-3 bg-theme-1 text-white">
                Orqaga
            </a>
        </div>

    </div>

    <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2 monitoring-form">
        <div class="w-full mt-3 sm:mt-0 sm:ml-auto md:ml-0">
            <form id="monitoring-create-form" method="POST" action="{{ route("monitorings.store") }}"
                class="validate-form" novalidate="novalidate">
                @csrf
                <div class="grid grid-cols-12 gap-2">

                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row">
                            <span class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Yil
                        </label>
                        <input type="number" name="year" value="{{ old('year', date('Y')) }}" 
                            class="input w-full border mt-2" min="2000" max="2100" required>
                        @error('year')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row">
                            <span class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Chorak
                        </label>
                        <select name="quarter" id="quarter" class="input border w-full mt-2" required>
                            <option value="">Tanlang</option>
                            <option value="1" {{ old('quarter') == 1 ? 'selected' : '' }}>1-chorak</option>
                            <option value="2" {{ old('quarter') == 2 ? 'selected' : '' }}>2-chorak</option>
                            <option value="3" {{ old('quarter') == 3 ? 'selected' : '' }}>3-chorak</option>
                            <option value="4" {{ old('quarter') == 4 ? 'selected' : '' }}>4-chorak</option>
                        </select>
                        @error('quarter')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row">
                            Holati
                        </label>
                        <div class="mt-2">
                            <input type="checkbox" name="is_active" value="1" 
                                {{ old('is_active', true) ? 'checked' : '' }} 
                                class="input border mr-2">
                            <label>Faol</label>
                        </div>
                        @error('is_active')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                </div>
            </form>

            <div class="px-5 pb-5 text-center mt-4">
                <a href="{{ route('monitorings.index') }}" class="button delete-cancel w-32 border text-gray-700 mr-1">
                    Bekor qilish
                </a>
                <button type="submit" form="monitoring-create-form"
                    class="update-confirm button w-24 bg-theme-1 text-white">
                    Saqlash
                </button>
            </div>
            
        </div>
    </div>

@endsection
