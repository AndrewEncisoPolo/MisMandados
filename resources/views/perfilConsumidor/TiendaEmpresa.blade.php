@extends('perfilConsumidor/Consumidor')

@section('consumidor_content')

  <style>
  .btn-pedido{position: absolute;bottom: 65px;margin: 0rem 1rem;width: 93%;}
  .sidebar-heading{padding:.875rem 1.25rem;font-size:1.2rem}.sidebar{width:250px;height:100vh;position:fixed;top:56px;left:-255px;z-index:999;background:#fff;transition:all .3s;text-align:left}.sidebar.active{left:0}.sidebar-right{width:350px;height:100vh;position:fixed;top:56px;right:-355px;z-index:999;background:#fff;transition:all .3s;text-align:left}.sidebar-right.active{right:0}.dismiss{width:35px;height:35px;position:absolute;top:10px;right:10px;transition:all .3s;background:#444;border-radius:4px;text-align:center;line-height:35px;cursor:pointer}
  </style> 

  <!-- SIDEBAR Filtros de búsqueda -->
    <nav class="sidebar bg-white shadow">
        <div class="sidebar-heading"> 
            <h4>Filtros</h4> 
        </div>
        <div class="list-group list-group-flush">
          
            <a data-toggle="collapse" href="#collapse-marcas" role="button" aria-expanded="false" class="dropdown-toggle list-group-item list-group-item-action bg-white">Marca</a>
            <div class="collapse" id="collapse-marcas">
              <div class="card card-body" style="padding-right: 0rem;padding-left: 0rem;">
                @foreach ($data_marca as $item)
                  <a class="dropdown-item" type="button" onclick="filtromarcas({{$item->IDMarca}})">{{$item->Marca}}</a>
                @endforeach
              </div>
            </div>

            <a data-toggle="collapse" href="#collapse-categorias" role="button" aria-expanded="false" class="dropdown-toggle list-group-item list-group-item-action bg-white">Categoría</a>
            <div class="collapse" id="collapse-categorias">
              <div class="card card-body" style="padding-right: 0rem;padding-left: 0rem;">
                @foreach ($data_categorias as $item)
                  <a class="dropdown-item" type="button" onclick="filtrocategorias({{$item->IDCategoria}})">{{$item->Categoria}}</a>
                @endforeach
              </div>
            </div>

            <a data-toggle="collapse" href="#collapse-unidadmedida" role="button" aria-expanded="false" class="dropdown-toggle list-group-item list-group-item-action bg-white">Unidad de Medida</a>
            <div class="collapse" id="collapse-unidadmedida">
              <div class="card card-body" style="padding-right: 0rem;padding-left: 0rem;">
                @foreach ($data_unidadmedida as $item)
                  <a class="dropdown-item" type="button" onclick="filtrounidadmedida({{$item->IDUnidadMedida}})">{{$item->UnidadMedida}}</a>
                @endforeach
              </div>
            </div>

        </div> 
    </nav>
                  
  <!-- SIDEBAR Carrito de Compras -->
    <nav class="sidebar-right bg-white shadow">
        <div class="sidebar-heading"> 
            <h4>Carrito de Compras</h4> 
        </div>
        <div id="list-productos-carrito" class="list-group list-group-flush">
          <button class="btn btn-sm btn-danger btn-pedido"><a id="texto-pedido"></a>&nbsp;<a id="valor-pedido"></a></button>
        </div> 
    </nav>
              
  <!-- Bottom sheet DETALLE PRODUCTO -->
    <nav class="bottom-sheet bg-white shadow">
        <div class="row" style="padding-top:0.8rem;">
            <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <h3 id="id_nombre_btm_sheet"></h3> 
            </div>
            <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-4 col-lg-4 text-center">
                <img id="id_image_btm_sheet" style="height:200px;">
            </div>
            <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-8 col-lg-8">
                <div class="row">
                    <div class="col-xsm-12 col-xs-6 col-sm-3 col-md-6 col-lg-6 form-group">
                        <b>Marca</b><br>
                        <a id="id_marca_btm_sheet" class="text-muted" style="text-decoration:none;word-wrap: break-word;"></a>
                    </div>
                    <div class="col-xsm-12 col-xs-6 col-sm-3 col-md-6 col-lg-6 form-group">
                        <b>Categoría</b><br>
                        <a id="id_categoria_btm_sheet" class="text-muted" style="text-decoration:none;word-wrap: break-word;"></a>
                    </div>
                    <div class="col-xsm-12 col-xs-6 col-sm-3 col-md-6 col-lg-6 form-group">
                      <b>Peso</b><br>
                      <a id="id_peso_btm_sheet" class="text-muted" style="text-decoration:none;word-wrap: break-word;"></a>
                      <a id="id_unidadmedida_btm_sheet" class="text-muted" style="text-decoration:none;word-wrap: break-word;"></a>
                    </div>
                    <div class="col-xsm-12 col-xs-6 col-sm-3 col-md-6 col-lg-6 form-group">
                      <b>Precio</b><br>
                      <a id="id_precio_btm_sheet" class="text-muted" style="text-decoration:none;word-wrap: break-word;"></a>
                    </div>
                    <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group">
                      <b>Descripción</b><br>
                      <a id="id_descripcion_btm_sheet" class="text-muted" style="text-decoration:none;word-wrap: break-word;"></a>
                    </div>
                </div> 
            </div>
            <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-12 col-lg-12">
              <div class="dropdown-divider"></div>
            </div>

            <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group text-center">
              <b>Cantidad</b><br>
              <div class="btn-group btn-group-sm pt-1" role="group">
                <button id="btn-group-less" type="button" class="btn btn-sm btn-outline-danger">
                  <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-dash" fill="currentColor" ><path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z"/></svg>
                </button>
                <input id="id_cantidad_carritto" class="form-control-sm w-100" type="text" value="1" onkeypress="isInputNumber(event)" style="text-align: center;border: none;">
                <button id="btn-group-add" type="button" class="btn btn-sm btn-outline-danger">
                  <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-plus" fill="currentColor" ><path fill-rule="evenodd" d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/></svg>
                </button>
              </div>
            </div>
            <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group">
                <input id="id_producto_carrito" type="hidden" >
                <input id="id_precio_carrito" type="hidden">
                <input id="id_nombre_carrito" type="hidden">
                <button onclick="agreagaralCarrito()" id="btn-agregar-al-carrito" class="btn btn-sm btn-danger w-100">Agregar al carrito 
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

        <div class="col-xs-12 col-md-12 col-md-12 col-lg-12">
          <div class="form-group">
            <div class="card shadow-sm" style="min-height: 45vh;border-top-left-radius: 0rem;border-top-right-radius: 0rem;">
              <div class="card-body pt-0">
                <div class="row">

                  @foreach ($data_empresa as $info)
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 from-group text-center">
                      <div style="top:-80px;height: 10rem;">
                        <div id="imgPortada" onclick="verImagen()" style="cursor:pointer;background:url({{$info->ImagenPortada}});width:100%;margin:0 auto;background-size: cover;background-position: center;height: 15rem;border-bottom-left-radius: 1rem;border-bottom-right-radius: 1rem;"></div>
                      </div>
                      <div class="col-xs-12 col-md-12 col-md-12 col-lg-12 form-group text-center">
                        <div class="rounded-circle shadow-sm bg-white mb-2" id="imgPerfil" onclick="verImagen()" style="cursor:pointer;background:url({{$info->ImagenPerfil}});height:115px;width:115px;z-index: 100;margin-bottom: -2rem;margin:0 auto;background-size: contain;background-repeat: no-repeat;background-position: center;"></div>
                      </div>
                      <div class="col-xs-12 col-md-12 col-md-12 col-lg-12 form-group text-center">
                        <h3>{{ $info->Nombre }}</h3>    
                      </div>
                    </div>

                    <!-- Información de la empresa -->
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="collapse" id="collapse-more-info">
                      <div class="row bg-white pl-2 pr-2">
                          <div class="col-xs-12 col-md-12 col-md-12 col-lg-12 form-group">
                              <h5>Información</h5>
                          </div>
                          <div class="col-xs-12 col-md-12 col-md-6 col-lg-3 form-group">
                            <small>
                              <b>Email</b><br>
                              <a class="text-muted" style="text-decoration:none;">{{ $info->Email }}</a>
                            </small>
                          </div>
                          <div class="col-xs-12 col-md-12 col-md-6 col-lg-3 form-group">
                            <small>
                              <b>Teléfono / Tel. Celular</b><br>
                              <a class="text-muted" style="text-decoration:none;">{{ $info->Telefono }} / {{ $info->TelefonoCelular }}</a>
                            </small>
                          </div>
                          <div class="col-xs-12 col-md-12 col-md-6 col-lg-3 form-group">
                            <small>
                              <b>Dirección</b><br>
                              <a class="text-muted" style="text-decoration:none;">{{ $info->Direccion }}</a>
                            </small>
                          </div>
                          <div class="col-xs-12 col-md-12 col-md-6 col-lg-3 form-group">
                            <small>
                              <b>Ubicación</b><br>
                              <a class="text-muted" style="text-decoration:none;">{{ $info->Barrio }} ({{ $info->Ciudad }})</a>
                            </small>
                          </div>
                      </div>
                    </div>
                  </div>
                  @endforeach


                <div class="col-xs-12 col-md-12 col-md-12 col-lg-12 text-center">
                    <button id="btn-more-info" class="btn btn-light text-center" type="button" style="border-radius: 45%;">
                      <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-three-dots" fill="currentColor"><path fill-rule="evenodd" d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"/></svg>
                    </button>
                </div>

                </div> 
              </div>
            </div>
          </div>
        </div>

        <div class="col-xs-12 col-md-12 col-md-12 col-lg-12">
          <div class="form-group">
            
            <div class="card shadow-sm">
              <div class="card-body">
                <div class="wrapper">
                    <div class="content">
                      <div class="row">

                        <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group d-flex justify-content-between">
                                <button id="sidebar-filtros" class="btn btn-danger text-white shadow-sm btn-sm" id="menu-toggle">
                                    <span class="text-responsive">Ver Filtros</span>
                                    <svg width="1.2rem" height="1.2rem" viewBox="0 0 16 16" class="bi bi-funnel" fill="currentColor" style="margin-bottom: 4px;"><path fill-rule="evenodd" d="M1.5 1.5A.5.5 0 0 1 2 1h12a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.128.334L10 8.692V13.5a.5.5 0 0 1-.342.474l-3 1A.5.5 0 0 1 6 14.5V8.692L1.628 3.834A.5.5 0 0 1 1.5 3.5v-2zm1 .5v1.308l4.372 4.858A.5.5 0 0 1 7 8.5v5.306l2-.666V8.5a.5.5 0 0 1 .128-.334L13.5 3.308V2h-11z"/></svg>
                                </button>

                                <button id="sidebar-carrito" onclick="verCarrito()" class="btn btn-danger text-white shadow-sm btn-sm" id="menu-toggle-right">
                                    <span class="text-responsive">Ver Carrito</span>
                                    <svg width="1.2rem" height="1.2rem" viewBox="0 0 16 16" class="bi bi-cart-plus" fill="currentColor" style="margin-bottom: 4px;"><path fill-rule="evenodd" d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm7 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/><path fill-rule="evenodd" d="M8.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H9v1.5a.5.5 0 0 1-1 0V8H6.5a.5.5 0 0 1 0-1H8V5.5a.5.5 0 0 1 .5-.5z"/></svg>
                                </button>
                            </div>
                        </div>

                      </div>
                      <div class="row">
                        <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group">
                          <h3>Lista de Productos</h3>
                        </div>
                          @foreach ($producto_empresa as $producto)
                            <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-6 col-lg-3 form-group">
                              <form action="javascript:;" onsubmit="verProducto({{$producto->IDProducto}})">
                                  @csrf
                                  <button type="submit" class="btn" style="border:none;padding:0rem;">
                                      <div class="card shadow-sm card-body" style="padding: 0.6rem 0rem;">
                                          <div class="row">
                                              <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 text-left">
                                                  <h6>{{ $producto->Nombre }}</h6>
                                              </div>
                                              <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group text-center">
                                                  <img src="{{$producto->Archivo}}" style="height:150px;">
                                              </div>
                                              <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
                                                <h6>
                                                  ${{number_format($producto->ValorProducto, 2, ",", ".")}}
                                                </h6>
                                              </div>
                                              <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                  <a id="btn-ver-producto" class="btn btn-sm btn-danger" style="width: 100%;">Agregar al carrito 
                                                    <svg width="1.2em" height="1.2em" viewBox="0 1 16 16" class="bi bi-cart-plus" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                      <path fill-rule="evenodd" d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm7 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
                                                      <path fill-rule="evenodd" d="M8.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H9v1.5a.5.5 0 0 1-1 0V8H6.5a.5.5 0 0 1 0-1H8V5.5a.5.5 0 0 1 .5-.5z"/>
                                                    </svg>
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


                </div>
              </div>
            </div>

          </div>
        </div>

      </div>
  </div>

  <script>
    function eliminarproducto(posicion){
      alert(posicion);
    }

    function editarproducto(idproducto,posicion){
      alert(idproducto);
      alert(posicion);
    }

    
    
    function filtromarcas(val){
      alert(val);
    }

    function filtrocategorias(val){
      alert(val);
    }

    function filtrounidadmedida(val){
      alert(val);
    }



    function isInputNumber(evt){var ch = String.fromCharCode(evt.which);if(!(/[0-9]/.test(ch))){evt.preventDefault();}}
    
    $(function(){$('#btn-more-info').on('click', function(e){$('#collapse-more-info').collapse('toggle');})});jQuery(document).ready(function(){$(".overlay").on("click",function(){$(".sidebar").removeClass("active"),$(".sidebar-right").removeClass("active"),$(".overlay").removeClass("active")}),$("#sidebar-filtros").on("click",function(a){a.preventDefault(),$(".sidebar").addClass("active"),$(".overlay").addClass("active")}),$("#sidebar-carrito").on("click",function(a){a.preventDefault(),$(".sidebar-right").addClass("active"),$(".overlay").addClass("active")})});
    
    function verProducto(id){
        $.ajax({
            url:"{{route('obtener-detalle-producto-id')}}",
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
                    document.getElementById("id_peso_btm_sheet").innerHTML = producto[0].Peso;
                    document.getElementById("id_unidadmedida_btm_sheet").innerHTML = producto[0].UnidadMedida;
                    document.getElementById("id_precio_btm_sheet").innerHTML = producto[0].ValorProducto.toLocaleString('en-US', { style: 'currency', currency: 'USD' });
                    $('#id_nombre_carrito').val(producto[0].Nombre); 
                    $('#id_producto_carrito').val(producto[0].IDProducto);    
                    $('#id_precio_carrito').val(producto[0].ValorProducto);         
                    $(".bottom-sheet").addClass("active"), $(".overlay").addClass("active");
                }
            }
        })
    }

    

    function verCarrito(){
      $.ajax({
          url:"{{route('get-producto-carrito')}}",
          method:"POST",
          data:{_token:"{{csrf_token()}}"},
          success:function(result)
          { 
            var json = jQuery.parseJSON(result);
            if(json==0){}
            else{
              var lista = "";
              var valorTotal = 0;
              $.each(json, function(i, item) {
                var subTotal = 0; 
                valorTotal = valorTotal + (item.ValorProducto * item.Cantidad);
                lista += "<a class='list-group-item list-group-item-action bg-white'><div class='row'><div class='col-sm-12 col-md-12 col-lg-12'><h6>"+item.Nombre+"</h6></div><div class='col-sm-6 col-md-6 col-lg-6'>$"+item.ValorProducto+".00</div><div class='col-sm-6 col-md-6 col-lg-6'>"+item.Cantidad+" Unidades</div><div class='col-xs-6 col-md-6 col-md-6 col-lg-6 form-group pt-1'><button class='btn btn-sm btn-outline-danger w-100' onclick='editarproducto("+item.IDProducto+","+i+")'><svg class='mb-1' width='1em' height='1em' viewBox='0 0 16 16' class='bi bi-pencil-square' fill='currentColor'><path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/><path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z'/></svg> Editar</button></div><div class='col-xs-6 col-md-6 col-md-6 col-lg-6 form-group pt-1'><button class='btn btn-sm btn-danger w-100' onclick='eliminarproducto("+i+")'><svg class='mb-1' width='1em' height='1em' viewBox='0 0 16 16' class='bi bi-trash' fill='currentColor'><path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z'/><path fill-rule='evenodd' d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z'/></svg> Eliminar</button></div></div></a>";
              });
              $("#list-productos-carrito").append(lista);
              console.log(valorTotal.toLocaleString('en-US', { style: 'currency', currency: 'USD' }));  
            }
          }
      })
    }

    function agreagaralCarrito(){
      var Nombre = $('#id_nombre_carrito').val();
      var IDProducto = $('#id_producto_carrito').val();
      var Cantidad = $('#id_cantidad_carritto').val();
      var PrecioProducto = $('#id_precio_carrito').val();
      $.ajax({
          url:"{{route('agregar-producto-carrito')}}",
          method:"POST",
          data:{IDProducto:IDProducto,Nombre:Nombre,Cantidad:Cantidad,PrecioProducto:PrecioProducto,_token:"{{csrf_token()}}"},
          success:function(result)
          {
            $('#id_cantidad_carritto').val(1);
            $(".bottom-sheet").removeClass("active"),$(".overlay").removeClass("active");
          }
      })
    }

    jQuery(document).ready(function () {
        $("#btn-group-add").on("click", function () {
          var iterador = parseInt($("#id_cantidad_carritto").val()) + 1;
          $("#id_cantidad_carritto").val(iterador);
          $("#btn-agregar-al-carrito").removeAttr("disabled");
        })
        $("#btn-group-less").on("click", function () {
          if(!parseInt($("#id_cantidad_carritto").val())==0){
              var iterador = parseInt($("#id_cantidad_carritto").val()) - 1;
              $("#id_cantidad_carritto").val(iterador);
              if(!iterador==0){$("#btn-agregar-al-carrito").removeAttr("disabled");}
              else{$("#btn-agregar-al-carrito").attr('disabled','disabled');}
          }else{$("#btn-agregar-al-carrito").attr('disabled','disabled');}
        }) 

        $(".overlay").on("click", function () {
            $(".bottom-sheet").removeClass("active"), $(".overlay").removeClass("active");
            $('#list-productos-carrito').empty();
        }),
        $("#sidebar-filtros").on("click", function (a) {
            a.preventDefault(), $(".sidebar").addClass("active"), $(".overlay").addClass("active");
        })
    });
  </script>

@endsection

