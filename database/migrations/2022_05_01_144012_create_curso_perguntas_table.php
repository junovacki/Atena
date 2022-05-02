<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCursoPerguntasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('curso_perguntas', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->unsignedBigInteger('idCurso');
            $table->unsignedBigInteger('idPergunta');

            $table->foreign('idCurso')->references('idCurso')->on('cursos');
            $table->foreign('idPergunta')->references('idPergunta')->on('perguntas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('curso_perguntas');
    }
}
