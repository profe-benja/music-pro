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
              <div class="col">
                <img src="{{ asset('assets/beatpay.png') }}" width="300" class="img-fluid rounded-top" alt="">
                {{-- <img src="{{ asset('assets/tarjeta/minilogo.png') }}" width="200" class="img-fluid rounded-top" alt=""> --}}
              </div>
              <div class="col pt-2">
                <small>
                  <strong>
                    {{-- Tienda online 100% segura --}}
                  </strong>
                  <h5>
                    <span class="badge btn-ta-info text-white">REGISTRO CLIENTE</span>
                  </h5>
                </small>
              </div>
            </div>

            <form action="{{ route('tarjeta.reset') }}" method="POST">
              @csrf
              <div class="row">
                <div class="form-group col-6">
                  <label for="correo">Correo</label>
                  <input type="email" class="form-control" id="correo" name="correo" placeholder="" required>
                </div>
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
                <strong>Recuperar</strong>
              </button>
              <div class="text-center my-3">
                <a href="{{ route('tarjeta.accesocliente') }}">Volver</a>
              </div>
            </form>
          </div>

        </div>
      </div>
    </div>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  @if (session('success'))
  <script>
    Swal.fire({
      icon: 'success',
      title: 'Correo enviado',
      text: 'Se ha enviado un correo de recuperacion',
    })
  </script>
  @endif
  @if (session('danger'))
  <script>
    Swal.fire({
      icon: 'error',
      title: 'Correo no existe',
      text: 'Revise el correo ingresado',
    })
  </script>
  @endif
</body>
</html>
