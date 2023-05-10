<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link {{ activeTab(["bodega/usuario/" . $u->id]) }}" href="{{ route('bodega.usuario.show',$u->id) }}">{{ $u->nombre_completo() }}</a>
  </li>
  <li class="nav-item">
    <a class="nav-link {{ activeTab(["bodega/usuario/" . $u->id . '/edit']) }}" href="{{ route('bodega.usuario.edit',$u->id) }}">Editar</a>
  </li>
</ul>
