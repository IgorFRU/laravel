@extends('admin.layouts.app_admin')


@section('content')

    @component('admin.components.breadcrumb')
        @slot('parent') Главная @endslot
        @slot('parent2') Пункты меню @endslot
            @slot('parent2_route') /../admin/menu @endslot        
        @slot('active') Добавление пункта меню @endslot
    @endcomponent
    
    @if (Session::has('success'))
        <div class="alert alert-success">
            {!! Session::get('success') !!}
        </div>
    @endif

    <div class="categories light_grey_box edit_product">
        <form action="{{route('admin.menu.store')}}" method="post">
            @csrf

            {{-- Forme include --}}
            
            @include('admin.menus.partials.form')            
            
        </form>
    </div>
@endsection

@section('footer')
    
@endsection