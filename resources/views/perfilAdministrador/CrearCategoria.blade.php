@extends('perfilAdministrador/administrador')


@section('admin_content')

<!-- CATEGORIA -->
<div class="container" style="margin-top:56px;padding-bottom:1.25rem;">
    <div class="row" style="padding-top:1rem;">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="padding-bottom: 2rem;">
            <h1>Categoría <button class="btn btn-outline-primary float-right" data-toggle="modal" data-target="#modal-crear-categoria" style="margin-top: 10px;">Crear Categoría</button></h1>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 from-group">
            <table id="tabla-categoria" class="display" style="width:100%;border-bottom: 0px solid #111;">
                <thead>
                    <tr>
                        <th>Id Categoría</th>
                        <th>Nombre</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modal-crear-categoria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <form class="crear-categoria-needs-validation" novalidate>
                    <div class="row" style="padding-top:1rem;">
                        <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group">
                            <h1>Crear Categoría</h1>
                        </div>
                        <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group">
                            <div id="false_registro" style="display: none;">
                                <div class="alert" role="alert" style="border-radius: 0.25rem;color:#cc0e15;border: 1px solid #fca9ac;background-color: #fcd2d4;margin-bottom: 0px;">
                                    Hubo un error en la ejecución, por favor intente de nuevo.
                                </div>
                            </div>

                            <div id="ok_registro" style="display: none;">
                                <div class="alert alert-success" role="alert" style="border-radius: 0.25rem;margin-bottom: 0px;">
                                    La Categoría se ha registrado satisfactoriamente.
                                </div>
                            </div>
                        </div>

                        <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group">
                            <label for="id_nombre">Nombre</label>
                            <input class="form-control" type="text" name="nombre_categoria" id="id_nombre" required>
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


<!-- Categoría -->
<script>
    $(document).ready(function() {
        get_tipocomercio();
    });

    function get_tipocomercio(){
        $('#tabla-categoria').DataTable( {
            "language": {"url": "http://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"},
            "destroy": "true",
            "ajax": {"url": "{{route('get-categorias')}}","dataSrc": ""},
            "columns":[
                {data: 'Id'},
                {data: 'Nombre'}
            ]
        });               
    }

    (function() {'use strict';
      window.addEventListener('load', function() {
        var forms = document.getElementsByClassName('crear-categoria-needs-validation');
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

                if (!nombre=="") {crear = 1;}

                if(crear==1){
                    $.ajax({
                    url:"{{route('crear-categoria')}}",
                    method:"POST",
                    data:{_token:_token,Nombre:nombre},
                    success:function(result)
                        {
                            if(result==1){
                                $("#id_nombre").val("");
                                document.getElementById("ok_registro").style.display="block";
                                document.getElementById("false_registro").style.display="none";
                                $('#ok_registro').delay(5000).hide(0);
                                form.classList.remove('was-validated');
                                get_tipocomercio();
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