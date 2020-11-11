@extends('perfilAdmin')

@section('admin_content')


<!-- MARCA -->
<div class="container" style="margin-top:56px;padding-bottom:1.25rem;">
    <form class="crear-marca-needs-validation" novalidate>
        <div class="row" style="padding-top:1rem;">
            <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group">
                <h1>Crear Marca</h1>
            </div>
            <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group">
                <div id="false_registro" style="display: none;">
                    <div class="alert" role="alert" style="border-radius: 0.25rem;color:#cc0e15;border: 1px solid #fca9ac;background-color: #fcd2d4;margin-bottom: 0px;">
                        Hubo un error en la ejecución, por favor intente de nuevo.
                    </div>
                </div>

                <div id="ok_registro" style="display: none;">
                    <div class="alert alert-success" role="alert" style="border-radius: 0.25rem;margin-bottom: 0px;">
                        La Marca se ha registrado satisfactoriamente.
                    </div>
                </div>
            </div>

            <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group">
                <label for="id_nombre">Nombre</label>
                <input class="form-control" type="text" id="id_nombre" required>
            </div>

            <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group">
                <button class="btn btn-danger" type="submit" style="width:100%">Guardar</button>
            </div>
        </div>
    </form>
</div>
<!--Marca-->
<script>
    (function() {'use strict';
      window.addEventListener('load', function() {
        var forms = document.getElementsByClassName('crear-marca-needs-validation');
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
                    url:"{{route('crear-marca')}}",
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








get_marca
get_tipocomercio
get_unidadmedida
get_categoria

get_departamento
get_ciudad
get_localidad
get_barrio

get_ciudad_iddepartamento
get_localidad_idciudad
get_barrio_idlocalidad