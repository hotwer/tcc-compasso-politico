<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pergunta extends Model
{
    use HasFactory;

    public function respostas() {
        return $this->hasMany(Resposta::class);
    }

    public function opcao() {
        return $this->hasOne(Opcao::class);
    }

    public function user() {
        return $this->hasOne(User::class);
    }
}
