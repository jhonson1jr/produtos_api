<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProdutosTipos extends Model
{
    protected $table = 'produtos_tipos';

    protected $fillable = ['tipo'];
    
    public function produtos()
    {
        return $this->hasMany('App\Produtos', 'id_produto_tipo', 'id');
    }
    
}
