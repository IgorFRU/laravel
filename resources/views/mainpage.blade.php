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
                            <div class="btn main_btn">
                                <div class="main_btn__left">
                                    <i class="fas fa-ruble-sign"></i>
                                </div>
                                <div class="main_btn__right">
                                    Сделать заказ
                                </div>
                            </div>
                            <div class="btn help_btn">
                                <div class="help_btn__left">
                                    <i class="fas fa-question"></i>
                                </div>
                                <div class="help_btn__right">
                                    Консультация
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
                    <div class="top1_box">
                        <a href="#">
                            <img src={{asset('imgs/Tikovyie-polyi-v-vannoy.jpg')}} alt="">
                            <p>Паркет из тика в ванной комнате</p>
                        </a>
                    </div>
                    <div class="top1_box">
                        <a href="#">
                            <img src="imgs/Vyibelennaya-shirokaya-parketnaya-doska--1024x717.jpg" alt="">
                            <p>Масла OSMO - отличная защита деревянных фасадов</p>
                        </a>
                    </div>
                    <div class="top1_box">
                        <a href="#">
                            <img src="imgs/Tikovyie-polyi-v-vannoy.jpg" alt="">
                            <p>Паркет из тика в ванной комнате</p>
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <section class="categories">
            <div class="wrap">
            <p class="sortlink" data-sort_col="sort1_1" data-sort_type="sort1_2">10</p>
            <p class="sortlink" data-sort_col="sort2_1" data-sort_type="sort2_2">--</p>
            <a class="sortlink" data-sort_col=sort3_1 data-sort_type=sort3_2 href="/anyroute/?sort=qqq&sort2=888">sort2</a>
            

            @forelse ($menus as $menu)
                <h2>{{ $menu->menu }}</h2>
                <div class="categories__boxes">
                    
                            @forelse ($categories as $category)
                        
                                @if ($category->menu_id == $menu->id)
                                <div class="categories__boxes__category">
                                    <a href="/catalog/{{ $category->alias }}">
                                        <img src="imgs/Vyibelennaya-shirokaya-parketnaya-doska--1024x717.jpg" alt="">
                                    <p>{{ $category->title }}</p>
                                    <div class="categories__boxes__category__price">
                                        от <span class="price">1571,00</span> <i class="fas fa-ruble-sign"></i>
                                    </div>
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
            @empty                
            @endforelse
            </div>
        </section>
        <section>
            <div class="wrap content">

                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corrupti perspiciatis labore laudantium, excepturi maiores, optio fugiat, aut atque totam, accusantium corporis animi. Obcaecati quidem voluptatum, corrupti earum beatae repudiandae aperiam!

                <div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus veniam rem fugiat vitae laboriosam, ipsam magni, accusamus hic, repellat reprehenderit eius voluptatibus error commodi sunt libero veritatis officia, nemo dicta.</div>
                <div>Quos porro obcaecati, libero ut, rerum itaque, iusto amet consequuntur quaerat consectetur, dolore voluptatem aperiam eligendi necessitatibus. Natus voluptatibus, quibusdam voluptates praesentium autem eaque illum temporibus adipisci quas sunt molestias?</div>
                <div>Natus necessitatibus temporibus pariatur nisi reiciendis assumenda nobis, molestiae vel laudantium magnam voluptates quam maiores ipsa doloribus, labore illo iure sequi earum, minima quos! Explicabo et minima, blanditiis autem voluptatibus!</div>
                <div>Aperiam esse illo rem ea debitis facere dignissimos error voluptate nihil assumenda delectus non aspernatur laudantium fugit quidem magnam corporis, veritatis, amet. Earum a laboriosam laudantium, quos illum nostrum eius.</div>
                <div>Sunt impedit, inventore nostrum placeat facere similique quidem quaerat quia eius vel nobis saepe blanditiis, eos delectus nisi amet quis distinctio debitis necessitatibus ullam beatae, autem perferendis dolor. Debitis, vitae?</div>
                <div>Culpa perferendis numquam, vitae sequi doloribus dolorem laudantium molestiae unde dolore impedit soluta cumque obcaecati possimus ipsum illum reiciendis harum alias voluptatum blanditiis accusantium ducimus ab recusandae. Minus dolorum, dicta.</div>
                <div>Vitae ad tenetur, ullam ut dolor nostrum, ipsa possimus voluptatum obcaecati doloremque quia debitis similique optio eaque beatae iste assumenda autem excepturi distinctio eum mollitia minima. Libero nostrum itaque ducimus!</div>
                <div>Voluptas fugit, et vel porro ad, nobis possimus aut quia mollitia minima omnis molestias quos modi hic amet dolorum blanditiis, error ratione id. Perspiciatis cupiditate consequatur et inventore tenetur, quasi.</div>
                <div>Voluptas illo eligendi rerum quos minus? Dolore, officia. Aliquam assumenda minus quia doloribus nemo magnam velit distinctio, beatae earum iure. Quia, quisquam. Quam cumque dolore molestias. Adipisci laboriosam sit a!</div>
                <div>Quae debitis sed nulla. Minus voluptatum, architecto impedit dolores, commodi quas incidunt voluptas neque, aliquid nostrum aspernatur, praesentium doloribus labore dolore eveniet aut quos ducimus voluptates! Asperiores corporis odit neque!</div>
                <div>Alias accusamus ipsum aperiam, blanditiis voluptates quis odit maiores nobis aspernatur eos numquam dolore omnis praesentium. Animi itaque, eligendi quo ut pariatur consectetur numquam repellat, ratione enim, veritatis soluta nisi!</div>
                <div>Optio sapiente facilis unde consequatur, pariatur, hic eius fugiat asperiores quam provident culpa beatae dicta iste quas id fuga ipsum nihil. Voluptatum similique ducimus rerum earum possimus dolorem ea asperiores!</div>
                <div>Quod rem vero, tenetur nihil cum aperiam molestiae, optio reprehenderit vel. Minus nemo quasi amet! Eum repellendus deserunt dolore perspiciatis consectetur. Dolores recusandae reprehenderit cumque, expedita! Est labore vel molestias!</div>
                <div>Harum aperiam ipsum corrupti impedit ut repellat velit! Et vitae ab reprehenderit, laudantium delectus non blanditiis neque cumque minima necessitatibus accusamus corporis dolor ipsam odio doloremque fuga velit harum at.</div>
                <div>Quae expedita cum, libero magnam perspiciatis quas nesciunt sed incidunt blanditiis odio deleniti animi vitae voluptas veniam. Tempore illo explicabo nostrum vitae at obcaecati voluptas. Ullam aut eligendi ipsam illo!</div>
                <div>Possimus eos nemo magni aperiam, pariatur, necessitatibus sapiente, impedit, vitae omnis ab est? Consequuntur voluptatem quisquam molestiae ducimus. Magnam dolor maiores eos eum dicta ab a ullam laboriosam, eveniet inventore.</div>
                <div>Magnam impedit sint iste iure aspernatur, quis, voluptate adipisci, inventore laudantium magni mollitia repellat! Harum reiciendis asperiores eum ea alias quam, laborum, voluptatibus consequatur dolorem illum dicta, aliquid mollitia inventore.</div>
                <div>Tempore asperiores, voluptates expedita, quo quam voluptas rerum voluptatum repellat provident fuga ipsa quis facilis laboriosam corporis, sequi similique vitae iure modi unde, harum. Vero ea sint itaque tenetur iusto.</div>
                <div>Aliquam ea possimus libero nihil, omnis incidunt ut. Commodi reprehenderit impedit magnam rem hic, sit, quisquam neque veritatis temporibus, quibusdam cumque quas autem est. Voluptatibus delectus, eveniet qui adipisci doloribus.</div>
                <div>Necessitatibus quibusdam minus consequatur dignissimos perspiciatis ducimus culpa quo dolor libero veritatis, suscipit doloribus laudantium dolorem a! Tempora dolorem nobis, blanditiis explicabo consequatur deserunt facilis nemo veniam fuga eius mollitia.</div>
                <div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ratione a, earum quaerat dolor. Ad esse nulla cupiditate explicabo natus dignissimos debitis ab repellendus, id, porro velit aut quas, facere ipsam.</div>
                <div>Quibusdam officiis vero voluptatem natus distinctio modi minus sapiente dolorem velit, ad recusandae dignissimos qui, placeat itaque adipisci repellendus aut eum dolores aperiam, obcaecati veniam et eveniet quos tenetur nemo.</div>
                <div>Quaerat nulla, ullam in dolorum voluptatem necessitatibus blanditiis dicta iusto magni voluptates accusantium cumque eius soluta, quos rerum sint laudantium voluptas atque reprehenderit modi. Quisquam assumenda ipsum eius saepe beatae.</div>
                <div>Sit dignissimos quas neque, facilis expedita nesciunt velit sunt ullam doloremque? Fugiat, excepturi totam! Necessitatibus atque doloribus vero, eius cum animi nam dolore vitae velit, incidunt, nihil voluptatibus enim sapiente.</div>
                <div>Nulla labore reprehenderit voluptatibus asperiores iste, nemo similique dolor, ratione dolore saepe quis cum at tempore, perspiciatis corrupti expedita ut laboriosam commodi rerum, ducimus unde eligendi. Labore assumenda at autem?</div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi voluptatum illo quibusdam quos sunt nobis neque dicta maiores laboriosam deserunt minima, mollitia laborum! Fugiat a, tenetur, velit delectus voluptatem quo.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda ab deleniti laboriosam rerum cumque, similique pariatur unde, sint reiciendis veritatis ullam facere. Dolorum voluptate delectus iusto sequi soluta ducimus! Illo.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos, iusto! Beatae recusandae nemo sapiente quis unde perferendis nobis, laborum similique inventore dignissimos eveniet labore harum voluptate pariatur rerum blanditiis adipisci!Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum ratione obcaecati totam eaque porro eos est maxime id facilis voluptatem, quis quas, atque nulla perferendis animi molestiae doloribus, laboriosam vitae.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Totam eveniet blanditiis, quibusdam cum dolor expedita alias maiores quaerat consectetur. Labore nostrum vitae voluptate odio, ex. Ex praesentium vitae totam tempora!
            </div>
        </section>
    </article>
    <aside>

    </aside>
@endsection