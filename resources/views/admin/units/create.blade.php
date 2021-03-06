@extends('admin.layouts.app_admin')


@section('content')

    @component('admin.components.breadcrumb')
        @slot('parent') Главная @endslot
        @slot('parent2') Единицы измерения @endslot
            @slot('parent2_route') /../admin/unit @endslot        
        @slot('active') Добавление ед. изм. @endslot
    @endcomponent
    
    <div class="categories light_grey_box edit_product">
        <form action="{{route('admin.unit.store')}}" enctype="multipart/form-data" method="post">
            @csrf

            {{-- Forme include --}}

            @include('admin.units.partials.form')
        </form>
    </div>
    
    @if ($errors->any())
        <div class="alerts">
            <ul>
                @foreach ($errors->all() as $error)
                <li><span class="alert alert-error">{{ $error }}</span></li>
                @endforeach
            </ul>
        </div>
    @endif

@endsection