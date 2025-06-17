@extends("layouts.admin")
@section("content")
<div class="flex justify-between align-center mt-6 mb-6">

    <h2 class="intro-y text-lg font-medium">Kafedra mudirini biriktirish</h2>

    @role('admin')
    <a href="/" class="button w-24 bg-theme-1 text-white">
        Orqaga
    </a>
    @endrole
    @role('super-admin')
    <a href="{{ url('users') }}" class="button w-24 bg-theme-1 text-white">
        Orqaga
    </a>
    @endrole
</div>


<div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2" style="background: white;
    padding: 20px 20px;
    border-radius: 4px">
    @if ($errors->any())
        <ul class="alert alert-warning">
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif
    <div class="w-full mt-3 sm:mt-0 sm:ml-auto md:ml-0">
        <form id="science-paper-create-form" method="POST" action="{{ route('kafedrarol.store') }}" class="validate-form"
            enctype="multipart/form-data" novalidate="novalidate">
            @csrf
            <div class="grid grid-cols-12 gap-2">




                <div class="w-full col-span-6">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> F.I.Sh
                    </label>
                    <input type="text" name="name" class="input w-full border mt-2" required="">
                </div>

                <div class="w-full col-span-6">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Login (foydalanuvchi email adresini
                        kiriting)
                    </label>
                    <input type="email" name="email" class="input w-full border mt-2" required="">
                </div>

                <div class="w-full col-span-6">
                    <label class="flex flex-col sm:flex-row"> <span
                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Parolni kiriting
                    </label>
                    <input type="password" name="password" class="input w-full border mt-2" required="">
                </div>
                @error('password')
                    <div class="error">{{ $message }}</div>
                @enderror


                <div class="w-full col-span-6 mt-4">
                    <label class="flex flex-col sm:flex-row">
                        <span class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Parolni tasdiqlang
                    </label>
                    <input type="password" name="password_confirmation" class="input w-full border mt-2" required="">
                </div>
                @error('password_confirmation')
                    <div class="error">{{ $message }}</div>
                @enderror

                <input type="hidden" name="tashkilot_id" value="{{ auth()->user()->tashkilot->id }}">
                <input type="hidden" name="roles" value="Asbob_uskunalarga_masul">

            </div>
        </form>
        <div class="px-5 pb-5 text-center mt-4">
            <a href="#" class="button delete-cancel w-32 border text-gray-700 mr-1">
                Bekor qilish
            </a>
            <button type="submit" form="science-paper-create-form"
                class="update-confirm button w-24 bg-theme-1 text-white">
                Saqlash
            </button>
        </div>
    </div>
</div>
@endsection
