<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RedeSocial extends Model
{
    use HasFactory;

    protected $table = 'rede_socials';

    protected $fillable = [
        'id_deputado',
        'id_rede',
        'nome',
        'url',
        'url_deputado',
    ];

    public function deputado()
    {
        return $this->belongsTo(Deputado::class, 'id_deputado');
    }
}
