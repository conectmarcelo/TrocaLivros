<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExemplarFoto extends Model
{
   protected $table = 'exemplares_fotos';


    protected $fillable = [
        'foto'
    ];

   public function exemplar()

   {
       return $this->belongsTo(Exemplar::class);

   }

   
}
