<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Identificador extends Model
{
    use HasFactory;

    protected $table = 'identificadores';

    public function estado() {
        return $this->hasOne(Estado::class);
    }

    public function cidade() {
        return $this->hasOne(Cidade::class);
    }

    public function respostas() {
        return $this->hasMany(Resposta::class);
    }
}
