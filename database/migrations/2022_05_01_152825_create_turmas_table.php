<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTurmasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('turmas', function (Blueprint $table) {
            $table->bigIncrements('idTurma');
            $table->unsignedBigInteger('idDisciplina');
            $table->unsignedBigInteger('idGrade');
            $table->unsignedBigInteger('idUser');
            $table->string('descricao');
            $table->string('serie');
            $table->string('ano');
            $table->string('semestre');
            $table->timestamps();

            $table->foreign('idDisciplina')->references('idDisciplina')->on('disciplinas');
            $table->foreign('idGrade')->references('idGrade')->on('grades');
            $table->foreign('idUser')->references('idUser')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('turmas');
    }
}
