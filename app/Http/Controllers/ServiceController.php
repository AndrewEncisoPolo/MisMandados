<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
{
    public function registrarUsuario(Request $request){
        dd($request->all());
    }

    public function registrarEmpresa(Request $request){
        dd($request->all());
    }

    public function recuperarContrasenna(Request $request){
        //dd($request->all());
        return view('recuperarContraseña');
    }

    public function recuperarContrasennaRequest(Request $request){
        dd($request->all());
        //return view('recuperarContraseña');
    }

    public function error(){
        return view('error');
    }
}
