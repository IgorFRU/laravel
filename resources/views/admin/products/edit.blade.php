@extends('admin.layouts.app_admin')


@section('content')
    @if (Session::has('success'))
        <div class="alert alert-success">
    {!! Session::get('success') !!}
        </div>
    @endif

    @component('admin.components.breadcrumb')
        @slot('parent') Главная @endslot
        @slot('parent2') Товары @endslot
            @slot('parent2_route') /../admin/product @endslot        
        @slot('active') Редактирование товара @endslot
    @endcomponent
    
    <div class="categories light_grey_box edit_product">
        <form action="{{route('admin.product.update', $product)}}" method="post">
            @csrf
            <input type="hidden" name="_method" value="put">
            {{-- Forme include --}}

            @include('admin.products.partials.form')
        </form>

        <form action="{{route('admin.productimg')}}" method="post" enctype="multipart/form-data">
            @csrf
            @include('admin.products.partials.form_img')
        </form>
        <div class="grey_box">
            
                <div class="image_thumbnail_row">
                    
                    @forelse ($images as $image)
                        <div class="image_thumbnail100">
                            <img src="{{asset('imgs/products/thumbnail')}}/{{ $image->thumbnail}}" alt="">
                        </div>
                    @empty                
                        изображений нет
                    @endforelse
                </div>
            
                
        </div>
    </div>
@endsection

@section('footer')
    Footer
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector:'textarea#description',
            width: 900,
            height: 300
        });
    </script>
@endsection