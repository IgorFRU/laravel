@extends('admin.layouts.app_admin')


@section('content')

    @component('admin.components.breadcrumb')
        @slot('parent') Главная @endslot
        @slot('active') Категории @endslot
    @endcomponent
    
    <div class="categories light_grey_box">
        <form action="{{route('admin.product.store')}}" method="post">
            @csrf

            {{-- Forme include --}}

            @include('admin.products.partials.form')
        </form>
    </div>
@endsection