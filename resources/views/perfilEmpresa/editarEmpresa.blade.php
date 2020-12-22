@extends('perfilEmpresa/Empresa')
@section('empresa_content')

<div class="container" style="margin-top:56px;">
        
    <div class="row" style="padding-top:1rem;">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group">
            <h3>Editar Datos</h3>
        </div>

        <div id="div-ok" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group" style="display:none;">
            <div class="alert alert-success">
                Se han actualizado los datos satisfactoriamente.
            </div>
        </div>

        <div id="div-error" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group" style="display:none;">
            <div class="alert alert-danger">
                Ocurrio un error, por favor verifique los datos e intente de nuevo.
            </div>
        </div>

        <div id="form-disenno-perfil" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group">
            <div class="card card-body shadow-sm">
                <form class="disenno-perfil-needs-validation" novalidate>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <h5 data-toggle="collapse" href="#collapseMarcaLogo" role="button" aria-expanded="false" aria-controls="collapseExample">
                                Perfil<a class="dropdown-toggle text-dark float-right"></a>
                            </h5>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="collapse" id="collapseMarcaLogo">  
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group">
                                        <label for="FileHolder">Previsualización</label>
                                    </div>    
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group">
                                        <div style="top:-80px;height: 20rem;">
                                            <div class="from-group text-center">
                                                <div class="shadow-sm" id="imgPortada" style="width:100%;margin:0 auto;background-size: cover;background-position: center;height: 25rem;border-bottom-left-radius: 1rem;border-bottom-right-radius: 1rem;">    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-md-12 col-md-12 col-lg-12 text-center">
                                            <div class="from-group">
                                                <div class="rounded-circle shadow-sm bg-white mb-4" id="imgPerfil" style="height:115px;width:115px;z-index: 100;margin-bottom: -2rem;margin:0 auto;background-size: contain;background-repeat: no-repeat;background-position: center;">    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 form-group">
                                        <div class="row">
                                            <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group">
                                                <label for="UpFilePortada">Imagen Portada</label>
            
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="UpFilePortada" accept="image/jpeg , image/jpg , image/png" class="form-control" onchange="encodeImageFileAsURLPortada(this)" lang="es">
                                                    <label class="custom-file-label" for="customFile">Elegir archivo</label>
                                                </div>
            
                                                <div id="mensajeAlertPortada" style="display: none;margin-top:1rem;">
                                                    <div class="alert" role="alert" style="border-radius: 0.25rem;color:#cc0e15;border: 1px solid #fca9ac;background-color: #fcd2d4;margin-bottom: 0px;">
                                                        Recuerde que <b>MAXIMO 1 Megabyte</b> por archivo
                                                    </div>
                                                </div>
                                                <input id="hidden_ImgPortada" type="hidden" required>
                                                <button id="btn-remove-portada" type="button" class="btn btn-outline-secondary btn-sm w-100 mt-2" style="display:none;"> Remover imagen de Portada</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 form-group">
                                        <div class="row">
                                            <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group">
                                                <label for="UpFilePerfil">Imagen Perfil</label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="UpFilePerfil" accept="image/jpeg , image/jpg , image/png" class="form-control" onchange="encodeImageFileAsURLPerfil(this)" lang="es">
                                                    <label class="custom-file-label" for="customFile">Elegir archivo</label>
                                                </div>
                                                <div id="mensajeAlertPerfil" style="display: none;margin-top:1rem;">
                                                    <div class="alert alert-danger" role="alert">
                                                        Recuerde que <b>MAXIMO 1 Megabyte</b> por archivo
                                                    </div>
                                                </div>
                                                <input id="hidden_ImgPerfil" type="hidden" required>
                                                <button id="btn-remove-perfil" type="button" class="btn btn-outline-secondary btn-sm w-100 mt-2" style="display:none;"> Remover imagen de Perfil</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <button id="btn-siguiente-datos-personales" type="submit" class="btn btn-primary float-right">Guardar</button>
                                    </div>
                                </div>
                            </div>
                        </div>  
                    </div>   
                </form>
            </div>
        </div>                

        <div id="form-datos-personales" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group">
            <div class="card card-body shadow-sm">
                <form class="datos-personales-consumidor-needs-validation" novalidate>

                        <div class="row">
                            
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <h5 data-toggle="collapse" href="#collapseDatosBasicos" role="button" aria-expanded="false" aria-controls="collapseExample">
                                    Datos Basicos<a class="dropdown-toggle text-dark float-right"></a>
                                </h5>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <div class="collapse" id="collapseDatosBasicos"> 
                                    <div class="row">

                                        @foreach ($data_info_basica as $item_basica)
                                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 form-group">
                                                <label for="id_razonsocial">Razon Social</label>
                                                <input id="id_razonsocial" value="{{$item_basica->RazonSocial}}" class="form-control" type="text" required>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 form-group">
                                                <label for="id_tipoempresa">Tipo de Empresa</label>
                                                <select id="id_tipoempresa" class="form-control" required>
                                                    @foreach ($data_tipocomercio as $item)
                                                        @if ($item_basica->IDTipoComercio == $item->IDTipoComercio)
                                                            <option value="{{$item->IDTipoComercio}}" selected>{{$item->Nombre}}</option>
                                                        @else
                                                            <option value="{{$item->IDTipoComercio}}">{{$item->Nombre}}</option>                                                        
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                        @endforeach

                                        @foreach ($data_info as $item_info)
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group">
                                                <label for="id_descripcion">Descripción de la Empresa</label>
                                                <textarea id="id_descripcion" class="form-control" value="{{$item_info->Biografia}}" required>{{$item_info->Biografia}}</textarea>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 form-group">
                                                <label for="id_abre">¿A qué hora en que abre su empresa?</label>
                                                <input id="id_abre" class="form-control" type="time" value="{{$item_info->HoraAbierto}}" required>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 form-group">
                                                <label for="id_cierre">¿A qué hora en que cierra su empresa?</label>
                                                <input id="id_cierre" class="form-control" type="time" value="{{$item_info->HoraCerrado}}" required>
                                            </div>
                                        @endforeach
                                        
                
                                        @foreach ($data_info_basica as $item_basica)
                                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 form-group">
                                                <label for="id_tipodocumento">Tipo de Documento</label>
                                                <select id="id_tipodocumento" class="form-control" required>
                                                    <option value="">Seleccionar</option>
                                                    @foreach ($data_tipodocumento as $item)
                                                        <option value="{{$item->IDTipoDocumento}}" selected>{{$item->Nombre}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 form-group">
                                                <label for="id_nrodocumento">Numero de Documento</label>
                                                <input id="id_nrodocumento" class="form-control" type="text" value="{{$item_basica->Documento}}" required>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 form-group">
                                                <label for="id_telefono">Telefono</label>
                                                <input id="id_telefono" class="form-control" type="text" value="{{$item_basica->Telefono}}" required>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 form-group">
                                                <label for="id_telefonocelular">Telefono Celular</label>
                                                <input id="id_telefonocelular" class="form-control" type="text" value="{{$item_basica->TelefonoCelular}}" required>
                                            </div>
                                        @endforeach

                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <button type="submit" id="btn-siguiente-datos-personales" class="btn btn-primary float-right">Guardar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                </form>
            </div>
        </div>

        <div id="form-ubicacion" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group">
            <div class="card card-body shadow-sm">
                <form class="ubicacion-consumidor-needs-validation" novalidate>
                    @foreach ($data_ubicacion as $item_ubicacion)
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <h5 id="a-ubicacion" data-toggle="collapse" href="#collapseUbicacion" role="button" aria-expanded="false" aria-controls="collapseExample">
                                Ubicación<a class="dropdown-toggle text-dark float-right"></a>
                            </h5>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="collapse" id="collapseUbicacion">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 form-group">
                                        <label for="id_departamento">Departamento</label>
                                        <select class="form-control" id="id_departamento" required>
                                            <option value="">Seleccionar</option>
                                            @foreach ($data_departamento as $item)
                                                @if ($item_ubicacion->IDDepartamento == $item->IDDepartamento)
                                                    <option value="{{$item->IDDepartamento}}" selected>{{$item->Nombre}}</option>
                                                @else
                                                    <option value="{{$item->IDDepartamento}}">{{$item->Nombre}}</option>                                                        
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 form-group">
                                        <label for="id_ciudad">Ciudad</label>
                                        <select class="form-control" id="id_ciudad" required>
                                            @foreach ($data_ciudad as $item)
                                                @if ($item_ubicacion->IDCiudad == $item->IDCiudad)
                                                    <option value="{{$item->IDCiudad}}" selected>{{$item->Nombre}}</option>
                                                @else
                                                    <option value="{{$item->IDCiudad}}">{{$item->Nombre}}</option>                                                        
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 form-group">
                                        <label for="id_localidad">Localidad</label>
                                        <select class="form-control" id="id_localidad" required>
                                            @foreach ($data_localidad as $item)
                                                @if ($item_ubicacion->IDLocalidad == $item->IDLocalidad)
                                                    <option value="{{$item->IDLocalidad}}" selected>{{$item->Nombre}}</option>
                                                @else
                                                    <option value="{{$item->IDLocalidad}}">{{$item->Nombre}}</option>                                                        
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 form-group">
                                        <label for="id_barrio">Barrio</label>
                                        <select class="form-control" id="id_barrio" required>
                                            @foreach ($data_barrio as $item)
                                                @if ($item_ubicacion->IDBarrio == $item->IDBarrio)
                                                    <option value="{{$item->IDBarrio}}" selected>{{$item->Nombre}}</option>
                                                @else
                                                    <option value="{{$item->IDBarrio}}">{{$item->Nombre}}</option>                                                        
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group">
                                        <label for="id_direccion">Dirección</label>
                                        <input id="id_direccion" class="form-control" type="text" value="{{$item_ubicacion->Direccion}}" required>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <button id="btn-siguiente-ubicacion" type="submit" class="btn btn-primary float-right">Guardar</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    @endforeach
                </form>
            </div>
        </div>
    </div>
</div> 


<script>
    function encodeImageFileAsURLPortada(e) {
        var t = e.files[0],
            n = new FileReader();
        t.size < 15e5
            ? ((n.onloadend = function () {
                n.result.length, document.getElementById("div");
                var e = document.getElementById("imgPortada").hasAttribute("src");
                1 == e
                    ? (document.getElementById("mensajeAlertPortada").style.display = "block")
                    : 0 == e &&
                        (document.getElementById("UpFilePortada").setAttribute("disabled", ""),
                        document.getElementById("hidden_ImgPortada").setAttribute("value", n.result),
                        document.getElementById("imgPortada").style.backgroundImage = "url('" + n.result + "')",
                        document.getElementById("btn-remove-portada").style.display = "block",
                        (document.getElementById("mensajeAlertPortada").style.display = "none"));
            }),
            n.readAsDataURL(t))
            : (document.getElementById("mensajeAlertPortada").style.display = "block");
    }

    $( "#btn-remove-portada" ).click(function() {
        document.getElementById("UpFilePortada").removeAttribute("disabled");
        document.getElementById("hidden_ImgPortada").removeAttribute("value");
        document.getElementById("imgPortada").style.backgroundImage = ""; 
        document.getElementById("btn-remove-portada").style.display = 'none';
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
                var _token = "{{csrf_token()}}";
                var ImgPerfil = $("#hidden_ImgPerfil").val();
                var ImgPortada = $("#hidden_ImgPortada").val();

                if (!ImgPerfil==""||!ImgPortada==""){crear = 1;}

                if(crear==1){
                    $.ajax({
                    url:"{{route('crear-imagenes-perfil-empresa')}}",
                    method:"POST",
                    data:{ImgPerfil:ImgPerfil,ImgPortada:ImgPortada,_token:_token},
                    success:function(result)
                        {
                            if(result==1){
                                document.getElementById("div-ok").style.display="block";
                                document.getElementById("div-error").style.display="none";
                                form.classList.remove('was-validated');
                            }else{
                                document.getElementById("div-ok").style.display="none";
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

                var razonsocial = $("#id_razonsocial").val();
                var tipoempresa = $("#id_tipoempresa").val();
                var descripcion = $("#id_descripcion").val();
                var abre = $("#id_abre").val();
                var cierre = $("#id_cierre").val();

                if (!idtipodocumento==""||!nrodocumento==""||!nrodocumento==""||!telefonocelular==""||razonsocial==""||tipoempresa==""||descripcion==""||abre==""||cierre==""){crear = 1;}

                if(crear==1){
                    $.ajax({
                    url:"{{route('crear-datos-basicos-empresa')}}",
                    method:"POST",
                    data:{RazonSocial:razonsocial,TipoEmpresa:tipoempresa,Descripcion:descripcion,HoraAbre:abre,HoraCierre:cierre,IDTipoDocumento:idtipodocumento,Documento:nrodocumento,Telefono:telefono,TelefonoCelular:telefonocelular,_token:_token},
                    success:function(result)
                        {
                            if(result==1){
                                document.getElementById("div-ok").style.display="block";
                                document.getElementById("div-error").style.display="none";
                                form.classList.remove('was-validated');
                            }else{
                                document.getElementById("div-ok").style.display="none";
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
                    url:"{{route('crear-ubicacion-empresa')}}",
                    method:"POST",
                    data:{IDDepartamento:iddepartamento,IDCiudad:idciudad,IDLocalidad:idlocalidad,IDBarrio:idbarrio,Direccion:dirrecion,_token:_token},
                    success:function(result)
                        {
                            if(result==1){
                                document.getElementById("div-ok").style.display="block";
                                document.getElementById("div-error").style.display="none";
                                form.classList.remove('was-validated');
                            }else{
                                document.getElementById("div-ok").style.display="none";
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

<script>
    mapboxgl.accessToken = 'pk.eyJ1IjoiYW5kcmV5ZW5jaXNvIiwiYSI6ImNraHRha2EwZTEwOWEyeG1qajJ5aHZkbzkifQ.VzXE5BeIroJXKKcvMndX2A';
    var map = new mapboxgl.Map({container: 'map',style: 'mapbox://styles/mapbox/streets-v11',center: [-74.2478956, 4.6486259],zoom: 5});
    map.addControl(new MapboxGeocoder({accessToken: mapboxgl.accessToken}));
    map.addControl(new mapboxgl.NavigationControl());
    map.addControl(new mapboxgl.FullscreenControl());
    $(document).ready(function() {$('#a-ubicacion').on('click', function() {getLocation();});});
    function showLocation(position) {
        document.getElementById("map-location-longitude").value = position.coords.longitude;
        document.getElementById("map-location-latitude").value = position.coords.latitude;
        var marker = new mapboxgl.Marker().setLngLat([position.coords.longitude, position.coords.latitude]).addTo(map);
        map.flyTo({center: [position.coords.longitude, position.coords.latitude],zoom: 15,bearing: 0,speed: 1.8,curve: 1,easing: function (t) {return t;},essential: true});
        document.getElementById("btn-siguiente-ubicacion").disabled = false;
    }
    function errorHandler(err) {if(err.code == 1) {alert("Error: Access is denied!");} else if( err.code == 2){alert("Error: Position is unavailable!");}}
    function getLocation() {if(navigator.geolocation) {var options = {timeout:60000};navigator.geolocation.getCurrentPosition(showLocation, errorHandler, options);}}

// Agregar Marcadores de sitios cerca 
// var marker = new mapboxgl.Marker().setLngLat([lng, lat]).setPopup(new mapboxgl.Popup().setHTML("<h1>Hello World!</h1>")).addTo(map);
</script>
@endsection
