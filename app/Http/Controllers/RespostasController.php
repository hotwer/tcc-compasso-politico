<?php

namespace App\Http\Controllers;

use App\Models\Identificador;
use App\Models\Resposta;
use Illuminate\Http\Request;

class RespostasController extends Controller
{
    public function save(Request $request, $perguntaId) {
        $hash = $request->input('hash');
        $multiplicador = $request->input('multiplicador');

        $identificador = Identificador::where('hash', $hash)->first();

        if (!$identificador) {
            $ip = $request->input('ip');
            $estadoId = $request->input('estado_id');
            $cidadeId = $request->input('cidade_id');
            
            $identificador = new Identificador();

            $identificador->hash = $hash;
            $identificador->ip = $ip;
            $identificador->estado_id = $estadoId;
            $identificador->cidade_id = $cidadeId;

            $identificador->save();
        }

        $resposta = Resposta::where([
            'identificador_id' => $identificador->id,
            'pergunta_id' => $perguntaId,
        ])->first();

        if (!$resposta) {
            $resposta = new Resposta();
            $resposta->identificador_id = $identificador->id;
            $resposta->pergunta_id = $perguntaId;
        }

        $resposta->multiplicador = $multiplicador;
        $resposta->save();

        return response($resposta);
    }
}
