@extends('admin.layouts.app_admin')


@section('content')

    @component('admin.components.breadcrumb')
        @slot('parent') Главная @endslot
        @slot('parent2') Товары @endslot
            @slot('parent2_route') /../admin/product @endslot        
        @slot('active') Добавление товара @endslot
    @endcomponent
    
    @if (Session::has('success'))
        <div class="alert alert-success">
            {!! Session::get('success') !!}
        </div>
    @endif

    <div class="categories light_grey_box edit_product">
        <form action="{{route('admin.product.store')}}" method="post">
            @csrf

            {{-- Forme include --}}
            
            @include('admin.products.partials.form')            
            
        </form>

        {{-- Тут будут выведены уже загруженные изображения --}}

        <form action="{{route('admin.img')}}" method="post" enctype="multipart/form-data">
            @csrf
            @include('admin.products.partials.form_img')
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