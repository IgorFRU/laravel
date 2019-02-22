@extends('admin.layouts.app_admin')

@section('content')

<div class="container">
    @component('admin/components/breadcrumb')
        @slot('parent') Главная @endslot
        @slot('active') Валюты @endslot
    @endcomponent



    <div>
       
        @if (Session::has('success'))
            <div class="alert alert-success">
        {!! Session::get('success') !!}
            </div>
        @endif
        
        <div class="categories light_grey_box">
            <h2 class="categories__title">Валюты</h2>

            <a href="{{route('admin.currency.create')}}" class="category__add grey_box"><i class="fas fa-plus"></i></a>
            @forelse ($currencies as $currency)

                <div class="category white_box">
                    <div class="category__title">
                        <a href="{{route('admin.currency.show', $currency)}}"><span>{{$currency->currency_rus}}</span></a>
                        <div class="tooltip">{{$currency->currency_rus}}</div>
                    </div>

                    <span class="category__detail_watches">{{ $currency->currency }}</span>
                    <span class="category__detail_items"></span>


                    <form onsubmit="if(confirm('Удалить?')) {return true} else {return false}" action="{{route('admin.currency.destroy', $currency)}}" class="delete_mini_form" method="post">
                       @csrf

                        <input type="hidden" name="_method" value="delete">

                        <span class="category__detail_control edit"><a href="{{route('admin.currency.edit', ['id'=>$currency->id])}}"><i class="fas fa-pencil-alt"></i></a></span>

                        <button type="submit" class="category__detail_control delete"><i class="far fa-trash-alt"></i></button>
                    </form>

    <!--                <span class="category__detail_control delete"><a href="{{route('admin.currency.destroy', ['id'=>$currency->id])}}"><i class="far fa-trash-alt"></i></a></span>-->
                </div>    

            @empty
                <div>Валют нет</div>
            @endforelse
        </div>
        {{$currencies->links()}}
    </div>
</div>

@endsection
