<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link {{ activeTab(["sucursal/usuario/" . $u->id]) }}" href="{{ route('sucursal.usuario.show',$u->id) }}">{{ $u->nombre_completo() }}</a>
  </li>
  <li class="nav-item">
    <a class="nav-link {{ activeTab(["sucursal/usuario/" . $u->id . '/edit']) }}" href="{{ route('sucursal.usuario.edit',$u->id) }}">Editar</a>
  </li>
</ul>
