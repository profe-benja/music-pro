
@extends('layouts.admin.app')
@push('stylesheet')

@endpush
@section('content')
<div class="container-fluid">
  <h1 class="h3 mb-2 text-gray-800">Configuración</h1>
  <div class="row">
    <div class="col-lg-6 mb-4">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Sistema</h6>
        </div>
        <div class="card-body">
          <div class="list-group">
            <a href="{{ route('admin.sistema.index') }}" class="list-group-item list-group-item-action">
              <i class="fas fa-home"></i>
              Sistema
            </a>
            <a href="{{ route('admin.config.coin') }}" class="list-group-item list-group-item-action">
              <i class="fas fa-coins"></i>
              Moneda - Puntos
            </a>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-6 mb-4">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Sistema</h6>
        </div>
        <div class="card-body">
          <div class="list-group">
            <a href="{{ route('admin.team.index') }}" class="list-group-item list-group-item-action text-primary">
              <i class="fas fa-user-friends"></i>
              Teams - Gestiona equipos
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@push('javascript')

@endpush
