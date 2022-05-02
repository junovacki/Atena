<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGradeDisciplinasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grade_disciplinas', function (Blueprint $table) {
            $table->bigIncrements('idGradeDisciplina');
            $table->unsignedBigInteger('idDisciplina');
            $table->unsignedBigInteger('idGrade');
            $table->string('cargaHoraria');
            $table->timestamps();

            $table->foreign('idDisciplina')->references('idDisciplina')->on('disciplinas');
            $table->foreign('idGrade')->references('idGrade')->on('grades');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grade_disciplinas');
    }
}
