<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableTrocas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trocas', function (Blueprint $table) {
            
            $table->increments('id');
            $table->string('ds_status_troca')->nullable();
            $table->string('dt_troca')->nullable();
            $table->integer('cd_usuario_a')->unsigned()->nullable();
            $table->integer('cd_usuario_b')->unsigned()->nullable();
            $table->integer('cd_exemplar_a')->unsigned()->nullable();
            $table->integer('cd_exemplar_b')->unsigned()->nullable();
            
            $table->foreign('cd_usuario_a')
            ->nullable()
            ->references('id')
            ->on('users');

            $table->foreign('cd_usuario_b')
            ->nullable()
            ->references('id')
            ->on('users');

            $table->foreign('cd_exemplar_a')
            ->nullable()
            ->references('id')
            ->on('exemplares');

            $table->foreign('cd_exemplar_b')
            ->nullable()
            ->references('id')
            ->on('exemplares');
          

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
        Schema::dropIfExists('trocas');
    }
}
