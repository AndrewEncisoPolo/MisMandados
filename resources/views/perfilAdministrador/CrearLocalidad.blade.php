@extends('perfilAdministrador/administrador')

@section('admin_content')

<!-- Tipo Localidad -->
<div class="container" style="margin-top:56px;padding-bottom:1.25rem;">
    <div class="row" style="padding-top:1rem;">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="padding-bottom: 2rem;">
            <h1>Localidad 
                <button class="btn btn-outline-primary float-right" data-toggle="modal" data-target="#modal-crear-localidad" style="margin-top: 10px;">Crear Localidad</button>
            </h1>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 from-group">
            <table id="tabla-localidad" class="display" style="width:100%;border-bottom: 0px solid #111;">
                <thead>
                    <tr>
                        <th>ID Localidad</th>
                        <th>Nombre</th>
                        <th>ID Ciudad</th>
                        <th>Ciudad</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="modal-crear-localidad" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <form class="crear-localidad-needs-validation" novalidate>
                    <div class="row" style="padding-top:1rem;">
                        <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group">
                            <h1>Crear Localidad</h1>
                        </div>
                        <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group">
                            <div id="false_registro" style="display: none;">
                                <div class="alert" role="alert" style="border-radius: 0.25rem;color:#cc0e15;border: 1px solid #fca9ac;background-color: #fcd2d4;margin-bottom: 0px;">
                                    Hubo un error en la ejecución, por favor intente de nuevo.
                                </div>
                            </div>

                            <div id="ok_registro" style="display: none;">
                                <div class="alert alert-success" role="alert" style="border-radius: 0.25rem;margin-bottom: 0px;">
                                    La Localidad se ha registrado satisfactoriamente.
                                </div>
                            </div>
                        </div>

                        <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group">
                            <label for="id_departamento">Departamento</label>
                            <select class="form-control" name="departamento" id="id_departamento">
                                <option value="">Seleccionar</option>
                                @foreach ($data_departamento as $item)
                                    <option value="{{$item->IDDepartamento}}">{{$item->Nombre}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group">
                            <label for="id_ciudad">Ciudad</label>
                            <select class="form-control" name="ciudad" id="id_ciudad">
                                <option value="">Seleccionar</option>
                            </select>
                        </div>

                        <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group">
                            <label for="id_nombre">Localidad</label>
                            <input class="form-control" type="text" name="nombre_localidad" id="id_nombre" required>
                        </div>

                        <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group">
                            <button class="btn btn-primary" type="submit" style="width:100%">Guardar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script>

    $(document).ready(function() {
        get_localidades();
    });

    function get_localidades(){
        $('#tabla-localidad').DataTable( {
            "language": {"url": "http://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"},
            "destroy": "true",
            "ajax": {"url": "{{route('get-localidades')}}","dataSrc": ""},
            "columns":[
                {data: 'IDLocalidad'},
                {data: 'Nombre'},
                {data: 'IDCiudad'},
                {data: 'Ciudad'}
            ]
        });               
    }

    $("#id_departamento" ).change(function() {
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

    (function() {'use strict';
      window.addEventListener('load', function() {
        var forms = document.getElementsByClassName('crear-localidad-needs-validation');
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
                var nombre = $("#id_nombre").val();
                var idciudad = $("#id_ciudad").val();

                if (!nombre==""||!idciudad=="") {crear = 1;}

                if(crear==1){
                    $.ajax({
                    url:"{{route('crear-localidad')}}",
                    method:"POST",
                    data:{_token:_token,IDCiudad:idciudad,Nombre:nombre},
                    success:function(result)
                        {
                            if(result==1){
                                $("#id_nombre").val("");
                                document.getElementById("ok_registro").style.display="block";
                                document.getElementById("false_registro").style.display="none";
                                $('#ok_registro').delay(5000).hide(0);
                                form.classList.remove('was-validated');
                                get_localidades();
                            }else{
                                document.getElementById("ok_registro").style.display="none";
                                document.getElementById("false_registro").style.display="block";
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