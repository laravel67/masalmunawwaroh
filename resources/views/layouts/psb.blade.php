<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ config('app.name') }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Formulir Pendaftaran Peserta didik baru" />
    <link rel="icon" href="{{ asset('logoalm.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('psb/assets/css/style.css') }}">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bs-stepper/dist/css/bs-stepper.min.css">
   @stack('css')
</head>
<body>
    <nav class="pcoded-navbar theme-horizontal menu-light">
        <div class="navbar-wrapper container">
            <div class="navbar-content sidenav-horizontal" id="layout-sidenav">
                <ul class="nav pcoded-inner-navbar sidenav-inner">
                    <li class="nav-item py-2 text-end">
                        <a href="{{ route('home') }}" type="button" class="nav-link pcoded-mtext">Beranda</a>
                    </li>
                    @auth
                    <li class="nav-item py-2 text-end">
                      <a href="#" onclick="logout()" type="button" class="nav-link pcoded-mtext"><i class="fas fa-sign-out-alt"></i> Keluar</a>
                    </li>
                    <x-logout/>
                    @else
                    <li class="nav-item py-2 text-end">
                        <a href="{{ route('login') }}" class="nav-link pcoded-mtext"><i class="fas fa-sign-in-alt"></i> Masuk</a>
                    </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
    <header class="navbar pcoded-header navbar-expand-lg navbar-light header-dark">
        <div class="container d-flex justify-content-center align-items-center">
            <h5 class="text-light text-center">PPDB <span class="text-warning">MAS</span> AL-MUNAWWAROH</h5>
        </div>
    </header>
    <div class="pcoded-main-container">
        <div class="pcoded-wrapper container">
            <div class="pcoded-content">
                <div class="pcoded-inner-content">
                    <div class="main-body">
                        <div class="page-wrapper">
                            <div class="page-header">
                                <div class="page-block">
                                    <div class="row align-items-center">
                                        <div class="col-md-12">
                                                @if (Auth::check() && Auth::user()->role == 'siswa')
                                                    <div class="page-header-title">
                                                        <h5 class="m-b-10 text-center">{{ $title }}</h5>
                                                    </div>
                                                @else
                                                    <livewire:psb.title />
                                                @endif

                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{ $slot }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('success', function(event) {
                const { route, message } = event.detail[0] || {};

                Swal.fire({
                    title: 'Sukses!',
                    icon: 'success',
                    text: message,
                    confirmButtonColor: '#00b554',
                }).then((result) => {
                    if (result.isConfirmed && route) {
                        Livewire.navigate(route);
                    }
                });
        });
    </script>
    @livewireScripts
</body>
</html>
