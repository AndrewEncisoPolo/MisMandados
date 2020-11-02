<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class contactoController extends Controller
{
    public function init(){
        //$users = DB::select('SELECT `IDUsuario`, `Email`, `Password`, `Nombre` FROM `usuario`');
        //var_dump($users);
        return view('contacto');
    }
}
