@extends('admin.layouts.app_admin')

@section('content')

    @component('admin.components.breadcrumb')
        @slot('parent') Главная @endslot
        @slot('parent2') Скидки @endslot
            @slot('parent2_route') /../admin/rebate @endslot        
        @slot('active') Добавление скидки @endslot
    @endcomponent
    
    <div class="categories light_grey_box edit_product">
        <form action="{{route('admin.rebate.store')}}" enctype="multipart/form-data" method="post">
            @csrf

            {{-- Forme include --}}

            @include('admin.rebates.partials.form')
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