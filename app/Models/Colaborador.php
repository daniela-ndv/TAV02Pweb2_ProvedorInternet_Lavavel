<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Colaborador extends Model
{
    use HasFactory;

    protected $table = "colaborador";

    protected $fillable = ['nome',
        'funcao',
        'setor_id',
    ];

    protected $casts = [
        "setor_id"=>"integer"
    ];

    public function setor(){
        return $this->belongsTo(Setor::class,
            'setor_id', 'id');
    }
}
