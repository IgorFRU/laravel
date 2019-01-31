@extends('admin.layouts.app_admin')


@section('content')

    @component('admin.components.breadcrumb')
        @slot('parent') Главная @endslot
        @slot('active') Категории @endslot
    @endcomponent

    <div class="categories light_grey_box">
        <form action="{{route('admin.category.update', $category)}}" method="post">
            @csrf
            <input type="hidden" name="_method" value="put">
            {{-- Forme include --}}

            @include('admin.categories.partials.form')
        </form>
    </div>
@endsection
