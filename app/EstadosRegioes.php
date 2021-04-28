<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EstadosRegioes extends Model
{
    protected $table = 'estados_regioes';

    protected $fillable = ['id_regiao_ibge', 'sigla', 'nome', 'id_estado'];
    
    public function regioes()
    {
        return $this->hasMany('App\EstadosRegioes', 'id_estado', 'id');
    }   
}