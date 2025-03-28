@extends('layouts.admin')

@section('content')


<div class="flex justify-between align-center mt-10">

    <h2 class="intro-y text-lg font-medium">intellektual qo'shish</h2>



</div><br>
<div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2" style="background: white;
    padding: 20px 20px;
    border-radius: 20px">
    <div class="w-full mt-3 sm:mt-0 sm:ml-auto md:ml-0">
        <form id="science-paper-create-form" method="POST" action="{{ route("intellektual.store") }}"
            class="validate-form" enctype="multipart/form-data" novalidate="novalidate">
            @csrf
            <div class="grid grid-cols-12 gap-2">

                <div class="w-full col-span-6">
                    <label class="flex flex-col sm:flex-row"> Mahalliy ilmiy jurnallardagi maqolalar soni rejada
                    </label>
                    <div class="grid grid-cols-12 gap-2">
                        <div class="w-full col-span-6">
                            <label class="flex flex-col sm:flex-row"> <span
                                class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>rejada
                                </label>
                            <input type="number" name="name" value="{{ old('name') }}" class="input w-full border mt-2" required="">
                            @error('name')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="w-full col-span-6">
                            <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>amalda
                            </label>
                            <input type="number" name="name" value="{{ old('name') }}" class="input w-full border mt-2" required="">
                            @error('name')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="w-full col-span-6">
                    <label class="flex flex-col sm:flex-row"> Mahalliy ilmiy jurnallardagi maqolalar soni rejada
                    </label>
                    <div class="grid grid-cols-12 gap-2">
                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"> <span
                        class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Xorijiy jurnallardagi ilmiy maqolalar soni rejada
                        </label>
                        <input type="number" name="name" value="{{ old('name') }}" class="input w-full border mt-2" required="">
                        @error('name')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"> <span
                        class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Xorijiy jurnallardagi ilmiy maqolalar soni amalda
                        </label>
                        <input type="number" name="name" value="{{ old('name') }}" class="input w-full border mt-2" required="">
                        @error('name')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>
                    </div>
                </div>

                <div class="w-full col-span-6">
                    <label class="flex flex-col sm:flex-row"> Mahalliy ilmiy jurnallardagi maqolalar soni rejada
                    </label>
                    <div class="grid grid-cols-12 gap-2">
                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"> <span
                        class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Web of Science va Scopus bazasidagi xalqaro nashrlardagi maqolalar soni rejada
                        </label>
                        <input type="number" name="name" value="{{ old('name') }}" class="input w-full border mt-2" required="">
                        @error('name')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"> <span
                        class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Web of Science va Scopus bazasidagi xalqaro nashrlardagi maqolalar soni amalda
                        </label>
                        <input type="number" name="name" value="{{ old('name') }}" class="input w-full border mt-2" required="">
                        @error('name')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>
                    </div>
                </div>

                <div class="w-full col-span-6">
                    <label class="flex flex-col sm:flex-row"> Mahalliy ilmiy jurnallardagi maqolalar soni rejada
                    </label>
                    <div class="grid grid-cols-12 gap-2">

                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"> <span
                        class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Tezislar soni rejada
                        </label>
                        <input type="number" name="name" value="{{ old('name') }}" class="input w-full border mt-2" required="">
                        @error('name')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"> <span
                        class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Tezislar soni amalda
                        </label>
                        <input type="number" name="name" value="{{ old('name') }}" class="input w-full border mt-2" required="">
                        @error('name')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>
                    </div>
                </div>

                <div class="w-full col-span-6">
                    <label class="flex flex-col sm:flex-row"> Mahalliy ilmiy jurnallardagi maqolalar soni rejada
                    </label>
                    <div class="grid grid-cols-12 gap-2">
                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"> <span
                        class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Ilmiy monografiyalar soni rejada
                        </label>
                        <input type="number" name="name" value="{{ old('name') }}" class="input w-full border mt-2" required="">
                        @error('name')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"> <span
                        class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Ilmiy monografiyalar soni amalda
                        </label>
                        <input type="number" name="name" value="{{ old('name') }}" class="input w-full border mt-2" required="">
                        @error('name')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>
                    </div>
                </div>

                <div class="w-full col-span-6">
                    <label class="flex flex-col sm:flex-row"> Mahalliy ilmiy jurnallardagi maqolalar soni rejada
                    </label>
                    <div class="grid grid-cols-12 gap-2">
                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"> <span
                        class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Nashr qilingan oʻquv qoʻllanmalari soni rejada
                        </label>
                        <input type="number" name="name" value="{{ old('name') }}" class="input w-full border mt-2" required="">
                        @error('name')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"> <span
                        class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Nashr qilingan oʻquv qoʻllanmalari soni amalda
                        </label>
                        <input type="number" name="name" value="{{ old('name') }}" class="input w-full border mt-2" required="">
                        @error('name')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>
                    </div>
                </div>

                <div class="w-full col-span-6">
                    <label class="flex flex-col sm:flex-row"> Mahalliy ilmiy jurnallardagi maqolalar soni rejada
                    </label>
                    <div class="grid grid-cols-12 gap-2">
                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"> <span
                        class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Nashr qilingan darsliklar soni rejada
                        </label>
                        <input type="number" name="name" value="{{ old('name') }}" class="input w-full border mt-2" required="">
                        @error('name')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"> <span
                        class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Nashr qilingan darsliklar soni amalda
                        </label>
                        <input type="number" name="name" value="{{ old('name') }}" class="input w-full border mt-2" required="">
                        @error('name')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>
                    </div>
                </div>

                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"> <span
                        class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Bakalavriat bosqichida tayyorlangan bitiruv malakaviy ishlari soni rejada
                        </label>
                        <input type="number" name="name" value="{{ old('name') }}" class="input w-full border mt-2" required="">
                        @error('name')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"> <span
                        class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Bakalavriat bosqichida tayyorlangan bitiruv malakaviy ishlari soni amalda
                        </label>
                        <input type="number" name="name" value="{{ old('name') }}" class="input w-full border mt-2" required="">
                        @error('name')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"> <span
                        class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Tayyorlangan magistrlik dissertatsiyalari soni rejada
                        </label>
                        <input type="number" name="name" value="{{ old('name') }}" class="input w-full border mt-2" required="">
                        @error('name')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"> <span
                        class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Tayyorlangan magistrlik dissertatsiyalari soni amalda
                        </label>
                        <input type="number" name="name" value="{{ old('name') }}" class="input w-full border mt-2" required="">
                        @error('name')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"> <span
                        class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Tayyorlangan doktorlik dissertatsiyalari soni (PhD, DSc) rejada
                        </label>
                        <input type="number" name="name" value="{{ old('name') }}" class="input w-full border mt-2" required="">
                        @error('name')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"> <span
                        class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Tayyorlangan doktorlik dissertatsiyalari soni (PhD, DSc) amalda
                        </label>
                        <input type="number" name="name" value="{{ old('name') }}" class="input w-full border mt-2" required="">
                        @error('name')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"> <span
                        class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Intellektual mulk obyektlari uchun berilgan arizalar soni rejada
                        </label>
                        <input type="number" name="name" value="{{ old('name') }}" class="input w-full border mt-2" required="">
                        @error('name')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"> <span
                        class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Intellektual mulk obyektlari uchun berilgan arizalar soni amalda
                        </label>
                        <input type="number" name="name" value="{{ old('name') }}" class="input w-full border mt-2" required="">
                        @error('name')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"> <span
                        class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Ixtiro uchun olingan patentlari soni rejada
                        </label>
                        <input type="number" name="name" value="{{ old('name') }}" class="input w-full border mt-2" required="">
                        @error('name')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"> <span
                        class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Ixtiro uchun olingan patentlari soni amalda
                        </label>
                        <input type="number" name="name" value="{{ old('name') }}" class="input w-full border mt-2" required="">
                        @error('name')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"> <span
                        class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Ixtiro uchun patentga berilgan buyurtmalar soni rejada
                        </label>
                        <input type="number" name="name" value="{{ old('name') }}" class="input w-full border mt-2" required="">
                        @error('name')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"> <span
                        class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Ixtiro uchun patentga berilgan buyurtmalar soni amalda
                        </label>
                        <input type="number" name="name" value="{{ old('name') }}" class="input w-full border mt-2" required="">
                        @error('name')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"> <span
                        class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Dasturiy mahsulotga olingan guvohnomalar soni rejada
                        </label>
                        <input type="number" name="name" value="{{ old('name') }}" class="input w-full border mt-2" required="">
                        @error('name')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="w-full col-span-6">
                        <label class="flex flex-col sm:flex-row"> <span
                        class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Dasturiy mahsulotga olingan guvohnomalar soni amalda
                        </label>
                        <input type="number" name="name" value="{{ old('name') }}" class="input w-full border mt-2" required="">
                        @error('name')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>

            </div>
        </form>
        <div class="px-5 pb-5 text-center mt-4">
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
