<nav class="side-nav">
    <a href="" class="intro-x flex items-center pl-5 pt-4">
        <img width="40px" alt="Midone Tailwind HTML Admin Template" class="w-10" src="/admin/dist/images/logo.png">
        <span class="hidden xl:block text-white text-lg ml-3" style="font-size: 12px; "> Ilmiy tadqiqot muassasalari faoliyat monitoring tizimi </span>
    </a>
    <div class="side-nav__devider my-6"></div>

    @role(['admin','Xodimlar_uchun_masul','Tashkilot_pasporti_uchun_masul','Ilmiy_faoliyat_uchun_masul'])
			<a href="" class=" items-center ">
				<img width="" style="text-align: center;margin: 10px auto;width: 70%;" alt=""  src="{{ asset('storage/'. auth()->user()->tashkilot->logo)  }}">
				<span class="hidden xl:block text-white text-lg ml-3" style="font-size: 18px; text-align: center;"> {{ auth()->user()->tashkilot->name }}</span>
			</a><br>
    @endrole
    <ul>
        <li>
            <a href="{{ route("home.index") }}" class="side-menu side-menu{{ request()->is('/*') ? '--active':'' }}" >
                <div class="side-menu__icon"> <i data-feather="home"></i> </div>
                <div class="side-menu__title"> Dashboard </div>
            </a>
        </li>
    <!-- start superadmin -->
    @role('super-admin')
        
        <li>
            <a href="javascript:;" class="side-menu side-menu{{ request()->is('iqtisodiylar*') ? '--active':'' }}{{ request()->is('tashkilotrahbarilar*') ? '--active':'' }}{{ request()->is('tashkilot*') ? '--active':'' }}">
                <div class="side-menu__icon"> <i data-feather="file-text"></i> </div>
                <div class="side-menu__title">  Tashkilotlar <i data-feather="chevron-down"
                        class="side-menu__sub-icon"></i> </div>
            </a>
            <ul class="{{ request()->is('iqtisodiylar*') ? 'side-menu__sub-open':'' }}{{ request()->is('tashkilotrahbarilar') ? 'side-menu__sub-open':'' }}{{ request()->is('tashkilot*') ? 'side-menu__sub-open':'' }}">
                
                <li>
                    <a href="{{ route('tashkilotlar.index') }}" class="side-menu side-menu{{ request()->is('tashkilot*') ? '--active':'' }}">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> Tashkilot pasportilari </div>
                    </a>
                </li>
                
                <li>
                    <a href="{{ route("tashkilotrahbarilar.index") }}" class="side-menu side-menu{{ request()->is('tashkilotrahbarilar*') ? '--active':'' }}">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title">  Tashkilotlar raxbarlari  </div>
                    </a>
                </li>
                
                <li>
                    <a href="{{ route('iqtisodiylar.index') }}" class="side-menu side-menu{{ request()->is('iqtisodiylar*') ? '--active':'' }}">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title">  Iqtisodiy moliyaviy faoliyatlari   </div>
                    </a>
                </li>

            </ul>
        </li>
    @endrole

    @role('super-admin')
        <li>
            <a href="{{ route("xodim.barchaXodimlar") }}" class="side-menu side-menu{{ request()->is('xodim*') ? '--active':'' }}">
                <div class="side-menu__icon"> <i data-feather="inbox"></i> </div>
                <div class="side-menu__title"> Xodimlar </div>
            </a>
        </li>
    @endrole
    
    @role('super-admin')
        <li>
            <a href="{{ route('ilmiyloyihalar.index') }}" class="side-menu side-menu{{ request()->is('ilmiyloyiha*') ? '--active':'' }}">
                <div class="side-menu__icon"> <i data-feather="inbox"></i> </div>
                <div class="side-menu__title"> Ilmiy loyhilalar </div>
            </a>
        </li>
    @endrole

    @role('super-admin')
        <li>
            <a href="{{ route('xujaliklar.index') }}" class="side-menu side-menu{{ request()->is('xujalik*') ? '--active':'' }}">
                <div class="side-menu__icon"> <i data-feather="inbox"></i> </div>
                <div class="side-menu__title"> Xujaliklar shartnomalar </div>
            </a>
        </li>
    @endrole

    @role('super-admin')
        <li>
            <a href="{{ route('ilmiydarajalar.index') }}" class="side-menu side-menu{{ request()->is('ilmiydaraja*') ? '--active':'' }}">
                <div class="side-menu__icon"> <i data-feather="inbox"></i> </div>
                <div class="side-menu__title"> Loyiha bilan taminlangami </div>
            </a>
        </li>
    @endrole

    @role('super-admin')
        
        <li>
            <a href="javascript:;" class="side-menu side-menu{{ request()->is('users*') ? '--active':'' }}{{ request()->is('permissions*') ? '--active':'' }}{{ request()->is('roles*') ? '--active':'' }}{{ request()->is('tashqoshish*') ? '--active':'' }}">
                <div class="side-menu__icon"> <i data-feather="settings"></i> </div>
                <div class="side-menu__title">  Sozlamalar <i data-feather="chevron-down"
                        class="side-menu__sub-icon"></i> </div>
            </a>
            <ul class="{{ request()->is('users*') ? 'side-menu__sub-open':'' }}{{ request()->is('permissions*') ? 'side-menu__sub-open':'' }}{{ request()->is('roles*') ? 'side-menu__sub-open':'' }}{{ request()->is('tashqoshish*') ? 'side-menu__sub-open':'' }}">

                <li>
                    <a href="{{ route("tashqoshish.create") }}" class="side-menu side-menu{{ request()->is('tashqoshish*') ? '--active':'' }}">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> Tashkilot qo'shish </div>
                    </a>
                </li>

                <li>
                    <a href="{{ route('users.index') }}" class="side-menu side-menu{{ request()->is('users*') ? '--active':'' }}">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> Userlar </div>
                    </a>
                </li>

                
                <li>
                    <a href="{{ route("roles.index") }}" class="side-menu side-menu{{ request()->is('roles*') ? '--active':'' }}">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> Rolelar </div>
                    </a>
                </li>
                
                <li>
                    <a href="{{ route('permissions.index') }}" class="side-menu side-menu{{ request()->is('permissions*') ? '--active':'' }}">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title">  Permissions  </div>
                    </a>
                </li>
            </ul>
        </li>
    @endrole

   <!-- start admin userlar -->
   @role(['admin','Tashkilot_pasporti_uchun_masul'])
        <li>
            <a href="javascript:;" class="side-menu side-menu{{ request()->is('tashkilot*') ? '--active':'' }}{{ request()->is('iqtisodiy*') ? '--active':'' }}">
                <div class="side-menu__icon"> <i data-feather="box"></i> </div>
                <div class="side-menu__title">  Tashkilot pasporti  <i data-feather="chevron-down"
                        class="side-menu__sub-icon"></i> </div>
            </a>
            <ul class="{{ request()->is('tashkilot*') ? 'side-menu__sub-open':'' }}{{ request()->is('iqtisodiy*') ? 'side-menu__sub-open':'' }}">
                <li>
                    <a href="{{ route('tashkilot.index') }}" class="side-menu side-menu{{ request()->is('tashkilot*') ? '--active':'' }}">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> Tashkilot pasportini tuldirish </div>
                    </a>
                </li>
                <li>
                    <a href="{{ route("iqtisodiy.index") }}" class="side-menu side-menu{{ request()->is('iqtisodiy*') ? '--active':'' }}">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title">  Iqtisodiy moliyaviy faoliyat  </div>
                    </a>
                </li>
                
                <li>
                    <a href="{{ route("tashkilotrahbari.index") }}" class="side-menu side-menu{{ request()->is('tashkilotrahbari*') ? '--active':'' }}">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> Tashkilot rahbari </div>
                    </a>
                </li>
            </ul>
        </li>
    @endrole
   
    @role(['admin','Xodimlar_uchun_masul'])
        <li>
            <a href="{{ route('xodimlar.index') }}" class="side-menu side-menu{{ request()->is('xodimlar*') ? '--active':'' }}">
                <div class="side-menu__icon"> <i data-feather="file-text"></i> </div>
                <div class="side-menu__title"> Xodimlar </div>
            </a>
        </li>
    @endrole

    @role(['admin','Ilmiy_faoliyat_uchun_masul'])
        <li>
            <a href="{{ route("ilmiyloyiha.index") }}" class="side-menu side-menu{{ request()->is('ilmiyloyiha*') ? '--active':'' }}">
                <div class="side-menu__icon"> <i data-feather="file-text"></i> </div>
                <div class="side-menu__title"> Ilmiy loyihalalar </div>
            </a>
        </li>
    @endrole

    @role(['admin','Ilmiy_faoliyat_uchun_masul'])
    <li>
        <a href="{{ route("xujalik.index") }}" class="side-menu side-menu{{ request()->is('xujalik*') ? '--active':'' }}">
            <div class="side-menu__icon"> <i data-feather="file-text"></i> </div>
            <div class="side-menu__title"> Xo'jalik loyihalalar </div>
        </a>
    </li>
    @endrole

    @role(['admin','Ilmiy_faoliyat_uchun_masul'])
    <li>
        <a href="{{ route("ilmiydaraja.index") }}" class="side-menu side-menu{{ request()->is('ilmiydaraja*') ? '--active':'' }}">
            <div class="side-menu__icon"> <i data-feather="file-text"></i> </div>
            <div class="side-menu__title"> Ilmiy loyiha bilan taminlangami </div>
        </a>
    </li>
    @endrole
    <!-- end admin -->
    <div class="side-nav__devider my-6"></div>
		<li>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <x-dropdown-link style="color: white;padding: 8px;margin-left: 16px;" class="side-menu flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 rounded-md" :href="route('logout')"
                    onclick="event.preventDefault();
                                this.closest('form').submit();">
                <div class="side-menu__icon"> <i data-feather="toggle-right" class="w-4 h-4 mr-2"></i> </div>
                Chiqish
            </x-dropdown-link>
        </form>
    </li>
    </ul>
</nav>










<!-- @role('super-admin')
        <li>
            <a href="{{ route('tashkilotlar.index') }}" class="side-menu side-menu{{ request()->is('tashkilotlar*') ? '--active':'' }}">
                <div class="side-menu__icon"> <i data-feather="inbox"></i> </div>
                <div class="side-menu__title"> Tashkilotlar </div>
            </a>
        </li>
    @endrole  -->
    
    <!-- @role('super-admin')
        <li>
            <a href="{{ route('tashkilotrahbarilar.index') }}" class="side-menu side-menu{{ request()->is('tashkilotrahbarilar*') ? '--active':'' }}">
                <div class="side-menu__icon"> <i data-feather="inbox"></i> </div>
                <div class="side-menu__title"> Tashkilotlar raxbarlar </div>
            </a>
        </li>
    @endrole  -->
    <!-- @role('super-admin')
        <li>
            <a href="{{ route('iqtisodiylar.index') }}" class="side-menu side-menu{{ request()->is('iqtisodiylar*') ? '--active':'' }}">
                <div class="side-menu__icon"> <i data-feather="inbox"></i> </div>
                <div class="side-menu__title">Iqtisodiy Moliyaviy faoliyat </div>
            </a>
        </li>
    @endrole  -->