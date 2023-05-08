@extends('layouts.webapp.app')
@push('stylesheet')

@endpush
@section('content')
@include('webapp.components.nav._home')

<div style="margin-bottom: 70px;">
  <div class="container mt-4 mb-4">
    <div class="row">
      <div class="col-12 col-md-3 mb-4 d-none d-md-block">
        @include('webapp.components.card._my_account')
      </div>
      <div class="col-md-9">
        <div class="row">
          @include('webapp.components.nav._nav')
          <div class="container px-4">
            <h2 class="pb-2 lead">
              <i class="fa fa-store"></i> Articulos para Canjear
            </h2>
          </div>
          @foreach ($productos as $p)
          <div class="col-6 col-md-3 offset-md-0 mb-3 d-flex align-items-center">
            <div class="card align-self-stretch shadow cursor" onclick="window.location.href='{{ route('webapp.canjear.show', $p->id) }}'">
              <img class="card-img-top rounded-top" src="{{ asset($p->present()->getImagen()) }}" alt="">
              <div class="card-body">
                {{-- <h4 class="card-title">{{ $p-> }}</h4> --}}
                <p class="card-text"><small>{{ $p->nombre }}</small></p>
                {{-- <p class="card-text"><small>{{ $p->nombre }}</small></p> --}}
              </div>
              <div class="card-footer">
                <h5 class="font-weight-bold text-center">
                  <img src="{{ asset(current_config()->present()->getImagenCoin()) }}" width="20px" alt=""
                 > {{ $p->getPrecio() }}
                </h5>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="listModal" tabindex="-1" aria-labelledby="listModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      {{-- <div class="modal-header">
        <h5 class="modal-title" id="listModalLabel">Recibir <img
            src="{{ asset(current_config()->present()->getImagenCoin()) }}" width="20px" alt="">
          {{ current_config()->nombre }}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div> --}}
      <div class="modal-body">
        <div class="container">
          <div class="row">
            {{-- <div class="col-12 text-center">
              <strong><small>Muestra este QR para recibir la recompensa</small></strong>
            </div> --}}
            <div class="col-md-12 text-center mb-3">
              <img id="list-modal-img" class="img-fluid rounded-3" width="400px" alt="">
            </div>
            <div class="col-md-12 text-center">
              <h2>
                <img src="{{ asset(current_config()->present()->getImagenCoin()) }}" width="32px" alt=""
                  class="img-fluid me-2"><span id="list-modal-credit"></span>
              </h2>
            </div>

            <div class="col-md-12">
              <div class="card border">
                {{-- <img class="card-img-top" src="holder.js/100px180/" alt="Title"> --}}
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table align-middle table-sm text-sm">
                      <tbody>
                        <tr>
                          <td scope="row">Nombre:</td>
                          <td class="text-end">
                            <small><span id="list-modal-name"></span></small>
                          </td>
                        </tr>
                        <tr>
                          <td scope="row">Descripción:</td>
                          <td class="text-end">
                            <small><span id="list-modal-description"></span></small>
                          </td>
                        </tr>
                        <tr>
                          <td scope="row">Fecha:</td>
                          <td class="text-end">
                            <small><span id="list-modal-fecha"></span></small>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  {{-- <small style="font-size: 12px;">Código <span id="list-modal-code"></span></small> --}}
                </div>
              </div>
            </div>

            <div class="col-md-12 text-center mt-2">
              <div class="d-grid gap-2">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cerrar</button>
              </div>
            </div>
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

@endpush
