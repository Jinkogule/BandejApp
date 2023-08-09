<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalendarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calendario', function (Blueprint $table) {
            $table->id();
            $table->string('dia_da_semana');
            $table->date('data');
            $table->unsignedBigInteger('cardapio_id')->nullable();
            $table->timestamps();

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
        Schema::dropIfExists('calendario');
    }
}
