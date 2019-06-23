@extends('admin.layouts.app_admin')


@section('content')
    @if (Session::has('success'))
        <div class="alert alert-success">
    {!! Session::get('success') !!}
        </div>
    @endif
    @component('admin.components.breadcrumb')
        @slot('parent') Главная @endslot
        @slot('parent2') Категории @endslot
            @slot('parent2_route') /../admin/category @endslot        
        @slot('active') Редактирование категории @endslot
    @endcomponent

    <div class="categories light_grey_box">
        <form action="{{route('admin.category.update', $category)}}" method="post">
            @csrf
            <input type="hidden" name="_method" value="put">
            {{-- Forme include --}}

            @include('admin.categories.partials.form')
        </form>

        <form action="{{route('admin.categoryimg')}}" method="post" enctype="multipart/form-data">
            @csrf
            @include('admin.categories.partials.form_img')
        </form>
    </div>
@endsection
