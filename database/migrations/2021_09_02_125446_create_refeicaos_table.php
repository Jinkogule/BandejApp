<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRefeicaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('refeicaos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_usuario');
            $table->string('tipo');
            $table->string('unidade_bandejao');
            $table->string('cardapio');
            $table->string('dia_da_semana');
            $table->char('status_confirmacao', 1)->default('N');
            $table->char('status_validez', 1)->default('V');
            $table->timestamps();

            $table->unique(['id_usuario', 'tipo', 'dia_da_semana']);

            $table->foreign('id_usuario')->references('id')->on('users')->onDelete('CASCADE')->onUpdate('CASCADE');;
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('refeicaos');
    }
}
