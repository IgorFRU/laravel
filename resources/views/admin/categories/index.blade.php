@extends('admin.layouts.app_admin')

@section('content')

<div class="container">
    @component('admin/components/breadcrumb')
        @slot('parent') Главная @endslot
        @slot('active') Категории @endslot
    @endcomponent




    <div>
       @if (Session::has('success'))
    <div class="alert alert-success">

            {!! Session::get('success') !!}

    </div>
    @endif
        <div class="categories light_grey_box">
            <h2 class="categories__title">Категории ({{$published}}/{{$unpublished}})</h2>

            <a href="{{route('admin.category.create')}}" class="category__add grey_box">Создать категорию</a>
            @forelse ($categories as $category)

                <div @if(!$category->published) class="category grey_box unpublished" @else class="category grey_box" @endif>
                    <div class="category__title">
                        <a href="{{route('admin.category.show', $category)}}">{{$category->title}}</a>
                    </div>
                    <span class="category__detail_watches"><i class="fa fa-eye" aria-hidden="true"></i>99999</span>
                    <span class="category__detail_items"><i class="fa fa-th-large" aria-hidden="true"></i>2500</span>


                    <form onsubmit="if(confirm('Удалить?')) {return true} else {return false}" action="{{route('admin.category.destroy', $category)}}" class="delete_mini_form" method="post">
                       @csrf

                        <input type="hidden" name="_method" value="delete">

                        <span class="category__detail_control edit"><a href="{{route('admin.category.edit', ['id'=>$category->id])}}"><i class="fas fa-pencil-alt"></i></a></span>

                        <button type="submit" class="category__detail_control delete"><i class="far fa-trash-alt"></i></button>
                    </form>

    <!--                <span class="category__detail_control delete"><a href="{{route('admin.category.destroy', ['id'=>$category->id])}}"><i class="far fa-trash-alt"></i></a></span>-->
                </div>

            @empty
                <div>Категорий нет</div>
            @endforelse
        </div>
        {{$categories->links()}}
    </div>
</div>

@endsection
