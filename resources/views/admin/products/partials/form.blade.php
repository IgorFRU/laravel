<div class="grey_box">
<label for="">Статус</label>
<select name="published" id="">
    
    @if(isset($product->id))
        <option value="0" @if($product->published == 0) selected="" @endif>
            Не опубликован
        </option>
        <option value="1" @if($product->published == 1) selected="" @endif>
            Опубликован
        </option>
    @else
        <option value="1">Опубликована</option>
        <option value="0">Не опубликована</option>    
    @endif
    
</select>
</div>
<div class="grey_box">
<label for="">Название</label>
<input type="text" name="title" value="
    {{$product->title ?? ""}}" required>
</div>
<div class="grey_box">
<label for="">Алиас</label>
<input type="text" name="alias" value="
    {{$product->slug ?? ""}}
" readonly>
</div>
<div class="grey_box">
<label for="">Родительская категория</label>
<select name="categories_list[]" id="" multiple="">
    <option value="0">-- Без родителя --</option>
    @include('admin.products.partials.categories', ['categories_list' => $categories_list])
</select>
</div>

<input class="product__add grey_box" type="submit" name="submit" value="Сохранить">
