@extends('layouts.tarjeta_app.app')
@push('stylesheet')
  <style>
      .cursor {
          cursor: pointer;
      }

      .my-custom-scrollbar {
          position: relative;
          height: {{ $isMobile ? '500px' : '440px' }};
          overflow: auto;
      }

      .table-wrapper-scroll-y {
          display: block;
      }

      .mobile-navbar {
          display: none;
      }


      @media (max-width: 767px) {
          .mobile-navbar {
              border-top: 1px solid #6528e0;
              display: flex;
              justify-content: space-between;
              position: fixed;
              bottom: 0;
              left: 0;
              right: 0;
              background-color: #fff;
              /* color: #fff; */
              padding: 2px;
              z-index: 9999;
              box-shadow: #6528e0 0px 0px 10px;
          }

          .navbar-item {
              display: flex;
              flex-direction: column;
              align-items: center;
              /* color: #fff; */
              text-decoration: none;
              width: 100%;
          }

          .navbar-item i {
              margin-bottom: 1px;
          }
      }
  </style>
@endpush
@section('content')
  <main class="flex-shrink-0">
      <header>
          <div class="navbar navbar-dark bg-woow shadow-sm fixed-top">
              <div class="container">
                  <a href="#" class="navbar-brand">
                      <img src="{{ asset('assets/tarjeta/logo.svg') }}" width="100" alt="">
                      {{-- <strong class="ms-3">MUSIC PRO</strong> --}}
                      <button class="btn btn-bd-primary ms-3" data-bs-toggle="modal" data-bs-target="#saldoModal">
                          <strong>$ {{ current_tarjeta_user()->me_card()->getSaldo() ?? 0 }}</strong>
                      </button>
                  </a>

                  <div class="d-flex">
                      <button class="btn btn-bd-primary ms-3" data-bs-toggle="modal" data-bs-target="#configModal">
                          <span class="d-none d-md-flex">{{ current_tarjeta_user()->nombre }} ❤️</span>
                          <span class="d-md-none">❤️</span>
                      </button>
                      {{-- <a href="{{ route('tarjeta.accesocliente') }}" >Iniciar aquí!</a> --}}
                  </div>
              </div>
          </div>
      </header>


      <header class="py-2 content bg-woow">
          <div class="container">
              <div class="row">
                  <div class="col-md-4 d-none d-md-block">
                      <div class="card text-start shadow">
                          {{-- <img class="card-img-top" src="holder.js/100px180/" alt="Title"> --}}
                          <div class="card-body">
                              {{-- <h4 class="card-title">Title</h4> --}}
                              {{-- <p class="card-text">Body</p> --}}
                              @include('tarjeta.app._card')
                          </div>
                      </div>
                  </div>
                  <div class="col">
                      <div class="card text-start shadow">
                          <div class="card-body">
                              <ul class="nav nav-pills nav-fill mb-3 mx-2 gap-3 d-none d-md-flex" id="pills-tab"
                                  role="tablist">
                                  <li class="nav-item" role="presentation">
                                      <button class="nav-link active border shadow-sm" id="pills-home-tab"
                                          data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab"
                                          aria-controls="pills-home" aria-selected="true">
                                          Inicio
                                      </button>
                                  </li>
                                  <li class="nav-item" role="presentation">
                                      <button class="nav-link border shadow-sm" id="pills-profile-tab"
                                          data-bs-toggle="pill" data-bs-target="#pills-profile" type="button"
                                          role="tab" aria-controls="pills-profile" aria-selected="false">
                                          Mis transacciones
                                      </button>
                                  </li>
                                  <li class="nav-item" role="presentation">
                                      <button class="nav-link border shadow-sm" id="pills-contact-tab"
                                          data-bs-toggle="pill" data-bs-target="#pills-contact" type="button"
                                          role="tab" aria-controls="pills-contact" aria-selected="false">
                                          Transferir
                                      </button>
                                  </li>
                              </ul>
                              <div class="tab-content" id="pills-tabContent">
                                  <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                      aria-labelledby="pills-home-tab" tabindex="0">
                                      <div class="text-center mb-3">
                                          <h1 class="fw-bold">¡Beatvenido {{ current_tarjeta_user()->nombre }} 🎸!</h1>
                                          <small>Disfrutar de todos los beneficios que tenemos para ti.</small>
                                      </div>

                                      <div class="mb-3">
                                          <img src="{{ asset('assets/tarjeta/banners/recarga.png') }}"
                                              class="shadow img-fluid rounded-top" alt="">
                                      </div>


                                      <div class="text-center">
                                          <button class="btn btn-bd-primary btn-lg" data-bs-toggle="modal"
                                              data-bs-target="#reargarModal">
                                              Cargar tu tarjeta aquí ❤️
                                          </button>
                                      </div>

                                      <hr>
                                      <div class="text-center">
                                          <button class="btn btn-ou btn-outline-primary"
                                              onclick="selectedItem('pills-profile-tab')">
                                              Ver mis movimientos
                                          </button>
                                      </div>
                                  </div>
                                  <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                      aria-labelledby="pills-profile-tab" tabindex="0">

                                      <div class="container">
                                          <div class="">
                                              @include('tarjeta.app._movimientos')
                                          </div>
                                      </div>
                                  </div>
                                  <div class="tab-pane fade" id="pills-contact" role="tabpanel"
                                      aria-labelledby="pills-contact-tab" tabindex="0">
                                      <div class="container">
                                          <div class="row">
                                              @include('tarjeta.app._transferir')
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>

      </header>
  </main>



  @include('tarjeta.app._mobile_bar')
  @include('tarjeta.app._modal_recargar')
  @include('tarjeta.app._modal_saldo')

  <div class="modal fade" id="configModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
              {{-- <div class="modal-header">
      <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div> --}}
              <div class="modal-body text-center">
                  <ul class="list-group list-group-flush">
                      <li class="list-group-item">
                          Hola👋! {{ $tarjeta->usuario->nombre_completo() }}
                      </li>
                      <li class="list-group-item">
                          <a class="btn btn-bd-primary btn-sm" href="{{ route('tarjeta.app.empresa') }}">
                              INSTRUCCIONES DE API
                          </a>
                      </li>
                      <li class="list-group-item">
                          <a class="btn btn-danger rounded-pill" href="{{ route('logout') }}">
                              Cerrar sesión
                          </a>
                      </li>
                  </ul>
                  {{-- <i class="fa-solid fa-qrcode"></i> --}}
              </div>
              {{-- <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      <button type="button" class="btn btn-primary">Save changes</button>
    </div> --}}
          </div>
      </div>
  </div>
@endsection
@push('javascript')
    @include('tarjeta.app._swal')
    <script src="{{ asset('js/qrcode.min.js') }}"></script>
    <script>
        var qrcode = new QRCode("qrcode", {
            text: "http://jindo.dev.naver.com/collie",
            width: 228,
            height: 228,
            colorDark: "#000000",
            colorLight: "#ffffff",
            correctLevel: QRCode.CorrectLevel.H
        });

        function selectedItem(item) {
            document.getElementById(item).click();
        }
    </script>
@endpush
