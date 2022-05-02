<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProvaPerguntasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prova_perguntas', function (Blueprint $table) {
            $table->bigIncrements('idProvaPergunta');
            $table->unsignedBigInteger('idPergunta');
            $table->unsignedBigInteger('idProva');
            $table->timestamps();

            $table->foreign('idPergunta')->references('idPergunta')->on('perguntas');
            $table->foreign('idProva')->references('idProva')->on('provas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prova_perguntas');
    }
}
