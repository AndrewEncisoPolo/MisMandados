<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
{
    public static function authUser($token){
        $output = 0;
        if($token){
            $tipousuario = DB::select('CALL authUser(?)',[$token]);
            foreach ($tipousuario as $key) {$output = $key->IDTipoUsuario;}
        }
        return $output;
    }

    public function login(Request $request){
        $data_login = DB::select('CALL login(?,?)',[$request->input('Email'),$request->input('Contrasenna')]);

        $tipo_usuario = 0;
        $token_usuario = '';

        foreach ($data_login as $key) {
            $tipo_usuario = $key->TipoUSuario;
            $token_usuario = $key->Token;
        }

        session_start();
        $_SESSION["user_session"] = $token_usuario;

        if($tipo_usuario == 1){
            return redirect('perfil-adm');
        }
        else if($tipo_usuario == 2){
            $_SESSION["carrito_productos"] = "";
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
        $data_logOut = DB::select('CALL logOut(?)',[$request->input('token')]);

        $salida = false;
        $mensaje = '';

        foreach ($data_logOut as $key) {
            $salida = $key->Salida;
            $mensaje = $key->Mensaje;
        }

        if($salida == 1){
            session_start();
            session_destroy();
            return redirect('inicio');
        }
        else{
            return redirect('Error');
        }
    }

    public function get_producto_id(Request $request){
        $detalle_producto = DB::select('CALL get_producto_id(?)',[$request->input('IdProducto')]);
        echo json_encode($detalle_producto);
    }



    public function registrarUsuario(Request $request){
        $nombre = $request->get('nombreUsuario')." ".$request->get('apellidoUsuario');
        $aceptaterminos = false;
        if($request->input('aceptaTerminosDeUso')=="on"){
            $aceptaterminos = true;
        } 
        $data_registro = DB::select('CALL create_usuario_consumidor(?,?,?,?)',[$nombre,$request->input('correoUsuario'),$request->input('contrasennaUsuario'),$aceptaterminos]);

        $salida = "";$mensaje = "";$token_usuario = "";
        foreach ($data_registro as $key) {$salida = $key->Salida;$mensaje = $key->Mensaje;$token_usuario = $key->token;}
        $output = $salida;

        if($token_usuario){
            session_start();
            $_SESSION["user_session"] = $token_usuario;

            return redirect('detalle-consumidor');
        }else{
            return redirect('inicio');
        }
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


    


    public function registrarUsuarioDetalle(Request $request){
        dd($request->all());
    }

    public function registrarEmpresa(Request $request){
        dd($request->all());
    }

    public function registrarEmpresaDetallem(Request $request){
        dd($request->all());
    }

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

    public function error(){
        return view('error');
    }
}

/*



// REGISTRAR EMPRESA

p_nombre
p_email
p_contrasenna

IF EXISTS(SELECT u.IDUsuario FROM usuario u WHERE u.Nombre = p_nombre AND u.Email = p_email AND u.IDTipoUsuario = 3 AND u.Activo = true) THEN 
 
    SET @Salida = false;
    SET @Mensaje = "Error en la inserción, El usuario ya existe.";
    SET @token = (SELECT `Token` FROM `usuariologin` WHERE `Email` = p_email AND `Contrasenna` = p_pass);
    SELECT @Salida as Salida, @Mensaje as Mensaje, @token as token;

ELSE  

    INSERT INTO `usuario`(`IDTipoUsuario`, `IDTipoDocumento`, `Nombre`, `Documento`, `Email`, `TelefonoCelular`, `Telefono`, `IDDepartamento`, `IDCiudad`, `IDLocalidad`, `IDBarrio`, `Direccion`, `RazonSocial`, `IDTipoComercio`, `Activo`) 
    VALUES (3,NULL,p_nombre,NULL,p_email,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,true);

    SET @IDUsuario = (SELECT u.IDUsuario FROM usuario u WHERE u.Nombre = p_nombre AND u.Email = p_email AND u.IDTipoUsuario = 2 AND u.Activo = true);

    INSERT INTO `usuariologin`(`IDUsuario`, `Email`, `Contrasenna`, `Token`, `IngresoInfoAdicional`, `Activo`) 
    VALUES (@IDUsuario,p_email,p_contrasenna,NULL,false,true);

    UPDATE `usuariologin` 
    SET `Token`= (SELECT LEFT(UUID(), 36))
    WHERE `Email` = p_email AND `Contrasenna` = p_contrasenna;

    SET @Salida = true;
    SET @Mensaje = "Ok, Se realizo el registro.";
    SET @token = (SELECT `Token` FROM `usuariologin` WHERE `Email` = p_email AND `Contrasenna` = p_pass);
    SELECT @Salida as Salida, @Mensaje as Mensaje, @token as token;

END IF

*/