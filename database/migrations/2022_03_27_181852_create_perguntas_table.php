<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id()->autoIncrement();
            $table->text('criado_por');
            $table->text('texto_pergunta');
            $table->text('curso');
            $table->text('disciplina');
            $table->text('texto_resposta_a');
            $table->text('texto_resposta_b');
            $table->text('texto_resposta_c');
            $table->text('texto_resposta_d');
            $table->text('alternativa_a');
            $table->text('alternativa_b');
            $table->text('alternativa_c');
            $table->text('alternativa_d');
            $table->timestamps();
        });
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
