<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSaletypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saletypes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sale_type', 32);
            $table->integer('value');
            $table->enum('type', ['rub', '%']);
            $table->date('start_at')->nullable();
            $table->date('end_at')->nullable();
            $table->smallInteger('active')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('saletypes');
    }
}
