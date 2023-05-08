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
              <i class="fa fa-list"></i> Historial de movimientos
            </h2>
          </div>
          <div class="col-md-12">
            <div class="card border-white shadow-sm">
              <div class="card-body">
                {{-- <ol class="list-group scroll border border-1 border-gray">
                  @foreach (current_user()->transacciones as $t)
                  <li data-bs-toggle="modal" data-bs-target="#listModal"
                    data-bs-info="{{ json_encode($t->getRawInfo()) }}"
                    class="list-group-item d-flex justify-content-between align-items-center">
                    <div class="ms-2 me-auto">
                      <div class="">
                        <small>
                          <i class="far fa-calendar"></i> {{ $t->getFechaCreacion()->getDateVersion() }}
                        </small>
                      </div>
                      @if ($t->accion)
                        <strong>{{ $t->accion->nombre }}</strong>
                      @endif
                      @if ($t->producto)
                        <strong>Solicitud: {{ $t->producto->nombre }}</strong>
                        @if ($t->estado == 2)
                          <span class="badge bg-warning">Pendiente</span>
                        @endif
                      @endif
                    </div>
                    <div class="ms-2">
                      <strong class="text-{{ $t->tipo ? 'success' : 'danger' }}">
                        <img src="{{ asset(current_config()->present()->getImagenCoin()) }}" width="20px" alt="">
                        <strong>{{ $t->getCredito() }}</strong>
                      </strong>
                    </div>
                  </li>
                  @endforeach
                  <li class="list-group-item d-flex justify-content-center align-items-start">
                    <div class="text-center">
                      <small>No hay más movimientos</small>
                    </div>
                  </li>
                </ol> --}}

                <div class="table-responsive scroll">
                  <table class="table table-sm border border-1 border-gray">
                    {{-- <thead>
                      <tr>
                        <th scope="col">Column 1</th>
                        <th scope="col">Column 2</th>
                        <th scope="col">Column 3</th>
                      </tr>
                    </thead> --}}
                    <tbody>
                      @foreach (current_user()->transacciones as $t)
                      <tr data-bs-toggle="modal" data-bs-target="#listModal"
                      data-bs-info="{{ json_encode($t->getRawInfo()) }}">
                        <td scope="row">
                          <div class="ms-2 me-auto">
                            <div class="">
                              <small>
                                <i class="far fa-calendar"></i> {{ $t->getFechaCreacion()->getDateVersion() }}
                              </small>
                            </div>
                            @if ($t->accion)
                              <strong>{{ $t->accion->nombre }}</strong>
                            @endif
                            @if ($t->producto)
                              <strong>Solicitud: {{ $t->producto->nombre }}</strong>
                              @if ($t->estado == 2)
                                <span class="badge bg-warning">Pendiente</span>
                              @endif
                            @endif
                          </div>
                        </td>
                        @if ($t->estado != 3)
                        <td class="text-{{ $t->tipo ? 'primary' : 'dark' }} text-end" width="30%">
                          <strong>{{ $t->tipo ? '' : '-' }} {{ $t->getCredito() }}</strong>
                          <img src="{{ asset(current_config()->present()->getImagenCoin()) }}" width="20px" alt="">
                        </td>
                        @else
                          <td class="text-primary text-end" width="30%">
                            <span class="badge badge-pill btn-primary">Reembolso</span>

                          {{-- <strong>+ {{ $t->getCredito() }}</strong> --}}
                          {{-- <img src="{{ asset(current_config()->present()->getImagenCoin()) }}" width="20px" alt=""> --}}
                        </td>
                        @endif
                        {{-- <td class="text-end" width="30%">
                          <div class="ms-2">
                            <strong class="text-{{ $t->tipo ? 'success' : 'danger' }}">
                              <strong>{{ $t->getCredito() }}</strong>
                              <img src="{{ asset(current_config()->present()->getImagenCoin()) }}" width="20px" alt="">
                            </strong>
                          </div>
                        </td> --}}
                      </tr>
                    @endforeach
                      <tr class="text-center">
                        <td colspan="2">No tienes más movimientos</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
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
            <div class="col-12 text-center" id="modal-text-canje-title" hidden>
              <span class="badge bg-warning">Pendiente de entrega</span>
            </div>
            <div class="col-md-12 text-center mb-3">
              <img id="list-modal-img" class="img-fluid rounded-3" width="300px" alt="">
            </div>
            {{-- <div class="col-md-12 text-center">
              <h3>
                <img src="{{ asset(current_config()->present()->getImagenCoin()) }}" width="32px" alt=""
                  class="img-fluid me-2"><span id="list-modal-credit"></span>
              </h3>
            </div> --}}
            <div class="col-12 text-center">
              <div id="modal-text-win" hidden>
                <h4>
                  <strong>
                    Has recibido
                    <span id="list-modal-credit"></span>
                    <img src="{{ asset(current_config()->present()->getImagenCoin()) }}" width="32px" alt="" class="img-fluid me-2">
                  </strong>
                </h4>
              </div>
              <div id="modal-text-canje" hidden>
                <h5>
                  <strong>
                    Canjeado por
                    <span id="list-modal-credit2"></span>
                    <img src="{{ asset(current_config()->present()->getImagenCoin()) }}" width="32px" alt="" class="img-fluid me-2">
                  </strong>
                </h5>
              </div>
              <div id="modal-text-reembolso" hidden>
                <h5>
                  <strong>
                    Se <span class="badge badge-pill btn-primary">reembolsó</span>

                    <span id="list-modal-credit3"></span>
                    <img src="{{ asset(current_config()->present()->getImagenCoin()) }}" width="32px" alt="" class="img-fluid me-2">
                  </strong>
                </h5>
              </div>
            </div>
            <div class="col-md-12">
              <div class="card">
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table align-middle table-sm text-sm">
                      <tbody>
                        <tr >
                          <td scope="row">Nombre:</td>
                          <td class="text-end">
                            <small><span id="list-modal-name"></span></small>
                          </td>
                        </tr>
                        {{-- <tr>
                          <td scope="row">Descripción:</td>
                          <td class="text-end">
                            <small><span id="list-modal-description"></span></small>
                          </td>
                        </tr> --}}
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
<script>
  var listModal = document.getElementById('listModal');
  listModal.addEventListener('show.bs.modal', function (event) {
    var button = event.relatedTarget;
    var info = JSON.parse(button.getAttribute('data-bs-info'));


    listModal.querySelector('#modal-text-win').setAttribute('hidden',"");
    listModal.querySelector('#modal-text-canje').setAttribute('hidden',"");
    listModal.querySelector('#modal-text-canje-title').setAttribute('hidden',"");
    listModal.querySelector('#modal-text-reembolso').setAttribute('hidden',"");

    listModal.querySelector('#list-modal-img').src = info.img;
    listModal.querySelector('#list-modal-fecha').textContent = info.created_at.text;
    listModal.querySelector('#list-modal-credit').textContent = info.credit.text;
    listModal.querySelector('#list-modal-credit2').textContent = info.credit.text;
    listModal.querySelector('#list-modal-credit3').textContent = info.credit.text;

    if (info.type === "PRODUCT") {
      listModal.querySelector('#list-modal-name').textContent = info.producto.name;
      listModal.querySelector('#modal-text-canje').removeAttribute('hidden');

      if (info.status.code == 2) {
        listModal.querySelector('#modal-text-canje-title').removeAttribute('hidden');
      }


      if (info.status.code == 3) {
        listModal.querySelector('#modal-text-canje').setAttribute('hidden',"");
        listModal.querySelector('#modal-text-reembolso').removeAttribute('hidden');
      }

    } else {
      listModal.querySelector('#modal-text-win').removeAttribute('hidden');
      listModal.querySelector('#list-modal-name').textContent = info.accion.name;
    }

    if (info.status.code == 2) {
      // alert('en espera');
    }
  });
</script>
@endpush
