@if ($_SESSION["user_session"])

  <!doctype html>
  <html lang="es">
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <title>Consumidor</title>
      <link rel="stylesheet" href="../resources/css/bootstrap.css">
      <script src="../resources/js/jquery-3.5.1.slim.min.js"></script>
      <script src="../resources/js/bootstrap.js"></script>
    </head>
    <body>
    
      <nav class="navbar navbar-expand-lg navbar-light bg-red fixed-top">
          <a class="navbar-brand" href="#" style="padding-left:0.5rem;">
          <img src="../resources/img/MisMandados.png" style="width: 215px;">
          </a>
          <button id="toogle-collapse-navbar" class="navbar-toggler" type="button" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                  <li class="nav-item">
                      <a class="nav-link text-white" href="{{url('perfil-consumidor')}}">Inicio</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link text-white" href="{{url('tienda-consumidor')}}">Tienda</a>
                  </li>
              </ul>
              <div class="form-inline my-2 my-lg-0">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                  <a class="dropdown-toggle btn btn-outline-light" id="navbarDropdownMenuLink" data-toggle="tooltip" data-placement="bottom" title="Perfil">
                    Perfil
                  </a>
                  <div class="dropdown-menu shadow" aria-labelledby="navbarDropdownMenuLink" style="left:-120px;padding:0.5rem;width: 200px;">
                    <div class="row">
                      <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="form-group">
                          <a href="" class="btn my-2 my-sm-0 text-dark text-left" style="width: 100%;">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" style="margin-bottom:4px;"><path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/><path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/></svg>
                            Editar Datos
                          </a>
                        </div>
                      </div>
                      <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <form action="{{url('logout')}}" method="post" style="margin-block-end:0em;">
                          @csrf
                          <input id="hidden_token_logOut" type="hidden" name="token" value="<?php echo $_SESSION["user_session"]; ?>">
                          <button type="submit" class="btn my-2 my-sm-0 text-dark text-left" style="width: 100%;">  
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-box-arrow-in-left" fill="currentColor" style="margin-bottom:4px;"><path fill-rule="evenodd" d="M10 3.5a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 1 1 0v2A1.5 1.5 0 0 1 9.5 14h-8A1.5 1.5 0 0 1 0 12.5v-9A1.5 1.5 0 0 1 1.5 2h8A1.5 1.5 0 0 1 11 3.5v2a.5.5 0 0 1-1 0v-2z"/><path fill-rule="evenodd" d="M4.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H14.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/></svg> 
                            Cerrar Sesión  
                        </button>
                        </form>
                      </div>
                    </div>
                  </div>
                </li>
              </ul>
              </div>
          </div>
      </nav>

      <div>@yield('consumidor_content')</div> 

    </body>
  </html>

<script>
  /*history.pushState(null,null,"home"),window.addEventListener("popstate",function(e){history.pushState(null,null,"home")}),document.onkeydown=function(){switch(event.keyCode){case 116:return event.returnValue=!1,event.keyCode=0,!1;case 82:if(event.ctrlKey)return event.returnValue=!1,event.keyCode=0,!1}},*/
  $("#navbarDropdownMenuLink").click(function(){"none"==$(".dropdown-menu").css("display")?$(".dropdown-menu").css("display","block"):$(".dropdown-menu").css("display","none")});
  $("#toogle-collapse-navbar").click(function() {$('#navbarSupportedContent').collapse('toggle');});
</script>

@else
  <script>window.location.href = "{{url('inicio')}}";</script>
@endif