<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Exemplar extends Model
{
   protected $table = "exemplares";

   use SoftDeletes;
 
    /**
     * Opcional, informar a coluna deleted_at como um Mutator de data
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'estado_exemplar',
        'disponibilizar_exemplar',
        'livro_id',
        'user_id'
        
        
        
    ];

    public function livro()
    {
        return $this->belongsTo(Livro::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function fotos()
    {
        return $this->hasMany(ExemplarFoto::class);
    }

    public function trocaA()
    {
        return $this->hasMany(Troca::class);
    }

    public function trocaB()
    {
        return $this->hasMany(Troca::class);
    }

}
