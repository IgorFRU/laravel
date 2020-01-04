@extends('layouts.main') 

@section('content')
<section class="product" id="firstsection">
    {{-- <div class="breadcrumbs">
        <div class="wrap">
            breadcrumbs
        </div>
    </div> --}}

    <div class="wrap">
        <div class="product__card white_card_global">
            <div class="product__top">
                @if ($product->sample)
                <div class="product_sample">
                    в магазине есть образец
                </div>    
                @endif
                {{-- <div class="product__images">
                    <div class="product__mainimage">
                        @if (isset($mainimage[0]))
                            <img src="{{ asset('imgs/products/')}}/{{ $mainimage[0]}}" alt="">
                        @else
                            <img src="{{ asset('imgs/image_not_found.png')}}" alt="">
                        @endif
                    </div>
                    <div class="product__addimages">
                        @forelse ($images as $image)
                            <div class="product__addimages__items">
                                <div class="product__addimages__item">
                                    <img src="{{ asset('imgs/products/')}}/{{ $image}}" alt="">
                                </div>                                
                            </div>
                        @empty
                            
                        @endforelse
                    </div>
                    
                    
                </div> --}}
                <div class="product__images">
                    @if (isset($images))
                        @if (count($images) > 1)
                            <div class="product__images__many">
                                <div class="main_product_image">
                                    @foreach ($images as $image)
                                        @if ($image->main)
                                        <img src="{{ asset('imgs/products/thumbnail')}}/{{ $image->thumbnail}}" alt="{{ $image->alt ?? '' }}">
                                        @endif
                                    @endforeach
                                </div>
                                <div class="images__container">
                                    @if (count($images) > 4)
                                        <span class="up">&uarr;</span>
                                        <span class="down">&darr;</span>
                                    @endif
                                    <div class="column">
                                        @forelse ($images as $image)
                                        <div class="images__container__item">
                                            <img @if($image->main) class="main" @endif src="{{ asset('imgs/products/thumbnail')}}/{{ $image->thumbnail}}" alt="{{ $image->alt ?? '' }}">
                                        </div>                                        
                                        @empty
                                            
                                        @endforelse
                                    </div>
                                    
                                </div>
                            </div>
                        @else
                            @if (count($images) == 0)
                                <div class="product__images__one">
                                    <img src="{{ asset('imgs/image_not_found.png')}}" alt="">
                                </div>
                            @endif                                
                        @endif
                    @else
                        
                    @endif
                </div>
                <div class="product__maininfo">
                    <div class="product__title">
                        <h1>{{ $product->product_name }}</h1>
                        <div class="product__category">
                            <a href="{{ route('category', ['category' => $product->category->alias]) }}">{{ $product->category->title }}</a>
                        </div>
                        <div class="product__maininfo__add">
                            <div class="product__scu">артикул: {{ $product->scu ?? '' }}</div>
                            @if ($product->manufacture)
                                <div class="product__manufacture">производитель: {{ $product->manufacture->manufacture }}</div>
                            @endif
                            
                        </div>
                        <div class="product__short_description">
                            {{ $product->short_description ?? '' }}
                        </div>
                    </div>
                    <div class="price">
                        <div class="price_top">
                            <div class="price__title">
                                <span class="price__title__word">Цена:</span>
                                <span class="products__card__price__old"></span>
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
                                            <div class="one_click">Купить в 1 клик</div>
                                        </div>
                                    </div>
                                </div>
                            <div class="price__selector">

                            </div>
                            
                            
                        </div>
                    </div>
                </div>
            </div>
            @if(isset($product->description))
            <div class="product__bottom">
                <div class="product__bottom__description">
                    {!! $product->description !!}    
                </div>
            </div>
            @endif
        </div>

        @if (count($recomended_products))
            <div class="recomended_products white_card_global">
                <div class="white_card_global__header">
                    Рекомендованые товары    
                </div>
                <div class="recomended_products__slider">
                    @foreach ($recomended_products as $product) 
                        <div class="recomended_products__item grey_card_global">
                            <div class="recomended_products__item__img">
                                @if ($product->thumbnail)
                                    <img class="normal_product_image" src="{{ asset('imgs/products/thumbnail/')}}/{{ $product->thumbnail}}" alt="">
                                @else
                                    <img src="{{ asset('imgs/image_not_found.png')}}" alt="">
                                @endif   
                            </div>
                            <div class="recomended_products__item__title">
                                @if($product->category->parent_id)
                                    <a href="{{ route('product.subcategory', ['category' => $product->category->alias, 'subcategory' => $product->category->parent_id, 'product' => $product->slug, 'parameter' => '']) }}">{{ $product->product_name }}</a>
                                @else
                                    <a href="{{ route('product', ['category' => $product->category->alias, 'product' => $product->slug, 'parameter' => '']) }}">{{ $product->product_name }}</a>
                                @endif
                            </div>
                            
                        </div>
                    @endforeach   
                </div>
            </div>
        @endif
        
    </div>

</section>

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

