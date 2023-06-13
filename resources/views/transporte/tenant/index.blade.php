
@extends('layouts.transporte.app')
@push('stylesheet')

<link href="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

@endpush
@section('content')
<div class="container-fluid">
  <h1 class="h3 mb-2 text-gray-800">Tenants - Bodega - Sucursal</h1>
  @include('transporte.tenant._tabs')
  <div class="card shadow mb-4">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-hover table-sm" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Id</th>
              <th><strong class="text-danger">Email</strong></th>
              <th><strong class="text-danger">Token</strong></th>
              <th>Nombre</th>
              <th>Direccion</th>
              <th>Tipo</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($tenants as $t)
            <tr>
              <td>{{ $t->id }}</td>
              <td>
                <a href="{{ route('transporte.tenant.edit', $t->id) }}">{{ $t->email }}</a>
              </td>
              <td>{{ $t->token }}</td>
              <td>{{ $t->nombre }}</td>
              <td>{{ $t->direccion }}</td>
              <td>{{ $t->tipo }}</td>
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
