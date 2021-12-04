<?php

namespace App\Http\Controllers;

use App\Models\Identificador;
use App\Models\Resposta;
use Illuminate\Http\Request;

class RespostasController extends Controller
{
    public function save(Request $request, int $perguntaId) {
        $hash = $request->input('hash');
        $multiplicador = $request->input('multiplicador');
        $comentario = $request->input('comentario');

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

        $resposta->comentario = $comentario;
        $resposta->multiplicador = $multiplicador;
        $resposta->save();

        return response($resposta);
    }

    public function avaliar(Request $request, int $avaliacaoItemNumber) {
        $hash = $request->input('hash');
        $avaliacao = $request->input('avaliacao');

        $avaliacaoField = "";
        
        if ($avaliacaoItemNumber == 0) {
            $avaliacaoField = "avaliacao_concordancia";
        } else {
            $avaliacaoField = "avaliacao_pergunta_{$avaliacaoItemNumber}"; 
        }

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
        }


        $identificador->{$avaliacaoField} = $avaliacao;

        $identificador->save();

        return response($identificador);
    }
}
