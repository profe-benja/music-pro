
@extends('layouts.admin.app')
@push('stylesheet')

<link href="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

@endpush
@section('content')
<div class="container-fluid">
  <h1 class="h3 mb-2 text-gray-800">
    Solcitudes de articulos
  </h1>
  @include('solicitud._tabs')
  <div class="card shadow mb-4">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-hover table-sm" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              {{-- <th></th> --}}
              <th>Fecha</th>
              <th></th>
              <th>Producto</th>
              <th>Costo</th>
              <th class="text-center">Solicitante</th>
              <th>Correo</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($solicitudes as $s)
            <tr>
              <td>
                <a href="{{ route('admin.solicitud.show', $s->id) }}" title="Gestionar">{{ $s->getFechaCreacion()->getDatetime() }}</a>
              </td>
              <td>
                <div class="text-center">
                  <img src="{{ asset($s->producto->present()->getImagen()) }}" width="60px" class="rounded" alt="...">
                </div>
              </td>
              <td><a href="{{ route('admin.producto.show', $s->id_producto) }}" title="Ir al producto">{{ $s->producto->nombre }}</a></td>
              <td class="text-right">
                {{ $s->producto->getPrecio() }}
                <img src="{{ asset(current_config()->present()->getImagenCoin()) }}" width="20px" alt="">
              </td>
              <td class="text-center">
                <a href="{{ route('admin.usuario.show', $s->id_usuario_solicitante) }}" title="Ir al usuario">
                  {{ $s->usuario_solicitante->nombre_completo() }}
                </a>
              </td>
              <td>{{ $s->usuario_solicitante->correo }}</td>
              <td>
                <a href="{{ route('admin.solicitud.show', $s->id) }}" class="btn btn-warning btn-sm">Gestionar</a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
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
