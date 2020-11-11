@extends('perfilConsumidor/Consumidor')

@section('consumidor_content')

    <!-- Wrapper -->
    <div class="container" style="margin-top:56px;">

        <div class="row" style="padding-top:1rem;">
            <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="form-group">
                    <h1>Establecimientos Cercanos</h1>
                </div>
            </div>
        @foreach ($data_empresas_cercanas as $info_empresa)
            <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-6 col-lg-4">
                <div class="form-group">
                    <form action="{{url('empresa-consumidor')}}" method="post">
                        @csrf
                        <input type="hidden" name="idEmpresa" value="{{$info_empresa->IDUsuario}}" style="display:none;">
                        <button class="btn" type="submit" style="border:none;">
                            <div class="card shadow-sm card-body" >
                                <div class="row">
                                    <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group">
                                        <h5>{{ $info_empresa->Nombre }}</h5>
                                    </div>
                                    <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center form-group">
                                        <img src="{{$info_empresa->Archivo}}" style="width:100%;height:160px;">
                                    </div>
                                    <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group text-left">
                                        <b>Dirección</b>
                                        <a class="text-muted" style="text-decoration:none;">{{ $info_empresa->Direccion }}</a>
                                    </div>
                                    <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group text-left">
                                        <b>Telefono / Tel. Celular</b>
                                        <a class="text-muted" style="text-decoration:none;">{{ $info_empresa->Telefono }} / {{ $info_empresa->TelefonoCelular }}</a>
                                    </div>
                                </div>
                            </div>
                        </button>
                    </form>                        
                </div>
            </div>
        @endforeach

        </div>
    </div>

@endsection