<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <style>
        .bg-red{
            background-color: #df1616;
            color: white;
        }
    </style>
    <title>Recuperar Contraseña</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-red">
        <a class="navbar-brand" href="#">Navbar</a>

    <!--
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>


        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link text-white" href="{{url('inicio')}}">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{url('tienda')}}">Tienda</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Dropdown
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
            
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{url('contacto')}}">Nosotros</a>
                </li>
            </ul>
        </div>
        -->
    </nav>

    <div class="container" style="margin-top:70px;">
        <br>
        <div class="form-group">
            <h2>Recuperar contraseña</h2>
        </div>
        <div class="container" id="form-recuperar-contrasenna">
            <form action="javascript:;" onsubmit="recuperarContrasennaRequest(this)">
                <div class="row">
                    <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="form-group">
                            <div class="alert alert-info" role="alert">
                                <b>¡ Recuerda !</b><br>
                                Debes ingresar los datos requeridos para restablecer tu contraseña.
                            </div>
                        </div>        
                    </div> 
                    <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-12 col-lg-6">
                        <div class="form-group">
                            <label>Correo Electrónico</label>
                            <input id="emailRecuperarContrasenna" type="text" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" placeholder="Correo Electrónico" name="emailRecuperarContrasenna" required>
                        </div>        
                    </div>  
                    <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-12 col-lg-6">
                        <div class="form-group">
                            <label>Teléfono Celular</label>
                            <input id="telefonoRecuperarContrasenna" type="text" class="form-control" pattern="[0-9]{7,10}" minlength="7" maxlength="10" onkeypress="isInputNumber(event)" name="telefonoRecuperarContrasenna" placeholder="Teléfono Celular" required>
                        </div>        
                    </div>  
                    <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-top:1rem;">
                        <div class="form-group">
                            <button type="submit" class="btn btn-danger" style="width: 100%;">Recuperar</button>
                        </div>        
                    </div>    
                </div>
            </form>
        </div>

        <div class="container" id="form-contraseña-restablecida" style="display: none;">
            <div class="alert alert-info text-center">
                <h4>Tu contraseña es</h4><br>
                <h4 id="contrasennaRestablecida">3523532523</h4>
            </div>
            <div class="row">
                <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="form-group">
                        <a href="" class="btn btn-outline-danger" style="width: 100%;">Volver a Inicio</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="container" id="form-existe-cuenta" style="display: none;">
            <div class="alert alert-warning">
                <h4>Lo Sentimos</h4><br>
                No hemos encontrado coincidencias con los datos suministrados. 
                Verifica los datos e intenta de nuevo
            </div>
        </div>

    </div>
    
  </body>
</html>

<script>
    function isInputNumber(evt){
        var ch = String.fromCharCode(evt.which);
        if(!(/[0-9]/.test(ch))){
            evt.preventDefault();
        }
    }

    function recuperarContrasennaRequest(form){
        alert($("#emailRecuperarContrasenna").val());
        alert($("#telefonoRecuperarContrasenna").val());

        var _token = "{{csrf_token()}}";
    }

</script>
