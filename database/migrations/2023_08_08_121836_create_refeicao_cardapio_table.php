<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRefeicaoCardapioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('refeicao_cardapio', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('refeicao_id');
            $table->unsignedBigInteger('cardapio_id');
            $table->timestamps();

            // Cria chaves estrangeiras para associar a refeicao e o cardapio
            $table->foreign('refeicao_id')->references('id')->on('refeicoes')->onDelete('CASCADE')->onUpdate('CASCADE');;
            $table->foreign('cardapio_id')->references('id')->on('cardapios')->onDelete('CASCADE')->onUpdate('CASCADE');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('refeicao_cardapio');
    }
}
