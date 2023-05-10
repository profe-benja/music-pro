<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link {{ activeTab(["sucursal/producto"]) }}" href="{{ route('sucursal.producto.index') }}">Productos</a>
  </li>
  <li class="nav-item">
    <a class="nav-link {{ activeTab(["sucursal/producto/create"]) }}" href="{{ route('sucursal.producto.create') }}">Nuevo</a>
  </li>
</ul>
