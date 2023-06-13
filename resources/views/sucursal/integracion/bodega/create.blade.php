
@extends('layouts.sucursal.app')
@push('stylesheet')

  <link rel="stylesheet" href="{{ asset('vendor/select2/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('vendor/select2-bootstrap-theme/select2-bootstrap.min.css') }}">
@endpush
@section('content')
<div class="container-fluid">
  @component('components.button._back')
    @slot('route', route('sucursal.integracion.bodega'))
    @slot('color', 'secondary')
    @slot('body', 'Integración con bodega')
  @endcomponent

  <div class="row">
    <div class="col-md-6">
      <div class="card shadow mb-3">
        <form class="" action="{{ route('sucursal.producto.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="card-body">
            <div class="row">

                <div class="col-md-12">
                  <div class="form-group row">
                    <label class="col-md-4" for="nombre">Nombre <small class="text-danger">*</small></label>
                    <div class="col-md-8">
                      <input type="text" class="form-control {{ $errors->has('nombre') ? 'is-invalid' : '' }}" name="nombre" id="nombre" value="{{ old('nombre') }}" required/>
                      {!! $errors->first('nombre','<small id="nombre" class="form-text text-danger">:message</small>') !!}
                    </div>
                  </div>
                </div>


                <div class="col-md-12">
                  <div class="form-group row">
                    <label class="col-md-4" for="nombre">Nombre <small class="text-danger">*</small></label>
                    <div class="col-md-8">
                      <input type="text" class="form-control {{ $errors->has('nombre') ? 'is-invalid' : '' }}" name="nombre" id="nombre" value="{{ old('nombre') }}" required/>
                      {!! $errors->first('nombre','<small id="nombre" class="form-text text-danger">:message</small>') !!}
                    </div>
                  </div>
                </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group d-flex justify-content-end mr-3">
              <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

</div>

@endsection
@push('javascript')
<script src="{{ asset('js/preview.js') }}"></script>
<script src="{{ asset('vendor/select2/select2.min.js') }}"></script>


<script>
  function checkItem(item, p, i) {
    // panel = document.getElementById(p);
    input = document.getElementById(i);
    if (item.checked) {
      input.setAttribute('readonly',true);
      input.removeAttribute('required');
    } else {
      input.removeAttribute('readonly');
      input.setAttribute('required',true);
    }
  }

  $(".select2Multiple").select2({
		placeholder: "Categorias del producto",
		tags: true,
    allowClear: true,
		tokenSeparators: ['/',',',';']
	});
</script>
@endpush
