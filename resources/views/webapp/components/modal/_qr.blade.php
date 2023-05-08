<div class="modal fade" id="qrModal" tabindex="-1" aria-labelledby="qrModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Recibir <img src="{{ asset(current_config()->present()->getImagenCoin()) }}" width="20px" alt="">
          {{ current_config()->nombre }}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container">
          <div class="row">
            <div class="col-12 text-center">
              <strong><small>Muestra este QR para recibir la recompensa</small></strong>
            </div>
            <div class="col-md-12 text-center">
              <img id="codigo" class="img-fluid rounded-top" width="400px" alt="">
            </div>
            <div class="col-md-12 text-center">
              <small>Este código durará 5 minutos</small>
            </div>
            <div class="col-md-12 text-center mt-2">
              <div class="d-grid gap-2">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cerrar</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
