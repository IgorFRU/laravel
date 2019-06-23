@extends('admin.layouts.app_admin')

@section('content')

<div class="container">
    @component('admin/components/breadcrumb')
        @slot('parent') Главная @endslot
        @slot('active') Статьи @endslot
    @endcomponent



    <div>
       
        @if (Session::has('success'))
            <div class="alert alert-success">
        {!! Session::get('success') !!}
            </div>
        @endif
        
        <div class="categories light_grey_box">
            <h2 class="categories__title">Статьи</h2>

            <a href="{{route('admin.article.create')}}" class="category__add grey_box"><i class="fas fa-plus"></i></a>
            @forelse ($articles as $article)

                <div @if(!$article->published) class="category grey_box unpublished" @else class="category white_box" @endif>
                    <div class="category__title">
                        <a href="{{route('admin.article.show', $article)}}"><span>{{$article->article_name}}</span></a>
                        <div class="tooltip">{{$article->article_name}}</div>
                    </div>
                    <span class="category__detail_watches"><i class="fa fa-eye" aria-hidden="true"></i>{{ $article->views }}</span>

                    <form onsubmit="if(confirm('Удалить?')) {return true} else {return false}" action="{{route('admin.article.destroy', $aticle)}}" class="delete_mini_form" method="post">
                       @csrf

                        <input type="hidden" name="_method" value="delete">

                        <span class="category__detail_control edit"><a href="{{route('admin.article.edit', ['id'=>$article->id])}}"><i class="fas fa-pencil-alt"></i></a></span>

                        <button type="submit" class="category__detail_control delete"><i class="far fa-trash-alt"></i></button>
                    </form>
                </div>    

            @empty
                <div>Статей нет</div>
            @endforelse
        </div>
        {{$articles->links()}}
    </div>
</div>

@endsection
