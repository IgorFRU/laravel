@extends('admin.layouts.app_admin')

@section('content')

   <h1>Admin</h1>

   <div class="categories light_grey_box">
      <h2 class="categories__title">Категории</h2>
       <a href="#" class="category grey_box">
           <div class="category__title">Название категории</div>
<!--           <div class="category__detail">-->
               <span class="category__detail_watches"><i class="fa fa-eye" aria-hidden="true"></i> 100</span>
               <span class="category__detail_items"><i class="fa fa-th-large" aria-hidden="true"></i>25</span>
<!--           </div>-->
       </a>
       <a href="#" class="category grey_box">
           <div class="category__title">Название категории</div>
<!--           <div class="category__detail">-->
               <span class="category__detail_watches"><i class="fa fa-eye" aria-hidden="true"></i> 2565</span>
               <span class="category__detail_items"><i class="fa fa-th-large" aria-hidden="true"></i>365</span>
<!--           </div>-->
       </a>
       <a href="#" class="category grey_box">
           <div class="category__title">Название категории</div>
<!--           <div class="category__detail">-->
               <span class="category__detail_watches"><i class="fa fa-eye" aria-hidden="true"></i>7</span>
               <span class="category__detail_items"><i class="fa fa-th-large" aria-hidden="true"></i>2</span>
<!--           </div>-->
       </a>
       <a href="#" class="category grey_box">
           <div class="category__title">Название категории</div>
<!--           <div class="category__detail">-->
               <span class="category__detail_watches"><i class="fa fa-eye" aria-hidden="true"></i>15698</span>
               <span class="category__detail_items"><i class="fa fa-th-large" aria-hidden="true"></i>1356</span>
<!--           </div>-->
       </a>
       <a href="#" class="category grey_box">
           <div class="category__title">Название категории</div>
<!--           <div class="category__detail">-->
               <span class="category__detail_watches"><i class="fa fa-eye" aria-hidden="true"></i> 356</span>
               <span class="category__detail_items"><i class="fa fa-th-large" aria-hidden="true"></i>36</span>
<!--           </div>-->
       </a>
   </div>


@endsection
