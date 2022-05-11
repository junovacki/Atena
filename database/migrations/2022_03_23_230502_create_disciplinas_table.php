<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateDisciplinasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disciplinas', function (Blueprint $table) {
            $table->bigIncrements('idDisciplina');
            $table->string('nome_disciplina');
            $table->boolean('ativo');
            $table->timestamps();
        });
        DB::table('disciplinas')->insert(array('nome_disciplina'=>'Engenharia de software','ativo'=>true));
        DB::table('disciplinas')->insert(array('nome_disciplina'=>'Aplicação de vacinas','ativo'=>true));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('disciplinas');
    }
}
