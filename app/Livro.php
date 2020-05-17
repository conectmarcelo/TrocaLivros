<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
   

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nm_titulo_livro',
        'cd_isbn_livro',
        'aa_ano_livro',
        'ds_idioma_livro',
        'ds_categoria_livro',
        'nm_autor_livro',
        'nm_editora_livro',
        'ds_resumo_livro'
        
    ];

    public function fotos()
    {
        return $this->hasMany(LivroFoto::class);
    }

    public function exemplares()
    {
        return $this->hasMany(Exemplar::class);
    }

}
