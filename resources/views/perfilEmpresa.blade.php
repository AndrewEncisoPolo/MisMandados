@inject('controller', 'App\Http\Controllers\ServiceController')
@if ($_SESSION["user_session"])

    @if ($controller::authUser($_SESSION["user_session"])==3)
    <!doctype html>
    <html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="../resources/css/bootstrap.css">
        <script src="../resources/js/jquery-3.5.1.slim.min.js"></script>
        <script src="../resources/js/bootstrap.js"></script>
        <title>Mis Mandados</title>
    </head>
    <body>
        
        <nav class="navbar navbar-expand-lg navbar-light bg-red fixed-top">
            <a class="navbar-brand" href="#" style="padding-left:0.5rem;">
            <img src="../resources/img/MisMandados.png" style="width: 215px;">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link text-white" href="{{url('inicio')}}">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{url('tienda')}}">Mi Empresa</a>
                    </li>
                </ul>
                <div class="form-inline my-2 my-lg-0">
                    <button class="btn btn-outline-light my-2 my-sm-0" data-toggle="modal" data-target="#modal-iniciar-sesion">Cerrar Sesión</button>
                </div>
            </div>
        </nav>
        <div>@yield('empresa_content')</div> 

    </body>
    </html>
    @else
    <script>window.location.href = "{{url('inicio')}}";</script>
    @endif

@else
<script>window.location.href = "{{url('inicio')}}";</script>
@endif