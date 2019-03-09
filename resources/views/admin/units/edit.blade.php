@extends('admin.layouts.app_admin')


@section('content')

    @component('admin.components.breadcrumb')
        @slot('parent') Главная @endslot
        @slot('parent2') Единицы измерения @endslot
            @slot('parent2_route') /../admin/unit @endslot
        @slot('active') Редактирование ед. изм. @endslot
    @endcomponent

    <div class="categories light_grey_box">
        <form action="{{route('admin.unit.update', $unit)}}" method="post">
            @csrf
            <input type="hidden" name="_method" value="put">
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
