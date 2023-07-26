<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Data;
use App\Models\Deputado;
use App\Models\RedeSocial;


class DeputadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Buscando a API com dados dos deputados + redes sociais
        $json = file_get_contents("http://dadosabertos.almg.gov.br/ws/deputados/lista_telefonica?formato=json");
        $lista = json_decode($json, true);
        $meusObjetos = $lista['list'];
        

        foreach($meusObjetos as $item){
            
            Deputado::create([
                'id' => $item['id'],
                'nome' => $item['nome'],
                'nomeServidor' => $item['nomeServidor'],
                'partido' => $item['partido'],

                //Nem todos os deputados possuem os dados abaixo
                //Assim, se a informação não existir, o valor é definido como null
                'endereco' => isset($item['endereco']) ? $item['endereco'] : null,
                'telefone' => isset($item['telefone']) ? $item['telefone'] : null,
                'fax' => isset($item['fax']) ? $item['fax'] : null,
                'email' => isset($item['email']) ? $item['email'] : null,
                'sitePessoal' => isset($item['sitePessoal']) ? $item['sitePessoal'] : null,
                'atividadeProfissional' => isset($item['atividadeProfissional']) ? $item['atividadeProfissional'] : null,

                'naturalidadeMunicipio' => $item['naturalidadeMunicipio'],
                'naturalidadeUf' => $item['naturalidadeUf'],
                'dataNascimento' => $item['dataNascimento'],

            ]);

            /* HTTP/1.1 429 Too Many Requests - ?-?
        

            
                */
        }
    }
}
