
    <div class="grey_box">
    <label for="sale_type">Название</label>
    <input type="text" name="sale_type" value="{{$sale_type->sale_type ?? ""}}" required>
    </div>
    <div class="grey_box">
        <div class="row">
            <div>
                <label for="value">Значение</label>
                <input type="text" name="value" value="{{$sale_type->value ?? ""}}" >
            </div>
            <div>
                <select name="type" id="">
                    <option value="rub">Руб.</option>
                    <option value="%">%</option>
                </select>
            </div>            
        </div>        
    </div>
    
    <div class="grey_box">
        <div class="row">
            <div>            
                <label for="start_at">Действует с </label>
                <input type="date" name="start_at" id="">
            </div>
            <div>            
                <label for="end_at"> по </label>
                <input type="date" name="end_at" id="">
            </div>
        </div>
    </div>
    
    <input class="category__add grey_box" type="submit" name="submit" value="Сохранить">
    