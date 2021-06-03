<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_lists', function (Blueprint $table) {
            $table->id();
            $table->string('ip');
            $table->datetime('datainscricao');
            $table->string('fardamento')->nullable();
            $table->string('classe')->nullable();
            $table->unsignedBigInteger('id_users');
            $table->unsignedBigInteger('id_lista');
            $table->foreign('id_users')->references('id')->on('users');
            $table->foreign('id_lista')->references('id')->on('lista_jogos');
            $table->timestamps();
               $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_lists');
    }
}
