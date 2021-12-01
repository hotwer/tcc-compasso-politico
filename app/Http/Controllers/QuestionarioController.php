<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuestionarioController extends Controller
{
    
    public function instrucoes() {
        return view('instrucoes');
    }

    public function questionario() {
        return view('questionario');
    }

    public function resultados() {
        return view('resultados');
    }
}
