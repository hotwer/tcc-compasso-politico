<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke() {
        return view('index', [
            "title" => '8values - TCC Univeritas - Bernardo Araujo'
        ]);
    }
}
