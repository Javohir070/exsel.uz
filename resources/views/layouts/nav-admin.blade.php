<nav class="side-nav">
    <a href="" class="intro-x flex items-center pl-5 pt-4">
        <img alt="Midone Tailwind HTML Admin Template" class="w-6" src="/admin/dist/images/logo.png">
        <span class="hidden xl:block text-white text-lg ml-3"> Science <span class="font-medium">ID</span> </span>
    </a>
    <div class="side-nav__devider my-6"></div>
    <ul>
        <li>
            <a href="{{ route("home.index") }}" class="side-menu side-menu--active">
                <div class="side-menu__icon"> <i data-feather="home"></i> </div>
                <div class="side-menu__title"> Dashboard </div>
            </a>
        </li>
    <!-- start superadmin -->
    @role('super-admin')
        <li>
            <a href="{{ route('tashkilot.index') }}" class="side-menu">
                <div class="side-menu__icon"> <i data-feather="inbox"></i> </div>
                <div class="side-menu__title"> Tashkilotlar </div>
            </a>
        </li>
    @endrole 
    @role('super-admin')
        <li>
            <a href="{{ route("xodim.barchaXodimlar") }}" class="side-menu">
                <div class="side-menu__icon"> <i data-feather="inbox"></i> </div>
                <div class="side-menu__title"> Xodimlar </div>
            </a>
        </li>
    @endrole
    @role('super-admin')
        <li>
            <a href="{{ route('tashkilotrahbarilar.index') }}" class="side-menu">
                <div class="side-menu__icon"> <i data-feather="inbox"></i> </div>
                <div class="side-menu__title"> Tashkilotlar raxbarlar </div>
            </a>
        </li>
    @endrole 
    @role('super-admin')
        <li>
            <a href="{{ route('iqtisodiylar.index') }}" class="side-menu">
                <div class="side-menu__icon"> <i data-feather="inbox"></i> </div>
                <div class="side-menu__title">Iqtisodiy Moliyaviy faoliyat </div>
            </a>
        </li>
    @endrole 
    @role('super-admin')
        <li>
            <a href="{{ route('ilmiyloyihalar.index') }}" class="side-menu">
                <div class="side-menu__icon"> <i data-feather="inbox"></i> </div>
                <div class="side-menu__title"> Ilmiy loyhilalar </div>
            </a>
        </li>
    @endrole

        <!-- <li>
            <a href="javascript:;" class="side-menu">
                <div class="side-menu__icon"> <i data-feather="box"></i> </div>
                <div class="side-menu__title"> Ilmiy maqolalar <i data-feather="chevron-down"
                        class="side-menu__sub-icon"></i> </div>
            </a>
            <ul class="">
                <li>
                    <a href="#" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> Xalqaro maqola </div>
                    </a>
                </li>
                <li>
                    <a href="" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> Xalqaro tezis </div>
                    </a>
                </li>
                <li>
                    <a href="" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> Respublika maqola </div>
                    </a>
                    <a href="" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> Respublika tezis </div>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="side-menu">
                <div class="side-menu__icon"> <i data-feather="layout"></i> </div>
                <div class="side-menu__title"> Ilmiy yutuqlar <i data-feather="chevron-down" class="side-menu__sub-icon"></i>
                </div>
            </a>
            <ul class="">
                <li>
                    <a href="" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title">Sertifikat</div>
                    </a>
                    
                </li>
                <li>
                    <a href="" class="side-menu">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title">Guvohnoma</div>
                    </a>
                 
                </li>
              
            </ul>
        </li> -->

    @can('view role')
        <li>
            <a href="{{ route('roles.index') }}" class="side-menu">
                <div class="side-menu__icon"> <i data-feather="file-text"></i> </div>
                <div class="side-menu__title"> Roles </div>
            </a>
        </li>
    @endcan
    @role(['super-admin', 'admin'])
        <li>
            <a href="{{ route('users.index') }}" class="side-menu">
                <div class="side-menu__icon"> <i data-feather="file-text"></i> </div>
                <div class="side-menu__title"> Users </div>
            </a>
        </li>
    @endrole
    @can('view permission') 
        <li>
            <a href="{{ route('permissions.index') }}" class="side-menu">
                <div class="side-menu__icon"> <i data-feather="file-text"></i> </div>
                <div class="side-menu__title"> Permissions </div>
            </a>
        </li>
    @endcan


   <!-- start admin -->

    @role('admin')
        <li>
            <a href="{{ route('xodimlar.index') }}" class="side-menu">
                <div class="side-menu__icon"> <i data-feather="file-text"></i> </div>
                <div class="side-menu__title"> Xodimlar </div>
            </a>
        </li>
    @endrole

    @role(['admin','user'])
        <li>
            <a href="{{ route("tashkilotrahbari.index") }}" class="side-menu">
                <div class="side-menu__icon"> <i data-feather="file-text"></i> </div>
                <div class="side-menu__title"> Tashkilot Rahbari </div>
            </a>
        </li>
    @endrole

    @role(['admin','user'])
        <li>
            <a href="{{ route("iqtisodiy.index") }}" class="side-menu">
                <div class="side-menu__icon"> <i data-feather="file-text"></i> </div>
                <div class="side-menu__title"> Iqtisodiy Moliyaviy faoliyat </div>
            </a>
        </li>
    @endrole
    @role(['admin','user'])
        <li>
            <a href="{{ route("ilmiyloyiha.index") }}" class="side-menu">
                <div class="side-menu__icon"> <i data-feather="file-text"></i> </div>
                <div class="side-menu__title"> Ilmiy loyhilalar </div>
            </a>
        </li>
    @endrole

    <!-- end admin -->
    </ul>
</nav>