<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

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
        DB::table('cursos')->insert(array('nome_curso'=>'Analise de Sistemas','idModalidade'=>1, 'idCategoria'=>1, 'idTurno'=>1, 'ativo'=> true));
        DB::table('cursos')->insert(array('nome_curso'=>'Enfermagem','idModalidade'=>1, 'idCategoria'=>3, 'idTurno'=>1, 'ativo'=> true));

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
