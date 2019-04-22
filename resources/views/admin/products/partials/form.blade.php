<section>
    <p>Основная информация</p>
    <div class="row">
        <div class="left_45">
            <div class="grey_box">
                <label for="scu">Артикул</label>
                <input type="text" name="scu" value="{{$product->scu ?? ''}}" >
                <label for="published"><i class="fa fa-eye" aria-hidden="true"></i></label>        
                    @if(isset($product->id))
                        <input type="checkbox" name="published" id="" class="js_oneclick" value="{{ $product->published }}" @if($product->published) checked @endif>
                        {{-- Скрытое поле для отправки на сервер value неотмеченного чекбокса --}}
                        <input type="hidden" name="published" id="" class="js_oneclick_hidden" value="{{ $product->published }}" >  
                    @else
                        <input type="checkbox" name="published" id="" class="js_oneclick" value="1"  checked >
                        {{-- Скрытое поле для отправки на сервер value неотмеченного чекбокса --}}
                        <input type="hidden" name="published" id="" class="js_oneclick_hidden" value="1" > 
                    @endif
                <label for="recomended"><i class="fas fa-thumbs-up"></i></label>        
                    @if(isset($product->id))
                        <input type="checkbox" name="recomended" id="" class="js_oneclick" value="{{ $product->recomended }}" @if($product->recomended) checked @endif>
                        {{-- Скрытое поле для отправки на сервер value неотмеченного чекбокса --}}
                        <input type="hidden" name="recomended" id="" class="js_oneclick_hidden" value="{{ $product->recomended }}" > 
                    @else
                        <input type="checkbox" name="recomended" id="" class="js_oneclick" value="0" >
                        {{-- Скрытое поле для отправки на сервер value неотмеченного чекбокса --}}
                        <input type="hidden" name="recomended" id="" class="js_oneclick_hidden" value="0" > 
                    @endif
                {{-- class="popup_span" в дальнейшем применится для добавления всплывающих подсказок для чекбоксов --}}
                <label for="sample" class="popup_span"><i class="far fa-window-restore"></i></label>        
                    @if(isset($product->id))
                        <input type="checkbox" name="sample" id="" class="js_oneclick" value="{{ $product->sample }}" @if($product->sample) checked @endif>
                        {{-- Скрытое поле для отправки на сервер value неотмеченного чекбокса --}}
                        <input type="hidden" name="sample" id="" class="js_oneclick_hidden" value="{{ $product->sample }}" > 
                    @else
                        <input type="checkbox" name="sample" id="" class="js_oneclick" value="0" >
                        {{-- Скрытое поле для отправки на сервер value неотмеченного чекбокса --}}
                        <input type="hidden" name="sample" id="" class="js_oneclick_hidden" value="0" > 
                    @endif
                @if(isset($product->id))
                    <span>id: {{ $product->id }}</span>
                @endif    
            </div>
            <div class="grey_box">
                <label for="product_name">Название</label>
                <input type="text" name="product_name" value="{{$product->product_name ?? ''}}" required>
            </div>
            <div class="grey_box">
                <label for="slug">Алиас</label>
                <input type="text" name="slug" value="{{$product->slug ?? ''}}" readonly>
            </div>
        </div>
        <div class="right_45">  
            <div class="grey_box">
                <label for="category_id">Категория</label>
                <select name="category_id" id="" >
                    <option value="">-- Не указанаP --</option>
                    @include('admin.products.partials.categories', ['categories' => $categories])
                </select>
            </div>
            
            <div class="grey_box">
                <label for="manufacture_id">Производитель</label>
                <select name="manufacture_id" id="" >
                    <option value="">-- Не указан --</option>
                    @foreach($manufactures as $manufacture)
                        <option value="{{ $manufacture->id }}"
                            @isset($product->manufacture_id)
                                @if ($manufacture->id == $product->manufacture_id)
                                selected = "selected"
                                @endif
                            @endisset
                        >
                        {{ $manufacture->manufacture }}
                    </option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    
</section>

<section>
    <p>Цены и размеры</p>
    <div class="left_45">
        <div class='row'>
            <label for="unit_id">Ед.изм.</label>
            <select name="unit_id" id="" >
                @forelse($units as $unit)
                    <option value="{{ $unit->id }}"
                        @isset($product->unit_id)
                            @if ($unit->id == $product->unit_id)
                                selected = "selected"
                            @endif
                        @endisset
                    >
                    {{ $unit->unit }}
                </option>
                @empty
                    <option value="">Ничего нет</option>
                @endforelse
            </select>
            <label for="packaging_sales">Кратно упаковкам?</label>
                @if(isset($product->id))
                    <input type="checkbox" name="packaging_sales" id="" class="js_oneclick" value="{{ $product->packaging_sales }}" @if($product->published) checked @endif>
                    {{-- Скрытое поле для отправки на сервер value неотмеченного чекбокса --}}
                    <input type="hidden" name="packaging_sales" id="" class="js_oneclick_hidden" value="{{ $product->packaging_sales }}" >  
                @else
                    <input type="checkbox" name="packaging_sales" id="" class="js_oneclick" value="1"  checked >
                    {{-- Скрытое поле для отправки на сервер value неотмеченного чекбокса --}}
                    <input type="hidden" name="packaging_sales" id="" class="js_oneclick_hidden" value="1" > 
                @endif
            <label for="in_package">В упаковке</label>
            <input type="text" name="in_package" value="{{$product->in_package ?? ''}}">
        </div>
    </div>
</section>

<section>
    <P>Цена</P>
    <div class="left_45">
        <div class="row">
            <label for="price">Цена базовая</label>
            <input type="text" name="price" value="{{$product->price ?? ''}}">

            <label for="currency_id">Валюта</label>
            <select name="currency_id" id="" >
                @foreach($currencies as $currency)
                    <option value="{{ $currency->id }}"
                        @isset($product->currency_id)
                            @if ($currency->id == $product->currency_id)
                            selected = "selected"
                            @endif
                        @endisset
                    >
                    {{ $currency->currency_rus }}
                </option>
                @endforeach
            </select>

        </div>
        
    </div>
    <div class="right_45">
        <label for="sale"><i class="fas fa-percentage"></i></label>        
            @if(isset($product->id))
                <input type="checkbox" name="sale" id="" class="js_oneclick" value="{{ $product->sale }}" @if($product->sale) checked @endif>
                {{-- Скрытое поле для отправки на сервер value неотмеченного чекбокса --}}
                <input type="hidden" name="sale" id="" class="js_oneclick_hidden" value="{{ $product->sale }}" >  
            @else
                <input type="checkbox" name="sale" id="" class="js_oneclick" value="1"  checked >
                {{-- Скрытое поле для отправки на сервер value неотмеченного чекбокса --}}
                <input type="hidden" name="sale" id="" class="js_oneclick_hidden" value="1" > 
            @endif

        <label for="rebate">Глобальная политика скидок</label>
        <select name="rebate" id="" >
            <option value="">Нет</option>
            @foreach($rebates as $rebate)
                <option value="{{ $rebate->id }}"
                    @isset($product->rebate)
                        @if ($rebate->id == $product->rebate)
                        selected = "selected"
                        @endif
                    @endisset
                >
                {{ $rebate->rebate }} | {{ $rebate->value }}{{ $rebate->type }} @if($rebate->end_at)| {{ $rebate->end_at }} @endif
                </option>
            @endforeach
        </select>    
    </div>
</section>

<section>
    <P>Мета-теги</P>
    <div class="left_45">
        <div class="grey_box">
            <div class="row">
                <label for="short_description">Описание</label>
                <div>
                    <label for="short_description_flag">Краткое описание из полного</label>
                    <input type="checkbox" name="short_description_flag" id="" value="1">
                </div>            
            </div>
            <textarea name="short_description" id="short_description" cols="30" rows="5" maxlength="255" placeholder="<255"
                >{{$product->short_description ?? ''}}</textarea>
        </div>
        <div class="grey_box">
            <label for="description">Описание</label>
            <textarea name="description" id="description" cols="30" rows="10">{{$product->description ?? ''}}</textarea>
        </div>
    </div>

    <div class="right_45">
        <div class="grey_box">
            <label for="meta_title">Заголовок (meta)</label>
            <textarea name="meta_title" id="meta_title" cols="30" rows="2">{{$product->meta_title ?? ''}}</textarea>
        </div>
        <div class="grey_box">
            <label for="meta_description">Описание (meta)</label>
            <textarea name="meta_description" id="meta_description" cols="30" rows="10">{{$product->meta_description ?? ''}}</textarea>
        </div>
        <div class="grey_box">
            <label for="meta_keywords">Ключевые слова (meta)</label>
            <textarea name="meta_keywords" id="meta_keywords" cols="30" rows="2">{{$product->meta_keywords ?? ''}}</textarea>
        </div>
    </div>
</section>

<button>Сохранить</button>
<input class="category__add grey_box" type="submit" name="submit" value="Сохранить и выйти">
