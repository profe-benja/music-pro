@extends('layouts.admin.app')
@push('stylesheet')
<link href="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

@endpush
@section('content')
<div class="container-fluid">
  <div class="row">
    @component('components.button._back')
      @slot('route', route('admin.usuario.index'))
      @slot('color', 'secondary')
      @slot('body', 'Perfil - ' . $u->nombre_completo())
    @endcomponent
    <div class="col-md-12">
      @include('usuario._tabs_usuario')
      <div class="card shadow mb-4">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-hover table-sm" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Fecha</th>
                  <th>Tipo</th>
                  <th>Acción</th>
                  <td>Estado</td>
                  <th class="text-right">
                    <img src="{{ asset(current_config()->present()->getImagenCoin()) }}" width="20px" alt="">
                    Recibo/Enviado
                  </th>
                </tr>
              </thead>
              <tbody>
                @foreach ($u->transacciones as $t)
                <tr class="handle">
                  <td>{{ $t->getFechaCreacion()->getDatetime() }}</td>
                  <td>
                    @if ($t->id_producto)
                      <span class="badge badge-pill badge-success">Solicitud</span>
                    @else
                      <span class="badge badge-pill badge-primary">Acción</span>
                    @endif
                    {{-- {{ $t->usuario->present()->nombre_completo() }} --}}
                  </td>
                  <td>
                    @if ($t->id_producto)
                      {{ $t->producto->nombre }}
                    @else
                      {{ $t->accion->nombre }}
                    @endif
                    {{-- {{ $t->usuario->present()->nombre_completo() }} --}}
                  </td>
                  <td>
                    @if ($t->estado == 1)
                    <span class="badge badge-pill badge-success">Aceptado</span>
                    @else
                    @if ($t->estado == 2)
                    <span class="badge badge-pill badge-warning">Pendiente</span>
                      @else
                        <span class="badge badge-pill badge-primary">Rechazado/Reembolso</span>
                      @endif
                    @endif
                  </td>
                  @if ($t->estado != 3)
                  <td class="text-{{ $t->tipo ? 'success' : 'danger' }} text-right">
                    <strong>{{ $t->tipo ? '+' : '-' }} {{ $t->getCredito() }}</strong>
                    <img src="{{ asset(current_config()->present()->getImagenCoin()) }}" width="20px" alt="">
                  </td>
                  @else
                    <td class="text-primary text-right">
                      <span class="badge badge-pill badge-primary">Rechazado/Reembolso</span>

                    {{-- <strong>+ {{ $t->getCredito() }}</strong> --}}
                    {{-- <img src="{{ asset(current_config()->present()->getImagenCoin()) }}" width="20px" alt=""> --}}
                  </td>
                  @endif
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@push('javascript')
<script src="{{ asset('admin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script>
  $(document).ready(function() {
    $('#dataTable').DataTable();
  });
</script>
@endpush
