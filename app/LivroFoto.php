<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LivroFoto extends Model
{
   protected $table = 'livros_fotos';


    protected $fillable = [
        'foto'
    ];

   public function livro()

   {
       return $this->belongsTo(Livro::class);

   }

   
}
