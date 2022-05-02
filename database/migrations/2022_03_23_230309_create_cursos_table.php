<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cursos', function (Blueprint $table) {
            $table->id('idCurso')->autoIncrement();
            $table->string('nome_curso');
            $table->unsignedBigInteger('idModalidade');
            $table->unsignedBigInteger('idCategoria');
            $table->unsignedBigInteger('idTurno');
            $table->boolean('ativo');
            $table->timestamps();

            $table->foreign('idModalidade')->references('idModalidade')->on('modalidades');
            $table->foreign('idCategoria')->references('idCategoria')->on('categorias');
            $table->foreign('idTurno')->references('idTurno')->on('turnos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cursos');
    }
}
