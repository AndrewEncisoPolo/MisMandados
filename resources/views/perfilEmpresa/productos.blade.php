@extends('perfilEmpresa/Empresa')

@section('empresa_content')

<div class="container pb-4" style="margin-top:56px;">
    <div class="row pt-4">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pb-4">
            <h1>Mis Productos <button class="btn btn-outline-danger float-right mt-2" data-toggle="modal" data-target="#modal-agregar-producto">Agregar Producto</button></h1>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 from-group">
            <table id="tabla-productos" class="display w-100">
                <thead>
                    <tr><th>IDProducto</th><th>Nombre</th><th>Marca</th><th>Categoria</th><th>Unidad Medida</th><th>Valor Producto</th></tr>
                </thead>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modal-agregar-producto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-body">
            <div class="row pt-2">
                <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group">
                    <h2>Agregar Producto</h2>
                </div>
                <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div id="false_registro" style="display: none;">
                        <div class="alert" role="alert" style="border-radius: 0.25rem;color:#cc0e15;border: 1px solid #fca9ac;background-color: #fcd2d4;margin-bottom: 0px;">
                            El Producto ya está asociado.
                        </div>
                    </div>
        
                    <div id="ok_registro" style="display: none;">
                        <div class="alert alert-success" role="alert" style="border-radius: 0.25rem;margin-bottom: 0px;">
                            El Producto se ha asociado satisfactoriamente.
                        </div>
                    </div>
                </div>
        
                <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <h5>Filtros</h5>
                </div>

                <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-4 col-lg-4 form-group">
                    <label for="id_nombre">Marca</label>
                    <select class="filtros form-control" id="id_marca_producto" required>
                        <option value="0">Seleccionar</option>
                        @foreach ($lista_marcas as $marca)
                            <option value="{{$marca->Id}}">{{$marca->Nombre}}</option> 
                        @endforeach
                    </select>
                </div>

                <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-4 col-lg-4 form-group">
                    <label for="id_nombre">Categoria</label>
                    <select class="filtros form-control" id="id_categoria_producto" required>
                        <option value="0">Seleccionar</option>
                        @foreach ($lista_categorias as $categoria)
                            <option value="{{$categoria->Id}}">{{$categoria->Nombre}}</option> 
                        @endforeach
                    </select>
                </div>

                <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-4 col-lg-4 form-group">
                    <label for="id_nombre">Unidad de Medida</label>
                    <select class="filtros form-control" id="id_unidad_medidad" required>
                        <option value="0">Seleccionar</option>
                        @foreach ($lista_unidadmedida as $unidadmedida)
                            <option value="{{$unidadmedida->Id}}">{{$unidadmedida->Nombre}}</option> 
                        @endforeach
                    </select>
                </div>

                <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <h5>Producto</h5>
                </div>

                <form class="agregar-producto-needs-validation w-100" novalidate>
                    <div class="row">
                        <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-6 col-lg-6 form-group">
                            <label for="id_producto">Producto</label>
                            <select class="form-control" id="id_producto" required>
                                <option value="0">Seleccionar</option>
                            </select>
                        </div>

                        <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-6 col-lg-6 form-group">
                            <label for="id_producto">Valor del Producto</label>
                            <input class="form-control" type="text" onkeypress="isInputNumber(event)" id="id_valor_producto" required>
                        </div>
                
                        <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group">
                            <button class="btn btn-danger" type="submit" style="width:100%">Guardar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
      </div>
    </div>
</div>

<script>
    function isInputNumber(e){var t=String.fromCharCode(e.which);/[0-9]/.test(t)||e.preventDefault()};
    
    $(document).ready(function() {
        get_productos();
    });

    $("select.filtros" ).change(function() {
        $('#id_producto').empty();

        var idmarca = $("#id_marca_producto").val();
        var idcategoria = $("#id_categoria_producto").val();
        var idunidad_medidad = $("#id_unidad_medidad").val();
        
        var _token = "{{csrf_token()}}";
        $.ajax({
            url:"{{route('get-producto-filtros')}}",
            method:"POST",
            data:{IDMarca:idmarca,IDCategoria:idcategoria,IDUnidadMedidad:idunidad_medidad,_token:_token},
            success:function(result)
            {
                var option = "<option value=''>Seleccionar</option>";
                $.each(JSON.parse(result), function(i, item) {
                    option += "<option value='"+item.IDProducto+"'>"+item.Nombre+"</option>";
                });
                $("#id_producto").append(option);
            }
        })
    });

    function get_productos(){
        $('#tabla-productos').DataTable( {
            "language": {"url": "http://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"},
            "destroy": "true",
            "ajax": {"url": "{{route('get-producto-empresa')}}","dataSrc": ""},
            "columns":[
                {data: 'IDProducto'},
                {data: 'Nombre'},
                {data: 'Marca'},
                {data: 'Categoria'},
                {data: 'UnidadMedida'},
                {data: 'ValorProducto'}
            ]
        });               
    }

    (function() {'use strict';
      window.addEventListener('load', function() {
        var forms = document.getElementsByClassName('agregar-producto-needs-validation');
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
            
                var id_producto = $("#id_producto").val();
                var id_valor_producto = $("#id_valor_producto").val();

                if (!id_producto==""||!id_valor_producto=="") {crear = 1;}

                if(crear==1){
                    $.ajax({
                    url:"{{route('agregar-producto-empresa')}}",
                    method:"POST",
                    data:{_token:_token,IDProducto:id_producto,ValorProducto:id_valor_producto},
                    success:function(result)
                        {
                            if(result==1){
                                $("#id_nombre").val("");
                                document.getElementById("ok_registro").style.display="block";
                                document.getElementById("false_registro").style.display="none";
                                $('#ok_registro').delay(5000).hide(0);
                                form.classList.remove('was-validated');
                                get_productos();
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