<div class="grid grid-cols-12 gap-6">
    <div class="col-span-12 xxl:col-span-12 grid grid-cols-12 gap-6">
        <!-- BEGIN: General Report -->
        <div class="col-span-12 mt-8">
            <div class="intro-y flex items-center h-10">
                <h2 class="text-lg font-medium truncate mr-5">
                    Tashkilot haqida qisqacha malumot
                </h2>
                <a href="" class="ml-auto flex text-theme-1"> <i data-feather="refresh-ccw" class="w-4 h-4 mr-3"></i>
                Ma'lumotlarni qayta yuklash </a>
            </div>
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
                    <a href="{{ route("lab_xujalik.index") }}">
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
                    <a href="{{ route("lab_xodimlar.index") }}">
                        <div class="report-box zoom-in">
                            <div class="box p-5">
                                <div class="flex">
                                    <i data-feather="users" class="report-box__icon text-theme-6"></i>
                                </div>
                                <div class="text-3xl font-bold leading-8 mt-6">{{ $lab_xodimlar }}</div>
                                <div class="text-base text-gray-600 mt-1">Xodimlar</div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-span-12 sm:col-span-6 xl:col-span-4 intro-y">
                    <a href="{{ route("izlanuvchilar.index") }}">
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
        </div>
    </div>
</div>
