
<div class="modal fade" id="exitModal" tabindex="-1" aria-labelledby="exitModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        {{-- <h5 class="modal-title" id="exampleModalLabel">Modal title</h5> --}}
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body row">

        <div class="text-center mb-3">
          <p><strong>{{ current_user()->name }}!</strong> ¿Deseas salir sin responder el Quiz?</p>
          <img src="{{ asset('vendor/img/intro/undraw_campfire_re_9chj.svg') }}" class="img-responsive mt-2" height="200px" alt="">

        </div>
        <div class="text-center">
          <a href="{{ route('home.webapp') }}" class="btn ajna-btn-success btn-lg">
            Volver al inicio
          </a>
        </div>
      </div>
    </div>
  </div>
</div>