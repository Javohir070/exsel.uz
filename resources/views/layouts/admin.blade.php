<!DOCTYPE html>
<html lang="en">
    <!-- BEGIN: Head -->
    <head>
        <meta charset="utf-8">
        <link href="/admin/dist/images/logo.png" rel="shortcut icon">
        <meta name="viewport" content="Ilmiy-innovatsion faoliyat monitoringi tizimi">
        <meta name="description" content="Ilmiy-innovatsion faoliyat monitoringi tizimi">
        <meta name="keywords" content="Ilmiy-innovatsion faoliyat monitoringi tizimi">
        <meta name="author" content="LEFT4CODE">
        <title>Ilmiy-innovatsion faoliyat monitoringi tizimi </title>
        <!-- BEGIN: CSS Assets-->
        <link rel="stylesheet" href="/admin/dist/css/app.css" />
        
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <!-- <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script> -->
        <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2"></script>


        <!-- END: CSS Assets-->
    </head>
    <!-- END: Head -->
    <body class="app">
        <!-- BEGIN: Mobile Menu -->
        <div class="mobile-menu md:hidden">
            <div class="mobile-menu-bar">
                <a href="" class="flex mr-auto">
                    <img alt="Ilmiy-innovatsion faoliyat monitoringi tizimi" class="w-6" src="/admin/dist/images/logo.png">
                </a>
                <a href="javascript:;" id="mobile-menu-toggler"> <i data-feather="bar-chart-2" class="w-8 h-8 text-white transform -rotate-90"></i> </a>
            </div>
            <ul class="border-t border-theme-24 py-5 hidden">
                <li>
                    <a href="{{ route("home.index") }}" class="menu menu{{ request()->is('/*') ? '--active':'' }}" >
                        <div class="menu__icon"> <i data-feather="home"></i> </div>
                        <div class="menu__title"> Bosh  sahifa</div>
                    </a>
                </li>
                <!-- start superadmin -->
                @role('super-admin')

                    <li>
                        <a href="javascript:;" class="menu menu{{ request()->is('iqtisodiylar*') ? '--active':'' }}{{ request()->is('tashkilotrahbarilar*') ? '--active':'' }}{{ request()->is('tashkilot*') ? '--active':'' }}">
                            <div class="menu__icon"> <i data-feather="file-text"></i> </div>
                            <div class="menu__title">  Tashkilotlar <i data-feather="chevron-down"
                                    class="menu__sub-icon"></i> </div>
                        </a>
                        <ul class="{{ request()->is('iqtisodiylar*') ? 'menu__sub-open':'' }}{{ request()->is('tashkilotrahbarilar') ? 'menu__sub-open':'' }}{{ request()->is('tashkilot*') ? 'menu__sub-open':'' }}">

                            <li>
                                <a href="{{ route('tashkilotlar.index') }}" class="menu menu{{ request()->is('tashkilot*') ? '--active':'' }}">
                                    <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                    <div class="menu__title"> Tashkilot pasportilari </div>
                                </a>
                            </li>

                            <li>
                                <a href="{{ route("tashkilotrahbarilar.index") }}" class="menu menu{{ request()->is('tashkilotrahbarilar*') ? '--active':'' }}">
                                    <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                    <div class="menu__title">  Tashkilotlar raxbarlari  </div>
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('iqtisodiylar.index') }}" class="menu menu{{ request()->is('iqtisodiylar*') ? '--active':'' }}">
                                    <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                    <div class="menu__title">  Iqtisodiy moliyaviy faoliyatlari   </div>
                                </a>
                            </li>

                        </ul>
                    </li>
                @endrole

                @role('super-admin')
                    <li>
                        <a href="{{ route("xodim.barchaXodimlar") }}" class="menu menu{{ request()->is('xodim*') ? '--active':'' }}">
                            <div class="menu__icon"> <i data-feather="inbox"></i> </div>
                            <div class="menu__title"> Xodimlar </div>
                        </a>
                    </li>
                @endrole

                @role('super-admin')
                    <li>
                        <a href="{{ route('ilmiyloyihalar.index') }}" class="menu menu{{ request()->is('ilmiyloyiha*') ? '--active':'' }}">
                            <div class="menu__icon"> <i data-feather="inbox"></i> </div>
                            <div class="menu__title"> Ilmiy loyhilalar </div>
                        </a>
                    </li>
                @endrole

                @role('super-admin')
                    <li>
                        <a href="{{ route('xujaliklar.index') }}" class="menu menu{{ request()->is('xujalik*') ? '--active':'' }}">
                            <div class="menu__icon"> <i data-feather="inbox"></i> </div>
                            <div class="menu__title"> Xujaliklar shartnomalar </div>
                        </a>
                    </li>
                @endrole

                @role('super-admin')
                    <li>
                        <a href="{{ route('ilmiydarajalar.index') }}" class="menu menu{{ request()->is('ilmiydaraja*') ? '--active':'' }}">
                            <div class="menu__icon"> <i data-feather="inbox"></i> </div>
                            <div class="menu__title"> Loyiha bilan taminlangami </div>
                        </a>
                    </li>
                @endrole

                @role('super-admin')

                    <li>
                        <a href="javascript:;" class="menu menu{{ request()->is('users*') ? '--active':'' }}{{ request()->is('permissions*') ? '--active':'' }}{{ request()->is('roles*') ? '--active':'' }}{{ request()->is('tashqoshish*') ? '--active':'' }}">
                            <div class="menu__icon"> <i data-feather="settings"></i> </div>
                            <div class="menu__title">  Sozlamalar <i data-feather="chevron-down"
                                    class="menu__sub-icon"></i> </div>
                        </a>
                        <ul class="{{ request()->is('users*') ? 'menu__sub-open':'' }}{{ request()->is('permissions*') ? 'menu__sub-open':'' }}{{ request()->is('roles*') ? 'menu__sub-open':'' }}{{ request()->is('tashqoshish*') ? 'menu__sub-open':'' }}">

                            <li>
                                <a href="{{ route("tashqoshish.create") }}" class="menu menu{{ request()->is('tashqoshish*') ? '--active':'' }}">
                                    <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                    <div class="menu__title"> Tashkilot qo'shish </div>
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('users.index') }}" class="menu menu{{ request()->is('users*') ? '--active':'' }}">
                                    <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                    <div class="menu__title"> Userlar </div>
                                </a>
                            </li>


                            <li>
                                <a href="{{ route("roles.index") }}" class="menu menu{{ request()->is('roles*') ? '--active':'' }}">
                                    <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                    <div class="menu__title"> Rolelar </div>
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('permissions.index') }}" class="menu menu{{ request()->is('permissions*') ? '--active':'' }}">
                                    <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                    <div class="menu__title">  Permissions  </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endrole

            <!-- start admin userlar -->
                @role(['admin','Tashkilot_pasporti_uchun_masul'])
                    <li>
                        <a href="javascript:;" class="menu menu{{ request()->is('tashkilot*') ? '--active':'' }}{{ request()->is('iqtisodiy*') ? '--active':'' }}">
                            <div class="menu__icon"> <i data-feather="box"></i> </div>
                            <div class="menu__title">  Tashkilot pasporti  <i data-feather="chevron-down"
                                    class="menu__sub-icon"></i> </div>
                        </a>
                        <ul class="{{ request()->is('tashkilot*') ? 'menu__sub-open':'' }}{{ request()->is('iqtisodiy*') ? 'menu__sub-open':'' }}">
                            <li>
                                <a href="{{ route('tashkilot.index') }}" class="menu menu{{ request()->is('tashkilot*') ? '--active':'' }}">
                                    <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                    <div class="menu__title"> Tashkilot pasportini to'ldirish </div>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route("iqtisodiy.index") }}" class="menu menu{{ request()->is('iqtisodiy*') ? '--active':'' }}">
                                    <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                    <div class="menu__title">  Iqtisodiy moliyaviy faoliyat  </div>
                                </a>
                            </li>

                            <li>
                                <a href="{{ route("tashkilotrahbari.index") }}" class="menu menu{{ request()->is('tashkilotrahbari*') ? '--active':'' }}">
                                    <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                    <div class="menu__title"> Tashkilot rahbari </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endrole

                @role(['admin','Xodimlar_uchun_masul'])
                    <li>
                        <a href="{{ route('xodimlar.index') }}" class="menu menu{{ request()->is('xodimlar*') ? '--active':'' }}">
                            <div class="menu__icon"> <i data-feather="file-text"></i> </div>
                            <div class="menu__title"> Xodimlar </div>
                        </a>
                    </li>
                @endrole

                @role(['admin','Ilmiy_faoliyat_uchun_masul'])
                    <li>
                        <a href="{{ route("ilmiyloyiha.index") }}" class="menu menu{{ request()->is('ilmiyloyiha*') ? '--active':'' }}">
                            <div class="menu__icon"> <i data-feather="file-text"></i> </div>
                            <div class="menu__title"> Ilmiy loyihalar </div>
                        </a>
                    </li>
                @endrole

                @role(['admin','Ilmiy_faoliyat_uchun_masul'])
                <li>
                    <a href="{{ route("xujalik.index") }}" class="menu menu{{ request()->is('xujalik*') ? '--active':'' }}">
                        <div class="menu__icon"> <i data-feather="file-text"></i> </div>
                        <div class="menu__title"> Xo'jalik loyihalar </div>
                    </a>
                </li>
                @endrole

                @role(['admin','Ilmiy_faoliyat_uchun_masul'])
                <li>
                    <a href="{{ route("ilmiydaraja.index") }}" class="menu menu{{ request()->is('ilmiydaraja*') ? '--active':'' }}">
                        <div class="menu__icon"> <i data-feather="file-text"></i> </div>
                        <div class="menu__title"> Ilmiy loyiha bilan ta'minlangami </div>
                    </a>
                </li>
                @endrole
                <!-- end admin -->
                <!-- Itm lar uchun -->
                @role('Itm-tashkilotlar')
                    <li>
                        <a href="javascript:;" class="menu menu{{ request()->is('tashkilot*') ? '--active':'' }}{{ request()->is('iqtisodiy*') ? '--active':'' }}{{ request()->is('itmtashkilot') ? '--active':'' }}{{ request()->is('itmiqtisodiy') ? '--active':'' }}{{ request()->is('itmtashkilotrahbari') ? '--active':'' }}">
                            <div class="menu__icon"> <i data-feather="box"></i> </div>
                            <div class="menu__title">  Tashkilot pasporti  <i data-feather="chevron-down"
                                    class="side-menu__sub-icon"></i> </div>
                        </a>
                        <ul class="{{ request()->is('tashkilot*') ? 'side-menu__sub-open':'' }}{{ request()->is('iqtisodiy*') ? 'side-menu__sub-open':'' }}{{ request()->is('itmiqtisodiy') ? 'side-menu__sub-open':'' }}{{ request()->is('itmtashkilot') ? 'side-menu__sub-open':'' }}{{ request()->is('itmtashkilotrahbari') ? 'side-menu__sub-open':'' }}">
                            <li>
                                <a href="{{ route('itm.tashkilot') }}" class="menu menu{{ request()->is('tashkilot*') ? '--active':'' }}{{ request()->is('itmtashkilot*') ? '--active':'' }}">
                                    <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                    <div class="menu__title"> Tashkilot pasportini to'ldirish </div>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route("itm.iqtisodiy") }}" class="menu menu{{ request()->is('iqtisodiy*') ? '--active':'' }}{{ request()->is('itmiqtisodiy*') ? '--active':'' }}">
                                    <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                    <div class="menu__title">  Iqtisodiy moliyaviy faoliyat  </div>
                                </a>
                            </li>

                            <li>
                                <a href="{{ route("itm.tashkilotrahbari") }}" class="menu menu{{ request()->is('tashkilotrahbari*') ? '--active':'' }}{{ request()->is('itmtashkilotrahbari*') ? '--active':'' }}">
                                    <div class="menu__icon"> <i data-feather="activity"></i> </div>
                                    <div class="menu__title"> Tashkilot rahbari </div>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="{{ route('itm.xodimlar') }}" class="menu menu{{ request()->is('xodimlar*') ? '--active':'' }}{{ request()->is('itmxodimlar*') ? '--active':'' }}">
                            <div class="menu__icon"> <i data-feather="users"></i> </div>
                            <div class="menu__title"> Xodimlar </div>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route("itm.ilmiyloyiha") }}" class="menu menu{{ request()->is('ilmiyloyiha*') ? '--active':'' }}{{ request()->is('itmilmiyloyiha*') ? '--active':'' }}">
                            <div class="menu__icon"> <i data-feather="file-text"></i> </div>
                            <div class="menu__title"> Ilmiy loyihalar </div>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route("itm.xujalik") }}" class="menu menu{{ request()->is('xujalik*') ? '--active':'' }}{{ request()->is('itmxujalik*') ? '--active':'' }}">
                            <div class="menu__icon"> <i data-feather="file-text"></i> </div>
                            <div class="menu__title"> Xo'jalik loyihalar </div>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route("itm.adminlar") }}" class="menu menu{{ request()->is('itmadminlar*') ? '--active':'' }}">
                            <div class="menu__icon"> <i data-feather="file-text"></i> </div>
                            <div class="menu__title">Tashkilot adminlar </div>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route("itm.ilmiydaraja") }}" class="menu menu{{ request()->is('ilmiydaraja*') ? '--active':'' }}{{ request()->is('itmilmiydaraja*') ? '--active':'' }}">
                            <div class="menu__icon"> <i data-feather="file-text"></i> </div>
                            <div class="menu__title"> Ilmiy loyiha bilan ta'minlanganmi </div>
                        </a>
                    </li>
                @endrole
                <div class="nav__devider my-6"></div>
                    <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-dropdown-link style="color: white;padding: 8px;margin-left: 16px;" class="menu flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 rounded-md" :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            <div class="menu__icon"> <i data-feather="toggle-right" class="w-4 h-4 mr-2"></i> </div>
                            Chiqish
                        </x-dropdown-link>
                    </form>
                </li>
            </ul>
        </div>
        <!-- END: Mobile Menu -->
        <div class="flex">
            <!-- BEGIN: Side Menu -->
            @include('layouts.nav-admin')
            <!-- END: Side Menu -->


            <!-- BEGIN: Content -->
            <div class="content">
                <!-- BEGIN: Top Bar -->
                <div class="top-bar">
                    <!-- BEGIN: Breadcrumb -->
                    <div class="-intro-x breadcrumb mr-auto hidden sm:flex"> <a href="" class="">Tizim</a> <i data-feather="chevron-right" class="breadcrumb__icon"></i> <a href="" class="breadcrumb--active">Asosiy</a> </div>
                    <!-- END: Breadcrumb -->
                    <!-- <div class="-intro-x breadcrumb mr-auto hidden sm:flex">
                        <marquee direction="left" width="500" style="color:red;">
                        Sayt test rejimida ishlamoqda
                        </marquee>
                    </div> -->
                    <!-- BEGIN: Search -->
                    {{-- <div class="intro-x relative mr-3 sm:mr-6">
                        <div class="search hidden sm:block">
                            <input type="text"  class="search__input input placeholder-theme-13" placeholder="Search...">
                            <i data-feather="search" class="search__icon"></i>
                        </div>
                        <a class="notification sm:hidden" href=""> <i data-feather="search" class="notification__icon"></i> </a>
                    </div> --}}
                    <!-- END: Search -->
                    <!-- BEGIN: Notifications -->
                    <div class="intro-x dropdown relative mr-auto sm:mr-6">
                        <div class="dropdown-toggle notification notification--bullet cursor-pointer">
                             <i data-feather="bell" class="notification__icon"></i>
                         </div>
                         <div class="notification-content dropdown-box mt-8 absolute top-0 left-0 sm:left-auto sm:right-0 z-20 -ml-10 sm:ml-0">
                            <div class="notification-content__box dropdown-box__content box">
                                <div class="notification-content__title">Notifications</div>
                                @foreach (auth()->user()->unreadNotifications as $notification)
                                <div class="relative flex items-center ">
                                        <div class="w-12 h-12 flex-none image-fit mr-1">
                                            <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="/admin/dist/images/profile-12.jpg">
                                            <div class="w-3 h-3 bg-theme-9 absolute right-0 bottom-0 rounded-full border-2 border-white"></div>
                                        </div>
                                        <div class="ml-2 overflow-hidden">
                                            <div class="flex items-center">
                                                <a href="{{ route('notifications.show', $notification->id) }}" class="font-medium truncate mr-5">{{ $notification->data['fish'] }}</a>
                                                <div class="text-xs text-gray-500 ml-auto whitespace-no-wrap">05:09 AM</div>
                                            </div>
                                            <div class="w-full truncate text-gray-600">{{ $notification->data['name'] }}</div>
                                        </div>
                                    </div>
                                @endforeach
                                {{-- <div class="cursor-pointer relative flex items-center mt-5">
                                    <div class="w-12 h-12 flex-none image-fit mr-1">
                                        <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="/admin/dist/images/profile-12.jpg">
                                        <div class="w-3 h-3 bg-theme-9 absolute right-0 bottom-0 rounded-full border-2 border-white"></div>
                                    </div>
                                    <div class="ml-2 overflow-hidden">
                                        <div class="flex items-center">
                                            <a href="javascript:;" class="font-medium truncate mr-5">Johnny Depp</a>
                                            <div class="text-xs text-gray-500 ml-auto whitespace-no-wrap">05:09 AM</div>
                                        </div>
                                        <div class="w-full truncate text-gray-600">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem </div>
                                    </div>
                                </div> --}}

                            </div>
                        </div>
                    </div>
                    <!-- END: Notifications -->
                    <!-- BEGIN: Account Menu -->
                    <div class="intro-x dropdown w-8 h-8 relative">
                        <div class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in">
                            <img alt="Midone Tailwind HTML Admin Template" src="/admin/dist/images/profile-12.jpg">
                        </div>
                        <div class="dropdown-box mt-10 absolute w-56 top-0 right-0 z-20">
                            <div class="dropdown-box__content box bg-theme-38 text-white">
                                <div class="p-4 border-b border-theme-40">
                                    <div class="font-medium">{{ auth()->user()->name }}</div>
                                    <div class="text-xs text-theme-41">{{ auth()->user()->email }}</div>
                                </div>
                                <div class="p-2">
                                    <a href="{{ route("profileview.index") }}" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 rounded-md"> <i data-feather="user" class="w-4 h-4 mr-2"></i> Profile </a>
                                    <!-- <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 rounded-md"> <i data-feather="edit" class="w-4 h-4 mr-2"></i> Add Account </a> -->
                                    <a href="{{ route("profileview.index") }}" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 rounded-md"> <i data-feather="lock" class="w-4 h-4 mr-2"></i> Parolni o'zgartirish </a>
                                    <!-- <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 rounded-md"> <i data-feather="help-circle" class="w-4 h-4 mr-2"></i>Sizgani yordam beris </a> -->
                                </div>
                                <div class="p-2 border-t border-theme-40">
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <x-dropdown-link style="color: white;padding: 8px;" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 rounded-md" :href="route('logout')"
                                                onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                                           <i data-feather="toggle-right" class="w-4 h-4 mr-2"></i> Chiqish
                                        </x-dropdown-link>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END: Account Menu -->
                </div>
                <!-- END: Top Bar -->
                @yield("content")
            </div>
            <!-- END: Content -->
        </div>
        <!-- BEGIN: JS Assets-->
        <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=["your-google-map-api"]&libraries=places"></script>
        <script src="/admin/dist/js/app.js"></script>
        <script src="/admin/dist/js/yil.js"></script>
    </body>
</html>
