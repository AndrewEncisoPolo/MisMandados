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
        $_SESSION['carrito_productos'] = array();
        $_SESSION['id_empresa'] = "";
        
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
        $data_consumidor = DB::select('CALL get_datos_consumidor_tienda(?);',[$_SESSION["user_session"]]);
        
        return view('perfilConsumidor/TiendaEmpresa')->with('data_consumidor',$data_consumidor)->with('data_empresa', $data_empresa)->with('producto_empresa', $producto_empresa)->with('data_marca', $data_marca_empresa)->with('data_categorias', $data_categorias_empresa)->with('data_unidadmedida', $data_unidadmedida_empresa);
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
    
    public function delete_producto_carrito(Request $request){
        $output = "";
        $array_productos = array();
        session_start();
        try {
            $array_productos = $_SESSION["carrito_productos"];
            unset($array_productos[$request->get('Posicion')]);
            $_SESSION["carrito_productos"] = $array_productos;
            $output = 1;
        } 
        catch (\Throwable $th) {$output = 0;}
        echo $output;
    }

    public function get_producto_carrito(){
        session_start();
        echo json_encode($_SESSION["carrito_productos"]);
    }

    public function insert_pedido(Request $request){
        $output = 0;
        $array_productos = array();
        $Id_Pedido = 0;
        session_start();

        $data_pedido = DB::select('CALL insert_pedido(?,?,?)',[$_SESSION["user_session"],$_SESSION['id_empresa'],$request->input('TotalPedido')]);

        $salida_pedido = false;
        $mensaje_pedido = "";

        foreach ($data_pedido as $key) {
            $salida_pedido = $key->Salida;
            $Id_Pedido = $key->IDPedido;
        }

        $array_productos = $_SESSION["carrito_productos"];
        $salida_detalle_pedido = false;
        $mensaje_detalle_pedido = "";

        foreach ($array_productos as $key) {
            $data_detalle_pedido = DB::select('CALL insert_detalle_pedido(?,?,?,?)',[$_SESSION["user_session"],$Id_Pedido,intval($key['IDProducto']),intval($key['Cantidad'])]);
        }

        if($salida_pedido == true){$output = 1;$_SESSION["carrito_productos"] = array();}else{$output = 0;}

        echo $output;
    }

    function get_pedido(){
        session_start();
        $pedido = DB::select('CALL get_pedido_consumidor(?)',[$_SESSION['user_session']]);
        echo json_encode($pedido);
    }

    function get_pedido_id(Request $request){
        session_start();
        $pedido = DB::select('CALL get_pedido_detalle_id_consumidor(?,?)',[$_SESSION['user_session'],$request->get('IDPedido')]);
        echo json_encode($pedido);
    }
    
    function get_detalle_pedido(Request $request){
        $pedido = DB::select('CALL get_detalle_pedido(?)',[$request->get('IDPedido')]);
        echo json_encode($pedido);
    }

    function get_productos_filtros_consumidor(Request $request){
        session_start();
        $pedido = DB::select('CALL get_productos_filtros_consumidor(?,?,?,?)',[$_SESSION['id_empresa'],$request->get('IDMarca'),$request->get('IDCategoria'),$request->get('IDUnidadMedida')]);
        echo json_encode($pedido);
    }

    function get_localizacion_idempresa(){
        session_start();
        $localizacion = DB::select('CALL get_localizacion_idempresa(?)',[$_SESSION['id_empresa']]);
        echo json_encode($localizacion);
    }
    
    function pedido_cancelado(Request $request){
        $output = 0;
        try {
            session_start();
            $pedido = DB::select('CALL update_estadopedido_enprocesoc(?,?)',[$_SESSION['user_session'],$request->get('IDPedido')]);
            $output = 1;
        } catch (\Throwable $th) {$output = 0;}
        echo $output;
    }
}