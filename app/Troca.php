<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Troca extends Model
{
    
    protected $table = 'trocas';


    protected $fillable = [
  
    'ds_status_troca',
    'dt_troca',
    
    'cd_usuario_a',
    'cd_usuario_b',
    'cd_exemplar_a',
    'cd_exemplar_b'

    ];

    public function exemplarA()
    {
        return $this->belongsTo('App\Exemplar', 'cd_exemplar_a', 'id');
    }

    public function exemplarB()
    {
        return $this->belongsTo('App\Exemplar', 'cd_exemplar_b', 'id');
    }

    public function userA()
    {
        return $this->belongsTo('App\User', 'cd_usuario_a', 'id');
    }

    public function userB()
    {
        return $this->belongsTo('App\User' , 'cd_usuario_b', 'id');
    }

}
