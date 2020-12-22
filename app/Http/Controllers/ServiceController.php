<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
{
    public function AuthRouteAPI(Request $request){return $request->user();}

    public function slashRoute(){return redirect('inicio');}

    public static function authUser($token){
        $output = 0;
        if($token){$tipousuario = DB::select('CALL authUser(?)',[$token]);foreach ($tipousuario as $key) {$output = $key->IDTipoUsuario;}}
        return $output;
    }

    public function login(Request $request){
        $data_login = DB::select('CALL login(?,?)',[$request->input('Email'),$request->input('Contrasenna')]);

        $tipo_usuario = 0;
        $token_usuario = '';

        foreach ($data_login as $key) {$tipo_usuario = $key->TipoUSuario;$token_usuario = $key->Token;}

        session_start();
        $_SESSION["user_session"] = $token_usuario;

        if($tipo_usuario == 1){return redirect('perfil-adm');}
        else if($tipo_usuario == 2){$_SESSION["carrito_productos"] = "";return redirect('perfil-consumidor');}
        else if($tipo_usuario == 3){return redirect('perfil-empresa');}
        else{return redirect('inicio');}
    }

    public function logout(Request $request){
        $data_logOut = DB::select('CALL logOut(?)',[$request->input('token')]);

        $salida = false;$mensaje = '';

        foreach ($data_logOut as $key) {$salida = $key->Salida;$mensaje = $key->Mensaje;}

        if($salida == 1){session_start();session_destroy();return redirect('inicio');}
        else{return redirect('Error');}
    }

    public function get_producto_id(Request $request){$detalle_producto = DB::select('CALL get_producto_id(?)',[$request->input('IdProducto')]);echo json_encode($detalle_producto);}

    //-------------------------------------------------------------------------------//

    public function registrarEmpresa(Request $request){
        $aceptaterminos = false;
        if($request->input('aceptaTerminosDeUso')=="on"){$aceptaterminos = true;} 

        $data_registro = DB::select('CALL create_usuario_empresa(?,?,?,?)',[$request->get('nombreEmpresa'),$request->input('correoEmpresa'),$request->input('contrasennaEmpresa'),$aceptaterminos]);

        $salida = "";$mensaje = "";$token_usuario = "";
        foreach ($data_registro as $key) {$salida = $key->Salida;$mensaje = $key->Mensaje;$token_usuario = $key->token;}
        $output = $salida;

        if($token_usuario){session_start();$_SESSION["user_session"] = $token_usuario;return redirect('detalle-empresa');}
        else{return redirect('inicio');}
    }

    public function registrarDetalleEmpresa(Request $request){
        session_start();
        $data_departamento = DB::select('CALL get_departamento()');
        $data_tipodocumento = DB::select('CALL get_tipodocumento_empresa()');
        $data_nombreUsuario = DB::select('CALL get_nombre_usuario_token(?)',[$_SESSION["user_session"]]);
        $data_tipocomercio = DB::select('CALL get_tipocomercio()');
        return view('registro/detalleEmpresa')->with('data_tipocomercio',$data_tipocomercio)->with('data_departamento',$data_departamento)->with('data_tipodocumento',$data_tipodocumento)->with('nombre',$data_nombreUsuario);
    }
    
    public function crearImagenesEmpresa(Request $request){
        session_start();
        $output = 0;
        
        $data_perfil = DB::select('CALL insert_imagen_perfil(?,?)',[$request->get('ImgPerfil'),$_SESSION["user_session"]]);
        $salida_perfil = "";$mensaje_perfil = "";
        foreach ($data_perfil as $key) {$salida_perfil = $key->Salida;$mensaje_perfil = $key->Mensaje;}  
           
        $data_portada = DB::select('CALL insert_imagen_portada(?,?)',[$request->get('ImgPortada'),$_SESSION["user_session"]]);
        $salida_portada = "";$salida_portada = "";
        foreach ($data_portada as $key) {$salida_portada = $key->Salida;$salida_portada = $key->Mensaje;}  
        
        if($salida_perfil==true||$salida_portada==true){$output = 1;}
        else{$output = 0;}
        echo $output;
    }

    public function crearDatosBasicosEmpresa(Request $request){
        session_start();
        $output = 0;
        $data_info_basica = DB::select('CALL create_info_basica_empresa(?,?,?,?,?,?,?)',[$request->get('IDTipoDocumento'),$request->get('Documento'),$request->get('Telefono'),$request->get('TelefonoCelular'),$request->get('RazonSocial'),$request->get('TipoEmpresa'),$_SESSION["user_session"]]);

        $salida_info_basica = "";$mensaje_info_basica = "";
        foreach ($data_info_basica as $key) {$salida_info_basica = $key->Salida;$mensaje_info_basica = $key->Mensaje;}

        $data_info_empresa = DB::select('CALL create_info_empresa(?,?,?,?)',[$request->get('HoraAbre'),$request->get('HoraCierre'),$request->get('Descripcion'),$_SESSION["user_session"]]);

        $salida_info_empresa = "";$mensaje_info_basica = "";
        foreach ($data_info_empresa as $key) {$salida_info_empresa = $key->Salida;$mensaje_info_empresa = $key->Mensaje;}

        if($salida_info_empresa==true||$salida_info_basica==true){$output = 1;}
        else{$output = 0;}
        echo $output;
    }

    public function crearUbicacionEmpresa(Request $request){
        session_start();
        $output = 0;
        $data_ubicacion = DB::select('CALL create_info_ubicacion_empresa(?,?,?,?,?,?,?,?)',[$request->get('IDDepartamento'),$request->get('IDCiudad'),$request->get('IDLocalidad'),$request->get('IDBarrio'),$request->get('Direccion'),$request->get('Latitud'),$request->get('Longitud'),$_SESSION["user_session"]]);
        
        $salida = "";$mensaje = "";
        foreach ($data_ubicacion as $key) {$salida = $key->Salida;$mensaje = $key->Mensaje;}
        
        $output = $salida;
        echo $output;
    }

    //-------------------------------------------------------------------------------//

    public function registrarUsuario(Request $request){
        $nombre = $request->get('nombreUsuario')." ".$request->get('apellidoUsuario');
        $aceptaterminos = false;
        if($request->input('aceptaTerminosDeUso')=="on"){$aceptaterminos = true;} 
        
        $data_registro = DB::select('CALL create_usuario_consumidor(?,?,?,?)',[$nombre,$request->input('correoUsuario'),$request->input('contrasennaUsuario'),$aceptaterminos]);
        $salida = "";$mensaje = "";$token_usuario = "";
        foreach ($data_registro as $key) {$salida = $key->Salida;$mensaje = $key->Mensaje;$token_usuario = $key->token;}
        $output = $salida;

        if($token_usuario){session_start();$_SESSION["user_session"] = $token_usuario;return redirect('detalle-consumidor');}
        else{return redirect('inicio');}
    }

    public function imagenUsuario(Request $request){
        session_start();
        $output = 0;
        
        $data_perfil = DB::select('CALL insert_imagen_perfil(?,?)',[$request->get('ImgPerfil'),$_SESSION["user_session"]]);
        $salida_perfil = "";$mensaje_perfil = "";
        foreach ($data_perfil as $key) {$salida_perfil = $key->Salida;$mensaje_perfil = $key->Mensaje;}  

        if($salida_perfil==true){$output = 1;}else{$output = 0;}
        echo $output;
    }

    public function registrarDetalleConsumidor(Request $request){
        session_start();
        $data_departamento = DB::select('CALL get_departamento()');
        $data_tipodocumento = DB::select('CALL get_tipodocumento_consumidor()');
        $data_nombreUsuario = DB::select('CALL get_nombre_usuario_token(?)',[$_SESSION["user_session"]]);
        return view('registro/detalleConsumidor')->with('data_departamento',$data_departamento)->with('data_tipodocumento',$data_tipodocumento)->with('nombre',$data_nombreUsuario);
    }

    public function crearDatosBasicosConsumidor(Request $request){
        session_start();
        $output = 0;
        $data_info_basica = DB::select('CALL create_info_basica_usuario(?,?,?,?,?)',[$request->get('IDTipoDocumento'),$request->get('Documento'),$request->get('Telefono'),$request->get('TelefonoCelular'),$_SESSION["user_session"]]);

        $salida = "";$mensaje = "";
        foreach ($data_info_basica as $key) {$salida = $key->Salida;$mensaje = $key->Mensaje;}
        
        $output = $salida;
        echo $output;
    }

    public function crearUbicacionConsumidor(Request $request){
        session_start();
        $output = 0;
        $data_ubicacion = DB::select('CALL create_info_ubicacion_usuario(?,?,?,?,?,?)',[$request->get('IDDepartamento'),$request->get('IDCiudad'),$request->get('IDLocalidad'),$request->get('IDBarrio'),$request->get('Direccion'),$_SESSION["user_session"]]);

        $salida = "";$mensaje = "";
        foreach ($data_ubicacion as $key) {$salida = $key->Salida;$mensaje = $key->Mensaje;}
        
        $output = $salida;
        echo $output;
    }

    //-------------------------------------------------------------------------------//

    public function recuperarContrasenna(Request $request){
        return view('otros/recuperarContraseña');
    }

    public function verificarUsuario_rc(Request $request){
        $output = "";
        session_start();
        $data_marca = DB::select('CALL verificar_usuario(?,?)',[$request->get('Correo'),$request->get('Telefono')]);
        $salida = "";$mensaje = "";
        foreach ($data_marca as $key) {$salida = $key->Salida;$mensaje = $key->Mensaje;}
        $output = $salida;
        echo $output;
    }

    public function recuperarContrasenna_rc(Request $request){
        $output = "";
        session_start();
        $data_marca = DB::select('CALL insert_nueva_contrasenna(?,?,?)',[$request->get('Correo'),$request->get('Telefono'),$request->get('Contrasenna')]);
        $salida = "";$mensaje = "";
        foreach ($data_marca as $key) {$salida = $key->Salida;$mensaje = $key->Mensaje;}
        $output = $salida;
        echo $output;
    }

    public function error(){return view('otros/Error');}

    //"pk.eyJ1IjoiYW5kcmV5ZW5jaXNvIiwiYSI6ImNraHVvNjZieTFmNWIyd21jMmd0Ymxjc24ifQ.wYakjSfXiE0JZmSrvgnu9Q"
}