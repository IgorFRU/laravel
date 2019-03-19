<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuickpropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quickproperties', function (Blueprint $table) {
            $table->increments('id');            
            $table->integer('group_id')->unsigned();
            $table->string('property', 32);
            $table->string('value', 64);
            $table->string('css_style', 32);

            $table->foreign('group_id')
                ->references('id')
                ->on('quickpropertygroups')
                ->onDelete('cascade')
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
        Schema::dropIfExists('quickproperties');
    }
}
