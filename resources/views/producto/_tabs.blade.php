<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link {{ activeTab(["admin/producto"]) }}" href="{{ route('admin.producto.index') }}">Productos</a>
  </li>
  <li class="nav-item">
    <a class="nav-link {{ activeTab(["admin/producto/create"]) }}" href="{{ route('admin.producto.create') }}">Nuevo</a>
  </li>
</ul>
