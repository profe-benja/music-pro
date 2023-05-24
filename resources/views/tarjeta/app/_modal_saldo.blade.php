
<div class="modal fade" id="saldoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      {{-- <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div> --}}
      <div class="modal-body">
        <div class="container">
          <div class="row">
            @include('tarjeta.app._card')
            <div class="d-grid gap-2">
              <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#qrModal">
                <i class="fa-solid fa-3x fa-qrcode"></i>
                compartir
              </button>
            </div>
          </div>
        </div>
      </div>
      {{-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> --}}
    </div>
  </div>
</div>
