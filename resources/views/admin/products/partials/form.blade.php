<section>
    <p>Основная информация</p>
    <div class="left_50">
        <div class="grey_box">
            <label for="scu">Артикул</label>
            <input type="text" name="scu" value="{{$product->scu ?? ''}}" >
            <label for="published"><i class="fa fa-eye" aria-hidden="true"></i></label>        
                @if(isset($product->id))
                    <input type="checkbox" name="published" id="" class="js_oneclick" value="{{ $product->published }}" @if($product->published) checked @endif>
                    {{-- Скрытое поле для отправки на сервер value неотмеченного чекбокса --}}
                    <input type="hidden" name="published" id="" class="js_oneclick_hidden" value="{{ $product->published }}" >  
                @else
                    <input type="checkbox" name="published" id="" class="js_oneclick" value="1"  checked >
                    {{-- Скрытое поле для отправки на сервер value неотмеченного чекбокса --}}
                    <input type="hidden" name="published" id="" class="js_oneclick_hidden" value="1" > 
                @endif
            

            <label for="recomended"><i class="fas fa-thumbs-up"></i></label>        
                @if(isset($product->id))
                    <input type="checkbox" name="recomended" id="" class="js_oneclick" value="{{ $product->recomended }}" @if($product->recomended) checked @endif>
                    {{-- Скрытое поле для отправки на сервер value неотмеченного чекбокса --}}
                    <input type="hidden" name="recomended" id="" class="js_oneclick_hidden" value="{{ $product->recomended }}" > 
                @else
                    <input type="checkbox" name="recomended" id="" class="js_oneclick" value="0" >
                    {{-- Скрытое поле для отправки на сервер value неотмеченного чекбокса --}}
                    <input type="hidden" name="recomended" id="" class="js_oneclick_hidden" value="0" > 
                @endif
            

            {{-- class="popup_span" в дальнейшем применится для добавления всплывающих подсказок для чекбоксов --}}
            <label for="sample" class="popup_span"><i class="far fa-window-restore"></i></label>        
                @if(isset($product->id))
                    <input type="checkbox" name="sample" id="" class="js_oneclick" value="{{ $product->sample }}" @if($product->sample) checked @endif>
                    {{-- Скрытое поле для отправки на сервер value неотмеченного чекбокса --}}
                    <input type="hidden" name="sample" id="" class="js_oneclick_hidden" value="{{ $product->sample }}" > 
                @else
                    <input type="checkbox" name="sample" id="" class="js_oneclick" value="0" >
                    {{-- Скрытое поле для отправки на сервер value неотмеченного чекбокса --}}
                    <input type="hidden" name="sample" id="" class="js_oneclick_hidden" value="0" > 
                @endif
             

            
            @if(isset($product->id))
                <span>{{ $product->id }}</span>
            @endif    
        </div>

        <div class="grey_box">
            
        </div>

        <div class="grey_box">
            <label for="product_name">Название</label>
            <input type="text" name="product_name" value="{{$product->product_name ?? ''}}" required>
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
                    <option value="{{ $manufacture->id }}"
                        @if ($manufacture->id == $product->manufacturer_id)
                        selected = "selected"
                        @endif
                    >
                    {{ $manufacture->manufacture }}
                </option>
                @endforeach
            </select>
        </div>
        <div class="grey_box">
            <label for="description">Описание</label>
            <textarea name="description" id="description" cols="30" rows="10">{{$product->description ?? ''}}</textarea>
        </div>
    </div>
</section>



<input class="category__add grey_box" type="submit" name="submit" value="Сохранить">
