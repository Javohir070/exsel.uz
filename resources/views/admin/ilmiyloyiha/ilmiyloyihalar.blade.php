@extends('layouts.admin')

@section('content')

    <div class="content">
        <div class="flex justify-between align-center mt-6 mb-6">

            <h2 class="intro-y text-lg font-medium"> {{ $tashkilot->name ?? "Ilmiy loyihalar" }}</h2>

            <div class="intro-x relative mr-3 sm:mr-6">
                <div class="search hidden sm:block">
                    <form action="{{ route('searchloyiha') }}" method="GET">
                        <input type="text" name="query" class="search__input input placeholder-theme-13"
                            placeholder="Search...">
                        <i data-feather="search" class="search__icon"></i>
                    </form>
                </div>
                <a class="notification sm:hidden" href=""> <i data-feather="search" class="notification__icon"></i> </a>
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
                        <th class="whitespace-no-wrap">Loyiha mavzusi</th>
                        {{-- <th class="whitespace-no-wrap">Loyiha turi</th> --}}
                        <th class="whitespace-no-wrap">Loyiha rahbari F.I.Sh</th>
                        <th class="whitespace-no-wrap">Raqami</th>
                        <th class="whitespace-no-wrap">Status</th>
                        <th class="whitespace-no-wrap">Holati</th>
                        {{-- <th class="whitespace-no-wrap" style="width: 150px;">
                            <form method="GET" action="{{ route('searchloyiha') }}">
                                <select class="form-select" aria-label="Default select example" name="query"
                                    onchange="this.form.submit()">
                                    <option value="">Status</option>
                                    <option value="Jarayonda">Jarayonda</option>
                                    <option value="Yakunlangan">Yakunlangan</option>
                                </select>
                            </form>
                        </th> --}}
                        <th class="whitespace-no-wrap text-center">Harakat</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($ilmiyloyihalar as $xodimlar)

                        <tr class="intro-x">
                            <td>{{ ($ilmiyloyihalar->currentPage() - 1) * $ilmiyloyihalar->perPage() + $loop->iteration }}</td>
                            <td>
                                {{ $xodimlar->mavzusi  }}
                            </td>
                            {{-- <td>
                                {{ $xodimlar->turi }}
                            </td> --}}
                            <td>
                                {{ $xodimlar->rahbar_name }}
                            </td>
                            <td>
                                {{ $xodimlar->raqami }}
                            </td>
                            {{-- <td style="color:{{ $xodimlar->tekshirivchilars()->where('is_active', 1)->first()->holati ?? null == "Tasdiqlandi" ? "green" : ($xodimlar->tekshirivchilars()->where('is_active', 1)->first()->holati ?? null == "yuborildi" ? "blue" : "red") }}">
                                {{ $xodimlar->tekshirivchilars()->where('is_active', 1)->first()->holati ?? "Ko'rilmagan" }}
                            </td> --}}

                            <td style="color: {{ ($h = $xodimlar->tekshirivchilars()->where('quarter', 2)->first()->status ?? null) == 'Qoniqarli' ? 'green' : ($h == 'Qoniqarsiz' ? 'blue' : 'red') }}">
                                {{ $xodimlar->tekshirivchilars()->where('quarter', 2)->first()->status ?? "Tasdiqlanmagan" }}
                            </td>

                            <td style="color: {{ ($h = $xodimlar->tekshirivchilars()->where('quarter', 2)->first()->holati ?? null) == 'Tasdiqlandi' ? 'green' : ($h == 'yuborildi' ? 'blue' : 'red') }}">
                                {{ $h == 'yuborildi'? "Tasdiqlash uchun yuborildi":($h == null ? "Ko'rilmagan" : $h) }}
                            </td>


                            <td class="table-report__action w-56">
                                <div class="flex justify-center items-center">


                                    <a class="flex science-update-action items-center mr-3"
                                        href="{{ route('ilmiyloyiha.show', ['ilmiyloyiha' => $xodimlar->id]) }}" >
                                        <i data-feather="eye"  class="feather feather-check-square w-4 h-4 mr-1"></i>
                                        Ko'rish
                                    </a>
                                    @role('super-admin')
                                    <form action="{{ route('ilmiyloyiha.destroy', ['ilmiyloyiha' => $xodimlar->id]) }}"
                                        method="post" onsubmit="return confirm(' Rostan Ochirishni hohlaysizmi?');">
                                        <button type="submit" class="flex delete-action items-center text-theme-6">
                                            @csrf
                                            @method("DELETE")
                                            <i data-feather="trash-2"  class="feather feather-check-square w-4 h-4 mr-1"></i>
                                            O'chirish
                                        </button>
                                    </form>
                                    @endrole
                                </div>
                            </td>
                        </tr>
                    @endforeach


                </tbody>
            </table>
        </div>

        <div class="intro-y flex flex-wrap sm:flex-row sm:flex-no-wrap items-center mt-3">
            {{$ilmiyloyihalar->links()}}
        </div>

    </div>

    </div>

    <div class="modal" id="science-paper-create-modal">
        <div class="modal__content modal__content--xl">
            <div class="p-5">

                <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2">
                    <div class="w-full mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                        <form id="science-paper-create-form" method="POST" action="{{ route('IlmiyLoyiha_import') }}"
                            class="validate-form" enctype="multipart/form-data" novalidate="novalidate">
                            @csrf
                            <div class="grid grid-cols-12 gap-2">

                                <div class="w-full col-span-12">

                                    <label class="flex flex-col sm:flex-row"> <span
                                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Excle yuklash uchun shu
                                        shablonday bo'lishi shart yoki xato berdi.
                                    </label><br>
                                    <a href="#" form="science-paper-create-form"
                                        class="input w-full mt-2 button w-24 bg-theme-1 text-white">
                                        Shablon yuklab olish
                                    </a>

                                </div>
                                <div class="w-full col-span-12">


                                    <label class="flex flex-col sm:flex-row"> <span
                                            class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Excel yuklash
                                    </label>
                                    <input type="file" name="file" style="padding-left: 0" class="input w-full mt-2"
                                        required="">

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
                <button type="submit" form="science-paper-create-form"
                    class="update-confirm button w-24 bg-theme-1 text-white">
                    Qo'shish
                </button>
            </div>
        </div>
    </div>
@endsection
