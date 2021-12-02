<?php

namespace App\Http\Controllers;

use App\Models\Cidade;
use App\Models\Estado;
use Illuminate\Http\Request;

class EstadosCidadesController extends Controller
{
    //

    public function estados() {
        return response(
            Estado::orderBy('nome', 'asc')
                ->get()
        );
    }

    public function cidades(int $estadoId) {
        return response(
            Cidade::where('estado_id', $estadoId)
                ->orderBy('nome', 'asc')
                ->get()
        );
    }
}
