<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class empresaController extends Controller
{
    public function perfil(){
        session_start();
        if(isset($_SESSION["user_session"])){
            $token_session = $_SESSION["user_session"];
            $data_usuario = DB::select('CALL get_empresa_token(?)',[$token_session]);
            return view('perfilEmpresa/perfil')->with('info_usuario', $data_usuario);
        }else{
            return redirect('inicio');
        }
    }

    public function editarEmpresa(){
        session_start();
        $data_departamento = DB::select('CALL get_departamento()');
        $data_ciudad = DB::select('CALL get_ciudad()');
        $data_localidad = DB::select('CALL get_localidad()');
        $data_barrio = DB::select('CALL get_barrio()');
        
        $data_tipocomercio = DB::select('CALL get_tipocomercio()');
        $data_tipodocumento = DB::select('CALL get_tipodocumento_empresa()');

        $data_info_basica = DB::select('CALL get_info_basica_empresa(?);',[$_SESSION["user_session"]]);
        $data_ubicacion = DB::select('CALL get_info_ubicacion_empresa(?);',[$_SESSION["user_session"]]);
        $data_info = DB::select('CALL get_info_empresa(?);',[$_SESSION["user_session"]]);

        return view('perfilEmpresa/editarEmpresa')->with('data_tipocomercio',$data_tipocomercio)->with('data_departamento',$data_departamento)->with('data_ciudad', $data_ciudad)->with('data_localidad', $data_localidad)->with('data_barrio', $data_barrio)->with('data_tipodocumento',$data_tipodocumento)->with('data_info_basica',$data_info_basica)->with('data_ubicacion',$data_ubicacion)->with('data_info',$data_info);
    }

    public function frmProductoAsociado(){
        session_start();
        $data_marca = DB::select('CALL get_marca()');
        $data_categoria = DB::select('CALL get_categoria()');
        $data_unidadmedida = DB::select('CALL get_unidadmedida()');
        return view('perfilEmpresa/productos')->with('lista_marcas', $data_marca)->with('lista_categorias', $data_categoria)->with('lista_unidadmedida', $data_unidadmedida);
    }

    public function obtenerProductos(){
        session_start();
        $data_producto = DB::select('CALL get_producto_token(?)',[$_SESSION["user_session"]]);
        echo json_encode($data_producto);
    }

    public function agregarProducto(Request $request){
        $output = "";
        session_start();
        $data_producto = DB::select('CALL add_producto_empresa(?,?,?)',[$request->get('IDProducto'),$request->get('ValorProducto'),$_SESSION["user_session"]]);

        $salida = "";$mensaje = "";
        foreach ($data_producto as $key) {$salida = $key->Salida;$mensaje = $key->Mensaje;}
        $output = $salida;
        echo $output;
    }

    public function getProductoPorFiltros(Request $request){
        $output = "";
        session_start();
        $data_barrio = DB::select('CALL get_producto_filtros(?,?,?)',[$request->get('IDMarca'),$request->get('IDCategoria'),$request->get('IDUnidadMedidad')]);
        echo json_encode($data_barrio);
    }
}

/*
Foto Fachada
Foto logotipo
*/