@extends('admin.layouts.app_admin')

@section('content')

<div class="container">
    @component('admin/components/breadcrumb')
        @slot('parent') Главная @endslot
        @slot('active') Пункты меню @endslot
    @endcomponent



    <div>
       
        @if (Session::has('success'))
            <div class="alert alert-success">
        {!! Session::get('success') !!}
            </div>
        @endif
        
        <div class="categories light_grey_box">
            <h2 class="categories__title">Пункты меню</h2>

            <a href="{{route('admin.menu.create')}}" class="category__add grey_box"><i class="fas fa-plus"></i></a>
            @forelse ($menus as $menu)

                <div class="category white_box">
                    <div class="category__title">
                        <a href="{{route('admin.menu.show', $menu)}}"><span>{{$menu->menu}}</span></a>
                        <div class="tooltip">{{$menu->menu}}</div>
                    </div>
                

                    <form onsubmit="if(confirm('Удалить?')) {return true} else {return false}" action="{{route('admin.menu.destroy', $menu)}}" class="delete_mini_form" method="post">
                       @csrf

                        <input type="hidden" name="_method" value="delete">

                        <span class="category__detail_control edit"><a href="{{route('admin.menu.edit', ['id'=>$menu->id])}}"><i class="fas fa-pencil-alt"></i></a></span>

                        <button type="submit" class="category__detail_control delete"><i class="far fa-trash-alt"></i></button>
                    </form>

                </div>    

            @empty
                <div>Пунктов меню нет</div>
            @endforelse
        </div>
        {{$menus->links()}}
    </div>
</div>

@endsection
