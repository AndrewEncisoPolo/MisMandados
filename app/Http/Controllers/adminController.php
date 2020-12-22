<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class adminController extends Controller
{
    
    #region PERFIL  
        public function perfil(){
            session_start();
            $token_session = $_SESSION["user_session"];

            $data_usuario = DB::select('CALL get_usuario_adm_token(?)',[$token_session]);
            return view('perfilAdministrador/administrador')->with('info_usuario', $data_usuario);
        }
    #endregion

    
    public function frmimgPromocion(){
        session_start();
        return view('perfilAdministrador/CrearImagenProm');
    }

    public function obtenerImgPromocion(){
        $data_marca = DB::select('CALL get_imgProm()');
        echo json_encode($data_marca);
    }
    
    #region Cliente

        #region TIPO COMERCIO
            public function frmcreartipocomercio(){
                session_start();
                return view('perfilAdministrador/CrearTipoComercio');
            }
    
            public function obtenerTipoComercios(){
                $data_marca = DB::select('CALL get_tipocomercio()');
                echo json_encode($data_marca);
            }
    
            public function crearTipocomercio(Request $request){
                $output = "";
                session_start();
    
                $data_tipocomercio = DB::select('CALL insert_tipocomercio(?,?)',[$request->get('Nombre'),$_SESSION["user_session"]]);
    
                $salida = "";$mensaje = "";
                foreach ($data_tipocomercio as $key) {$salida = $key->Salida;$mensaje = $key->Mensaje;}
                $output = $salida;
    
                echo $output;
            }
        #endregion

    #endregion



    #region PRODUCTO

        #region PRODUCTO
            public function frmCrearProducto(){
                // Inicializar Variables de Sesión
                    session_start();
                    $token_session = $_SESSION["user_session"];

                // Se obtener informacion del usuario mediante el ID ($id_usuario) anteriormente consultado
                    $data_marca = DB::select('CALL get_marca()');
                    $data_categoria = DB::select('CALL get_categoria()');
                    $data_unidadmedida = DB::select('CALL get_unidadmedida()');

                    return view('perfilAdministrador/CrearProducto')->with('lista_marcas', $data_marca)->with('lista_categorias', $data_categoria)->with('lista_unidadmedida', $data_unidadmedida);
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

                    $salida_producto = "";$mensaje_producto = "";$idproducto_producto = "";

                    foreach ($data_insert_producto as $key) {$salida_producto = $key->Salida;$mensaje_producto = $key->Mensaje;$idproducto_producto = $key->IDProducto;}

                    $salida_imagen = "";$mensaje_imagen = "";

                    if($salida=true){
                        $data_insert_imagen = DB::select('CALL insert_imagen_producto(?,?)',[$request->get('ImagenProducto'),$idproducto_producto]);  
                        foreach ($data_insert_producto as $key) {$salida_imagen = $key->Salida;$mensaje_imagen = $key->Mensaje;}
                    }

                    if($salida_imagen == true || $salida_producto == true){$output = 1;}else{$output = 0;}

                    echo $output;
            }
        #endregion

        #region MARCA
            public function frmcrearmarca(){
                session_start();
                return view('perfilAdministrador/CrearMarca');
            }

            public function obtenerMarcas(){
                $data_marca = DB::select('CALL get_marca()');
                echo json_encode($data_marca);
            }

            public function crearMarca(Request $request){
                $output = "";
                session_start();
                $data_marca = DB::select('CALL insert_marca(?,?)',[$request->get('Nombre'),$_SESSION["user_session"]]);

                $salida = "";$mensaje = "";
                foreach ($data_marca as $key) {$salida = $key->Salida;$mensaje = $key->Mensaje;}
                $output = $salida;

                echo $output;
            }
        #endregion
        
        #region CATEGORÍA
            public function frmcrearcategoria(){
                session_start();
                return view('perfilAdministrador/CrearCategoria');
            }
    
            public function obtenerCategorias(){
                $data_marca = DB::select('CALL get_categoria()');
                echo json_encode($data_marca);
            }
    
            public function crearCategoria(Request $request){
                $output = "";
                session_start();
    
                $data_categoria = DB::select('CALL insert_categoria(?,?)',[$request->get('Nombre'),$_SESSION["user_session"]]);
    
                $salida = "";$mensaje = "";
                foreach ($data_categoria as $key) {$salida = $key->Salida;$mensaje = $key->Mensaje;}
                $output = $salida;
    
                echo $output;
            }
        #endregion
    
        #region UNIDAD DE MEDIDA
            public function frmcrearunidadmedida(){
                session_start();
                return view('perfilAdministrador/CrearUnidadMedida');
            }
    
            public function obtenerUnidadMedida(){
                $data_marca = DB::select('CALL get_unidadmedida()');
                echo json_encode($data_marca);
            }
    
            public function crearUnidadmedida(Request $request){
                $output = "";
                session_start();
                $data_departamento = DB::select('CALL insert_unidadmedida(?,?)',[$request->get('Nombre'),$_SESSION["user_session"]]);
    
                $salida = "";$mensaje = "";
                foreach ($data_departamento as $key) {$salida = $key->Salida;$mensaje = $key->Mensaje;}
                $output = $salida;
    
                echo $output;
            }
        #endregion
    
    #endregion


    
    #region ZONA

        #region DEPARTAMENTO
            public function frmcreardepartamento(){
                session_start();
                return view('perfilAdministrador/CrearDepartamento');
            }

            public function obtenerDepartamentos(){
                $data_departamento = DB::select('CALL get_departamento()');
                echo json_encode($data_departamento);
            }

            public function crearDepartamento(Request $request){
                $output = "";
                session_start();

                $data_departamento = DB::select('CALL insert_departamento(?,?)',[$request->get('Nombre'),$_SESSION["user_session"]]);

                $salida = "";$mensaje = "";
                foreach ($data_departamento as $key) {$salida = $key->Salida;$mensaje = $key->Mensaje;}
                $output = $salida;

                echo $output;
            }
        #endregion

        #region CIUDAD
        public function frmcrearCiudad(){
            // Inicializar Variables de Sesión
                session_start();
                $data_departamento = DB::select('CALL get_departamento()');
                return view('perfilAdministrador/CrearCiudad')->with('data_departamento', $data_departamento);
        }

        public function obtenerCiudades(){
            $data_marca = DB::select('CALL get_ciudad()');
            echo json_encode($data_marca);
        }
        
        public function crearCiudad(Request $request){
            // Inicializar Variables de Sesión
            $output = "";
            session_start();
                
            $data_ciudad = DB::select('CALL insert_ciudad(?,?,?)',[$request->get('IDDepartamento'),$request->get('Nombre'),$_SESSION["user_session"]]);

            $salida = "";$mensaje = "";
            foreach ($data_ciudad as $key) {$salida = $key->Salida;$mensaje = $key->Mensaje;}
            $output = $salida;

            echo $output;
        }
    #endregion

        #region LOCALIDAD
            public function frmcrearlocalidad(){
                // Inicializar Variables de Sesión
                    session_start();
                    $data_departamento = DB::select('CALL get_departamento()');
                    return view('perfilAdministrador/CrearLocalidad')->with('data_departamento', $data_departamento);
            }
    
            public function obtenerLocalidades(){
                $data_marca = DB::select('CALL get_localidad()');
                echo json_encode($data_marca);
            }
    
            public function crearLocalidad(Request $request){
                // Inicializar Variables de Sesión
                $output = "";
                session_start();
                    
                $data_localidad = DB::select('CALL insert_localidad(?,?,?)',[$request->get('IDCiudad'),$request->get('Nombre'),$_SESSION["user_session"]]);
    
                $salida = "";$mensaje = "";
                foreach ($data_localidad as $key) {$salida = $key->Salida;$mensaje = $key->Mensaje;}
                $output = $salida;
    
                echo $output;
            }
        #endregion

        #region BARRIO
            public function frmcrearbarrio(){
                // Inicializar Variables de Sesión
                    session_start();
                    $data_departamento = DB::select('CALL get_departamento()');
                    return view('perfilAdministrador/CrearBarrio')->with('data_departamento', $data_departamento);
            }

            public function obtenerBarrios(){
                $data_barrios = DB::select('CALL get_barrio()');
                echo json_encode($data_barrios);
            }

            public function crearBarrio(Request $request){
                $output = "";
                session_start();
                $data_barrio = DB::select('CALL insert_barrio(?,?,?)',[$request->get('IDLocalidad'),$request->get('Nombre'),$_SESSION["user_session"]]);

                $salida = "";$mensaje = "";
                foreach ($data_barrio as $key) {$salida = $key->Salida;$mensaje = $key->Mensaje;}
                $output = $salida;

                echo $output;
            }
        #endregion

            #region LISTA CIUDAD POR DEPARTAMENTO
                public function obtenerCiudadIdDepartamento(Request $request){
                    $data_ciudad = DB::select('CALL get_ciudad_iddepartamento(?)',[$request->get('iddepartamento')]);
                    echo json_encode($data_ciudad);
                }
            #endregion

            #region LISTA LOCALIDAD POR CIUDAD
                public function obtenerLocalidadIdCiudad(Request $request){
                    $data_localidad = DB::select('CALL get_localidad_idciudad(?)',[$request->get('idciudad')]);
                    echo json_encode($data_localidad);
                }
            #endregion

            #region LISTA BARRIOS POR LOCALIDAD
            public function obtenerbarrioIdLocalidad(Request $request){
                $data_barrio = DB::select('CALL get_barrio_idlocalidad(?)',[$request->get('idlocalidad')]);
                echo json_encode($data_barrio);
            }
        #endregion

    #endregion
}