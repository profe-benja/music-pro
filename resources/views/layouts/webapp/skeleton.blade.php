<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title', 'Sistema de gestión de puntos, recompensas y canjees | ganapuntos.cl')</title>
  <link rel="shortcut icon" href="{{ asset('images/infastlogo.png') }}" />
  <link rel="stylesheet" href="{{ asset('webapp/css/app.css') }}">
  <link href="{{ asset('admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  @stack('stylesheet')
  <style>
    .cursor {
      cursor: pointer;
    }

    .cursor:hover {
      border-color: #161616a6;
    }

    .card {
      border-radius: 18px;
    }

    .modal-header {
      border-bottom: none;
    }

    .modal-content {
      border-radius: 18px;
    }

    .none-decorador {
      text-decoration: none;
    }

    .scroll {
      max-height: 450px;
      margin-bottom: 10px;
      overflow: auto;
      -webkit-overflow-scrolling: touch;
    }

    .nav-pills .nav-link.active,.nav-pills .show>.nav-link{background-color:#000!important;color:#fff!important}

    .nav-pills .nav-link:not(.active):hover{background-color:#000!important;color:#fff!important}
  </style>
</head>
<body class="text-sm">
  {{-- <body class="text-sm" ondragstart="return false" onselectstart="return false" oncontextmenu="return false"> --}}
  <div id="user-code" data-code="{{ current_user()->myQR() }}"></div>
  <div id="app">
    @yield('app')
  </div>

  @stack('extra')
  <script src="{{ asset('webapp/js/app.js') }}"></script>
  @stack('javascript')
</body>
</html>
