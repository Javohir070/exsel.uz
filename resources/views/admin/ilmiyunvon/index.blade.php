@extends('layouts.admin')

@section('content')

<div class="content">
    <div class="flex justify-between align-center mt-10">

        <h2 class="intro-y text-lg font-medium">Ilmiy unvon</h2>

        <a href="javascript:;" data-target="#science-paper-create-modal" data-toggle="modal" class="button w-24 bg-theme-1 text-white">
            Qo'shish
        </a>

    </div>
    <a href="#" class="button bg-theme-9 text-white mt-10">
        Tasdiqlanmaganlar 0</a>

    <a href="#" class="button bg-theme-9 text-white mt-10">
        Xalqaro ilmiy maqola qo‘shish</a>
    <a href="#" class="button bg-theme-1 text-white mt-10">
        Rad qilinganlar 0</a>
    <div class="grid grid-cols-12 gap-6 mt-5">


        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <table class="table table-report -mt-2">
                <thead>
                    <tr>
                        <th class="whitespace-no-wrap">№</th>
                        <th class="whitespace-no-wrap">Ilmiy unvon</th>
                        <th class="whitespace-no-wrap">Kim tomonidan berilgan</th>
                        <th class="whitespace-no-wrap">Registrasiya nomeri</th>
                        <th class="whitespace-no-wrap">Berilgan sana</th>
                        <th class="whitespace-no-wrap text-center">Harakat</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($i_daraja as $maq )

                    <tr class="intro-x">
                        <td>{{$loop->index+1}}</td>
                        <td>
                            <a href="#" target="_blank"  class="font-medium">{{ $maq->ilmiy_unvon_nomi }}</a>
                        </td>
                        <td>
                            <a href="" class="font-medium ">{{ $maq->kim_tom_berilgan  }}</a>
                        </td>
                        <td>
                            <a href="" class="font-medium ">{{ $maq->regis_raqami }}</a>
                        </td>
                        <td>
                            <a href="" class="font-medium ">{{ $maq->sana }}</a>
                        </td>
                        <td class="table-report__action w-56">
                            <div class="flex justify-center items-center">
                                <a class="flex science-update-action items-center mr-3" href="javascript:;" data-id="2978" data-name="sdfd" data-file="/files/papers/4735cda0-a7a3-4a45-bd93-0bc013b857dc.png" data-filename="Screenshot from 2023-04-17 16-23-56.png" data-type="66" data-date="None" data-doi="" data-publisher="" data-description="None" data-authors-count="None" data-toggle="modal" data-target="#science-paper-update-modal">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-square w-4 h-4 mr-1">
                                        <polyline points="9 11 12 14 22 4"></polyline>
                                        <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
                                    </svg>
                                    Tahrirlash
                                </a>
                                
                                <form action="{{ route('ilmiyunvon.destroy',['ilmiyunvon'=>$maq->id]) }}" method="post" onsubmit="return confirm(' Rostan Ochirishni hohlaysizmi?');">
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

        
        <div class="modal" id="science-paper-update-modal" style="padding-left: 0px;">
            <div class="modal__content">
                <div class="p-5">

                    <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2">
                        <div class="w-full mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                            <form id="science-paper-update-form" method="POST" action="/paper_update" class="validate-form" enctype="multipart/form-data" novalidate="novalidate">
                                <input type="hidden" name="csrfmiddlewaretoken" value="QRY51ZA7RsdPBKHyF9NQhvQNt845BwbUmuU3YaX8MCRhatA5DDogVr1IZwFzQDoe">
                                <div class="grid grid-cols-12 gap-2">
                                    <input name="id" type="hidden">
                                    <div class="w-full col-span-12">
                                        <label class="flex flex-col sm:flex-row"> <span class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Тури
                                        </label>
                                        <select name="sub_cat_id" class="input border w-full mt-2" required="">

                                            <option value="54">Бошқа</option>

                                            <option value="53">Тезис (Халқаро)</option>

                                            <option value="52">Тезис (Республика)</option>

                                            <option value="29">Гувоҳнома</option>

                                            <option value="27">Мақола (Маҳаллий журнал)</option>

                                            <option value="26">Мақола (Халқаро журнал)</option>

                                            <option value="25">Мақола (Конференция)</option>

                                            <option value="23">Монография</option>

                                        </select>

                                        <select name="inter_bases" class="input border w-full mt-2" required="">

                                            <option value="14">Google scholar</option>

                                            <option value="12">Scopus</option>

                                            <option value="11">Web of science</option>

                                            <option value="13">Xalqaro bazalarda mavjud emas</option>

                                        </select>

                                        <select name="languages" class="input border w-full mt-2" required="">

                                            <option value="7">uz</option>

                                            <option value="6">ru</option>

                                            <option value="5">eng</option>

                                        </select>

                                    </div>
                                    <div class="w-full col-span-12">
                                        <label class="flex flex-col sm:flex-row"> <span class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Сарлавҳа
                                        </label>
                                        <input type="text" name="name" class="input w-full border mt-2" required="">

                                    </div>
                                    <div class="w-full col-span-6">
                                        <label class="flex flex-col sm:flex-row"> DOI
                                        </label>
                                        <input type="text" name="doi" class="input w-full border mt-2">

                                    </div>
                                    <div class="w-full col-span-6">
                                        <label class="flex flex-col sm:flex-row"> <span class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Муаллифлар сони
                                        </label>
                                        <input type="number" name="authors_count" class="input w-full border mt-2" required="">

                                    </div>
                                    <div class="w-full col-span-12">
                                        <label class="flex flex-col sm:flex-row"> Нашриёт номи
                                        </label>
                                        <input type="text" name="publisher" class="input w-full border mt-2">

                                    </div>

                                    <div class="w-full col-span-12">

                                        <label class="flex flex-col sm:flex-row"> <span class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Сана
                                        </label>
                                        <input type="text" id="datepicker" name="published_date" class="datepicker input w-full border mt-2" required="">


                                    </div>
                                    <div class="w-full col-span-12">




                                        <label class="flex flex-col sm:flex-row"> <span class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Файл
                                        </label>
                                        <input type="file" name="filename" style="padding-left: 0" class="input w-full mt-2">

                                    </div>
                                    <div class="w-full col-span-12">
                                        <label class="flex flex-col sm:flex-row"> Қўшимча маълумот
                                        </label>
                                        <textarea name="description" class="input w-full border mt-2" rows="4"></textarea>

                                    </div>
                                    <input type="hidden" name="next" value="/science">

                                </div>
                            </form>
                        </div>
                    </div>


                </div>
                <div class="px-5 pb-5 text-center">
                    <button type="button" data-dismiss="modal" class="button delete-cancel w-32 border text-gray-700 mr-1">
                        Бекор қилиш
                    </button>
                    <button type="submit" form="science-paper-update-form" class="update-confirm button w-24 bg-theme-1 text-white">
                        Сақлаш
                    </button>
                </div>
            </div>
        </div>

    </div>





    <div class="modal" id="delete-confirmation-modal" style="padding-left: 0px;">
        <div class="modal__content">
            <div class="p-5 text-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle w-16 h-16 text-theme-6 mx-auto mt-3">
                    <circle cx="12" cy="12" r="10"></circle>
                    <line x1="15" y1="9" x2="9" y2="15"></line>
                    <line x1="9" y1="9" x2="15" y2="15"></line>
                </svg>
                <div class="text-3xl mt-5">Ишончингиз комилми?</div>
                <div class="text-gray-600 mt-2">
                    Агар ўчирсангиз қайта тиклай олмайсиз
                </div>
            </div>
            <div class="px-5 pb-8 text-center">
                <button type="button" data-dismiss="modal" class="button delete-cancel w-32 border text-gray-700 mr-1">
                    Бекор қилиш
                </button>
                <button type="button" class="delete-confirm button w-24 bg-theme-6 text-white">
                    Ўчириш
                </button>
            </div>
        </div>
    </div>
    <div class="modal" id="update-paper-modal" style="padding-left: 0px;">
        <div class="modal__content">
            <div class="p-5">

                <h1 class="mb-4 text-lg text-center">Update paper form</h1>

                <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2">
                    <div class="w-full mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                        <form id="update-paper" method="POST" action="/paper_update" class="validate-form" enctype="multipart/form-data" novalidate="novalidate">
                            <input type="hidden" name="csrfmiddlewaretoken" value="QRY51ZA7RsdPBKHyF9NQhvQNt845BwbUmuU3YaX8MCRhatA5DDogVr1IZwFzQDoe">
                            <div class="grid grid-cols-12 gap-2">
                                <input name="id" type="hidden">
                                <div class="w-full col-span-12">
                                    <label class="flex flex-col sm:flex-row"> <span class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Тури
                                    </label>
                                    <select name="sub_cat_id" class="input border w-full mt-2" required="">

                                        <option value="54">Бошқа</option>

                                        <option value="53">Тезис (Халқаро)</option>

                                        <option value="52">Тезис (Республика)</option>

                                        <option value="29">Гувоҳнома</option>

                                        <option value="27">Мақола (Маҳаллий журнал)</option>

                                        <option value="26">Мақола (Халқаро журнал)</option>

                                        <option value="25">Мақола (Конференция)</option>

                                        <option value="23">Монография</option>

                                    </select>

                                </div>
                                <div class="w-full col-span-12">
                                    <label class="flex flex-col sm:flex-row"> <span class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Сарлавҳа
                                    </label>
                                    <input type="text" name="name" class="input w-full border mt-2" required="">

                                </div>
                                <div class="w-full col-span-12">

                                    <label class="flex flex-col sm:flex-row"> <span class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Сана
                                    </label>
                                    <input type="text" id="datepicker" name="published_date" class="datepicker input w-full border mt-2" required="">


                                </div>
                                <div class="w-full col-span-12">

                                    <div class="my-4">
                                        <a class="old_file underlined" href="" target="_blank"></a>
                                    </div>


                                    <label class="flex flex-col sm:flex-row"> <span class="mt-1 mr-1 sm:mt-0 text-xs text-red-600">*</span> Файл
                                    </label>
                                    <input type="file" name="filename" style="padding-left: 0" class="input w-full mt-2">

                                </div>
                                <input type="hidden" name="next" value="/science">

                            </div>
                        </form>
                    </div>
                </div>

            </div>
            <div class="px-5 pb-5 text-center">
                <button type="button" data-dismiss="modal" class="button delete-cancel w-32 border text-gray-700 mr-1">
                    Бекор қилиш
                </button>
                <button type="submit" form="update-paper" class="update-confirm button w-24 bg-theme-1 text-white">
                    Сақлаш
                </button>
            </div>
        </div>
    </div>
</div>
@endsection