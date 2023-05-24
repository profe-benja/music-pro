<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>@yield('title', 'Music Pro - La mejor tienda de musica')</title>
  <link rel="shortcut icon" href="{{ asset('assets/blogooo.svg') }}"/>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{ asset('css/login.css') }}">
  <style>
    .intro-section {
      background-image: url("{{ asset('assets/banner/beatpay12.gif') }}");
      background-size: cover;
      background-repeat: no-repeat;
      background-position: center;
      padding: 75px 95px;
      min-height: 100vh;
      display: -webkit-box;
      display: flex;
      -webkit-box-orient: vertical;
      -webkit-box-direction: normal;
      flex-direction: column;
    }



    .btn-ta-info {
        color: #fff;
        background-color: #712cf9;
        border-color: #712cf9;
    }

  </style>
</head>
<body>
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-6 col-md-7 intro-section d-none d-md-block">
      </div>
      <div class="col-sm-6 col-md-5 form-section">
        <div class="login-wrapper">
          <div class="text-center mb-4">
            <div class="col">
              <img src="{{ asset('assets/beatpay.png') }}" width="300" class="img-fluid rounded-top" alt="">
              {{-- <img src="{{ asset('assets/tarjeta/minilogo.png') }}" width="200" class="img-fluid rounded-top" alt=""> --}}
            </div>
            <div class="col pt-2">
              <small>
                <strong>
                  {{-- Compra, Paga y Rockea!🎵 --}}
                </strong>
                @if ($admin)
                <h5>
                  <span class="badge btn-ta-info text-white">ACCESO ADMINISTRADOR</span>
                </h5>
                @else
                <h5>
                  <span class="badge btn-ta-info text-white">ACCESO CLIENTE</span>
                </h5>
                @endif
              </small>
            </div>
          </div>

          <form action="{{ route('tarjeta.acceso') }}" method="POST">
            @csrf
            <div class="form-group">
              <label for="user">Usuario</label>
              <input type="text" class="form-control" id="user" name="user" value="{{ $user }}" placeholder="" required>
            </div>
            <div class="form-group">
              <div class="d-flex justify-content-between">
                <label for="pass">Contraseña</label>
                {{-- <a href="">¿He olvidado mi contraseña?</a> --}}
              </div>
              <input type="password" class="form-control" id="pass" name="pass" value="{{ $pass }}" placeholder="" required>
            </div>

            {{-- <div class="form-group">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="gridCheck">
                <label class="form-check-label" for="gridCheck">
                  Check me out
                </label>
              </div>
            </div> --}}
            <button type="submit" class="btn btn-ta-info btn-block">
              <strong>INGRESAR</strong>
            </button>

            @unless ($admin)
            <a href="{{ route('tarjeta.acceso.registro') }}" type="submit" class="btn btn-primary btn-block">
              <strong>Registrarse 💳</strong>
            </a>
            @endunless
            <div class="text-center mt-3">
                <a href="{{ route('tarjeta.reset') }}" class="text-dark">He olvidado mi contraseña 🎸</a>
            </div>
            <hr>
            <div class="text-center">
              @if ($admin)
                <a href="{{ route('tarjeta.accesocliente') }}">Acceso cliente</a>
              @else
                <a href="{{ route('tarjeta.acceso') }}">Acceso admin</a>
              @endif
            </div>
          </form>
        </div>

      </div>
    </div>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
</body>
</html>
