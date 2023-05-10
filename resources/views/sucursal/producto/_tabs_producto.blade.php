@component('components.button._back')
  @slot('route', route('sucursal.producto.index'))
  @slot('color', 'secondary')
  @slot('body', 'Producto - ' . $p->nombre)
@endcomponent

<div class="col-12">
  <ul class="nav nav-tabs">
    <li class="nav-item">
      <a class="nav-link {{ activeTab(["sucursal/producto/" . $p->id]) }}" href="{{ route('sucursal.producto.show', $p->id) }}">{{ $p->nombre }}</a>
    </li>
    <li class="nav-item">
      <a class="nav-link {{ activeTab(["sucursal/producto/" . $p->id . "/edit"]) }}" href="{{ route('sucursal.producto.edit', $p->id) }}">Editar</a>
    </li>
  </ul>
</div>
