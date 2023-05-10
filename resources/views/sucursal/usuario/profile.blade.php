
@extends('layouts.app')
@push('stylesheet')

{{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css"> --}}
{{-- <link rel="stylesheet" href="{{ asset('js/select.dataTables.min.css') }}"> --}}
  <link rel="stylesheet" href="{{ asset('vendors/select2/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('vendors/select2-bootstrap-theme/select2-bootstrap.min.css') }}">
@endpush
@section('content')
<div class="row">
  <div class="col-8 grid-margin">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Perfil usuario</h4>
        <form class="form-sample form-submit" action="{{ route('me.update') }}" method="POST">
          @csrf
          @method('PUT')

          @if ($u->admin)
            <div class="alert alert-primary" role="alert">
              Eres usuario administrador
            </div>
          @endif
          <div class="row">
            <div class="col-md-6">
              <div class="form-group row">
                <div class="col-sm-12">
                  <label class="col-sm-12" for="nombre">Nombre <small class="text-danger">*</small></label>
                  <input type="text" class="form-control" name="nombre" id="nombre" value="{{ $u->nombre }}" required/>
                </div>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group row">
                <div class="col-sm-12">
                  <label class="col-sm-12" for="apellido">Apellido <small class="text-danger">*</small></label>
                  <input type="text" class="form-control" name="apellido" id="apellido" value="{{ $u->apellido }}" required/>
                </div>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group row">
                <div class="col-sm-12">
                  <label class="col-sm-12" for="corre">Correo <small class="text-danger">*</small></label>
                  <input type="email" class="form-control" name="correo" readonly id="correo" value="{{ $u->correo }}" required/>
                </div>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group row">
                <div class="col-sm-12">
                  <label class="col-sm-12" for="usuario">Usuario <small class="text-danger">*</small></label>
                  <input type="text" class="form-control" name="usuario" readonly id="usuario" value="{{ $u->username }}" required/>
                </div>
              </div>
            </div>

            {{-- <div class="col-md-4">
              <div class="form-group">
                <div class="form-check form-check-success">
                  <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" name="admin" {{ $u->admin ? 'checked' : '' }}>
                    Administrador
                  </label>
                </div>
              </div>
            </div> --}}
          </div>

          <div class="text-end">
            <button type="submit" class="btn btn-primary bg-personalizado mb-2">Guardar</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="col-4 grid-margin">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Cambiar contraseña</h4>
        <form class="form-sample form-submit" action="{{ route('me.pass') }}" method="POST">
          @csrf
          @method('PUT')

          <div class="row">
            <div class="col-md-12">
              <div class="form-group row">
                <div class="col-sm-12">
                  <label class="col-sm-12" for="pass">Nueva Contraseña <small class="text-danger">*</small></label>
                  <input type="password" class="form-control" name="pass" id="pass" required/>
                </div>
              </div>
            </div>

          </div>

          <div class="text-end">
            <button type="submit" class="btn btn-primary bg-personalizado mb-2">Guardar</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="col-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Mis sedes inscritas</h4>
          <div class="row">
            <div class="col-md-12">
              {{-- <label for="form-group">Sedes</label> --}}
              <div class="ms-md-1 row">
                @foreach ($sedes as $s)
                  @php
                    $check = '';
                    foreach ($u->sede_usuario as $se) {
                      if ($se->id_sede == $s->id) {
                        $check = 'checked';
                      }
                    }
                  @endphp
                  <div class="form-check col-md-2 col-sm-6">
                    <label class="form-check-label">
                      <input type="checkbox" onclick="return false;" readonly class="form-check-input" {{ $check }}>
                      {{ $s->nombre }}
                    <i class="input-helper"></i></label>
                  </div>
                  @endforeach
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>

</div>

@endsection
@push('javascript')
<script src="{{ asset('vendors/select2/select2.min.js') }}"></script>
<script src="{{ asset('vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('vendors/typeahead.js/typeahead.bundle.min.js') }}"></script>
<script src="{{ asset('js/file-upload.js') }}"></script>
<script src="{{ asset('js/typeahead.js') }}"></script>
<script src="{{ asset('js/select2.js') }}"></script>
@endpush
