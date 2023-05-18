@extends('layouts.tarjeta.app')
@push('stylesheet')

<link href="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

@endpush
@section('content')
<div class="container-fluid">
  <h1 class="h3 mb-2 text-gray-800">Bancos</h1>
  @include('tarjeta.admin.banco._tabs')
  <div class="card shadow mb-4">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-hover table-sm" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Nro</th>
              <th>Saldo</th>
              <th>Auth Token</th>
              <th>Disponible</th>
              {{-- <th>Nombre</th> --}}
            </tr>
          </thead>
          <tbody>
            @foreach ($bancos as $b)
            <tr>
              <td>{{ $b->id }}</td>
              <td><a href="{{ route('tarjeta.admin.banco.show',$b->id) }}">{{ $b->nombre }}</a></td>
              <td>
                <code>
                  {{ $b->token }}
                </code>
              </td>
              <td>
                @if ($b->disponible)
                  <span class="badge bg-success text-dark">ONLINE</span>
                @else
                  <span class="badge bg-dark text-white">OFFLINE</span>
                @endif
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
