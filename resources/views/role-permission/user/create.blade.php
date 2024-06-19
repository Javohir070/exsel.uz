@extends("layouts.admin")
@section("content")
<div class="flex justify-between align-center mt-10">

        <h2 class="intro-y text-lg font-medium">Users </h2>

        @can('create user')
        <a href="{{ url('users/create') }}"  class="button w-24 bg-theme-1 text-white">
            Add User
        </a>
        @endcan
    </div>




<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">

            @if ($errors->any())
                <ul class="alert alert-warning">
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            @endif

            <div class="card">
                <div class="card-header">
                    <h4>Create User
                        <a href="{{ url('users') }}" class="btn btn-danger float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="{{ url('users') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label for="">Email</label>
                            <input type="text" name="email" class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label for="">Password</label>
                            <input type="text" name="password" class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label for="">Roles</label>
                            <select name="roles[]" class="form-control" multiple>
                                <option value="">Select Role</option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role }}">{{ $role }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="">Tashkilotni tanlag</label>
                            <select name="tashkilot_id" class="form-control">
                                @foreach ($tashkilots as $tashkilot)
                                    <option value="{{ $tashkilot->id }}">{{ $tashkilot->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>













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

                                        <div class="my-4">
                                            <a class="old_file underlined" href="" target="_blank"></a>
                                        </div>


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


@endsection