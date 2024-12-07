<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/css/app.css')
    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.8/dist/cdn.min.js"></script>
    {{-- @vite(['resources/js/modalka.js']) --}}
    @stack('scripts')
    <!-- Styles --> 

</head>

<body class="bg-orange-50 container grid justify-items-center md:space-y-1.5 w-screen-2xl text-sm">
    <a href="{{ url('/') }}"><img class="w-full" src="/images/header11.jpg"></a>

    {{-- mobile --}}

    <div x-data="{ 'showModal': false }" @keydown.escape="showModal = false">
        <div class="lg:hidden grid grid-cols-3 mt-3 w-5/6">
            <button type="button"
                class="z-1 bg-orange-100 w-10 h-10 rounded-xl grid grid-rows-3 justify-center items-center"
                @click="showModal = true">
                <div class="w-6 h-0.5 bg-orange-400 self-end"></div>
                <div class="w-6 h-0.5 bg-orange-400"></div>
                <div class="w-6 h-0.5 bg-orange-400 self-start"></div>
            </button>
            <input class="border-orange-400 col-span-2 rounded-xl" value="Поиск">
        </div>
        <div class="z-30 fixed inset-0 bg-orange-100" x-show="showModal">
            <!-- Burger-menu inner -->

            <div class="flex flex-col items-center justify-between divide-y-2">
                <button type="button" class="bg-red-300 p-0.5 m-1 rounded-lg z-50 cursor-pointer"
                    @click="showModal = false">
                    Закрыть
                </button>
                <a href="{{ url('/') }}" class="p-2 border-orange-400 w-full {{ active_link('main') }}"><img
                        class="w-7 inline pr-1 mb-1 -ml-0.5" src="/images/home.png">Главная</a>
                <a href="{{ url('/noutbooks') }}"
                    class="p-2 border-orange-400 w-full {{ active_link('noutbooks') }}"><img class="w-6 inline pr-1"
                        src="/images/nout.png">Ноутбуки</a>
                <a href="{{ url('/refries') }}" class="p-2 border-orange-400 w-full {{ active_link('refries') }}"><img
                        class="w-6 inline pr-1" src="/images/refri.png">Холодильники</a>
                <a href="{{ url('/smartphones') }}"
                    class="p-2 border-orange-400 w-full {{ active_link('smartphones') }}"><img class="w-6 inline pr-1"
                        src="/images/smart.png">Смартфоны</a>
                @if (Route::has('login'))
                    @auth
                        <a class="p-2 border-orange-400 w-full {{ active_link('dashboard') }}"
                            href="{{ url('/dashboard') }}">
                            Dashboard
                        </a>
                    @else
                        <a class="p-2 border-orange-400 w-full {{ active_link('login') }}"
                            href="{{ route('login') }}"><img class="w-6 inline pr-1" src="/images/log_in.png">
                            Войти
                        </a>
                        @if (Route::has('register'))
                            <a class="p-2 border-orange-400 w-full {{ active_link('register') }}"
                                href="{{ route('register') }}"><img class="w-6 inline pr-1" src="/images/registration.png">
                                Зарегистрироваться
                            </a>
                        @endif
                    @endauth
                @endif
            </div>
        </div>
    </div>

    {{-- tablet and desctop --}}

    <nav class="hidden lg:block grid col-auto grid-flow-dense space-x-3">
        <a href="{{ route('main') }}"
            class="bg-orange-200 hover:bg-orange-400 p-1.5 rounded-lg {{ active_link('main') }}"><img
                class="w-7 inline pr-1 mb-1" src="/images/home.png">Главная</a>
        <a href="{{ route('noutbooks') }}"
            class="bg-orange-200 hover:bg-orange-400 p-1.5 rounded-lg {{ active_link('noutbooks') }}"><img
                class="w-6 inline pr-1" src="/images/nout.png">Ноутбуки</a>
        <a href="{{ route('refries') }}"
            class="bg-orange-200 hover:bg-orange-400 p-1.5 rounded-lg {{ active_link('refries') }}"><img
                class="w-6 inline pr-1" src="/images/refri.png">Холодильники</a>
        <a href="{{ route('smartphones') }}"
            class="bg-orange-200 hover:bg-orange-400 p-1.5 rounded-lg {{ active_link('smartphones') }}"><img
                class="w-6 inline pr-1" src="/images/smart.png">Смартфоны</a>
        @if (Route::has('login'))
            @auth
                <a class="bg-orange-200 hover:bg-orange-400 p-1.5 rounded-lg {{ active_link('dashboard') }}"
                    href="{{ url('/dashboard') }}">
                    Dashboard
                </a>
            @else
                <a class="bg-orange-200 hover:bg-orange-400 p-1.5 rounded-lg {{ active_link('login') }}"
                    href="{{ route('login') }}"> <img class="w-6 inline pr-1" src="/images/log_in.png">
                    Войти
                </a>
                @if (Route::has('register'))
                    <a class="bg-orange-200 hover:bg-orange-400 p-1.5 rounded-lg {{ active_link('register') }}"
                        href="{{ route('register') }}"> <img class="w-6 inline pr-1" src="/images/registration.png">
                        Зарегистрироваться
                    </a>
                @endif
            @endauth
        @endif
    </nav>

    @yield('content')

    <footer
        class="max-md:divide-y-2 bg-orange-100 grid grid-cols-1 gap-y-2 md:grid-cols-4 place-items-center place-content-around mt-5 py-2 w-full">
        <div class="w-9/12 border-orange-400 text-center">Телефон:<br>
            <a href="tel:+375298557134">+37529-855-71-34</a>
        </div>
        <div class="w-9/12 pt-1 border-orange-400 text-center">Электронная почта:<br>
            <a href="mailto:serbegiyan@gmail.com">serbegiyan@gmail.com</a></div>
        <div class="w-9/12 pt-1 border-orange-400 text-center">Разработчик:<br> &copy; Sergey Begiyan</div>
        <div class="w-9/12 pt-1 border-orange-400 text-center">
            <a href="#">Карта сайта</a></div>
    </footer>
   

</body>

</html>
