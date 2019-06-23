<section>
    <div class="grey_box">

    </div>


    <div class="grey_box">
        <label for="image">Файл</label>
        <input type="file" name="image">
    </div>
    <input name="category_id" type="hidden" value="{{ $category->id ?? '' }}">

    <input type="submit" id="imgupload" value="Отправить">
</section>