<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableLivrosFotos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('livros_fotos', function (Blueprint $table) {
            $table->increments('id');
           
            
            $table->string('foto');
            $table->timestamps();
            $table->softDeletes();

            $table->integer('livro_id')->unsigned();
            $table->foreign('livro_id')->references('id')->on('livros');

            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */

    public function down(){

        

        Schema::dropIfExists('livros_fotos');
    
        
    
    }
}
