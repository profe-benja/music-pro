<div class="modal fade" id="perfilModal" tabindex="-1" aria-labelledby="perfilModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        {{-- <h5 class="modal-title" id="exampleModalLabel">Modal title</h5> --}}
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <table class="table">
          <tbody>
            <tr>
              <td><strong>Nombre</strong></td>
              <td>{{ current_user()->nombre }}</td>
            </tr>
            <tr>
              <td><strong>Correo</strong></td>
              <td>{{ current_user()->correo }}</td>
            </tr>
            <tr>
              <td><strong>Idioma</strong></td>
              <td>
                <div class="form-group">
                  <select id="my-select" class="form-control" name="">
                    <option>Español</option>
                    <option>Inglés</option>
                    <option>Portugués</option>
                  </select>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
        {{-- @php
          $modeMain = session()->get('modeMain') ?? [];
        @endphp --}}

        <div class="text-center">
          @if (current_user()->admin)
            <a href="{{ route('home.index') }}" class="btn ajna-btn-purple-400 btn-lg text-white mb-3">
              Ir al Administrador
            </a>
          @endif

          {{-- @if (!empty($modeMain))
            <a href="{{ route('auth.webapp.back_as') }}" class="btn ajna-btn-green-400 btn-lg text-white mb-3">
              Salir del modo entrar como...
            </a>
          @endif --}}

          <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger btn-lg">
              Cerrar Sesión
            </button>
          </form>
        </div>

        <small>v0.1.0</small>
      </div>
    </div>
  </div>
</div>
