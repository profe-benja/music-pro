@extends('layouts.tarjeta_app.app')
@push('stylesheet')

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
          <div class="card text-start shadow" style="height: 600px;">
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


        <div class="d-grid gap-2">
          <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#qrModal">
            <i class="fa-solid fa-3x fa-qrcode"></i>
            compartir
          </button>
        </div>
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
@endsection
@push('javascript')
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
@endpush
