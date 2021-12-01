<?php

namespace Database\Seeders;

use App\Models\Cidade;
use App\Models\Estado;
use Illuminate\Database\Seeder;

class EstadoCidadeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->insertEstados();
        $this->insertCidades();
    }

    private function insertEstados() {
        if (Estado::exists()) {
            return; // table already seeded
        }

        $estados = $this->readCSV('estados', fieldMap: [
            'cod' => 'id',
        ]);

        Estado::insert($estados);
    }

    private function insertCidades() {
        if (Cidade::exists()) {
            return; // table already seeded
        }

        $cidades = $this->readCSV('municipios', fieldMap: [
            'cod' => 'id',
            'cod_uf' => 'estado_id'
        ]);

        Cidade::insert($cidades);
    }

    private function readCSV($fileName, $fieldMap = [], $hasHeaders = true) {
        $filePath = "database/csvs/{$fileName}.csv";

        $headers = [];
        $data = []; 

        $lineCount = 0;

        if (($handle = fopen($filePath, "r")) !== FALSE) {
            while (($line = fgetcsv($handle, 1000, ",")) !== FALSE) {
                $lineCount += 1;

                if ($lineCount == 1 && $hasHeaders) {
                    foreach ($line as $field) {
                        array_push($headers, $field);
                    }
                    
                } else {
                    $objectItem = [];

                    foreach ($line as $index => $field) {
                        if ($hasHeaders) {
                            $fieldName = $this->formatFieldName($headers[$index]);
                        } else {
                            $fieldName = $index;
                        }

                        if (array_key_exists($fieldName, $fieldMap)) {
                            $fieldName = $fieldMap[$fieldName];
                        }

                        $objectItem[$fieldName] = trim($field);
                    }

                    array_push($data, $objectItem); 
                }
                
            }
        }

        return $data;
    }

    private function formatFieldName($fieldName) {
        $fieldName = strtolower($fieldName);
        $fieldName = preg_replace('/\s+/', '_', $fieldName);

        return $fieldName;
    }
}
