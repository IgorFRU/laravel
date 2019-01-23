@extends('admin.layouts.app_admin')

@section('content')

<div class="container">
    @component('admin/components/breadcrumb')
        @slot('title') Список категорий @endslot
        @slot('parent') Главная @endslot
        @slot('active') Категории @endslot
    @endcomponent
    
    <div>
        
        <a href="{{route('admin.category.create')}}">Создать категорию</a>
        <table>
            <thead>
                <th>Название</th>
                <th>Изображение</th>
                <th>alias</th>
                <th>Публикация</th>
                <th>Действия</th>
            </thead>
            <tbody>
                @forelse ($categories as $category)
                    <tr>
                        <td>{{$category->title}}</td>
                        <td>{{$category->img}}</td>
                        <td>{{$category->alias}}</td>
                        <td>...</td>
                        <td><a href="{{route('admin.category.edit', ['id'=>$category->id])}}">Редактирование</a></td>
                    </tr>
                @empty
                    <tr>
                        <td collspan=5>Категорий нет</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>



@endsection