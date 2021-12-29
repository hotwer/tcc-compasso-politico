<?php

namespace App\Http\Controllers;

use App\Models\Identificador;
use App\Models\Ideologia;
use App\Models\Resposta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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


    public function perfilEstado() {
        $estadoId = 43;
        $pessoas = 0;

        $queryPessoasContabilizadas = "SELECT 
                COUNT(i.id) pessoas
            FROM identificadores i 
            WHERE 
                i.estado_id = $estadoId 
                AND i.id IN 
                (
                    SELECT 
                        i.id
                    FROM respostas r
                    JOIN identificadores i ON i.id = r.identificador_id
                    GROUP BY i.id
                    HAVING COUNT(r.id) = 70
                );
        ";

        $result = DB::selectOne($queryPessoasContabilizadas);

        $pessoas = $result->pessoas; 

        $queryMaxPesos = "SELECT 
                SUM(ABS(peso_econ)) * $pessoas AS max_econ, 
                SUM(ABS(peso_dipl)) * $pessoas AS max_dipl,
                SUM(ABS(peso_govt)) * $pessoas AS max_govt,
                SUM(ABS(peso_scty)) * $pessoas AS max_scty
            FROM opcoes;
        ";

        $queryMultiplicidaores = "SELECT 
                SUM(o.peso_econ * r.multiplicador) AS sum_econ,
                SUM(o.peso_dipl * r.multiplicador) AS sum_dipl,
                SUM(o.peso_govt * r.multiplicador) AS sum_govt,
                SUM(o.peso_scty * r.multiplicador) AS sum_scty
            FROM identificadores i 
            JOIN respostas r ON r.identificador_id = i.id 
            JOIN opcoes o ON o.pergunta_id = r.pergunta_id
            WHERE i.id IN 
                (
                    SELECT 
                        i.id
                    FROM respostas r
                    JOIN identificadores i ON i.id = r.identificador_id
                    GROUP BY i.id
                    HAVING COUNT(r.id) = 70
                );
        ";

        $resultMaxPesos = DB::selectOne($queryMaxPesos);
        $resultSumPesos = DB::selectOne($queryMultiplicidaores);

        $e = $this->calc_score($resultSumPesos->sum_econ, $resultMaxPesos->max_econ);
        $d = $this->calc_score($resultSumPesos->sum_dipl, $resultMaxPesos->max_dipl);
        $g = $this->calc_score($resultSumPesos->sum_govt, $resultMaxPesos->max_govt);
        $s = $this->calc_score($resultSumPesos->sum_scty, $resultMaxPesos->max_scty);

        return response([
            "e" => $e,
            "d" => $d,
            "g" => $g,
            "s" => $s,
        ]);


    }

    private function calc_score($score, $max) {
        return number_format(
            (100 * ($max + $score) / (2 * $max)),
            1
        );
    }

    public function calcularIdeologias() {
        $ideologies = Ideologia::all();

        $query = "SELECT
            id,
            FORMAT(100 * (max_econ + sum_econ) / (2 * max_econ), 1) e,
            FORMAT(100 * (max_dipl + sum_dipl) / (2 * max_dipl), 1) d,
            FORMAT(100 * (max_govt + sum_govt) / (2 * max_govt), 1) g,
            FORMAT(100 * (max_scty + sum_scty) / (2 * max_scty), 1) s
        FROM (
            SELECT 
                    i.id,
                SUM(o.peso_econ * r.multiplicador) AS sum_econ,
                SUM(o.peso_dipl * r.multiplicador) AS sum_dipl,
                SUM(o.peso_govt * r.multiplicador) AS sum_govt,
                SUM(o.peso_scty * r.multiplicador) AS sum_scty
            FROM identificadores i 
            JOIN respostas r ON r.identificador_id = i.id 
            JOIN opcoes o ON o.pergunta_id = r.pergunta_id
            WHERE i.id IN 
                (
                    SELECT 
                        i.id
                    FROM respostas r
                    JOIN identificadores i ON i.id = r.identificador_id
                    GROUP BY i.id
                    HAVING COUNT(r.id) = 70
                )
            GROUP BY i.id	
        ) r 
        JOIN (
                SELECT 
                SUM(ABS(peso_econ)) AS max_econ, 
                SUM(ABS(peso_dipl)) AS max_dipl,
                SUM(ABS(peso_govt)) AS max_govt,
                SUM(ABS(peso_scty)) AS max_scty
            FROM opcoes
        ) o";

        $results = DB::select($query);


        foreach ($results as $person) {

            $ideologyId = 0;
            $ideodist = PHP_INT_MAX;

            foreach ($ideologies as $ideology) {
                $dist = 0;
                $dist += pow(abs($ideology->base_econ - $person->e), 2);
                $dist += pow(abs($ideology->base_govt - $person->g), 2);
                $dist += pow(abs($ideology->base_dipl - $person->d), 1.73856063);
                $dist += pow(abs($ideology->base_scty - $person->s), 1.73856063);
                if ($dist < $ideodist) {
                    $ideologyId = $ideology->id;
                    $ideodist = $dist;
                }
            }

            Db::insert("INSERT INTO identificador_ideologia VALUES ($person->id, $ideologyId);");

        }

    }
}
