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

        foreach ($perguntas as $_pergunta) {
            
            $pergunta = Pergunta::find($_pergunta["id"]);
            
            if ($_pergunta) {
                $pergunta->texto = $_pergunta["question"];

                $pergunta->save();

                $opcao = Opcao::where('pergunta_id', $_pergunta["id"])->first();

                $opcao->peso_econ = $_pergunta["effect"]["econ"];
                $opcao->peso_dipl = $_pergunta["effect"]["dipl"];
                $opcao->peso_govt = $_pergunta["effect"]["govt"];
                $opcao->peso_scty = $_pergunta["effect"]["scty"];

                $opcao->save();
            } else {
                $pergunta = new Pergunta();

                $pergunta->id = $_pergunta["id"];
                $pergunta->texto = $_pergunta["question"];

                $pergunta->save();

                $opcao = new Opcao();

                $opcao->pergunta_id = $pergunta->id;
                $opcao->peso_econ = $_pergunta["effect"]["econ"];
                $opcao->peso_dipl = $_pergunta["effect"]["dipl"];
                $opcao->peso_govt = $_pergunta["effect"]["govt"];
                $opcao->peso_scty = $_pergunta["effect"]["scty"];

                $opcao->save();
            }

            // array_push($perguntasOpcoes, [
            //     "id" => $pergunta["id"],
            //     "texto" => $pergunta["question"],
            //     "opcoes" => [
            //         "peso_econ" => $pergunta["effect"]["econ"],
            //         "peso_dipl" => $pergunta["effect"]["dipl"],
            //         "peso_govt" => $pergunta["effect"]["govt"],
            //         "peso_scty" => $pergunta["effect"]["scty"]
            //     ],
            // ]);

            // array_push($perguntasInsert, ["texto" => $pergunta["question"]]);
        }

        

    }

    private function readPerguntasJson() {
        $perguntasJson = file_get_contents("database/jsons/perguntas.json");

        $perguntas = json_decode($perguntasJson, associative: true);

        return $perguntas;
    }
}
