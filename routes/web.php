<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
//    return view('welcome');
    return view('welcome');
});

Route::get('/{category}',function($category){
  echo 'Category: '.$category;
});

Route::get('/{category}/{subcategory}',function($category, $subcategory){
  echo 'Category: '.$category.'. subcategory: '.$subcategory;
});

Route::get('/{category}/{subcategory}/{product}',function($category, $subcategory, $product){
  echo 'Category: '.$category.'. subcategory: '.$subcategory.'. product: '.$product;
});

Route::get('contacts', 'Controller@contacts');

//Route::get('login', function() {
//  // code here
//})->name('login');

Route::get('catalog', 'Catalog@main')->name('catalog');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
