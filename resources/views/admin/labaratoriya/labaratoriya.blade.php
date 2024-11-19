@extends('layouts.admin')

@section('content')
    <div class="content">
        <div class="flex justify-between align-center mt-10">

            <h2 class="intro-y text-lg font-medium">Labaratoriya</h2>

        </div>
        @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif

        <div class="grid grid-cols-12 gap-6 mt-5">
            <div class="col-span-12 sm:col-span-6 xl:col-span-4 intro-y">
                <a href="{{ route('lab_ilmiyloyiha.index') }}">
                    <div class="report-box zoom-in">
                        <div class="box p-5">
                            <div class="flex">
                                <i data-feather="file-text" class="report-box__icon text-theme-3"></i>
                            </div>
                            <div class="text-3xl font-bold leading-8 mt-6">{{ $lab_ilmiyLoyiha }}</div>
                            <div class="text-base text-gray-600 mt-1">Ilmiy loyhalar</div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-span-12 sm:col-span-6 xl:col-span-4 intro-y">
                <a href="{{ route('lab_xujalik.index') }}">
                    <div class="report-box zoom-in">
                        <div class="box p-5">
                            <div class="flex">
                                <i data-feather="file-text" class="report-box__icon text-theme-3"></i>
                            </div>
                            <div class="text-3xl font-bold leading-8 mt-6">{{ $lab_xujalik }}</div>
                            <div class="text-base text-gray-600 mt-1"> Xo'jalik shartnomalari </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-span-12 sm:col-span-6 xl:col-span-4 intro-y">
                <a href="{{ route('izlanuvchilar.index') }}">
                    <div class="report-box zoom-in">
                        <div class="box p-5">
                            <div class="flex">
                                <i data-feather="bar-chart" class="report-box__icon text-theme-9"></i>
                            </div>
                            <div class="text-3xl font-bold leading-8 mt-6">{{ $lab_izlanuvchilar }}</div>
                            <div class="text-base text-gray-600 mt-1">Ilmiy izlanuvchilar</div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-span-12 sm:col-span-6 xl:col-span-4 intro-y">
                <a href="{{ route('ilmiy', ['labId' => $laboratory, 'type' => 'dsc']) }}">
                    <div class="report-box zoom-in">
                        <div class="box p-5">
                            <div class="flex">
                                <i data-feather="users" class="report-box__icon text-theme-9"></i>
                            </div>
                            <div class="text-3xl font-bold leading-8 mt-6">{{ $dsc_soni }}</div>
                            <div class="text-base text-gray-600 mt-1">DSc</div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-span-12 sm:col-span-6 xl:col-span-4 intro-y">
                <a href="{{ route('ilmiy', ['labId' => $laboratory, 'type' => 'phd']) }}">
                    <div class="report-box zoom-in">
                        <div class="box p-5">
                            <div class="flex">
                                <i data-feather="users" class="report-box__icon text-theme-6"></i>
                            </div>
                            <div class="text-3xl font-bold leading-8 mt-6">{{ $phd_soni }}</div>
                            <div class="text-base text-gray-600 mt-1">PhD</div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-span-12 sm:col-span-6 xl:col-span-4 intro-y">
                <a href="{{ route('ilmiy', ['labId' => $laboratory, 'type' => 'staj']) }}">
                    <div class="report-box zoom-in">
                        <div class="box p-5">
                            <div class="flex">
                                <i data-feather="users" class="report-box__icon text-theme-9"></i>
                            </div>
                            <div class="text-3xl font-bold leading-8 mt-6">{{ $stajyor_soni }}</div>
                            <div class="text-base text-gray-600 mt-1">Stajyor-tadqiqotchi</div>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <div class="overflow-x-auto" style="background-color: white;margin-top:30px;border-radius:8px;padding:30px 20px;">
            <table class="table">
                <tbody>
                    @forelse ($laboratorys as $tash)
                        <div
                            style="display: flex;justify-content: space-between; border-bottom: 1px solid #e2e8f0; padding-bottom: 20px;">
                            <div style="font-size:18px;font-weight: 400;"> {{ $tash->name }} xaqida ma’lumot</div>
                            <div style="text-align: end;">
                                <a href="{{ route('laboratory.edit', ['laboratory' => $tash->id]) }}"
                                    class="button w-24 bg-theme-1 text-white" style="margin-right:20px;">
                                    Tahrirlash
                                </a>
                                {{-- <a href="" class="button w-24 bg-theme-6 text-white">
                                O'chirish
                            </a> --}}
                            </div>
                        </div>
                        <tr>
                            <!-- <th class="whitespace-no-wrap border" style="width: 40px";>#</th>
                                <th class="whitespace-no-wrap border" style="width:50%;">Ma’lumot nomlanishi</th> -->
                            <th class=" border" style="width: 100%; font-size:16px;text-align:center;" colspan="2">
                                Ma’lumot</th>
                        </tr>
                        <tr class="bg-gray-200">
                            <!-- <th class=" border">1</th> -->
                            <th class=" border" style="width:50%;">Labaratoriya nomi</th>
                            <th class=" border" style="width:50%;">Tashkil etilgan yil</th>
                        </tr>
                        <tr>
                            <!-- <th class=" border">4</th> -->
                            <td class="border">{{ $tash->name }}</td>
                            <td class="border">{{ $tash->tash_yil }}</td>
                        </tr>
                        <tr class="bg-gray-200">
                            <!-- <th class=" border">2</th> -->
                            <th class=" border">Tavsif</th>
                            <th class=" border"></th>
                        </tr>
                        <tr>
                            <!-- <th class=" border">5</th> -->
                            <td class="border">{{ $tash->tavsif }} </td>
                            <td class="border"></td>
                        </tr>
                        {{-- <tr class="bg-gray-200">
                            <!-- <th class=" border">3</th> -->
                            <th class=" border">Tashkilot rahbari Email</th>
                            <th class=" border">O‘rinbosarining email</th>
                        </tr>
                        <tr>
                            <!-- <th class="whitespace-no-wrap border">6</th> -->
                            <td class="border">{{ $tash->email }}</td>
                            <td class="border">{{ $tash->u_email }}</td>
                        </tr> --}}

                    @empty
                        <p> Ma'lumot qo'shish kerak</p>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
@endsection
