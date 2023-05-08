@component('components.button._back')
  @slot('route', route('admin.accion.index'))
  @slot('color', 'secondary')
  @slot('body', 'Accion - Recompensa - ' . $a->nombre)
@endcomponent

<div class="col-12">
  <ul class="nav nav-tabs">
    <li class="nav-item">
      <a class="nav-link {{ activeTab(["admin/rewards/" . $a->id]) }}" href="{{ route('admin.accion.show', $a->id) }}">{{ $a->nombre }}</a>
    </li>

    <li class="nav-item">
      <a class="nav-link {{ activeTab(["admin/rewards/" . $a->id . "/edit"]) }}" href="{{ route('admin.accion.edit', $a->id) }}">Editar</a>
    </li>

    <li class="nav-item">
      <a class="nav-link {{ activeTab(["admin/rewards/" . $a->id . "/historial"]) }}" href="{{ route('admin.accion.historial', $a->id) }}">
      Historial
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link
        {{ activeTab([
          "admin/rewards/" . $a->id . "/send",
          "admin/rewards/" . $a->id . "/users"
        ]) }}" href="{{ route('admin.accion.send', $a->id) }}">
      Gestionar
      </a>
    </li>
  </ul>
</div>
