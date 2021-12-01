<?php

namespace Database\Seeders;

use App\Models\Ideologia;
use Illuminate\Database\Seeder;

class IdeologiasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Ideologia::exists()) {
            return; // table already seeded
        }

        $ideologias = $this->readIdeologiasJson();

        $ideologiasInsert = [];

        foreach ($ideologias as $ideologia) {
            array_push($ideologiasInsert, [
                "nome" => $ideologia["name"],
                "base_econ" => $ideologia["stats"]["econ"],
                "base_dipl" => $ideologia["stats"]["dipl"],
                "base_govt" => $ideologia["stats"]["govt"],
                "base_scty" => $ideologia["stats"]["scty"]
            ]);
        }

        Ideologia::insert($ideologiasInsert);
    }

    private function readIdeologiasJson() {
        $ideologiasJson = file_get_contents("database/jsons/ideologias.json");

        $ideologias = json_decode($ideologiasJson, associative: true);

        return $ideologias;
    }
}
