<section> 
        <div class="grey_box">
            <label for="image">Файл</label>
            <input type="file" name="image">
        </div>
        <input name="article_id" type="hidden" value="{{ $article->id ?? '' }}">
    
        <input type="submit" id="imgupload" value="Отправить">
    </section>