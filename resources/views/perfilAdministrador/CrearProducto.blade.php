@extends('perfilAdministrador/administrador')

@section('admin_content')

    <div class="container" style="margin-top:56px;padding-bottom:1.25rem;">
        <form action="javascript:;" onsubmit="crearproducto(this)" class="needs-validation" novalidate>
            <div class="row" style="padding-top:1rem;">
                <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group">
                    <h1>Crear Produto</h1>
                </div>
                <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group">
                    <div id="false_producto" style="display: none;">
                        <div class="alert" role="alert" style="border-radius: 0.25rem;color:#cc0e15;border: 1px solid #fca9ac;background-color: #fcd2d4;margin-bottom: 0px;">
                            Hubo un error en la ejecución, por favor intente de nuevo.
                        </div>
                    </div>

                    <div id="ok_producto" style="display: none;">
                        <div class="alert alert-success" role="alert" style="border-radius: 0.25rem;margin-bottom: 0px;">
                            El producto se ha creado satisfactoriamente.
                        </div>
                    </div>
                </div>

                <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-12 col-lg-4 form-group">
                    <label for="id_nombre_producto">Nombre del Producto</label>
                    <input class="form-control" type="text" name="nombre_producto" id="id_nombre_producto" required>
                </div>
                <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-12 col-lg-4 form-group">
                    <label for="id_marca_producto">Marca</label>
                    <select class="form-control" name="marca_producto" id="id_marca_producto" required>
                        <option value="">Seleccionar</option>
                        @foreach ($lista_marcas as $marca)
                            <option value="{{$marca->Id}}">{{$marca->Nombre}}</option> 
                        @endforeach
                    </select>
                </div>
                <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-12 col-lg-4 form-group">
                    <label for="">Categoria</label>
                    <select class="form-control" name="categoria_producto" id="id_categoria_producto" required>
                        <option value="">Seleccionar</option>
                        @foreach ($lista_categorias as $categoria)
                            <option value="{{$categoria->Id}}">{{$categoria->Nombre}}</option> 
                        @endforeach
                    </select>
                </div>
                <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-12 col-lg-4 form-group">
                    <label for="id_peso_producto">Peso</label>
                    <input class="form-control" type="text" onkeypress="isInputNumber(event)" name="peso_producto" id="id_peso_producto" required>
                </div>
                <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-12 col-lg-4 form-group">
                    <label for="id_unidad_medidad">Unidad de Medida</label> 
                    <select class="form-control" name="unidadmedida_producto" id="id_unidad_medidad" required>
                        <option value="">Seleccionar</option>
                        @foreach ($lista_unidadmedida as $unidadmedida)
                            <option value="{{$unidadmedida->Id}}">{{$unidadmedida->Nombre}}</option> 
                        @endforeach
                    </select>
                </div>
                <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-12 col-lg-4 form-group">
                    <label for="id_valor_producto">Valor del Producto (Precio Sugerido)</label>
                    <input class="form-control" type="text" onkeypress="isInputNumber(event)" name="valor_producto" id="id_valor_producto" required>
                </div>
                <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group">
                    <label for="id_descripcion_producto">Descripción</label>
                    <textarea class="form-control" name="descripcion_producto" id="id_descripcion_producto" required></textarea>
                </div>
                <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group">
                    <label for="UpFile">Imagen</label>
                    <input id="UpFile" type="file" accept="image/jpeg , image/jpg , image/png" class="form-control" onchange="encodeImageFileAsURL(this)" lang="es" required>
                        <div id="mensajeAlert2" style="display: none;margin-top:1rem;">
                            <div class="alert" role="alert" style="border-radius: 0.25rem;color:#cc0e15;border: 1px solid #fca9ac;background-color: #fcd2d4;margin-bottom: 0px;">
                                Recuerde que <b>MAXIMO 1 Megabyte</b> por archivo
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group">
                    <label for="FileHolder">Previsualización del Archivo</label>
                    <div id="FileHolder" class="form-control text-center" style="height:227px;">
                        <div class="row text-center table-responsive" style="min-height: 227px;padding:0px;">
                            <div id="div_img1" class=" text-center col-xsm-12 col-xs-12 col-sm-12 col-md-12 col-lg-12" style="display:none;">
                                <div class="form-group text-center" style="margin-bottom: 0px;margin-top:0.5rem;">
                                    <img class="imgShadow" id="imgProducto" height="150px"><br>
                                    <br>
                                    <button class="btn btn-outline-secondary btn-sm" onclick="ClearImg()"> Remover imagen</button>
                                    <input id="hidden_Img1" type="hidden" name="imagen_Producto">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group">
                    <button class="btn btn-danger" type="submit" style="width:100%">Guardar</button>
                </div>
            </div>
        </form>
    </div>

    <script>
        function crearproducto(form){var forms=document.getElementsByClassName("needs-validation"),validation=Array.prototype.filter.call(forms,function(o){o.addEventListener("submit",function(e){!1===o.checkValidity()&&(e.preventDefault(),e.stopPropagation()),o.classList.add("was-validated")},!1)}),crear=!0,_token="{{csrf_token()}}",nombre=$("#id_nombre_producto").val(),IDMarca=$("#id_marca_producto").val(),IDCategoria=$("#id_categoria_producto").val(),Peso=$("#id_peso_producto").val(),IDUnidadMedida=$("#id_unidad_medidad").val(),ValorProducto=$("#id_valor_producto").val(),Descripcion=$("#id_descripcion_producto").val(),ImagenProducto=$("#hidden_Img1").val();1==(crear=""!=nombre&&(""!=IDMarca&&(""!=IDCategoria&&(""!=Peso&&(""!=IDUnidadMedida&&(""!=ValorProducto&&(""!=Descripcion&&""!=ImagenProducto)))))))&&$.ajax({url:"{{route('crear-producto')}}",method:"POST",data:{_token:_token,Nombre:nombre,IDMarca:IDMarca,IDCategoria:IDCategoria,Peso:Peso,IDUnidadMedida:IDUnidadMedida,ValorProducto:ValorProducto,Descripcion:Descripcion,ImagenProducto:ImagenProducto},success:function(o){console.log(o),1==o?($("#id_nombre_producto").val(""),$("#id_marca_producto").val(""),$("#id_categoria_producto").val(""),$("#id_peso_producto").val(""),$("#id_unidad_medidad").val(""),$("#id_valor_producto").val(""),$("#id_descripcion_producto").val(""),$("#hidden_Img1").val(""),document.getElementById("UpFile").removeAttribute("disabled"),document.getElementById("hidden_Img1").removeAttribute("class"),document.getElementById("imgProducto").removeAttribute("src"),document.getElementById("div_img1").style.display="none",document.getElementById("ok_producto").style.display="block"):document.getElementById("false_producto").style.display="block"}});}
    </script>

@endsection