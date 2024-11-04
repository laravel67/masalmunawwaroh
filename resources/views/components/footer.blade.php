<div class="container-fluid footer position-relative bg-dark text-white-50 py-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container">
        <div class="row g-5 py-5">
            <div class="col-lg-6 pe-lg-5">
                <a href="/" class="navbar-brand">
                    <h1 class="h1 text-warning mb-0">{{ __('MAS') }} <span class="text-light">{{ __('ALMUNAWWAROH') }}</span></h1>
                </a>
                <!-- <p class="fs-5 mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur tellus augue, iaculis id elit eget, ultrices pulvinar tortor.</p> -->
                <p><i class="fa fa-map-marker-alt me-2"></i>{{ __('Jl. Raya Lintas Utama Sumatera, Dusun Bangko, Kec. Bangko, Kabupaten Merangin, Jambi 37311') }}</p>
                <p><i class="fa fa-phone-alt me-2"></i>{{ __('082190516703') }}</p>
                <p><i class="fa fa-envelope me-2"></i>{{ __('masalmunawwarohbangko2004@gmail.com') }}</p>
                <div class="d-flex mt-4">
                    <a class="btn btn-lg-square btn-danger border-white me-2" href="https://www.youtube.com/@anak.pesantr3n_"><i class="fab fa-youtube"></i></a>
                    <a class="btn btn-lg-square btn-primary border-white me-2" href="https://web.facebook.com/profile.php?id=100078273344393"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-lg-square btn-dark border-white me-2" href="https://www.tiktok.com/@mas.almunawwaroh?_t=8m78T3v3h03&_r=1"><i class="fab fa-tiktok"></i></a>
                    <a style="background-color: rgb(217, 11, 134);" class="btn btn-lg-square btn-primary border-white me-2" href="https://www.instagram.com/masalmunawwarohbangko/?igsh=NW5vZnRkYWJubTV5"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <div class="col-lg-6 ps-lg-5">
                <div class="row g-5">
                    <div class="col-sm-6">
                        <h4 class="text-light mb-4">{{ __('Layanan') }}</h4>
                        <a class="btn btn-link" href="{{ route('formulir.psb') }}">{{ __('PPDB') }}</a>
                        <a class="btn btn-link" href="">{{ __('Agenda Kegiatan') }}</a>
                        <a class="btn btn-link" href="{{ route('posts') }}">{{ __('Berita') }}</a>
                        <a class="btn btn-link" href="{{ route('album') }}">{{ __('Galeri') }}</a>
                        <a class="btn btn-link" href="{{ route('kontak') }}">{{ __('Kontak') }}</a>
                    </div>
                    <div class="col-sm-6">
                        <h4 class="text-light mb-4">{{ __('Lokasi Google Map') }}</h4>
                        <iframe class="img-fluid" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5015.179326296556!2d102.29282087590344!3d-2.066587097914879!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e2e6d89350eebd1%3A0x8f77cc9623bde597!2spondok%20pesantren%20al-munawwaroh!5e1!3m2!1sid!2sid!4v1730398929877!5m2!1sid!2sid" width="600" height="220" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid copyright bg-dark text-white-50 py-4">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <p class="mb-0">&copy; <a href="https://masalmunawwaroh.com">{{ __('masalmunawwaroh.com') }}</a> {{ __('All Rights Reserved.') }}</p>
                <p class="mb-0">{{ __('Designed by') }} <a href="https://htmlcodex.com">{{ __('Murtaki') }}</a><br>{{ __('Distributed by') }} <a href="https://themewagon.com">{{ __('MAS ALMUNAWWAROH') }}</a></p>
            </div>
        </div>
    </div>
</div>