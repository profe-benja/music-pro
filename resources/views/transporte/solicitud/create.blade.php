
@extends('layouts.transporte.app')
@push('stylesheet')

{{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css"> --}}
{{-- <link rel="stylesheet" href="{{ asset('js/select.dataTables.min.css') }}"> --}}
  <link rel="stylesheet" href="{{ asset('vendors/select2/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('vendors/select2-bootstrap-theme/select2-bootstrap.min.css') }}">
@endpush
@section('content')
<div class="container-fluid">
  @component('components.button._back')
    @slot('route', route('transporte.encomienda.index'))
    @slot('color', 'secondary')
    @slot('body', 'Nueva Encomienda')
  @endcomponent
  <div class="row">
    <div class="col-md-6">
      <div class="card shadow mb-3">
        <div class="card-body">
          <form class="form-sample form-submit" action="{{ route('transporte.encomienda.store') }}" method="POST">
            @csrf
            <div class="row mb-3">

              <div class="row justify-content-center col-md-12">
                <strong><h5>👨‍🦳🚌 Solicitante</h5></strong>
              </div>

              <div class="col-md-12">
                <div class="form-group row">
                  <label class="col-sm-12" for="nombre_origen">Nombre solicitante<small class="text-danger">*</small></label>
                  <div class="col-sm-12">
                    <input type="text" class="form-control" name="nombre_origen" id="nombre_origen" value="{{ old('nombre_origen') }}" required/>
                  </div>
                </div>
              </div>

              <div class="col-md-12">
                <div class="form-group row">
                  <label class="col-sm-12" for="direccion_origen">Direccion de origen <small class="text-danger">*</small></label>
                  <div class="col-sm-12">
                    <input type="text" class="form-control" name="direccion_origen" id="direccion_origen" required/>
                  </div>
                </div>
              </div>

              <hr class="w-100">
              <div class="row justify-content-center col-md-12">
                <strong><h5>Destino ➡️🏡</h5></strong>
              </div>

              <div class="col-md-12">
                <div class="form-group row">
                  <label class="col-sm-12" for="nombre_destino">Nombre destino<small class="text-danger">*</small></label>
                  <div class="col-sm-12">
                    <input type="text" class="form-control" name="nombre_destino" id="nombre_destino" value="{{ old('nombre_destino') }}" required/>
                  </div>
                </div>
              </div>

              <div class="col-md-12">
                <div class="form-group row">
                  <label class="col-sm-12" for="direccion_destino">Direccion de destino <small class="text-danger">*</small></label>
                  <div class="col-sm-12">
                    <input type="text" class="form-control" name="direccion_destino" id="direccion_destino" required/>
                  </div>
                </div>
              </div>

              <div class="col-md-12">
                <div class="form-group row">
                  <label class="col-sm-12" for="comentario">Comentario<small class="text-danger">*</small></label>
                  <div class="col-sm-12">
                    <textarea class="form-control" name="comentario" id="comentario" rows="3"></textarea>
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
