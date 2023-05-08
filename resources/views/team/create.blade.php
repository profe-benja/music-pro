
@extends('layouts.admin.app')
@push('stylesheet')
  <link rel="stylesheet" href="{{ asset('vendor/select2/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('vendor/select2-bootstrap-theme/select2-bootstrap.min.css') }}">

@endpush
@section('content')
<div class="container-fluid">
  @component('components.button._back')
    @slot('route', route('admin.team.index'))
    @slot('color', 'secondary')
    @slot('body', 'Creación de teams')
  @endcomponent
  <div class="row">
    <div class="col-md-6">
      <div class="card shadow mb-3">
        <div class="card-body">
          <form class="form-sample form-submit" action="{{ route('admin.team.store') }}" method="POST">
            @csrf
            <div class="row">
              <div class="col-md-12 row">
                <div class="col-md-12">
                  <div class="form-group row">
                    <label class="col-sm-12" for="nombre">Nombre <small class="text-danger">*</small></label>
                    <div class="col-sm-12">
                      <input type="text" class="form-control {{ $errors->has('nombre') ? 'is-invalid' : '' }}" name="nombre" id="nombre" value="{{ old('correo') }}" required/>
                      {!! $errors->first('nombre', ' <small id="inputPassword" class="form-text text-danger">:message</small>') !!}
                    </div>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form-group row">
                    <div class="col-sm-12">
                      <label for="descripcion">Descripción</label>
                      <textarea class="form-control" id="descripcion" name="descripcion" rows="3"></textarea>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-12 row">

                <div class="col-md-12">
                  <label for="lider">Líder</label>
                  <select class="form-control js-basic-single col-md-12" id="lider" name="lider">
                    <option value="">-- selecione un líder --</option>
                    @foreach ($usuarios as $u)
                      {{-- <option value="{{ $u->id }}" {{ $u->id == $t->id ? 'selected' : '' }}> --}}
                        <option value="{{ $u->id }}">
                        {{ $u->correo . ' / ' . $u->nombre_completo() }}
                      </option>
                    @endforeach
                  </select>
                </div>

              </div>
            </div>

            <div class="form-group d-flex justify-content-end mt-2">
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
<script src="{{ asset('vendor/select2/select2.min.js') }}"></script>

<script>
  (function($) {
  'use strict';

  if ($(".js-basic-single").length) {
    $(".js-basic-single").select2();
  }

})(jQuery);
</script>
@endpush
