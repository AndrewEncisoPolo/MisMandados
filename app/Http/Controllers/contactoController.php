<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class contactoController extends Controller
{
    public function init(){
        return view('principal/contacto');
    }
}
