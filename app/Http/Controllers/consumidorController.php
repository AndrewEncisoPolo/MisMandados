<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class consumidorController extends Controller
{
    public function perfil(){
        session_start();
        if(isset($_SESSION["user_session"])){
            $token_session = $_SESSION["user_session"];

            $data_usuario = DB::select('CALL get_usuario_token(?)',[$token_session]);
            return view('perfilConsumidor/Perfil')->with('info_usuario', $data_usuario);
        }else{
            return redirect('inicio');
        }
    }

    public function tienda(){
        session_start();
        $token_session = $_SESSION["user_session"];

        $_SESSION['carrito_productos'] = "";

        $data_empresas_cercanas = DB::select('CALL get_empresas_cercanas(?);',[$token_session]);
        return view('perfilConsumidor/Tienda')->with('data_empresas_cercanas', $data_empresas_cercanas);
    }

    public function tiendaEmpresa(Request $request){
        session_start();

        $data_empresa = DB::select('CALL get_empresa_id(?);',[$request->input('idEmpresa')]);
        $producto_empresa = DB::select('CALL get_producto_empresa(?);',[$request->input('idEmpresa')]);
        
        return view('perfilConsumidor/TiendaEmpresa')->with('data_empresa', $data_empresa)->with('producto_empresa', $producto_empresa);
    }

    public function get_detalle_producto_id(Request $request)
    {
        $detalle_producto = DB::select('CALL get_detalle_producto_id(?)',[$request->input('IdProducto')]);
        echo json_encode($detalle_producto);
    }

    public function add_producto_carrito(Request $request)
    {
        $output = "";

        session_start();
        $_SESSION["carrito_productos"];

        $json_producto = array('IDProducto' => $request->input('IDProducto'), 'Cantidad' =>  $request->input('Cantidad'));

        if($_SESSION["carrito_productos"]==""){
            $_SESSION["carrito_productos"] = $json_producto;
        }else{
            $json_productos = $_SESSION["carrito_productos"];
            $decode_json = array($json_productos);
            array_push($decode_json, $json_producto);
            $_SESSION["carrito_productos"] = $decode_json;  
        }

        $output = json_encode($_SESSION["carrito_productos"], JSON_FORCE_OBJECT);

        echo $output;
    }
    
    public function remove_producto_carrito(Request $request){
        
    }
}
