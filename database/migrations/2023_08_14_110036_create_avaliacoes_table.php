<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAvaliacoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('avaliacoes', function (Blueprint $table) {
            $table->id();
            $table->integer('atendimento_nota')->unsigned();
            $table->string('atendimento_comentario', 1000)->nullable();
            $table->integer('ambiente_nota')->unsigned();
            $table->string('ambiente_comentario', 1000)->nullable();
            $table->integer('cardapios_nota')->unsigned();
            $table->string('cardapios_comentario', 1000)->nullable();
            $table->integer('fila_nota')->unsigned();
            $table->string('fila_comentario', 1000)->nullable();
            $table->integer('comida_nota')->unsigned();
            $table->string('comida_comentario', 1000)->nullable();
            $table->integer('outro_topico_nota')->unsigned();
            $table->string('outro_topico_comentario', 1000)->nullable();
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
        Schema::dropIfExists('avaliacoes');
    }
}
