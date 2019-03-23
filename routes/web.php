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
    Route::resource('/category', 'CategoryController', ['as'=>'admin']);
    Route::resource('/manufacture', 'ManufactureController', ['as'=>'admin']);
    Route::resource('/currency', 'CurrencyController', ['as'=>'admin']);
    Route::resource('/unit', 'UnitController', ['as'=>'admin']);
    Route::resource('/rebate', 'RebateController', ['as'=>'admin']);
    //Route::post('/manufacture', 'ManufactureController@index', ['as'=>'admin']);
    //Route::get('/manufacture/sort', 'ManufactureController@sort', ['as'=>'admin']);
    // Route::post('/manufacture/sort', 'ManufactureController@sort', ['as'=>'admin']);
    Route::get('/product/category-{category}', 'ProductController@category', ['as'=>'admin'])->name('admin.product.category');
    Route::resource('/product', 'ProductController', ['as'=>'admin']);
    
});

Route::get('/', function () {
    $data = [
        'title' => 'Паркетный мир - Симферополь',
        'description' => 'Все виды паркета в Крыму по лучшим ценам'
    ];
    $data['breadcrumbs'] = \Request::get('breadcrumbs');
    return view('welcome', $data);
})->name('mainpage');

//Route::resource('/admin', 'Admin\AdminResource');

Route::get('/catalog/{category}', 'CatalogController@category')->name('category');

Route::get('/catalog/{category}/{subcategory}', 'CatalogController@subcategory')->name('subcategory')->middleware('breadcrumbs');

Route::get('/catalog/category-{category}/{subcategory}/{product}/{parameter?}', 'CatalogController@product')->name('product');
Route::get('/anyroute', 'CatalogController@anymethod')->name('anyroute');
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
