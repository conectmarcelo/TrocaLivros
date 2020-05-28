<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exemplar extends Model
{
   protected $table = "exemplares";

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

}
