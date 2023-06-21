
@extends('layouts.sucursal.app')
@push('stylesheet')

<link href="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

@endpush
@section('content')
<div class="container-fluid">
  <h1 class="h3 mb-2 text-gray-800">Boletas</h1>
  <div class="card shadow mb-4">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-hover table-sm" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Codigo</th>
              <th>Solicitado</th>
              <th>Total</th>
              <th>Estado</th>
              <th>Estado Transporte</th>
              <th>Codigo de segumiento</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($boletas as $b)
            <tr>
              <td>{{ $b->id }}</td>
              <td>$ {{ $b->getPrecio() }}</td>
              <td>{{ $b->solicitante->nombre_completo() }}</td>
              <td>
                <h6><span class="badge badge-{{ $b->estado == 0 ? 'primary' : 'success' }}">{{ $b->getStatus() }}</span></h6>
              </td>
              <td>
                {{ $b->transporte_estado ?? '---------' }}
              </td>
              <td>
                {{ $b->transporte_codigo ?? '---------' }}
              </td>
              <td>
                <a href="{{ route('sucursal.boleta.show', $b->id) }}" class="btn btn-sm btn-info">Ver</a>

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
