@extends('perfilConsumidor/Consumidor')
@section('consumidor_content')

<div class="container"  style="margin-top:56px;">
    <div class="row pt-3">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group">
            <h3>Editar Datos</h3>
        </div>
        <div id="div-error" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group" style="display:none;">
            <div class="alert alert-danger">
                Ocurrio un error, por favor verifique los datos e intente de nuevo.
            </div>
        </div>
        <div id="div-ok" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group" style="display:none;">
            <div class="alert alert-success">
                Se han actualizado los datos satisfactoriamente.
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
                            <div id="collapseDatosBasicos">                             
                                @foreach ($data_basica as $item_basica)
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 form-group">
                                            <label for="id_nombre">Nombre</label>
                                            <input id="id_nombre" class="form-control" type="text" value="{{$item_basica->Nombre ?? ''}}" disabled>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 form-group">
                                            <label for="id_Email">Correo Electrónico</label>
                                            <input id="id_Email" class="form-control" type="text" value="{{$item_basica->Email ?? ''}}" disabled>
                                        </div>

                                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 form-group">
                                            <label for="id_tipodocumento">Tipo de Documento</label>
                                            <select id="id_tipodocumento" class="form-control" required>
                                                <option value="">Seleccionar</option>
                                                @foreach ($data_tipodocumento as $item)
                                                    @if ($item_basica->IDTipoDocumento == $item->IDTipoDocumento)
                                                        <option value="{{$item->IDTipoDocumento}}" selected>{{$item->Nombre}}</option>
                                                    @else
                                                        <option value="{{$item->IDTipoDocumento}}">{{$item->Nombre}}</option>                                                        
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 form-group">
                                            <label for="id_nrodocumento">Numero de Documento</label>
                                            <input id="id_nrodocumento" class="form-control" type="text" value="{{$item_basica->Documento ?? ''}}" required>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 form-group">
                                            <label for="id_telefono">Telefono</label>
                                            <input id="id_telefono" class="form-control" type="text" value="{{$item_basica->Telefono ?? ''}}" required>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 form-group">
                                            <label for="id_telefonocelular">Telefono Celular</label>
                                            <input id="id_telefonocelular" class="form-control" type="text" value="{{$item_basica->TelefonoCelular ?? ''}}" required>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <button type="submit" id="btn-siguiente-datos-personales" class="btn btn-danger float-right">Guardar</button>
                                        </div>
                                    </div>
                                @endforeach
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
                            <h5 data-toggle="collapse" href="#collapseUbicacion" role="button" aria-expanded="false" aria-controls="collapseExample">
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
                                        <button id="btn-siguiente-ubicacion" type="submit" class="btn btn-danger float-right">Guardar</button>
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
                $.each(JSON.parse(result), function(i, item) {option += "<option value='"+item.IDCiudad+"'>"+item.Nombre+"</option>";});
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
                $.each(JSON.parse(result), function(i, item) {option += "<option value='"+item.IDLocalidad+"'>"+item.Nombre+"</option>";});
                $("#id_localidad").append(option);
            }})});

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
                $.each(JSON.parse(result), function(i, item) {option += "<option value='"+item.IDBarrio+"'>"+item.Nombre+"</option>";});
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
                                document.getElementById("div-ok").style.display="block";
                                form.classList.remove('was-validated');
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
                                document.getElementById("div-ok").style.display="block";
                                form.classList.remove('was-validated');
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
@endsection