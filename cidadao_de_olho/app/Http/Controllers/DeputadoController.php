<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Deputado;
use App\Models\Data;
use App\Models\RedeSocial;

class DeputadoController extends Controller
{
    public function index()
    {
        $json = file_get_contents("http://dadosabertos.almg.gov.br/ws/deputados/lista_telefonica?formato=json");
        $lista = json_decode($json, true);
        $meusObjetos = $lista['list'];
        

        foreach($meusObjetos as $item){
            Deputado::create($item);

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

            /* HTTP/1.1 429 Too Many Requests - ?-?


            $json1 = file_get_contents("http://dadosabertos.almg.gov.br/ws/prestacao_contas/verbas_indenizatorias/deputados/" . $item['id'] . "/datas?formato=json");
            $lista1 = json_decode($json1, true);
            $minhasDatas = $lista1['list'];

            //sleep(0.25);
            foreach($minhasDatas as $data){
                Data::create([
                    'id_deputado' => $data['idDeputado'],
                    'data' => $data['dataReferencia']['$'],
                ]);
            }*/
        }

        return $this->criaAPI();
    }

    public function criaAPI(){

        $info_aux = Deputado::query()->select(['id', 'nome'])->get();
        $info_rs_aux = RedeSocial::query()->select(['id_rede', 'nome'])->get();

        $info = json_decode($info_aux);
        $info_rs = json_decode($info_rs_aux);

        $cria_novo = true;

        $nomes = [];
        $quants = [];

        foreach($info_rs as $rs){
            foreach ($nomes as $key => $nome) {
                 if($nome == $rs->nome){
                     $quants[$key]++;
                     $cria_novo = false;
                     break;
                 }
            }
 
            if($cria_novo == true){
             $nomes[] = $rs->nome;
             $quants[] = 1;
            }
 
            $cria_novo = true;
        }

        $redes = [];

        foreach ($nomes as $key => $nome) {
            $redes[$key]['nome'] = $nome;
            $redes[$key]['quant'] = $quants[$key];
        }

        return response()->json([
            'deputados' => $info,
            'redes' => $redes,
        ]);

       
    
        /* TENTATIVA DE USAR OBJETO
        Por algum motivo, so cria as duas primeiras redes :(
        $redes = [];

        foreach($info_rs as $rs){
            echo 'rede: ' . $rs->nome . '<br>';
            echo 'id: ' . $rs->id_rede . '<br><br>';

        }

        foreach($info_rs as $rs){
            echo "<br> RODOU " . $rs->nome . "<br>";

            foreach($redes as $rede){

                echo "<br> ENTROU FOR1<br><br>";
                if($rede->id == $rs->id_rede){
                    echo '<br> ENTROU IF <br><br>';
                    $rede->quant++;
                    $cria_novo = false;
                    break;
                }
            }

            if($cria_novo == true){
                echo "<br> CRIOU " . $rs->nome . "<br><br>";
                $redes[] = new RedesAqui($rs->id_rede, $rs->nome);
            }
            $cria_novo == true;
        }

        foreach($redes as $rede){
            echo "id: " . $rede->id . '<br>';
            echo 'rede: ' . $rede->nome . '<br>';
            echo 'quant: ' . $rede->quant . '<br><br>';

        }*/


    }

    public function show(){


        $api = route('infos');
        $json = file_get_contents($api);
        $lista = json_decode($json, true);
        $meusObjetos = $lista['deputados'];
        $redes = $lista['redes'];

        return view('info', compact('redes'));

    }
}

/*Classe abandonada...
class RedesAqui{

    public $id;
    public $nome;
    public $quant;

    public function __construct($id_s, $nome_s){
        $this->id = $id_s;
        $this->nome = $nome_s;
        $this->quant = 1;
    }
    
}*/
