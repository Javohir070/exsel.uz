@extends('layouts.admin')

@section('content')

<div class="content">
    <div class="flex justify-between align-center mt-10">

        <h2 class="intro-y text-lg font-medium"> Ilmiy loyhilalar </h2>

        <a href="{{ route("ilmiyloyiha.create") }}" class="button w-24 bg-theme-1 text-white">
            Qo'shish
        </a>

    </div>
    @if (session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif

        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <table class="table table-report -mt-2">
                <thead>
                    <tr>
                        <th class="whitespace-no-wrap">№</th>
                        <th class="whitespace-no-wrap">Tashkilot nomi</th>
                        <th class="whitespace-no-wrap">Loyiha mavzusi</th>
                        <th class="whitespace-no-wrap">Loyiha turi</th>
                        <th class="whitespace-no-wrap">Loyiha dasturi</th>
                        <th class="whitespace-no-wrap text-center">Harakat</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($ilmiyloyihalar as $xodimlar )

                    <tr class="intro-x">
                        <td>{{$loop->index+1}}</td>
                        <td>
                            <a href="#" target="_blank"  class="font-medium">{{ $xodimlar->tashkilot->name_qisqachasi }}</a>
                        </td>
                        <td>
                            <a href="" class="font-medium ">{{ $xodimlar->mavzusi  }} </a>
                        </td>
                        <td>
                            <a href="" class="font-medium ">{{ $xodimlar->turi }}</a>
                        </td>
                        <td>
                            <a href="" class="font-medium ">{{ $xodimlar->dastyri }}</a>
                        </td>
                        <td class="table-report__action w-56">
                            <div class="flex justify-center items-center">
                                

                                <a class="flex science-update-action items-center mr-3" href="{{ route('ilmiyloyiha.show',['ilmiyloyiha'=>$xodimlar->id]) }}" data-id="2978" data-name="sdfd" data-file="/files/papers/4735cda0-a7a3-4a45-bd93-0bc013b857dc.png" data-filename="Screenshot from 2023-04-17 16-23-56.png" data-type="66" data-date="None" data-doi="" data-publisher="" data-description="None" data-authors-count="None" data-toggle="modal" data-target="#science-paper-update-modal">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-square w-4 h-4 mr-1">
                                        <polyline points="9 11 12 14 22 4"></polyline>
                                        <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
                                    </svg>
                                    Ko'rish
                                </a>
                                
                                <form action="{{ route('ilmiyloyiha.destroy',['ilmiyloyiha'=>$xodimlar->id]) }}" method="post" onsubmit="return confirm(' Rostan Ochirishni hohlaysizmi?');">
                                    <button type="submit" class="flex delete-action items-center text-theme-6" >
                                    @csrf
                                    @method("DELETE")
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 w-4 h-4 mr-1">
                                            <polyline points="3 6 5 6 21 6"></polyline>
                                            <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                            </path>
                                            <line x1="10" y1="11" x2="10" y2="17"></line>
                                            <line x1="14" y1="11" x2="14" y2="17"></line>
                                        </svg>
                                        O'chirish
                                    </button>
                                </form>

                            </div>
                        </td>
                    </tr>
                    @endforeach


                </tbody>
            </table>
        </div>



        <!-- END: Data List -->
        <div class="modal" id="science-paper-create-modal">
            <div class="modal__content modal__content--xl">
                <div class="p-5">

                    <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2">
                        <div class="w-full mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                            <form id="science-paper-create-form" method="POST" action="{{ route('ilmiyunvon.store') }}" class="validate-form" enctype="multipart/form-data" novalidate="novalidate">
                                @csrf
                                <div class="grid grid-cols-12 gap-2">
                                    <div class="w-full col-span-6">
                                        <label class="flex flex-col sm:flex-row"> <span class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Ilmiy unvon turni tanlash
                                        </label>
                                        <select name="ilmiy_unvon_nomi" id="science-sub-category" class="input border w-full mt-2" required="">

                                            <option value="0">Ilmiy unvon tanlang</option>

                                            <option value="Dotsent">Dotsent</option>

                                            <option value="Professor">Professor</option>

                                            <option value="Akademik">Akademik</option>

                                        </select><br>
                                    </div>
                                    <div class="w-full col-span-6">
                                        <label class="flex flex-col sm:flex-row"> <span class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Berilgan sanasi
                                        </label>
                                        <input type="text" id="datepicker" name="sana" class="datepicker input w-full border mt-2" required=""><br>

                                    </div>

                                    <div class="w-full col-span-12 ilmiy-ish">
                                        <label class="flex flex-col sm:flex-row"> <span class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Registrasiya nomer 
                                        </label>
                                        <input type="text" name="regis_raqami" class="input w-full border mt-2" required="">
                                    </div>
                                    <div class="w-full col-span-12 ilmiy-ish">
                                        <label class="flex flex-col sm:flex-row"> <span class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Kim tomonidan berilgan
                                        </label>
                                        <input type="text" name="kim_tom_berilgan" class="input w-full border mt-2" required="">
                                    </div>

                                    
                                    <div class="w-full col-span-12" style="display:none;">

                                        <div class="my-4">
                                            <a class="old_file underlined" href="" target="_blank"></a>
                                        </div>


                                        <label class="flex flex-col sm:flex-row"> <span class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Файл
                                        </label>
                                        <input type="file" name="file" style="padding-left: 0" class="input w-full mt-2" required="">

                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>


                </div>
                <div class="px-5 pb-5 text-center">
                    <button type="button" data-dismiss="modal" class="button delete-cancel w-32 border text-gray-700 mr-1">
                        Bekor qilish
                    </button>
                    <button type="submit" form="science-paper-create-form" class="update-confirm button w-24 bg-theme-1 text-white">
                        Qo'shish
                    </button>
                </div>
            </div>
        </div>

    </div>





   
</div>
@endsection