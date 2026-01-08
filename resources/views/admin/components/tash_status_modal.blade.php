<div class="modal" id="tashkilot-status-edit-modal">
    <div class="modal__content modal__content--xl">

        <div class="p-5">
            <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2">
                <div class="w-full mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                    <form id="tashkilot-status-edit-form-edit" method="POST"
                        action="{{ $action }}" class="validate-form"
                        enctype="multipart/form-data" novalidate="novalidate">
                        @csrf
                        @method('PUT')
                        <div class="mb-2">
                            <label>Tashkilot</label>
                            <div class="mt-2">
                                <select class="select2 w-full" name="tashkilot_id">
                                    @foreach ($tashkilotlar as $tashkilot)
                                        <option value="{{ $tashkilot->id }}" {{ $model->tashkilot_id == $tashkilot->id ? 'selected' : '' }}>{{ $tashkilot->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <label>Status</label>
                        <input type="text" name="is_active" value="{{ $model->is_active ?? '' }}"
                            class="input w-full border mt-2" required="">
                    </form>
                </div>
            </div>
        </div>

        <div class="px-5 pb-5 text-center mt-4">
            <button type="button" data-dismiss="modal" class="button delete-cancel w-32 border text-gray-700 mr-1">
                Bekor qilish
            </button>
            <button type="submit" form="tashkilot-status-edit-form-edit"
                class="update-confirm button w-24 bg-theme-1 text-white">
                Qo'shish
            </button>
        </div>

    </div>
</div>