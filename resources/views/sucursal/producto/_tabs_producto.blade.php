@component('components.button._back')
  @slot('route', route('bodega.producto.index'))
  @slot('color', 'secondary')
  @slot('body', 'Producto - ' . $p->nombre)
@endcomponent

<div class="col-12">
  <ul class="nav nav-tabs">
    <li class="nav-item">
      <a class="nav-link {{ activeTab(["bodega/producto/" . $p->id]) }}" href="{{ route('bodega.producto.show', $p->id) }}">{{ $p->nombre }}</a>
    </li>
    <li class="nav-item">
      <a class="nav-link {{ activeTab(["bodega/producto/" . $p->id . "/edit"]) }}" href="{{ route('bodega.producto.edit', $p->id) }}">Editar</a>
    </li>
  </ul>
</div>
