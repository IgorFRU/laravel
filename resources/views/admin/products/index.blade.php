@extends('admin.layouts.app_admin')
@php
    $counter = 0;
@endphp
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
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Название</th>
                        <th>Цена</th>
                        <th>Артикул</th>
                        <th>Публ.</th>
                        <th>Реком.</th>
                        <th>Категория</th>
                        <th>id</th>
                        <th>Просмотры</th>
                        <th>...</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($products as $product)
                    @php
                        $counter++
                    @endphp
                        <tr>
                            <td>{{ $counter }}</td>
                            <td><a href="{{route('admin.product.edit', ['id'=>$product->id])}}">{{ $product->product_name }}</a></td>
                            <td>{{ $product->price }} руб.</td>
                            <td>{{ $product->scu }}</td>
                            <td>{{ $product->published }}</td>
                            <td>{{ $product->recomended }}</td>
                            <td>{{ $product->category->title }}</td> {{-- Категория, полученная джойном --}}
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->views }}</td>
                            <td>
                                <form onsubmit="if(confirm('Удалить?')) {return true} else {return false}" action="{{route('admin.product.destroy', $product)}}" class="delete_mini_form" method="post">
                                    @csrf            
                                    <input type="hidden" name="_method" value="delete">            
                                    <button type="submit"><i class="far fa-trash-alt"></i></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                    <tr>
                        <td colspan="7">Товаров нет</td>
                    </tr>
                    
                    @endforelse
            </tbody>
        </table>
        </div>
        {{$products->links()}}
    </div>
</div>

@endsection

@section('footer')
    <span>
        Footer
    </span>
@endsection
