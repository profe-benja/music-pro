
@extends('layouts.admin.app')
@push('stylesheet')

@endpush
@section('content')
<div class="container-fluid">
  @component('components.button._back')
    @slot('route', route('admin.config.index'))
    @slot('color', 'secondary')
    @slot('icon', 'fas fa-coins text-warning')
    @slot('body', ' Configuración moneda')
  @endcomponent
  <div class="row">
    <div class="col-md-6">
      <div class="card shadow mb-3">
        <div class="card-body">
          <form class="form-sample form-submit" action="{{ route('admin.config.coin') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
              <div class="col-md-12">
                <div class="form-group row">
                  <label class="col-sm-12" for="nombre">Nombre <small class="text-danger">*</small></label>
                  <div class="col-sm-12">
                    <input type="text" class="form-control {{ $errors->has('nombre') ? 'is-invalid' : '' }}" name="nombre" id="nombre" value="{{ $c->nombre }}"/>
                    {!! $errors->first('nombre', ' <small id="inputPassword" class="form-text text-danger">:message</small>') !!}
                  </div>
                </div>
              </div>

              <div class="col-md-12">
                <div class="form-group row">
                  <div class="col-sm-12">
                    <label for="descripcion">Descripción</label>
                    <textarea class="form-control" id="descripcion" name="descripcion" rows="3">{{ $c->descripcion }}</textarea>
                  </div>
                </div>
              </div>

              <div class="col-md-12">
                <div class="form-group">
                  <label class="col-form-label" for="hf-rut">Imagen</label>
                  <div class="input-group">
                    <img src="{{ asset($c->present()->getImagenCoin()) }}"  class='Responsive image img-thumbnail'  width='200px' height='200px' alt="">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <input type="file" name="image" accept="image/*" onchange="preview(this)" />
                    <br>
                  </div>
                </div>
                <div class="form-group row center-text">
                  <div id="preview"></div>
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
{{-- <script src="{{ asset('vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script> --}}
{{-- <script src="{{ asset('js/file-upload.js') }}"></script> --}}
<script src="{{ asset('js/select2.js') }}"></script>

<script src="{{ asset('js/preview.js') }}"></script>

@endpush
