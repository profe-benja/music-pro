<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>@yield('title', 'inFast - Gestión de Inventario')</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="shortcut icon" href="{{ asset('images/infastlogo.png') }}" />
  <link href="{{ asset('admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="{{ asset('admin/css/sb-admin-2.min.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/iziToast/css/iziToast.min.css') }}" rel="stylesheet">
  @stack('stylesheet')

  <style>

    @media (min-width: 768px) {
      .sidebar .nav-item .nav-link {
          display: block;
          width: 100%;
          text-align: left;
          padding: 10px;
          /* margin-left: 10px; */
          width: 14rem;
      }

      .sidebar.toggled {
        overflow: visible;
        width: 6.5rem!important;
      }

    }

    .handle {
      cursor: pointer;
    }

    /* .scroll-sp {

        height: 550px;
        overflow:scroll;
      } */

      /* .bg-gradient-warning {
        background-color: #ef3cffa6;
        background-image: linear-gradient(180deg, #ef3cffa6 10%, #eb00ffa6 100%);
        /* background-size: cover */
      } */


      .bg-gradient-warning {
        /* text-align: center; */
        /* border-right: 6px ridge rgba(239, 49, 239, 0.6); */
        /* border-right: 1px; */
        /* text-shadow: -2px -2px 0px #eb00ffa6, 2px -2px 0px #eb00ffa6, -2px 2px 0px #eb00ffa6, 2px 2px 0px #eb00ffa6; */
      }


      .bg-gradient-primary {
        background-color: #4FB3D9;
        background-image: linear-gradient(180deg,#4FB3D9 10%,#224abe 100%);
        background-size: cover;
      }

  </style>
</head>
<body id="page-top">
  <div id="app">
    @yield('app')
  </div>

  <script src="{{ asset('admin/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
  <script src="{{ asset('admin/js/sb-admin-2.min.js') }}"></script>
  {{-- <script src="{{ asset('vendors/iziToast/js/iziToast.js') }}" type="text/javascript"></script> --}}
  <script src="{{ asset('js/custom.js') }}"></script>
  <script src="{{ asset('vendor/iziToast/js/iziToast.min.js') }}"></script>
  @include('components._toast')
  @stack('javascript')
</body>
</html>
