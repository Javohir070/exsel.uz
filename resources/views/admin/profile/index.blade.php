@extends('layouts.admin')

@section('content')

<div class="intro-y box px-5 pt-5 mt-5">


    <div class="flex flex-col lg:flex-row border-b border-gray-200 pb-5 -mx-5">
        <form method="POST" action="/photo_change/" enctype="multipart/form-data">
            <div class="flex flex-1 px-5 items-center justify-center lg:justify-start">
                <div class="w-20 h-20 sm:w-24 sm:h-24 flex-none lg:w-32 lg:h-32 image-fit relative">

                    <label for="change_photo">
                        <img alt="profile image" id="profile_image" style="height: 100%; object-fit: cover"
                            class="rounded-full" src="/admin/src/images/profile.jpg">
                    </label>
                </div>
                <div class="ml-5">
                    <div class="w-24 sm:w-40 truncate sm:whitespace-normal font-medium text-lg">
                        {{ auth()->user()->name }}

                    </div>
                    <!-- <div class="text-gray-600">Stajyor assistent</div>
                    <div class="text-gray-600">assistent</div> -->
                    <div class="text-gray-600"></div>
                    <div class="w-40 mx-auto cursor-pointer relative">
                        <!-- <input type="file" id="change_photo" name="profile_image" class="w-full h-full hidden" -->
                            <!-- required=""> -->
                        <button type="submit" id="change_photo_submit" class="button w-full bg-theme-1 text-white mt-3"
                            style="pointer-events: none; background-color: rgba(28, 63, 170, 0.3);">Saqlash</button>
                    </div>
                </div>

            </div>
        </form>

        

        <div
            class="flex mt-6 lg:mt-0 items-center lg:items-start flex-1 flex-col justify-center text-gray-600 px-5 border-l border-r border-gray-200 border-t lg:border-t-0 pt-5 lg:pt-0">
            <div class="truncate sm:whitespace-normal flex items-center"><svg xmlns="http://www.w3.org/2000/svg"
                    width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail w-5 h-4 mr-2">
                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                    <polyline points="22,6 12,13 2,6"></polyline>
                </svg>
                {{ auth()->user()->email }}
            </div>
            <!-- <div class="truncate sm:whitespace-normal flex items-center mt-3"><svg xmlns="http://www.w3.org/2000/svg"
                    width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-phone w-4 h-4 mr-2">
                    <path
                        d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                    </path>
                </svg>
                +998 33 355 15 05

            </div> -->
            <div class="truncate sm:whitespace-normal flex items-center mt-3"><svg xmlns="http://www.w3.org/2000/svg"
                    width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-home w-4 h-4 mr-2">
                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                    <polyline points="9 22 9 12 15 12 15 22"></polyline>
                </svg>
                {{ auth()->user()->tashkilot->name }}

            </div>
        </div>
        
        <div
            class="mt-6 lg:mt-0 flex-1 flex items-center justify-center px-5 border-t lg:border-0 border-gray-200 pt-5 lg:pt-0">
            <div class="text-center rounded-md w-20 py-3">
                <div class="font-semibold text-theme-1 text-lg">0</div>
                <div class="text-gray-600">Xodimlar</div>
            </div>
            <div class="text-center rounded-md w-40 py-3">
                <div class="font-semibold text-theme-1 text-lg">0</div>
                <div class="text-gray-600">Ilmiy loyihalar</div>
            </div>
            <div class="text-center rounded-md w-40 py-3">
                <div class="font-semibold text-theme-1 text-lg">0</div>
                <div class="text-gray-600">Xo'jalik loyihalar</div>
            </div>
        </div>
    </div>
    
    <div class="nav-tabs flex flex-col sm:flex-row justify-center lg:justify-start">
        <a data-toggle="tab" data-target="#settings" href="javascript:;" class="py-4 sm:mr-8 flex items-center active">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-settings w-4 h-4 mr-2">
                <circle cx="12" cy="12" r="3"></circle>
                <path
                    d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z">
                </path>
            </svg> Sozlamalar
        </a>
        <a data-toggle="tab" data-target="#change-password" href="javascript:;" class="py-4 sm:mr-8 flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                class="feather feather-lock w-4 h-4 mr-2">
                <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
            </svg>Parol o'zgartirish
        </a>
        

    </div>
</div>
@if (session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif

<div class="tab-content mt-5">

    <div class="tab-content__pane active" id="settings">

        <div class="grid grid-cols-12 gap-6">

            <div class="col-span-12 lg:col-span-12 xxl:col-span-12">
                <!-- BEGIN: Personal Information -->
                <div class="intro-y box lg:mt-5">
                    <div class="flex items-center p-5 border-b border-gray-200">
                        <h2 class="font-medium text-base mr-auto">
                            Shaxsiy ma'lumot
                        </h2>
                    </div>
                    <div class="p-5">
                        <form action="#" method="POST">
                           
                            <div class="grid grid-cols-12 gap-5">

                                <div class="col-span-12 xl:col-span-6">
                                    <div>
                                        <label>F.I.Sh</label>
                                        <input type="text" name="first_name" value="{{ auth()->user()->name }}" maxlength="200"
                                            autocomplete="off" class="input w-full border mt-2" required=""
                                            id="id_first_name">
                                   
                                    </div>
                                
                                </div>
                                <div class="col-span-12 xl:col-span-6">
                                    <div>
                                        <label>Email</label>
                                        <input type="text" name="" value="{{ auth()->user()->email }}" maxlength="200"
                                            autocomplete="off" class="input w-full border mt-2" id="id_phone">
                                       
                                    </div>
                                </div>
                            </div>



                            <div class="flex justify-end mt-4">
                                <button type="button" class="button w-20 bg-theme-1 text-white ml-auto">
                                    Saqlash
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- END: Personal Information -->
            </div>
        </div>

    </div>
    <div class="tab-content__pane" id="change-password">
        <!-- BEGIN: Change Password -->
        <form action="{{ route('password.change') }}" method="POST">
            @csrf
            <div class="intro-y box lg:mt-5">
                <div class="flex items-center p-5 border-b border-gray-200">
                    <h2 class="font-medium text-base mr-auto">Parolni o'zgartirish</h2>
                </div>
                <div class="p-5">
                    <div>
                        <label>Eski parol</label>
                        <input type="password" class="input w-full border mt-2" placeholder="Input text"
                            name="current_password">
                    </div>
                    <div class="mt-3">
                        <label>Yangi parol</label>
                        <input type="password" class="input w-full border mt-2" placeholder="Input text"
                            name="new_password">
                    </div>
                    <div class="mt-3">
                        <label>Yangi parol tasdiqlang</label>
                        <input type="password" class="input w-full border mt-2" placeholder="Input text"
                            name="new_password_confirmation">
                    </div>
                    <button type="submit" class="button bg-theme-1 text-white mt-4">
                        Parolni o'zgartirish
                    </button>
                </div>
            </div>
        </form>
        <!-- END: Change Password -->
    </div>
    <div class="tab-content__pane" id="add-hersh">
        <!-- BEGIN: Add Hersh Indek -->
        <form action="/article-api/inter-base-create-profile/" method="POST">
            <input type="hidden" name="csrfmiddlewaretoken"
                value="i9eYofzYVx9E8PVTxdckAWagLt4HJ7ivL2LxjQOpUQaw6FG6DwQfZcG11vAWgsrT">
            <div class="intro-y box lg:mt-5">
                <div class="flex items-center p-5 border-b border-gray-200">
                    <h2 class="font-medium text-base mr-auto">Xalqaro bazadagi profilni qo'shish</h2>
                </div>
                <div class="p-5">

                    <div class="mt-3">
                        <label class="flex flex-col sm:flex-row"><span
                                class="mr-1 mt-1 sm:mt-0 text-xs text-red-600">*</span>
                            International bases
                        </label>
                        <select name="interbase" class="programming input border w-full mt-2" required="">
                            <option value="">Xalqaro bazani tanlang</option>

                            <option value="14">Google scholar</option>

                            <option value="12">Scopus</option>

                            <option value="11">Web of science</option>

                            <option value="13">Xalqaro bazalarda mavjud emas</option>

                        </select>
                    </div>
                    <div class="mt-3">
                        <label>Xalqaro bazadagi foydalanuvchi ID si</label>
                        <input type="text" class="input w-full border mt-2" placeholder="" name="user_id">
                    </div>
                    <!-- <div class="mt-3">
            <label>sana</label>
            <input type="text" class="input w-full border mt-2" placeholder="" name="sana" />
          </div> -->

                    <button type="submit" class="button bg-theme-1 text-white mt-4">
                        Ma'lumotlarni saqlash
                    </button>
                </div>
            </div>
        </form>
        <!-- END: Change Password -->
    </div>

</div>


@endsection