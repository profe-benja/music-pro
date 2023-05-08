
@extends('layouts.admin.app')
@push('stylesheet')

<link href="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

@endpush
@section('content')
<div class="container-fluid">
  <h1 class="h3 mb-2 text-gray-800">Acciones / Recompensas</h1>
  @include('accion._tabs')
  <div class="card shadow mb-4">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-hover table-sm" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              {{-- <th>id</th> --}}
              <th></th>
              <th>Nombre</th>
              <th>Credito a dar</th>
              <th>Entregado / Stock</th>
              <th>Por usuario</th>
              <th></th>
              {{-- <th>Tipo usuario</th> --}}
            </tr>
          </thead>
          <tbody>
            @foreach ($acciones as $a)
            <tr>
              {{-- <td>{{ $a->id }}</td> --}}
              <td>
                <div class="text-center">
                  <img src="{{ asset($a->present()->getImagen()) }}" width="120px" class="rounded" alt="...">
                </div>
              </td>
              <td><a href="{{ route('admin.accion.show',$a->id) }}">{{ $a->nombre }}</a></td>
              <td>
                <img src="{{ asset(current_config()->present()->getImagenCoin()) }}" width="20px" alt="">
                {{ $a->getCredito() }}
              </td>
              <td>
                {{ $a->cant_entregada ?? 0 }} /
                @if ($a->stock_ilimitado)
                  ∞
                @else
                  {{ $a->stock }}
                @endif
              </td>
              <td>
                @if ($a->cant_por_usuario_ilimitado)
                  ∞
                @else
                  {{ $a->cant_por_usuario }}
                @endif
              </td>
              <td class="text-center">
                @if ($a->estado == 1)
                  <span class="badge badge-primary">Borrador</span>
                @else
                  @if ($a->estado == 2)
                    <span class="badge badge-dark">No disponible</span>
                  @else
                    <span class="badge badge-success">Disponible</span>
                  @endif
                @endif
              </td>
              {{-- <td>{{ $u->team->nombre ?? '' }}</td> --}}
              {{-- <td>{{ $u->credito }}</td> --}}
              {{-- <td>{{ $u->get_usuario() }}</td> --}}
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
