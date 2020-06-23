<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ExemplarFoto extends Model
{
   protected $table = 'exemplares_fotos';

   use SoftDeletes;
 
    /**
     * Opcional, informar a coluna deleted_at como um Mutator de data
     *
     * @var array
     */
    protected $dates = ['deleted_at'];


    protected $fillable = [
        'foto'
    ];

   public function exemplar()

   {
       return $this->belongsTo(Exemplar::class);

   }

   
}
