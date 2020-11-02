@extends('perfilConsumidor')

@section('consumidor_content')

    <div class="container" style="margin-top:56px;">
      <div class="row" style="padding-top:1rem;">

        <div class="col-xs-12 col-md-12 col-md-12 col-lg-12">
          <div class="form-group">

          <div class="card shadow-sm">
            <div class="card-body">
      
              <div class="row">
                <div class="col-xs-12 col-md-12 col-md-12 col-lg-2 text-center">
                    <img src="../resources/img/avatar.png" style="border-radius: 50%;width: 100px;">
                </div>
                <div class="col-xs-12 col-md-12 col-md-6 col-lg-10">
                    <h3>Cristian Andrey Enciso Polo</h3>
                </div>
              </div>

            </div>
          </div>

          </div>
        </div>

        <div class="col-xs-12 col-md-12 col-md-12 col-lg-4">
          <div class="form-group">
            
            <div class="card shadow-sm">
              <div class="card-body">
                <h4>Información</h4>  
                <div class="row">

                  @foreach ($info_usuario as $info)

                    <div class="col-xs-12 col-md-12 col-md-12 col-lg-12">
                      <div class="form-group">
                        <b>Email</b><br>
                        <a class="text-muted" style="text-decoration:none;">{{ $info->Email }}</a>
                      </div>
                    </div>

                    <div class="col-xs-12 col-md-12 col-md-12 col-lg-12">
                      <div class="form-group">
                        <b>Teléfono Celular</b><br>
                        <a class="text-muted" style="text-decoration:none;">{{ $info->TelefonoCelular }}</a>
                      </div>
                    </div>

                    <div class="col-xs-12 col-md-12 col-md-12 col-lg-12">
                      <div class="form-group">
                        <b>Ubicación</b><br>
                        <a class="text-muted" style="text-decoration:none;">{{ $info->Departamento }},&nbsp;{{ $info->Ciudad }},&nbsp;{{ $info->Localidad }},&nbsp;{{ $info->Barrio }}.</a>
                      </div>
                    </div>

                    <div class="col-xs-12 col-md-12 col-md-12 col-lg-12">
                      <div class="form-group">
                        <b>Dirección</b><br>
                        <a class="text-muted" style="text-decoration:none;">{{ $info->Direccion }}</a>
                      </div>
                    </div>

                <div class="collapse" id="collapse-more-info">
                    <div class="col-xs-12 col-md-12 col-md-12 col-lg-12">
                      <div class="form-group">
                        <b>Teléfono</b><br>
                        <a class="text-muted" style="text-decoration:none;">{{ $info->Telefono }}</a>
                      </div>
                    </div>
                </div>

                    <div class="col-xs-12 col-md-12 col-md-12 col-lg-12">
                      <button id="btn-more-info" class="btn text-center" style="width:100%;" type="button">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-three-dots" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                          <path fill-rule="evenodd" d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"/>
                        </svg>
                      </button>
                    </div>

                  @endforeach

                </div>

              </div>
            </div>

          </div>
        </div>

        <div class="col-xs-12 col-md-12 col-md-12 col-lg-8">
          <div class="form-group">
            
            <div class="card shadow-sm" style="height:470px;">
              <div class="card-body">
                <h4>Mis Pedidos Pendientes</h4>
              </div>
            </div>

          </div>
        </div>

      </div>
    </div>

    <script>
      $(function(){$('#btn-more-info').on('click', function(e){$('#collapse-more-info').collapse('toggle');})});
    </script>

@endsection