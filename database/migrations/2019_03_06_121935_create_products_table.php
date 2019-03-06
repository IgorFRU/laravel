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
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('scu')->nullable();
            $table->string('product_name', 100);
            $table->string('slug', 100);
            $table->integer('category_id')->unsigned()->nullable();
            $table->integer('manufacture_id')->unsigned()->nullable();
            $table->integer('currency_id')->unsigned()->nullable(); //чтобы при удалении валюты не было конфликта. По умолчанию, если валюта не выбрана - руб.
            $table->decimal('price', 6, 2)->unsigned()->nullable();
            $table->integer('sale')->default(0);
            $table->integer('sale_type')->unsigned()->nullable();
            $table->string('short_description', 255)->nullable();
            $table->text('description')->nullable();
            $table->string('meta-title', 255)->nullable();
            $table->string('meta-description', 255)->nullable();
            $table->string('meta-keywords', 100)->nullable();
            $table->tinyInteger('published')->default(1);
            $table->tinyInteger('recomended')->default(0);
            $table->integer('views')->default(0);
            $table->tinyInteger('sample')->default(0);
            $table->integer('unit_id')->unsigned()->nullable();
            $table->tinyInteger('packaging_sales')->default(1);
            $table->decimal('in_package', 6, 3)->unsigned()->nullable();
            $table->timestamps();   
            
            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onDelete('set null')
                ->onUpdate('cascade');
            $table->foreign('manufacture_id')
                ->references('id')
                ->on('manufactures')
                ->onDelete('set null')
                ->onUpdate('cascade');
            $table->foreign('currency_id')
                ->references('id')
                ->on('currencies')
                ->onDelete('set null')
                ->onUpdate('cascade');
            $table->foreign('sale_type')
                ->references('id')
                ->on('sale_types')
                ->onDelete('set null')
                ->onUpdate('cascade');
            $table->foreign('unit_id')
                ->references('id')
                ->on('units')
                ->onDelete('set null')
                ->onUpdate('cascade');
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
