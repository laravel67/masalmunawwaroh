<div id="spinner"
class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
<div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"></div>
</div>
<div class="container-fluid d-flex d-lg-flex">
<div class="container d-flex align-items-center pt-2">
    <marquee onmouseover="this.stop();" onmouseout="this.start();">
        <h4 class="text-success">{{ __("Selamat datang di website resmi Madrasah Aliyah Pondok Pesantren Tahfidz Al-Qur'an Wal Hadits Almunawwaroh") }}</h4>   
    </marquee>
</div>
</div>
<div class="container-fluid bg-success text-white pt-4 pb-5 d-none d-lg-flex">
<div class="container pb-2">
    <div class="d-flex align-items-center justify-content-between">
        <div class="d-flex">
            <i class="bi bi-telephone-inbound fs-2"></i>
            <div class="ms-3">
                <h5 class="text-white mb-0">{{__('Kontak')}}</h5>
                <span>{{__('082279761815')}}</span>
            </div>
        </div>
        <a href="/" class="h1 mb-0 text-warning">{{ __('MAS') }} <span class="text-light">{{ __('ALMUNAWWAROH') }} </span></a>
        <div class="d-flex">
            <i class="bi bi-envelope fs-2"></i>
            <div class="ms-3">
                <h5 class="text-white mb-0">Email</h5>
                <span>{{__('masalmunawwaroh@gmail.com')}}</span>
            </div>
        </div>
    </div>
</div>
</div>
<div class="container-fluid sticky-top">
<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-white py-lg-0 px-lg-4">
        <a href="/" class="navbar-brand d-lg-none">
            <span class="d-none d-lg-block">
                <h4 class="text-warning m-0">{{ __('MAS') }}<span class="text-success">{{__('ALMUNAWWAROH')}}</span></h4>
            </span>
            <span class="d-lg-none">
                <h5 class="text-warning m-0">{{ __('MAS') }}<span class="text-success">{{__('ALMUNAWWAROH')}}</span></h5>
            </span>
        </a>
        <button type="button" class="navbar-toggler me-0 border-0" data-bs-toggle="collapse"
            data-bs-target="#navbarCollapse">
            <i class="fas fa-bars"></i>
            {{-- <span class="navbar-toggler-icon text-success"></span> --}}
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <x-tbMenu/>            
            <div class="ms-auto d-lg-flex">
                @guest
                <a href="https://rdm.kemenag.go.id/login/auth" target="_blank" class="btn btn-warning "><i class="fas fa-book-reader"></i> {{ __('Rapot Digital') }}</a>
                {{-- <a href="{{ route('login') }}"  class="btn btn-dark mx-1">{{ __('Login') }}</a> --}}
                @else
                <a href="{{ route('dashboard') }}"  class="btn btn-dark mx-1">{{ __('Dashboard') }}</a>
                <button type="button" onclick="logout()" class="btn btn-danger">{{ __('Keluar') }}</button>
                <x-logout/>
                @endguest
            </div>
        </div>
    </nav>
</div>
</div>
