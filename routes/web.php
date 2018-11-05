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

/*Route::get('/{id}',function($id){
  echo 'ID: '.$id;
});*/

Route::get('contacts', 'Controller@contacts');

//Route::get('login', function() {
//  // code here
//})->name('login');

Route::get('catalog', 'Catalog@main')->name('catalog');
