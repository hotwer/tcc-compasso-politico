<?php

namespace Database\Seeders;

use App\Models\Opcao;
use App\Models\Pergunta;
use Illuminate\Database\Seeder;

class PerguntasOpcoesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $perguntas = $this->readPerguntasJson();

        $perguntasInsert = [];
        $perguntasOpcoes = [];

        foreach ($perguntas as $pergunta) {
            array_push($perguntasOpcoes, [
                "texto" => $pergunta["question"],
                "opcoes" => [
                    "peso_econ" => $pergunta["effect"]["econ"],
                    "peso_dipl" => $pergunta["effect"]["dipl"],
                    "peso_govt" => $pergunta["effect"]["govt"],
                    "peso_scty" => $pergunta["effect"]["scty"]
                ],
            ]);

            array_push($perguntasInsert, ["texto" => $pergunta["question"]]);
        }

        if (!Pergunta::exists()) {
            Pergunta::insert($perguntasInsert);
        }

        if (Opcao::exists()) {
            return; // both tables are seeded
        }

        $_perguntaPlucks = Pergunta::pluck('id', 'texto')->all(); 

        $opcoesInsert = [];
        
        foreach ($perguntasOpcoes as $perguntaOpcao) {
            $_opcao = $perguntaOpcao['opcoes'];
            $_opcao['pergunta_id'] = $_perguntaPlucks[$perguntaOpcao['texto']];
            array_push($opcoesInsert, $_opcao);
        }

        Opcao::insert($opcoesInsert);
    }

    private function readPerguntasJson() {
        $perguntasJson = file_get_contents("database/jsons/perguntas.json");

        $perguntas = json_decode($perguntasJson, associative: true);

        return $perguntas;
    }
}
