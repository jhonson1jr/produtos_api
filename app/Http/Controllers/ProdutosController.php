<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProdutosRequest;
use App\Http\Controllers\Controller;
use App\Produtos;
use Illuminate\Http\Request;

class ProdutosController extends Controller
{
    /**
     * Exibe a listagem de produtos.
     *
     * @return \Illuminate\Http\Response
     */
    public function listar()
    {
        $produtos = Produtos::where('disponivel', 's')->get();
        return response()->json($produtos);
    }
    
    /**
     * Retorna dados de produto específico por id.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detalhes($id)
    {
        $produto = Produtos::find($id);

        if(!$produto) {
            return response()->json([
                'message'   => 'Produto inexistente',
            ], 404);
        }

        return response()->json($produto);
    }

    /**
     * Registra novo produto na base.
     *
     * @param  App\Http\Requests\ProdutosRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function salvar(ProdutosRequest $request)
    {
        $produto = new Produtos();
        $produto->fill($request->all());
        $produto->save();

        return response()->json($produto, 201);
    }

    /**
     * Atualiza produto especifico por id.
     *
     * @param  App\Http\Requests\ProdutosRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function atualizar(ProdutosRequest $request, $id)
    {
        $produto = Produtos::find($id);

        if(!$produto) {
            return response()->json([
                'message'   => 'Produto inexistente',
            ], 404);
        }

        $produto->fill($request->all());
        $produto->save();

        return response()->json($produto, 200);
    }

    /**
     * Indisponibiliza produto para venda por id.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function remover($id)
    {
        $produto = Produtos::find($id);

        if(!$produto) {
            return response()->json([
                'message'   => 'Produto inexistente',
            ], 404);
        }

        $produto->disponivel = 'n';
        $produto->save();
        return response()->json($produto, 200);
    }
}
