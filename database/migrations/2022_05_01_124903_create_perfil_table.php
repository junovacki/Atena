<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


class CreatePerfilTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perfil', function (Blueprint $table) {
            $table->bigIncrements('idPerfil');
            $table->string('descricao');
            $table->timestamps();
        });
        DB::table('perfil')->insert(array('descricao'=>'Administrador'));
        DB::table('perfil')->insert(array('descricao'=>'Coordenador'));
        DB::table('perfil')->insert(array('descricao'=>'Professor'));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('perfil');
    }
}
