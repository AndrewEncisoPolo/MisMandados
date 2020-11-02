<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../resources/css/bootstrap.css">
    <script src="../resources/js/jquery-3.5.1.slim.min.js"></script>
    <script src="../resources/js/bootstrap.js"></script>
    <title>Mis Mandados</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-red fixed-top">
        <a class="navbar-brand" href="#" style="padding-left:0.5rem;">
        <img src="../resources/img/MisMandados.png" style="width: 215px;">
        </a>
        <button id="toogle-collapse-navbar" class="navbar-toggler" type="button"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link text-white" href="{{url('inicio')}}">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{url('tienda')}}">Tienda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{url('contacto')}}">Nosotros</a>
                </li>
            </ul>
            <div class="form-inline my-2 my-lg-0">
                <button class="btn btn-outline-light my-2 my-sm-0" data-toggle="modal" data-target="#modal-registrar-empresa">Registrar Empresa</button>&nbsp;
                <button class="btn btn-outline-light my-2 my-sm-0" data-toggle="modal" data-target="#modal-iniciar-sesion">Iniciar Sesión</button>
            </div>
        </div>
    </nav>
    <div>@yield('main_content')</div> 
    <footer class="page-footer font-small bg-red">
      <br>
      <div>
        <img src="../resources/img/fotter-compressed.jpg" style="width: 100%;padding-bottom:1.25rem;">
      </div>
        <div class="container text-center text-md-left">
          <div class="row">
            <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-12 col-lg-6 form-group">
              <h5>Correos de contacto</h5>
              <ul class="list-unstyled">
                  <li>
                  <a class="text-white">mandadosdados@gmail.com</a>
                  </li>
                  <li>
                  <a class="text-white">clientes@mismandados.com.co</a>
                  </li>
              </ul>
            </div>
            <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-12 col-lg-6 form-group">
              <h5>Datos de Contacto</h5>
              <ul class="list-unstyled">
                  <li>
                  <a class="text-white">Bogotá - Colombia</a>
                  </li>
              </ul>
              <h5>Numero de Contacto</h5>
              <ul class="list-unstyled">
                  <li>
                  <a class="text-white">*57 315 500 0014</a>
                  </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="footer-copyright text-center py-3">© 2020 Todos los derechos reservados - <b>Mis Mandados</b></div>
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
            <h5>Información de la Empresa</h5>
            <div class="row" style="padding-left:1rem;padding-right:1rem;">
              <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="form-group">
                  <label>Nombre de la Empresa</label>
                  <input type="text" class="form-control" placeholder="Nombre Empresa" name="nombreEmpresa" required>
                </div>
              </div>
            </div>
            <h5>Información de Contacto</h5>
            <div class="row" style="padding-left:1rem;padding-right:1rem;">
              <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-12 col-lg-6">
                <div class="form-group">
                  <label>Nombre</label>
                  <input type="text" class="form-control" placeholder="Nombre" name="nombreEmpresaContacto" required>
                </div>
              </div>
              <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-12 col-lg-6">
                <div class="form-group">
                  <label>Apellido</label>
                  <input type="text" class="form-control" placeholder="Apellido" name="apellidoEmpresaContacto" required>
                </div>
              </div>
              <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="form-group">
                  <label>Correo</label>
                  <input type="text" class="form-control" placeholder="Correo" name="correoEmpresa" required>
                </div>
              </div>
              <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="form-group">
                  <label>Contraseña</label>
                  <input type="password" class="form-control" placeholder="Contraseña" name="contrasennaEmpresa" required>
                </div>
              </div>
              <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="form-group">
                  <input type="checkbox" name="aceptaTerminosDeUso" required> 
                  Acepto Terminos y condiciones de uso
                </div>
              </div>
              <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}"></input>
                  <button class="btn btn-danger" style="width: 100%;" type="submit">Registrarme</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
</div>

<!-- Modal Iniciar Sesiòn-->
<div class="modal fade" id="modal-iniciar-sesion" tabindex="-1" aria-labelledby="modal-iniciar-sesion" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body">

          <div id="form-login" style="width: 100%;height: 100%;">
            <div class="form-group">
              <h2>Iniciar Sesión
                <button onclick="showRegister()" class="btn btn-outline-danger float-right">Registrarme</button>
              </h2>
            </div>
            <form action="{{url('login')}}" method="post">
              <div class="row" style="padding-left:1rem;padding-right:1rem;">
                <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                  <div class="form-group">
                    <label>Correo Eletrónico</label>
                    <input type="text" class="form-control" placeholder="Correo Eletrónico" name="Email" required>
                  </div>
                </div>
                <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                  <div class="form-group">
                    <label>Contraseña</label>
                    <input type="password" class="form-control" placeholder="Contraseña" name="Contrasenna" required>
                  </div>
                </div>
                <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                  <div class="form-group">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}"></input>
                    <button class="btn btn-danger" style="width: 100%;" type="submit">Iniciar Sesión</button>
                  </div>
                </div>
                <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
                  <div class="form-group">
                    <small><a class="text-link" href="{{url('restablecer-contrasenna')}}">Olvide mi contraseña</a></small>
                  </div>
                </div>
                <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
                  <small>¿Todavía no tienes una cuenta?<a class="text-link" onclick="showRegister()">&nbsp;Registrate</a></small>
                </div>
              </div>
            </form>
          </div>

          <div id="form-registrarme" style="width: 100%;height: 100%;display:none;">
            <div class="form-group">
              <h2>Registrarme
                <button onclick="showLogIn()" class="btn btn-outline-danger float-right">Iniciar Sesión</button>
              </h2>
            </div>
            <form action="{{url('registrarUsuario')}}" method="post">
              <div class="row" style="padding-left:1rem;padding-right:1rem;">
                <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-12 col-lg-6">
                  <div class="form-group">
                    <label>Nombre</label>
                    <input type="text" class="form-control" placeholder="Nombre" name="nombreUsuario" required>
                  </div>
                </div>
                <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-12 col-lg-6">
                  <div class="form-group">
                    <label>Apellido</label>
                    <input type="text" class="form-control" placeholder="Apellido" name="apellidoUsuario" required>
                  </div>
                </div>
                <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                  <div class="form-group">
                    <label>Correo Eletrónico</label>
                    <input type="text" class="form-control" placeholder="Correo Eletrónico" name="correoUsuario" required>
                  </div>
                </div>
                <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                  <div class="form-group">
                    <label>Contraseña</label>
                    <input type="password" class="form-control" placeholder="Contraseña" name="contrasennaUsuario" required>
                  </div>
                </div>
                <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                  <div class="form-group">
                    <input type="checkbox" name="aceptaTerminosDeUso" required> 
                    Acepto Terminos y condiciones de uso
                  </div>
                </div>
                <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                  <div class="form-group">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}"></input>
                    <button class="btn btn-danger" style="width: 100%;" type="submit">Registrarme</button>
                  </div>
                </div>
                <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
                  <small>¿Ya tienes cuenta con nosotros?<a class="text-link" onclick="showLogIn()">&nbsp;Ingresa</a></small>
                </div>
              </div>
            </form>
          </div>

        </div>
      </div>
    </div>
</div>

<script>
  function showLogIn() {document.getElementById("form-login").style.display = "block";document.getElementById("form-registrarme").style.display = "none";}function showRegister() {document.getElementById("form-login").style.display = "none";document.getElementById("form-registrarme").style.display = "block";}$("#toogle-collapse-navbar").click(function() {$('#navbarSupportedContent').collapse('toggle');});
</script>
