<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="../resources/css/siorco.css">
    <script src="../resources/js/jquery-3.5.1.slim.min.js"></script>
    <script src="../resources/js/bootstrap.js"></script>
    <title>Mis Mandados</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-nav-soc fixed-top shadow-sm py-0">
        <a class="navbar-brand px-1 bg-white"><img height="46px" src="../resources/img/logos/LOGO_Soc.png" alt="Sistema Organizacional de Comercio - SOC"></a>
        <button id="toogle-collapse-navbar" class="navbar-toggler" type="button"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse"
            id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active"><a class="nav-link text-white" href="{{url('inicio')}}">Inicio</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="{{url('tienda')}}">Tienda</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="{{url('contacto')}}">Nosotros</a></li>
            </ul>
            <div class="form-inline my-2 my-lg-0"> <button class="btn btn-outline-light my-2 my-sm-0" data-toggle="modal" data-target="#modal-registrar-empresa">Registrar Empresa</button>&nbsp; <button class="btn btn-outline-light my-2 my-sm-0" data-toggle="modal" data-target="#modal-iniciar-sesion">Iniciar Sesión</button>                </div>
        </div>
    </nav>
    <div class="bg-white btn-red-social shadow-sm cursor-pointer" data-toggle="tooltip" data-placement="right" title="Contacte con nosotros a nuestro WhatsApp">
        <a href="https://api.whatsapp.com/send?phone=573155000014&amp;text=Hola" style="height:100%;"> 
            <img src="../resources/img/redessociales/flt_whatsapp.png" alt="Sistema SOC - WhatsApp de Contacto" style="width: 50px;">
        </a>
    </div>
    <div class="w-100 h-100">@yield('main_content')</div>
    <footer class="page-footer font-small bg-nav-soc"> <br>
        <div><img class="w-100 pb-3" src="../resources/img/footter/Cinta_SOC_min.jpg"></div>
        <div class="container text-center text-md-left">
            <div class="row">
                <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-6 col-lg-6 form-group">
                    <h5 class="text-white">Correos de contacto</h5>
                    <ul class="list-unstyled">
                        <li><a class="text-white">mandadosdados@gmail.com</a></li>
                        <li><a class="text-white">clientes@mismandados.com.co</a></li>
                    </ul>
                </div>
                <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-6 col-lg-6 form-group">
                    <h5 class="text-white">Datos de Contacto</h5>
                    <ul class="list-unstyled">
                        <li><a class="text-white">Bogotá - Colombia</a></li>
                    </ul>
                    <h5 class="text-white">Numero de Contacto</h5>
                    <ul class="list-unstyled">
                        <li><a class="text-white">*57 315 500 0014</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-copyright text-center py-3"><small class="text-white">© 2020 Todos los derechos reservados - <b>Mis Mandados</b></small></div>
    </footer>
</body>

</html>
<!-- Modal Registrar Empresa-->
<div class="modal fade" id="modal-registrar-empresa" tabindex="-1" aria-labelledby="modal-registrar-empresa" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="form-group">
                    <h2>Registrar Empresa</h2>
                </div>
                <form action="{{url('registrarEmpresa')}}" method="post">
                    <div class="row pl-2 pr-2">
                        <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group"> <label>Nombre de la Empresa</label> <input type="text" class="form-control" placeholder="Nombre Empresa" name="nombreEmpresa" required> </div>
                        </div>
                        <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group"> <label>Correo</label> <input type="text" class="form-control" placeholder="Correo" name="correoEmpresa" required> </div>
                        </div>
                        <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group"> <label>Contraseña</label> <input type="password" class="form-control" placeholder="Contraseña" name="contrasennaEmpresa" autocomplete="on" required> </div>
                        </div>
                        <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group"> <input id="aceptaTerminos-empresa" type="checkbox" name="aceptaTerminosDeUso"> <label for="aceptaTerminos-empresa"> Acepto Terminos y condiciones de uso</label> </div>
                        </div>
                        <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-12 col-lg-12"> <input type="hidden" name="_token" value="{{csrf_token()}}"></input> <button id="btn-submit-empresa" class="btn btn-primary w-100" type="submit" disabled>Registrarme</button> </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal Iniciar Sesión-->
<div class="modal fade" id="modal-iniciar-sesion" tabindex="-1" aria-labelledby="modal-iniciar-sesion" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div id="form-login" class="w-100 h-100">
                    <h2>Iniciar Sesión<button id="btn-show-register" class="btn btn-outline-primary float-right mb-2">Registrarme</button></h2>
                    <form action="{{url('login')}}" method="post">
                        <div class="row pl-2 pr-2 w-100">
                            <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group"> <label>Correo Eletrónico</label> <input type="text" class="form-control" placeholder="Correo Eletrónico" name="Email" required> </div>
                            <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group"> <label>Contraseña</label> <input type="password" class="form-control" placeholder="Contraseña" name="Contrasenna" autocomplete="on" required> </div>
                            <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group"> <input type="hidden" name="_token" value="{{csrf_token()}}"></input> <button class="btn btn-primary w-100" type="submit">Iniciar Sesión</button> </div>
                            <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group text-center">
                            <small><a class="text-link" href="{{url('restablecer-contrasenna')}}">Olvide mi contraseña</a></small> </div>
                            <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center"> <small>¿Todavía no tienes una cuenta?<a id="a-show-register" class="text-link">&nbsp;Registrate</a></small> </div>
                        </div>
                    </form>
                </div>
                <div id="form-registrarme" class="w-100 h-100 d-none">
                    <div class="form-group">
                        <h2>Registrarme <button id="btn-show-login" class="btn btn-outline-primary float-right">Iniciar Sesión</button> </h2>
                    </div>
                    <form action="{{url('registrarUsuario')}}" method="post">
                        <div class="row pl-2 pr-2 w-100">
                            <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-12 col-lg-6 form-group"> <label>Nombre</label> <input type="text" class="form-control" placeholder="Nombre" name="nombreUsuario" required> </div>
                            <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-12 col-lg-6 form-group"> <label>Apellido</label> <input type="text" class="form-control" placeholder="Apellido" name="apellidoUsuario" required> </div>
                            <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group"> <label>Correo Eletrónico</label> <input type="text" class="form-control" placeholder="Correo Eletrónico" name="correoUsuario" required> </div>
                            <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group"> <label>Contraseña</label> <input type="password" class="form-control" placeholder="Contraseña" name="contrasennaUsuario" autocomplete="on" required> </div>
                            <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group"> <input id="aceptaTerminos-consumidor" type="checkbox" name="aceptaTerminosDeUso"> <label for="aceptaTerminos-consumidor"> Acepto Terminos y condiciones de uso</label> </div>
                            <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group">
                            @csrf 
                            <button id="btn-submit-consumidor" class="btn btn-primary w-100" type="submit" disabled>Registrarme</button> </div>
                            <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center"> <small>¿Ya tienes cuenta con nosotros?<a id="a-show-login" class="text-link">&nbsp;Ingresa</a></small> </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById("aceptaTerminos-empresa").addEventListener("click", function(){if (document.getElementById("btn-submit-empresa").disabled) {document.getElementById("btn-submit-empresa").disabled = false;}else {document.getElementById("btn-submit-empresa").disabled = true;}});
    document.getElementById("aceptaTerminos-consumidor").addEventListener("click", function(){if (document.getElementById("btn-submit-consumidor").disabled) {document.getElementById("btn-submit-consumidor").disabled = false;}else {document.getElementById("btn-submit-consumidor").disabled = true;}});
    document.getElementById("btn-show-login").addEventListener("click", function(){document.getElementById("form-registrarme").classList.add("d-none");document.getElementById("form-login").classList.remove("d-none");});
    document.getElementById("a-show-login").addEventListener("click", function(){document.getElementById("form-registrarme").classList.add("d-none");document.getElementById("form-login").classList.remove("d-none");});
    document.getElementById("btn-show-register").addEventListener("click", function(){document.getElementById("form-login").classList.add("d-none");document.getElementById("form-registrarme").classList.remove("d-none");});
    document.getElementById("a-show-register").addEventListener("click", function(){document.getElementById("form-login").classList.add("d-none");document.getElementById("form-registrarme").classList.remove("d-none");});
    $("#toogle-collapse-navbar").click(function() {$('#navbarSupportedContent').collapse('toggle');});
</script>