@extends('layouts.admin')

@section('content')

    <div class="content">
        <div class="flex justify-between align-center mt-6 mb-6">

            <h2 class="intro-y text-lg font-medium">{{ $tashkilot->name }} </h2>

        </div>

        @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif

        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <table class="table table-report -mt-2">
                <thead>
                    <tr>
                        <th class="whitespace-no-wrap">№</th>
                        <th class="whitespace-no-wrap">Stajorning F.I.Sh </th>
                        <th class="whitespace-no-wrap">Stajorning lavozimi</th>
                        <th class="whitespace-no-wrap">Stajirovka yo'nalishi</th>
                        <th class="whitespace-no-wrap">Status</th>
                        <th class="whitespace-no-wrap">Holati</th>
                        <th class="whitespace-no-wrap text-center">Harakat</th>
                    </tr>
                </thead>
                <tbody>

                    @forelse ($stajirovkas as $xodimlar)

                        <tr class="intro-x">
                            <td>{{ ($stajirovkas->currentPage() - 1) * $stajirovkas->perPage() + $loop->iteration }}.</td>
                            <td>
                                {{ $xodimlar->fish }}
                            </td>
                            <td>
                                {{ $xodimlar->lavozim ?? 'Mavjud emas' }}
                            </td>
                            <td>
                                {{ $xodimlar->yunalishi ?? 'Mavjud emas' }}
                            </td>
                            <td
                                style="color: {{ ($h = $xodimlar->stajirovkaexpert()->where('quarter', 2)->first()->status ?? null) == 'Ijobiy' ? 'green' : ($h == 'Salbiy' ? 'blue' : 'red') }}">
                                {{ $xodimlar->stajirovkaexpert()->where('quarter', 2)->first()->status ?? "Tasdiqlanmagan" }}
                            </td>
                            <td
                                style="color: {{ ($h = $xodimlar->stajirovkaexpert()->where('quarter', 2)->first()->holati ?? null) == 'Tasdiqlandi' ? 'green' : ($h == 'yuborildi' ? 'blue' : 'red') }}">
                                {{ $h == 'yuborildi' ? "Tasdiqlash uchun yuborildi" : ($h == null ? "Ko'rilmagan" : $h) }}
                            </td>
                            <td class="table-report__action w-56">
                                <div class="flex justify-center items-center">

                                    <a class="flex science-update-action items-center mr-3"
                                        href="{{ route('stajirovka.show', ['stajirovka' => $xodimlar->id]) }}">
                                        <i data-feather="eye" class="feather feather-check-square w-4 h-4 mr-1"></i>
                                        Ko'rish
                                    </a>

                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan='6' style="text-align: center;">Ma'lumot yo'q</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{ $stajirovkas->links() }}

    </div>

@endsection
