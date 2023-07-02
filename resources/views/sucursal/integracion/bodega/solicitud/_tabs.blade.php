<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link {{ activeTab(['/sucursal/integracion/bodega/'. $b->id . '/solicitudes*']) }}" href="{{ route('sucursal.integracion.bodega', $b->id) }}">Bodegas</a>
  </li>
  <li class="nav-item">
    <a class="nav-link {{ activeTab(["sucursal/integracion/bodega/create"]) }}" href="{{ route('sucursal.integracion.bodega.solicitudes.create', $b->id) }}">Nuevo</a>
  </li>
</ul>
