<div class="card border border-1 border-dark shadow">
  <div class="card-body">
    <h4 class="card-title">Mi Cuenta</h4>
    <h3 class="card-title fw-bolder">
      <img src="{{ asset(current_config()->present()->getImagenCoin()) }}" width="30px" alt="">
      <strong>{{ current_user()->getCredito() }}</strong>
    </h3>
    <small class="card-text">
      {{ current_user()->present()->nombre_completo() }}
    </small>

    <hr class="border-dark"/>
    <div class="col-md-12 text-center">
      <a href="" class="none-decorador">Ver mis solicitudes</a>
    </div>
  </div>
</div>
