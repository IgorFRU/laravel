<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title }}</title>
<!--    <title>{{ config('app.name', 'Laravel') }}</title>-->

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/core.js') }}" defer></script>
    
    @isset($add_js)
        <script src="{{ asset($add_js) }}" defer></script>
    @endisset
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
       @section('menu')
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
                    <li><a href="{{ route('admin.menu.index') }}">Все пункты меню</a></li>
                    <li><a href="{{ route('admin.menu.create') }}">Добавить пункт меню</a></li>
                </div>

            </ul>
            <ul>
                Магазин
                <div class="submenu">
                    <li><a href="{{ route('admin.category.index') }}">Категории</a>
                        <span class="count normal_count">{{ $categories_published }}</span>
                    </li>

                    <li><a href="{{ route('admin.product.index') }}">Товары</a><span class="count normal_count">{{ $products_published }}</span></li>
                    <li><a href="{{ route('admin.manufacture.index') }}">Производители</a><span class="count normal_count">{{ $manufactures_published }}</span></li>
                    <li><a href="#">Характеристики</a></li>
                    <li><a href="{{ route('admin.currency.index') }}">Валюты</a><span class="count normal_count">{{ $currencies_published }}</span></li>
                    <li><a href="{{ route('admin.unit.index') }}">Ед. изм.</a></li>
                    <li><a href="{{ route('admin.rebate.index') }}">Правила скидок</a></li>
                    <span class="separate"></span>
                    <li><a href="#">Заказы</a><span class="count alert_count">19</span></li>
                    <li><a href="#">Вопросы</a><span class="count alert_count">19</span></li>
                    <li><a href="#">Комментарии</a><span class="count normal_count">19</span></li>
                </div>
            </ul>
            <ul>
                Статьи
                <div class="submenu">
                    <li><a href="{{ route('admin.article.index') }}">Все статьи</a></li>
                    <li><a href="{{ route('admin.article.create') }}">Добавить статью</a></li>
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
                    @foreach ($cbrToday as $key=>$value)
                    <span class="currency__child"> 
                        <i class="fa fa-{{strtolower($value->currency->currency) ?? ''}}" aria-hidden="true"></i>
                        <span class="currency__value">{{ $value->value ?? '-' }}</span>
                        <span                    
                        @if($value->value != -1)
                            @if(count($cbrTomorrow))
                                @if($value->value < $cbrTomorrow[$key]->value)
                                    class="currency__red" 
                                @elseif($value->value > $cbrTomorrow[$key]->value)
                                    class="currency__green"  
                                @else                       
                                    class="currency__grey"                        
                                @endif
                            @endif                                   
                        @else                       
                            class="currency__grey"                       
                        @endif>
                        </span>
                    </span>
                    @endforeach   
                </div>
                @if(count($cbrTomorrow))
                <div class="currency__tomorrow submenu">
                        Завтра
                        @foreach ($cbrTomorrow as $value)
                        <span>
                            <i class="fa fa-{{strtolower($value->currency->currency) ?? ''}}" aria-hidden="true"></i>
                            <span class="currency__value">{{ $value->value ?? '-' }}</span>
                        </span>    
                        @endforeach
                </div>
                @endif
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
        @show
    </nav>

    <main class="content90">
        @yield('content')
    </main>
    <footer>
        @yield('footer')
    </footer>
</body>

</html>
