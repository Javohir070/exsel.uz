<div class="tab-content__pane {{ $scienceFlowActive ? 'active' : '' }}" id="add-ijrochilari">

    <div class="px-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center"
            style="background: white; border-radius: 20px">
            @if (is_null($tekshirivchilar))
                <div class="w-full sm:mt-0 sm:ml-auto md:ml-0">
                    <form id="science-qidirish-edit-form" method="GET"
                        action="{{ route('ilmiyloyiha.show', $ilmiyloyiha->id) }}" class="validate-form"
                        enctype="multipart/form-data" novalidate="novalidate">
                        <div class="grid grid-cols-12 gap-2">
                            <div class="w-full col-span-6">
                                <label class="flex flex-col sm:flex-row"> <span
                                        class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Science ID
                                    (BQD-1124-0011)
                                </label>
                                <input type="text" name="scienceid" value="{{ $scienceid }}"
                                    placeholder="Science ID ..." class="input w-full border mt-2">
                                <a href="https://id.ilmiy.uz/" target="_blank" rel="noopener noreferrer">id.ilmiy.uz</a>
                            </div>

                            <div class="grid grid-cols-6 gap-2 mt-4">
                                <div class="px-5 pb-5 text-center mt-4">
                                    <button type="submit" form="science-qidirish-edit-form"
                                        class="update-confirm button w-24 bg-theme-1 text-white">
                                        Qidirish
                                    </button>
                                </div>
                            </div>
                            <div class="w-full col-span-12">
                                @if ($errorMessage)
                                    <div class="alert alert-danger">
                                        {{ $errorMessage }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            @endif

        </div>
        @if ($data != null)
            <div class="overflow-x-auto" style="background-color: white;border-radius:8px;padding:30px 0px;">
                <form id="loyihaijrochilar-paper-create-form" method="POST"
                    action="{{ route('loyihaijrochilar.store') }}" class="validate-form" enctype="multipart/form-data"
                    novalidate="novalidate">
                    @csrf
                    <table class="table">

                        <thead>
                            <tr class="bg-gray-200">
                                <th class="border border-b-2 " style="width: 40px;">№</th>
                                <th class="border border-b-2 " style="width: 50%;">Nomi</th>
                                <th class="border border-b-2 ">Ma'lumoti</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="border border-b-2 ">1.</td>
                                <td class="border border-b-2 ">
                                    F.I.Sh.
                                </td>
                                <td class="border border-b-2 ">
                                    <input type="text" name="fio"
                                        value="{{ $data['full_name'] ?? "Ma'lumot topilmadi — Science ID ni qaytadan kiriting" }}"
                                        readonly class="input w-full border mt-2">
                                    <input type="hidden" name="ilmiy_loyiha_id" readonly
                                        value="{{ $ilmiyloyiha->id }}">
                                    <input type="hidden" name="jshshir" readonly
                                        value="{{ $data['pin'] ?? "Ma'lumot topilmadi — Science ID ni qaytadan kiriting" }}">
                                </td>
                            </tr>
                            <tr class="bg-gray-200">
                                <td class="border border-b-2 ">2.</td>
                                <td class="border border-b-2 ">
                                    Science ID.
                                </td>
                                <td class="border border-b-2 ">
                                    <input type="text" name="science_id"
                                        value="{{ $data['science_id'] ?? "Ma'lumot topilmadi — Science ID ni qaytadan kiriting" }}"
                                        readonly class="input w-full border mt-2">
                                    @error('science_id')
                                        <div class="error">{{ $message }}</div>
                                    @enderror
                                </td>
                            </tr>

                            <tr>
                                <td class="border border-b-2 ">3.</td>
                                <td class="border border-b-2 ">
                                    Shtat birligi.
                                </td>
                                <td class="border border-b-2 ">
                                    <select name="shtat_birligi" id="shtat_birligi" value="{{ old('shtat_birligi') }}"
                                        class="input border w-full mt-2" required>

                                        <option value=""></option>

                                        <option value="0.25">0.25</option>

                                        <option value="0.5">0.5</option>

                                        <option value="0.75">0.75</option>

                                        <option value="1">1</option>

                                        <option value="1.25">1.25</option>

                                        <option value="1.5">1.5</option>

                                        <option value="boshqa">Boshqa</option>

                                    </select>
                                    <div id="boshqa_input_div" style="display: none;" class="mt-2">
                                        <input type="text" name="boshqa_shtat_birligi" id="boshqa_shtat_birligi"
                                            class="input border w-full" placeholder="Shtat birligini kiriting"
                                            inputmode="decimal" pattern="^\d+(\.\d{1,2})?$"
                                            oninput="validateInput(this)">
                                        @error('boshqa_shtat_birligi')
                                            <div class="error">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </td>
                            </tr>

                        </tbody>
                    </table>
                </form>
                <div class="px-5 pb-5 text-center mt-4">
                    <a href="{{ route('ilmiyloyiha.show', $ilmiyloyiha->id) }}"
                        class="button delete-cancel w-32 border text-gray-700 mr-1">
                        Bekor qilish
                    </a>
                    <button type="submit" form="loyihaijrochilar-paper-create-form"
                        class="update-confirm button w-24 bg-theme-1 text-white">
                        Tasdiqlash
                    </button>
                </div>
            </div>
        @endif

        <div class="overflow-x-auto" style="background-color: white;border-radius:8px;padding:30px 0px;">
            <table class="table">

                <thead>
                    <tr class="bg-gray-200">
                        <th class="border border-b-2 " style="width: 40px;">№</th>
                        <th class="border border-b-2 " style="width: 50%;">F.I.Sh</th>
                        <th class="border border-b-2 ">Science ID</th>
                        <th class="border border-b-2 ">Shtat birligi</th>
                        <th class="border border-b-2 "></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($loyihaijrochilar as $l)
                        <tr>
                            <td class="border border-b-2 ">{{ $loop->iteration }}.</td>
                            <td class="border border-b-2 ">
                                {{ $l->fio }}
                            </td>
                            <td class="border border-b-2 ">
                                {{ $l->science_id }}

                            </td>
                            <td class="border border-b-2 ">
                                {{ $l->shtat_birligi }}
                            </td>
                            <td class="border border-b-2 ">
                                <form action="{{ route('loyihaijrochilar.destroy', ['loyihaijrochilar' => $l->id]) }}"
                                    method="post" onsubmit="return confirm(' Rostan Ochirishni hohlaysizmi?');">
                                    <button type="submit" class="flex delete-action items-center text-theme-6">
                                        @csrf
                                        @method('DELETE')
                                        <i data-feather="trash-2"  class="feather feather-check-square w-4 h-4 mr-1"></i>
                                        O'chirish
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr class="border">
                            <td colspan="4" style="text-align: center;">Ma'lumot yo'q</td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
        </div>

    </div>

</div>
