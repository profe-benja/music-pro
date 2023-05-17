<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'MusicPro - La mejor tienda del mundo')</title>
    <link rel="shortcut icon" href="{{ asset('assets/blogooos.png') }}" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
            font-size: 3.5rem;
        }
      }

      .b-example-divider {
        width: 100%;
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }

      .btn-bd-primary {
        --bd-violet-bg: #712cf9;
        --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

        --bs-btn-font-weight: 600;
        --bs-btn-color: var(--bs-white);
        --bs-btn-bg: var(--bd-violet-bg);
        --bs-btn-border-color: var(--bd-violet-bg);
        --bs-btn-hover-color: var(--bs-white);
        --bs-btn-hover-bg: #6528e0;
        --bs-btn-hover-border-color: #6528e0;
        --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
        --bs-btn-active-color: var(--bs-btn-hover-color);
        --bs-btn-active-bg: #5a23c8;
        --bs-btn-active-border-color: #5a23c8;
      }


      .bg-woow {
        background: rgb(140,82,255);
        background: linear-gradient(90deg, rgba(140,82,255,1) 0%, rgba(92,225,230,1) 100%);
      }

      .bg-woow2 {
        background: rgb(140,82,255);
        background: linear-gradient(90deg, rgba(140,82,255,1) 0%, rgba(221,92,230,1) 100%);
      }

      .bg-woow3 {
        background: rgb(227,101,255);
        background: linear-gradient(0deg, rgba(227,101,255,1) 0%, rgba(0,0,0,1) 100%);
      }

      .bd-mode-toggle {
        z-index: 1500;
      }

      .content {
        margin-top: 65px;
      }

      .cart-item {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 10px;
      }

      .offcanvas, .offcanvas-lg, .offcanvas-md, .offcanvas-sm, .offcanvas-xl, .offcanvas-xxl {
        --bs-offcanvas-zindex: 1045;
        --bs-offcanvas-width: 499px;
      }
    </style>
</head>
<body>


<main class="flex-shrink-0">
  <!-- Navigation-->
  <header data-bs-theme="dark">
    <div class="navbar navbar-dark bg-woow shadow-sm fixed-top">
        <div class="container">
            <a href="#" class="navbar-brand">
                <img src="{{ asset('assets/tarjeta/logo.svg') }}" width="260px" alt="">
                {{-- <strong class="ms-3">MUSIC PRO</strong> --}}
            </a>

            <div class="d-flex">
              <a href="{{ route('tarjeta.accesocliente') }}" class="btn btn-bd-primary ms-3">Iniciar aquí!</a>
            </div>
        </div>
    </div>
</header>




  <!-- Header-->
  <header class="bg-woow py-2 content">
      <div class="container px-5">
          <div class="row gx-5 align-items-center justify-content-center">
              <div class="col-lg-8 col-xl-7 col-xxl-6">
                  <div class="my-5 text-center">
                      <h2 class="fw-bolder text-white mb-2">
                        Abrela gratis y sin comisiones
                      </h2>
                      <p class="lead fw-normal text-white mb-4 text-center">
                        ¡Regístrate hoy mismo y disfruta de la libertad de pagar sin costos adicionales!
                      </p>
                      <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-center">
                        <a class="btn btn-bd-primary btn-lg px-4 me-sm-3" href="{{ route('tarjeta.acceso') }}">BEATPAY FREE</a>
                        <a class="btn btn-outline-light btn-lg px-4" href="#!">BENEFICIOS</a>
                      </div>
                  </div>
              </div>
              <div class="col-xl-5 col-xxl-6 d-none d-xl-block text-center">
                <img class="img-fluid rounded-3 my-5 shadow" src="{{ asset('assets/banner/beatpay12.gif') }}" alt="...">
              </div>
          </div>
      </div>
  </header>
  <!-- Features section-->

  <section>
    <img src="{{ asset('assets/banner/t10.png') }}" class="d-block w-100" alt="...">
  </section>

  <header class="bg-woow2 py-2">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-8 col-xl-7 col-xxl-6">
                <div class="my-5 text-center">
                    <h2 class="fw-bolder text-white mb-2">
                      En BeatPay Virtual
                    </h2>
                    <p class="lead fw-normal text-white mb-4 text-center">
                      Creemos en hacer que la experiencia de compra y pago en eventos musicales y conciertos sea accesible para todos.</p>

                    <h4 class="">
                      Es por eso que ofrecemos nuestra Tarjeta Virtual Visa
                    </h4>
                    <img class="img-fluid rounded-3 shadow" src="{{ asset('assets/banner/beatpayvertical.gif') }}" alt="...">

                    <p class="lead fw-normal text-white mb-4 mt-2 text-center">
                      Cuenta Digital Virtual de forma completamente gratuita, sin costos ni comisiones ocultas.
                    </p>
                    <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-center">
                        <a class="btn btn-bd-primary btn-lg px-4 me-sm-3" href="{{ route('tarjeta.acceso') }}">BEATPAY FREE</a>
                        <a class="btn btn-outline-light btn-lg px-4" href="#!">BENEFICIOS</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

  <section>
    <img src="{{ asset('assets/banner/t9.png') }}" class="d-block w-100" alt="...">
  </section>

  </section>
    <img src="{{ asset('assets/banner/3.png') }}" class="d-block w-100" alt="...">
  </section>
</main>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
</body>
</html>
