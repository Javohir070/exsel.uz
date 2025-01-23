@extends('layouts.admin')

@section('content')


<div class="flex justify-between align-center mt-10">

    <h2 class="intro-y text-lg font-medium">Intellektual mulk</h2>



</div><br>
<div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2" style="background: white;
    padding: 20px 20px;
    border-radius: 20px">
    <div class="w-full mt-3 sm:mt-0 sm:ml-auto md:ml-0">
        <form id="science-paper-create-form" method="POST" action="{{ route("intellektualmulk.store") }}"
            class="validate-form" enctype="multipart/form-data" novalidate="novalidate">
            @csrf
            <div class="grid grid-cols-12 gap-2">

                <div class="w-full col-span-6">
                    <label class="flex flex-col sm:flex-row">  Turini talash
                    </label>
                    <select name="type"  id="science-sub-category" class="input border w-full mt-2" required="">

                        <option value=""></option>

                        <option value="Respublika miqyosidagi patenti">Respublika miqyosidagi patenti</option>

                        <option value="Xalqaro miqyosidagi patentlar">Xalqaro miqyosidagi patentlar</option>

                        <option value="Foydali model">Foydali model</option>

                        <option value="Sanoat namunalari">Sanoat namunalari</option>

                        <option value="Seleksiya yutuqlari (o‘simlik navlari)">Seleksiya yutuqlari (o‘simlik navlari)</option>

                        <option value="Seleksiya yutuqlari (xayvon zotlari)">Seleksiya yutuqlari (xayvon zotlari)</option>

                        <option value="Tovar belgisi">Tovar belgisi</option>

                        <option value="Ma’mumotlar bazasi">Ma’mumotlar bazasi</option>

                        <option value="EHM uchun yaratilgan dastur">EHM uchun yaratilgan dastur</option>

                        <option value="Integral mikrosxemalar">Integral mikrosxemalar</option>

                    </select><br>
                    @error('type')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="w-full col-span-6">
                    <label class="flex flex-col sm:flex-row">
                        <span class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Mavzu
                    </label>
                    <input type="text" name="mavzu" value="{{ old('mavzu') }}" class="input w-full border mt-2" required>
                    @error('mavzu')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="w-full col-span-6">
                    <label class="flex flex-col sm:flex-row">
                        <span class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Chop qilingan yili
                    </label>
                    <input type="date" name="nashr_sana" value="{{ old('nashr_sana') }}"
                        class="input w-full border mt-2" required>
                    @error('nashr_sana')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="w-full col-span-6">
                    <label class="flex flex-col sm:flex-row">
                        <span class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Seriyasi/ soni
                    </label>
                    <input type="text" name="soni" value="{{ old('soni') }}"
                        class="input w-full border mt-2" required>
                    @error('soni')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="w-full col-span-6">
                    <label class="flex flex-col sm:flex-row">
                        <span class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Annotatsiya
                    </label>
                    <input type="text" name="annotatsiya" value="{{ old('annotatsiya') }}" class="input w-full border mt-2" required>
                    @error('annotatsiya')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="w-full col-span-6">
                    <label class="flex flex-col sm:flex-row">
                        <span class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Fan yo'nalishi
                    </label>
                    <input type="text" name="fan_yunalishi" value="{{ old('fan_yunalishi') }}"
                        class="input w-full border mt-2" required>
                    @error('fan_yunalishi')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>


                <div class="w-full col-span-6">
                    <label class="flex flex-col sm:flex-row">
                        <span class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Mualliflar
                    </label>
                    <div id="mualliflar-container">
                        <div class="muallif-input">
                            <input type="text" name="mualliflar_json[]" class="input w-full border mt-2"
                                placeholder="Muallifning F.I.Sh" required>
                        </div>
                    </div>
                    <button type="button" id="add-author" class="btn btn-primary mt-2">Muallif qo'shish</button>
                    @error('mualliflar_json')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>



            </div><br>
        </form><br>
        <div class="px-5 pb-5 text-center">
            <a href="{{ route('intellektualmulk.index') }}" class="button delete-cancel w-32 border text-gray-700 mr-1">
                Bekor qilish
            </a>
            <button type="submit" form="science-paper-create-form"
                class="update-confirm button w-24 bg-theme-1 text-white">
                Saqlash
            </button>
        </div>
    </div>
</div>

<script>
    document.getElementById('add-author').addEventListener('click', function () {
        // Mualliflar konteynerini olish
        var container = document.getElementById('mualliflar-container');

        // Yangi input yaratish
        var newAuthorInput = document.createElement('div');
        newAuthorInput.classList.add('muallif-input');

        // Yangi inputni yaratish
        newAuthorInput.innerHTML = `
        <input type="text" name="mualliflar_json[]" class="input w-full border mt-2" placeholder="Muallifning F.I.Sh" required>
    `;

        // Yangi inputni konteynerga qo'shish
        container.appendChild(newAuthorInput);
    });

</script>

@endsection


