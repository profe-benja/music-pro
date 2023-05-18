
@extends('layouts.tarjeta.app')
@push('stylesheet')

{{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css"> --}}
{{-- <link rel="stylesheet" href="{{ asset('js/select.dataTables.min.css') }}"> --}}
  <link rel="stylesheet" href="{{ asset('vendors/select2/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('vendors/select2-bootstrap-theme/select2-bootstrap.min.css') }}">
@endpush
@section('content')
<div class="container-fluid">
  @component('components.button._back')
    @slot('route', route('tarjeta.admin.banco.index'))
    @slot('color', 'secondary')
    @slot('body', 'Creación de nuevo banco de integración')
  @endcomponent
  <div class="row">
    <div class="col-md-6">
      <div class="card shadow mb-3">
        <div class="card-body">
          <form class="form-sample form-submit" action="{{ route('tarjeta.admin.banco.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
              <div class="col-md-12">
                <div class="form-group row">
                  <label class="col-sm-12" for="nombre">Nombre <small class="text-danger">*</small></label>
                  <div class="col-sm-12">
                    <input type="text" class="form-control" name="nombre" id="nombre" value="{{ old('nombre') }}" required/>
                  </div>
                </div>
              </div>

              <div class="col-md-12">
                <div class="form-group row">
                  <label class="col-sm-12" for="code">Código <small class="text-danger">*</small></label>
                  <div class="col-sm-12">
                    <input type="text" class="form-control" name="code" id="code" value="{{ old('code') }}" required/>
                  </div>
                </div>
              </div>

              <div class="col-md-12">
                <div class="form-group row">
                  <label class="col-sm-12" for="URL">URL <small class="text-danger">*</small></label>
                  <div class="col-sm-12">
                    <input type="url" class="form-control" name="url" id="url" value="{{ old('url') }}" required/>
                  </div>
                </div>
              </div>

              <div class="col-md-12 mb-3">
                <label for="disponible">Disponible</label>
                <select class="form-control" id="disponible" name="disponible">
                  <option value="2">NO</option>
                  <option value="1">SI</option>
                </select>
              </div>

              <div class="col-md-12">
                <label class="col-form-label col-sm-4" for="hf-rut">Imagen</label>
                <div class="col-sm-8 text-center">
                  <input type="file" name="image" accept="image/*" class="mb-3" onchange="preview(this)" />
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
<script src="{{ asset('js/preview.js') }}"></script>
@endpush
