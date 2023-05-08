
@extends('layouts.admin.app')
@push('stylesheet')

@endpush
@section('content')
<div class="container-fluid">

  <div class="row">
    @include('solicitud._tabs_solicitud')
    <div class="col-md-12">

      <div class="card shadow mb-4">
        <div class="card-body">
          <div class="row">
            <div class="col-lg-4 mb-4">
              <div class="card mb-4">
                <div class="card-body">
                  <h4 class="m-0 font-weight-bold">
                    {{ $p->nombre }}
                  </h4>
                  <div class="text-center">
                    <img src="{{ asset($p->present()->getImagen()) }}" width="300px" class="rounded mt-3 mb-4" alt="...">
                  </div>
                  <p>
                    {{ $p->descripcion }}
                  </p>
                  <p class="text-center">
                    <img src="{{ asset(current_config()->present()->getImagenCoin()) }}" width="30px" alt="">
                    <strong>{{ $p->getPrecio() }}</strong>
                  </p>
                  <table class="table table-sm text-sm table-bordered ">
                    <tbody>
                      <tr>
                        <td><small>Cantidad disponible</small></td>
                        <td class="text-center"><small>{{ $p->stock_ilimitado ? '∞' : $p->stock }}</small></td>
                      </tr>
                      <tr>
                        <td><small>Cantidad por usuario</small></td>
                        <td class="text-center"><small>{{ $p->cant_por_usuario_ilimitado ? '∞' : $p->cant_por_usuario }}</small></td>
                      </tr>
                      <tr>
                        <td><small>Cantidad repartida</small></td>
                        <td class="text-center"><small>{{ $p->cant_entregada ?? 0 }}</small></td>
                      </tr>
                    </tbody>
                  </table>
                </div>

                {{-- <div class="card-footer text-center">
                  <h4>
                    @if ($p->estado == 1)
                      <span class="badge badge-primary">Borrador</span>
                    @else
                    @if ($p->estado == 2)
                      <span class="badge badge-dark">No disponible</span>
                    @else
                      <span class="badge badge-success">Disponible</span>
                    @endif
                    @endif
                  </h4>
                </div> --}}
              </div>
            </div>

            <div class="col-lg-8 mb-4">
              <div class="card shadow mb-3">
                {{-- <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Projects</h6>
                </div> --}}
                <div class="card-body">

                  <p>Solicitante</p>
                  <table class="table table-sm text-sm table-bordered">
                    <tbody>
                      <tr>
                        <td>Fecha</td>
                        <td>{{ $s->getFechaCreacion()->getDateVersion() }}</td>
                      </tr>
                      <tr>
                        <td>Nombre</td>
                        <td>
                          {{ $s->usuario_solicitante->nombre_completo() }}
                          <a href="{{ route('admin.usuario.show', $s->id_usuario_solicitante) }}" class="ml-2 btn btn-sm btn-success"> ver perfil
                          </a>
                        </td>
                      </tr>
                      <tr>
                        <td>Correo</td>
                        <td>{{ $s->usuario_solicitante->correo }}</td>
                      </tr>
                      <tr>
                        <td>Estado</td>
                        <td>
                          <h5>
                            @if ($s->estado == 1)
                              <span class="badge badge-pill badge-warning">Pendiente</span>
                            @else
                              @if ($s->estado == 2)
                                <span class="badge badge-pill badge-success">Aceptado</span>
                              @else
                                <span class="badge badge-pill badge-danger">Rechazado</span>
                              @endif
                            @endif
                          </h5>
                        </td>
                      </tr>
                      @if ($s->estado != 1)
                      <tr>
                        <td>Usuario encargado</td>
                        <td>{{  $s->usuario_receptor->nombre_completo() }}</td>
                      </tr>
                      @endif
                    </tbody>
                  </table>
                </div>
              </div>
              @if ($s->estado == 1)
              <div class="card shadow mb-3">
                {{-- <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Projects</h6>
                </div> --}}
                <div class="card-body">
                  <p>Resolver solicitud de <strong>{{ $s->usuario_solicitante->nombre_completo() }}</strong> <small>(No podras reinvertir esta decisión)</small></p>


                  <form class="form-submit" action="{{ route('admin.solicitud.finished', $s->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    {{-- <div class="col-md-12">
                      <div class="form-group row">
                        <label class="col-md-4" for="estado">Comentario</label>
                        <div class="col-md-8">
                            <textarea class="form-control" name="comentario" id="" rows="2"></textarea>
                        </div>
                      </div>
                    </div> --}}
                    <div class="col-md-12">
                      <div class="form-group row">
                        <label class="col-md-4" for="estado">Cambiar estado</label>
                        <div class="col-md-8">
                          <select class="form-control" id="estado" name="estado">
                            <option value="1" {{ $s->estado == 1 ? 'selected' : '' }}>Pendiente</option>
                            <option value="2" {{ $s->estado == 2 ? 'selected' : '' }}>Aceptar</option>
                            <option value="3" {{ $s->estado == 3 ? 'selected' : '' }}>Rechazar</option>
                          </select>
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
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@push('javascript')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
  let response = @json(session('payload') ?? null);

  if (response) {
    Swal.fire({
      // title: '',
      html: response.message,
      icon: response.status,
      // showConfirmButton: false,
      confirmButtonText: 'OK',
      // confirmButtonColor: '#000',
      timer: 4000,
      timerProgressBar: true,
    });
  }
</script>
@endpush
