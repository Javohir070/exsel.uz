@extends('layouts.admin')

@section('content')

    <div class="content">
        <div class="flex justify-between align-center mt-6 mb-6">

            <h2 class="intro-y text-lg font-medium">Fakultetlar</h2>

            <div>
                <a href="javascript:;" data-target="#fakultet-paper-create-modal" data-toggle="modal"
                    class="button w-24 ml-3 bg-theme-1 text-white">
                    Qo'shish
                </a>
            </div>

        </div>

        @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif

        @error('name')
            <div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-31 text-theme-6">
                <i data-feather="alert-octagon" class="w-6 h-6 mr-2"></i>{{ $message }}
            </div>
        @enderror

        @error('tash_yil')
            <div class="rounded-md flex items-center px-5 py-4 mb-2 bg-theme-31 text-theme-6">
                <i data-feather="alert-octagon" class="w-6 h-6 mr-2"></i>{{ $message }}
            </div>
        @enderror

        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <table class="table table-report -mt-2">
                <thead>
                    <tr>
                        <th class="whitespace-no-wrap">№</th>
                        <th class="whitespace-no-wrap">Fakultet nomi </th>
                        <th class="whitespace-no-wrap">Tashkil etilgan yili</th>
                        <th class="whitespace-no-wrap text-center">Harakat</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($laboratorys as $xodimlar)
                        <tr class="intro-x">
                            <td>{{$loop->index + 1}}</td>
                            <td>
                                {{ $xodimlar->name }}
                            </td>
                            <td>
                                {{ $xodimlar->tash_yil }}
                            </td>
                            <td class="table-report__action w-56">
                                <div class="flex justify-center items-center">
                                    <a class="flex science-update-action items-center mr-3"
                                        href="{{ route('fakultetlar.edit', ['fakultetlar' => $xodimlar->id]) }}">
                                        <i data-feather="edit" class="feather feather-check-square w-4 h-4 mr-1"></i>
                                        Tahrirlash
                                    </a>

                                    <form action="{{ route('fakultetlar.destroy', ['fakultetlar' => $xodimlar->id]) }}"
                                        method="post" onsubmit="return confirm(' Rostan Ochirishni hohlaysizmi?');">
                                        <button type="submit" class="flex delete-action items-center text-theme-6">
                                            @csrf
                                            @method("DELETE")
                                            <i data-feather="trash-2" class="feather feather-check-square w-4 h-4 mr-1"></i>
                                            O'chirish
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">Ma'lumotlar mavjud emas</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>

    <div class="modal" id="fakultet-paper-create-modal">
        <div class="modal__content modal__content--xl">
            <div class="p-5">
                <div style="display: flex; justify-content: space-between;margin-bottom: 10px; align-items: center;">
                    <div>
                        <h2 class="text-lg font-medium">Fakultet qo'shish</h2>
                    </div>
                    <div>
                        <a data-dismiss="modal" href="javascript:;" style="display: flex; justify-content: end;"> <i
                                data-feather="x" class="w-8 h-8 text-gray-500"></i> </a>
                    </div>
                </div>

                <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2">
                    <div class="w-full mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                        <form id="fakultet-paper-create-form" method="POST" action="{{ route("fakultetlar.store") }}"
                            class="validate-form" enctype="multipart/form-data" novalidate="novalidate">
                            @csrf
                            <div class="grid grid-cols-12 gap-2">
                                <div class="w-full col-span-12">
                                    <label class="flex flex-col sm:flex-row"> <span
                                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Fakultet nomi
                                    </label>
                                    <input type="text" name="name" value="{{ old('name') }}"
                                        class="input w-full border mt-2" required="">
                                        @error('name')
                                            <div class="error">{{ $message }}</div>
                                        @enderror
                                </div>

                                <div class="w-full col-span-12">
                                    <label class="flex flex-col sm:flex-row"> <span
                                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span>Tashkil etilgan yil
                                    </label>
                                    <select name="tash_yil" value="{{ old('tash_yil') }}"
                                        class="science-sub-categoryyil input border w-full mt-2 " required="">
                                        <option value=""></option>
                                        @error('tash_yil')
                                            <div class="error">{{ $message }}</div>
                                        @enderror
                                    </select>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>

            </div>
            <div class="px-5 pb-5 text-center mt-4">
                <button type="button" data-dismiss="modal" class="button delete-cancel w-32 border text-gray-700 mr-1">
                    Bekor qilish
                </button>
                <button type="submit" form="fakultet-paper-create-form"
                    class="update-confirm button w-24 bg-theme-1 text-white">
                    Qo'shish
                </button>
            </div>
        </div>
    </div>

@endsection