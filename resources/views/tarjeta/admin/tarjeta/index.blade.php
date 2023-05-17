@extends('layouts.tarjeta.app')
@push('stylesheet')

<link href="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

@endpush
@section('content')
<div class="container-fluid">
  <h1 class="h3 mb-2 text-gray-800">Tarjetas</h1>
  {{-- @include('tarjeta.admin.usuario._tabs') --}}
  <div class="card shadow mb-4">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-hover table-sm" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Nro</th>
              <th>Saldo</th>
              {{-- <th>Nombre</th> --}}
            </tr>
          </thead>
          <tbody>
            @foreach ($tarjetas as $t)
            <tr>
              <td>{{ $t->nro }}</td>
              <td><a href="{{ route('tarjeta.admin.tarjeta.show',$t->id) }}">${{ $t->getSaldo() ?? 0 }}</a></td>
              {{-- <td>{{ $u->nombre_completo() }}</td> --}}
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
