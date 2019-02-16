@extends('admin.layouts.app_admin')


@section('content')

    @component('admin.components.breadcrumb')
        @slot('parent') Главная @endslot
        @slot('parent2') Производители @endslot
            @slot('parent2_route') /../admin/manufacture @endslot
        @slot('active') Редактирование производителя @endslot
    @endcomponent

    <div class="categories light_grey_box">
        <form action="{{route('admin.manufacture.update', $manufacture)}}" method="post">
            @csrf
            <input type="hidden" name="_method" value="put">
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
