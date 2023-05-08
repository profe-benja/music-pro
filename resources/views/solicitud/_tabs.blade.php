<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link {{ activeTab(["admin/solicitudes"]) }}" href="{{ route('admin.solicitud.index') }}">Pendientes</a>
  </li>
  <li class="nav-item">
    <a class="nav-link {{ activeTab(["admin/solicitudes/aceptados"]) }}" href="{{ route('admin.solicitud.aceptados') }}">Aceptados</a>
  </li>
  <li class="nav-item">
    <a class="nav-link {{ activeTab(["admin/solicitudes/rechazados"]) }}" href="{{ route('admin.solicitud.rechazados') }}">Rechazados</a>
  </li>
</ul>
