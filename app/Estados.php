<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estados extends Model
{
    protected $table = 'estados';

    protected $fillable = ['id_ibge', 'sigla', 'nome'];
    
    public function regioes()
    {
        return $this->hasMany('App\EstadosRegioes', 'id_estado', 'id');
    }
    
}