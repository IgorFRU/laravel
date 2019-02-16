@extends('admin.layouts.app_admin')


@section('content')

    @component('admin.components.breadcrumb')
        @slot('parent') Главная @endslot
        @slot('parent2') Товары @endslot
            @slot('parent2_route') /../admin/product @endslot        
        @slot('active') Добавление товара @endslot
    @endcomponent
    
    <div class="categories light_grey_box edit_product">
        <form action="{{route('admin.product.store')}}" method="post">
            @csrf

            {{-- Forme include --}}

            @include('admin.products.partials.form')
        </form>
    </div>
@endsection