{{-- <div class="container px-4 mb-2">
  <h2 class="pb-2 lead">
    <i class="fa fa-list"></i> Opciones
  </h2>
  <small></small>
</div> --}}

<div class="col-12 col-md-6 col-lg-4 text-center">
  <div class="card mb-3 shadow cursor position-relative" style="max-width: 540px;"
    data-bs-toggle="modal" data-bs-target="#qrModal">
    <div class="row g-0">
      <div class="col-4 align-self-center">
        <img src="{{ asset(current_config()->present()->getImagenCoin()) }}" class="brillo img-fluid p-2"
          width="100px" alt="...">
      </div>
      <div class="col-8 align-self-center">
        <div class="card-body">
          <h5 class="card-title fw-bold d-none d-md-block">
            Recibir
            <img src="{{ asset(current_config()->present()->getImagenCoin()) }}" width="20px" alt=""
             >
            {{ current_config()->nombre }}
          </h5>
          <h3 class="card-title fw-bold d-md-none">
            Recibir
            <img src="{{ asset(current_config()->present()->getImagenCoin()) }}" width="20px" alt="">
            {{ current_config()->nombre }}
          </h3>
          <p class="card-text">
            <small class="text-muted">{{ $text ?? '' }}</small>
            {{-- <small>{{ current_user()->myQR() }}</small> --}}
          </p>
        </div>
      </div>
    </div>
  </div>
</div>
