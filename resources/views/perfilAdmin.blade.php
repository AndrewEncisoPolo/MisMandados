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
                <li class="nav-item dropdown">
                    <a class="nav-link text-white dropdown-toggle" href="#" id="navbarDropdown-producto" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Producto
                    </a>
                    <div id="dropdown-menu-producto" class="dropdown-menu shadow" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="{{url('frm-crear-producto')}}">Crear Producto</a>
                    </div>
                </li>
            </ul>
            <div class="form-inline my-2 my-lg-0">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                  <a class="dropdown-toggle btn btn-outline-light" id="navbarDropdownMenuLink" data-toggle="tooltip" data-placement="bottom" title="Perfil">
                    Perfil
                  </a>
                  <div id="dropdown-menu-opciones" class="dropdown-menu shadow" aria-labelledby="navbarDropdownMenuLink" style="left:-120px;padding:0.5rem;width: 200px;">
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
    <div>@yield('admin_content')</div> 

  </body>
</html>


<script>
  $("#navbarDropdownMenuLink").click(function(){"none"==$("#dropdown-menu-opciones").css("display")?$("#dropdown-menu-opciones").css("display","block"):$("#dropdown-menu-opciones").css("display","none")});$("#navbarDropdown-producto").click(function(){"none"==$("#dropdown-menu-producto").css("display")?$("#dropdown-menu-producto").css("display","block"):$("#dropdown-menu-producto").css("display","none")});$("#toogle-collapse-navbar").click(function() {$('#navbarSupportedContent').collapse('toggle');});function isInputNumber(e){var t=String.fromCharCode(e.which);/[0-9]/.test(t)||e.preventDefault()}function encodeImageFileAsURL(e){var t=e.files[0],n=new FileReader;t.size<15e5?(n.onloadend=function(){n.result.length,document.getElementById("div");var e=document.getElementById("imgProducto").hasAttribute("src");1==e?document.getElementById("mensajeAlert").style.display="block":0==e&&(document.getElementById("UpFile").setAttribute("disabled",""),document.getElementById("hidden_Img1").setAttribute("value",n.result),document.getElementById("imgProducto").setAttribute("src",n.result),document.getElementById("div_img1").style.display="block",document.getElementById("mensajeAlert2").style.display="none")},n.readAsDataURL(t)):document.getElementById("mensajeAlert2").style.display="block"}function ClearImg(){document.getElementById("UpFile").removeAttribute("disabled");document.getElementById("hidden_Img1").removeAttribute("class");document.getElementById("imgProducto").removeAttribute("src");document.getElementById("div_img1").style.display = "none";}
</script>