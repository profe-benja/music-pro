<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link {{ activeTab(["admin/usuario/" . $u->id]) }}" href="{{ route('admin.usuario.show',$u->id) }}">{{ $u->nombre_completo() }}</a>
  </li>
  <li class="nav-item">
    <a class="nav-link {{ activeTab(["admin/usuario/" . $u->id . '/edit']) }}" href="{{ route('admin.usuario.edit',$u->id) }}">Editar</a>
  </li>
  <li class="nav-item">
    <a class="nav-link {{ activeTab(["admin/usuario/" . $u->id . '/historial']) }}" href="{{ route('admin.usuario.historial',$u->id) }}">Historial</a>
  </li>
</ul>
