@extends('perfilConsumidor/Consumidor')
@section('consumidor_content')
  <script src='https://api.mapbox.com/mapbox-gl-js/v1.12.0/mapbox-gl.js'></script>
  <link rel='stylesheet' href='https://api.mapbox.com/mapbox-gl-js/v1.12.0/mapbox-gl.css' type="text/css" />
  <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.5.1/mapbox-gl-geocoder.min.js"></script>
  <link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.5.1/mapbox-gl-geocoder.css" type="text/css" />

  <!-- SIDEBAR Filtros de búsqueda -->
  <nav class="sidebar bg-white shadow">
      <div class="sidebar-heading"> 
          <h4 class="mb-0">Filtros</h4>
      </div>
      <div class="list-group list-group-flush">
        
          <a role="button" class="list-group-item list-group-item-action bg-white pt-0">
            <button id="reset-filtros" class="btn btn-sm btn-outline-primary w-100">Eliminar Filtros</button>
          </a>
          
          <a data-toggle="collapse" href="#collapse-marcas" role="button" aria-expanded="false" class="dropdown-toggle list-group-item list-group-item-action bg-white">Marca</a>
          <div class="collapse" id="collapse-marcas">
            <div class="card card-body" style="padding-right: 0rem;padding-left: 0rem;">
              @foreach ($data_marca as $item)
                <a class="dropdown-item" type="button" onclick="filtromarcas({{$item->IDMarca}})">{{$item->Marca}}</a>
              @endforeach
              <input type="hidden" id="id-filter-marca" value="0">
            </div>
          </div>

          <a data-toggle="collapse" href="#collapse-categorias" role="button" aria-expanded="false" class="dropdown-toggle list-group-item list-group-item-action bg-white">Categoría</a>
          <div class="collapse" id="collapse-categorias">
            <div class="card card-body" style="padding-right: 0rem;padding-left: 0rem;">
              @foreach ($data_categorias as $item)
                <a class="dropdown-item" type="button" onclick="filtrocategorias({{$item->IDCategoria}})">{{$item->Categoria}}</a>
              @endforeach
              <input type="hidden" id="id-filter-categoria" value="0">
            </div>
          </div>

          <a data-toggle="collapse" href="#collapse-unidadmedida" role="button" aria-expanded="false" class="dropdown-toggle list-group-item list-group-item-action bg-white">Unidad de Medida</a>
          <div class="collapse" id="collapse-unidadmedida">
            <div class="card card-body" style="padding-right: 0rem;padding-left: 0rem;">
              @foreach ($data_unidadmedida as $item)
                <a class="dropdown-item" type="button" onclick="filtrounidadmedida({{$item->IDUnidadMedida}})">{{$item->UnidadMedida}}</a>
              @endforeach
              <input type="hidden" id="id-filter-unidadmedida" value="0">
            </div>
          </div>

      </div> 
  </nav>
                  
  <!-- SIDEBAR Carrito de Compras -->
  <nav class="sidebar-right bg-white shadow">
    <div class="sidebar-heading"> 
        <h4 class="text-dark mb-0">Carrito de Compras</h4> 
    </div>
    <div class="list-group list-group-flush">
      <div class="dropdown-divider m-0"></div>
      @foreach ($data_consumidor as $item)
        <div class="sidebar-heading w-100"> 
          <h6 claass="text-dark">{{$item->Nombre}}</h6>
          <h6 id="input-direccion-carrito" class="text-black-50 mb-0">{{$item->Direccion}} 
            &nbsp;
            <a id="edit-direccion-carrito" class="cursor-pointer d-none">
              <svg class="mb-1" width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil" fill="currentColor"><path fill-rule="evenodd" d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5L13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175l-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/></svg>
            </a>
          </h6>
          <input id="id-input-edit-direccion-carrito" class="form-control form-control-sm d-none" value="{{$item->Direccion}}" type="text">
        </div>
      @endforeach
      <div class="dropdown-divider m-0"></div>
      <div class="w-100">
        <div id="list-productos-carrito" class="w-100" style="">
        </div>
      </div> 

      <div id="pedido-no-guardado" class="w-100 vh-100 d-none">
        <div class="align-middle pt-5 text-center">
          <span class="material-icons align-middle text-danger display-1">clear</span><br>
          <h3>El pedido no fue enviado </h3>
        </div>
      </div>
      <div id="pedido-guardado" class="w-100 vh-100 d-none">
        <div class="align-middle pt-5 text-center">
          <span class="material-icons align-middle text-success display-1">check_circle_outline</span><br>
          <h3>Pedido enviado exitosamente</h3>
        </div>
      </div>
      

      <div class="sidebar-footer bg-white">
        <button id="btn-pedido-vacio" class="btn btn-sm btn-outline-primary"><a id="texto-pedido">Carrito Vacio</a></button>
        <button id="btn-pedido" class="btn btn-sm btn-primary d-none"><a id="texto-pedido">Pagar</a>&nbsp;<a id="valor-pedido"></a></button>
        <input id="hidden_total_pedido" type="hidden">
      </div>
    </div> 
  </nav>
              
  <!-- Bottom sheet DETALLE PRODUCTO -->
  <nav class="bottom-sheet bg-white shadow">
      <div class="row pt-2">
          <div class="col-sx-12 col-sm-12 col-md-12 col-lg-12">
              <h3 id="id_nombre_btm_sheet"></h3> 
          </div>
          <div class="col-sx-12 col-sm-12 col-md-4 col-lg-4 text-center">
              <img id="id_image_btm_sheet" style="height:200px;">
          </div>
          <div class="col-sx-12 col-sm-12 col-md-8 col-lg-8">
              <div class="row">
                  <div class="col-sx-6 col-sm-3 col-md-6 col-lg-6 form-group">
                      <b>Marca</b><br>
                      <a id="id_marca_btm_sheet" class="text-muted text-decoration-none break-long-words"></a>
                  </div>
                  <div class="col-sx-6 col-sm-3 col-md-6 col-lg-6 form-group">
                      <b>Categoría</b><br>
                      <a id="id_categoria_btm_sheet" class="text-muted break-long-words"></a>
                  </div>
                  <div class="col-sx-6 col-sm-3 col-md-6 col-lg-6 form-group">
                    <b>Peso</b><br>
                    <a id="id_peso_btm_sheet" class="text-muted text-decoration-none break-long-words"></a>
                    <a id="id_unidadmedida_btm_sheet" class="text-muted text-decoration-none break-long-words"></a>
                  </div>
                  <div class="col-sx-6 col-sm-3 col-md-6 col-lg-6 form-group">
                    <b>Precio</b><br>
                    <a id="id_precio_btm_sheet" class="text-muted text-decoration-none break-long-words"></a>
                    <a id="edit_precio_btm_sheet" class="text-muted text-decoration-none break-long-words d-none"></a>
                  </div>
                  <div class="col-sx-12 col-sm-12 col-md-12 col-lg-12 form-group">
                    <b>Descripción</b><br>
                    <a id="id_descripcion_btm_sheet" class="text-muted text-decoration-none break-long-words"></a>
                  </div>
              </div> 
          </div>
          <div class="col-sx-12 col-sm-12 col-md-12 col-lg-12">
            <div class="dropdown-divider"></div>
          </div>
          <div class="col-sx-12 col-sm-12 col-md-12 col-lg-12 form-group text-center">
            <b>Cantidad</b><br>
            <div class="btn-group btn-group-sm pt-1" role="group">
              <button id="btn-group-less" type="button" class="btn btn-sm btn-outline-primary">
                <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-dash" fill="currentColor" ><path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z"/></svg>
              </button>
              <input id="id_cantidad_carritto" class="form-control-sm w-100" type="text" value="1" onkeypress="isInputNumber(event)" style="text-align: center;border: none;">
              <button id="btn-group-add" type="button" class="btn btn-sm btn-outline-primary">
                <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-plus" fill="currentColor" ><path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/></svg>
              </button>
            </div>
          </div>
          <div class="col-sx-12 col-sm-12 col-md-12 col-lg-12 form-group">
              <input id="id_producto_carrito" type="hidden" >
              <input id="hidden_precio_carrito" type="hidden">
              <input id="id_precio_carrito" type="hidden">
              <input id="id_nombre_carrito" type="hidden">
              <button id="btn-agregar-al-carrito" class="btn btn-sm btn-primary w-100">Agregar al carrito 
                <svg width="1.2em" height="1.2em" viewBox="0 1 16 16" class="bi bi-cart-plus" fill="currentColor">
                  <path fill-rule="evenodd" d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm7 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                  <path fill-rule="evenodd" d="M8.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H9v1.5a.5.5 0 0 1-1 0V8H6.5a.5.5 0 0 1 0-1H8V5.5a.5.5 0 0 1 .5-.5z"/>
                </svg>
              </button>
              <input type="hidden" id="hidden_modificar_poducto">
              <button id="btn-mod-producto-carrito" class="btn btn-sm btn-primary w-100 d-none">Agregar al carrito 
                <svg width="1.2em" height="1.2em" viewBox="0 1 16 16" class="bi bi-cart-plus" fill="currentColor">
                  <path fill-rule="evenodd" d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm7 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                  <path fill-rule="evenodd" d="M8.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H9v1.5a.5.5 0 0 1-1 0V8H6.5a.5.5 0 0 1 0-1H8V5.5a.5.5 0 0 1 .5-.5z"/>
                </svg>
              </button>
          </div>
      </div>
  </nav>

  <div class="overlay"></div>

  <div class="container" style="margin-top:56px;">
    <div class="row">
      <div class="col-sx-12 col-md-12 col-lg-12">
        <div class="form-group">
          <div class="card card-body pt-0 shadow-sm top-bar-empresa" style="border-top-left-radius: 0rem;border-top-right-radius: 0rem;">
              <div class="row">
                @foreach ($data_empresa as $info)
                  <!-- Imagenes de la empresa -->
                  <div class="col-sx-12 col-sm-12 col-md-12 col-lg-12 from-group p-0 text-center">
                    <div id="container-portada" style="">
                      <div id="imgPortada" onclick="verImagen()" class="cursor-pointer" style="background:url({{$info->ImagenPortada}});"></div>
                    </div>
                    <div class="col-sx-12 col-md-12  col-lg-12 form-group text-center">
                      <div id="imgPerfil" class="rounded-circle shadow-sm bg-white mb-2 cursor-pointer" onclick="verImagen()" style="background:url({{$info->ImagenPerfil}});">
                        <img src="{{$info->ImagenPerfil}}" class="d-none" alt="Mis Mandados - {{ $info->Nombre }}">                              
                      </div>
                    </div>
                    <div class="col-sx-12 col-md-12  col-lg-12 form-group p-0 text-center">
                      <h3>{{ $info->Nombre }}</h3>    
                    </div>
                  </div>
                  <!-- Información de la empresa -->
                  <div class="col-sx-12 col-sm-12 col-md-12 col-lg-12 p-0">
                    <div class="collapse" id="collapse-more-info">
                      <div class="row bg-white">
                          <div class="col-sx-12 col-md-12 col-lg-12">
                              <h5>Información</h5>
                          </div>
                          <div class="col-sx-12 col-md-12 col-lg-12 form-group px-0">
                            <div class="row">
                              <div class="col-sx-6 col-md-6 col-lg-3 form-group">
                                <small>
                                  <b>Email</b><br>
                                  <a class="text-muted" style="text-decoration:none;">{{ $info->Email }}</a>
                                </small>
                              </div>
                              <div class="col-sx-6 col-md-6 col-lg-3 form-group">
                                <small>
                                  <b>Teléfono / Tel. Celular</b><br>
                                  <a class="text-muted" style="text-decoration:none;">{{ $info->Telefono }} / {{ $info->TelefonoCelular }}</a>
                                </small>
                              </div>
                              <div class="col-sx-6 col-md-6 col-lg-3 form-group">
                                <small>
                                  <b>Dirección</b><br>
                                  <a class="text-muted" style="text-decoration:none;">{{ $info->Direccion }}</a>
                                </small>
                              </div>
                              <div class="col-sx-6 col-md-6 col-lg-3 form-group">
                                <small>
                                  <b>Ubicación</b><br>
                                  <a class="text-muted" style="text-decoration:none;">{{ $info->Barrio }} ({{ $info->Ciudad }})</a>
                                </small>
                              </div>
                            </div>
                          </div>

                      </div>
                    </div>
                  </div>
                @endforeach
                <div class="col-sx-12 col-md-12 col-lg-12 text-center">
                  <button id="btn-more-info" class="btn btn-light text-center" type="button" style="border-radius: 33%;" title="Información de la Empresa">
                    <span id="info-more" class="material-icons align-middle">expand_more</span>
                    <span id="info-less" class="material-icons align-middle d-none">expand_less</span>
                  </button>
                </div>
              </div> 
          </div>
        </div>
      </div>
      <div class="col-sx-12 col-md-12 col-lg-12">
        <div class="form-group">
            <div class="wrapper p-4">
                <div class="content">
                  <div class="row">
                    <div class="col-sx-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="form-group d-flex justify-content-between">
                            <button id="sidebar-filtros" class="btn btn-primary text-white shadow-sm btn-sm">
                                <span class="text-responsive">Ver Filtros</span>
                                <span class="material-icons align-middle">filter_alt</span>
                            </button>
                            <button id="sidebar-carrito" class="btn btn-primary text-white shadow-sm btn-sm">
                                <span class="text-responsive">Ver Carrito</span>
                                <span class="material-icons align-middle">shopping_cart</span>
                            </button>
                        </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sx-12 col-sm-12 col-md-12 col-lg-12 form-group">
                      <h3>Lista de Productos</h3>
                    </div>
                  </div>
                  <div id="content-productos-empresa" class="row">
                      @foreach ($producto_empresa as $producto)
                        <div class="col-sx-12 col-sm-12 col-md-6 col-lg-3 form-group">
                            <button type="button" class="btn border-0 p-0" onclick="verProducto({{$producto->IDEmpresaProducto}})">
                                <div class="card shadow-sm card-body px-0 py-2">
                                    <div class="row">
                                        <div class="col-sx-12 col-sm-12 col-md-12 col-lg-12 text-left">
                                            <h6>{{ $producto->Nombre }}</h6>
                                        </div>
                                        <div class="col-sx-12 col-sm-12 col-md-12 col-lg-12 form-group text-center">
                                            <img class="img-producto" src="{{$producto->Archivo}}" alt="Mis Mandados - {{ $producto->Nombre }}">
                                        </div>
                                        <div class="col-sx-12 col-sm-12 col-md-12 col-lg-12 text-center">
                                          <h6>
                                            ${{number_format($producto->ValorProducto, 2, ",", ".")}}
                                          </h6>
                                        </div>
                                        <div class="col-sx-12 col-sm-12 col-md-12 col-lg-12">
                                            <a id="btn-ver-producto" class="btn btn-sm btn-primary w-100">Agregar al carrito <span class="material-icons align-middle">add_shopping_cart</span></a>
                                        </div>
                                    </div>
                                </div>
                            </button>                      
                        </div>
                      @endforeach  
                  </div>
                </div>
            </div>
        </div>
      </div>
      <div class="col-sx-12 col-md-12 col-lg-12">
        <div class="card card-body shadow-sm" style="border-bottom-left-radius: 0rem;border-bottom-right-radius: 0rem;">
          <div class="row">
            <div class="col-sx-12 col-md-12  col-lg-12">
              <small>
                <b>Ubicación</b>
              </small>  
            </div> 
            <div class="col-sx-12 col-md-12 col-lg-12">
              <div id="map" class="map-empresa mt-2 mb-2"></div> 
            </div>  
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    $(function(){getLocalizacion();});
    
    function getLocalizacion() {
      $.ajax({
        url: "{{route('get-localizacion-empresa')}}",
        method: "POST",
        data: {_token:"{{csrf_token()}}"},
        success: function(result) {
          let loc = jQuery.parseJSON(result);
          mapboxgl.accessToken = 'pk.eyJ1IjoiYW5kcmV5ZW5jaXNvIiwiYSI6ImNraHRha2EwZTEwOWEyeG1qajJ5aHZkbzkifQ.VzXE5BeIroJXKKcvMndX2A';
          let map = new mapboxgl.Map({container: 'map',style: 'mapbox://styles/mapbox/streets-v11',center: [loc[0].longitud, loc[0].latitud],zoom: 16});
          let marker = new mapboxgl.Marker().setLngLat([loc[0].longitud, loc[0].latitud]).setPopup(new mapboxgl.Popup().setHTML("<h3>Aquí nos encuentras.</h3>")).addTo(map);
          //map.addControl(new MapboxGeocoder({accessToken: mapboxgl.accessToken}));
          map.addControl(new mapboxgl.NavigationControl());
          map.addControl(new mapboxgl.FullscreenControl());
          map.addControl(new mapboxgl.GeolocateControl({positionOptions: {enableHighAccuracy: true},trackUserLocation: true}));
        }
      });
    }
  </script>

  <script>
    $(function(){
      jQuery(document).ready(function(){$(".overlay").on("click",function(){$(".sidebar").removeClass("active"),$(".sidebar-right").removeClass("active"),$(".overlay").removeClass("active")});
      $('#btn-more-info').on('click', function(e){$('#collapse-more-info').collapse('toggle');})});
      $("#sidebar-filtros").on("click",function(a){a.preventDefault(),$(".sidebar").addClass("active"),$(".overlay").addClass("active")});
      $("#sidebar-carrito").on("click",function(a){a.preventDefault(),$(".sidebar-right").addClass("active"),$(".overlay").addClass("active")});
    });
    function isInputNumber(evt) {let ch = String.fromCharCode(evt.which);if (!(/[0-9]/.test(ch))) {evt.preventDefault();}}
    $("#sidebar-filtros").on("click", function(a) {a.preventDefault(), $(".sidebar").addClass("active"), $(".overlay").addClass("active");});


    $('#collapse-more-info').on('hidden.bs.collapse', function () {
      $("#info-less").addClass("d-none");
      $("#info-more").removeClass("d-none");
    });
    $('#collapse-more-info').on('shown.bs.collapse', function () {
      $("#info-less").removeClass("d-none");
      $("#info-more").addClass("d-none");
    });


    $("#sidebar-carrito").on("click", function () { 
      get_carrito();
    }); 
    $("#btn-agregar-al-carrito").on("click",function(){
      add_producto_carrito();
    });
    $("#btn-mod-producto-carrito").on("click", function () {
      eliminarproducto($('#hidden_modificar_poducto').val());
      add_producto_carrito();
      $("#btn-agregar-al-carrito").removeClass("d-none");
      $("#btn-mod-producto-carrito").addClass("d-none");
    }); 
    $("#edit-direccion-carrito").on("click", function () {
      $("#input-direccion-carrito").addClass("d-none");
      $("#id-input-edit-direccion-carrito").removeClass("d-none");
    });
    $("#btn-pedido").on("click", function () {
      registrarPedido();
    });
    $("#btn-group-add").on("click", function() {
      let precio = $("#hidden_precio_carrito").val();
      let iterador = parseInt($("#id_cantidad_carritto").val()) + 1;
      let total_precio = precio * iterador;
      $("#id_cantidad_carritto").val(iterador);
      document.getElementById("id_precio_btm_sheet").innerHTML = total_precio.toLocaleString('en-US', { style: 'currency', currency: 'USD' });
      document.getElementById("edit_precio_btm_sheet").innerHTML = total_precio.toLocaleString('en-US', { style: 'currency', currency: 'USD' });
      $('#id_precio_carrito').val(total_precio);
      $("#btn-agregar-al-carrito").removeAttr("disabled"); 
    });
    $("#btn-group-less").on("click", function() {
      if (!parseInt($("#id_cantidad_carritto").val()) == 0) {
        let precio = $("#hidden_precio_carrito").val();
        let iterador = parseInt($("#id_cantidad_carritto").val()) - 1;
        let total_precio = precio * iterador;
        $("#id_cantidad_carritto").val(iterador);
        document.getElementById("id_precio_btm_sheet").innerHTML = total_precio.toLocaleString('en-US', { style: 'currency', currency: 'USD' });
        document.getElementById("edit_precio_btm_sheet").innerHTML = total_precio.toLocaleString('en-US', { style: 'currency', currency: 'USD' });
        $('#id_precio_carrito').val(total_precio);
      if (!iterador == 0) {$("#btn-agregar-al-carrito").removeAttr("disabled");}else{$("#btn-agregar-al-carrito").attr('disabled', 'disabled');}}
      else{$("#btn-agregar-al-carrito").attr('disabled', 'disabled');}
    });
    $(".overlay").on("click", function() {
      $(".bottom-sheet").removeClass("active"), $(".overlay").removeClass("active");
      $('#id_cantidad_carritto').val(1);
      $('#list-productos-carrito').empty();
    });
    function eliminarproducto(posicion) {
      $.ajax({
          url: "{{route('delete-producto-carrito')}}",
          method: "POST",
          data: {Posicion: posicion,_token: "{{csrf_token()}}"},
          success: function(result) {
              if (result == 1) {
                  $('#list-productos-carrito').empty();
                  get_carrito();
              }
          }
      })
    }
    function verProducto(id) {
      $.ajax({
          url: "{{route('obtener-detalle-producto-id')}}",
          method: "POST",
          data: {IdProducto: id,_token: "{{csrf_token()}}"},
          success: function(result) {
              let producto = jQuery.parseJSON(result);
              if (producto[0].IDEmpresaProducto == id) {
                  document.getElementById("id_nombre_btm_sheet").innerHTML = producto[0].Nombre;
                  document.getElementById('id_image_btm_sheet').src = producto[0].Archivo;
                  document.getElementById("id_descripcion_btm_sheet").innerHTML = producto[0].Descripcion;
                  document.getElementById("id_marca_btm_sheet").innerHTML = producto[0].Marca;
                  document.getElementById("id_categoria_btm_sheet").innerHTML = producto[0].Categoria;
                  document.getElementById("id_peso_btm_sheet").innerHTML = producto[0].Peso;
                  document.getElementById("id_unidadmedida_btm_sheet").innerHTML = producto[0].UnidadMedida;
                  document.getElementById("id_precio_btm_sheet").innerHTML = producto[0].ValorProducto.toLocaleString('en-US', { style: 'currency', currency: 'USD'});
                  $('#id_nombre_carrito').val(producto[0].Nombre);
                  $('#id_producto_carrito').val(producto[0].IDEmpresaProducto);
                  $('#id_precio_carrito').val(producto[0].ValorProducto);
                  $('#hidden_precio_carrito').val(producto[0].ValorProducto);
                  $(".bottom-sheet").addClass("active"), $(".overlay").addClass("active");
              }
          }
      })
    }
    function get_carrito() {
      $('#list-productos-carrito').empty();
      $.ajax({
          url: "{{route('get-producto-carrito')}}",
          method: "POST",
          data: {_token: "{{csrf_token()}}"},
          success: function(result) {
              let json = jQuery.parseJSON(result);
              if (json == 0) {
                  $("#btn-pedido-vacio").removeClass("d-none");
                  $("#btn-pedido").addClass("d-none");
              } else {
                  $("#btn-pedido").removeClass("d-none");
                  $("#btn-pedido-vacio").addClass("d-none");
                  let lista_item_producto = "";
                  let valorTotal = 0;
                  $.each(json, function(i, item) {
                      let realValor = item.ValorProducto / item.Cantidad;
                      valorTotal = valorTotal + (realValor * item.Cantidad);
                      lista_item_producto += "<a class='list-group-item list-group-item-action bg-white'><div class='row'><div class='col-sm-12 col-md-12 col-lg-12'><h5>" + item.Nombre + "</h5></div><div class='col-sm-6 col-md-6 col-lg-6'>$" + item.ValorProducto + ".00</div><div class='col-sm-6 col-md-6 col-lg-6'>" + item.Cantidad + " Unidades</div><div class='col-sx-6 col-md-6 col-lg-6 pt-1 pb-1'><button class='btn btn-sm btn-outline-primary w-100' onclick='editarproducto(" + item.IDProducto + "," + i + "," + item.Cantidad + ")'><svg class='mb-1' width='1em' height='1em' viewBox='0 0 16 16' class='bi bi-pencil-square' fill='currentColor'><path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/><path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z'/></svg> Editar</button></div><div class='col-sx-6 col-md-6 col-lg-6 pt-1 pb-1'><button class='btn btn-sm btn-primary w-100' onclick='eliminarproducto(" + i + ")'><svg class='mb-1' width='1em' height='1em' viewBox='0 0 16 16' class='bi bi-trash' fill='currentColor'><path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z'/><path fill-rule='evenodd' d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z'/></svg> Eliminar</button></div></div></a>";
                  });
                  $("#list-productos-carrito").append(lista_item_producto);
                  document.getElementById("valor-pedido").innerHTML = valorTotal.toLocaleString('en-US', {style: 'currency', currency: 'USD'});
                  $('#hidden_total_pedido').val(valorTotal);
              }
          }
      })
    }
    function add_producto_carrito() {
      let Nombre = $('#id_nombre_carrito').val();
      let IDProducto = $('#id_producto_carrito').val();
      let Cantidad = $('#id_cantidad_carritto').val();
      let PrecioProducto = $('#id_precio_carrito').val();
      $.ajax({
          url: "{{route('agregar-producto-carrito')}}",
          method: "POST",
          data: {
              IDProducto: IDProducto,
              Nombre: Nombre,
              Cantidad: Cantidad,
              PrecioProducto: PrecioProducto,
              _token: "{{csrf_token()}}"
          },
          success: function(result) {
              $('#id_cantidad_carritto').val(1);
              $(".bottom-sheet").removeClass("active"), $(".overlay").removeClass("active");
          }
      });
    }
    function editarproducto(idproducto, posicion, cantidad) {
      $('#id_cantidad_carritto').val(cantidad);
      $("#btn-agregar-al-carrito").addClass("d-none");
      $("#btn-mod-producto-carrito").removeClass("d-none");
      $('#hidden_modificar_poducto').val(posicion);
      $(".sidebar-right").removeClass("active");
      verProducto(idproducto);
      let precio = $("#hidden_precio_carrito").val();
      let total_precio = precio * cantidad;
      $("#id_precio_btm_sheet").addClass("d-none");
      $("#edit_precio_btm_sheet").removeClass("d-none");
      document.getElementById("edit_precio_btm_sheet").innerHTML = total_precio.toLocaleString('en-US', {style: 'currency',currency: 'USD'});
    }
    function registrarPedido(){
      let TotalPedido = $("#hidden_total_pedido").val();
      $.ajax({
          url: "{{route('insert-pedido-consumidor')}}",
          method: "POST",
          data: {TotalPedido:TotalPedido,_token: "{{csrf_token()}}"},
          success: function(result) {
            if(result==1){
              $("#list-productos-carrito").empty();
              $("#pedido-guardado").removeClass("d-none");
              setTimeout(function() {$('#pedido-guardado').addClass("d-none")}, 3000);
              $("#btn-pedido-vacio").removeClass("d-none");
              $("#btn-pedido").addClass("d-none");
              //$(".sidebar").removeClass("active"),$(".sidebar-right").removeClass("active"),$(".overlay").removeClass("active"),$(".bottom-sheet").removeClass("active");
            }
            else{
              $("#pedido-no-guardado").removeClass("d-none"); 
            }
          }
      });
    }

    $("#reset-filtros").click(function () { 
      $("#id-filter-marca").val(0);
      $("#id-filter-categoria").val(0);
      $("#id-filter-unidadmedida").val(0);      
      obtenerProductosFiltros();
    });

    function filtromarcas(val){$("#id-filter-marca").val(val);obtenerProductosFiltros();}
    function filtrocategorias(val){$("#id-filter-categoria").val(val);obtenerProductosFiltros();}
    function filtrounidadmedida(val){$("#id-filter-unidadmedida").val(val);obtenerProductosFiltros();}
    function obtenerProductosFiltros(){
      let marca = $("#id-filter-marca").val();
      let categoria = $("#id-filter-categoria").val();
      let unidadmedida = $("#id-filter-unidadmedida").val();

      $.ajax({
        url: "{{route('get-productos-filtros-consumidor')}}",
        method: "POST",
        data: {IDMarca:marca,IDCategoria:categoria,IDUnidadMedida:unidadmedida,_token:"{{csrf_token()}}"},
        success: function(result) {
          let json = jQuery.parseJSON(result);
          var items = '';
          $.each(json, function(index, item){items += '<div class="col-sx-12 col-sm-12 col-md-6 col-lg-3 form-group"><button type="button" class="btn border-0 p-0" onclick="verProducto('+item.IDEmpresaProducto+')"><div class="card shadow-sm card-body px-0 py-2"><div class="row"><div class="col-sx-12 col-sm-12 col-md-12 col-lg-12 text-left"><h6>'+item.Nombre+'</h6></div><div class="col-sx-12 col-sm-12 col-md-12 col-lg-12 form-group text-center"><img class="img-producto" src="'+item.Archivo+'" alt="Mis Mandados - '+item.Nombre+'"></div><div class="col-sx-12 col-sm-12 col-md-12 col-lg-12 text-center"><h6>'+item.ValorProducto.toLocaleString('en-US', {style: 'currency', currency: 'USD'})+'</h6></div><div class="col-sx-12 col-sm-12 col-md-12 col-lg-12"><a id="btn-ver-producto" class="btn btn-sm btn-primary w-100">Agregar al carrito <span class="material-icons align-middle">add_shopping_cart</span></a></div></div></div></button></div>';});
          $('#content-productos-empresa').empty();
          $('#content-productos-empresa').html(items);
          $(".sidebar").removeClass("active");
          $(".sidebar-right").removeClass("active");
          $(".overlay").removeClass("active");
        }
      });
    }
  </script>

@endsection      

