<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProvaAlunosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prova_alunos', function (Blueprint $table) {
            $table->bigIncrements('idProvaAluino');
            $table->unsignedBigInteger('idAluno');
            $table->unsignedBigInteger('idTurma');
            $table->unsignedBigInteger('idUser');
            $table->unsignedBigInteger('idProva');
            $table->boolean('presente');
            $table->string('quantidadeAcerto');
            $table->timestamps();

            $table->foreign('idAluno')->references('idAluno')->on('alunos');
            $table->foreign('idTurma')->references('idTurma')->on('turmas');
            $table->foreign('idUser')->references('idUser')->on('users');
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
        Schema::dropIfExists('prova_alunos');
    }
}
