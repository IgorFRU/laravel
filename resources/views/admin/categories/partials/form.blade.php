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
    
        <option value="0">Не опубликована</option>
        <option value="1">Опубликована</option>
    
    @endif
    
</select>


<label for="">Название</label>
<input type="text" name="title" value="
    {{$category->title ?? ""}}" required>


<label for="">Алиас</label>
<input type="text" name="alias" value="
    {{$category->alias ?? ""}}
">


<label for="">Родительская категория</label>
<select name="parent_id" id="">
    <option value="0">-- Без родителя --</option>
    @include('admin.categories.partials.categories', ['categories' => $categories])
</select>


<input type="submit" name="submit" value="Сохранить">