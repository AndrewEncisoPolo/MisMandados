<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../resources/css/bootstrap.css">
    <script src="../resources/js/jquery-3.5.1.slim.min.js"></script>
    <script src="../resources/js/bootstrap.js"></script>
    <title>Recuperar Contraseña</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-red">
        <a class="navbar-brand" href="#" style="padding-left:0.5rem;">
            <img src="../resources/img/MisMandados.png" style="width: 215px;">
        </a>
    </nav>
    <div class="container" style="margin-top:20px;">
        <br>
        <div class="form-group">
            <h2>Recuperar contraseña</h2>
        </div>
        <div class="container" id="form-validar-usuario">
            <form class="validar-usuario-needs-validation" novalidate>
                <div class="row">
                    <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="form-group">
                            <div class="alert alert-info" role="alert">
                                <b>¡ Recuerda !</b><br>
                                <b>*</b> Primero validaremos que estas registrado. <br>
                                <b>*</b> Debes ingresar los datos requeridos para restablecer tu contraseña.
                            </div>
                        </div>
                    </div>
                    <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-12 col-lg-6">
                        <div class="form-group">
                            <label>Correo Electrónico</label>
                            <input id="email_validarUsuario" type="text" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" placeholder="Correo Electrónico" autocomplete="off" required>
                        </div>        
                    </div>  
                    <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-12 col-lg-6">
                        <div class="form-group">
                            <label>Teléfono Celular</label>
                            <input id="telefono_validarUsuario" type="text" class="form-control" pattern="[0-9]{7,10}" minlength="7" maxlength="10" onkeypress="isInputNumber(event)" autocomplete="off" placeholder="Teléfono Celular" required>
                        </div>        
                    </div>  
                    <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-top:1rem;">
                        <div class="form-group">
                            <button type="submit" class="btn btn-danger" style="width: 100%;">Validar Usuario</button>
                        </div>        
                    </div>
                    <div id="error-validar-usuario" class="col-xsm-12 col-xs-12 col-sm-12 col-md-12 col-lg-12" style="display:none;">
                        <div class="form-group">
                            <div class="alert alert-danger" role="alert">
                                <b>¡ Alerta !</b><br>
                                No hemos encontrado un usuario con los datos suministrados, por favor verifique e intente de nuevo.  <br>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="container" id="form-restablecer-contrasenna" style="display: none;">
            <div class="alert alert-success" role="alert">
                <b>Usuario validado correctamente</b><br>
                <b>*</b> Ingrese sus datos nuevamente e ingrese su nueva contraseña.
            </div>
            <form class="restablecer-contrasenna-needs-validation" novalidate>
                <div class="row">
                    <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-12 col-lg-6">
                        <div class="form-group">
                            <label>Correo Electrónico</label>
                            <input autocomplete="off" id="email_restablecer" type="text" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" placeholder="Correo Electrónico" required>
                        </div>        
                    </div>  
                    <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-12 col-lg-6">
                        <div class="form-group">
                            <label>Teléfono Celular</label>
                            <input autocomplete="off" id="telefono_restablecer" type="text" class="form-control" pattern="[0-9]{7,10}" minlength="7" maxlength="10" onkeypress="isInputNumber(event)" placeholder="Teléfono Celular" required>
                        </div>        
                    </div>
                    <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="form-group">
                            <label>Nueva Contraseña</label>
                            <input autocomplete="off" id="pass_restablecer" type="password" class="form-control" name="passRC" placeholder="Contraseña" required>
                            <input type="checkbox" onclick="vercontrasenna()"> Ver Contraseña
                        </div>        
                    </div>
                    <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="form-group">
                            <button type="submit" class="btn btn-danger" style="width: 100%;">Restablecer Contraseña</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="container" id="ok-registro" style="display:none;">
            <div class="row">
                <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group">
                    <div class="alert alert-success text-center" style="margin-bottom: 0rem;">
                        <h3 style="margin-bottom: 0px;">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-check2-circle" fill="currentColor" style="margin-bottom: 5px;">
                                <path fill-rule="evenodd" d="M15.354 2.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3-3a.5.5 0 1 1 .708-.708L8 9.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
                                <path fill-rule="evenodd" d="M8 2.5A5.5 5.5 0 1 0 13.5 8a.5.5 0 0 1 1 0 6.5 6.5 0 1 1-3.25-5.63.5.5 0 1 1-.5.865A5.472 5.472 0 0 0 8 2.5z"/>
                            </svg>
                            Se ha registrado su nueva contraseña
                        </h3>
                    </div>
                </div>
                <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group text-center">
                    Su contraseña ya se encuentra habilitada para iniciar sesión, por favor vuelva al Inicio e intente de nuevo. 
                </div>
                <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group text-center">
                    <a href="{{url('inicio')}}" class="btn btn-danger" style="width">Volver a Inicio</a> 
                </div>
            </div>
        </div>

        <div class="container" id="error-registro" style="display:none;">
            <div class="row">
                <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group">
                    <div class="alert alert-danger text-center">
                        <h3 style="margin-bottom: 0px;">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-exclamation-circle" fill="currentColor" style="margin-bottom: 5px;">
                                <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
                            </svg>
                            Ha ocurrido un error
                        </h3>
                    </div>
                </div>
                <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group text-center">
                    Ha ocurrido un error al momento de registrar la <b>nueva contraseña</b>, Por favor intenta de nuevo.
                </div>
                <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group text-center">
                    <a href="{{url('restablecer-contrasenna')}}" class="btn btn-danger" style="width">Volver a Inicio</a> 
                </div>
            </div>
        </div>
    </div>
  </body>
</html>

<script>
    function vercontrasenna() {
        var x = document.getElementById("pass_restablecer");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }

    function isInputNumber(evt){
        var ch = String.fromCharCode(evt.which);
        if(!(/[0-9]/.test(ch))){
            evt.preventDefault();
        }
    }

    (function() {'use strict';
      window.addEventListener('load', function() {
        var forms = document.getElementsByClassName('validar-usuario-needs-validation');
        var validation = Array.prototype.filter.call(forms, function(form) {
          form.addEventListener('submit', function(event) {
                event.preventDefault();
                event.stopPropagation();
            if (form.checkValidity() === false) {
                console.log("campos vacios");
                form.classList.add('was-validated');
            }else{
                var crear = 0;
                var _token = "{{csrf_token()}}";
                var correo = $("#email_validarUsuario").val();
                var telefono = $("#telefono_validarUsuario").val();
                if (!correo==""||!telefono==""){crear = 1;}
                if(crear==1){
                    $.ajax({
                    url:"{{route('obtener-nueva-contrasenna')}}",
                    method:"POST",
                    data:{Correo:correo,Telefono:telefono,_token:_token},
                    success:function(result)
                        {
                            if(result==1){
                                $("#id_nombre").val("");
                                document.getElementById("form-restablecer-contrasenna").style.display="block";
                                document.getElementById("form-validar-usuario").style.display="none";
                                form.classList.remove('was-validated');
                            }else{
                                document.getElementById("error-validar-usuario").style.display="block";
                            }
                        }
                    })
                }
            }
          }, false);
        });
      }, false);
    })();

    (function() {'use strict';
      window.addEventListener('load', function() {
        var forms = document.getElementsByClassName('restablecer-contrasenna-needs-validation');
        var validation = Array.prototype.filter.call(forms, function(form) {
          form.addEventListener('submit', function(event) {
                event.preventDefault();
                event.stopPropagation();
            if (form.checkValidity() === false) {
                console.log("campos vacios");
                form.classList.add('was-validated');
            }else{
                var crear = 0;
                var _token = "{{csrf_token()}}";
                var correo = $("#email_restablecer").val();
                var telefono = $("#telefono_restablecer").val();
                var contrasenna = $("#pass_restablecer").val();
                if (!correo==""||!telefono==""||!contrasenna==""){crear = 1;}
                if(crear==1){
                    $.ajax({
                    url:"{{route('obtener-nueva-contrasenna')}}",
                    method:"POST",
                    data:{Correo:correo,Telefono:telefono,Contrasenna:contrasenna,_token:_token},
                    success:function(result)
                        {
                            if(result==1){
                                document.getElementById("ok-registro").style.display="block";
                                document.getElementById("form-restablecer-contrasenna").style.display="none";
                                form.classList.remove('was-validated');
                            }else{
                                document.getElementById("error-registro").style.display="block";
                            }
                        }
                    })
                }
            }
          }, false);
        });
      }, false);
    })();

</script>
