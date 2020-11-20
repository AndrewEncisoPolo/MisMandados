<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class consumidorController extends Controller
{
    public function perfil(){
        session_start();
        if(isset($_SESSION["user_session"])){
            $data_usuario = DB::select('CALL get_usuario_token(?)',[$_SESSION["user_session"]]);
            return view('perfilConsumidor/Perfil')->with('info_usuario', $data_usuario);
        }else{return redirect('inicio');}
    }

    public function editarConsumidor(){
        session_start();

        $data_departamento = DB::select('CALL get_departamento()');
        $data_ciudad = DB::select('CALL get_ciudad()');
        $data_localidad = DB::select('CALL get_localidad()');
        $data_barrio = DB::select('CALL get_barrio()');
        $data_tipodocumento = DB::select('CALL get_tipodocumento_consumidor()');
        $data_basica = DB::select('CALL get_info_basica_usuario(?);',[$_SESSION["user_session"]]);
        $data_ubicacion = DB::select('CALL get_info_ubicacion_usuario(?);',[$_SESSION["user_session"]]);

        return view('perfilConsumidor/EditarConsumidor')->with('data_tipodocumento', $data_tipodocumento)->with('data_departamento', $data_departamento)->with('data_ciudad', $data_ciudad)->with('data_localidad', $data_localidad)->with('data_barrio', $data_barrio)->with('data_basica', $data_basica)->with('data_ubicacion', $data_ubicacion);
    }
    

    public function tienda(){
        session_start();
        $_SESSION['carrito_productos'] = array();$_SESSION['id_empresa'] = "";
        
        $data_empresas_cercanas = DB::select('CALL get_empresas_cercanas(?);',[$_SESSION["user_session"]]);
        return view('perfilConsumidor/Tienda')->with('data_empresas_cercanas', $data_empresas_cercanas);
    }

    public function tiendaEmpresa(Request $request){
        session_start();
        $_SESSION['id_empresa'] = $request->input('idEmpresa');

        $data_empresa = DB::select('CALL get_empresa_id(?);',[$request->input('idEmpresa')]);
        $producto_empresa = DB::select('CALL get_producto_empresa(?);',[$request->input('idEmpresa')]);
        $data_marca_empresa = DB::select('CALL get_marcas_empresa(?);',[$request->input('idEmpresa')]);
        $data_categorias_empresa = DB::select('CALL get_categorias_empresa(?);',[$request->input('idEmpresa')]);
        $data_unidadmedida_empresa = DB::select('CALL get_unidadmedidas_empresa(?);',[$request->input('idEmpresa')]);
        
        return view('perfilConsumidor/TiendaEmpresa')->with('data_empresa', $data_empresa)->with('producto_empresa', $producto_empresa)->with('data_marca', $data_marca_empresa)->with('data_categorias', $data_categorias_empresa)->with('data_unidadmedida', $data_unidadmedida_empresa);
    }

    public function get_detalle_producto_id(Request $request){
        session_start();
        $detalle_producto = DB::select('CALL get_detalle_producto_id(?,?)',[$request->input('IdProducto'),$_SESSION['id_empresa']]);
        echo json_encode($detalle_producto);
    }

    public function add_producto_carrito(Request $request){
        $output = "";
        session_start();
        $_SESSION["carrito_productos"];

        $json_producto = array('IDProducto' => $request->input('IDProducto'), 'Nombre' => $request->input('Nombre'), 'Cantidad' =>  $request->input('Cantidad'), 'ValorProducto' => $request->input('PrecioProducto'));
        array_push($_SESSION["carrito_productos"], $json_producto);

        $output = json_encode($_SESSION["carrito_productos"]);
        echo $output;
    }
    
    public function remove_producto_carrito(Request $request){
        
    }

    public function get_producto_carrito(){
        session_start();
        echo json_encode($_SESSION["carrito_productos"]);
    }

}

/*
Nombre
Email
IDTipoDocumento, 
Documento, 
TelefonoCelular, 
Telefono


IDDepartamento,
IDCiudad, 
IDLocalidad, 
IDBarrio, 
Direccion 
*/