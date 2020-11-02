<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class inicioController extends Controller
{
    public function init(){
        session_start();
        session_destroy();
        return view('inicio');
    }
}
