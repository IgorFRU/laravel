<div class="grey_box">

<label for="published">Опубликован</label>
        
    @if(isset($category->id))
        <input type="checkbox" name="published" id="" class="js_oneclick" value="{{ $category->published }}" @if($category->published) checked @endif>
    @else
        <input type="checkbox" name="published" id="" class="js_oneclick" value="1"  checked >
    @endif
    {{-- Скрытое поле для отправки на сервер value неотмеченного чекбокса --}}
    <input type="hidden" name="published" id="" class="js_oneclick_hidden" value="1" >
    
</div>
<div class="grey_box">
    <label for="">Название</label>
    <input type="text" name="title" value="{{$category->title ?? ''}}" required>
</div>
    <div class="grey_box">
    <label for="">Алиас</label>
    <input type="text" name="alias" value="{{$category->alias ?? ''}}" readonly>
</div>
<div class="grey_box">
    <label for="">Родительская категория</label>
    <select name="parent_id" id="">
        <option value="0">-- Без родителя --</option>
        @include('admin.categories.partials.categories', ['categories' => $categories])
    </select>
</div>

<input class="category__add grey_box" type="submit" name="submit" value="Сохранить">
