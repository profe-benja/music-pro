<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link {{ activeTab(["tarjeta/admin/usuario"]) }}" href="{{ route('tarjeta.admin.usuario.index') }}">Usuarios</a>
  </li>
  <li class="nav-item">
    <a class="nav-link {{ activeTab(["tarjeta/admin/usuario/admins"]) }}" href="{{ route('tarjeta.admin.usuario.admin') }}">Admins</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{ route('tarjeta.admin.usuario.create') }}">Nuevo</a>
  </li>
</ul>
