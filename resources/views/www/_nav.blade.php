<header id="header-section">
  <nav class="navbar navbar-expand-lg pl-3 pl-sm-0" id="navbar">
  <div class="container">
    <div class="navbar-brand-wrapper d-flex w-100">
      <img src="{{ asset('assets/blogooo.svg') }}" width="120"  alt="">
      <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="mdi mdi-menu navbar-toggler-icon"></span>
      </button>
    </div>
    <div class="collapse navbar-collapse navbar-menu-wrapper" id="navbarSupportedContent">
      <ul class="navbar-nav align-items-lg-center align-items-start ml-auto">
        <li class="d-flex align-items-center justify-content-between pl-4 pl-lg-0">
          <div class="navbar-collapse-logo">
            <img src="{{ asset('assets/blogooo.svg') }}" width="40" alt="">
          </div>
          <button class="navbar-toggler close-button" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="mdi mdi-close navbar-toggler-icon pl-5"></span>
          </button>
        </li>
        <li class="nav-item mx-2">
          <a class="nav-link btn btn-outline-success rounded rounded-pill" href="{{ route('bodega.acceso') }}">
            📦
            Bodega
          </a>
        </li>
        <li class="nav-item mx-2">
          <a class="nav-link btn btn-outline-danger rounded rounded-pill" href="{{ route('sucursal.index') }}">
            <span>🏪 Sucursal</span>
          </a>
        </li>
        <li class="nav-item mx-2">
          <a class="nav-link btn btn-outline-warning rounded-pill" href="{{ route('transporte.index') }}">
            🚚
            Transporte
          </a>
        </li>
        <li class="nav-item mx-2">
          <a class="nav-link btn btn-outline-info rounded-pill" href="{{ route('tarjeta.index') }}">
            💳
            Tarjeta
          </a>
        </li>


        {{-- <li class="nav-item">
          <a class="nav-link" href="#feedback-section">Testimonials</a>
        </li> --}}
        {{-- <li class="nav-item btn-contact-us pl-4 pl-lg-0">
          <button class="btn btn-info" data-toggle="modal" data-target="#exampleModal">Contact Us</button>
        </li> --}}
      </ul>
    </div>
  </div>
  </nav>
</header>
