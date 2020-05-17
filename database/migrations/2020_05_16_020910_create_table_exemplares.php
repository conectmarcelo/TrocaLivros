<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableExemplares extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exemplares', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('livro_id')->unsigned();
            $table->string('estado_exemplar');
            $table->string('disponibilizar_exemplar');

            $table->foreign('livro_id')->references('id')->on('livros');

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
        Schema::dropIfExists('table_exemplares');
    }
}
