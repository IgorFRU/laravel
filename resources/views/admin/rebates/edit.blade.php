@extends('admin.layouts.app_admin')


@section('content')

    @component('admin.components.breadcrumb')
        @slot('parent') Главная @endslot
        @slot('parent2') Скидки @endslot
            @slot('parent2_route') /../admin/rebate @endslot
        @slot('active') Редактирование скидки @endslot
    @endcomponent

    <div class="categories light_grey_box">
        <form action="{{route('admin.rebate.update', $rebate)}}" method="post">
            @csrf
            <input type="hidden" name="_method" value="put">
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
