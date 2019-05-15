@extends('layouts.main')

@section('content')
<article>
        {{-- <div class="headarticle">
            <section class="headsection">
                <div class="headsection__body">
                    <div class="headsection__body__left">
                        <h1>Продажа, укладка и ремонт паркета в Крыму</h1>
                        <h2 class="headsection__body__left__text">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veniam molestiae commodi non reprehenderit incidunt ex, beatae placeat, deleniti, cum veritatis amet nihil animi tenetur. Quasi repellat itaque, blanditiis nobis! Libero?
                        </h2>
                        <div class="headsection__btn">
                            <div class="btn main_btn">
                                <div class="main_btn__left">
                                    <i class="fas fa-ruble-sign"></i>
                                </div>
                                <div class="main_btn__right">
                                    Сделать заказ
                                </div>
                            </div>
                            <div class="btn help_btn">
                                <div class="help_btn__left">
                                    <i class="fas fa-question"></i>
                                </div>
                                <div class="help_btn__right">
                                    Консультация
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="headsection__body__right">
                    </div>
                </div>
            </section>
        </div>
        <section class="top1">
            <div class="wrap">
                <div class="top1__boxes">
                    <div class="top1_box">
                        <a href="#">
                            <img src={{asset('imgs/Tikovyie-polyi-v-vannoy.jpg')}} alt="">
                            <p>Паркет из тика в ванной комнате</p>
                        </a>
                    </div>
                    <div class="top1_box">
                        <a href="#">
                            <img src="imgs/Vyibelennaya-shirokaya-parketnaya-doska--1024x717.jpg" alt="">
                            <p>Масла OSMO - отличная защита деревянных фасадов</p>
                        </a>
                    </div>
                    <div class="top1_box">
                        <a href="#">
                            <img src="imgs/Tikovyie-polyi-v-vannoy.jpg" alt="">
                            <p>Паркет из тика в ванной комнате</p>
                        </a>
                    </div>
                </div>
            </div>
        </section>--}}
        <section class="products" id="firstsection">
            <div class="products__category" style="background-image: url({{ asset('imgs/444.jpg')}}); background-size: cover;">
                <div class="background_transparent_cover">
                    <div class="wrap">
                        <div class="products__category__title">
                            <h1>
                                {{ $title }}
                                
                            </h1>
                            <p>{{ $description }}</p>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="breadcrumbs">
                <div class="wrap">
                    breadcrumbs
                </div>
                
            </div>            
            <div class="wrap"> 
                @forelse ($products as $product)
                    <div class="products__cards">
                        <div class="products__card">
                            <div class="products__card__image">
                                <img src="{{ asset('imgs/Vyibelennaya-shirokaya-parketnaya-doska--1024x717.jpg')}}" alt="">
                            </div>
                            <div class="products__card__info">
                                <div class="products__card__scu">
                                    <span class="scu">
                                        арт.:{{ $product->scu }}
                                    </span>
                                    <span class="manufacture">
                                        <a href="#">{{ $product->manufacture->manufacture }}</a>
                                    </span>
                                </div>
                            </div>
                        </div>
                        
                    </div> 
                @empty
                    <div>товаров нет</div>
                @endforelse
            </div>
            
        </section>
    </article>
    <aside>

    </aside>
@endsection