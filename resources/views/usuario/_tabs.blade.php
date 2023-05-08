<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link {{ activeTab(["admin/usuario"]) }}" href="{{ route('admin.usuario.index') }}">Usuarios</a>
  </li>
  <li class="nav-item">
    <a class="nav-link {{ activeTab(["admin/usuario/admins"]) }}" href="{{ route('admin.usuario.admin') }}">Admins</a>
  </li>
  <li class="nav-item">
    <a class="nav-link {{ activeTab(["admin/usuario/eliminados"]) }}" href="#">Eliminados</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{ route('admin.usuario.create') }}">Nuevo</a>
  </li>
</ul>
