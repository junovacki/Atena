<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreatePerguntasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perguntas', function (Blueprint $table) {
            $table->bigIncrements('idPergunta');
            $table->text('criado_por');
            $table->text('texto_pergunta');
            $table->text('idCurso');
            $table->unsignedBigInteger('idDisciplina');
            $table->text('texto_resposta_a');
            $table->text('texto_resposta_b');
            $table->text('texto_resposta_c');
            $table->text('texto_resposta_d');
            $table->text('texto_resposta_e');
            $table->text('alternativa_a');
            $table->text('alternativa_b');
            $table->text('alternativa_c');
            $table->text('alternativa_d');
            $table->text('alternativa_e');
            $table->timestamps();

            $table->foreign('idDisciplina')->references('idDisciplina')->on('disciplinas');

        });
        DB::table('perguntas')->insert(array('criado_por'=>'professor', 'texto_pergunta'=>'Pergunta escrita pelo professor', 'idCurso'=>1, 'idDisciplina'=>1, 'texto_resposta_a'=>'Resposta A escrita pelo professor', 'texto_resposta_b'=>'Resposta B escrita pelo professor', 'texto_resposta_c'=>'Resposta C escrita pelo professor', 'texto_resposta_d'=>'Resposta D escrita pelo professor', 'texto_resposta_e'=>'Resposta E escrita pelo professor', 'alternativa_a'=>'1', 'alternativa_b'=>'0', 'alternativa_c'=>'0', 'alternativa_d'=>'0', 'alternativa_e'=>'0'));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('perguntas');
    }
}
