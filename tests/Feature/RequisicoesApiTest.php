<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MeuPrimeiroTest extends TestCase
{
    // Teste da pagina principal
    public function testIndex()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    
    // Teste da listagem de produtos
    public function testListarProdutos()
    {
        $response = $this->get('/api/produtos/listar');

        $response->assertStatus(200);
    }
    
    // Teste de requisição de detalhes de produto id = 1
    public function testDetalhesProdutos()
    {
        $response = $this->get('/api/produtos/detalhes/1');

        $response->assertStatus(200);
    }

    // teste de salvar novo produto
    public function testSalvarProduto()
    {
        $response = $this->json('POST', '/api/produtos/salvar', [
            'nome_produto'    => 'Uva', 
            'quantidade'      => 10, 
            'id_produto_tipo' => 1, 
            'disponivel'      => 's'
        ]);

        $response->assertStatus(201)->assertJsonFragment([
            'nome_produto' => 'Uva', 
            'disponivel' => 's'
        ]);
    }

    // Teste de atualização do produto criado (id = 5, ja que temos 3 pré cadastrados com os Seeds)
    public function testAtualizarProduto()
    {
        $response = $this->json('PUT', '/api/produtos/atualizar/5', [
            'nome_produto'    => 'Uva passa', 
            'quantidade'      => 15, 
            'id_produto_tipo' => 1, 
            'disponivel'      => 'n'
        ]);

        $response->assertStatus(200)->assertJsonFragment([
            'nome_produto' => 'Uva passa'
        ]);
    }

    // Teste de remoção do produto de teste (id = 5)
    public function testRemoverProdutos()
    {
        $response = $this->json('DELETE', '/api/produtos/remover/5', []);
        $response->assertStatus(200);
    }
}
