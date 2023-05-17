<form action="{{ route('tarjeta.acceso.registro') }}" method="POST">
  @csrf
  <div class="row">
    <div class="form-group col-12 row mb-3">
      <label for="tarjeta" class="form-label col-6">TARJETA</label>
      <select class="form-select col-6" name="tarjeta" id="tarjeta">
        <option selected>BEATPAY - OFICIAL</option>
        {{-- <option value="">New Delhi</option> --}}
        {{-- <option value="">Istanbul</option> --}}
        {{-- <option value="">Jakarta</option> --}}
      </select>
    </div>
    <div class="form-group col-12">
      <label for="run">RUN <small>(SIN PUNTOS Y SIN GUIÓN)</small></label>
      <input type="text" class="form-control" id="run" name="run" placeholder="ej 19222333K" maxlength="9" min="8" pattern="^\d{7,9}[0-9K]{1}$" title="Formato 19222333K" onkeyup="this.value = validarRut(this.value)" required>
      <small id="error" class="text-danger"></small>
    </div>
    <div class="form-group col-12">
      <label for="run">RUN <small>(SIN PUNTOS Y SIN GUIÓN)</small></label>
      <input type="text" class="form-control" id="run" name="run" placeholder="ej 19222333K" maxlength="9" min="8" pattern="^\d{7,9}[0-9K]{1}$" title="Formato 19222333K" onkeyup="this.value = validarRut(this.value)" required>
      <small id="error" class="text-danger"></small>
    </div>
    <div class="form-group col-6">
      <label for="nombre">Nombre</label>
      <input type="text" class="form-control" id="nombre" name="nombre" placeholder="" required>
    </div>
    <div class="form-group col-6">
      <label for="correo">Correo</label>
      <input type="email" class="form-control" id="correo" name="correo" placeholder="" required>
    </div>
  </div>
  {{-- <div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck">
      <label class="form-check-label" for="gridCheck">
        Check me out
      </label>
    </div>
  </div> --}}
  <button type="submit" class="btn bg-primary btn-lg btn-block">
    <strong>Transferir</strong>
  </button>
</form>
