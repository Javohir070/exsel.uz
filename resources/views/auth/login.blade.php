<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="block xl:grid grid-cols-2 gap-4">
        <!-- BEGIN: Login Info -->
        <div class="hidden xl:flex flex-col min-h-screen">
            <a href="" class="intro-x flex items-center pl-5 pt-4">
                <img width="40px" alt="Midone Tailwind HTML Admin Template" class="w-10"
                    src="/admin/dist/images/logo.png">
                <span class="hidden xl:block text-white text-lg ml-3 w-40" style="font-size: 12px; "> Ilmiy-innovatsion
                    faoliyat monitoringi tizimi </span>
            </a>
            <div class="my-auto">
                <img alt="Midone Tailwind HTML Admin Template" class="-intro-x w-1/2 -mt-16"
                    src="/admin/dist/images/illustration.svg">
                <div class="-intro-x text-white font-medium text-4xl leading-tight mt-10">
                    Ilmiy-innovatsion faoliyat monitoringi tizimi


                </div>
                <!-- <div class="-intro-x mt-5 text-lg text-white">Barcha elektron tijorat hisoblaringizni bitta joydan boshqaring</div> -->
            </div>
        </div>
        <style>
            .toggle-password {
                cursor: pointer;
            }
        </style>
        <!-- END: Login Info -->
        <!-- BEGIN: Login Form -->
        <div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0">
            <div
                class="my-auto mx-auto xl:ml-20 bg-white xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
                <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">
                    Tizimga kirish
                </h2>
                <div class="intro-x mt-2 text-gray-500 xl:hidden text-center">Hisobingizga kirish uchun yana bir necha
                    marta bosing. Barcha elektron tijorat hisoblaringizni bitta joydan boshqaring</div>
                <form method="POST" action="{{ route('login') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <div class="intro-x mt-8">
                        <input type="email" name="email"
                            class="intro-x login__input input input--lg border border-gray-300 block"
                            placeholder="Email">
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        <!-- <span id="toggle-password" class="toggle-password">👁️</span> -->
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />

                        <div class="relative mt-2">
                            <input type="password" id="password"
                                class="nput pr-12 w-full border col-span-4 intro-x login__input input input--lg border border-gray-300 block mt-4"
                                name="password" required autocomplete="current-password" placeholder="Password">
                            <!-- <input type="text" class="input pr-12 w-full border col-span-4" placeholder="Price"> -->
                            <div class="absolute top-0 right-0 rounded-r w-10 h-full flex items-center justify-center bg-gray-100 border text-gray-600"
                                style="z-index: 999;"> <span id="toggle-password" class="toggle-password">👁️</span>
                            </div>
                        </div>
                    </div>
                    <div class="intro-x flex text-gray-700 text-xs sm:text-sm mt-4">
                        <div class="flex items-center mr-auto">
                            <input type="checkbox" class="input border mr-2" id="remember-me">
                            <label class="cursor-pointer select-none" for="remember-me">Eslab qolish </label>
                        </div>
                        <a href="">Parolni unutdingizmi?</a>
                    </div>
                    <div class="intro-x mt-5 xl:mt-8 text-center xl:text-left">
                        <button type="submit"
                            class="button button--lg w-full xl:w-32 text-white bg-theme-1 xl:mr-3">Kirish</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- END: Login Form -->
    </div>
    <script>
        const togglePassword = document.querySelector('#toggle-password');
        const passwordInput = document.querySelector('#password');

        togglePassword.addEventListener('click', function (e) {
            // Toggle the type attribute
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            // Toggle the eye icon
            this.textContent = type === 'password' ? '👁️' : '👁️‍🗨️';
        });
    </script>
</x-guest-layout>