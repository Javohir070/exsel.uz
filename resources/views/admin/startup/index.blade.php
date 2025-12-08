@extends('layouts.admin')

@section('content')
    <div class="content">
        <div class="flex justify-between align-center mt-6 mb-6" style="align-items: center;">

            <h2 class="intro-y text-lg font-medium"> Startuplar</h2>
            <div class="relative text-gray-700">
                <select name="viloyat" value="{{ old('viloyat') }}"
                    class="science-sub-categoryviloyat input border w-full mt-2 ">
                    <option value="">Viloyatni tanlang</option>
                    <option value="all">Barchasi</option>
                    @foreach ($regions as $region)
                        <option value="{{ $region->id }}">{{ $region->oz }}</option>
                    @endforeach
                </select>
            </div>

            @can('super-admin')
                <div>
                    <a href="javascript:;" data-target="#science-paper-create-modal" data-toggle="modal"
                        class="button w-24 ml-3 bg-theme-1 text-white">
                        Import
                    </a>
                </div>
            @endcan

        </div>
        <div class="grid grid-cols-12 gap-6 ">
            <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
                <table class="table table-report mt-2">
                    <thead>
                        <tr>
                            <th class="whitespace-no-wrap" style="width: 40px;">№</th>
                            <th class="whitespace-no-wrap" style="width: 500px;">Loyiha nomi</th>
                            <th class="whitespace-no-wrap" style="text-align: center;">Loyiha rahbari</th>
                            <th class="whitespace-no-wrap" style="text-align: center;">Ijrochi tashkilot</th>
                            <th class="whitespace-no-wrap" style="text-align: center;width:150px !important;">Viloyat</th>
                            <th class="whitespace-no-wrap" style="">Status</th>
                            <th class="whitespace-no-wrap" style="text-align: center;">Holati</th>
                            <th class="whitespace-no-wrap text-center">Harakat</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($startup as $tashkilots)
                            <tr class="intro-x">
                                <td>{{ ($startup->currentPage() - 1) * $startup->perPage() + $loop->iteration }}.</td>
                                <td>
                                    <a href="{{ route('stajirov.index', ['id' => $tashkilots->id]) }}"
                                        class="font-medium">{{ $tashkilots->name }}</a>
                                </td>
                                <td>
                                    {{ $tashkilots->loyiha_rahbari }}
                                </td>
                                <td>
                                    {{ $tashkilots->ijrochi_tashkilot }}
                                </td>
                                <td style="text-align: center;width:150px !important;">
                                    {{ $tashkilots->region->oz ?? '' }}
                                </td>

                                <td
                                    style="color: {{ ($h = $tashkilots->startupexpert()->first()->status ?? null) == 'Ijobiy' ? 'green' : ($h == 'Salbiy' ? 'blue' : 'red') }}">
                                    {{ $tashkilots->startupexpert()->first()->status ?? 'Tasdiqlanmagan' }}
                                </td>
                                <td
                                    style="color: {{ ($h = $tashkilots->startupexpert()->first()->holati ?? null) == 'Tasdiqlandi' ? 'green' : ($h == 'yuborildi' ? 'blue' : 'red') }}">
                                    {{ $h == 'yuborildi' ? 'Tasdiqlash uchun yuborildi' : ($h == null ? "Ko'rilmagan" : $h) }}
                                </td>

                                <td class="table-report__action w-56">
                                    <div class="flex justify-center items-center">

                                        <a class="flex science-update-action items-center mr-3"
                                            href="{{ route('startup.show', ['startup' => $tashkilots->id]) }}"
                                            data-id="2978" data-name="sdfd"
                                            data-file="/files/papers/4735cda0-a7a3-4a45-bd93-0bc013b857dc.png"
                                            data-filename="Screenshot from 2023-04-17 16-23-56.png" data-type="66"
                                            data-date="None" data-doi="" data-publisher="" data-description="None"
                                            data-authors-count="None" data-toggle="modal"
                                            data-target="#science-paper-update-modal">
                                            <i data-feather="eye" class="feather feather-check-square w-4 h-4 mr-1"></i>
                                            Ko'rish
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan='8' style="text-align: center;">Ma'lumot yo'q</td>
                            </tr>
                            
                        @endforelse

                    </tbody>
                </table>
            </div>
            <div class="intro-y flex flex-wrap sm:flex-row sm:flex-no-wrap items-center mt-3">
                {{ $startup->appends(request()->query())->links() }}
            </div>
        </div>

    </div>


    <div class="modal" id="science-paper-create-modal">
        <div class="modal__content modal__content--xl">
            <div class="p-5">

                <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2">
                    <div class="w-full mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                        <form id="science-paper-create-form" method="POST" action="{{ route('startup_import') }}"
                            class="validate-form" enctype="multipart/form-data" novalidate="novalidate">
                            @csrf
                            <div class="grid grid-cols-12 gap-2">

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

    <script>
        document.querySelector('.science-sub-categoryviloyat').addEventListener('change', function() {
            let viloyat = this.value;

            // Sahifani GET so‘rov bilan qayta yuklash
            let url = new URL(window.location.href);
            url.searchParams.set('viloyat', viloyat);

            window.location.href = url.toString();
        });
    </script>
@endsection
