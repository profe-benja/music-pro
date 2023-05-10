
@extends('layouts.sucursal.app')
@push('stylesheet')

<link href="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

@endpush
@section('content')
<div class="container-fluid">
  <h1 class="h3 mb-2 text-gray-800">Usuarios</h1>
  @include('sucursal.usuario._tabs')
  <div class="card shadow mb-4">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-hover table-sm" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>id</th>
              <th>Correo</th>
              <th>Nombre</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($usuarios as $u)
            <tr>
              <td>{{ $u->id }}</td>
              <td><a href="{{ route('sucursal.usuario.show',$u->id) }}">{{ $u->correo }}</a></td>
              <td>{{ $u->nombre_completo() }}</td>
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
