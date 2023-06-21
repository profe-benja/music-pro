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
              <form action="{{ route('api.v1.tarjeta.transaccion') }}" method="POST">
                @csrf
                  <input type="hidden" name="params_get" value="{{ $params_get }}">
                  <input type="hidden" name="callback" value="{{ $callback }}">
                  <input type="hidden" name="usuarioTarjeta" value="{{$usuarioTarjeta->id}}">
                  <input type="hidden" name="monto" value="{{$monto}}">

                  <div class="mb-2 row">
                    <label for="correo" class="col-sm-12 col-form-label">Correo electronico</label>
                    <div class="col-sm-12">
                      <input type="text" class="form-control" id="correo" name="correo" required>
                    </div>
                  </div>
                  <div class="mb-2 row">
                    <label for="pass" class="col-sm-12 col-form-label">Contraseña</label>
                    <div class="col-sm-12">
                      <input type="password" class="form-control" min="1" id="pass" name="pass" required>
                    </div>
                  </div>
                </div>
                <div class="d-grid gap-2 m-3">
                  <button class="btn btn-lg btn-bd-primary" type="submit">PAGAR</button>


                  @if ($status)
                    <a href="{{ $callback }}?status=error" class="btn btn-lg btn-danger">CANCELAR</a>
                  @endif
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
</main>

@endsection
@push('javascript')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if (session('success'))
<script>
  Swal.fire({
    icon: 'success',
    // title: 'Correo enviado',
    text: "{{ session('success') }}",
  })
</script>
@endif
@if ($status == 'fail')
<script>
  Swal.fire({
    icon: 'info',
    title: 'No se pudo realizar la transacción',
    text: "por favor intente nuevamente.",
  })
</script>
@endif
@if ($status == 'error')
<script>
  Swal.fire({
    icon: 'error',
    title: 'No se pudo realizar la transacción',
    text: "por favor intente nuevamente.",
  })
</script>
@endif
@if ($status == 'money')
<script>
  Swal.fire({
    icon: 'error',
    title: 'No se pudo realizar la transacción',
    text: "No tienes dinero suficiente.",
  })
</script>
@endif
@endpush
