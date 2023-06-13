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

      .bd-mode-toggle {
        z-index: 1500;
      }

      .content {
        margin-top: 70px;
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


      .card-stepper {
z-index: 0
}

#progressbar-2 {
color: #455A64;
}

#progressbar-2 li {
list-style-type: none;
font-size: 13px;
width: 33.33%;
float: left;
position: relative;
}

#progressbar-2 #step1:before {
content: '\f058';
font-family: "Font Awesome 5 Free";
color: #fff;
/* width: 37px; */
margin-left: 0px;
padding-left: 0px;
}

#progressbar-2 #step2:before {
content: '\f058';
font-family: "Font Awesome 5 Free";
color: #fff;
width: 37px;
}

#progressbar-2 #step3:before {
content: '\f058';
font-family: "Font Awesome 5 Free";
color: #fff;
/* width: 37px; */
margin-right: 0;
text-align: center;
}

#progressbar-2 #step4:before {
content: '\f111';
font-family: "Font Awesome 5 Free";
color: #fff;
width: 37px;
margin-right: 0;
text-align: center;
}

#progressbar-2 li:before {
line-height: 37px;
display: block;
font-size: 12px;
background: #c5cae9;
border-radius: 50%;
}

#progressbar-2 li:after {
content: '';
width: 100%;
height: 10px;
background: #c5cae9;
position: absolute;
left: 0%;
right: 0%;
top: 15px;
z-index: -1;
}

#progressbar-2 li:nth-child(1):after {
left: 1%;
width: 100%
}

#progressbar-2 li:nth-child(2):after {
left: 1%;
width: 100%;
}

#progressbar-2 li:nth-child(3):after {
left: 1%;
width: 100%;
background: #c5cae9 !important;
}

#progressbar-2 li:nth-child(4) {
left: 0;
width: 37px;
}

#progressbar-2 li:nth-child(4):after {
left: 0;
width: 0;
}

#progressbar-2 li.active:before,
#progressbar-2 li.active:after {
background: #ff1313;
}
    </style>
</head>
<body>
  <header data-bs-theme="dark">
      <div class="navbar navbar-dark bg-danger shadow-sm fixed-top">
          <div class="container">
              <a href="#" class="navbar-brand">
                  <img src="{{ asset('assets/blogooos.png') }}" width="50px" alt="">
                  <strong class="ms-3">MUSIC PRO</strong>
              </a>

              <div class="d-flex">
                <a href="{{ route('transporte.accesocliente') }}" class="btn btn-warning ms-3">Iniciar Sesión 🚚</a>
              </div>
          </div>
      </div>
  </header>

  <div class="content">
    <div id="carouselExample" class="carousel slide">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="{{ asset('assets/banner/03.png') }}" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="{{ asset('assets/banner/01.png') }}" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="{{ asset('assets/banner/02.png') }}" class="d-block w-100" alt="...">
        </div>
        {{-- <div class="carousel-item">
          <img src="{{ asset('assets/banner/3.png') }}" class="d-block w-100" alt="...">
        </div> --}}
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
    <div class="album py-5 bg-body-tertiary">

      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-10 mx-auto">
            <div class="card card-stepper text-black">

              <div class="card-body p-5">
                <div class="d-flex justify-content-between align-items-center mb-5">
                  <div>
                    <a href="{{ route('transporte.index') }}" class="btn btn-primary">Volver</a>
                    <h5 class="mb-0">Seguimiento <span class="text-primary font-weight-bold">#{{ $s->codigo_seguimiento }}</span></h5>
                  </div>
                  <div class="">
                    <h3><span class="badge bg-{{ $s->estado == 0 ? 'dark' : ($s->estado == 1 ? 'primary' : 'success' )}}">{{ $s->getEstado() }}</span></h3>
                  </div>
                </div>

                @php
                    $e = $s->estado;
                    // $e = 1;
                    $nivel1 = 100;
                    $nivel2 = 100;

                    if ($e==0) {
                      $nivel1 = rand(25, 88);
                      $nivel2 = 0;
                    }
                    if ($e==1) {
                      $nivel1 = 100;
                      $nivel2 = rand(25, 88);
                    }
                @endphp

                <div class="d-flex align-items-center justify-content-center mb-4">
                  <div class="flex">
                    <i class="fas fa-check-circle fs-3 me-4 {{ $e >= 0 ? 'text-success' : '' }}"></i>
                  </div>
                  <div class="progress w-100" role="progressbar" aria-label="Animated striped example" aria-valuenow="{{$nivel1}}" aria-valuemin="0" aria-valuemax="100">
                    <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" style="width: {{$nivel1}}%"></div>
                  </div>
                  <i class="fas fa-check-circle fs-3 mx-4 {{ $e >= 1 ? 'text-success' : '' }}"></i>
                  <div class="progress w-100" role="progressbar" aria-label="Animated striped example" aria-valuenow="{{$nivel2}}" aria-valuemin="0" aria-valuemax="100">
                    <div class="progress-bar bg-primary progress-bar-striped progress-bar-animated" style="width: {{$nivel2}}%"></div>
                  </div>
                  <i class="fas fa-check-circle fs-3 mx-4 {{ $e >= 2 ? 'text-success' : '' }}"></i>
                </div>
                <div class="d-flex justify-content-between">
                  <div class="d-lg-flex align-items-center">
                    <i class="fas fa-clipboard-list fa-3x me-lg-4 mb-3 mb-lg-0"></i>
                    <div>
                      <p class="fw-bold mb-1">En proceso</p>
                      {{-- <p class="fw-bold mb-0">Processed</p> --}}
                    </div>
                  </div>
                  <div class="d-lg-flex align-items-center">
                    <i class="fas fa-shipping-fast fa-3x me-lg-4 mb-3 mb-lg-0"></i>
                    <div>
                      <p class="fw-bold mb-1">En camino</p>
                      {{-- <p class="fw-bold mb-0">En Route</p> --}}
                    </div>
                  </div>
                  <div class="d-lg-flex align-items-center">
                    <i class="fas fa-home fa-3x me-lg-4 mb-3 mb-lg-0"></i>
                    <div>
                      <p class="fw-bold mb-1">Entregado</p>
                      {{-- <p class="fw-bold mb-0">Arrived</p> --}}
                    </div>
                  </div>
                </div>

                <div class="row mt-3 text-center">
                  <div class="col">
                    <div class="card">
                      <div class="card-body">
                        <h5 class="card-title">En Proceso</h5>
                        <p class="card-text">La encomienda se encuentra en proceso de preparación.</p>
                      </div>
                    </div>
                  </div>
                  <div class="col">
                    <div class="card highlight">
                      <div class="card-body">
                        <h5 class="card-title">En Camino</h5>
                        <p class="card-text">La encomienda está en camino hacia su destino.</p>
                      </div>
                    </div>
                  </div>
                  <div class="col">
                    <div class="card">
                      <div class="card-body">
                        <h5 class="card-title">Entregado</h5>
                        <p class="card-text">La encomienda ha sido entregada con éxito.</p>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  {{-- <footer class="text-body-secondary py-5">
    <div class="container">
      <p class="float-end mb-1">
        <a href="#">Back to top</a>
      </p>
      <p class="mb-1">Album example is &copy; Bootstrap, but please download and customize it for yourself!</p>
      <p class="mb-0">New to Bootstrap? <a href="/">Visit the homepage</a> or read our <a href="/docs/5.3/getting-started/introduction/">getting started guide</a>.</p>
    </div>
  </footer> --}}
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>


  <script>
    buscar() {
      console.log('hola');
      var codigo = $('#codigo_seguimiento').val();
      window.location.href = '/transporte/seguimiento/' + codigo;
    }
  </script>
</body>
</html>
