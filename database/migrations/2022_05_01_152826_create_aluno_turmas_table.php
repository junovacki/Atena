<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlunoTurmasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aluno_turmas', function (Blueprint $table) {
            $table->id('idAlunoTurma')->autoIncrement();
            $table->unsignedBigInteger('idTurma');
            $table->unsignedBigInteger('idAluno');
            $table->string('nota');
            $table->string('resultadoNota');
            $table->timestamps();

            $table->foreign('idTurma')->references('idTurma')->on('turmas');
            $table->foreign('idAluno')->references('idAluno')->on('alunos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aluno_turmas');
    }
}
