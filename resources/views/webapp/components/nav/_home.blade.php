<nav class="navbar navbar-light bg-dark">
  <div class="container">
    <div class="navbar-brand text-white">
      <img src="{{ asset(current_sistema()->present()->getLogo()) }}" alt="" width="30" height="30" class="d-inline-block align-text-top">
      <strong>{{current_sistema()->nombre}}</strong>
    </div>

    <div class="dropdown">
      <div class="d-block link-dark">
        <div>
          <button type="button" class="btn bg-white btn-sm mb-2">
            {{-- <small class="card-title fw-bolder"> --}}
              <img src="{{ asset(current_config()->present()->getImagenCoin()) }}" width="20px" alt="">
              <strong>{{ current_user()->getCredito() }}</strong>
            {{-- </small> --}}
          </button>
          <i class="fas fa-question-circle fa-2x text-white handle p-2" data-bs-toggle="modal" data-bs-target="#perfilModal"></i>
        </div>
      </div>
    </div>
  </div>
</nav>

@include('webapp.components.modal._perfil')
