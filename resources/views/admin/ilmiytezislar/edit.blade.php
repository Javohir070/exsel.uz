@extends('layouts.admin')

@section('content')

<div class="flex justify-between align-center mt-10">
    <h2 class="intro-y text-lg font-medium">Ilmiy tezis</h2>
</div><br>

<div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2" style="background: white; padding: 20px 20px; border-radius: 20px">
    <div class="w-full mt-3 sm:mt-0 sm:ml-auto md:ml-0">
        <form id="science-paper-create-form" method="POST" action="{{ route('ilmiymaqolalar.update', $ilmiymaqolalar->id) }}"
            class="validate-form" enctype="multipart/form-data" novalidate="novalidate">
            @csrf
            @method('PUT') <!-- Inform Laravel this is an update request -->

            <div class="grid grid-cols-12 gap-2">

                <div class="w-full col-span-6">
                    <label class="flex flex-col sm:flex-row">  Ilmiy maqola turi
                    </label>
                    <select name="type"  id="science-sub-category" class="input border w-full mt-2" required="">

                        <option value=""></option>

                        <option value="Republika miqyosidagi anjumanlar">Republika miqyosidagi anjumanlar</option>

                        <option value="Xalqaro miqyosidagi anjumanlar">Xalqaro miqyosidagi anjumanlar</option>

                    </select><br>
                    @error('type')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="w-full col-span-6">
                    <label class="flex flex-col sm:flex-row">
                        <span class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Mavzu
                    </label>
                    <input type="text" name="mavzu" value="{{ $ilmiymaqolalar->mavzu }}" class="input w-full border mt-2" required>
                    @error('mavzu')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="w-full col-span-6">
                    <label class="flex flex-col sm:flex-row">
                        <span class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Chop qilingan sana
                    </label>
                    <input type="date" name="chopq_sana" value="{{ $ilmiymaqolalar->chopq_sana }}"
                        class="input w-full border mt-2" required>
                    @error('chopq_sana')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="w-full col-span-6">
                    <label class="flex flex-col sm:flex-row">
                        <span class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Konferensiya to‘liq nomi
                    </label>
                    <input type="text" name="kon_full_nomi" value="{{ $ilmiymaqolalar->kon_full_nomi }}"
                        class="input w-full border mt-2" required>
                    @error('kon_full_nomi')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="w-full col-span-6">
                    <label class="flex flex-col sm:flex-row">
                        <span class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Konferensiya qisqa nomi
                    </label>
                    <input type="text" name="kon_qisqa_nomi" value="{{ $ilmiymaqolalar->kon_qisqa_nomi }}" class="input w-full border mt-2" required>
                    @error('kon_qisqa_nomi')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="w-full col-span-6">
                    <label class="flex flex-col sm:flex-row">
                        <span class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Seriyasi/ soni
                    </label>
                    <input type="text" name="soni" value="{{ $ilmiymaqolalar->soni }}" class="input w-full border mt-2" required>
                    @error('soni')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="w-full col-span-6">
                    <label class="flex flex-col sm:flex-row">
                        <span class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Nashriyot
                    </label>
                    <input type="text" name="nashriyot" value="{{ $ilmiymaqolalar->nashriyot }}" class="input w-full border mt-2" required>
                    @error('nashriyot')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="w-full col-span-6">
                    <label class="flex flex-col sm:flex-row">
                        <span class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Annotatsiya
                    </label>
                    <input type="text" name="annotatsiya" value="{{ $ilmiymaqolalar->annotatsiya }}" class="input w-full border mt-2" required>
                    @error('annotatsiya')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="w-full col-span-6">
                    <label class="flex flex-col sm:flex-row">
                        <span class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Fan yo'nalishi
                    </label>
                    <input type="text" name="fan_yunalishi" value="{{ $ilmiymaqolalar->fan_yunalishi }}"
                        class="input w-full border mt-2" required>
                    @error('fan_yunalishi')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="w-full col-span-6">
                    <label class="flex flex-col sm:flex-row">
                        <span class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Url
                    </label>
                    <input type="url" name="url" value="{{ $ilmiymaqolalar->url }}"
                        class="input w-full border mt-2" >
                    @error('url')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="w-full col-span-6">
                    <label class="flex flex-col sm:flex-row">
                        <span class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> DOI
                    </label>
                    <input type="url" name="doi" value="{{ $ilmiymaqolalar->doi }}"
                        class="input w-full border mt-2" >
                    @error('doi')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>


                <!-- Mualliflar (Authors) -->
                <div class="w-full col-span-6">
                    <label class="flex flex-col sm:flex-row">
                        <span class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Mualliflar
                    </label>
                    <div id="mualliflar-container">
                        @foreach(json_decode($ilmiymaqolalar->mualliflar_json) as $muallif)
                            <div class="muallif-input">
                                <input type="text" name="mualliflar_json[]" value="{{ old('mualliflar_json[]', $muallif) }}" class="input w-full border mt-2"
                                    placeholder="Muallifning F.I.Sh" required>
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
            <a href="{{ route('ilmiymaqolalar.index') }}" class="button delete-cancel w-32 border text-gray-700 mr-1">
                Bekor qilish
            </a>
            <button type="submit" form="science-paper-create-form" class="update-confirm button w-24 bg-theme-1 text-white">
                Yangilash
            </button>
        </div>
    </div>
</div>

<script>
    document.getElementById('add-author').addEventListener('click', function () {
        var container = document.getElementById('mualliflar-container');
        var newAuthorInput = document.createElement('div');
        newAuthorInput.classList.add('muallif-input');
        newAuthorInput.innerHTML = `
            <input type="text" name="mualliflar_json[]" class="input w-full border mt-2" placeholder="Muallifning F.I.Sh" required>
        `;
        container.appendChild(newAuthorInput);
    });
</script>

@endsection
