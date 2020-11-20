@extends('index')
@section('main_content')
<div class="overlay"></div>
<!-- Bottom sheet -->
<nav class="bottom-sheet bg-light shadow"><div class="row pt-2"> <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group"><h3 id="id_nombre_btm_sheet"></h3></div><div class="col-xsm-12 col-xs-12 col-sm-12 col-md-4 col-lg-4 form-group text-center"><img id="id_image_btm_sheet" style="height:150px;"></div><div class="col-xsm-12 col-xs-12 col-sm-12 col-md-8 col-lg-8 form-group"><div class="row"><div class="col-xsm-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group"><b>Descripción</b><br><a id="id_descripcion_btm_sheet" class="text-muted" style="text-decoration:none;word-wrap: break-word;"></a></div><div class="col-xsm-12 col-xs-12 col-sm-12 col-md-6 col-lg-6 form-group"><b>Marca</b><br><a id="id_marca_btm_sheet" class="text-muted" style="text-decoration:none;word-wrap: break-word;"></a></div><div class="col-xsm-12 col-xs-12 col-sm-12 col-md-6 col-lg-6 form-group"><b>Categoría</b><br><a id="id_categoria_btm_sheet" class="text-muted" style="text-decoration:none;word-wrap: break-word;"></a></div></div></div><div class="col-xsm-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group"><button class="btn btn-outline-secondary w-100">Iniciar Sesión para ver precios</button></div><div class="col-xsm-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group"><button id="btn-close-btm-sheet" class="btn text-danger w-100">Cerrar</button></div></div></nav>
<div class="container" style="margin-top:56px;">
    <div class="row pt-3"><div class="col-xsm-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group"><h3>Puedes encontrar los siguientes productos</h3></div>
        @foreach ($lista_productos as $producto)
        <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-6 col-lg-3 form-group"><form action="javascript:;" onsubmit="verProducto({{$producto->IDProducto}})"> @csrf <button type="submit" class="btn" style="border:none;padding:0rem;"><div class="card shadow-sm card-body" style="padding: 0.8rem 0.4rem;"> <div class="row"> <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 text-left"><h6>{{$producto->Nombre}}</h6></div><div class="col-xsm-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group text-center"><img src="{{$producto->Archivo}}" style="height:150px;"></div><div class="col-xsm-12 col-xs-12 col-sm-12 col-md-12 col-lg-12"><a class="btn btn-sm btn-outline-secondary w-100"><small>Iniciar sesión para ver precios</small></a></div></div></div></button></form></div>
        @endforeach
    </div>
</div>
<script>function verProducto(o){$.ajax({url:"{{route('obtener-producto-id')}}",method:"POST",data:{IdProducto:o,_token:"{{csrf_token()}}"},success:function(e){var t=jQuery.parseJSON(e);t[0].IDProducto==o&&(document.getElementById("id_nombre_btm_sheet").innerHTML=t[0].Nombre,document.getElementById("id_image_btm_sheet").src=t[0].Archivo,document.getElementById("id_descripcion_btm_sheet").innerHTML=t[0].Descripcion,document.getElementById("id_marca_btm_sheet").innerHTML=t[0].Marca,document.getElementById("id_categoria_btm_sheet").innerHTML=t[0].Categoria,$(".bottom-sheet").addClass("active"),$(".overlay").addClass("active"))}})}jQuery(document).ready(function(){$(".overlay").on("click",function(){$(".bottom-sheet").removeClass("active"),$(".overlay").removeClass("active")}),$("#btn-close-btm-sheet").on("click",function(){$(".bottom-sheet").removeClass("active"),$(".overlay").removeClass("active")}),$("#sidebar-filtros").on("click",function(e){e.preventDefault(),$(".bottom-sheet").addClass("active"),$(".overlay").addClass("active")})});</script>
@endsection