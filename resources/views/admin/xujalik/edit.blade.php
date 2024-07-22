@extends('layouts.admin')

@section('content')


<div class="flex justify-between align-center mt-10">

    <h2 class="intro-y text-lg font-medium">Xo'jalik tahrirlash</h2>



</div><br>
<div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2" style="background: white;
    padding: 20px 20px;
    border-radius: 20px">
    <div class="w-full mt-3 sm:mt-0 sm:ml-auto md:ml-0">
        <form id="science-paper-create-form" method="POST" action="{{ route("xujalik.update",['xujalik'=>$xujalik->id]) }}" class="validate-form"
            enctype="multipart/form-data" novalidate="novalidate">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-12 gap-2">
                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Ishlanma (mahsulot, tovar, xizmat va ishlar) nomi
                    </label>
                    <input type="text" name="ishlanma_nomi" value="{{ $xujalik->ishlanma_nomi }}" class="input w-full border mt-2" required="">
                </div>

                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Intellektual mulk huquqining mavjudligi ( mavjud bo‘lsa raqami )
                    </label>
                    <input type="text" name="intellektual_raqami" value="{{ $xujalik->intellektual_raqami }}" class="input w-full border mt-2" required="">
                </div>

                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Intellektual mulk huquqining mavjudligi ( mavjud bo‘lsa sanasi )
                    </label>
                    <input type="text" name="intellektual_sana" value="{{ $xujalik->intellektual_sana }}"  class=" input w-full border mt-2" required="">
                </div>

                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Ishlanma yaratilgan tadqiqot mavzusi va turi
                    </label>
                    <input type="text" name="ishlanma_mavzu" value="{{ $xujalik->ishlanma_mavzu }}" class="input w-full border mt-2" required="">
                </div>

                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Ishlanma yaratilgan tadqiqot  turi
                    </label>
                    <select name="ishlanma_turi"  id="science-sub-category" class="input border w-full mt-2" required="">

                        <option>Loyiha turini tanlang</option>

                        <option value="Amaliy" {{ $xujalik->ishlanma_turi == "Amaliy" ? "selected" : ""}}>Amaliy</option>

                        <option value="Innovatsion" {{ $xujalik->ishlanma_turi == "Innovatsion" ? "selected" : ""}}>Innovatsion</option>

                    </select>
                </div>

                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Shartnoma turi
                    </label>
                    <select name="lisenzion"  id="science-sub-category" class="input border w-full mt-2" required="">

                        <option>shartnoma turini tanlang</option>

                        <option value="Xo‘jalik shartnomasi" {{ $xujalik->lisenzion == "Xo‘jalik shartnomasi" ? "selected" : ""}}>Xo‘jalik shartnomasi</option>

                        <option value="Litsenziya shartnomasi " {{ $xujalik->lisenzion == "Litsenziya shartnomasi" ? "selected" : ""}}>Litsenziya shartnomasi</option>

                    </select>
                </div>

                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Shartnoma raqami
                    </label>
                    <input type="text" name="sh_raqami" value="{{ $xujalik->sh_raqami }}" class="input w-full border mt-2" required="">
                </div>

                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Shartnoma sanasi
                    </label>
                    <input type="text" name="sh_sanasi" value="{{ $xujalik->sh_sanasi }}"  class=" input w-full border mt-2" required="">
                </div>

                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Ilmiy yoki innovatsion ishlanmani sotib olish (foydalanish) bo‘yicha shartnoma tuzgan tashkilot yoki korxona nomi
                    </label>
                    <input type="text" name="ilmiy_nomi" value="{{ $xujalik->ilmiy_nomi }}" class="input w-full border mt-2" required="">
                </div>

                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Ilmiy yoki innovatsion ishlanmani sotib olish (foydalanish) bo‘yicha shartnoma tuzgan tashkilot yoki korxona STIR
                    </label>
                    <input type="text" name="stir" value="{{ $xujalik->stir }}" class="input w-full border mt-2" required="">
                </div>

                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Shartnoma summasi (mln.so‘m)
                    </label>
                    <input type="text" name="sh_summa" value="{{ $xujalik->sh_summa }}" class="input w-full border mt-2" required="">
                </div>

                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Shartnoma bo‘yicha kelib tushgan mablag‘ sanasi
                    </label>
                    <input type="text" name="shkelib_sana" value="{{ $xujalik->shkelib_sana }}"  class=" input w-full border mt-2" required="">
                </div>

                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Shartnoma bo‘yicha kelib tushgan mablag‘ summasi
                    </label>
                    <input type="text" name="shkelib_summa" value="{{ $xujalik->shkelib_summa }}" class="input w-full border mt-2" required="">
                </div>

            </div>
        </form><br>
        <div class="px-5 pb-5 text-center">
            <a href="{{ url('xujalik') }}"  data-dismiss="modal" class="button delete-cancel w-32 border text-gray-700 mr-1">
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