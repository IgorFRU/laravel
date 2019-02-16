<div class="grey_box">
<label for="published">Статус</label>
<select name="published" id="">
    
    @if(isset($manufacture->id))
        <option value="0" @if($manufacture->published == 0) selected="" @endif>
            Не опубликован
        </option>
        <option value="1" @if($manufacture->published == 1) selected="" @endif>
            Опубликован
        </option>
    @else
        <option value="1">Опубликован</option>
        <option value="0">Не опубликован</option>    
    @endif
    
</select>
</div>
<div class="grey_box">
<label for="manufacture">Название</label>
<input type="text" name="manufacture" value="{{$manufacture->manufacture ?? ""}}" required>
</div>
<div class="grey_box">
<label for="alias">Алиас</label>
<input type="text" name="alias" value="{{$manufacture->slug ?? ""}}
" readonly>
</div>
<label for="image">Изображение</label>
<input type="file" name="image" id="image" accept="image/jpeg,image/png">
<div class="grey_box">
<label for="description">Описание</label>
<textarea name="description" id="description" cols="30" rows="10">{!! $manufacture->description ?? "" !!}</textarea>
</div>

<input class="category__add grey_box" type="submit" name="submit" value="Сохранить">
