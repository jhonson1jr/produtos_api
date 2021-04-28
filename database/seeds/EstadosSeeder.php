<?php

use App\Estados;
use App\EstadosRegioes;
use Illuminate\Database\Seeder;

class EstadosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Obtendo estados e regiões de api e populando na base:
        $api_url = 'https://servicodados.ibge.gov.br/api/v1/localidades/estados';
        $estados_get = file_get_contents($api_url);
        $estados_decodificado = json_decode($estados_get, true);
        foreach ($estados_decodificado as $estado) {
            $estado_bd = Estados::create([
                'id_ibge' => $estado['id'],
                'sigla' => $estado['sigla'],
                'nome' => $estado['nome']
            ]);
            
            EstadosRegioes::create([
                'id_regiao_ibge' => $estado['regiao']['id'],
                'sigla' => $estado['regiao']['sigla'],
                'nome' => $estado['regiao']['nome'],
                'id_estado' => $estado_bd->id
            ]);
        }
    }
}