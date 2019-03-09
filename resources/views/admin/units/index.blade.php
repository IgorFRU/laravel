@extends('admin.layouts.app_admin')

@section('content')

<div class="container">
    @component('admin/components/breadcrumb')
        @slot('parent') Главная @endslot
        @slot('active') Единицы измерения @endslot
    @endcomponent



    <div>

        @if (Session::has('success'))
            <div class="alert alert-success">
        {!! Session::get('success') !!}
            </div>
        @endif

        <div class="categories light_grey_box">
            <h2 class="categories__title">Единицы измерения</h2>

            <a href="{{route('admin.unit.create')}}" class="category__add grey_box"><i class="fas fa-plus"></i></a>
            @forelse ($units as $unit)

               <div class="manufacture grey_box">
                    <div class="white_box manufacture__head">
                        <div class="manufacture__title">
                            <a href="{{route('admin.unit.show', $unit)}}"><span>{{$unit->unit}}</span></a>
                        </div>
                        <form onsubmit="if(confirm('Удалить?')) {return true} else {return false}" action="{{route('admin.unit.destroy', $unit)}}" class="delete_mini_form" method="post">
                           @csrf

                            <input type="hidden" name="_method" value="delete">

                            <span class="category__detail_control edit"><a href="{{route('admin.unit.edit', ['id'=>$unit->id])}}"><i class="fas fa-pencil-alt"></i></a></span>

                            <button type="submit" class="category__detail_control delete"><i class="far fa-trash-alt"></i></button>
                        </form>
                    </div>
                </div>

            @empty
                <div>Единиц измерения нет</div>
            @endforelse
        </div>
    </div>
</div>

@endsection
