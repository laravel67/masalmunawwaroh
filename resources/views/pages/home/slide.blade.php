<div class="container-fluid header-carousel px-0 mb-5">
    <div id="header-carousel" class="carousel slide carousel-fade h-25" data-bs-ride="carousel" data-bs-interval="3000">
        <div class="carousel-inner">
            @forelse ($slides as $slide)
                <div class="carousel-item {{ $loop->first ? 'active' : '' }}" 
                     style="background: linear-gradient(rgba(10, 188, 132, 0.9), rgba(255, 250, 250, 0.2)), url('{{ asset('storage/' . $slide->image) }}'); width: 100%; overflow:hidden; height:65vh; background-repeat: no-repeat; background-position: center; background-size: cover;">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="d-none d-md-block">
                                <img src="/img/ayomadrasah.png" alt="" class="img-fluid" width="250">
                            </div> 
                            <div class="row justify-content-start">
                                <div class="col-lg-12 text-center">
                                    <h1 class="display-3 animated slideInRight mb-0 text-uppercase" style="color: white !important;">
                                        <span>{{ __('Madrasah') }}</span> <span class="text-warning">Aliyah</span>
                                    </h1>
                                    <h1 class="text-white h-6">{{ $slide->caption }}</h1>
                                    <a href="https://wa.me/082190516703" class="btn btn-success py-3 px-5 animated slideInRight" target="_blank">Hubungi</a>
                                    <a href="{{ route('formulir.psb') }}" class="btn btn-light py-3 px-5 animated slideInRight">PPDB</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="carousel-item active" 
                     style="background: linear-gradient(rgba(10, 188, 132, 0.9), rgba(255, 250, 250, 0.2)), url('{{ asset('img/ma.jpg') }}'); width: 100%; overflow:hidden; height:65vh; background-repeat: no-repeat; background-position: center; background-size: cover;">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="d-none d-md-block">
                                <img src="/img/ayomadrasah.png" alt="" class="img-fluid" width="250">
                            </div> 
                            <div class="row justify-content-start">
                                <div class="col-lg-12 text-center">
                                    <h1 class="display-3 animated slideInRight mb-0 text-uppercase" style="color: white !important;">
                                        <span>{{ __('Madrasah') }}</span> <span class="text-warning">Aliyah</span>
                                    </h1>
                                    <h1 class="text-white h-6">{{ __("Pondok Pesantren Tahfidz Al-Qur'an Wal Hadits Almunawwaroh") }}</h1>
                                    <a href="https://wa.me/082190516703" class="btn btn-success py-3 px-5 animated slideInRight" target="_blank">Hubungi</a>
                                    <a href="{{ route('formulir.psb') }}" class="btn btn-light py-3 px-5 animated slideInRight">PPDB</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforelse
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
        </button>
    </div>
</div>

