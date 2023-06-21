
@extends('layouts.sucursal.app')
@push('stylesheet')

@endpush
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      @component('components.button._back')
        @slot('route', route('sucursal.boleta.index'))
        @slot('color', 'secondary')
        @slot('body', 'Boleta #' . $b->id)
      @endcomponent
      <div class="card shadow mb-4">
        <div class="card-body">
          <div class="row">
            <div class="col-lg-4 mb-4">
              <div class="card mb-4">
                <div class="card-body">
                  <h4 class="m-0 font-weight-bold">
                    <h3> BOLETA #{{ $b->id }} <span class="badge badge-{{ $b->estado == 0 ? 'primary' : 'success' }}">{{ $b->getStatus() }}</span></h3>
                  </h4>
                </div>
                <div class="card-footer text-center">
                  <h3>
                    <strong>
                      $ {{ $b->getPrecio() }}
                    </strong>
                  </h3>
                </div>
              </div>
            </div>

            <div class="col-lg-8 mb-4">
              <div class="card shadow mb-4">
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-hover table-sm">
                      <thead>
                        <tr>
                          <th>Codigo</th>
                          <th>Imagen</th>
                          <th>Nombre</th>
                          <th>Cantidad</th>
                          <th>Precio</th>
                          <th>Total</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($b->detalle as $d)
                        @php
                            $p = $d->producto;
                        @endphp
                        <tr>
                          <td>{{ $p->codigo }}</td>
                          <td>
                            <div class="text-center">
                              <img src="{{ asset($p->present()->getImagen()) }}" width="60px" class="rounded" alt="...">
                            </div>
                          </td>
                          <td><a href="{{ route('sucursal.producto.show',$p->id) }}">{{ $p->nombre }}</a></td>
                          <td>
                            {{ $d->cantidad }}
                          </td>
                          <td>
                            $ {{ $p->getPrecio() }}
                          </td>
                          <td class="">
                            <strong>$ {{ $d->getTotal() }}</strong>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-4 mb-4">
              <div class="card mb-4">
                <div class="card-body">
                  <h4 class="m-0 font-weight-bold">
                    TRANSPORTE {{ $b->transporte_empresa ?? '---------' }}
                  </h4>
                </div>
                <div class="card-footer text-center">
                  <h4>
                    CODIGO SEGUIMIENTO
                    {{ $b->transporte_codigo ?? '---------' }}
                  </h4>
                </div>
                <div class="card-footer text-center">
                  <h3>
                    ESTADO
                    {{ $b->transporte_estado ?? '---------' }}
                    {{-- <strong>
                      $ {{ $b->getPrecio() }}
                    </strong> --}}
                  </h3>
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
