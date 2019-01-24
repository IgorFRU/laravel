@extends('admin.layouts.app_admin')


@section('content')

    @component('admin.components.breadcrumb')
        @slot('parent') Главная @endslot
        @slot('active') Категории @endslot
    @endcomponent
    
    <form action="{{route('admin.category.store')}}" method="post">
        @csrf
        
        {{-- Forme include --}}
        
        @include('admin.categories.partials.form')
    </form>

@endsection