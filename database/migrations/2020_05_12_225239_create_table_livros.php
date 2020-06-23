<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableLivros extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('livros', function (Blueprint $table) {
            $table->increments('id');
            
            $table->string('nm_titulo_livro');
            $table->bigInteger('cd_isbn_livro')->unique();
            $table->integer('aa_ano_livro');
            $table->string('ds_idioma_livro');
            $table->string('ds_categoria_livro');
            $table->string('nm_autor_livro');
            $table->string('nm_editora_livro');
            $table->longText('ds_resumo_livro');


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
        
        Schema::dropIfExists('livros');
    }
}
