<header id="mainHead" class="navbar navbar-expand-lg navbar-dark bg-green " style="background-color: #25bb00;">
    <div class="runtext-container d-flex w-100 justify-content-center">
            <div class="main-runtext">
                <marquee direction="" onmouseover="this.stop();" onmouseout="this.start();">
                    <div class="holder">
                        <div class="text-container d-flex align-items-center">
                            <img src="{{ asset('img/logo-almunawwaroh.png') }}" width="24">
                            <span data-fancybox-group="gallery" class="fancybox text-light">
                                {{ __("Selamat Datang Di Website MADRASAH ALIYAH Pondok Pesantren Tahfidz Al-Qur'an Wal Hadist AL-MUNAWWAROH Bangko") }}
                            </a>
                        </div>        
                    </div>
                </marquee>
            </div>
    </div>
    {{-- <div class="container d-md-block d-lg-block d-none">
        <div class="d-flex align-items-end">
            <div class="text-center mr-3">
                <img src="{{ asset('backend/img/logo-mas-almunawwaroh-removebg-preview.png') }}" alt="" class="img-fluid d-md-block d-none" width="150">
            </div>
            <div class="header-text">
                <h4 class="text-light d-md-block d-none text-uppercase">{{ __('Madrasah Aliyah') }}</h4>
                <h6 class="text-light d-md-block d-none"> {{ __("Pondok Pesantren Tahfidz Al-Qura'an Wal Hadits") }}</h4>
                <h4 class="text-light d-md-block d-none text-uppercase"> {{ __("Al-Munawwaroh Bangko") }}</h4>
                <a style="text-decoration: underline" href="https://maps.app.goo.gl/jE1X3XyyrWdyD2sV7" target="_blank"
                    class="text-light"><small>{{ __('Jl. Raya Lintas Utama Sumatera, Dusun Bangko, Kec. Bangko, Kabupaten Merangin, Jambi 37311') }}</small> </a>
            </div>
        </div>
    </div> --}}
</header>
<nav id="mainNav" class="navbar navbar-expand-lg navbar-dark bg-green">
    <div class="container-fluid">
        <a class="navbar-brand ml-md-5 ml-lg-5" href="/"><span class="text-warning">MAS</span>{{ __(' AL-MUNAWWAROH') }}</a>
        
        <button class="navbar-toggler border-0" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse justify-content-around" id="navbarNavDropdown">
            <x-tbMenu />
            <div class="ml-lg-3">
                <a href="https://rdm.kemenag.go.id/login/auth" target="_blank" class="btn btn-warning btn-sm text-white">{{ __('RDM') }}</a>
                @guest
                    <a href="{{ route('login') }}" class="btn btn-dark btn-sm">{{ __('Login') }}</a>
                @else
                    <a href="{{ route('dashboard') }}" class="btn btn-dark btn-sm">{{ __('Dashboard') }}</a>
                @endguest
            </div>
        </div>
    </div>
</nav>


<script>
    window.addEventListener('scroll', function() {
        var head = document.getElementById('mainHead');
        var nav = document.getElementById('mainNav');
        
        var headBounding = head.getBoundingClientRect();
        if (headBounding.bottom <= 0) {
            nav.classList.add('fixed-top');
        } else {
            nav.classList.remove('fixed-top');
        }
    });
</script>