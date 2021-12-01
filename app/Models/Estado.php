<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\Mime\Header\IdentificationHeader;

class Estado extends Model
{
    use HasFactory;

    public function cidades() {
        return $this->hasMany(Cidade::class);
    }

    public function identificadores() {
        return $this->belongsToMany(Identificador::class);
    }
}
