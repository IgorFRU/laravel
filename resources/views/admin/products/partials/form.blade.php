<section>
    <p>Основная информация</p>
    <div class="left_50">
        <div class="grey_box">
            <label for="published"><i class="fa fa-eye" aria-hidden="true"></i></label>        
                @if(isset($product->id))
                    <input type="checkbox" name="published" id="" class="js_oneclick" value="{{ $product->published }}" @if($category->published) checked @endif>
                @else
                    <input type="checkbox" name="published" id="" class="js_oneclick" value="1"  checked >
                @endif
            {{-- Скрытое поле для отправки на сервер value неотмеченного чекбокса --}}
            <input type="hidden" name="published" id="" class="js_oneclick_hidden" value="1" >  

            <label for="recomended"><i class="fas fa-thumbs-up"></i></label>        
                @if(isset($product->id))
                    <input type="checkbox" name="recomended" id="" class="js_oneclick" value="{{ $product->recomended }}" @if($category->published) checked @endif>
                @else
                    <input type="checkbox" name="recomended" id="" class="js_oneclick" value="0" >
                @endif
            {{-- Скрытое поле для отправки на сервер value неотмеченного чекбокса --}}
            <input type="hidden" name="recomended" id="" class="js_oneclick_hidden" value="0" > 

            {{-- class="popup_span" в дальнейшем применится для добавления всплывающих подсказок для чекбоксов --}}
            <label for="sample" class="popup_span"><i class="far fa-window-restore"></i></label>        
                @if(isset($product->id))
                    <input type="checkbox" name="sample" id="" class="js_oneclick" value="{{ $product->recomended }}" @if($category->published) checked @endif>
                @else
                    <input type="checkbox" name="sample" id="" class="js_oneclick" value="0" >
                @endif
            {{-- Скрытое поле для отправки на сервер value неотмеченного чекбокса --}}
            <input type="hidden" name="sample" id="" class="js_oneclick_hidden" value="0" >  

            
            @if(isset($product->id))
                <span>{{ $product->id }}</span>
            @endif    
        </div>

        <div class="grey_box">
            <label for="product_name">Название</label>
            <input type="text" name="product_name" value="{{$product->title ?? ''}}" required>
        </div>
        <div class="grey_box">
            <label for="slug">Алиас</label>
            <input type="text" name="slug" value="{{$product->slug ?? ''}}" readonly>
        </div>
    </div>
    <div class="right_50">  
        <div class="grey_box">
            <label for="category_id">Родительская категория</label>
            <select name="category_id" id="" >
                <option value="0">-- Без родителя --</option>
                @include('admin.products.partials.categories', ['categories' => $categories])
            </select>
        </div>

        <div class="grey_box">
            <label for="manufacturer_id">Производитель</label>
            <select name="manufacturer_id" id="" >
                <option value="0">-- Не указан --</option>
                @foreach($manufactures as $manufacture)
                    <option value="{{ $manufacture->id }}">{{ $manufacture->manufacture }}</option>
                @endforeach
            </select>
        </div>
    </div>
</section>



<input class="category__add grey_box" type="submit" name="submit" value="Сохранить">
