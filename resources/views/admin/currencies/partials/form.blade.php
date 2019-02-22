
<div class="grey_box">
<label for="currency">Название (код)</label>
<input type="text" name="currency" value="{{$currency->currency ?? ""}}" required>
</div>
<div class="grey_box">
<label for="currency_rus">Русское название</label>
<input type="text" name="currency_rus" value="{{$currency->currency_rus ?? ""}}">
</div>
<label for="css_style">CSS-стиль</label>
<input type="text" name="css_style" value="{{$currency->css_style ?? ""}}">

<input class="category__add grey_box" type="submit" name="submit" value="Сохранить">
