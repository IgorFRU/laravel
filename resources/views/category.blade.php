@extends('layouts.main') @section('content')
<article>
    {{--
    <div class="headarticle">
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
                        <img src={{asset( 'imgs/Tikovyie-polyi-v-vannoy.jpg')}} alt="">
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
        <div class="products__category" style="background-image: url({{ asset('imgs/444.jpg')}}); background-size: cover; ">
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

            <div class="products__cards">
                @forelse ($products as $product)
                <div class="products__card">
                    <div class="products__card__image">
                        @if ($product->thumbnail)
                            <img class="normal_product_image" src="{{ asset('imgs/products/thumbnail/')}}/{{ $product->thumbnail}}" alt="">
                        @else
                            <img src="{{ asset('imgs/image_not_found.png')}}" alt="">
                        @endif
                        
                    </div>
                    <div class="products__card__info">
                        <div class="products__card__scu">
                            <span class="scu">
                                        арт.: {{ $product->scu }}
                                    </span>
                            <span class="manufacture">
                                        <a href="#">{{ $product->manufacture->manufacture }}</a>
                                    </span>
                        </div>
                        <div class="products__card__maininfo">
                            <div class="products__card__title">
                                @if($category->parent_id)
                                <h3><a href="{{ route('product.subcategory', ['category' => $category->alias, 'subcategory' => $category->parent_id, 'product' => $product->slug, 'parameter' => '']) }}">{{ $product->product_name }}</a></h3>
                                @else
                                <h3><a href="{{ route('product', ['category' => $category->alias, 'product' => $product->slug, 'parameter' => '']) }}">{{ $product->product_name }}</a></h3>
                                @endif
                            </div>

                        </div>
                    </div>
                    <div class="products__card__price">
                        <span class="products__card__price__old">

                        </span>
                        <div class="products__card__price__new">
                            <div>
                                <span class="value">     
                                    @if ($product->currency->to_update)
                                        @php
                                            $oneUnit = floatToInt($product->price * $currencyrates[$product->currency->id]);
                                            $oneUnitNumeric = $oneUnit;
                                            echo ($oneUnitNumeric);
                                        @endphp
                                    @else
                                        @php
                                            $oneUnit = floatToInt($product->price);
                                            $oneUnitNumeric = $oneUnit;
                                            echo ($oneUnitNumeric);
                                        @endphp
                                    @endif
                                </span>
                                <i class="fa fa-rub"></i>
                            </div>

                            <div class="products__card__price__new__package">
                                <div class="active" data-price="@php echo ($oneUnit); @endphp"> за 1 {{ $product->unit->unit }}</div>
                                @if ($product->in_package)
                                <div data-price="@php echo (round($oneUnitNumeric * $product->in_package, 2)); @endphp"> за 1 уп. ({{ round($product->in_package, 3) }} {{ $product->unit->unit }})</div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="products__card__buttons">
                        <div class="products__card__buttons__input">
                            <input type="text" name="count" id="count" 
                            data-price="@php echo (round($oneUnitNumeric * $product->in_package, 2)); @endphp" 
                            data-count="@php echo (round($product->in_package, 2)); @endphp"
                            data-countpackage="1"
                            @if($product->packaging_sales) value= @php echo (round($product->in_package, 2)); echo ($product->unit->unit); @endphp @endif >
                            <span class="plus"><i class="fa fa-plus"></i></span>
                            <span class="minus"><i class="fa fa-minus"></i></span>
                        </div>
                        <div class="for_payment">
                            к оплате: <span>@php echo (round($oneUnitNumeric * $product->in_package, 2)); @endphp</span> <i class="fa fa-rub"></i>
                        </div>
                        <div class="buttons">
                            <div class="buy">В корзину</div>
                            <div class="one_click">Купить в 1 клик</div>
                        </div>

                    </div>
                </div>
                @empty
                <div>товаров нет</div>
                @endforelse
            </div>

        </div>

    </section>
</article>

<aside>

</aside>

@php 
function floatToInt($number) { 
    $floor = floor($number);
    if ($number == $floor) { 
        return number_format($number, 0, '.', ''); 
    }
    else {
        return number_format(round($number, 2), 2, '.', '');
    } 
} 
@endphp 

@if (Session::has('success'))
    <div class="alert alert-success">
        {!! Session::get('success') !!}
    </div>
@endif



<div class="modal_oneclick">
    <div class="modal_oneclick__header">
        Быстрый заказ
        <div class="modal_oneclick__header__close">

        </div>
    </div>
    <form id="modal_oneclick">
        <input type="text" id="modal_oneclick_name" name="name" placeholder="Имя" required>
        <input type="text" id="modal_oneclick_phone" name="phone" placeholder="Номер телефона" required>
        <input type="text" id="modal_oneclick_quantity" name="quantity" placeholder="Количество" readonly>
        <input type="text" id="modal_oneclick_price" name="price" placeholder="Сумма заказа" readonly>
        
        <input type="hidden" id="modal_oneclick_product" name="product">
        <input type="hidden" id="modal_oneclick_url" name="url">
        <div id="modal_oneclick_btn">Отправить</div>
    </form>
</div>

@endsection