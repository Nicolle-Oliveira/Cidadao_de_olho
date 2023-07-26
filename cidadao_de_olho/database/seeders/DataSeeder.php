<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Data;
use App\Models\Deputado;
use GuzzleHttp\Client;

class DataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $info_aux = Deputado::query()->select(['id'])->get();
        
        foreach ($info_aux as $key => $item) {
            
            $json = file_get_contents("http://dadosabertos.almg.gov.br/ws/prestacao_contas/verbas_indenizatorias/deputados/" . $item['id'] . "/datas?formato=json");
            $lista = json_decode($json, true);
            $minhasDatas = $lista['list'];

            //Erro 429 Too Many Requests resolvido! :D
            //É necessário 1 minuto para rodar completamente...:|
            //
            usleep(550000);
           
            foreach($minhasDatas as $data){
                Data::create([
                    'id_deputado' => $data['idDeputado'],
                    'data' => $data['dataReferencia']['$'],
                ]);
            }
        }
    }
}
