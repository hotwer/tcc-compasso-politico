<?php

namespace App\Http\Controllers;

use App\Models\Ideologia;
use Illuminate\Http\Request;

class IdeologiasController extends Controller
{
    //
    public function get() {
        $json = [];

        Ideologia::all()->each(function (Ideologia $ideologia) use (&$json) {
            array_push($json, [
                "name" => $ideologia->nome,
                "stats" => [
                    "econ" => $ideologia->base_econ,
                    "dipl" => $ideologia->base_dipl,
                    "govt" => $ideologia->base_govt,
                    "scty" => $ideologia->base_scy
                ]
            ]);
        });

        return response($json);
    }
}
