<div class="grey_box">

        <label for="published">Опубликована</label>
                
            @if(isset($article->id))
                <input type="checkbox" name="published" id="" class="js_oneclick" value="{{ $article->published }}" @if($article->published) checked @endif>
            @else
                <input type="checkbox" name="published" id="" class="js_oneclick" value="1"  checked >
            @endif
            {{-- Скрытое поле для отправки на сервер value неотмеченного чекбокса --}}
            <input type="hidden" name="published" id="" class="js_oneclick_hidden" value="1" >
            
        </div>
        <div class="grey_box">
            <label for="">Название</label>
            <input type="text" name="article_name" value="{{$article->article_name ?? ''}}" required>
        </div>
        <div class="grey_box">
            <label for="">Алиас</label>
            <input type="text" name="alias" value="{{$article->alias ?? ''}}" readonly>
        </div>
        
        <input class="category__add grey_box" type="submit" name="submit" value="Сохранить">
        