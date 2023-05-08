{{-- <div class="card mb-3"> --}}
  {{-- <div class="card-body"> --}}
    <div class="d-none d-md-block mb-3">
      <nav class="nav nav-pills nav-justified shadow-sm">
        <a class="nav-link border {{ activeTab(['webapp/home']) }}" href="{{ route('webapp.index') }}">
          Recibir
          <img src="{{ asset(current_config()->present()->getImagenCoin()) }}" width="20px" alt="">
          {{ current_config()->nombre }}
        </a>
        <a class="nav-link border {{ activeTab(['webapp/historial']) }}" href="{{ route('webapp.historial') }}">
          <i class="fa fa-list"></i> Historial
        </a>
        <a class="nav-link border {{ activeTab(['webapp/canjear']) }}" href="{{ route('webapp.canjear') }}">
          <i class="fa fa-store"></i>  Canjear
        </a>
      </nav>
    </div>
  {{-- </div> --}}
{{-- </div> --}}
