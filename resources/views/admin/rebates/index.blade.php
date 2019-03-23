@extends('admin.layouts.app_admin')

@section('content')

<div class="container">
    @component('admin/components/breadcrumb')
        @slot('parent') Главная @endslot
        @slot('active') Скидки @endslot
    @endcomponent



    <div>

        @if (Session::has('success'))
            <div class="alert alert-success">
        {!! Session::get('success') !!}
            </div>
        @endif

        <div class="categories light_grey_box">
            <h2 class="categories__title">Скидки</h2>

            <a href="{{route('admin.sale.create')}}" class="category__add grey_box"><i class="fas fa-plus"></i></a>
            @forelse ($sales as $sale)

               <div class="manufacture grey_box">
                    <div class="white_box manufacture__head">
                        <div class="manufacture__title">
                            <a href="{{route('admin.sale.show', $sale)}}"><span>{{$sale->sale_type}}</span></a>
                        </div>
                        <form onsubmit="if(confirm('Удалить?')) {return true} else {return false}" action="{{route('admin.sale.destroy', $unit)}}" class="delete_mini_form" method="post">
                           @csrf

                            <input type="hidden" name="_method" value="delete">

                            <span class="category__detail_control edit"><a href="{{route('admin.sale.edit', ['id'=>$sale->id])}}"><i class="fas fa-pencil-alt"></i></a></span>

                            <button type="submit" class="category__detail_control delete"><i class="far fa-trash-alt"></i></button>
                        </form>
                    </div>
                </div>

            @empty
                <div>Скидок нет</div>
            @endforelse
        </div>
    </div>
</div>

@endsection
