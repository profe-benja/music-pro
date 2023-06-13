
@extends('layouts.sucursal.app')
@push('stylesheet')

@endpush
@section('content')
<div class="container-fluid">
  <h1 class="h3 mb-2 text-gray-800">Integraciones</h1>
  <div class="row">
    <div class="col-md-6">
      <div class="card shadow mb-4">
        <div class="card-body">
          <div class="list-group">
            <a href="{{ route('sucursal.integracion.tarjeta') }}" class="list-group-item list-group-item-action">Tarjetas/Bancos</a>
            <a href="{{ route('sucursal.integracion.bodega') }}" class="list-group-item list-group-item-action">Bodega</a>
            <a href="{{ route('sucursal.integracion.transporte') }}" class="list-group-item list-group-item-action">Transporte</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@push('javascript')

@endpush
