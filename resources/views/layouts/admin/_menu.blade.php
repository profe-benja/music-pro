<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-star text-warning"></i>
    </div>
    <div class="sidebar-brand-text mx-3">inFast</div>
  </a>
  <hr class="sidebar-divider my-0">
  <li class="nav-item {{ activeTab(['admin/home']) }}">
    <a class="nav-link" href="{{ route('home.index') }}">
      <i class="fas fa-fw fa-home"></i>
      <span>Inicio</span>
    </a>
  </li>
  <li class="nav-item {{ activeTab(['admin/solicitudes*']) }}">
    <a class="nav-link" href="{{ route('admin.solicitud.index') }}">
      <i class="fas fa-fw fa-bell"></i>
      <span>Solicitudes</span>
    </a>
  </li>
  <hr class="sidebar-divider">
  {{-- <div class="sidebar-heading">
    Administrador
  </div> --}}
  {{-- <li class="nav-item {{ activeTab(['admin/rewards*']) }}">
    <a class="nav-link" href="{{ route('admin.accion.index') }}">
      <i class="fas fa-fw fa-award"></i>
      <span>Recompensas</span>
    </a>
  </li> --}}

  <li class="nav-item {{ activeTab(['admin/producto*']) }}">
    <a class="nav-link" href="{{ route('admin.producto.index') }}">
      <i class="fas fa-fw fa-heart"></i>
      <span>Productos</span>
    </a>
  </li>
{{--
  <li class="nav-item {{ activeTab(['admin/reports*']) }}">
    <a class="nav-link" href="{{ route('admin.report.index') }}">
      <i class="fa fa-fw fa-chart-line"></i>
      <span>Reportes</span>
    </a>
  </li> --}}

  <li class="nav-item {{ activeTab(['admin/usuario*']) }}">
    <a class="nav-link" href="{{ route('admin.usuario.index') }}">
      <i class="fas fa-fw fa-users"></i>
      <span>Usuarios</span>
    </a>
  </li>

  <li class="nav-item {{ activeTab(['admin/config*','admin/team*']) }}">
    <a class="nav-link" href="{{ route('admin.config.index') }}">
      <i class="fas fa-fw fa-cog"></i>
      <span>Configuración</span>
    </a>
  </li>
  {{-- <hr class="sidebar-divider"> --}}
  {{-- <li class="nav-item text-center">
    <a class="btn btn-warning btn-sm mb-3" href="{{ route('webapp.index') }}">
      <i class="fas fa-fw fa-mobile-alt"></i>
      <span>APP</span>
    </a>
  </li> --}}
{{--
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
      aria-expanded="true" aria-controls="collapseUtilities">
      <i class="fas fa-fw fa-wrench"></i>
      <span>Utilities</span>
    </a>
    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Custom Utilities:</h6>
        <a class="collapse-item" href="utilities-color.html">Colors</a>
        <a class="collapse-item" href="utilities-border.html">Borders</a>
        <a class="collapse-item" href="utilities-animation.html">Animations</a>
        <a class="collapse-item" href="utilities-other.html">Other</a>
      </div>
    </div>
  </li> --}}

  {{-- <hr class="sidebar-divider">
  <div class="sidebar-heading">
    Addons
  </div>
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
      aria-controls="collapsePages">
      <i class="fas fa-fw fa-folder"></i>
      <span>Pages</span>
    </a>
    <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Login Screens:</h6>
        <a class="collapse-item" href="login.html">Login</a>
        <a class="collapse-item" href="register.html">Register</a>
        <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
        <div class="collapse-divider"></div>
        <h6 class="collapse-header">Other Pages:</h6>
        <a class="collapse-item" href="404.html">404 Page</a>
        <a class="collapse-item" href="blank.html">Blank Page</a>
      </div>
    </div>
  </li> --}}

  {{-- <li class="nav-item">
    <a class="nav-link" href="charts.html">
      <i class="fas fa-fw fa-chart-area"></i>
      <span>Charts</span></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="tables.html">
      <i class="fas fa-fw fa-table"></i>
      <span>Tables</span></a>
  </li>
  <hr class="sidebar-divider d-none d-md-block">
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>
  <div class="sidebar-card d-none d-lg-flex">
    <img class="sidebar-card-illustration mb-2" src="img/undraw_rocket.svg" alt="...">
    <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components, and more!
    </p>
    <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to Pro!</a>
  </div> --}}
  <hr class="sidebar-divider d-none d-md-block">
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>
</ul>
