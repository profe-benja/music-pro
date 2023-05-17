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

      html {
        background: rgb(140,82,255);
        background: linear-gradient(90deg, rgba(140,82,255,1) 0%, rgba(92,225,230,1) 100%);
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

      .nav-pills .nav-link.active, .nav-pills .show>.nav-link {
        color: var(--bs-nav-pills-link-active-color);
        background-color: rgb(140,82,255);
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
  @import url('https://fonts.googleapis.com/css?family=Barlow|Major+Mono+Display&display=swap');

    body {
      background-color: rgb(250, 250, 250);
    }

    * {
      box-sizing: border-box;
      margin: 0px;
      padding: 0px;
    }

    .font-barlow-sc {
      font-family: 'Barlow', cursive;
    }

    .font-number {
      font-family: 'Major Mono Display', monospace;
    }

    .p-30 {
      padding: 30px;
    }

    .mt-30 {
      margin-top: 30px;
    }

    .credit-card {
      box-sizing: content-box;
      width: 350px;
      height: 190px;
      background: url("{{ asset('assets/tarjeta/card/verticalpurple.png') }}");
      background-size: cover;
      border-radius: 15px;
      padding: 30px;
      /* -webkit-box-shadow: 0px 5px 30px 0px rgba(111,111,111,0.3); */
      /* -moz-box-shadow: 0px 5px 30px 0px rgba(111,111,111,0.3); */
      /* box-shadow: 0px 5px 30px 0px rgba(111,111,111,0.3); */
      position: relative;
      z-index: 1;
    }

    .logo-visa {
      height: 20px;
    }

    .text-uppercase {
      text-transform: uppercase;
    }

    .text-white {
      color: rgb(255,255,255);
    }

    .text-blue {
      color: rgb(37,92,190);
    }

    .text-gray {
      color: rgb(126, 126, 126);
    }

    .text-right {
      text-align: right;
    }

    .text-center {
      text-align: center;
    }

    .d-none {
      display: none;
    }

    .d-flex {
      display: flex;
    }

    .flex-column {
      flex-direction: column;
    }

    .justify-content-between {
      justify-content: space-between;
    }

    .m-auto {
      margin: auto;
    }

    .size-card-info {
      font-size: 0.55rem;
      letter-spacing: 0.2rem;
      line-height: 1rem;
    }

    .size-card-user {
      font-size: 1rem;
    }

    .size-card-number {
      font-size: 1.8rem;
    }
</style>
</head>
<body>


<main class="flex-shrink-0">
  <header>
    <div class="navbar navbar-dark bg-woow shadow-sm fixed-top">
        <div class="container">
            <a href="#" class="navbar-brand">
                <img src="{{ asset('assets/tarjeta/logo.svg') }}" width="100" alt="">
                {{-- <strong class="ms-3">MUSIC PRO</strong> --}}
                <button class="btn btn-bd-primary ms-3" data-bs-toggle="modal" data-bs-target="#saldoModal">
                  <strong>$ {{current_tarjeta_user()->me_card()->getSaldo() ?? 0 }}</strong>
                </button>
            </a>

            <div class="d-flex">
              <button class="btn btn-bd-primary ms-3" data-bs-toggle="modal" data-bs-target="#configModal">
                {{ current_tarjeta_user()->nombre }} ❤️
              </button>
              {{-- <a href="{{ route('tarjeta.accesocliente') }}" >Iniciar aquí!</a> --}}
            </div>
        </div>
    </div>
  </header>

  <header class="py-2 content bg-woow">
    <div class="container">
      <div class="row">
        <div class="col-md-5 d-none d-md-block">
          <div class="card text-start shadow">
            {{-- <img class="card-img-top" src="holder.js/100px180/" alt="Title"> --}}
            <div class="card-body">
              {{-- <h4 class="card-title">Title</h4> --}}
              {{-- <p class="card-text">Body</p> --}}
              @include('tarjeta.app._card')
            </div>
          </div>
        </div>
        <div class="col-md-7">
          <div class="card text-start shadow" style="height: 400px;">
            <div class="card-body">
              <ul class="nav nav-pills nav-fill mb-3 mx-2 gap-3" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active border shadow-sm" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">
                    Mi saldo
                  </button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link border shadow-sm" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">
                    Mis transacciones
                  </button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link border shadow-sm" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">
                    Transferir
                  </button>
                </li>
              </ul>
              <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">...</div>
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
                  <div class="table-responsive">
                    <table class="table
                    table-hover
                    align-middle">
                      <tbody>
                        <tr>
                          <td scope="row">Item</td>
                          <td>Item</td>
                          <td class="text-end">
                            <strong>$ 1.000</strong>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>

                </div>
                <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab" tabindex="0">
                  @include('tarjeta.app._transferir')
                </div>
              </div>
            </div>
          </div>


        </div>
      </div>
    </div>

  </header>
</main>

<!-- Modal -->
<div class="modal fade" id="configModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      {{-- <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div> --}}
      <div class="modal-body">
        <i class="fa-solid fa-qrcode"></i>
      </div>
      {{-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> --}}
    </div>
  </div>
</div>


<div class="modal fade" id="saldoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      {{-- <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div> --}}
      <div class="modal-body">
        @include('tarjeta.app._card')
        <span class="">
          <button class="btn btn-dark btn-lg" data-bs-toggle="modal" data-bs-target="#qrModal">
            <i class="fa-solid fa-3x fa-qrcode"></i>
          </button>
          Compartir
        </span>
      </div>
      {{-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> --}}
    </div>
  </div>
</div>

<div class="modal fade" id="qrModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      {{-- <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div> --}}
      <div class="modal-body d-flex justify-content-center align-items-center">
        <div class="c">
          <div id="qrcode"></div>
        </div>
      </div>
      {{-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> --}}
    </div>
  </div>
</div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
  <script src="{{ asset('js/qrcode.min.js') }}"></script>

  <script>
    var qrcode = new QRCode("qrcode", {
        text: "http://jindo.dev.naver.com/collie",
        width: 228,
        height: 228,
        colorDark : "#000000",
        colorLight : "#ffffff",
        correctLevel : QRCode.CorrectLevel.H
    });
  </script>
</body>
</html>
