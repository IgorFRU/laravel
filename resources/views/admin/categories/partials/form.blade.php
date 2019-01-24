<div class="grey_box">
<label for="">Статус</label>
<select name="show" id="">
    
    @if(isset($category->id))
        <option value="0" @if($category->published == 0) selected="" @endif>
            Не опубликована
        </option>
        <option value="1" @if($category->published == 1) selected="" @endif>
            Опубликована
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
    {{$category->title ?? ""}}" required>
</div>
<div class="grey_box">
<label for="">Алиас</label>
<input type="text" name="alias" value="
    {{$category->alias ?? ""}}
">
</div>
<div class="grey_box">
<label for="">Родительская категория</label>
<select name="parent_id" id="">
    <option value="0">-- Без родителя --</option>
    @include('admin.categories.partials.categories', ['categories' => $categories])
</select>
</div>

<input class="category__add grey_box" type="submit" name="submit" value="Сохранить">