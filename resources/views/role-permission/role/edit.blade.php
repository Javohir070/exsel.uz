@extends("layouts.admin")
@section("content")
    <div class="flex justify-between align-center mt-6 mb-6">

        <h2 class="intro-y text-lg font-medium">Role tahrirlash </h2>

        <a href="{{ url('roles') }}" class="button w-24 bg-theme-1 text-white">
            Orqaga
        </a>
    </div>
    <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2 monitoring-form">
        <div class="w-full mt-3 sm:mt-0 sm:ml-auto md:ml-0">
            <form id="science-paper-create-form" method="POST" action="{{ url('roles/' . $role->id) }}"
                class="validate-form" enctype="multipart/form-data" novalidate="novalidate">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-12 gap-2">
                    <div class="w-full col-span-12">
                        <label class="flex flex-col sm:flex-row"> <span
                                class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Name
                        </label>
                        <input type="text" name="name" class="input w-full border mt-2" required=""
                            value="{{ $role->name }}">
                        @error('name')
                            <div class="error">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </form>
            <div class="px-5 pb-5 text-center mt-4">
                <a href="{{ url('roles') }}" class="button delete-cancel w-32 border text-gray-700 mr-1">
                    Bekor qilish
                </a>
                <button type="submit" form="science-paper-create-form"
                    class="update-confirm button w-24 bg-theme-1 text-white">
                    Tahrirlash
                </button>
            </div>
        </div>
    </div>
@endsection