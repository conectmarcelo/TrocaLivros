<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exemplar extends Model
{
   

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'estado_exemplar',
        'disponibilizar_exemplar',
        'livro_id'
        
        
        
    ];

    public function livro()
    {
        return $this->belongsTo(Livro::class);
    }

}
