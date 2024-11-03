<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>
    <link rel="shortcut icon" href="{{ asset('logoalm.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('adminlte/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/auth.css') }}">
</head>
<body class="login-page bg-cover text-dark" style="min-height: 466px;">
    <div class="login-box">
      <!-- /.login-logo -->
      <div class="card card-outline card-success">
        <div class="card-header text-center pb-0">
          <a href="/" class="h1 d-flex justify-content-center align-items-center">
            <img src="{{ asset('logoalm.png') }}" class="img-fluid" width="35px">
            <b>{{ __('SIMAD') }}</b>
          </a>
          <p class="login-box-msg my-0 text-success">{{ __('Sistem Informasi Madrasah') }}</p>
        </div>
        <div class="card-body">
          <div class="d-flex justify-content-center">
            <script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module">
            </script>
            <dotlottie-player src="https://lottie.host/7e576060-182c-4a08-8363-30a56d16e071/WZnBfyjU5R.json"
                background="transparent" speed="1" style="width: 100px; height: 100px; overflow: hidden;" loop autoplay>
            </dotlottie-player>
          </div>
          {{ $slot }}
        </div>
      </div>
    </div>   
    <script src="{{ asset('adminlte/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('adminlte/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('adminlte/js/adminlte.js') }}"></script>
    </body>
</html>