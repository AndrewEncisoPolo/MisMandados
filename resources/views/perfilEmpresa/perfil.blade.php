@extends('perfilEmpresa/Empresa')
@section('empresa_content')
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
              <h5>Pedidos Pendientes</h5>
          </div>
      </div>
    </div>
  </div>
  <script>
    $(function(){$('#btn-more-info').on('click', function(e){$('#collapse-more-info').collapse('toggle');})});
  </script>
@endsection