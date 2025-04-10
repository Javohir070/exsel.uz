<nav class="side-nav">
    <a href="" class="intro-x flex items-center pl-5 pt-4">
        <img width="40px" alt="Midone Tailwind HTML Admin Template" class="w-10" src="/admin/dist/images/logo.png">
        <span class="hidden xl:block text-white text-lg ml-3" style="font-size: 12px; "> Ilmiy-innovatsion faoliyat
            monitoringi tizimi </span>
    </a>
    <div class="side-nav__devider my-6"></div>

    @role([
    'admin',
    'Xodimlar_uchun_masul',
    'Tashkilot_pasporti_uchun_masul',
    'Ilmiy_faoliyat_uchun_masul',
    'labaratoriyaga_masul'
])
    <a href="/" class=" items-center ">
        <img width="" style="text-align: center;margin: 10px auto;width: 70%;" alt=""
            src="{{ asset('storage/' . auth()->user()->tashkilot->logo) }}">
        <span class="hidden xl:block text-white text-lg ml-3" style="font-size: 18px; text-align: center;">
            {{ auth()->user()->tashkilot->name }}</span>
    </a>
    @endrole
    @role('labaratoriyaga_masul')
    <div class="side-nav__devider my-3"></div>
    <a href="/" class=" items-center ">
        <span class="hidden xl:block text-white text-lg ml-3" style="font-size: 14px; text-align: center;">
            {{ auth()->user()->laboratory->name }}</span>
    </a>
    <div class="side-nav__devider my-3"></div>
    @endrole
    <ul>
        <li>
            <a href="{{ route('home.index') }}" class="side-menu side-menu{{ request()->is('/*') ? '--active' : '' }}">
                <div class="side-menu__icon"> <i data-feather="home"></i> </div>
                <div class="side-menu__title"> Bosh sahifa</div>
            </a>
        </li>
        <!-- start superadmin -->
        @role(['super-admin', 'Ekspert'])
        <li>
            <a href="javascript:;"
                class="side-menu side-menu{{ request()->is('iqtisodiylar*') ? '--active' : '' }}{{ request()->is('tashkilotrahbarilar*') ? '--active' : '' }}{{ request()->is('tashkilot*') ? '--active' : '' }}">
                <div class="side-menu__icon"> <i data-feather="file-text"></i> </div>
                <div class="side-menu__title"> Tashkilotlar <i data-feather="chevron-down"
                        class="side-menu__sub-icon"></i> </div>
            </a>
            <ul
                class="{{ request()->is('iqtisodiylar*') ? 'side-menu__sub-open' : '' }}{{ request()->is('tashkilotrahbarilar') ? 'side-menu__sub-open' : '' }}{{ request()->is('tashkilot*') ? 'side-menu__sub-open' : '' }}">

                <li>
                    <a href="{{ route('tashkilotlar.index') }}"
                        class="side-menu side-menu{{ request()->is('tashkilot*') ? '--active' : '' }}">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> Tashkilot pasportlari </div>
                    </a>
                </li>

                <li>
                    <a href="{{ route('tashkilotrahbarilar.index') }}"
                        class="side-menu side-menu{{ request()->is('tashkilotrahbarilar*') ? '--active' : '' }}">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> Tashkilotlar rahbarlari </div>
                    </a>
                </li>

                <li>
                    <a href="{{ route('iqtisodiylar.index') }}"
                        class="side-menu side-menu{{ request()->is('iqtisodiylar*') ? '--active' : '' }}">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> Iqtisodiy moliyaviy faoliyatlari </div>
                    </a>
                </li>

            </ul>
        </li>
        @endrole

        @role('super-admin')
        <li>
            <a href="{{ route('xodim.barchaXodimlar') }}"
                class="side-menu side-menu{{ request()->is('xodim*') ? '--active' : '' }}">
                <div class="side-menu__icon"> <i data-feather="users"></i> </div>
                <div class="side-menu__title"> Xodimlar </div>
            </a>
        </li>
        <li>
            <a href="{{ route('asbobuskunafile.index') }}"
                class="side-menu side-menu{{ request()->is('asbobuskunafile*') ? '--active' : '' }}">
                <div class="side-menu__icon"> <i data-feather="users"></i> </div>
                <div class="side-menu__title"> Asbobuskuna fayl </div>
            </a>
        </li>
        <li>
            <a href="{{ route('laboratoriyalari.index') }}"
                class="side-menu side-menu{{ request()->is('laboratoriyalari*') ? '--active' : '' }}{{ request()->is('laboratory*') ? '--active' : '' }}">
                <div class="side-menu__icon"> <i data-feather="inbox"></i> </div>
                <div class="side-menu__title"> Labaratoriya </div>
            </a>
        </li>

        <li>
            <a href="{{ route('ilmiy_izlanuvchilar.index') }}"
                class="side-menu side-menu{{ request()->is('ilmiy-izlanuvchilar*') ? '--active' : '' }}{{ request()->is('izlanuvchilar*') ? '--active' : '' }}">
                <div class="side-menu__icon"> <i data-feather="inbox"></i> </div>
                <div class="side-menu__title">Ilmiy izlanuvchilar </div>
            </a>
        </li>
        @endrole

        @role([ 'Ekspert'])
        <li>
            <a href="{{ route('monitoring.index') }}"
                class="side-menu side-menu{{ request()->is('monitoring*') ? '--active' : '' }}">
                <div class="side-menu__icon"> <i data-feather="inbox"></i> </div>
                <div class="side-menu__title">Monitoring</div>
            </a>
        </li>
        @endrole
        @role(['Ilmiy loyihalar boyicha masul', 'Ekspert'])
        <li>
            <a href="{{ route('ilmiyloyihalar.index') }}"
                class="side-menu side-menu{{ request()->is('ilmiy*') ? '--active' : '' }}{{ request()->is('search-ilmiy*') ? '--active' : '' }}{{ request()->is('turi*') ? '--active' : '' }}">
                <div class="side-menu__icon"> <i data-feather="inbox"></i> </div>
                <div class="side-menu__title"> Ilmiy loyihalar  </div>
            </a>
        </li>
        @endrole
        @role(['Asbob-uskunalar boyicha masul', 'Ekspert'])
        <li>
            <a href="{{ route('asbobuskunalar.index') }}"
                class="side-menu side-menu{{ request()->is('asbobus*') ? '--active' : '' }}{{ request()->is('search-asbob*') ? '--active' : '' }}">
                <div class="side-menu__icon"> <i data-feather="inbox"></i> </div>
                <div class="side-menu__title"> Asbob-uskunalar</div>
            </a>
        </li>
        @endrole
        @role(['Stajirovka boyicha masul', 'Ekspert'])
        <li>
            <a href="{{ route('stajirovkalar.index') }}"
                class="side-menu side-menu{{ request()->is('staji*') ? '--active' : '' }}{{ request()->is('search-sta*') ? '--active' : '' }}">
                <div class="side-menu__icon"> <i data-feather="inbox"></i> </div>
                <div class="side-menu__title"> Stajirovkalar</div>
            </a>
        </li>
        @endrole
        @role(['Izlanuvchilar boyicha masul', 'Ekspert'])
        <li>
            <a href="{{ route('doktarantura.index') }}"
                class="side-menu side-menu{{ request()->is('doktarantura*') ? '--active' : '' }}{{ request()->is('search-dok*') ? '--active' : '' }}">
                <div class="side-menu__icon"> <i data-feather="inbox"></i> </div>
                <div class="side-menu__title"> Izlanuvchilar</div>
            </a>
        </li>
        @endrole

        @role(['Xujalik_shartnomalari', 'super-admin'])
        <li>
            <a href="{{ route('xujaliklar.index') }}"
                class="side-menu side-menu{{ request()->is('xujalik*') ? '--active' : '' }}">
                <div class="side-menu__icon"> <i data-feather="inbox"></i> </div>
                <div class="side-menu__title"> Xo'jalik shartnomalari </div>
            </a>
        </li>
        @endrole

        @role('super-admin11')
        <li>
            <a href="{{ route('ilmiydarajalar.index') }}"
                class="side-menu side-menu{{ request()->is('ilmiydaraja*') ? '--active' : '' }}">
                <div class="side-menu__icon"> <i data-feather="inbox"></i> </div>
                <div class="side-menu__title"> Loyiha bilan taminlanganmi </div>
            </a>
        </li>
        @endrole



        @role('super-admin')
        <li>
            <a href="javascript:;"
                class="side-menu side-menu{{ request()->is('users*') ? '--active' : '' }}{{ request()->is('permissions*') ? '--active' : '' }}{{ request()->is('roles*') ? '--active' : '' }}{{ request()->is('tashqoshish*') ? '--active' : '' }}">
                <div class="side-menu__icon"> <i data-feather="settings"></i> </div>
                <div class="side-menu__title"> Sozlamalar <i data-feather="chevron-down"
                        class="side-menu__sub-icon"></i> </div>
            </a>
            <ul
                class="{{ request()->is('users*') ? 'side-menu__sub-open' : '' }}{{ request()->is('permissions*') ? 'side-menu__sub-open' : '' }}{{ request()->is('roles*') ? 'side-menu__sub-open' : '' }}{{ request()->is('tashqoshish*') ? 'side-menu__sub-open' : '' }}">

                <li>
                    <a href="{{ route('tashqoshish.create') }}"
                        class="side-menu side-menu{{ request()->is('tashqoshish*') ? '--active' : '' }}">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> Tashkilot qo'shish </div>
                    </a>
                </li>

                <li>
                    <a href="{{ route('users.index') }}"
                        class="side-menu side-menu{{ request()->is('users*') ? '--active' : '' }}">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> Userlar </div>
                    </a>
                </li>


                <li>
                    <a href="{{ route('roles.index') }}"
                        class="side-menu side-menu{{ request()->is('roles*') ? '--active' : '' }}">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> Rolelar </div>
                    </a>
                </li>

                <li>
                    <a href="{{ route('permissions.index') }}"
                        class="side-menu side-menu{{ request()->is('permissions*') ? '--active' : '' }}">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> Permissions </div>
                    </a>
                </li>
            </ul>
        </li>
        @endrole

        <!-- start admin userlar -->
        @role(['admin', 'Tashkilot_pasporti_uchun_masul'])
        <li>
            <a href="javascript:;"
                class="side-menu side-menu{{ request()->is('tashkilot*') ? '--active' : '' }}{{ request()->is('iqtisodiy*') ? '--active' : '' }}">
                <div class="side-menu__icon"> <i data-feather="box"></i> </div>
                <div class="side-menu__title"> Tashkilot pasporti <i data-feather="chevron-down"
                        class="side-menu__sub-icon"></i> </div>
            </a>
            <ul
                class="{{ request()->is('tashkilot*') ? 'side-menu__sub-open' : '' }}{{ request()->is('iqtisodiy*') ? 'side-menu__sub-open' : '' }}">
                <li>
                    <a href="{{ route('tashkilot.index') }}"
                        class="side-menu side-menu{{ request()->is('tashkilot*') ? '--active' : '' }}">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> Tashkilot pasportini to'ldirish </div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('iqtisodiy.index') }}"
                        class="side-menu side-menu{{ request()->is('iqtisodiy*') ? '--active' : '' }}">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> Iqtisodiy moliyaviy faoliyat </div>
                    </a>
                </li>

                <li>
                    <a href="{{ route('tashkilotrahbari.index') }}"
                        class="side-menu side-menu{{ request()->is('tashkilotrahbari*') ? '--active' : '' }}">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> Tashkilot rahbari </div>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="{{ route('laboratory.index') }}"
                class="side-menu side-menu{{ request()->is('laboratory*') ? '--active' : '' }}">
                <div class="side-menu__icon"> <i data-feather="inbox"></i> </div>
                <div class="side-menu__title"> Labaratoriya </div>
            </a>
        </li>

        {{-- <li>
            <a href="{{ route('intellektual.index') }}"
                class="side-menu side-menu{{ request()->is('intellektual*') ? '--active' : '' }}">
                <div class="side-menu__icon"> <i data-feather="inbox"></i> </div>
                <div class="side-menu__title"> Intellektual </div>
            </a>
        </li> --}}

        {{-- <li>
            <a href="{{ route('loyihaiqtisodi.index') }}"
                class="side-menu side-menu{{ request()->is('loyihaiqtisodi*') ? '--active' : '' }}">
                <div class="side-menu__icon"> <i data-feather="inbox"></i> </div>
                <div class="side-menu__title"> Loyihaiqtisodi </div>
            </a>
        </li> --}}

        <li>
            <a href="{{ route('fakultetlar.index') }}"
                class="side-menu side-menu{{ request()->is('fakultetlar*') ? '--active' : '' }}">
                <div class="side-menu__icon"> <i data-feather="inbox"></i> </div>
                <div class="side-menu__title"> Fakultetlar </div>
            </a>
        </li>

        <li>
            <a href="{{ route('kafedralar.index') }}"
                class="side-menu side-menu{{ request()->is('kafedralar*') ? '--active' : '' }}">
                <div class="side-menu__icon"> <i data-feather="inbox"></i> </div>
                <div class="side-menu__title"> Kafedralar </div>
            </a>
        </li>

        <li>
            <a href="{{ route('ilmiy_izlanuvchi.index') }}"
                class="side-menu side-menu{{ request()->is('ilmiy-izlanuvchi*') ? '--active' : '' }}{{ request()->is('izlanuvchilar*') ? '--active' : '' }}">
                <div class="side-menu__icon"> <i data-feather="inbox"></i> </div>
                <div class="side-menu__title"> Ilmiy izlanuvchilar </div>
            </a>
        </li>

        <li>
            <a href="{{ route('asbobuskuna.index') }}"
                class="side-menu side-menu{{ request()->is('asbobuskuna*') ? '--active' : '' }}">
                <div class="side-menu__icon"> <i data-feather="inbox"></i> </div>
                <div class="side-menu__title"> Asbob-uskunalar</div>
            </a>
        </li>

        <li>
            <a href="{{ route('stajirovka.index') }}"
                class="side-menu side-menu{{ request()->is('stajirovka*') ? '--active' : '' }}">
                <div class="side-menu__icon"> <i data-feather="inbox"></i> </div>
                <div class="side-menu__title"> Stajirovka </div>
            </a>
        </li>
        @endrole

        @role('kafedra_mudiri')

        <li>
            <a href="{{ route('kafedralar_xodimlar.index') }}"
                class="side-menu side-menu{{ request()->is('kafedralar-user*') ? '--active' : '' }}{{ request()->is('xodimlar*') ? '--active' : '' }}">
                <div class="side-menu__icon"> <i data-feather="users"></i> </div>
                <div class="side-menu__title"> Xodimlar </div>
            </a>
        </li>
        <li>
            <a href="{{ route('kafedralar_ilmiyloyiha.index') }}"
                class="side-menu side-menu{{ request()->is('ilmiyloyiha*') ? '--active' : '' }}{{ request()->is('kafedralar-ilmiyloyhi*') ? '--active' : '' }}">
                <div class="side-menu__icon"> <i data-feather="file-text"></i> </div>
                <div class="side-menu__title"> Ilmiy loyihalar </div>
            </a>
        </li>
        <li>
            <a href="{{ route('kafedralar_xujalik.index') }}"
                class="side-menu side-menu{{ request()->is('kafedralar-xujalik*') ? '--active' : '' }}{{ request()->is('xujalik*') ? '--active' : '' }}">
                <div class="side-menu__icon"> <i data-feather="file-text"></i> </div>
                <div class="side-menu__title"> Xo'jalik shartnomalari </div>
            </a>
        </li>

        <li>
            <a href="{{ route('ilmiymaqolalar.index') }}"
                class="side-menu side-menu{{ request()->is('ilmiymaqolalar*') ? '--active' : '' }}">
                <div class="side-menu__icon"> <i data-feather="file-text"></i> </div>
                <div class="side-menu__title"> Ilmiy maqolalar </div>
            </a>
        </li>

        <li>
            <a href="{{ route('ilmiytezislar.index') }}"
                class="side-menu side-menu{{ request()->is('ilmiytezislar*') ? '--active' : '' }}">
                <div class="side-menu__icon"> <i data-feather="file-text"></i> </div>
                <div class="side-menu__title"> Ilmiy tezislar</div>
            </a>
        </li>

        <li>
            <a href="{{ route('intellektualmulk.index') }}"
                class="side-menu side-menu{{ request()->is('intellektualmulk*') ? '--active' : '' }}">
                <div class="side-menu__icon"> <i data-feather="file-text"></i> </div>
                <div class="side-menu__title"> Intellektual mulk </div>
            </a>
        </li>

        <li>
            <a href="{{ route('dalolatnoma.index') }}"
                class="side-menu side-menu{{ request()->is('dalolatnoma*') ? '--active' : '' }}">
                <div class="side-menu__icon"> <i data-feather="file-text"></i> </div>
                <div class="side-menu__title"> Dalolatnomalar </div>
            </a>
        </li>

        <li>
            <a href="{{ route('monografiyalar.index') }}"
                class="side-menu side-menu{{ request()->is('monografiyalar*') ? '--active' : '' }}">
                <div class="side-menu__icon"> <i data-feather="file-text"></i> </div>
                <div class="side-menu__title"> Monografiyalar </div>
            </a>
        </li>





        <!-- <li>
            <a href="{{ route('kafedra.index') }}"
                class="side-menu side-menu{{ request()->is('kafedra') ? '--active' : '' }}{{ request()->is('izlanuvchilar*') ? '--active' : '' }}">
                <div class="side-menu__icon"> <i data-feather="inbox"></i> </div>
                <div class="side-menu__title"> Kafedra </div>
            </a>
        </li> -->



        @endrole

        @role('labaratoriyaga_masul')
        <li>
            <a href="{{ route('lab_xodimlar.index') }}"
                class="side-menu side-menu{{ request()->is('lab-user*') ? '--active' : '' }}{{ request()->is('xodimlar*') ? '--active' : '' }}">
                <div class="side-menu__icon"> <i data-feather="users"></i> </div>
                <div class="side-menu__title"> Xodimlar </div>
            </a>
        </li>
        <li>
            <a href="{{ route('lab_ilmiyloyiha.index') }}"
                class="side-menu side-menu{{ request()->is('lab-ilmiyloyhi*') ? '--active' : '' }}{{ request()->is('ilmiyloyiha*') ? '--active' : '' }}">
                <div class="side-menu__icon"> <i data-feather="file-text"></i> </div>
                <div class="side-menu__title"> Ilmiy loyihalar </div>
            </a>
        </li>
        <li>
            <a href="{{ route('lab_xujalik.index') }}"
                class="side-menu side-menu{{ request()->is('lab-xujalik*') ? '--active' : '' }}{{ request()->is('xujalik*') ? '--active' : '' }}">
                <div class="side-menu__icon"> <i data-feather="file-text"></i> </div>
                <div class="side-menu__title"> Xo'jalik shartnomalari </div>
            </a>
        </li>
        <li>
            <a href="{{ route('izlanuvchilar.index') }}"
                class="side-menu side-menu{{ request()->is('izlanuvchilar*') ? '--active' : '' }}">
                <div class="side-menu__icon"> <i data-feather="file-text"></i> </div>
                <div class="side-menu__title">Ilmiy izlanuvchilar </div>
            </a>
        </li>
        <li>
            <a href="{{ route('asbobuskuna.index') }}"
                class="side-menu side-menu{{ request()->is('asbobuskuna*') ? '--active' : '' }}">
                <div class="side-menu__icon"> <i data-feather="inbox"></i> </div>
                <div class="side-menu__title"> Asbob-uskunalar</div>
            </a>
        </li>
        <li>
            <a href="{{ route('laboratoriya.index') }}"
                class="side-menu side-menu{{ request()->is('laborator*') ? '--active' : '' }}">
                <div class="side-menu__icon"> <i data-feather="inbox"></i> </div>
                <div class="side-menu__title"> Labaratoriya </div>
            </a>
        </li>
        @endrole
        @role(['admin', 'Xodimlar_uchun_masul'])
        <li>
            <a href="{{ route('xodimlar.index') }}"
                class="side-menu side-menu{{ request()->is('xodimlar*') ? '--active' : '' }}">
                <div class="side-menu__icon"> <i data-feather="users"></i> </div>
                <div class="side-menu__title"> Xodimlar </div>
            </a>
        </li>
        @endrole

        @role(['admin', 'Ilmiy_faoliyat_uchun_masul'])
        <li>
            <a href="{{ route('ilmiyloyiha.index') }}"
                class="side-menu side-menu{{ request()->is('ilmiyloyiha*') ? '--active' : '' }}">
                <div class="side-menu__icon"> <i data-feather="file-text"></i> </div>
                <div class="side-menu__title"> Ilmiy loyihalar </div>
            </a>
        </li>
        @endrole


        @role(['Ilmiy_loyiha_rahbari'])
        <li>
            <a href="{{ route('scientific_project.index') }}"
                class="side-menu side-menu{{ request()->is('scientific-project*') ? '--active' : '' }}{{ request()->is('ilmiyloyiha*') ? '--active' : '' }}">
                <div class="side-menu__icon"> <i data-feather="file-text"></i> </div>
                <div class="side-menu__title"> Ilmiy loyihalar </div>
            </a>
        </li>
        @endrole

        @role(['admin', 'Ilmiy_faoliyat_uchun_masul'])
        <li>
            <a href="{{ route('xujalik.index') }}"
                class="side-menu side-menu{{ request()->is('xujalik*') ? '--active' : '' }}">
                <div class="side-menu__icon"> <i data-feather="file-text"></i> </div>
                <div class="side-menu__title"> Xo'jalik loyihalar </div>
            </a>
        </li>
        @endrole


        <!-- end admin -->
        <!-- Itm lar uchun -->
        @role('Itm-tashkilotlar')
        <li>
            <a href="javascript:;"
                class="side-menu side-menu{{ request()->is('tashkilot*') ? '--active' : '' }}{{ request()->is('iqtisodiy*') ? '--active' : '' }}{{ request()->is('itmtashkilot') ? '--active' : '' }}{{ request()->is('itmiqtisodiy') ? '--active' : '' }}{{ request()->is('itmtashkilotrahbari') ? '--active' : '' }}">
                <div class="side-menu__icon"> <i data-feather="box"></i> </div>
                <div class="side-menu__title"> Tashkilot pasporti <i data-feather="chevron-down"
                        class="side-menu__sub-icon"></i> </div>
            </a>
            <ul
                class="{{ request()->is('tashkilot*') ? 'side-menu__sub-open' : '' }}{{ request()->is('iqtisodiy*') ? 'side-menu__sub-open' : '' }}{{ request()->is('itmiqtisodiy') ? 'side-menu__sub-open' : '' }}{{ request()->is('itmtashkilot') ? 'side-menu__sub-open' : '' }}{{ request()->is('itmtashkilotrahbari') ? 'side-menu__sub-open' : '' }}">
                <li>
                    <a href="{{ route('itm.tashkilot') }}"
                        class="side-menu side-menu{{ request()->is('tashkilot*') ? '--active' : '' }}{{ request()->is('itmtashkilot*') ? '--active' : '' }}">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> Tashkilot pasportini to'ldirish </div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('itm.iqtisodiy') }}"
                        class="side-menu side-menu{{ request()->is('iqtisodiy*') ? '--active' : '' }}{{ request()->is('itmiqtisodiy*') ? '--active' : '' }}">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> Iqtisodiy moliyaviy faoliyat </div>
                    </a>
                </li>

                <li>
                    <a href="{{ route('itm.tashkilotrahbari') }}"
                        class="side-menu side-menu{{ request()->is('tashkilotrahbari*') ? '--active' : '' }}{{ request()->is('itmtashkilotrahbari*') ? '--active' : '' }}">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> Tashkilot rahbari </div>
                    </a>
                </li>
            </ul>
        </li>

        <li>
            <a href="{{ route('itm.xodimlar') }}"
                class="side-menu side-menu{{ request()->is('xodimlar*') ? '--active' : '' }}{{ request()->is('itmxodimlar*') ? '--active' : '' }}">
                <div class="side-menu__icon"> <i data-feather="users"></i> </div>
                <div class="side-menu__title"> Xodimlar </div>
            </a>
        </li>

        <li>
            <a href="{{ route('itm.ilmiyloyiha') }}"
                class="side-menu side-menu{{ request()->is('ilmiyloyiha*') ? '--active' : '' }}{{ request()->is('itmilmiyloyiha*') ? '--active' : '' }}">
                <div class="side-menu__icon"> <i data-feather="file-text"></i> </div>
                <div class="side-menu__title"> Ilmiy loyihalar </div>
            </a>
        </li>

        <li>
            <a href="{{ route('itm.xujalik') }}"
                class="side-menu side-menu{{ request()->is('xujalik*') ? '--active' : '' }}{{ request()->is('itmxujalik*') ? '--active' : '' }}">
                <div class="side-menu__icon"> <i data-feather="file-text"></i> </div>
                <div class="side-menu__title"> Xo'jalik loyihalar </div>
            </a>
        </li>
        <li>
            <a href="{{ route('itm.adminlar') }}"
                class="side-menu side-menu{{ request()->is('itmadminlar*') ? '--active' : '' }}">
                <div class="side-menu__icon"> <i data-feather="file-text"></i> </div>
                <div class="side-menu__title">Tashkilot adminlar </div>
            </a>
        </li>

        {{-- <li>
            <a href="{{ route(" itm.ilmiydaraja") }}"
                class="side-menu side-menu{{ request()->is('ilmiydaraja*') ? '--active':'' }}{{ request()->is('itmilmiydaraja*') ? '--active':'' }}">
                <div class="side-menu__icon"> <i data-feather="file-text"></i> </div>
                <div class="side-menu__title"> Ilmiy loyiha bilan ta'minlanganmi </div>
            </a>
        </li> --}}
        @endrole
        <!-- tugadi Itm lar uchun -->

        @role(['super-admin', 'test-uchun'])
        <li>
            <a href="{{ route('ilmiymaqolalars.index') }}"
                class="side-menu side-menu{{ request()->is('ilmiymaqolalar*') ? '--active' : '' }}">
                <div class="side-menu__icon"> <i data-feather="file-text"></i> </div>
                <div class="side-menu__title"> Ilmiy maqolalar </div>
            </a>
        </li>

        <li>
            <a href="{{ route('ilmiytezislars.index') }}"
                class="side-menu side-menu{{ request()->is('ilmiytezislar*') ? '--active' : '' }}">
                <div class="side-menu__icon"> <i data-feather="file-text"></i> </div>
                <div class="side-menu__title"> Ilmiy tezislar</div>
            </a>
        </li>

        <li>
            <a href="{{ route('intellektualmulks.index') }}"
                class="side-menu side-menu{{ request()->is('intellektualmulk*') ? '--active' : '' }}">
                <div class="side-menu__icon"> <i data-feather="file-text"></i> </div>
                <div class="side-menu__title"> Intellektual mulk </div>
            </a>
        </li>

        <li>
            <a href="{{ route('dalolatnomas.index') }}"
                class="side-menu side-menu{{ request()->is('dalolatnoma*') ? '--active' : '' }}">
                <div class="side-menu__icon"> <i data-feather="file-text"></i> </div>
                <div class="side-menu__title"> Dalolatnomalar </div>
            </a>
        </li>

        <li>
            <a href="{{ route('monografiyalars.index') }}"
                class="side-menu side-menu{{ request()->is('monografiyalar*') ? '--active' : '' }}">
                <div class="side-menu__icon"> <i data-feather="file-text"></i> </div>
                <div class="side-menu__title"> Monografiyalar </div>
            </a>
        </li>

        <li>
            <a href="{{ route('asbobuskunalar.index') }}"
                class="side-menu side-menu{{ request()->is('asbobuskuna*') ? '--active' : '' }}">
                <div class="side-menu__icon"> <i data-feather="inbox"></i> </div>
                <div class="side-menu__title"> Asbob-uskunalar</div>
            </a>
        </li>
        <li>
            <a href="{{ route('stajirovkalar.index') }}"
                class="side-menu side-menu{{ request()->is('stajirovka*') ? '--active' : '' }}">
                <div class="side-menu__icon"> <i data-feather="inbox"></i> </div>
                <div class="side-menu__title"> Stajirovkalar</div>
            </a>
        </li>

        @endrole

        @role('Asbob_uskunalarga_masul')
        <li>
            <a href="{{ route('asbobuskuna.index') }}"
                class="side-menu side-menu{{ request()->is('asbobuskuna*') ? '--active' : '' }}">
                <div class="side-menu__icon"> <i data-feather="inbox"></i> </div>
                <div class="side-menu__title"> Asbob-uskunalar</div>
            </a>
        </li>
        @endrole

        <div class="side-nav__devider my-6"></div>
        <li>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <x-dropdown-link style="color: white;padding: 8px;margin-left: 16px;"
                    class="side-menu flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 rounded-md"
                    :href="route('logout')" onclick="event.preventDefault();
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
                <a href="{{ route('tashkilotlar.index') }}" class="side-menu side-menu{{ request()->is('tashkilotlar*') ? '--active' : '' }}">
                    <div class="side-menu__icon"> <i data-feather="inbox"></i> </div>
                    <div class="side-menu__title"> Tashkilotlar </div>
                </a>
            </li>
@endrole  -->

<!-- @role('super-admin')
    <li>
                <a href="{{ route('tashkilotrahbarilar.index') }}" class="side-menu side-menu{{ request()->is('tashkilotrahbarilar*') ? '--active' : '' }}">
                    <div class="side-menu__icon"> <i data-feather="inbox"></i> </div>
                    <div class="side-menu__title"> Tashkilotlar raxbarlar </div>
                </a>
            </li>
@endrole  -->
<!-- @role('super-admin')
    <li>
                <a href="{{ route('iqtisodiylar.index') }}" class="side-menu side-menu{{ request()->is('iqtisodiylar*') ? '--active' : '' }}">
                    <div class="side-menu__icon"> <i data-feather="inbox"></i> </div>
                    <div class="side-menu__title">Iqtisodiy Moliyaviy faoliyat </div>
                </a>
            </li>
@endrole  -->
