
@extends('layouts.admin.app')
@push('stylesheet')
<link href="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

@endpush
@section('content')
<div class="container-fluid">
  <div class="row">
    @include('accion._tabs_accion')
    <div class="col-md-12">
      <div class="card shadow mb-4">
        <div class="card-body">
          <div class="row">
            @include('accion._tabs_accion_interno')

            <div class="d-none d-md-block col-lg-4 mb-4">
              <div class="card mb-4">
                <div class="card-body">
                  <h4 class="m-0 font-weight-bold">
                    {{ $a->nombre }}
                  </h4>
                  <div class="text-center">
                    <img src="{{ asset($a->present()->getImagen()) }}" width="300px" class="img-fluid rounded mt-3 mb-4" alt="...">
                  </div>
                  <p>
                    {{ $a->descripcion }}
                  </p>
                </div>
                <div class="card-footer text-center">
                  <h3>
                    <strong>
                      <img src="{{ asset(current_config()->present()->getImagenCoin()) }}" width="30px" alt="">
                      {{ $a->getCredito() }}
                    </strong>
                  </h3>
                </div>
                <div class="card-footer text-center">
                  <h4>
                    @if ($a->estado == 1)
                      <span class="badge badge-primary">Borrador</span>
                    @else
                    @if ($a->estado == 2)
                      <span class="badge badge-dark">No disponible</span>
                    @else
                      <span class="badge badge-success">Disponible</span>
                    @endif
                    @endif
                  </h4>
                </div>
              </div>
            </div>

            <div class="col-lg-8 mb-4">
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Usuarios</h6>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-hover table-sm" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>id</th>
                          <th>Correo</th>
                          <th>Nombre</th>
                          <th>Team</th>
                          <th>
                            <img src="{{ asset(current_config()->present()->getImagenCoin()) }}" width="20px" alt="">
                            Credito
                          </th>
                          {{-- <th>Tipo usuario</th> --}}
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($usuarios as $u)
                        <tr class="handle" data-toggle="modal" data-target="#modalUser" data-id="{{ $u->id }}" data-name="{{ $u->nombre_completo() }}">
                          <td>{{ $u->id }}</td>
                          <td>{{ $u->correo }}</td>
                          <td>{{ $u->nombre_completo() }}</td>
                          <td>{{ $u->team->nombre ?? '' }}</td>
                          <td>
                            <img src="{{ asset(current_config()->present()->getImagenCoin()) }}" width="20px" alt="">
                            {{ $u->getCredito() }}
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modalUser" tabindex="-1" aria-labelledby="modalUserLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      {{-- <div class="modal-header">
        <h5 class="modal-title" id="modalUserLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div> --}}
      <div class="modal-body text-center">
        <strong>
          Enviar <img src="{{ asset(current_config()->present()->getImagenCoin()) }}" width="20px" alt="">
          {{ $a->getCredito() }} {{ current_config()->nombre }} a <div id="option_name"></div>
        </strong>
      </div>
      <div class="modal-footer">
        <form class="form-submit" action="{{ route('admin.accion.users', $a->id) }}" method="post">
          @csrf
          <input type="text" id="option_id" name="id" hidden>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-success">Enviar</button>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
@push('javascript')
<script src="{{ asset('admin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

<script>
  $(document).ready(function() {
    $('#dataTable').DataTable();
  });

  $('#modalUser').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var id = button.data('id');
    var name = button.data('name');

    var modal = $(this);
    modal.find('#option_id').val(id);
    modal.find('#option_name').text(name);
  });
</script>


@endpush
