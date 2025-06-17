@extends('layouts.admin')

@section('content')
    <div class="content">
        <div class="flex justify-between align-center mt-6 mb-6">

            <h2 class="intro-y text-lg font-medium">Ilmiy izlanuvchilar </h2>

            <!-- <a href="{{ route('xodimlar.create') }}" class="button w-24 bg-theme-1 text-white">
                    Qo'shish
                </a> -->
            <div class="intro-x relative mr-3 sm:mr-6">
                <div class="search hidden sm:block">
                    <form action="{{ route('searchizlanuvchilar_admin') }}" method="GET">
                        <input type="text" name="search" class="search__input input placeholder-theme-13"
                            placeholder="Jshshir bilan qidirish...">
                        <i data-feather="search" class="search__icon"></i>
                    </form>
                </div>
                <a class="notification sm:hidden" href=""> <i data-feather="search" class="notification__icon"></i>
                </a>
            </div>
            <div>
                <div>
                    {{-- <a href="{{ route('izlanuvchilar.create') }}" class="button w-24 bg-theme-1 text-white">
                        Qo'shish
                    </a> --}}

                    {{-- <a href="{{ url('tashkilot/'.auth()->user()->tashkilot_id.'/export') }}" class="button ml-3 w-24 bg-theme-1 text-white">
                   Barcha xodimlarni Excel yuklab olish
                </a> --}}

                    {{-- <a href="javascript:;" data-target="#science-paper-create-modal" data-toggle="modal"
                        class="button w-24 ml-3 bg-theme-1 text-white">
                        Ilmiy izlanuvchi biriktirish
                    </a> --}}
                    <a href="{{ route('ilmiy_izlanuvchi.index') }}" class="button w-24 ml-3 bg-theme-1 text-white">
                        Orqaga
                    </a>
                </div>
            </div>

        </div>
        @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif

        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <table class="table table-report -mt-2">
                <thead>
                    <tr>
                        <th class="whitespace-no-wrap">№</th>
                        <th class="whitespace-no-wrap">F.I.Sh</th>
                        <th class="whitespace-no-wrap">Ta'lim turi</th>
                        <th class="whitespace-no-wrap">Qabul qilingan yili</th>
                        <th class="whitespace-no-wrap">Jshshir</th>
                        <th class="whitespace-no-wrap">Status</th>
                        <th class="whitespace-no-wrap text-center">Harakat</th>
                    </tr>
                </thead>
                <tbody>

                    @forelse ($izlanuvchilar as $xodimlar)
                        <tr class="intro-x">
                            <td>{{ $loop->index + 1 }}</td>
                            <td>
                                <a href="{{ route('izlanuvchilar.show', ['izlanuvchilar' => $xodimlar->id]) }}"
                                    class="font-medium">{{ $xodimlar->fish }}</a>
                            </td>
                            <td>
                                <a href="" class="font-medium ">{{ $xodimlar->talim_turi }}</a>
                            </td>
                            <td>
                                <a href="" class="font-medium ">{{ $xodimlar->qabul_qilgan_yil }}</a>
                            </td>

                            <td>
                                <a href="" class="font-medium ">{{ $xodimlar->jshshir }} </a>
                            </td>
                            <td>
                                <td>
                                    @if ($xodimlar->status == null || $xodimlar->is_active == 0)
                                    <form id="science-paper-edit-form{{ $xodimlar->id }}"
                                        action="{{ url('labbiriktirish/' . $xodimlar->id . '/edit') }}"
                                        method="POST" class="validate-form" enctype="multipart/form-data"
                                        novalidate="novalidate">
                                        @csrf
                                        <div class="flex flex-col box sm:flex-row mt-2">
                                            <div class="flex items-center text-gray-700 mr-2">
                                                <input type="radio" class="input border mr-2"
                                                    id="horizontal-radio-chris-evans{{ $xodimlar->id }}"
                                                    name="status" value="Jarayonda" required>
                                                <label class="cursor-pointer select-none"
                                                    for="horizontal-radio-chris-evans{{ $xodimlar->id }}">Jarayonda</label>
                                            </div>
                                            <div class="flex items-center text-gray-700 mr-2 mt-2 sm:mt-0">
                                                <input type="radio" class="input border mr-2"
                                                    id="horizontal-radio-liam-neeson{{ $xodimlar->id }}"
                                                    name="status" value="Tugatilgan" required>
                                                <label class="cursor-pointer select-none"
                                                    for="horizontal-radio-liam-neeson{{ $xodimlar->id }}">Tugatilgan</label>
                                            </div>
                                            @error('status')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </form>
                                    @else
                                        <a href="" class="font-medium ">{{ $xodimlar->status }} </a>
                                    @endif
                                </td>
                            </td>
                            <td class="table-report__action w-56">
                                @if ($xodimlar->is_active == 0)

                                <div class="flex justify-center items-center">
                                    <button type="submit" form="science-paper-edit-form{{$xodimlar->id}}"
                                        class="update-confirm button w-24 bg-theme-1 text-white">
                                        Biriktirish
                                    </button>
                                </div>
                                @else
                                  Bu biriktirilgan
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" style="text-align: center;">Ma'lumot topilmadi</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="intro-y flex flex-wrap sm:flex-row sm:flex-no-wrap items-center mt-3">
            {{ $izlanuvchilar->links() }}
        </div>

    </div>
    </div>

@endsection
