<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateCategoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categorias', function (Blueprint $table) {
            $table->bigIncrements('idCategoria');
            $table->string('categoria');
            $table->timestamps();
        });
        DB::table('categorias')->insert(array('categoria'=>'Exatas'));
        DB::table('categorias')->insert(array('categoria'=>'Humanas'));
        DB::table('categorias')->insert(array('categoria'=>'Biológicas'));

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categorias');
    }
}
