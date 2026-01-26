@extends('layouts.admin')

@section('content')
    <div class="content">
        <div class="flex justify-between align-center mt-6 mb-6">

            <h2 class="intro-y text-lg font-medium">Ilmiy loyihalar</h2>
            <div>
                <a href="{{ route('ilmiy_loyha_edit.index') }}" class="button w-24 bg-theme-1 text-white mr-2">
                    Masul biriktirish
                </a>
                <a href="{{ route('masul.index') }}" class="button w-24 bg-theme-1 text-white">
                    Masullar
                </a>
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
                        <th class="whitespace-no-wrap">Loyiha rahbari</th>
                        <th class="whitespace-no-wrap">Loyiha turi</th>
                        <th class="whitespace-no-wrap">Masul</th>
                        <th class="whitespace-no-wrap text-center">Harakat</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($ilmiyloyiha as $xodimlar)
                        <tr class="intro-x">
                            <td>{{ $loop->index + 1 }}</td>
                            <td>
                                <a href="{{ route('ilmiyloyiha.show', ['ilmiyloyiha' => $xodimlar->id]) }}"
                                    class="font-medium ">{{ $xodimlar->mavzusi }} </a>
                            </td>
                            <td>
                                {{ $xodimlar->rahbar_name }}
                            </td>
                            <td>
                                {{ $xodimlar->turi }}
                            </td>
                            <td>
                                @if ($xodimlar->user_id == 1)
                                    <a href="{{ route('ilmiy_loyha_edit.index') }}" class="button  bg-theme-1 text-white mr-4"
                                        style="display: ruby;">
                                        Masul biriktirish
                                    </a>
                                @else
                                    {{ $xodimlar->user->name ?? null }}
                                @endif
                            </td>
                            <td class="table-report__action w-56">
                                <div class="flex justify-center items-center">
                                    <a class="flex science-update-action items-center mr-3"
                                        href="{{ route('ilmiyloyiha.show', ['ilmiyloyiha' => $xodimlar->id]) }}">
                                        <i data-feather="eye" class="feather feather-check-square w-4 h-4 mr-1"></i>
                                        Ko'rish
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">Ma'lumot mavjud emas.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="intro-y flex flex-wrap sm:flex-row sm:flex-no-wrap items-center mt-3">
            {{ $ilmiyloyiha->links() }}
        </div>

    </div>
@endsection