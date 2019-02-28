{{-- Подключаемый шаблон для вывода выпадающего списка родительских категорий при создании или редактировании категории --}}


@foreach($categories as $category)

    <option value="{{$category->id ?? ''}}"
    
    @isset($category->id)
    
        {{-- @foreach($product->category_id as $category_product) --}}
        @isset($product->id)
            @if($category->id == $product->category_id)
                    
                selected = "selected"
            
            @endif
        @endisset
        
            
        
        {{-- @endforeach --}}
    
    @endisset
    
    >
    {!! $delimiter ?? "" !!}{{$category->title ?? ""}}
    </option>
    
    {{-- бесконечная вложенность категорий --}}
    
    @if(count($category->children) > 0)
    
        {{-- если есть хоть одна вложенная категория, подключаем этот же шаблон, создаем цикл, выход из которого  --}}
        
        @include('admin.products.partials.categories', [ {{--передаем категории, которые являются вложенными для данной категории--}}
            'categories' => $category->children,
            'delimiter' => ' - '.$delimiter
        ])
    
    @endif
    
@endforeach