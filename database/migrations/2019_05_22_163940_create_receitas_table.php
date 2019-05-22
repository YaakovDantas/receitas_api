<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateReceitasTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receitas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 25);
            $table->string('procedure');
            $table->integer('publisher_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('publisher_id')->references('id')->on('usuarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('receitas');
    }
}
