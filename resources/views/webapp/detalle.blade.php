@extends('layouts.webapp.app')
@push('stylesheet')

@endpush
@section('content')
@include('webapp.components.nav._home')

<div class="container mt-4 mb-4">
  <div class="d-flex justify-content-center">
    <div class="col-md-8">
      <div class="row">
        @component('webapp.components.button._back')
          @slot('route', route('webapp.canjear'))
          @slot('color', 'secondary')
          @slot('body', 'Cajea tu articulo aquí')
        @endcomponent
        <div class="col-md-12">
          <div class="card shadow-sm">
            <div class="card-body row">
              <div class="col-md-6 col-12">
                <img src="{{ asset($p->present()->getImagen()) }}" class="card-img-top img-fluid" alt="...">
              </div>
              <div class="col-md-6 col-12">
                <h5 class="card-title my-3">
                  {{ $p->nombre }}
                </h5>
                <p class="card-text my-3">
                  {{ $p->descripcion }}
                </p>

                {{-- @if ($p->stock_ilimitado)
                  <p>
                    <span class="badge badge-pill bg-secondary">
                      <strong>Cantidad disponibles:</strong> {{ $p->stock }}
                    </span>
                  </p>
                @endif --}}

                {{-- @if ($p->stock_ilimitado)
                  <p>
                    <span class="badge badge-pill bg-secondary">
                      <strong>Cantidad disponibles:</strong> {{ $p->stock }}
                    </span>
                  </p>
                @endif --}}

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
                  </tbody>
                </table>

                <div class="d-grid gap-2">
                  @if ($p->stock_ilimitado)
                    @if ($p->precio <= current_user()->credito)
                      <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#articleModal">Canjear
                        <img src="{{ asset(current_config()->present()->getImagenCoin()) }}" width="20px">
                        {{ $p->getPrecio() }}
                      </button>
                    @else
                      <button type="button" class="btn btn-danger btn-lg" disabled>No tienes <img src="{{ asset(current_config()->present()->getImagenCoin()) }}" width="20px">
                        suficientes
                      </button>
                    @endif
                  @else
                    @if ($p->stock <= 0)
                      <button type="button" class="btn btn-info btn-lg">
                        No disponible
                      </button>
                    @else
                      @if ($p->precio <= current_user()->credito)
                        <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#articleModal">Canjear
                          <img src="{{ asset(current_config()->present()->getImagenCoin()) }}" width="20px">
                          {{ $p->getPrecio() }}
                        </button>
                      @else
                        <button type="button" class="btn btn-danger btn-lg" disabled>No tienes <img src="{{ asset(current_config()->present()->getImagenCoin()) }}" width="20px">
                          suficientes
                        </button>
                      @endif
                    @endif
                  @endif
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="articleModal" tabindex="-1" aria-labelledby="articleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      {{-- <div class="modal-header">
        <h5 class="modal-title" id="articleModalLabel">Recibir <img
            src="{{ asset(current_config()->present()->getImagenCoin()) }}" width="20px" alt="">
          {{ current_config()->nombre }}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div> --}}
      <form class="form-submit" action="{{ route('webapp.canjear.store',$p->id) }}" method="post">
        @csrf
        <div class="modal-body">
          <div class="container">
            <div class="row">
              {{-- <div class="col-12 text-center">
                <strong><small>Muestra este QR para recibir la recompensa</small></strong>
              </div> --}}
              {{-- <div class="col-md-12 text-center mb-3">
                <img id="list-modal-img" src="{{ asset($p->present()->getImagen()) }}" class="img-fluid rounded-3" width="400px" alt="">
              </div> --}}
              <div class="col-md-12 text-center">
                <h2>
                  <img src="{{ asset(current_config()->present()->getImagenCoin()) }}" width="32px" alt=""
                    class="img-fluid me-2">{{ $p->getPrecio() }}
                </h2>
              </div>

              <div class="col-md-12">
                <div class="card border">
                  <div class="card-body">
                    <p>Se enviará una solicitud para el canjee de este articulo.</p>
                  </div>
                </div>
              </div>

              <div class="col-md-12 text-center mt-2">
                <div class="d-grid gap-2">
                  <button type="submit" class="btn btn-primary btn-lg" data-bs-dismiss="modal">Canjear</button>
                  {{-- <button type="button" class="btn btn-secondary btn-lg" data-bs-dismiss="modal">Cerrar</button> --}}
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>


@endsection
@push('javascript')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

{{-- payload --}}

<script>

  let response = @json(session('payload') ?? null);

  if (response) {
    Swal.fire({
      // title: '',
      html: response.message,
      icon: response.status,
      showConfirmButton: false,
      // confirmButtonText: 'Cool',
      // confirmButtonColor: '#000',
      timer: 4000,
      timerProgressBar: true,
    });
  }
</script>
@endpush
