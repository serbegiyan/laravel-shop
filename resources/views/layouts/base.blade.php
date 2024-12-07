<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/user_number.js', 'resources/js/take_number_list.js'])
    <title>@yield('title')</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet"/>
    @stack('scripts')
    <!-- Styles -->
</head>

<body class="bg-orange-50 container grid justify-items-center md:space-y-1.5 w-screen-2xl text-sm">
<a href="{{ route('main') }}"><img alt="" class="w-full" src="/images/header11.jpg"></a>

{{-- mobile --}}

<div class="lg:hidden md:hidden flex flex-row gap-3 mt-3 w-full">
    <div x-data="{ 'showModal': false }" @keydown.escape="showModal = false">
        <button type="button"
                class="bg-orange-100 w-10 h-10 rounded-xl grid grid-rows-3 justify-center items-center ml-1"
                @click="showModal = true">
            <div class="w-6 h-0.5 bg-orange-400 self-end"></div>
            <div class="w-6 h-0.5 bg-orange-400"></div>
            <div class="w-6 h-0.5 bg-orange-400 self-start"></div>
        </button>

        <div class="z-30 fixed inset-0 bg-orange-100" x-show="showModal">
            <!-- Burger-menu inner -->

            <div class="flex flex-col items-center justify-between divide-y-2">
                <button type="button" class="bg-red-300 p-1 m-1 rounded-lg z-50 cursor-pointer"
                        @click="showModal = false">
                    Закрыть
                </button>
                <a href="{{ route('main') }}" class="p-2 border-orange-400 w-full {{ active_link('main') }}">
                    <img alt="" class="w-7 inline pr-1 mb-1 -ml-0.5" src="/images/home.png">Главная
                </a>
                <a href="{{ route('noutbooks.index') }}" class="p-2 border-orange-400 w-full {{ active_link('noutbooks.index') }}">
                    <img alt="" class="w-6 inline pr-1" src="/images/nout.png">Ноутбуки
                </a>
                <a href="{{ route('refries.index') }}" class="p-2 border-orange-400 w-full {{ active_link('refries.index') }}">
                    <img alt="" class="w-6 inline pr-1" src="/images/refri.png">Холодильники
                </a>
                <a href="{{ route('smartphones.index') }}" class="p-2 border-orange-400 w-full {{ active_link('smartphones.index') }}">
                    <img alt="" class="w-6 inline pr-1" src="/images/smart.png">Смартфоны
                </a>
                @if (Route::has('login'))
                    @auth
                        <a class="p-2 border-orange-400 w-full {{ active_link('dashboard') }}"
                           href="{{ route('dashboard') }}">
                            Dashboard
                        </a>
                        <a class="p-2 border-orange-400 w-full">
                            Выйти
                        </a>
                    @else
                        <a class="p-2 border-orange-400 w-full {{ active_link('login') }}"
                           href="{{ route('login') }}"><img alt="" class="w-6 inline pr-1" src="/images/log_in.png">
                            Войти
                        </a>
                        @if (Route::has('register'))
                            <a class="p-2 border-orange-400 w-full {{ active_link('register') }}"
                               href="{{ route('register') }}"><img alt="" class="w-6 inline pr-1"
                                                                   src="/images/registration.png">
                                Зарегистрироваться
                            </a>
                        @endif
                    @endauth
                @endif
                <form class="p-2 border-orange-400 w-full"
                      action="{{ route('basket.index') }}" method="GET">
                    <input class="hidden user_number" name="user_number" value="">
                    <button type="submit" class="{{ active_link('basket.index')}}">
                        <img alt="" class="w-6 inline pr-1" src="/images/basket.png">Корзина
                        @if($all_purchases != '')
                            <span class="bg-red-500 p-1 text-white rounded-3xl text-xs">{{$all_purchases}}</span>
                        @endif
                    </button>

                </form>
            </div>
        </div>
    </div>
    @yield('filter')
</div>
{{-- tablet and desctop --}}

<nav class="hidden lg:block md:flex md:flex-wrap md:space-y-2 space-x-3 justify-center">
    <a href="{{ route('main') }}"
       class="bg-orange-200  hover:bg-orange-400 mt-2 p-1.5 rounded-lg {{ active_link('main') }}">
        <img alt="" class="w-6 inline pr-1 mb-1" src="/images/home.png">Главная
    </a>
    <a href="{{ route('noutbooks.index') }}"
       class="bg-orange-200 hover:bg-orange-400 p-1.5 rounded-lg {{ active_link('noutbooks.index') }}">
        <img alt="" class="w-6 inline pr-1" src="/images/nout.png">Ноутбуки
    </a>
    <a href="{{ route('refries.index') }}"
       class="bg-orange-200 hover:bg-orange-400 p-1.5 rounded-lg {{ active_link('refries.index') }}">
        <img alt="" class="w-6 inline pr-1" src="/images/refri.png">Холодильники
    </a>
    <a href="{{ route('smartphones.index') }}"
       class="bg-orange-200 hover:bg-orange-400 p-1.5 rounded-lg {{ active_link('smartphones.index') }}">
        <img alt="" class="w-6 inline pr-1" src="/images/smart.png">Смартфоны
    </a>
    @if (Route::has('login'))
        @auth
            <a class="bg-orange-200 hover:bg-orange-400 p-1.5 rounded-lg {{ active_link('dashboard') }}"
               href="{{ route('dashboard') }}">
                Профиль
            </a>
        @else
            <a class="bg-orange-200 hover:bg-orange-400 p-1.5 rounded-lg {{ active_link('login') }}"
               href="{{ route('login') }}">
                <img alt="" class="w-6 inline pr-1" src="/images/log_in.png">
                Войти
            </a>
            @if (Route::has('register'))
                <a class="bg-orange-200 hover:bg-orange-400 p-1.5 rounded-lg {{ active_link('register') }}"
                   href="{{ route('register') }}">
                    <img alt="" class="w-6 inline pr-1" src="/images/registration.png">
                    Зарегистрироваться
                </a>
            @endif
        @endauth
    @endif

    <form class="inline bg-orange-200 hover:bg-orange-400 p-1.5 rounded-lg w-fit"
          action="{{ route('basket.index') }}" method="GET">
        <input class="hidden user_number" name="user_number" value="">
        <button type="submit" class="{{ active_link('basket.index')}}">
            <img alt="" class="w-6 inline pr-1" src="/images/basket.png">Корзина
            @if($all_purchases != '')
            <span class="bg-red-500 p-1 text-white rounded-3xl text-xs">{{$all_purchases}}</span>
            @endif
        </button>
    </form>

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
