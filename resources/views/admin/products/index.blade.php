@extends('admin.layouts.app_admin')

@section('content')

<div class="container">
    @component('admin/components/breadcrumb')
        @slot('parent') Главная @endslot
        @slot('active') Товары @endslot
    @endcomponent
    <div>
       
        @if (Session::has('success'))
            <div class="alert alert-success">
        {!! Session::get('success') !!}
            </div>
        @endif
        
        <div class="categories light_grey_box">
            <h2 class="categories__title">Товары ({{$published}}/{{$unpublished}})</h2>
            
<!--
            <form action="admin.product" method="get" class="category_select">
               <label for="parent_category">Категория</label>
                <select name="parent_category" id="">
                    <option value="0"><a href="admin/product/poly">Полы</a></option>
                    <option value="1">Первая категория</option>
                </select>
                <button type="submit">OK</button>
            </form>
-->
<!--
           <div class="drop_down grey_box">
               <span>Выбор категории</span>
               <div class="drop_down__list submenu">
                    @forelse ($categories as $category)
                        <a href="{{ route('admin.product.category', ['category' => $category->alias]) }}">{{ $category->title }}</a>
                    @empty
                        <p>Категорий нет</p>
                    @endforelse
                </div>
            </div>
-->

            <a href="{{route('admin.product.create')}}" class="category__add grey_box"><i class="fas fa-plus"></i></a>
            @forelse ($products as $product)

                <div @if(!$category->published) class="category grey_box unpublished" @else class="category white_box" @endif>
                    <div class="category__title">
                        <a href="{{route('admin.product.show', $category)}}"><span>{{$product->title}}</span></a>
                        <div class="tooltip">{{$product->product_name}}</div>
                    </div>
                    <span class="category__detail_watches"><i class="fa fa-eye" aria-hidden="true"></i>{{$product->views}}</span>


                    <form onsubmit="if(confirm('Удалить?')) {return true} else {return false}" action="{{route('admin.product.destroy', $product)}}" class="delete_mini_form" method="post">
                       @csrf

                        <input type="hidden" name="_method" value="delete">

                        <span class="category__detail_control edit"><a href="{{route('admin.product.edit', ['id'=>$product->id])}}"><i class="fas fa-pencil-alt"></i></a></span>

                        <button type="submit" class="category__detail_control delete"><i class="far fa-trash-alt"></i></button>
                    </form>

    <!--                <span class="category__detail_control delete"><a href="{{route('admin.product.destroy', ['id'=>$product->id])}}"><i class="far fa-trash-alt"></i></a></span>-->
                </div>    
                
            @empty
                <div>Товаров нет</div>
            @endforelse
        </div>
        {{$products->links()}}
    </div>
</div>

@endsection
