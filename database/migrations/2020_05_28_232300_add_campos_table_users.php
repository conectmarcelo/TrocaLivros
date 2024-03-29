<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCamposTableUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function(Blueprint $table) {
            
            $table->string('dt_nascimento')->nullable();
            $table->string('ds_telefone')->nullable();
            $table->string('ds_foto')->nullable();
            $table->string('ds_logradouro')->nullable();
            $table->string('ds_numero_logradouro')->nullable();
            $table->string('ds_bairro')->nullable();
            $table->string('ds_cidade')->nullable();
            $table->string('ds_uf')->nullable();
            $table->string('cd_cep')->nullable();
        });

        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function(Blueprint $table) {
            
            
            $table->dropColumn('dt_nascimento');
            $table->dropColumn('ds_telefone');
            $table->dropColumn('ds_foto');
            $table->dropColumn('ds_logradouro');
            $table->dropColumn('ds_numero_logradouro');
            $table->dropColumn('ds_bairro');
            $table->dropColumn('ds_cidade');
            $table->dropColumn('ds_uf');
            $table->dropColumn('cd_cep');

        });
    }
}
