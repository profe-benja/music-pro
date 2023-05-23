<div class="modal fade" id="reargarModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body">
        <form action="{{ route('tarjeta.app.recargar') }}" method="POST">
          @csrf
          <div class="row">
            <div class="mb-3 row">
              <label for="inputRecargar" class="col-sm-2 col-form-label">Monto</label>
              <div class="col-sm-10">
                <input type="number" class="form-control" min="1" maxlength="999" id="inputRecargar" name="monto" required>
              </div>
            </div>
          </div>
          <div class="d-grid gap-2">
            <button class="btn btn-lg btn-bd-primary" type="submit">RECARGAR</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
