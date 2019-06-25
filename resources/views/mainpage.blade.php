@extends('layouts.main')

@section('content')
<article>
        <div class="headarticle">
            <section class="headsection">
                <div class="headsection__body">
                    <div class="headsection__body__left">
                        <h1>Продажа, укладка и ремонт паркета в Крыму</h1>
                        <h2 class="headsection__body__left__text">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veniam molestiae commodi non reprehenderit incidunt ex, beatae placeat, deleniti, cum veritatis amet nihil animi tenetur. Quasi repellat itaque, blanditiis nobis! Libero?
                        </h2>
                        <div class="headsection__btn">
                            {{-- <div class="btn main_btn">
                                <div class="main_btn__left">
                                    <i class="fas fa-ruble-sign"></i>
                                </div>
                                <div class="main_btn__right">
                                    Сделать заказ
                                </div>
                            </div> --}}
                            <div class="btn help_btn">
                                <div class="help_btn__left">
                                    <i class="fas fa-question"></i>
                                </div>
                                <div class="help_btn__right"> <!-- container -->
                                   Задать вопрос
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="headsection__body__right">
                    </div>
                </div>
            </section>
        </div>
        <section class="top1">
            <div class="wrap">
                <div class="top1__boxes">
                    @foreach ($articles as $article)
                        <div class="top1_box">
                            <a href="{{ route('article.show', ['article' => $article->alias]) }}">
                                <img src="{{asset('imgs/articles')}}/{{ $article->img }}" alt="">
                                <p>{{ $article->article_name }}</p>
                            </a>
                        </div>    
                    @endforeach
                    <div class="top1_box_all">
                        <a href="{{asset('articles')}}">Все статьи...</a>
                    </div>
                </div>
            </div>
        </section>
        <section id="recomended_products">
            <div class="wrap">
                @if (isset($recomended_products) && count($recomended_products))
                <div class="recomended_products white_card_global">
                    <div class="white_card_global__header">
                        Рекомендованые товары    
                    </div>
                        <div class="recomended_products__slider">
                            @foreach ($recomended_products as $product) 
                                <div class="recomended_products__item grey_card_global">
                                    <div class="recomended_products__item__img">
                                        @if ($product->thumbnail)
                                            <img class="normal_product_image" src="{{ asset('imgs/products/thumbnail/')}}/{{ $product->thumbnail}}" alt="">
                                        @else
                                            <img src="{{ asset('imgs/image_not_found.png')}}" alt="">
                                        @endif   
                                    </div>
                                    <div class="recomended_products__item__title">
                                        @if($product->category->parent_id)
                                            <a href="{{ route('product.subcategory', ['category' => $product->category->alias, 'subcategory' => $product->category->parent_id, 'product' => $product->slug, 'parameter' => '']) }}">{{ $product->product_name }}</a>
                                        @else
                                            <a href="{{ route('product', ['category' => $product->category->alias, 'product' => $product->slug, 'parameter' => '']) }}">{{ $product->product_name }}</a>
                                        @endif
                                    </div>                            
                                </div>
                            @endforeach   
                        </div>
                    </div>
                @endif
            </div>
        </section>

        <div class="modal_send_question">
            <div class="modal_send_question__header">
                Задать вопрос
                <div class="modal_send_question__header__close">
                    
                </div>
            </div>
            <form id="send_question">
                @csrf
                <input type="text" id="question_phone" name="phone" placeholder="Номер телефона" required>
                <input type="text" id="question_name" name="name" placeholder="Имя" required>
                <textarea id="question_question" name="question" placeholder="Ваш вопрос" required maxlength="500" rows="5"></textarea>
                <div id="question">Отправить</div>
            </form>
        </div>
        <section class="categories">
            <div class="wrap">
            @forelse ($menus as $menu)
            <section>
            <div class="recomended_products white_card_global">
                    <div class="white_card_global__header">
                        <h2>{{ $menu->menu }}</h2>    
                    </div>
                    <div class="categories__boxes">                    
                            @forelse ($categories as $category)
                        
                                @if ($category->menu_id == $menu->id)
                                <div class="categories__boxes__category">
                                    <a href="/catalog/{{ $category->alias }}">
                                        @if ($category->img)
                                            <img src="{{ asset('imgs/categories')}}/{{ $category->img }}" alt="">
                                        @else
                                            <img src="{{ asset('imgs/image_not_found.png') }}" alt="">
                                        @endif
                                        
                                    <p>{{ $category->title }}</p>
                                    {{-- <div class="categories__boxes__category__price">
                                        от <span class="price">1571,00</span> <i class="fas fa-ruble-sign"></i>
                                    </div> --}}
                                    <div class="category__info">
                                        
                                        @if($category->description != '')
                                            <div class="info">
                                                <i class="fas fa-info-circle"></i>
                                            </div>
                                            <div class="categories__boxes__category__info">
                                                <span>{{ $category->description }}</span>
                                            </div>
                                        @endif
                                        
                                     </div>
                                    </a>
                                </div>
                                @endif
                            
                            @empty                        
                            @endforelse      
                        
                </div>
            </div>  
        </section>              
            @empty   
                         
            @endforelse
            </div>
        </section>
        <section class="about_main">
            <div class="wrap">
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ex, quaerat illo? Sint veniam architecto vitae autem excepturi ipsum deleniti. Inventore consectetur tempore nam provident sunt? Ducimus ipsa perspiciatis accusamus vero.
                At esse eaque vero sapiente repellendus molestiae totam officia laborum pariatur. Nemo totam expedita voluptatem perferendis rem officia repudiandae iste placeat necessitatibus! Aspernatur animi fugit velit nobis voluptatem ipsa odit.
                Rerum dolore aut quo impedit est, ut id voluptates labore velit vitae iusto optio error aliquam facere nam enim assumenda sint vero cupiditate minus fugit consequuntur minima molestias! Numquam, odio.
                Voluptatum nostrum sed mollitia porro adipisci deserunt pariatur, obcaecati alias odit sapiente accusantium, expedita, soluta ipsum. Unde consequuntur, eos, debitis magni commodi, quod adipisci deserunt explicabo perspiciatis nihil esse recusandae!
                Nesciunt nulla temporibus suscipit. Nobis distinctio, doloremque perferendis ipsa velit eveniet eum alias consectetur exercitationem, asperiores expedita beatae excepturi hic mollitia labore quo debitis ad corporis voluptatibus recusandae quibusdam voluptas.</p>
            </div>
            
        </section>
        <section>
            <div class="wrap content">
                
            </div>
        </section>
    </article>
    <aside>

    </aside>
@endsection