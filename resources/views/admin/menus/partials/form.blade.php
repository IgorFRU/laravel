<div class="grey_box">
    <label for="menu">Название</label>
    <input type="text" name="menu" value="{{$menu->menu ?? ''}}" required>
</div>
<div class="grey_box">
    <label for="sortpriority">Приоритет</label>
    <div>
        <input type="range" name="sortpriority" id="" min="0" max="20" value="{{$menu->sortpriority ?? 0}}" required>
        
    </div>
    

</div>

<input class="category__add grey_box" type="submit" name="submit" value="Сохранить">
