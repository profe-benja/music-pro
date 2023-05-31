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
    <div class="navbar navbar-dark bg-woow fixed-top">
      <div class="container">
        <a href="#" class="navbar-brand">
            <img src="{{ asset('assets/tarjeta/logo.svg') }}" width="200" alt="">
            {{-- <strong class="ms-3">MUSIC PRO</strong> --}}
            {{-- <button class="btn btn-bd-primary ms-3" data-bs-toggle="modal" data-bs-target="#saldoModal">
                <strong>$ {{ current_tarjeta_user()->me_card()->getSaldo() ?? 0 }}</strong>
            </button> --}}
        </a>
        {{--
        <div class="d-flex">
            <button class="btn btn-bd-primary ms-3" data-bs-toggle="modal" data-bs-target="#configModal">
                <span class="d-none d-md-flex">{{ current_tarjeta_user()->nombre }} ❤️</span>
                <span class="d-md-none">❤️</span>
            </button> --}}
            {{-- <a href="{{ route('tarjeta.accesocliente') }}" >Iniciar aquí!</a> --}}
        {{-- </div> --}}
      </div>
    </div>
  </header>

  <header class="py-2 content bg-woow">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="card text-start shadow">
            <div class="card-body">
              <div class="text-center">
                <img src="{{ asset('assets/tarjeta/banners/banner.png') }}" width="500px" class="img-fluid ">
                <h2 class="card-title mt-2">{{ $compania ?? '' }}</h2>
                <p class="card-text">Monto a transferir ${{ helperMoneyFormat($monto) }}</p>
              </div>

              <form action="{{ route('tarjeta.app.transferir') }}" method="POST">
                @csrf
                  <div class="mb-2 row">
                    <label for="inputCuenta" class="col-sm-12 col-form-label">Usuario</label>
                    <div class="col-sm-12">
                      <input type="text" class="form-control" id="inputCuenta" name="cuenta" required>
                    </div>
                  </div>
                  <div class="mb-2 row">
                    <label for="inputPass" class="col-sm-12 col-form-label">Contraseña</label>
                    <div class="col-sm-12">
                      <input type="text" class="form-control" min="1" id="inputPass" name="pass" required>
                    </div>
                  </div>
                </div>
                <div class="d-grid gap-2 m-3">
                  <button class="btn btn-lg btn-bd-primary" type="submit">PAGAR</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
</main>



  {{-- @include('tarjeta.app._mobile_bar') --}}
  {{-- @include('tarjeta.app._modal_recargar') --}}
  {{-- @include('tarjeta.app._modal_saldo') --}}

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
