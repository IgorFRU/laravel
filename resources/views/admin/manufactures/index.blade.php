@extends('admin.layouts.app_admin')

@section('content')

<div class="container">
    @component('admin/components/breadcrumb')
        @slot('parent') Главная @endslot
        @slot('active') Производители @endslot
    @endcomponent



    <div>

        @if (Session::has('success'))
            <div class="alert alert-success">
        {!! Session::get('success') !!}
            </div>
        @endif

        <div class="categories light_grey_box">
            <h2 class="categories__title">Производители ({{$published}}/{{$unpublished}})</h2>

            <a href="{{route('admin.manufacture.create')}}" class="category__add grey_box"><i class="fas fa-plus"></i></a>
            @forelse ($manufactures as $manufacture)

               <div class="manufacture grey_box">
                    <div @if(!$manufacture->published) class="grey_box unpublished manufacture__head" @else class="white_box manufacture__head " @endif>
                        <div class="manufacture__title">
                            <a href="{{route('admin.manufacture.show', $manufacture)}}"><span>{{$manufacture->manufacture}}</span></a>
<!--                            <div class="tooltip">{{$manufacture->manufacture}}</div>-->
                        </div>
                        <form onsubmit="if(confirm('Удалить?')) {return true} else {return false}" action="{{route('admin.manufacture.destroy', $manufacture)}}" class="delete_mini_form" method="post">
                           @csrf

                            <input type="hidden" name="_method" value="delete">

                            <span class="category__detail_control edit"><a href="{{route('admin.manufacture.edit', ['id'=>$manufacture->id])}}"><i class="fas fa-pencil-alt"></i></a></span>

                            <button type="submit" class="category__detail_control delete"><i class="far fa-trash-alt"></i></button>
                        </form>

        <!--                <span class="category__detail_control delete"><a href="{{route('admin.manufacture.destroy', ['id'=>$manufacture->id])}}"><i class="far fa-trash-alt"></i></a></span>-->
                    </div>
                    <div class="desctiption">
                        {{ $manufacture->description }}
                        <p>
                        @isset($sort_by)
                            {{ $sort_by }}
                        @endisset
                        </p>
                        <div class="ajax_test dark_grey_box">ajax</div>
                    </div>
                </div>

            @empty
                <div>Производителей нет</div>
            @endforelse
        </div>
        {{$manufactures->links()}}
    </div>
</div>

@endsection
