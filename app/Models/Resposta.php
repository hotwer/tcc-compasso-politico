<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resposta extends Model
{
    use HasFactory;

    public function pergunta() {
        return $this->belongsTo(Pergunta::class);
    }

    public function identificador() {
        return $this->belongsTo(Identificador::class);
    }

    public function opcao() {
        return $this->hasOne(Opcao::class);
    }
}
