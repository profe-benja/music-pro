<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link {{ activeTab(["bodega/usuario"]) }}" href="{{ route('bodega.usuario.index') }}">Usuarios</a>
  </li>
  <li class="nav-item">
    <a class="nav-link {{ activeTab(["bodega/usuario/admins"]) }}" href="{{ route('bodega.usuario.admin') }}">Admins</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{ route('bodega.usuario.create') }}">Nuevo</a>
  </li>
</ul>
