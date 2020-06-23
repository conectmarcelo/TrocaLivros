<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'dt_nascimento',
        'ds_telefone',
        'ds_foto',
        'ds_logradouro',
        'ds_numero_logradouro',
        'ds_bairro',
        'ds_cidade',
        'ds_uf',
        'cd_cep',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        
        
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function exemplares()
    {
        return $this->hasMany(Exemplar::class);
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
