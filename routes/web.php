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
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth']], function(){
    Route::get('/', 'CoreController@core')->name('admin.core');
});

Route::get('/', function () {
    $data = [
        'title' => 'Паркетный мир - Симферополь',
        'description' => 'Все виды паркета в Крыму по лучшим ценам'
    ];
    $data['breadcrumbs'] = \Request::get('breadcrumbs');
    return view('welcome', $data);
});

//Route::resource('/admin', 'Admin\AdminResource');

Route::get('/catalog/{category}', 'CatalogController@category')->name('category');

Route::get('/catalog/{category}/{subcategory}', 'CatalogController@subcategory')->name('subcategory')->middleware('breadcrumbs');

Route::get('/catalog/category-{category}/{subcategory}/{product}/{parameter?}', 'CatalogController@product')->name('product');

/*
Route::get('/{category}/{subcategory}/{product}/{parameter?}',function($category, $subcategory, $product, $parameter = null){
    
    $output = 'Category: '.$category.'. subcategory: '.$subcategory.'. product: '.$product;
    if($parameter) {
        $output .= '// параметр: '.$parameter;
    }
    
    echo $output;
});*/

Route::get('contacts', 'Controller@contacts');

Route::get('login', function() {
  // code here
})->name('login');



Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::get('/home', 'HomeController@index')->name('home');
