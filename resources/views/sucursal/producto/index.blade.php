
@extends('layouts.sucursal.app')
@push('stylesheet')

<link href="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

@endpush
@section('content')
<div class="container-fluid">
  <h1 class="h3 mb-2 text-gray-800">Productos / Articulos</h1>
  @include('sucursal.producto._tabs')
  <div class="card shadow mb-4">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-hover table-sm" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Codigo</th>
              <th>Imagen</th>
              <th>Nombre</th>
              <th>Precio</th>
              <th>Stock disponible</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($productos as $p)
            <tr>
              <td>{{ $p->codigo }}</td>
              <td>
                <div class="text-center">
                  <img src="{{ asset($p->present()->getImagen()) }}" width="120px" class="rounded" alt="...">
                </div>
              </td>
              <td><a href="{{ route('sucursal.producto.show',$p->id) }}">{{ $p->nombre }}</a></td>
              <td>
                {{ $p->getPrecio() }}
              </td>
              <td>
                <span class="badge bg-primary text-white">
                  {{ $p->stock }}
                </span>
              </td>
              <td class="text-center">
                @if ($p->estado == 1)
                  <span class="badge badge-primary">Borrador</span>
                @else
                  @if ($p->estado == 2)
                    <span class="badge badge-dark">No disponible</span>
                  @else
                    <span class="badge badge-success">Disponible</span>
                  @endif
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
