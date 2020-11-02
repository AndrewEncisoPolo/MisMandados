<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class perfilPrincipalController extends Controller
{
    public function get_detalle_producto(Request $request){
        $detalle_producto = DB::select('CALL get_producto_id(?)',[$request->input('IdProducto')]);
        
        echo json_encode($detalle_producto);
    }

    public function login(Request $request){

        // SP Iniciar Sesión
        // Valida si el usuario existe y genera un token de sesión
            $data_login = DB::select('CALL login(?,?)',[$request->input('Email'),$request->input('Contrasenna')]);

        // Obtener valores de la consulta a variables independientes
            $tipo_usuario = 0;
            $token_usuario = '';

            foreach ($data_login as $key) {
                $tipo_usuario = $key->TipoUSuario;
                $token_usuario = $key->Token;
            }

        // Se crea varuable de Session
            session_start();
            $_SESSION["user_session"] = $token_usuario;

        // Validar el tipo de usuario   
            // Tipo Usuario = 1 (Administrador)
            // Tipo Usuario = 2 (Consumidor)
            // Tipo Usuario = 3 (Empresa / Comerciante)    
            if($tipo_usuario == 1){
                return redirect('perfil-adm');
            }
            else if($tipo_usuario == 2){
                return redirect('perfil-consumidor');
            }
            else if($tipo_usuario == 3){
                return view('perfilEmpresa')->with('IngresoInfoAdicional', $ingresoInfoAdicional);
            }
            else{
                return redirect('inicio');
            }
    }

    public function logout(Request $request){

        //dd($request->all());

        // SP Borrar Token in DB
            $data_logOut = DB::select('CALL logOut(?)',[$request->input('token')]);

        // Definir y Obtener Salida y mensaje de el SP LogOut
            $salida = false;
            $mensaje = '';

            foreach ($data_logOut as $key) {
                $salida = $key->Salida;
                $mensaje = $key->Mensaje;
            }

        // Según salida, redirecciona  
            if($salida == 1){
                session_start();
                session_destroy();
                return redirect('inicio');
            }
            else{
                return redirect('Error');
            }
    }




    public function perfilConsumidor()
    {
        // Inicializar Variables de Sesión
            session_start();
            $token_session = $_SESSION["user_session"];

        // Se obtener informacion del usuario mediante el ID ($id_usuario) anteriormente consultado
            $data_usuario = DB::select('CALL get_usuario_token(?)',[$token_session]);
            return view('consumidorPerfil')->with('info_usuario', $data_usuario);
    }

    public function tiendaConsumidor()
    {
        session_start();
        $token_session = $_SESSION["user_session"];

        $data_empresas_cercanas = DB::select('CALL get_empresas_cercanas(?);',[$token_session]);
        return view('consumidorTienda')->with('data_empresas_cercanas', $data_empresas_cercanas);
    }

    public function tiendaEmpresaConsumidor(Request $request){
        //dd($request->all());

        session_start();
        $token_session = $_SESSION["user_session"];

        $request->input('idEmpresa');

        $data_empresa = DB::select('CALL get_empresa_id(?);',[$request->input('idEmpresa')]);
        //$imagenes_empresa = DB::select('CALL get_imagen_empresa_id(?);',[$request->input('idEmpresa')]);
        $producto_empresa = DB::select('CALL get_producto_empresa(?);',[$request->input('idEmpresa')]);
        

        return view('consumidorTiendaEmpresa')->with('data_empresa', $data_empresa)->with('producto_empresa', $producto_empresa);
    }
    



    public function perfilAdm(){
        // Inicializar Variables de Sesión
            session_start();
            $token_session = $_SESSION["user_session"];

        // Se obtener informacion del usuario mediante el ID ($id_usuario) anteriormente consultado
            $data_usuario = DB::select('CALL get_usuario_adm_token(?)',[$token_session]);
            return view('adminPerfil')->with('info_usuario', $data_usuario);
    }



    public function frmCrearProducto(){
        // Inicializar Variables de Sesión
            session_start();
            $token_session = $_SESSION["user_session"];

        // Se obtener informacion del usuario mediante el ID ($id_usuario) anteriormente consultado
            $data_marca = DB::select('CALL get_marca()');
            $data_categoria = DB::select('CALL get_categoria()');
            $data_unidadmedida = DB::select('CALL get_unidadmedida()');

            return view('adminCrearProducto')->with('lista_marcas', $data_marca)->with('lista_categorias', $data_categoria)->with('lista_unidadmedida', $data_unidadmedida);
    }

    public function crearProducto(Request $request){

        // Inicializar Variables de Sesión
        session_start();
        $token_session = $_SESSION["user_session"];

            $output = "";

            $idmarca = $request->get('IDMarca');
            $idcategoria = $request->get('IDCategoria');
            $nombre = $request->get('Nombre');
            $peso = $request->get('Peso');
            $idunidadmedida = $request->get('IDUnidadMedida');
            $valorproducto = $request->get('ValorProducto');
            $descripcion = $request->get('Descripcion');

            $data_insert_producto = DB::select('CALL insert_producto(?,?,?,?,?,?,?,?)',[$idmarca,$idcategoria,$nombre,$peso,$idunidadmedida,$valorproducto,$descripcion,$token_session]);

            $salida_producto = "";
            $mensaje_producto = "";
            $idproducto_producto = "";

            foreach ($data_insert_producto as $key) {$salida_producto = $key->Salida;$mensaje_producto = $key->Mensaje;$idproducto_producto = $key->IDProducto;}

            $salida_imagen = "";
            $mensaje_imagen = "";

            if($salida=true){
                $data_insert_imagen = DB::select('CALL insert_imagen_producto(?,?)',[$request->get('ImagenProducto'),$idproducto_producto]);  
                foreach ($data_insert_producto as $key) {$salida_imagen = $key->Salida;$mensaje_imagen = $key->Mensaje;}
            }

            if($salida_imagen == true || $salida_producto == true){$output = 1;}else{$output = 0;}

            echo $output;
    }

    
}