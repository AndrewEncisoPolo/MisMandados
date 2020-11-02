<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class tiendaController extends Controller
{
    public function init(){
        $data_productos = DB::select('CALL get_producto_inicio()');
        return view('tienda')->with('lista_productos', $data_productos);
    }

}
