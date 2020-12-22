@extends('index')
@section('main_content')
    <div id="backdrop" class="overlay"></div>

    <nav id="btn-sheet" class="bottom-sheet bg-white shadow">
        <div class="row pt-2">
            <div class="col-sx-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group">
                <h3 id="id_nombre_btm_sheet"></h3>
            </div>
            <div class="col-sx-12 col-xs-12 col-sm-12 col-md-4 col-lg-4 form-group text-center">
                <img id="id_image_btm_sheet" style="height:150px;">
            </div>
            <div class="col-sx-12 col-xs-12 col-sm-12 col-md-8 col-lg-8 form-group">
                <div class="row">
                    <div class="col-sx-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group">
                        <b>Descripción</b><br>
                        <a id="id_descripcion_btm_sheet" class="text-muted" style="text-decoration:none;word-wrap: break-word;"></a>
                    </div>
                    <div class="col-sx-6 col-sm-6 col-md-6 col-lg-6 form-group">
                        <b>Marca</b><br><a id="id_marca_btm_sheet" class="text-muted" style="text-decoration:none;word-wrap: break-word;">
                        </a>
                    </div>
                    <div class="col-sx-6 col-sm-6 col-md-6 col-lg-6 form-group">
                        <b>Categoría</b><br>
                        <a id="id_categoria_btm_sheet" class="text-muted" style="text-decoration:none;word-wrap: break-word;"></a>
                    </div>
                </div>
            </div>
            <div class="col-sx-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group">
                <button class="btn btn-sm btn-outline-secondary w-100">Iniciar Sesión para ver precios</button>
            </div>
            <div class="col-sx-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group">
                <button id="btn-close-btm-sheet" class="btn btn-sm btn-outline-primary w-100">Cerrar</button>
            </div>
        </div>
    </nav>
    <div class="container" style="margin-top:56px;">
        <div class="row pt-3">
            <div class="col-sx-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group">
                <h3>Puedes encontrar los siguientes productos</h3>
            </div>
            @foreach ($lista_productos as $producto)
            <div class="col-sx-12 col-xs-12 col-sm-12 col-md-6 col-lg-3 form-group">
                <form class="w-100" action="javascript:;" onsubmit="verProducto({{$producto->IDProducto}})">
                        @csrf   
                    <button type="submit" class="btn p-0 border-0 w-100">
                        <div class="card shadow-sm card-body pt-2 pb-2 pl-1 pr-1">
                            <div class="row">
                                <div class="col-sx-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 text-left">
                                    <h6>{{$producto->Nombre}}</h6>
                                </div>
                                <div class="col-sx-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group text-center">
                                    <img src="{{$producto->Archivo}}" style="height:150px;width: 150px;"/>
                                </div>
                                <div class="col-sx-12 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <a class="btn btn-sm btn-outline-secondary w-100">
                                        <small>Iniciar sesión para ver precios</small>
                                    </a>
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
        function verProducto(o) {
            let formData = new FormData();formData.append("IdProducto", o);formData.append("_token", "{{csrf_token()}}"); 
            let xobj = new XMLHttpRequest();
                xobj.overrideMimeType("application/json");
                xobj.open("POST", "{{route('obtener-producto-id')}}", true);
                xobj.onreadystatechange = function () {
                    if (xobj.readyState == 4 && xobj.status == "200") {
                        var p = JSON.parse(xobj.responseText);document.getElementById("id_nombre_btm_sheet").innerHTML = p[0].Nombre,document.getElementById("id_image_btm_sheet").src = p[0].Archivo,document.getElementById("id_descripcion_btm_sheet").innerHTML = p[0].Descripcion,document.getElementById("id_marca_btm_sheet").innerHTML = p[0].Marca,document.getElementById("id_categoria_btm_sheet").innerHTML = p[0].Categoria,document.getElementById("btn-sheet").classList.add("active"),document.getElementById("backdrop").classList.add("active");
                    }
                };
            xobj.send(formData);
        }

        document.getElementById("backdrop").addEventListener("click", function(){
            document.getElementById("btn-sheet").classList.remove("active"),document.getElementById("backdrop").classList.remove("active");
        });

        document.getElementById("btn-close-btm-sheet").addEventListener("click", function(){
            document.getElementById("btn-sheet").classList.remove("active"),document.getElementById("backdrop").classList.remove("active");
        });
    </script>
@endsection