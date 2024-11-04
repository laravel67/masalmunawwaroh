@if (Request::routeIs('home'))
<div class="container-fluid header-carousel px-0 mb-5">
    <div id="header-carousel" class="carousel slide carousel-fade h-25" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active" style="background: linear-gradient(rgba(10, 188, 132, 0.9), rgba(255, 250, 250, 0.2)), url('{{ asset('mas/img/ma.jpg') }}'); width: 100%; overflow:hidden; height:65vh; background-repeat: no-repeat; background-position: center; background-size: cover;">
                <div class="carousel-caption">
                    <div class="container">
                        <div class="d-none d-md-block">
                            <img src="/img/ayomadrasah.png" alt="" class="img-fluid" width="250">
                        </div> 
                        <div class="row justify-content-start">
                            <div class="col-lg-12 text-center">
                                <h1 class="display-3 animated slideInRight mb-0 text-uppercase" style="color: white !important;">

                                    <span>Madrasah</span> <span class="text-warning">Aliyah</span></h1>
                                <h1 class="text-white h-6">Pondok Pesantren Tahfidz Al-Qur'an Wal Hadits Almunawwaroh</h1>
                                <a href="https://wa.me/082190516703" class="btn btn-success py-3 px-5 animated slideInRight" target="_blank">Hubungi</a>
                                <a href="{{ route('formulir.psb') }}" class="btn btn-light py-3 px-5 animated slideInRight">PPDB</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
        </button>
    </div>
</div>
@else
<div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center py-5 mt-4">
        <h1 class="display-2 text-white mb-3 animated slideInDown">{{ $title }}</h1>
        <nav aria-label="breadcrumb animated slideInDown">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="https://masalmunawwaroh.com"><span class="text-warning fw-bold">{{ __('mas') }}</span><span class="text-success fw-bold">{{ __('almunawwaroh.com') }}</span></a></li>
                <li class="breadcrumb-item"><a href="#">{{ $title }}</a></li>
            </ol>
        </nav>
    </div>
</div>
@endif