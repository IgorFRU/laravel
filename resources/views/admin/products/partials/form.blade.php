<div class="grey_box">
<label for="published">Статус</label>
<select name="published" id="">
    
    @if(isset($product->id))
        <option value="0" @if($product->published == 0) selected="" @endif>
            Не опубликован
        </option>
        <option value="1" @if($product->published == 1) selected="" @endif>
            Опубликован
        </option>
    @else
        <option value="1">Опубликован</option>
        <option value="0">Не опубликован</option>    
    @endif
    
</select>
</div>
<div class="grey_box">
<label for="title">Название</label>
<input type="text" name="title" value="
    {{$product->title ?? ""}}" required>
</div>
<div class="grey_box">
<label for="alias">Алиас</label>
<input type="text" name="alias" value="
    {{$product->slug ?? ""}}
" readonly>
</div>
<div class="grey_box">
<label for="categories[]">Родительская категория</label>
<select name="categories[]" id="" multiple="">
    <option value="0">-- Без родителя --</option>
    @include('admin.products.partials.categories', ['categories' => $categories])
</select>
</div>

<input class="category__add grey_box" type="submit" name="submit" value="Сохранить">
