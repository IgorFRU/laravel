<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://use.fontawesome.com/564e0d687f.js"></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <!--    <link href="{{ asset('css/app.css') }}" rel="stylesheet">-->
    <link href="{{ asset('css/admin/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
</head>

<body>

    <nav class="navbar">
        <!--
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
-->
        <!--
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
-->
        <!-- Left Side Of Navbar -->
        <div class="navbar__left">
            <ul>
                Пункты меню
                <div class="submenu">
                    <li><a href="#">Добавить пункт меню</a></li>
                    <li><a href="#">Удалить пункт меню</a></li>
                    <li><a href="#">Все пункты меню</a></li>
                </div>

            </ul>
            <ul>
                Магазин
                <div class="submenu">
                    <li><a href="#">Категории товаров</a><span class="count normal_count">9</span></li>
                    <li><a href="#">Товары</a><span class="count normal_count">980</span></li>
                    <li><a href="#">Производители</a><span class="count normal_count">19</span></li>
                    <li><a href="#">Характеристики</a></li>
                    <li><a href="#">Валюты</a></li>
                    <span class="separate"></span>
                    <li><a href="#">Заказы</a><span class="count alert_count">19</span></li>
                    <li><a href="#">Вопросы</a><span class="count alert_count">19</span></li>
                    <li><a href="#">Комментарии</a><span class="count normal_count">19</span></li>
                </div>
            </ul>
            <ul>
                <a href="#">Статистика</a>

            </ul>
        </div>
        <div class="navbar__right">
            <ul class="currency">
                <div class="currency__today">
                    Сегодня
                    <span class="currency__child"><i class="fa fa-usd" aria-hidden="true"></i><span class="currency__value">58.65</span><span class="currency__red"></span></span>
                    <span class="currency__child"><i class="fa fa-eur" aria-hidden="true"></i><span class="currency__value">68.65</span><span class="currency__green"></span></span>
                </div>
                <div class="currency__tomorrow submenu">
                    Завтра
                    <span><i class="fa fa-usd" aria-hidden="true"></i><span class="currency__value">59.65</span></span>
                    <span><i class="fa fa-eur" aria-hidden="true"></i><span class="currency__value">67.65</span></span>
                </div>
            </ul>
            <ul><a class="nav-link" href="{{ route('mainpage') }}">Перейти на сайт</a></ul>
            <ul>
                <!-- Authentication Links -->
                @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
                @endif
                @else
                <ul>
                    <a href="#">
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="submenu">
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </ul>
                @endguest





            </ul>

        </div>
    </nav>

    <main class="content90">
        @yield('content')
    </main>

</body>

</html>