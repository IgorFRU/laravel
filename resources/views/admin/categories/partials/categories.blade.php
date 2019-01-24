{{-- Подключаемый шаблон для вывода выпадающего списка родительских категорий при создании или редактировании категории --}}


@foreach($categories as $category_list)

    <option value="{{$category_list->id ?? ""}}"
    
    @isset($category->id)
    
        @if($category->parent_id == $category_list->id)
            selected=""
        @endif
        
        @if($category->id == $category_list->id)
            hidden="" {{-- скрываем саму категорию из списка родителей--}}
        @endif
    
    @endisset
    
    >
    {!! $delimiter ?? "" !!}{{$category_list->title ?? ""}}
    </option>
    
    {{-- бесконечная вложенность категорий --}}
    
    @if(count($category_list->children) > 0)
    
        {{-- если есть хоть одна вложенная категория, подключаем этот же шаблон, создаем цикл, выход из которого  --}}
        
        @include('admin.categories.partials.categories', [ {{--передаем категории, которые являются вложенными для данной категории--}}
            'categories' => $category_list->children,
            'delimiter' => ' - '.$delimiter
        ])
    
    @endif
    
@endforeach