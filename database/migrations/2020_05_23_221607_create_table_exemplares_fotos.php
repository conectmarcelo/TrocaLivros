<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableExemplaresFotos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exemplares_fotos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('exemplar_id')->unsigned();
            
            $table->string('foto');
            $table->timestamps();
            $table->softDeletes();


            $table->foreign('exemplar_id')->references('id')->on('exemplares');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exemplares_fotos');
        
    }
}
