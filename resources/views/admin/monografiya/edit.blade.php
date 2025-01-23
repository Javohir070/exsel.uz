@extends('layouts.admin')

@section('content')

<div class="flex justify-between align-center mt-10">
    <h2 class="intro-y text-lg font-medium">Monografiya</h2>
</div><br>

<div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2" style="background: white; padding: 20px 20px; border-radius: 20px">
    <div class="w-full mt-3 sm:mt-0 sm:ml-auto md:ml-0">
        <form id="science-paper-edit-form" method="POST" action="{{ route("monografiyalar.update", $monografiyalar->id) }}"
            class="validate-form" enctype="multipart/form-data" novalidate="novalidate">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-12 gap-2">
                <!-- Mavzu input -->
                <div class="w-full col-span-6">
                    <label class="flex flex-col sm:flex-row">
                        <span class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Mavzu
                    </label>
                    <input type="text" name="name" value="{{ old('name', $monografiyalar->name) }}" class="input w-full border mt-2" required>
                    @error('name')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Nashr yili input -->
                <div class="w-full col-span-6">
                    <label class="flex flex-col sm:flex-row">
                        <span class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Nashr yili
                    </label>
                    <input type="number" name="nashr_yili" value="{{ old('nashr_yili', $monografiyalar->nashr_yili) }}"
                        class="input w-full border mt-2" required>
                    @error('nashr_yili')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Chop etilgan nashriyot input -->
                <div class="w-full col-span-6">
                    <label class="flex flex-col sm:flex-row">
                        <span class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Chop etilgan nashriyot
                    </label>
                    <input type="text" name="chop_etil_nashriyot" value="{{ old('chop_etil_nashriyot', $monografiyalar->chop_etil_nashriyot) }}"
                        class="input w-full border mt-2" required>
                    @error('chop_etil_nashriyot')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Til input -->
                <div class="w-full col-span-6">
                    <label class="flex flex-col sm:flex-row">
                        <span class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Til
                    </label>
                    <input type="text" name="til" value="{{ old('til', $monografiyalar->til) }}" class="input w-full border mt-2" required>
                    @error('til')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Fan yo'nalishi input -->
                <div class="w-full col-span-6">
                    <label class="flex flex-col sm:flex-row">
                        <span class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Fan yo'nalishi
                    </label>
                    <input type="text" name="fan_yunalishi" value="{{ old('fan_yunalishi', $monografiyalar->fan_yunalishi) }}"
                        class="input w-full border mt-2" required>
                    @error('fan_yunalishi')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Asoslovchi hujjat input -->
                <div class="w-full col-span-6">
                    <label class="flex flex-col sm:flex-row">
                        <span class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Asoslovchi hujjat
                    </label>
                    <input type="file" name="asoslovchi_hujjat" class="input w-full border mt-2">
                    @error('asoslovchi_hujjat')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>



                <!-- Ixtiyoriy inputlar -->
                <div class="w-full col-span-6">
                    <label class="flex flex-col sm:flex-row">
                        <span class="mt-1 mr-1 sm:mt-0 text-xs text-red-600"></span> KBK (ixtiyoriy)
                    </label>
                    <input type="text" name="kbk" value="{{ old('kbk', $monografiyalar->kbk) }}" class="input w-full border mt-2">
                    @error('kbk')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="w-full col-span-6">
                    <label class="flex flex-col sm:flex-row">
                        <span class="mt-1 mr-1 sm:mt-0 text-xs text-red-600"></span> ISBN (ixtiyoriy)
                    </label>
                    <input type="text" name="isbn" value="{{ old('isbn', $monografiyalar->isbn) }}" class="input w-full border mt-2">
                    @error('isbn')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Mualliflar  input -->
                <div class="w-full col-span-6">
                    <label class="flex flex-col sm:flex-row">
                        <span class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Mualliflar
                    </label>
                    <div id="mualliflar-container">
                        @foreach(json_decode($monografiyalar->mualliflar_json) as $muallif)
                            <div class="muallif-input">
                                <input type="text" name="mualliflar_json[]" class="input w-full border mt-2"
                                       value="{{ old('mualliflar_json[]', $muallif) }}" placeholder="Muallifning F.I.Sh" required>
                            </div>
                        @endforeach
                    </div>
                    <button type="button" id="add-author" class="btn btn-primary mt-2">Muallif qo'shish</button>
                    @error('mualliflar_json')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

            </div><br>
        </form><br>
        <div class="px-5 pb-5 text-center">
            <a href="{{ route('monografiyalar.index') }}" class="button delete-cancel w-32 border text-gray-700 mr-1">
                Bekor qilish
            </a>
            <button type="submit" form="science-paper-edit-form" class="update-confirm button w-24 bg-theme-1 text-white">
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
