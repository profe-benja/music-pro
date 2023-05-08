
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
          <form class="form-sample form-submit" action="{{ route('admin.sistema.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
              <div class="col-md-12">
                <div class="form-group row">
                  <label class="col-sm-4" for="nombre">Nombre <small class="text-danger">*</small></label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control {{ $errors->has('nombre') ? 'is-invalid' : '' }}" name="nombre" id="nombre" value="{{ $s->nombre }}"/>
                    {!! $errors->first('nombre', ' <small id="inputPassword" class="form-text text-danger">:message</small>') !!}
                  </div>
                </div>
              </div>

              <div class="col-md-12">
                <div class="form-group row">
                  <label class="col-sm-4" for="descripcion">Descripción</label>
                  <div class="col-sm-8">
                    <textarea class="form-control" id="descripcion" name="descripcion" rows="3">{{ $s->descripcion }}</textarea>
                  </div>
                </div>
              </div>

              <div class="col-md-12">
                <div class="form-group row">
                  <label class="col-sm-4" for="login_title">Titulo de login</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control {{ $errors->has('login_title') ? 'is-invalid' : '' }}" name="login_title" id="login_title" value="{{ $s->getInfoLoginTitle() }}"/>
                    {!! $errors->first('login_title', ' <small id="inputPassword" class="form-text text-danger">:message</small>') !!}
                  </div>
                </div>
              </div>

              <div class="col-md-12">
                <div class="form-group row">
                  <label class="col-form-label col-sm-4" for="hf-rut">Logo</label>
                  <div class="col-sm-8 text-center">
                    <img src="{{ asset($s->present()->getLogo()) }}"  class='Responsive image img-thumbnail'  width='200px' height='200px' alt="">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-form-label col-sm-4" for="hf-rut">Nuevo logo</label>
                  <div class="col-sm-8 text-center">
                    <input type="file" name="image" accept="image/*" onchange="preview(this)" />
                    {{-- <div class="form-group row center-text"> --}}
                      <div id="preview"></div>
                    {{-- </div> --}}
                  </div>
                </div>
              </div>

              <div class="col-md-12">
                <div class="form-group row">
                  <label class="col-form-label col-sm-4" for="hf-rut">Login presentación</label>
                  <div class="col-sm-8 text-center">
                    <img src="{{ asset($s->present()->getBackgroundLogin()) }}"  class='Responsive image img-thumbnail'  width='200px' height='200px' alt="">
                  </div>
                </div>

                <div class="form-group row">
                  <label class="col-form-label col-sm-4" for="hf-rut">Nuevo login presentación
                  </label>
                  <div class="col-sm-8 text-center">
                    <input type="file" name="image2" accept="image/*" onchange="preview2(this)" />
                    {{-- <div class="form-group row center-text"> --}}
                      <div id="preview2"></div>
                    {{-- </div> --}}
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

    <div class="col-md-6">
      <div class="card shadow mb-3">
        <div class="card-header">
          #Demo
        </div>
        <div class="card-body">
          <form class="form-sample form-submit" action="{{ route('admin.sistema.demo') }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
              <div class="col-md-12">
                <div class="form-group row">
                  <label for="admin" class="col-sm-4">Demo</label>
                  <div class="col-sm-8">
                    <select class="form-control" id="demo" name="demo">
                      <option value="2" {{ !$s->getInfoDemo() ? 'selected' : '' }}>Desactivar</option>
                      <option value="1" {{ $s->getInfoDemo() ? 'selected' : '' }}>Activar</option>
                    </select>
                  </div>
                </div>
              </div>

              {{-- <div class="col-md-12">
                <div class="form-group row">
                  <label class="col-sm-4" for="redirect_url">Redirección de inicio</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control {{ $errors->has('redirect_url') ? 'is-invalid' : '' }}" name="redirect_url" id="login_title" value="{{ $s->getInfoRedirectUrl() }}"/>
                    {!! $errors->first('redirect_url', ' <small id="redirect_url" class="form-text text-danger">:message</small>') !!}
                  </div>
                </div>
              </div> --}}
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
<script src="{{ asset('js/intwo/preview2.js') }}"></script>

@endpush
