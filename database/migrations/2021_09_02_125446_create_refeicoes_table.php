<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRefeicoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('refeicoes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_usuario');
            $table->string('tipo');
            $table->string('unidade_bandejao');
            $table->string('dia_da_semana');
            $table->date('data');
            $table->char('status_confirmacao', 1)->default('N');
            $table->char('status_validez', 1)->default('V');
            $table->integer('avaliacao')->nullable();
            $table->string('avaliacao_detalhada')->nullable();
            $table->unsignedBigInteger('cardapio_id')->nullable();
            $table->timestamps();

            $table->unique(['id_usuario', 'tipo', 'data']);

            $table->foreign('id_usuario')->references('id')->on('users')->onDelete('CASCADE')->onUpdate('CASCADE');;
            $table->foreign('cardapio_id')->references('id')->on('cardapios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('refeicoes');
    }
}
