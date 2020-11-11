<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class inicioController extends Controller
{
    public function init(){
        session_start();
        session_destroy();
        return view('principal/inicio');
    }

    public function get_producto_id(Request $request)
    {
        $detalle_producto = DB::select('CALL get_producto_id(?)',[$request->input('IdProducto')]);
        echo json_encode($detalle_producto);
    }
}
