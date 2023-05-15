<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link {{ activeTab(["transporte/usuario"]) }}" href="{{ route('transporte.usuario.index') }}">Usuarios</a>
  </li>
  <li class="nav-item">
    <a class="nav-link {{ activeTab(["transporte/usuario/admins"]) }}" href="{{ route('transporte.usuario.admin') }}">Admins</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{ route('transporte.usuario.create') }}">Nuevo</a>
  </li>
</ul>
