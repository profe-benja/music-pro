@component('components.button._back')
  @slot('route', route('admin.solicitud.index'))
  @slot('color', 'secondary')
  @slot('body', 'Solicitud  - #' . $s->id)
@endcomponent

{{-- <div class="col-12">
  <ul class="nav nav-tabs">
    <li class="nav-item">
      <a class="nav-link {{ activeTab(["admin/producto/" . $p->id]) }}" href="{{ route('admin.producto.show', $p->id) }}">{{ $p->nombre }}</a>
    </li>
    <li class="nav-item">
      <a class="nav-link {{ activeTab(["admin/producto/" . $p->id . "/edit"]) }}" href="{{ route('admin.producto.edit', $p->id) }}">Editar</a>
    </li>
  </ul>
</div> --}}
