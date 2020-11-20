@extends('perfilConsumidor/Consumidor')

@section('consumidor_content')
    <div class="container" style="margin-top:56px;">
        <div class="row pt-3">
            <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group">
                <h3>Establecimientos Cercanos</h3>
            </div>
        @foreach ($data_empresas_cercanas as $info_empresa)
            <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-6 col-lg-3 form-group">
                <form action="{{url('empresa-consumidor')}}" method="post">
                    @csrf
                    <input type="hidden" name="idEmpresa" value="{{$info_empresa->IDUsuario}}">
                    <button class="btn border-0 p-0" type="submit">
                        <div class="card shadow-sm card-body py-2 px-0">
                            <div class="row">
                                <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <h5>{{ $info_empresa->Nombre }}</h5>
                                </div>
                                <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center form-group">
                                    <div class="w-100 mx-auto" style="background:url({{$info_empresa->Archivo}});background-size: cover;background-position: center;height: 8rem;width: 14rem;"></div>
                                </div>
                                <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 text-left">
                                    <small>
                                        <b>Dirección</b><br>
                                        <a class="text-muted text-decoration-none">{{ $info_empresa->Direccion }}</a>
                                    </small>
                                </div>
                                <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 text-left">
                                    <small>
                                        <b>Telefono(s)</b><br>
                                        <a class="text-muted text-decoration-none">{{ $info_empresa->Telefono }} / {{ $info_empresa->TelefonoCelular }}</a>
                                    </small>
                                </div>
                            </div>
                        </div>
                    </button>
                </form>                        
            </div>
        @endforeach
        </div>
    </div>
@endsection