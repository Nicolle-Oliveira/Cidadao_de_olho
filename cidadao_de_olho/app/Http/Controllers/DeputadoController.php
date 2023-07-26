<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Deputado;
use App\Models\RedeSocial;
use App\Models\Data;
use App\Http\Resources\DeputadoResource;
use App\Http\Resources\DataResource;

class DeputadoController extends Controller
{
    public function index()
    {
        $api = 'http://127.0.0.1:8000/api/infos';
        $json = file_get_contents($api);
        $lista = json_decode($json, true);

        $deputados_aux = $lista['deputados'];
        $redes = $lista['redes'];

        $deputados = [];
        foreach ($deputados_aux as $key => $value) {
            $quant = 0;
            foreach ($value['data'] as $value) { $quant++; };
            
            $deputados[] = [
                'nome' => $value['nome'],
                'quant' => $quant,
            ];

        }

        return view('info', compact('deputados', 'redes'));
    }

    public function criaAPI(){
        //Melhor opção?
        Data::whereYear('data', '!=', 2019)->delete();
                
        $deputados = Deputado::with('datas')->get();
        $RS_ordenada = $this->contaRedes();

        $data = DeputadoResource::collection($deputados);

        return response()->json([
            'deputados' => $data,
            'redes' => $RS_ordenada,
        ]);
    }

    public function contaRedes(){

        $info_rs_aux = RedeSocial::query()->select(['nome'])->get();
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

        return $this->bubble_sort($quants, $nomes);
    }

    //Algoritmo de ordenação Bubble Sort
    //Organiza as redes sociais de ordem decrescente
    public function bubble_sort($quants, $nomes) {
        
        do {

            $troca = false;
            foreach ($quants as $key => $value) {
                if (isset($quants[$key + 1]) && $quants[$key] < $quants[$key + 1]) {
                    
                    $tmp = $quants[$key];
                    $quants[$key] = $quants[$key + 1];
                    $quants[$key + 1] = $tmp;

                    $tmp = $nomes[$key];
                    $nomes[$key] = $nomes[$key + 1];
                    $nomes[$key + 1] = $tmp;

                    $troca = true;
                }
            }
        } while ($troca);

        $redes = [];
        foreach ($nomes as $key => $nome) {
            $redes[$key]['nome'] = $nome;
            $redes[$key]['quant'] = $quants[$key];
        }

        return $redes;
    }
}
