<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('idUser');
            $table->string('user');
            $table->string('password');
            $table->boolean('ativo');
            $table->unsignedBigInteger('nivelAcesso');
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('nivelAcesso')->references('idPerfil')->on('perfil');
        });
        DB::table('users')->insert(array('user'=>'adm', 'password'=>'teste', 'nivelAcesso'=>'1', 'ativo'=> true));
        DB::table('users')->insert(array('user'=>'coordenador', 'password'=>'teste', 'nivelAcesso'=>'2', 'ativo'=> true));
        DB::table('users')->insert(array('user'=>'professor', 'password'=>'teste', 'nivelAcesso'=>'3', 'ativo'=> true));

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
