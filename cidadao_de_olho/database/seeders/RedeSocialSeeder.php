<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\RedeSocial;
use App\Models\Deputado;

class RedeSocialSeeder extends Seeder
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
            foreach($item['redesSociais'] as $rede){

                $rede1 = $rede['redeSocial'];
                RedeSocial::create([

                    'id_deputado' => $item['id'],
                    'id_rede' => $rede1['id'],
                    'nome' => $rede1['nome'],
                    'url' => $rede1['url'],
                    'url_deputado' => $rede['url'],

                ]);
            }
        }
    }
}
