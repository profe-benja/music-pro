
@extends('layouts.admin.app')
@push('stylesheet')

  <link rel="stylesheet" href="{{ asset('vendor/select2/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('vendor/select2-bootstrap-theme/select2-bootstrap.min.css') }}">
@endpush
@section('content')
<div class="container-fluid">
  @component('components.button._back')
    @slot('route', route('admin.producto.index'))
    @slot('color', 'secondary')
    @slot('body', 'Creación de producto')
  @endcomponent
  <div class="card shadow mb-3">
    {{-- form-sample form-submit --}}
    <form class="" action="{{ route('admin.producto.store') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="row">
        <div class="col-md-6">
          <div class="card-body">

              <div class="row">
                <div class="col-md-12">
                  <div class="form-group row">
                    <label class="col-md-4" for="nombre">Código <small class="text-danger">*</small></label>
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

                  <div class="col-md-12">
                    <div class="form-group row">
                      <label for="descripcion" class="col-md-4">Descripción</label>
                      <div class="col-md-8">
                        <textarea class="form-control" id="descripcion" name="descripcion" rows="3"></textarea>
                      </div>
                    </div>
                  </div>


                <div class="col-md-12">
                  <div class="form-group row">
                    <label class="col-md-4" for="credito">Precio<small class="text-danger">*</small></label>
                    <div class="col-md-8">
                      <input type="number" class="form-control" min="1" name="credito" id="credito" value="{{ old('credito') }}" required/>
                    </div>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="card form-group">
                    <div class="card-header">
                      <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="cant_stock_swith" name="cant_stock_swith" onclick="checkItem(this, 'panel', 'stock');" checked>
                        <label class="custom-control-label" for="cant_stock_swith">Cantidad de entrega ilimitada</label>
                      </div>
                    </div>
                    <div class="card-body" id="panel">
                      <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-12" for="stock">
                            Stock disponible
                            <small>¿cuantas veces se va a entregará esta acción?</small>
                          </label>
                          <div class="col-sm-12">
                            <input type="number" class="form-control" readonly min="1" name="stock" id="stock" value="{{ old('stock') }}"/>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group row">
                    <label class="col-form-label col-sm-3">
                      Categorías
                    </label>
                    <div class="col-sm-9">
                      <select class="form-control select2Multiple" name="categorias[]" multiple="true">
                        @foreach ($categorias as $key => $value)
                          <option value="{{ $value->nombre }}">{{ $value->nombre }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                </div>

              </div>
              {{--
              <div class="form-group d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Guardar</button>
              </div> --}}
          </div>
        </div>
        <div class="col-md-6">
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                {{-- <div class="form-group row">
                  <label class="col-form-label col-sm-4" for="hf-rut">Logo</label>
                  <div class="col-sm-8 text-center">
                    <img src="{{ asset($a->present()->getImagen()) }}"  class='Responsive image img-thumbnail'  width='200px' height='200px' alt="">
                  </div>
                </div> --}}

                <div class="form-group row">
                  <label class="col-form-label col-sm-4" for="hf-rut">Imagen</label>
                  <div class="col-sm-8 text-center">
                    <input type="file" name="image" accept="image/*" class="mb-3" onchange="preview(this)" />
                    <div id="preview"></div>
                  </div>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group row">
                  <label class="col-md-4" for="estado">Estado</label>
                  <div class="col-md-8">
                    <select class="form-control" id="estado" name="estado">
                      <option value="1">Borrador</option>
                      <option value="2">No disponible</option>
                      <option value="3">Disponible</option>
                    </select>
                  </div>
                </div>
              </div>
              {{-- <div class="col-md-12">
                <div class="card form-group">
                  <div class="card-header">
                    <div class="custom-control custom-switch">
                      <input type="checkbox" class="custom-control-input" id="cant_stock_swith" name="cant_stock_swith" onclick="checkItem(this, 'panel', 'stock');" checked>
                      <label class="custom-control-label" for="cant_stock_swith">Añadir fechas disponibles</label>
                    </div>
                  </div>
                  <div class="card-body" id="panel">
                    <div class="col-md-12">
                      <div class="form-group row">
                        <label class="col-sm-12" for="stock">
                          Stock disponible
                          <small>¿cuantas veces se va a entregará esta acción?</small>
                        </label>
                        <div class="col-sm-12">
                          <input type="datetime-local" class="form-control" min="1" name="stock" id="stock" value="{{ old('stock') }}"/>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-12">
                <div class="card form-group">
                  <div class="card-header">
                    <div class="custom-control custom-switch">
                      <input type="checkbox" class="custom-control-input" id="cant_stock_swith" name="cant_stock_swith" onclick="checkItem(this, 'panel', 'stock');" checked>
                      <label class="custom-control-label" for="cant_stock_swith">Añadir fechas disponibles</label>
                    </div>
                  </div>
                  <div class="card-body" id="panel">
                    <div class="col-md-12">
                      <div class="form-group row">
                        <label class="col-sm-12" for="stock">
                          Stock disponible
                          <small>¿cuantas veces se va a entregará esta acción?</small>
                        </label>
                        <div class="col-sm-12">
                          <input type="datetime-local" class="form-control" min="1" name="stock" id="stock" value="{{ old('stock') }}"/>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div> --}}
            </div>
          </div>
        </div>

        <div class="col-md-12">

          <div class="form-group d-flex justify-content-end mr-3">
            <button type="submit" class="btn btn-primary">Guardar</button>
          </div>
        </div>
      </div>
    </form>
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
