<?php

use Illuminate\Http\Request;

// Rota raiz padrão, apenas para verificação:
    Route::get('/', function () {
        return response()->json(['message' => 'APIs Laravel', 'status' => 'Conectado']);;
    });

// Produtos:
    Route::prefix('produtos')->group(function()
    {
        Route::get('listar', 'ProdutosController@listar');
        Route::get('detalhes/{id?}', 'ProdutosController@detalhes')->defaults('id', 0);
        Route::post('salvar', 'ProdutosController@salvar');
        Route::put('atualizar/{id?}', 'ProdutosController@atualizar')->defaults('id', 0);
        Route::delete('remover/{id?}', 'ProdutosController@remover')->defaults('id', 0);
    });
