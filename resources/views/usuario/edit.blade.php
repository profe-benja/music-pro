
@extends('layouts.admin.app')
@push('stylesheet')
  <link rel="stylesheet" href="{{ asset('vendors/select2/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('vendors/select2-bootstrap-theme/select2-bootstrap.min.css') }}">
@endpush
@section('content')
<div class="container-fluid">
  <div class="row">
    @component('components.button._back')
      @slot('route', route('admin.usuario.show', $u->id))
      @slot('color', 'secondary')
      @slot('body', 'Editar ' . $u->nombre_completo())
    @endcomponent
    <div class="col-md-12">
      <div class="card shadow mb-3">
        <div class="card-body">
          <form class="form-sample form-submit" action="{{ route('admin.usuario.update',$u->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row mb-3">

              <div class="col-md-4">
                <div class="form-group row">
                  <label class="col-sm-12" for="correo">Correo <small class="text-danger">*</small></label>
                  <div class="col-sm-12">
                    <input type="email" class="form-control {{ $errors->has('correo') ? 'is-invalid' : '' }}" name="correo" id="correo" value="{{ $u->correo }}"/>
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

              {{-- <div class="col-md-4">
                <div class="form-group row">
                  <label class="col-sm-12" for="pass">Contraseña <small class="text-danger">*</small></label>
                  <div class="col-sm-12">
                    <input type="password" class="form-control" name="pass" id="pass" value="" required/>
                  </div>
                </div>
              </div> --}}

              <div class="col-md-8">
              </div>

              <div class="col-md-4">
                <div class="form-group row">
                  <label class="col-sm-12" for="rut">Rut <small>(Opcional)</small></label>
                  <div class="col-sm-12">
                    <input type="text" class="form-control" name="run" id="run" value="{{ $u->run }}" />
                  </div>
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group row">
                  <label class="col-sm-12" for="nombre">Nombre <small class="text-danger">*</small></label>
                  <div class="col-sm-12">
                    <input type="text" class="form-control" name="nombre" id="nombre" value="{{ $u->nombre }}" required/>
                  </div>
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group row">
                  <label class="col-sm-12" for="apellido">Apellido <small class="text-danger">*</small></label>
                  <div class="col-sm-12">
                    <input type="text" class="form-control" name="apellido" id="apellido" value="{{ $u->apellido }}" required/>
                  </div>
                </div>
              </div>

              <div class="col-md-4">
                <label for="admin">Administrador</label>
                <select class="form-control" id="admin" name="admin">
                  <option value="1" {{ $u->admin ? 'selected' : '' }}>Si</option>
                  <option value="2" {{ !$u->admin ? 'selected' : '' }}>No</option>
                </select>
              </div>

              <div class="col-md-4">
                <label for="teams">Team</label>
                <select class="form-control" id="teams" name="team">
                  <option value="">-- selecione un team --</option>
                  @foreach ($teams as $t)
                    <option value="{{ $t->id }}" {{ $u->id_team == $t->id ? 'selected' : '' }}>
                      {{ $t->nombre }}
                    </option>
                  @endforeach
                </select>
              </div>

              <div class="col-md-4">
                <label for="tipo">Tipo usuario</label>
                <select class="form-control" id="tipo" name="tipo">
                  <option value="1" {{ $u->tipo_usuario == 1 ? 'selected' : '' }}>Alternativa 1</option>
                  <option value="1" {{ $u->tipo_usuario == 2 ? 'selected' : '' }}>Alternativa 2</option>
                  <option value="1" {{ $u->tipo_usuario == 3 ? 'selected' : '' }}>Alternativa 2</option>
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
    <div class="col-md-4">
      <div class="card shadow mb-3">
        <div class="card-body">
          <form class="form-sample form-submit" action="{{ route('admin.usuario.update',$u->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
              <div class="col-md-12">
                <div class="form-group row">
                  <label class="col-sm-12" for="pass">Cambiar contraseña <small class="text-danger">*</small></label>
                  <div class="col-sm-12">
                    <input type="password" class="form-control" name="pass" id="pass" value="" required/>
                  </div>
                </div>
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
<script src="{{ asset('vendors/select2/select2.min.js') }}"></script>
<script src="{{ asset('vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('js/file-upload.js') }}"></script>
<script src="{{ asset('js/select2.js') }}"></script>
@endpush
