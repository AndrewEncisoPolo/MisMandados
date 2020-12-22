@extends('perfilEmpresa/Empresa')
@section('empresa_content')

<script src="../resources/js/pagination.min.js"></script>

  <div class="container" style="margin-top:56px;">
    <div class="row">
      <div class="col-xs-12 col-md-12 col-md-12 col-lg-12 form-group">
          <div class="card card-body shadow-sm pt-0" style="border-top-left-radius: 0rem;border-top-right-radius: 0rem;">
              @foreach ($info_usuario as $info)
              <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 from-group">
                      <div style="top:-80px;height: 10rem;">
                          <div id="imgPortada" onclick="verImagen()" style="cursor:pointer;background:url({{$info->ImagenPortada}});width:100%;margin:0 auto;background-size: cover;background-position: center;height: 15rem;border-bottom-left-radius: 1rem;border-bottom-right-radius: 1rem;">    
                          </div>
                      </div>
                      <div class="col-xs-12 col-md-12 col-md-12 col-lg-12 from-group text-center">
                          <div class="rounded-circle shadow-sm bg-white mb-2" id="imgPerfil" onclick="verImagen()" style="cursor:pointer;background:url({{$info->ImagenPerfil}});height:115px;width:115px;z-index: 100;margin-bottom: -2rem;margin:0 auto;background-size: contain;background-repeat: no-repeat;background-position: center;">    
                          </div>
                      </div>
                      <div class="col-xs-12 col-md-12 col-md-12 col-lg-12 from-group text-center">
                          <h4>{{ $info->Nombre }}</h4>
                      </div>
                  </div>
              </div>
              @endforeach
          </div>
      </div>
      <div class="col-xs-12 col-md-12 col-md-12 col-lg-4">
        <div class="form-group">
          <div class="card shadow-sm card-body">
              <h5 class="mb-0" data-toggle="collapse" href="#collapseInfomacionPerfil" role="button" aria-expanded="false" aria-controls="collapseExample">
                  Información<a id="arrow-down-dropdown" class="dropdown-toggle text-dark float-right d-none"></a>
              </h5>
              <div id="collapseInfomacionPerfil">
                <div class="row">
                  @foreach ($info_usuario as $info)
                    <div class="col-xs-12 col-md-12 col-md-12 col-lg-12 form-group">
                      <small>
                        <b>Email</b><br>
                        <a class="text-muted text-decoration-none">{{ $info->Email }}</a>
                      </small>
                    </div>
                    <div class="col-xs-12 col-md-12 col-md-12 col-lg-12 form-group">
                      <small>
                        <b>Teléfono Celular</b><br>
                        <a class="text-muted text-decoration-none">{{ $info->TelefonoCelular }}</a>
                      </small>
                    </div>
                    <div class="col-xs-12 col-md-12 col-md-12 col-lg-12 form-group">
                      <small>
                        <b>Teléfono</b><br>
                        <a class="text-muted text-decoration-none">{{ $info->Telefono }}</a>
                      </small>
                    </div>
                    <div class="col-xs-12 col-md-12 col-md-12 col-lg-12 form-group">
                      <small>
                        <b>Ubicación</b><br>
                        <a class="text-muted text-decoration-none">{{ $info->Departamento }},&nbsp;{{ $info->Ciudad }},&nbsp;{{ $info->Localidad }},&nbsp;{{ $info->Barrio }}.</a>
                      </small>
                    </div>
                    <div class="col-xs-12 col-md-12 col-md-12 col-lg-12 form-group">
                      <small>
                        <b>Dirección</b><br>
                        <a class="text-muted text-decoration-none">{{ $info->Direccion }}</a>
                      </small>
                    </div>
                  @endforeach
                </div>
              </div>
            </div>
        </div>
      </div>
      <div class="col-xs-12 col-md-12 col-md-12 col-lg-8 form-group">
          <div class="card shadow-sm card-body"style="min-height:490px;">
            <h5 class="mb-0">Mis Pedidos 
              <a id="btn-actualizar-pedidos" class="btn btn-sm float-right btn-actualizar-pedidos hover-btn" title="Actualizar"><span class="material-icons align-middle">update</span></a>
            </h5>
            <div class="row">
              <div class="card card-body p-item-pedido mb-1 w-100">
                <div class="row"><div class="col-xs-1 col-sx-1 col-sm-1 col-md-1 col-lg-1 px-0">
                  <div class="row"><div class="col-xs-12 col-sx-12 col-sm-12 col-md-12 col-lg-12 px-2">
                    &nbsp;
                  </div>
                </div>
              </div>
              <div class="col-xs-11 col-sx-11 col-sm-11 col-md-11 col-lg-11 px-0">
                <div class="row">
                  <div class="col-xs-4 col-sx-4 col-sm-4 col-md-4 col-lg-4 px-2"><b>Consumidor</b></div>
                  <div class="col-xs-3 col-sx-3 col-sm-3 col-md-3 col-lg-3 px-2"><b>Estado</b></div>
                  <div class="col-xs-3 col-sx-3 col-sm-3 col-md-3 col-lg-3 px-2"><b>Val. Total</b></div>
                  <div class="col-xs-2 col-sx-2 col-sm-2 col-md-2 col-lg-2 px-2"><b>Fecha</b></div>
                </div>
              </div>
            </div>
          </div>
            <div id="data-container"></div>
            <div id="pagination-container" class="paginator-div"></div>
          </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="modal-detalle-pedido" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <input type="hidden" id="hidden-id-pedido">
          <h4 class="modal-title" id="id_modal_titulo"></h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body pt-0">
          <div class="row">
            <div class="col-xs-12 col-sx-12 col-sm-6 col-md-6 col-lg-6">
              @foreach ($info_usuario as $info)
              <small><label class="m-0"><b>Empresa</b></label></small>
              <p class="m-0 text-muted">{{$info->Nombre}}</p>
              @endforeach
              <small><label class="m-0"><b>Estado del Pedido</b></label></small>
              <p id="id_modal_estado_pedido" class="m-0 text-muted"></p>
            </div>
            <div class="col-xs-12 col-sx-12 col-sm-6 col-md-6 col-lg-6">
              <small><label class="m-0"><b>Fecha</b></label></small>
              <p id="id_modal_fecha" class="m-0 text-muted"></p>
            </div>
            <div class="col-xs-12 col-sx-12 col-sm-12 col-md-12 col-lg-12">
              <div class="dropdown-divider w-100 h-100"></div>
            </div>
              <div class="col-xs-12 col-sx-12 col-sm-6 col-md-6 col-lg-4">
                <small><label class="m-0"><b>Cliente</b></label></small>
                <p id="id_modal_nombre_cliente" class="m-0 text-muted"></p>
              </div>
              <div class="col-xs-12 col-sx-12 col-sm-6 col-md-6 col-lg-4">
                  <small><label class="m-0"><b>Dirección</b></label></small>
                  <p id="id_modal_direccion_cliente" class="m-0 text-muted"></p>
              </div>
              <div class="col-xs-12 col-sx-12 col-sm-6 col-md-6 col-lg-4">
                  <small><label class="m-0"><b>Teléfono</b></label></small>
                  <p id="id_modal_telefono_cliente" class="m-0 text-muted"></p>
              </div>
            <div class="col-xs-12 col-sx-12 col-sm-12 col-md-12 col-lg-12">
              <div class="dropdown-divider w-100 h-100"></div>
            </div>
            <div class="col-xs-12 col-sx-12 col-sm-12 col-md-12 col-lg-12 form-group">
              <div class="row">
                <div class="col-xs-5 col-sx-5 col-sm-5 col-md-5 col-lg-7 px-2"><b>Descripción</b></div>
                <div class="col-xs-1 col-sx-1 col-sm-1 col-md-1 col-lg-1 px-2"><b class="cant">Cant.</b><b class="sim-cant">#</b></div>
                <div class="col-xs-3 col-sx-3 col-sm-3 col-md-3 col-lg-2 px-2"><b>Val. Unit.</b></div>
                <div class="col-xs-3 col-sx-3 col-sm-3 col-md-3 col-lg-2 px-2"><b>Total</b></div>
              </div>
            </div>
            <div class="col-xs-12 col-sx-12 col-sm-12 col-md-12 col-lg-12">
              <div id="data-container-detalle" class="w-100 h-100"></div>
            </div>
            <div class="col-xs-12 col-sx-12 col-sm-12 col-md-12 col-lg-12 form-group">
              <div class="dropdown-divider w-100 h-100"></div>
            </div>
            <div class="col-xs-12 col-sx-12 col-sm-12 col-md-12 col-lg-12 form-group">
              <h4 class="float-left">Total Pedido</h4>
              <h4 id="id_modal_total_pedido" class="float-right"></h4>
            </div>
            <div id="col-tomar-pedido" class="col-xs-12 col-sx-12 col-sm-12 col-md-12 col-lg-12">
              <button id="btn-modal_tomar_pedido" class="btn btn-sm btn-primary w-100" type="button">Tomar Pedido</button>
            </div>
            <div id="col-cancelar-pedido" class="col-xs-12 col-sx-12 col-sm-12 col-md-6 col-lg-6">
              <button id="btn-modal_cancelar_pedido" class="btn btn-sm btn-outline-primary w-100" type="button">Cancelar Pedido</button>
            </div>
            <div id="col-despachar-pedido" class="col-xs-12 col-sx-12 col-sm-12 col-md-6 col-lg-6">
              <button id="btn-modal_despachar_pedido" class="btn btn-sm btn-primary w-100" type="button">Despachar Pedido</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    $(function(){$('#btn-more-info').on('click', function(e){$('#collapse-more-info').collapse('toggle');})});

    $(window).resize(function() {
      if (window.innerWidth <= 992){$("#arrow-down-dropdown").removeClass("d-none");$("#collapseInfomacionPerfil").addClass("collapse");}
      else{$("#arrow-down-dropdown").addClass("d-none");$("#collapseInfomacionPerfil").removeClass("collapse");}
    });

    $(document).ready(function() {getPedidos();resetAll()});

    $("#btn-actualizar-pedidos").on("click", function(a) {getPedidos();})

    function getPedidos() {
      var _token = "{{csrf_token()}}";
      $.ajax({
          url:"{{route('get-pedido-perfil-empresa')}}",
          method:"POST",
          data:{_token:_token},
          success:function(result)
          {
            var json = jQuery.parseJSON(result);
            $('#pagination-container').pagination({
                dataSource: json,
                pageSize: 6,
                showPageNumbers: false,
                showNavigator: true,
                callback: function(data, pagination) {
                    var html = itemPedido(data);
                    $('#data-container').html(html);
                }
            });
          }
        })
    }

    function itemPedido(data) {
      let html = '';
      data.forEach(item => html += '<button class="btn p-0 w-100 text-left" onclick="detallePedido('+item.IDPedido+')"><div class="item-pedido card card-body p-item-pedido cursor-pointer mb-1 w-100"><div class="row"><div class="col-xs-1 col-sx-1 col-sm-1 col-md-1 col-lg-1 px-0"><div class="row"><div class="col-xs-12 col-sx-12 col-sm-12 col-md-12 col-lg-12 px-2"><a title="Ver">'+(item.IDEstadoPedido === 1 ? '<span class="material-icons icon-mt text-primary">shopping_basket</span>': (item.IDEstadoPedido === 2 ? '<span class="material-icons icon-mt text-warning">shopping_basket</span>': (item.IDEstadoPedido === 3 ? '<span class="material-icons icon-mt text-success">shopping_basket</span>':'<span class="material-icons icon-mt text-dark">shopping_basket</span>')))+'</a></div></div></div><div class="col-xs-11 col-sx-11 col-sm-11 col-md-11 col-lg-11 px-0"><div class="row"><div class="col-xs-4 col-sx-4 col-sm-4 col-md-4 col-lg-4 px-2">'+item.NombreCliente+'</div><div class="col-xs-3 col-sx-3 col-sm-3 col-md-3 col-lg-3 px-2">'+item.EstadoPedido+'</div><div class="col-xs-3 col-sx-3 col-sm-3 col-md-3 col-lg-3 px-2">'+item.ValorTotal.toLocaleString('en-US', {style: 'currency', currency: 'USD'})+'</div><div class="col-xs-2 col-sx-2 col-sm-2 col-md-2 col-lg-2 px-2">'+new Date(Date.parse(item.FechaRegistro)).toLocaleString('default',{day: 'numeric', month: 'numeric'})+'</div></div></div></div></div></button>');
      return html;
    }

    $('#modal-detalle-pedido').on('hidden.bs.modal', function (e) {
      resetAll();
    });

    function resetAll() {
      $("#id_modal_titulo").text("");
      $("#id_modal_nombre_cliente").text("");
      $("#id_modal_direccion_cliente").text("");
      $("#id_modal_telefono_cliente").text(""); 
      $("#id_modal_estado_pedido").text("");
      $("#id_modal_fecha").text(""); 
      $("#id_modal_total_pedido").text("");
      $('#data-container-detalle').empty();
      $('#col-tomar-pedido').hide();
      $('#col-cancelar-pedido').hide();
      $('#col-despachar-pedido').hide();
    }

    function detallePedido(idPedido){
      $.ajax({
          url:"{{route('get-pedido-id-perfil-empresa')}}",
          method:"POST",
          data:{IDPedido:idPedido,_token:"{{csrf_token()}}"},
          success:function(result)
          {
            let pedido = jQuery.parseJSON(result);
            $("#hidden-id-pedido").val(pedido[0].IDPedido);
            $("#id_modal_titulo").text(pedido[0].NombreCliente);
            $("#id_modal_nombre_cliente").text(pedido[0].NombreCliente);
            $("#id_modal_direccion_cliente").text(pedido[0].DireccionCliente);
            $("#id_modal_telefono_cliente").text(pedido[0].TelefonoCliente);

            if(pedido[0].IDEstadoPedido==1){$('#col-tomar-pedido').show();$('#col-despachar-pedido').hide();$('#col-cancelar-pedido').hide();}else if(pedido[0].IDEstadoPedido==2){$('#col-tomar-pedido').hide();$('#col-cancelar-pedido').show();$('#col-despachar-pedido').show();}
            else if(pedido[0].IDEstadoPedido==3){$('#col-tomar-pedido').hide();$('#col-cancelar-pedido').hide();$('#col-despachar-pedido').hide();}else if(pedido[0].IDEstadoPedido==4){$('#col-tomar-pedido').hide();$('#col-cancelar-pedido').hide();$('#col-despachar-pedido').hide();}
            else{$('#col-tomar-pedido').hide();$('#col-cancelar-pedido').hide();$('#col-despachar-pedido').hide();}

            $("#id_modal_estado_pedido").text(pedido[0].EstadoPedido);
            let date = new Date(Date.parse(pedido[0].FechaRegistro));
            let dateFormatted = date.toLocaleString('default',{day: 'numeric', month: 'long', year: 'numeric', hour:'2-digit',minute:'2-digit'});
            $("#id_modal_fecha").text(dateFormatted);
            $("#id_modal_total_pedido").text(pedido[0].ValorTotal.toLocaleString('en-US', {style: 'currency', currency: 'USD'}));
          }
        }),

      $.ajax({
        url:"{{route('get-detalle-pedido-perfil-empresa')}}",
        method:"POST",
        data:{IDPedido:idPedido,_token:"{{csrf_token()}}"},
        success:function(result)
        {
          let html = itemDetallePedido(jQuery.parseJSON(result));
          $('#data-container-detalle').html(html);
        }
      });

      $('#modal-detalle-pedido').modal('toggle');
    }

    function itemDetallePedido(data) {
      let html = '';
      data.forEach(item => html += '<button class="btn p-0 w-100 text-left"><div class="item-pedido card card-body p-item-pedido cursor-pointer mb-1 w-100"><div class="row"><div class="col-xs-12 col-sx-12 col-sm-12 col-md-12 col-lg-12 px-0"><div class="row"><div class="col-xs-5 col-sx-5 col-sm-5 col-md-5 col-lg-7 px-2">'+item.Nombre+'</div><div class="col-xs-1 col-sx-1 col-sm-1 col-md-1 col-lg-1 px-2">'+item.Cantidad+'</div><div class="col-xs-3 col-sx-3 col-sm-3 col-md-3 col-lg-2 px-2">'+item.ValorProducto.toLocaleString('en-US', {style: 'currency', currency: 'USD'})+'</div><div class="col-xs-3 col-sx-3 col-sm-3 col-md-3 col-lg-2 px-2">'+(item.Cantidad * item.ValorProducto).toLocaleString('en-US', {style: 'currency', currency: 'USD'})+'</div></div></div></div></div></button>');
      return html;
    }

    function pedidoenproceso(){
      $("#col-despachar-pedido").removeClass("d-none");
      $("#col-cancelar-pedido").removeClass("d-none");
      $("#col-tomar-pedido").addClass("d-none");
      $("#id_modal_estado_pedido").text("En Proceso");
    }

    $("#btn-modal_tomar_pedido").on("click", function(a) {pedidoEnProceso();})

    function pedidoEnProceso() {
      let id = $("#hidden-id-pedido").val();
      $.ajax({url:"{{route('pedido-en-proceso')}}",method:"POST",data:{IDPedido:id,_token:"{{csrf_token()}}"},success:function(result){if(result==1){pedidoenproceso();$('#col-tomar-pedido').hide();$('#col-cancelar-pedido').show();$('#col-despachar-pedido').show();}}})
    }

    $("#btn-modal_cancelar_pedido").on("click", function(a) {pedidoCancelado();})

    function pedidoCancelado() {
      let id = $("#hidden-id-pedido").val();
      $.ajax({
          url:"{{route('pedido-cancelado')}}",
          method:"POST",
          data:{IDPedido:id,_token:"{{csrf_token()}}"},
          success:function(result)
          {
            if(result==1){
              getPedidos();
              $('#modal-detalle-pedido').modal('toggle');
            }
          }
        })
    }
    
    $("#btn-modal_despachar_pedido").on("click", function(a) {pedidoDespachado();})

    function pedidoDespachado() {
      let id = $("#hidden-id-pedido").val();
      $.ajax({
          url:"{{route('pedido-despachado')}}",
          method:"POST",
          data:{IDPedido:id,_token:"{{csrf_token()}}"},
          success:function(result)
          {
            console.log(result);
            if(result==1){
              getPedidos();
              $('#modal-detalle-pedido').modal('toggle');
            }
          }
        })
    }
    
  </script>
@endsection