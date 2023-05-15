<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link {{ activeTab(["transporte/usuario/" . $u->id]) }}" href="{{ route('transporte.usuario.show',$u->id) }}">{{ $u->nombre_completo() }}</a>
  </li>
  <li class="nav-item">
    <a class="nav-link {{ activeTab(["transporte/usuario/" . $u->id . '/edit']) }}" href="{{ route('transporte.usuario.edit',$u->id) }}">Editar</a>
  </li>
</ul>
