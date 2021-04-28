<?php

use App\Produtos;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;

class ProdutosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Produtos::insert([
            [
                'nome_produto'  => 'Sabao em Po',
                'quantidade'  => 2,
                'id_produto_tipo' => 2,
                'disponivel' => 's',
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'    => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'nome_produto'  => 'Sabao Liquido',
                'quantidade'  => 5,
                'id_produto_tipo' => 2,
                'disponivel' => 's',
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'    => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'nome_produto'  => 'Arroz',
                'quantidade'  => 3,
                'id_produto_tipo' => 1,
                'disponivel' => 's',
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'    => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'nome_produto'  => 'Mouse',
                'quantidade'  => 4,
                'id_produto_tipo' => 3,
                'disponivel' => 's',
                'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at'    => Carbon::now()->format('Y-m-d H:i:s')
            ]
        ]);
    }
}
