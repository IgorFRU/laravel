<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Паркетный мир</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400&amp;subset=cyrillic-ext" rel="stylesheet">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">

    </head>
    <body>

    <!-- MENU START -->
    <header>
        <div class="menu">
            <div class="topmenu">
                <div class="wrap">
                    <div class="topmenu__body">
                        <div class="topmenu__left">
                            <a href="#">О нас</a>
                            <a href="#">Доставка</a>
                            <a href="#">Оплата</a>
                            <a href="#">Контакты</a>
                            <a href="#">Статьи</a>
                            <a href="#" class="topmenu__left__red">Акции</a>
                        </div>


                        <div>
                            <li class="topmenu__work_today"><i class="fas fa-clock"></i>
    Сегодня до 18:00</li>
                            <div>
                                <ul>
                                    <li>ПН-ПТ: 09:00 - 18:00</li>
                                    <li>СБ: 09:00 - 16:00</li>
                                    <li class="redtext">ВС: ВЫХОДНОЙ</li>
                                </ul>
                            </div>
                        </div>
                        <div class="topmenu__right">
                            <a href="#"><i class="fas fa-sign-in-alt"></i>  Вход</a>
                            <a href="#"><i class="fas fa-user-plus"></i>  Регистрация</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="fastmenu">
                <div class="wrap">
                    <div class="fastmenu__body">
                       <ul>
                            <li>Паркетный Мир</li>
                            <li>все виды паркета по лучшим ценам</li>
                        </ul>
                        <ul>
                            <li>Симферополь</li>
                            <li>пр. Победы, 129/2</li>
                        </ul>
                        <ul class="fastmenu__body__tel">
                            
                                <li>8(978) 816 01 66</li>
                                <li class="fastmenu__body__tel__hide">8(978) 880 82 06</li>
                            
                            <li><a href="#">Обратный звонок</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <menu class="mainmenu">
        <ul class="mainmenu__ul">
            <li class="mainmenu__li"><a href="#" class="mainmenu__a"><i class="fas fa-home"></i></a></li>
            <li class="mainmenu__li"><a href="#" class="mainmenu__a">Полы</a>
                <ul>
                    <li><a href="#">Паркет штучный</a></li>
                    <li><a href="#">Паркетная доска</a></li>
                    <li><a href="#">Массивная доска</a></li>
                    <li><a href="#">Ламинат</a></li>
                    <li><a href="#">Пробковый паркет</a></li>
                </ul>
            </li>
            <li class="mainmenu__li"><a href="#" class="mainmenu__a">Стены</a>
                <ul>
                    <li><a href="#">Пробковые стеновые панели</a></li>
                    <li><a href="#">Ламинированные стеновые панели</a></li>
                    <li><a href="#">Шпонированные стеновые панели</a></li>
                </ul>
            </li>
            <li class="mainmenu__li"><a href="#" class="mainmenu__a">Химия</a>
                <ul>
                    <li><a href="#">Клей для паркета</a></li>
                    <li><a href="#">Лак</a></li>
                    <li><a href="#">Масла и воски</a></li>
                    <li><a href="#">Клей для пробки</a></li>
                </ul>
            </li>
            <li class="mainmenu__li"><a href="#" class="mainmenu__a">Погонаж</a></li>
            <li class="mainmenu__li"><a href="#" class="mainmenu__a">Расходные материалы</a></li>
            <li class="mainmenu__li"><a href="#" class="mainmenu__a">Услуги</a>
                <ul>
                    <li><a href="#">Работы</a></li>
                    <li><a href="#">Аренда оборудования</a></li>
                </ul>
            </li>
        </ul>
    </menu>

    <!-- MENU END -->

    <main>
        <article>
            <div class="headarticle">
                <section class="headsection">
                    <div class="wrap content">
                        <h1>Продажа, укладка и ремонт паркета в Крыму</h1>
<!--
                        <div class="headsection__boxes">
                            <div class="headsection__box">
                                
                            </div>
                            <div class="headsection__box">
                                
                            </div>
                            <div class="headsection__box">
                                
                            </div>
                            <div class="headsection__box">
                                
                            </div>
                            <div class="headsection__box">
                                
                            </div>
                        </div>
-->
                    </div>
                </section>
            </div>
            <section>
                <div class="wrap content">
                    
                    14646
                </div>
            </section>
        </article>
        <aside>
            
        </aside>
    </main>
<!--
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Паркетный мир
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Documentation</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                    <a href="{{ URL::route('catalog') }}">Каталог товаров</a>
                </div>
            </div>
        </div>
-->
    </body>
</html>
