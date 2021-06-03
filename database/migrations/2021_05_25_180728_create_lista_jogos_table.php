<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListaJogosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lista_jogos', function (Blueprint $table) {
            $table->id();
            $table->string('descricao');
            $table->datetime('datahora');
            $table->string('endereco');
            $table->string('cidade');
            $table->string('gmaps')->nullable();
            $table->integer('inscritos')->default(0);
            $table->integer('maxinscritos');
            $table->datetime('dataabertura');
            $table->string('listavisivel')->default('S');
            $table->string('codlista');
            $table->string('ativo')->default('S');
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
        Schema::dropIfExists('lista_jogos');
    }
}
