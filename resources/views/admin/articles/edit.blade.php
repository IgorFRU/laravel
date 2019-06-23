@extends('admin.layouts.app_admin')


@section('content')
    @if (Session::has('success'))
        <div class="alert alert-success">
    {!! Session::get('success') !!}
        </div>
    @endif
    @component('admin.components.breadcrumb')
        @slot('parent') Главная @endslot
        @slot('parent2') Статьи @endslot
            @slot('parent2_route') /../admin/article @endslot        
        @slot('active') Редактирование статьи @endslot
    @endcomponent

    <div class="categories light_grey_box">
        <form action="{{route('admin.article.update', $article)}}" method="post">
            @csrf
            <input type="hidden" name="_method" value="put">
            @include('admin.articles.partials.form')
        </form>

        <form action="{{route('admin.articleimg')}}" method="post" enctype="multipart/form-data">
            @csrf
            @include('admin.articles.partials.form_img')
        </form>
    </div>
@endsection
