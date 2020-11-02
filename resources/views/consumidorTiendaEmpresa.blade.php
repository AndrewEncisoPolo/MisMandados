@extends('perfilConsumidor')

@section('consumidor_content')

  <style>
  .sidebar-heading{padding:.875rem 1.25rem;font-size:1.2rem}.sidebar{width:250px;height:100vh;position:fixed;top:56px;left:-255px;z-index:999;background:#fff;transition:all .3s;text-align:left}.sidebar.active{left:0}.sidebar-right{width:350px;height:100vh;position:fixed;top:56px;right:-355px;z-index:999;background:#fff;transition:all .3s;text-align:left}.sidebar-right.active{right:0}.dismiss{width:35px;height:35px;position:absolute;top:10px;right:10px;transition:all .3s;background:#444;border-radius:4px;text-align:center;line-height:35px;cursor:pointer}
  </style> 

      <!-- SIDEBAR Filtros de búsqueda -->
      <nav class="bg-light sidebar shadow">
            <div class="sidebar-heading"> 
                <h4>Filtros</h4> 
            </div>
            <div class="list-group list-group-flush">
                <a href="#" class="list-group-item list-group-item-action bg-light">Dashboard</a>
                <a href="#" class="list-group-item list-group-item-action bg-light">Shortcuts</a>
                <a href="#" class="list-group-item list-group-item-action bg-light">Overview</a>
                <a href="#" class="list-group-item list-group-item-action bg-light">Events</a>
                <a href="#" class="list-group-item list-group-item-action bg-light">Profile</a>
                <a href="#" class="list-group-item list-group-item-action bg-light">Status</a>
            </div> 
        </nav>
                  
      <!-- SIDEBAR Carrito de Compras -->
          <nav class="bg-light sidebar-right shadow">
              <div class="sidebar-heading"> 
                  <h4>Carrito de Compras</h4> 
              </div>
              <div class="list-group list-group-flush">
                  <a href="#" class="list-group-item list-group-item-action bg-light">Dashboard</a>
                  <a href="#" class="list-group-item list-group-item-action bg-light">Shortcuts</a>
                  <a href="#" class="list-group-item list-group-item-action bg-light">Overview</a>
                  <a href="#" class="list-group-item list-group-item-action bg-light">Events</a>
                  <a href="#" class="list-group-item list-group-item-action bg-light">Profile</a>
                  <a href="#" class="list-group-item list-group-item-action bg-light">Status</a>
              </div> 
          </nav>
              
          <div class="overlay"></div>

  <div class="container" style="margin-top:56px;">
                      
      <div class="row" style="padding-top:1rem;">

        <div class="col-xs-12 col-md-12 col-md-12 col-lg-12">
          <div class="form-group">


          <div class="card shadow-sm" style="border-top-left-radius: 0rem;border-top-right-radius: 0rem;">
            
              <div class="card-body">
                    @foreach ($data_empresa as $info)
                      <div class="row">
                        <div class="col-xs-12 col-md-12 col-md-12 col-lg-12" style="top: -80px;height: 20rem;">
                          <div class="from-group text-center">
                            <div style="width:100%;margin:0 auto;background:url({{$info->ImagenPortada}});background-size: cover;background-position: center;height: 25rem;border-bottom-left-radius: 1rem;border-bottom-right-radius: 1rem;">    
                            </div>
                          </div>
                        </div>
                        <div class="col-xs-12 col-md-12 col-md-12 col-lg-12 text-center">
                          <div class="from-group">
                            @if ($info->ImagenPerfil == NULL)
                            <img src="../resources/img/avatar.png" style="border-radius: 50%;width: 115px;position: relative;top: -60px;z-index: 100;margin-bottom: -2rem;">
                            @else
                            <img src="{{$info->ImagenPerfil}}" style="border-radius: 50%;width: 115px;position: relative;top: -60px;z-index: 100;margin-bottom: -2rem;">  
                            @endif  
                          </div>
                        </div>
                      </div>
                    
                      <div class="row">
                          <div class="col-xs-12 col-md-12 col-md-12 col-lg-12 text-center">
                            <div class="from-group">
                                <h4>{{ $info->Nombre }}</h4>
                            </div>
                          </div>
                      </div>

                  <!-- Información de la empresa -->
                    <div class="collapse" id="collapse-more-info">
                        <div class="row" style="background-color: #ffffffd9;padding-left: 1rem;padding-right: 1rem;">
                            <div class="col-xs-12 col-md-12 col-md-12 col-lg-12">
                              <div class="form-group">
                                <br>
                                <h4>Información</h4>
                              </div>
                            </div>
                            <div class="col-xs-12 col-md-12 col-md-6 col-lg-3">
                              <div class="form-group">
                                <b>Email</b><br>
                                <a class="text-muted" style="text-decoration:none;">{{ $info->Email }}</a>
                              </div>
                            </div>

                            <div class="col-xs-12 col-md-12 col-md-6 col-lg-3">
                              <div class="form-group">
                                <b>Teléfono / Tel. Celular</b><br>
                                <a class="text-muted" style="text-decoration:none;">{{ $info->Telefono }} / {{ $info->TelefonoCelular }}</a>
                              </div>
                            </div>

                            <div class="col-xs-12 col-md-12 col-md-6 col-lg-3">
                              <div class="form-group">
                                <b>Ubicación</b><br>
                                <a class="text-muted" style="text-decoration:none;">{{ $info->Departamento }},&nbsp;{{ $info->Ciudad }},&nbsp;{{ $info->Localidad }},&nbsp;{{ $info->Barrio }}.</a>
                              </div>
                            </div>

                            <div class="col-xs-12 col-md-12 col-md-6 col-lg-3">
                              <div class="form-group">
                                <b>Dirección</b><br>
                                <a class="text-muted" style="text-decoration:none;">{{ $info->Direccion }}</a>
                              </div>
                            </div>

                        </div>
                    </div>
                    @endforeach

                    <div class="row" style="margin-top: 10px;">
                      
                      <div class="col-xs-12 col-md-12 col-md-12 col-lg-12 text-center">
                        <div class="from-group" style="margin-bottom: 10px;">
                          <button id="btn-more-info" class="btn btn-light text-center" type="button" style="border-radius: 45%;">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-three-dots" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                              <path fill-rule="evenodd" d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"/>
                            </svg>
                          </button>
                        </div>
                      </div>
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
                                <button id="sidebar-filtros" class="btn btn-danger text-white shadow-sm" id="menu-toggle">
                                    <span class="text-responsive">Ver Filtros</span>
                                    <svg width="1.2rem" height="1.2rem" viewBox="0 0 16 16" class="bi bi-funnel" fill="currentColor" style="margin-bottom: 4px;"><path fill-rule="evenodd" d="M1.5 1.5A.5.5 0 0 1 2 1h12a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.128.334L10 8.692V13.5a.5.5 0 0 1-.342.474l-3 1A.5.5 0 0 1 6 14.5V8.692L1.628 3.834A.5.5 0 0 1 1.5 3.5v-2zm1 .5v1.308l4.372 4.858A.5.5 0 0 1 7 8.5v5.306l2-.666V8.5a.5.5 0 0 1 .128-.334L13.5 3.308V2h-11z"/></svg>
                                </button>

                                <button id="sidebar-carrito" class="btn btn-danger text-white shadow-sm" id="menu-toggle-right">
                                    <span class="text-responsive">Ver Carrito</span>
                                    <svg width="1.2rem" height="1.2rem" viewBox="0 0 16 16" class="bi bi-cart-plus" fill="currentColor" style="margin-bottom: 4px;"><path fill-rule="evenodd" d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm7 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/><path fill-rule="evenodd" d="M8.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H9v1.5a.5.5 0 0 1-1 0V8H6.5a.5.5 0 0 1 0-1H8V5.5a.5.5 0 0 1 .5-.5z"/></svg>
                                </button>
                            </div>
                        </div>

                        <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                          <div class="form-group">
                            
                          </div>
                        </div>

                      </div>
                      <div class="row">
                        <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group">
                          <h1>Lista de Productos</h1>
                        </div>
                          @foreach ($producto_empresa as $producto)
                            <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-6 col-lg-3 form-group">
                              <div class="card card-body" style="border: 1px Solid rgb(233, 233, 233)">
                                <div class="row">
                                  <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group" style="height:55px;">
                                      <h5>{{ $producto->Nombre }}</h5>
                                  </div>
                                  <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group text-center">
                                      <input type="image" src="{{$producto->Archivo}}" style="height:150px;">
                                  </div>
                                  <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 text-left form-group">
                                      <b>Marca</b>
                                      <a class="text-muted" style="text-decoration:none;">{{ $producto->Marca }}</a>
                                  </div>
                                  <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 text-left form-group">
                                      <b>Categoría</b>
                                      <a class="text-muted" style="text-decoration:none;">{{ $producto->Categoria }}</a>
                                  </div>
                              </div>
                              </div>
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
    $(function(){$('#btn-more-info').on('click', function(e){$('#collapse-more-info').collapse('toggle');})});jQuery(document).ready(function(){$(".overlay").on("click",function(){$(".sidebar").removeClass("active"),$(".sidebar-right").removeClass("active"),$(".overlay").removeClass("active")}),$("#sidebar-filtros").on("click",function(a){a.preventDefault(),$(".sidebar").addClass("active"),$(".overlay").addClass("active")}),$("#sidebar-carrito").on("click",function(a){a.preventDefault(),$(".sidebar-right").addClass("active"),$(".overlay").addClass("active")})});
  </script>

@endsection