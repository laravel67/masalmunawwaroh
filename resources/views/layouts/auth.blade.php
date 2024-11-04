<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ config('app.name') }}</title>
  <link rel="shortcut icon" href="{{ asset('logoalm.png') }}" type="image/x-icon">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="{{ asset('adminlte/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="{{ asset('adminlte/css/adminlte.css') }}">
  @stack('css')
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
  <nav class="main-header navbar navbar-expand navbar-dark">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/" class="nav-link">{{ __('Beranda') }}</a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
    </ul>
  </nav>
  <x-asideMain/>
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">{{ __('SISTEM INFORMASI MADRASAH') }}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">
                <a href="{{ route('dashboard') }}">{{ __('SIMADAL') }}</a></li>
              <li class="breadcrumb-item active">{{ $title }}</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <section class="content mb-5">
      <div class="container-fluid">
        {{ $slot }}
      </div>
    </section>
  </div>
  <aside class="control-sidebar control-sidebar-dark">
  </aside>
  <footer class="main-footer">
    <strong>{{ __('Copyright &copy; 2024') }} <a href="/">{{ __('MADRASAH ALIYAH') }}</a>.</strong>
    {{ __('All rights reserved.') }}
    <div class="float-right d-none d-sm-inline-block">
      <b>Versi</b> 1.0
    </div>
  </footer>
</div>
<script src="{{ asset('adminlte/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('adminlte/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('adminlte/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<script src="{{ asset('adminlte/js/adminlte.js') }}"></script>
<script src="{{ asset('adminlte/jquery-mousewheel/jquery.mousewheel.js') }}"></script>
<script src="{{ asset('adminlte/js/raphael.min.js') }}"></script>
<script src="{{ asset('adminlte/js/jquery.mapael.min.js') }}"></script>
<script src="{{ asset('adminlte/js/demo.js') }}"></script>
<script src="{{ asset('adminlte/js/dashboard2.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="{{ asset('toast.js') }}"></script>
@stack('js')
<script>
  window.addEventListener('show-delete-confirmation', event=>{
          Swal.fire({
              title: 'Kamu Yakin ?',
              text: "Tindakan ini akan menghapus data secara permanen",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Ya, Hapus',
              cancelButtonText: 'Batal'
          }).then((result) => {
              if (result.isConfirmed) {
                  Livewire.dispatch('deleteConfirmed')
              }
          })
      })
</script>

@if(session()->has('success'))
  <script>
    Swal.fire({
      title: "Berhasil!",
      text: "{{ session('success') }}",
      icon: "success"
    });
  </script> 
@endif

@if(session()->has('error'))
  <script>
    Swal.fire({
      icon: "error",
      title: "Oops...",
      text: "{{ session('error') }}",
    });
  </script>
@endif

</body>
</html>
