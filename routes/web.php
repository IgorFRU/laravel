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
    Route::any('/productimg', 'UploadImagesController@product', ['as'=>'admin'])->name('admin.productimg');
    Route::any('/categoryimg', 'UploadImagesController@category', ['as'=>'admin'])->name('admin.categoryimg');
    Route::any('/articleimg', 'UploadImagesController@article', ['as'=>'admin'])->name('admin.articleimg');
    Route::resource('/menu', 'MenuController', ['as'=>'admin']);
    Route::resource('/article', 'ArticleController', ['as'=>'admin']);
    
});

Route::get('/', 'MainController@index')->name('mainpage');
Route::get('/send-question', 'SandmailController@question')->name('send_question');
Route::get('/oneclick-purcache', 'SandmailController@oneclick')->name('oneclick_purcache');
Route::get('/articles', 'ArticleController@index')->name('articles.index');
Route::get('/articles/{article}', 'ArticleController@show')->name('article.show');

//Route::resource('/admin', 'Admin\AdminResource');

Route::get('/catalog/{category}', 'CatalogController@category')->middleware('currencyrates')->name('category');

//Route::get('/catalog/{category}/{subcategory}', 'CatalogController@subcategory')->name('subcategory')->middleware('breadcrumbs');

Route::get('/catalog/{category}/{product}/{parameter?}', 'CatalogController@product')->middleware('currencyrates')->name('product');
Route::get('/catalog/{category}/{subcategory}/{product}/{parameter?}', 'CatalogController@product')->middleware('currencyrates')->name('product.subcategory');
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
