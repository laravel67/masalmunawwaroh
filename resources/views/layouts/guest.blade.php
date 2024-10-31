<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
   <link rel="stylesheet" href="{{ asset('adminlte/css/adminlte.min.css') }}">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bs-stepper/dist/css/bs-stepper.min.css">
   <style>
   .loader {
  box-sizing: border-box;
  display: inline-block;
  width: 50px;
  height: 80px;
  border-top: 5px solid #fff;
  border-bottom: 5px solid #fff;
  position: relative;
  background: linear-gradient(#FF3D00 30px, transparent 0) no-repeat;
  background-size: 2px 40px;
  background-position: 50% 0px;
  animation: spinx 5s linear infinite;
}
.loader:before, .loader:after {
  content: "";
  width: 40px;
  left: 50%;
  height: 35px;
  position: absolute;
  top: 0;
  transform: translatex(-50%);
  background: rgba(255, 255, 255, 0.4);
  border-radius: 0 0 20px 20px;
  background-size: 100% auto;
  background-repeat: no-repeat;
  background-position: 0 0px;
  animation: lqt 5s linear infinite;
}
.loader:after {
  top: auto;
  bottom: 0;
  border-radius: 20px 20px 0 0;
  animation: lqb 5s linear infinite;
}
@keyframes lqt {
  0%, 100% {
    background-image: linear-gradient(#FF3D00 40px, transparent 0);
    background-position: 0% 0px;
  }
  50% {
    background-image: linear-gradient(#FF3D00 40px, transparent 0);
    background-position: 0% 40px;
  }
  50.1% {
    background-image: linear-gradient(#FF3D00 40px, transparent 0);
    background-position: 0% -40px;
  }
}
@keyframes lqb {
  0% {
    background-image: linear-gradient(#FF3D00 40px, transparent 0);
    background-position: 0 40px;
  }
  100% {
    background-image: linear-gradient(#FF3D00 40px, transparent 0);
    background-position: 0 -40px;
  }
}
@keyframes spinx {
  0%, 49% {
    transform: rotate(0deg);
    background-position: 50% 36px;
  }
  51%, 98% {
    transform: rotate(180deg);
    background-position: 50% 4px;
  }
  100% {
    transform: rotate(360deg);
    background-position: 50% 36px;
  }
}
          
   </style>
   <title>PPDB Formulir Pendaftaran</title>
   @livewireStyles
</head>
<body class="layout-top-nav">
   <div class="wrapper">
      <!-- Navbar -->
      <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
         <div class="container">
            <a href="/" class="navbar-brand">
               <img src="{{ asset('frontend/img/logo-mas-almunawwaroh-removebg-preview.png') }}" alt="Logo" class="brand-image" style="opacity: .8">
               <span class="brand-text font-weight-light">PPDB</span>
            </a>
         </div>
      </nav>
      <!-- Content Wrapper -->
      <div class="content-wrapper">
         <!-- Content Header -->
         <div class="content-header">
            <div class="container">
               <h1 class="m-0 text-center">FORMULIR PENDAFTARAN PESERTA DIDIK BARU TAHUN AJARAN 2024-2025</h1>
            </div>
         </div>

         <!-- Main content -->
         <div class="content">
            <div class="container">
               {{ $slot }}
            </div>
         </div>
      </div>

   <script src="https://cdn.jsdelivr.net/npm/bs-stepper/dist/js/bs-stepper.min.js"></script>
 
@livewireScripts
</body>
</html>
