<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('manufactures', function (Blueprint $table) {
            $table->increments('id');
            $table->string('manufacturer', 32);
            $table->timestamps();
        });
        
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 32);
            $table->string('img', 32);
            $table->string('alias')->unique();
            $table->timestamps();
        });
        
        Schema::create('subcategories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 32);
            $table->string('img', 32);
            $table->integer('category_id')->nullable();
            $table->string('alias')->unique();
            $table->tinyInteger('show')->nullable();
            $table->timestamps();
        });
        
        //обозначение валюты
        Schema::create('currencies', function (Blueprint $table) {
            $table->increments('id');
            $table->char('currency', 3);
            $table->string('css_style', 32);
            $table->timestamps();
        });
        
        //тип скидки: проценты, сумма
        Schema::create('discount_type', function (Blueprint $table) {
            $table->increments('id');
            $table->string('discount', 30);
            $table->timestamps();
        });
        
        //единицы измерения
        Schema::create('units', function (Blueprint $table) {
            $table->increments('id');
            $table->string('unit', 32);
            $table->timestamps();
        });
        
        //файлы: каталоги, сертификаты, инструкции
        Schema::create('downloads', function (Blueprint $table) {
            $table->increments('id');
            $table->string('file');
            $table->timestamps();
        });
        
        Schema::create('images', function (Blueprint $table) {
            $table->increments('id');
            $table->string('file');
            $table->timestamps();
        });
        
        //быстрые свойства, выводимые в списке товаров к каждому товару
        Schema::create('quick_properties', function (Blueprint $table) {
            $table->increments('id');
            $table->string('property', 32);
            $table->string('value', 32);
            $table->string('css_style', 32);
        });
        
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('scu')->nullable();
            $table->integer('inner_scu')->unique();
            $table->string('product_name', 100);
            $table->string('alias', 100)->unique();
            $table->integer('category_id')->unsigned()->nullable();
            $table->integer('manufacturer_id')->unsigned()->nullable();
            $table->integer('price')->unsigned()->nullable();
            $table->integer('currency_id')->unsigned();
            $table->integer('sale')->nullable();
            $table->integer('sale_type')->unsigned()->nullable();
            $table->string('short_description', 255)->nullable();
            $table->text('description')->nullable();
            $table->string('meta', 255)->nullable();
            $table->tinyInteger('show')->nullable();
            $table->boolean('recomended')->nullable();
            $table->boolean('for_sale')->nullable();
            $table->boolean('sample')->nullable();
            $table->integer('unit')->unsigned()->nullable();
            $table->boolean('packaging_sales')->nullable();
            $table->decimal('in_package', 6, 3)->nullable();
            $table->timestamps();    
        });        
        
        Schema::table('products', function(Blueprint $table){
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('manufacturer_id')->references('id')->on('manufactures')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('currency_id')->references('id')->on('currencies');
            $table->foreign('sale_type')->references('id')->on('discount_type')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('unit')->references('id')->on('units')->onDelete('set null')->onUpdate('cascade');
        });
        
        //таблицы для связей многие-ко-многим
        Schema::create('product_quick_properties', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('property_id')->unsigned();
            $table->integer('product_id')->unsigned();
        });
        
        Schema::create('product_images', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('image_id')->unsigned();
            $table->integer('product_id')->unsigned();
        });
        
        Schema::create('product_downloads', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('file_id')->unsigned();
            $table->integer('product_id')->unsigned();
        });
        
        //обеспечение связей многие-ко-многим        
        Schema::table('product_downloads', function(Blueprint $table){
            $table->foreign('file_id')->references('id')->on('downloads');
            $table->foreign('product_id')->references('id')->on('products');
        });      
        
        Schema::table('product_images', function(Blueprint $table){
            $table->foreign('image_id')->references('id')->on('images');
            $table->foreign('product_id')->references('id')->on('products');
        });
        
        Schema::table('product_quick_properties', function(Blueprint $table){
            $table->foreign('property_id')->references('id')->on('quick_properties');
            $table->foreign('product_id')->references('id')->on('products');
        });        
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
