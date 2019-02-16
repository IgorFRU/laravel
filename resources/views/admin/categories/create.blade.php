@extends('admin.layouts.app_admin')


@section('content')

    @component('admin.components.breadcrumb')
        @slot('parent') Главная @endslot
        @slot('parent2') Категории @endslot
            @slot('parent2_route') /../admin/category @endslot        
        @slot('active') Создание категории @endslot
    @endcomponent
    
    <div class="categories light_grey_box">
        <form action="{{route('admin.category.store')}}" method="post">
            @csrf

            {{-- Forme include --}}

            @include('admin.categories.partials.form')
        </form>
    </div>
@endsection