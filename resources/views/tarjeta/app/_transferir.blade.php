<div class="card text-white bg-dark bg-woow4">
  {{-- <img class="card-img-top" src="holder.js/100px180/" alt="Title"> --}}
  <div class="card-body">
    {{-- <h4 class="card-title">Title</h4> --}}
    {{-- <p class="card-text">Text</p> --}}

    <form action="{{ route('tarjeta.acceso.registro') }}" method="POST">
      @csrf
      <div class="row">
        <div class="mb-3 row">
          <label for="tarjeta" class="col-form-label col-md-2 -col-6"><strong>TARJETA</strong></label>
          <div class="col">
            <select class="form-select" name="tarjeta" id="tarjeta">
              @foreach ($bancos as $b)
              <option value="{{ $b->code }}">{{ $b->nombre }}</option>
              @endforeach
            </select>
          </div>
        </div>

        <div class="mb-3 row">
          <label for="inputCuenta" class="col-sm-2 col-form-label">Nro cuenta</label>
          <div class="col-sm-10">
            <input type="number" class="form-control" id="inputCuenta" name="nro" required>
          </div>
        </div>

        <div class="mb-3 row">
          <label for="inputMonto" class="col-sm-2 col-form-label">Monto</label>
          <div class="col-sm-10">
            <input type="number" class="form-control" min="1" maxlength="999" id="inputNombre" name="monto" required>
            <small class="text-info">(Saldo para transferir: $ {{current_tarjeta_user()->me_card()->getSaldo() ?? 0 }} )</small>
          </div>
        </div>

        <div class="mb-3 row">
          <label for="inputDesc" class="col-sm-2 col-form-label">Descripcion</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="inputDesc" name="descripcion">
          </div>
        </div>
      </div>
      <div class="d-grid gap-2">
        <button class="btn btn-lg btn-bd-primary" type="button">BEAT TRANSFER</button>
      </div>
      {{-- <button type="submit" class="btn bg-primary btn-lg btn-block">
        <strong>Transferir</strong>
      </button> --}}
    </form>
  </div>
</div>
