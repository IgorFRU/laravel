
<label for="to_update">Запрашивать курс обмена?</label>        
@if(isset($currency->id))
    <input type="checkbox" name="to_update" id="" class="js_oneclick" value="{{ $currency->to_update }}" @if($currency->to_update) checked @endif>
    {{-- Скрытое поле для отправки на сервер value неотмеченного чекбокса --}}
    <input type="hidden" name="to_update" id="" class="js_oneclick_hidden" value="{{ $currency->to_update }}" >  
@else
    <input type="checkbox" name="to_update" id="" class="js_oneclick" value="1"  checked >
    {{-- Скрытое поле для отправки на сервер value неотмеченного чекбокса --}}
    <input type="hidden" name="to_update" id="" class="js_oneclick_hidden" value="1" > 
@endif
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
