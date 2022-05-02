<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlunoCursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aluno_cursos', function (Blueprint $table) {
            $table->bigIncrements('idAlunoCurso');
            $table->unsignedBigInteger('idCurso');
            $table->unsignedBigInteger('idAluno');
            $table->unsignedBigInteger('idSituacaoMatricula');
            $table->timestamps();

            $table->foreign('idCurso')->references('idCurso')->on('cursos');
            $table->foreign('idAluno')->references('idAluno')->on('alunos');
            $table->foreign('idSituacaoMatricula')->references('idSituacaoMatricula')->on('situacao_matriculas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aluno_cursos');
    }
}
