@extends('index')

@section('main_content')
<style>
    .bottom-sheet-heading {
        padding: 0.875rem 1.25rem;
        font-size: 1.2rem;
    }
    .bottom-sheet {
        overflow: auto;
        right: 0;
        left: 0;
        margin-right: auto;
        margin-left: auto;
        width: 40vw;
        position: fixed;
        bottom: -50vh;
        z-index: 999;
        background: #fff;
        transition: all 0.3s;
        text-align: left;
    }
    .bottom-sheet.active {
        bottom: 0;
    }

    @media (min-width: 400px){
        .bottom-sheet{
            width: 100vw;
        }
    }

    @media (min-width: 576px){
        .bottom-sheet{
            width: 100vw;
        }
    }

    @media (min-width: 768px){
        .bottom-sheet{
            width: 80vw;
        }
    }

    @media (min-width: 992px){
        .bottom-sheet{
            width: 60vw;
        }
    }

    @media (min-width: 1200px){
        .bottom-sheet{
            width: 45vw;
        }
    }
</style>

<div class="overlay"></div>
<!-- Bottom sheet -->
<nav class="bottom-sheet bg-light shadow">
    <div id="detalle-content-bottom-sheet" class="row" style="padding-top:0.8rem;">
        <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group">
            <h3 id="id_nombre_btm_sheet">Producto 1</h3> 
        </div>
        <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-4 col-lg-4 form-group text-center">
            <img id="id_image_btm_sheet" style="height:150px;">
        </div>
        <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-8 col-lg-8 form-group">
            <div class="row">
                <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group">
                    <b>Descripción</b><br>
                    <a id="id_descripcion_btm_sheet" class="text-muted" style="text-decoration:none;word-wrap: break-word;"></a>
                </div>
                <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-6 col-lg-6 form-group">
                    <b>Marca</b><br>
                    <a id="id_marca_btm_sheet" class="text-muted" style="text-decoration:none;word-wrap: break-word;"></a>
                </div>
                <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-6 col-lg-6 form-group">
                    <b>Categoría</b><br>
                    <a id="id_categoria_btm_sheet" class="text-muted" style="text-decoration:none;word-wrap: break-word;"></a>
                </div>
            </div> 
        </div>
    </div>
    <div class="row">
        <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group">
            <button class="btn btn-outline-secondary" style="width: 100%;">Iniciar Sesión para ver precios</button>
        </div>
        <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group">
            <button id="btn-close-btm-sheet" class="btn text-danger" style="width: 100%;">Cerrar</button>
        </div>
    </div>
</nav>

<div class="container" style="margin-top:56px;">
    <div class="row" style="padding-top:1rem;">
        <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group">
            <h1>Puedes encontrar los siguientes productos</h1><br>
        </div>
        @foreach ($lista_productos as $producto)
            <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-6 col-lg-3 form-group">
                <form action="javascript:;" onsubmit="verProducto({{$producto->IDProducto}})">
                    @csrf
                    <button type="submit" class="btn" style="border:none;padding:0rem;">
                        <div class="card shadow-sm">
                            <div class="card-body" style="padding: 1rem 0.5rem;">
                                <div class="row">
                                    <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group text-left">
                                        <h5>{{ $producto->Nombre }}</h5>
                                    </div>
                                    <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group text-center">
                                        <img src="{{$producto->Archivo}}" style="height:150px;">
                                    </div>
                                    <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <a class="btn btn-outline-secondary" style="width: 100%"><small>Iniciar sesión para ver precios</small></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </button>
                </form>                        
            </div>
        @endforeach
    </div>
</div>

<script>
    function verProducto(id){
        var _token = "{{csrf_token()}}";

        $.ajax({
            url:"{{route('obtener-producto-id')}}",
            method:"POST",
            data:{IdProducto:id,_token:"{{csrf_token()}}"},
            success:function(result)
            {
                var producto = jQuery.parseJSON(result);

                if(producto[0].IDProducto==id){
                    document.getElementById("id_nombre_btm_sheet").innerHTML = producto[0].Nombre;
                    document.getElementById('id_image_btm_sheet').src = producto[0].Archivo;
                    document.getElementById("id_descripcion_btm_sheet").innerHTML = producto[0].Descripcion;
                    document.getElementById("id_marca_btm_sheet").innerHTML = producto[0].Marca;
                    document.getElementById("id_categoria_btm_sheet").innerHTML = producto[0].Categoria;
                    
                    $(".bottom-sheet").addClass("active"), $(".overlay").addClass("active");
                }
            }
        })
    }
</script>
<script>
    jQuery(document).ready(function () {
        $(".overlay").on("click", function () {
            $(".bottom-sheet").removeClass("active"), $(".overlay").removeClass("active");
        }),
        $("#btn-close-btm-sheet").on("click", function () {
            $(".bottom-sheet").removeClass("active"), $(".overlay").removeClass("active");
        })
        $("#sidebar-filtros").on("click", function (a) {
            a.preventDefault(), $(".bottom-sheet").addClass("active"), $(".overlay").addClass("active");
        })
    });
</script>
@endsection