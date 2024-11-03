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
                    @auth
                    <li class="nav-item py-2 text-end">
                      <button onclick="logout()" type="button" class="nav-link border-0 pcoded-mtext"><i class="fas fa-sign-out-alt"></i> Keluar</button>
                    </li>
                    <x-logout/>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
    <header class="navbar pcoded-header navbar-expand-lg navbar-light header-dark">
        <div class="container">
            <div class="m-header">
                <a class="mobile-menu" id="mobile-collapse" href="#!"><span></span></a>
                <a href="#!" class="b-brand">
                    <img src="{{ asset('logoalm.png') }}" alt="" class="logo" width="40">
                </a>
            </div>
            <div class="collapse navbar-collapse">
                
            </div>
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
                                            <div class="page-header-title">
                                                <h3 class="m-b-10">{{ $title }}</h3>
                                            </div>
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
    @stack('js')
    @livewireScripts
</body>
</html>
