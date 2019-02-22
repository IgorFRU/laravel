@extends('admin.layouts.app_admin')


@section('content')

    @component('admin.components.breadcrumb')
        @slot('parent') Главная @endslot
        @slot('parent2') Валюты @endslot
            @slot('parent2_route') /../admin/currency @endslot
        @slot('active') Редактирование валюты @endslot
    @endcomponent

    <div class="categories light_grey_box">
        <form action="{{route('admin.currency.update', $currency)}}" method="post">
            @csrf
            <input type="hidden" name="_method" value="put">
            {{-- Forme include --}}

            @include('admin.currencies.partials.form')
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
