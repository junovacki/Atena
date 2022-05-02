<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTurmaProvasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('turma_provas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('idProva');
            $table->unsignedBigInteger('idTurma');
            $table->timestamps();

            $table->foreign('idProva')->references('idProva')->on('provas');
            $table->foreign('idTurma')->references('idTurma')->on('turmas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('turma_provas');
    }
}
