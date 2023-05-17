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
      background-image: url("{{ asset('assets/store-gdfc8d738c_1280.jpg') }}");
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
  </style>
</head>
<body>
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-6 col-md-7 intro-section d-none d-md-block">
        {{-- <div class="brand-wrapper"> --}}
          {{-- <h1><a href="https://stackfindover.com/">Logo</a></h1> --}}
        {{-- </div> --}}
        {{-- <div class="intro-content-wrapper">
          <h1 class="intro-title">Welcome to website !</h1>
          <p class="intro-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
            incididunt ut labore et dolore magna</p>
          <a href="#!" class="btn btn-read-more">Read more</a>
        </div>
        <div class="intro-section-footer">
          <nav class="footer-nav">
            <a href="#!">Facebook</a>
            <a href="#!">Twitter</a>
            <a href="#!">Gmail</a>
          </nav>
        </div> --}}
      </div>
      <div class="col-sm-6 col-md-5 form-section">
        <div class="login-wrapper">
          <div class="text-center mb-4">
            <div class="col">
              <img src="{{ asset('assets/blogooo.svg') }}" width="200" class="img-fluid rounded-top" alt="">
            </div>
            <div class="col">
              <small>
                <strong>
                  Tienda online 100% segura
                </strong>
                @if ($admin)
                <h5>
                  <span class="badge bg-dark text-white">ACCESO ADMINISTRADOR</span>
                </h5>
                @else
                <h5>
                  <span class="badge bg-danger text-white">ACCESO CLIENTE</span>
                </h5>
                @endif
              </small>
            </div>
          </div>

          <form action="{{ route('sucursal.acceso') }}" method="POST">
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
            <button type="submit" class="btn btn-dark btn-block">
              <strong>A ROCKEAR!!</strong>
            </button>

            @unless ($admin)
            <a href="{{ route('sucursal.acceso.registro') }}" type="submit" class="btn btn-danger btn-block">
              <strong>Registrarse 🤘</strong>
            </a>
            @endunless
            <hr>
            <div class="text-center">
              @if ($admin)
                <a href="{{ route('sucursal.accesocliente') }}">Acceso cliente</a>
              @else
                <a href="{{ route('sucursal.acceso') }}">Acceso admin</a>
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
