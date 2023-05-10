<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link {{ activeTab(["sucursal/usuario"]) }}" href="{{ route('sucursal.usuario.index') }}">Usuarios</a>
  </li>
  <li class="nav-item">
    <a class="nav-link {{ activeTab(["sucursal/usuario/admins"]) }}" href="{{ route('sucursal.usuario.admin') }}">Admins</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{ route('sucursal.usuario.create') }}">Nuevo</a>
  </li>
</ul>
