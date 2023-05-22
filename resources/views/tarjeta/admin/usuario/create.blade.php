@extends('layouts.tarjeta.app')
@push('stylesheet')

@endpush
@section('content')
<div class="container-fluid">
  @component('components.button._back')
    @slot('route', route('tarjeta.admin.usuario.index'))
    @slot('color', 'secondary')
    @slot('body', 'Creación de usuarios')
  @endcomponent
  <div class="row">
    <div class="col-md-12">
      <div class="card shadow mb-3">
        <div class="card-body">
          <form class="form-sample form-submit" action="{{ route('tarjeta.admin.usuario.store') }}" method="POST">
            @csrf
            <div class="row mb-3">

              <div class="col-md-4">
                <div class="form-group row">
                  <label class="col-sm-12" for="correo">Correo <small class="text-danger">*</small></label>
                  <div class="col-sm-12">
                    <input type="email" class="form-control {{ $errors->has('correo') ? 'is-invalid' : '' }}" name="correo" id="correo" value="{{ old('correo') }}"/>
                    {!! $errors->first('correo', ' <small id="inputPassword" class="form-text text-danger">:message</small>') !!}
                  </div>
                </div>
              </div>

              {{-- <div class="col-md-4">
                <div class="form-group row">
                  <div class="col-sm-12">
                    <label class="col-sm-12" for="usuario">Usuario <small class="text-danger">*</small></label>
                    <input type="text" class="form-control" name="usuario" id="usuario" required/>
                  </div>
                </div>
              </div> --}}

              <div class="col-md-4">
                <div class="form-group row">
                  <label class="col-sm-12" for="pass">Contraseña <small class="text-danger">*</small></label>
                  <div class="col-sm-12">
                    <input type="password" class="form-control" name="pass" id="pass" value="" required/>
                  </div>
                </div>
              </div>

              <div class="col-md-4">
              </div>

              <div class="col-md-4">
                <div class="form-group row">
                  <label class="col-sm-12" for="run">Rut <small>(Opcional)</small></label>
                  <div class="col-sm-12">
                    <input type="text" class="form-control" id="run" name="run" placeholder="ej 19222333K" maxlength="9" min="8" pattern="^\d{7,9}[0-9K]{1}$" title="Formato 19222333K" onkeyup="this.value = validarRut(this.value)" required>
                  </div>
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group row">
                  <label class="col-sm-12" for="nombre">Nombre <small class="text-danger">*</small></label>
                  <div class="col-sm-12">
                    <input type="text" class="form-control" name="nombre" id="nombre" value="{{ old('nombre') }}" required/>
                  </div>
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group row">
                  <label class="col-sm-12" for="apellido">Apellido <small class="text-danger">*</small></label>
                  <div class="col-sm-12">
                    <input type="text" class="form-control" name="apellido" id="apellido" value="{{ old('apellido') }}" required/>
                  </div>
                </div>
              </div>

              <div class="col-md-4">
                <label for="admin">Administrador</label>
                <select class="form-control" id="admin" name="admin">
                  <option value="1">Si</option>
                  <option value="2">No</option>
                </select>
              </div>

              {{-- <div class="col-md-4">
                <label for="teams">Team</label>
                <select class="form-control" id="teams" name="team">
                  <option value="">-- selecione un team --</option>
                  @foreach ($teams as $t)
                    <option value="{{ $t->id }}">{{ $t->nombre }}</option>
                  @endforeach
                </select>
              </div> --}}

              <div class="col-md-4">
                <label for="tipo">Tipo usuario</label>
                <select class="form-control" id="tipo" name="tipo">
                  <option value="1">Alternativa 1</option>
                  <option value="2">Alternativa 2</option>
                  <option value="3">Alternativa 3</option>
                </select>
              </div>
            </div>
            <div class="form-group d-flex justify-content-end">
              <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
@push('javascript')
<script src="{{ asset('js/validate-run.js') }}"></script>

@endpush
