@extends('admin.layouts.app_admin')


@section('content')

    @component('admin.components.breadcrumb')
        @slot('parent') Главная @endslot
        @slot('parent2') Статьи @endslot
            @slot('parent2_route') /../admin/article @endslot        
        @slot('active') Создание статьи @endslot
    @endcomponent
    
    <div class="categories light_grey_box">
        <form action="{{route('admin.article.store')}}" method="post">
            @csrf
            @include('admin.articles.partials.form')
        </form>
    </div>
@endsection

@section('footer')
    Footer
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector:'textarea#description',
            width: 900,
            height: 300
        });
    </script>
@endsection