<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuestionarioController extends Controller
{
    
    public function instrucoes() {
        return view('instrucoes', [
            'title' => 'Instruções - 8values - TCC Univeritas - Bernardo Araujo'
        ]);
    }

    public function questionario() {
        return view('questionario', [
            'title' => 'Questionário - 8values - TCC Univeritas - Bernardo Araujo'
        ]);
    }

    public function avaliacao() {
        return view('avaliacao', [
            'title' => 'Avaliação - 8values - TCC Univeritas - Bernardo Araujo'
        ]);
    }


    public function resultados() {
        return view('resultados', [
            'title' => 'Resultados - 8values - TCC Univeritas - Bernardo Araujo'
        ]);
    }
}
