
@extends('layouts.admin.app')
@push('stylesheet')
<link href="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

@endpush
@section('content')
<div class="container-fluid">
  <div class="row">
    @include('accion._tabs_accion')
    <div class="col-md-12">
      <div class="card shadow mb-4">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-hover table-sm" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Fecha</th>
                  <th>
                    <img src="{{ asset(current_config()->present()->getImagenCoin()) }}" width="20px" alt="">
                    Enviado
                  </th>
                  <th>Usuario</th>
                  <th>Correo</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($transacciones as $t)
                <tr class="handle">
                  <td>{{ $t->getFechaCreacion()->getDatetime() }}</td>
                  <td>
                    <img src="{{ asset(current_config()->present()->getImagenCoin()) }}" width="20px" alt="">
                    {{ $t->getCredito() }}
                  </td>
                  <td>
                    {{ $t->usuario->present()->nombre_completo() }}
                  </td>
                  <td>
                    {{ $t->usuario->correo }}
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
