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
        </nav>
        <div class="container"  style="margin-top:56px;">
        
            <div class="row" style="padding-top:1rem;">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group">
                    @foreach ($nombre as $item)
                        <h1>{{$item->Nombre}}</h1>
                    @endforeach
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group">
                    <div class="progress">
                        <div id="progress-bar" class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
                <div id="div-error" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group" style="display:none;">
                    <div class="alert alert-danger">
                        Ocurrio un error, por favor verifique los datos e intente de nuevo.
                    </div>
                </div>

                <div id="form-datos-personales" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group">
                    <form class="datos-personales-consumidor-needs-validation" novalidate>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group">
                                <h4>Datos Adicionales</h4>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group">
                                <div class="alert alert-info">
                                    Los datos requeridos aquí son requeridos al momento de registrarse para complementar tus datos personales basicos.
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 form-group">
                                <label for="id_tipodocumento">Tipo de Documento</label>
                                <select id="id_tipodocumento" class="form-control" required>
                                    <option value="">Seleccionar</option>
                                    @foreach ($data_tipodocumento as $item)
                                        <option value="{{$item->IDTipoDocumento}}">{{$item->Nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 form-group">
                                <label for="id_nrodocumento">Numero de Documento</label>
                                <input id="id_nrodocumento" class="form-control" type="text" required>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 form-group">
                                <label for="id_telefono">Telefono</label>
                                <input id="id_telefono" class="form-control" type="text" required>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 form-group">
                                <label for="id_telefonocelular">Telefono Celular</label>
                                <input id="id_telefonocelular" class="form-control" type="text" required>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group">
                                <button type="submit" id="btn-siguiente-datos-personales" class="btn btn-danger float-right">Siguiente</button>
                            </div>
                        </div>
                    </form>
                </div>

                <div id="form-ubicacion" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group" style="display:none;">
                    <form class="ubicacion-consumidor-needs-validation" novalidate>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group">
                                <h4>Ubicación</h4>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group">
                                <div class="alert alert-info">
                                    Los datos requeridos aquí son requeridos al momento de registrarse para complementar tus datos de ubicación.
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 form-group">
                                <label for="id_departamento">Departamento</label>
                                <select class="form-control" id="id_departamento" required>
                                    <option value="">Seleccionar</option>
                                    @foreach ($data_departamento as $item)
                                        <option value="{{$item->IDDepartamento}}">{{$item->Nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 form-group">
                                <label for="id_ciudad">Ciudad</label>
                                <select class="form-control" id="id_ciudad" required>
                                    <option value="">Seleccionar</option>
                                </select>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 form-group">
                                <label for="id_localidad">Localidad</label>
                                <select class="form-control" id="id_localidad" required>
                                    <option value="">Seleccionar</option>
                                </select>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 form-group">
                                <label for="id_barrio">Barrio</label>
                                <select class="form-control" id="id_barrio" required>
                                    <option value="">Seleccionar</option>
                                </select>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group">
                                <label for="id_direccion">Dirección</label>
                                <input id="id_direccion" class="form-control" type="text" required>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group">
                                <button id="btn-siguiente-ubicacion" type="submit" class="btn btn-danger float-right">Finalizar</button>
                            </div>
                        </div>
                    </form>
                </div>

                <div id="form-final" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group" style="display:none;">
                    <form class="ubicacion-consumidor-needs-validation" novalidate>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group">
                                <div class="alert alert-success">
                                    <h4>Perfecto</h4>
                                    Los datos solicitados anteriormente son muy importantes para nosotros y para los comercios con los que tendrás contacto.
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group text-center">
                                <a href="{{url('perfil-consumidor')}}" id="btn-siguiente-ubicacion" type="submit" class="btn btn-danger">Ingresar al Perfil Principal</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            
        </div> 
    </body>
</html>


<script>
    $( "#id_departamento" ).change(function() {
        $('#id_ciudad').empty();
        var iddepartamento = $("#id_departamento").val();
        var _token = "{{csrf_token()}}";
        $.ajax({
            url:"{{route('get-ciudad-iddepartamento')}}",
            method:"POST",
            data:{iddepartamento:iddepartamento, _token:_token},
            success:function(result)
            {
                var option = "<option value=''>Seleccionar</option>";
                $.each(JSON.parse(result), function(i, item) {
                    option += "<option value='"+item.IDCiudad+"'>"+item.Nombre+"</option>";
                });
                $("#id_ciudad").append(option);
            }
        })
    });

    $( "#id_ciudad" ).change(function() {
        $('#id_localidad').empty();
        var idciudad = $("#id_ciudad").val();
        var _token = "{{csrf_token()}}";
        $.ajax({
            url:"{{route('get-localidad-idciudad')}}",
            method:"POST",
            data:{idciudad:idciudad, _token:_token},
            success:function(result)
            {
                var option = "<option value=''>Seleccionar</option>";
                $.each(JSON.parse(result), function(i, item) {
                    option += "<option value='"+item.IDLocalidad+"'>"+item.Nombre+"</option>";
                });
                $("#id_localidad").append(option);
            }
        })
    });

    $( "#id_localidad" ).change(function() {
        $('#id_barrio').empty();
        var idlocalidad = $("#id_localidad").val();
        var _token = "{{csrf_token()}}";
        $.ajax({
            url:"{{route('get-barrio-idlocalidad')}}",
            method:"POST",
            data:{idlocalidad:idlocalidad, _token:_token},
            success:function(result)
            {
                var option = "<option value=''>Seleccionar</option>";
                $.each(JSON.parse(result), function(i, item) {
                    option += "<option value='"+item.IDBarrio+"'>"+item.Nombre+"</option>";
                });
                $("#id_barrio").append(option);
            }
        })
    });
    
    (function() {'use strict';
      window.addEventListener('load', function() {
        var forms = document.getElementsByClassName('datos-personales-consumidor-needs-validation');
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

                var idtipodocumento = $("#id_tipodocumento").val();
                var nrodocumento = $("#id_nrodocumento").val();
                var telefono = $("#id_telefono").val();
                var telefonocelular = $("#id_telefonocelular").val();

                if (!idtipodocumento==""||!nrodocumento==""||!nrodocumento==""||!telefonocelular==""){crear = 1;}

                if(crear==1){
                    $.ajax({
                    url:"{{route('crear-datos-basicos-consumidor')}}",
                    method:"POST",
                    data:{IDTipoDocumento:idtipodocumento,Documento:nrodocumento,Telefono:telefono,TelefonoCelular:telefonocelular,_token:_token},
                    success:function(result)
                        {
                            if(result==1){
                                $("#id_tipodocumento").val("");
                                $("#id_nrodocumento").val("");
                                $("#telefono").val("");
                                $("#telefonocelular").val("");

                                document.getElementById("form-ubicacion").style.display="block";
                                document.getElementById("form-final").style.display="none";
                                document.getElementById("form-datos-personales").style.display="none";
                                document.getElementById("div-error").style.display="none";

                                form.classList.remove('was-validated');
                                $("#progress-bar").css("width", "50%").attr("aria-valuenow", 50).text(50 + "% Completado");
                            }else{
                                document.getElementById("div-error").style.display="block";
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
        var forms = document.getElementsByClassName('ubicacion-consumidor-needs-validation');
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

                var iddepartamento = $("#id_departamento").val();
                var idciudad = $("#id_ciudad").val();
                var idlocalidad = $("#id_localidad").val();
                var idbarrio = $("#id_barrio").val();
                var dirrecion = $("#id_direccion").val();

                if (!iddepartamento==""||!idciudad==""||!idlocalidad==""||!idbarrio==""||!dirrecion==""){crear = 1;}

                if(crear==1){
                    $.ajax({
                    url:"{{route('crear-ubicacion-consumidor')}}",
                    method:"POST",
                    data:{IDDepartamento:iddepartamento,IDCiudad:idciudad,IDLocalidad:idlocalidad,IDBarrio:idbarrio,Direccion:dirrecion,_token:_token},
                    success:function(result)
                        {
                            if(result==1){
                                $("#id_departamento").val("");
                                $("#id_ciudad").val("");
                                $("#id_localidad").val("");
                                $("#id_barrio").val("");
                                $("#id_direccion").val("");
                                
                                document.getElementById("form-final").style.display="block";
                                document.getElementById("form-datos-personales").style.display="none";
                                document.getElementById("form-ubicacion").style.display="none";
                                document.getElementById("div-error").style.display="none";

                                form.classList.remove('was-validated');
                                $("#progress-bar").css("width", "100%").attr("aria-valuenow", 100).text(100 + "% Completado");
                            }else{
                                document.getElementById("div-error").style.display="block";
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