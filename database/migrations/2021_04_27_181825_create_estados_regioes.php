<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstadosRegioes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estados_regioes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_estado')->unsigned();
            $table->integer('id_regiao_ibge')->unsigned();
            $table->char('sigla', 2);
            $table->string('nome');
            $table->foreign('id_estado')->references('id')->on('estados');
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
        Schema::dropIfExists('estados_regioes');
    }
}
