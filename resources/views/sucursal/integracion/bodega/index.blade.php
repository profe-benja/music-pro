
@extends('layouts.sucursal.app')
@push('stylesheet')


@endpush
@section('content')
<div class="container-fluid">
  <h1 class="h3 mb-2 text-gray-800">
    {{-- <a href="{{ route('sucursal.integracion.index') }}">volver</a> --}}
    Bodegas
  </h1>
  @include('sucursal.integracion.bodega._tabs')
  <div class="row">
    <div class="col-md-12">
      <div class="card shadow mb-4">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-hover table-sm" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th></th>
                  <th>Nombre</th>
                  <th>Codigo</th>
                  <th>Usuario</th>
                  <th>Secret Key</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($bodegas as $b)
                <tr>
                  {{-- <td>{{ $b->id }}</td>
                  <td>{{ $b->nombre }}</td>
                  <td><code>{{ $b->code }}</code></td>
                  <td><code>{{ $b->usuario }}</code></td>
                  <td><code>{{ $b->secret_key }}</code></td> --}}
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

@endpush
