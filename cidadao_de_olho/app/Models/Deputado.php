<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deputado extends Model
{
    use HasFactory;

    protected $table = 'deputados';

    protected $fillable = [
        'id',
        'nome',
        'nomeServidor',
        'partido',
        'endereco',
        'telefone',
        'fax',
        'email',
        'sitePessoal',
        'atividadeProfissional',
        'naturalidadeMunicipio',
        'naturalidadeUf',
        'dataNascimento',
    ];

    public function datas()
    {
        return $this->hasMany(Data::class, 'id_deputado');
    }

    public function redeSociais()
    {
        return $this->hasMany(RedeSocial::class, 'id_deputado');
    }
}
