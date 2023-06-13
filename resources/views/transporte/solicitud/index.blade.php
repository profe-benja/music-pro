
@extends('layouts.transporte.app')
@push('stylesheet')

<link href="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

@endpush
@section('content')
<div class="container-fluid">
  <h1 class="h3 mb-2 text-gray-800">Solicitudes de envios</h1>
  @include('transporte.solicitud._tabs')
  <div class="card shadow mb-4">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-hover table-sm" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>id</th>
              <th>Nombre origen</th>
              <th>Dirección origen</th>
              <th>Nombre destino</th>
              <th>Dirección destino</th>
              <th>Estado</th>
              {{-- <th>Nombre</th> --}}
            </tr>
          </thead>
          <tbody>
            @foreach ($solicitudes as $s)
            <tr>
              <td><a href="{{ route('transporte.encomienda.show',$s->id) }}">{{ $s->codigo_seguimiento }}</a></td>
              <td>{{ $s->nombre_origen }}</td>
              <td>{{ $s->direccion_origen }}</td>
              <td>{{ $s->nombre_destino }}</td>
              <td>{{ $s->direccion_destino }}</td>
              <td>
                <span class="badge text-white bg-{{ $s->estado == 0 ? 'dark' : ($s->estado == 1 ? 'primary' : 'success' )}}">{{ $s->getEstado() }}</span>
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
