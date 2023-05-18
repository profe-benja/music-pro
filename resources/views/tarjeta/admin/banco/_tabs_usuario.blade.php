<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link {{ activeTab(["tarjeta/admin/usuario/" . $u->id]) }}" href="{{ route('tarjeta.admin.usuario.show',$u->id) }}">{{ $u->nombre_completo() }}</a>
  </li>
  <li class="nav-item">
    <a class="nav-link {{ activeTab(["tarjeta/admin/usuario/" . $u->id . '/edit']) }}" href="{{ route('tarjeta.admin.usuario.edit',$u->id) }}">Editar</a>
  </li>
</ul>
