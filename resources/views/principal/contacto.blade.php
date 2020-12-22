@extends('index')
@section('main_content')
<div class="container" style="margin-top:56px;">
    <div class="row pt-3">
        <div class="col-lg-12 form-group">
            <h3>Nosotros</h3>
        </div>
        <div class="col-lg-12 form-group mb-4"> 
            <a>Mis Mandados es una empresa dedicada a solucionar y facilitar las entregas de productos y/o servicios que el consumidor final requiere de acuerdo a su necesidad. Somos la empresa líder en conectar al comercio local y los clientes finales de forma digital.</a>
        </div>
        <div class="col-lg-12 form-group text-center">
            <img src="../resources/img/logos/LogoSOC.png" style="width: 500px;" class="py-3" alt="Sistemas SOC - Sistema Organazacional de Comercio">
        </div>
    </div>
</div>
<div class="container">
    <div class="row pt-4 pb-4">
        <div class="col-lg-12 form-group">
            <h3>Contacto</h3>
        </div>
        <div class="col-lg-4 form-group"><label for="id_nombre_contacto">Nombre</label>
            <input class="form-control" type="text" name="" id="id_nombre_contacto">
        </div>
        <div class="col-lg-4 form-group"><label for="id_Email_contacto">Correo Electrónico</label>
            <input class="form-control" type="text" name="" id="id_Email_contacto">
        </div>
        <div class="col-lg-4 form-group"><label for="id_telefono_contacto">Teléfono</label>
            <input class="form-control" type="text" name="" id="id_telefono_contacto">
        </div>
        <div class="col-lg-12 form-group"><label for="id_mensaje_contacto">Mensaje</label>
            <textarea class="form-control" type="text" name="" id="id_mensaje_contacto"></textarea>
        </div>
        <div class="col-lg-12 form-group text-center">
            <button class="btn btn-primary" type="submit" style="width:30%;">Enviar</button>
        </div>
    </div>
</div>
<div class="container">
    <div class="row pt-4 pb-5">
        <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group"> 
            <h3>Puedes encontrarnos en...</h3> 
        </div>
        <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-6 col-lg-3 form-group text-center"> 
            <a href="https://api.whatsapp.com/send?phone=573155000014&amp;text=Hola" style="width:100%;height:100%;"> 
                <img src="../resources/img/redessociales/whatsapp.png" style="width: 30%;">
            </a>
            <br>
            <a class="text-muted" style="text-decoration:none;">Whatsapp</a>
        </div>
        <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-6 col-lg-3 form-group text-center">
            <a href="https://www.instagram.com/mis.mandados/" class="text-center" style="width:100%;height:100%;">
                <img src="../resources/img/redessociales/instagram.png" style="width: 30%;"> 
            </a>
            <br>
            <a class="text-muted" style="text-decoration:none;">Instragram</a>
        </div>
        <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-6 col-lg-3 form-group text-center">
            <a href="https://www.facebook.com/Mis-Mandados-107496271085789" class="text-center" style="width:100%;height:100%;">
                <img src="../resources/img/redessociales/facebook.png" style="width: 30%;">
            </a>
            <br>
            <a class="text-muted" style="text-decoration:none;">Facebook</a>
        </div>
        <div class="col-xsm-12 col-xs-12 col-sm-12 col-md-6 col-lg-3 form-group text-center">
            <a href="https://twitter.com/mismandadosdad1" class="text-center" style="width:100%;height:100%;">
                <img src="../resources/img/redessociales/twitter.png" style="width: 30%;">
            </a>
            <br>
            <a class="text-muted" style="text-decoration:none;">Twitter</a>
        </div>
    </div>
</div>
@endsection