@extends('perfilConsumidor/Consumidor')
@section('consumidor_content')

    <div class="container" style="margin-top:56px;">
      <div class="row pt-3">
        <div class="col-xs-12 col-md-12 col-md-12 col-lg-12 form-group">
          <div class="card shadow-sm card-body">
              <div class="row">
                <div class="col-xs-12 col-md-12 col-md-12 col-lg-2 text-center">
                    <img src="../resources/img/avatar.png" style="border-radius: 50%;width: 100px;">
                </div>
                <div class="col-xs-12 col-md-12 col-md-6 col-lg-10">
                  @foreach ($info_usuario as $info)
                    <h3>{{$info->Nombre}}</h3>
                  @endforeach
                </div>
              </div>
          </div>
        </div>
        <div class="col-xs-12 col-md-12 col-md-12 col-lg-4">
          <div class="form-group">
            <div class="card shadow-sm card-body">
                <h5>Información</h5>  
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

                    <div class="collapse" id="collapse-more-info">
                        <div class="col-xs-12 col-md-12 col-md-12 col-lg-12 form-group">
                          <small>
                            <b>Teléfono</b><br>
                            <a class="text-muted text-decoration-none">{{ $info->Telefono }}</a>
                          </small>
                        </div>
                    </div>

                    <div class="col-xs-12 col-md-12 col-md-12 col-lg-12">
                      <button id="btn-more-info" class="btn btn-sm text-center w-100" type="button">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-three-dots" fill="currentColor"><path fill-rule="evenodd" d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"/></svg>
                      </button>
                    </div>

                  @endforeach

                </div>
            </div>
          </div>
        </div>
        <div class="col-xs-12 col-md-12 col-md-12 col-lg-8 form-group">
            <div class="card shadow-sm card-body" style="height:470px;">
                <h5>Mis Pedidos Pendientes</h5>
            </div>
        </div>
      </div>
    </div>
    <script>
      $(function(){$('#btn-more-info').on('click', function(e){$('#collapse-more-info').collapse('toggle');})});
    </script>
@endsection