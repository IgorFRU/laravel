<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{$title. '. ' . $description}}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400&amp;subset=cyrillic-ext" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="{{ asset('js/main.js') }}" defer></script>

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
                            <li class="topmenu__work_today"><i class="fas fa-clock"></i> Сегодня до 18:00</li>
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
                        <div class="logo">
                            <div class="logo__body">
                                <a href="#">
                                    <h1>Паркетный Мир</h1>
                                </a>
                            </div>
                            <div class="logo__tagline">все виды паркета в Крыму по лучшим ценам</div>
                        </div>
                        <div class="fastmenu__location">
                            <ul>
                                <li><i class="fas fa-map-marker-alt"></i> Симферополь</li>
                                <li>пр. Победы, 129/2</li>
                            </ul>
                        </div>
                        <ul class="fastmenu__body__tel">

                            <li><a href="tel:+79788160166">8(978) 816 01 66</a></li>
                            <li class="fastmenu__body__tel__hide"><a href="tel:+79788808206">8(978) 880 82 06</a></li>

                            <li><a href="#" class="callme">Обратный звонок</a></li>
                        </ul>
                        <div class="fastmenu__body__right">
                            <div class="fastmenu__body__right__search">
                                <i class="fas fa-search"></i>
                                <div class="search__form">
                                    <form action="">
                                        <input type="search" placeholder="Поиск..." name="search">
                                    </form>
                                </div>

                            </div>
                            <div class="fastmenu__body__right__shopping_cart">
                                <i class="fas fa-shopping-cart"></i>
                                <span>5</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="fastmenu__tosmall">
                <span></span>
                <span></span>
                <p>Паркетный мир</p>
            </div>
        </div>
    </header>
    <menu class="mainmenu">
        <div class="mainmenu__burger">
            <div class="burger">Меню
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
        <ul class="mainmenu__ul">
            <li class="mainmenu__li"><a href="#" class="mainmenu__a"><i class="fas fa-home"></i></a></li>
            
            @forelse ($menus as $menu)
                <li class="mainmenu__li"><a href="#" class="mainmenu__a">{{ $menu->menu }}</a>
                    <ul>
                    @forelse ($categories as $category)
                        
                            @if ($category->menu_id == $menu->id)
                                <li><a href="/catalog/{{ $category->alias }}">{{ $category->title }}</a>
                                    <ul class="mainmenu__ul_to_right">
                                    @forelse ($categories as $category_child)
                                        @if ($category_child->parent_id == $category->id)                                            
                                            <li><a href="/catalog/{{ $category_child->alias }}">{{ $category_child->title }}</a>                                            
                                        @endif
                                    @empty                                        
                                    @endforelse
                                    </ul>   
                                </li>
                            @endif
                        
                    @empty                        
                    @endforelse
                    </ul>
                </li>
            @empty                
            @endforelse
        </ul>
    </menu>

    <!-- MENU END -->

    <main>

        @yield('content')
        
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
                </div>
            </div>
        </div>
-->

<script>
    const link_sort = document.querySelectorAll('.sortlink');
    link_sort.forEach(element => {
        element.addEventListener('click', (event) => {
            event.preventDefault();
            window.location.href = window.location.href + '/anyroute/?sort_column=' + element.dataset.sort_col + '&sort_type=' + element.dataset.sort_type;
        });
    });

</script>
</body>

</html>