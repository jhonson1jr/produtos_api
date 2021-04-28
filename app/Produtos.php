<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produtos extends Model
{
    protected $table = 'produtos';

    protected $fillable = ['nome_produto', 'quantidade', 'id_produto_tipo', 'disponivel'];
    
    public function produtos_tipo()
    {
        return $this->belongsTo('App\ProdutosTipos', 'id_produto_tipo', 'id');
    }
}
