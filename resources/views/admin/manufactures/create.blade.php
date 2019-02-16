@extends('admin.layouts.app_admin')


@section('content')

    @component('admin.components.breadcrumb')
        @slot('parent') Главная @endslot
        @slot('parent2') Производители @endslot
            @slot('parent2_route') /../admin/manufacture @endslot        
        @slot('active') Добавление производителя @endslot
    @endcomponent
    
    <div class="categories light_grey_box edit_product">
        <form action="{{route('admin.manufacture.store')}}" enctype="multipart/form-data" method="post">
            @csrf

            {{-- Forme include --}}

            @include('admin.manufactures.partials.form')
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