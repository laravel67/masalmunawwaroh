<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>
    <link rel="icon" href="{{ asset('logoalm.png') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&family=Red+Rose:wght@600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('nas/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('mas/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('mas/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('mas/css/styles.css') }}" rel="stylesheet">
</head>

<body style="overflow-x: hidden;">
    <x-tbMain />
    <x-header />
    {{ $slot }}
    <x-footer />
    <button class="btn btn-lg btn-success btn-square rounded-circle back-to-top" onclick="topFunction()" id="backToTopBtn">
        <i class="fas fa-arrow-up"></i>
    </button>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('mas/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('mas/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('mas/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('mas/lib/counterup/counterup.min.js') }}"></script>
    <script src="{{ asset('mas/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('mas/js/main.js') }}"></script>
    @stack('js')
    <script>
        function topFunction() {
            document.body.scrollTop = 0; 
            document.documentElement.scrollTop = 0;
        }
    </script>
</body>
</html>
