<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    use HasFactory;

    protected $table = 'datas';

    protected $fillable = [
        'id_deputado',
        'data',
    ];

    public function deputado()
    {
        return $this->belongsTo(Deputado::class, 'id_deputado');
    }
}
