@extends('layouts.webapp.app')
@push('stylesheet')

@endpush
@section('content')
@include('webapp.components.nav._home')
<div class="">
  <div class="container mt-4 mb-4">
    <div class="row">
      <div class="col-12 col-md-3 mb-4">
        @include('webapp.components.card._my_account')
      </div>
      <div class="col-md-9">
        <div class="row">
          @include('webapp.components.nav._nav')
          @include('webapp.components.nav._items')


          <div class="col-12 col-md-6 col-lg-4 text-center">
            <div class="card mb-3 shadow cursor position-relative" style="max-width: 540px;"
              data-bs-toggle="modal" data-bs-target="#findModal">
              <div class="row g-0">
                <div class="col-4 align-self-center">
                  <img src="{{ asset('i') }}" class="brillo img-fluid p-2"
                    width="100px" alt="...">
                </div>
                <div class="col-8 align-self-center">
                  <div class="card-body">
                    <h5 class="card-title fw-bold d-none d-md-block">
                      Agregar
                      <img src="{{ asset(current_config()->present()->getImagenCoin()) }}" width="20px" alt=""
                      >
                      {{ current_config()->nombre }}
                    </h5>
                    <h3 class="card-title fw-bold d-md-none">
                      Recibir
                      <img src="{{ asset(current_config()->present()->getImagenCoin()) }}" width="20px" alt="">
                      {{ current_config()->nombre }}
                    </h3>
                    <p class="card-text">
                      <small class="text-muted">{{ $text ?? '' }}</small>
                      {{-- <small>{{ current_user()->myQR() }}</small> --}}
                    </p>
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

@include('webapp.components.modal._qr')


<div class="modal fade" id="findModal" tabindex="-1" aria-labelledby="findModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="findModalLabel">Recibe <img src="{{ asset(current_config()->present()->getImagenCoin()) }}" width="20px" alt="">
          {{ current_config()->nombre }}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container">
          <div class="row">
            <div class="col-12 text-center">
              <strong>¿Tienes algun código?</strong>
            </div>
            <form action="{{ route('webapp.code') }}" method="post">
              @csrf
              <div class="col-md-12 text-center">
                    <label for="" class="form-label">Ingresa código</label>
                    <input type="text" name="code" maxlength="10" class="form-control form-control-lg text-center" placeholder="" onkeyup="this.value=this.value.toUpperCase();" required>
              </div>
              <div class="col-md-12 text-center mt-2">
                <div class="d-grid gap-2">
                  <button type="submit" class="btn btn-dark btn-lg" data-bs-dismiss="modal">BUSCAR</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


@endsection
@push('extra')
  @include('webapp.components.nav._bar')
@endpush

@push('javascript')
<script src="https://unpkg.com/qrious@4.0.2/dist/qrious.js"></script>
<script src="{{ asset('webapp/js/qr.js') }}"></script>

@endpush

