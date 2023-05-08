
@extends('layouts.admin.app')
@push('stylesheet')

<link href="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

@endpush
@section('content')
<div class="container-fluid">
  @component('components.button._back')
    @slot('route', route('admin.config.index'))
    @slot('color', 'secondary')
    @slot('body', 'Teams - Equipos')
  @endcomponent
  @include('team._tabs')
  <div class="card shadow mb-4">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-hover table-sm" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>id</th>
              <th>Nombre</th>
              <th>Descripción</th>
              <th>Lider</th>
              <th>Total creditos</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($teams as $t)
            <tr>
              <td>{{ $t->id }}</td>
              <td><a href="{{ route('admin.accion.show',$t->id) }}">{{ $t->nombre }}</a></td>
              <td>{{ $t->descripcion }}</td>
              <td>
                @if ($t->id_lider)
                  <a href="{{ route('admin.usuario.show', $t->id_lider) }}">
                    {{ $t->lider->nombre ?? '-- sin líder --' }}
                  </a>
                @else
                  -- sin lider --
                @endif
              </td>
              <td>1000</td>
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
