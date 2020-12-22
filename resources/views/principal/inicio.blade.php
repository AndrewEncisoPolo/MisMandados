
@extends('index')

@section('main_content')
<div class="container" style="margin-top:56px;">
    <div class="row  pt-3">
        <div class="col-lg-12">
            <div class="form-group">
                <h3>Puedes encontrar las siguientes promociones</h3>
            </div>
        </div>
        <div class="col-lg-12 pb-5">
            <div class="form-group">

                <div id="carouselExampleControls" class="carousel slide w-100 m-auto" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                          <img src="../resources/ImgPromocion/imgPromocion4.jpg" class="d-block w-100 rounded" alt="Promoción - Mis Mandados">
                        </div>
                        <div class="carousel-item">
                          <img src="../resources/ImgPromocion/imgPromocion5.jpg" class="d-block w-100 rounded" alt="Promoción - Mis Mandados">
                        </div>
                        <div class="carousel-item">
                          <img src="../resources/ImgPromocion/imgPromocion6.jpg" class="d-block w-100 rounded" alt="Promoción - Mis Mandados">
                        </div>
                      </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
                    </a>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection