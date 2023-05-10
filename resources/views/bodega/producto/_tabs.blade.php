<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link {{ activeTab(["bodega/producto"]) }}" href="{{ route('bodega.producto.index') }}">Productos</a>
  </li>
  <li class="nav-item">
    <a class="nav-link {{ activeTab(["bodega/producto/create"]) }}" href="{{ route('bodega.producto.create') }}">Nuevo</a>
  </li>
</ul>
