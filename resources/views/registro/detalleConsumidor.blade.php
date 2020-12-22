<!doctype html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Mis Mandados</title>

        <link rel="stylesheet" href="../resources/css/siorco.css" type='text/css'>
        <script src="../resources/js/jquery-3.5.1.slim.min.js"></script>
        <script src="../resources/js/bootstrap.js"></script>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-nav-soc fixed-top shadow-sm py-0">
            <a class="navbar-brand px-1 bg-white"><img height="46px" src="../resources/img/LOGO_Soc.png"></a>
        </nav>
        <div class="container"  style="margin-top:56px;">
            <div class="row pt-3">
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

                <div id="form-disenno-perfil" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group">
                    <form class="disenno-perfil-needs-validation" novalidate>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group">
                                <h4>Previsualización imagen de Perfil</h4>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group">
                                <div class="alert alert-info">
                                    Los datos requeridos aquí son necesarrios al momento de registrarse para complementar tus datos personales basicos del consumidor.
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group">
                                <label for="FileHolder">Previsualización<span class="text-danger">*</span></label>
                            </div>    

                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group">
                                <div class="col-xs-12 col-md-12 col-md-12 col-lg-12 text-center">
                                    <div class="from-group">
                                        <div class="rounded-circle shadow-sm bg-white mb-4" id="imgPerfil" style="height:115px;width:115px;z-index: 100;margin-bottom: -2rem;margin:0 auto;background-size: contain;background-repeat: no-repeat;background-position: center;">    
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group">
                                <div class="row">
                                    <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group">
                                        <label for="UpFilePerfil">Imagen Perfil<span class="text-danger">*</span></label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="UpFilePerfil" accept="image/jpeg , image/jpg , image/png" class="form-control" onchange="encodeImageFileAsURLPerfil(this)" lang="es">
                                            <label class="custom-file-label" for="customFile">Elegir archivo<span class="text-danger">*</span></label>
                                        </div>
                                        <div id="mensajeAlertPerfil" style="display: none;margin-top:1rem;">
                                            <div class="alert" role="alert" style="border-radius: 0.25rem;color:#cc0e15;border: 1px solid #fca9ac;background-color: #fcd2d4;margin-bottom: 0px;">
                                                Recuerde que <b>MAXIMO 1 Megabyte</b> por archivo
                                            </div>
                                        </div>
                                        <input id="hidden_ImgPerfil" type="hidden" required>
                                        <button id="btn-remove-perfil" type="button" class="btn btn-outline-secondary btn-sm w-100 mt-2" style="display:none;"> Remover imagen de Perfil</button>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 form-group">
                                <button type="button" id="btn-omitir-datos-personales" class="btn btn-outline-primary float-left w-100">No tengo fotos de mi negocio, Omitir</button>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 form-group">
                                <button type="submit" id="btn-siguiente-datos-personales" class="btn btn-primary float-right w-100">Siguiente</button>
                            </div>
                        </div>   
                    </form>
                </div>

                <div id="form-datos-personales" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group" style="display:none;">
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
                                <input id="id_nrodocumento" class="form-control" onkeypress="isInputNumber(event)" maxlength="10" type="text" required>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 form-group">
                                <label for="id_telefono">Telefono</label>
                                <input id="id_telefono" class="form-control" onkeypress="isInputNumber(event)" maxlength="8" type="text" required>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 form-group">
                                <label for="id_telefonocelular">Telefono Celular</label>
                                <input id="id_telefonocelular" class="form-control" onkeypress="isInputNumber(event)" maxlength="10" type="text" required>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group">
                                <button type="submit" id="btn-siguiente-datos-personales" class="btn btn-primary float-right">Siguiente</button>
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
                                <button id="btn-siguiente-ubicacion" type="submit" class="btn btn-primary float-right">Finalizar</button>
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
                                <a href="{{url('perfil-consumidor')}}" id="btn-siguiente-ubicacion" type="submit" class="btn btn-primary">Ingresar al Perfil Principal</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            
        </div> 
    </body>
</html>

<script>
    function isInputNumber(evt) {
        let ch = String.fromCharCode(evt.which);
        if (!(/[0-9]/.test(ch))) {
            evt.preventDefault();
        }
    }

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
    
    function encodeImageFileAsURLPerfil(e) {
        var t = e.files[0],
            n = new FileReader();
        t.size < 15e5
            ? ((n.onloadend = function () {
                n.result.length, document.getElementById("div");
                var e = document.getElementById("imgPerfil").hasAttribute("src");
                1 == e
                    ? (document.getElementById("mensajeAlertPerfil").style.display = "block")
                    : 0 == e &&
                        (document.getElementById("UpFilePerfil").setAttribute("disabled", ""),
                        document.getElementById("hidden_ImgPerfil").setAttribute("value", n.result),
                        document.getElementById("imgPerfil").style.backgroundImage = "url('" + n.result + "')",
                        document.getElementById("btn-remove-perfil").style.display = "block",
                        (document.getElementById("mensajeAlertPerfil").style.display = "none"));
            }),
            n.readAsDataURL(t))
            : (document.getElementById("mensajeAlertPerfil").style.display = "block");
    }

    $( "#btn-remove-perfil" ).click(function() {
        document.getElementById("UpFilePerfil").removeAttribute("disabled");
        document.getElementById("hidden_ImgPerfil").removeAttribute("value");
        document.getElementById("imgPerfil").style.backgroundImage = "";
        document.getElementById("btn-remove-perfil").style.display = 'none';
    });

    $( "#btn-omitir-datos-personales" ).click(function() {
        document.getElementById("form-disenno-perfil").style.display="none";
        document.getElementById("form-datos-personales").style.display="block";
        document.getElementById("form-ubicacion").style.display="none";
        document.getElementById("form-final").style.display="none";
        document.getElementById("div-error").style.display="none";
        $("#progress-bar").css("width", "33%").attr("aria-valuenow", 33).text(33 + "% Completado");
    });

    (function() {'use strict';
      window.addEventListener('load', function() {
        var forms = document.getElementsByClassName('disenno-perfil-needs-validation');
        var validation = Array.prototype.filter.call(forms, function(form) {
          
          form.addEventListener('submit', function(event) {
                event.preventDefault();
                event.stopPropagation();
            if (form.checkValidity() === false) {
                console.log("campos vacios");
                form.classList.add('was-validated');
            }else{
                var crear = 0;
                var ImgPerfil = $("#hidden_ImgPerfil").val();
                if (!ImgPerfil==""){crear = 1;}

                if(crear==1){
                    $.ajax({
                    url:"{{route('crear-imagenes-perfil-usuario')}}",
                    method:"POST",
                    data:{ImgPerfil:ImgPerfil,_token:"{{csrf_token()}}"},
                    success:function(result)
                        {
                            if(result==1){
                                document.getElementById("UpFilePerfil").removeAttribute("disabled");
                                document.getElementById("hidden_ImgPerfil").removeAttribute("value");
                                document.getElementById("imgPerfil").style.backgroundImage = "";

                                document.getElementById("form-disenno-perfil").style.display="none";
                                document.getElementById("form-datos-personales").style.display="block";
                                document.getElementById("form-ubicacion").style.display="none";
                                document.getElementById("form-final").style.display="none";
                                document.getElementById("div-error").style.display="none";

                                form.classList.remove('was-validated');
                                $("#progress-bar").css("width", "33%").attr("aria-valuenow", 33).text(33 + "% Completado");
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
                                $("#progress-bar").css("width", "33%").attr("aria-valuenow", 50).text(50 + "% Completado");
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