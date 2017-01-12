<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEtiquetasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('etiquetas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');


            $table->timestamps();
        });
        Schema::create('articulo_etiqueta', function (Blueprint $table){
            $table->increments('id');
            $table->integer('articulo_id')->unsigned();
            $table->integer('etiqueta_id')->unsigned();

            $table->foreign('articulo_id')->references('id')->on('articulos')->onDelete('cascade');
              $table->foreign('etiqueta_id')->references('id')->on('etiquetas')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('etiquetas');
    }
}
