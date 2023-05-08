
@extends('layouts.admin.app')
@push('stylesheet')

@endpush
@section('content')


<div class="container-fluid">
  <div class="row">
    @include('producto._tabs_producto')
    <div class="col-md-12">

      <div class="card shadow mb-3">
        <form class="form-sample form-submit" action="{{ route('admin.producto.update', $p->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="row">
            <div class="col-md-6">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group row">
                      <label class="col-md-4" for="nombre">CÓDIGO <small class="text-danger">*</small></label>
                      <div class="col-md-8">
                        <input type="text" class="form-control" value="{{ $p->codigo }}" readonly/>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="form-group row">
                      <label class="col-md-4" for="nombre">Nombre <small class="text-danger">*</small></label>
                      <div class="col-md-8">
                        <input type="text" class="form-control {{ $errors->has('nombre') ? 'is-invalid' : '' }}" name="nombre" id="nombre" value="{{ $p->nombre }}" required/>
                        {!! $errors->first('nombre','<small id="nombre" class="form-text text-danger">:message</small>') !!}
                      </div>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="form-group row">
                      <label for="descripcion" class="col-md-4">Descripción</label>
                      <div class="col-md-8">
                        <textarea class="form-control" id="descripcion" name="descripcion" rows="3">{{ $p->descripcion }}</textarea>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="form-group row">
                      <label class="col-md-4" for="credito">Precio<small class="text-danger">*</small></label>
                      <div class="col-md-8">
                        <input type="number" class="form-control" min="1" name="credito" id="credito" value="{{ $p->precio }}" required/>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="card form-group">
                      <div class="card-header">
                        <div class="custom-control custom-switch">
                          <input type="checkbox" class="custom-control-input" id="cant_stock_swith" name="cant_stock_swith" onclick="checkItem(this, 'panel', 'stock');" {{ $p->stock_ilimitado ? 'checked' : ''}}>
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
                              <input type="number" class="form-control" min="1" name="stock" id="stock" value="{{ $p->stock ?? 0 }}" {{ $p->stock_ilimitado ? 'readonly' : 'required'}} />
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
                          <input type="checkbox" class="custom-control-input" id="cant_per_user_swith" name="cant_per_user_swith" onclick="checkItem(this, 'panel2', 'cant_per_user');" {{ $p->cant_por_usuario_ilimitado ? 'checked' : ''}}>
                          <label class="custom-control-label" for="cant_per_user_swith">Cantidad de entrega por usuario ilimitada</label>
                        </div>
                      </div>
                      <div class="card-body" id="panel2">
                        <div class="col-md-12">
                          <div class="form-group row">
                            <label class="col-sm-12" for="cant_per_user">
                              Por usuario
                              <small>¿cuantas veces puede recibir esta producto por usuario?</small>
                            </label>
                            <div class="col-sm-12">
                              <input type="number" class="form-control" min="1" name="cant_per_user" id="cant_per_user" value="{{ $p->cant_por_usuario ?? 0 }}" {{ $p->cant_por_usuario_ilimitado ? 'readonly' : 'required'}}/>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group row">
                      <label class="col-form-label col-sm-4" for="hf-rut">Imagen</label>
                      <div class="col-sm-8 text-center">
                        <img src="{{ asset($p->present()->getImagen()) }}"  class='Responsive image img-thumbnail'  width='200px' height='200px' alt="">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-form-label col-sm-4" for="hf-rut">Nueva imagen</label>
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
                          <option value="1" {{ $p->estado == 1 ? 'selected' : '' }}>Borrador</option>
                          <option value="2" {{ $p->estado == 2 ? 'selected' : '' }}>No disponible</option>
                          <option value="3" {{ $p->estado == 3 ? 'selected' : '' }}>Disponible</option>
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
  </div>
</div>
@endsection
@push('javascript')
<script src="{{ asset('js/preview.js') }}"></script>

<script>
  function checkItem(item, p, i) {
    input = document.getElementById(i);
    if (item.checked) {
      input.setAttribute('readonly',true);
      input.removeAttribute('required');
    } else {
      input.removeAttribute('readonly');
      input.setAttribute('required',true);
    }
  }
</script>
@endpush
