<?php

namespace App\Http\Controllers;

use App\Models\Pergunta;
use Illuminate\Http\Request;

class PerguntasController extends Controller
{
    public function quantidade() {
        return response(["quantidade" => Pergunta::count()]);
    }

    public function get() {
        $json = [];
        
        Pergunta::with("opcao")->each(function (Pergunta $pergunta) use (&$json) {
            array_push($json, [
                "id" => $pergunta->id,
                "question" => $pergunta->texto,
                "effect" => [
                    "econ" => $pergunta->opcao->peso_econ,
                    "dipl" => $pergunta->opcao->peso_dipl,
                    "govt" => $pergunta->opcao->peso_govt,
                    "scty"=> $pergunta->opcao->peso_scty
                ]
            ]);
        });

        return response($json);
    }
}
