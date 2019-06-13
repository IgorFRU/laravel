<section>
    <div class="grey_box">

    </div>


    <div class="grey_box">
        <label for="image">Файл</label>
        <input type="file" name="image">
    </div>
    <div class="grey_box">
        <label for="name">Название файла</label>
        <input type="text" name="name" id="">
    </div>
    <div class="grey_box">
        <label for="alt">Alt</label>
        <input type="text" name="alt" id="">
    </div>
    <div class="grey_box">
        <label for="main">Главное изображение</label>
        <input type="checkbox" name="main" id="main" value="1">
    </div>

    <input name="product_id" type="hidden" value="{{ $product->id ?? '' }}">

    <input type="submit" id="imgupload" value="Отправить">
</section>