@extends('layouts.transporte.app')
@push('stylesheet')

@endpush
@section('content')
<div class="container-fluid">
  <div class="row">
    @component('components.button._back')
      @slot('route', route('transporte.encomienda.index'))
      @slot('color', 'secondary')
      @slot('body', 'Seguimiento - ' . $solicitud->codigo_seguimiento)
    @endcomponent

    <div class="col-md-12">
      {{-- @include('transporte.solicitud._tabs_usuario') --}}
      <div class="card shadow mb-4">
        <div class="card-body">
          <div class="row">
            <div class="col-lg-4 mb-4">
              <div class="card mb-4">
                <div class="card-body">
                  <h4 class="m-0 font-weight-bold">
                    {{ $solicitud->codigo_seguimiento }}
                  </h4>
                </div>
                <div class="card-footer text-center">
                  <h4>
                    <span class="badge text-white bg-{{ $solicitud->estado == 0 ? 'dark' : ($solicitud->estado == 1 ? 'primary' : 'success' )}}">{{ $solicitud->getEstado() }}</span>
                  </h4>
                </div>
              </div>
            </div>
            <div class="col-lg-4 mb-4">
              <div class="card mb-4">
                <div class="card-body">
                  <h4 class="m-0 font-weight-bold">
                    CAMBIAR
                  </h4>
                  <div class="container">
                    <form action="{{ route('transporte.encomienda.update', $solicitud->id) }}" method="post">
                      @csrf
                      @method('PUT')

                      <div class="row mb-3">
                        <div class="col-md-12">
                          {{-- <label for="tipo">ESTADO</label> --}}
                          <select class="form-control" id="estado" name="estado">
                            <option value="0" {{ $solicitud->estado == 0 ? 'checked' : '' }}>En proceso</option>
                            <option value="1" {{ $solicitud->estado == 1 ? 'checked' : '' }}>En camino</option>
                            <option value="2" {{ $solicitud->estado == 2 ? 'checked' : '' }}>Entregado</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                      </div>
                    </form>
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
@endsection
