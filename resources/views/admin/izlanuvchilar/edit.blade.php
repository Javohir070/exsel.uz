@extends('layouts.admin')

@section('content')


<div class="flex justify-between align-center mt-10">

    <h2 class="intro-y text-lg font-medium">Izlanuvchini tahrirlash</h2>



</div><br>
<div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2" style="background: white;
    padding: 20px 20px;
    border-radius: 20px">
    <div class="w-full mt-3 sm:mt-0 sm:ml-auto md:ml-0">
        <form id="science-paper-create-form" method="POST" action="{{ route("izlanuvchilar.update",['izlanuvchilar'=>$izlanuvchilar->id]) }}" class="validate-form"
            enctype="multipart/form-data" novalidate="novalidate">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-12 gap-2">
                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> F.I.Sh
                    </label>
                    <input type="text" name="fish" value="{{ $izlanuvchilar->fish }}" class="input w-full border mt-2" required="">
                    @error('fish')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Jshshir
                    </label>
                    <input type="number" name="jshshir" value="{{ $izlanuvchilar->jshshir }}" class="input w-full border mt-2" required="">
                    @error('jshshir')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div> 

                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Pasport seriyasi va raqami
                    </label>
                    <input type="text"  name="pasport_seriya" value="{{ $izlanuvchilar->pasport_seriya }}"   class=" input w-full border mt-2" required="">
                    @error('pasport_seriya')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="w-full col-span-6">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Jinsi
                    </label>
                    <select name="jinsi" value="{{ $izlanuvchilar->jinsi }}" id="science-sub-category" class="input border w-full mt-2" required="">

                        <option value="">Jinsni tanlang</option>

                        <option value="1" {{ $izlanuvchilar->jinsi == "1" ? "selected" : ""}}>Erkak</option>

                        <option value="2" {{ $izlanuvchilar->jinsi == "2" ? "selected" : ""}}>Ayol</option>

                    </select>
                    @error('jinsi')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="w-full col-span-6">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Ta'lim turi
                    </label>
                    <select name="talim_turi" value="{{ $izlanuvchilar->talim_turi }}" id="science-sub-category" class="input border w-full mt-2" required="">

                        <option value="">Ta'lim turini tanlang</option>

                        <option value="Stajyor-tadqiqotchi">Stajyor-tadqiqotchi</option>

                        <option value="Mustaqil izlanuvchi(PhD)">Mustaqil izlanuvchi(PhD)</option>

                        <option value="Tayanch doktorantura(PhD)">Tayanch doktorantura(PhD)</option>

                        <option value="Doktorantura(DSc)">Doktorantura(DSc)</option>

                        <option value="Maqsadli tayanch doktorantura(PhD)">Maqsadli tayanch doktorantura(PhD)</option>

                        <option value="Maqsadli doktorantura(DSc)">Maqsadli doktorantura(DSc)</option>

                    </select>
                    @error('talim_turi')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row">  Ixtisosligi
                    </label>
                    <input type="text" name="ixtisoslik" value="{{ $izlanuvchilar->ixtisoslik }}" class="input w-full border mt-2" required="">
                    @error('ixtisoslik')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="w-full col-span-6">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Qabul qilingan yil
                                            </label>
                    <select name="qabul_qilgan_yil" value="{{ $izlanuvchilar->qabul_qilgan_yil }}" class="science-sub-categoryyil input border w-full mt-2 " required="">
                        <option value="">yil tanlang</option>
                    </select>
                    @error('qabul_qilgan_yil')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>
        
                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row">  Dissertatsiya mavzusi
                    </label>
                    <input type="text" name="mavzusi" value="{{ $izlanuvchilar->mavzusi }}" class="input w-full border mt-2" required="">
                    @error('mavzusi')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>
               
                <div class="w-full col-span-6 ">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Telefon raqami
                    </label>
                    <input type="tel" name="phone" placeholder="+998 90 123 45 67" value="{{ $izlanuvchilar->phone }}" class="input w-full border mt-2" required="">
                    @error('phone')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="w-full col-span-6">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Loyihada ishtiroki
                        
                    </label>
                    <select name="loyihada_ishtiroki" value="{{ $izlanuvchilar->loyihada_ishtiroki }}" id="ish_tartibi"  id="science-sub-category" class="input border w-full mt-2" required="">

                        <option value="">Loyihada ishtiroki  tanlang</option>

                        <option value="ha">ha</option>

                        <option value="yoq">yoq</option>

                    </select><br>
                    @error('loyihada_ishtiroki')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="w-full col-span-6 " style="display: none;" id="orindoshlik-input">
                    <label class="flex flex-col sm:flex-row"> Ishtirok etgan loyihasini stiri
                    </label>
                    <input type="text" name="stir" value="{{ $izlanuvchilar->stir }}" class="input w-full border mt-2" required="">
                    @error('stir')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>
            </div>

        </form><br>
        <div class="px-5 pb-5 text-center">
            <a href="{{ route('izlanuvchilar.index') }}"  class="button delete-cancel w-32 border text-gray-700 mr-1">
                Bekor qilish
            </a>
            <button type="submit" form="science-paper-create-form"
                class="update-confirm button w-24 bg-theme-1 text-white">
                Qo'shish
            </button>
        </div>
    </div>
</div><br>

<script type="text/javascript">
    document.getElementById('ish_tartibi').addEventListener('change', function() {
        var selectedOption = this.value;
        var orindoshlikInput = document.getElementById('orindoshlik-input');
        
        if (selectedOption === 'ha') {
            orindoshlikInput.style.display = 'block'; // Inputni ko'rsatish
        } else {
            orindoshlikInput.style.display = 'none';  // Inputni yashirish
        }
    });
</script>


<script type="text/javascript">
    document.getElementById('ilmiy_unvoni').addEventListener('change', function() {
        var selectedOption = this.value;
        var ilmiyUnvonInput = document.getElementById('ilmiy-unvon-input');
        var validOptions = [
            "Professor", 
            "Dotsent", 
            "Katta ilmiy xodim", 
            "Akademik"
        ];
        
        if (validOptions.includes(selectedOption)) {
            ilmiyUnvonInput.style.display = 'block'; // Inputni ko'rsatish
        } else {
            ilmiyUnvonInput.style.display = 'none';  // Inputni yashirish
        }
    });
</script>

<script>
    // Boshlang'ich va tugash yillari
    var startYear = 2010;
    var endYear = 2024;

    // Barcha class nomi 'science-sub-category' bo'lgan select elementlarini olish
    var selects = document.getElementsByClassName('science-sub-categoryyil');

    // Har bir select elementi uchun sikl
    for (var i = 0; i < selects.length; i++) {
        var select = selects[i];

        // Har bir select elementi uchun yillarni qo'shish
        for (var year = endYear; year >= startYear; year--) {
            var option = document.createElement('option');
            option.value = year;
            option.text = year;
            option.className = 'year-option'; // Class qo'shish
            select.appendChild(option);
        }
    }
</script>


@endsection